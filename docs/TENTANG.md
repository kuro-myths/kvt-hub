<p align="center">
  <img src="../gambar/kuro/kuro.png" alt="KVT Hub" width="100">
</p>

<h1 align="center">📖 Tentang KVT Hub</h1>

<p align="center">
  Dokumentasi lengkap tentang apa itu KVT Hub, fitur, halaman, dan API.
</p>

---

## Apa itu KVT Hub?

**KVT Hub** (Komunitas Virtual Terpadu Hub) adalah ekosistem pembelajaran, karir, dan riset digital terdepan yang mengintegrasikan **13 jenjang pendidikan** (TK hingga S3/PhD) dengan teknologi gamifikasi RPG, kolaborasi riset global, dan standar keamanan enterprise.

Platform ini menghubungkan **7 peran** — Admin, Staff, Guru/Pengajar, Siswa, Mahasiswa, Orang Tua, dan Pengunjung — dalam satu ekosistem terintegrasi.

---

## Fitur Utama

### Beranda Terpisah (Auth vs Guest)

- **Guest (Tamu)**: Landing page publik — hero, statistik, kelas populer, berita, ekosistem
- **Authenticated (Login)**: Dashboard personalisasi — quick stats, progress kelas, tugas mendatang, aktivitas terbaru, rekomendasi kelas

### 20 Menu Navigasi + 130+ Halaman

**Baris 1 (6 Menu Utama):**

| Menu | Subhalaman |
|------|-----------|
| Beranda | Guest ↔ Authenticated |
| Jenjang | 13 jenjang (TK–Profesi) |
| Platform | Kelas, Materi, Kuis, Laporan |
| Kerja Sama | Listing + Detail |
| Tentang | — |
| Berita | Listing + Detail |

**Baris 2 (14 Menu dengan Arrow Slider):**

| Menu | Subhalaman |
|------|-----------|
| Riset & Inovasi | Publikasi, Kolaborasi, Inovasi & Paten, Konferensi |
| Karir & Industri | Mentoring, CV Builder, Lowongan, Magang |
| Komunitas | Forum, Study Group, Alumni, Hackathon, Open Source |
| Sertifikasi | Kompetensi Nasional, Cloud & Tech, Blockchain |
| Sumber Daya | E-Book & Modul, Dataset, Dev Tools |
| Keamanan | Tata Kelola IT, Privasi Data |
| Kurikulum | Silabus, RPS, Kalender Akademik, Learning Outcomes |
| Alur & Panduan | Flowchart, Panduan, SOP, FAQ |
| Media | Video Tutorial, Webinar, Podcast, Galeri Foto |
| Dokumen | Kebijakan, Template, Formulir, Arsip Regulasi |
| Search Engine | KVT Hub / Web / AI Explorer |
| Statistik | — |
| Langganan | — |
| Layanan | Paket, Sertifikat, CV Builder, FAQ, Hubungi Kami |

### LED Dot Matrix Panel

Panel LED hijau neon (#00ff66) di top bar dengan 5 mode:

- **Shalat** — Jadwal shalat 5 waktu
- **Waktu Dunia** — 8 timezone real-time (Jakarta, Tokyo, London, NYC, Dubai, Sydney, Paris, Seoul)
- **Motivasi** — Quote pendidikan berganti setiap 60 detik
- **Info** — Informasi platform KVT Hub
- **Kustom** — Teks bebas input pengguna

### Loading Screen

Animasi logo "K" dengan pulse effect dan progress bar. Auto-hide setelah `window.onload` (max 1.2 detik).

### Music Player (Streaming)

5 stasiun radio: Lo-Fi Hip Hop, Jazz, Deep House, Ambient, Classical. Kontrol penuh dengan play/pause, seek bar, volume, shuffle, repeat. State disimpan di localStorage.

### Search Engine (3 Mode)

- **KVT Hub Search** — Query backend `/api/search`
- **Web Search** — Redirect ke Google, Bing, DuckDuckGo, Scholar, GitHub, arXiv
- **AI Explorer** — Coming soon

### Sistem RPG & Gamifikasi

100 Level dengan 10 tingkatan rank (Novice → Grandmaster). XP dari setiap aktivitas. Progress bar, pencapaian visual, leaderboard.

### Real-Time Visitor Analytics

Pelacakan IP, negara, browser, OS, perangkat. Geo-lokasi via ip-api.com. Auto-refresh 15 detik. Flag counter dari database.

### News System

News ticker, popup berita, halaman listing + detail. 9 kategori. Admin CRUD lengkap.

### Kerja Sama & Sponsor Hub

5 tier: Platinum, Gold, Silver, Bronze, Community. 5 tipe mitra. Admin CRUD + upload logo.

### 3-Step Registration Wizard

1. Data Diri: Nama, Email, Asal Instansi, Kota
2. Peran & Tujuan: Role, Tujuan, Bidang Minat
3. Keamanan: Password (strength meter), reCAPTCHA, Terms

### Cerita Kuro — The Book of MYTHS

10 chapter cerita epik. 5 Aliansi Mitos (VTA, VTI, VTU, VTE, VTO). Book-spine UI interaktif di `/kuro`. Admin CRUD di `/admin/kuro-cerita`.

---

## Admin Modal-Based CRUD (14 Modul)

| Fitur | Aksi | Fitur Khusus |
|-------|------|-------------|
| Pengguna | CRUD + Toggle | Stats per role, self-protection |
| Kelas | CRUD | Auto kode_kelas |
| Berita | CRUD | Gambar, ticker/popup/unggulan |
| Kerja Sama | CRUD | Logo, tipe/tier |
| Kurikulum | CRUD | Jenjang filter, akreditasi |
| Mata Pelajaran | CRUD | Kurikulum dropdown |
| Organisasi | CRUD | Tipe, aktif/unggulan |
| KRS | Setujui/Tolak/Hapus | Approval workflow |
| Nilai | CRUD | Auto kalkulasi |
| Bobot Nilai | CRUD (Upsert) | Panduan standar |
| Laporan Akademik | Generate/Lihat/Hapus | 4 tipe |
| Paket Eksklusif | CRUD + Toggle | XP bonus |
| Kunci Admin | Batch Create/Hapus | Format KVT-XXXXX |
| Pengunjung | View Only | Grafik, analytics |

---

## Daftar Lengkap 130+ Halaman

### Halaman Publik (29 halaman)

| No | Halaman | Route |
|----|---------|-------|
| 1 | Beranda (Tamu) | `/` |
| 2 | Beranda (Login) | `/` |
| 3-7 | Jenjang, Platform, Tentang, Berita, Kerja Sama | `/jenjang` `/platform` `/tentang` `/berita` `/kerja-sama` |
| 8-17 | Riset, Karir, Komunitas, Sertifikasi, Langganan, Sumber Daya, Keamanan, Kurikulum, Panduan, Media | `/riset` `/karir` dll |
| 18-29 | Dokumen, Bantuan, Statistik, Akun, Lisensi, Sponsor, Kuro, Donasi, Penjamin Mutu, dll | `/dokumen-info` dll |

### Halaman Pendidikan (13 halaman)

TK/PAUD, SD/MI, SMP/MTs, SMA/MA, SMK Teknologi, SMK Bisnis, SMK Kesehatan, Diploma, Sarjana, Magister, Doktoral, Post-Doktoral, Profesi

### Halaman Sub-Menu (50+ halaman)

Riset (4), Karir (4), Komunitas (7), Sertifikasi (3), Sumber Daya (3), Keamanan (2), Kurikulum (4), Alur & Panduan (4), Media (4), Dokumen (4)

### Halaman Auth (5 halaman)

Masuk, Daftar, Daftar Pengajar, Masuk Admin, Verifikasi Status

### Halaman Dashboard (4 + 18 admin + panel lainnya)

Admin (15 menu), Pengajar (9 menu), Staff (6 menu), Pengguna (10 menu)

---

## API Endpoints

| Endpoint | Method | Response |
|----------|--------|----------|
| `/api/pengunjung/statistik` | GET | hari_ini, online, total, total_unik |
| `/api/pengunjung/flag-counter` | GET | negara[], pageviews |
| `/api/pengunjung/grafik-mingguan` | GET | 7 hari [{tanggal, total}] |
| `/api/pengunjung/grafik-per-jam` | GET | 24 jam [{jam, total}] |
| `/api/pengunjung/halaman-populer` | GET | top 10 [{halaman, total}] |
| `/api/berita/ticker` | GET | 10 berita [{judul, slug}] |
| `/api/berita/popup` | GET | 5 berita popup |
| `/api/search?q=keyword` | GET | hasil[] dari berita, kelas, materi, mitra |

---

## Database Schema (PostgreSQL)

### Tabel Utama (20+)

| Tabel | Deskripsi |
|-------|-----------|
| users | Pengguna + RPG (level, xp, rank) |
| kelas | Kelas pembelajaran |
| materi | Materi per kelas (video/artikel) |
| kuis, kuis_hasil, kuis_pertanyaan | Quiz system |
| krs, krs_detail | KRS akademik |
| kurikulum | Kurikulum (SD-S3) |
| mata_pelajaran | Mata pelajaran per kurikulum |
| nilai | Nilai + auto kalkulasi |
| bobot_nilai | Bobot per kurikulum |
| laporan_akademik | 4 tipe laporan |
| pengunjung | Visitor analytics |
| berita | News system |
| kerja_sama | Mitra & sponsor |
| organisasi | Organisasi kemahasiswaan |
| paket_eksklusif | Langganan premium |
| kunci_admin | Kunci akses admin |
| langganan | Relasi user-paket |
| pencapaian | Achievement badges |
| kuro_cerita | Chapter cerita Kuro |
| kehadiran | Presensi |

---

## 9 Ilustrasi SVG Kustom

| File | Digunakan di |
|------|-------------|
| hero-education.svg | Beranda |
| ecosystem-hub.svg | Ekosistem |
| flowchart-alur.svg | Alur & Panduan |
| dashboard-preview.svg | Dashboard |
| sertifikat-preview.svg | Sertifikasi |
| keamanan-shield.svg | Keamanan |
| riset-lab.svg | Riset |
| jenjang-steps.svg | Jenjang |
| komunitas-network.svg | Komunitas |

---

## Standar Keamanan & Tata Kelola

- **ISO 27001** — Risk Assessment, Access Control (RBAC), AES-256-GCM, TLS 1.3
- **COBIT 2019** — IT Governance, Performance Management, CMMI
- **UU ITE & PDP** — Consent Management, Data Protection, Breach Notification
- **QA/QC** — Automated Testing, KPI Monitoring (NPS, CSAT, SLA)
- **SPK/DSS** — AHP, TOPSIS, SAW decision support methods
- **CRM** — User segmentation, engagement tracking, lifecycle management

---

<p align="center">
  <a href="../README.md">⬅️ Kembali ke README</a> •
  <a href="ALUR.md">🏗️ Arsitektur & Alur →</a>
</p>
