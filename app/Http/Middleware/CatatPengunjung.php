<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pengunjung;
use App\Jobs\EnrichPengunjungGeolocationJob;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CatatPengunjung
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Hanya catat request GET (bukan API, asset, dll)
        if ($request->isMethod('GET') && !$request->is('api/*', '_debugbar/*', 'favicon.*', 'build/*')) {
            try {
                $ua = $request->userAgent();
                $ip = $request->ip();

                // Simpan record tanpa geolokasi (non-blocking)
                $pengunjung = Pengunjung::create([
                    'ip_address' => $ip,
                    'user_agent' => $ua ? substr($ua, 0, 255) : null,
                    'halaman' => $request->path() === '/' ? '/' : '/' . $request->path(),
                    'negara' => null,
                    'kode_negara' => null,
                    'perangkat' => Pengunjung::detectDevice($ua),
                    'browser' => Pengunjung::detectBrowser($ua),
                    'os' => Pengunjung::detectOS($ua),
                    'referer' => $request->header('referer') ? substr($request->header('referer'), 0, 255) : null,
                    'user_id' => Auth::id(),
                    'session_id' => $request->session()->getId(),
                ]);

                // Dispatch async geolocation enrichment via queue
                EnrichPengunjungGeolocationJob::dispatch($pengunjung->id, $ip);
            } catch (\Throwable $e) {
                // Jangan sampai error tracking menghambat request utama
                report($e);
            }
        }

        return $response;
    }
}
