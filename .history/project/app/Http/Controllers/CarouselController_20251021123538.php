<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Http\Requests\StoreCarouselRequest;
use App\Http\Requests\UpdateCarouselRequest;
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
    public function store(StoreCarouselRequest $request)
    {
        $validated = $request->validated();
        $validated['id'] = $request->input('id', 'CRL' . str_pad(Carousel::count() + 1, 3, '0', STR_PAD_LEFT));

        $fotoPath = $request->file('foto')->store('uploads/carousel', 'public');

        Carousel::create(array_merge($validated, ['foto' => $fotoPath]));

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
    public function update(UpdateCarouselRequest $request, string $id)
    {
        $carousel = Carousel::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($carousel->foto && Storage::disk('public')->exists($carousel->foto)) {
                Storage::disk('public')->delete($carousel->foto);
            }
            $validated['foto'] = $request->file('foto')->store('uploads/carousel', 'public');
        }

        $carousel->update($validated);

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
