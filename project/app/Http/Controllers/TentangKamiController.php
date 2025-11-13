<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
  public function index()
  {
    $sosialMedia = \App\Models\SosialMedia::all()->keyBy('platform');
    return view('user.tentang_kami.index', compact('sosialMedia'));
  }
}
