<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKerja;

class BerandaController extends Controller
{
  public function index()
  {
    $sosialMedia = \App\Models\SosialMedia::all()->keyBy('platform');

    // Ambil program kerja terbaru, maksimal 6
    $programTerbaru = ProgramKerja::with('penanggungJawab')
      ->orderBy('target_date', 'desc')
      ->limit(6)
      ->get();

    return view('user.beranda.index', compact('sosialMedia', 'programTerbaru'));
  }
}
