<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|unique:carousels,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tombol_text' => 'required|string|max:255',
            'tombol_link' => 'required|url',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('uploads/carousel', 'public');

        Carousel::create([
            'id' => $request->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tombol_text' => $request->tombol_text,
            'tombol_link' => $request->tombol_link,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('carousel.index')->with('success', 'Carousel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('carousel.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carousel = Carousel::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tombol_text' => 'required|string|max:255',
            'tombol_link' => 'required|url',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tombol_text' => $request->tombol_text,
            'tombol_link' => $request->tombol_link,
        ];

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($carousel->foto && Storage::disk('public')->exists($carousel->foto)) {
                Storage::disk('public')->delete($carousel->foto);
            }
            $data['foto'] = $request->file('foto')->store('uploads/carousel', 'public');
        }

        $carousel->update($data);

        return redirect()->route('carousel.index')->with('success', 'Carousel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carousel = Carousel::findOrFail($id);

        // Hapus foto dari storage
        if ($carousel->foto && Storage::disk('public')->exists($carousel->foto)) {
            Storage::disk('public')->delete($carousel->foto);
        }

        $carousel->delete();

        return redirect()->route('carousel.index')->with('success', 'Carousel berhasil dihapus.');
    }
}
