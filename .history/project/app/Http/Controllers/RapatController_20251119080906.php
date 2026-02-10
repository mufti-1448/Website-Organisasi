<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use App\Models\Notulen;

use Illuminate\Support\Facades\DB;

class RapatController extends Controller
{
    /**
     * Tampilkan semua rapat
     */
    public function index()
    {
        $query = Rapat::with('notulen');

        // Handle search
        if (request()->has('search') && !empty(request('search'))) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('tempat', 'like', '%' . $search . '%')
                    ->orWhereHas('notulen', function ($q) use ($search) {
                        $q->where('judul', 'like', '%' . $search . '%');
                    });
            });
        }
        $rapat = $query->paginate(6)->appends(request()->query());
        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.rapat.index', compact('rapat'));
        }
        return view('user.rapat.index', compact('rapat'));
    }


    /**
     * Form tambah rapat
     */
    public function create()
    {
        $lastRapat = Rapat::orderBy('id', 'desc')->first();
        $nextCode = $lastRapat ? 'RPT' . str_pad((int) substr($lastRapat->id, 3) + 1, 3, '0', STR_PAD_LEFT) : 'RPT001';

        // Hanya tampilkan notulen yang belum terhubung dengan rapat
        $notulenList = Notulen::whereNull('rapat_id')->get();


        return view('admin.rapat.create', compact('nextCode', 'notulenList'));
    }


    /**
     * Simpan rapat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable|date_format:H:i',
            'tempat' => 'required|string|max:255',
            'status' => 'required|in:belum,berlangsung,selesai',
            'notulen_id' => 'nullable|exists:notulen,id',
        ]);

        // Validasi bahwa notulen belum digunakan oleh rapat lain
        if ($request->notulen_id) {
            $existingRapat = Notulen::where('id', $request->notulen_id)->whereNotNull('rapat_id')->first();
            if ($existingRapat) {
                return redirect()->back()->withErrors(['notulen_id' => 'Notulen ini sudah digunakan oleh rapat lain.'])->withInput();
            }
        }



        $lastRapat = DB::table('rapat')->orderByDesc('id')->first();
        $nextCode = $lastRapat ? 'RPT' . str_pad((int) substr($lastRapat->id, 3) + 1, 3, '0', STR_PAD_LEFT) : 'RPT001';

        $rapat = Rapat::create([
            'id' => $nextCode,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'status' => $request->status,
        ]);

        // Hubungkan Notulen jika dipilih
        if ($request->notulen_id) {
            $notulen = Notulen::find($request->notulen_id);
            if ($notulen) {
                $notulen->rapat_id = $rapat->id;
                $notulen->save();
            }
        }



        return redirect()->route('admin.rapat.index')->with('success', 'Rapat berhasil dibuat.');
    }

    /**
     * Tampilkan detail rapat
     */
    public function show(string $id)
    {
        $rapat = Rapat::with(['notulen.penulis'])->findOrFail($id);
        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.rapat.show', compact('rapat'));
        }
        return view('user.rapat.show', compact('rapat'));
    }

    /**
     * Form edit rapat
     */
    public function edit($id)
    {
        $rapat = Rapat::with(['notulen'])->findOrFail($id);
        // Tampilkan notulen yang belum terhubung dengan rapat lain atau yang sudah terhubung dengan rapat ini
        $notulenList = Notulen::whereNull('rapat_id')->orWhere('rapat_id', $id)->get();

        return view('admin.rapat.edit', compact('rapat', 'notulenList'));
    }

    /**
     * Update rapat
     */
    public function update(Request $request, $id)
    {
        $rapat = Rapat::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable|date_format:H:i',
            'tempat' => 'required|string|max:255',
            'status' => 'required|in:belum,berlangsung,selesai',
            'notulen_id' => 'nullable|exists:notulen,id',
        ]);

        // Validasi bahwa notulen belum digunakan oleh rapat lain (kecuali rapat ini sendiri)
        if ($request->notulen_id) {
            $existingRapat = Notulen::where('id', $request->notulen_id)
                ->whereNotNull('rapat_id')
                ->where('rapat_id', '!=', $rapat->id)
                ->first();
            if ($existingRapat) {
                return redirect()->back()->withErrors(['notulen_id' => 'Notulen ini sudah digunakan oleh rapat lain.'])->withInput();
            }
        }



        $rapat->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'status' => $request->status,
        ]);

        // Update relasi Notulen
        // Lepaskan notulen lama dari rapat ini
        Notulen::where('rapat_id', $rapat->id)->update(['rapat_id' => null]);

        // Hubungkan notulen baru jika dipilih
        if ($request->notulen_id) {
            $notulen = Notulen::find($request->notulen_id);
            if ($notulen) {
                $notulen->rapat_id = $rapat->id;
                $notulen->save();
            }
        }



        return redirect()->route('admin.rapat.index')->with('success', 'Rapat berhasil diperbarui.');
    }

    /**
     * Hapus rapat
     */
    public function destroy(string $id)
    {
        $rapat = Rapat::findOrFail($id);

        // Lepaskan relasi notulen (file notulen TIDAK dihapus sesuai spesifikasi)
        if ($rapat->notulen) {
            $rapat->notulen->update(['rapat_id' => null]);
        }



        $rapat->delete();

        return redirect()->route('admin.rapat.index')->with('success', 'Rapat berhasil dihapus.');
    }
}
