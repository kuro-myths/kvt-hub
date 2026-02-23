<p align="center">
  <img src="public/gambar/kuro/kuro.png" alt="KVT Hub" width="80">
</p>

<h1 align="center">🤝 Panduan Kontribusi — KVT Hub</h1>

<p align="center">
  Terima kasih telah tertarik untuk berkontribusi di <strong>KVT Hub</strong>!<br>
  Berikut panduan lengkap agar kontribusi Anda berjalan lancar.
</p>

---

## 📋 Daftar Isi

- [Code of Conduct](#-code-of-conduct)
- [Cara Berkontribusi](#-cara-berkontribusi)
- [Setup Development](#-setup-development)
- [Branching Strategy](#-branching-strategy)
- [Commit Convention](#-commit-convention)
- [Pull Request](#-pull-request)
- [Issue & Bug Report](#-issue--bug-report)
- [Coding Standards](#-coding-standards)
- [Auto Commit](#-auto-commit)
- [Struktur Proyek](#-struktur-proyek)
- [Kontak](#-kontak)

---

## 📜 Code of Conduct

Dengan berkontribusi, Anda setuju untuk:

- ✅ Bersikap sopan dan menghormati sesama kontributor
- ✅ Memberikan feedback yang konstruktif
- ✅ Menjaga kualitas kode dan dokumentasi
- ✅ Tidak melakukan plagiarisme atau pelanggaran lisensi
- ❌ Tidak mengirim spam, iklan, atau konten tidak pantas

---

## 🚀 Cara Berkontribusi

### 1. Fork & Clone

```bash
# Fork repository melalui GitHub, lalu clone
git clone https://github.com/<username-anda>/kvt-hub.git
cd kvt-hub
```

### 2. Tambah Upstream Remote

```bash
git remote add upstream https://github.com/kuro-myths/kvt-hub.git
git fetch upstream
```

### 3. Buat Branch Baru

```bash
git checkout -b fitur/nama-fitur
# atau
git checkout -b perbaikan/nama-bug
```

### 4. Lakukan Perubahan

Kerjakan perubahan Anda, lalu pastikan:

- Kode berjalan tanpa error
- Tidak merusak fitur yang sudah ada
- Mengikuti coding standards proyek

### 5. Commit & Push

```bash
git add .
git commit -m "feat: tambah fitur baru xyz"
git push origin fitur/nama-fitur
```

### 6. Buat Pull Request

Buka GitHub → klik **"New Pull Request"** → pilih branch Anda → isi deskripsi → submit.

---

## 🛠️ Setup Development

### Prasyarat

| Tool | Versi Minimum |
|------|---------------|
| PHP | 8.2+ |
| Composer | 2.x |
| PostgreSQL | 14+ |
| Node.js | 18+ (opsional) |
| Git | 2.30+ |
| Laragon / XAMPP | Terbaru |

### Instalasi

```bash
# Install dependencies
composer install

# Copy environment
cp .env.example .env
php artisan key:generate

# Database
# Buat database: CREATE DATABASE "kvt-hub";
# Sesuaikan .env → DB_CONNECTION=pgsql

# Migrasi & Seed
php artisan migrate --seed

# Storage link
php artisan storage:link

# Jalankan server
php artisan serve
```

---

## 🌿 Branching Strategy

| Branch | Kegunaan |
|--------|----------|
| `main` | Branch utama, selalu stabil & production-ready |
| `develop` | Branch pengembangan aktif |
| `fitur/*` | Branch fitur baru (contoh: `fitur/music-player`) |
| `perbaikan/*` | Branch perbaikan bug (contoh: `perbaikan/login-error`) |
| `rilis/*` | Branch persiapan rilis (contoh: `rilis/v7.1`) |
| `hotfix/*` | Perbaikan darurat di production |

### Alur Kerja

```
main ← develop ← fitur/nama-fitur
                ← perbaikan/nama-bug
     ← hotfix/nama-fix
     ← rilis/v7.x
```

---

## 📝 Commit Convention

Gunakan format [Conventional Commits](https://www.conventionalcommits.org/):

```
<tipe>(<lingkup>): <deskripsi singkat>

[body opsional]

[footer opsional]
```

### Tipe Commit

| Tipe | Emoji | Deskripsi |
|------|-------|-----------|
| `feat` | ✨ | Fitur baru |
| `fix` | 🐛 | Perbaikan bug |
| `docs` | 📝 | Perubahan dokumentasi |
| `style` | 💄 | Format kode (tanpa perubahan logika) |
| `refactor` | ♻️ | Refactoring kode |
| `perf` | ⚡ | Peningkatan performa |
| `test` | ✅ | Menambah/memperbarui test |
| `chore` | 🔧 | Konfigurasi & maintenance |
| `ci` | 👷 | Perubahan CI/CD |
| `build` | 📦 | Perubahan build system |

### Contoh

```bash
git commit -m "feat(kuis): tambah fitur timer countdown"
git commit -m "fix(auth): perbaiki redirect setelah login"
git commit -m "docs(readme): update panduan instalasi"
git commit -m "style(sidebar): rapikan indentasi blade"
git commit -m "refactor(model): pisahkan relasi organisasi"
```

---

## 🔄 Pull Request

### Checklist Sebelum PR

- [ ] Kode sudah ditest secara lokal
- [ ] Tidak ada error atau warning
- [ ] Mengikuti coding standards
- [ ] Commit message sesuai konvensi
- [ ] Deskripsi PR jelas dan lengkap
- [ ] Screenshot (jika ada perubahan UI)

### Template PR

```markdown
## Deskripsi
[Jelaskan perubahan yang dilakukan]

## Tipe Perubahan
- [ ] ✨ Fitur baru
- [ ] 🐛 Perbaikan bug
- [ ] 📝 Dokumentasi
- [ ] ♻️ Refactoring
- [ ] ⚡ Peningkatan performa

## Screenshot (jika ada)
[Tambahkan screenshot]

## Checklist
- [ ] Sudah ditest lokal
- [ ] Tidak merusak fitur existing
- [ ] Commit sesuai konvensi
```

---

## 🐛 Issue & Bug Report

### Membuat Issue

Gunakan template berikut saat membuat issue:

```markdown
## Deskripsi Bug
[Jelaskan bug yang terjadi]

## Langkah Reproduksi
1. Buka halaman '...'
2. Klik tombol '...'
3. Lihat error di '...'

## Perilaku yang Diharapkan
[Apa yang seharusnya terjadi]

## Screenshot
[Tambahkan screenshot jika ada]

## Environment
- OS: [contoh: Windows 11]
- Browser: [contoh: Chrome 120]
- PHP: [contoh: 8.3.25]
- Laravel: [contoh: 11.x]
```

### Label Issue

| Label | Warna | Deskripsi |
|-------|-------|-----------|
| `bug` | 🔴 | Bug / error |
| `fitur` | 🟢 | Permintaan fitur baru |
| `dokumentasi` | 🔵 | Perbaikan dokumentasi |
| `duplikat` | ⚪ | Issue duplikat |
| `bantuan` | 🟡 | Butuh bantuan komunitas |
| `prioritas-tinggi` | 🟠 | Prioritas tinggi |

---

## 💻 Coding Standards

### PHP / Laravel

- Gunakan **PSR-12** coding style
- Nama variabel & method menggunakan **camelCase**
- Nama class menggunakan **PascalCase**
- Nama tabel database menggunakan **snake_case** (bahasa Indonesia)
- Gunakan **Eloquent ORM** untuk query database
- Validasi input di **Form Request** atau di controller
- Gunakan **Policy/Gate** untuk authorization

### Blade Templates

- Indentasi 4 spasi
- Gunakan `{{ }}` untuk escaped output
- Gunakan `@section`, `@yield`, `@extends` untuk layout
- Pisahkan komponen yang reusable ke `@include`

### Database

- Migration wajib untuk setiap perubahan skema
- Gunakan format nama: `YYYY_MM_DD_XXXXXX_aksi_tabel.php`
- Seeder terpisah per domain/tabel
- Foreign key & index harus didefinisikan

### Git

- Satu commit = satu perubahan logis
- Jangan commit file `.env`, `vendor/`, `node_modules/`
- Gunakan `.gitignore` yang sudah disediakan

---

## 🤖 Auto Commit

Untuk mempercepat workflow, gunakan script auto-commit berikut:

### Windows (PowerShell)

Simpan sebagai `auto-commit.ps1` di root proyek:

```powershell
#!/usr/bin/env pwsh
# Auto Commit Script untuk KVT Hub
# Penggunaan: .\auto-commit.ps1 "pesan commit"

param(
    [string]$Pesan = "chore: update otomatis $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')"
)

Write-Host "=====================================" -ForegroundColor Cyan
Write-Host "  KVT Hub — Auto Commit & Push" -ForegroundColor Cyan
Write-Host "=====================================" -ForegroundColor Cyan

# Pindah ke direktori proyek
Set-Location $PSScriptRoot

# Cek status
$status = git status --porcelain
if (-not $status) {
    Write-Host "`n[INFO] Tidak ada perubahan untuk di-commit." -ForegroundColor Yellow
    exit 0
}

Write-Host "`n[1/4] File yang berubah:" -ForegroundColor Green
git status --short

Write-Host "`n[2/4] Menambahkan semua perubahan..." -ForegroundColor Green
git add .

Write-Host "`n[3/4] Membuat commit..." -ForegroundColor Green
git commit -m "$Pesan"

Write-Host "`n[4/4] Push ke remote..." -ForegroundColor Green
git push origin (git branch --show-current)

Write-Host "`n=====================================" -ForegroundColor Cyan
Write-Host "  Selesai! Commit berhasil di-push." -ForegroundColor Green
Write-Host "=====================================" -ForegroundColor Cyan
```

### Linux / macOS (Bash)

Simpan sebagai `auto-commit.sh` di root proyek:

```bash
#!/bin/bash
# Auto Commit Script untuk KVT Hub
# Penggunaan: ./auto-commit.sh "pesan commit"

PESAN="${1:-chore: update otomatis $(date '+%Y-%m-%d %H:%M:%S')}"

echo "====================================="
echo "  KVT Hub — Auto Commit & Push"
echo "====================================="

cd "$(dirname "$0")"

# Cek perubahan
if [ -z "$(git status --porcelain)" ]; then
    echo "[INFO] Tidak ada perubahan untuk di-commit."
    exit 0
fi

echo ""
echo "[1/4] File yang berubah:"
git status --short

echo ""
echo "[2/4] Menambahkan semua perubahan..."
git add .

echo ""
echo "[3/4] Membuat commit..."
git commit -m "$PESAN"

echo ""
echo "[4/4] Push ke remote..."
git push origin "$(git branch --show-current)"

echo ""
echo "====================================="
echo "  Selesai! Commit berhasil di-push."
echo "====================================="
```

### Cara Penggunaan

```bash
# Dengan pesan custom
.\auto-commit.ps1 "feat: tambah fitur kuis timer"

# Tanpa pesan (otomatis generate)
.\auto-commit.ps1

# Linux/macOS
chmod +x auto-commit.sh
./auto-commit.sh "fix: perbaiki bug login"
```

### GitHub Actions — Auto Commit (CI/CD)

Buat file `.github/workflows/auto-commit.yml` untuk auto-commit otomatis:

```yaml
name: Auto Commit

on:
  schedule:
    - cron: '0 0 * * *'  # Setiap hari jam 00:00 UTC
  workflow_dispatch:       # Manual trigger

jobs:
  auto-commit:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4

      - name: Cek perubahan
        id: check
        run: |
          git diff --quiet || echo "changed=true" >> $GITHUB_OUTPUT

      - name: Auto commit
        if: steps.check.outputs.changed == 'true'
        run: |
          git config user.name "github-actions[bot]"
          git config user.email "github-actions[bot]@users.noreply.github.com"
          git add .
          git commit -m "chore: auto update $(date '+%Y-%m-%d')"
          git push
```

---

## 📂 Struktur Proyek

```
kvt-hub/
├── app/
│   ├── Http/Controllers/       # 28 controllers
│   │   ├── Admin/              # 14 admin CRUD controllers
│   │   ├── Pengajar/           # Pengajar controllers
│   │   ├── Staff/              # Staff controllers
│   │   └── Pengguna/           # Pengguna controllers
│   ├── Models/                 # 25+ Eloquent models
│   └── Middleware/             # CekPeran, CatatPengunjung
├── database/
│   ├── migrations/             # 20+ migration files
│   └── seeders/                # Split per domain
├── resources/views/            # 130+ Blade templates
├── routes/                     # 5 route files (role-based)
├── docs/                       # Dokumentasi
├── auto-commit.ps1             # Script auto-commit Windows
├── auto-commit.sh              # Script auto-commit Linux/macOS
└── CONTRIBUTING.md             # ← Anda membaca ini
```

---

## 📬 Kontak

Punya pertanyaan tentang kontribusi?

| | |
|---|---|
| 📧 **Email** | kerjasama@kvthub.id |
| 🐱 **GitHub** | [@kuro-myths](https://github.com/kuro-myths) |
| 🌐 **Website** | [kvt-hub.test](http://kvt-hub.test) |

---

<p align="center">
  <img src="public/gambar/kuro/kuro.png" alt="Kuro" width="40"><br>
  <strong>Terima kasih telah berkontribusi di KVT Hub!</strong><br>
  Setiap baris kode Anda membantu memajukan pendidikan Indonesia. 🇮🇩
</p>
