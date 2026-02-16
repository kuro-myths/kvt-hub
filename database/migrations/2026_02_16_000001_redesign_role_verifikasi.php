<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $driver = DB::connection()->getDriverName();

        // ─── 1) Expand role values ───
        // Mapping: pengguna → siswa (default learner)
        // New roles: siswa, mahasiswa, orang_tua, pengunjung
        // pengajar = guru/tenaga pengajar (kept for backward compat)

        if ($driver === 'pgsql') {
            DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_peran_check');

            DB::table('users')->where('peran', 'pengguna')->update(['peran' => 'siswa']);

            DB::statement("ALTER TABLE users ADD CONSTRAINT users_peran_check CHECK (peran::text = ANY (ARRAY['admin'::text, 'staff'::text, 'pengajar'::text, 'siswa'::text, 'mahasiswa'::text, 'orang_tua'::text, 'pengunjung'::text]))");
        } else {
            // MySQL/SQLite: just update existing data
            DB::table('users')->where('peran', 'pengguna')->update(['peran' => 'siswa']);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->string('peran')->default('siswa')->change();
        });

        // ─── 2) Add verification & registration columns ───
        Schema::table('users', function (Blueprint $table) {
            // Verification system
            $table->string('status_verifikasi')->default('pending')->after('aktif');
            // pending, terverifikasi, ditolak
            $table->timestamp('verified_at')->nullable()->after('status_verifikasi');
            $table->unsignedBigInteger('verified_by')->nullable()->after('verified_at');
            $table->text('catatan_verifikasi')->nullable()->after('verified_by');

            // Registration details
            $table->string('no_hp')->nullable()->after('email');
            $table->string('provinsi')->nullable()->after('no_hp');
            $table->string('kota_kabupaten')->nullable()->after('provinsi');
            $table->string('asal_instansi')->nullable()->after('kota_kabupaten');

            // Document uploads
            $table->string('dokumen_identitas')->nullable()->after('asal_instansi');
            // KTM, kartu pelajar, KK, KTP
            $table->string('dokumen_cv')->nullable()->after('dokumen_identitas');
            $table->string('dokumen_ijazah')->nullable()->after('dokumen_cv');
            $table->string('dokumen_sertifikat')->nullable()->after('dokumen_ijazah');

            // Admin-created accounts
            $table->boolean('dibuat_oleh_admin')->default(false)->after('dokumen_sertifikat');

            // Foreign key for verified_by
            $table->foreign('verified_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        $driver = DB::connection()->getDriverName();

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['verified_by']);
            $table->dropColumn([
                'status_verifikasi',
                'verified_at',
                'verified_by',
                'catatan_verifikasi',
                'no_hp',
                'provinsi',
                'kota_kabupaten',
                'asal_instansi',
                'dokumen_identitas',
                'dokumen_cv',
                'dokumen_ijazah',
                'dokumen_sertifikat',
                'dibuat_oleh_admin',
            ]);
        });

        if ($driver === 'pgsql') {
            DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_peran_check');
            DB::table('users')->where('peran', 'siswa')->update(['peran' => 'pengguna']);
            DB::table('users')->where('peran', 'mahasiswa')->update(['peran' => 'pengguna']);
            DB::table('users')->where('peran', 'orang_tua')->update(['peran' => 'pengguna']);
            DB::table('users')->where('peran', 'pengunjung')->update(['peran' => 'pengguna']);
            DB::statement("ALTER TABLE users ADD CONSTRAINT users_peran_check CHECK (peran::text = ANY (ARRAY['pengguna'::text, 'pengajar'::text, 'staff'::text, 'admin'::text]))");
        } else {
            DB::table('users')->where('peran', 'siswa')->update(['peran' => 'pengguna']);
            DB::table('users')->where('peran', 'mahasiswa')->update(['peran' => 'pengguna']);
            DB::table('users')->where('peran', 'orang_tua')->update(['peran' => 'pengguna']);
            DB::table('users')->where('peran', 'pengunjung')->update(['peran' => 'pengguna']);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->string('peran')->default('pengguna')->change();
        });
    }
};
