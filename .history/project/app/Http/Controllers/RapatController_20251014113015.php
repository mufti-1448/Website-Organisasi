<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RapatController extends Controller
{
    private function generateRapatId()
    {
        $last = Rapat::orderBy('id', 'desc')->first();
        $nextCode = 'RPT001';
        if ($last) {
            $num = (int) substr($last->id, 3);
            $nextCode = 'RPT' . str_pad($num + 1, 3, '0', STR_PAD_LEFT);
        }
        return $nextCode;
    }

    public function index()
    {
        $rapat = Rapat::with(['notulen', 'dokumentasi'])->get();
        return view('rapat.index', compact('rapat'));
    }

    public function create()
    {
        $nextCode = $this->generateRapatId();
        return view('rapat.create', compact('nextCode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'status' => 'required|in:belum,berlangsung,selesai',
            'foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $rapatId = $this->generateRapatId();

        $rapat = Rapat::create([
            'id' => $rapatId,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'status' => $request->status,
        ]);

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('dokumentasi', 'public');
                Dokumentasi::create([
                    'rapat_id' => $rapatId,
                    'foto' => $path,
                ]);
            }
        }

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil disimpan!');
    }

    public function show($id)
    {
        $rapat = Rapat::with(['notulen.penulis', 'dokumentasi'])->findOrFail($id);
        return view('rapat.show', compact('rapat'));
    }

    public function edit($id)
    {
        $rapat = Rapat::with('dokumentasi')->findOrFail($id);
        return view('rapat.edit', compact('rapat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'status' => 'required|in:belum,berlangsung,selesai',
            'foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $rapat = Rapat::findOrFail($id);
        $rapat->update($request->only(['judul', 'tanggal', 'tempat', 'status']));

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('dokumentasi', 'public');
                Dokumentasi::create([
                    'rapat_id' => $id,
                    'foto' => $path,
                    'tanggal' => $request->tanggal,
                ]);
            }
        }

        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $rapat = Rapat::findOrFail($id);

        foreach ($rapat->dokumentasi as $dok) {
            if (Storage::disk('public')->exists($dok->foto)) {
                Storage::disk('public')->delete($dok->foto);
            }
        }

        $rapat->delete();
        return redirect()->route('rapat.index')->with('success', 'Rapat berhasil dihapus!');
    }
}
