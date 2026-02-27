<p align="center">
  <img src="../public/gambar/kuro/kuro.png" alt="KVT Hub" width="100">
</p>

<h1 align="center">📚 Dokumentasi Lengkap — KVT Hub v8.7</h1>

<p align="center">
  Seluruh dokumentasi proyek KVT Hub dalam satu file.<br>
  Terakhir diperbarui: 27 Februari 2026
</p>

---

## 📋 Daftar Isi

- [1. Tentang KVT Hub](#1-tentang-kvt-hub)
- [2. Arsitektur & Alur](#2-arsitektur--alur)
- [3. Fitur Utama](#3-fitur-utama)
- [4. Multi-Role System](#4-multi-role-system)
- [5. 12 Pilar Ekosistem](#5-12-pilar-ekosistem)
- [6. Daftar Halaman](#6-daftar-halaman)
- [7. Database Schema](#7-database-schema)
- [8. API Endpoints](#8-api-endpoints)
- [9. AI Chatbot](#9-ai-chatbot)
- [10. Floating Chatbot Widget](#10-floating-chatbot-widget)
- [11. Code Executor](#11-code-executor)
- [12. Status Fitur Halaman Utama](#12-status-fitur-halaman-utama)
- [13. Deployment & Hosting](#13-deployment--hosting)
- [14. Deployment Checklist](#14-deployment-checklist)
- [15. Sponsor & Dukungan](#15-sponsor--dukungan)
- [16. Kontribusi](#16-kontribusi)
- [17. Akun Demo](#17-akun-demo)
- [18. Audit Route & Menu](#18-audit-route--menu)
- [19. Changelog](#19-changelog)

---

## 1. Tentang KVT Hub

**KVT Hub** (Komunitas Virtual Terpadu Hub) adalah ekosistem pembelajaran, karir, dan riset digital terdepan yang mengintegrasikan **13 jenjang pendidikan** (TK hingga S3/PhD) dengan teknologi gamifikasi RPG, kolaborasi riset global, dan standar keamanan enterprise.

Platform ini menghubungkan **7 peran** — Admin, Staff, Guru/Pengajar, Siswa, Mahasiswa, Orang Tua, dan Pengunjung — dalam satu ekosistem terintegrasi.

### Ringkasan Fitur

| Fitur | Deskripsi |
|-------|-----------|
| 🎓 **13 Jenjang** | TK, SD, SMP, SMA, SMK (3 jurusan), D1-D3, S1, S2, S3, Post-Doc, Profesi |
| 👥 **7 Peran** | Admin, Staff, Guru, Siswa, Mahasiswa, Orang Tua, Pengunjung |
| 📄 **174+ Halaman** | 80+ landing publik + 90+ halaman dashboard/panel |
| 🎮 **Gamifikasi RPG** | 100 level, 10 rank, XP system, achievement badges |
| 🎵 **Music Player** | 5 stasiun radio streaming (Lo-Fi, Jazz, Deep House, Ambient, Classical) |
| 💡 **LED Dot Matrix** | Panel LED hijau neon, 5 mode (Shalat, Waktu Dunia, Motivasi, Info, Kustom) |
| 🔍 **Search Engine** | 3 mode pencarian (Internal, Web, AI Explorer) |
| 📊 **50+ Diagram** | Bar, Line, Pie, Doughnut, Radar, Scatter, Flow via Chart.js v4 |
| 📥 **Ekspor 5 Format** | Excel, PDF, Word, CSV, PowerPoint |
| 🌍 **Visitor Analytics** | Tracking real-time, geo-lokasi, flag counter |
| 🛡️ **ISO 27001 + COBIT** | Standar keamanan enterprise |
| 🤖 **AI VTuber Assistant** | Karakter VTuber interaktif dengan model 3D |
| 🖥️ **Code Executor** | Platform programming multi-language (11 bahasa) |
| 💬 **AI Chatbot** | Chatbot cerdas berbasis OpenAI GPT-4o-mini |

### Beranda Terpisah (Auth vs Guest)

- **Guest (Tamu)**: Landing page publik — hero, statistik, kelas populer, berita, ekosistem
- **Authenticated (Login)**: Dashboard personalisasi — quick stats, progress kelas, tugas mendatang, aktivitas terbaru, rekomendasi kelas

### Teknologi

| Kategori | Stack |
|----------|-------|
| **Backend** | Laravel 12, PHP 8.5+ |
| **Database** | PostgreSQL 14+ |
| **Frontend** | Tailwind CSS (CDN), Alpine.js 3.14, Blade Templates |
| **Charting** | Chart.js v4 (50+ jenis diagram) |
| **Ekspor** | SheetJS (Excel), jsPDF (PDF), PptxGenJS (PPT), CSV, Word |
| **Animasi** | AOS v2.3.4, CSS Snow, Ticker |
| **Ikon** | Font Awesome 6.5.1 |
| **Font** | Google Fonts (Plus Jakarta Sans, Press Start 2P) |
| **LED** | Dot Matrix Panel (5 mode, hijau neon) |
| **Geo API** | ip-api.com |
| **Keamanan** | RBAC, CSRF, XSS, reCAPTCHA, Auth Guard |
| **AI** | OpenAI GPT-4o-mini |
| **Musik** | Streaming radio (ilovemusic.de) |
| **Translate** | Google Translate Widget (6 bahasa) |

### Standar Keamanan & Tata Kelola

- **ISO 27001** — Risk Assessment, Access Control (RBAC), AES-256-GCM, TLS 1.3
- **COBIT 2019** — IT Governance, Performance Management, CMMI
- **UU ITE & PDP** — Consent Management, Data Protection, Breach Notification
- **QA/QC** — Automated Testing, KPI Monitoring (NPS, CSAT, SLA)
- **SPK/DSS** — AHP, TOPSIS, SAW decision support methods
- **CRM** — User segmentation, engagement tracking, lifecycle management

---

## 2. Arsitektur & Alur

### Architecture Overview

```
┌──────────────────────────────────────────────────────────────────┐
│                         Browser (Client)                         │
│   Tailwind CSS · Chart.js v4 · Font Awesome · AOS · html2canvas  │
└──────────────────────────┬───────────────────────────────────────┘
                           │ HTTP / HTTPS
                           ▼
┌──────────────────────────────────────────────────────────────────┐
│                      Laravel 12 Router                            │
│  web.php → admin.php / pengajar.php / staff.php / pengguna.php   │
│  Middleware: auth, cek.peran:{role}, CatatPengunjung              │
└──────────────────────────┬───────────────────────────────────────┘
                           │
              ┌────────────┼────────────┐
              ▼            ▼            ▼
     ┌────────────┐ ┌───────────┐ ┌──────────┐
     │ Controller │ │   Model   │ │   View   │
     │ (49 total) │ │ (36 ORM)  │ │ (Blade)  │
     │            │ │           │ │ 174 files│
     │ Admin  (14)│ │ User      │ │ 4 layouts│
     │ Pengajar(6)│ │ Kelas     │ │ 4 headers│
     │ Staff   (4)│ │ Krs/KHS   │ │ 4 sidebar│
     │ Pengguna(6)│ │ Laporan   │ │ 80+ pages│
     │ Publik (19)│ │ Nilai     │ │          │
     └──────┬─────┘ └─────┬─────┘ └──────────┘
            │              │
            │         ┌────┴────┐
            └────────>│PostgreSQL│
                      │ 25+ tbl │
                      └─────────┘
```

### User Flow

```
                    ┌──────────────┐
                    │   Pengunjung  │
                    └──────┬───────┘
                           │
                    ┌──────▼───────┐
                    │  Beranda /   │
                    │  Landing Page │
                    └──────┬───────┘
                           │
               ┌───────────┼───────────┐
               ▼           │           ▼
        ┌────────────┐     │    ┌────────────┐
        │   Daftar   │     │    │   Masuk    │
        └──────┬─────┘     │    └──────┬─────┘
               └───────────┼───────────┘
                           │
                    ┌──────▼───────┐
                    │  Verifikasi  │
                    │    Email     │
                    └──────┬───────┘
                           │
              ┌────────────┼────────────────┐
              ▼            ▼                ▼
       ┌──────────┐ ┌──────────┐    ┌──────────┐
       │  Admin   │ │ Pengajar │    │ Pengguna │
       │ Dashboard│ │ Dashboard│    │ Dashboard│
       └──────────┘ └──────────┘    └──────────┘
```

### ERD (Entity Relationship Diagram)

```
┌──────────┐     ┌──────────────┐     ┌───────────────┐
│  users   │────<│     krs      │>────│  kurikulum    │
│──────────│     │──────────────│     │───────────────│
│ id       │     │ user_id (FK) │     │ id            │
│ name     │     │ kurikulum_id │     │ nama          │
│ email    │     │ semester     │     │ jenjang       │
│ peran    │     │ total_sks    │     │ durasi_tahun  │
│ level    │     │ status       │     │ total_sks     │
│ xp       │     └──────┬───────┘     │ akreditasi    │
└──────┬───┘            │             └───────┬───────┘
       │         ┌──────┴───────┐     ┌───────┴───────────┐
       │         │  krs_detail  │     │  mata_pelajaran   │
       │         │──────────────│     │───────────────────│
       │         │ krs_id (FK)  │     │ kurikulum_id (FK) │
       │         │ mapel_id(FK) │────>│ nama, kode        │
       │         │ sks          │     │ sks, semester     │
       │         └──────────────┘     └───────────────────┘
       │
       │         ┌──────────────┐     ┌───────────────┐
       ├────────<│   nilai      │>────│  bobot_nilai  │
       │         │──────────────│     │───────────────│
       │         │ user_id (FK) │     │ kurikulum_id  │
       │         │ mapel_id(FK) │     │ huruf, bobot  │
       │         │ tugas, uts   │     │ batas_bawah   │
       │         │ uas, praktik │     │ batas_atas    │
       │         │ nilai_akhir  │     └───────────────┘
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
       ├────────<│ kunci_admin  │     ┌───────────────────┐
       │         │ langganan    │     │  laporan_akademik │
       │         │ pengunjung   │     │  berita           │
       │         │ pencapaian   │     │  kerja_sama       │
       │         │ kehadiran    │     │  organisasi       │
       └─────────┘              │     └───────────────────┘
```

### Use Case Diagram

```
  ┌───────┐     Guest: Lihat Landing, Baca Berita, Cari, Daftar/Login
  │ Guest │
  └───────┘
  ┌──────────┐  Pengguna: Dashboard, Ikut Kelas/KRS, Kuis, Nilai/KHS, Progress
  │ Pengguna │
  └──────────┘
  ┌──────────┐  Pengajar: Buat Kelas, Materi & Kuis, Laporan
  │ Pengajar │
  └──────────┘
  ┌──────────┐  Staff: Kelola Pengguna, Kehadiran, Laporan
  │  Staff   │
  └──────────┘
  ┌──────────┐  Admin: CRUD 14 Modul, Approve KRS, Input Nilai, Analytics
  │  Admin   │
  └──────────┘
```

### Flowchart: Admin CRUD (Modal Pattern)

```
Admin Login → Sidebar Menu → Halaman Index
  ├── Tambah → Modal Create → Simpan → Redirect + Flash
  ├── Edit   → Modal Edit   → Update → Redirect + Flash
  ├── Hapus  → Modal Konfirmasi → Hapus → Redirect + Flash
  └── Filter → Data difilter
```

---

## 3. Fitur Utama

### LED Dot Matrix Panel
Panel LED hijau neon (#00ff66) di top bar dengan 5 mode:
- **Shalat** — Jadwal shalat 5 waktu
- **Waktu Dunia** — 8 timezone real-time
- **Motivasi** — Quote pendidikan berganti setiap 60 detik
- **Info** — Informasi platform KVT Hub
- **Kustom** — Teks bebas input pengguna

### Loading Screen
Animasi logo "K" dengan pulse effect dan progress bar. Auto-hide setelah `window.onload` (max 1.2 detik).

### Music Player (5 Stasiun Streaming)
Lo-Fi Hip Hop, Jazz, Deep House, Ambient, Classical. Kontrol play/pause, seek bar, volume, shuffle, repeat. State di localStorage.

### Search Engine (3 Mode)
- **KVT Hub Search** — Query backend `/api/search`
- **Web Search** — Redirect ke Google, Bing, DuckDuckGo, Scholar, GitHub, arXiv
- **AI Explorer** — Coming soon

### Sistem RPG & Gamifikasi
100 Level dengan 10 tingkatan rank (Novice → Grandmaster). XP dari setiap aktivitas. Progress bar, pencapaian visual, leaderboard.

### Real-Time Visitor Analytics
Pelacakan IP, negara, browser, OS, perangkat. Geo-lokasi via ip-api.com. Auto-refresh 15 detik. Flag counter.

### News System
News ticker, popup berita, halaman listing + detail. 9 kategori. Admin CRUD lengkap.

### 3-Step Registration Wizard
1. Data Diri: Nama, Email, Asal Instansi, Kota
2. Peran & Tujuan: Role, Tujuan, Bidang Minat
3. Keamanan: Password (strength meter), reCAPTCHA, Terms

### Cerita Kuro — The Book of MYTHS
10 chapter cerita epik. 5 Aliansi Mitos (VTA, VTI, VTU, VTE, VTO). Book-spine UI interaktif di `/kuro`. Admin CRUD.

### Mode Buku Interaktif
Fitur membaca materi dalam mode buku dengan animasi page-turning 3D realistis. Daftar isi otomatis, progress tracking, kuis di akhir buku.

### 9 Ilustrasi SVG Kustom
hero-education, ecosystem-hub, flowchart-alur, dashboard-preview, sertifikat-preview, keamanan-shield, riset-lab, jenjang-steps, komunitas-network

---

## 4. Multi-Role System

| Peran | Dashboard | Sidebar | Kemampuan Utama |
|-------|-----------|---------|-----------------|
| 👑 Admin | `/admin` | 15 menu | CRUD semua data, laporan, analytics, kunci |
| 👨‍🏫 Pengajar | `/pengajar` | 9 menu | Kelola kelas, materi, kuis, laporan |
| 👨‍💼 Staff | `/staff` | 6 menu | Kelola pengguna, kehadiran, rekap |
| 👨‍🎓 Pengguna | `/pengguna` | 10 menu | Belajar, KRS, KHS, kuis, progress |

### Admin Modal-Based CRUD (14 Modul)

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

## 5. 12 Pilar Ekosistem

| No | Pilar | Menu | Sub | Deskripsi |
|----|-------|------|-----|-----------|
| 1 | 🎓 Jenjang Pendidikan | Jenjang | 13 | TK hingga Post-Doktoral & Profesi |
| 2 | 🔬 Riset & Inovasi | Riset | 4 | Publikasi, kolaborasi, paten, konferensi |
| 3 | 💼 Karir & Industri | Karir | 4 | Job matching, magang, mentoring, CV builder |
| 4 | 🌐 Komunitas | Komunitas | 5 | Forum, study group, alumni, hackathon |
| 5 | 📜 Sertifikasi | Sertifikasi | 3 | Kompetensi, cloud/tech, blockchain |
| 6 | 📦 Sumber Daya | Sumber Daya | 3 | E-Book, dataset, dev tools |
| 7 | 🛡️ Keamanan | Keamanan | 2 | ISO 27001, privasi data |
| 8 | ✅ Penjamin Mutu | Mutu | — | QA/QC, SPK, PDCA |
| 9 | 📘 Kurikulum | Kurikulum | 4 | Silabus, RPS, kalender, outcomes |
| 10 | 🗺️ Alur & Panduan | Panduan | 4 | Flowchart, SOP, panduan, FAQ |
| 11 | 🎬 Media | Media | 4 | Video, webinar, podcast, galeri |
| 12 | 📄 Dokumen | Dokumen | 4 | Kebijakan, template, formulir, regulasi |

---

## 6. Daftar Halaman

### Halaman Publik (29 halaman)
Beranda (Guest/Login), Jenjang, Platform, Tentang, Berita, Kerja Sama, Riset, Karir, Komunitas, Sertifikasi, Langganan, Sumber Daya, Keamanan, Kurikulum, Panduan, Media, Dokumen, Bantuan, Statistik, Akun, Lisensi, Sponsor, Kuro, Donasi, Penjamin Mutu, dll.

### Halaman Pendidikan (13 halaman)
TK/PAUD, SD/MI, SMP/MTs, SMA/MA, SMK Teknologi, SMK Bisnis, SMK Kesehatan, Diploma, Sarjana, Magister, Doktoral, Post-Doktoral, Profesi

### Halaman Sub-Menu (50+ halaman)
Riset (4), Karir (4), Komunitas (7), Sertifikasi (3), Sumber Daya (3), Keamanan (2), Kurikulum (4), Alur & Panduan (4), Media (4), Dokumen (4)

### Halaman Ekosistem Tambahan (59 halaman)
Inkubator, Akselerator, Startup Hub, Hackathon Global, AI Center, Cyber Security, Data Science, IoT Lab, Cloud Computing, Blockchain Center, VR/AR Lab, Robotika, Game Dev, Bisnis Digital, FinTech, dan banyak lagi.

### Halaman Auth (5 halaman)
Masuk, Daftar, Daftar Pengajar, Masuk Admin, Verifikasi Status

### Halaman Dashboard (4 dashboard + panel per role)
Admin (15 menu), Pengajar (9 menu), Staff (6 menu), Pengguna (10 menu)

### Total Routes
- **HalamanController Methods:** 41
- **Route::view (Static):** 58
- **Sub-routes (Nested):** 49
- **Total:** 157+ routes — semua verified ✅

---

## 7. Database Schema

### Tabel Utama (20+)

| Tabel | Deskripsi |
|-------|-----------|
| users | Pengguna + RPG (level, xp, rank) |
| kelas | Kelas pembelajaran |
| materi | Materi per kelas |
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

### Tabel Chatbot (3)
| Tabel | Deskripsi |
|-------|-----------|
| chat_sessions | Session metadata, tokens, cost |
| chat_messages | Semua pesan user & assistant |
| chat_feedbacks | Rating & feedback |

### Tabel Code Executor (8)
| Tabel | Deskripsi |
|-------|-----------|
| programming_languages | 11 bahasa dikonfigurasi |
| code_snippets | Koleksi kode user |
| code_executions | Log eksekusi & hasil |
| code_analyses | Hasil analisis AI |
| learning_paths | Kursus programming |
| learning_modules | Konten modul kursus |
| learning_enrollments | Pendaftaran user |
| learning_completions | Penyelesaian modul |

---

## 8. API Endpoints

### Visitor API
| Endpoint | Method | Response |
|----------|--------|----------|
| `/api/pengunjung/statistik` | GET | hari_ini, online, total, total_unik |
| `/api/pengunjung/flag-counter` | GET | negara[], pageviews |
| `/api/pengunjung/grafik-mingguan` | GET | 7 hari [{tanggal, total}] |
| `/api/pengunjung/grafik-per-jam` | GET | 24 jam [{jam, total}] |
| `/api/pengunjung/halaman-populer` | GET | top 10 [{halaman, total}] |

### Berita API
| Endpoint | Method | Response |
|----------|--------|----------|
| `/api/berita/ticker` | GET | 10 berita [{judul, slug}] |
| `/api/berita/popup` | GET | 5 berita popup |

### Search API
| Endpoint | Method | Response |
|----------|--------|----------|
| `/api/search?q=keyword` | GET | hasil[] dari berita, kelas, materi, mitra |

### Chatbot API
| Endpoint | Method | Deskripsi |
|----------|--------|-----------|
| `POST /chat/create` | POST | Buat session baru |
| `POST /chat/{session}/send` | POST | Kirim message |
| `GET /chat/{session}` | GET | Lihat session + messages |
| `POST /chat/{session}/archive` | POST | Archive session |
| `DELETE /chat/{session}` | DELETE | Delete session |
| `POST /chat/message/{msg}/feedback` | POST | Submit feedback |
| `POST /api/chat/guest-session` | POST | Guest session (widget) |
| `POST /api/chat/send` | POST | Send via widget |

### Code Executor API
| Endpoint | Method | Deskripsi |
|----------|--------|-----------|
| `GET /code-executor` | GET | Dashboard |
| `GET /code-executor/editor/{lang}` | GET | Editor per bahasa |
| `POST /code-executor/execute` | POST | Jalankan kode |
| `POST /code-executor/snippet/save` | POST | Simpan snippet |
| `GET /code-executor/snippets` | GET | List snippet user |
| `POST /code-executor/analyze/{id}` | POST | Analisis AI |
| `POST /code-executor/explain/{id}` | POST | Penjelasan kode |
| `POST /code-executor/debug/{id}` | POST | Debug kode |
| `GET /code-executor/learning-paths` | GET | Daftar kursus |
| `GET /code-executor/explore` | GET | Jelajah snippet publik |

---

## 9. AI Chatbot

### Fitur
- Percakapan real-time dengan OpenAI GPT-4o-mini
- Context-aware responses dengan message history
- Knowledge base KVT Hub terintegrasi
- Multiple chat sessions per user
- Token & cost tracking real-time
- Feedback system (1-5 stars + types)
- Support guest (anonymous) dan authenticated users

### Konfigurasi

```env
OPENAI_API_KEY=sk-...your-api-key...
CHATBOT_MODEL=gpt-4o-mini
CHATBOT_MAX_TOKENS=2000
CHATBOT_TEMPERATURE=0.7
CHATBOT_ENABLED=true
```

### Model Selection
| Model | Input Token | Output Token | Speed |
|-------|------------|--------------|-------|
| `gpt-4o-mini` | $0.15/1M | $0.60/1M | ⚡ Cepat |
| `gpt-4o` | $5.00/1M | $15.00/1M | 🐢 Lambat |
| `gpt-3.5-turbo` | $0.50/1M | $1.50/1M | ⚡⚡ Sangat Cepat |

### Cost Management
```env
CHATBOT_COST_LIMIT_DAILY=10.00
CHATBOT_COST_LIMIT_MONTHLY=100.00
```

### Troubleshooting Chatbot
- **"Invalid API Key"** → Cek `.env` OPENAI_API_KEY, verifikasi di platform.openai.com
- **"Session not found"** → Cek user_id match, session status != deleted
- **Slow responses** → Switch ke `gpt-3.5-turbo`, reduce max_tokens

---

## 10. Floating Chatbot Widget

### Fitur
- Floating widget di bottom-right semua halaman
- Guest users bisa chat anonymous tanpa login
- Persistent sessions dengan localStorage token
- Responsive design (mobile & desktop)
- No page reload — semua via AJAX

### File Structure
```
resources/views/components/chatbot-widget.blade.php  ← Widget
app/Http/Controllers/ChatController.php              ← Endpoints
routes/web.php                                        ← Routes
```

### Customization
- **Posisi:** Edit class `bottom-6 right-6` → `bottom-6 left-6` dll
- **Warna:** Edit gradient class `from-violet-500 to-purple-600`
- **Ukuran:** Edit class `w-96 h-96` 

### Troubleshooting Widget
- **Tidak muncul:** Cek CSRF meta tag, include component di layout
- **Pesan gagal:** Cek OPENAI_API_KEY, cek localStorage `chatbot_token`
- **Lambat:** Upgrade OpenAI plan, reduce context history

---

## 11. Code Executor

### Overview
Platform programming multi-language terintegrasi:
- **11 Bahasa:** Python, JavaScript, PHP, Java, C++, C#, Ruby, Go, Rust, SQL, Bash
- **Real-time Execution** dengan output, error handling, performance metrics
- **AI Code Analysis** — Quality score, complexity, readability, performance, security
- **Snippet Management** — Save, organize, share code
- **Learning Paths** — AI-generated courses dengan modules dan quizzes
- **Execution History** — Track semua code runs

### AI Analysis Features
```
├── Code Quality Score (0-100)
├── Complexity Analysis
├── Readability Assessment
├── Performance Evaluation
├── Security Score
├── Issue Detection
├── Optimization Suggestions
└── Overall Grade (A-F)
```

### Learning Paths (AI-Generated)
1. **Python Basics** (Beginner) — 6 modules, 8 hours
2. **Web Development with JavaScript** (Beginner) — 8 modules, 12 hours
3. **PHP to Laravel** (Intermediate) — 7 modules, 15 hours
4. **Advanced Algorithms** (Advanced)

### Performance Metrics
| Language | Avg Time | Max Time |
|----------|----------|----------|
| Python | 150ms | 5000ms |
| JavaScript | 120ms | 5000ms |
| PHP | 140ms | 5000ms |
| Java | 800ms | 5000ms |
| Bash | 100ms | 5000ms |

### Security
- Timeout protection (5s default)
- Memory limits per execution
- Sandboxed processes
- No file system access
- No network calls from code
- Process isolation

---

## 12. Status Fitur Halaman Utama

> File: `utama.blade.php` (~5.739 baris, 98 komponen)

### Ringkasan Status

| Status | Jumlah | Persentase |
|--------|--------|------------|
| ✅ Sudah Diperbarui | 22 | 22.4% |
| 🟡 Belum Diperbarui | 28 | 28.6% |
| 🔵 Tidak Perlu Revisi | 38 | 38.8% |
| 🔴 Placeholder / Belum Jadi | 10 | 10.2% |
| **Total** | **98** | **100%** |

### Prioritas Revisi

**🔴 Urgent — Placeholder:**
- VTuber 3D Fullscreen — Viewport kosong
- Panel AI Assistant — Masih "Segera"
- AI VTuber Chat JS — Response hardcode

**🟡 High Priority:**
- Mobile Menu — Terlalu sederhana
- Header 2 & 3 — Kurang lengkap
- Search AI mode — Placeholder
- Visitor Stats & Flag Counter API — Belum ada
- Notification System — Pakai API berita

### Yang Sudah Diperbarui (v8.0)
Header Style Switcher, Navigation CSS, Header 1 Split 2-Row, Nav Page System, Header 4 Carousel, Kotak Saran Popup, Semua Menu Popup, Menu Customizer, Panel Tema, Header Switcher JS, Carousel JS, Nav Pagination JS, Menu Customizer JS, Saran Submit JS

---

## 13. Deployment & Hosting

### Rekomendasi: Railway (⭐⭐⭐⭐⭐)

**Keunggulan:**
- $5/month free credit (biasanya gratis untuk traffic ringan)
- Support PHP/Laravel + PostgreSQL native
- Auto-deploy dari GitHub
- Free SSL, no cold start

**Setup Railway (15 menit):**
1. Daftar di https://railway.app (login GitHub)
2. Connect repository kvt-hub
3. Add PostgreSQL service
4. Configure environment variables
5. Deploy — git push = auto deploy

**Environment Variables:**
```ini
APP_NAME=KVT-Hub
APP_ENV=production
APP_DEBUG=false
APP_URL=https://kvt-hub.tk
APP_KEY=base64:YOUR_KEY_HERE
DB_CONNECTION=pgsql
OPENAI_API_KEY=sk-proj-XXXX...
CHATBOT_MODEL=gpt-4o-mini
CHATBOT_ENABLED=true
```

### Domain Gratis: Freenom
1. Buka https://www.freenom.com
2. Search: kvt-hub.tk / .ml / .ga / .cf
3. Register FREE (12 bulan)
4. Ganti nameservers ke Railway
5. DNS propagate (24-48 jam)

### Alternatif Hosting

| Feature | Railway | Render | Replit |
|---------|---------|--------|--------|
| **Free Tier** | $5/mo credit | Limited | Full free |
| **Production Ready** | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐ |
| **PostgreSQL** | ✅ | ✅ | ✅ |
| **Auto-deploy** | ✅ From GitHub | ✅ | ✅ Native |
| **Cost/Month** | $0-5 | $0-7 | $0 |

### Estimated Cost
| Service | Cost | Notes |
|---------|------|-------|
| Railway | $5/mo credit | Usually within free tier |
| Domain (Freenom) | $0 | FREE |
| OpenAI API | $0-2/mo | Depends on usage |
| **Total** | **$0-2/mo** | Nearly free! |

### Automatic Deployment
```bash
git checkout -b feature/new-feature
# ... make changes ...
git commit -m "feat: new feature"
git push origin main
# Railway auto-deploy dalam 5-10 menit ✨
```

### Troubleshooting Deployment
- **"502 Bad Gateway"** → Check Railway logs, verify DATABASE_URL
- **"OpenAI not working"** → Verify OPENAI_API_KEY in env vars
- **"Domain not resolving"** → Wait 24-48h DNS propagation
- **"Images not loading"** → Run `php artisan storage:link`

---

## 14. Deployment Checklist

### Pre-Deployment
- [ ] All features tested locally
- [ ] No `dd()` or `var_dump()` statements
- [ ] `.env` file NOT in git
- [ ] APP_DEBUG=false, APP_ENV=production
- [ ] HTTPS enforced, CSRF tokens enabled
- [ ] Database migrations created & tested

### Railway Setup
- [ ] Account created, GitHub connected
- [ ] PostgreSQL service added
- [ ] APP_KEY, OPENAI_API_KEY configured
- [ ] First deployment triggered
- [ ] Custom domain + SSL configured

### Post-Deployment
- [ ] Website loads, navigation works
- [ ] Database queries work
- [ ] Chat/AI features work
- [ ] Images load, mobile responsive
- [ ] Error logs checked
- [ ] Backup schedule set

### Performance
- [ ] `php artisan config:cache`
- [ ] `php artisan route:cache`
- [ ] `php artisan view:cache`
- [ ] Database indexes created
- [ ] CDN for static assets (Cloudflare free)

### Security
- [ ] HTTPS enforced (no HTTP)
- [ ] SQL injection prevention (Eloquent ORM)
- [ ] XSS protection enabled
- [ ] API keys in environment only
- [ ] No hardcoded secrets in code

### Rollback Plan
```bash
# Option 1: Revert commit
git revert <bad-commit> ; git push origin main

# Option 2: Railway rollback
# Dashboard → Deployment → rollback to previous

# Option 3: Database rollback
psql production_db < backup.sql
```

---

## 15. Sponsor & Dukungan

### Tier Sponsor

| Tier | Harga | Benefit |
|------|-------|---------|
| 🏆 **Platinum** | Rp 10.000.000+/bulan | Logo README + landing + semua halaman, konsultasi bulanan, custom feature |
| 🥇 **Gold** | Rp 5.000.000+/bulan | Logo README + landing, mention changelog, laporan bulanan |
| 🥈 **Silver** | Rp 2.000.000+/bulan | Logo README kecil, mention changelog, laporan kuartalan |
| 🥉 **Bronze** | Rp 500.000+/bulan | Nama di daftar pendukung, mention rilis major |
| 🌱 **Community** | Rp 50.000+/bulan | Nama di SPONSOR.md, supporter badge |

### Cara Menjadi Sponsor
1. **GitHub Sponsors** (Rekomendasi): https://github.com/sponsors/kuro-myths
2. **Transfer Bank**: BCA / Mandiri / BNI
3. **E-Wallet**: GoPay / OVO / DANA

Konfirmasi ke **sponsor@kvthub.id**

### Penggunaan Dana
| Alokasi | % | Deskripsi |
|---------|---|-----------|
| 🖥️ Infrastruktur | 30% | Server, domain, hosting, CDN |
| 👨‍💻 Pengembangan | 35% | Developer, designer, QA |
| 🎓 Beasiswa | 20% | Program beasiswa pelajar |
| 📢 Komunitas | 10% | Event, meetup, hackathon |
| 📋 Operasional | 5% | Administrasi & pelaporan |

### Kerja Sama Institusi
- 🏫 Sekolah/Universitas — Implementasi LMS, co-branding
- 🏢 Perusahaan — CSR pendidikan, recruitment pipeline
- 🏛️ Pemerintah — Digitalisasi pendidikan daerah
- 🌐 NGO/Yayasan — Beasiswa & pelatihan guru

Kontak: **kerjasama@kvthub.id**

---

## 16. Kontribusi

### Quick Start
1. Fork repository
2. Buat branch fitur: `git checkout -b fitur/nama-fitur`
3. Commit: `git commit -m 'feat: tambah fitur baru'`
4. Push: `git push origin fitur/nama-fitur`
5. Buat Pull Request

### Commit Convention
| Tipe | Deskripsi |
|------|-----------|
| `feat` | Fitur baru |
| `fix` | Perbaikan bug |
| `docs` | Perubahan dokumentasi |
| `style` | Format kode |
| `refactor` | Refactoring kode |
| `perf` | Peningkatan performa |
| `test` | Menambah/update test |
| `chore` | Konfigurasi & maintenance |

### Branching Strategy
| Branch | Kegunaan |
|--------|----------|
| `main` | Production-ready |
| `develop` | Pengembangan aktif |
| `fitur/*` | Fitur baru |
| `perbaikan/*` | Perbaikan bug |
| `hotfix/*` | Perbaikan darurat |

### Setup Development
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

### Auto Commit
```bash
# Windows (PowerShell)
.\auto-commit.ps1 "feat: tambah fitur baru"

# Linux/macOS
./auto-commit.sh "fix: perbaiki bug login"
```

---

## 17. Akun Demo

### Akun Utama

| Peran | Email | Password | Status |
|-------|-------|----------|--------|
| 👑 Admin | admin@kvthub.id | admin123 | ✔ Aktif |
| 👨‍🏫 Guru | guru@kvthub.id | guru123 | ✔ Aktif |
| 👨‍💼 Staff | staff@kvthub.id | staff123 | ✔ Aktif |
| 👨‍🎓 Siswa | siswa@kvthub.id | siswa123 | ✔ Aktif |
| 🎓 Mahasiswa | mahasiswa@kvthub.id | mahasiswa123 | ✔ Aktif |
| 👪 Orang Tua | orangtua@kvthub.id | orangtua123 | ✔ Aktif |
| 👤 Pengunjung | pengunjung@kvthub.id | pengunjung123 | ✔ Aktif |

**Kunci Admin:** `KVT-ADMIN-2026-SECRET`

### Akun Pending Verifikasi
| Peran | Email | Password | Status |
|-------|-------|----------|--------|
| Guru | guru.pending@kvthub.id | guru123 | ⏳ Pending |
| Siswa | siswa.pending@kvthub.id | siswa123 | ⏳ Pending |

### Akun Tambahan
- **7 Guru:** guru2@kvthub.id — guru8@kvthub.id (password: guru123)
- **3 Staff:** staff2@kvthub.id — staff4@kvthub.id (password: staff123)

---

## 18. Audit Route & Menu

### Ringkasan Audit (26 Feb 2026)

| Aspek | Total | Status |
|-------|-------|--------|
| Menu Items Header | 23 | ✅ 100% |
| Routes Menu | 23+ | ✅ 100% |
| View Files | 70+ | ✅ 100% |
| Controller Methods | 90+ | ✅ 100% |
| HalamanController Methods | 41 | ✅ 100% |
| Route::get (Controller) | 41 | ✅ 100% |
| Route::view (Static) | 58 | ✅ 100% |
| Sub-routes (Nested) | 49 | ✅ 100% |
| **Total Routes** | **157+** | ✅ **100% Valid** |

### Landing Controllers
| Controller | Methods | Status |
|------------|---------|--------|
| BerandaController | 1 | ✅ |
| HalamanController | 41 | ✅ |
| BeritaController | 4 | ✅ |
| KerjaSamaController | 2 | ✅ |
| EdukasiGratisController | 2 | ✅ |
| PendaftaranEdukasiController | 3 | ✅ |
| AuthController | 14 | ✅ |
| SearchController | 1 | ✅ |
| PengunjungController | 6 | ✅ |

---

## 19. Changelog

### v8.7 — Code Executor (26 Feb 2026)
- Multi-Language Code Executor: 11 bahasa, real-time execution
- AI Code Analysis & Assistant
- Code Snippet Management
- Learning Paths (AI-generated)
- 8 new database tables, 16+ new routes

### v8.6.1 — Floating Chatbot Widget
- Widget chat di semua halaman
- Guest users, persistent sessions

### v8.6 — AI Chatbot
- OpenAI GPT-4o-mini chatbot
- Session management, token tracking
- Feedback system, 3 new tables, 7 API endpoints

### v8.5 — Ekosistem 100 Menu
- 59 halaman ekosistem baru
- Fix dropdown menu terpotong
- Route audit 100% clean

### v8.4 — GitHub API Real-time
### v8.3 — Universal Export 5 Format
### v8.2 — Diagram Builder 50 Jenis
### v8.1 — Pengajar: Silabus, Jurnal, Nilai
### v8.0 — AI VTuber Assistant & Nav Overhaul
### v7.0 — LED Dot Matrix & Loading Screen
### v6.0 — 4-Role System & Modal CRUD
### v5.0 — Role Rename & Music Player
### v4.0 — 66+ Halaman Landing Page
### v3.0 — PostgreSQL & Visitor Analytics
### v2.0 — Mega Menu & Ecosystem Pages
### v1.0 — Core LMS + RPG

### Evolusi

| Versi | Highlight | Halaman | Menu | Role |
|-------|-----------|---------|------|------|
| v1.0 | Core LMS + RPG | ~24 | 5 | 3 |
| v2.0 | Mega Menu + Ekosistem | ~32 | 12 | 3 |
| v3.0 | PostgreSQL + Analytics | ~42 | 12 | 3 |
| v4.0 | 66+ Landing Pages | 66+ | 16 | 3 |
| v5.0 | Music + Role Rename | 66+ | 16 | 3 |
| v6.0 | 4-Role + Modal CRUD | 100+ | 16 | 4 |
| v7.0 | LED + Loading | 130+ | 20 | 7 |
| v8.0-8.7 | AI, Code Exec, Chatbot | 174+ | 40 | 7 |

---

<p align="center">
  <img src="../public/gambar/kuro/kuro.png" alt="Kuro" width="60"><br>
  <strong>KVT Hub v8.7</strong> — Global Education & Research Ecosystem<br>
  © 2025–2026 KVT Hub. Semua hak dilindungi.
</p>
