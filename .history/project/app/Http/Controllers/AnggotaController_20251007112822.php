<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastAnggota = DB::table('anggota')->orderBy('id', 'desc')->first();
        $nextCode = "AGT001";
        if ($lastAnggota && $lastAnggota->id) {
            $lastCode = $lastAnggota->id;
            $number = (int) substr($lastCode, 3);
            $nextNumber = $number + 1;
            $nextCode = 'AGT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        }

        return view('anggota.create', compact('nextCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data bisa ditambahkan di sini
        // $request->validate([...]);

        $file = $request->file('foto');
        $namaFile = null;

        if ($file) {
            // Membuat nama file dari nama anggota (lowercase, spasi jadi underscore) + timestamp + ekstensi
            $namaOrang = str_replace(' ', '_', strtolower($request->nama));
            $ekstensi  = $file->getClientOriginalExtension();
            $namaFile = time() . '_' . $namaOrang . '.' . $ekstensi;
            $file->storeAs('public/anggota', $namaFile);
        }

        DB::table('anggota')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jabatan' => $request->jabatan,
            'kontak' => $request->kontak,
            'foto' => $namaFile,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
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
        $anggota = DB::table('anggota')->where('id', $id)->first();

        $file = $request->file('foto');
        $namaFile = $anggota->foto; // Default: tetap pakai foto lama

        if ($file) {
            $namaOrang = str_replace(' ', '_', strtolower($request->nama));
            $ekstensi  = $file->getClientOriginalExtension();
            $namaFile = time() . '_' . $namaOrang . '.' . $ekstensi;
            $file->storeAs('public/anggota', $namaFile);
        }

        DB::table('anggota')->where('id', $id)->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jabatan' => $request->jabatan,
            'kontak' => $request->kontak,
            'foto' => $namaFile
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
