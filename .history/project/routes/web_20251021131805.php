<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\NotulenController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MediaSosialController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\ProfilOrganisasiController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\PengaturanWebController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('dashboard', DashboardController::class);

// Public routes for frontend
Route::get('/home', [PengaturanWebController::class, 'home'])->name('home');
Route::get('/about', [PengaturanWebController::class, 'about'])->name('about');
Route::resource('anggota', AnggotaController::class)->except(['show']);
Route::resource('rapat', RapatController::class);
Route::resource('program_kerja', ProgramKerjaController::class);
Route::resource('notulen', NotulenController::class);
Route::resource('evaluasi', EvaluasiController::class);
Route::resource('dokumentasi', DokumentasiController::class);
Route::resource('kontak', KontakController::class);
Route::resource('pengaturan-web', PengaturanWebController::class);

Route::post('pengaturan-web/carousel', [PengaturanWebController::class, 'storeCarousel'])->name('pengaturan-web.storeCarousel');
Route::put('pengaturan-web/carousel/{id}', [PengaturanWebController::class, 'updateCarousel'])->name('pengaturan-web.updateCarousel');
Route::delete('pengaturan-web/carousel/{id}', [PengaturanWebController::class, 'destroyCarousel'])->name('pengaturan-web.destroyCarousel');
Route::put('pengaturan-web/profil', [PengaturanWebController::class, 'updateProfil'])->name('pengaturan-web.updateProfil');
Route::put('pengaturan-web/tentang', [PengaturanWebController::class, 'updateTentang'])->name('pengaturan-web.updateTentang');

Route::get('kontak/{id}/reply', [KontakController::class, 'reply'])->name('kontak.reply');
Route::post('kontak/{id}/send-reply', [KontakController::class, 'sendReply'])->name('kontak.sendReply');
Route::post('kontak/update-sosial', [KontakController::class, 'updateSosial'])->name('kontak.updateSosial');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
