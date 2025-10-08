<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramKerjaController extends Controller
{
    /**
     * Tampilkan semua data program kerja
     */
    public function index()
    {
        $programKerja = DB::table('program_kerja')
            ->join('anggota', 'program_kerja.penanggung_jawab_id', '=', 'anggota.id')
            ->select('program_kerja.*', 'anggota.nama as penanggung_jawab')
            ->get();

        return view('program_kerja.index', compact('programKerja'));
    }

    /**
     * Form tambah program kerja baru
     */
    public function create()
    {
        $lastProgram = DB::table('program_kerja')->orderBy('id', 'desc')->first();
        $nextCode = "PRG001";

        if ($lastProgram) {
            $nextCode = 'PRG' . str_pad($lastProgram->id + 1, 3, '0', STR_PAD_LEFT);
        }

        $anggota = DB::table('anggota')->get();

        return view('program_kerja.create', compact('nextCode', 'anggota'));
    }

    /**
     * Simpan data program kerja baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'penanggung_jawab_id' => 'required|exists:anggota,id',
            'status' => 'required|in:belum,proses,selesai',
        ]);

        DB::table('program_kerja')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'penanggung_jawab_id' => $request->penanggung_jawab_id,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('program_kerja.index')->with('success', 'Program kerja berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail program kerja
     */
    public function show(string $id)
    {
        $program = DB::table('program_kerja')
            ->join('anggota', 'program_kerja.penanggung_jawab_id', '=', 'anggota.id')
            ->select('program_kerja.*', 'anggota.nama as penanggung_jawab')
            ->where('program_kerja.id', $id)
            ->first();

        if (!$program) {
            return redirect()->route('program_kerja.index')->with('error', 'Program kerja tidak ditemukan.');
        }

        return view('program_kerja.show', compact('program'));
    }

    /**
     * Form edit program kerja
     */
    public function edit(string $id)
    {
        $program = DB::table('program_kerja')->where('id', $id)->first();
        $anggota = DB::table('anggota')->get();

        if (!$program) {
            return redirect()->route('program_kerja.index')->with('error', 'Program kerja tidak ditemukan.');
        }

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
            'status' => 'required|in:belum,proses,selesai',
        ]);

        DB::table('program_kerja')->where('id', $id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'penanggung_jawab_id' => $request->penanggung_jawab_id,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('program_kerja.index')->with('success', 'Program kerja berhasil diperbarui.');
    }

    /**
     * Hapus program kerja
     */
    public function destroy(string $id)
    {
        DB::table('program_kerja')->where('id', $id)->delete();
        return redirect()->route('program_kerja.index')->with('success', 'Program kerja berhasil dihapus.');
    }
}
