<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use Illuminate\Support\Facades\DB;


class RapatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rapat = Rapat::all();
        return view('rapat.index', compact('rapat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastRapat = DB::table('rapat')->orderBy('id', 'desc')->first();
        $nextCode = "RPT001";
        if ($lastRapat && $lastRapat->id) {
            $lastCode = $lastRapat->id;
            $number = (int) substr($lastCode, 3);
            $nextNumber = $number + 1;
            $nextCode = 'RPT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        }

        return view('anggota.create', compact('nextCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'keterangan' => 'required|text|max:2000',
        ]);

        DB::table('rapat')->insert([
            'id' => $request->id,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('ra.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = Anggota::findOrFail($id); // mencari data anggota berdasarkan id
        return view('anggota.show', compact('anggota')); // tampilkan halaman detail dengan data anggota
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = DB::table('anggota')->where('id', $id)->first();
        if (!$anggota) {
            return redirect()->route('anggota.index')->with('error', 'Anggota tidak ditemukan.');
        }
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048', // max 2MB
        ]);

        $anggota = DB::table('anggota')->where('id', $id)->first();

        $file = $request->file('foto');
        $namaFile = $anggota->foto; // Default: tetap pakai foto lama

        if ($file) {
            $namaOrang = str_replace(' ', '_', strtolower($request->nama));
            $ekstensi  = $file->getClientOriginalExtension();
            $namaFile = time() . '_' . $namaOrang . '.' . $ekstensi;
            $file->move(public_path('uploads/anggota'), $namaFile);
        }

        DB::table('anggota')->where('id', $id)->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jabatan' => $request->jabatan,
            'kontak' => $request->kontak,
            'foto' => $namaFile,
            'updated_at' => now()
        ]);


        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('anggota')->where('id', $id)->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
