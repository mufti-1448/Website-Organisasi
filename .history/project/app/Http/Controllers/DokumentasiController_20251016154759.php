<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasis = Dokumentasi::latest()->get();
        return view('dokumentasi.index', compact('dokumentasis'));
    }

    public function create()
    {
        return view('dokumentasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string|max:100',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tanggal', 'kategori']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $slug = Str::slug($request->judul);
            $filename = $slug . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/dokumentasi', $filename);
            $data['foto'] = 'dokumentasi/' . $filename;
        }

        Dokumentasi::create($data);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    public function show(Dokumentasi $dokumentasi)
    {
        return view('dokumentasi.show', compact('dokumentasi'));
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        return view('dokumentasi.edit', compact('dokumentasi'));
    }

    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string|max:100',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tanggal', 'kategori']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($dokumentasi->foto && Storage::disk('public')->exists($dokumentasi->foto)) {
                Storage::disk('public')->delete($dokumentasi->foto);
            }
            $file = $request->file('foto');
            $slug = Str::slug($request->judul);
            $filename = $slug . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/dokumentasi', $filename);
            $data['foto'] = 'dokumentasi/' . $filename;
        }

        $dokumentasi->update($data);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
        if ($dokumentasi->foto && Storage::disk('public')->exists($dokumentasi->foto)) {
            Storage::disk('public')->delete($dokumentasi->foto);
        }

        $dokumentasi->delete();

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }
}
