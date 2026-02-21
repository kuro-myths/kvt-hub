<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karakter_cerita', function (Blueprint $table) {
            $table->id();
            $table->string('karakter'); // 'bejotaro', 'veteran', dll
            $table->integer('chapter');
            $table->string('judul');
            $table->string('judul_asing')->nullable();
            $table->string('slug')->unique();
            $table->string('ikon')->default('fas fa-book');
            $table->string('warna')->default('amber'); // color name key
            $table->string('warna_hex')->default('#D97706');
            $table->text('ringkasan')->nullable();
            $table->longText('konten');
            $table->string('gambar')->nullable();
            $table->string('aliansi')->nullable();
            $table->string('jenjang')->nullable();
            $table->enum('status', ['draft', 'terbit', 'arsip'])->default('terbit');
            $table->integer('urutan')->default(0);
            $table->timestamps();

            $table->unique(['karakter', 'chapter']);
            $table->index(['karakter', 'status', 'chapter']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karakter_cerita');
    }
};
