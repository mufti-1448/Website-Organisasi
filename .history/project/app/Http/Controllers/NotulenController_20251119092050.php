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
    public function index(Request $request)
    {
        // Build base query with eager loads
        $query = Notulen::with(['rapat', 'penulis']);

        // Apply search filters when provided
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'LIKE', "%{$search}%")
                    ->orWhere('isi', 'LIKE', "%{$search}%")
                    ->orWhere('tanggal', 'LIKE', "%{$search}%")
                    ->orWhereHas('penulis', function ($q2) use ($search) {
                        $q2->where('nama', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('rapat', function ($q2) use ($search) {
                        $q2->where('judul', 'LIKE', "%{$search}%");
                    });
            });
        }

        // Finalize query with ordering and pagination
        $notulen = $query->orderBy('tanggal', 'desc')->paginate(6)->withQueryString();
        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.notulen.index', compact('notulen'));
        }
        return view('user.notulen.index', compact('notulen'));
    }

    public function create()
    {
        $rapats = Rapat::whereDoesntHave('notulen')->get();
        $penulis = Anggota::all();
        $nextId = 'NTL' . str_pad(Notulen::count() + 1, 3, '0', STR_PAD_LEFT);

        return view('admin.notulen.create', compact('rapats', 'penulis', 'nextId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'nullable|date_format:H:i',
            'penulis_id' => 'required|exists:anggota,id',
            'rapat_id' => 'required|exists:rapat,id',
            'file' => 'nullable|mimes:pdf,docx,txt|max:2048',
        ]);

        // Cek apakah rapat sudah memiliki notulen
        $existingNotulen = Notulen::where('rapat_id', $request->rapat_id)->first();
        if ($existingNotulen) {
            return back()->with('error', 'Rapat ini sudah memiliki notulen.')->withInput();
        }

        // Generate ID otomatis seperti anggota
        $id = 'NTL' . str_pad(Notulen::count() + 1, 3, '0', STR_PAD_LEFT);

        $filePath = null;
        if ($request->hasFile('file')) {
            $judul = Str::slug($request->judul);
            $timestamp = now()->format('YmdHis');
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $timestamp . '_' . $id . '_' . $judul . '.' . $extension;
            $filePath = $request->file('file')->storeAs('notulen', $fileName, 'public');
        }

        Notulen::create([
            'id' => $id,
            'rapat_id' => $request->rapat_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'penulis_id' => $request->penulis_id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.notulen.index')->with('success', 'Notulen berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $notulen = Notulen::with(['rapat', 'penulis'])->findOrFail($id);
        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.notulen.show', compact('notulen'));
        }
        return view('user.notulen.show', compact('notulen'));
    }

    public function edit(string $id)
    {
        $notulen = Notulen::findOrFail($id);
        $rapat = Rapat::whereNull('notulen_id')->orWhere('id', $notulen->rapat_id)->get();
        $anggota = Anggota::all();
        return view('admin.notulen.edit', compact('notulen', 'rapat', 'anggota'));
    }

    public function update(Request $request, string $id)
    {
        $notulen = Notulen::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'nullable|date_format:H:i',
            'penulis_id' => 'required|exists:anggota,id',
            'rapat_id' => 'required|exists:rapat,id',
            'file' => 'nullable|mimes:pdf,docx,txt|max:2048',
        ]);

        // Cek apakah rapat sudah memiliki notulen lain
        $existingNotulen = Notulen::where('rapat_id', $request->rapat_id)->where('id', '!=', $id)->first();
        if ($existingNotulen) {
            return back()->with('error', 'Rapat ini sudah memiliki notulen.');
        }

        DB::beginTransaction();
        try {
            if ($request->hasFile('file')) {
                if ($notulen->file_path) {
                    Storage::disk('public')->delete($notulen->file_path);
                }
                $judul = Str::slug($request->judul);
                $timestamp = now()->format('YmdHis');
                $extension = $request->file('file')->getClientOriginalExtension();
                $fileName = $timestamp . '_' . $notulen->id . '_' . $judul . '.' . $extension;
                $filePath = $request->file('file')->storeAs('notulen', $fileName, 'public');
                $notulen->file_path = $filePath;
            }

            $notulen->update([
                'rapat_id' => $request->rapat_id,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'penulis_id' => $request->penulis_id,
            ]);

            DB::commit();
            return redirect()->route('admin.notulen.index')->with('success', 'Notulen berhasil diperbarui.');
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
        return redirect()->route('admin.notulen.index')->with('success', 'Notulen berhasil dihapus.');
    }
}
