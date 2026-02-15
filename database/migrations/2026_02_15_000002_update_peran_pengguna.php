<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // For PostgreSQL: drop the check constraint first, then update data
        $driver = DB::connection()->getDriverName();

        if ($driver === 'pgsql') {
            // Drop the existing check constraint on peran column
            DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_peran_check');

            // Update existing role values
            DB::table('users')->where('peran', 'siswa')->update(['peran' => 'pengguna']);
            DB::table('users')->where('peran', 'guru')->update(['peran' => 'tim']);

            // Re-add check constraint with new values
            DB::statement("ALTER TABLE users ADD CONSTRAINT users_peran_check CHECK (peran::text = ANY (ARRAY['pengguna'::text, 'tim'::text, 'admin'::text]))");
        } else {
            // For MySQL/SQLite: change column type first or just update
            DB::table('users')->where('peran', 'siswa')->update(['peran' => 'pengguna']);
            DB::table('users')->where('peran', 'guru')->update(['peran' => 'tim']);
        }

        // Change default value
        Schema::table('users', function (Blueprint $table) {
            $table->string('peran')->default('pengguna')->change();
        });
    }

    public function down(): void
    {
        $driver = DB::connection()->getDriverName();

        if ($driver === 'pgsql') {
            DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_peran_check');

            DB::table('users')->where('peran', 'pengguna')->update(['peran' => 'siswa']);
            DB::table('users')->where('peran', 'tim')->update(['peran' => 'guru']);

            DB::statement("ALTER TABLE users ADD CONSTRAINT users_peran_check CHECK (peran::text = ANY (ARRAY['siswa'::text, 'guru'::text, 'admin'::text]))");
        } else {
            DB::table('users')->where('peran', 'pengguna')->update(['peran' => 'siswa']);
            DB::table('users')->where('peran', 'tim')->update(['peran' => 'guru']);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->string('peran')->default('siswa')->change();
        });
    }
};
