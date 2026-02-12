<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;

// ===== HALAMAN PUBLIK =====
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// ===== AUTENTIKASI =====
Route::middleware('guest')->group(function () {
    Route::get('/masuk', [AuthController::class, 'formMasuk'])->name('masuk');
    Route::post('/masuk', [AuthController::class, 'masuk']);
    Route::get('/daftar', [AuthController::class, 'formDaftar'])->name('daftar');
    Route::post('/daftar', [AuthController::class, 'daftar']);
    Route::get('/masuk-admin', [AuthController::class, 'formMasukAdmin'])->name('masuk.admin');
    Route::post('/masuk-admin', [AuthController::class, 'masukAdmin']);

    // OAuth
    Route::get('/auth/google', [AuthController::class, 'redirectKeGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'callbackGoogle']);
    Route::get('/auth/github', [AuthController::class, 'redirectKeGithub'])->name('auth.github');
    Route::get('/auth/github/callback', [AuthController::class, 'callbackGithub']);
});

Route::post('/keluar', [AuthController::class, 'keluar'])->name('keluar')->middleware('auth');

// ===== HALAMAN YANG BUTUH LOGIN =====
Route::middleware('auth')->group(function () {
    // Dasbor
    Route::get('/dasbor', [DasborController::class, 'index'])->name('dasbor');

    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/{kelas}', [KelasController::class, 'tampilkan'])->name('kelas.tampilkan');
    Route::post('/kelas/{kelas}/gabung', [KelasController::class, 'gabung'])->name('kelas.gabung');

    // Guru: Buat Kelas & Materi
    Route::middleware('cek.peran:guru,admin')->group(function () {
        Route::get('/kelas-baru', [KelasController::class, 'buat'])->name('kelas.buat');
        Route::post('/kelas-baru', [KelasController::class, 'simpan'])->name('kelas.simpan');
        Route::get('/materi-baru', [MateriController::class, 'buat'])->name('materi.buat');
        Route::post('/materi-baru', [MateriController::class, 'simpan'])->name('materi.simpan');
    });

    // Materi
    Route::get('/materi/{materi}', [MateriController::class, 'tampilkan'])->name('materi.tampilkan');
    Route::post('/materi/{materi}/selesai', [MateriController::class, 'selesaikan'])->name('materi.selesai');

    // Kuis
    Route::get('/kuis/{kuis}', [KuisController::class, 'mulai'])->name('kuis.mulai');
    Route::post('/kuis/{kuis}', [KuisController::class, 'kirim'])->name('kuis.kirim');

    // Laporan & Diagram
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/buat', [LaporanController::class, 'buat'])->name('laporan.buat');
    Route::post('/laporan', [LaporanController::class, 'simpan'])->name('laporan.simpan');
    Route::get('/laporan/{laporan}', [LaporanController::class, 'tampilkan'])->name('laporan.tampilkan');
});

// ===== ADMIN =====
Route::middleware(['auth', 'cek.peran:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dasbor'])->name('dasbor');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');
    Route::get('/kunci', [AdminController::class, 'kunciAdmin'])->name('kunci');
    Route::post('/kunci', [AdminController::class, 'buatKunci'])->name('kunci.buat');
    Route::get('/paket', [AdminController::class, 'paket'])->name('paket');
    Route::post('/paket', [AdminController::class, 'simpanPaket'])->name('paket.simpan');
});

// Halaman Statis
Route::view('/lisensi', 'halaman.lisensi')->name('lisensi');
Route::view('/sponsor', 'halaman.sponsor')->name('sponsor');
Route::view('/kerja-sama', 'halaman.kerja-sama')->name('kerja-sama');
Route::view('/tentang', 'halaman.tentang')->name('tentang');
