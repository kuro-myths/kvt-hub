<p align="center">
  <img src="public/gambar/kuro/kuro.png" alt="KVT Hub Logo" width="120">
</p>

<h1 align="center">KVT Hub — Global Education & Research Ecosystem</h1>

<p align="center">
  <strong>Ekosistem pendidikan, karir, dan riset digital global.</strong><br>
  Dari TK hingga S3/PhD · 7 Peran · 174+ Halaman · AI Chatbot · Code Executor · Gamifikasi RPG
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red?logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/PHP-8.5+-blue?logo=php&logoColor=white" alt="PHP 8.5+">
  <img src="https://img.shields.io/badge/PostgreSQL-14+-336791?logo=postgresql&logoColor=white" alt="PostgreSQL">
  <img src="https://img.shields.io/badge/Version-8.7-orange" alt="Version 8.7">
  <img src="https://img.shields.io/badge/License-MIT-green" alt="License MIT">
  <img src="https://img.shields.io/badge/ISO-27001-brightgreen" alt="ISO 27001">
  <img src="https://img.shields.io/badge/COBIT-2019-blue" alt="COBIT 2019">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Halaman-174+-blueviolet" alt="174+ Halaman">
  <img src="https://img.shields.io/badge/Menu-40-teal" alt="40 Menu">
  <img src="https://img.shields.io/badge/Roles-7-crimson" alt="7 Roles">
  <img src="https://img.shields.io/badge/AI-GPT--4o--mini-ff6600" alt="AI">
  <img src="https://img.shields.io/badge/Languages-11-00cc44" alt="11 Languages">
  <img src="https://img.shields.io/badge/Routes-157+-purple" alt="157+ Routes">
</p>

<p align="center">
  <a href="docs/DOKUMENTASI.md">📚 Dokumentasi Lengkap</a> •
  <a href="#-instalasi">⚡ Instalasi</a> •
  <a href="#-fitur-utama">✨ Fitur</a> •
  <a href="#-deployment">🚀 Deploy</a> •
  <a href="#-kontak">📬 Kontak</a>
</p>

---

## 📸 Preview

<table>
  <tr>
    <td align="center"><strong>🏫 Sekolah</strong><br><img src="public/gambar/sekolah.png" alt="Sekolah" width="280"></td>
    <td align="center"><strong>📚 Kelas</strong><br><img src="public/gambar/kelas.png" alt="Kelas" width="280"></td>
    <td align="center"><strong>🔬 Lab</strong><br><img src="public/gambar/lab.png" alt="Lab" width="280"></td>
  </tr>
  <tr>
    <td align="center"><strong>🏟️ Lapangan</strong><br><img src="public/gambar/lapangan.png" alt="Lapangan" width="280"></td>
    <td align="center"><strong>🛠️ Praktek</strong><br><img src="public/gambar/pratek.png" alt="Praktek" width="280"></td>
    <td align="center"><strong>📖 Perpustakaan</strong><br><img src="public/gambar/perpustakaan.png" alt="Perpustakaan" width="280"></td>
  </tr>
  <tr>
    <td align="center"><strong>👨‍💼 Admin Panel</strong><br><img src="public/gambar/admin.png" alt="Admin" width="280"></td>
    <td align="center" colspan="2"><strong>🐱 Kuro — Maskot KVT Hub</strong><br><img src="public/gambar/kuro/kuro.png" alt="Kuro Maskot" width="280"></td>
  </tr>
</table>

---

## ✨ Fitur Utama

**KVT Hub v8.7** adalah platform ekosistem digital all-in-one yang menghubungkan **13 jenjang pendidikan** (TK–S3/PhD), **7 peran pengguna**, dan **174+ halaman** dalam satu sistem terintegrasi.

| Fitur | Deskripsi |
|-------|-----------|
| 🎓 **13 Jenjang** | TK, SD, SMP, SMA, SMK (3 jurusan), D1-D3, S1, S2, S3, Post-Doc, Profesi |
| 👥 **7 Peran** | Admin, Staff, Guru, Siswa, Mahasiswa, Orang Tua, Pengunjung |
| 📄 **174+ Halaman** | 80+ landing publik + 90+ halaman dashboard/panel |
| 🖥️ **Code Executor** | 11 bahasa (Python, JS, PHP, Java, C++, C#, Ruby, Go, Rust, SQL, Bash) |
| 🤖 **AI Chatbot** | GPT-4o-mini, session management, floating widget di semua halaman |
| 🎮 **Gamifikasi RPG** | 100 level, 10 rank, XP system, achievement badges |
| 📊 **50+ Diagram** | Bar, Line, Pie, Radar, Scatter, Flow via Chart.js v4 |
| 📥 **Ekspor 5 Format** | Excel, PDF, Word, CSV, PowerPoint |
| 🎵 **Music Player** | 5 stasiun radio streaming |
| 💡 **LED Dot Matrix** | 5 mode (Shalat, Waktu Dunia, Motivasi, Info, Kustom) |
| 🔍 **Search Engine** | 3 mode (Internal, Web, AI Explorer) |
| 🌍 **Visitor Analytics** | Tracking real-time, geo-lokasi, flag counter |
| 🛡️ **ISO 27001 + COBIT** | Standar keamanan enterprise |

---

## 🏗️ Arsitektur

```
┌─────────────────────────────────────────────────────────────┐
│                    Browser (Client)                          │
│   Tailwind CSS · Chart.js v4 · Font Awesome · AOS           │
└────────────────────────────┬────────────────────────────────┘
                             │ HTTP / HTTPS
                             ▼
┌─────────────────────────────────────────────────────────────┐
│                    Laravel 12 Router                          │
│   web.php · admin.php · pengajar.php · staff.php · pengguna.php │
│   Middleware: auth, cek.peran:{role}, CatatPengunjung          │
└────────────────────────────┬────────────────────────────────┘
                             │
          ┌──────────────────┼──────────────────┐
          ▼                  ▼                  ▼
   ┌─────────────┐   ┌────────────┐    ┌────────────┐
   │  Controller  │   │   Model    │    │   View     │
   │   49 total   │   │  36 ORM   │    │  174 files │
   └──────┬───────┘   └─────┬─────┘    └────────────┘
          │                  │
          └─────────────────>│ PostgreSQL 25+ tbl │
```

---

## 👥 Multi-Role System

| Peran | Dashboard | Sidebar | Kemampuan Utama |
|-------|-----------|---------|-----------------|
| 👑 Admin | `/admin` | 15 menu | CRUD semua data, laporan, analytics, kunci |
| 👨‍🏫 Pengajar | `/pengajar` | 9 menu | Kelola kelas, materi, kuis, laporan |
| 👨‍💼 Staff | `/staff` | 6 menu | Kelola pengguna, kehadiran, rekap |
| 👨‍🎓 Pengguna | `/pengguna` | 10 menu | Belajar, KRS, KHS, kuis, progress |

---

## 🛠️ Teknologi

| Kategori | Stack |
|----------|-------|
| **Backend** | Laravel 12, PHP 8.5+ |
| **Database** | PostgreSQL 14+ (25+ tabel) |
| **Frontend** | Tailwind CSS, Alpine.js 3.14, Blade |
| **AI** | OpenAI GPT-4o-mini |
| **Charting** | Chart.js v4 |
| **Ekspor** | SheetJS, jsPDF, PptxGenJS |
| **Keamanan** | RBAC, CSRF, XSS, reCAPTCHA |

---

## ⚡ Instalasi

```bash
# Clone
git clone https://github.com/kuro-myths/kvt-hub.git
cd kvt-hub

# Install & Setup
composer install
cp .env.example .env
php artisan key:generate

# Database (PostgreSQL)
php artisan migrate --seed

# Storage & Jalankan
php artisan storage:link
php artisan serve
```

### 🔑 Akun Demo

| Peran | Email | Password |
|-------|-------|----------|
| 👑 Admin | admin@kvthub.id | admin123 |
| 👨‍🏫 Guru | guru@kvthub.id | guru123 |
| 👨‍💼 Staff | staff@kvthub.id | staff123 |
| 👨‍🎓 Siswa | siswa@kvthub.id | siswa123 |
| 🎓 Mahasiswa | mahasiswa@kvthub.id | mahasiswa123 |
| 👪 Orang Tua | orangtua@kvthub.id | orangtua123 |
| 👤 Pengunjung | pengunjung@kvthub.id | pengunjung123 |

**Kunci Admin:** `KVT-ADMIN-2026-SECRET`

---

## 🚀 Deployment

### Railway (Rekomendasi — Gratis)

```bash
# 1. Daftar di https://railway.app (login GitHub)
# 2. Connect repo kvt-hub → Deploy
# 3. Add PostgreSQL service
# 4. Set env vars: APP_KEY, OPENAI_API_KEY, dll
# 5. git push origin main → auto deploy 5-10 menit
```

### Domain Gratis — Freenom
```bash
# Daftar https://www.freenom.com → Search kvt-hub.tk → Register FREE
# Update nameservers ke Railway → DNS propagate 24-48 jam
```

| Service | Cost |
|---------|------|
| Railway | $0 (within $5/mo free credit) |
| Domain (Freenom) | $0 |
| OpenAI API | $0-2/mo |
| **Total** | **$0-2/mo** |

---

## 📚 Dokumentasi

Seluruh dokumentasi proyek telah digabung ke satu file lengkap:

| Dokumen | Isi |
|---------|-----|
| 📚 [docs/DOKUMENTASI.md](docs/DOKUMENTASI.md) | **Semua dokumentasi** — Tentang, Arsitektur, Fitur, Chatbot, Code Executor, Deployment, Sponsor, Kontribusi, Audit, Changelog |
| 📜 [LICENSE](LICENSE) | MIT License |

---

## 🤝 Kontribusi

```bash
# Fork → Clone → Branch → Code → Commit → Push → PR
git checkout -b fitur/nama-fitur
git commit -m "feat: tambah fitur baru"
git push origin fitur/nama-fitur
```

### Auto Commit
```bash
.\auto-commit.ps1 "feat: fitur baru"   # Windows
./auto-commit.sh "fix: perbaiki bug"     # Linux/macOS
```

---

## 💎 Sponsor

| Tier | Benefit |
|------|---------|
| 🏆 Platinum | Logo di README + landing + semua halaman |
| 🥇 Gold | Logo di README + landing page |
| 🥈 Silver | Logo di README |
| 🥉 Bronze | Nama di daftar pendukung |
| 🌱 Community | Mention di changelog |

📧 **sponsor@kvthub.id** · [GitHub Sponsors](https://github.com/sponsors/kuro-myths)

---

## 📬 Kontak

| | |
|---|---|
| 📧 **Email** | kerjasama@kvthub.id |
| 🔒 **Security** | security@kvthub.id |
| 🐱 **GitHub** | [@kuro-myths](https://github.com/kuro-myths) |
| 🌐 **Website** | [kvt-hub.test](http://kvt-hub.test) |

---

<p align="center">
  <img src="public/gambar/kuro/kuro.png" alt="Kuro" width="60"><br>
  <strong>KVT Hub v8.7</strong> — Global Education & Research Ecosystem<br>
  Dibuat oleh <a href="https://github.com/kuro-myths">@kuro-myths</a><br>
  © 2025–2026 KVT Hub. Semua hak dilindungi.
</p>
