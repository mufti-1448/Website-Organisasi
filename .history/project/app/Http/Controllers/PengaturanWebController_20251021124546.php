<?php

namespace App\Http\Controllers;

use App\Models\PengaturanWeb;
use App\Models\Carousel;
use App\Models\ProfilOrganisasi;
use App\Models\TentangKami;
use App\Http\Requests\StorePengaturanWebRequest;
use App\Http\Requests\UpdatePengaturanWebRequest;
use App\Http\Requests\StoreCarouselRequest;
use App\Http\Requests\UpdateCarouselRequest;
use App\Http\Requests\StoreTentangKamiRequest;
use App\Http\Requests\UpdateTentangKamiRequest;
use Illuminate\Support\Facades\Storage;

class PengaturanWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaturan = PengaturanWeb::first(); // Asumsi hanya satu record
        return view('pengaturan_web.index', compact('pengaturan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengaturan_web.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengaturanWebRequest $request)
    {
        $validated = $request->validated();

        $logoPath = $request->file('logo')->store('uploads/logo', 'public');
        $faviconPath = $request->file('favicon')->store('uploads/favicon', 'public');

        PengaturanWeb::create(array_merge($validated, [
            'logo' => $logoPath,
            'favicon' => $faviconPath,
        ]));

        return redirect()->route('pengaturan-web.index')->with('success', 'Pengaturan Web berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengaturan = PengaturanWeb::findOrFail($id);
        return view('pengaturan_web.show', compact('pengaturan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengaturan = PengaturanWeb::findOrFail($id);
        return view('pengaturan_web.edit', compact('pengaturan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengaturanWebRequest $request, string $id)
    {
        $pengaturan = PengaturanWeb::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            // Hapus logo lama
            if ($pengaturan->logo && Storage::disk('public')->exists($pengaturan->logo)) {
                Storage::disk('public')->delete($pengaturan->logo);
            }
            $validated['logo'] = $request->file('logo')->store('uploads/logo', 'public');
        }

        if ($request->hasFile('favicon')) {
            // Hapus favicon lama
            if ($pengaturan->favicon && Storage::disk('public')->exists($pengaturan->favicon)) {
                Storage::disk('public')->delete($pengaturan->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('uploads/favicon', 'public');
        }

        $pengaturan->update($validated);

        return redirect()->route('pengaturan-web.index')->with('success', 'Pengaturan Web berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengaturan = PengaturanWeb::findOrFail($id);

        // Hapus logo dari storage
        if ($pengaturan->logo && Storage::disk('public')->exists($pengaturan->logo)) {
            Storage::disk('public')->delete($pengaturan->logo);
        }

        $pengaturan->delete();

        return redirect()->route('pengaturan-web.index')->with('success', 'Pengaturan Web berhasil dihapus.');
    }
}
