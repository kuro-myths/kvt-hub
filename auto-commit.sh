#!/bin/bash
# =============================================
#  KVT Hub — Auto Commit & Push Script
#  Penggunaan: ./auto-commit.sh "pesan commit"
# =============================================

PESAN="${1:-chore: update otomatis $(date '+%Y-%m-%d %H:%M:%S')}"

echo ""
echo "====================================="
echo "  KVT Hub — Auto Commit & Push"
echo "====================================="

cd "$(dirname "$0")"

# Cek apakah ini repo git
if [ ! -d ".git" ]; then
    echo "[ERROR] Bukan repository Git!"
    exit 1
fi

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
echo "       Pesan: $PESAN"
git commit -m "$PESAN"

BRANCH=$(git branch --show-current)
echo ""
echo "[4/4] Push ke remote (origin/$BRANCH)..."
git push origin "$BRANCH"

echo ""
echo "====================================="
echo "  Selesai! Commit berhasil di-push."
echo "====================================="
echo ""
