<?php

namespace App\Http\Controllers;

use App\Models\PengaturanWeb;
use App\Http\Requests\StorePengaturanWebRequest;
use App\Http\Requests\UpdatePengaturanWebRequest;
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
    public function update(Request $request, string $id)
    {
        $pengaturan = PengaturanWeb::findOrFail($id);

        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'whatsapp' => 'nullable|string|max:20',
            'alamat' => 'required|string',
        ]);

        $data = [
            'nama_organisasi' => $request->nama_organisasi,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'whatsapp' => $request->whatsapp,
            'alamat' => $request->alamat,
        ];

        if ($request->hasFile('logo')) {
            // Hapus logo lama
            if ($pengaturan->logo && Storage::disk('public')->exists($pengaturan->logo)) {
                Storage::disk('public')->delete($pengaturan->logo);
            }
            $data['logo'] = $request->file('logo')->store('uploads/logo', 'public');
        }

        $pengaturan->update($data);

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
