<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvaluasiController extends Controller
{
    public function index()
    {
        $evaluasi = Evaluasi::with('programKerja')->latest()->get();
        return view('evaluasi.index', compact('evaluasi'));
    }

    public function create()
    {
        $programs = ProgramKerja::all();
        return view('evaluasi.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'penulis' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $program = ProgramKerja::find($request->program_id);
            $fileName = $program->nama . '_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs('evaluasi', $fileName, 'public');
        }

        Evaluasi::create([
            'program_id' => $request->program_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
            'file' => $filePath,
        ]);

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil ditambahkan.');
    }

    public function edit(Evaluasi $evaluasi)
    {
        $programs = ProgramKerja::all();
        return view('evaluasi.edit', compact('evaluasi', 'programs'));
    }

    public function show(Evaluasi $evaluasi)
    {
        return view('evaluasi.show', compact('evaluasi'));
    }

    public function update(Request $request, Evaluasi $evaluasi)
    {
        $validated = $request->validate([
            'program_id' => 'required',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'penulis' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($evaluasi->file) {
                Storage::disk('public')->delete($evaluasi->file);
            }

            // Upload file baru dengan nama sesuai program kerja
            $program = ProgramKerja::find($request->program_id);
            $fileName = $program->nama . '_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs('evaluasi', $fileName, 'public');
            $evaluasi->file = $filePath;
        }

        $evaluasi->update([
            'program_id' => $request->program_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
        ]);

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil diperbarui.');
    }

    public function destroy(Evaluasi $evaluasi)
    {
        // Hapus file dari storage jika ada
        if ($evaluasi->file) {
            Storage::disk('public')->delete($evaluasi->file);
        }

        $evaluasi->delete();

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil dihapus.');
    }
}
