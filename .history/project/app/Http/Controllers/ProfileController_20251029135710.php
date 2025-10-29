<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
  /**
   * Menampilkan profil admin yang sedang login
   */
  public function index()
  {
    // Data admin sementara (karena belum ada sistem login)
    $user = [
      'name' => 'Administrator',
      'email' => 'admin@sistemorganisasi.com',
      'created_at' => now()->subDays(30),
      'updated_at' => now(),
    ];

    return view('admin.profile.index', compact('user'));
  }
}
