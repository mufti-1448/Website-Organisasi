<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::with('kelas', 'spp')->get();
        return view('admin.siswa', compact('siswa'));
    }

    public function tambahSiswa() {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.tambahsiswa', compact('kelas', 'spp'));
    }

    public function store(Request $request) {
        $request->validate([
            'nisn' => 'required|unique:siswa,nisn',
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required',
            'id_kelas' => 'required|exists:kelas,id',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required|exists:spp,id',
        ]);
        Siswa::create([
            'nisn'  => $request->nisn,
            'nis'   => $request->nis,
            'nama'  => $request->nama,
            'id_kelas'  => $request->id_kelas,
            'alamat'  => $request->alamat,
            'no_telp'  => $request->no_telp,
            'id_spp'  => $request->id_spp,
            'created_at' => now()
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function editSiswa($id) {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.editsiswa', compact('siswa', 'kelas', 'spp'));
    }

    public function update(Request $request, $id) {
        $siswa = Siswa::where('nisn', $id)->firstOrFail();
        $siswa->update([
            'nis'   => $request->nis,
            'nama'  => $request->nama,
            'id_kelas'  => $request->id_kelas,
            'alamat'  => $request->alamat,
            'no_telp'  => $request->no_telp,
            'id_spp'  => $request->id_spp,
            'updated_at' => now()
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate.');
    }

    public function destroy($id) {
        $siswa = Siswa::where('nisn', $id)->firstOrFail();
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }

    // search data siswa
    public function search(Request $request)
    {
        $query = $request->input('q');

        $siswa = Siswa::with('spp')
                    ->where('nis', 'like', "%$query%")
                    ->orWhere('nama', 'like', "%$query%")
                    ->get();

        return response()->json($siswa);
    }
}
