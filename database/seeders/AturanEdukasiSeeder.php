<?php

namespace Database\Seeders;

use App\Models\AturanEdukasi;
use Illuminate\Database\Seeder;

class AturanEdukasiSeeder extends Seeder
{
    public function run(): void
    {
        AturanEdukasi::truncate();

        // Muat data aturan dari file terpisah per tipe
        $tipeFiles = [
            'aturan_tentang',
            'aturan_larangan',
            'aturan_peringatan',
            'aturan_prosedur',
            'aturan_tips',
        ];

        $totalAturan = 0;

        foreach ($tipeFiles as $file) {
            $dataList = require database_path("seeders/data/{$file}.php");

            foreach ($dataList as $item) {
                $totalAturan++;

                // Ambil info tipe dari model
                $tipeInfo = AturanEdukasi::daftarTipe()[$item['tipe']] ?? null;

                AturanEdukasi::create([
                    'edukasi_gratis_id' => null,
                    'judul' => $item['judul'],
                    'deskripsi' => $item['isi'],
                    'tipe' => $item['tipe'],
                    'tingkat' => $item['tingkat'],
                    'ikon' => $tipeInfo['ikon'] ?? 'fas fa-info-circle',
                    'urutan' => $item['urutan'],
                    'berlaku_semua' => true,
                    'aktif' => true,
                ]);
            }
        }

        $this->command->info("Berhasil seed {$totalAturan} aturan edukasi dari " . count($tipeFiles) . " tipe!");
    }
}
