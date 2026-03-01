{{-- ============================================================ --}}
{{-- Kuro AI Chat Widget v2.0 — Floating OpenAI-powered assistant --}}
{{-- ============================================================ --}}
<div id="chatbotWidget" class="fixed bottom-6 right-6 z-[90] font-sans" x-data="kuroChat()" x-cloak>

    {{-- ── Floating Action Button ── --}}
    <button @click="toggle()" class="group relative">
        {{-- Animated ring --}}
        <span class="absolute inset-0 rounded-full bg-gradient-to-r from-cyan-400 via-violet-500 to-fuchsia-500 opacity-40 blur-lg group-hover:opacity-70 transition-opacity duration-500 animate-spin-slow"></span>
        {{-- Button --}}
        <span class="relative flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-kvt-500 via-violet-600 to-fuchsia-600 shadow-2xl shadow-violet-500/30 group-hover:shadow-violet-500/60 transition-all duration-300 group-hover:scale-110 border border-white/10">
            <template x-if="!isOpen">
                <span class="relative">
                    <img src="{{ asset('gambar/kuro/kuro.png') }}" alt="Kuro AI" class="w-10 h-10 rounded-full object-cover ring-2 ring-white/20" onerror="this.outerHTML='<i class=\'fas fa-robot text-white text-xl\'></i>'">
                    {{-- Notification dot --}}
                    <span class="absolute -top-0.5 -right-0.5 w-3 h-3 bg-green-400 rounded-full border-2 border-violet-600 animate-pulse"></span>
                </span>
            </template>
            <template x-if="isOpen">
                <i class="fas fa-times text-white text-xl"></i>
            </template>
        </span>
    </button>

    {{-- ── Chat Window ── --}}
    <div x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-90 translate-y-4"
         class="absolute bottom-20 right-0 w-[400px] max-w-[calc(100vw-2rem)] rounded-3xl overflow-hidden shadow-2xl shadow-black/50 border border-white/10 flex flex-col"
         style="height: 560px; max-height: calc(100vh - 10rem);">

        {{-- ─ Header with particle canvas ─ --}}
        <div class="relative overflow-hidden shrink-0">
            <canvas id="kuroParticles" class="absolute inset-0 w-full h-full pointer-events-none" width="400" height="80"></canvas>
            <div class="relative bg-gradient-to-br from-kvt-600/95 via-violet-600/95 to-fuchsia-700/95 backdrop-blur-xl px-5 py-4">
                <div class="flex items-center gap-3">
                    <div class="relative shrink-0">
                        <div class="w-11 h-11 rounded-2xl overflow-hidden border-2 border-white/20 shadow-lg shadow-kvt-500/30">
                            <img src="{{ asset('gambar/kuro/kuro.png') }}" alt="Kuro AI" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-kvt-400 to-fuchsia-500 flex items-center justify-center\'><i class=\'fas fa-robot text-white text-lg\'></i></div>'">
                        </div>
                        <span class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-green-400 rounded-full border-2 border-violet-700"></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-white font-bold text-base flex items-center gap-2">
                            Kuro AI
                            <span class="text-[9px] bg-white/15 backdrop-blur px-2 py-0.5 rounded-full font-semibold tracking-wide">v2.0</span>
                        </h3>
                        <p class="text-white/60 text-[11px] flex items-center gap-1.5 truncate">
                            <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
                            <span x-text="statusText">Online — Siap membantu</span>
                        </p>
                    </div>
                    <div class="flex items-center gap-0.5">
                        <button @click="clearChat()" class="w-8 h-8 rounded-xl flex items-center justify-center text-white/40 hover:text-white hover:bg-white/10 transition" title="Chat baru">
                            <i class="fas fa-plus text-xs"></i>
                        </button>
                        <button @click="toggle()" class="w-8 h-8 rounded-xl flex items-center justify-center text-white/40 hover:text-white hover:bg-white/10 transition" title="Tutup">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                    </div>
                </div>

                {{-- Page context badge --}}
                <div x-show="pageContext" class="mt-2.5 flex items-center gap-1.5 text-[10px] text-white/50">
                    <i class="fas fa-link text-[8px]"></i>
                    <span>Konteks halaman: <span class="text-white/70" x-text="pageContext"></span></span>
                </div>
            </div>
        </div>

        {{-- ─ Messages ─ --}}
        <div id="chatMessages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-gradient-to-b from-kvt-950 via-kvt-950/98 to-kvt-900/95 kuro-scrollbar" x-ref="chatMessages">

            {{-- Welcome --}}
            <template x-if="messages.length === 0">
                <div class="flex flex-col items-center justify-center h-full text-center px-4 -mt-4">
                    <div class="relative mb-4">
                        <div class="absolute inset-0 bg-gradient-to-r from-kvt-400 via-violet-500 to-fuchsia-500 rounded-full blur-xl opacity-30 animate-pulse"></div>
                        <div class="relative w-20 h-20 rounded-full overflow-hidden border-3 border-kvt-400/30 shadow-xl">
                            <img src="{{ asset('gambar/kuro/kuro.png') }}" alt="Kuro" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-kvt-500 to-fuchsia-600 flex items-center justify-center\'><i class=\'fas fa-robot text-white text-3xl\'></i></div>'">
                        </div>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1" x-text="greeting"></h4>
                    <p class="text-gray-400 text-sm mb-6 max-w-[260px]">Aku <strong class="text-kvt-400">Kuro</strong>, asisten AI KVT Hub. Tanyakan apa saja tentang platform ini!</p>

                    {{-- Smart suggestion chips --}}
                    <div class="flex flex-wrap justify-center gap-2 max-w-xs">
                        <template x-for="(chip, i) in suggestions" :key="i">
                            <button @click="sendChip(chip.text)"
                                class="text-[11px] bg-kvt-800/60 hover:bg-kvt-700/70 text-kvt-300 hover:text-kvt-200 border border-kvt-700/30 hover:border-kvt-500/40 px-3 py-2 rounded-2xl transition-all duration-200 hover:scale-105 hover:shadow-lg hover:shadow-kvt-500/10 flex items-center gap-1.5">
                                <i :class="chip.icon" class="text-[10px]"></i>
                                <span x-text="chip.label"></span>
                            </button>
                        </template>
                    </div>
                </div>
            </template>

            {{-- Message list --}}
            <template x-for="(msg, idx) in messages" :key="idx">
                <div :class="msg.role === 'user' ? 'flex justify-end' : 'flex gap-2.5'">
                    {{-- Bot avatar --}}
                    <template x-if="msg.role !== 'user'">
                        <div class="w-7 h-7 rounded-xl overflow-hidden shrink-0 mt-0.5 bg-gradient-to-br from-kvt-400 to-fuchsia-500 flex items-center justify-center shadow-md">
                            <i class="fas fa-robot text-white text-[10px]"></i>
                        </div>
                    </template>
                    <div class="flex-1" :class="msg.role === 'user' ? '' : ''">
                        <div :class="msg.role === 'user'
                            ? 'ml-auto bg-gradient-to-br from-kvt-500 to-violet-600 text-white rounded-2xl rounded-br-sm'
                            : msg.role === 'error'
                            ? 'bg-red-900/40 border border-red-700/30 text-red-200 rounded-2xl rounded-tl-sm'
                            : 'bg-kvt-800/50 border border-kvt-700/20 text-gray-200 rounded-2xl rounded-tl-sm'"
                            class="px-4 py-2.5 text-sm max-w-[300px] shadow-md leading-relaxed kuro-msg-content"
                            x-html="renderMarkdown(msg.content)">
                        </div>
                        {{-- Timestamp + feedback --}}
                        <div class="flex items-center gap-2 mt-1 px-1" :class="msg.role === 'user' ? 'justify-end' : ''">
                            <span class="text-[10px] text-gray-600" x-text="msg.time"></span>
                            <template x-if="msg.role === 'assistant'">
                                <div class="flex items-center gap-0.5">
                                    <button @click="feedback(idx, 'up')" :class="msg.feedback === 'up' ? 'text-green-400' : 'text-gray-600 hover:text-green-400'" class="p-0.5 transition">
                                        <i class="fas fa-thumbs-up text-[9px]"></i>
                                    </button>
                                    <button @click="feedback(idx, 'down')" :class="msg.feedback === 'down' ? 'text-red-400' : 'text-gray-600 hover:text-red-400'" class="p-0.5 transition">
                                        <i class="fas fa-thumbs-down text-[9px]"></i>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </template>

            {{-- Typing indicator --}}
            <div x-show="isTyping" class="flex gap-2.5">
                <div class="w-7 h-7 rounded-xl overflow-hidden shrink-0 mt-0.5 bg-gradient-to-br from-kvt-400 to-fuchsia-500 flex items-center justify-center shadow-md">
                    <i class="fas fa-robot text-white text-[10px]"></i>
                </div>
                <div class="bg-kvt-800/50 border border-kvt-700/20 rounded-2xl rounded-tl-sm px-4 py-3">
                    <div class="flex gap-1.5">
                        <span class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay:0s"></span>
                        <span class="w-2 h-2 bg-violet-400 rounded-full animate-bounce" style="animation-delay:0.15s"></span>
                        <span class="w-2 h-2 bg-fuchsia-400 rounded-full animate-bounce" style="animation-delay:0.3s"></span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─ Input area ─ --}}
        <div class="shrink-0 border-t border-white/5 bg-kvt-950/95 backdrop-blur-xl p-3">
            {{-- Quick action chips (when chat has messages) --}}
            <div x-show="messages.length > 0 && !isTyping" class="flex gap-1.5 mb-2 overflow-x-auto pb-1 kuro-scrollbar-x">
                <template x-for="(chip, i) in quickActions" :key="i">
                    <button @click="sendChip(chip)"
                        class="text-[10px] bg-kvt-800/40 hover:bg-kvt-700/50 text-gray-400 hover:text-kvt-300 border border-kvt-700/20 px-2.5 py-1 rounded-xl whitespace-nowrap transition shrink-0">
                        <span x-text="chip"></span>
                    </button>
                </template>
            </div>

            <div class="flex items-end gap-2">
                <div class="flex-1 relative">
                    <textarea x-ref="chatInput"
                        x-model="inputText"
                        @keydown.enter.prevent="if(!$event.shiftKey) send()"
                        placeholder="Tanya Kuro AI..."
                        rows="1"
                        class="w-full bg-kvt-800/60 border border-kvt-700/30 text-white text-sm rounded-2xl px-4 py-2.5 outline-none focus:border-kvt-500/50 focus:ring-1 focus:ring-kvt-500/30 placeholder-gray-500 transition resize-none kuro-scrollbar"
                        style="max-height: 100px; min-height: 40px;"
                        @input="autoResize($event.target)"></textarea>
                </div>
                <button @click="send()"
                    :disabled="!inputText.trim() || isTyping"
                    :class="inputText.trim() && !isTyping ? 'from-kvt-500 to-violet-600 hover:from-kvt-400 hover:to-violet-500 shadow-lg shadow-kvt-500/20 scale-100' : 'from-gray-700 to-gray-800 scale-95 opacity-50'"
                    class="w-10 h-10 bg-gradient-to-br rounded-2xl flex items-center justify-center text-white transition-all duration-300 shrink-0">
                    <i class="fas fa-paper-plane text-sm" :class="isTyping ? 'animate-pulse' : ''"></i>
                </button>
            </div>
            <div class="flex items-center justify-between mt-2 px-1">
                <p class="text-[10px] text-gray-600 flex items-center gap-1">
                    <i class="fas fa-sparkles text-[8px] text-kvt-500"></i>
                    Powered by OpenAI
                </p>
                <p class="text-[10px] text-gray-600 font-semibold">Kuro AI v2.0</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<style>
    /* Slow spin for glow ring */
    @keyframes spin-slow { to { transform: rotate(360deg); } }
    .animate-spin-slow { animation: spin-slow 6s linear infinite; }

    /* Custom scrollbar */
    .kuro-scrollbar::-webkit-scrollbar { width: 4px; }
    .kuro-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .kuro-scrollbar::-webkit-scrollbar-thumb { background: rgba(139,92,246,.3); border-radius: 9999px; }
    .kuro-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(139,92,246,.5); }
    .kuro-scrollbar-x::-webkit-scrollbar { height: 2px; }
    .kuro-scrollbar-x::-webkit-scrollbar-track { background: transparent; }
    .kuro-scrollbar-x::-webkit-scrollbar-thumb { background: rgba(139,92,246,.2); border-radius: 9999px; }

    /* Message content styling */
    .kuro-msg-content strong { color: #67e8f9; font-weight: 600; }
    .kuro-msg-content code { background: rgba(0,0,0,.3); padding: 1px 5px; border-radius: 4px; font-size: 0.85em; font-family: 'JetBrains Mono', monospace; }
    .kuro-msg-content pre { background: rgba(0,0,0,.4); padding: 10px 14px; border-radius: 10px; overflow-x: auto; margin: 6px 0; border: 1px solid rgba(139,92,246,.15); }
    .kuro-msg-content pre code { background: none; padding: 0; }
    .kuro-msg-content ul, .kuro-msg-content ol { padding-left: 1.2em; margin: 4px 0; }
    .kuro-msg-content li { margin: 2px 0; }
    .kuro-msg-content p + p { margin-top: 6px; }
    .kuro-msg-content a { color: #a78bfa; text-decoration: underline; }
    .kuro-msg-content h1,.kuro-msg-content h2,.kuro-msg-content h3 { font-weight: 700; margin: 8px 0 4px; }
    .kuro-msg-content blockquote { border-left: 3px solid rgba(139,92,246,.4); padding-left: 10px; margin: 6px 0; color: #94a3b8; }
</style>

<script>
function kuroChat() {
    return {
        isOpen: false,
        isTyping: false,
        inputText: '',
        messages: [],
        sessionId: null,
        sessionToken: null,
        pageContext: '',
        statusText: 'Online — Siap membantu',
        greeting: '',
        suggestions: [],
        quickActions: ['Fitur platform', 'Cara daftar', 'Jenjang pendidikan', 'Edukasi gratis', 'Bantuan'],

        init() {
            this.setGreeting();
            this.detectPageContext();
            this.setSuggestions();
            this.initSession();
            this.initParticles();

            // Restore state from session if available
            const saved = sessionStorage.getItem('kuroChat_messages');
            if (saved) {
                try { this.messages = JSON.parse(saved); } catch(e) {}
            }
        },

        setGreeting() {
            const hour = new Date().getHours();
            if (hour < 5) this.greeting = 'Masih terjaga? 🌙';
            else if (hour < 11) this.greeting = 'Selamat Pagi! ☀️';
            else if (hour < 15) this.greeting = 'Selamat Siang! 🌤️';
            else if (hour < 18) this.greeting = 'Selamat Sore! 🌅';
            else this.greeting = 'Selamat Malam! 🌙';
        },

        detectPageContext() {
            const path = window.location.pathname;
            const title = document.title || '';
            const meta = document.querySelector('meta[name="description"]')?.content || '';

            const pageMap = {
                '/': 'Beranda',
                '/beranda': 'Beranda',
                '/tentang': 'Tentang',
                '/karir': 'Karir',
                '/komunitas': 'Komunitas',
                '/sertifikasi': 'Sertifikasi',
                '/beasiswa': 'Beasiswa',
                '/riset': 'Riset',
                '/edukasi-gratis': 'Edukasi Gratis',
                '/langganan': 'Langganan',
                '/bantuan': 'Bantuan',
                '/kuro': 'Profil Kuro',
                '/dasbor': 'Dasbor',
            };

            // Match exact or partial
            for (const [route, label] of Object.entries(pageMap)) {
                if (path === route || (route !== '/' && path.startsWith(route))) {
                    this.pageContext = label;
                    return;
                }
            }

            // Fallback: use title
            if (title) {
                this.pageContext = title.split('|')[0]?.trim().substring(0, 30) || '';
            }
        },

        setSuggestions() {
            const base = [
                { icon: 'fas fa-cubes', label: 'Fitur Platform', text: 'Jelaskan fitur-fitur utama KVT Hub' },
                { icon: 'fas fa-user-plus', label: 'Cara Daftar', text: 'Bagaimana cara mendaftar di KVT Hub?' },
                { icon: 'fas fa-graduation-cap', label: 'Jenjang', text: 'Jenjang pendidikan apa saja yang tersedia?' },
                { icon: 'fas fa-gift', label: 'Edukasi Gratis', text: 'Apa saja program edukasi gratis yang tersedia?' },
            ];

            // Page-specific suggestions
            const pageChips = {
                'Karir': [{ icon: 'fas fa-briefcase', label: 'Info Karir', text: 'Jelaskan fitur karir dan lowongan di KVT Hub' }],
                'Komunitas': [{ icon: 'fas fa-users', label: 'Komunitas', text: 'Bagaimana cara bergabung dengan komunitas KVT Hub?' }],
                'Sertifikasi': [{ icon: 'fas fa-certificate', label: 'Sertifikasi', text: 'Jelaskan program sertifikasi yang tersedia di KVT Hub' }],
                'Langganan': [{ icon: 'fas fa-crown', label: 'Paket', text: 'Apa saja paket langganan yang tersedia?' }],
                'Edukasi Gratis': [{ icon: 'fas fa-gift', label: 'Kursus Gratis', text: 'Sebutkan kursus dan tools gratis yang bisa didapatkan' }],
                'Beasiswa': [{ icon: 'fas fa-trophy', label: 'Beasiswa', text: 'Apa saja program beasiswa yang ditawarkan?' }],
                'Riset': [{ icon: 'fas fa-flask', label: 'Riset', text: 'Jelaskan pusat riset dan inovasi KVT Hub' }],
            };

            if (this.pageContext && pageChips[this.pageContext]) {
                this.suggestions = [...pageChips[this.pageContext], ...base.slice(0, 3)];
            } else {
                this.suggestions = base;
            }
        },

        async initSession() {
            try {
                const token = localStorage.getItem('kuro_chat_token');
                const res = await fetch('/api/chat/guest-session', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify({ token: token || null }),
                });
                const data = await res.json();
                if (data.success) {
                    this.sessionId = data.session.id;
                    this.sessionToken = data.session.token;
                    localStorage.setItem('kuro_chat_token', this.sessionToken);
                }
            } catch (e) {
                console.error('Kuro Chat init error:', e);
                this.statusText = 'Offline — Mode lokal';
            }
        },

        toggle() {
            this.isOpen = !this.isOpen;
            if (this.isOpen) {
                this.$nextTick(() => {
                    this.$refs.chatInput?.focus();
                    this.scrollToBottom();
                });
            }
        },

        async send() {
            const text = this.inputText.trim();
            if (!text || this.isTyping) return;

            const time = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

            // User message
            this.messages.push({ role: 'user', content: text, time });
            this.inputText = '';
            this.isTyping = true;
            this.statusText = 'Kuro sedang mengetik...';

            // Reset textarea height
            this.$nextTick(() => {
                if (this.$refs.chatInput) this.$refs.chatInput.style.height = '40px';
                this.scrollToBottom();
            });

            // Append page context to first message
            let messageToSend = text;
            if (this.pageContext && this.messages.filter(m => m.role === 'user').length === 1) {
                messageToSend = `[Konteks: Pengguna sedang di halaman "${this.pageContext}"]\n\n${text}`;
            }

            try {
                if (!this.sessionId) await this.initSession();

                const res = await fetch('/api/chat/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify({
                        message: messageToSend,
                        session_id: this.sessionId,
                        session_token: this.sessionToken,
                    }),
                });

                const data = await res.json();
                if (data.success) {
                    this.messages.push({ role: 'assistant', content: data.message.content, time, feedback: null, msgId: data.message.id });
                } else {
                    this.messages.push({ role: 'error', content: data.error || 'Terjadi kesalahan', time });
                }
            } catch (e) {
                console.error('Send error:', e);
                this.messages.push({ role: 'error', content: 'Gagal menghubungi server. Coba lagi nanti.', time });
            } finally {
                this.isTyping = false;
                this.statusText = 'Online — Siap membantu';
                this.saveMessages();
                this.$nextTick(() => this.scrollToBottom());
            }
        },

        sendChip(text) {
            this.inputText = text;
            this.send();
        },

        async feedback(idx, type) {
            if (!this.messages[idx]) return;
            this.messages[idx].feedback = this.messages[idx].feedback === type ? null : type;
            this.saveMessages();
        },

        clearChat() {
            this.messages = [];
            sessionStorage.removeItem('kuroChat_messages');
            // Recreate session
            localStorage.removeItem('kuro_chat_token');
            this.initSession();
        },

        saveMessages() {
            try {
                const toSave = this.messages.slice(-30);
                sessionStorage.setItem('kuroChat_messages', JSON.stringify(toSave));
            } catch(e) {}
        },

        scrollToBottom() {
            const el = this.$refs.chatMessages;
            if (el) el.scrollTop = el.scrollHeight;
        },

        autoResize(el) {
            el.style.height = '40px';
            el.style.height = Math.min(el.scrollHeight, 100) + 'px';
        },

        renderMarkdown(text) {
            if (!text) return '';
            let html = this.escapeHtml(text);
            // Code blocks
            html = html.replace(/```(\w*)\n?([\s\S]*?)```/g, '<pre><code>$2</code></pre>');
            // Inline code
            html = html.replace(/`([^`]+)`/g, '<code>$1</code>');
            // Bold
            html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            // Italic
            html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
            // Headers
            html = html.replace(/^### (.+)$/gm, '<h3 class="text-sm font-bold mt-2 mb-1">$1</h3>');
            html = html.replace(/^## (.+)$/gm, '<h2 class="text-base font-bold mt-2 mb-1">$1</h2>');
            // Unordered lists
            html = html.replace(/^[•\-\*] (.+)$/gm, '<li>$1</li>');
            html = html.replace(/(<li>.*<\/li>\n?)+/g, '<ul class="list-disc pl-4 my-1">$&</ul>');
            // Ordered lists
            html = html.replace(/^\d+\.\s(.+)$/gm, '<li>$1</li>');
            // Links
            html = html.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2" target="_blank" rel="noopener">$1</a>');
            // Blockquote
            html = html.replace(/^&gt;\s?(.+)$/gm, '<blockquote>$1</blockquote>');
            // Newlines
            html = html.replace(/\n/g, '<br>');
            // Clean up double br around block elements
            html = html.replace(/<br>\s*(<(?:pre|ul|ol|h[1-3]|blockquote|li))/g, '$1');
            html = html.replace(/(<\/(?:pre|ul|ol|h[1-3]|blockquote|li)>)\s*<br>/g, '$1');
            return html;
        },

        escapeHtml(text) {
            const d = document.createElement('div');
            d.textContent = text;
            return d.innerHTML;
        },

        initParticles() {
            this.$nextTick(() => {
                const canvas = document.getElementById('kuroParticles');
                if (!canvas) return;
                const ctx = canvas.getContext('2d');
                const particles = [];
                const count = 30;

                for (let i = 0; i < count; i++) {
                    particles.push({
                        x: Math.random() * 400,
                        y: Math.random() * 80,
                        r: Math.random() * 2 + 0.5,
                        dx: (Math.random() - 0.5) * 0.5,
                        dy: (Math.random() - 0.5) * 0.3,
                        alpha: Math.random() * 0.5 + 0.1,
                    });
                }

                function animate() {
                    ctx.clearRect(0, 0, 400, 80);
                    particles.forEach(p => {
                        ctx.beginPath();
                        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                        ctx.fillStyle = `rgba(167,139,250,${p.alpha})`;
                        ctx.fill();
                        p.x += p.dx;
                        p.y += p.dy;
                        if (p.x < 0 || p.x > 400) p.dx *= -1;
                        if (p.y < 0 || p.y > 80) p.dy *= -1;
                    });
                    requestAnimationFrame(animate);
                }
                animate();
            });
        },
    };
}
</script>
@endpush
