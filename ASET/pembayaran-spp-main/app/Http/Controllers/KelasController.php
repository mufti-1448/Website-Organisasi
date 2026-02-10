<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index() {
        $kelas = DB::table('kelas')->get();
        // dd($kelas);
        return view('admin.kelas', compact('kelas'));
    }

    public function tambahKelas() {
        return view('admin.tambahkelas');
    }

    // Simpan data kelas baru
    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|unique:kelas,id_kelas',
            'nama_kelas' => 'required|string|max:255',
            'kompetensi_keahlian' => 'required|string|max:255',
        ]);

        DB::table('kelas')->insert([
            'id_kelas' => $request->id_kelas,
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
            'created_at' => now(),
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function editKelas($id) {
        $kelas = DB::table('kelas')->where('id', $id)->first();
        $kompetensiList = ['RPL', 'TKJ', 'TKR', 'TSM', 'DPB'];
        return view('admin.editkelas', compact('kelas', 'kompetensiList'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kompetensi_keahlian' => 'required|string|max:255',
        ]);

        $kelas = DB::table('kelas')->where('id_kelas', $id)->first();
        if (!$kelas) {
            return redirect()->route('kelas.index')->with('error', 'Data kelas tidak ditemukan.');
        }
        $update = DB::table('kelas')->where('id_kelas', $id)->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
            'updated_at' => now()
        ]);
        if ($update) {
            return redirect()->route('kelas.index')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Data gagal diperbarui');
        }
    }

    public function destroy($id) {
        $kelas = DB::table('kelas')->where('id_kelas', $id)->first();
        if (!$kelas) {
            return redirect()->route('kelas.index')->with('error', 'Data kelas tidak ditemukan.');
        }

        DB::table('kelas')->where('id_kelas', $id)->delete();
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
