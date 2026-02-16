<?php

namespace Database\Seeders;

use App\Models\Organisasi;
use Illuminate\Database\Seeder;

class OrganisasiSeeder extends Seeder
{
    /**
     * Seed data organisasi.
     */
    public function run(): void
    {
        if (Organisasi::count() > 0) {
            $this->command->info('  [~] Organisasi sudah ada, skip.');
            return;
        }

        $organisasiData = [
            ['nama' => 'BEM KVT Hub', 'tipe' => 'internal', 'kategori' => 'akademik', 'unggulan' => true, 'jumlah_anggota' => 150, 'deskripsi' => 'Badan Eksekutif Mahasiswa KVT Hub'],
            ['nama' => 'HMIF - Himpunan Mahasiswa Informatika', 'tipe' => 'internal', 'kategori' => 'akademik', 'unggulan' => true, 'jumlah_anggota' => 200],
            ['nama' => 'Google Developer Student Club', 'tipe' => 'eksternal', 'kategori' => 'teknologi', 'unggulan' => true, 'jumlah_anggota' => 80, 'website' => 'https://gdsc.community.dev'],
            ['nama' => 'AWS Cloud Club', 'tipe' => 'eksternal', 'kategori' => 'teknologi', 'unggulan' => true, 'jumlah_anggota' => 60],
            ['nama' => 'OSIS KVT Academy', 'tipe' => 'internal', 'kategori' => 'akademik', 'unggulan' => false, 'jumlah_anggota' => 50],
            ['nama' => 'Pramuka Digital', 'tipe' => 'internal', 'kategori' => 'sosial', 'unggulan' => false, 'jumlah_anggota' => 40],
            ['nama' => 'Forum Riset Nasional', 'tipe' => 'nasional', 'kategori' => 'akademik', 'unggulan' => true, 'jumlah_anggota' => 500],
            ['nama' => 'IEEE Student Branch', 'tipe' => 'internasional', 'kategori' => 'teknologi', 'unggulan' => true, 'jumlah_anggota' => 120, 'website' => 'https://ieee.org'],
            ['nama' => 'ACM Chapter', 'tipe' => 'internasional', 'kategori' => 'teknologi', 'unggulan' => true, 'jumlah_anggota' => 90, 'website' => 'https://acm.org'],
            ['nama' => 'Klub Olahraga E-Sport', 'tipe' => 'internal', 'kategori' => 'olahraga', 'unggulan' => false, 'jumlah_anggota' => 75],
            ['nama' => 'Sanggar Seni & Budaya', 'tipe' => 'internal', 'kategori' => 'seni_budaya', 'unggulan' => false, 'jumlah_anggota' => 35],
            ['nama' => 'Startup Incubator KVT', 'tipe' => 'internal', 'kategori' => 'kewirausahaan', 'unggulan' => true, 'jumlah_anggota' => 30],
            ['nama' => 'Green Campus Movement', 'tipe' => 'nasional', 'kategori' => 'lingkungan', 'unggulan' => false, 'jumlah_anggota' => 45],
            ['nama' => 'Rohani Islam (ROHIS)', 'tipe' => 'internal', 'kategori' => 'keagamaan', 'unggulan' => false, 'jumlah_anggota' => 65],
        ];

        foreach ($organisasiData as $org) {
            Organisasi::create($org);
        }

        $this->command->info('  [✓] Organisasi seeder selesai');
    }
}
