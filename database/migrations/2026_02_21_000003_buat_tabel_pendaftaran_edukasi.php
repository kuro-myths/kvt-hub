<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_edukasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('edukasi_gratis_id')->constrained('edukasi_gratis')->cascadeOnDelete();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('telepon')->nullable();
            $table->string('institusi')->nullable(); // Asal sekolah/kampus
            $table->string('jenjang')->nullable(); // SD, SMP, SMA, D3, S1, S2, S3, Umum
            $table->text('motivasi')->nullable(); // Alasan mendaftar
            $table->text('prasyarat_status')->nullable(); // JSON: checklist prasyarat yang sudah dipenuhi
            $table->string('dokumen_identitas')->nullable(); // Path foto KTP/KTM
            $table->string('dokumen_pendukung')->nullable(); // Path foto sertifikat/dokumen lain
            $table->string('foto_selfie')->nullable(); // Path foto selfie verifikasi
            $table->string('lokasi_kota')->nullable();
            $table->string('lokasi_provinsi')->nullable();
            $table->decimal('lokasi_lat', 10, 7)->nullable();
            $table->decimal('lokasi_lng', 10, 7)->nullable();
            $table->string('status')->default('menunggu'); // menunggu, diverifikasi, disetujui, ditolak, selesai
            $table->text('catatan_admin')->nullable();
            $table->timestamp('diverifikasi_pada')->nullable();
            $table->foreignId('diverifikasi_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('notifikasi_terakhir')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'edukasi_gratis_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_edukasi');
    }
};
