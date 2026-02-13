<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    protected $table = 'pengunjung';

    protected $fillable = [
        'ip_address',
        'user_agent',
        'halaman',
        'negara',
        'kode_negara',
        'kota',
        'perangkat',
        'browser',
        'os',
        'referer',
        'user_id',
        'session_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Pengunjung hari ini
    public static function hariIni(): int
    {
        return static::whereDate('created_at', today())->distinct('ip_address')->count('ip_address');
    }

    // Online sekarang (aktif 5 menit terakhir)
    public static function onlineSekarang(): int
    {
        return static::where('created_at', '>=', now()->subMinutes(5))
            ->distinct('session_id')
            ->count('session_id');
    }

    // Total semua waktu
    public static function totalSemua(): int
    {
        return static::count();
    }

    // Total unik
    public static function totalUnik(): int
    {
        return static::distinct('ip_address')->count('ip_address');
    }

    // Pengunjung per negara
    public static function perNegara(int $limit = 10): \Illuminate\Support\Collection
    {
        return static::selectRaw('kode_negara, negara, COUNT(*) as total')
            ->whereNotNull('kode_negara')
            ->groupBy('kode_negara', 'negara')
            ->orderByDesc('total')
            ->limit($limit)
            ->get();
    }

    // Pengunjung 7 hari terakhir
    public static function mingguIni(): \Illuminate\Support\Collection
    {
        return static::selectRaw('DATE(created_at) as tanggal, COUNT(*) as total')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupByRaw('DATE(created_at)')
            ->orderBy('tanggal')
            ->get();
    }

    // Pengunjung per jam hari ini
    public static function perJamHariIni(): \Illuminate\Support\Collection
    {
        return static::selectRaw('EXTRACT(HOUR FROM created_at) as jam, COUNT(*) as total')
            ->whereDate('created_at', today())
            ->groupByRaw('EXTRACT(HOUR FROM created_at)')
            ->orderBy('jam')
            ->get();
    }

    // Halaman paling banyak dikunjungi
    public static function halamanPopuler(int $limit = 10): \Illuminate\Support\Collection
    {
        return static::selectRaw('halaman, COUNT(*) as total')
            ->groupBy('halaman')
            ->orderByDesc('total')
            ->limit($limit)
            ->get();
    }

    // Deteksi info dari User-Agent
    public static function detectBrowser(?string $ua): string
    {
        if (!$ua) return 'Unknown';
        if (str_contains($ua, 'Firefox')) return 'Firefox';
        if (str_contains($ua, 'Edg')) return 'Edge';
        if (str_contains($ua, 'Chrome')) return 'Chrome';
        if (str_contains($ua, 'Safari')) return 'Safari';
        if (str_contains($ua, 'Opera') || str_contains($ua, 'OPR')) return 'Opera';
        return 'Other';
    }

    public static function detectOS(?string $ua): string
    {
        if (!$ua) return 'Unknown';
        if (str_contains($ua, 'Windows')) return 'Windows';
        if (str_contains($ua, 'Mac')) return 'macOS';
        if (str_contains($ua, 'Linux')) return 'Linux';
        if (str_contains($ua, 'Android')) return 'Android';
        if (str_contains($ua, 'iPhone') || str_contains($ua, 'iPad')) return 'iOS';
        return 'Other';
    }

    public static function detectDevice(?string $ua): string
    {
        if (!$ua) return 'Unknown';
        if (str_contains($ua, 'Mobile') || str_contains($ua, 'Android')) return 'Mobile';
        if (str_contains($ua, 'Tablet') || str_contains($ua, 'iPad')) return 'Tablet';
        return 'Desktop';
    }
}
