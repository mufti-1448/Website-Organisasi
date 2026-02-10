<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query();
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                    ->orWhere('kelas', 'LIKE', "%{$search}%")
                    ->orWhere('jabatan', 'LIKE', "%{$search}%")
                    ->orWhere('kontak', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        $anggota = $query->paginate(6);
        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.anggota.index', compact('anggota'));
        }
        return view('user.anggota.index', compact('anggota'));
    }

    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('user.anggota.show', compact('anggota'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastAnggota = DB::table('anggota')->orderBy('id', 'desc')->first();
        $nextCode = "AGT001";
        if ($lastAnggota && $lastAnggota->id) {
            $lastCode = $lastAnggota->id;
            $number = (int) substr($lastCode, 3);
            $nextNumber = $number + 1;
            $nextCode = 'AGT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        }

        return view('admin.anggota.create', compact('nextCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'foto' => 'nullable|image|max:2048', // max 2MB
        ]);

        $file = $request->file('foto');
        $namaFile = null;

        if ($file) {
            // Membuat nama file dengan format: timestamp_id_nama.jpg
            $namaOrang = str_replace(' ', '_', strtolower($request->nama));
            $ekstensi  = $file->getClientOriginalExtension();
            $idLower = strtolower($request->id); // AGT001 menjadi agt001
            $namaFile = time() . '_' . $idLower . '_' . $namaOrang . '.' . $ekstensi;
            $file->move(public_path('storage/uploads/anggota'), $namaFile);
        } else {
            $namaFile = null;
        }

        DB::table('anggota')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'kelas' => $request->kelas,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'foto' => $namaFile,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = DB::table('anggota')->where('id', $id)->first();
        if (!$anggota) {
            return redirect()->route('anggota.index')->with('error', 'Anggota tidak ditemukan.');
        }
        return view('admin.anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'foto' => 'nullable|image|max:2048', // max 2MB
        ]);

        $anggota = DB::table('anggota')->where('id', $id)->first();

        $file = $request->file('foto');
        $namaFile = $anggota->foto; // Default: tetap pakai foto lama

        if ($file) {
            // Hapus foto lama jika ada
            if ($anggota->foto && file_exists(public_path('storage/uploads/anggota/' . $anggota->foto))) {
                unlink(public_path('storage/uploads/anggota/' . $anggota->foto));
            }
            // Membuat nama file baru dengan format: timestamp_id_nama.jpg
            $namaOrang = str_replace(' ', '_', strtolower($request->nama));
            $ekstensi  = $file->getClientOriginalExtension();
            $idLower = strtolower($id); // AGT001 menjadi agt001
            $namaFile = time() . '_' . $idLower . '_' . $namaOrang . '.' . $ekstensi;
            $file->move(public_path('storage/uploads/anggota'), $namaFile);
        } else {
            $namaFile = $anggota->foto; // tetap pakai foto lama jika tidak upload baru
        }

        DB::table('anggota')->where('id', $id)->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'kelas' => $request->kelas,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'foto' => $namaFile,
            'updated_at' => now()
        ]);


        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = DB::table('anggota')->where('id', $id)->first();
        if ($anggota && $anggota->foto) {
            $filePath = public_path('storage/uploads/anggota/' . $anggota->foto);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        DB::table('anggota')->where('id', $id)->delete();
        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
