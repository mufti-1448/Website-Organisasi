<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('dashboard', DashboardController::class);


// Public routes for frontend
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

// Profile route
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
