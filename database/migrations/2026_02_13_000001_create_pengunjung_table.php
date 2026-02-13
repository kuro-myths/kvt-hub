<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45);
            $table->string('user_agent')->nullable();
            $table->string('halaman')->default('/');
            $table->string('negara', 100)->nullable();
            $table->string('kode_negara', 5)->nullable();
            $table->string('kota', 100)->nullable();
            $table->string('perangkat', 50)->nullable();
            $table->string('browser', 50)->nullable();
            $table->string('os', 50)->nullable();
            $table->string('referer')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('session_id')->nullable()->index();
            $table->timestamps();

            $table->index(['created_at']);
            $table->index(['ip_address', 'created_at']);
            $table->index(['negara']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengunjung');
    }
};
