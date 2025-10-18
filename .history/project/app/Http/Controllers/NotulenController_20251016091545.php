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
            'rapat_id' => 'required|exists:rapat,id|unique:notulen,rapat_id',
            'tanggal' => 'required|date',
            'isi' => 'required',
            'penulis_id' => 'required|exists:anggota,id',
            'program_id' => 'nullable|exists:program_kerja,id',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $filePath = null;
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('notulen_files', 'public');
        }

        Notulen::create([
            'rapat_id' => $request->rapat_id,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'penulis_id' => $request->penulis_id,
            'program_id' => $request->program_id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('notulen.index')->with('success', 'Notulen berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $notulen = Notulen::with(['rapat', 'penulis', 'programKerja'])->findOrFail($id);
        return view('notulen.show', compact('notulen'));
    }

    public function edit(string $id)
    {
        $notulen = Notulen::findOrFail($id);
        $rapat = Rapat::all();
        $anggota = Anggota::all();
        $programKerja = ProgramKerja::all();
        return view('notulen.edit', compact('notulen', 'rapat', 'anggota', 'programKerja'));
    }

    public function update(Request $request, string $id)
    {
        $notulen = Notulen::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'penulis_id' => 'required|exists:anggota,id',
            'program_id' => 'nullable|exists:program_kerja,id',
            'isi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('file')) {
                if ($notulen->file_path) {
                    Storage::disk('public')->delete($notulen->file_path);
                }
                $filePath = $request->file('file')->store('notulen', 'public');
                $notulen->file_path = $filePath;
            }

            $notulen->update([
                'tanggal' => $request->tanggal,
                'penulis_id' => $request->penulis_id,
                'program_id' => $request->program_id,
                'isi' => $request->isi,
            ]);

            $notulen->save();

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
