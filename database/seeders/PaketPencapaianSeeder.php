<?php

namespace Database\Seeders;

use App\Models\PaketEksklusif;
use App\Models\Pencapaian;
use Illuminate\Database\Seeder;

class PaketPencapaianSeeder extends Seeder
{
    /**
     * Seed data paket eksklusif dan pencapaian (achievement).
     */
    public function run(): void
    {
        // ===== PAKET EKSKLUSIF =====
        if (PaketEksklusif::count() === 0) {
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
        }

        // ===== PENCAPAIAN =====
        if (Pencapaian::count() === 0) {
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
        }

        $this->command->info('  [✓] Paket & Pencapaian seeder selesai');
    }
}
