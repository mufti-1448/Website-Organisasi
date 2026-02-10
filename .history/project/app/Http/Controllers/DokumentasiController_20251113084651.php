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
        $sosialMedia = \App\Models\SosialMedia::all()->keyBy('platform');
        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.dokumentasi.index', compact('dokumentasis'));
        }
        return view('user.dokumentasi.index', compact('dokumentasis'));
    }

    public function create()
    {
        $lastDokumentasi = Dokumentasi::orderBy('id', 'desc')->first();
        $nextCode = "DKM001";
        if ($lastDokumentasi && $lastDokumentasi->id) {
            $lastCode = $lastDokumentasi->id;
            $number = (int) substr($lastCode, 3);
            $nextNumber = $number + 1;
            $nextCode = 'DKM' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        }

        return view('admin.dokumentasi.create', compact('nextCode'));
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

        $lastDokumentasi = Dokumentasi::orderBy('id', 'desc')->first();
        $nextCode = "DKM001";
        if ($lastDokumentasi && $lastDokumentasi->id) {
            $lastCode = $lastDokumentasi->id;
            $number = (int) substr($lastCode, 3);
            $nextNumber = $number + 1;
            $nextCode = 'DKM' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        }

        $data = $request->only(['judul', 'deskripsi', 'tanggal', 'kategori']);
        $data['id'] = $nextCode;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $slug = Str::slug($request->judul);
            $filename = 'dokumentasi_' . $nextCode . '_' . $slug . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('dokumentasi', $filename, 'public');
            $data['foto'] = $path;
        }

        Dokumentasi::create($data);

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    public function show(Dokumentasi $dokumentasi)
    {
        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.dokumentasi.show', compact('dokumentasi'));
        }
        return view('user.dokumentasi.show', compact('dokumentasi'));
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        return view('admin.dokumentasi.edit', compact('dokumentasi'));
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
            $filename = 'dokumentasi_' . $dokumentasi->id . '_' . $slug . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('dokumentasi', $filename, 'public');
            $data['foto'] = $path;
        }

        $dokumentasi->update($data);

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
        if ($dokumentasi->foto && Storage::disk('public')->exists($dokumentasi->foto)) {
            Storage::disk('public')->delete($dokumentasi->foto);
        }

        $dokumentasi->delete();

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }
}
