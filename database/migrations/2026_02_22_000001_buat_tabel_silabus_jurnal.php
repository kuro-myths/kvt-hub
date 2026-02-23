<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ===== SILABUS PEMBELAJARAN =====
        Schema::create('silabus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained('users')->onDelete('cascade');
            $table->enum('semester', ['ganjil', 'genap'])->default('ganjil');
            $table->text('deskripsi')->nullable();
            $table->text('kompetensi_dasar')->nullable();
            $table->text('indikator')->nullable();
            $table->string('metode')->nullable();
            $table->json('pertemuan')->nullable(); // Array of { minggu, topik, sub_topik, metode, media, penilaian }
            $table->enum('status', ['draft', 'aktif', 'arsip'])->default('draft');
            $table->timestamps();
        });

        // ===== JURNAL MENGAJAR =====
        Schema::create('jurnal_mengajar', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('pertemuan_ke')->default(1);
            $table->string('topik');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained('users')->onDelete('cascade');
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->integer('jumlah_hadir')->default(0);
            $table->integer('jumlah_siswa')->default(0);
            $table->string('metode')->nullable();
            $table->text('materi_dibahas')->nullable();
            $table->text('catatan')->nullable();
            $table->text('kendala')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurnal_mengajar');
        Schema::dropIfExists('silabus');
    }
};
