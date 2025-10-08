<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;

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
        $lastrapat = DB::table('rapat')->orderBy('id', 'desc')->first();
        $nextCode = "AGT001";
        if ($lastrapat && $lastrapat->id) {
            $lastCode = $lastrapat->id;
            $number = (int) substr($lastCode, 3);
            $nextNumber = $number + 1;
            $nextCode = 'AGT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        }

        return view('rapat.create', compact('nextCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048', // max 2MB
        ]);

        $file = $request->file('foto');
        $namaFile = null;

        if ($file) {
            // Membuat nama file dari nama rapat (lowercase, spasi jadi underscore) + timestamp + ekstensi
            $namaOrang = str_replace(' ', '_', strtolower($request->nama));
            $ekstensi  = $file->getClientOriginalExtension();
            $namaFile = time() . '_' . $namaOrang . '.' . $ekstensi;
            $file->move(public_path('uploads/rapat'), $namaFile);
        }

        DB::table('rapat')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jabatan' => $request->jabatan,
            'kontak' => $request->kontak,
            'foto' => $namaFile,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('rapat.index')->with('success', 'rapat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rapat = rapat::findOrFail($id); // mencari data rapat berdasarkan id
        return view('rapat.show', compact('rapat')); // tampilkan halaman detail dengan data rapat
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rapat = DB::table('rapat')->where('id', $id)->first();
        if (!$rapat) {
            return redirect()->route('rapat.index')->with('error', 'rapat tidak ditemukan.');
        }
        return view('rapat.edit', compact('rapat'));
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

        $rapat = DB::table('rapat')->where('id', $id)->first();

        $file = $request->file('foto');
        $namaFile = $rapat->foto; // Default: tetap pakai foto lama

        if ($file) {
            $namaOrang = str_replace(' ', '_', strtolower($request->nama));
            $ekstensi  = $file->getClientOriginalExtension();
            $namaFile = time() . '_' . $namaOrang . '.' . $ekstensi;
            $file->move(public_path('uploads/rapat'), $namaFile);
        }

        DB::table('rapat')->where('id', $id)->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jabatan' => $request->jabatan,
            'kontak' => $request->kontak,
            'foto' => $namaFile,
            'updated_at' => now()
        ]);


        return redirect()->route('rapat.index')->with('success', 'rapat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('rapat')->where('id', $id)->delete();
        return redirect()->route('rapat.index')->with('success', 'rapat berhasil dihapus.');
    }
}
