@extends('tata-letak.dasbor')

@section('judul', 'Kuro Nexus AI')
@section('judul-halaman', 'Kuro Nexus AI Hub')

@section('konten')
<div x-data="kuroNexus()" class="space-y-6">

    {{-- ===== HEADER ===== --}}
    <div class="bg-gradient-to-r from-kvt-900 via-purple-900/40 to-kvt-900 border border-kvt-700/30 rounded-2xl p-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cpath d=&quot;M30 0L60 30L30 60L0 30Z&quot; fill=&quot;none&quot; stroke=&quot;%233399FF&quot; stroke-width=&quot;0.5&quot;/%3E%3C/svg%3E'); background-size: 60px;"></div>
        <div class="relative flex flex-col md:flex-row items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-white flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-kvt-400 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-brain text-white text-xl"></i>
                    </div>
                    Kuro Nexus AI
                    <span class="text-xs bg-gradient-to-r from-kvt-500 to-purple-500 text-white px-3 py-1 rounded-full font-bold">v2.0</span>
                </h1>
                <p class="text-gray-400 mt-1 text-sm">Multi-Provider AI Orchestrator — OpenAI · Claude · n8n · Ollama</p>
            </div>

            {{-- Provider Status Pills --}}
            <div class="flex flex-wrap gap-2">
                @foreach($providers as $name => $p)
                <div class="flex items-center gap-2 px-3 py-1.5 bg-kvt-800/50 rounded-full border border-kvt-700/30">
                    <span class="w-2 h-2 rounded-full {{ $p['available'] ? 'bg-green-400 animate-pulse' : 'bg-gray-600' }}"></span>
                    <span class="text-xs {{ $p['available'] ? 'text-green-400' : 'text-gray-500' }} font-semibold uppercase">{{ $name }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Quick Stats --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-5 relative">
            <div class="bg-kvt-800/30 backdrop-blur rounded-xl p-3 text-center border border-kvt-700/20">
                <div class="text-xl font-black text-white">{{ $stats['today']['total_requests'] }}</div>
                <div class="text-xs text-gray-500">Requests Hari Ini</div>
            </div>
            <div class="bg-kvt-800/30 backdrop-blur rounded-xl p-3 text-center border border-kvt-700/20">
                <div class="text-xl font-black text-kvt-400">{{ number_format($stats['today']['total_tokens']) }}</div>
                <div class="text-xs text-gray-500">Tokens Used</div>
            </div>
            <div class="bg-kvt-800/30 backdrop-blur rounded-xl p-3 text-center border border-kvt-700/20">
                <div class="text-xl font-black text-purple-400">{{ count(array_filter($providers, fn($p) => $p['available'])) }}/{{ count($providers) }}</div>
                <div class="text-xs text-gray-500">Active Providers</div>
            </div>
            <div class="bg-kvt-800/30 backdrop-blur rounded-xl p-3 text-center border border-kvt-700/20">
                <div class="text-xl font-black text-amber-400">${{ number_format($stats['today']['total_cost'], 4) }}</div>
                <div class="text-xs text-gray-500">Cost Today</div>
            </div>
        </div>
    </div>

    {{-- ===== TABS ===== --}}
    <div class="flex flex-wrap gap-2 bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-2">
        <template x-for="tab in tabs" :key="tab.id">
            <button @click="activeTab = tab.id"
                :class="activeTab === tab.id ? 'bg-gradient-to-r from-kvt-500 to-purple-600 text-white shadow-lg' : 'text-gray-400 hover:text-white hover:bg-kvt-800/50'"
                class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200">
                <i :class="tab.icon" class="text-xs"></i>
                <span x-text="tab.label" class="hidden sm:inline"></span>
                <span x-show="tab.badge" x-text="tab.badge" class="text-[10px] bg-white/10 px-1.5 py-0.5 rounded-full"></span>
            </button>
        </template>
    </div>

    {{-- ===== TAB: AI CHAT (Multi-Provider) ===== --}}
    <div x-show="activeTab === 'chat'" x-transition class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        {{-- Chat Sidebar --}}
        <div class="lg:col-span-1 space-y-4">
            {{-- Provider Selector --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-4">
                <h3 class="text-white font-bold text-sm mb-3"><i class="fas fa-server text-kvt-400 mr-2"></i>Provider</h3>
                <div class="space-y-2">
                    <template x-for="(status, name) in providerList" :key="name">
                        <button @click="chatProvider = name"
                            :class="chatProvider === name ? 'border-kvt-400 bg-kvt-400/10' : 'border-kvt-700/30 hover:border-kvt-600'"
                            :disabled="!status.available"
                            class="w-full flex items-center justify-between p-3 rounded-xl border text-left transition disabled:opacity-30">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full" :class="status.available ? 'bg-green-400' : 'bg-gray-600'"></span>
                                <span class="text-sm font-semibold text-white capitalize" x-text="name"></span>
                            </div>
                            <span class="text-[10px] text-gray-500" x-text="status.model"></span>
                        </button>
                    </template>
                </div>
            </div>

            {{-- Context --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-4">
                <h3 class="text-white font-bold text-sm mb-3"><i class="fas fa-compass text-amber-400 mr-2"></i>Context</h3>
                <select x-model="chatContext" class="w-full bg-kvt-800 text-white text-sm rounded-xl px-3 py-2 border border-kvt-700/30">
                    <option value="general">🌐 Umum</option>
                    <option value="code">💻 Coding</option>
                    <option value="education">📚 Pendidikan</option>
                    <option value="github">🐙 GitHub</option>
                    <option value="career">💼 Karir</option>
                </select>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-4">
                <h3 class="text-white font-bold text-sm mb-3"><i class="fas fa-bolt text-yellow-400 mr-2"></i>Quick</h3>
                <div class="space-y-1.5">
                    <button @click="sendQuick('Jelaskan arsitektur KVT Hub')" class="w-full text-left text-xs text-gray-400 hover:text-white px-3 py-2 rounded-lg hover:bg-kvt-800/50 transition">🏗️ Arsitektur KVT</button>
                    <button @click="sendQuick('Buatkan contoh API endpoint Laravel')" class="w-full text-left text-xs text-gray-400 hover:text-white px-3 py-2 rounded-lg hover:bg-kvt-800/50 transition">🔌 Contoh API</button>
                    <button @click="sendQuick('Cara setup n8n dengan KVT Hub')" class="w-full text-left text-xs text-gray-400 hover:text-white px-3 py-2 rounded-lg hover:bg-kvt-800/50 transition">⚡ Setup n8n</button>
                    <button @click="sendQuick('Jelaskan perbedaan OpenAI vs Claude')" class="w-full text-left text-xs text-gray-400 hover:text-white px-3 py-2 rounded-lg hover:bg-kvt-800/50 transition">🤖 OpenAI vs Claude</button>
                </div>
            </div>
        </div>

        {{-- Main Chat --}}
        <div class="lg:col-span-3 bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col" style="height: 640px;">
            <div class="px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-kvt-400 to-purple-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-robot text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="text-white font-bold text-sm">Kuro Nexus Chat</span>
                        <span class="text-xs text-gray-500 ml-2" x-text="'via ' + chatProvider"></span>
                    </div>
                </div>
                <button @click="resetChat()" class="text-gray-500 hover:text-red-400 text-xs"><i class="fas fa-trash mr-1"></i>Reset</button>
            </div>

            <div class="flex-1 overflow-y-auto p-5 space-y-4" x-ref="chatBox">
                {{-- Welcome --}}
                <template x-if="chatMessages.length === 0">
                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gradient-to-br from-kvt-400/20 to-purple-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-brain text-3xl text-kvt-400"></i>
                        </div>
                        <h3 class="text-white font-bold text-lg">Halo! Aku Kuro Nexus 🐱⚡</h3>
                        <p class="text-gray-500 text-sm mt-2">AI multi-provider. Tanya apa saja!</p>
                    </div>
                </template>

                {{-- Messages --}}
                <template x-for="(msg, i) in chatMessages" :key="i">
                    <div :class="msg.role === 'user' ? 'flex justify-end' : 'flex justify-start'">
                        <div :class="msg.role === 'user' ? 'bg-kvt-600/20 border-kvt-500/30 ml-12' : 'bg-kvt-800/40 border-kvt-700/20 mr-12'"
                             class="rounded-2xl border px-4 py-3 max-w-full">
                            <div x-show="msg.role === 'assistant'" class="flex items-center gap-2 mb-2">
                                <i class="fas fa-robot text-kvt-400 text-xs"></i>
                                <span class="text-[10px] text-gray-500 uppercase font-bold" x-text="msg.provider || chatProvider"></span>
                                <span x-show="msg.tokens" class="text-[10px] text-gray-600" x-text="msg.tokens + ' tok'"></span>
                            </div>
                            <div class="text-sm text-gray-300 leading-relaxed" x-html="msg.role === 'assistant' ? renderMd(msg.content) : msg.content"></div>
                            <div class="text-[10px] text-gray-600 mt-1" x-text="msg.time || ''"></div>
                        </div>
                    </div>
                </template>

                {{-- Loading --}}
                <div x-show="chatLoading" class="flex justify-start">
                    <div class="bg-kvt-800/40 rounded-2xl px-4 py-3 border border-kvt-700/20">
                        <div class="flex gap-1">
                            <div class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                            <div class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                            <div class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Input --}}
            <div class="px-5 py-3 bg-kvt-800/60 border-t border-kvt-700/30">
                <div class="flex gap-3">
                    <input x-model="chatInput" @keydown.enter="sendChat()" type="text" placeholder="Ketik pesan..."
                        class="flex-1 bg-kvt-900 text-white rounded-xl px-4 py-2.5 text-sm border border-kvt-700/30 focus:border-kvt-400 outline-none">
                    <button @click="sendChat()" :disabled="chatLoading || !chatInput.trim()"
                        class="px-5 bg-gradient-to-r from-kvt-500 to-purple-600 text-white rounded-xl font-semibold text-sm hover:shadow-lg transition disabled:opacity-50">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== TAB: CODE GENERATOR ===== --}}
    <div x-show="activeTab === 'codegen'" x-transition class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Input --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col" style="height: 560px;">
                <div class="px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30 flex items-center justify-between">
                    <span class="text-white font-bold text-sm"><i class="fas fa-magic text-purple-400 mr-2"></i>Deskripsi Kode</span>
                    <div class="flex gap-2">
                        <select x-model="codeGenLang" class="bg-kvt-700 text-white text-xs rounded-lg px-3 py-1.5 border-none">
                            <option value="PHP">PHP</option><option value="JavaScript">JavaScript</option>
                            <option value="Python">Python</option><option value="TypeScript">TypeScript</option>
                            <option value="SQL">SQL</option><option value="Go">Go</option>
                            <option value="Rust">Rust</option><option value="Java">Java</option>
                        </select>
                        <select x-model="codeGenFramework" class="bg-kvt-700 text-white text-xs rounded-lg px-3 py-1.5 border-none">
                            <option value="Laravel">Laravel</option><option value="React">React</option>
                            <option value="Vue">Vue</option><option value="Express">Express</option>
                            <option value="Django">Django</option><option value="FastAPI">FastAPI</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                </div>
                <textarea x-model="codeGenDesc" placeholder="Deskripsikan kode yang ingin dibuat...&#10;&#10;Contoh: Buat REST API CRUD untuk manajemen buku dengan validasi, pagination, dan response format JSON." class="flex-1 w-full p-4 bg-kvt-950 text-gray-300 text-sm outline-none resize-none leading-6"></textarea>
                <div class="px-5 py-3 bg-kvt-800/60 border-t border-kvt-700/30 flex items-center justify-between">
                    <span class="text-xs text-gray-500" x-text="codeGenDesc.length + ' karakter'"></span>
                    <div class="flex items-center gap-3">
                        <select x-model="codeGenProvider" class="bg-kvt-700 text-white text-xs rounded-lg px-3 py-1 border-none">
                            <option value="">Default</option>
                            <option value="openai">OpenAI</option>
                            <option value="claude">Claude</option>
                            <option value="github">GitHub Models</option>
                            <option value="ollama">Ollama</option>
                        </select>
                        <button @click="doCodeGen()" :disabled="codeGenLoading || !codeGenDesc.trim()"
                            class="px-5 py-2 bg-gradient-to-r from-purple-500 to-pink-600 text-white rounded-xl text-sm font-semibold hover:shadow-lg transition disabled:opacity-50">
                            <i :class="codeGenLoading ? 'fas fa-spinner fa-spin' : 'fas fa-wand-magic-sparkles'" class="mr-2"></i>
                            <span x-text="codeGenLoading ? 'Generating...' : 'Generate'"></span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Output / Result --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col" style="height: 560px;">
                <div class="px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30 flex items-center justify-between">
                    <span class="text-white font-bold text-sm"><i class="fas fa-code text-green-400 mr-2"></i>Generated Code</span>
                    <button x-show="codeGenResult" @click="copyText(codeGenResult)" class="text-xs text-gray-500 hover:text-kvt-400"><i class="fas fa-copy mr-1"></i>Copy</button>
                </div>
                <div class="flex-1 overflow-y-auto p-4">
                    <template x-if="!codeGenResult && !codeGenLoading">
                        <div class="text-center py-16">
                            <i class="fas fa-wand-magic-sparkles text-3xl text-gray-600 mb-3"></i>
                            <p class="text-gray-500 text-sm">Deskripsikan kode, AI akan membuatkannya</p>
                        </div>
                    </template>
                    <template x-if="codeGenLoading">
                        <div class="text-center py-16 animate-pulse">
                            <i class="fas fa-cog fa-spin text-3xl text-kvt-400 mb-3"></i>
                            <p class="text-kvt-400 text-sm">AI sedang menulis kode...</p>
                        </div>
                    </template>
                    <div x-show="codeGenResult && !codeGenLoading" class="prose prose-sm prose-invert text-sm" x-html="renderMd(codeGenResult)"></div>
                </div>
            </div>
        </div>

        {{-- Quick Templates --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
            <h3 class="text-white font-bold text-sm mb-3"><i class="fas fa-bookmark text-amber-400 mr-2"></i>Template Cepat</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                <button @click="codeGenDesc = 'Buat REST API CRUD lengkap untuk resource \'products\' dengan validasi, pagination, soft delete, dan response format JSON'; codeGenLang = 'PHP'; codeGenFramework = 'Laravel'"
                    class="text-left p-3 border border-kvt-700/20 rounded-xl hover:bg-kvt-800/40 transition">
                    <div class="text-white font-semibold text-xs mb-1">🔌 REST API CRUD</div>
                    <div class="text-gray-500 text-[11px]">Laravel controller + routes</div>
                </button>
                <button @click="codeGenDesc = 'Buat React component untuk data table dengan sorting, filtering, pagination, dan export CSV'; codeGenLang = 'TypeScript'; codeGenFramework = 'React'"
                    class="text-left p-3 border border-kvt-700/20 rounded-xl hover:bg-kvt-800/40 transition">
                    <div class="text-white font-semibold text-xs mb-1">📊 Data Table Component</div>
                    <div class="text-gray-500 text-[11px]">React + TypeScript</div>
                </button>
                <button @click="codeGenDesc = 'Buat Python script untuk web scraping dengan BeautifulSoup, handle rate limiting, retry, dan save ke CSV/JSON'; codeGenLang = 'Python'; codeGenFramework = 'None'"
                    class="text-left p-3 border border-kvt-700/20 rounded-xl hover:bg-kvt-800/40 transition">
                    <div class="text-white font-semibold text-xs mb-1">🕷️ Web Scraper</div>
                    <div class="text-gray-500 text-[11px]">Python + BeautifulSoup</div>
                </button>
                <button @click="codeGenDesc = 'Buat middleware untuk rate limiting, JWT authentication, dan request logging'; codeGenLang = 'JavaScript'; codeGenFramework = 'Express'"
                    class="text-left p-3 border border-kvt-700/20 rounded-xl hover:bg-kvt-800/40 transition">
                    <div class="text-white font-semibold text-xs mb-1">🔒 Auth Middleware</div>
                    <div class="text-gray-500 text-[11px]">Express.js middleware stack</div>
                </button>
            </div>
        </div>
    </div>

    {{-- ===== TAB: TRANSLATOR ===== --}}
    <div x-show="activeTab === 'translate'" x-transition class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col" style="height: 420px;">
                <div class="px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30 flex items-center justify-between">
                    <span class="text-white font-bold text-sm"><i class="fas fa-pen text-blue-400 mr-2"></i>Teks Asli</span>
                    <select x-model="transFrom" class="bg-kvt-700 text-white text-xs rounded-lg px-3 py-1.5 border-none">
                        <option value="auto">🔍 Auto Detect</option>
                        <option value="Indonesian">🇮🇩 Indonesia</option>
                        <option value="English">🇺🇸 English</option>
                        <option value="Japanese">🇯🇵 日本語</option>
                        <option value="Korean">🇰🇷 한국어</option>
                        <option value="Chinese">🇨🇳 中文</option>
                        <option value="Arabic">🇸🇦 العربية</option>
                        <option value="Spanish">🇪🇸 Español</option>
                        <option value="French">🇫🇷 Français</option>
                        <option value="German">🇩🇪 Deutsch</option>
                    </select>
                </div>
                <textarea x-model="transText" placeholder="Masukkan teks yang akan diterjemahkan..." class="flex-1 w-full p-4 bg-kvt-950 text-gray-300 text-sm outline-none resize-none leading-6"></textarea>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col" style="height: 420px;">
                <div class="px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30 flex items-center justify-between">
                    <span class="text-white font-bold text-sm"><i class="fas fa-language text-green-400 mr-2"></i>Hasil Terjemahan</span>
                    <select x-model="transTo" class="bg-kvt-700 text-white text-xs rounded-lg px-3 py-1.5 border-none">
                        <option value="English">🇺🇸 English</option>
                        <option value="Indonesian">🇮🇩 Indonesia</option>
                        <option value="Japanese">🇯🇵 日本語</option>
                        <option value="Korean">🇰🇷 한국어</option>
                        <option value="Chinese">🇨🇳 中文</option>
                        <option value="Arabic">🇸🇦 العربية</option>
                        <option value="Spanish">🇪🇸 Español</option>
                        <option value="French">🇫🇷 Français</option>
                        <option value="German">🇩🇪 Deutsch</option>
                    </select>
                </div>
                <div class="flex-1 overflow-y-auto p-4">
                    <template x-if="transLoading">
                        <div class="text-center py-10 animate-pulse"><i class="fas fa-spinner fa-spin text-kvt-400 text-xl"></i></div>
                    </template>
                    <div x-show="transResult && !transLoading" class="text-gray-300 text-sm leading-6 whitespace-pre-wrap" x-text="transResult"></div>
                    <template x-if="!transResult && !transLoading">
                        <div class="text-center py-10 text-gray-600 text-sm">Hasil terjemahan muncul di sini</div>
                    </template>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <button @click="doTranslate()" :disabled="transLoading || !transText.trim()"
                class="px-8 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-xl font-bold hover:shadow-lg transition disabled:opacity-50">
                <i :class="transLoading ? 'fas fa-spinner fa-spin' : 'fas fa-language'" class="mr-2"></i>
                <span x-text="transLoading ? 'Translating...' : 'Terjemahkan'"></span>
            </button>
        </div>
    </div>

    {{-- ===== TAB: SUMMARIZER ===== --}}
    <div x-show="activeTab === 'summarize'" x-transition class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col" style="height: 480px;">
                <div class="px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30">
                    <span class="text-white font-bold text-sm"><i class="fas fa-file-alt text-orange-400 mr-2"></i>Teks Panjang</span>
                </div>
                <textarea x-model="sumText" placeholder="Paste artikel, dokumen, atau teks panjang di sini..." class="flex-1 w-full p-4 bg-kvt-950 text-gray-300 text-sm outline-none resize-none leading-6"></textarea>
                <div class="px-5 py-3 bg-kvt-800/60 border-t border-kvt-700/30 flex items-center justify-between">
                    <span class="text-xs text-gray-500" x-text="sumText.split(' ').filter(w=>w).length + ' kata'"></span>
                    <div class="flex items-center gap-3">
                        <label class="text-xs text-gray-400">Max kata:</label>
                        <input type="number" x-model.number="sumMaxWords" min="50" max="1000" class="w-20 bg-kvt-700 text-white text-xs rounded px-2 py-1 border-none">
                        <button @click="doSummarize()" :disabled="sumLoading || !sumText.trim()"
                            class="px-5 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl text-sm font-semibold hover:shadow-lg transition disabled:opacity-50">
                            <i :class="sumLoading ? 'fas fa-spinner fa-spin' : 'fas fa-compress-alt'" class="mr-2"></i>
                            <span x-text="sumLoading ? 'Summarizing...' : 'Rangkum'"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col" style="height: 480px;">
                <div class="px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30">
                    <span class="text-white font-bold text-sm"><i class="fas fa-compress text-green-400 mr-2"></i>Ringkasan AI</span>
                </div>
                <div class="flex-1 overflow-y-auto p-4">
                    <template x-if="sumLoading"><div class="text-center py-16 animate-pulse"><i class="fas fa-brain fa-spin text-2xl text-kvt-400"></i></div></template>
                    <div x-show="sumResult && !sumLoading" class="prose prose-sm prose-invert text-sm" x-html="renderMd(sumResult)"></div>
                    <template x-if="!sumResult && !sumLoading"><div class="text-center py-16 text-gray-600 text-sm">Ringkasan AI muncul di sini</div></template>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== TAB: SENTIMENT ANALYSIS ===== --}}
    <div x-show="activeTab === 'sentiment'" x-transition class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col" style="height: 400px;">
                <div class="px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30">
                    <span class="text-white font-bold text-sm"><i class="fas fa-comment-dots text-pink-400 mr-2"></i>Teks untuk Analisis Sentimen</span>
                </div>
                <textarea x-model="sentText" placeholder="Masukkan review, feedback, komentar, atau teks apapun..." class="flex-1 w-full p-4 bg-kvt-950 text-gray-300 text-sm outline-none resize-none leading-6"></textarea>
                <div class="px-5 py-3 bg-kvt-800/60 border-t border-kvt-700/30 flex justify-end">
                    <button @click="doSentiment()" :disabled="sentLoading || !sentText.trim()"
                        class="px-5 py-2 bg-gradient-to-r from-pink-500 to-rose-600 text-white rounded-xl text-sm font-semibold hover:shadow-lg transition disabled:opacity-50">
                        <i :class="sentLoading ? 'fas fa-spinner fa-spin' : 'fas fa-heart'" class="mr-2"></i>
                        <span x-text="sentLoading ? 'Analyzing...' : 'Analisis'"></span>
                    </button>
                </div>
            </div>

            {{-- Result --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
                <h3 class="text-white font-bold mb-4"><i class="fas fa-chart-pie text-kvt-400 mr-2"></i>Hasil</h3>
                <template x-if="!sentResult && !sentLoading">
                    <div class="text-center py-10"><i class="fas fa-meh text-3xl text-gray-600"></i><p class="text-gray-500 text-sm mt-2">Belum dianalisis</p></div>
                </template>
                <template x-if="sentLoading">
                    <div class="text-center py-10 animate-pulse"><i class="fas fa-spinner fa-spin text-2xl text-kvt-400"></i></div>
                </template>
                <div x-show="sentResult && !sentLoading" class="space-y-4">
                    {{-- Sentiment Badge --}}
                    <div class="text-center">
                        <div class="text-5xl mb-2" x-text="sentResult?.sentiment === 'positive' ? '😊' : (sentResult?.sentiment === 'negative' ? '😞' : '😐')"></div>
                        <span class="text-lg font-bold capitalize" :class="sentResult?.sentiment === 'positive' ? 'text-green-400' : (sentResult?.sentiment === 'negative' ? 'text-red-400' : 'text-gray-400')" x-text="sentResult?.sentiment"></span>
                    </div>
                    {{-- Score bar --}}
                    <div>
                        <div class="flex justify-between text-xs text-gray-500 mb-1"><span>Negative</span><span>Positive</span></div>
                        <div class="h-3 bg-kvt-800 rounded-full overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-500"
                                :class="sentResult?.score >= 0.6 ? 'bg-green-500' : (sentResult?.score <= 0.4 ? 'bg-red-500' : 'bg-yellow-500')"
                                :style="'width: ' + ((sentResult?.score || 0.5) * 100) + '%'"></div>
                        </div>
                        <div class="text-center text-xs text-gray-400 mt-1" x-text="'Score: ' + ((sentResult?.score || 0) * 100).toFixed(0) + '%'"></div>
                    </div>
                    {{-- Emotions --}}
                    <div x-show="sentResult?.emotions?.length">
                        <div class="text-xs text-gray-500 mb-2">Emosi terdeteksi:</div>
                        <div class="flex flex-wrap gap-1.5">
                            <template x-for="emo in (sentResult?.emotions || [])" :key="emo">
                                <span class="text-xs bg-kvt-800 text-kvt-300 px-2 py-1 rounded-full" x-text="emo"></span>
                            </template>
                        </div>
                    </div>
                    {{-- Summary --}}
                    <div x-show="sentResult?.summary" class="text-xs text-gray-400 mt-3 p-3 bg-kvt-800/40 rounded-lg" x-text="sentResult?.summary"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== TAB: AI TUTOR ===== --}}
    <div x-show="activeTab === 'tutor'" x-transition class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="space-y-4">
                <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
                    <h3 class="text-white font-bold text-sm mb-3"><i class="fas fa-graduation-cap text-amber-400 mr-2"></i>Topik Belajar</h3>
                    <textarea x-model="tutorTopic" rows="4" placeholder="Apa yang ingin kamu pelajari?&#10;&#10;Contoh: Jelaskan konsep OOP di PHP" class="w-full bg-kvt-950 text-gray-300 text-sm rounded-xl p-3 outline-none resize-none border border-kvt-700/30"></textarea>
                    <div class="mt-3 space-y-2">
                        <label class="text-xs text-gray-500">Level:</label>
                        <select x-model="tutorLevel" class="w-full bg-kvt-800 text-white text-sm rounded-xl px-3 py-2 border border-kvt-700/30">
                            <option value="beginner">🟢 Pemula</option>
                            <option value="intermediate">🟡 Menengah</option>
                            <option value="advanced">🔴 Lanjutan</option>
                        </select>
                    </div>
                    <button @click="doTutor()" :disabled="tutorLoading || !tutorTopic.trim()"
                        class="w-full mt-3 px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl text-sm font-semibold hover:shadow-lg transition disabled:opacity-50">
                        <i :class="tutorLoading ? 'fas fa-spinner fa-spin' : 'fas fa-book-reader'" class="mr-2"></i>
                        <span x-text="tutorLoading ? 'Menjelaskan...' : 'Jelaskan!'"></span>
                    </button>
                </div>

                {{-- Quick Topics --}}
                <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
                    <h3 class="text-white font-bold text-sm mb-3"><i class="fas fa-star text-yellow-400 mr-2"></i>Topik Populer</h3>
                    <div class="space-y-1.5">
                        <button @click="tutorTopic = 'Jelaskan Design Pattern MVC di Laravel'" class="w-full text-left text-xs text-gray-400 hover:text-white px-3 py-2 rounded-lg hover:bg-kvt-800/50 transition">📐 MVC Pattern</button>
                        <button @click="tutorTopic = 'Apa itu REST API dan bagaimana cara membuatnya'" class="w-full text-left text-xs text-gray-400 hover:text-white px-3 py-2 rounded-lg hover:bg-kvt-800/50 transition">🔌 REST API</button>
                        <button @click="tutorTopic = 'Jelaskan konsep async/await di JavaScript'" class="w-full text-left text-xs text-gray-400 hover:text-white px-3 py-2 rounded-lg hover:bg-kvt-800/50 transition">⚡ Async/Await</button>
                        <button @click="tutorTopic = 'Bagaimana cara kerja Docker dan Kubernetes'" class="w-full text-left text-xs text-gray-400 hover:text-white px-3 py-2 rounded-lg hover:bg-kvt-800/50 transition">🐳 Docker & K8s</button>
                        <button @click="tutorTopic = 'Jelaskan Machine Learning untuk pemula'" class="w-full text-left text-xs text-gray-400 hover:text-white px-3 py-2 rounded-lg hover:bg-kvt-800/50 transition">🧠 Machine Learning</button>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col" style="height: 570px;">
                <div class="px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30">
                    <span class="text-white font-bold text-sm"><i class="fas fa-chalkboard-teacher text-kvt-400 mr-2"></i>Penjelasan AI Tutor</span>
                </div>
                <div class="flex-1 overflow-y-auto p-5">
                    <template x-if="!tutorResult && !tutorLoading">
                        <div class="text-center py-20">
                            <i class="fas fa-graduation-cap text-4xl text-gray-600 mb-3"></i>
                            <p class="text-gray-500">Pilih topik dan AI akan menjelaskannya</p>
                        </div>
                    </template>
                    <template x-if="tutorLoading"><div class="text-center py-20 animate-pulse"><i class="fas fa-brain fa-spin text-3xl text-kvt-400"></i><p class="text-kvt-400 mt-3">AI Tutor sedang menyiapkan materi...</p></div></template>
                    <div x-show="tutorResult && !tutorLoading" class="prose prose-sm prose-invert text-gray-300 text-sm leading-relaxed" x-html="renderMd(tutorResult)"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== TAB: AI PIPELINE ===== --}}
    <div x-show="activeTab === 'pipeline'" x-transition class="space-y-6">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-white font-bold"><i class="fas fa-project-diagram text-kvt-400 mr-2"></i>AI Pipeline Builder</h3>
                <div class="flex gap-2">
                    <button @click="addPipeStep()" :disabled="pipeSteps.length >= 5" class="px-3 py-1.5 bg-kvt-700 text-white rounded-lg text-xs hover:bg-kvt-600 transition disabled:opacity-50"><i class="fas fa-plus mr-1"></i>Add Step</button>
                    <button @click="runPipeline()" :disabled="pipeLoading || !pipeInput.trim() || pipeSteps.length === 0"
                        class="px-5 py-1.5 bg-gradient-to-r from-kvt-500 to-purple-600 text-white rounded-lg text-sm font-semibold transition disabled:opacity-50">
                        <i :class="pipeLoading ? 'fas fa-spinner fa-spin' : 'fas fa-play'" class="mr-2"></i>Run Pipeline
                    </button>
                </div>
            </div>

            {{-- Pipeline Steps Visual --}}
            <div class="flex flex-wrap items-center gap-3 mb-6 py-4 px-3 bg-kvt-950/50 rounded-xl border border-kvt-700/20">
                <div class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg text-xs font-bold border border-blue-500/30">📥 Input</div>
                <template x-for="(step, idx) in pipeSteps" :key="idx">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-arrow-right text-gray-600"></i>
                        <div class="flex items-center gap-2 px-3 py-1.5 bg-purple-500/20 text-purple-400 rounded-lg text-xs font-bold border border-purple-500/30">
                            <span x-text="stepEmoji(step.action)"></span>
                            <span class="capitalize" x-text="step.action"></span>
                            <span x-show="step.provider" class="text-[10px] text-gray-500" x-text="'(' + step.provider + ')'"></span>
                            <button @click="pipeSteps.splice(idx, 1)" class="text-red-400 hover:text-red-300 ml-1"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </template>
                <i class="fas fa-arrow-right text-gray-600"></i>
                <div class="px-3 py-1.5 bg-green-500/20 text-green-400 rounded-lg text-xs font-bold border border-green-500/30">📤 Output</div>
            </div>

            {{-- Step Config --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mb-4">
                <template x-for="(step, idx) in pipeSteps" :key="idx">
                    <div class="bg-kvt-800/40 rounded-xl p-4 border border-kvt-700/20">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-white font-bold text-sm">Step <span x-text="idx + 1"></span></span>
                            <button @click="pipeSteps.splice(idx, 1)" class="text-xs text-red-400"><i class="fas fa-trash"></i></button>
                        </div>
                        <select x-model="step.action" class="w-full bg-kvt-700 text-white text-xs rounded-lg px-2 py-1.5 border-none mb-2">
                            <option value="translate">🌐 Translate</option>
                            <option value="summarize">📝 Summarize</option>
                            <option value="review">🔍 Code Review</option>
                            <option value="sentiment">💖 Sentiment</option>
                            <option value="rewrite">✍️ Rewrite</option>
                            <option value="extract">📦 Extract</option>
                            <option value="explain">🎓 Explain</option>
                            <option value="code_generate">💻 Code Gen</option>
                        </select>
                        <select x-model="step.provider" class="w-full bg-kvt-700 text-white text-xs rounded-lg px-2 py-1.5 border-none">
                            <option value="">Default Provider</option>
                            <option value="openai">OpenAI</option>
                            <option value="claude">Claude</option>
                            <option value="ollama">Ollama</option>
                        </select>
                    </div>
                </template>
            </div>

            {{-- Input / Output --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs text-gray-500 mb-1 block">Input:</label>
                    <textarea x-model="pipeInput" rows="6" placeholder="Masukkan teks untuk diproses pipeline..." class="w-full bg-kvt-950 text-gray-300 text-sm rounded-xl p-3 outline-none resize-none border border-kvt-700/30"></textarea>
                </div>
                <div>
                    <label class="text-xs text-gray-500 mb-1 block">Output:</label>
                    <div class="h-36 bg-kvt-950 rounded-xl p-3 border border-kvt-700/30 overflow-y-auto">
                        <template x-if="pipeLoading"><div class="text-center py-6 animate-pulse text-kvt-400 text-sm"><i class="fas fa-cog fa-spin mr-2"></i>Processing pipeline...</div></template>
                        <div x-show="pipeOutput && !pipeLoading" class="text-sm text-gray-300 whitespace-pre-wrap" x-html="renderMd(pipeOutput)"></div>
                    </div>
                </div>
            </div>

            {{-- Execution Log --}}
            <div x-show="pipeLog.length > 0" class="mt-4">
                <h4 class="text-xs text-gray-500 mb-2">Execution Log:</h4>
                <div class="space-y-1">
                    <template x-for="log in pipeLog" :key="log.step">
                        <div class="flex items-center gap-3 bg-kvt-800/30 rounded-lg px-3 py-2 text-xs">
                            <span :class="log.status === 'success' ? 'text-green-400' : 'text-red-400'"><i :class="log.status === 'success' ? 'fas fa-check' : 'fas fa-times'"></i></span>
                            <span class="text-gray-400">Step <span x-text="log.step"></span>:</span>
                            <span class="text-white font-semibold capitalize" x-text="log.action"></span>
                            <span class="text-gray-500">via</span>
                            <span class="text-kvt-400" x-text="log.provider"></span>
                            <span class="text-gray-600" x-text="log.duration_ms ? log.duration_ms + 'ms' : ''"></span>
                            <span class="text-gray-600" x-text="log.tokens ? log.tokens + ' tok' : ''"></span>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        {{-- Pipeline Presets --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
            <h3 class="text-white font-bold text-sm mb-3"><i class="fas fa-bookmark text-amber-400 mr-2"></i>Pipeline Presets</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <button @click="loadPreset('translate-summarize')" class="text-left p-3 border border-kvt-700/20 rounded-xl hover:bg-kvt-800/40 transition">
                    <div class="text-white font-semibold text-xs mb-1">🌐→📝 Translate + Summarize</div>
                    <div class="text-gray-500 text-[11px]">Terjemahkan lalu rangkum</div>
                </button>
                <button @click="loadPreset('review-rewrite')" class="text-left p-3 border border-kvt-700/20 rounded-xl hover:bg-kvt-800/40 transition">
                    <div class="text-white font-semibold text-xs mb-1">🔍→✍️ Review + Rewrite</div>
                    <div class="text-gray-500 text-[11px]">Review kode lalu tulis ulang</div>
                </button>
                <button @click="loadPreset('full-analysis')" class="text-left p-3 border border-kvt-700/20 rounded-xl hover:bg-kvt-800/40 transition">
                    <div class="text-white font-semibold text-xs mb-1">📊 Full Analysis</div>
                    <div class="text-gray-500 text-[11px]">Sentiment → Extract → Summarize</div>
                </button>
            </div>
        </div>
    </div>

    {{-- ===== TAB: N8N & INTEGRATIONS ===== --}}
    <div x-show="activeTab === 'integrations'" x-transition class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- n8n Panel --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-orange-500/10 rounded-xl flex items-center justify-center">
                        <i class="fas fa-network-wired text-orange-400"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-bold">n8n Workflow Automation</h3>
                        <p class="text-xs text-gray-500">Orkestrasi AI workflows yang kompleks</p>
                    </div>
                </div>

                <div class="space-y-3 mb-4">
                    @php $n8nConfig = config('ai.providers.n8n.workflows', []); @endphp
                    @foreach(['chat' => 'Chat Workflow', 'code_review' => 'Code Review', 'summarize' => 'Summarizer', 'translate' => 'Translator', 'custom' => 'Custom'] as $key => $label)
                    <div class="flex items-center justify-between p-3 bg-kvt-800/40 rounded-xl border border-kvt-700/20">
                        <span class="text-sm text-gray-300">{{ $label }}</span>
                        @if(!empty($n8nConfig[$key]))
                        <span class="text-xs text-green-400"><i class="fas fa-check-circle mr-1"></i>Connected</span>
                        @else
                        <span class="text-xs text-gray-500"><i class="fas fa-minus-circle mr-1"></i>Not set</span>
                        @endif
                    </div>
                    @endforeach
                </div>

                <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                    <h4 class="text-white font-semibold text-sm mb-2">Setup n8n:</h4>
                    <ol class="text-xs text-gray-400 space-y-2 list-decimal list-inside">
                        <li>Install n8n: <code class="text-kvt-400">npx n8n</code> atau Docker</li>
                        <li>Buat workflow dengan <b class="text-white">Webhook</b> trigger</li>
                        <li>Tambah node AI (OpenAI/Claude/Custom)</li>
                        <li>Copy webhook URL ke <code class="text-kvt-400">.env</code></li>
                        <li>Test via dashboard ini</li>
                    </ol>
                </div>
            </div>

            {{-- Claude / Anthropic Panel --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-purple-500/10 rounded-xl flex items-center justify-center">
                        <i class="fas fa-robot text-purple-400"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-bold">Claude / Anthropic</h3>
                        <p class="text-xs text-gray-500">Claude Sonnet 4 — AI reasoning terbaik</p>
                    </div>
                </div>

                <div class="space-y-3 mb-4">
                    <div class="p-3 bg-kvt-800/40 rounded-xl border border-kvt-700/20">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Status</span>
                            @if(!empty(config('ai.providers.claude.api_key')))
                            <span class="text-xs text-green-400"><i class="fas fa-check-circle mr-1"></i>API Key Set</span>
                            @else
                            <span class="text-xs text-gray-500"><i class="fas fa-key mr-1"></i>Perlu API Key</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-3 bg-kvt-800/40 rounded-xl border border-kvt-700/20">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Model</span>
                            <span class="text-xs text-kvt-400">{{ config('ai.providers.claude.model', 'claude-sonnet-4-20250514') }}</span>
                        </div>
                    </div>
                    <div class="p-3 bg-kvt-800/40 rounded-xl border border-kvt-700/20">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-300">Max Tokens</span>
                            <span class="text-xs text-gray-400">{{ config('ai.providers.claude.max_tokens', 4096) }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                    <h4 class="text-white font-semibold text-sm mb-2">Setup Claude:</h4>
                    <ol class="text-xs text-gray-400 space-y-2 list-decimal list-inside">
                        <li>Daftar di <code class="text-kvt-400">console.anthropic.com</code></li>
                        <li>Buat API Key</li>
                        <li>Set <code class="text-kvt-400">ANTHROPIC_API_KEY=sk-ant-...</code> di .env</li>
                        <li>Pilih Claude di provider selector</li>
                    </ol>
                </div>
            </div>
        </div>

        {{-- Other Integrations --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <h3 class="text-white font-bold mb-4"><i class="fas fa-puzzle-piece text-kvt-400 mr-2"></i>Integrasi Lainnya</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="border border-kvt-700/20 rounded-xl p-4 text-center">
                    <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center mx-auto mb-3"><i class="fas fa-server text-green-400"></i></div>
                    <h4 class="text-white font-semibold text-sm">Ollama</h4>
                    <p class="text-xs text-gray-500 mt-1">Run AI models locally</p>
                    <span class="inline-block mt-2 text-[10px] px-2 py-0.5 rounded-full {{ ($providers['ollama']['available'] ?? false) ? 'bg-green-500/10 text-green-400' : 'bg-gray-500/10 text-gray-500' }}">
                        {{ ($providers['ollama']['available'] ?? false) ? 'Online' : 'Offline' }}
                    </span>
                </div>
                <div class="border border-kvt-700/20 rounded-xl p-4 text-center">
                    <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mx-auto mb-3"><i class="fab fa-github text-blue-400"></i></div>
                    <h4 class="text-white font-semibold text-sm">GitHub API</h4>
                    <p class="text-xs text-gray-500 mt-1">Repo, Issues, PRs, Actions</p>
                    <span class="inline-block mt-2 text-[10px] px-2 py-0.5 rounded-full bg-green-500/10 text-green-400">Connected</span>
                </div>
                <div class="border border-kvt-700/20 rounded-xl p-4 text-center">
                    <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center mx-auto mb-3"><i class="fas fa-database text-amber-400"></i></div>
                    <h4 class="text-white font-semibold text-sm">PostgreSQL</h4>
                    <p class="text-xs text-gray-500 mt-1">Vector search & embeddings</p>
                    <span class="inline-block mt-2 text-[10px] px-2 py-0.5 rounded-full bg-green-500/10 text-green-400">Connected</span>
                </div>
                <div class="border border-kvt-700/20 rounded-xl p-4 text-center">
                    <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mx-auto mb-3"><i class="fas fa-webhook text-purple-400"></i></div>
                    <h4 class="text-white font-semibold text-sm">Webhooks</h4>
                    <p class="text-xs text-gray-500 mt-1">Custom event triggers</p>
                    <span class="inline-block mt-2 text-[10px] px-2 py-0.5 rounded-full bg-green-500/10 text-green-400">Ready</span>
                </div>
            </div>
        </div>

        {{-- API Documentation Quick --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <h3 class="text-white font-bold mb-4"><i class="fas fa-book text-kvt-400 mr-2"></i>API Endpoints</h3>
            <div class="space-y-2 font-mono text-xs">
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-green-500/20 text-green-400 rounded font-bold">POST</span><span class="text-gray-300">/admin/kuro-nexus/chat</span><span class="text-gray-500 ml-auto">Multi-provider AI chat</span></div>
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-green-500/20 text-green-400 rounded font-bold">POST</span><span class="text-gray-300">/admin/kuro-nexus/generate-code</span><span class="text-gray-500 ml-auto">AI code generation</span></div>
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-green-500/20 text-green-400 rounded font-bold">POST</span><span class="text-gray-300">/admin/kuro-nexus/translate</span><span class="text-gray-500 ml-auto">AI translation</span></div>
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-green-500/20 text-green-400 rounded font-bold">POST</span><span class="text-gray-300">/admin/kuro-nexus/summarize</span><span class="text-gray-500 ml-auto">AI summarization</span></div>
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-green-500/20 text-green-400 rounded font-bold">POST</span><span class="text-gray-300">/admin/kuro-nexus/sentiment</span><span class="text-gray-500 ml-auto">Sentiment analysis</span></div>
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-green-500/20 text-green-400 rounded font-bold">POST</span><span class="text-gray-300">/admin/kuro-nexus/tutor</span><span class="text-gray-500 ml-auto">AI tutor explain</span></div>
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-green-500/20 text-green-400 rounded font-bold">POST</span><span class="text-gray-300">/admin/kuro-nexus/pipeline</span><span class="text-gray-500 ml-auto">Run AI pipeline</span></div>
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-blue-500/20 text-blue-400 rounded font-bold">GET</span><span class="text-gray-300">/admin/kuro-nexus/api/providers</span><span class="text-gray-500 ml-auto">Provider status</span></div>
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-yellow-500/20 text-yellow-400 rounded font-bold">POST</span><span class="text-gray-300">/admin/kuro-nexus/n8n/trigger</span><span class="text-gray-500 ml-auto">Trigger n8n workflow</span></div>
                <div class="flex items-center gap-3 p-3 bg-kvt-800/40 rounded-xl"><span class="px-2 py-0.5 bg-yellow-500/20 text-yellow-400 rounded font-bold">POST</span><span class="text-gray-300">/admin/kuro-nexus/n8n/webhook</span><span class="text-gray-500 ml-auto">n8n webhook receiver</span></div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
function kuroNexus() {
    return {
        activeTab: 'chat',
        tabs: [
            { id: 'chat', label: 'AI Chat', icon: 'fas fa-robot', badge: null },
            { id: 'codegen', label: 'Code Gen', icon: 'fas fa-wand-magic-sparkles', badge: 'AI' },
            { id: 'translate', label: 'Translate', icon: 'fas fa-language', badge: '9' },
            { id: 'summarize', label: 'Summarize', icon: 'fas fa-compress-alt', badge: null },
            { id: 'sentiment', label: 'Sentiment', icon: 'fas fa-heart', badge: null },
            { id: 'tutor', label: 'AI Tutor', icon: 'fas fa-graduation-cap', badge: null },
            { id: 'pipeline', label: 'Pipeline', icon: 'fas fa-project-diagram', badge: null },
            { id: 'integrations', label: 'Integrations', icon: 'fas fa-puzzle-piece', badge: '{{ count(array_filter($providers, fn($p) => $p["available"])) }}' },
        ],

        // Providers
        providerList: @json($providers),
        csrfToken: document.querySelector('meta[name=csrf-token]')?.content || '',

        // Chat
        chatMessages: [],
        chatInput: '',
        chatLoading: false,
        chatProvider: '{{ config("ai.default", "openai") }}',
        chatContext: 'general',

        // Code Gen
        codeGenDesc: '',
        codeGenLang: 'PHP',
        codeGenFramework: 'Laravel',
        codeGenProvider: '',
        codeGenResult: '',
        codeGenLoading: false,

        // Translator
        transText: '',
        transFrom: 'auto',
        transTo: 'English',
        transResult: '',
        transLoading: false,

        // Summarizer
        sumText: '',
        sumMaxWords: 200,
        sumResult: '',
        sumLoading: false,

        // Sentiment
        sentText: '',
        sentResult: null,
        sentLoading: false,

        // Tutor
        tutorTopic: '',
        tutorLevel: 'beginner',
        tutorResult: '',
        tutorLoading: false,

        // Pipeline
        pipeSteps: [],
        pipeInput: '',
        pipeOutput: '',
        pipeLog: [],
        pipeLoading: false,

        // =================== METHODS ===================

        async sendChat() {
            const msg = this.chatInput.trim();
            if (!msg || this.chatLoading) return;
            this.chatMessages.push({ role: 'user', content: msg, time: new Date().toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit'}) });
            this.chatInput = '';
            this.chatLoading = true;
            this.scrollChat();

            try {
                const res = await fetch('{{ route("admin.kuro-nexus.chat") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                    body: JSON.stringify({ message: msg, provider: this.chatProvider, context: this.chatContext })
                });
                const data = await res.json();
                if (data.success) {
                    this.chatMessages.push(data.message);
                } else {
                    this.chatMessages.push({ role: 'assistant', content: data.error || 'Error', time: new Date().toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit'}) });
                }
            } catch (e) {
                this.chatMessages.push({ role: 'assistant', content: 'Koneksi gagal: ' + e.message, time: '' });
            }
            this.chatLoading = false;
            this.scrollChat();
        },

        sendQuick(q) { this.chatInput = q; this.sendChat(); },

        async resetChat() {
            if (!confirm('Reset semua chat?')) return;
            await fetch('{{ route("admin.kuro-nexus.chat.reset") }}', { method: 'POST', headers: { 'X-CSRF-TOKEN': this.csrfToken } });
            this.chatMessages = [];
        },

        scrollChat() {
            this.$nextTick(() => { const el = this.$refs.chatBox; if (el) el.scrollTop = el.scrollHeight; });
        },

        async doCodeGen() {
            if (!this.codeGenDesc.trim() || this.codeGenLoading) return;
            this.codeGenLoading = true; this.codeGenResult = '';
            try {
                const res = await fetch('{{ route("admin.kuro-nexus.generate-code") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                    body: JSON.stringify({ description: this.codeGenDesc, language: this.codeGenLang, framework: this.codeGenFramework, provider: this.codeGenProvider || undefined })
                });
                const data = await res.json();
                this.codeGenResult = data.success ? data.code : ('Error: ' + (data.error || 'unknown'));
            } catch (e) { this.codeGenResult = 'Error: ' + e.message; }
            this.codeGenLoading = false;
        },

        async doTranslate() {
            if (!this.transText.trim() || this.transLoading) return;
            this.transLoading = true; this.transResult = '';
            try {
                const res = await fetch('{{ route("admin.kuro-nexus.translate") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                    body: JSON.stringify({ text: this.transText, to: this.transTo, from: this.transFrom })
                });
                const data = await res.json();
                this.transResult = data.success ? data.translated : ('Error: ' + data.error);
            } catch (e) { this.transResult = 'Error: ' + e.message; }
            this.transLoading = false;
        },

        async doSummarize() {
            if (!this.sumText.trim() || this.sumLoading) return;
            this.sumLoading = true; this.sumResult = '';
            try {
                const res = await fetch('{{ route("admin.kuro-nexus.summarize") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                    body: JSON.stringify({ text: this.sumText, max_words: this.sumMaxWords })
                });
                const data = await res.json();
                this.sumResult = data.success ? data.summary : ('Error: ' + data.error);
            } catch (e) { this.sumResult = 'Error: ' + e.message; }
            this.sumLoading = false;
        },

        async doSentiment() {
            if (!this.sentText.trim() || this.sentLoading) return;
            this.sentLoading = true; this.sentResult = null;
            try {
                const res = await fetch('{{ route("admin.kuro-nexus.sentiment") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                    body: JSON.stringify({ text: this.sentText })
                });
                const data = await res.json();
                this.sentResult = data.success ? data.analysis : { sentiment: 'error', summary: data.error };
            } catch (e) { this.sentResult = { sentiment: 'error', summary: e.message }; }
            this.sentLoading = false;
        },

        async doTutor() {
            if (!this.tutorTopic.trim() || this.tutorLoading) return;
            this.tutorLoading = true; this.tutorResult = '';
            try {
                const res = await fetch('{{ route("admin.kuro-nexus.tutor") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                    body: JSON.stringify({ topic: this.tutorTopic, level: this.tutorLevel })
                });
                const data = await res.json();
                this.tutorResult = data.success ? data.explanation : ('Error: ' + data.error);
            } catch (e) { this.tutorResult = 'Error: ' + e.message; }
            this.tutorLoading = false;
        },

        // Pipeline
        addPipeStep() { this.pipeSteps.push({ action: 'translate', params: {}, provider: '' }); },

        stepEmoji(action) {
            return { translate: '🌐', summarize: '📝', review: '🔍', sentiment: '💖', rewrite: '✍️', extract: '📦', explain: '🎓', code_generate: '💻' }[action] || '⚙️';
        },

        async runPipeline() {
            if (!this.pipeInput.trim() || this.pipeSteps.length === 0 || this.pipeLoading) return;
            this.pipeLoading = true; this.pipeOutput = ''; this.pipeLog = [];
            try {
                const res = await fetch('{{ route("admin.kuro-nexus.pipeline") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                    body: JSON.stringify({ input: this.pipeInput, steps: this.pipeSteps })
                });
                const data = await res.json();
                this.pipeOutput = data.output || '';
                this.pipeLog = data.log || [];
            } catch (e) { this.pipeOutput = 'Error: ' + e.message; }
            this.pipeLoading = false;
        },

        loadPreset(name) {
            const presets = {
                'translate-summarize': [
                    { action: 'translate', params: { to: 'English' }, provider: '' },
                    { action: 'summarize', params: {}, provider: '' },
                ],
                'review-rewrite': [
                    { action: 'review', params: {}, provider: '' },
                    { action: 'rewrite', params: { tone: 'professional' }, provider: '' },
                ],
                'full-analysis': [
                    { action: 'sentiment', params: {}, provider: '' },
                    { action: 'extract', params: { fields: ['entities', 'topics'] }, provider: '' },
                    { action: 'summarize', params: {}, provider: '' },
                ],
            };
            this.pipeSteps = presets[name] || [];
        },

        // Helpers
        copyText(text) { navigator.clipboard.writeText(text); },

        renderMd(text) {
            if (!text) return '';
            return text
                .replace(/```(\w+)?\n([\s\S]*?)```/g, '<pre class="bg-kvt-950 rounded-lg p-3 my-2 overflow-x-auto text-xs"><code class="text-green-300">$2</code></pre>')
                .replace(/`([^`]+)`/g, '<code class="bg-kvt-800 px-1.5 py-0.5 rounded text-kvt-300 text-xs">$1</code>')
                .replace(/\*\*(.+?)\*\*/g, '<strong class="text-white">$1</strong>')
                .replace(/\*(.+?)\*/g, '<em>$1</em>')
                .replace(/^### (.+)$/gm, '<h4 class="text-kvt-400 font-bold mt-3 mb-1">$1</h4>')
                .replace(/^## (.+)$/gm, '<h3 class="text-white font-bold text-base mt-3 mb-1">$1</h3>')
                .replace(/^# (.+)$/gm, '<h2 class="text-white font-bold text-lg mt-3 mb-2">$1</h2>')
                .replace(/^- (.+)$/gm, '<div class="flex items-start gap-2 ml-2"><span class="text-kvt-400 mt-1">•</span><span>$1</span></div>')
                .replace(/\n/g, '<br>');
        },
    }
}
</script>
@endpush

@push('styles')
<style>
textarea { tab-size: 4; -moz-tab-size: 4; }
textarea:focus { outline: none; }
pre code { font-family: 'JetBrains Mono', 'Fira Code', monospace; }
</style>
@endpush
