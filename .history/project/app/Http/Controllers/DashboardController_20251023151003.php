<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Rapat;
use App\Models\ProgramKerja;
use App\Models\Evaluasi;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitungan ringkasan
        $totalAnggota = Anggota::count();
        $totalRapat = Rapat::count();
        $totalProgram = ProgramKerja::count();
        $totalEvaluasi = Evaluasi::count();

        // Item terbaru: 1 bulan yang lalu dan 2 bulan yang akan datang
        $now = now();
        $oneMonthAgo = $now->copy()->subMonth();
        $twoMonthsAhead = $now->copy()->addMonths(2);

        $rapatTerbaru = Rapat::whereBetween('tanggal', [$oneMonthAgo, $twoMonthsAhead])
            ->orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();

        $programTerbaru = ProgramKerja::whereBetween('target_date', [$oneMonthAgo, $twoMonthsAhead])
            ->orderBy('target_date', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard.dashboard', compact(
            'totalAnggota',
            'totalRapat',
            'totalProgram',
            'totalEvaluasi',
            'rapatTerbaru',
            'programTerbaru'
        ));
    }
}
