<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\KunciAdmin;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\PaketEksklusif;
use App\Models\Pencapaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ===== ADMIN =====
        $admin = User::create([
            'name' => 'Admin KVT',
            'email' => 'admin@kvthub.id',
            'password' => Hash::make('admin123'),
            'peran' => 'admin',
            'level' => 100,
            'xp' => 0,
            'xp_total' => 990000,
            'aktif' => true,
            'email_verified_at' => now(),
        ]);

        // ===== KUNCI ADMIN =====
        $kunciAktif = KunciAdmin::create([
            'kunci' => 'KVT-ADMIN-2025-SECRET',
            'deskripsi' => 'Kunci admin utama',
            'digunakan' => false,
        ]);

        KunciAdmin::create([
            'kunci' => 'KVT-' . strtoupper(Str::random(16)),
            'deskripsi' => 'Kunci admin cadangan',
            'digunakan' => false,
        ]);

        // ===== GURU =====
        $guru = User::create([
            'name' => 'Guru Demo',
            'email' => 'guru@kvthub.id',
            'password' => Hash::make('guru123'),
            'peran' => 'guru',
            'level' => 25,
            'xp' => 50,
            'xp_total' => 2550,
            'aktif' => true,
            'email_verified_at' => now(),
        ]);

        // ===== SISWA =====
        $siswa = User::create([
            'name' => 'Siswa Demo',
            'email' => 'siswa@kvthub.id',
            'password' => Hash::make('siswa123'),
            'peran' => 'siswa',
            'level' => 5,
            'xp' => 30,
            'xp_total' => 530,
            'aktif' => true,
            'email_verified_at' => now(),
        ]);

        // ===== KELAS =====
        $kelas1 = Kelas::create([
            'nama' => 'Belajar Laravel dari Nol',
            'deskripsi' => 'Pelajari framework Laravel dari dasar hingga mahir. Cocok untuk pemula yang ingin membangun aplikasi web modern.',
            'gambar' => 'images/kelas.png',
            'guru_id' => $guru->id,
            'kode_kelas' => 'LRV-' . strtoupper(Str::random(6)),
        ]);

        $kelas2 = Kelas::create([
            'nama' => 'Dasar Pemrograman Python',
            'deskripsi' => 'Mulai perjalanan coding Anda dengan Python. Bahasa pemrograman yang mudah dipelajari dan sangat powerful.',
            'gambar' => 'images/lab.png',
            'guru_id' => $guru->id,
            'kode_kelas' => 'PYT-' . strtoupper(Str::random(6)),
        ]);

        $kelas3 = Kelas::create([
            'nama' => 'Desain UI/UX Modern',
            'deskripsi' => 'Pelajari prinsip desain antarmuka yang indah dan pengalaman pengguna yang menyenangkan.',
            'gambar' => 'images/pratek.png',
            'guru_id' => $guru->id,
            'kode_kelas' => 'UIX-' . strtoupper(Str::random(6)),
        ]);

        // Siswa gabung kelas
        $kelas1->anggota()->attach($siswa->id);

        // ===== MATERI =====
        Materi::create([
            'judul' => 'Pengenalan Laravel & MVC',
            'konten' => 'Laravel adalah framework PHP yang menggunakan pola arsitektur MVC (Model-View-Controller). Dalam pelajaran ini kita akan memahami konsep dasar MVC dan bagaimana Laravel mengimplementasikannya.',
            'tipe' => 'video',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'kelas_id' => $kelas1->id,
            'guru_id' => $guru->id,
            'urutan' => 1,
            'xp_reward' => 25,
            'status' => 'terbit',
        ]);

        Materi::create([
            'judul' => 'Routing & Controller',
            'konten' => 'Pelajari cara membuat route dan controller di Laravel. Route menghubungkan URL ke controller yang tepat, sedangkan controller berisi logika aplikasi.',
            'tipe' => 'artikel',
            'kelas_id' => $kelas1->id,
            'guru_id' => $guru->id,
            'urutan' => 2,
            'xp_reward' => 20,
            'status' => 'terbit',
        ]);

        Materi::create([
            'judul' => 'Database & Eloquent ORM',
            'konten' => 'Eloquent adalah ORM (Object-Relational Mapping) bawaan Laravel yang membuat interaksi dengan database menjadi sangat mudah dan ekspresif.',
            'tipe' => 'video',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'kelas_id' => $kelas1->id,
            'guru_id' => $guru->id,
            'urutan' => 3,
            'xp_reward' => 30,
            'status' => 'terbit',
        ]);

        // ===== PAKET EKSKLUSIF =====
        PaketEksklusif::create([
            'nama' => 'Paket Starter',
            'deskripsi' => 'Akses dasar ke semua materi dan kelas public.',
            'harga' => 49000,
            'durasi_hari' => 30,
            'fitur' => "Akses semua kelas public\nDownload materi offline\nSertifikat digital",
            'xp_bonus' => 50,
            'aktif' => true,
        ]);

        PaketEksklusif::create([
            'nama' => 'Paket Pro',
            'deskripsi' => 'Akses penuh ke semua fitur premium KVT Hub.',
            'harga' => 149000,
            'durasi_hari' => 90,
            'fitur' => "Semua fitur Starter\nAkses kelas eksklusif\nKonsultasi dengan guru\nBadge Pro di profil\nPrioritas support",
            'xp_bonus' => 200,
            'aktif' => true,
        ]);

        PaketEksklusif::create([
            'nama' => 'Paket Ultimate',
            'deskripsi' => 'Pengalaman belajar tanpa batas dengan semua fitur terbuka.',
            'harga' => 299000,
            'durasi_hari' => 365,
            'fitur' => "Semua fitur Pro\nAkses seumur hidup\nMentor pribadi\nSertifikat premium\nEarly access fitur baru\nKomunitas eksklusif",
            'xp_bonus' => 500,
            'aktif' => true,
        ]);

        // ===== PENCAPAIAN =====
        $pencapaianList = [
            ['nama' => 'Langkah Pertama', 'deskripsi' => 'Gabung kelas pertama', 'ikon' => 'fa-shoe-prints', 'xp_syarat' => 10],
            ['nama' => 'Pemula Rajin', 'deskripsi' => 'Selesaikan 5 materi', 'ikon' => 'fa-book-reader', 'xp_syarat' => 25],
            ['nama' => 'Quiz Master', 'deskripsi' => 'Lulus 10 kuis dengan skor 100%', 'ikon' => 'fa-brain', 'xp_syarat' => 50],
            ['nama' => 'Iron Will', 'deskripsi' => 'Capai rank Iron', 'ikon' => 'fa-shield-alt', 'xp_syarat' => 30, 'level_syarat' => 20],
            ['nama' => 'Gold Rush', 'deskripsi' => 'Capai rank Gold', 'ikon' => 'fa-crown', 'xp_syarat' => 100, 'level_syarat' => 50],
            ['nama' => 'Grandmaster', 'deskripsi' => 'Capai level 100', 'ikon' => 'fa-trophy', 'xp_syarat' => 500, 'level_syarat' => 100],
            ['nama' => 'Social Butterfly', 'deskripsi' => 'Gabung 10 kelas', 'ikon' => 'fa-users', 'xp_syarat' => 40],
            ['nama' => 'Night Owl', 'deskripsi' => 'Belajar setelah jam 10 malam', 'ikon' => 'fa-moon', 'xp_syarat' => 15],
        ];

        foreach ($pencapaianList as $p) {
            Pencapaian::create($p);
        }

        $this->command->info('');
        $this->command->info('╔══════════════════════════════════════════╗');
        $this->command->info('║       ❄️  KVT Hub Seeder Selesai  ❄️      ║');
        $this->command->info('╠══════════════════════════════════════════╣');
        $this->command->info('║  Admin  : admin@kvthub.id / admin123    ║');
        $this->command->info('║  Guru   : guru@kvthub.id  / guru123    ║');
        $this->command->info('║  Siswa  : siswa@kvthub.id / siswa123   ║');
        $this->command->info('║  Kunci  : KVT-ADMIN-2025-SECRET        ║');
        $this->command->info('╚══════════════════════════════════════════╝');
        $this->command->info('');
    }
}
