<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
  public function showLoginForm()
  {
    return view('admin.auth.login');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $user = Auth::user();

      if ($user->is_admin) {
        return redirect()->route('admin.dashboard');
      }

      Auth::logout();
      return back()->withErrors(['email' => 'Anda bukan admin.']);
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin.login');
  }
}
