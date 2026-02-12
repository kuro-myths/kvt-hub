# 🌨️ KVT Hub

> **Pusat teknologi dan pembelajaran digital KVT. Tempat semua project, coding, AI, dan desain berkumpul.**

![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-blue?logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green)

---

## 📖 Tentang

KVT Hub adalah platform pembelajaran digital berbasis web yang dirancang untuk memberikan pengalaman belajar yang interaktif, menyenangkan, dan terstruktur. Dengan tema biru salju yang elegan dan sistem gamifikasi RPG, KVT Hub membuat proses belajar menjadi petualangan yang mengasyikkan.

## ✨ Fitur Utama

### 🎮 Sistem RPG & Gamifikasi

- **100 Level** dengan 10 tingkatan rank (Novice → Grandmaster)
- Sistem XP (Experience Points) dari setiap aktivitas
- Progress bar dan pencapaian visual

### 📹 Video Tutorial

- Integrasi YouTube untuk konten video
- Kuis interaktif saat video berjalan
- Tracking progress per materi

### 📊 30 Jenis Diagram

- Bar, Line, Pie, Doughnut, Radar, Polar Area
- Scatter, Bubble, Mixed, Combo, Waterfall
- Funnel, Gantt, Histogram, Box Plot, Heatmap
- Treemap, Sunburst, Sankey, Gauge, Sparkline
- Candlestick, Timeline, Progress Bar, KPI Card
- Dan masih banyak lagi!

### 🧠 Kuis Interaktif

- Pilihan ganda dengan penilaian otomatis
- Skor ≥70% = XP penuh, <70% = 30% XP
- Riwayat hasil kuis

### 💎 Paket Eksklusif

- Materi premium dengan fitur spesial
- Sistem langganan dengan durasi fleksibel
- XP bonus untuk subscriber

### 👥 Multi-Peran

| Peran     | Kemampuan                                             |
| --------- | ----------------------------------------------------- |
| **Siswa** | Belajar, ikut kelas, ambil kuis, lihat progress       |
| **Guru**  | Buat kelas & materi, kelola siswa, buat kuis          |
| **Admin** | Kelola semua data, generate kunci admin, kelola paket |

### 🔐 Autentikasi

- Login/Register standard
- Login Admin dengan kunci khusus
- OAuth Google & GitHub (siap integrasi)

## 🛠️ Teknologi

- **Backend**: Laravel 12, PHP 8.2+
- **Database**: MySQL 8.0
- **Frontend**: Tailwind CSS (CDN), Blade Templates
- **Charting**: Chart.js v4
- **Animasi**: AOS (Animate on Scroll), CSS Snow Effect
- **Ikon**: Font Awesome 6.5.1
- **Font**: Google Fonts (Inter)

## 🚀 Instalasi

### Prasyarat

- PHP 8.2+
- Composer
- MySQL
- Laragon / XAMPP / Herd

### Langkah Instalasi

```bash
# Clone repository
git clone https://github.com/kuro-myths/kvt-hub.git
cd kvt-hub

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Buat database MySQL bernama 'kvt_hub'
# Sesuaikan .env:
# DB_CONNECTION=mysql
# DB_DATABASE=kvt_hub
# DB_USERNAME=root
# DB_PASSWORD=

# Jalankan migrasi
php artisan migrate

# Jalankan seeder (data awal)
php artisan db:seed

# Copy gambar fasilitas
cp -r gambar/* public/images/

# Jalankan server
php artisan serve
```

Buka `http://localhost:8000` atau `http://kvt-hub.test` (Laragon).

## 📁 Struktur Proyek

```
kvt-hub/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php
│   │   │   ├── AuthController.php
│   │   │   ├── BerandaController.php
│   │   │   ├── DasborController.php
│   │   │   ├── KelasController.php
│   │   │   ├── KuisController.php
│   │   │   ├── LaporanController.php
│   │   │   └── MateriController.php
│   │   └── Middleware/
│   │       └── CekPeran.php
│   └── Models/
│       ├── User.php
│       ├── Kelas.php
│       ├── Materi.php
│       ├── Kuis.php
│       ├── Laporan.php
│       └── ... (14 model total)
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── tata-letak/utama.blade.php
│   ├── beranda.blade.php
│   ├── auth/
│   ├── dasbor/
│   ├── kelas/
│   ├── materi/
│   ├── kuis/
│   ├── admin/
│   ├── laporan/
│   └── halaman/
├── public/
│   ├── images/
│   └── favicon.svg
└── routes/web.php
```

## 🎯 Alur Penggunaan

### Siswa

1. Daftar akun → Pilih peran "Siswa"
2. Masuk ke dashboard → Lihat progress & statistik
3. Jelajahi kelas → Gabung kelas (+20 XP)
4. Pelajari materi → Tonton video & baca konten
5. Ambil kuis → Dapatkan XP berdasarkan skor
6. Naik level → Raih rank baru!

### Guru

1. Daftar akun → Pilih peran "Guru"
2. Buat kelas baru → Tambah deskripsi & gambar
3. Tambah materi → Upload video YouTube / tulis konten
4. Buat kuis → Tambah pertanyaan & jawaban
5. Pantau progress siswa → Lihat laporan

### Admin

1. Minta kunci admin dari admin lain
2. Login via halaman khusus admin
3. Kelola pengguna, kunci, dan paket eksklusif
4. Buat laporan dengan 30 jenis diagram

## 📜 Lisensi

Proyek ini menggunakan **3 jenis lisensi**:

1. **Lisensi Kerja Sama** — Mengatur kolaborasi dengan pihak ketiga
2. **Lisensi Hak Cipta (MIT)** — Kode sumber bebas digunakan dengan atribusi
3. **Lisensi Sponsor** — Mengatur hak dan kewajiban sponsor

Lihat file [LICENSE](LICENSE) untuk detail lengkap.

## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Tambah fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## 📞 Kontak

- **Email**: kerjasama@kvthub.id
- **GitHub**: [kuro-myths](https://github.com/kuro-myths)
- **Website**: [kvt-hub.test](http://kvt-hub.test)

---

<p align="center">
  Dibuat dengan ❄️ oleh <strong>KVT Hub Team</strong><br>
  © 2025 KVT Hub. Semua hak dilindungi.
</p>
