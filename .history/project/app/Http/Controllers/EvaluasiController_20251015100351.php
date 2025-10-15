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
        $evaluasi = Evaluasi::with('program')->latest()->get();
        return view('evaluasi.index', compact('evaluasi'));
    }

    public function create()
    {
        $programs = ProgramKerja::all(); // untuk dropdown
        return view('evaluasi.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:program_kerja,id',
            'catatan' => 'nullable|string',
            'status' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        Evaluasi::create($request->all());

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
        $request->validate([
            'program_id' => 'required|exists:program_kerja,id',
            'catatan' => 'nullable|string',
            'status' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $evaluasi->update($request->all());

        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil diperbarui.');
    }

    public function destroy(Evaluasi $evaluasi)
    {
        $evaluasi->delete();
        return redirect()->route('evaluasi.index')->with('success', 'Evaluasi berhasil dihapus.');
    }
}
