<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\KerjaSama;
use App\Models\Kurikulum;
use App\Models\Organisasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Jalankan: php artisan db:seed
     * Atau per seeder: php artisan db:seed --class=AkunSeeder
     */
    public function run(): void
    {
        $this->command->info('');
        $this->command->info('============================================');
        $this->command->info('    KVT Hub v4.0 - Memulai Seeding...      ');
        $this->command->info('============================================');
        $this->command->info('');

        $this->call([
            AkunSeeder::class,
            KelasMateriSeeder::class,
            PaketPencapaianSeeder::class,
            BeritaSeeder::class,
            KerjaSamaSeeder::class,
            PengunjungSeeder::class,
            KurikulumSeeder::class,
            OrganisasiSeeder::class,
        ]);

        $this->command->info('');
        $this->command->info('============================================');
        $this->command->info('    KVT Hub v4.0 - Seeding Selesai!        ');
        $this->command->info('============================================');
        $this->command->info('  Admin    : admin@kvthub.id / admin123');
        $this->command->info('  Pengajar : pengajar@kvthub.id / pengajar123');
        $this->command->info('  Staff    : staff@kvthub.id / staff123');
        $this->command->info('  Pengguna : pengguna@kvthub.id / pengguna123');
        $this->command->info('  Kunci    : KVT-ADMIN-2025-SECRET');
        $this->command->info('  Kurikulum: ' . Kurikulum::count() . ' jenjang pendidikan');
        $this->command->info('  Organisasi: ' . Organisasi::count() . ' organisasi');
        $this->command->info('  Berita   : ' . Berita::count() . ' berita');
        $this->command->info('  Mitra    : ' . KerjaSama::count() . ' mitra');
        $this->command->info('============================================');
        $this->command->info('');
    }
}
