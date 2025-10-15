<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Models\Rapat;
use App\Models\Anggota;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NotulenController extends Controller
{
    public function index()
    {
        $notulen = Notulen::with(['rapat', 'penulis', 'programKerja'])->get();
        return view('notulen.index', compact('notulen'));
    }

    public function create()
    {
        $rapat = Rapat::all();
        $anggota = Anggota::all();
        $programKerja = ProgramKerja::all();
        return view('notulen.create', compact('rapat', 'anggota', 'programKerja'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rapat_id' => 'required|exists:rapat,id|unique:notulen,rapat_id',
            'tanggal' => 'required|date',
            'penulis_id' => 'required|exists:anggota,id',
            'program_id' => 'nullable|exists:program_kerja,id',
            'isi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $filePath = null;
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('notulen', 'public');
            }

            Notulen::create([
                'rapat_id' => $request->rapat_id,
                'tanggal' => $request->tanggal,
                'penulis_id' => $request->penulis_id,
                'program_id' => $request->program_id,
                'isi' => $request->isi,
                'file_path' => $filePath,
            ]);

            DB::commit();
            return redirect()->route('notulen.index')->with('success', 'Notulen berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambah notulen: ' . $e->getMessage());
        }
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
