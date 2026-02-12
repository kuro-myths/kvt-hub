<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->foreignId('guru_id')->constrained('users')->onDelete('cascade');
            $table->string('kode_kelas')->unique();
            $table->enum('status', ['aktif', 'nonaktif', 'arsip'])->default('aktif');
            $table->integer('maks_siswa')->default(50);
            $table->string('kategori')->nullable();
            $table->timestamps();
        });

        Schema::create('kelas_anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['aktif', 'pending', 'dikeluarkan'])->default('aktif');
            $table->timestamps();
            $table->unique(['kelas_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas_anggota');
        Schema::dropIfExists('kelas');
    }
};
