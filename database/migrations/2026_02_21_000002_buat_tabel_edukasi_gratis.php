<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('edukasi_gratis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->text('langkah')->nullable(); // HTML/Markdown langkah-langkah
            $table->string('kategori')->default('umum'); // tools, cloud, design, dev, ai, pendidikan, dll
            $table->string('platform')->nullable(); // GitHub, Figma, Google, Microsoft, dll
            $table->string('url_resmi')->nullable(); // Link resmi ke halaman pendaftaran
            $table->string('gambar')->nullable();
            $table->string('ikon')->nullable(); // Font Awesome icon class
            $table->string('warna')->default('kvt'); // Tailwind color name
            $table->boolean('aktif')->default(true);
            $table->boolean('unggulan')->default(false);
            $table->integer('urutan')->default(0);
            $table->integer('dilihat')->default(0);
            $table->foreignId('dibuat_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('edukasi_gratis');
    }
};
