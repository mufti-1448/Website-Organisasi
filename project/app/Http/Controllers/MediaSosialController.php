<?php

namespace App\Http\Controllers;

use App\Models\MediaSosial;
use Illuminate\Http\Request;

class MediaSosialController extends Controller
{
    public function index()
    {
        $mediaSosial = MediaSosial::all();
        return view('media_sosial.index', compact('mediaSosial'));
    }

    public function create()
    {
        return view('media_sosial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_platform' => 'required|string|max:255',
            'url' => 'required|url',
            'icon' => 'nullable|string|max:255',
            'aktif' => 'boolean',
        ]);

        MediaSosial::create($request->all());

        return redirect()->route('media_sosial.index')->with('success', 'Media sosial berhasil ditambahkan.');
    }

    public function show(MediaSosial $mediaSosial)
    {
        return view('media_sosial.show', compact('mediaSosial'));
    }

    public function edit(MediaSosial $mediaSosial)
    {
        return view('media_sosial.edit', compact('mediaSosial'));
    }

    public function update(Request $request, MediaSosial $mediaSosial)
    {
        $request->validate([
            'nama_platform' => 'required|string|max:255',
            'url' => 'required|url',
            'icon' => 'nullable|string|max:255',
            'aktif' => 'boolean',
        ]);

        $mediaSosial->update($request->all());

        return redirect()->route('media_sosial.index')->with('success', 'Media sosial berhasil diperbarui.');
    }

    public function destroy(MediaSosial $mediaSosial)
    {
        $mediaSosial->delete();

        return redirect()->route('media_sosial.index')->with('success', 'Media sosial berhasil dihapus.');
    }
}
