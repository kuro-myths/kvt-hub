<?php

namespace Database\Seeders;

use App\Models\EdukasiGratis;
use Illuminate\Database\Seeder;

class EdukasiGratisSeeder extends Seeder
{
    public function run(): void
    {
        EdukasiGratis::truncate();

        $kategoriFiles = [
            'edukasi_tools',
            'edukasi_cloud',
            'edukasi_design',
            'edukasi_dev',
            'edukasi_ai',
            'edukasi_pendidikan',
            'edukasi_produktivitas',
            'edukasi_sertifikasi',
            'edukasi_database',
            'edukasi_keamanan',
        ];

        $semuaData = [];

        foreach ($kategoriFiles as $file) {
            $data = require database_path("seeders/data/{$file}.php");
            $semuaData = array_merge($semuaData, $data);
        }

        $urutan = 0;
        foreach ($semuaData as $item) {
            $urutan++;
            EdukasiGratis::create([
                'judul' => $item['judul'],
                'deskripsi' => $item['deskripsi'],
                'langkah' => $item['langkah'] ?? null,
                'kategori' => $item['kategori'],
                'platform' => $item['platform'],
                'url_resmi' => $item['url_resmi'],
                'ikon' => $item['ikon'],
                'warna' => $item['warna'],
                'unggulan' => $item['unggulan'] ?? false,
                'urutan' => $urutan,
                'aktif' => true,
                'dibuat_oleh' => null,
            ]);
        }

        $this->command->info("Berhasil seed {$urutan} program Edukasi Gratis dari " . count($kategoriFiles) . " kategori!");
    }
}
