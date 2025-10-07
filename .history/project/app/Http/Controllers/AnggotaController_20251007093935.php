<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    // Menampilkan semua anggota
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('anggota.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
        ]);

        Anggota::create($request->all());
        return redirect()->route('anggota.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    // Update data
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
        ]);

        $anggota->update($request->all());
        return redirect()->route('anggota.index')->with('success', 'Data berhasil diperbarui!');
    }

    // Hapus data
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Data berhasil dihapus!');
    }
}
