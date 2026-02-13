<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kerja_sama', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->enum('tipe', ['sponsor', 'mitra_akademik', 'mitra_industri', 'media_partner', 'komunitas'])->default('mitra_industri');
            $table->enum('tier', ['platinum', 'gold', 'silver', 'bronze', 'community'])->default('community');
            $table->decimal('nilai_kontrak', 15, 2)->nullable();
            $table->date('mulai_pada')->nullable();
            $table->date('berakhir_pada')->nullable();
            $table->boolean('aktif')->default(true);
            $table->boolean('tampil_beranda')->default(false);
            $table->string('kontak_nama')->nullable();
            $table->string('kontak_email')->nullable();
            $table->string('kontak_telepon', 20)->nullable();
            $table->text('benefit')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();

            $table->index(['tipe', 'aktif']);
            $table->index(['tier']);
            $table->index(['tampil_beranda']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerja_sama');
    }
};
