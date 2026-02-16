<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekPeran
{
    public function handle(Request $request, Closure $next, string ...$peran): Response
    {
        if (!Auth::check()) {
            return redirect()->route('masuk');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Support 'pengguna' as alias for all learner roles
        $peranDiperluas = [];
        foreach ($peran as $p) {
            if ($p === 'pengguna') {
                $peranDiperluas = array_merge($peranDiperluas, ['siswa', 'mahasiswa', 'orang_tua', 'pengunjung']);
            } else {
                $peranDiperluas[] = $p;
            }
        }

        if (!in_array($user->peran, $peranDiperluas)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Check if user needs verification and hasn't been verified yet
        if ($user->butuhVerifikasi() && !$user->sudahTerverifikasi() && !$user->dibuat_oleh_admin) {
            // Allow access to verification status page
            if (!$request->routeIs('verifikasi.*') && !$request->routeIs('keluar')) {
                return redirect()->route('verifikasi.status')
                    ->with('info', 'Akun Anda masih menunggu verifikasi admin.');
            }
        }

        return $next($request);
    }
}
