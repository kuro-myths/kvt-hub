<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('peran', ['siswa', 'guru', 'admin'])->default('siswa')->after('name');
            $table->string('avatar')->nullable()->after('peran');
            $table->string('provider')->nullable()->after('avatar'); // google, github
            $table->string('provider_id')->nullable()->after('provider');
            $table->integer('level')->default(1)->after('provider_id');
            $table->integer('xp')->default(0)->after('level');
            $table->integer('xp_total')->default(0)->after('xp');
            $table->string('kelas')->nullable()->after('xp_total');
            $table->text('bio')->nullable()->after('kelas');
            $table->boolean('aktif')->default(true)->after('bio');
            $table->timestamp('terakhir_login')->nullable()->after('aktif');
            $table->string('password')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'peran',
                'avatar',
                'provider',
                'provider_id',
                'level',
                'xp',
                'xp_total',
                'kelas',
                'bio',
                'aktif',
                'terakhir_login'
            ]);
        });
    }
};
