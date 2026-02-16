<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pengguna\DasborController;
use App\Http\Controllers\Pengguna\KrsController;

/*
|--------------------------------------------------------------------------
| Pengguna Routes
|--------------------------------------------------------------------------
| Route yang hanya bisa diakses oleh role pengguna.
| Prefix: /pengguna  |  Name: pengguna.*  |  Middleware: auth, cek.peran:pengguna
*/

Route::get('/', [DasborController::class, 'index'])->name('dasbor');

// KRS & Akademik
Route::prefix('krs')->name('krs.')->group(function () {
    Route::get('/', [KrsController::class, 'index'])->name('index');
    Route::get('/pilih-jenjang', [KrsController::class, 'pilihJenjang'])->name('pilih-jenjang');
    Route::post('/daftar-jenjang', [KrsController::class, 'daftarJenjang'])->name('daftar-jenjang');
    Route::get('/buat', [KrsController::class, 'buat'])->name('buat');
    Route::post('/', [KrsController::class, 'simpan'])->name('simpan');
    Route::get('/{krs}', [KrsController::class, 'tampilkan'])->name('tampilkan');
});

Route::get('/khs', [KrsController::class, 'khs'])->name('khs');
