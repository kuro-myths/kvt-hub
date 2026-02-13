<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('ringkasan')->nullable();
            $table->longText('konten');
            $table->string('gambar')->nullable();
            $table->string('kategori', 50)->default('umum');
            $table->enum('status', ['draft', 'terbit', 'arsip'])->default('draft');
            $table->boolean('tampil_ticker')->default(false);
            $table->boolean('tampil_popup')->default(false);
            $table->boolean('unggulan')->default(false);
            $table->foreignId('penulis_id')->constrained('users')->cascadeOnDelete();
            $table->integer('dilihat')->default(0);
            $table->timestamp('terbit_pada')->nullable();
            $table->timestamps();

            $table->index(['status', 'terbit_pada']);
            $table->index(['tampil_ticker']);
            $table->index(['kategori']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
