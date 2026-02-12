<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alpha'])->default('hadir');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'kelas_id', 'tanggal']);
        });

        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('set null');
            $table->string('tipe_diagram')->default('Bar Chart');
            $table->longText('data_json')->nullable();
            $table->enum('status', ['draft', 'terbit'])->default('draft');
            $table->timestamps();
        });

        Schema::create('pencapaian', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('ikon')->nullable();
            $table->string('warna')->default('#3B82F6');
            $table->integer('xp_syarat')->default(0);
            $table->integer('level_syarat')->default(0);
            $table->timestamps();
        });

        Schema::create('pencapaian_pengguna', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('pencapaian_id')->constrained('pencapaian')->onDelete('cascade');
            $table->timestamp('diraih_pada');
            $table->timestamps();
            $table->unique(['user_id', 'pencapaian_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pencapaian_pengguna');
        Schema::dropIfExists('pencapaian');
        Schema::dropIfExists('laporan');
        Schema::dropIfExists('kehadiran');
    }
};
