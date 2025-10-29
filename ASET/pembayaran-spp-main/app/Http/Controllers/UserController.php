<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class UserController extends Controller
{
    public function index() {
        $pembayaran = collect();
        return view('user.index', compact('pembayaran'));
    }
    public function search(Request $request) {
        $nis = $request->nis;
        $nama = $request->nama;
        $query = Pembayaran::with('siswa', 'spp')->latest();
        if ($nis || $nama) {
            $query->where(function ($q) use ($nis, $nama) {
                if ($nis) {
                    $q->where('nis', $nis);
                }

                if ($nama) {
                    $q->orWhereHas('siswa', function ($subQuery) use ($nama) {
                        $subQuery->where('nama', 'like', '%' . $nama . '%');
                    });
                }
            });
        } else {
            // Jika tidak ada input, return view tanpa data
            return view('user.index');
        }
        $pembayaran = $query->orderBy('tgl_bayar', 'desc')->get();
        return view('user.search-result', compact('pembayaran'));
    }

    public function print(Request $request) {
        $nis = $request->nis;
        $nama = $request->nama;

        $query = Pembayaran::with('siswa', 'spp')->latest();

        if ($nis || $nama) {
            $query->where(function ($q) use ($nis, $nama) {
                if ($nis) {
                    $q->where('nis', $nis);
                }

                if ($nama) {
                    $q->orWhereHas('siswa', function ($subQuery) use ($nama) {
                        $subQuery->where('nama', 'like', '%' . $nama . '%');
                    });
                }
            });
        } else {
            // Jika tidak ada input, redirect kembali atau handle sesuai kebutuhan
            return redirect()->route('user.search')->with('error', 'Masukkan NIS atau Nama untuk pencarian');
        }

        $pembayaran = $query->orderBy('tgl_bayar', 'desc')->get();

        // Kirim data ke view PDF (buat view baru 'user.pdf-result')
        $pdf = PDF::loadView('user.pdf-result', compact('pembayaran'))->setPaper('a4', 'portrait');

        // Download PDF dengan nama file
        return $pdf->download('laporan_pembayaran.pdf');
    }

}
