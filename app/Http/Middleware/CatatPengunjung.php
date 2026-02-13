<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pengunjung;
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

                Pengunjung::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => $ua ? substr($ua, 0, 255) : null,
                    'halaman' => $request->path() === '/' ? '/' : '/' . $request->path(),
                    'negara' => $this->detectNegara($request->ip()),
                    'kode_negara' => $this->detectKodeNegara($request->ip()),
                    'perangkat' => Pengunjung::detectDevice($ua),
                    'browser' => Pengunjung::detectBrowser($ua),
                    'os' => Pengunjung::detectOS($ua),
                    'referer' => $request->header('referer') ? substr($request->header('referer'), 0, 255) : null,
                    'user_id' => Auth::id(),
                    'session_id' => $request->session()->getId(),
                ]);
            } catch (\Throwable $e) {
                // Jangan sampai error tracking menghambat request utama
                report($e);
            }
        }

        return $response;
    }

    private function detectNegara(string $ip): string
    {
        // Untuk localhost/development
        if (in_array($ip, ['127.0.0.1', '::1', 'localhost'])) {
            return 'Indonesia';
        }

        // Gunakan ip-api.com (gratis, 45 req/menit)
        try {
            $data = @file_get_contents("http://ip-api.com/json/{$ip}?fields=country,countryCode&lang=id");
            if ($data) {
                $json = json_decode($data, true);
                return $json['country'] ?? 'Unknown';
            }
        } catch (\Throwable $e) {
            // Fallback
        }

        return 'Unknown';
    }

    private function detectKodeNegara(string $ip): string
    {
        if (in_array($ip, ['127.0.0.1', '::1', 'localhost'])) {
            return 'ID';
        }

        try {
            $data = @file_get_contents("http://ip-api.com/json/{$ip}?fields=countryCode");
            if ($data) {
                $json = json_decode($data, true);
                return $json['countryCode'] ?? 'XX';
            }
        } catch (\Throwable $e) {
            // Fallback
        }

        return 'XX';
    }
}
