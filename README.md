# KVT Hub - Global Education & Research Ecosystem

> **Ekosistem pendidikan, karir, dan riset digital global. Dari TK hingga S3/PhD, profesi, industri, dan riset.**

![Laravel](https://img.shields.io/badge/Laravel-11-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3+-blue?logo=php)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-14+-336791?logo=postgresql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green)
![ISO](https://img.shields.io/badge/ISO-27001-brightgreen)
![COBIT](https://img.shields.io/badge/COBIT-2019-blue)
![Version](https://img.shields.io/badge/Version-4.0-orange)
![Pages](https://img.shields.io/badge/Halaman-66+-blueviolet)
![Menus](https://img.shields.io/badge/Menu-16-teal)
![Sidebar](https://img.shields.io/badge/Sidebar-Role--Based-purple)
![Roles](https://img.shields.io/badge/Roles-7-crimson)
![Music](https://img.shields.io/badge/Music-Streaming-ff69b4)

---

## Tentang

KVT Hub v4.0 adalah ekosistem pembelajaran, karir, dan riset digital terdepan yang mengintegrasikan 13 jenjang pendidikan (TK hingga S3/PhD) dengan teknologi gamifikasi RPG, kolaborasi riset global, dan standar keamanan enterprise. Platform ini menghubungkan **7 peran** — Admin, Staff, Guru/Pengajar, Siswa, Mahasiswa, Orang Tua, dan Pengunjung — dalam satu ekosistem terintegrasi dengan sistem verifikasi dokumen, **16 menu utama**, **66+ halaman landing page**, **90+ rute**, **sidebar navigasi per role**, **modal-based CRUD**, dan **musik streaming** bawaan.

### Apa yang Baru di v4.0

- **7-Role System**: Redesign dari 4 role menjadi 7 role — `admin`, `staff`, `guru`, `siswa`, `mahasiswa`, `orang_tua`, `pengunjung`
- **Sistem Verifikasi Dokumen**: Registrasi guru/pengajar dengan upload CV, ijazah, sertifikat, KTP — Admin verifikasi approve/tolak
- **Multi-Step Registration**: Form pendaftaran 4 langkah (Data Diri → Peran & Lokasi → Dokumen → Keamanan)
- **Pendaftaran Pengajar Terpisah**: Halaman khusus `/daftar-pengajar` dengan upload dokumen wajib
- **Admin Verification Panel**: Panel admin untuk melihat, menyetujui, atau menolak akun pending
- **Status Verifikasi**: Halaman status verifikasi untuk pengguna yang menunggu persetujuan
- **Middleware Verifikasi**: Middleware `CekPeran` sekarang mencek status verifikasi sebelum mengizinkan akses
- **Fix 419 Page Expired**: Perbaikan SESSION_DOMAIN di .env untuk mengatasi error CSRF token mismatch

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

### Multi-Peran (4 Role)

| Peran    | Kemampuan                                                                      |
| -------- | ------------------------------------------------------------------------------ |
| Admin    | Kelola semua data, 14 CRUD modal, laporan, pengunjung, paket, kunci            |
| Pengajar | Buat & kelola kelas, materi, kuis, laporan & diagram, kurikulum                |
| Staff    | Kelola data pengguna, kehadiran, rekap, kelas, laporan                         |
| Pengguna | Belajar, ikut kelas, KRS/KHS, kuis, progress, sertifikasi, komunitas          |

### Role-Based Sidebar Navigation

| Peran    | Jumlah Menu | Menu Utama                                                                                                                                        |
| -------- | ----------- | ------------------------------------------------------------------------------------------------------------------------------------------------- |
| Admin    | 15          | Dashboard, Pengguna, Kelas, Berita, Kerja Sama, Kurikulum, Mapel, Organisasi, KRS, Nilai, Bobot Nilai, Laporan Akademik, Pengunjung, Paket, Kunci |
| Pengajar | 9           | Dashboard, Kelas Saya, Buat Kelas, Materi Saya, Buat Materi, Laporan, Kurikulum, Sertifikasi, Komunitas                                          |
| Staff    | 6           | Dashboard, Data Pengguna, Kehadiran, Rekap Kehadiran, Kelas, Laporan                                                                             |
| Pengguna | 10          | Dashboard, Kelas, KRS, KHS, Laporan, Kurikulum, Sertifikasi, Komunitas, Media, Panduan                                                           |

### Admin Modal-Based CRUD

Semua fitur admin CRUD menggunakan inline modal popup (bukan halaman form terpisah):

| Fitur            | Aksi                                 | Fitur Khusus                                       |
| ---------------- | ------------------------------------ | -------------------------------------------------- |
| Pengguna         | CRUD + Toggle Aktif                  | Stats per role, self-protection                    |
| Kelas            | CRUD                                 | Dropdown pengajar, auto kode_kelas                 |
| Berita           | CRUD                                 | Gambar upload, ticker/popup/unggulan checkboxes    |
| Kerja Sama       | CRUD                                 | Logo upload, tipe/tier filter, slug otomatis       |
| Kurikulum        | CRUD                                 | Jenjang filter (SD-S3), akreditasi, durasi/SKS     |
| Mata Pelajaran   | CRUD                                 | Kurikulum dropdown, kode unik, semester, tipe      |
| Organisasi       | CRUD                                 | Tipe filter, aktif/unggulan toggles                |
| KRS Mahasiswa    | Setujui/Tolak/Hapus                  | Approval workflow, catatan tolak, detail modal     |
| Nilai            | CRUD                                 | Auto kalkulasi nilai_akhir + huruf_mutu            |
| Bobot Nilai      | CRUD (Upsert)                        | Kurikulum filter, panduan bobot standar            |
| Laporan Akademik | Generate/Lihat/Hapus                 | 4 tipe: rekap nilai, statistik KRS, performa, IPK |
| Paket Eksklusif  | CRUD + Toggle Aktif                  | Card grid, fitur list, XP bonus, langganan count   |
| Kunci Admin      | Batch Create/Hapus/Bersihkan Terpakai| Stats aktif/terpakai, format KVT-XXXXX             |
| Pengunjung       | View Only                            | Grafik, browser, negara, halaman populer           |

### Music Player (Streaming)

- 5 stasiun radio streaming: Lo-Fi Hip Hop, Jazz, Deep House, Ambient, Classical
- Kontrol penuh: play/pause, previous/next, seek bar, volume slider
- Shuffle & repeat mode
- Playlist dengan highlight stasiun aktif
- State disimpan di localStorage (volume, index, playing state)
- Auto-resume saat halaman di-refresh

### 3-Step Registration Wizard

| Step | Konten                                                                               |
| ---- | ------------------------------------------------------------------------------------ |
| 1    | Data Diri: Nama, Email, Asal Instansi, Kota                                          |
| 2    | Peran & Tujuan: Role (Pengguna/Tim), Tujuan, Bidang Minat, Sumber Informasi          |
| 3    | Keamanan: Password (strength meter), Konfirmasi, reCAPTCHA, Terms, Notifikasi opt-in |

## Database Schema (PostgreSQL)

### Tabel Baru v3.0

| Tabel      | Kolom Utama                                                                  |
| ---------- | ---------------------------------------------------------------------------- |
| pengunjung | ip_address, halaman, negara, kode_negara, browser, os, perangkat, session_id |
| berita     | judul, slug, konten, kategori, status, tampil_ticker, tampil_popup, unggulan |
| kerja_sama | nama, slug, tipe, tier, website, logo, aktif, tampil_beranda, benefit        |

### Tabel Existing

| Tabel               | Deskripsi                           |
| ------------------- | ----------------------------------- |
| users               | Pengguna (pengguna/tim/admin) + RPG |
| kelas               | Kelas pembelajaran                  |
| kelas_anggota       | Relasi many-to-many user-kelas      |
| materi              | Materi per kelas (video/artikel)    |
| kuis                | Kuis dengan soal JSON               |
| jawaban_kuis        | Jawaban & skor siswa                |
| laporan_kehadiran   | Laporan dengan 30 jenis diagram     |
| progress_materi     | Tracking selesai per materi         |
| pencapaian          | Achievement badges                  |
| pengguna_pencapaian | Relasi user-achievement             |
| paket_eksklusif     | Paket langganan premium             |
| kunci_admin         | Kunci untuk akses admin             |

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

## ERD (Entity Relationship Diagram)

```
┌──────────┐     ┌──────────────┐     ┌───────────────┐
│  users   │────<│     krs      │>────│  kurikulum    │
│──────────│     │──────────────│     │───────────────│
│ id       │     │ id           │     │ id            │
│ name     │     │ user_id (FK) │     │ nama          │
│ email    │     │ kurikulum_id │     │ jenjang       │
│ peran    │     │ semester     │     │ durasi_tahun  │
│ level    │     │ total_sks    │     │ total_sks     │
│ xp       │     │ status       │     │ akreditasi    │
└──────┬───┘     └──────┬───────┘     └───────┬───────┘
       │                │                     │
       │         ┌──────┴───────┐     ┌───────┴───────────┐
       │         │  krs_detail  │     │  mata_pelajaran   │
       │         │──────────────│     │───────────────────│
       │         │ krs_id (FK)  │     │ id                │
       │         │ mapel_id(FK) │────>│ kurikulum_id (FK) │
       │         │ sks          │     │ nama, kode        │
       │         └──────────────┘     │ sks, semester     │
       │                              └───────┬───────────┘
       │                                      │
       │         ┌──────────────┐     ┌───────┴───────┐
       ├────────<│   nilai      │>────│               │
       │         │──────────────│     │  bobot_nilai  │
       │         │ user_id (FK) │     │───────────────│
       │         │ mapel_id(FK) │     │ kurikulum_id  │
       │         │ tugas, uts   │     │ huruf, bobot  │
       │         │ uas, praktik │     │ batas_bawah   │
       │         │ nilai_akhir  │     │ batas_atas    │
       │         │ huruf_mutu   │     └───────────────┘
       │         └──────────────┘
       │
       │         ┌──────────────┐     ┌───────────────┐
       ├────────<│   kelas      │>────│    materi     │
       │         │──────────────│     │───────────────│
       │         │ pengajar_id  │     │ kelas_id (FK) │
       │         │ nama, kode   │     │ judul, konten │
       │         │ status       │     │ tipe, urutan  │
       │         └──────────────┘     └───────────────┘
       │
       │         ┌──────────────┐     ┌───────────────────┐
       ├────────<│ kunci_admin  │     │  laporan_akademik │
       │         │──────────────│     │───────────────────│
       │         │ kunci        │     │ judul, tipe       │
       │         │ digunakan    │     │ kurikulum_id      │
       │         │ user_id (FK) │     │ dibuat_oleh (FK)  │
       │         └──────────────┘     │ data (JSON)       │
       │                              │ status            │
       │         ┌──────────────┐     └───────────────────┘
       ├────────<│  langganan   │
       │         │──────────────│     ┌───────────────┐
       │         │ user_id (FK) │     │  organisasi   │
       │         │ paket_id(FK) │     │───────────────│
       │         └──────┬───────┘     │ nama, tipe    │
       │                │             │ aktif, unggulan│
       │         ┌──────┴───────┐     └───────────────┘
       │         │paket_eksklusif
       │         │──────────────│     ┌───────────────┐
       │         │ nama, harga  │     │   berita      │
       │         │ durasi_hari  │     │───────────────│
       │         │ xp_bonus     │     │ judul, slug   │
       │         │ fitur, aktif │     │ konten, status│
       │         └──────────────┘     │ kategori      │
       │                              └───────────────┘
       │         ┌──────────────┐
       └────────<│  pengunjung  │     ┌───────────────┐
                 │──────────────│     │  kerja_sama   │
                 │ ip_address   │     │───────────────│
                 │ halaman      │     │ nama, slug    │
                 │ negara       │     │ tipe, tier    │
                 │ browser, os  │     │ logo, aktif   │
                 └──────────────┘     └───────────────┘
```

## Use Case Diagram

```
                        ┌─────────────────────────────────────────────┐
                        │              KVT Hub v6.0                   │
                        │                                             │
  ┌───────┐             │  ┌─────────────────────────┐                │
  │ Guest │────────────>│  │ Lihat Landing Page       │                │
  │(Tamu) │────────────>│  │ Baca Berita              │                │
  │       │────────────>│  │ Lihat Kerja Sama         │                │
  │       │────────────>│  │ Cari (Search Engine)     │                │
  │       │────────────>│  │ Daftar / Login           │                │
  └───────┘             │  └─────────────────────────┘                │
                        │                                             │
  ┌──────────┐          │  ┌─────────────────────────┐                │
  │ Pengguna │─────────>│  │ Akses Dashboard          │                │
  │(Mahasiswa│─────────>│  │ Ikut Kelas               │                │
  │         )│─────────>│  │ Ajukan KRS               │                │
  │          │─────────>│  │ Lihat KHS / Nilai        │                │
  │          │─────────>│  │ Kerjakan Kuis            │                │
  │          │─────────>│  │ Lihat Materi & Progress  │                │
  │          │─────────>│  │ Lihat Laporan & Diagram  │                │
  └──────────┘          │  └─────────────────────────┘                │
                        │                                             │
  ┌──────────┐          │  ┌─────────────────────────┐                │
  │ Pengajar │─────────>│  │ Buat & Kelola Kelas      │                │
  │          │─────────>│  │ Buat & Kelola Materi     │                │
  │          │─────────>│  │ Buat Kuis                │                │
  │          │─────────>│  │ Lihat Laporan & Diagram  │                │
  └──────────┘          │  └─────────────────────────┘                │
                        │                                             │
  ┌──────────┐          │  ┌─────────────────────────┐                │
  │   Staff  │─────────>│  │ Kelola Data Pengguna     │                │
  │          │─────────>│  │ Catat & Rekap Kehadiran  │                │
  │          │─────────>│  │ Lihat Kelas              │                │
  │          │─────────>│  │ Lihat Laporan & Diagram  │                │
  └──────────┘          │  └─────────────────────────┘                │
                        │                                             │
  ┌──────────┐          │  ┌─────────────────────────┐                │
  │  Admin   │─────────>│  │ CRUD Pengguna            │                │
  │          │─────────>│  │ CRUD Kelas, Berita, Mitra│                │
  │          │─────────>│  │ CRUD Kurikulum & Mapel   │                │
  │          │─────────>│  │ Setujui/Tolak KRS        │                │
  │          │─────────>│  │ Input & Kalkulasi Nilai  │                │
  │          │─────────>│  │ Generate Laporan Akademik│                │
  │          │─────────>│  │ Kelola Organisasi        │                │
  │          │─────────>│  │ Kelola Paket & Kunci     │                │
  │          │─────────>│  │ Analitik Pengunjung      │                │
  └──────────┘          │  └─────────────────────────┘                │
                        └─────────────────────────────────────────────┘
```

## Flowchart Alur Sistem

### Alur Pendaftaran & Login

```
┌─────────┐    ┌──────────┐    ┌────────────┐    ┌──────────┐    ┌──────────┐
│  Start  │───>│ Landing  │───>│ Pilih:     │───>│ Register │───>│ 3-Step   │
│         │    │ Page     │    │ Login/     │    │ Form     │    │ Wizard   │
└─────────┘    └──────────┘    │ Register   │    └──────────┘    │ 1.Data   │
                               └─────┬──────┘                    │ 2.Role   │
                                     │                           │ 3.Pass   │
                               ┌─────┴──────┐                   └────┬─────┘
                               │ Login Form │                        │
                               │ Email+Pass │                   ┌────┴─────┐
                               └─────┬──────┘                   │ Validasi │
                                     │                          │ reCAPTCHA│
                               ┌─────┴──────┐                  └────┬─────┘
                               │  Cek Peran  │<─────────────────────┘
                               └─────┬──────┘
                    ┌────────┬────────┼────────┬──────────┐
                    ▼        ▼        ▼        ▼          ▼
              ┌──────┐ ┌────────┐ ┌──────┐ ┌────────┐
              │Admin │ │Pengajar│ │Staff │ │Pengguna│
              │Dasbor│ │Dasbor  │ │Dasbor│ │Dasbor  │
              └──────┘ └────────┘ └──────┘ └────────┘
```

### Alur KRS Akademik

```
┌──────────┐    ┌──────────┐    ┌──────────┐    ┌──────────┐
│ Pengguna │───>│ Pilih    │───>│ Pilih    │───>│ Ajukan   │
│ Login    │    │ Kurikulum│    │ Mata     │    │ KRS      │
└──────────┘    │ & Semester│   │ Pelajaran│    │ (Submit) │
                └──────────┘    └──────────┘    └────┬─────┘
                                                     │
                                                ┌────┴─────┐
                                                │  Status: │
                                                │ Menunggu │
                                                └────┬─────┘
                                                     │
                                                ┌────┴─────┐
                                                │  Admin   │
                                                │  Review  │
                                                └────┬─────┘
                                          ┌──────────┼──────────┐
                                          ▼                     ▼
                                    ┌──────────┐          ┌──────────┐
                                    │ Disetujui│          │  Ditolak │
                                    │          │          │ +Catatan │
                                    └────┬─────┘          └──────────┘
                                         │
                                    ┌────┴─────┐
                                    │ Mahasiswa│
                                    │ Ikut     │
                                    │ Kuliah   │
                                    └────┬─────┘
                                         │
                                    ┌────┴─────┐
                                    │  Input   │
                                    │  Nilai   │
                                    │  (Admin) │
                                    └────┬─────┘
                                         │
                                    ┌────┴─────┐
                                    │  Auto    │
                                    │  Hitung  │
                                    │  IPK/KHS │
                                    └──────────┘
```

### Alur Admin CRUD (Modal Pattern)

```
┌──────────┐    ┌──────────┐    ┌──────────┐
│  Admin   │───>│ Sidebar  │───>│ Halaman  │
│  Login   │    │ Menu     │    │ Index    │
└──────────┘    └──────────┘    └────┬─────┘
                                     │
                    ┌────────────┬────┴────┬──────────┐
                    ▼            ▼         ▼          ▼
              ┌──────────┐ ┌────────┐ ┌────────┐ ┌────────┐
              │ Klik     │ │ Klik   │ │ Klik   │ │Search/ │
              │ Tambah   │ │ Edit   │ │ Hapus  │ │Filter  │
              └────┬─────┘ └───┬────┘ └───┬────┘ └───┬────┘
                   │           │          │          │
              ┌────┴─────┐ ┌──┴─────┐ ┌──┴─────┐    │
              │  Modal   │ │ Modal  │ │ Modal  │    │
              │  Create  │ │ Edit   │ │ Confirm│    │
              │  Form    │ │ (Auto  │ │ Delete │    │
              │          │ │ Isi    │ │        │    │
              └────┬─────┘ │ Data)  │ └───┬────┘    │
                   │       └───┬────┘     │         │
              ┌────┴─────┐ ┌──┴─────┐ ┌──┴─────┐   │
              │  POST    │ │  PUT   │ │ DELETE │   │
              │  /simpan │ │ /{id}  │ │ /{id}  │   │
              └────┬─────┘ └───┬────┘ └───┬────┘   │
                   │           │          │         │
                   └─────────┬─┴──────────┘         │
                             ▼                      │
                       ┌──────────┐                 │
                       │ Redirect │<────────────────┘
                       │ back()   │
                       │ + Flash  │
                       └──────────┘
```

## Teknologi

| Kategori  | Teknologi                              |
| --------- | -------------------------------------- |
| Backend   | Laravel 11, PHP 8.3+                   |
| Database  | PostgreSQL 14+                         |
| Frontend  | Tailwind CSS (CDN), Blade Templates    |
| Charting  | Chart.js v4                            |
| Animasi   | AOS v2.3.4, CSS Snow, Ticker, Dropdown |
| Ikon      | Font Awesome 6.5.1                     |
| Font      | Google Fonts (Inter + JetBrains Mono)  |
| Geo API   | ip-api.com (free, 45 req/min)          |
| Flag CDN  | flagcdn.com                            |
| Keamanan  | RBAC, CSRF, XSS, reCAPTCHA, Auth Guard |
| Musik     | Streaming radio (ilovemusic.de)        |
| Translate | Google Translate Widget (6 bahasa)     |

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

| Peran      | Email                  | Password       | Status       |
| ---------- | ---------------------- | -------------- | ------------ |
| Admin      | admin@kvthub.id        | admin123       | Verified     |
| Guru       | guru@kvthub.id         | guru123        | Verified     |
| Staff      | staff@kvthub.id        | staff123       | Verified     |
| Siswa      | siswa@kvthub.id        | siswa123       | Verified     |
| Mahasiswa  | mahasiswa@kvthub.id    | mahasiswa123   | Verified     |
| Orang Tua  | orangtua@kvthub.id     | orangtua123    | Verified     |
| Pengunjung | pengunjung@kvthub.id   | pengunjung123  | Verified     |
| Guru (P)   | guru.pending@kvthub.id | guru123        | Pending      |
| Siswa (P)  | siswa.pending@kvthub.id| siswa123       | Pending      |

Kunci Admin: `KVT-ADMIN-2025-SECRET`

**Seeder Data**: 70+ user (1 admin, 8 guru, 4 staff, 50+ siswa, mahasiswa, orang tua, pengunjung), 10 kelas, 14 berita, 15 mitra, 150 pengunjung, 9 kurikulum, 14 organisasi, 26+ mata pelajaran, 8 pencapaian.

## Struktur Proyek

```
kvt-hub/
|-- app/
|   |-- Http/
|   |   |-- Controllers/
|   |   |   |-- AuthController.php              # Login/register/OAuth
|   |   |   |-- BerandaController.php           # Homepage + Auth branching
|   |   |   |-- BeritaController.php            # Berita publik + ticker/popup API
|   |   |   |-- KelasController.php             # Kelas publik
|   |   |   |-- KerjaSamaController.php         # Mitra publik
|   |   |   |-- KuisController.php              # Quiz system
|   |   |   |-- LaporanController.php           # Reports + 30 charts
|   |   |   |-- MateriController.php            # Materi video/artikel
|   |   |   |-- PengunjungController.php        # Visitor analytics API
|   |   |   |-- SearchController.php            # Search engine backend
|   |   |   |-- Admin/                          # 14 admin controllers
|   |   |   |   |-- DasborController.php        # Admin dashboard stats
|   |   |   |   |-- PenggunaController.php      # User CRUD + toggle
|   |   |   |   |-- KelasController.php         # Admin kelas CRUD
|   |   |   |   |-- BeritaController.php        # Berita CRUD (modal)
|   |   |   |   |-- KerjaSamaController.php     # Mitra CRUD (modal)
|   |   |   |   |-- KurikulumController.php     # Kurikulum CRUD
|   |   |   |   |-- MataPelajaranController.php # Mapel CRUD
|   |   |   |   |-- OrganisasiController.php    # Organisasi CRUD
|   |   |   |   |-- KrsController.php           # KRS approval workflow
|   |   |   |   |-- NilaiController.php         # Nilai CRUD + auto calc
|   |   |   |   |-- BobotNilaiController.php    # Bobot upsert
|   |   |   |   |-- LaporanAkademikController.php # Report generator
|   |   |   |   |-- PaketController.php         # Paket CRUD + toggle
|   |   |   |   |-- KunciController.php         # Kunci batch create
|   |   |   |   +-- PengunjungController.php    # Visitor analytics
|   |   |   |-- Pengajar/                       # Pengajar controllers
|   |   |   |-- Staff/                          # Staff controllers
|   |   |   +-- Pengguna/                       # Pengguna controllers
|   |   +-- Middleware/
|   |       |-- CekPeran.php                    # Role check (4 roles)
|   |       +-- CatatPengunjung.php             # Visitor tracking
|   +-- Models/ (25+ models)
|       |-- Berita.php, BobotNilai.php, JenjangPengguna.php, Kehadiran.php
|       |-- Kelas.php, KerjaSama.php, Krs.php, KrsDetail.php
|       |-- Kuis.php, KuisHasil.php, KuisPertanyaan.php, KunciAdmin.php
|       |-- Kurikulum.php, Langganan.php, Laporan.php, LaporanAkademik.php
|       |-- MataPelajaran.php, Materi.php, MateriProgres.php, Nilai.php
|       |-- Organisasi.php, PaketEksklusif.php, PaketSemester.php
|       |-- Pencapaian.php, Pengunjung.php, User.php
|-- database/
|   |-- migrations/ (20+ migration files)
|   +-- seeders/ (split per domain)
|-- resources/views/
|   |-- tata-letak/
|   |   |-- utama.blade.php                    # Landing layout (16 menus, ticker, footer, search, music)
|   |   |-- dasbor.blade.php                   # Dashboard layout (sidebar + topbar)
|   |   |-- auth.blade.php                     # Auth layout (login/register)
|   |   +-- sidebar.blade.php                  # Role-based sidebar (4 roles)
|   |-- akun/
|   |   |-- admin/                             # 14 modal-based CRUD views
|   |   |   |-- dasbor.blade.php               # Admin dashboard
|   |   |   |-- pengguna.blade.php             # User management
|   |   |   |-- kelas.blade.php                # Class management
|   |   |   |-- berita.blade.php               # News CRUD
|   |   |   |-- kerja-sama.blade.php           # Partnership CRUD
|   |   |   |-- kurikulum.blade.php            # Curriculum CRUD
|   |   |   |-- mata-pelajaran.blade.php       # Subject CRUD
|   |   |   |-- organisasi.blade.php           # Organization CRUD
|   |   |   |-- krs.blade.php                  # KRS approval
|   |   |   |-- nilai.blade.php                # Grades CRUD
|   |   |   |-- bobot-nilai.blade.php          # Grade weights
|   |   |   |-- laporan-akademik.blade.php     # Report list
|   |   |   |-- laporan-akademik-detail.blade.php # Report detail
|   |   |   |-- paket.blade.php                # Package CRUD
|   |   |   |-- kunci.blade.php                # Admin key management
|   |   |   +-- pengunjung.blade.php           # Visitor analytics
|   |   |-- pengajar/                          # Pengajar dashboard & views
|   |   |-- staff/                             # Staff dashboard & views
|   |   +-- pengguna/                          # Pengguna dashboard & views
|   |-- auth/                                  # masuk, daftar, masuk-admin
|   |-- beranda.blade.php                      # Guest homepage
|   |-- beranda-pengguna.blade.php             # Auth homepage
|   |-- berita/, kerja-sama/                   # Public listing pages
|   |-- kelas/, materi/, kuis/, laporan/       # Shared feature pages
|   +-- halaman/                               # 66+ landing pages
|-- routes/
|   |-- web.php                                # Public + shared routes
|   |-- admin.php                              # Admin routes (90+ endpoints)
|   |-- pengajar.php                           # Pengajar routes
|   |-- staff.php                              # Staff routes
|   +-- pengguna.php                           # Pengguna routes
+-- bootstrap/app.php                          # Middleware registration
```

## Standar Keamanan & Tata Kelola

- **ISO 27001** -- Risk Assessment, Access Control (RBAC), AES-256-GCM, TLS 1.3
- **COBIT 2019** -- IT Governance, Performance Management, CMMI
- **UU ITE & PDP** -- Consent Management, Data Protection, Breach Notification
- **QA/QC** -- Automated Testing, KPI Monitoring (NPS, CSAT, SLA)
- **SPK/DSS** -- AHP, TOPSIS, SAW decision support methods
- **CRM** -- User segmentation, engagement tracking, lifecycle management

## OOD (Object-Oriented Design)

### Class Diagram — Model Layer

```
┌────────────────────────┐
│         User           │
│────────────────────────│
│ - id: bigint           │
│ - name: string         │
│ - email: string        │
│ - peran: enum          │
│   (admin|pengajar|     │
│    staff|pengguna)     │
│ - level: int           │
│ - xp: int              │
│ - aktif: bool          │
│────────────────────────│
│ + krs(): HasMany       │
│ + nilai(): HasMany     │
│ + kelas(): HasMany     │
│ + langganan(): HasMany │
│ + pencapaian(): HasMany│
│ + kehadiran(): HasMany │
│ + kunci(): HasMany     │
└────────────┬───────────┘
             │ 1
             │
     ┌───────┴──────┬────────────┬──────────────┐
     │ *            │ *          │ *             │ *
┌────┴─────┐  ┌─────┴─────┐ ┌───┴─────┐  ┌─────┴──────┐
│   Krs    │  │   Nilai   │ │  Kelas  │  │ Langganan  │
│──────────│  │───────────│ │─────────│  │────────────│
│ user_id  │  │ user_id   │ │pengajar │  │ user_id    │
│kurikulum │  │ mapel_id  │ │_id      │  │ paket_id   │
│_id       │  │ tugas     │ │ nama    │  │ mulai      │
│ semester │  │ uts, uas  │ │ kode    │  │ selesai    │
│ total_sks│  │ praktik   │ │ status  │  │ status     │
│ status   │  │ partisi-  │ │ maks_   │  └────────────┘
│──────────│  │ pasi      │ │ siswa   │        │ *
│+detail():│  │ nilai_    │ │─────────│        │
│ HasMany  │  │ akhir     │ │+materi()│  ┌─────┴──────┐
│+kurikulum│  │ huruf_    │ │ HasMany │  │   Paket    │
│ ()       │  │ mutu      │ └────┬────┘  │ Eksklusif  │
└────┬─────┘  └───────────┘      │ 1     │────────────│
     │ 1                         │       │ nama       │
     │                     ┌─────┴──┐    │ harga      │
┌────┴─────┐               │ Materi │    │ durasi_hari│
│KrsDetail │               │────────│    │ xp_bonus   │
│──────────│               │kelas_id│    │ fitur      │
│ krs_id   │               │ judul  │    │ aktif      │
│ mapel_id │               │ konten │    └────────────┘
│ sks      │               │ tipe   │
└──────────┘               │ urutan │
                           └────────┘
```

### Class Diagram — Controller Layer (Admin)

```
┌──────────────────────────────────────────────────────┐
│                 AdminController Layer                  │
│   Middleware: auth + peran:admin                      │
├──────────────────────────────────────────────────────┤
│                                                      │
│  DasborController         PenggunaController         │
│  ├─ index()               ├─ index(search,peran)     │
│                           ├─ simpan()                │
│  KelasController          ├─ update($id)             │
│  ├─ index(search,status)  ├─ hapus($id)              │
│  ├─ simpan()              └─ toggleAktif($id)        │
│  ├─ update($id)                                      │
│  └─ hapus($id)            BeritaController           │
│                           ├─ index(cari,status)      │
│  KurikulumController      ├─ simpan() [+gambar]      │
│  ├─ index(search,jenjang) ├─ update($id)             │
│  ├─ simpan()              └─ hapus($id)              │
│  ├─ update($id)                                      │
│  └─ hapus($id)            KerjaSamaController        │
│                           ├─ index(cari,tipe)        │
│  MataPelajaranController  ├─ simpan() [+logo]        │
│  ├─ index(search,kurik.)  ├─ update($id)             │
│  ├─ simpan()              └─ hapus($id)              │
│  ├─ update($id)                                      │
│  └─ hapus($id)            OrganisasiController       │
│                           ├─ index(search,tipe)      │
│  NilaiController          ├─ simpan()                │
│  ├─ index(search)         ├─ update($id)             │
│  ├─ simpan() [auto-calc]  └─ hapus($id)              │
│  ├─ update($id)                                      │
│  └─ hapus($id)            KrsController              │
│                           ├─ index(search,status)    │
│  BobotNilaiController     ├─ setujui($id)            │
│  ├─ index(kurikulum)      ├─ tolak($id)              │
│  ├─ simpan() [upsert]     └─ hapus($id)              │
│  ├─ update($id)                                      │
│  └─ hapus($id)            LaporanAkademikController  │
│                           ├─ index(tipe)             │
│  PaketController          ├─ generate()              │
│  ├─ index()               ├─ tampilkan($id)          │
│  ├─ simpan()              └─ hapus($id)              │
│  ├─ update($id)                                      │
│  ├─ hapus($id)            KunciController            │
│  └─ toggleAktif($id)     ├─ index()                  │
│                           ├─ simpan() [batch 1-20]   │
│  PengunjungController     ├─ hapus($id)              │
│  └─ index()               └─ hapusSemua()            │
│                                                      │
└──────────────────────────────────────────────────────┘
```

### Architecture Overview

```
┌──────────────────────────────────────────────────────────────────┐
│                         Browser (Client)                         │
│   Tailwind CSS · Font Awesome · AOS · Chart.js · Vanilla JS     │
└──────────────────────────┬───────────────────────────────────────┘
                           │ HTTP Request
                           ▼
┌──────────────────────────────────────────────────────────────────┐
│                      Laravel Router                              │
│  web.php → admin.php / pengajar.php / staff.php / pengguna.php  │
│  Middleware: auth, peran:{role}, guest                           │
└──────────────────────────┬───────────────────────────────────────┘
                           │
              ┌────────────┼────────────┐
              ▼            ▼            ▼
     ┌────────────┐ ┌───────────┐ ┌──────────┐
     │ Controller │ │   Model   │ │   View   │
     │ (28 total) │ │(Eloquent) │ │ (Blade)  │
     │            │ │           │ │          │
     │ Admin/  14 │ │ User      │ │ tata-    │
     │ Pengajar 4 │ │ Kelas     │ │ letak/   │
     │ Staff    3 │ │ Krs+Detail│ │  utama   │
     │ Publik   4 │ │ Nilai     │ │  dasbor  │
     │ Auth     3 │ │ Kurikulum │ │  auth    │
     │            │ │ Materi    │ │          │
     │            │ │ (24 model)│ │ akun/    │
     └──────┬─────┘ └─────┬─────┘ │  admin/  │
            │              │       │  pengajar/│
            │              │       │  staff/  │
            │              ▼       │  pengguna/│
            │     ┌────────────┐   └──────────┘
            │     │ PostgreSQL │
            │     │  14+ (DB)  │
            └────>│ 20+ Tables │
                  └────────────┘
```

## Changelog

### v6.0 (Current)

- **4-Role System**: `tim` dipecah menjadi `pengajar` + `staff` — peran terpisah dengan akses, sidebar, dan dashboard masing-masing
- **3 Layout Terpisah**: `tata-letak/utama.blade.php` (landing publik), `tata-letak/dasbor.blade.php` (dashboard), `tata-letak/auth.blade.php` (auth)
- **Modal-Based CRUD**: Seluruh 14 admin CRUD menggunakan popup modal (create/edit/delete) — tidak ada halaman form terpisah
- **14 Dedicated Admin Controllers**: Setiap domain (pengguna, kelas, berita, kurikulum, dll.) memiliki controller tersendiri
- **View Reorganization**: Views dipindah ke `akun/admin/`, `akun/pengajar/`, `akun/staff/`, `akun/pengguna/` — flat file structure
- **Route Separation**: `admin.php`, `pengajar.php`, `staff.php`, `pengguna.php` — file route terpisah per role
- **DasborController Cleanup**: Hanya berisi index() — method pengguna/kunci/paket dipindah ke controller dedicated
- **KurikulumController Refactor**: Dari 248 baris mega-controller → 65 baris kurikulum-only — 7 domain dipecah ke 6 controller
- **Kurikulum Akademik**: KRS approval workflow, nilai auto-kalkulasi, bobot nilai upsert, laporan generate 4 tipe
- **Report Generation**: Rekap Nilai, Statistik KRS, Performa Mahasiswa, Distribusi IPK — dengan visualisasi data
- **25+ Models**: Tambahan BobotNilai, JenjangPengguna, Krs, KrsDetail, Kurikulum, LaporanAkademik, MataPelajaran, Nilai, Organisasi, PaketSemester
- **20+ Migrations**: Tabel baru untuk akademik, organisasi, langganan, KRS, nilai, bobot, laporan
- **Split Seeders**: Seeder dipecah per domain untuk maintenance lebih mudah

### v5.0

- **Rename peran**: `siswa` → `pengguna`, `guru` → `tim` — konsisten di seluruh controller, model, view, dan seeder
- **Role-based sidebar** -- Sidebar navigasi unik per peran: Admin (15 menu), Tim (8 menu), Pengguna (10 menu)
- **3-step registration wizard** -- Form 3 langkah: Data Diri → Peran & Tujuan → Keamanan
- **Google reCAPTCHA** -- Proteksi bot pada form pendaftaran
- **Password strength meter** -- Visualisasi kekuatan password real-time (4 level)
- **Music player** -- 5 stasiun radio streaming (Lo-Fi, Jazz, Deep House, Ambient, Classical) di panel settings
- **Expanded seeder** -- 63 user, 10 kelas, 14 berita, 15 mitra dengan data realistis Indonesia
- **Header sizing** -- Padding nav-link dioptimalkan (10px 16px, font 13.5px, row height 68px)
- **Dashboard label** -- "Dasbor Guru" → "Dasbor Tim", "Dasbor Siswa" → "Dasbor Pengguna"
- **Sidebar mobile** -- Toggle sidebar responsif dengan overlay untuk layar kecil

### v4.0

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
  KVT Hub v5.0 - Global Education & Research Ecosystem<br>
  &copy; 2025-2026 KVT Hub. Semua hak dilindungi.
</p>
