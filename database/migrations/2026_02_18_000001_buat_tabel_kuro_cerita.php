<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kuro_cerita', function (Blueprint $table) {
            $table->id();
            $table->integer('chapter')->unique();
            $table->string('judul');
            $table->string('judul_asing')->nullable(); // Julukan asing (VTA, VTI, dll)
            $table->string('slug')->unique();
            $table->string('ikon')->default('fas fa-book');
            $table->string('warna')->default('from-kvt-500 to-kvt-600'); // gradient class
            $table->string('warna_hex')->default('#3399FF'); // accent color
            $table->text('ringkasan')->nullable();
            $table->longText('konten'); // HTML content
            $table->string('gambar')->nullable();
            $table->string('aliansi')->nullable(); // VTA, VTI, VTU, VTE, VTO
            $table->string('jenjang')->nullable(); // jenjang pendidikan terkait
            $table->enum('status', ['draft', 'terbit', 'arsip'])->default('terbit');
            $table->integer('urutan')->default(0);
            $table->timestamps();

            $table->index(['status', 'chapter']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kuro_cerita');
    }
};
