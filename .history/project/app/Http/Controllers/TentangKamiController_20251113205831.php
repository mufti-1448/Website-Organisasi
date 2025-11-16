<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class TentangKamiController extends Controller
{
  public function index()
  {
    $sosialMedia = \App\Models\SosialMedia::all()->keyBy('platform');
    $totalAnggota = Anggota::count();
    return view('user.tentang_kami.index', compact('sosialMedia', 'totalAnggota'));
  }
}
