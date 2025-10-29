<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  /**
   * Menampilkan profil admin yang sedang login
   */
  public function index()
  {
    $user = Auth::user();
    return view('admin.profile.index', compact('user'));
  }
}
