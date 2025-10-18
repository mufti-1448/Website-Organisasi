<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Rapat;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'rapat_id' => 'required',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string|max:100',
            'program_id' => 'nullable|exists:program_kerja,id',
        ]);

        $path = $request->file('foto')->store('dokumentasi', 'public');

        Dokumentasi::create([
            'rapat_id' => $request->rapat_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $path,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    public function show(Dokumentasi $dokumentasi)
    {
        return view('dokumentasi.show', compact('dokumentasi'));
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        $rapats = Rapat::all();
        $programs = ProgramKerja::all();
        return view('dokumentasi.edit', compact('dokumentasi', 'rapats', 'programs'));
    }

    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $request->validate([
            'rapat_id' => 'required',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string|max:100',
            'program_id' => 'nullable|exists:program_kerja,id',
        ]);

        $data = $request->only(['rapat_id', 'judul', 'deskripsi', 'tanggal', 'kategori', 'program_id']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($dokumentasi->foto && Storage::disk('public')->exists($dokumentasi->foto)) {
                Storage::disk('public')->delete($dokumentasi->foto);
            }
            $data['foto'] = $request->file('foto')->store('dokumentasi', 'public');
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
