<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/search', [UserController::class, 'search'])->name('user.search');
Route::get('/search/print', [UserController::class, 'print'])->name('user.search.print');

// login admin
Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/tambah', [SiswaController::class, 'tambahSiswa'])->name('siswa.tambah');
    Route::post('/siswa/tambah', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'editSiswa'])->name('siswa.edit');
    Route::put('/siswa/edit/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/hapus/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');
    Route::get('/siswa/search', [SiswaController::class, 'search'])->name('siswa.search');

    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/tambah', [KelasController::class, 'tambahKelas'])->name('kelas.tambah');
    Route::post('/kelas/tambah', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/edit/{id}', [KelasController::class, 'editKelas'])->name('kelas.edit');
    Route::put('/kelas//edit/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/hapus/{id}', [KelasController::class, 'destroy'])->name('kelas.hapus');

    Route::get('/spp', [SppController::class, 'index'])->name('spp.index');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/tambah', [PembayaranController::class, 'tambahPembayaran'])->name('pembayaran.tambah');
    Route::post('/pembayaran/tambah', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'editPembayaran'])->name('pembayaran.edit');
    Route::put('/pembayaran/edit/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/pembayaran/hapus/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.delete');
    Route::get('/pembayaran/search', [PembayaranController::class, 'search'])->name('pembayaran.search');

    // Logout
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});

