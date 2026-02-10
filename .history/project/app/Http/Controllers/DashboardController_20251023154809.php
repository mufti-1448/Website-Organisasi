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

        // Data untuk chart bulanan
        $monthlyData = $this->getMonthlyData();

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
            'monthlyData',
            'rapatTerbaru',
            'programTerbaru'
        ));
    }

    public function getMonthlyData()
    {
        $currentYear = now()->year;
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $rapatData = [];
        $programData = [];

        for ($i = 0; $i < 6; $i++) {
            $month = now()->subMonths(5 - $i)->month;
            $year = now()->subMonths(5 - $i)->year;

            $rapatCount = Rapat::whereYear('tanggal', $year)
                ->whereMonth('tanggal', $month)
                ->count();

            $programCount = ProgramKerja::whereYear('target_date', $year)
                ->whereMonth('target_date', $month)
                ->count();

            $rapatData[] = $rapatCount;
            $programData[] = $programCount;
        }

        return [
            'labels' => array_slice($months, now()->month - 1, 6),
            'rapat' => $rapatData,
            'program' => $programData
        ];
    }
}
