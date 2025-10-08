<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use Illuminate\Support\Facades\DB;

class RapatController extends Controller
{
    /**
     * Tampilkan semua data rapat
     */
    public function index()
    {
        $rapat = Rapat::all();
        return view('rapat.index', compact('rapat'));
    }

    /**
     * Form tambah data rapat baru
     */
    public function create()
    {
        // Buat kode otomatis RPT001, RPT002, dst.
        $lastRapat = DB::table('rapat')->orderBy('id', 'desc')->first();
        $nextCode = "RPT001";

        if ($lastRapat) {
            $nextCode = 'RPT' . str_pad($lastRapat->id + 1, 3, '0', STR_PAD_LEFT);
        }

        // ⛔ Sebelumnya masih memanggil view anggota, sekarang sudah benar
        return view('rapat.create', compact('nextCode'));
    }

    /**
     * Simpan data rapat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        DB::table('rapat')->insert([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail rapat
     */
    public function show(string $id)
    {
        $rapat = Rapat::findOrFail($id);
        return view('rapat.show', compact('rapat'));
    }

    /**
     * Form edit rapat
     */
    public function edit(string $id)
    {
        $rapat = DB::table('rapat')->where('id', $id)->first();

        if (!$rapat) {
            return redirect()->route('rapat.index')->with('error', 'Rapat tidak ditemukan.');
        }

        return view('rapat.edit', compact('rapat'));
    }

    /**
     * Update data rapat
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        DB::table('rapat')->where('id', $id)->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan,
            'updated_at' => now()
        ]);

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil diperbarui.');
    }

    /**
     * Hapus data rapat
     */
    public function destroy(string $id)
    {
        DB::table('rapat')->where('id', $id)->delete();
        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil dihapus.');
    }
}
