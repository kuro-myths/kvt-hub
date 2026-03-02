<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('tipe', 50)->default('informasi'); // fitur_baru, pembaruan, informasi, promosi, sistem, event
            $table->string('judul');
            $table->text('pesan')->nullable();
            $table->string('ikon', 50)->default('fa-bell');
            $table->string('warna', 50)->default('text-kvt-400');
            $table->string('bg_warna', 50)->default('bg-kvt-500/10');
            $table->string('url')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamp('mulai_pada')->nullable();
            $table->timestamp('berakhir_pada')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->useCurrent();

            $table->index(['aktif', 'dibuat_pada']);
            $table->index('tipe');
        });

        // Seed initial notifications
        DB::table('notifications')->insert([
            [
                'tipe' => 'fitur_baru',
                'judul' => 'K-Arma AI Assistant Hadir!',
                'pesan' => 'Asisten AI cerdas K-Arma kini tersedia. Import dokumen, tanya apa saja, dan dapatkan rekomendasi personal.',
                'ikon' => 'fa-robot',
                'warna' => 'text-pink-400',
                'bg_warna' => 'bg-pink-500/10',
                'url' => null,
                'aktif' => true,
                'mulai_pada' => now(),
                'berakhir_pada' => null,
                'dibuat_pada' => now(),
                'diperbarui_pada' => now(),
            ],
            [
                'tipe' => 'fitur_baru',
                'judul' => 'Halaman Staff Hub Baru',
                'pesan' => 'Lihat struktur kepengurusan, divisi, dan info rekrutmen staff di menu Staff.',
                'ikon' => 'fa-user-tie',
                'warna' => 'text-orange-400',
                'bg_warna' => 'bg-orange-500/10',
                'url' => '/staff-hub',
                'aktif' => true,
                'mulai_pada' => now(),
                'berakhir_pada' => null,
                'dibuat_pada' => now(),
                'diperbarui_pada' => now(),
            ],
            [
                'tipe' => 'pembaruan',
                'judul' => 'Navigasi 3 Halaman',
                'pesan' => 'Menu header kini memiliki 3 halaman scroll: Utama, Layanan, dan Staff & Ekstra.',
                'ikon' => 'fa-th-large',
                'warna' => 'text-blue-400',
                'bg_warna' => 'bg-blue-500/10',
                'url' => null,
                'aktif' => true,
                'mulai_pada' => now(),
                'berakhir_pada' => null,
                'dibuat_pada' => now(),
                'diperbarui_pada' => now(),
            ],
            [
                'tipe' => 'pembaruan',
                'judul' => 'Pencarian Real-Time',
                'pesan' => 'Fitur pencarian kini terintegrasi dengan data berita, kelas, materi, dan mitra secara langsung.',
                'ikon' => 'fa-search',
                'warna' => 'text-green-400',
                'bg_warna' => 'bg-green-500/10',
                'url' => null,
                'aktif' => true,
                'mulai_pada' => now(),
                'berakhir_pada' => null,
                'dibuat_pada' => now(),
                'diperbarui_pada' => now(),
            ],
            [
                'tipe' => 'informasi',
                'judul' => 'Selamat Datang di KVT Hub!',
                'pesan' => 'Platform edukasi digital dari TK sampai S3. Jelajahi 40+ fitur dan 30+ program studi.',
                'ikon' => 'fa-graduation-cap',
                'warna' => 'text-kvt-400',
                'bg_warna' => 'bg-kvt-500/10',
                'url' => '/tentang',
                'aktif' => true,
                'mulai_pada' => now(),
                'berakhir_pada' => null,
                'dibuat_pada' => now(),
                'diperbarui_pada' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
