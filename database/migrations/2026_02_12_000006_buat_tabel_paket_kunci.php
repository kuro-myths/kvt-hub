<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_eksklusif', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->decimal('harga', 12, 2)->default(0);
            $table->text('fitur')->nullable();
            $table->integer('durasi_hari')->default(30);
            $table->integer('xp_bonus')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        Schema::create('langganan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('paket_id')->constrained('paket_eksklusif')->onDelete('cascade');
            $table->timestamp('mulai_pada');
            $table->timestamp('berakhir_pada');
            $table->enum('status', ['aktif', 'kadaluarsa', 'dibatalkan'])->default('aktif');
            $table->timestamps();
        });

        Schema::create('kunci_admin', function (Blueprint $table) {
            $table->id();
            $table->string('kunci')->unique();
            $table->string('deskripsi')->nullable();
            $table->boolean('digunakan')->default(false);
            $table->foreignId('digunakan_oleh')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('digunakan_pada')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunci_admin');
        Schema::dropIfExists('langganan');
        Schema::dropIfExists('paket_eksklusif');
    }
};
