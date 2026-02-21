<h1 align="center">🏗️ Arsitektur & Alur KVT Hub</h1>

<p align="center">
  ERD, Use Case Diagram, Flowchart, Class Diagram, dan Architecture Overview
</p>

---

## Architecture Overview

```
┌──────────────────────────────────────────────────────────────────┐
│                         Browser (Client)                         │
│   Tailwind CSS · Font Awesome · AOS · Chart.js · Vanilla JS     │
└──────────────────────────┬───────────────────────────────────────┘
                           │ HTTP Request
                           ▼
┌──────────────────────────────────────────────────────────────────┐
│                      Laravel 11 Router                           │
│  web.php → admin.php / pengajar.php / staff.php / pengguna.php  │
│  Middleware: auth, peran:{role}, guest, CatatPengunjung          │
└──────────────────────────┬───────────────────────────────────────┘
                           │
              ┌────────────┼────────────┐
              ▼            ▼            ▼
     ┌────────────┐ ┌───────────┐ ┌──────────┐
     │ Controller │ │   Model   │ │   View   │
     │ (28 total) │ │(Eloquent) │ │ (Blade)  │
     │            │ │           │ │          │
     │ Admin  (14)│ │ User      │ │ tata-    │
     │ Pengajar(4)│ │ Kelas     │ │ letak/   │
     │ Staff   (3)│ │ Krs       │ │  utama   │
     │ Publik  (4)│ │ Nilai     │ │  dasbor  │
     │ Auth    (3)│ │ Kurikulum │ │  auth    │
     │            │ │ (25 model)│ │ 130+ pg  │
     └──────┬─────┘ └─────┬─────┘ └──────────┘
            │              │
            │              ▼
            │     ┌────────────┐
            └────>│ PostgreSQL │
                  │  14+ (DB)  │
                  │ 20+ Tables │
                  └────────────┘
```

---

## Arsitektur Ekosistem

```
                           +---------------------------+
                           |      KVT Hub v7.0         |
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

---

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
       │                              └───────────────────┘
       │         ┌──────────────┐
       ├────────<│  langganan   │     ┌───────────────┐
       │         │──────────────│     │  organisasi   │
       │         │ user_id (FK) │     │───────────────│
       │         │ paket_id(FK) │     │ nama, tipe    │
       │         └──────┬───────┘     │ aktif, unggulan│
       │                │             └───────────────┘
       │         ┌──────┴───────┐
       │         │paket_eksklusif│    ┌───────────────┐
       │         │──────────────│     │   berita      │
       │         │ nama, harga  │     │───────────────│
       │         │ durasi_hari  │     │ judul, slug   │
       │         │ xp_bonus     │     │ konten, status│
       │         │ fitur, aktif │     │ kategori      │
       │         └──────────────┘     └───────────────┘
       │
       │         ┌──────────────┐     ┌───────────────┐
       └────────<│  pengunjung  │     │  kerja_sama   │
                 │──────────────│     │───────────────│
                 │ ip_address   │     │ nama, slug    │
                 │ halaman      │     │ tipe, tier    │
                 │ negara       │     │ logo, aktif   │
                 │ browser, os  │     └───────────────┘
                 └──────────────┘
```

---

## Use Case Diagram

```
                        ┌─────────────────────────────────────────────┐
                        │              KVT Hub v7.0                   │
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
  │          │─────────>│  │ Ikut Kelas / KRS         │                │
  │          │─────────>│  │ Kerjakan Kuis            │                │
  │          │─────────>│  │ Lihat Nilai / KHS        │                │
  │          │─────────>│  │ Lihat Materi & Progress  │                │
  └──────────┘          │  └─────────────────────────┘                │
                        │                                             │
  ┌──────────┐          │  ┌─────────────────────────┐                │
  │ Pengajar │─────────>│  │ Buat & Kelola Kelas      │                │
  │          │─────────>│  │ Buat Materi & Kuis       │                │
  │          │─────────>│  │ Lihat Laporan            │                │
  └──────────┘          │  └─────────────────────────┘                │
                        │                                             │
  ┌──────────┐          │  ┌─────────────────────────┐                │
  │  Staff   │─────────>│  │ Kelola Data Pengguna     │                │
  │          │─────────>│  │ Catat Kehadiran          │                │
  │          │─────────>│  │ Lihat Laporan            │                │
  └──────────┘          │  └─────────────────────────┘                │
                        │                                             │
  ┌──────────┐          │  ┌─────────────────────────┐                │
  │  Admin   │─────────>│  │ CRUD 14 Modul            │                │
  │          │─────────>│  │ Approve/Tolak KRS        │                │
  │          │─────────>│  │ Input Nilai              │                │
  │          │─────────>│  │ Generate Laporan         │                │
  │          │─────────>│  │ Analytics Pengunjung     │                │
  └──────────┘          │  └─────────────────────────┘                │
                        └─────────────────────────────────────────────┘
```

---

## Flowchart: Alur Pendaftaran & Login

```
┌─────────┐    ┌──────────┐    ┌────────────┐    ┌──────────┐
│  Start  │───>│ Landing  │───>│  Pilih:    │───>│ Register │
│         │    │  Page    │    │  Login /   │    │ 3-Step   │
└─────────┘    └──────────┘    │  Register  │    │ Wizard   │
                               └─────┬──────┘    └────┬─────┘
                                     │                │
                               ┌─────┴──────┐   ┌────┴─────┐
                               │ Login Form │   │ Validasi │
                               │ Email+Pass │   │ reCAPTCHA│
                               └─────┬──────┘   └────┬─────┘
                                     │                │
                               ┌─────┴────────────────┘
                               │  Cek Peran
                               └─────┬──────┐
                    ┌────────┬────────┼────────┬──────────┐
                    ▼        ▼        ▼        ▼          ▼
              ┌──────┐ ┌────────┐ ┌──────┐ ┌────────┐
              │Admin │ │Pengajar│ │Staff │ │Pengguna│
              │Dasbor│ │Dasbor  │ │Dasbor│ │Dasbor  │
              └──────┘ └────────┘ └──────┘ └────────┘
```

---

## Flowchart: Alur KRS Akademik

```
┌──────────┐    ┌──────────┐    ┌──────────┐    ┌──────────┐
│ Pengguna │───>│ Pilih    │───>│ Pilih    │───>│ Ajukan   │
│  Login   │    │ Kurikulum│    │ Mata     │    │  KRS     │
└──────────┘    │& Semester│    │ Pelajaran│    └────┬─────┘
                └──────────┘    └──────────┘         │
                                                ┌────┴─────┐
                                                │ Menunggu │
                                                └────┬─────┘
                                                ┌────┴─────┐
                                                │  Admin   │
                                                │  Review  │
                                                └────┬─────┘
                                          ┌──────────┼──────────┐
                                          ▼                     ▼
                                    ┌──────────┐          ┌──────────┐
                                    │ Disetujui│          │  Ditolak │
                                    └────┬─────┘          └──────────┘
                                    ┌────┴─────┐
                                    │  Input   │
                                    │  Nilai   │
                                    └────┬─────┘
                                    ┌────┴─────┐
                                    │  Auto    │
                                    │  IPK/KHS │
                                    └──────────┘
```

---

## Flowchart: Admin CRUD (Modal Pattern)

```
┌──────────┐    ┌──────────┐    ┌──────────┐
│  Admin   │───>│ Sidebar  │───>│ Halaman  │
│  Login   │    │  Menu    │    │  Index   │
└──────────┘    └──────────┘    └────┬─────┘
                                     │
                    ┌────────┬───────┼────────┬──────────┐
                    ▼        ▼       ▼        ▼          ▼
              ┌──────────┐ ┌──────┐ ┌──────┐ ┌────────┐
              │  Tambah  │ │ Edit │ │Hapus │ │ Filter │
              └────┬─────┘ └──┬───┘ └──┬───┘ └────────┘
              ┌────┴─────┐ ┌──┴───┐ ┌──┴───┐
              │  Modal   │ │Modal │ │Modal │
              │  Create  │ │ Edit │ │Konfir│
              └────┬─────┘ └──┬───┘ └──┬───┘
                   │          │        │
                   └────┬─────┴────────┘
                        ▼
                  ┌──────────┐
                  │ Redirect │
                  │ + Flash  │
                  └──────────┘
```

---

## Class Diagram — Model Layer

```
┌────────────────────────┐
│         User           │
│────────────────────────│
│ - id: bigint           │
│ - name: string         │
│ - email: string        │
│ - peran: enum          │
│ - level: int           │
│ - xp: int              │
│────────────────────────│
│ + krs(): HasMany       │
│ + nilai(): HasMany     │
│ + kelas(): HasMany     │
│ + langganan(): HasMany │
│ + pencapaian(): HasMany│
└────────────┬───────────┘
             │ 1
     ┌───────┴──────┬────────────┬──────────────┐
     │ *            │ *          │ *             │ *
┌────┴─────┐  ┌─────┴─────┐ ┌───┴─────┐  ┌─────┴──────┐
│   Krs    │  │   Nilai   │ │  Kelas  │  │ Langganan  │
│──────────│  │───────────│ │─────────│  │────────────│
│ user_id  │  │ user_id   │ │pengajar │  │ user_id    │
│kurikulum │  │ mapel_id  │ │_id      │  │ paket_id   │
│_id       │  │ tugas     │ │ nama    │  │ mulai      │
│ semester │  │ uts, uas  │ │ kode    │  │ selesai    │
│ total_sks│  │ nilai_    │ │ status  │  │ status     │
│ status   │  │ akhir     │ │─────────│  └────────────┘
│──────────│  │ huruf_mutu│ │+materi()│
│+detail() │  └───────────┘ │ HasMany │
│+kurikulum│                └────┬────┘
└────┬─────┘                     │
     │                     ┌─────┴──┐
┌────┴─────┐               │ Materi │
│KrsDetail │               │────────│
│──────────│               │kelas_id│
│ krs_id   │               │ judul  │
│ mapel_id │               │ tipe   │
│ sks      │               │ urutan │
└──────────┘               └────────┘
```

---

## Class Diagram — Controller Layer (Admin)

```
┌──────────────────────────────────────────────────┐
│            AdminController Layer                  │
│   Middleware: auth + peran:admin                  │
├──────────────────────────────────────────────────┤
│                                                  │
│  DasborController      PenggunaController        │
│  ├─ index()            ├─ index(search,peran)    │
│                        ├─ simpan()               │
│  KelasController       ├─ update($id)            │
│  ├─ index/simpan/      ├─ hapus($id)             │
│     update/hapus       └─ toggleAktif($id)       │
│                                                  │
│  BeritaController      KerjaSamaController       │
│  ├─ index/simpan/      ├─ index/simpan/          │
│     update/hapus          update/hapus            │
│                                                  │
│  KurikulumController   MataPelajaranController   │
│  NilaiController       BobotNilaiController      │
│  OrganisasiController  KrsController             │
│  LaporanAkademikCtrl   PaketController           │
│  KunciController       PengunjungController      │
│                                                  │
└──────────────────────────────────────────────────┘
```

---

<p align="center">
  <a href="../README.md">⬅️ Kembali ke README</a> •
  <a href="TENTANG.md">📖 Tentang</a>
</p>
