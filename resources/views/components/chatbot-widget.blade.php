{{-- Floating Chatbot Widget --}}
<div id="chatbotWidget" class="fixed bottom-6 right-6 z-50 font-sans">
    {{-- Chat Bubble Button --}}
    <button id="chatbotToggle" class="bg-gradient-to-br from-violet-500 to-purple-600 hover:from-violet-600 hover:to-purple-700 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg hover:shadow-xl transition-all transform hover:scale-110" title="Open Chat">
        <i class="fas fa-comments text-xl"></i>
    </button>

    {{-- Chat Window --}}
    <div id="chatWindow" class="hidden absolute bottom-20 right-0 w-96 h-96 bg-slate-900 border border-slate-700 rounded-2xl shadow-2xl flex flex-col overflow-hidden backdrop-blur animate-fade-in">
        {{-- Header --}}
        <div class="bg-gradient-to-r from-violet-600 to-purple-600 px-6 py-4 flex items-center justify-between">
            <div>
                <h3 class="text-white font-bold text-lg">AI Assistant</h3>
                <p class="text-violet-100 text-xs">Powered by OpenAI</p>
            </div>
            <button id="chatClose" class="text-white hover:bg-violet-700 p-2 rounded-lg transition">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        {{-- Messages Container --}}
        <div id="chatMessages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-slate-800/50">
            <div class="text-center py-8">
                <i class="fas fa-comments text-4xl text-violet-400 mb-2 inline-block"></i>
                <p class="text-slate-300 text-sm">Mulai percakapan!</p>
                <p class="text-slate-400 text-xs mt-2">Tanyakan tentang KVT Hub atau apapun</p>
            </div>
        </div>

        {{-- Input Area --}}
        <div class="border-t border-slate-700 p-3 bg-slate-800">
            <div class="flex gap-2">
                <input type="text" id="chatInput" placeholder="Ketik pesan..." class="flex-1 bg-slate-700 border border-slate-600 rounded-lg px-3 py-2 text-white placeholder-slate-400 text-sm focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500">
                <button id="chatSend" class="bg-violet-600 hover:bg-violet-700 text-white px-4 py-2 rounded-lg transition">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<style>
    @keyframes fade-in {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fade-in {
        animation: fade-in 0.2s ease-in-out;
    }
</style>

<script>
    let chatWidget = {
        sessionId: null,
        sessionToken: null,
        isLoading: false,

        init: async function() {
            document.getElementById('chatbotToggle').addEventListener('click', () => this.toggle());
            document.getElementById('chatClose').addEventListener('click', () => this.close());
            document.getElementById('chatSend').addEventListener('click', () => this.sendMessage());
            document.getElementById('chatInput').addEventListener('keydown', (e) => {
                if (e.key === 'Enter') this.sendMessage();
            });

            // Initialize session
            await this.initSession();
        },

        toggle: function() {
            const window = document.getElementById('chatWindow');
            window.classList.toggle('hidden');
            if (!window.classList.contains('hidden')) {
                document.getElementById('chatInput').focus();
            }
        },

        close: function() {
            document.getElementById('chatWindow').classList.add('hidden');
        },

        initSession: async function() {
            try {
                const token = localStorage.getItem('chatbot_token');
                const response = await fetch('/api/chat/guest-session', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify({ token: token || null }),
                });

                const data = await response.json();
                if (data.success) {
                    this.sessionId = data.session.id;
                    this.sessionToken = data.session.token;
                    localStorage.setItem('chatbot_token', this.sessionToken);
                }
            } catch (error) {
                console.error('Chat widget init error:', error);
            }
        },

        sendMessage: async function() {
            const input = document.getElementById('chatInput');
            const message = input.value.trim();

            if (!message || this.isLoading || !this.sessionId) return;

            this.isLoading = true;
            document.getElementById('chatSend').disabled = true;

            try {
                // Add user message
                this.addMessage('user', message);
                input.value = '';

                // Send to server
                const response = await fetch('/api/chat/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify({
                        message: message,
                        session_id: this.sessionId,
                        session_token: this.sessionToken,
                    }),
                });

                const data = await response.json();
                if (data.success) {
                    this.addMessage('assistant', data.message.content);
                } else {
                    this.addMessage('error', data.error || 'Terjadi kesalahan');
                }
            } catch (error) {
                console.error('Send error:', error);
                this.addMessage('error', 'Gagal mengirim pesan');
            } finally {
                this.isLoading = false;
                document.getElementById('chatSend').disabled = false;
            }
        },

        addMessage: function(role, content) {
            const messagesContainer = document.getElementById('chatMessages');

            // Clear placeholder jika kosong
            if (messagesContainer.children.length === 1 && messagesContainer.querySelector('.text-center')) {
                messagesContainer.innerHTML = '';
            }

            const messageEl = document.createElement('div');
            messageEl.className = `flex ${role === 'user' ? 'justify-end' : 'justify-start'}`;

            const bubbleClass = role === 'user'
                ? 'bg-violet-600 text-white'
                : role === 'error'
                ? 'bg-red-600 text-white'
                : 'bg-slate-700 text-slate-100';

            messageEl.innerHTML = `
                <div class="max-w-xs px-3 py-2 rounded-lg ${bubbleClass} text-sm">
                    ${this.escapeHtml(content)}
                </div>
            `;

            messagesContainer.appendChild(messageEl);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        },

        escapeHtml: function(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
    };

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', () => chatWidget.init());

    // Optional: Initialize on script load (fallback)
    if (document.readyState !== 'loading') {
        chatWidget.init();
    }
</script>
@endpush
