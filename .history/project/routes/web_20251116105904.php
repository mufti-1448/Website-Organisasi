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
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangKamiController;

// ✅ Rute untuk user biasa (public)
Route::name('user.')->group(function () {
    Route::get('/', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang_kami');

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
});





// ✅ Admin routes
Route::prefix('admin')->group(function () {

    
});
