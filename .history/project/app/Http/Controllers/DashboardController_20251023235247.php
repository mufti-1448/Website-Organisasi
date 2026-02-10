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
        $twoMonthsAhead = $now->copy()->addMonths(1);

        $rapatTerbaru = Rapat::whereBetween('tanggal', [$oneMonthAgo, $twoMonthsAhead])
            ->orderBy('tanggal', 'desc')
            ->limit(2)
            ->get();

        $programTerbaru = ProgramKerja::whereBetween('target_date', [$oneMonthAgo, $twoMonthsAhead])
            ->orderBy('target_date', 'desc')
            ->limit(2)
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
        $currentYear = now()->year; // Dynamic to current year
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $rapatData = [];
        $programData = [];
        $labels = [];

        for ($month = 1; $month <= 12; $month++) {
            $rapatCount = Rapat::whereYear('tanggal', $currentYear)
                ->whereMonth('tanggal', $month)
                ->count();

            $programCount = ProgramKerja::whereYear('target_date', $currentYear)
                ->whereMonth('target_date', $month)
                ->count();

            $rapatData[] = $rapatCount;
            $programData[] = $programCount;
            $labels[] = $months[$month - 1];
        }

        return [
            'labels' => $labels,
            'rapat' => $rapatData,
            'program' => $programData
        ];
    }
}
