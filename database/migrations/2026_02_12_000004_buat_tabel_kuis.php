<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kuis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->foreignId('materi_id')->constrained('materi')->onDelete('cascade');
            $table->integer('waktu_tampil')->default(0); // detik ke berapa video berhenti
            $table->integer('xp_reward')->default(5);
            $table->integer('durasi_detik')->default(60);
            $table->timestamps();
        });

        Schema::create('kuis_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuis_id')->constrained('kuis')->onDelete('cascade');
            $table->text('pertanyaan');
            $table->json('pilihan'); // array of options
            $table->string('jawaban_benar');
            $table->integer('poin')->default(1);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });

        Schema::create('kuis_jawaban', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kuis_id')->constrained('kuis')->onDelete('cascade');
            $table->foreignId('pertanyaan_id')->constrained('kuis_pertanyaan')->onDelete('cascade');
            $table->string('jawaban');
            $table->boolean('benar')->default(false);
            $table->integer('poin_didapat')->default(0);
            $table->timestamps();
        });

        Schema::create('kuis_hasil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kuis_id')->constrained('kuis')->onDelete('cascade');
            $table->integer('skor');
            $table->integer('total_pertanyaan');
            $table->integer('jawaban_benar_count');
            $table->integer('xp_didapat')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kuis_hasil');
        Schema::dropIfExists('kuis_jawaban');
        Schema::dropIfExists('kuis_pertanyaan');
        Schema::dropIfExists('kuis');
    }
};
