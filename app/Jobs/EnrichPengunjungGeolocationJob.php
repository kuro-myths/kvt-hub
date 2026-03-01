<?php

namespace App\Jobs;

use App\Models\Pengunjung;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Enriches a Pengunjung record with geolocation data asynchronously.
 *
 * - Single HTTP call to ip-api.com (combines country + countryCode)
 * - Caches result per IP for 24 hours to reduce external load
 * - Explicit timeout and retry controls
 */
class EnrichPengunjungGeolocationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 2;
    public int $timeout = 10;
    public int $backoff = 5;

    public function __construct(
        private int $pengunjungId,
        private string $ipAddress
    ) {}

    public function handle(): void
    {
        $cacheKey = 'geo:' . md5($this->ipAddress);

        // Check cache first
        $geo = Cache::remember($cacheKey, now()->addHours(24), function () {
            return $this->lookupGeo($this->ipAddress);
        });

        if (!$geo) {
            return;
        }

        Pengunjung::where('id', $this->pengunjungId)->update([
            'negara' => $geo['country'] ?? 'Unknown',
            'kode_negara' => $geo['countryCode'] ?? 'XX',
        ]);
    }

    /**
     * Single combined geolocation lookup with timeout and error handling.
     */
    private function lookupGeo(string $ip): ?array
    {
        // Localhost / development
        if (in_array($ip, ['127.0.0.1', '::1', 'localhost'])) {
            return [
                'country' => 'Indonesia',
                'countryCode' => 'ID',
            ];
        }

        try {
            $response = Http::timeout(3)
                ->retry(1, 500)
                ->get("http://ip-api.com/json/{$ip}", [
                    'fields' => 'country,countryCode',
                    'lang' => 'id',
                ]);

            if ($response->successful()) {
                $data = $response->json();
                return [
                    'country' => $data['country'] ?? 'Unknown',
                    'countryCode' => $data['countryCode'] ?? 'XX',
                ];
            }
        } catch (\Throwable $e) {
            Log::warning("Geolocation lookup failed for IP {$ip}: " . $e->getMessage());
        }

        return [
            'country' => 'Unknown',
            'countryCode' => 'XX',
        ];
    }
}
