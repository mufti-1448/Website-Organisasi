<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use App\Models\Notulen;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RapatController extends Controller
{
    /**
     * Simpan data rapat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'status' => 'required|in:belum,berlangsung,selesai',
            'jumlah_peserta' => 'nullable|integer|min:0',
            'file_notulen' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'file_dokumentasi.*' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Generate ID custom
        $lastRapat = Rapat::orderBy('id', 'desc')->first();
        $nextCode = 'RPT' . str_pad(($lastRapat ? (int) substr($lastRapat->id, 3) + 1 : 1), 3, '0', STR_PAD_LEFT);

        DB::beginTransaction();
        try {
            // Simpan data rapat
            $rapat = Rapat::create([
                'id' => $nextCode,
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'tempat' => $request->tempat,
                'status' => $request->status,
                'jumlah_peserta' => $request->jumlah_peserta,
            ]);

            // Simpan notulen (jika di-upload)
            if ($request->hasFile('file_notulen')) {
                $filePath = $request->file('file_notulen')->store('notulen', 'public');

                Notulen::create([
                    'rapat_id' => $rapat->id,
                    'file_path' => $filePath,
                ]);
            }

            // Simpan dokumentasi (jika di-upload)
            if ($request->hasFile('file_dokumentasi')) {
                foreach ($request->file('file_dokumentasi') as $file) {
                    $path = $file->store('dokumentasi', 'public');
                    Dokumentasi::create([
                        'rapat_id' => $rapat->id,
                        'file_path' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('rapat.index')->with('success', 'Rapat berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambah rapat: ' . $e->getMessage());
        }
    }

    /**
     * Update data rapat
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat' => 'required|string|max:255',
            'status' => 'required|in:belum,berlangsung,selesai',
            'jumlah_peserta' => 'nullable|integer|min:0',
            'file_notulen' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'file_dokumentasi.*' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        DB::beginTransaction();
        try {
            $rapat = Rapat::findOrFail($id);
            $rapat->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'tempat' => $request->tempat,
                'status' => $request->status,
                'jumlah_peserta' => $request->jumlah_peserta,
            ]);

            // Jika status selesai dan ada upload notulen baru
            if ($rapat->status === 'selesai' && $request->hasFile('file_notulen')) {
                $filePath = $request->file('file_notulen')->store('notulen', 'public');

                // Hapus notulen lama jika ada
                $old = Notulen::where('rapat_id', $rapat->id)->first();
                if ($old && Storage::disk('public')->exists($old->file_path)) {
                    Storage::disk('public')->delete($old->file_path);
                    $old->delete();
                }

                Notulen::create([
                    'rapat_id' => $rapat->id,
                    'file_path' => $filePath,
                ]);
            }

            // Jika status selesai dan ada upload dokumentasi baru
            if ($rapat->status === 'selesai' && $request->hasFile('file_dokumentasi')) {
                foreach ($request->file('file_dokumentasi') as $file) {
                    $path = $file->store('dokumentasi', 'public');
                    Dokumentasi::create([
                        'rapat_id' => $rapat->id,
                        'file_path' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('rapat.index')->with('success', 'Data rapat berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }
}
