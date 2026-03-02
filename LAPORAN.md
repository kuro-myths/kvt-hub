# 📋 LAPORAN AUDIT — KVT Hub Platform

> **Tanggal Audit:** 2 Maret 2026  
> **Versi:** v8.0  
> **Stack:** Laravel 12 · PHP 8.2+ · Blade · Tailwind CSS v4 · OpenAI GPT-4o-mini  
> **Layout Utama:** `resources/views/tata-letak/utama.blade.php` (~6.974 baris)

---

## 📑 Daftar Isi

1. [Ringkasan Perubahan](#1-ringkasan-perubahan)
2. [File yang Dibuat / Dimodifikasi](#2-file-yang-dibuat--dimodifikasi)
3. [Header & Navigasi](#3-header--navigasi)
4. [Semua Route](#4-semua-route)
5. [Struktur Folder View](#5-struktur-folder-view)
6. [Controller](#6-controller)
7. [Model (Eloquent)](#7-model-eloquent)
8. [K-Arma AI Widget](#8-k-arma-ai-widget)
9. [Sistem Notifikasi](#9-sistem-notifikasi)
10. [Pencarian](#10-pencarian)
11. [Staff Hub Landing Page](#11-staff-hub-landing-page)
12. [Statistik Proyek](#12-statistik-proyek)

---

## 1. Ringkasan Perubahan

### Session 1 — Restrukturisasi
- Menghapus VTuber AI dari halaman utama
- Restrukturisasi menu Jenjang dengan prodi di bawah S1/S2/S3

### Session 2 — Widget & Navigasi
- Membuat floating AI widget (awalnya Kuro AI)
- Menambahkan toggle button AI & Settings di header
- Konsolidasi navigasi dari 13 halaman → 2 halaman

### Session 3 — K-Arma AI & Fitur Baru
- Rename Kuro AI → **K-Arma AI** dengan gambar karakter PNG asli
- Menambahkan **3 halaman navigasi** (24 menu / 8 per halaman)
- Membuat **Staff Hub** dengan menu dropdown 6 sub-item
- Membangun **Sistem Notifikasi** full-stack (model, migration, controller, API, frontend polling 30 detik)
- Memperluas fitur AI: import dokumen/gambar/video, generate video AI, 8 tool chips

### Session 4 — Polish & Laporan
- Menghilangkan background gradient avatar → PNG transparan asli
- Menampilkan kedua gambar K-Arma (robot icon + full-body karakter)
- Memperluas chat footer: 4 tombol attach (doc, image, video, AI video gen)
- Memperluas Staff Hub: 10 section (hero, stats, pimpinan, divisi, proker, struktur, nilai, alumni, testimoni, rekrutmen, FAQ)

---

## 2. File yang Dibuat / Dimodifikasi

### ✅ File Baru

| File | Deskripsi | Baris |
|------|-----------|-------|
| `app/Models/Notification.php` | Model notifikasi dengan scope & tipe | ~70 |
| `app/Http/Controllers/NotificationController.php` | API notifikasi (index + markAsRead) | ~98 |
| `database/migrations/2025_01_15_000001_create_notifications_table.php` | Migrasi + 5 seed notifikasi | ~110 |
| `resources/views/halaman/staff-hub.blade.php` | Landing page Staff Hub | ~393 |
| `public/k-arma/karakter.svg` | SVG avatar placeholder K-Arma | ~58 |
| `public/k-arma/k-arma.png` | Gambar robot mascot (user upload) | — |
| `public/k-arma/karakter.png` | Gambar full-body karakter (user upload) | — |

### ✏️ File Dimodifikasi

| File | Perubahan |
|------|-----------|
| `resources/views/tata-letak/utama.blade.php` | K-Arma widget, page 3 nav, Staff dropdown, notifikasi JS, file upload UI |
| `routes/web.php` | Route `/staff-hub`, `/api/notifications`, `/api/notifications/read` |

---

## 3. Header & Navigasi

### Header Top Row
Letak: `utama.blade.php` ~L930-L1060

| Komponen | Fungsi |
|----------|--------|
| Logo KVT Hub | Brand identity + link beranda |
| Tombol Pencarian 🔍 | `bukaSearch()`, shortcut `Ctrl+K` |
| Navigasi Halaman `◀ 1 2 3 ▶` | Scroll antar 3 halaman nav |
| Tombol "Lainnya" | Buka overlay semua menu sekaligus |
| Input Halaman `1/3` | Input manual nomor halaman |
| Toggle K-Arma AI 🤖 | Show/hide widget AI, status dot hijau |
| Toggle Pengaturan ⚙️ | Show/hide sidebar settings, status dot hijau |
| Notifikasi 🔔 | Dropdown notifikasi real-time, badge counter |
| Auth (Masuk/Daftar) | Login/register atau user dropdown |

### Navigasi Bottom Row — 3 Halaman (24 Menu)

| Halaman | # | Menu ID | Label | Icon |
|---------|---|---------|-------|------|
| **1/3 — Utama** | 1 | `beranda` | Beranda | `fa-home` |
| | 2 | `jenjang` | Jenjang | `fa-graduation-cap` |
| | 3 | `platform` | Platform | `fa-cubes` |
| | 4 | `kerjasama` | Kerja Sama | `fa-handshake` |
| | 5 | `berita` | Berita | `fa-newspaper` |
| | 6 | `tentang` | Tentang | `fa-info-circle` |
| | 7 | `riset` | Riset | `fa-microscope` |
| | 8 | `karir` | Karir | `fa-briefcase` |
| **2/3 — Layanan** | 9 | `komunitas` | Komunitas | `fa-users` |
| | 10 | `sertifikasi` | Sertifikasi | `fa-award` |
| | 11 | `langganan` | Langganan | `fa-crown` |
| | 12 | `sumberdaya` | Sumber Daya | `fa-database` |
| | 13 | `keamanan` | Keamanan | `fa-shield-alt` |
| | 14 | `kurikulum` | Kurikulum | `fa-book-reader` |
| | 15 | `panduan` | Panduan | `fa-project-diagram` |
| | 16 | `donasi` | Donasi | `fa-hand-holding-heart` |
| **3/3 — Staff & Ekstra** | 17 | `staff` | Staff | `fa-user-tie` |
| | 18 | `media` | Media | `fa-play-circle` |
| | 19 | `dokumen` | Dokumen | `fa-file-alt` |
| | 20 | `bantuan` | Bantuan | `fa-life-ring` |
| | 21 | `edukasi` | Edukasi Gratis | `fa-gift` |
| | 22 | `statistik` | Statistik | `fa-chart-line` |
| | 23 | `webinar` | Webinar | `fa-video` |
| | 24 | `beasiswa` | Beasiswa | `fa-award` |

### Staff Dropdown Sub-Menu
Letak: `utama.blade.php` ~L1812  
Route target: `/staff-hub`

| Sub-Item | Icon | Anchor |
|----------|------|--------|
| Pengurus Aktif | `fa-users-cog` | `/staff-hub` |
| Alumni Pengurus | `fa-user-graduate` | `/staff-hub#alumni` |
| Divisi & Departemen | `fa-sitemap` | `/staff-hub#divisi` |
| Struktur Organisasi | `fa-project-diagram` | `/staff-hub#struktur` |
| Riwayat Kepengurusan | `fa-history` | `/staff-hub#riwayat` |
| Rekrutmen Staff | `fa-user-plus` | `/staff-hub#rekrutmen` |

---

## 4. Semua Route

### A. Halaman Publik (HalamanController)

| URI | Route Name |
|-----|-----------|
| `/` | `beranda` |
| `/jenjang` | `halaman.jenjang` |
| `/platform` | `halaman.platform` |
| `/tentang` | `tentang` |
| `/riset` | `halaman.riset` |
| `/karir` | `halaman.karir` |
| `/komunitas` | `halaman.komunitas` |
| `/sertifikasi` | `halaman.sertifikasi` |
| `/langganan` | `halaman.langganan` |
| `/sumber-daya` | `halaman.sumber-daya` |
| `/keamanan` | `halaman.keamanan` |
| `/kurikulum-info` | `halaman.kurikulum` |
| `/panduan` | `halaman.alur-panduan` |
| `/media-info` | `halaman.media` |
| `/dokumen-info` | `halaman.dokumen` |
| `/bantuan` | `halaman.bantuan` |
| `/statistik` | `halaman.statistik` |
| `/akun` | `halaman.akun` |
| `/webinar` | `halaman.webinar` |
| `/beasiswa` | `halaman.beasiswa` |
| `/laboratorium` | `halaman.laboratorium` |
| `/perpustakaan` | `halaman.perpustakaan` |
| `/forum` | `halaman.forum` |
| `/mentoring` | `halaman.mentoring` |
| `/magang` | `halaman.magang` |
| `/alumni` | `halaman.alumni` |
| `/portofolio` | `halaman.portofolio` |
| `/kompetisi` | `halaman.kompetisi` |
| `/workshop` | `halaman.workshop` |
| `/jurnal` | `halaman.jurnal` |
| `/podcast` | `halaman.podcast` |
| `/pelatihan` | `halaman.pelatihan` |
| `/konsultasi` | `halaman.konsultasi` |
| `/e-learning` | `halaman.e-learning` |
| `/akreditasi` | `halaman.akreditasi` |
| `/galeri` | `halaman.galeri` |
| `/pengumuman` | `halaman.pengumuman` |
| `/repositori` | `halaman.repositori` |
| `/layanan` | `halaman.layanan` |
| `/kuro` | `halaman.kuro` |
| `/bejotaro` | `halaman.bejotaro` |
| `/veteran` | `halaman.veteran` |

### B. Halaman Statis (Route::view)

| URI | View |
|-----|------|
| `/lisensi` | `halaman.lisensi` |
| `/sponsor` | `halaman.sponsor` |
| `/universe` | `halaman.universe` |
| `/donasi` | `halaman.donasi` |
| `/staff-hub` | `halaman.staff-hub` |
| `/penjamin-mutu` | `halaman.penjamin-mutu` |

### C. Ekosistem — 55 Halaman Statis (Route::view)

**Teknologi:** `inkubator`, `akselerator`, `startup-hub`, `hackathon-global`, `olimpiade`, `bootcamp`, `coding-lab`, `ai-center`, `cyber-security`, `data-science`, `iot-lab`, `cloud-computing`, `blockchain-center`, `vr-ar-lab`, `robotika`, `game-dev`

**Kreatif:** `desain-grafis`, `fotografi`, `videografi`, `musik-digital`, `animasi-3d`, `ui-ux-studio`, `content-creator`

**Bisnis Digital:** `digital-marketing`, `seo-sem`, `bisnis-digital`, `fintech`, `agritech`, `healthtech`, `edtech`, `greentech`, `legaltech`

**Humaniora & Sains:** `bahasa-asing`, `sastra-budaya`, `penelitian-sosial`, `psikologi-pendidikan`, `hukum-regulasi`, `ekonomi-keuangan`, `manajemen-bisnis`, `hubungan-internasional`, `administrasi-publik`

**Teknik:** `arsitektur`, `teknik-sipil`, `teknik-mesin`, `teknik-elektro`, `teknik-informatika`, `sistem-informasi`

**Kesehatan:** `kedokteran`, `farmasi`, `keperawatan`, `gizi-kesehatan`

**Lainnya:** `lingkungan-hidup`, `pariwisata`, `perhotelan`, `tata-boga`, `olahraga`, `pertukaran-pelajar`, `studi-banding`, `kelas-industri`

### D. Sub-Halaman (Route::view)

| Prefix | Sub-page |
|--------|----------|
| `/pendidikan-dasar/` | `tk-paud`, `sd-mi`, `smp-mts`, `sma-ma`, `smk-teknologi`, `smk-bisnis`, `smk-kesehatan` |
| `/pendidikan-tinggi/` | `diploma`, `sarjana`, `magister`, `doktoral`, `post-doktoral`, `profesi` |
| `/tentang/` | `profil-kuro` |
| `/riset/` | `publikasi`, `kolaborasi`, `inovasi-paten`, `konferensi` |
| `/karir/` | `lowongan`, `magang`, `mentoring`, `cv-builder` |
| `/komunitas/` | `forum-diskusi`, `study-group`, `alumni-network`, `hackathon`, `open-source` |
| `/sertifikasi/` | `kompetensi-nasional`, `cloud-tech`, `blockchain-credential` |
| `/sumber-daya/` | `ebook-modul`, `dataset`, `dev-tools` |
| `/keamanan/` | `tata-kelola-it`, `privasi-data` |
| `/kurikulum/` | `silabus`, `rps-template`, `kalender-akademik`, `learning-outcomes` |
| `/panduan/` | `flowchart-sistem`, `panduan-pengguna`, `sop-prosedur`, `faq-bantuan` |
| `/media/` | `video-tutorial`, `webinar-event`, `podcast-audio`, `galeri-foto` |
| `/dokumen/` | `kebijakan-privasi`, `template-administrasi`, `surat-formulir`, `arsip-regulasi` |

### E. Berita, Kerja Sama, Edukasi (Controller)

| Method | URI | Controller | Name |
|--------|-----|-----------|------|
| GET | `/berita` | `BeritaController@index` | `berita.index` |
| GET | `/berita/{berita}` | `BeritaController@tampilkan` | `berita.tampilkan` |
| GET | `/kerja-sama` | `KerjaSamaController@index` | `kerja-sama.index` |
| GET | `/kerja-sama/{kerjaSama}` | `KerjaSamaController@tampilkan` | `kerja-sama.tampilkan` |
| GET | `/edukasi-gratis` | `EdukasiGratisController@index` | `edukasi-gratis.index` |
| GET | `/edukasi-gratis/{edukasiGratis}` | `EdukasiGratisController@tampilkan` | `edukasi-gratis.tampilkan` |

### F. API Publik

| Method | URI | Handler |
|--------|-----|---------|
| GET | `/api/berita/ticker` | `BeritaController@ticker` |
| GET | `/api/berita/popup` | `BeritaController@popup` |
| GET | `/api/pengunjung/statistik` | `PengunjungController@statistikRealtime` |
| GET | `/api/pengunjung/flag-counter` | `PengunjungController@flagCounter` |
| GET | `/api/pengunjung/grafik-mingguan` | `PengunjungController@grafikMingguan` |
| GET | `/api/pengunjung/grafik-per-jam` | `PengunjungController@grafikPerJam` |
| GET | `/api/pengunjung/halaman-populer` | `PengunjungController@halamanPopuler` |
| GET | `/api/search` | `SearchController@cari` |
| GET | `/api/notifications` | `NotificationController@index` |
| POST | `/api/notifications/read` | `NotificationController@markAsRead` |
| POST | `/api/chat/guest-session` | `ChatController@guestSession` |
| POST | `/api/chat/send` | `ChatController@floatingWidgetSend` |

### G. Autentikasi (Guest Middleware)

| Method | URI | Name |
|--------|-----|------|
| GET | `/masuk` | `masuk` |
| POST | `/masuk` | — |
| GET | `/daftar` | `daftar` |
| POST | `/daftar` | — |
| GET | `/daftar-pengajar` | `daftar.pengajar` |
| POST | `/daftar-pengajar` | `daftar.pengajar.simpan` |
| GET | `/masuk-admin` | `masuk.admin` |
| POST | `/masuk-admin` | — |
| GET | `/auth/google` | `auth.google` |
| GET | `/auth/google/callback` | — |
| GET | `/auth/github` | `auth.github` |
| GET | `/auth/github/callback` | — |
| POST | `/keluar` | `keluar` |

### H. Route Autentikasi (Auth Middleware)

| Method | URI | Name |
|--------|-----|------|
| GET | `/verifikasi-status` | `verifikasi.status` |
| GET | `/dasbor` | `dasbor` |
| GET | `/kelas` | `kelas.index` |
| GET | `/kelas/{kelas}` | `kelas.tampilkan` |
| POST | `/kelas/{kelas}/gabung` | `kelas.gabung` |
| GET | `/kelas-baru` | `kelas.buat` |
| POST | `/kelas-baru` | `kelas.simpan` |
| GET | `/materi-baru` | `materi.buat` |
| POST | `/materi-baru` | `materi.simpan` |
| GET | `/materi/{materi}` | `materi.tampilkan` |
| GET | `/materi/{materi}/buku` | `materi.buku` |
| POST | `/materi/{materi}/selesai` | `materi.selesai` |
| GET | `/kuis/{kuis}` | `kuis.mulai` |
| POST | `/kuis/{kuis}` | `kuis.kirim` |
| GET | `/laporan` | `laporan.index` |
| GET | `/laporan/buat` | `laporan.buat` |
| POST | `/laporan` | `laporan.simpan` |
| GET | `/diagram-builder` | `laporan.builder` |
| GET | `/diagram-builder/{laporan}` | `laporan.builder-edit` |
| POST | `/diagram-builder/simpan` | `laporan.simpan-builder` |
| GET | `/laporan/{laporan}/json` | `laporan.json` |
| DELETE | `/laporan/{laporan}` | `laporan.hapus` |
| GET | `/laporan/{laporan}` | `laporan.tampilkan` |
| GET | `/pendaftaran-edukasi/{id}` | `pendaftaran-edukasi.buat` |
| POST | `/pendaftaran-edukasi/{id}` | `pendaftaran-edukasi.simpan` |
| GET | `/riwayat-pendaftaran` | `pendaftaran-edukasi.riwayat` |

### I. Chat & Code Executor (Auth)

**Chat:** 8 route (index, create, sessions, show, send, archive, delete, feedback)  
**Code Executor:** 16 route (index, editor, execute, validate, snippet CRUD, AI analyze/explain/debug/optimize/suggestions, history, learning-paths, explore)

---

## 5. Struktur Folder View

```
resources/views/
├── tata-letak/
│   └── utama.blade.php              (~6.974 baris — layout utama)
├── halaman/                          (~100+ file blade)
│   ├── staff-hub.blade.php           (393 baris — BARU)
│   ├── jenjang-pendidikan.blade.php  (771 baris)
│   ├── platform.blade.php            (613 baris)
│   ├── repositori.blade.php          (643 baris)
│   ├── sertifikasi.blade.php         (435 baris)
│   ├── kuro.blade.php                (1.311 baris)
│   ├── bejotaro.blade.php            (442 baris)
│   ├── veteran.blade.php             (502 baris)
│   ├── bantuan.blade.php             (400 baris)
│   ├── penjamin-mutu.blade.php       (393 baris)
│   ├── tentang.blade.php             (377 baris)
│   ├── komunitas.blade.php           (294 baris)
│   ├── riset-inovasi.blade.php       (285 baris)
│   ├── sumber-daya.blade.php         (282 baris)
│   ├── media.blade.php               (262 baris)
│   ├── keamanan.blade.php            (256 baris)
│   ├── statistik.blade.php           (250 baris)
│   ├── langganan.blade.php           (247 baris)
│   ├── donasi.blade.php              (243 baris)
│   ├── karir-industri.blade.php      (242 baris)
│   ├── kompetisi.blade.php           (238 baris)
│   ├── pelatihan.blade.php           (239 baris)
│   ├── forum.blade.php               (238 baris)
│   ├── akun.blade.php                (231 baris)
│   ├── portofolio.blade.php          (230 baris)
│   ├── perpustakaan.blade.php        (228 baris)
│   ├── kurikulum.blade.php           (228 baris)
│   ├── laboratorium.blade.php        (227 baris)
│   ├── jurnal.blade.php              (226 baris)
│   ├── podcast.blade.php             (227 baris)
│   ├── workshop.blade.php            (226 baris)
│   ├── akreditasi.blade.php          (223 baris)
│   ├── lisensi.blade.php             (223 baris)
│   ├── alumni.blade.php              (221 baris)
│   ├── dokumen.blade.php             (220 baris)
│   ├── alur-panduan.blade.php        (219 baris)
│   ├── mentoring.blade.php           (215 baris)
│   ├── beasiswa.blade.php            (214 baris)
│   ├── sponsor.blade.php             (213 baris)
│   ├── e-learning.blade.php          (206 baris)
│   ├── pengumuman.blade.php          (204 baris)
│   ├── konsultasi.blade.php          (201 baris)
│   ├── galeri.blade.php              (200 baris)
│   ├── magang.blade.php              (195 baris)
│   ├── webinar.blade.php             (192 baris)
│   ├── layanan.blade.php             (251 baris)
│   ├── universe.blade.php            (294 baris)
│   ├── [55 ekosistem blade files]    (~83 baris masing-masing)
│   │
│   ├── tentang/
│   │   └── profil-kuro.blade.php
│   ├── pendidikan-dasar/             (7 file)
│   │   ├── tk-paud.blade.php
│   │   ├── sd-mi.blade.php
│   │   ├── smp-mts.blade.php
│   │   ├── sma-ma.blade.php
│   │   ├── smk-teknologi.blade.php
│   │   ├── smk-bisnis.blade.php
│   │   └── smk-kesehatan.blade.php
│   ├── pendidikan-tinggi/            (6 file)
│   │   ├── diploma.blade.php
│   │   ├── sarjana.blade.php
│   │   ├── magister.blade.php
│   │   ├── doktoral.blade.php
│   │   ├── post-doktoral.blade.php
│   │   └── profesi.blade.php
│   ├── riset/                        (4 file)
│   ├── karir/                        (4 file)
│   ├── komunitas/                    (5 file)
│   ├── sertifikasi/                  (3 file)
│   ├── sumber-daya/                  (3 file)
│   ├── keamanan/                     (2 file)
│   ├── kurikulum/                    (4 file)
│   ├── alur-panduan/                 (4 file)
│   ├── media/                        (4 file)
│   └── dokumen/                      (4 file)
│
├── beranda/                          (komponen beranda)
├── berita/                           (index, tampilkan)
├── kerja-sama/                       (index, tampilkan)
├── edukasi-gratis/                   (index, tampilkan)
├── auth/                             (masuk, daftar, admin)
├── kelas/                            (CRUD views)
├── materi/                           (CRUD + buku views)
├── kuis/                             (mulai views)
├── laporan/                          (CRUD + builder views)
├── chat/                             (index, create, show)
├── code-executor/                    (index, editor)
└── komponen/                         (shared partials)
```

---

## 6. Controller

### Top-Level (`app/Http/Controllers/`)

| Controller | Baris | Deskripsi |
|------------|-------|-----------|
| `AuthController.php` | 277 | Login, register, Google/GitHub OAuth |
| `SearchController.php` | 136 | API pencarian (`/api/search`) |
| `PengunjungController.php` | 82 | Statistik pengunjung real-time |
| `KelasController.php` | 78 | CRUD kelas pembelajaran |
| `MateriController.php` | 90 | CRUD materi + mode buku |
| `KuisController.php` | 59 | Mulai & kirim kuis |
| `LaporanController.php` | 129 | CRUD laporan + diagram builder |
| `OrganisasiController.php` | 47 | Data organisasi kemahasiswaan |
| `ChatController.php` | 287 | AI chat (GPT-4o-mini), session management |
| `CodeExecutorController.php` | 414 | Code editor, executor, AI code tools |
| `NotificationController.php` | 98 | **BARU** — API notifikasi real-time |

### Landing (`app/Http/Controllers/Landing/`)

| Controller | Baris | Deskripsi |
|------------|-------|-----------|
| `BerandaController.php` | 72 | Halaman beranda utama |
| `HalamanController.php` | 227 | 40+ method untuk halaman statis |
| `BeritaController.php` | 40 | Berita publik + ticker/popup API |
| `KerjaSamaController.php` | 21 | Halaman kerja sama |
| `EdukasiGratisController.php` | 49 | Edukasi gratis + kategori filter |
| `PendaftaranEdukasiController.php` | 182 | Pendaftaran edukasi + riwayat |

---

## 7. Model (Eloquent)

Folder: `app/Models/` — **18 model**

| Model | Baris | Tabel | Deskripsi |
|-------|-------|-------|-----------|
| `User.php` | 307 | `users` | Autentikasi, peran, XP/level (100 level) |
| `Berita.php` | 110 | `beritas` | Berita dengan scope `terbit()` |
| `Pengunjung.php` | 129 | `pengunjungs` | Tracking pengunjung + geo IP |
| `Kelas.php` | 57 | `kelas` | Kelas pembelajaran |
| `Materi.php` | 64 | `materis` | Materi kelas + progress |
| `Kuis.php` | 35 | `kuis` | Kuis per materi |
| `Laporan.php` | 104 | `laporans` | Laporan + diagram JSON |
| `Organisasi.php` | 109 | `organisasis` | Organisasi kemahasiswaan |
| `KerjaSama.php` | 134 | `kerja_samas` | Partnership universitas/industri |
| `EdukasiGratis.php` | 90 | `edukasi_gratis` | Program edukasi gratis |
| `PendaftaranEdukasi.php` | 113 | `pendaftaran_edukasis` | Pendaftaran program edukasi |
| `ChatSession.php` | 80 | `chat_sessions` | Sesi chat AI (UUID) |
| `ChatMessage.php` | 75 | `chat_messages` | Pesan dalam sesi chat |
| `CodeSnippet.php` | 80 | `code_snippets` | Snippet kode tersimpan |
| `CodeExecution.php` | 73 | `code_executions` | Riwayat eksekusi kode |
| `ProgrammingLanguage.php` | 56 | `programming_languages` | Bahasa pemrograman |
| `LearningPath.php` | 45 | `learning_paths` | Learning path edukasi |
| `Notification.php` | 70 | `notifications` | **BARU** — Notifikasi sistem |

---

## 8. K-Arma AI Widget

Letak: `utama.blade.php` ~L4158-L4244

### Komponen

| Bagian | Gambar | Deskripsi |
|--------|--------|-----------|
| Tombol floating (pojok kanan bawah) | `k-arma.png` | Robot mascot hitam-merah, 44x44 rounded |
| Header panel chat | `k-arma.png` | Avatar di header "K-Arma AI · Online · GPT-4o" |
| Welcome message karakter | `karakter.png` | Full-body character dalam intro card |
| Avatar bot reply (JS) | `k-arma.png` | Avatar kecil 28x28 di setiap response |

### 8 Tool Chips (Fitur AI)

| # | Fitur | Icon | Deskripsi |
|---|-------|------|-----------|
| 1 | Analisis Dokumen | `fa-file-pdf` | PDF, DOC, DOCX, TXT, CSV, XLSX |
| 2 | Analisis Gambar | `fa-image` | PNG, JPG, GIF, WebP, SVG |
| 3 | Analisis Video | `fa-video` | MP4, WebM, MOV, AVI |
| 4 | Generate Video | `fa-film` | AI auto-generate (NanoBanana-style) |
| 5 | Rekomendasi Prodi | `fa-graduation-cap` | Saran program studi |
| 6 | Riset & Analisis | `fa-search` | Analisis data & riset |
| 7 | Multi Bahasa | `fa-language` | Dukungan banyak bahasa |
| 8 | AI Kreatif | `fa-magic` | Konten kreatif & brainstorm |

### Chat Footer — 4 Tombol Attach

| Tombol | Accept | Deskripsi |
|--------|--------|-----------|
| 📄 Dokumen | `.pdf,.doc,.docx,.txt,.csv,.xlsx` | Import & analisis dokumen |
| 🖼️ Gambar | `.png,.jpg,.jpeg,.gif,.webp,.svg` | Analisis visual AI |
| 🎬 Video | `.mp4,.webm,.mov,.avi` | Analisis konten video |
| 🎥 AI Video | — | Mode generate video (prompt interaktif) |

### 5 Quick-Ask Buttons

1. "Apa itu KVT Hub?"
2. "Buat video"
3. "Rekomendasi prodi"
4. "Tren edukasi"
5. "Info beasiswa"

---

## 9. Sistem Notifikasi

### Backend

| Komponen | File | Deskripsi |
|----------|------|-----------|
| Model | `app/Models/Notification.php` | Tabel `notifications`, timestamps custom |
| Controller | `app/Http/Controllers/NotificationController.php` | 2 endpoint API |
| Migrasi | `database/migrations/2025_01_15_000001_...` | Schema + 5 seed data |

### Tipe Notifikasi

| Konstanta | Label Badge | Warna |
|-----------|-------------|-------|
| `fitur_baru` | BARU | Pink |
| `pembaruan` | UPDATE | Blue |
| `informasi` | INFO | Default |
| `promosi` | PROMO | Amber |
| `sistem` | SISTEM | Gray |
| `event` | EVENT | Green |
| `berita` | BERITA | Blue |

### API Endpoints

| Method | URI | Auth | Deskripsi |
|--------|-----|------|-----------|
| GET | `/api/notifications` | Publik | Merge notif sistem + berita, sorted by time, max 15 |
| POST | `/api/notifications/read` | Auth | Mark notifikasi sebagai dibaca |

### Frontend JS

| Fitur | Deskripsi |
|-------|-----------|
| Auto-fetch | Load saat dropdown dibuka |
| Polling 30 detik | Update badge counter otomatis |
| Fallback | Jika API gagal, fallback ke `/api/berita/popup` |
| Read state | localStorage `kvt_notif_dibaca_v2` |
| Badge types | Warna berbeda per tipe notifikasi |
| Timestamp | Format waktu relatif (baru saja, jam lalu, dll) |

---

## 10. Pencarian

Letak: `utama.blade.php` — overlay search + `SearchController`

| Komponen | Deskripsi |
|----------|-----------|
| Shortcut | `Ctrl+K` |
| 3 Mode | KVT Hub (internal), Web Search, AI Explorer |
| Debounce | Pencarian otomatis setelah berhenti mengetik |
| API | `GET /api/search?q={query}` |
| Sumber data | Berita, Kelas, Materi, KerjaSama, halaman statis |
| Controller | `SearchController@cari` (136 baris) |

---

## 11. Staff Hub Landing Page

Letak: `resources/views/halaman/staff-hub.blade.php` (393 baris)  
Route: `GET /staff-hub`

### 10 Section

| # | Section | Deskripsi |
|---|---------|-----------|
| 1 | Hero | Banner utama dengan CTA "Lihat Pengurus" & "Daftar Staff" |
| 2 | Stats | 6 kartu: 50+ Staff, 8 Divisi, 120+ Alumni, 5 Periode, 30+ Program, 15+ Pencapaian |
| 3 | Pimpinan Inti | 3 kartu: Ketua Umum, Wakil Ketua, Sekretaris & Bendahara |
| 4 | Divisi | 8 kartu divisi dengan jumlah anggota |
| 5 | Program Kerja | 6 program dengan progress bar (K-Arma AI 75%, Kurikulum v3 60%, dll) |
| 6 | Struktur Organisasi | Visual org chart: Ketua → Wakil/Sekretaris/Bendahara → 8 Divisi |
| 7 | Nilai & Budaya | 6 nilai: Inovatif, Kolaboratif, Proaktif, Berdedikasi, Inklusif, Terus Belajar |
| 8 | Alumni Pengurus | 5 periode (2021-2026) dengan highlight pencapaian |
| 9 | Testimoni | 3 testimoni dari staff/alumni |
| 10 | Rekrutmen | Benefits (4), Steps (3), CTA + FAQ (5 pertanyaan accordion) |

### 8 Divisi

| Divisi | Anggota |
|--------|---------|
| Teknologi & Pengembangan | 12 |
| Konten & Akademik | 8 |
| Desain & Kreatif | 6 |
| Hubungan Masyarakat | 7 |
| Keuangan & Operasional | 5 |
| Riset & Inovasi | 6 |
| Keamanan & Mutu | 4 |
| Komunitas & Event | 8 |

---

## 12. Statistik Proyek

| Kategori | Jumlah |
|----------|--------|
| Total definisi route | ~160+ |
| Controller (top-level) | 11 |
| Controller (landing) | 6 |
| Model Eloquent | 18 |
| Menu navigasi | 24 (3 halaman × 8) |
| File blade halaman (top-level) | ~100+ |
| Subdirektori halaman | 13 |
| File blade sub-halaman | ~50 |
| Ekosistem halaman statis | 55 |
| Total baris `utama.blade.php` | ~6.974 |
| Total baris `staff-hub.blade.php` | ~393 |
| API endpoints publik | 12 |
| OAuth providers | 2 (Google, GitHub) |
| Peran user | 7 (admin, staff, pengajar, siswa, mahasiswa, orang_tua, pengunjung) |
| Sistem level XP | 100 level |
| Polling notifikasi | Setiap 30 detik |
| localStorage version | v5 |

---

> **Catatan:** Jalankan `php artisan migrate` untuk membuat tabel `notifications` dengan 5 seed data bawaan.  
> Pastikan file `public/k-arma/k-arma.png` dan `public/k-arma/karakter.png` tersedia.

---

*Laporan ini di-generate otomatis berdasarkan audit kode pada 2 Maret 2026.*
