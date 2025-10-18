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
        $notulenList = Notulen::whereNull('program_id')->get();
        $evaluasiList = Evaluasi::whereNull('program_id')->get();
        $dokumentasiList = Dokumentasi::whereNull('program_id')->get();

        return view('program_kerja.create', compact('nextCode', 'anggota', 'notulenList', 'evaluasiList', 'dokumentasiList'));
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
            'notulen_id' => 'nullable|exists:notulen,id',
            'evaluasi_id' => 'nullable|exists:evaluasi,id',
        ]);

        $last = ProgramKerja::orderBy('id', 'desc')->first();
        $nextCode = $last ? 'PRK' . str_pad((int) substr($last->id, 3) + 1, 3, '0', STR_PAD_LEFT) : 'PRK001';

        DB::beginTransaction();
        try {
            $program = ProgramKerja::create([
                'id' => $nextCode,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'penanggung_jawab_id' => $request->penanggung_jawab_id,
                'status' => $request->status,
            ]);

            // Hubungkan jika sudah ada
            if ($request->filled('notulen_id')) {
                $notulen = Notulen::find($request->notulen_id);
                $notulen->program_id = $program->id;
                $notulen->save();
            }

            if ($request->filled('evaluasi_id')) {
                $evaluasi = Evaluasi::find($request->evaluasi_id);
                $evaluasi->program_id = $program->id;
                $evaluasi->save();
            }

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
        $program = ProgramKerja::with(['penanggungJawab', 'notulen', 'evaluasi'])->findOrFail($id);
        return view('program_kerja.show', compact('program'));
    }

    /**
     * Form edit program kerja
     */
    public function edit(string $id)
    {
        $program = ProgramKerja::with(['notulen', 'evaluasi'])->findOrFail($id);
        $anggota = Anggota::all();
        $notulenList = Notulen::whereNull('program_id')->orWhere('program_id', $id)->get();
        $evaluasiList = Evaluasi::whereNull('program_id')->orWhere('program_id', $id)->get();

        return view('program_kerja.edit', compact('program', 'anggota', 'notulenList', 'evaluasiList'));
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
            'notulen_id' => 'nullable|exists:notulen,id',
            'evaluasi_id' => 'nullable|exists:evaluasi,id',
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

            // Reset semua relasi dulu
            Notulen::where('program_id', $program->id)->update(['program_id' => null]);
            Evaluasi::where('program_id', $program->id)->update(['program_id' => null]);

            // Hubungkan ulang jika ada input
            if ($request->filled('notulen_id')) {
                $notulen = Notulen::find($request->notulen_id);
                $notulen->program_id = $program->id;
                $notulen->save();
            }

            if ($request->filled('evaluasi_id')) {
                $evaluasi = Evaluasi::find($request->evaluasi_id);
                $evaluasi->program_id = $program->id;
                $evaluasi->save();
            }

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

        // Hapus file notulen dan evaluasi jika ada
        if ($program->notulen) {
            foreach ($program->notulen as $notulen) {
                if ($notulen->file && file_exists(public_path('storage/notulen/' . $notulen->file))) {
                    unlink(public_path('storage/notulen/' . $notulen->file));
                }
            }
        }

        if ($program->evaluasi) {
            foreach ($program->evaluasi as $evaluasi) {
                if ($evaluasi->file && file_exists(public_path('storage/evaluasi/' . $evaluasi->file))) {
                    unlink(public_path('storage/evaluasi/' . $evaluasi->file));
                }
            }
        }

        // Set null relasi sebelum hapus
        Notulen::where('program_id', $program->id)->update(['program_id' => null]);
        Evaluasi::where('program_id', $program->id)->update(['program_id' => null]);
        $program->delete();

        return redirect()->route('program_kerja.index')->with('success', 'Program kerja berhasil dihapus.');
    }
}
