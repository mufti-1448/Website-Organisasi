<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;

Route::resource('anggota', AnggotaController::class);
// Tambahkan route resource untuk controller lainnya sesuai kebutuhan
// Contoh:
Route::resource('rapat', RapatController::class);
Route::resource('programkerja', ProgramKerjaController::class);
Route::resource('notulen', NotulenController::class);
Route::resource('evaluasi', EvaluasiController::class);
Route::resource('dokumentasi', DokumentasiController::class);
Route::resource('kontak', KontakController::class);
