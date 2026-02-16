<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pengajar\DasborController;
use App\Http\Controllers\Pengajar\KelasController;
use App\Http\Controllers\Pengajar\MateriController;

/*
|--------------------------------------------------------------------------
| Pengajar Routes
|--------------------------------------------------------------------------
| Route yang hanya bisa diakses oleh role pengajar.
| Prefix: /pengajar  |  Name: pengajar.*  |  Middleware: auth, cek.peran:pengajar
*/

Route::get('/', [DasborController::class, 'index'])->name('dasbor');

// Kelas
Route::prefix('kelas')->name('kelas.')->group(function () {
    Route::get('/', [KelasController::class, 'index'])->name('index');
    Route::get('/buat', [KelasController::class, 'buat'])->name('buat');
    Route::post('/', [KelasController::class, 'simpan'])->name('simpan');
});

// Materi
Route::prefix('materi')->name('materi.')->group(function () {
    Route::get('/', [MateriController::class, 'index'])->name('index');
    Route::get('/buat', [MateriController::class, 'buat'])->name('buat');
    Route::post('/', [MateriController::class, 'simpan'])->name('simpan');
});
