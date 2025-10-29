<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function index() {
        $siswa = Siswa::count('nisn');
        $kelas = Kelas::count();
        $spp = Spp::count();
        $pembayaran = Pembayaran::with('siswa', 'spp')->latest()->take(1)->get();
        $totalpembayaran = Pembayaran::whereDate('tgl_bayar', Carbon::today())->sum('jumlah_bayar');
        $ket = Pembayaran::where('keterangan', 'Menunggak')->count();

        // tampilkan data menunggak
        $menunggakdata = DB::table('pembayaran')
            ->join('siswa', 'pembayaran.nis', '=', 'siswa.nis')
            ->where('pembayaran.keterangan', 'Menunggak')
            ->select('siswa.nisn', 'siswa.nama', 'pembayaran.bulan_dibayar', 'pembayaran.jumlah_bayar')
            ->orderBy('siswa.nisn', 'asc')
            ->get();

        /** Menampilkan data di grafik */
        $bulanMapping = [
            'Januari' => 1,
            'Februari' => 2,
            'Maret' => 3,
            'April' => 4,
            'Mei' => 5,
            'Juni' => 6,
            'Juli' => 7,
            'Agustus' => 8,
            'September' => 9,
            'Oktober' => 10,
            'November' => 11,
            'Desember' => 12,
        ];
        $caseStatement = "CASE bulan_dibayar ";
        foreach ($bulanMapping as $namaBulan => $nomor) {
            $caseStatement .= "WHEN '{$namaBulan}' THEN {$nomor} ";
        }
        $caseStatement .= "ELSE 13 END";

        $dataPembayaran = DB::table('pembayaran')
            ->select('bulan_dibayar', 'tahun_dibayar', 'keterangan', DB::raw('SUM(jumlah_bayar) as total'))
            ->groupBy('tahun_dibayar', 'bulan_dibayar', 'keterangan')
            ->orderBy('tahun_dibayar', 'asc')
            ->orderByRaw($caseStatement)
            ->get();

        // $labels = $dataPembayaran->map(function ($item) {
        //     return ucfirst($item->bulan_dibayar) . ' ' . $item->tahun_dibayar;
        // });
        $allLabels = collect();
        foreach ($dataPembayaran as $item) {
            $label = ucfirst($item->bulan_dibayar) . ' ' . $item->tahun_dibayar;
            $allLabels->push($label);
        }
        $labels = $allLabels->unique()->values();

        // $totals = $dataPembayaran->pluck('total');
        $lunasTotals = [];
        $menunggakTotals = [];

        foreach ($labels as $label) {
            $foundLunas = $dataPembayaran->first(function ($item) use ($label) {
                return ucfirst($item->bulan_dibayar) . ' ' . $item->tahun_dibayar === $label
                    && $item->keterangan === 'Lunas';
            });

            $foundMenunggak = $dataPembayaran->first(function ($item) use ($label) {
                return ucfirst($item->bulan_dibayar) . ' ' . $item->tahun_dibayar === $label
                    && $item->keterangan === 'Menunggak';
            });

            $lunasTotals[] = $foundLunas ? $foundLunas->total : 0;
            $menunggakTotals[] = $foundMenunggak ? $foundMenunggak->total : 0;
        }
        /** End Menampilkan data di grafik */

        return view('admin.dashboard', compact(
            'siswa', 'kelas', 'spp', 'pembayaran', 'totalpembayaran',
            'ket', 'menunggakdata', 'labels', 'lunasTotals', 'menunggakTotals'
        ));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Login Berhasil!');
        } else {
            return back()->withErrors(['email' => 'Email atau Password tidak sesuai'])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logout Berhasil!');
    }
}
