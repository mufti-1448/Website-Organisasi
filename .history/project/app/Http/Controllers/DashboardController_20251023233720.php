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
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // Get all unique months with rapat data
        $rapatMonths = Rapat::selectRaw("strftime('%Y', tanggal) as year, strftime('%m', tanggal) as month")
            ->groupBy('year', 'month')
            ->get();

        // Get all unique months with program data
        $programMonths = ProgramKerja::selectRaw("strftime('%Y', target_date) as year, strftime('%m', target_date) as month")
            ->groupBy('year', 'month')
            ->get();

        // Merge and get unique months
        $allMonths = $rapatMonths->merge($programMonths)->unique(function ($item) {
            return $item->year . '-' . $item->month;
        })->sortBy(['year', 'month']);

        $labels = [];
        $rapatData = [];
        $programData = [];

        foreach ($allMonths as $month) {
            $year = $month->year;
            $monthNum = $month->month;

            $labels[] = $months[$monthNum - 1] . ' ' . $year;

            $rapatCount = Rapat::whereYear('tanggal', $year)
                ->whereMonth('tanggal', $monthNum)
                ->count();

            $programCount = ProgramKerja::whereYear('target_date', $year)
                ->whereMonth('target_date', $monthNum)
                ->count();

            $rapatData[] = $rapatCount;
            $programData[] = $programCount;
        }

        return [
            'labels' => $labels,
            'rapat' => $rapatData,
            'program' => $programData
        ];
    }
}
