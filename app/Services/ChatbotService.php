<?php

namespace App\Services;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use App\Services\AI\AIManager;
use Exception;
use Illuminate\Support\Facades\Log;

class ChatbotService
{
    private AIManager $aiManager;
    private $maxTokens;
    private $temperature;

    public function __construct(AIManager $aiManager)
    {
        $this->aiManager = $aiManager;
        $this->maxTokens = config('chatbot.max_tokens', 2000);
        $this->temperature = config('chatbot.temperature', 0.7);
    }

    /**
     * Get available AI providers for the public chatbot.
     */
    public function getAvailableProviders(): array
    {
        $allStatus = $this->aiManager->getProviderStatus();
        $providers = [];

        $labels = [
            'github'  => ['name' => 'GitHub AI',  'icon' => 'fab fa-github',    'color' => '#8B5CF6', 'badge' => 'GRATIS'],
            'openai'  => ['name' => 'OpenAI',     'icon' => 'fas fa-brain',     'color' => '#10B981', 'badge' => null],
            'claude'  => ['name' => 'Claude',      'icon' => 'fas fa-robot',     'color' => '#F59E0B', 'badge' => null],
            'ollama'  => ['name' => 'Ollama',      'icon' => 'fas fa-server',    'color' => '#3B82F6', 'badge' => 'LOKAL'],
            'n8n'     => ['name' => 'n8n',         'icon' => 'fas fa-project-diagram', 'color' => '#EF4444', 'badge' => null],
        ];

        foreach ($allStatus as $key => $status) {
            $label = $labels[$key] ?? ['name' => ucfirst($key), 'icon' => 'fas fa-microchip', 'color' => '#6B7280', 'badge' => null];
            $providers[$key] = [
                'name'      => $label['name'],
                'model'     => $status['model'] ?? 'unknown',
                'available' => $status['available'] ?? false,
                'icon'      => $label['icon'],
                'color'     => $label['color'],
                'badge'     => $label['badge'],
            ];
        }

        return $providers;
    }

    /**
     * Kirim pesan dan dapatkan respons dari AI (multi-provider).
     *
     * @param ChatSession $session
     * @param string $userMessage
     * @param string|null $provider  Provider key (github, openai, claude, ollama, n8n)
     * @param string|null $customApiKey  Opsional: API key milik user sendiri
     */
    public function sendMessage(ChatSession $session, string $userMessage, ?string $provider = null, ?string $customApiKey = null): ?ChatMessage
    {
        $providerKey = $provider ?: config('ai.default', 'github');

        try {
            // Simpan user message
            $userMsg = ChatMessage::create([
                'chat_session_id' => $session->id,
                'role' => 'user',
                'content' => $userMessage,
                'message_type' => 'text',
                'metadata' => ['provider' => $providerKey],
            ]);

            // Build conversation history
            $messages = $this->buildMessageHistory($session, $userMessage);

            // Build options
            $options = [
                'provider'   => $providerKey,
                'max_tokens' => $this->maxTokens,
                'temperature'=> $this->temperature,
                'no_cache'   => true, // chat should not be cached
            ];

            // If user provided their own API key, temporarily override
            if ($customApiKey) {
                $options['custom_api_key'] = $customApiKey;
            }

            // Call AI via AIManager (with automatic fallback)
            $result = $this->aiManager->chat($messages, $options);

            $assistantContent = $result['content'] ?? null;
            $tokensUsed = $result['tokens'] ?? 0;
            $modelUsed = $result['model'] ?? $providerKey;
            $actualProvider = $result['fallback'] ?? false
                ? ($result['original_provider'] ?? $providerKey) . ' → fallback'
                : $providerKey;

            if (!$assistantContent) {
                throw new Exception('Empty response from AI provider: ' . $providerKey);
            }

            // Simpan assistant message
            $assistantMsg = ChatMessage::create([
                'chat_session_id' => $session->id,
                'role' => 'assistant',
                'content' => $assistantContent,
                'message_type' => 'text',
                'tokens_used' => $tokensUsed,
                'metadata' => [
                    'model'     => $modelUsed,
                    'provider'  => $actualProvider,
                    'tokens'    => $tokensUsed,
                    'fallback'  => $result['fallback'] ?? false,
                ],
            ]);

            // Update session stats
            $session->increment('message_count', 2);
            $session->increment('total_tokens_used', $tokensUsed);

            // Update session title jika masih default (hanya message pertama)
            if ($session->message_count === 2) {
                $preview = substr($userMessage, 0, 50);
                $session->update(['title' => $preview . (strlen($userMessage) > 50 ? '...' : '')]);
            }

            return $assistantMsg;

        } catch (Exception $e) {
            Log::error('Chatbot Multi-AI Error: ' . $e->getMessage(), [
                'session_id' => $session->id,
                'provider' => $providerKey,
                'user_message' => $userMessage,
            ]);

            // Create error message
            return ChatMessage::create([
                'chat_session_id' => $session->id,
                'role' => 'assistant',
                'content' => "Maaf, terjadi kesalahan saat menghubungi **{$providerKey}**. Silakan coba provider lain atau coba lagi nanti.",
                'message_type' => 'error',
                'metadata' => [
                    'error' => $e->getMessage(),
                    'provider' => $providerKey,
                ],
            ]);
        }
    }

    /**
     * Build message history untuk context
     */
    private function buildMessageHistory(ChatSession $session, string $newMessage): array
    {
        $messages = [];

        // System prompt / context
        $systemPrompt = $this->getSystemPrompt($session);
        $messages[] = ['role' => 'system', 'content' => $systemPrompt];

        // Get last 10 messages untuk context (token efficiency)
        $previousMessages = $session->messages()
            ->whereIn('role', ['user', 'assistant'])
            ->latest('created_at')
            ->limit(10)
            ->reverse()
            ->get();

        foreach ($previousMessages as $msg) {
            $messages[] = [
                'role' => $msg->role,
                'content' => $msg->content,
            ];
        }

        // New message
        $messages[] = ['role' => 'user', 'content' => $newMessage];

        return $messages;
    }

    /**
     * Get system prompt dengan knowledge base KVT Hub
     */
    private function getSystemPrompt(ChatSession $session): string
    {
        $contextInfo = $session->context ?? $this->getDefaultContext();
        $dynamicInfo = $this->getDynamicPlatformInfo();

        return <<<PROMPT
Kamu adalah **Kuro** 🐱, maskot & asisten AI untuk KVT Hub — platform ekosistem pendidikan digital global.
Nama "Kuro" berasal dari bahasa Jepang yang berarti "hitam". Kamu ramah, cerdas, dan suka menggunakan emoji.

## Informasi KVT Hub:
{$contextInfo}

## Data Dinamis Platform:
{$dynamicInfo}

## Kepribadian & Gaya:
- Gunakan Bahasa Indonesia yang santai tapi sopan
- Selalu mulai dengan menyapa jika ini pesan pertama
- Gunakan emoji secukupnya untuk membuat percakapan hidup 🎉
- Jawab dengan format terstruktur (poin-poin, bold, heading) agar mudah dibaca
- Jika ditanya tentang hal di luar KVT Hub, jawab secukupnya lalu hubungkan ke fitur platform
- Jika pengguna menyebutkan konteks halaman, berikan jawaban yang relevan dengan halaman tersebut
- Jika ada pertanyaan teknis, berikan jawaban detail dengan code snippet jika perlu
- Gunakan markdown: **bold**, *italic*, `code`, ```codeblock```, - list

## Batasan:
- Jangan membuat data palsu — jika tidak yakin, katakan jujur
- Jangan memberikan informasi kontak pribadi
- Jika pertanyaan tidak relevan, arahkan ke fitur Bantuan atau Kotak Saran
PROMPT;
    }

    /**
     * Get dynamic platform info (cached for 1 hour)
     */
    private function getDynamicPlatformInfo(): string
    {
        return cache()->remember('chatbot_dynamic_info', 3600, function () {
            $info = [];

            // User stats
            $userCount = \App\Models\User::count();
            if ($userCount) {
                $info[] = "- Total pengguna terdaftar: {$userCount}";
            }

            // Kelas stats
            if (class_exists(\App\Models\Kelas::class)) {
                $kelasCount = \App\Models\Kelas::count();
                if ($kelasCount) {
                    $info[] = "- Total kelas tersedia: {$kelasCount}";
                }
            }

            // Materi stats
            if (class_exists(\App\Models\Materi::class)) {
                $materiCount = \App\Models\Materi::count();
                if ($materiCount) {
                    $info[] = "- Total materi pembelajaran: {$materiCount}";
                }
            }

            // Edukasi gratis stats
            if (class_exists(\App\Models\EdukasiGratis::class)) {
                $edukasiCount = \App\Models\EdukasiGratis::count();
                if ($edukasiCount) {
                    $info[] = "- Program edukasi gratis: {$edukasiCount}";
                }
            }

            // Berita stats
            if (class_exists(\App\Models\Berita::class)) {
                $beritaCount = \App\Models\Berita::count();
                if ($beritaCount) {
                    $info[] = "- Total berita & artikel: {$beritaCount}";
                }
            }

            return implode("\n", $info) ?: '- Platform dalam pengembangan aktif';
        });
    }

    /**
     * Get default context knowledge base
     */
    private function getDefaultContext(): string
    {
        return <<<CONTEXT
### Tentang KVT Hub
KVT Hub (Kuro Virtual Technology Hub) adalah platform ekosistem pendidikan digital global yang menghubungkan siswa, guru, orang tua, dan institusi dalam satu platform terpadu. Didirikan oleh tim KVT dengan visi mewujudkan pendidikan berkualitas yang dapat diakses semua orang.

### Fitur Utama:
- **174+ Halaman** konten pendidikan lengkap
- **13 Jenjang Pendidikan** — TK/PAUD, SD/MI, SMP/MTs, SMA/MA, SMK (3 jurusan), Diploma, S1, S2, S3/PhD, Post-Doctoral, Profesi
- **7 Peran Pengguna** — Siswa/Mahasiswa, Guru/Pengajar, Orang Tua/Wali, Staff, Admin, Alumni, Pengunjung
- **100+ Menu** navigasi ekosistem
- **Gamifikasi RPG** — 100 level, XP, achievement, leaderboard global
- **Music Streaming** — 5 stasiun (Lo-Fi, Jazz, Deep House, Ambient, Classical)
- **Diagram Builder** — 50+ jenis diagram interaktif
- **Edukasi Gratis** — 500+ kursus & tools gratis (GitHub Pro, JetBrains, Figma, Azure, AWS)
- **Export** — 5 format (Excel, PDF, Word, CSV, PowerPoint)
- **GitHub API** — integrasi langsung dengan repository
- **LED Dot Matrix** — Display panel waktu shalat, jam dunia, motivasi
- **AI VTuber Assistant** — Kuro AI chatbot (aku!)
- **Code Executor** — Jalankan kode langsung di browser (Python, JavaScript, PHP, dll)
- **Kuis** — Sistem kuis interaktif per materi
- **KRS (Kartu Rencana Studi)** — Perencanaan studi digital
- **Jurnal Mengajar** — Pencatatan aktivitas mengajar
- **Kehadiran** — Sistem absensi digital
- **Nilai & Rapor** — Pencatatan dan pelaporan nilai
- **Laporan Akademik** — Report bulanan dan semester

### Halaman & Menu:
**Navigasi Utama:**
- Beranda — Landing page dengan statistik platform, fitur unggulan, dan testimonial
- Jenjang — Pilih dari 13 jenjang pendidikan (TK sampai Post-Doctoral)
- Platform — Semua fitur unggulan platform
- Tentang — Profil KVT Hub, tim, visi misi
- Karir — 2.000+ lowongan kerja, AI Resume Builder, Career Matching
- Komunitas — 50.000+ anggota, forum diskusi, 300+ mentor
- Sertifikasi — 120+ program sertifikat profesional
- Langganan — Paket Gratis / Premium (Rp 99K/bln) / Enterprise
- Bantuan — FAQ, customer support, panduan lengkap

**Fitur Akademik:**
- Kelas — Manajemen kelas dan siswa
- Materi — Media pembelajaran multimedia
- Kuis — Evaluasi interaktif
- Rapor — Penilaian dan pelaporan
- KRS — Kartu rencana studi
- Jurnal Mengajar — Catatan pengajaran hariannya

**Fitur Khusus:**
- Beasiswa — 5 jenis (Prestasi, Ekonomi, Riset, Internasional, Tech Talent)
- Magang — 200+ perusahaan partner, 3-6 bulan
- Riset — 500+ publikasi, 80+ mitra, dana riset Rp 50jt
- Webinar — Live streaming HD, arsip 500+ video
- Lab Virtual — 80+ lab interaktif (Coding, Sains, Data Science, AI)
- Podcast — 200+ episode, topik pendidikan & teknologi

**Pengaturan & Tools:**
- Tema — 4 gaya header, 6 warna, 3 background
- Efek Visual — Animasi salju & scroll
- LED Panel — 5 mode display
- Bahasa — 6 bahasa (ID, EN, JP, KR, ZH, AR)
- Musik — 5 stasiun streaming
- Screenshot — Full page & area
- Rekam Layar — Dengan audio
- Sketsa — Whiteboard mode
- Kamera — Foto & dokumen scan

### Info Teknis:
- **Framework:** Laravel 12 (PHP 8.2+)
- **Database:** PostgreSQL
- **Frontend:** Tailwind CSS 4, Alpine.js
- **API:** OpenAI GPT-4o-mini, GitHub API
- **Hosting:** Cloud-based dengan CDN
- **Keamanan:** AES-256 enkripsi, SSL/TLS, GDPR compliant, 2FA
- **Versi:** v8.0

### Cara Mendaftar:
1. Klik tombol "Daftar" di pojok kanan atas
2. Isi data: nama lengkap, email, password
3. Pilih peran (Siswa, Guru, Orang Tua, dll)
4. Pilih jenjang pendidikan (untuk Siswa/Guru)
5. Verifikasi email
6. Login dan mulai belajar!

### Cara Login:
1. Klik "Masuk" di kanan atas
2. Masukkan email dan password
3. Klik Login
4. Lupa password? Klik "Lupa Password" untuk reset via email
CONTEXT;
    }

    /**
     * Get chat history untuk display
     */
    public function getHistory(ChatSession $session, int $limit = 50): array
    {
        return $session->messages()
            ->latest('created_at')
            ->limit($limit)
            ->reverse()
            ->get()
            ->map(fn($msg) => [
                'id' => $msg->id,
                'role' => $msg->role,
                'content' => $msg->content,
                'type' => $msg->message_type,
                'timestamp' => $msg->created_at,
                'rating' => $msg->getAverageRating(),
            ])
            ->toArray();
    }

    /**
     * Archive session
     */
    public function archiveSession(ChatSession $session): bool
    {
        return $session->update(['status' => 'archived']);
    }

    /**
     * Delete session
     */
    public function deleteSession(ChatSession $session): bool
    {
        return $session->delete();
    }
}
