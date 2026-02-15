# KVT Hub - Global Education & Research Ecosystem

> **Ekosistem pendidikan, karir, dan riset digital global. Dari TK hingga S3/PhD, profesi, industri, dan riset.**

![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?logo=php)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-14+-336791?logo=postgresql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green)
![ISO](https://img.shields.io/badge/ISO-27001-brightgreen)
![COBIT](https://img.shields.io/badge/COBIT-2019-blue)
![Version](https://img.shields.io/badge/Version-4.0-orange)
![Pages](https://img.shields.io/badge/Halaman-66+-blueviolet)
![Menus](https://img.shields.io/badge/Menu-16-teal)

---

## Tentang

KVT Hub v4.0 adalah ekosistem pembelajaran, karir, dan riset digital terdepan yang mengintegrasikan 13 jenjang pendidikan (TK hingga S3/PhD) dengan teknologi gamifikasi RPG, kolaborasi riset global, dan standar keamanan enterprise. Platform ini menghubungkan pelajar, peneliti, profesional, dan industri dalam satu ekosistem terintegrasi dengan **16 menu utama**, **66+ halaman landing page**, dan **55+ rute** terstruktur.

### Apa yang Baru di v4.0

- **16 Menu Navigasi** -- Dari 12 menjadi 16 menu: +Kurikulum, +Alur & Panduan, +Media, +Dokumen
- **66+ Halaman Landing Page** -- 16 halaman induk + 50+ subhalaman, masing-masing 200-377 baris
- **Beranda Terpisah (Auth/Guest)** -- Dashboard personalisasi untuk pengguna yang login vs halaman publik untuk tamu
- **Expanded Content** -- Semua halaman diperkaya: Hero, Konten Card, Statistik, Video, Fitur per Peran, FAQ, CTA
- **9 Ilustrasi SVG Kustom** -- Gambar pendukung di hero section halaman utama
- **4 Kategori Menu Baru**: Kurikulum (silabus, RPS, kalender), Alur & Panduan (flowchart, SOP, FAQ), Media (video, webinar, podcast, galeri), Dokumen (kebijakan, template, formulir, arsip)
- **Fitur per Peran** -- Setiap halaman menampilkan fitur berbeda untuk Siswa, Guru, dan Admin
- **FAQ Accordion** -- Setiap halaman dilengkapi FAQ interaktif dengan `<details>/<summary>`
- **PostgreSQL** -- Migrasi dari MySQL ke PostgreSQL untuk performa dan skalabilitas
- **Real-Time Visitor Analytics** -- Pelacakan pengunjung real-time dengan auto-refresh setiap 15 detik
- **Flag Counter Widget** -- Menampilkan asal negara pengunjung dengan bendera, diambil dari database
- **News Ticker dari Database** -- Berita berjalan otomatis di header, diambil langsung dari tabel berita
- **Popup Berita** -- Notifikasi berita terbaru saat kunjungan pertama (toggleable)
- **Search Engine Fungsional** -- Pencarian backend yang query database (berita, kelas, materi, mitra)
- **Kerja Sama & Sponsor Hub** -- Halaman mitra dengan sistem tier (Platinum/Gold/Silver/Bronze/Community)
- **Admin CRUD** -- Kelola berita, mitra, pengunjung lengkap
- **Admin Analytics Dashboard** -- Dashboard pengunjung dengan grafik mingguan, per jam, negara teratas

## Arsitektur Ekosistem

```
                           +---------------------------+
                           |      KVT Hub v4.0         |
                           |  Global Education & Riset |
                           +-------------+-------------+
                                         |
  +--------+--------+--------+--------+--+--+--------+--------+--------+
  |        |        |        |        |     |        |        |        |
Jenjang  Riset    Karir   Komu-   Serti-  Sumber  Keama-  Penja-   Kuriku-
Pendi-   & Ino-   & In-   nitas   fikasi   Daya    nan     min      lum
dikan    vasi     dustri                          (ISO)    Mutu    (Akademik)
(TK-S3)  (Lab)   (500+)  (50K+)  (120+)  (17K+)  27001   QA/QC
  |                                                                  |
  |  +--------+--------+--------+                                    |
  |  |        |        |        |                                    |
  | Alur &   Media   Dokumen  Search                                 |
  | Panduan  (AV)    (Legal)  Engine                                 |
  | (SOP)                                                            |
  |                                                                  |
  +--- Berita --- Kerja Sama --- Pengunjung Analytics ---------------+
```

## 12 Pilar Ekosistem (16 Menu)

| No  | Pilar              | Menu             | Subhalaman | Deskripsi                                           | Highlight               |
| --- | ------------------ | ---------------- | ---------- | --------------------------------------------------- | ----------------------- |
| 1   | Jenjang Pendidikan | Jenjang          | 13         | TK, SD, SMP, SMA, SMK, D1-D3, S1, S2, S3, Profesi   | 13 jenjang terintegrasi |
| 2   | Riset & Inovasi    | Riset & Inovasi  | 4          | Research Hub, jurnal, konferensi, paten             | 150+ universitas mitra  |
| 3   | Karir & Industri   | Karir & Industri | 4          | Job matching, magang, mentoring, CV builder         | 500+ perusahaan mitra   |
| 4   | Komunitas          | Komunitas        | 5          | Forum, study group, alumni, hackathon, open source  | 50,000+ anggota         |
| 5   | Sertifikasi        | Sertifikasi      | 3          | Kompetensi, industri (AWS/Google/MS), blockchain    | 120+ program            |
| 6   | Sumber Daya        | Sumber Daya      | 3          | E-Book, dataset, coding playground, API, template   | 17,000+ resources       |
| 7   | Keamanan           | Keamanan         | 2          | ISO 27001, COBIT 2019, UU ITE & PDP, Zero Trust     | AES-256, MFA, WAF       |
| 8   | Penjamin Mutu      | Penjamin Mutu    | —          | QA/QC, SPK (AHP/TOPSIS/SAW), CRM, PDCA              | NPS 72, SLA 98%         |
| 9   | Kurikulum          | Kurikulum        | 4          | Silabus, RPS, kalender akademik, learning outcomes  | Merdeka/Cambridge/IB    |
| 10  | Alur & Panduan     | Alur & Panduan   | 4          | Flowchart sistem, panduan, SOP, FAQ bantuan         | Visual workflow         |
| 11  | Media              | Media            | 4          | Video tutorial, webinar, podcast, galeri foto       | Multi-format content    |
| 12  | Dokumen            | Dokumen          | 4          | Kebijakan, template admin, formulir, arsip regulasi | Legal & template hub    |

## Fitur Utama v4.0

### Beranda Terpisah (Auth vs Guest)

- **Guest (Tamu)**: Landing page publik dengan hero, statistik, kelas populer, berita, ekosistem
- **Authenticated (Login)**: Dashboard personalisasi dengan:
    - Quick stats: kelas aktif, materi selesai, kuis dikerjakan, pencapaian
    - Progress kelas dengan progress bar per kelas
    - Tugas & kuis mendatang
    - Aktivitas terbaru
    - Rekomendasi kelas
    - Quick actions untuk navigasi cepat
- Controller: `BerandaController` dengan `Auth::check()` branching

### 16 Menu Navigasi + 66 Halaman

**Baris 1 (6 Menu):**

| Menu       | Subhalaman                                                                                                                              |
| ---------- | --------------------------------------------------------------------------------------------------------------------------------------- |
| Beranda    | — (guest ↔ authenticated)                                                                                                               |
| Jenjang    | TK/PAUD, SD/MI, SMP/MTs, SMA/MA, SMK Teknologi, SMK Bisnis, SMK Kesehatan, Diploma, Sarjana, Magister, Doktoral, Post-Doktoral, Profesi |
| Platform   | Kelas, Materi, Kuis, Laporan                                                                                                            |
| Kerja Sama | — (listing + detail)                                                                                                                    |
| Tentang    | —                                                                                                                                       |
| Berita     | — (listing + detail)                                                                                                                    |

**Baris 2 (10 Menu dengan arrow slider):**

| Menu             | Subhalaman                                                            |
| ---------------- | --------------------------------------------------------------------- |
| Riset & Inovasi  | Publikasi, Kolaborasi, Inovasi & Paten, Konferensi                    |
| Karir & Industri | Mentoring, CV Builder, Lowongan, Magang                               |
| Komunitas        | Forum Diskusi, Study Group, Alumni Network, Hackathon, Open Source    |
| Sertifikasi      | Kompetensi Nasional, Cloud & Tech, Blockchain Credential              |
| Sumber Daya      | E-Book & Modul, Dataset, Dev Tools                                    |
| Keamanan         | Tata Kelola IT, Privasi Data                                          |
| Kurikulum        | Silabus, RPS Template, Kalender Akademik, Learning Outcomes           |
| Alur & Panduan   | Flowchart Sistem, Panduan Pengguna, SOP Prosedur, FAQ Bantuan         |
| Media            | Video Tutorial, Webinar & Event, Podcast & Audio, Galeri Foto         |
| Dokumen          | Kebijakan & Privasi, Template Admin, Surat & Formulir, Arsip Regulasi |

### 9 Ilustrasi SVG Kustom

| File                   | Digunakan di       | Deskripsi                  |
| ---------------------- | ------------------ | -------------------------- |
| hero-education.svg     | beranda.blade.php  | Ilustrasi pendidikan hero  |
| ecosystem-hub.svg      | —                  | Diagram ekosistem hub      |
| flowchart-alur.svg     | alur-panduan       | Flowchart alur pengguna    |
| dashboard-preview.svg  | beranda-pengguna   | Preview tampilan dashboard |
| sertifikat-preview.svg | sertifikasi        | Preview sertifikat         |
| keamanan-shield.svg    | keamanan           | Shield keamanan            |
| riset-lab.svg          | riset-inovasi      | Ilustrasi lab riset        |
| jenjang-steps.svg      | jenjang-pendidikan | Steps jenjang pendidikan   |
| komunitas-network.svg  | komunitas          | Network diagram komunitas  |

### Pola Halaman Landing Page (200-377 baris)

Setiap halaman mengikuti struktur konsisten:

1. **Hero Section** — Gradient background, judul, deskripsi, CTA buttons, statistik, ilustrasi SVG
2. **Konten Cards** — Grid 3-4 kolom dengan icon, judul, deskripsi
3. **Statistik** — Counter angka dengan label (data dari `@php` arrays)
4. **Video Section** — Embed YouTube atau thumbnail dengan modal
5. **Fitur per Peran** — Tab/card untuk Siswa, Guru, Admin dengan fitur spesifik
6. **FAQ Accordion** — `<details>/<summary>` interaktif dengan 4-6 FAQ
7. **CTA Section** — Call-to-action dengan gradient button

### Real-Time Visitor Analytics

- Pelacakan otomatis setiap pengunjung (IP, negara, browser, OS, perangkat)
- Geo-lokasi via ip-api.com (deteksi negara & kota)
- Statistik real-time: pengunjung hari ini, online sekarang, total, unik
- Auto-refresh setiap 15 detik di footer
- API endpoint: `/api/pengunjung/statistik`

### Flag Counter Widget

- Menampilkan bendera negara pengunjung dengan jumlah kunjungan
- Data diambil dari database (bukan layanan pihak ketiga)
- Grid layout di footer dengan bendera dari flagcdn.com
- API endpoint: `/api/pengunjung/flag-counter`

### News System (dari Database)

- **News Ticker**: Berita berjalan di top bar, diambil dari `/api/berita/ticker`
- **Popup Berita**: 5 berita terbaru muncul sebagai popup (toggleable, localStorage)
- **Halaman Berita**: Listing dengan filter kategori & pencarian
- **Detail Berita**: Halaman lengkap dengan share buttons & berita terkait
- 9 Kategori: Umum, Akademik, Teknologi, Riset, Karir, Keamanan, Event, Prestasi, Pengumuman
- Admin CRUD lengkap dengan opsi ticker, popup, unggulan

### Kerja Sama & Sponsor Hub

- Sistem tier: Platinum, Gold, Silver, Bronze, Community
- 5 tipe mitra: Sponsor, Mitra Akademik, Mitra Industri, Media Partner, Komunitas
- Halaman publik dengan filter dan grouping per tier
- Detail mitra dengan benefit, website, periode kerjasama
- Admin CRUD lengkap dengan upload logo

### Expanded Navigation (16 Menu + Slider)

- 6 menu baris 1: Beranda, Jenjang, Platform, Kerja Sama, Tentang, Berita
- 10 menu baris 2: Riset, Karir, Komunitas, Sertifikasi, Sumber Daya, Keamanan, Kurikulum, Alur & Panduan, Media, Dokumen
- Tombol panah kiri/kanan untuk menggeser menu baris 2
- Animasi slide smooth saat menggeser
- Mega dropdown untuk Jenjang (3 kolom), Platform (2 kolom), Kerja Sama, Tentang
- Submenu dropdown dengan animasi fade-in ke bawah
- Warna dropdown unik per menu (indigo, teal, rose, amber, dll.)

### Search Engine (3 Mode, Fungsional)

- **KVT Hub Search**: Query API backend `/api/search` -- cari di berita, kelas, materi, mitra, halaman statis
- **Web Search**: Redirect ke Google, Bing, DuckDuckGo, Scholar, GitHub, arXiv
- **AI Explorer**: Analisis kontekstual (coming soon)
- Shortcut `Ctrl+K` untuk akses cepat
- Debounced search (300ms delay)
- PostgreSQL `ilike` untuk case-insensitive search

### Admin Analytics Dashboard

- Grafik pengunjung 7 hari terakhir (bar chart)
- Grafik per jam hari ini (line chart)
- Distribusi browser (doughnut chart)
- Top 10 negara pengunjung
- Halaman paling populer
- 50 kunjungan terbaru dengan detail

### Sistem RPG & Gamifikasi

- 100 Level dengan 10 tingkatan rank (Novice -> Grandmaster)
- Sistem XP (Experience Points) dari setiap aktivitas
- Progress bar, pencapaian visual, dan leaderboard

### Video Tutorial

- Integrasi YouTube untuk konten video
- Kuis interaktif saat video berjalan
- Tracking progress per materi

### 30 Jenis Diagram

- Bar, Line, Pie, Doughnut, Radar, Polar Area, dan lainnya via Chart.js v4

### Multi-Peran

| Peran | Kemampuan                                                  |
| ----- | ---------------------------------------------------------- |
| Siswa | Belajar, ikut kelas, ambil kuis, lihat progress            |
| Guru  | Buat kelas & materi, kelola siswa, buat kuis               |
| Admin | Kelola semua data, berita, mitra, pengunjung, kunci, paket |

## Database Schema (PostgreSQL)

### Tabel Baru v3.0

| Tabel      | Kolom Utama                                                                  |
| ---------- | ---------------------------------------------------------------------------- |
| pengunjung | ip_address, halaman, negara, kode_negara, browser, os, perangkat, session_id |
| berita     | judul, slug, konten, kategori, status, tampil_ticker, tampil_popup, unggulan |
| kerja_sama | nama, slug, tipe, tier, website, logo, aktif, tampil_beranda, benefit        |

### Tabel Existing

| Tabel               | Deskripsi                         |
| ------------------- | --------------------------------- |
| users               | Pengguna (siswa/guru/admin) + RPG |
| kelas               | Kelas pembelajaran                |
| kelas_anggota       | Relasi many-to-many user-kelas    |
| materi              | Materi per kelas (video/artikel)  |
| kuis                | Kuis dengan soal JSON             |
| jawaban_kuis        | Jawaban & skor siswa              |
| laporan_kehadiran   | Laporan dengan 30 jenis diagram   |
| progress_materi     | Tracking selesai per materi       |
| pencapaian          | Achievement badges                |
| pengguna_pencapaian | Relasi user-achievement           |
| paket_eksklusif     | Paket langganan premium           |
| kunci_admin         | Kunci untuk akses admin           |

## API Endpoints

| Endpoint                          | Method | Response                                  |
| --------------------------------- | ------ | ----------------------------------------- |
| `/api/pengunjung/statistik`       | GET    | hari_ini, online, total, total_unik       |
| `/api/pengunjung/flag-counter`    | GET    | negara[], pageviews                       |
| `/api/pengunjung/grafik-mingguan` | GET    | data 7 hari [{tanggal, total}]            |
| `/api/pengunjung/grafik-per-jam`  | GET    | data 24 jam [{jam, total}]                |
| `/api/pengunjung/halaman-populer` | GET    | top 10 halaman [{halaman, total}]         |
| `/api/berita/ticker`              | GET    | 10 berita untuk ticker [{judul, slug}]    |
| `/api/berita/popup`               | GET    | 5 berita untuk popup                      |
| `/api/search?q=keyword`           | GET    | hasil[] dari berita, kelas, materi, mitra |

## Teknologi

| Kategori | Teknologi                              |
| -------- | -------------------------------------- |
| Backend  | Laravel 12, PHP 8.2+                   |
| Database | PostgreSQL 14+                         |
| Frontend | Tailwind CSS (CDN), Blade Templates    |
| Charting | Chart.js v4                            |
| Animasi  | AOS v2.3.4, CSS Snow, Ticker, Dropdown |
| Ikon     | Font Awesome 6.5.1                     |
| Font     | Google Fonts (Inter + JetBrains Mono)  |
| Geo API  | ip-api.com (free, 45 req/min)          |
| Flag CDN | flagcdn.com                            |
| Keamanan | RBAC, CSRF, XSS Protection, Auth Guard |

## Instalasi

### Prasyarat

- PHP 8.2+
- Composer
- PostgreSQL 14+
- Laragon / XAMPP / Herd

### Langkah

```bash
# Clone
git clone https://github.com/kuro-myths/kvt-hub.git
cd kvt-hub

# Install
composer install

# Environment
cp .env.example .env
php artisan key:generate

# Database PostgreSQL
# Buat database:
# createdb -U postgres kvt-hub
# Atau via psql:
# CREATE DATABASE "kvt-hub";

# Sesuaikan .env:
# DB_CONNECTION=pgsql
# DB_PORT=5432
# DB_DATABASE=kvt-hub
# DB_USERNAME=postgres
# DB_PASSWORD=

# Migrasi & Seed
php artisan migrate --seed

# Storage Link
php artisan storage:link

# Gambar fasilitas
cp -r gambar/* public/images/

# Jalankan
php artisan serve
```

Buka `http://localhost:8000` atau `http://kvt-hub.test` (Laragon).

### Akun Demo

| Peran | Email           | Password |
| ----- | --------------- | -------- |
| Admin | admin@kvthub.id | admin123 |
| Guru  | guru@kvthub.id  | guru123  |
| Siswa | siswa@kvthub.id | siswa123 |

Kunci Admin: `KVT-ADMIN-2025-SECRET`

## Struktur Proyek

```
kvt-hub/
|-- app/
|   |-- Http/
|   |   |-- Controllers/
|   |   |   |-- AdminController.php         # Admin user/kunci/paket
|   |   |   |-- AuthController.php          # Login/register/OAuth
|   |   |   |-- BerandaController.php       # Homepage + Auth branching
|   |   |   |-- BeritaController.php        # Berita CRUD + ticker/popup API
|   |   |   |-- DasborController.php        # User dashboard
|   |   |   |-- KelasController.php         # Kelas management
|   |   |   |-- KerjaSamaController.php     # Mitra/sponsor CRUD
|   |   |   |-- KuisController.php          # Quiz system
|   |   |   |-- LaporanController.php       # Reports + 30 charts
|   |   |   |-- MateriController.php        # Materi video/artikel
|   |   |   |-- PengunjungController.php    # Visitor analytics API
|   |   |   +-- SearchController.php        # Search engine backend
|   |   +-- Middleware/
|   |       |-- CekPeran.php                # Role check middleware
|   |       +-- CatatPengunjung.php         # Visitor tracking middleware
|   +-- Models/ (16 models)
|       |-- Berita.php, Kehadiran.php, Kelas.php, KerjaSama.php
|       |-- Kuis.php, KuisHasil.php, KuisPertanyaan.php, KunciAdmin.php
|       |-- Langganan.php, Laporan.php, Materi.php, MateriProgres.php
|       |-- PaketEksklusif.php, Pencapaian.php, Pengunjung.php, User.php
|-- database/
|   |-- migrations/ (15 migration files)
|   +-- seeders/DatabaseSeeder.php
|-- public/images/                          # 9 SVG illustrations
|   |-- hero-education.svg, ecosystem-hub.svg, flowchart-alur.svg
|   |-- dashboard-preview.svg, sertifikat-preview.svg
|   |-- keamanan-shield.svg, riset-lab.svg
|   |-- jenjang-steps.svg, komunitas-network.svg
|-- resources/views/
|   |-- tata-letak/utama.blade.php          # Main layout (16 menus, ticker, footer, search)
|   |-- beranda.blade.php                   # Guest homepage (~688 lines)
|   |-- beranda-pengguna.blade.php          # Auth homepage (~240 lines)
|   |-- berita/                             # index + tampilkan
|   |-- kerja-sama/                         # index + tampilkan
|   |-- admin/                              # berita/, kerja-sama/, pengunjung
|   |-- auth/                               # masuk, daftar, masuk-admin
|   |-- dasbor/, kelas/, materi/, kuis/, laporan/
|   +-- halaman/                            # 66+ landing pages
|       |-- jenjang-pendidikan.blade.php    # Induk: Jenjang
|       |-- penjamin-mutu.blade.php         # Induk: Penjamin Mutu
|       |-- riset-inovasi.blade.php         # Induk: Riset
|       |-- karir-industri.blade.php        # Induk: Karir
|       |-- komunitas.blade.php             # Induk: Komunitas
|       |-- sertifikasi.blade.php           # Induk: Sertifikasi
|       |-- sumber-daya.blade.php           # Induk: Sumber Daya
|       |-- keamanan.blade.php              # Induk: Keamanan
|       |-- kurikulum.blade.php             # Induk: Kurikulum (NEW v4)
|       |-- alur-panduan.blade.php          # Induk: Alur & Panduan (NEW v4)
|       |-- media.blade.php                 # Induk: Media (NEW v4)
|       |-- dokumen.blade.php               # Induk: Dokumen (NEW v4)
|       |-- pendidikan-dasar/               # 7 subpages (tk-paud, sd-mi, smp-mts, sma-ma, smk-*)
|       |-- pendidikan-tinggi/              # 6 subpages (diploma, sarjana, magister, doktoral, post-doktoral, profesi)
|       |-- riset/                          # 4 subpages (publikasi, kolaborasi, inovasi-paten, konferensi)
|       |-- karir/                          # 4 subpages (mentoring, cv-builder, lowongan, magang)
|       |-- komunitas/                      # 5 subpages (forum-diskusi, study-group, alumni-network, hackathon, open-source)
|       |-- sertifikasi/                    # 3 subpages (kompetensi-nasional, cloud-tech, blockchain-credential)
|       |-- sumber-daya/                    # 3 subpages (ebook-modul, dataset, dev-tools)
|       |-- keamanan/                       # 2 subpages (tata-kelola-it, privasi-data)
|       |-- kurikulum/                      # 4 subpages (silabus, rps-template, kalender-akademik, learning-outcomes) (NEW v4)
|       |-- alur-panduan/                   # 4 subpages (flowchart-sistem, panduan-pengguna, sop-prosedur, faq-bantuan) (NEW v4)
|       |-- media/                          # 4 subpages (video-tutorial, webinar-event, podcast-audio, galeri-foto) (NEW v4)
|       +-- dokumen/                        # 4 subpages (kebijakan-privasi, template-administrasi, surat-formulir, arsip-regulasi) (NEW v4)
|-- routes/web.php                           # 55+ halaman routes + API endpoints
+-- bootstrap/app.php                       # Middleware registration
```

## Standar Keamanan & Tata Kelola

- **ISO 27001** -- Risk Assessment, Access Control (RBAC), AES-256-GCM, TLS 1.3
- **COBIT 2019** -- IT Governance, Performance Management, CMMI
- **UU ITE & PDP** -- Consent Management, Data Protection, Breach Notification
- **QA/QC** -- Automated Testing, KPI Monitoring (NPS, CSAT, SLA)
- **SPK/DSS** -- AHP, TOPSIS, SAW decision support methods
- **CRM** -- User segmentation, engagement tracking, lifecycle management

## Changelog

### v4.0 (Current)

- **16 menu navigasi** (dari 12): +Kurikulum, +Alur & Panduan, +Media, +Dokumen
- **66+ halaman landing page** (dari 8): 16 induk + 50+ subhalaman
- **Beranda terpisah** Auth vs Guest (`beranda-pengguna.blade.php`)
- **BerandaController** dengan `Auth::check()` branching untuk dashboard personalisasi
- **Expanded content**: Semua halaman 200-377 baris dengan Hero, Cards, Stats, Video, Role Features, FAQ, CTA
- **9 ilustrasi SVG kustom** di `public/images/` untuk hero section
- **4 menu baru**: Kurikulum (4 sub), Alur & Panduan (4 sub), Media (4 sub), Dokumen (4 sub)
- **16 subhalaman baru** di 4 folder baru: kurikulum/, alur-panduan/, media/, dokumen/
- **40+ halaman di-expand** dari ~40-128 baris menjadi 200-377 baris
- **Fitur per peran** di setiap halaman (Siswa, Guru, Admin)
- **FAQ accordion** interaktif di setiap halaman (`<details>/<summary>`)
- **20 rute baru** di web.php (4 parent + 16 subpage)
- **Dropdown warna unik** per menu (indigo, teal, rose, amber)
- **Mobile navigation** updated dengan 4 menu baru
- **Dashboard personalisasi**: kelas aktif, materi selesai, kuis, pencapaian, aktivitas, rekomendasi

### v3.0

- Migrasi dari MySQL ke PostgreSQL
- Real-time visitor analytics dengan flag counter
- News ticker & popup dari database
- Kerja sama & sponsor hub dengan tier system
- Expanded navigation (12 menu + arrow slider)
- Submenu animasi ke bawah
- Functional search engine (backend API)
- Admin CRUD: berita, mitra, pengunjung dashboard
- 3 new migrations, 3 new models, 4 new controllers, 1 new middleware
- 10 new view files
- Database seeder: 8 berita, 10 mitra, 150 pengunjung sample

### v2.0

- Mega menu navigation
- 8 ecosystem pages (jenjang, riset, karir, komunitas, sertifikasi, sumber daya, keamanan, penjamin mutu)
- Custom search engine (3 modes: KVT, Web, AI)
- News popup, revamped footer, top bar

### v1.0

- Core LMS (kelas, materi, kuis)
- Gamifikasi RPG (level, XP, rank)
- Multi-peran (siswa, guru, admin)
- 14 models, 7 controllers, 24 views
- MySQL database, basic auth

## Lisensi

Proyek ini menggunakan **3 jenis lisensi**:

1. **Lisensi Kerja Sama** -- Mengatur kolaborasi dengan pihak ketiga
2. **Lisensi Hak Cipta (MIT)** -- Kode sumber bebas digunakan dengan atribusi
3. **Lisensi Sponsor** -- Mengatur hak dan kewajiban sponsor

Lihat file [LICENSE](LICENSE) untuk detail lengkap.

## Kontribusi

1. Fork repository ini
2. Buat branch fitur (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Tambah fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## Kontak

- **Email**: kerjasama@kvthub.id
- **Security**: security@kvthub.id
- **GitHub**: [kuro-myths](https://github.com/kuro-myths)
- **Website**: [kvt-hub.test](http://kvt-hub.test)

---

<p align="center">
  Dibuat oleh <strong>KVT Hub Team</strong><br>
  KVT Hub v4.0 - Global Education & Research Ecosystem<br>
  &copy; 2025-2026 KVT Hub. Semua hak dilindungi.
</p>
