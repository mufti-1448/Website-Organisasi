<?php

namespace App\Http\Controllers;

use App\Models\MediaSosial;
use Illuminate\Http\Request;

class MediaSosialController extends Controller
{
    public function index()
    {
        $mediaSosial = MediaSosial::all();
        return view('admin.media_sosial.index', compact('mediaSosial'));
    }

    public function create()
    {
        return view('media_sosial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_platform' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'url' => 'required|url|max:500',
            'icon' => 'nullable|string|max:255|regex:/^[a-zA-Z0-9\-\_]+$/',
            'aktif' => 'boolean',
        ]);

        // Sanitize input untuk mencegah XSS
        $sanitizedNama = strip_tags($request->nama_platform);
        $sanitizedUrl = filter_var($request->url, FILTER_SANITIZE_URL);
        $sanitizedIcon = strip_tags($request->icon);

        MediaSosial::create([
            'nama_platform' => $sanitizedNama,
            'url' => $sanitizedUrl,
            'icon' => $sanitizedIcon,
            'aktif' => $request->aktif,
        ]);

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
            'nama_platform' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'url' => 'required|url|max:500',
            'icon' => 'nullable|string|max:255|regex:/^[a-zA-Z0-9\-\_]+$/',
            'aktif' => 'boolean',
        ]);

        // Sanitize input untuk mencegah XSS
        $sanitizedNama = strip_tags($request->nama_platform);
        $sanitizedUrl = filter_var($request->url, FILTER_SANITIZE_URL);
        $sanitizedIcon = strip_tags($request->icon);

        $mediaSosial->update([
            'nama_platform' => $sanitizedNama,
            'url' => $sanitizedUrl,
            'icon' => $sanitizedIcon,
            'aktif' => $request->aktif,
        ]);

        return redirect()->route('media_sosial.index')->with('success', 'Media sosial berhasil diperbarui.');
    }

    public function destroy(MediaSosial $mediaSosial)
    {
        $mediaSosial->delete();

        return redirect()->route('media_sosial.index')->with('success', 'Media sosial berhasil dihapus.');
    }
}
