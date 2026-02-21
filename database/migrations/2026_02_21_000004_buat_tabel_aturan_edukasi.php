<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aturan_edukasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('edukasi_gratis_id')->nullable()->constrained('edukasi_gratis')->cascadeOnDelete();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('tipe')->default('peringatan'); // peringatan, larangan, tips, prosedur
            $table->string('tingkat')->default('sedang'); // rendah, sedang, tinggi, kritis
            $table->string('ikon')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->boolean('berlaku_semua')->default(false); // true = berlaku untuk semua program
            $table->foreignId('dibuat_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aturan_edukasi');
    }
};
