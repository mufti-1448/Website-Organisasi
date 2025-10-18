<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use App\Models\Notulen;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\DB;

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

        // Hanya tampilkan notulen yang belum terhubung dengan rapat
        $notulenList = Notulen::whereNull('rapat_id')->get();

        // Hanya tampilkan dokumentasi yang belum terhubung dengan rapat
        $dokumentasiList = Dokumentasi::whereNull('rapat_id')->get();

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
            'notulen_id' => 'nullable|exists:notulen,id',
            'dokumentasi_id' => 'nullable|exists:dokumentasi,id',
        ]);

        // Validasi bahwa notulen belum digunakan oleh rapat lain
        if ($request->notulen_id) {
            $existingRapat = Notulen::where('id', $request->notulen_id)->whereNotNull('rapat_id')->first();
            if ($existingRapat) {
                return redirect()->back()->withErrors(['notulen_id' => 'Notulen ini sudah digunakan oleh rapat lain.'])->withInput();
            }
        }

        // Validasi bahwa dokumentasi belum digunakan oleh rapat lain
        if ($request->dokumentasi_id) {
            $existingRapat = Dokumentasi::where('id', $request->dokumentasi_id)->whereNotNull('rapat_id')->first();
            if ($existingRapat) {
                return redirect()->back()->withErrors(['dokumentasi_id' => 'Dokumentasi ini sudah digunakan oleh rapat lain.'])->withInput();
            }
        }

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
        if ($request->dokumentasi_id) {
            $dokumentasi = Dokumentasi::find($request->dokumentasi_id);
            if ($dokumentasi) {
                $dokumentasi->rapat_id = $rapat->id;
                $dokumentasi->save();
            }
        }

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil dibuat.');
    }

    /**
     * Tampilkan detail rapat
     */
    public function show(string $id)
    {
        $rapat = Rapat::with(['notulen.penulis'])->findOrFail($id);
        return view('rapat.show', compact('rapat'));
    }

    /**
     * Form edit rapat
     */
    public function edit($id)
    {
        $rapat = Rapat::with(['notulen', 'dokumentasi'])->findOrFail($id);
        // Tampilkan notulen yang belum terhubung dengan rapat lain atau yang sudah terhubung dengan rapat ini
        $notulenList = Notulen::whereNull('rapat_id')->orWhere('rapat_id', $id)->get();
        // Tampilkan dokumentasi yang belum terhubung dengan rapat lain atau yang sudah terhubung dengan rapat ini
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
            'notulen_id' => 'nullable|exists:notulen,id',
            'dokumentasi_id' => 'nullable|exists:dokumentasi,id',
        ]);

        // Validasi bahwa notulen belum digunakan oleh rapat lain (kecuali rapat ini sendiri)
        if ($request->notulen_id) {
            $existingRapat = Notulen::where('id', $request->notulen_id)
                ->whereNotNull('rapat_id')
                ->where('rapat_id', '!=', $rapat->id)
                ->first();
            if ($existingRapat) {
                return redirect()->back()->withErrors(['notulen_id' => 'Notulen ini sudah digunakan oleh rapat lain.'])->withInput();
            }
        }

        // Validasi bahwa dokumentasi belum digunakan oleh rapat lain (kecuali rapat ini sendiri)
        if ($request->dokumentasi_id) {
            $existingRapat = Dokumentasi::where('id', $request->dokumentasi_id)
                ->whereNotNull('rapat_id')
                ->where('rapat_id', '!=', $rapat->id)
                ->first();
            if ($existingRapat) {
                return redirect()->back()->withErrors(['dokumentasi_id' => 'Dokumentasi ini sudah digunakan oleh rapat lain.'])->withInput();
            }
        }

        $rapat->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'status' => $request->status,
        ]);

        // Update relasi Notulen
        // Lepaskan notulen lama dari rapat ini
        Notulen::where('rapat_id', $rapat->id)->update(['rapat_id' => null]);

        // Hubungkan notulen baru jika dipilih
        if ($request->notulen_id) {
            $notulen = Notulen::find($request->notulen_id);
            if ($notulen) {
                $notulen->rapat_id = $rapat->id;
                $notulen->save();
            }
        }

        // Update relasi Dokumentasi
        // Lepaskan dokumentasi lama dari rapat ini
        Dokumentasi::where('rapat_id', $rapat->id)->update(['rapat_id' => null]);

        // Hubungkan dokumentasi baru jika dipilih
        if ($request->dokumentasi_id) {
            $dokumentasi = Dokumentasi::find($request->dokumentasi_id);
            if ($dokumentasi) {
                $dokumentasi->rapat_id = $rapat->id;
                $dokumentasi->save();
            }
        }

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil diperbarui.');
    }

    /**
     * Hapus rapat
     */
    public function destroy(string $id)
    {
        $rapat = Rapat::findOrFail($id);

        // Lepaskan relasi notulen (file notulen TIDAK dihapus sesuai spesifikasi)
        if ($rapat->notulen) {
            $rapat->notulen->update(['rapat_id' => null]);
        }

        // Lepaskan relasi dokumentasi (file dokumentasi TIDAK dihapus sesuai spesifikasi)
        if ($rapat->dokumentasi) {
            $rapat->dokumentasi->update(['rapat_id' => null]);
        }

        $rapat->delete();

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil dihapus.');
    }
}
