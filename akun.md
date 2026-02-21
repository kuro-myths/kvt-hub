🔐 AKUN UTAMA (Manual)


| Peran      | Nama            | Email                                               | Password      | Status  |
| ---------- | --------------- | --------------------------------------------------- | ------------- | ------- |
| Admin      | Admin KVT       | [admin@kvthub.id](mailto:admin@kvthub.id)           | admin123      | ✔ Aktif |
| Guru       | Guru Demo       | [guru@kvthub.id](mailto:guru@kvthub.id)             | guru123       | ✔ Aktif |
| Staff      | Staff Demo      | [staff@kvthub.id](mailto:staff@kvthub.id)           | staff123      | ✔ Aktif |
| Siswa      | Siswa Demo      | [siswa@kvthub.id](mailto:siswa@kvthub.id)           | siswa123      | ✔ Aktif |
| Mahasiswa  | Mahasiswa Demo  | [mahasiswa@kvthub.id](mailto:mahasiswa@kvthub.id)   | mahasiswa123  | ✔ Aktif |
| Orang Tua  | Orang Tua Demo  | [orangtua@kvthub.id](mailto:orangtua@kvthub.id)     | orangtua123   | ✔ Aktif |
| Pengunjung | Pengunjung Demo | [pengunjung@kvthub.id](mailto:pengunjung@kvthub.id) | pengunjung123 | ✔ Aktif |



⏳ AKUN PENDING VERIFIKASI
| Peran | Nama          | Email                                                     | Password | Status    |
| ----- | ------------- | --------------------------------------------------------- | -------- | --------- |
| Guru  | Guru Pending  | [guru.pending@kvthub.id](mailto:guru.pending@kvthub.id)   | guru123  | ⏳ Pending |
| Siswa | Siswa Pending | [siswa.pending@kvthub.id](mailto:siswa.pending@kvthub.id) | siswa123 | ⏳ Pending |

👨‍🏫 7 GURU TAMBAHAN

| Email                                     | Password |
| ----------------------------------------- | -------- |
| [guru2@kvthub.id](mailto:guru2@kvthub.id) | guru123  |
| [guru3@kvthub.id](mailto:guru3@kvthub.id) | guru123  |
| [guru4@kvthub.id](mailto:guru4@kvthub.id) | guru123  |
| [guru5@kvthub.id](mailto:guru5@kvthub.id) | guru123  |
| [guru6@kvthub.id](mailto:guru6@kvthub.id) | guru123  |
| [guru7@kvthub.id](mailto:guru7@kvthub.id) | guru123  |
| [guru8@kvthub.id](mailto:guru8@kvthub.id) | guru123  |

🏢 3 STAFF TAMBAHAN
| Email                                       | Password |
| ------------------------------------------- | -------- |
| [staff2@kvthub.id](mailto:staff2@kvthub.id) | staff123 |
| [staff3@kvthub.id](mailto:staff3@kvthub.id) | staff123 |
| [staff4@kvthub.id](mailto:staff4@kvthub.id) | staff123 |

---

## 📖 FITUR MODE BUKU (Interactive Book Reader)

### Deskripsi
Fitur membaca materi dalam mode buku interaktif dengan animasi page-turning 3D realistis. Setiap materi yang memiliki `konten` bisa dibaca dalam tampilan buku digital lengkap dengan efek membalik halaman, daftar isi, progress tracking, dan kuis terintegrasi di akhir buku.

### Akses
- **URL:** `http://kvt-hub.test/materi/{id}/buku` (contoh: `/materi/1/buku`, `/materi/2/buku`, `/materi/3/buku`)
- **Navigasi:** Di halaman detail materi (`/materi/{id}`), klik tombol "📖 Mode Buku"
- **Keyboard:** ← (halaman sebelumnya), → (halaman berikutnya)

### Hak Akses
| Peran   | Baca Buku | CRUD Materi | Set XP |
| -----   | --------- | ----------- | ------ |
| Admin   | ✅ | ✅ (`/admin/materi`) | ✅ |
| Guru    | ✅ | ❌         | ❌ |
| Staff   | ✅ | ❌         | ❌ |
| Siswa   | ✅ |(read only) | ❌ | ❌ |
| pengguna| ✅ |(read only) | ❌ | ❌ |

### Admin – Kelola Materi
- **Akses:** Sidebar admin → "Materi" atau `http://kvt-hub.test/admin/materi`
- **Fitur:**
  - Tambah, edit, hapus materi
  - Set XP reward (1–1000)
  - Pilih kelas & pengajar
  - Tipe: video, artikel, tutorial, praktik, quiz
  - Konten buku: gunakan `#` untuk heading/bab
  - Status: terbit / draft
  - Materi eksklusif (premium)
  - Filter: cari judul, filter kelas, filter tipe

### Fitur Buku
- Animasi 3D page-turning realistis (CSS perspective + rotateY)
- Daftar isi otomatis dari heading (#)
- Progress bar & tracking halaman
- Kuis interaktif di akhir buku
- Responsive & keyboard navigation
- Spine & shadow effects
