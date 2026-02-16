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

        if ($driver === 'pgsql') {
            DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_peran_check');

            // Split "tim" into "pengajar" (default for existing tim)
            DB::table('users')->where('peran', 'tim')->update(['peran' => 'pengajar']);

            DB::statement("ALTER TABLE users ADD CONSTRAINT users_peran_check CHECK (peran::text = ANY (ARRAY['pengguna'::text, 'pengajar'::text, 'staff'::text, 'admin'::text]))");
        } else {
            // MySQL/SQLite: just update existing tim → pengajar
            DB::table('users')->where('peran', 'tim')->update(['peran' => 'pengajar']);
        }
    }

    public function down(): void
    {
        $driver = DB::connection()->getDriverName();

        if ($driver === 'pgsql') {
            DB::statement('ALTER TABLE users DROP CONSTRAINT IF EXISTS users_peran_check');

            DB::table('users')->where('peran', 'pengajar')->update(['peran' => 'tim']);
            DB::table('users')->where('peran', 'staff')->update(['peran' => 'tim']);

            DB::statement("ALTER TABLE users ADD CONSTRAINT users_peran_check CHECK (peran::text = ANY (ARRAY['pengguna'::text, 'tim'::text, 'admin'::text]))");
        } else {
            DB::table('users')->where('peran', 'pengajar')->update(['peran' => 'tim']);
            DB::table('users')->where('peran', 'staff')->update(['peran' => 'tim']);
        }
    }
};
