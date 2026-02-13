# KVT Hub - Global Education & Research Ecosystem

> **Ekosistem pendidikan, karir, dan riset digital global. Dari TK hingga S3/PhD, profesi, industri, dan riset.**

![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?logo=php)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-14+-336791?logo=postgresql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green)
![ISO](https://img.shields.io/badge/ISO-27001-brightgreen)
![COBIT](https://img.shields.io/badge/COBIT-2019-blue)
![Version](https://img.shields.io/badge/Version-3.0-orange)

---

## Tentang

KVT Hub v3.0 adalah ekosistem pembelajaran, karir, dan riset digital terdepan yang mengintegrasikan 13 jenjang pendidikan (TK hingga S3/PhD) dengan teknologi gamifikasi RPG, kolaborasi riset global, dan standar keamanan enterprise. Platform ini menghubungkan pelajar, peneliti, profesional, dan industri dalam satu ekosistem terintegrasi.

### Apa yang Baru di v3.0

- **PostgreSQL** -- Migrasi dari MySQL ke PostgreSQL untuk performa dan skalabilitas
- **Real-Time Visitor Analytics** -- Pelacakan pengunjung real-time dengan auto-refresh setiap 15 detik
- **Flag Counter Widget** -- Menampilkan asal negara pengunjung dengan bendera, diambil dari database
- **News Ticker dari Database** -- Berita berjalan otomatis di header, diambil langsung dari tabel berita
- **Popup Berita** -- Notifikasi berita terbaru saat kunjungan pertama (toggleable)
- **Expanded Navigation (12 Menu)** -- 6 menu terlihat + tombol panah untuk menampilkan 6 menu tambahan
- **Submenu Animasi Ke Bawah** -- Dropdown menu dengan animasi fade-in ke bawah (bukan ke samping)
- **Search Engine Fungsional** -- Pencarian backend yang query database (berita, kelas, materi, mitra)
- **Kerja Sama & Sponsor Hub** -- Halaman mitra dengan sistem tier (Platinum/Gold/Silver/Bronze/Community)
- **Admin CRUD untuk Berita** -- Kelola berita lengkap (buat, edit, hapus, ticker, popup, unggulan)
- **Admin CRUD untuk Mitra** -- Kelola kerja sama dan sponsor lengkap
- **Admin Analytics Dashboard** -- Dashboard pengunjung dengan grafik mingguan, per jam, negara teratas

## Arsitektur Ekosistem

```
                        +---------------------------+
                        |      KVT Hub v3.0         |
                        |  Global Education & Riset |
                        +-------------+-------------+
                                      |
     +--------+--------+--------+----+----+--------+--------+--------+
     |        |        |        |        |        |        |        |
  Jenjang   Riset    Karir   Komu-   Serti-  Sumber  Keama-  Penja-
  Pendi-    & Ino-   & In-   nitas   fikasi   Daya    nan     min
  dikan     vasi     dustri                          (ISO)    Mutu
  (TK-S3)   (Lab)   (500+)  (50K+)  (120+)  (17K+)  27001   QA/QC
     |
     +--- Berita --- Kerja Sama --- Pengunjung Analytics --- Search Engine
```

## 8 Pilar Ekosistem

| No  | Pilar              | Deskripsi                                          | Highlight               |
| --- | ------------------ | -------------------------------------------------- | ----------------------- |
| 1   | Jenjang Pendidikan | TK, SD, SMP, SMA, SMK, D1-D3, S1, S2, S3, Profesi  | 13 jenjang terintegrasi |
| 2   | Riset & Inovasi    | Research Hub, jurnal, konferensi, paten            | 150+ universitas mitra  |
| 3   | Karir & Industri   | Job matching, magang, mentoring, CV builder        | 500+ perusahaan mitra   |
| 4   | Komunitas          | Forum, study group, alumni, hackathon, open source | 50,000+ anggota         |
| 5   | Sertifikasi        | Kompetensi, industri (AWS/Google/MS), blockchain   | 120+ program            |
| 6   | Sumber Daya        | E-Book, dataset, coding playground, API, template  | 17,000+ resources       |
| 7   | Keamanan           | ISO 27001, COBIT 2019, UU ITE & PDP, Zero Trust    | AES-256, MFA, WAF       |
| 8   | Penjamin Mutu      | QA/QC, SPK (AHP/TOPSIS/SAW), CRM, PDCA             | NPS 72, SLA 98%         |

## Fitur Utama v3.0

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

### Expanded Navigation (12 Menu + Slider)

- 6 menu terlihat: Beranda, Jenjang, Platform, Berita, Kerja Sama, Tentang
- 6 menu tersembunyi: Riset, Karir, Komunitas, Sertifikasi, Sumber Daya, Keamanan
- Tombol panah kiri/kanan untuk menggeser menu
- Animasi slide smooth saat menggeser
- Mega dropdown untuk Jenjang (3 kolom), Platform (2 kolom), Kerja Sama, Tentang
- Semua submenu animasi ke bawah (bukan ke samping)

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

| Peran | Kemampuan                                                      |
| ----- | -------------------------------------------------------------- |
| Siswa | Belajar, ikut kelas, ambil kuis, lihat progress                |
| Guru  | Buat kelas & materi, kelola siswa, buat kuis                   |
| Admin | Kelola semua data, berita, mitra, pengunjung, kunci, paket     |

## Database Schema (PostgreSQL)

### Tabel Baru v3.0

| Tabel        | Kolom Utama                                                           |
| ------------ | --------------------------------------------------------------------- |
| pengunjung   | ip_address, halaman, negara, kode_negara, browser, os, perangkat, session_id |
| berita       | judul, slug, konten, kategori, status, tampil_ticker, tampil_popup, unggulan |
| kerja_sama   | nama, slug, tipe, tier, website, logo, aktif, tampil_beranda, benefit |

### Tabel Existing

| Tabel              | Deskripsi                           |
| ------------------ | ----------------------------------- |
| users              | Pengguna (siswa/guru/admin) + RPG   |
| kelas              | Kelas pembelajaran                  |
| kelas_anggota      | Relasi many-to-many user-kelas      |
| materi             | Materi per kelas (video/artikel)    |
| kuis               | Kuis dengan soal JSON               |
| jawaban_kuis       | Jawaban & skor siswa                |
| laporan_kehadiran  | Laporan dengan 30 jenis diagram     |
| progress_materi    | Tracking selesai per materi         |
| pencapaian         | Achievement badges                  |
| pengguna_pencapaian| Relasi user-achievement             |
| paket_eksklusif    | Paket langganan premium             |
| kunci_admin        | Kunci untuk akses admin             |

## API Endpoints

| Endpoint                       | Method | Response                              |
| ------------------------------ | ------ | ------------------------------------- |
| `/api/pengunjung/statistik`    | GET    | hari_ini, online, total, total_unik   |
| `/api/pengunjung/flag-counter` | GET    | negara[], pageviews                   |
| `/api/pengunjung/grafik-mingguan` | GET | data 7 hari [{tanggal, total}]        |
| `/api/pengunjung/grafik-per-jam`  | GET | data 24 jam [{jam, total}]            |
| `/api/pengunjung/halaman-populer` | GET | top 10 halaman [{halaman, total}]     |
| `/api/berita/ticker`           | GET    | 10 berita untuk ticker [{judul, slug}]|
| `/api/berita/popup`            | GET    | 5 berita untuk popup                  |
| `/api/search?q=keyword`        | GET    | hasil[] dari berita, kelas, materi, mitra |

## Teknologi

| Kategori   | Teknologi                                |
| ---------- | ---------------------------------------- |
| Backend    | Laravel 12, PHP 8.2+                     |
| Database   | PostgreSQL 14+                           |
| Frontend   | Tailwind CSS (CDN), Blade Templates      |
| Charting   | Chart.js v4                              |
| Animasi    | AOS v2.3.4, CSS Snow, Ticker, Dropdown   |
| Ikon       | Font Awesome 6.5.1                       |
| Font       | Google Fonts (Inter + JetBrains Mono)    |
| Geo API    | ip-api.com (free, 45 req/min)            |
| Flag CDN   | flagcdn.com                              |
| Keamanan   | RBAC, CSRF, XSS Protection, Auth Guard   |

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

| Peran | Email              | Password  |
| ----- | ------------------ | --------- |
| Admin | admin@kvthub.id    | admin123  |
| Guru  | guru@kvthub.id     | guru123   |
| Siswa | siswa@kvthub.id    | siswa123  |

Kunci Admin: `KVT-ADMIN-2025-SECRET`

## Struktur Proyek

```
kvt-hub/
|-- app/
|   |-- Http/
|   |   |-- Controllers/
|   |   |   |-- AdminController.php         # Admin user/kunci/paket
|   |   |   |-- AuthController.php          # Login/register/OAuth
|   |   |   |-- BerandaController.php       # Homepage + real-time stats
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
|   +-- Models/
|       |-- Berita.php           # News with scopes & auto-slug
|       |-- KerjaSama.php        # Partners with tiers & types
|       |-- Pengunjung.php       # Visitor stats & geo-detection
|       +-- ... (14 models total)
|-- database/
|   |-- migrations/ (15 migration files)
|   +-- seeders/
|       +-- DatabaseSeeder.php   # Users, berita, mitra, pengunjung
|-- resources/views/
|   |-- tata-letak/utama.blade.php  # Main layout (mega nav, ticker, footer, search, flag counter)
|   |-- beranda.blade.php           # Homepage with real-time data
|   |-- berita/
|   |   |-- index.blade.php         # Berita listing with search & filter
|   |   +-- tampilkan.blade.php     # Berita detail with share & related
|   |-- kerja-sama/
|   |   |-- index.blade.php         # Mitra listing by tier
|   |   +-- tampilkan.blade.php     # Mitra detail
|   |-- admin/
|   |   |-- berita/
|   |   |   |-- index.blade.php     # Admin berita table
|   |   |   +-- form.blade.php      # Berita create/edit form
|   |   |-- kerja-sama/
|   |   |   |-- index.blade.php     # Admin mitra table
|   |   |   +-- form.blade.php      # Mitra create/edit form
|   |   +-- pengunjung.blade.php    # Visitor analytics dashboard
|   |-- auth/ (masuk, daftar, masuk-admin)
|   |-- dasbor/, kelas/, materi/, kuis/, laporan/
|   +-- halaman/ (8 ecosystem pages)
|-- routes/web.php                   # All routes + API endpoints
+-- bootstrap/app.php               # Middleware registration
```

## Standar Keamanan & Tata Kelola

- **ISO 27001** -- Risk Assessment, Access Control (RBAC), AES-256-GCM, TLS 1.3
- **COBIT 2019** -- IT Governance, Performance Management, CMMI
- **UU ITE & PDP** -- Consent Management, Data Protection, Breach Notification
- **QA/QC** -- Automated Testing, KPI Monitoring (NPS, CSAT, SLA)
- **SPK/DSS** -- AHP, TOPSIS, SAW decision support methods
- **CRM** -- User segmentation, engagement tracking, lifecycle management

## Changelog

### v3.0 (Current)
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
  KVT Hub v3.0 - Global Education & Research Ecosystem<br>
  &copy; 2025 KVT Hub. Semua hak dilindungi.
</p>
