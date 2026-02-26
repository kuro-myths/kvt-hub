<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\ChatMessage;
use App\Models\ChatFeedback;
use App\Services\ChatbotService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatController extends Controller
{
    protected $chatbotService;

    public function __construct(ChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    /**
     * Index - Halaman chat utama
     */
    public function index()
    {
        $sessions = auth()->check() 
            ? auth()->user()->chatSessions()->where('status', 'active')->latest()->get()
            : [];

        return view('chat.index', compact('sessions'));
    }

    /**
     * Create new chat session (for both auth & guest)
     */
    public function create(): JsonResponse
    {
        $session = ChatSession::createSession(
            userId: auth()->id(),
            title: 'Chat - ' . now()->format('d M Y H:i')
        );

        return response()->json([
            'success' => true,
            'session' => [
                'id' => $session->id,
                'token' => $session->session_token,
                'title' => $session->title,
            ],
        ]);
    }

    /**
     * Create or get guest session (untuk floating widget)
     */
    public function guestSession(Request $request): JsonResponse
    {
        $token = $request->input('token');

        // Jika token sudah ada, ambil session yang existing
        if ($token) {
            $session = ChatSession::where('session_token', $token)
                ->where('status', 'active')
                ->first();

            if ($session) {
                return response()->json([
                    'success' => true,
                    'session' => [
                        'id' => $session->id,
                        'token' => $session->session_token,
                        'isExisting' => true,
                    ],
                ]);
            }
        }

        // Create new session untuk guest
        $session = ChatSession::createSession(
            userId: auth()->id() ?? null,
            title: 'Chat - ' . now()->format('d M Y H:i')
        );

        return response()->json([
            'success' => true,
            'session' => [
                'id' => $session->id,
                'token' => $session->session_token,
                'isExisting' => false,
            ],
        ]);
    }

    /**
     * Get chat session dengan messages
     */
    public function show(ChatSession $session)
    {
        // Authorize
        if (auth()->check() && $session->user_id !== auth()->id() && !auth()->user()->adalahAdmin()) {
            abort(403, 'Unauthorized');
        }

        $messages = $this->chatbotService->getHistory($session);

        if (request()->expectsJson()) {
            return response()->json([
                'session' => [
                    'id' => $session->id,
                    'title' => $session->title,
                    'created_at' => $session->created_at,
                    'message_count' => $session->message_count,
                    'tokens_used' => $session->total_tokens_used,
                    'api_cost' => $session->api_cost,
                ],
                'messages' => $messages,
            ]);
        }

        return view('chat.show', compact('session', 'messages'));
    }

    /**
     * Send message - API endpoint
     */
    public function sendMessage(Request $request, ChatSession $session): JsonResponse
    {
        // Validate
        $validated = $request->validate([
            'message' => 'required|string|min:1|max:5000',
        ]);

        // Authorize
        if (auth()->check() && $session->user_id !== auth()->id() && !auth()->user()->adalahAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Check if session is active
        if ($session->status !== 'active') {
            return response()->json(['error' => 'Session tidak aktif'], 400);
        }

        // Call chatbot service
        $response = $this->chatbotService->sendMessage($session, $validated['message']);

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $response->id,
                'role' => $response->role,
                'content' => $response->content,
                'type' => $response->message_type,
                'timestamp' => $response->created_at,
            ],
            'session' => [
                'tokens_used' => $session->total_tokens_used,
                'api_cost' => $session->api_cost,
            ],
        ]);
    }

    /**
     * Add feedback untuk message
     */
    public function addFeedback(Request $request, ChatMessage $message): JsonResponse
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'feedback_type' => 'nullable|in:helpful,unhelpful,inaccurate,harmful,other',
            'comment' => 'nullable|string|max:1000',
        ]);

        $feedback = ChatFeedback::create([
            'chat_message_id' => $message->id,
            'user_id' => auth()->id(),
            'rating' => $validated['rating'],
            'feedback_type' => $validated['feedback_type'] ?? null,
            'comment' => $validated['comment'] ?? null,
            'is_anonymous' => !auth()->check(),
        ]);

        return response()->json([
            'success' => true,
            'feedback' => [
                'id' => $feedback->id,
                'rating' => $feedback->rating,
                'rating_label' => $feedback->getRatingLabel(),
            ],
        ]);
    }

    /**
     * List all sessions (for logged in user)
     */
    public function listSessions(): JsonResponse
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $sessions = auth()->user()->chatSessions()
            ->where('status', '!=', 'deleted')
            ->latest()
            ->get()
            ->map(fn($s) => [
                'id' => $s->id,
                'title' => $s->title,
                'message_count' => $s->message_count,
                'created_at' => $s->created_at->format('d M Y H:i'),
                'status' => $s->status,
            ]);

        return response()->json([
            'sessions' => $sessions,
        ]);
    }

    /**
     * Archive chat session
     */
    public function archive(ChatSession $session): JsonResponse
    {
        // Authorize
        if (auth()->check() && $session->user_id !== auth()->id() && !auth()->user()->adalahAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $this->chatbotService->archiveSession($session);

        return response()->json(['success' => true]);
    }

    /**
     * Delete chat session
     */
    public function delete(ChatSession $session): JsonResponse
    {
        // Authorize
        if (auth()->check() && $session->user_id !== auth()->id() && !auth()->user()->adalahAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $this->chatbotService->deleteSession($session);

        return response()->json(['success' => true]);
    }

    /**
     * Send message - untuk floating widget (public + guest)
     */
    public function floatingWidgetSend(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|min:1|max:5000',
            'session_id' => 'required|integer',
            'session_token' => 'required|string',
        ]);

        $session = ChatSession::where('id', $validated['session_id'])
            ->where('session_token', $validated['session_token'])
            ->where('status', 'active')
            ->first();

        if (!$session) {
            return response()->json(['error' => 'Session tidak ditemukan'], 400);
        }

        // Verify user (jika authenticated)
        if (auth()->check() && $session->user_id && $session->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Send message
        $response = $this->chatbotService->sendMessage($session, $validated['message']);

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $response->id,
                'role' => $response->role,
                'content' => $response->content,
                'type' => $response->message_type,
            ],
        ]);
    }
}
