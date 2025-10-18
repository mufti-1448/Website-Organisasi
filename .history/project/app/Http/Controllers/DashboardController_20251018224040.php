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
        $totalProgramAktif = ProgramKerja::where('status', '')->count();
        $totalEvaluasi = Evaluasi::count();

        // Item terbaru
        $rapatTerbaru = Rapat::orderBy('tanggal', 'desc')->limit(5)->get();
        $programTerbaru = ProgramKerja::orderBy('created_at', 'desc')->limit(5)->get();

        return view('dashboard.dashboard', compact(
            'totalAnggota',
            'totalRapat',
            'totalProgramAktif',
            'totalEvaluasi',
            'rapatTerbaru',
            'programTerbaru'
        ));
    }
}
