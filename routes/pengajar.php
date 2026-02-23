<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pengajar\DasborController;
use App\Http\Controllers\Pengajar\KelasController;
use App\Http\Controllers\Pengajar\MateriController;
use App\Http\Controllers\Pengajar\SilabusController;
use App\Http\Controllers\Pengajar\JurnalMengajarController;
use App\Http\Controllers\Pengajar\NilaiKelasController;

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

// Silabus
Route::prefix('silabus')->name('silabus.')->group(function () {
    Route::get('/', [SilabusController::class, 'index'])->name('index');
    Route::post('/', [SilabusController::class, 'simpan'])->name('simpan');
    Route::delete('/{id}', [SilabusController::class, 'hapus'])->name('hapus');
    Route::get('/ekspor', [SilabusController::class, 'ekspor'])->name('ekspor');
    Route::post('/impor', [SilabusController::class, 'impor'])->name('impor');
});

// Jurnal Mengajar
Route::prefix('jurnal')->name('jurnal.')->group(function () {
    Route::get('/', [JurnalMengajarController::class, 'index'])->name('index');
    Route::post('/', [JurnalMengajarController::class, 'simpan'])->name('simpan');
    Route::delete('/{id}', [JurnalMengajarController::class, 'hapus'])->name('hapus');
    Route::get('/ekspor', [JurnalMengajarController::class, 'ekspor'])->name('ekspor');
    Route::post('/impor', [JurnalMengajarController::class, 'impor'])->name('impor');
});

// Nilai & Penilaian
Route::prefix('nilai')->name('nilai.')->group(function () {
    Route::get('/', [NilaiKelasController::class, 'index'])->name('index');
    Route::post('/', [NilaiKelasController::class, 'simpan'])->name('simpan');
    Route::get('/ekspor', [NilaiKelasController::class, 'ekspor'])->name('ekspor');
    Route::post('/impor', [NilaiKelasController::class, 'impor'])->name('impor');
});
