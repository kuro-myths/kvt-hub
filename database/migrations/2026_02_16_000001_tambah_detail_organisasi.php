<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah kolom detail ke tabel organisasi
        Schema::table('organisasi', function (Blueprint $table) {
            $table->string('singkatan')->nullable()->after('nama');
            $table->text('tentang')->nullable()->after('deskripsi');           // Deskripsi panjang (arti logo, sejarah, dll)
            $table->text('visi')->nullable()->after('tentang');
            $table->text('misi')->nullable()->after('visi');
            $table->text('tujuan')->nullable()->after('misi');
            $table->string('alamat')->nullable()->after('tujuan');
            $table->string('google_maps_embed')->nullable()->after('alamat'); // Embed URL Google Maps
            $table->string('email')->nullable()->after('kontak');
            $table->string('telepon')->nullable()->after('email');
            $table->string('instagram')->nullable()->after('telepon');
            $table->string('facebook')->nullable()->after('instagram');
            $table->string('twitter')->nullable()->after('facebook');
            $table->string('youtube')->nullable()->after('twitter');
            $table->string('linkedin')->nullable()->after('youtube');
            $table->string('tiktok')->nullable()->after('linkedin');
            $table->string('gambar_struktur')->nullable()->after('logo');     // Gambar hierarki kepengurusan
            $table->year('tahun_berdiri')->nullable()->after('tiktok');
            $table->string('periode_kepengurusan')->nullable()->after('tahun_berdiri'); // misal "2024/2025"
        });

        // Tabel kegiatan organisasi
        Schema::create('organisasi_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisasi_id')->constrained('organisasi')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        // Tabel pengurus organisasi (manual input, bukan dari user)
        Schema::create('organisasi_pengurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisasi_id')->constrained('organisasi')->onDelete('cascade');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('foto')->nullable();
            $table->integer('urutan')->default(0);  // Untuk sorting hierarki
            $table->string('periode')->nullable();   // misal "2024/2025"
            $table->timestamps();
        });

        // Tabel galeri organisasi
        Schema::create('organisasi_galeri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisasi_id')->constrained('organisasi')->onDelete('cascade');
            $table->string('judul')->nullable();
            $table->string('gambar');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organisasi_galeri');
        Schema::dropIfExists('organisasi_pengurus');
        Schema::dropIfExists('organisasi_kegiatan');

        Schema::table('organisasi', function (Blueprint $table) {
            $table->dropColumn([
                'singkatan',
                'tentang',
                'visi',
                'misi',
                'tujuan',
                'alamat',
                'google_maps_embed',
                'email',
                'telepon',
                'instagram',
                'facebook',
                'twitter',
                'youtube',
                'linkedin',
                'tiktok',
                'gambar_struktur',
                'tahun_berdiri',
                'periode_kepengurusan',
            ]);
        });
    }
};
