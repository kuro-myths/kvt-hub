@extends('tata-letak.utama')

@section('judul', 'AI Chatbot - KVT Hub')

@section('konten')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 p-4 md:p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-white mb-2 flex items-center gap-3">
                <i class="fas fa-robot text-violet-400"></i>
                AI Chatbot Assistant
            </h1>
            <p class="text-slate-300">Dapatkan bantuan instan dari AI Assistant kami yang didukung oleh OpenAI</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Sidebar: Chat History -->
            <div class="lg:col-span-1">
                <div class="bg-slate-800/50 backdrop-blur border border-slate-700 rounded-xl p-4 h-fit">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-bold text-white">Chat History</h2>
                        <button id="newChatBtn" class="btn btn-sm btn-outline btn-primary">
                            <i class="fas fa-plus"></i> Baru
                        </button>
                    </div>

                    <div id="chatList" class="space-y-2 max-h-96 overflow-y-auto">
                        @forelse($sessions as $session)
                            <a href="{{ route('chat.show', $session->id) }}" 
                               class="block p-3 rounded-lg bg-slate-700/50 hover:bg-slate-600 transition text-slate-200 text-sm truncate">
                                <div class="font-semibold truncate">{{ $session->title }}</div>
                                <div class="text-xs text-slate-400 mt-1">
                                    {{ $session->created_at->diffForHumans() }}
                                </div>
                            </a>
                        @empty
                            <p class="text-slate-400 text-sm text-center py-4">Belum ada chat</p>
                        @endforelse
                    </div>

                    <div class="mt-4 pt-4 border-t border-slate-700">
                        <div class="text-xs text-slate-400">
                            <p>📊 Total Tokens: <strong id="totalTokens">0</strong></p>
                            <p>💰 Est. Cost: <strong id="totalCost">$0.00</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Chat Area -->
            <div class="lg:col-span-2">
                <div id="chatContainer" class="bg-slate-800/50 backdrop-blur border border-slate-700 rounded-xl p-6 h-fit min-h-96">
                    <div class="text-center py-12">
                        <i class="fas fa-comments text-6xl text-violet-400 mb-4 inline-block"></i>
                        <h3 class="text-2xl font-bold text-white mb-2">Mulai Percakapan Baru</h3>
                        <p class="text-slate-300 mb-6">Tanyakan apa saja tentang KVT Hub, pendidikan, atau karir Anda</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <button class="suggestion-btn p-3 rounded-lg bg-slate-700/50 hover:bg-violet-600/50 text-slate-200 text-sm transition" 
                                    data-prompt="Apa saja fitur unggulan KVT Hub?">
                                <i class="fas fa-star text-yellow-400 mb-2"></i>
                                <div>Fitur Unggulan</div>
                            </button>
                            <button class="suggestion-btn p-3 rounded-lg bg-slate-700/50 hover:bg-violet-600/50 text-slate-200 text-sm transition" 
                                    data-prompt="Bagaimana cara mendaftar dan memulai belajar?">
                                <i class="fas fa-graduation-cap text-blue-400 mb-2"></i>
                                <div>Panduan Belajar</div>
                            </button>
                            <button class="suggestion-btn p-3 rounded-lg bg-slate-700/50 hover:bg-violet-600/50 text-slate-200 text-sm transition" 
                                    data-prompt="Apa itu KVT Hub dan bagaimana visinya?">
                                <i class="fas fa-info-circle text-green-400 mb-2"></i>
                                <div>Tentang KVT Hub</div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Input Area -->
                <div class="mt-4 bg-slate-800/50 backdrop-blur border border-slate-700 rounded-xl p-4">
                    <div class="flex gap-2">
                        <textarea id="messageInput" placeholder="Ketik pertanyaan Anda..." 
                                  class="flex-1 bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-white placeholder-slate-400 focus:outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-500/50 resize-none" 
                                  rows="3"></textarea>
                        <button id="sendBtn" class="btn btn-primary h-auto" disabled>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let currentSessionId = null;
    let isLoading = false;

    document.getElementById('newChatBtn').addEventListener('click', createNewChat);
    document.getElementById('sendBtn').addEventListener('click', sendMessage);
    document.getElementById('messageInput').addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && e.ctrlKey) sendMessage();
    });

    document.querySelectorAll('.suggestion-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('messageInput').value = btn.dataset.prompt;
            document.getElementById('messageInput').focus();
        });
    });

    async function createNewChat() {
        try {
            const response = await fetch('{{ route("chat.create") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            });
            const data = await response.json();
            if (data.success) {
                currentSessionId = data.session.id;
                document.getElementById('chatContainer').innerHTML = '';
                document.getElementById('messageInput').value = '';
                updateChatHistory();
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Gagal membuat chat baru');
        }
    }

    async function sendMessage() {
        if (!currentSessionId) {
            await createNewChat();
        }

        const message = document.getElementById('messageInput').value.trim();
        if (!message || isLoading) return;

        isLoading = true;
        document.getElementById('sendBtn').disabled = true;

        try {
            // Add user message to UI
            addMessageToUI('user', message);
            document.getElementById('messageInput').value = '';

            // Send to API
            const response = await fetch(`{{ route('chat.send', '') }}/${currentSessionId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ message }),
            });

            const data = await response.json();
            if (data.success) {
                addMessageToUI('assistant', data.message.content, data.message.id);
                updateTokenStats(data.session);
            } else {
                addMessageToUI('error', data.error || 'Terjadi kesalahan');
            }
        } catch (error) {
            console.error('Error:', error);
            addMessageToUI('error', 'Gagal mengirim pesan');
        } finally {
            isLoading = false;
            document.getElementById('sendBtn').disabled = false;
        }
    }

    function addMessageToUI(role, content, messageId = null) {
        const container = document.getElementById('chatContainer');
        
        // Replace placeholder content if still there
        if (container.innerHTML.includes('Mulai Percakapan Baru')) {
            container.innerHTML = '';
        }

        const messageEl = document.createElement('div');
        messageEl.className = `mb-4 ${role === 'user' ? 'text-right' : ''}`;
        
        const bubbleClass = role === 'user' 
            ? 'bg-violet-600 text-white'
            : role === 'error'
            ? 'bg-red-600 text-white'
            : 'bg-slate-700 text-slate-100';

        messageEl.innerHTML = `
            <div class="inline-block max-w-md px-4 py-2 rounded-lg ${bubbleClass}">
                <p class="text-sm">${escapeHtml(content)}</p>
                ${messageId && role !== 'user' ? `
                    <div class="text-xs mt-2 flex gap-2">
                        <button class="feedback-btn opacity-50 hover:opacity-100" data-message-id="${messageId}" data-rating="1">
                            👎
                        </button>
                        <button class="feedback-btn opacity-50 hover:opacity-100" data-message-id="${messageId}" data-rating="5">
                            👍
                        </button>
                    </div>
                ` : ''}
            </div>
        `;
        
        container.appendChild(messageEl);
        container.parentElement.scrollTop = container.parentElement.scrollHeight;

        // Add feedback handlers
        messageEl.querySelectorAll('.feedback-btn').forEach(btn => {
            btn.addEventListener('click', addFeedback);
        });
    }

    async function addFeedback(e) {
        const messageId = e.currentTarget.dataset.messageId;
        const rating = parseInt(e.currentTarget.dataset.rating);
        
        try {
            await fetch(`{{ route('chat.feedback', '') }}/${messageId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ rating }),
            });
            e.currentTarget.parentElement.innerHTML = '✓ Terima kasih!';
        } catch (error) {
            console.error('Error:', error);
        }
    }

    function updateTokenStats(sessionData) {
        document.getElementById('totalTokens').textContent = sessionData.tokens_used;
        document.getElementById('totalCost').textContent = '$' + sessionData.api_cost.toFixed(4);
    }

    async function updateChatHistory() {
        try {
            const response = await fetch('{{ route("chat.sessions") }}');
            const data = await response.json();
            // Update sidebar with new sessions
        } catch (error) {
            console.error('Error:', error);
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
</script>
@endpush

@push('styles')
<style>
    #chatContainer {
        display: flex;
        flex-direction: column;
    }
</style>
@endpush
@endsection
