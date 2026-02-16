<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\BerandaController;
use App\Http\Controllers\Landing\HalamanController;
use App\Http\Controllers\Landing\BeritaController;
use App\Http\Controllers\Landing\KerjaSamaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrganisasiController;

// ===================================================================
// LANDING PAGE (Publik)
// ===================================================================
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Halaman Informasi Landing
Route::get('/jenjang', [HalamanController::class, 'jenjang'])->name('halaman.jenjang');
Route::get('/platform', [HalamanController::class, 'platform'])->name('halaman.platform');
Route::get('/tentang', [HalamanController::class, 'tentang'])->name('tentang');
Route::get('/riset', [HalamanController::class, 'riset'])->name('halaman.riset');
Route::get('/karir', [HalamanController::class, 'karir'])->name('halaman.karir');
Route::get('/komunitas', [HalamanController::class, 'komunitas'])->name('halaman.komunitas');
Route::get('/sertifikasi', [HalamanController::class, 'sertifikasi'])->name('halaman.sertifikasi');
Route::get('/langganan', [HalamanController::class, 'langganan'])->name('halaman.langganan');
Route::get('/sumber-daya', [HalamanController::class, 'sumberdaya'])->name('halaman.sumber-daya');
Route::get('/keamanan', [HalamanController::class, 'keamanan'])->name('halaman.keamanan');
Route::get('/kurikulum-info', [HalamanController::class, 'kurikulum'])->name('halaman.kurikulum');
Route::get('/panduan', [HalamanController::class, 'panduan'])->name('halaman.alur-panduan');
Route::get('/media-info', [HalamanController::class, 'media'])->name('halaman.media');
Route::get('/dokumen-info', [HalamanController::class, 'dokumen'])->name('halaman.dokumen');
Route::get('/bantuan', [HalamanController::class, 'bantuan'])->name('halaman.bantuan');
Route::get('/statistik', [HalamanController::class, 'statistik'])->name('halaman.statistik');
Route::get('/akun', [HalamanController::class, 'akun'])->name('halaman.akun');

// Berita (Publik)
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita}', [BeritaController::class, 'tampilkan'])->name('berita.tampilkan');

// Kerja Sama (Publik)
Route::get('/kerja-sama', [KerjaSamaController::class, 'index'])->name('kerja-sama.index');
Route::get('/kerja-sama/{kerjaSama}', [KerjaSamaController::class, 'tampilkan'])->name('kerja-sama.tampilkan');

// Halaman Statis
Route::view('/lisensi', 'halaman.lisensi')->name('lisensi');
Route::view('/sponsor', 'halaman.sponsor')->name('sponsor');

// ===================================================================
// HALAMAN EKOSISTEM (Sub-pages, tetap pakai view statis existing)
// ===================================================================
Route::name('halaman.')->group(function () {
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

    // --- Riset Sub ---
    Route::view('/riset/publikasi', 'halaman.riset.publikasi')->name('riset.publikasi');
    Route::view('/riset/kolaborasi', 'halaman.riset.kolaborasi')->name('riset.kolaborasi');
    Route::view('/riset/inovasi-paten', 'halaman.riset.inovasi-paten')->name('riset.inovasi-paten');
    Route::view('/riset/konferensi', 'halaman.riset.konferensi')->name('riset.konferensi');

    // --- Karir Sub ---
    Route::view('/karir/lowongan', 'halaman.karir.lowongan')->name('karir.lowongan');
    Route::view('/karir/magang', 'halaman.karir.magang')->name('karir.magang');
    Route::view('/karir/mentoring', 'halaman.karir.mentoring')->name('karir.mentoring');
    Route::view('/karir/cv-builder', 'halaman.karir.cv-builder')->name('karir.cv-builder');

    // --- Komunitas Sub ---
    Route::get('/komunitas/organisasi', [OrganisasiController::class, 'index'])->name('komunitas.organisasi');
    Route::view('/komunitas/forum-diskusi', 'halaman.komunitas.forum-diskusi')->name('komunitas.forum-diskusi');
    Route::view('/komunitas/study-group', 'halaman.komunitas.study-group')->name('komunitas.study-group');
    Route::view('/komunitas/alumni-network', 'halaman.komunitas.alumni-network')->name('komunitas.alumni-network');
    Route::view('/komunitas/hackathon', 'halaman.komunitas.hackathon')->name('komunitas.hackathon');
    Route::view('/komunitas/open-source', 'halaman.komunitas.open-source')->name('komunitas.open-source');

    // --- Sertifikasi Sub ---
    Route::view('/sertifikasi/kompetensi-nasional', 'halaman.sertifikasi.kompetensi-nasional')->name('sertifikasi.kompetensi-nasional');
    Route::view('/sertifikasi/cloud-tech', 'halaman.sertifikasi.cloud-tech')->name('sertifikasi.cloud-tech');
    Route::view('/sertifikasi/blockchain-credential', 'halaman.sertifikasi.blockchain-credential')->name('sertifikasi.blockchain-credential');

    // --- Sumber Daya Sub ---
    Route::view('/sumber-daya/ebook-modul', 'halaman.sumber-daya.ebook-modul')->name('sumber-daya.ebook-modul');
    Route::view('/sumber-daya/dataset', 'halaman.sumber-daya.dataset')->name('sumber-daya.dataset');
    Route::view('/sumber-daya/dev-tools', 'halaman.sumber-daya.dev-tools')->name('sumber-daya.dev-tools');

    // --- Keamanan Sub ---
    Route::view('/keamanan/tata-kelola-it', 'halaman.keamanan.tata-kelola-it')->name('keamanan.tata-kelola-it');
    Route::view('/keamanan/privasi-data', 'halaman.keamanan.privasi-data')->name('keamanan.privasi-data');

    // --- Kurikulum Sub ---
    Route::view('/kurikulum/silabus', 'halaman.kurikulum.silabus')->name('kurikulum.silabus');
    Route::view('/kurikulum/rps-template', 'halaman.kurikulum.rps-template')->name('kurikulum.rps-template');
    Route::view('/kurikulum/kalender-akademik', 'halaman.kurikulum.kalender-akademik')->name('kurikulum.kalender-akademik');
    Route::view('/kurikulum/learning-outcomes', 'halaman.kurikulum.learning-outcomes')->name('kurikulum.learning-outcomes');

    // --- Alur & Panduan Sub ---
    Route::view('/alur-panduan/flowchart-sistem', 'halaman.alur-panduan.flowchart-sistem')->name('alur-panduan.flowchart-sistem');
    Route::view('/alur-panduan/panduan-pengguna', 'halaman.alur-panduan.panduan-pengguna')->name('alur-panduan.panduan-pengguna');
    Route::view('/alur-panduan/sop-prosedur', 'halaman.alur-panduan.sop-prosedur')->name('alur-panduan.sop-prosedur');
    Route::view('/alur-panduan/faq-bantuan', 'halaman.alur-panduan.faq-bantuan')->name('alur-panduan.faq-bantuan');

    // --- Media Sub ---
    Route::view('/media/video-tutorial', 'halaman.media.video-tutorial')->name('media.video-tutorial');
    Route::view('/media/webinar-event', 'halaman.media.webinar-event')->name('media.webinar-event');
    Route::view('/media/podcast-audio', 'halaman.media.podcast-audio')->name('media.podcast-audio');
    Route::view('/media/galeri-foto', 'halaman.media.galeri-foto')->name('media.galeri-foto');

    // --- Dokumen Sub ---
    Route::view('/dokumen/kebijakan-privasi', 'halaman.dokumen.kebijakan-privasi')->name('dokumen.kebijakan-privasi');
    Route::view('/dokumen/template-administrasi', 'halaman.dokumen.template-administrasi')->name('dokumen.template-administrasi');
    Route::view('/dokumen/surat-formulir', 'halaman.dokumen.surat-formulir')->name('dokumen.surat-formulir');
    Route::view('/dokumen/arsip-regulasi', 'halaman.dokumen.arsip-regulasi')->name('dokumen.arsip-regulasi');
});

// ===================================================================
// API ENDPOINTS (Publik)
// ===================================================================
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

// ===================================================================
// AUTENTIKASI
// ===================================================================
Route::middleware('guest')->group(function () {
    Route::get('/masuk', [AuthController::class, 'formMasuk'])->name('masuk');
    Route::post('/masuk', [AuthController::class, 'masuk']);
    Route::get('/daftar', [AuthController::class, 'formDaftar'])->name('daftar');
    Route::post('/daftar', [AuthController::class, 'daftar']);
    Route::get('/daftar-pengajar', [AuthController::class, 'formDaftarPengajar'])->name('daftar.pengajar');
    Route::post('/daftar-pengajar', [AuthController::class, 'daftarPengajar'])->name('daftar.pengajar.simpan');
    Route::get('/masuk-admin', [AuthController::class, 'formMasukAdmin'])->name('masuk.admin');
    Route::post('/masuk-admin', [AuthController::class, 'masukAdmin']);

    // OAuth
    Route::get('/auth/google', [AuthController::class, 'redirectKeGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'callbackGoogle']);
    Route::get('/auth/github', [AuthController::class, 'redirectKeGithub'])->name('auth.github');
    Route::get('/auth/github/callback', [AuthController::class, 'callbackGithub']);
});

Route::post('/keluar', [AuthController::class, 'keluar'])->name('keluar')->middleware('auth');

// ===================================================================
// HALAMAN YANG BUTUH LOGIN (Shared / All Roles)
// ===================================================================
Route::middleware('auth')->group(function () {
    // Status Verifikasi
    Route::get('/verifikasi-status', [AuthController::class, 'statusVerifikasi'])->name('verifikasi.status');

    // Dasbor - Auto redirect berdasarkan role
    Route::get('/dasbor', function () {
        /** @var \App\Models\User $pengguna */
        $pengguna = Auth::user();

        // Cek verifikasi dulu
        if ($pengguna->butuhVerifikasi() && !$pengguna->sudahVerifikasi()) {
            return redirect()->route('verifikasi.status');
        }

        return match ($pengguna->peran) {
            'admin' => redirect()->route('admin.dasbor'),
            'guru' => redirect()->route('pengajar.dasbor'),
            'pengajar' => redirect()->route('pengajar.dasbor'),
            'staff' => redirect()->route('staff.dasbor'),
            default => redirect()->route('pengguna.dasbor'),
        };
    })->name('dasbor');

    // Kelas (Shared)
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/{kelas}', [KelasController::class, 'tampilkan'])->name('kelas.tampilkan');
    Route::post('/kelas/{kelas}/gabung', [KelasController::class, 'gabung'])->name('kelas.gabung');

    // Pengajar/Admin: Buat Kelas & Materi (backward compat)
    Route::middleware('cek.peran:pengajar,admin')->group(function () {
        Route::get('/kelas-baru', [KelasController::class, 'buat'])->name('kelas.buat');
        Route::post('/kelas-baru', [KelasController::class, 'simpan'])->name('kelas.simpan');
        Route::get('/materi-baru', [MateriController::class, 'buat'])->name('materi.buat');
        Route::post('/materi-baru', [MateriController::class, 'simpan'])->name('materi.simpan');
    });

    // Materi (Shared)
    Route::get('/materi/{materi}', [MateriController::class, 'tampilkan'])->name('materi.tampilkan');
    Route::post('/materi/{materi}/selesai', [MateriController::class, 'selesaikan'])->name('materi.selesai');

    // Kuis (Shared)
    Route::get('/kuis/{kuis}', [KuisController::class, 'mulai'])->name('kuis.mulai');
    Route::post('/kuis/{kuis}', [KuisController::class, 'kirim'])->name('kuis.kirim');

    // Laporan (Shared)
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/buat', [LaporanController::class, 'buat'])->name('laporan.buat');
    Route::post('/laporan', [LaporanController::class, 'simpan'])->name('laporan.simpan');
    Route::get('/laporan/{laporan}', [LaporanController::class, 'tampilkan'])->name('laporan.tampilkan');
});
