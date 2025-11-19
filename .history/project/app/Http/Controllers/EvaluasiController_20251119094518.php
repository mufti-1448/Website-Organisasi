<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvaluasiController extends Controller
{
    public function index(request $request)
    {
        // Build base query with eager loads (evaluasi uses programKerja and penulisRelation)
        $query = Evaluasi::with(['programKerja', 'penulisRelation']);

        // Apply search filters when provided
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'LIKE', "%{$search}%")
                    ->orWhere('isi', 'LIKE', "%{$search}%")
                    ->orWhere('tanggal_evaluasi', 'LIKE', "%{$search}%")
                    ->orWhereHas('penulisRelation', function ($q2) use ($search) {
                        $q2->where('nama', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('programKerja', function ($q2) use ($search) {
                        $q2->where('nama', 'LIKE', "%{$search}%");
                    });
            });
        }

        // Finalize query with ordering and pagination
        $evaluasi = $query->orderBy('tanggal_evaluasi', 'desc')->paginate(6)->withQueryString();

        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.evaluasi.index', compact('evaluasi'));
        }
        return view('user.evaluasi.index', compact('evaluasi'));
    }

    public function create()
    {
        $programs = ProgramKerja::whereDoesntHave('evaluasi')->get();
        $anggota = \App\Models\Anggota::all();

        // Generate next ID
        $lastEvaluasi = Evaluasi::orderBy('id', 'desc')->first();
        if ($lastEvaluasi) {
            $lastId = intval(substr($lastEvaluasi->id, 4));
            $nextId = 'EVAL' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextId = 'EVAL001';
        }

        return view('admin.evaluasi.create', compact('programs', 'anggota', 'nextId'));
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

        // Generate ID like notulen: EVAL001, EVAL002, etc.
        $lastEvaluasi = Evaluasi::orderBy('id', 'desc')->first();
        if ($lastEvaluasi) {
            $lastId = intval(substr($lastEvaluasi->id, 4));
            $newId = 'EVAL' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = 'EVAL001';
        }

        $filePath = null;
        if ($request->hasFile('file')) {
            $judulSlug = str_replace(' ', '_', strtolower($request->judul));
            $ekstensi = $request->file('file')->getClientOriginalExtension();
            $fileName = time() . '_' . $newId . '_' . $judulSlug . '.' . $ekstensi;
            $filePath = $request->file('file')->storeAs('evaluasi', $fileName, 'public');
        }

        Evaluasi::create([
            'id' => $newId,
            'program_id' => $request->program_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
            'file' => $filePath,
        ]);

        return redirect()->route('admin.evaluasi.index')->with('success', 'Evaluasi berhasil ditambahkan.');
    }

    public function edit(Evaluasi $evaluasi)
    {
        $programs = ProgramKerja::all();
        $anggota = \App\Models\Anggota::all();
        return view('admin.evaluasi.edit', compact('evaluasi', 'programs', 'anggota'));
    }

    public function show(Evaluasi $evaluasi)
    {
        $evaluasi->load('penulisRelation');
        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.evaluasi.show', compact('evaluasi'));
        }
        return view('user.evaluasi.show', compact('evaluasi'));
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

            // Upload file baru dengan format seperti anggota: timestamp_id_judul.jpg
            $judulSlug = str_replace(' ', '_', strtolower($request->judul));
            $ekstensi = $request->file('file')->getClientOriginalExtension();
            $fileName = time() . '_' . $evaluasi->id . '_' . $judulSlug . '.' . $ekstensi;
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

        return redirect()->route('admin.evaluasi.index')->with('success', 'Evaluasi berhasil diperbarui.');
    }

    public function destroy(Evaluasi $evaluasi)
    {
        // Hapus file dari storage jika ada
        if ($evaluasi->file) {
            Storage::disk('public')->delete($evaluasi->file);
        }

        $evaluasi->delete();

        return redirect()->route('admin.evaluasi.index')->with('success', 'Evaluasi berhasil dihapus.');
    }
}
