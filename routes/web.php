<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\BerandaController;
use App\Http\Controllers\Landing\HalamanController;
use App\Http\Controllers\Landing\BeritaController;
use App\Http\Controllers\Landing\KerjaSamaController;
use App\Http\Controllers\Landing\EdukasiGratisController;
use App\Http\Controllers\Landing\PendaftaranEdukasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\ChatController;

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

// Halaman Baru (Menu 22-40)
Route::get('/webinar', [HalamanController::class, 'webinar'])->name('halaman.webinar');
Route::get('/beasiswa', [HalamanController::class, 'beasiswa'])->name('halaman.beasiswa');
Route::get('/laboratorium', [HalamanController::class, 'laboratorium'])->name('halaman.laboratorium');
Route::get('/perpustakaan', [HalamanController::class, 'perpustakaan'])->name('halaman.perpustakaan');
Route::get('/forum', [HalamanController::class, 'forum'])->name('halaman.forum');
Route::get('/mentoring', [HalamanController::class, 'mentoring'])->name('halaman.mentoring');
Route::get('/magang', [HalamanController::class, 'magang'])->name('halaman.magang');
Route::get('/alumni', [HalamanController::class, 'alumni'])->name('halaman.alumni');
Route::get('/portofolio', [HalamanController::class, 'portofolio'])->name('halaman.portofolio');
Route::get('/kompetisi', [HalamanController::class, 'kompetisi'])->name('halaman.kompetisi');
Route::get('/workshop', [HalamanController::class, 'workshop'])->name('halaman.workshop');
Route::get('/jurnal', [HalamanController::class, 'jurnal'])->name('halaman.jurnal');
Route::get('/podcast', [HalamanController::class, 'podcast'])->name('halaman.podcast');
Route::get('/pelatihan', [HalamanController::class, 'pelatihan'])->name('halaman.pelatihan');
Route::get('/konsultasi', [HalamanController::class, 'konsultasi'])->name('halaman.konsultasi');
Route::get('/e-learning', [HalamanController::class, 'eLearning'])->name('halaman.e-learning');
Route::get('/akreditasi', [HalamanController::class, 'akreditasi'])->name('halaman.akreditasi');
Route::get('/galeri', [HalamanController::class, 'galeri'])->name('halaman.galeri');
Route::get('/pengumuman', [HalamanController::class, 'pengumuman'])->name('halaman.pengumuman');
Route::get('/repositori', [HalamanController::class, 'repositori'])->name('halaman.repositori');
Route::get('/layanan', [HalamanController::class, 'layanan'])->name('halaman.layanan');

// Menu Tambahan Ekosistem (100 Menu)
Route::view('/inkubator', 'halaman.inkubator')->name('halaman.inkubator');
Route::view('/akselerator', 'halaman.akselerator')->name('halaman.akselerator');
Route::view('/startup-hub', 'halaman.startup-hub')->name('halaman.startup-hub');
Route::view('/hackathon-global', 'halaman.hackathon-global')->name('halaman.hackathon-global');
Route::view('/olimpiade', 'halaman.olimpiade')->name('halaman.olimpiade');
Route::view('/pertukaran-pelajar', 'halaman.pertukaran-pelajar')->name('halaman.pertukaran-pelajar');
Route::view('/studi-banding', 'halaman.studi-banding')->name('halaman.studi-banding');
Route::view('/kelas-industri', 'halaman.kelas-industri')->name('halaman.kelas-industri');
Route::view('/bootcamp', 'halaman.bootcamp')->name('halaman.bootcamp');
Route::view('/coding-lab', 'halaman.coding-lab')->name('halaman.coding-lab');
Route::view('/ai-center', 'halaman.ai-center')->name('halaman.ai-center');
Route::view('/cyber-security', 'halaman.cyber-security')->name('halaman.cyber-security');
Route::view('/data-science', 'halaman.data-science')->name('halaman.data-science');
Route::view('/iot-lab', 'halaman.iot-lab')->name('halaman.iot-lab');
Route::view('/cloud-computing', 'halaman.cloud-computing')->name('halaman.cloud-computing');
Route::view('/blockchain-center', 'halaman.blockchain-center')->name('halaman.blockchain-center');
Route::view('/vr-ar-lab', 'halaman.vr-ar-lab')->name('halaman.vr-ar-lab');
Route::view('/robotika', 'halaman.robotika')->name('halaman.robotika');
Route::view('/game-dev', 'halaman.game-dev')->name('halaman.game-dev');
Route::view('/desain-grafis', 'halaman.desain-grafis')->name('halaman.desain-grafis');
Route::view('/fotografi', 'halaman.fotografi')->name('halaman.fotografi');
Route::view('/videografi', 'halaman.videografi')->name('halaman.videografi');
Route::view('/musik-digital', 'halaman.musik-digital')->name('halaman.musik-digital');
Route::view('/animasi-3d', 'halaman.animasi-3d')->name('halaman.animasi-3d');
Route::view('/ui-ux-studio', 'halaman.ui-ux-studio')->name('halaman.ui-ux-studio');
Route::view('/content-creator', 'halaman.content-creator')->name('halaman.content-creator');
Route::view('/digital-marketing', 'halaman.digital-marketing')->name('halaman.digital-marketing');
Route::view('/seo-sem', 'halaman.seo-sem')->name('halaman.seo-sem');
Route::view('/bisnis-digital', 'halaman.bisnis-digital')->name('halaman.bisnis-digital');
Route::view('/fintech', 'halaman.fintech')->name('halaman.fintech');
Route::view('/agritech', 'halaman.agritech')->name('halaman.agritech');
Route::view('/healthtech', 'halaman.healthtech')->name('halaman.healthtech');
Route::view('/edtech', 'halaman.edtech')->name('halaman.edtech');
Route::view('/greentech', 'halaman.greentech')->name('halaman.greentech');
Route::view('/legaltech', 'halaman.legaltech')->name('halaman.legaltech');
Route::view('/bahasa-asing', 'halaman.bahasa-asing')->name('halaman.bahasa-asing');
Route::view('/sastra-budaya', 'halaman.sastra-budaya')->name('halaman.sastra-budaya');
Route::view('/penelitian-sosial', 'halaman.penelitian-sosial')->name('halaman.penelitian-sosial');
Route::view('/psikologi-pendidikan', 'halaman.psikologi-pendidikan')->name('halaman.psikologi-pendidikan');
Route::view('/hukum-regulasi', 'halaman.hukum-regulasi')->name('halaman.hukum-regulasi');
Route::view('/ekonomi-keuangan', 'halaman.ekonomi-keuangan')->name('halaman.ekonomi-keuangan');
Route::view('/manajemen-bisnis', 'halaman.manajemen-bisnis')->name('halaman.manajemen-bisnis');
Route::view('/hubungan-internasional', 'halaman.hubungan-internasional')->name('halaman.hubungan-internasional');
Route::view('/administrasi-publik', 'halaman.administrasi-publik')->name('halaman.administrasi-publik');
Route::view('/arsitektur', 'halaman.arsitektur')->name('halaman.arsitektur');
Route::view('/teknik-sipil', 'halaman.teknik-sipil')->name('halaman.teknik-sipil');
Route::view('/teknik-mesin', 'halaman.teknik-mesin')->name('halaman.teknik-mesin');
Route::view('/teknik-elektro', 'halaman.teknik-elektro')->name('halaman.teknik-elektro');
Route::view('/teknik-informatika', 'halaman.teknik-informatika')->name('halaman.teknik-informatika');
Route::view('/sistem-informasi', 'halaman.sistem-informasi')->name('halaman.sistem-informasi');
Route::view('/kedokteran', 'halaman.kedokteran')->name('halaman.kedokteran');
Route::view('/farmasi', 'halaman.farmasi')->name('halaman.farmasi');
Route::view('/keperawatan', 'halaman.keperawatan')->name('halaman.keperawatan');
Route::view('/gizi-kesehatan', 'halaman.gizi-kesehatan')->name('halaman.gizi-kesehatan');
Route::view('/lingkungan-hidup', 'halaman.lingkungan-hidup')->name('halaman.lingkungan-hidup');
Route::view('/pariwisata', 'halaman.pariwisata')->name('halaman.pariwisata');
Route::view('/perhotelan', 'halaman.perhotelan')->name('halaman.perhotelan');
Route::view('/tata-boga', 'halaman.tata-boga')->name('halaman.tata-boga');
Route::view('/olahraga', 'halaman.olahraga')->name('halaman.olahraga');

// Berita (Publik)
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita}', [BeritaController::class, 'tampilkan'])->name('berita.tampilkan');

// Kerja Sama (Publik)
Route::get('/kerja-sama', [KerjaSamaController::class, 'index'])->name('kerja-sama.index');
Route::get('/kerja-sama/{kerjaSama}', [KerjaSamaController::class, 'tampilkan'])->name('kerja-sama.tampilkan');

// Edukasi Gratis (Publik)
Route::get('/edukasi-gratis', [EdukasiGratisController::class, 'index'])->name('edukasi-gratis.index');
Route::get('/edukasi-gratis/{edukasiGratis}', [EdukasiGratisController::class, 'tampilkan'])->name('edukasi-gratis.tampilkan');

// Halaman Statis
Route::view('/lisensi', 'halaman.lisensi')->name('lisensi');
Route::view('/sponsor', 'halaman.sponsor')->name('sponsor');
Route::get('/kuro', [HalamanController::class, 'kuro'])->name('halaman.kuro');
Route::get('/bejotaro', [HalamanController::class, 'bejotaro'])->name('halaman.bejotaro');
Route::get('/veteran', [HalamanController::class, 'veteran'])->name('halaman.veteran');
Route::view('/universe', 'halaman.universe')->name('halaman.universe');
Route::view('/donasi', 'halaman.donasi')->name('halaman.donasi');

// ===================================================================
// HALAMAN EKOSISTEM (Sub-pages, tetap pakai view statis existing)
// ===================================================================
Route::name('halaman.')->group(function () {
    Route::view('/penjamin-mutu', 'halaman.penjamin-mutu')->name('penjamin-mutu');

    // --- Tentang Sub ---
    Route::view('/tentang/profil-kuro', 'halaman.tentang.profil-kuro')->name('tentang.profil-kuro');

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
    Route::get('/komunitas/organisasi/{organisasi}', [OrganisasiController::class, 'detail'])->name('komunitas.organisasi.detail');
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
    Route::get('/materi/{materi}/buku', [MateriController::class, 'buku'])->name('materi.buku');
    Route::post('/materi/{materi}/selesai', [MateriController::class, 'selesaikan'])->name('materi.selesai');

    // Kuis (Shared)
    Route::get('/kuis/{kuis}', [KuisController::class, 'mulai'])->name('kuis.mulai');
    Route::post('/kuis/{kuis}', [KuisController::class, 'kirim'])->name('kuis.kirim');

    // Laporan (Shared)
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/buat', [LaporanController::class, 'buat'])->name('laporan.buat');
    Route::post('/laporan', [LaporanController::class, 'simpan'])->name('laporan.simpan');

    // Diagram Builder
    Route::get('/diagram-builder', [LaporanController::class, 'builder'])->name('laporan.builder');
    Route::get('/diagram-builder/{laporan}', [LaporanController::class, 'builderEdit'])->name('laporan.builder-edit');
    Route::post('/diagram-builder/simpan', [LaporanController::class, 'simpanBuilder'])->name('laporan.simpan-builder');
    Route::get('/laporan/{laporan}/json', [LaporanController::class, 'json'])->name('laporan.json');
    Route::delete('/laporan/{laporan}', [LaporanController::class, 'hapus'])->name('laporan.hapus');

    Route::get('/laporan/{laporan}', [LaporanController::class, 'tampilkan'])->name('laporan.tampilkan');

    // Pendaftaran Edukasi (Shared)
    Route::get('/pendaftaran-edukasi/{edukasiGratis}', [PendaftaranEdukasiController::class, 'buat'])->name('pendaftaran-edukasi.buat');
    Route::post('/pendaftaran-edukasi/{edukasiGratis}', [PendaftaranEdukasiController::class, 'simpan'])->name('pendaftaran-edukasi.simpan');
    Route::get('/riwayat-pendaftaran', [PendaftaranEdukasiController::class, 'riwayat'])->name('pendaftaran-edukasi.riwayat');

    // Chat / Chatbot (Authenticated)
    Route::prefix('chat')->name('chat.')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('index');
        Route::post('/create', [ChatController::class, 'create'])->name('create');
        Route::get('/sessions', [ChatController::class, 'listSessions'])->name('sessions');
        Route::get('/{session}', [ChatController::class, 'show'])->name('show');
        Route::post('/{session}/send', [ChatController::class, 'sendMessage'])->name('send');
        Route::post('/{session}/archive', [ChatController::class, 'archive'])->name('archive');
        Route::delete('/{session}', [ChatController::class, 'delete'])->name('delete');
        Route::post('/message/{message}/feedback', [ChatController::class, 'addFeedback'])->name('feedback');
    });
});
