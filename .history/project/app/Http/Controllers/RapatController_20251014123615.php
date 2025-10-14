<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rapat;


class RapatController extends Controller
{
    /**
     * Tampilkan semua rapat
     */
    public function index()
    {
        $rapat = Rapat::with(['notulen', 'dokumentasi'])->get();
        return view('rapat.index', compact('rapat'));
    }

    /**
     * Form tambah rapat
     */
    public function create()
    {
        $lastRapat = Rapat::orderBy('id', 'desc')->first();
        $nextCode = $lastRapat ? 'RPT' . str_pad((int) substr($lastRapat->id, 3) + 1, 3, '0', STR_PAD_LEFT) : 'RPT001';

        $notulenList = Notulen::all();
        $dokumentasiList = Dokumentasi::all();

        return view('rapat.create', compact('nextCode', 'notulenList', 'dokumentasiList'));
    }


    /**
     * Simpan rapat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'status' => 'required|in:belum,berlangsung,selesai',
        ]);

        $lastRapat = DB::table('rapat')->orderByDesc('id')->first();
        $nextCode = $lastRapat ? 'RPT' . str_pad((int) substr($lastRapat->id, 3) + 1, 3, '0', STR_PAD_LEFT) : 'RPT001';

        $rapat = Rapat::create([
            'id' => $nextCode,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'status' => $request->status,
        ]);

        // Hubungkan Notulen jika dipilih
        if ($request->notulen_id) {
            $notulen = Notulen::find($request->notulen_id);
            if ($notulen) {
                $notulen->rapat_id = $rapat->id;
                $notulen->save();
            }
        }

        // Hubungkan Dokumentasi jika dipilih
        if ($request->dokumentasi_ids) {
            Dokumentasi::whereIn('id', $request->dokumentasi_ids)->update(['rapat_id' => $rapat->id]);
        }

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil dibuat.');
    }

    /**
     * Tampilkan detail rapat
     */
    public function show(string $id)
    {
        $rapat = Rapat::with(['notulen.penulis', 'dokumentasi'])->findOrFail($id);
        return view('rapat.show', compact('rapat'));
    }

    /**
     * Form edit rapat
     */
    public function edit($id)
    {
        $rapat = Rapat::with(['notulen', 'dokumentasi'])->findOrFail($id);
        $notulenList = Notulen::whereNull('rapat_id')->orWhere('rapat_id', $id)->get();
        $dokumentasiList = Dokumentasi::whereNull('rapat_id')->orWhere('rapat_id', $id)->get();

        return view('rapat.edit', compact('rapat', 'notulenList', 'dokumentasiList'));
    }

    /**
     * Update rapat
     */
    public function update(Request $request, $id)
    {
        $rapat = Rapat::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'status' => 'required|in:belum,berlangsung,selesai',
        ]);

        $rapat->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'status' => $request->status,
        ]);

        // Update relasi Notulen
        Notulen::where('rapat_id', $rapat->id)->update(['rapat_id' => null]);
        if ($request->notulen_id) {
            $notulen = Notulen::find($request->notulen_id);
            if ($notulen) {
                $notulen->rapat_id = $rapat->id;
                $notulen->save();
            }
        }

        // Update relasi Dokumentasi
        Dokumentasi::where('rapat_id', $rapat->id)->update(['rapat_id' => null]);
        if ($request->dokumentasi_ids) {
            Dokumentasi::whereIn('id', $request->dokumentasi_ids)->update(['rapat_id' => $rapat->id]);
        }

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil diperbarui.');
    }

    /**
     * Hapus rapat
     */
    public function destroy(string $id)
    {
        $rapat = Rapat::findOrFail($id);
        $rapat->delete();

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil dihapus.');
    }
}
