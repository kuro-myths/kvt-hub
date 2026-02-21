<?php

namespace Database\Seeders;

use App\Models\AturanEdukasi;
use App\Models\EdukasiGratis;
use Illuminate\Database\Seeder;

class AturanEdukasiSeeder extends Seeder
{
    public function run(): void
    {
        // Cari ID edukasi spesifik
        $github = EdukasiGratis::where('judul', 'like', '%GitHub%Student%')->first();
        $azure = EdukasiGratis::where('judul', 'like', '%Azure%')->first();
        $jetbrains = EdukasiGratis::where('judul', 'like', '%JetBrains%')->first();
        $figma = EdukasiGratis::where('judul', 'like', '%Figma%')->first();
        $aws = EdukasiGratis::where('judul', 'like', '%AWS%')->first();
        $canva = EdukasiGratis::where('judul', 'like', '%Canva%Education%')->first();
        $coursera = EdukasiGratis::where('judul', 'like', '%Coursera%')->first();

        $aturan = [
            // =============================================
            // LARANGAN - Berlaku Semua
            // =============================================
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Dilarang membuat banyak akun education secara bersamaan',
                'deskripsi' => 'Membuat 3-5 akun education sekaligus dengan email berbeda untuk satu program yang sama sangat berisiko. Sistem platform seperti GitHub, Azure, dan JetBrains memiliki deteksi fraud otomatis yang akan memblokir semua akun Anda jika terdeteksi. Cukup gunakan 1 akun education, jika diterima baru boleh mempertimbangkan opsi lain.',
                'tipe' => 'larangan',
                'tingkat' => 'kritis',
                'ikon' => 'fas fa-users-slash',
                'urutan' => 1,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Dilarang menggunakan email palsu atau generator',
                'deskripsi' => 'Jangan pernah menggunakan email temporary, disposable email, atau email yang bukan milik Anda. Platform akan langsung menolak aplikasi atau memblokir akun secara permanen. Gunakan email asli dari institusi pendidikan Anda (.ac.id, .edu, atau email sekolah resmi).',
                'tipe' => 'larangan',
                'tingkat' => 'kritis',
                'ikon' => 'fas fa-envelope-open-text',
                'urutan' => 2,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Dilarang memalsukan dokumen identitas pelajar',
                'deskripsi' => 'Menggunakan KTM/kartu pelajar palsu atau mengedit dokumen pendukung dapat berakibat akun diblokir permanen dan blacklisted. Platform melakukan verifikasi dokumen secara manual dan otomatis. Jika bukan pelajar/mahasiswa aktif, gunakan opsi free tier atau trial yang tersedia untuk umum.',
                'tipe' => 'larangan',
                'tingkat' => 'kritis',
                'ikon' => 'fas fa-id-card',
                'urutan' => 3,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Dilarang menjual atau memperjualbelikan akses education',
                'deskripsi' => 'Akses education diberikan untuk penggunaan pribadi dan belajar. Menjual akun, membagikan lisensi, atau menggunakan untuk keperluan komersial adalah pelanggaran ToS yang serius. Akun akan diblokir dan bisa dilaporkan secara hukum.',
                'tipe' => 'larangan',
                'tingkat' => 'kritis',
                'ikon' => 'fas fa-hand-holding-usd',
                'urutan' => 4,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Dilarang menggunakan akses education untuk mining atau aktivitas ilegal',
                'deskripsi' => 'Credit cloud gratis (Azure, AWS, GCP) tidak boleh digunakan untuk cryptocurrency mining, DDoS, spam, atau aktivitas yang melanggar hukum. Monitoring resources dilakukan secara real-time oleh platform.',
                'tipe' => 'larangan',
                'tingkat' => 'kritis',
                'ikon' => 'fas fa-gavel',
                'urutan' => 5,
                'berlaku_semua' => true,
            ],

            // =============================================
            // PERINGATAN - Berlaku Semua
            // =============================================
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Akun education bisa redirect ke halaman pricing jika bermasalah',
                'deskripsi' => 'Jika saat mengklik tombol "Education" atau "Student" Anda langsung diarahkan ke halaman pricing/berbayar, itu tandanya akun Anda bermasalah — bisa karena: email tidak dikenali sebagai pelajar, sudah pernah menggunakan benefit sebelumnya, terlalu banyak akun mencurigakan dari IP yang sama, atau verifikasi gagal. Jangan langsung membuat akun baru, coba selesaikan masalah di akun yang ada.',
                'tipe' => 'peringatan',
                'tingkat' => 'tinggi',
                'ikon' => 'fas fa-exclamation-circle',
                'urutan' => 1,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Motivasi kosong = penolakan otomatis',
                'deskripsi' => 'Banyak platform (terutama GitHub Student dan JetBrains) menolak aplikasi yang kolom "alasan/motivasi" nya kosong atau terlalu singkat. Tulis motivasi yang jelas: sebutkan nama institusi, jurusan, dan cara Anda akan menggunakan tools tersebut untuk belajar. Minimal 2-3 kalimat yang spesifik.',
                'tipe' => 'peringatan',
                'tingkat' => 'tinggi',
                'ikon' => 'fas fa-align-left',
                'urutan' => 2,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Jangan daftar banyak program education sekaligus dari 1 IP',
                'deskripsi' => 'Mendaftar 5+ program education dalam waktu singkat dari IP yang sama bisa memicu red flag di sistem anti-fraud platform. Daftar secara bertahap — 1 program per minggu sudah cukup. Tunggu approval satu program sebelum mendaftar program lainnya.',
                'tipe' => 'peringatan',
                'tingkat' => 'sedang',
                'ikon' => 'fas fa-network-wired',
                'urutan' => 3,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Akses education memiliki masa berlaku',
                'deskripsi' => 'Sebagian besar program education berlaku 1-2 tahun dan perlu diperbarui. Jika masa aktif habis dan Anda tidak lagi menjadi pelajar, akses akan dicabut dan data di cloud bisa dihapus. Backup data penting Anda sebelum masa berlaku habis.',
                'tipe' => 'peringatan',
                'tingkat' => 'sedang',
                'ikon' => 'fas fa-calendar-times',
                'urutan' => 4,
                'berlaku_semua' => true,
            ],

            // =============================================
            // PROSEDUR AMAN - Berlaku Semua
            // =============================================
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Gunakan 1 akun utama, verifikasi sempurna dulu',
                'deskripsi' => 'Fokus pada 1 akun education dengan data yang benar dan lengkap. Pastikan verifikasi email, dokumen, dan profil selesai 100% sebelum memikirkan pendaftaran program lain. Satu akun yang terverifikasi sempurna jauh lebih berharga daripada 5 akun yang mencurigakan.',
                'tipe' => 'prosedur',
                'tingkat' => 'tinggi',
                'ikon' => 'fas fa-user-check',
                'urutan' => 1,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Sesuaikan dengan institusi pendidikan Anda',
                'deskripsi' => 'Gunakan email resmi dari institusi Anda (.ac.id atau .edu). Jika sekolah/kampus Anda belum terdaftar di database platform, hubungi admin kampus terlebih dahulu untuk mendaftarkan domain email institusi. Ini jauh lebih aman daripada mencoba trik lain.',
                'tipe' => 'prosedur',
                'tingkat' => 'tinggi',
                'ikon' => 'fas fa-university',
                'urutan' => 2,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Jika ikut bootcamp, gunakan akun terpisah tapi jangan semua education',
                'deskripsi' => 'Saat mengikuti bootcamp atau program pelatihan, boleh menggunakan akun email berbeda untuk mendaftar. Namun jangan langsung mendaftar semua program education dengan akun baru tersebut. Cukup daftar 1 program yang dibutuhkan bootcamp. Setelah diterima dan stabil, baru pertimbangkan program lainnya satu per satu.',
                'tipe' => 'prosedur',
                'tingkat' => 'sedang',
                'ikon' => 'fas fa-laptop-code',
                'urutan' => 3,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Tunggu approval sebelum daftar program lain',
                'deskripsi' => 'Setelah mendaftar 1 program education, tunggu hasilnya (biasanya 3-14 hari). Jika diterima, Anda boleh mendaftar program education lain secara bertahap. Jangan terburu-buru — pendekatan sabar dan terstruktur jauh lebih aman daripada daftar massal.',
                'tipe' => 'prosedur',
                'tingkat' => 'sedang',
                'ikon' => 'fas fa-hourglass-half',
                'urutan' => 4,
                'berlaku_semua' => true,
            ],

            // =============================================
            // TIPS & SOLUSI - Berlaku Semua
            // =============================================
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Cara paling aman: verifikasi via GitHub Student Pack dulu',
                'deskripsi' => 'GitHub Student Developer Pack adalah "gerbang utama" ke banyak program education lain. Setelah terverifikasi di GitHub, banyak platform lain (JetBrains, Namecheap, DigitalOcean, dll) akan langsung menerima Anda tanpa verifikasi ulang. Jadi mulai dari GitHub dulu.',
                'tipe' => 'tips',
                'tingkat' => 'rendah',
                'ikon' => 'fab fa-github',
                'urutan' => 1,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Gunakan foto KTM/kartu pelajar yang jelas dan tidak blur',
                'deskripsi' => 'Saat upload dokumen verifikasi, pastikan foto KTM atau kartu pelajar Anda terlihat jelas: nama, NIM/NIS, foto, dan logo institusi harus terbaca. Gunakan scanner atau foto dengan pencahayaan baik. Foto blur atau gelap sering menjadi alasan penolakan.',
                'tipe' => 'tips',
                'tingkat' => 'rendah',
                'ikon' => 'fas fa-camera',
                'urutan' => 2,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Jika ditolak, jangan langsung buat akun baru',
                'deskripsi' => 'Kalau aplikasi education Anda ditolak, jangan panik dan membuat akun baru. Baca alasan penolakan, perbaiki data/dokumen yang diminta, lalu ajukan banding (appeal) menggunakan akun yang sama. Kebanyakan platform mengizinkan resubmission setelah 30 hari.',
                'tipe' => 'tips',
                'tingkat' => 'sedang',
                'ikon' => 'fas fa-redo',
                'urutan' => 3,
                'berlaku_semua' => true,
            ],
            [
                'edukasi_gratis_id' => null,
                'judul' => 'Manfaatkan free tier sebelum education pack',
                'deskripsi' => 'Banyak platform sudah menyediakan free tier yang cukup untuk belajar (GitHub Free, Figma Free, Cloudflare Free). Gunakan free tier dulu sambil menunggu verifikasi education. Jangan memaksakan diri membuat akun ganda hanya untuk mendapat fitur premium lebih cepat.',
                'tipe' => 'tips',
                'tingkat' => 'rendah',
                'ikon' => 'fas fa-coins',
                'urutan' => 4,
                'berlaku_semua' => true,
            ],

            // =============================================
            // ATURAN SPESIFIK GITHUB
            // =============================================
            [
                'edukasi_gratis_id' => $github?->id,
                'judul' => 'GitHub mendeteksi multi-akun secara otomatis',
                'deskripsi' => 'GitHub menggunakan fingerprinting (IP, browser, device) untuk mendeteksi multi-akun. Jika terdeteksi, semua akun akan di-suspend termasuk akun utama. GitHub Student Pack hanya boleh 1 per orang — jika masa berlaku habis, perpanjang di akun yang sama.',
                'tipe' => 'larangan',
                'tingkat' => 'kritis',
                'ikon' => 'fab fa-github',
                'urutan' => 1,
                'berlaku_semua' => false,
            ],
            [
                'edukasi_gratis_id' => $github?->id,
                'judul' => 'Lokasi billing harus sesuai dengan institusi',
                'deskripsi' => 'Saat mendaftar GitHub Education, lokasi billing yang Anda isi harus sesuai dengan lokasi institusi pendidikan. Jika Anda kuliah di Surabaya tapi billing address di Jakarta, aplikasi bisa ditolak. Pastikan konsistensi data.',
                'tipe' => 'peringatan',
                'tingkat' => 'sedang',
                'ikon' => 'fas fa-map-marker-alt',
                'urutan' => 2,
                'berlaku_semua' => false,
            ],

            // =============================================
            // ATURAN SPESIFIK AZURE
            // =============================================
            [
                'edukasi_gratis_id' => $azure?->id,
                'judul' => 'Credit Azure $100 hanya bisa dipakai sekali per akun',
                'deskripsi' => 'Microsoft Azure for Students memberikan credit $100 yang berlaku 12 bulan. Jika credit habis sebelum 12 bulan, Anda harus menunggu renewal atau upgrade ke pay-as-you-go. Jangan membuat akun baru untuk mendapat credit ulang — Microsoft akan mendeteksi dan memblokir.',
                'tipe' => 'peringatan',
                'tingkat' => 'tinggi',
                'ikon' => 'fab fa-microsoft',
                'urutan' => 1,
                'berlaku_semua' => false,
            ],

            // =============================================
            // ATURAN SPESIFIK JETBRAINS
            // =============================================
            [
                'edukasi_gratis_id' => $jetbrains?->id,
                'judul' => 'JetBrains memverifikasi melalui email .edu/.ac.id',
                'deskripsi' => 'JetBrains hanya menerima verifikasi melalui email institusi pendidikan resmi. Jika Anda menggunakan email Gmail/Yahoo, aplikasi akan ditolak otomatis. Jika institusi Anda belum terdaftar, hubungi support JetBrains dengan bukti status pelajar.',
                'tipe' => 'prosedur',
                'tingkat' => 'sedang',
                'ikon' => 'fas fa-envelope',
                'urutan' => 1,
                'berlaku_semua' => false,
            ],
        ];

        foreach ($aturan as $item) {
            AturanEdukasi::create(array_merge($item, ['aktif' => true]));
        }
    }
}
