#!/usr/bin/env pwsh
# =============================================
#  KVT Hub — Auto Commit & Push Script
#  Penggunaan: .\auto-commit.ps1 "pesan commit"
# =============================================

param(
    [string]$Pesan = "chore: update otomatis $(Get-Date -Format 'yyyy-MM-dd HH:mm:ss')"
)

Write-Host ""
Write-Host "=====================================" -ForegroundColor Cyan
Write-Host "  KVT Hub — Auto Commit & Push" -ForegroundColor Cyan
Write-Host "=====================================" -ForegroundColor Cyan

# Pindah ke direktori proyek
Set-Location $PSScriptRoot

# Cek apakah ini repo git
if (-not (Test-Path ".git")) {
    Write-Host "`n[ERROR] Bukan repository Git!" -ForegroundColor Red
    exit 1
}

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
Write-Host "       Pesan: $Pesan" -ForegroundColor Gray
git commit -m "$Pesan"

$branch = git branch --show-current
Write-Host "`n[4/4] Push ke remote (origin/$branch)..." -ForegroundColor Green
git push origin $branch

Write-Host ""
Write-Host "=====================================" -ForegroundColor Cyan
Write-Host "  Selesai! Commit berhasil di-push." -ForegroundColor Green
Write-Host "=====================================" -ForegroundColor Cyan
Write-Host ""
