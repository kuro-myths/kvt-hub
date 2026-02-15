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
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KerjaSamaController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\AdminKurikulumController;
use App\Http\Controllers\OrganisasiController;

// ===== HALAMAN PUBLIK =====
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// ===== BERITA (Publik) =====
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita}', [BeritaController::class, 'tampilkan'])->name('berita.tampilkan');

// ===== KERJA SAMA (Publik) =====
Route::get('/kerja-sama', [KerjaSamaController::class, 'index'])->name('kerja-sama.index');
Route::get('/kerja-sama/{kerjaSama}', [KerjaSamaController::class, 'tampilkan'])->name('kerja-sama.tampilkan');

// ===== API ENDPOINTS (Publik, tanpa auth) =====
Route::prefix('api')->group(function () {
    Route::get('/berita/ticker', [BeritaController::class, 'ticker']);
    Route::get('/berita/popup', [BeritaController::class, 'popup']);
    Route::get('/pengunjung/statistik', [PengunjungController::class, 'statistikRealtime']);
    Route::get('/pengunjung/flag-counter', [PengunjungController::class, 'flagCounter']);
    Route::get('/pengunjung/grafik-mingguan', [PengunjungController::class, 'grafikMingguan']);
    Route::get('/pengunjung/grafik-per-jam', [PengunjungController::class, 'grafikPerJam']);
    Route::get('/pengunjung/halaman-populer', [PengunjungController::class, 'halamanPopuler']);
    Route::get('/search', [SearchController::class, 'cari']);
});

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

    // Tim/Admin: Buat Kelas & Materi
    Route::middleware('cek.peran:tim,admin')->group(function () {
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

    // ===== KRS & Akademik Pengguna =====
    Route::prefix('akademik')->name('pengguna.')->group(function () {
        Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
        Route::get('/krs/pilih-jenjang', [KrsController::class, 'pilihJenjang'])->name('krs.pilih-jenjang');
        Route::post('/krs/daftar-jenjang', [KrsController::class, 'daftarJenjang'])->name('krs.daftar-jenjang');
        Route::get('/krs/buat', [KrsController::class, 'buat'])->name('krs.buat');
        Route::post('/krs', [KrsController::class, 'simpan'])->name('krs.simpan');
        Route::get('/krs/{krs}', [KrsController::class, 'tampilkan'])->name('krs.tampilkan');
        Route::get('/khs', [KrsController::class, 'khs'])->name('khs');
    });
});

// ===== ADMIN =====
Route::middleware(['auth', 'cek.peran:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dasbor'])->name('dasbor');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');
    Route::get('/kunci', [AdminController::class, 'kunciAdmin'])->name('kunci');
    Route::post('/kunci', [AdminController::class, 'buatKunci'])->name('kunci.buat');
    Route::get('/paket', [AdminController::class, 'paket'])->name('paket');
    Route::post('/paket', [AdminController::class, 'simpanPaket'])->name('paket.simpan');

    // Admin Berita
    Route::get('/berita', [BeritaController::class, 'adminIndex'])->name('berita.index');
    Route::get('/berita/buat', [BeritaController::class, 'adminBuat'])->name('berita.buat');
    Route::post('/berita', [BeritaController::class, 'adminSimpan'])->name('berita.simpan');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'adminEdit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'adminUpdate'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'adminHapus'])->name('berita.hapus');

    // Admin Kerja Sama
    Route::get('/kerja-sama', [KerjaSamaController::class, 'adminIndex'])->name('kerja-sama.index');
    Route::get('/kerja-sama/buat', [KerjaSamaController::class, 'adminBuat'])->name('kerja-sama.buat');
    Route::post('/kerja-sama', [KerjaSamaController::class, 'adminSimpan'])->name('kerja-sama.simpan');
    Route::get('/kerja-sama/{kerjaSama}/edit', [KerjaSamaController::class, 'adminEdit'])->name('kerja-sama.edit');
    Route::put('/kerja-sama/{kerjaSama}', [KerjaSamaController::class, 'adminUpdate'])->name('kerja-sama.update');
    Route::delete('/kerja-sama/{kerjaSama}', [KerjaSamaController::class, 'adminHapus'])->name('kerja-sama.hapus');

    // Admin Pengunjung
    Route::get('/pengunjung', [PengunjungController::class, 'adminDashboard'])->name('pengunjung');

    // Admin Kurikulum
    Route::get('/kurikulum', [AdminKurikulumController::class, 'kurikulumIndex'])->name('kurikulum.index');
    Route::get('/kurikulum/buat', [AdminKurikulumController::class, 'kurikulumBuat'])->name('kurikulum.buat');
    Route::post('/kurikulum', [AdminKurikulumController::class, 'kurikulumSimpan'])->name('kurikulum.simpan');
    Route::get('/kurikulum/{kurikulum}/edit', [AdminKurikulumController::class, 'kurikulumEdit'])->name('kurikulum.edit');
    Route::put('/kurikulum/{kurikulum}', [AdminKurikulumController::class, 'kurikulumUpdate'])->name('kurikulum.update');
    Route::delete('/kurikulum/{kurikulum}', [AdminKurikulumController::class, 'kurikulumHapus'])->name('kurikulum.hapus');

    // Admin Mata Pelajaran
    Route::get('/mata-pelajaran', [AdminKurikulumController::class, 'mataPelajaranIndex'])->name('mata-pelajaran.index');
    Route::post('/mata-pelajaran', [AdminKurikulumController::class, 'mataPelajaranSimpan'])->name('mata-pelajaran.simpan');
    Route::delete('/mata-pelajaran/{mataPelajaran}', [AdminKurikulumController::class, 'mataPelajaranHapus'])->name('mata-pelajaran.hapus');

    // Admin Bobot Nilai
    Route::get('/bobot-nilai', [AdminKurikulumController::class, 'bobotNilaiIndex'])->name('bobot-nilai.index');
    Route::post('/bobot-nilai', [AdminKurikulumController::class, 'bobotNilaiSimpan'])->name('bobot-nilai.simpan');

    // Admin KRS Management
    Route::get('/krs', [AdminKurikulumController::class, 'krsIndex'])->name('krs.index');
    Route::put('/krs/{krs}/setujui', [AdminKurikulumController::class, 'krsSetujui'])->name('krs.setujui');
    Route::put('/krs/{krs}/tolak', [AdminKurikulumController::class, 'krsTolak'])->name('krs.tolak');

    // Admin Nilai
    Route::get('/nilai', [AdminKurikulumController::class, 'nilaiIndex'])->name('nilai.index');
    Route::post('/nilai', [AdminKurikulumController::class, 'nilaiSimpan'])->name('nilai.simpan');

    // Admin Organisasi
    Route::get('/organisasi', [AdminKurikulumController::class, 'organisasiIndex'])->name('organisasi.index');
    Route::get('/organisasi/buat', [AdminKurikulumController::class, 'organisasiBuat'])->name('organisasi.buat');
    Route::post('/organisasi', [AdminKurikulumController::class, 'organisasiSimpan'])->name('organisasi.simpan');
    Route::get('/organisasi/{organisasi}/edit', [AdminKurikulumController::class, 'organisasiEdit'])->name('organisasi.edit');
    Route::put('/organisasi/{organisasi}', [AdminKurikulumController::class, 'organisasiUpdate'])->name('organisasi.update');
    Route::delete('/organisasi/{organisasi}', [AdminKurikulumController::class, 'organisasiHapus'])->name('organisasi.hapus');

    // Admin Laporan Akademik
    Route::get('/laporan-akademik', [AdminKurikulumController::class, 'laporanIndex'])->name('laporan-akademik.index');
    Route::get('/laporan-akademik/buat', [AdminKurikulumController::class, 'laporanBuat'])->name('laporan-akademik.buat');
    Route::post('/laporan-akademik', [AdminKurikulumController::class, 'laporanGenerate'])->name('laporan-akademik.generate');
    Route::get('/laporan-akademik/{laporan}', [AdminKurikulumController::class, 'laporanTampilkan'])->name('laporan-akademik.tampilkan');
    Route::get('/laporan-akademik/{laporan}/export', [AdminKurikulumController::class, 'laporanExport'])->name('laporan-akademik.export');
});

// Halaman Statis
Route::view('/lisensi', 'halaman.lisensi')->name('lisensi');
Route::view('/sponsor', 'halaman.sponsor')->name('sponsor');
Route::view('/tentang', 'halaman.tentang')->name('tentang');

// ===== HALAMAN EKOSISTEM (v2.0) =====
Route::prefix('/')->name('halaman.')->group(function () {
    Route::view('/jenjang-pendidikan', 'halaman.jenjang-pendidikan')->name('jenjang');
    Route::view('/riset-inovasi', 'halaman.riset-inovasi')->name('riset');
    Route::view('/karir-industri', 'halaman.karir-industri')->name('karir');
    Route::view('/komunitas', 'halaman.komunitas')->name('komunitas');
    Route::view('/sertifikasi', 'halaman.sertifikasi')->name('sertifikasi');
    Route::view('/sumber-daya', 'halaman.sumber-daya')->name('sumber-daya');
    Route::view('/keamanan', 'halaman.keamanan')->name('keamanan');
    Route::view('/penjamin-mutu', 'halaman.penjamin-mutu')->name('penjamin-mutu');

    // --- Pendidikan Dasar ---
    Route::view('/pendidikan-dasar/tk-paud', 'halaman.pendidikan-dasar.tk-paud')->name('pendidikan-dasar.tk-paud');
    Route::view('/pendidikan-dasar/sd-mi', 'halaman.pendidikan-dasar.sd-mi')->name('pendidikan-dasar.sd-mi');
    Route::view('/pendidikan-dasar/smp-mts', 'halaman.pendidikan-dasar.smp-mts')->name('pendidikan-dasar.smp-mts');
    Route::view('/pendidikan-dasar/sma-ma', 'halaman.pendidikan-dasar.sma-ma')->name('pendidikan-dasar.sma-ma');
    Route::view('/pendidikan-dasar/smk-teknologi', 'halaman.pendidikan-dasar.smk-teknologi')->name('pendidikan-dasar.smk-teknologi');
    Route::view('/pendidikan-dasar/smk-bisnis', 'halaman.pendidikan-dasar.smk-bisnis')->name('pendidikan-dasar.smk-bisnis');
    Route::view('/pendidikan-dasar/smk-kesehatan', 'halaman.pendidikan-dasar.smk-kesehatan')->name('pendidikan-dasar.smk-kesehatan');

    // --- Pendidikan Tinggi ---
    Route::view('/pendidikan-tinggi/diploma', 'halaman.pendidikan-tinggi.diploma')->name('pendidikan-tinggi.diploma');
    Route::view('/pendidikan-tinggi/sarjana', 'halaman.pendidikan-tinggi.sarjana')->name('pendidikan-tinggi.sarjana');
    Route::view('/pendidikan-tinggi/magister', 'halaman.pendidikan-tinggi.magister')->name('pendidikan-tinggi.magister');
    Route::view('/pendidikan-tinggi/doktoral', 'halaman.pendidikan-tinggi.doktoral')->name('pendidikan-tinggi.doktoral');
    Route::view('/pendidikan-tinggi/post-doktoral', 'halaman.pendidikan-tinggi.post-doktoral')->name('pendidikan-tinggi.post-doktoral');
    Route::view('/pendidikan-tinggi/profesi', 'halaman.pendidikan-tinggi.profesi')->name('pendidikan-tinggi.profesi');

    // --- Riset ---
    Route::view('/riset/publikasi', 'halaman.riset.publikasi')->name('riset.publikasi');
    Route::view('/riset/kolaborasi', 'halaman.riset.kolaborasi')->name('riset.kolaborasi');
    Route::view('/riset/inovasi-paten', 'halaman.riset.inovasi-paten')->name('riset.inovasi-paten');
    Route::view('/riset/konferensi', 'halaman.riset.konferensi')->name('riset.konferensi');

    // --- Karir ---
    Route::view('/karir/lowongan', 'halaman.karir.lowongan')->name('karir.lowongan');
    Route::view('/karir/magang', 'halaman.karir.magang')->name('karir.magang');
    Route::view('/karir/mentoring', 'halaman.karir.mentoring')->name('karir.mentoring');
    Route::view('/karir/cv-builder', 'halaman.karir.cv-builder')->name('karir.cv-builder');

    // --- Komunitas ---
    Route::get('/komunitas/organisasi', [OrganisasiController::class, 'index'])->name('komunitas.organisasi');
    Route::view('/komunitas/forum-diskusi', 'halaman.komunitas.forum-diskusi')->name('komunitas.forum-diskusi');
    Route::view('/komunitas/study-group', 'halaman.komunitas.study-group')->name('komunitas.study-group');
    Route::view('/komunitas/alumni-network', 'halaman.komunitas.alumni-network')->name('komunitas.alumni-network');
    Route::view('/komunitas/hackathon', 'halaman.komunitas.hackathon')->name('komunitas.hackathon');
    Route::view('/komunitas/open-source', 'halaman.komunitas.open-source')->name('komunitas.open-source');

    // --- Sertifikasi ---
    Route::view('/sertifikasi/kompetensi-nasional', 'halaman.sertifikasi.kompetensi-nasional')->name('sertifikasi.kompetensi-nasional');
    Route::view('/sertifikasi/cloud-tech', 'halaman.sertifikasi.cloud-tech')->name('sertifikasi.cloud-tech');
    Route::view('/sertifikasi/blockchain-credential', 'halaman.sertifikasi.blockchain-credential')->name('sertifikasi.blockchain-credential');

    // --- Sumber Daya ---
    Route::view('/sumber-daya/ebook-modul', 'halaman.sumber-daya.ebook-modul')->name('sumber-daya.ebook-modul');
    Route::view('/sumber-daya/dataset', 'halaman.sumber-daya.dataset')->name('sumber-daya.dataset');
    Route::view('/sumber-daya/dev-tools', 'halaman.sumber-daya.dev-tools')->name('sumber-daya.dev-tools');

    // --- Keamanan ---
    Route::view('/keamanan/tata-kelola-it', 'halaman.keamanan.tata-kelola-it')->name('keamanan.tata-kelola-it');
    Route::view('/keamanan/privasi-data', 'halaman.keamanan.privasi-data')->name('keamanan.privasi-data');

    // --- Kurikulum ---
    Route::view('/kurikulum', 'halaman.kurikulum')->name('kurikulum');
    Route::view('/kurikulum/silabus', 'halaman.kurikulum.silabus')->name('kurikulum.silabus');
    Route::view('/kurikulum/rps-template', 'halaman.kurikulum.rps-template')->name('kurikulum.rps-template');
    Route::view('/kurikulum/kalender-akademik', 'halaman.kurikulum.kalender-akademik')->name('kurikulum.kalender-akademik');
    Route::view('/kurikulum/learning-outcomes', 'halaman.kurikulum.learning-outcomes')->name('kurikulum.learning-outcomes');

    // --- Alur & Panduan ---
    Route::view('/alur-panduan', 'halaman.alur-panduan')->name('alur-panduan');
    Route::view('/alur-panduan/flowchart-sistem', 'halaman.alur-panduan.flowchart-sistem')->name('alur-panduan.flowchart-sistem');
    Route::view('/alur-panduan/panduan-pengguna', 'halaman.alur-panduan.panduan-pengguna')->name('alur-panduan.panduan-pengguna');
    Route::view('/alur-panduan/sop-prosedur', 'halaman.alur-panduan.sop-prosedur')->name('alur-panduan.sop-prosedur');
    Route::view('/alur-panduan/faq-bantuan', 'halaman.alur-panduan.faq-bantuan')->name('alur-panduan.faq-bantuan');

    // --- Media ---
    Route::view('/media', 'halaman.media')->name('media');
    Route::view('/media/video-tutorial', 'halaman.media.video-tutorial')->name('media.video-tutorial');
    Route::view('/media/webinar-event', 'halaman.media.webinar-event')->name('media.webinar-event');
    Route::view('/media/podcast-audio', 'halaman.media.podcast-audio')->name('media.podcast-audio');
    Route::view('/media/galeri-foto', 'halaman.media.galeri-foto')->name('media.galeri-foto');

    // --- Dokumen ---
    Route::view('/dokumen', 'halaman.dokumen')->name('dokumen');
    Route::view('/dokumen/kebijakan-privasi', 'halaman.dokumen.kebijakan-privasi')->name('dokumen.kebijakan-privasi');
    Route::view('/dokumen/template-administrasi', 'halaman.dokumen.template-administrasi')->name('dokumen.template-administrasi');
    Route::view('/dokumen/surat-formulir', 'halaman.dokumen.surat-formulir')->name('dokumen.surat-formulir');
    Route::view('/dokumen/arsip-regulasi', 'halaman.dokumen.arsip-regulasi')->name('dokumen.arsip-regulasi');
});
