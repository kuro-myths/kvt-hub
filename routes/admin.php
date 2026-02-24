<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DasborController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KerjaSamaController;
use App\Http\Controllers\Admin\KurikulumController;
use App\Http\Controllers\Admin\MataPelajaranController;
use App\Http\Controllers\Admin\OrganisasiController;
use App\Http\Controllers\Admin\KrsController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\BobotNilaiController;
use App\Http\Controllers\Admin\LaporanAkademikController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\KunciController;
use App\Http\Controllers\Admin\PengunjungController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\Admin\KuroCeritaController;
use App\Http\Controllers\Admin\KarakterCeritaController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\EdukasiGratisController;
use App\Http\Controllers\Admin\PendaftaranEdukasiController;
use App\Http\Controllers\Admin\AturanEdukasiController;
use App\Http\Controllers\Admin\RepositoriController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Route yang hanya bisa diakses oleh role admin.
| Prefix: /admin  |  Name: admin.*  |  Middleware: auth, cek.peran:admin
*/

// Dashboard
Route::get('/', [DasborController::class, 'index'])->name('dasbor');
Route::get('/ekspor-pengguna', [DasborController::class, 'eksporExcel'])->name('ekspor.pengguna');

// Pengguna
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::post('/pengguna', [PenggunaController::class, 'simpan'])->name('pengguna.simpan');
Route::put('/pengguna/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/{pengguna}', [PenggunaController::class, 'hapus'])->name('pengguna.hapus');
Route::put('/pengguna/{pengguna}/toggle', [PenggunaController::class, 'toggleAktif'])->name('pengguna.toggle');

// Verifikasi Akun
Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('verifikasi');
Route::put('/verifikasi/{user}/setujui', [VerifikasiController::class, 'setujui'])->name('verifikasi.setujui');
Route::put('/verifikasi/{user}/tolak', [VerifikasiController::class, 'tolak'])->name('verifikasi.tolak');
Route::get('/verifikasi/{user}/dokumen/{field}', [VerifikasiController::class, 'lihatDokumen'])->name('verifikasi.dokumen');

// Kelas
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::post('/kelas', [KelasController::class, 'simpan'])->name('kelas.simpan');
Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kelas/{kelas}', [KelasController::class, 'hapus'])->name('kelas.hapus');

// Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::post('/berita', [BeritaController::class, 'simpan'])->name('berita.simpan');
Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{berita}', [BeritaController::class, 'hapus'])->name('berita.hapus');

// Kerja Sama
Route::get('/kerja-sama', [KerjaSamaController::class, 'index'])->name('kerja-sama.index');
Route::post('/kerja-sama', [KerjaSamaController::class, 'simpan'])->name('kerja-sama.simpan');
Route::put('/kerja-sama/{kerjaSama}', [KerjaSamaController::class, 'update'])->name('kerja-sama.update');
Route::delete('/kerja-sama/{kerjaSama}', [KerjaSamaController::class, 'hapus'])->name('kerja-sama.hapus');

// Kurikulum
Route::get('/kurikulum', [KurikulumController::class, 'index'])->name('kurikulum.index');
Route::post('/kurikulum', [KurikulumController::class, 'simpan'])->name('kurikulum.simpan');
Route::put('/kurikulum/{kurikulum}', [KurikulumController::class, 'update'])->name('kurikulum.update');
Route::delete('/kurikulum/{kurikulum}', [KurikulumController::class, 'hapus'])->name('kurikulum.hapus');

// Mata Pelajaran
Route::get('/mata-pelajaran', [MataPelajaranController::class, 'index'])->name('mata-pelajaran.index');
Route::post('/mata-pelajaran', [MataPelajaranController::class, 'simpan'])->name('mata-pelajaran.simpan');
Route::put('/mata-pelajaran/{mataPelajaran}', [MataPelajaranController::class, 'update'])->name('mata-pelajaran.update');
Route::delete('/mata-pelajaran/{mataPelajaran}', [MataPelajaranController::class, 'hapus'])->name('mata-pelajaran.hapus');

// Organisasi
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi.index');
Route::post('/organisasi', [OrganisasiController::class, 'simpan'])->name('organisasi.simpan');
Route::get('/organisasi/{organisasi}', [OrganisasiController::class, 'detail'])->name('organisasi.detail');
Route::put('/organisasi/{organisasi}', [OrganisasiController::class, 'update'])->name('organisasi.update');
Route::delete('/organisasi/{organisasi}', [OrganisasiController::class, 'hapus'])->name('organisasi.hapus');

// Organisasi - Kegiatan
Route::post('/organisasi/{organisasi}/kegiatan', [OrganisasiController::class, 'simpanKegiatan'])->name('organisasi.kegiatan.simpan');
Route::delete('/organisasi/{organisasi}/kegiatan/{kegiatan}', [OrganisasiController::class, 'hapusKegiatan'])->name('organisasi.kegiatan.hapus');

// Organisasi - Pengurus
Route::post('/organisasi/{organisasi}/pengurus', [OrganisasiController::class, 'simpanPengurus'])->name('organisasi.pengurus.simpan');
Route::delete('/organisasi/{organisasi}/pengurus/{pengurus}', [OrganisasiController::class, 'hapusPengurus'])->name('organisasi.pengurus.hapus');

// Organisasi - Galeri
Route::post('/organisasi/{organisasi}/galeri', [OrganisasiController::class, 'simpanGaleri'])->name('organisasi.galeri.simpan');
Route::delete('/organisasi/{organisasi}/galeri/{galeri}', [OrganisasiController::class, 'hapusGaleri'])->name('organisasi.galeri.hapus');

// KRS Mahasiswa
Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
Route::put('/krs/{krs}/setujui', [KrsController::class, 'setujui'])->name('krs.setujui');
Route::put('/krs/{krs}/tolak', [KrsController::class, 'tolak'])->name('krs.tolak');
Route::delete('/krs/{krs}', [KrsController::class, 'hapus'])->name('krs.hapus');

// Nilai
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::post('/nilai', [NilaiController::class, 'simpan'])->name('nilai.simpan');
Route::put('/nilai/{nilai}', [NilaiController::class, 'update'])->name('nilai.update');
Route::delete('/nilai/{nilai}', [NilaiController::class, 'hapus'])->name('nilai.hapus');

// Bobot Nilai
Route::get('/bobot-nilai', [BobotNilaiController::class, 'index'])->name('bobot-nilai.index');
Route::post('/bobot-nilai', [BobotNilaiController::class, 'simpan'])->name('bobot-nilai.simpan');
Route::put('/bobot-nilai/{bobotNilai}', [BobotNilaiController::class, 'update'])->name('bobot-nilai.update');
Route::delete('/bobot-nilai/{bobotNilai}', [BobotNilaiController::class, 'hapus'])->name('bobot-nilai.hapus');

// Laporan Akademik
Route::get('/laporan-akademik', [LaporanAkademikController::class, 'index'])->name('laporan-akademik.index');
Route::post('/laporan-akademik', [LaporanAkademikController::class, 'generate'])->name('laporan-akademik.generate');
Route::get('/laporan-akademik/{laporan}', [LaporanAkademikController::class, 'tampilkan'])->name('laporan-akademik.tampilkan');
Route::delete('/laporan-akademik/{laporan}', [LaporanAkademikController::class, 'hapus'])->name('laporan-akademik.hapus');

// Pengunjung
Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung');

// Paket Eksklusif
Route::get('/paket', [PaketController::class, 'index'])->name('paket');
Route::post('/paket', [PaketController::class, 'simpan'])->name('paket.simpan');
Route::put('/paket/{paket}', [PaketController::class, 'update'])->name('paket.update');
Route::delete('/paket/{paket}', [PaketController::class, 'hapus'])->name('paket.hapus');
Route::put('/paket/{paket}/toggle', [PaketController::class, 'toggleAktif'])->name('paket.toggle');

// Kunci Admin
Route::get('/kunci', [KunciController::class, 'index'])->name('kunci');
Route::post('/kunci', [KunciController::class, 'simpan'])->name('kunci.simpan');
Route::delete('/kunci/{kunci}', [KunciController::class, 'hapus'])->name('kunci.hapus');
Route::delete('/kunci-semua', [KunciController::class, 'hapusSemua'])->name('kunci.hapus-semua');

// Kuro Cerita (Chapters)
Route::get('/kuro-cerita', [KuroCeritaController::class, 'index'])->name('kuro-cerita.index');
Route::post('/kuro-cerita', [KuroCeritaController::class, 'simpan'])->name('kuro-cerita.simpan');
Route::put('/kuro-cerita/{kuroCerita}', [KuroCeritaController::class, 'update'])->name('kuro-cerita.update');
Route::delete('/kuro-cerita/{kuroCerita}', [KuroCeritaController::class, 'hapus'])->name('kuro-cerita.hapus');

// Karakter Cerita (Bejotaro & Veteran Chapters)
Route::get('/karakter-cerita', [KarakterCeritaController::class, 'index'])->name('karakter-cerita.index');
Route::post('/karakter-cerita', [KarakterCeritaController::class, 'simpan'])->name('karakter-cerita.simpan');
Route::put('/karakter-cerita/{karakterCerita}', [KarakterCeritaController::class, 'update'])->name('karakter-cerita.update');
Route::delete('/karakter-cerita/{karakterCerita}', [KarakterCeritaController::class, 'hapus'])->name('karakter-cerita.hapus');

// Materi (CRUD + XP)
Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
Route::post('/materi', [MateriController::class, 'simpan'])->name('materi.simpan');
Route::put('/materi/{materi}', [MateriController::class, 'update'])->name('materi.update');
Route::delete('/materi/{materi}', [MateriController::class, 'hapus'])->name('materi.hapus');

// Edukasi Gratis (CRUD)
Route::get('/edukasi-gratis', [EdukasiGratisController::class, 'index'])->name('edukasi-gratis.index');
Route::post('/edukasi-gratis', [EdukasiGratisController::class, 'simpan'])->name('edukasi-gratis.simpan');
Route::put('/edukasi-gratis/{edukasiGratis}', [EdukasiGratisController::class, 'update'])->name('edukasi-gratis.update');
Route::delete('/edukasi-gratis/{edukasiGratis}', [EdukasiGratisController::class, 'hapus'])->name('edukasi-gratis.hapus');
Route::put('/edukasi-gratis/{edukasiGratis}/toggle', [EdukasiGratisController::class, 'toggleAktif'])->name('edukasi-gratis.toggle');

// Pendaftaran Edukasi (Manajemen)
Route::get('/pendaftaran-edukasi', [PendaftaranEdukasiController::class, 'index'])->name('pendaftaran-edukasi.index');
Route::get('/pendaftaran-edukasi/{pendaftaranEdukasi}', [PendaftaranEdukasiController::class, 'tampilkan'])->name('pendaftaran-edukasi.tampilkan');
Route::put('/pendaftaran-edukasi/{pendaftaranEdukasi}/status', [PendaftaranEdukasiController::class, 'ubahStatus'])->name('pendaftaran-edukasi.status');
Route::delete('/pendaftaran-edukasi/{pendaftaranEdukasi}', [PendaftaranEdukasiController::class, 'hapus'])->name('pendaftaran-edukasi.hapus');
Route::post('/pendaftaran-edukasi/{pendaftaranEdukasi}/notifikasi', [PendaftaranEdukasiController::class, 'kirimNotifikasi'])->name('pendaftaran-edukasi.notifikasi');

// Aturan Edukasi (CRUD)
Route::get('/aturan-edukasi', [AturanEdukasiController::class, 'index'])->name('aturan-edukasi.index');
Route::post('/aturan-edukasi', [AturanEdukasiController::class, 'simpan'])->name('aturan-edukasi.simpan');
Route::put('/aturan-edukasi/{aturanEdukasi}', [AturanEdukasiController::class, 'update'])->name('aturan-edukasi.update');
Route::delete('/aturan-edukasi/{aturanEdukasi}', [AturanEdukasiController::class, 'hapus'])->name('aturan-edukasi.hapus');
Route::put('/aturan-edukasi/{aturanEdukasi}/toggle', [AturanEdukasiController::class, 'toggleAktif'])->name('aturan-edukasi.toggle');

// Repositori Proyek (File Browser ala GitHub)
Route::get('/repositori', [RepositoriController::class, 'index'])->name('repositori');
Route::get('/repositori/file', [RepositoriController::class, 'lihatFile'])->name('repositori.file');
Route::get('/repositori/api/stats', [RepositoriController::class, 'apiStats'])->name('repositori.api.stats');
