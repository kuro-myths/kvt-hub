<h1 align="center">📋 Changelog — KVT Hub</h1>

<p align="center">
  Riwayat perubahan dari versi 1.0 hingga 8.5
</p>

---

## v8.5 — Ekosistem 100 Menu, Dropdown Fix & Route Audit *(Current)*

> Tanggal: 25 Februari 2026

### Fitur Baru
- **59 Halaman Ekosistem Baru** — Semua route "Menu Tambahan Ekosistem" kini memiliki blade view yang lengkap:
  - Inkubator, Akselerator, Startup Hub, Hackathon Global, Olimpiade
  - Pertukaran Pelajar, Studi Banding, Kelas Industri, Bootcamp, Coding Lab
  - AI Center, Cyber Security, Data Science, IoT Lab, Cloud Computing
  - Blockchain Center, VR/AR Lab, Robotika, Game Development, Desain Grafis
  - Fotografi, Videografi, Musik Digital, Animasi 3D, UI/UX Studio
  - Content Creator, Digital Marketing, SEO & SEM, Bisnis Digital, FinTech
  - AgriTech, HealthTech, EdTech, GreenTech, LegalTech
  - Bahasa Asing, Sastra & Budaya, Penelitian Sosial, Psikologi Pendidikan
  - Hukum & Regulasi, Ekonomi & Keuangan, Manajemen Bisnis, Hubungan Internasional
  - Administrasi Publik, Arsitektur, Teknik Sipil, Teknik Mesin, Teknik Elektro
  - Teknik Informatika, Sistem Informasi, Kedokteran, Farmasi, Keperawatan
  - Gizi & Kesehatan, Lingkungan Hidup, Pariwisata, Perhotelan, Tata Boga, Olahraga
- **Route Profil Kuro** — Tambah route `halaman.tentang.profil-kuro` untuk view orphan yang sebelumnya tidak terdaftar

### Perbaikan
- **Fix Dropdown Menu Terpotong Kiri/Kanan** — Perbaiki dropdown navigasi yang terpotong di sisi kiri/kanan viewport:
  - Hapus `overflow-x-hidden` dari tag `<html>` yang menyebabkan clip pada dropdown
  - Tambah CSS `.dropdown-flip-right` dan `.dropdown-flip-left` untuk auto-positioning dropdown di tepi layar
  - Tambah fungsi JS `posisiDropdown()` yang otomatis mendeteksi dan menyesuaikan posisi dropdown agar selalu terlihat penuh
  - Dropdown di sisi kanan layar otomatis di-flip ke kiri, dan sebaliknya
- **Route Audit Lengkap** — 115 `Route::view()` diverifikasi, 0 missing blade files, 0 mismatch

### Statistik
- **Total route ekosistem**: 115 Route::view + controller routes
- **Total halaman blade**: 179 file
- **Missing views sebelumnya**: 59 → **0**
- **Orphan views sebelumnya**: 1 → **0**

---

## v8.4 — GitHub API Real-time Integration

> Tanggal: Februari 2026

### Fitur Baru
- **GitHub API Real-time** — Integrasi API GitHub untuk statistik repositori real-time
- **BerandaController Fix** — Perbaikan controller beranda untuk kompatibilitas data

---

## v8.3 — Universal Export & Route Audit

> Tanggal: Februari 2026

### Fitur Baru
- **Universal Export 5 Format** — Seluruh 21 halaman admin kini bisa diekspor:
  - Excel (.xlsx) via SheetJS — tabel lengkap dengan header
  - PDF (.pdf) via jsPDF + AutoTable — landscape A4, branding KVT Hub, page numbers
  - Word (.doc) via HTML Blob — styling Calibri, tabel rapi
  - CSV (.csv) — UTF-8 BOM compatible, delimiter koma
  - PowerPoint (.pptx) via PptxGenJS — title slide + data slides (12 baris/slide)
- **Komponen Tombol Ekspor** — `komponen/tombol-ekspor.blade.php` reusable untuk semua halaman admin
- **CDN Libraries** — Alpine.js 3.14.3, SheetJS 0.18.5, jsPDF 2.5.1, jsPDF-AutoTable 3.8.1, PptxGenJS 3.12.0 ditambahkan ke layout dasbor
- **Normalisasi Tanggal 2026** — Kalender akademik, pengumuman, event, statistik dinormalisasi ke 2026/2027

### Perbaikan
- **Route Audit Komprehensif** — 286 rute diverifikasi terhadap 178 blade file, 0 error, 0 mismatch
- **Paket Admin Export** — Card grid paket mendapat hidden table untuk kompatibilitas ekspor
- **Pengunjung Analytics Export** — Halaman analytics mendapat tombol ekspor di section Recent Visitors
- **README.md** — Badges, fitur, teknologi, dan roadmap diperbarui ke v8.3

---

## v8.2 — Diagram Builder 50 Jenis

> Tanggal: Februari 2026

### Fitur Baru
- **Diagram Builder Visual** — Antarmuka visual interaktif untuk membuat diagram:
  - 50 jenis diagram (naik dari 30): Batang, Garis, Lingkaran, Radar, Scatter, Kombinasi, Statistik, Flow, Indikator, dan lainnya
  - 4-tab panel: Tipe, Data, Gaya, Opsi
  - Live preview canvas dengan Chart.js
  - 6 template cepat: Siswa, Nilai, Kehadiran, Bulanan, Perbandingan, Kosong
  - 6 palet warna: Default, Ocean, Sunset, Forest, Neon, Monochrome
  - Kustomisasi gaya: border, radius, opacity, tension, font family
  - Opsi lanjutan: legend, title, grid, animasi, fill, stacked, aspect ratio
  - Dataset dinamis: tambah/hapus/ubah warna per dataset
  - Ekspor gambar PNG/JPG
  - Mode fullscreen
  - Edit, duplikat, hapus diagram yang tersimpan
  - JSON editor (advanced, collapsible)
- **CRUD Diagram Lengkap** — Edit, duplikat, dan hapus diagram dari builder & index
- **Akses Semua Role** — Diagram Builder tersedia untuk pengajar, staff, dan pengguna via sidebar

### Perbaikan
- **Tampilkan Diagram** — Chart type map diperluas ke 50 jenis dengan opsi spesifik per tipe
- **Index Laporan** — Deskripsi diperbarui ke 50 jenis, tombol Builder ditambahkan, link edit per diagram

---

## v8.1 — Fitur Pengajar: Silabus, Jurnal, Nilai

> Tanggal: Februari 2026

### Fitur Baru
- **Silabus CRUD** — Kelola silabus per mata pelajaran (kompetensi inti/dasar, materi, metode, penilaian, sumber)
- **Jurnal Mengajar** — Catatan harian mengajar per kelas (topik, kegiatan, catatan, kehadiran)
- **Nilai & Penilaian** — Input nilai siswa per kelas:
  - Mode spreadsheet (input langsung di tabel)
  - Ekspor/impor data
  - Statistik nilai otomatis

---

## v8.0 — AI VTuber Assistant & Nav Overhaul

> Tanggal: Februari 2026

### Fitur Baru
- **AI VTuber Assistant (Kuro AI)** — Karakter VTuber interaktif sebagai asisten platform:
  - Chat widget floating di pojok kiri bawah
  - Avatar karakter Kuro dengan animasi
  - Knowledge base untuk navigasi, fitur, jenjang, edukasi gratis
  - Quick action buttons untuk pertanyaan umum
  - Mode 3D fullscreen (siap untuk model Live2D/VRM/GLB)
  - Voice input placeholder (Web Speech API)
  - Typing indicator & response animation
- **Navbar Scroll di Luar Popup** — Tombol panah kiri/kanan langsung di navbar
- **Mouse Wheel Navigation** — Scroll mouse wheel di area menu untuk ganti halaman
- **4 Menu Per Halaman** — Lebih rapi, dari 5 → 4 menu per halaman (10 halaman total)
- **10 Halaman Kustomisasi** — Menu customizer mendukung 10 halaman

### Perbaikan
- **HTML Fix** — Perbaiki tag `<button>` yang hilang pada menu Berita & Media
- **Header & Footer Sinkron** — Versi footer diperbarui ke v8.0
- **README Audit** — Badge, versi, dan deskripsi fitur diperbarui ke v8.0
- **CHANGELOG** — Riwayat diperbarui hingga v8.0

---

## v7.0 — LED Dot Matrix & Loading Screen

> Tanggal: Februari 2026

### Fitur Baru
- **LED Dot Matrix Panel** — Panel LED hijau neon (#00ff66) di top bar, 5 mode:
  - Jadwal Shalat (5 waktu)
  - Waktu Dunia (8 timezone real-time)
  - Motivasi (quote otomatis per 60 detik)
  - Info Platform
  - Teks Kustom (user input)
- **Loading Screen** — Animasi logo "K" + pulse + progress bar, auto-hide max 1.2 detik
- **Menu Layanan** — Menggantikan menu Akun (duplikat), berisi: Paket Langganan, Sertifikat, CV Builder, FAQ, Hubungi Kami
- **Pengaturan LED di Settings Panel** — Toggle on/off, pilih mode, input teks, slider kecepatan

### Perubahan
- **20 Menu Navigasi** — Dari 16 → 20 menu (tambah Search Engine, Statistik, Langganan, Layanan)
- **Landing Page Diperkaya** — 4 section baru: Teknologi (8 item), Testimoni (3 review), Statistik (6 angka), FAQ Accordion (5 pertanyaan)
- **News Ticker Fallback** — 5 headline statis sebagai backup
- **PHP 8.3 Upgrade** — Laragon PHP 8.1.10 → 8.3.25
- **Performa** — Cache config, route, view untuk loading cepat

---

## v6.0 — 4-Role System & Modal CRUD

> Tanggal: Januari 2026

### Fitur Baru
- **4-Role System** — `tim` dipecah jadi `pengajar` + `staff` dengan dashboard terpisah
- **3 Layout Terpisah** — `utama.blade.php` (landing), `dasbor.blade.php` (dashboard), `auth.blade.php`
- **Modal-Based CRUD** — 14 modul admin menggunakan popup modal (create/edit/delete)
- **14 Admin Controllers** — Setiap domain punya controller sendiri
- **Kurikulum Akademik** — KRS approval, nilai auto-kalkulasi, bobot nilai upsert, 4 tipe laporan
- **Report Generation** — Rekap Nilai, Statistik KRS, Performa Mahasiswa, Distribusi IPK

### Perubahan
- **View Reorganization** — Views dipindah ke `akun/admin/`, `akun/pengajar/`, `akun/staff/`, `akun/pengguna/`
- **Route Separation** — 4 file route terpisah per role
- **KurikulumController Refactor** — 248 baris → 65 baris (7 domain dipecah ke 6 controller)
- **25+ Models** — Tambahan BobotNilai, JenjangPengguna, Krs, KrsDetail, Kurikulum, dll
- **20+ Migrations** — Tabel baru untuk akademik, organisasi, KRS, nilai, bobot, laporan
- **Split Seeders** — Per domain untuk maintenance lebih mudah

---

## v5.0 — Role Rename & Music Player

> Tanggal: Desember 2025

### Fitur Baru
- **Role-based sidebar** — Sidebar navigasi unik per peran: Admin (15), Tim (8), Pengguna (10)
- **3-step registration wizard** — Data Diri → Peran & Tujuan → Keamanan
- **Google reCAPTCHA** — Proteksi bot pada form pendaftaran
- **Password strength meter** — Visualisasi kekuatan password real-time (4 level)
- **Music player** — 5 stasiun radio streaming di settings panel

### Perubahan
- **Rename peran** — `siswa` → `pengguna`, `guru` → `tim`
- **Expanded seeder** — 63 user, 10 kelas, 14 berita, 15 mitra
- **Dashboard label** — "Dasbor Guru" → "Dasbor Tim", "Dasbor Siswa" → "Dasbor Pengguna"
- **Sidebar mobile** — Toggle responsif dengan overlay

---

## v4.0 — 66+ Halaman Landing Page

> Tanggal: November 2025

### Fitur Baru
- **16 menu navigasi** (dari 12) — tambah Kurikulum, Alur & Panduan, Media, Dokumen
- **66+ halaman** (dari 8) — 16 induk + 50+ subhalaman, masing-masing 200-377 baris
- **Beranda terpisah** Auth vs Guest dengan `BerandaController`
- **9 ilustrasi SVG kustom** di `public/images/`
- **FAQ accordion** interaktif di setiap halaman
- **Dashboard personalisasi** — kelas aktif, materi, kuis, pencapaian, aktivitas, rekomendasi

### Perubahan
- **40+ halaman di-expand** dari ~40-128 baris menjadi 200-377 baris
- **Dropdown warna unik** per menu (indigo, teal, rose, amber)
- **20 rute baru** di web.php
- **Mobile navigation** updated

---

## v3.0 — PostgreSQL & Visitor Analytics

> Tanggal: Oktober 2025

### Fitur Baru
- **Migrasi MySQL → PostgreSQL**
- **Real-time visitor analytics** dengan flag counter dari database
- **News ticker & popup** dari database
- **Kerja sama & sponsor hub** dengan tier system (Platinum–Community)
- **Expanded navigation** — 12 menu + arrow slider
- **Functional search engine** — Backend API dengan PostgreSQL `ilike`
- **Admin CRUD** — Berita, mitra, pengunjung dashboard

### Perubahan
- 3 migration baru, 3 model baru, 4 controller baru, 1 middleware baru
- 10 view file baru
- Seeder: 8 berita, 10 mitra, 150 pengunjung sample

---

## v2.0 — Mega Menu & Ecosystem Pages

> Tanggal: September 2025

### Fitur Baru
- **Mega menu navigation**
- **8 halaman ekosistem** — Jenjang, Riset, Karir, Komunitas, Sertifikasi, Sumber Daya, Keamanan, Penjamin Mutu
- **Custom search engine** — 3 mode (KVT, Web, AI)
- **News popup** & revamped footer
- **Top bar** dengan info platform

---

## v1.0 — Core LMS

> Tanggal: Agustus 2025

### Fitur Awal
- **Core LMS** — Kelas, Materi, Kuis
- **Gamifikasi RPG** — 100 level, XP system, 10 rank (Novice → Grandmaster)
- **Multi-peran** — Siswa, Guru, Admin
- **14 models, 7 controllers, 24 views**
- **MySQL database** dengan basic auth
- **Dasar UI** — Tailwind CSS, Blade Templates

---

## Ringkasan Evolusi

| Versi | Highlight | Halaman | Menu | Role | Database |
|-------|-----------|---------|------|------|----------|
| v1.0 | Core LMS + RPG | ~24 | 5 | 3 | MySQL |
| v2.0 | Mega Menu + 8 Ekosistem | ~32 | 12 | 3 | MySQL |
| v3.0 | PostgreSQL + Analytics | ~42 | 12 | 3 | PostgreSQL |
| v4.0 | 66+ Landing Pages | 66+ | 16 | 3 | PostgreSQL |
| v5.0 | Music + Role Rename | 66+ | 16 | 3 | PostgreSQL |
| v6.0 | 4-Role + Modal CRUD | 100+ | 16 | 4 | PostgreSQL |
| v7.0 | LED + Loading + 20 Menu | 130+ | 20 | 7 | PostgreSQL |
| v8.0 | AI VTuber + Nav Overhaul | 174+ | 40 | 7 | PostgreSQL |
| v8.1 | Pengajar: Silabus, Jurnal | 174+ | 40 | 7 | PostgreSQL |
| v8.2 | Diagram Builder 50 Jenis | 174+ | 40 | 7 | PostgreSQL |
| **v8.3** | **Universal Export 5 Format** | **174+** | **40** | **7** | **PostgreSQL** |

---

<p align="center">
  <a href="README.md">⬅️ Kembali ke README</a>
</p>
