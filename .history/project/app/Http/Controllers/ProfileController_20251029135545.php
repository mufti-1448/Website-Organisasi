<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Menampilkan profil admin yang sedang login
   */
  public function index()
  {
    $user = Auth::user();

    if (!$user) {
      return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    return view('admin.profile.index', compact('user'));
  }
}
