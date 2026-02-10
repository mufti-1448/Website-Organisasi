<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\NotulenController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminAuthController;

// ✅ Rute untuk user biasa (public)
Route::get('/', function () {
    return view('user.beranda.index');
})->name('home');

Route::get('/tentang-kami', fn() => view('user.tentang_kami.index'))->name('tentang_kami');

Route::resource('anggota', AnggotaController::class)->except(['show']);
Route::resource('rapat', RapatController::class);
Route::resource('program_kerja', ProgramKerjaController::class);
Route::resource('notulen', NotulenController::class);
Route::resource('evaluasi', EvaluasiController::class);
Route::resource('dokumentasi', DokumentasiController::class);
Route::resource('kontak', KontakController::class);

Route::get('kontak/{id}/reply', [KontakController::class, 'reply'])->name('kontak.reply');
Route::post('kontak/{id}/send-reply', [KontakController::class, 'sendReply'])->name('kontak.sendReply');
Route::post('kontak/update-sosial', [KontakController::class, 'updateSosial'])->name('kontak.updateSosial');

// ✅ Admin routes
Route::prefix('admin')->group(function () {

    // 🔹 Form login admin
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

    // 🔹 Area admin (hanya untuk user dengan is_admin = true)
    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('anggota', AnggotaController::class)->except(['show']);
        Route::resource('rapat', RapatController::class);
        Route::resource('program_kerja', ProgramKerjaController::class);
        Route::resource('notulen', NotulenController::class);
        Route::resource('evaluasi', EvaluasiController::class);
        Route::resource('dokumentasi', DokumentasiController::class);
        Route::resource('kontak', KontakController::class);

        // Logout admin
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});
