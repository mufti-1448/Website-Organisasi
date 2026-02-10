<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use App\Http\Requests\StoreTentangKamiRequest;
use App\Http\Requests\UpdateTentangKamiRequest;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tentangKamis = TentangKami::all();
        return view('tentang_kami.index', compact('tentangKamis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tentang_kami.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|unique:tentang_kami,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('uploads/tentang_kami', 'public');

        TentangKami::create([
            'id' => $request->id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('tentang-kami.index')->with('success', 'Tentang Kami berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tentangKami = TentangKami::findOrFail($id);
        return view('tentang_kami.show', compact('tentangKami'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tentangKami = TentangKami::findOrFail($id);
        return view('tentang_kami.edit', compact('tentangKami'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tentangKami = TentangKami::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($tentangKami->foto && Storage::disk('public')->exists($tentangKami->foto)) {
                Storage::disk('public')->delete($tentangKami->foto);
            }
            $data['foto'] = $request->file('foto')->store('uploads/tentang_kami', 'public');
        }

        $tentangKami->update($data);

        return redirect()->route('tentang-kami.index')->with('success', 'Tentang Kami berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tentangKami = TentangKami::findOrFail($id);

        // Hapus foto dari storage
        if ($tentangKami->foto && Storage::disk('public')->exists($tentangKami->foto)) {
            Storage::disk('public')->delete($tentangKami->foto);
        }

        $tentangKami->delete();

        return redirect()->route('tentang-kami.index')->with('success', 'Tentang Kami berhasil dihapus.');
    }
}
