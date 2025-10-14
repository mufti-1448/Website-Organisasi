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
        $rapat = Rapat::with(['notulen', 'dokumentasi'])->get();
        return view('rapat.index', compact('rapat'));
    }

    /**
     * Form tambah data rapat baru
     */
    public function create()
    {
        // Generate ID otomatis RPT001, RPT002, dst
        $lastRapat = Rapat::orderBy('id', 'desc')->first();
        $nextCode = "RPT001";

        if ($lastRapat) {
            $lastNumber = (int) substr($lastRapat->id, 3);
            $nextCode = 'RPT' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

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
            'status' => 'required|in:belum,berlangsung,selesai',
            'jumlah_peserta' => 'nullable|integer|min:0',
        ]);


        // Generate ID rapat custom
        $lastRapat = DB::table('rapat')->orderByDesc('id')->first();
        $nextCode = 'RPT001';

        if ($lastRapat) {
            $lastNumber = (int) substr($lastRapat->id, 3);
            $nextCode = 'RPT' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        // Simpan data dengan ID custom
        // Simpan data dengan ID custom
        DB::table('rapat')->insert([
            'id' => $nextCode,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'status' => $request->status, // 🔹 ubah dari 'keterangan' ke 'status'
            'jumlah_peserta' => $request->jumlah_peserta,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // ✅ Redirect ke halaman index rapat dengan pesan sukses
        return redirect()->route('rapat.index')->with('success', 'Data rapat berhasil disimpan!');
    }

    /**
     * Tampilkan detail rapat beserta relasinya
     */
    public function show(string $id)
    {
        $rapat = Rapat::with(['notulen.penulis', 'dokumentasi'])->findOrFail($id);
        return view('rapat.show', compact('rapat'));
    }

    /**
     * Form edit rapat
     */
    public function edit(string $id)
    {
        $rapat = Rapat::findOrFail($id);
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
            'status' => 'required|in:belum,berlangsung,selesai',
            'jumlah_peserta' => 'nullable|integer|min:0',
        ]);


        $rapat = Rapat::findOrFail($id);
        $rapat->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'status' => $request->status,
            'jumlah_peserta' => $request->jumlah_peserta ?? 0,
        ]);

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil diperbarui.');
    }

    /**
     * Hapus data rapat
     */
    public function destroy(string $id)
    {
        $rapat = Rapat::findOrFail($id);
        $rapat->delete();

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil dihapus.');
    }
}
