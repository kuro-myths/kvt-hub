@extends('tata-letak.utama')

@section('judul', 'Chat: ' . $session->title)

@section('konten')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 p-4 md:p-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <a href="{{ route('chat.index') }}" class="text-violet-400 hover:text-violet-300 mb-2 inline-flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <h1 class="text-3xl font-bold text-white">{{ $session->title }}</h1>
                <p class="text-slate-400 text-sm mt-1">Dibuat {{ $session->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex gap-2">
                <button id="archiveBtn" class="btn btn-sm btn-outline" title="Archive">
                    <i class="fas fa-archive"></i>
                </button>
                <button id="deleteBtn" class="btn btn-sm btn-outline btn-error" title="Delete">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>

        <!-- Chat Messages -->
        <div class="bg-slate-800/50 backdrop-blur border border-slate-700 rounded-xl p-6 mb-4 h-96 overflow-y-auto" id="messagesContainer">
            @forelse($messages as $msg)
                <div class="mb-4 {{ $msg['role'] === 'user' ? 'text-right' : '' }}">
                    <div class="inline-block max-w-2xl px-4 py-2 rounded-lg {{ $msg['role'] === 'user' ? 'bg-violet-600 text-white' : 'bg-slate-700 text-slate-100' }}">
                        <p class="text-sm">{{ $msg['content'] }}</p>
                        <div class="text-xs mt-2 opacity-70">
                            {{ $msg['timestamp']->format('H:i') }}
                            @if($msg['role'] !== 'user' && $msg['rating'])
                                • ⭐ {{ $msg['rating'] }}/5
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <p class="text-slate-400">Belum ada pesan</p>
                </div>
            @endforelse
        </div>

        <!-- Input Area -->
        <div class="bg-slate-800/50 backdrop-blur border border-slate-700 rounded-xl p-4">
            <div class="flex gap-2">
                <textarea id="messageInput" placeholder="Ketik pertanyaan Anda..." 
                          class="flex-1 bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-white placeholder-slate-400 focus:outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-500/50 resize-none" 
                          rows="3"></textarea>
                <button id="sendBtn" class="btn btn-primary h-auto">
                    <i class="fas fa-paper-plane"></i> Kirim
                </button>
            </div>
        </div>

        <!-- Stats -->
        <div class="mt-4 grid grid-cols-3 gap-4">
            <div class="bg-slate-800/50 backdrop-blur border border-slate-700 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-violet-400">{{ $session->message_count }}</div>
                <div class="text-slate-400 text-sm">Pesan</div>
            </div>
            <div class="bg-slate-800/50 backdrop-blur border border-slate-700 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-blue-400">{{ $session->total_tokens_used }}</div>
                <div class="text-slate-400 text-sm">Tokens</div>
            </div>
            <div class="bg-slate-800/50 backdrop-blur border border-slate-700 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-green-400">${{ number_format($session->api_cost, 4) }}</div>
                <div class="text-slate-400 text-sm">Est. Cost</div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const sessionId = {{ $session->id }};

    document.getElementById('sendBtn').addEventListener('click', sendMessage);
    document.getElementById('messageInput').addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && e.ctrlKey) sendMessage();
    });
    document.getElementById('archiveBtn').addEventListener('click', archiveSession);
    document.getElementById('deleteBtn').addEventListener('click', deleteSession);

    async function sendMessage() {
        const message = document.getElementById('messageInput').value.trim();
        if (!message) return;

        document.getElementById('sendBtn').disabled = true;

        try {
            addMessageToUI('user', message);
            document.getElementById('messageInput').value = '';

            const response = await fetch(`/chat/${sessionId}/send`, {
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
                location.reload(); // Refresh untuk update stats
            } else {
                addMessageToUI('error', data.error);
            }
        } catch (error) {
            console.error('Error:', error);
            addMessageToUI('error', 'Gagal mengirim pesan');
        } finally {
            document.getElementById('sendBtn').disabled = false;
        }
    }

    function addMessageToUI(role, content, messageId = null) {
        const container = document.getElementById('messagesContainer');
        const messageEl = document.createElement('div');
        messageEl.className = `mb-4 ${role === 'user' ? 'text-right' : ''}`;
        
        const bubbleClass = role === 'user' 
            ? 'bg-violet-600 text-white'
            : role === 'error'
            ? 'bg-red-600 text-white'
            : 'bg-slate-700 text-slate-100';

        messageEl.innerHTML = `
            <div class="inline-block max-w-2xl px-4 py-2 rounded-lg ${bubbleClass}">
                <p class="text-sm">${escapeHtml(content)}</p>
                <div class="text-xs mt-2 opacity-70">Sekarang</div>
            </div>
        `;
        
        container.appendChild(messageEl);
        container.scrollTop = container.scrollHeight;
    }

    async function archiveSession() {
        if (confirm('Yakin ingin mengarsipkan chat ini?')) {
            try {
                const response = await fetch(`/chat/${sessionId}/archive`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                });
                const data = await response.json();
                if (data.success) {
                    window.location.href = '{{ route("chat.index") }}';
                }
            } catch (error) {
                alert('Gagal mengarsipkan');
            }
        }
    }

    async function deleteSession() {
        if (confirm('Yakin ingin menghapus chat ini? Tindakan ini tidak dapat dibatalkan.')) {
            try {
                const response = await fetch(`/chat/${sessionId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                });
                const data = await response.json();
                if (data.success) {
                    window.location.href = '{{ route("chat.index") }}';
                }
            } catch (error) {
                alert('Gagal menghapus');
            }
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
</script>
@endpush
@endsection
