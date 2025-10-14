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
            'keterangan' => 'nullable|string',
        ]);

        Rapat::create([
            'id' => $request->id,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil ditambahkan.');
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
