<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\DasborController;
use App\Http\Controllers\Staff\PenggunaController;
use App\Http\Controllers\Staff\KehadiranController;

/*
|--------------------------------------------------------------------------
| Staff Routes
|--------------------------------------------------------------------------
| Route yang hanya bisa diakses oleh role staff.
| Prefix: /staff  |  Name: staff.*  |  Middleware: auth, cek.peran:staff
*/

Route::get('/', [DasborController::class, 'index'])->name('dasbor');

// Pengguna Management
Route::prefix('pengguna')->name('pengguna.')->group(function () {
    Route::get('/', [PenggunaController::class, 'index'])->name('index');
    Route::get('/{pengguna}', [PenggunaController::class, 'tampilkan'])->name('tampilkan');
});

// Kehadiran
Route::prefix('kehadiran')->name('kehadiran.')->group(function () {
    Route::get('/', [KehadiranController::class, 'index'])->name('index');
    Route::get('/rekap', [KehadiranController::class, 'rekap'])->name('rekap');
});
