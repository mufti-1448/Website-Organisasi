<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
  public function index()
  {
    return view('user.tentang_kami.index');
  }
}
