<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use App\Models\Anggota;
use App\Models\Notulen;
use App\Models\Dokumentasi;
use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramKerjaController extends Controller
{
    /**
     * Tampilkan daftar program kerja
     */
    public function index()
    {
        $programKerja = ProgramKerja::with('penanggungJawab')->get();
        return view('program_kerja.index', compact('programKerja'));
    }

    /**
     * Form tambah program kerja baru
     */
    public function create()
    {
        $last = ProgramKerja::orderBy('id', 'desc')->first();
        $nextCode = $last ? 'PRK' . str_pad((int) substr($last->id, 3) + 1, 3, '0', STR_PAD_LEFT) : 'PRK001';
        $anggota = Anggota::all();
        return view('program_kerja.create', compact('nextCode', 'anggota'));
    }

    /**
     * Simpan program kerja baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'penanggung_jawab_id' => 'required|exists:anggota,id',
            'status' => 'required|in:belum,berlangsung,selesai',
        ]);

        $last = ProgramKerja::orderBy('id', 'desc')->first();
        $nextCode = $last ? 'PRK' . str_pad((int) substr($last->id, 3) + 1, 3, '0', STR_PAD_LEFT) : 'PRK001';

        DB::beginTransaction();
        try {
            ProgramKerja::create([
                'id' => $nextCode,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'penanggung_jawab_id' => $request->penanggung_jawab_id,
                'status' => $request->status,
            ]);

            DB::commit();
            return redirect()->route('program_kerja.index')->with('success', 'Program kerja berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambah program kerja: ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan detail program kerja
     */
    public function show(string $id)
    {
        $program = ProgramKerja::with(['penanggungJawab', 'notulen', 'dokumentasi', 'evaluasi'])->findOrFail($id);
        return view('program_kerja.show', compact('program'));
    }

    /**
     * Form edit program kerja
     */
    public function edit(string $id)
    {
        $program = ProgramKerja::findOrFail($id);
        $anggota = Anggota::all();
        return view('program_kerja.edit', compact('program', 'anggota'));
    }

    /**
     * Update data program kerja
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'penanggung_jawab_id' => 'required|exists:anggota,id',
            'status' => 'required|in:belum,berlangsung,selesai',
        ]);

        DB::beginTransaction();
        try {
            $program = ProgramKerja::findOrFail($id);
            $program->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'penanggung_jawab_id' => $request->penanggung_jawab_id,
                'status' => $request->status,
            ]);

            DB::commit();
            return redirect()->route('program_kerja.index')->with('success', 'Data program kerja berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Hapus program kerja
     */
    public function destroy(string $id)
    {
        $program = ProgramKerja::findOrFail($id);
        $program->delete();

        return redirect()->route('program_kerja.index')->with('success', 'Program kerja berhasil dihapus.');
    }
}
