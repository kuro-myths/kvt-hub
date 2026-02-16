<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\KunciAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Seed akun pengguna (admin, staff, guru, siswa, mahasiswa, orang_tua, pengunjung) + kunci admin.
     */
    public function run(): void
    {
        // ===== ADMIN =====
        User::firstOrCreate(
            ['email' => 'admin@kvthub.id'],
            [
                'name' => 'Admin KVT',
                'password' => Hash::make('admin123'),
                'peran' => 'admin',
                'level' => 100,
                'xp' => 0,
                'xp_total' => 990000,
                'aktif' => true,
                'status_verifikasi' => 'diverifikasi',
                'email_verified_at' => now(),
            ]
        );

        // ===== KUNCI ADMIN =====
        KunciAdmin::firstOrCreate(
            ['kunci' => 'KVT-ADMIN-2025-SECRET'],
            [
                'deskripsi' => 'Kunci admin utama',
                'digunakan' => false,
            ]
        );

        // ===== GURU / PENGAJAR =====
        User::firstOrCreate(
            ['email' => 'guru@kvthub.id'],
            [
                'name' => 'Guru Demo',
                'password' => Hash::make('guru123'),
                'peran' => 'guru',
                'level' => 25,
                'xp' => 50,
                'xp_total' => 2550,
                'aktif' => true,
                'status_verifikasi' => 'diverifikasi',
                'asal_instansi' => 'SMA Negeri 1 Jakarta',
                'provinsi' => 'DKI Jakarta',
                'kota' => 'Jakarta',
                'no_hp' => '081234567890',
                'email_verified_at' => now(),
                'verified_at' => now(),
            ]
        );

        // ===== STAFF =====
        User::firstOrCreate(
            ['email' => 'staff@kvthub.id'],
            [
                'name' => 'Staff Demo',
                'password' => Hash::make('staff123'),
                'peran' => 'staff',
                'level' => 15,
                'xp' => 30,
                'xp_total' => 1530,
                'aktif' => true,
                'status_verifikasi' => 'diverifikasi',
                'email_verified_at' => now(),
            ]
        );

        // ===== SISWA =====
        User::firstOrCreate(
            ['email' => 'siswa@kvthub.id'],
            [
                'name' => 'Siswa Demo',
                'password' => Hash::make('siswa123'),
                'peran' => 'siswa',
                'level' => 5,
                'xp' => 30,
                'xp_total' => 530,
                'aktif' => true,
                'status_verifikasi' => 'diverifikasi',
                'asal_instansi' => 'SMA Negeri 3 Bandung',
                'provinsi' => 'Jawa Barat',
                'kota' => 'Bandung',
                'no_hp' => '081987654321',
                'email_verified_at' => now(),
                'verified_at' => now(),
            ]
        );

        // ===== MAHASISWA =====
        User::firstOrCreate(
            ['email' => 'mahasiswa@kvthub.id'],
            [
                'name' => 'Mahasiswa Demo',
                'password' => Hash::make('mahasiswa123'),
                'peran' => 'mahasiswa',
                'level' => 8,
                'xp' => 45,
                'xp_total' => 845,
                'aktif' => true,
                'status_verifikasi' => 'diverifikasi',
                'asal_instansi' => 'Universitas Indonesia',
                'provinsi' => 'DKI Jakarta',
                'kota' => 'Depok',
                'no_hp' => '082112345678',
                'email_verified_at' => now(),
                'verified_at' => now(),
            ]
        );

        // ===== ORANG TUA =====
        User::firstOrCreate(
            ['email' => 'orangtua@kvthub.id'],
            [
                'name' => 'Orang Tua Demo',
                'password' => Hash::make('orangtua123'),
                'peran' => 'orang_tua',
                'level' => 3,
                'xp' => 10,
                'xp_total' => 310,
                'aktif' => true,
                'status_verifikasi' => 'diverifikasi',
                'asal_instansi' => 'Wali Murid',
                'provinsi' => 'Jawa Tengah',
                'kota' => 'Semarang',
                'no_hp' => '083112345678',
                'email_verified_at' => now(),
                'verified_at' => now(),
            ]
        );

        // ===== PENGUNJUNG =====
        User::firstOrCreate(
            ['email' => 'pengunjung@kvthub.id'],
            [
                'name' => 'Pengunjung Demo',
                'password' => Hash::make('pengunjung123'),
                'peran' => 'pengunjung',
                'level' => 1,
                'xp' => 0,
                'xp_total' => 0,
                'aktif' => true,
                'status_verifikasi' => 'diverifikasi',
                'email_verified_at' => now(),
            ]
        );

        // ===== AKUN PENDING VERIFIKASI (untuk testing) =====
        User::firstOrCreate(
            ['email' => 'guru.pending@kvthub.id'],
            [
                'name' => 'Guru Pending',
                'password' => Hash::make('guru123'),
                'peran' => 'guru',
                'level' => 1,
                'xp' => 0,
                'xp_total' => 0,
                'aktif' => true,
                'status_verifikasi' => 'pending',
                'asal_instansi' => 'SMP Negeri 2 Yogyakarta',
                'provinsi' => 'DI Yogyakarta',
                'kota' => 'Yogyakarta',
                'no_hp' => '085612345678',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'siswa.pending@kvthub.id'],
            [
                'name' => 'Siswa Pending',
                'password' => Hash::make('siswa123'),
                'peran' => 'siswa',
                'level' => 1,
                'xp' => 0,
                'xp_total' => 0,
                'aktif' => true,
                'status_verifikasi' => 'pending',
                'asal_instansi' => 'SMA Negeri 1 Malang',
                'provinsi' => 'Jawa Timur',
                'kota' => 'Malang',
                'no_hp' => '086712345678',
                'email_verified_at' => now(),
            ]
        );

        // ===== BATCH SISWA (50 siswa) =====
        if (User::where('peran', 'siswa')->count() <= 2) {
            $namaDepan = [
                'Andi',
                'Budi',
                'Citra',
                'Dewi',
                'Eko',
                'Fira',
                'Gilang',
                'Hana',
                'Indra',
                'Jihan',
                'Kiki',
                'Lukman',
                'Maya',
                'Nanda',
                'Oscar',
                'Putri',
                'Qori',
                'Reza',
                'Sari',
                'Toni',
                'Ulya',
                'Vina',
                'Wahyu',
                'Xena',
                'Yusuf',
                'Zahra',
                'Arif',
                'Bella',
                'Cahya',
                'Dani',
                'Elsa',
                'Fajar',
                'Ghina',
                'Hafiz',
                'Intan',
                'Joko',
                'Kayla',
                'Lina',
                'Mira',
                'Niko',
                'Okta',
                'Pasha',
                'Qhana',
                'Rini',
                'Surya',
                'Tika',
                'Umar',
                'Vera',
                'Wulan',
                'Yoga',
            ];
            $namaKeluarga = [
                'Pratama',
                'Wijaya',
                'Kusuma',
                'Putra',
                'Sari',
                'Hidayat',
                'Rahman',
                'Lestari',
                'Nugroho',
                'Santoso',
                'Permana',
                'Setiawan',
                'Anggraini',
                'Kurniawan',
                'Rahmawati',
                'Susanto',
                'Hartono',
                'Suryani',
                'Wibowo',
                'Fitriani',
            ];
            $kota = ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta', 'Semarang', 'Malang', 'Denpasar', 'Makassar', 'Medan', 'Palembang', 'Kebumen', 'Purwokerto', 'Solo', 'Bogor', 'Bekasi'];

            for ($i = 0; $i < 50; $i++) {
                $nama = $namaDepan[$i] . ' ' . $namaKeluarga[array_rand($namaKeluarga)];
                User::firstOrCreate(
                    ['email' => strtolower(str_replace(' ', '.', $namaDepan[$i])) . ($i + 1) . '@kvthub.id'],
                    [
                        'name' => $nama,
                        'password' => Hash::make('siswa123'),
                        'peran' => 'siswa',
                        'level' => rand(1, 50),
                        'xp' => rand(0, 99),
                        'xp_total' => rand(100, 25000),
                        'bio' => 'Pelajar dari ' . $kota[array_rand($kota)],
                        'aktif' => true,
                        'status_verifikasi' => 'diverifikasi',
                        'asal_instansi' => 'SMA Negeri ' . rand(1, 10) . ' ' . $kota[array_rand($kota)],
                        'provinsi' => 'Jawa',
                        'kota' => $kota[array_rand($kota)],
                        'email_verified_at' => now()->subDays(rand(1, 90)),
                        'terakhir_login' => now()->subHours(rand(1, 168)),
                    ]
                );
            }

            // 7 Guru tambahan
            $namaGuruList = [
                'Prof. Ahmad Dahlan',
                'Dr. Siti Nurhaliza',
                'Ir. Budi Karya',
                'Dra. Maria Christina',
                'Prof. Hidayatullah',
                'Dr. Ratna Sari',
                'Dr. Ayu Lestari',
            ];
            for ($i = 0; $i < 7; $i++) {
                User::firstOrCreate(
                    ['email' => 'guru' . ($i + 2) . '@kvthub.id'],
                    [
                        'name' => $namaGuruList[$i],
                        'password' => Hash::make('guru123'),
                        'peran' => 'guru',
                        'level' => rand(15, 60),
                        'xp' => rand(0, 99),
                        'xp_total' => rand(1500, 30000),
                        'bio' => 'Guru & Mentor KVT Hub',
                        'aktif' => true,
                        'status_verifikasi' => 'diverifikasi',
                        'asal_instansi' => 'Universitas ' . $kota[array_rand($kota)],
                        'email_verified_at' => now()->subDays(rand(1, 60)),
                        'terakhir_login' => now()->subHours(rand(1, 72)),
                    ]
                );
            }

            // 3 Staff tambahan
            $namaStaffList = ['Ir. Joko Widodo', 'Prof. Surya Darma', 'Dr. Nadia Putri'];
            for ($i = 0; $i < 3; $i++) {
                User::firstOrCreate(
                    ['email' => 'staff' . ($i + 2) . '@kvthub.id'],
                    [
                        'name' => $namaStaffList[$i],
                        'password' => Hash::make('staff123'),
                        'peran' => 'staff',
                        'level' => rand(10, 40),
                        'xp' => rand(0, 99),
                        'xp_total' => rand(1000, 20000),
                        'bio' => 'Staff Operasional KVT Hub',
                        'aktif' => true,
                        'email_verified_at' => now()->subDays(rand(1, 60)),
                        'terakhir_login' => now()->subHours(rand(1, 72)),
                    ]
                );
            }
        }

        $this->command->info('  [✓] Akun seeder selesai');
    }
}
