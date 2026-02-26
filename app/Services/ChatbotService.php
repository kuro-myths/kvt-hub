<?php

namespace App\Services;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use OpenAI\Laravel\Facades\OpenAI;
use Exception;
use Illuminate\Support\Facades\Log;

class ChatbotService
{
    private $model;
    private $maxTokens;
    private $temperature;

    public function __construct()
    {
        $this->model = config('chatbot.model', 'gpt-4o-mini');
        $this->maxTokens = config('chatbot.max_tokens', 2000);
        $this->temperature = config('chatbot.temperature', 0.7);
    }

    /**
     * Kirim pesan dan dapatkan respons dari OpenAI
     */
    public function sendMessage(ChatSession $session, string $userMessage): ?ChatMessage
    {
        try {
            // Simpan user message
            $userMsg = ChatMessage::create([
                'chat_session_id' => $session->id,
                'role' => 'user',
                'content' => $userMessage,
                'message_type' => 'text',
            ]);

            // Build conversation history
            $messages = $this->buildMessageHistory($session, $userMessage);

            // Call OpenAI API
            $response = OpenAI::chat()->create([
                'model' => $this->model,
                'messages' => $messages,
                'max_tokens' => $this->maxTokens,
                'temperature' => $this->temperature,
            ]);

            // Extract response
            $assistantContent = $response?->choices[0]?->message?->content;
            $tokensUsed = $response?->usage?->total_tokens ?? 0;

            if (!$assistantContent) {
                throw new Exception('Empty response from OpenAI');
            }

            // Simpan assistant message
            $assistantMsg = ChatMessage::create([
                'chat_session_id' => $session->id,
                'role' => 'assistant',
                'content' => $assistantContent,
                'message_type' => 'text',
                'tokens_used' => $tokensUsed,
                'metadata' => [
                    'model' => $this->model,
                    'tokens_input' => $response?->usage?->prompt_tokens ?? 0,
                    'tokens_output' => $response?->usage?->completion_tokens ?? 0,
                    'finish_reason' => $response?->choices[0]?->finish_reason,
                ],
            ]);

            // Update session stats
            $session->increment('message_count', 2);
            $session->increment('total_tokens_used', $tokensUsed);

            // Estimate cost (gpt-4o-mini: $0.15 per 1M input tokens, $0.60 per 1M output tokens)
            $inputCost = ($response?->usage?->prompt_tokens ?? 0) * 0.00000015;
            $outputCost = ($response?->usage?->completion_tokens ?? 0) * 0.0000006;
            $session->increment('api_cost', $inputCost + $outputCost);

            // Update session title jika masih default (hanya message pertama)
            if ($session->message_count === 2) {
                $preview = substr($userMessage, 0, 50);
                $session->update(['title' => $preview . (strlen($userMessage) > 50 ? '...' : '')]);
            }

            return $assistantMsg;

        } catch (Exception $e) {
            Log::error('Chatbot Error: ' . $e->getMessage(), [
                'session_id' => $session->id,
                'user_message' => $userMessage,
            ]);

            // Create error message
            return ChatMessage::create([
                'chat_session_id' => $session->id,
                'role' => 'assistant',
                'content' => 'Maaf, terjadi kesalahan saat memproses pertanyaan Anda. Silakan coba lagi.',
                'message_type' => 'error',
                'metadata' => [
                    'error' => $e->getMessage(),
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

        return <<<PROMPT
Anda adalah AI Assistant untuk KVT Hub, platform ekosistem pendidikan digital global.

## Informasi KVT Hub:
{$contextInfo}

## Instruksi:
1. Jawab dalam Bahasa Indonesia yang baik dan formal
2. Fokus pada topik pendidikan, kelas, materi, dan fitur platform
3. Jika ditanya tentang hal di luar KVT Hub, arahkan kembali ke topik platform
4. Berikan jawaban yang terstruktur dan mudah dipahami
5. Gunakan emoji untuk membuat respons lebih menarik
6. Jika tidak tahu jawaban, katakan dengan jujur dan tawarkan bantuan

Bergembira dan profesional dalam setiap respons!
PROMPT;
    }

    /**
     * Get default context knowledge base
     */
    private function getDefaultContext(): string
    {
        return <<<CONTEXT
### Fitur Utama:
- 174+ Halaman konten pendidikan
- 13 Jenjang Pendidikan (TK-S3/PhD)
- 7 Peran Pengguna (Siswa, Guru, Orang Tua, Staff, Admin, Alumni, Eksternal)
- 100+ Menu Ekosistem
- Diagram Builder 50 jenis
- Edukasi Gratis 500+ kursus
- Export 5 Format (Excel, PDF, Word, CSV, PowerPoint)
- GitHub API Integration
- LED Dot Matrix Display
- Loading Screen Modern

### Menu Utama:
- Beranda: Landing page utama
- Jenjang: TK/PAUD, SD, SMP, SMA, SMK, Diploma, S1, S2, S3, PhD
- Platform: Fitur-fitur unggulan
- Tentang: Profil KVT Hub
- Karir: Lowongan dan pengembangan karir
- Komunitas: Forum dan networking
- Sertifikasi: Program sertifikat profesional
- Langganan: Paket premium
- Bantuan: FAQ dan customer support

### Teknologi:
- Framework: Laravel 12
- Database: PostgreSQL
- Frontend: Tailwind CSS, Alpine.js
- API: OpenAI, GitHub API
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
