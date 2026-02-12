<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->longText('konten')->nullable();
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained('users')->onDelete('cascade');
            $table->enum('tipe', ['video', 'artikel', 'tutorial', 'praktik', 'quiz'])->default('artikel');
            $table->string('video_url')->nullable();
            $table->string('video_platform')->nullable(); // youtube, ig
            $table->integer('durasi_menit')->default(0);
            $table->integer('xp_reward')->default(10);
            $table->integer('urutan')->default(0);
            $table->enum('status', ['draft', 'terbit', 'arsip'])->default('draft');
            $table->boolean('eksklusif')->default(false);
            $table->timestamps();
        });

        Schema::create('materi_progres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('materi_id')->constrained('materi')->onDelete('cascade');
            $table->enum('status', ['belum', 'sedang', 'selesai'])->default('belum');
            $table->integer('progres_persen')->default(0);
            $table->integer('waktu_tonton')->default(0); // detik
            $table->timestamp('selesai_pada')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'materi_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materi_progres');
        Schema::dropIfExists('materi');
    }
};
