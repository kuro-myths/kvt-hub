<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PengunjungSeeder extends Seeder
{
    /**
     * Seed data pengunjung sample.
     */
    public function run(): void
    {
        if (Pengunjung::count() > 0) {
            $this->command->info('  [~] Pengunjung sudah ada, skip.');
            return;
        }

        $negaraList = [
            ['Indonesia', 'ID'],
            ['United States', 'US'],
            ['Japan', 'JP'],
            ['Germany', 'DE'],
            ['Malaysia', 'MY'],
            ['Singapore', 'SG'],
            ['Australia', 'AU'],
            ['United Kingdom', 'GB'],
            ['South Korea', 'KR'],
            ['Netherlands', 'NL'],
        ];
        $halamanList = ['/', '/berita', '/kerja-sama', '/jenjang-pendidikan', '/riset-inovasi', '/karir-industri', '/komunitas', '/sertifikasi', '/tentang'];
        $browserList = ['Chrome', 'Firefox', 'Safari', 'Edge', 'Opera'];
        $osList = ['Windows 11', 'macOS', 'Linux', 'Android', 'iOS'];
        $perangkatList = ['Desktop', 'Mobile', 'Tablet'];

        for ($i = 0; $i < 150; $i++) {
            $negara = $negaraList[array_rand($negaraList)];
            Pengunjung::create([
                'ip_address' => fake()->ipv4(),
                'user_agent' => fake()->userAgent(),
                'halaman' => $halamanList[array_rand($halamanList)],
                'negara' => $negara[0],
                'kode_negara' => $negara[1],
                'browser' => $browserList[array_rand($browserList)],
                'os' => $osList[array_rand($osList)],
                'perangkat' => $perangkatList[array_rand($perangkatList)],
                'session_id' => Str::random(40),
                'created_at' => now()->subMinutes(rand(0, 10080)),
            ]);
        }

        $this->command->info('  [✓] Pengunjung seeder selesai');
    }
}
