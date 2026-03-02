<?php

namespace App\Services\AI\Contracts;

/**
 * Interface AIProviderInterface
 *
 * Kontrak dasar untuk semua AI provider di Kuro Nexus.
 * Setiap provider (OpenAI, Claude, n8n, Ollama) HARUS mengimplementasikan ini.
 */
interface AIProviderInterface
{
    /**
     * Kirim pesan chat dan dapatkan respons AI.
     *
     * @param array $messages Array of ['role' => 'user|assistant|system', 'content' => '...']
     * @param array $options Extra options (temperature, max_tokens, dll)
     * @return array ['content' => string, 'tokens' => int, 'model' => string, 'metadata' => array]
     */
    public function chat(array $messages, array $options = []): array;

    /**
     * Completion — kirim prompt tunggal, dapatkan respons.
     */
    public function complete(string $prompt, array $options = []): array;

    /**
     * Cek apakah provider tersedia dan terautentikasi.
     */
    public function isAvailable(): bool;

    /**
     * Dapatkan nama provider.
     */
    public function getName(): string;

    /**
     * Dapatkan model yang digunakan.
     */
    public function getModel(): string;

    /**
     * Dapatkan info estimasi biaya dari terakhir request.
     */
    public function getLastCost(): float;
}
