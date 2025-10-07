<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;

Route::resource('anggota', AnggotaController::class);
// Tambahkan route resource untuk controller lainnya sesuai kebutuhan
