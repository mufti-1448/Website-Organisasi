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
Route::name('user.')->group(function () {
    Route::get('/', fn() => view('user.beranda.index'))->name('beranda');
    Route::get('/tentang-kami', fn() => view('user.tentang_kami.index'))->name('tentang_kami');
});





// ✅ Admin routes
Route::prefix('admin')->group(function () {

    // 🔹 Form login admin
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

    // 🔹 Area admin (hanya untuk user dengan is_admin = true)
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

        Route::resource('anggota', AnggotaController::class)->except(['show'])->names([
            'index' => 'admin.anggota.index',
            'create' => 'admin.anggota.create',
            'store' => 'admin.anggota.store',
            'edit' => 'admin.anggota.edit',
            'update' => 'admin.anggota.update',
            'destroy' => 'admin.anggota.destroy',
        ]);
        Route::resource('rapat', RapatController::class)->names([
            'index' => 'admin.rapat.index',
            'create' => 'admin.rapat.create',
            'store' => 'admin.rapat.store',
            'show' => 'admin.rapat.show',
            'edit' => 'admin.rapat.edit',
            'update' => 'admin.rapat.update',
            'destroy' => 'admin.rapat.destroy',
        ]);
        Route::resource('program_kerja', ProgramKerjaController::class)->names([
            'index' => 'admin.program_kerja.index',
            'create' => 'admin.program_kerja.create',
            'store' => 'admin.program_kerja.store',
            'show' => 'admin.program_kerja.show',
            'edit' => 'admin.program_kerja.edit',
            'update' => 'admin.program_kerja.update',
            'destroy' => 'admin.program_kerja.destroy',
        ]);
        Route::resource('notulen', NotulenController::class)->names([
            'index' => 'admin.notulen.index',
            'create' => 'admin.notulen.create',
            'store' => 'admin.notulen.store',
            'show' => 'admin.notulen.show',
            'edit' => 'admin.notulen.edit',
            'update' => 'admin.notulen.update',
            'destroy' => 'admin.notulen.destroy',
        ]);
        Route::resource('evaluasi', EvaluasiController::class)->names([
            'index' => 'admin.evaluasi.index',
            'create' => 'admin.evaluasi.create',
            'store' => 'admin.evaluasi.store',
            'show' => 'admin.evaluasi.show',
            'edit' => 'admin.evaluasi.edit',
            'update' => 'admin.evaluasi.update',
            'destroy' => 'admin.evaluasi.destroy',
        ]);
        Route::resource('dokumentasi', DokumentasiController::class)->names([
            'index' => 'admin.dokumentasi.index',
            'create' => 'admin.dokumentasi.create',
            'store' => 'admin.dokumentasi.store',
            'show' => 'admin.dokumentasi.show',
            'edit' => 'admin.dokumentasi.edit',
            'update' => 'admin.dokumentasi.update',
            'destroy' => 'admin.dokumentasi.destroy',
        ]);
        Route::resource('kontak', KontakController::class)->names([
            'index' => 'admin.kontak.index',
            'create' => 'admin.kontak.create',
            'store' => 'admin.kontak.store',
            'show' => 'admin.kontak.show',
            'edit' => 'admin.kontak.edit',
            'update' => 'admin.kontak.update',
            'destroy' => 'admin.kontak.destroy',
        ]);

        Route::get('kontak/{id}/reply', [KontakController::class, 'reply'])->name('admin.kontak.reply');
        Route::post('kontak/{id}/send-reply', [KontakController::class, 'sendReply'])->name('admin.kontak.sendReply');
        Route::post('kontak/update-sosial', [KontakController::class, 'updateSosial'])->name('admin.kontak.updateSosial');

        // Logout admin
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});
