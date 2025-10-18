<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Models\Rapat;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NotulenController extends Controller
{
    public function index()
    {
        $notulen = Notulen::with(['rapat', 'penulis'])->get();
        return view('notulen.index', compact('notulen'));
    }

    public function create()
    {
        $rapats = Rapat::all();
        $penulis = Anggota::all();

        return view('notulen.create', compact('rapats', 'penulis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'penulis_id' => 'required|exists:anggota,id',
            'rapat_id' => 'required|exists:rapat,id',
            'file' => 'nullable|mimes:pdf,docx,txt|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $rapat = Rapat::find($request->rapat_id);
            $slug = Str::slug($rapat->nama);
            $date = now()->format('Ymd');
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $slug . '_' . $date . '.' . $extension;
            $filePath = $request->file('file')->storeAs('notulen', $fileName, 'public');
        }

        Notulen::create([
            'rapat_id' => $request->rapat_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'penulis_id' => $request->penulis_id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('notulen.index')->with('success', 'Notulen berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $notulen = Notulen::with(['rapat', 'penulis'])->findOrFail($id);
        return view('notulen.show', compact('notulen'));
    }

    public function edit(string $id)
    {
        $notulen = Notulen::findOrFail($id);
        $rapat = Rapat::all();
        $anggota = Anggota::all();
        return view('notulen.edit', compact('notulen', 'rapat', 'anggota'));
    }

    public function update(Request $request, string $id)
    {
        $notulen = Notulen::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'penulis_id' => 'required|exists:anggota,id',
            'rapat_id' => 'required|exists:rapat,id',
            'file' => 'nullable|mimes:pdf,docx,txt|max:2048',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('file')) {
                if ($notulen->file_path) {
                    Storage::disk('public')->delete($notulen->file_path);
                }
                $rapat = Rapat::find($request->rapat_id);
                $slug = Str::slug($rapat->nama);
                $date = now()->format('Ymd');
                $extension = $request->file('file')->getClientOriginalExtension();
                $fileName = $slug . '_' . $date . '.' . $extension;
                $filePath = $request->file('file')->storeAs('notulen', $fileName, 'public');
                $notulen->file_path = $filePath;
            }

            $notulen->update([
                'rapat_id' => $request->rapat_id,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'penulis_id' => $request->penulis_id,
            ]);

            DB::commit();
            return redirect()->route('notulen.index')->with('success', 'Notulen berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui notulen: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $notulen = Notulen::findOrFail($id);

        if ($notulen->file_path) {
            Storage::disk('public')->delete($notulen->file_path);
        }

        $notulen->delete();
        return redirect()->route('notulen.index')->with('success', 'Notulen berhasil dihapus.');
    }
}
