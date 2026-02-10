<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;


class TentangKamiController extends Controller
{
  public function index() {
    $anggota = Anggota::all();
    return view('user.tentang_kami.index', compact('anggota'));
  }
}
