<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKerja;

class BerandaController extends Controller
{
  public function index()
  {
    $sosialMedia = \App\Models\SosialMedia::all()->keyBy('platform');
    $programTerbaru = ProgramKerja::with('penanggungJawab')->latest()->take(4)->get();
    return view('user.beranda.index', compact('sosialMedia', 'programTerbaru'));
  }
}
