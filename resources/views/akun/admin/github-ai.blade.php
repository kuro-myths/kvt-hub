@extends('tata-letak.dasbor')
@section('judul', 'GitHub AI Hub - Admin KVT Hub')
@section('judul-halaman', 'GitHub AI Hub')

@section('konten')
<div x-data="githubAI()" class="max-w-7xl mx-auto px-4 py-8 space-y-8">

    {{-- ===== HEADER ===== --}}
    <div class="bg-gradient-to-r from-kvt-900/90 via-purple-900/40 to-kvt-900/90 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-down">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-kvt-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg shadow-kvt-500/30">
                        <i class="fab fa-github text-3xl text-white"></i>
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center border-2 border-kvt-900">
                        <i class="fas fa-robot text-xs text-white"></i>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">GitHub AI Hub</h1>
                    <p class="text-gray-400 text-sm mt-1">
                        <a href="{{ $ghRepo['html_url'] }}" target="_blank" class="hover:text-kvt-400 transition">
                            <i class="fab fa-github mr-1"></i>{{ $ghRepo['full_name'] }}
                        </a>
                        <span class="mx-2">•</span>
                        AI-powered interactive explorer
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-2 flex-wrap">
                <span class="px-3 py-1.5 bg-green-500/20 text-green-400 rounded-lg text-sm font-semibold"><i class="fas fa-circle text-xs mr-1"></i>{{ ucfirst($ghRepo['visibility']) }}</span>
                <span class="px-3 py-1.5 bg-yellow-500/20 text-yellow-400 rounded-lg text-sm font-semibold"><i class="fas fa-star mr-1"></i>{{ $ghRepo['stars'] }}</span>
                <span class="px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg text-sm font-semibold"><i class="fas fa-code-branch mr-1"></i>{{ $ghRepo['forks'] }}</span>
                <span class="px-3 py-1.5 bg-red-500/20 text-red-400 rounded-lg text-sm font-semibold"><i class="fas fa-exclamation-circle mr-1"></i>{{ $ghRepo['open_issues'] }} issues</span>
                <span class="px-3 py-1.5 bg-kvt-800 text-kvt-300 rounded-lg text-sm"><i class="fas fa-balance-scale mr-1"></i>{{ $ghRepo['license'] }}</span>
            </div>
        </div>
    </div>

    {{-- ===== TAB NAVIGATION ===== --}}
    <div class="flex items-center gap-1 border-b border-kvt-700/30 pb-0 overflow-x-auto" data-aos="fade-up">
        <template x-for="tab in tabs" :key="tab.id">
            <button @click="activeTab = tab.id" :class="activeTab === tab.id ? 'border-kvt-500 text-kvt-400 bg-kvt-900/40' : 'border-transparent text-gray-400 hover:text-white'" class="tab-btn px-5 py-3 text-sm font-semibold rounded-t-lg border-b-2 transition whitespace-nowrap">
                <i :class="tab.icon" class="mr-2"></i><span x-text="tab.label"></span>
                <template x-if="tab.badge">
                    <span class="ml-1 px-1.5 py-0.5 bg-kvt-700 text-kvt-300 rounded text-xs" x-text="tab.badge"></span>
                </template>
            </button>
        </template>
    </div>

    {{-- ===== TAB 1: AI CHAT ===== --}}
    <div x-show="activeTab === 'chat'" x-transition class="space-y-4">
        {{-- Context selector --}}
        <div class="flex flex-wrap gap-2 mb-4">
            <template x-for="ctx in chatContexts" :key="ctx.id">
                <button @click="chatContext = ctx.id" :class="chatContext === ctx.id ? 'bg-kvt-500 text-white' : 'bg-kvt-900/60 text-gray-400 hover:text-white hover:bg-kvt-800'" class="px-4 py-2 rounded-xl text-sm font-medium transition flex items-center gap-2">
                    <i :class="ctx.icon"></i><span x-text="ctx.label"></span>
                </button>
            </template>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Chat area --}}
            <div class="lg:col-span-2 bg-kvt-900/80 border border-kvt-700/30 rounded-2xl flex flex-col" style="height: 600px;">
                {{-- Chat header --}}
                <div class="flex items-center justify-between px-6 py-4 border-b border-kvt-700/30">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-kvt-500 to-purple-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-robot text-white"></i>
                        </div>
                        <div>
                            <span class="text-white font-semibold">Kuro AI — GitHub Expert</span>
                            <div class="text-xs text-green-400"><i class="fas fa-circle text-[8px] mr-1"></i>Online • GPT-4o-mini</div>
                        </div>
                    </div>
                    <button @click="resetChat()" class="text-gray-500 hover:text-red-400 transition" title="Hapus Riwayat">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>

                {{-- Messages --}}
                <div class="flex-1 overflow-y-auto px-6 py-4 space-y-4" id="chatMessages" x-ref="chatMessages">
                    {{-- Welcome message --}}
                    <template x-if="messages.length === 0 && !chatLoading">
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-gradient-to-br from-kvt-500/20 to-purple-600/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-robot text-3xl text-kvt-400"></i>
                            </div>
                            <h3 class="text-white font-bold text-lg mb-2">Hai! Aku Kuro 🐱</h3>
                            <p class="text-gray-400 text-sm max-w-md mx-auto mb-6">
                                Aku bisa membantu kamu memahami KVT Hub — arsitektur, fitur, alur kerja, GitHub, atau apapun!
                            </p>
                            <div class="flex flex-wrap justify-center gap-2">
                                <button @click="sendQuickQuestion('Apa itu KVT Hub dan apa saja fitur utamanya?')" class="px-3 py-2 bg-kvt-800 hover:bg-kvt-700 text-kvt-300 rounded-xl text-xs transition">🏠 Tentang KVT Hub</button>
                                <button @click="sendQuickQuestion('Jelaskan arsitektur dan alur kerja KVT Hub secara detail')" class="px-3 py-2 bg-kvt-800 hover:bg-kvt-700 text-kvt-300 rounded-xl text-xs transition">🏗️ Arsitektur</button>
                                <button @click="sendQuickQuestion('Apa itu GitHub Packages dan bagaimana cara menggunakannya?')" class="px-3 py-2 bg-kvt-800 hover:bg-kvt-700 text-kvt-300 rounded-xl text-xs transition">📦 GitHub Packages</button>
                                <button @click="sendQuickQuestion('Bahasa pemrograman apa saja yang digunakan di KVT Hub?')" class="px-3 py-2 bg-kvt-800 hover:bg-kvt-700 text-kvt-300 rounded-xl text-xs transition">💻 Bahasa Pemrograman</button>
                                <button @click="sendQuickQuestion('Bagaimana cara deploy KVT Hub ke production?')" class="px-3 py-2 bg-kvt-800 hover:bg-kvt-700 text-kvt-300 rounded-xl text-xs transition">🚀 Deployment</button>
                                <button @click="sendQuickQuestion('Bagaimana cara berkontribusi ke repository KVT Hub?')" class="px-3 py-2 bg-kvt-800 hover:bg-kvt-700 text-kvt-300 rounded-xl text-xs transition">🤝 Kontribusi</button>
                            </div>
                        </div>
                    </template>

                    {{-- Message bubble --}}
                    <template x-for="msg in messages" :key="msg.id || msg.time">
                        <div :class="msg.role === 'user' ? 'flex justify-end' : 'flex justify-start'">
                            <div :class="msg.role === 'user' ? 'bg-kvt-600 text-white rounded-2xl rounded-br-md max-w-[80%]' : 'bg-kvt-800/60 text-gray-200 rounded-2xl rounded-bl-md max-w-[85%] border border-kvt-700/30'" class="px-4 py-3 text-sm">
                                <div x-html="renderMarkdown(msg.content)"></div>
                                <div class="text-[10px] mt-2 opacity-50" x-text="msg.time"></div>
                            </div>
                        </div>
                    </template>

                    {{-- Typing indicator --}}
                    <template x-if="chatLoading">
                        <div class="flex justify-start">
                            <div class="bg-kvt-800/60 text-gray-400 rounded-2xl rounded-bl-md px-4 py-3 border border-kvt-700/30">
                                <div class="flex items-center gap-1">
                                    <div class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                                    <div class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                                    <div class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Input area --}}
                <div class="px-6 py-4 border-t border-kvt-700/30">
                    <form @submit.prevent="sendMessage()" class="flex gap-3">
                        <input x-model="chatInput" type="text" :disabled="chatLoading" placeholder="Tanya apapun tentang KVT Hub, GitHub, arsitektur..." class="flex-1 bg-kvt-800/60 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none transition disabled:opacity-50">
                        <button type="submit" :disabled="chatLoading || !chatInput.trim()" class="px-6 py-3 bg-gradient-to-r from-kvt-500 to-purple-600 text-white rounded-xl font-semibold text-sm hover:shadow-lg hover:shadow-kvt-500/30 transition disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Sidebar: Quick Info --}}
            <div class="space-y-4">
                {{-- Repo Summary --}}
                <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
                    <h3 class="text-white font-bold flex items-center gap-2 mb-4"><i class="fab fa-github text-kvt-400"></i> Repository</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-gray-400">Branch</span><code class="text-kvt-400">{{ $ghRepo['default_branch'] }}</code></div>
                        <div class="flex justify-between"><span class="text-gray-400">Bahasa</span><span class="text-white">{{ $ghRepo['language'] }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Ukuran</span><span class="text-white">{{ number_format($ghRepo['size_kb']) }} KB</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Commits</span><span class="text-white">{{ count($ghCommits) }}+</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Branch</span><span class="text-white">{{ count($ghBranches) }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Kontributor</span><span class="text-white">{{ count($ghContributors) }}</span></div>
                    </div>
                    @if(!empty($ghTopics))
                    <div class="mt-4 flex flex-wrap gap-1">
                        @foreach($ghTopics as $topic)
                        <span class="px-2 py-1 bg-kvt-700/50 text-kvt-300 rounded text-xs">#{{ $topic }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- Languages breakdown --}}
                <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
                    <h3 class="text-white font-bold flex items-center gap-2 mb-4"><i class="fas fa-code text-purple-400"></i> Bahasa</h3>
                    @php $totalBytes = array_sum($ghLanguages); @endphp
                    @if($totalBytes > 0)
                        {{-- Language bar --}}
                        <div class="flex h-3 rounded-full overflow-hidden mb-3 bg-kvt-800">
                            @php
                                $langColors = ['Blade' => '#F7523F', 'PHP' => '#777BB4', 'JavaScript' => '#F7DF1E', 'CSS' => '#563D7C', 'Shell' => '#89E051', 'PowerShell' => '#012456', 'HTML' => '#E34F26'];
                                $idx = 0;
                            @endphp
                            @foreach($ghLanguages as $lang => $bytes)
                                @php $pct = round(($bytes / $totalBytes) * 100, 1); @endphp
                                <div style="width: {{ $pct }}%; background: {{ $langColors[$lang] ?? ['#6366f1','#8b5cf6','#a78bfa','#c4b5fd','#818cf8'][$idx % 5] }}" title="{{ $lang }}: {{ $pct }}%"></div>
                                @php $idx++; @endphp
                            @endforeach
                        </div>
                        <div class="space-y-1 text-xs">
                            @foreach($ghLanguages as $lang => $bytes)
                                @php $pct = round(($bytes / $totalBytes) * 100, 1); @endphp
                                <div class="flex justify-between items-center">
                                    <span class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full" style="background: {{ $langColors[$lang] ?? '#6366f1' }}"></span>
                                        <span class="text-gray-300">{{ $lang }}</span>
                                    </span>
                                    <span class="text-gray-500">{{ $pct }}%</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">Tidak ada data bahasa.</p>
                    @endif
                </div>

                {{-- Contributors --}}
                <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
                    <h3 class="text-white font-bold flex items-center gap-2 mb-4"><i class="fas fa-users text-green-400"></i> Kontributor</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($ghContributors as $contrib)
                        <a href="{{ $contrib['html_url'] }}" target="_blank" class="group relative" title="{{ $contrib['login'] }} ({{ $contrib['contributions'] }} commits)">
                            <img src="{{ $contrib['avatar'] }}" alt="{{ $contrib['login'] }}" class="w-10 h-10 rounded-full border-2 border-kvt-700 group-hover:border-kvt-500 transition">
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== TAB 2: GITHUB PACKAGES ===== --}}
    <div x-show="activeTab === 'packages'" x-transition class="space-y-6">
        {{-- Packages Education --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- What is GitHub Packages --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-box-open text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-lg">Apa itu GitHub Packages?</h3>
                        <p class="text-gray-400 text-sm">Software package hosting oleh GitHub</p>
                    </div>
                </div>
                <div class="prose prose-sm prose-invert text-gray-300 space-y-3">
                    <p><strong>GitHub Packages</strong> adalah layanan hosting paket perangkat lunak yang terintegrasi langsung dengan GitHub. Memungkinkan developer mempublikasikan, menyimpan, dan menggunakan paket bersama kode sumber.</p>
                    <div class="bg-kvt-800/60 rounded-xl p-4 space-y-2">
                        <h4 class="text-kvt-400 font-semibold mb-2">Keuntungan:</h4>
                        <ul class="space-y-1.5">
                            <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i> Terintegrasi penuh dengan GitHub workflow</li>
                            <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i> Support permissions & visibility (public/private)</li>
                            <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i> Automatic versioning dengan GitHub releases</li>
                            <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i> CI/CD deployment via GitHub Actions</li>
                            <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i> Free untuk public repos, 500MB free untuk private</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Package Types --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-4"><i class="fas fa-cubes text-amber-400 mr-2"></i>Tipe Paket yang Didukung</h3>
                <div class="grid grid-cols-2 gap-3">
                    @php
                        $pkgTypes = [
                            ['npm', 'fab fa-npm', 'text-red-400', 'bg-red-500/10', 'JavaScript / Node.js packages'],
                            ['Docker', 'fab fa-docker', 'text-blue-400', 'bg-blue-500/10', 'Container images'],
                            ['Maven', 'fab fa-java', 'text-orange-400', 'bg-orange-500/10', 'Java / Kotlin packages'],
                            ['NuGet', 'fab fa-microsoft', 'text-purple-400', 'bg-purple-500/10', '.NET packages'],
                            ['RubyGems', 'fas fa-gem', 'text-red-300', 'bg-red-400/10', 'Ruby packages'],
                            ['Composer', 'fab fa-php', 'text-violet-400', 'bg-violet-500/10', 'PHP packages'],
                        ];
                    @endphp
                    @foreach($pkgTypes as [$name, $icon, $color, $bg, $desc])
                    <div class="border border-kvt-700/30 rounded-xl p-4 {{ $bg }}">
                        <i class="{{ $icon }} {{ $color }} text-2xl mb-2"></i>
                        <h4 class="text-white font-semibold text-sm">{{ $name }}</h4>
                        <p class="text-gray-500 text-xs mt-1">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Current Packages Status --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <h3 class="text-white font-bold text-lg mb-4"><i class="fas fa-box text-kvt-400 mr-2"></i>Packages dari {{ $ghRepo['full_name'] }}</h3>
            @if(count($ghPackages) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($ghPackages as $pkg)
                    <a href="{{ $pkg['html_url'] }}" target="_blank" class="border border-kvt-700/30 rounded-xl p-4 hover:bg-kvt-800/40 transition">
                        <div class="flex items-center gap-3 mb-2">
                            <i class="fas fa-box text-kvt-400"></i>
                            <span class="text-white font-semibold">{{ $pkg['name'] }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <span class="px-2 py-0.5 bg-kvt-800 rounded">{{ $pkg['package_type'] }}</span>
                            <span>{{ $pkg['visibility'] }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-kvt-800/50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box-open text-2xl text-gray-600"></i>
                    </div>
                    <p class="text-gray-400 font-medium mb-2">Belum ada packages yang dipublikasikan</p>
                    <p class="text-gray-600 text-sm max-w-lg mx-auto mb-6">Repository ini belum memiliki published packages. Berikut cara membuat package pertama untuk KVT Hub.</p>

                    {{-- How to create packages --}}
                    <div class="text-left max-w-2xl mx-auto space-y-4">
                        {{-- npm example --}}
                        <div class="bg-kvt-800/40 border border-kvt-700/30 rounded-xl p-4">
                            <h4 class="text-amber-400 font-semibold text-sm mb-3"><i class="fab fa-npm mr-2"></i>Buat npm Package</h4>
                            <pre class="bg-kvt-950 rounded-lg p-3 text-xs text-gray-300 overflow-x-auto"><code># 1. Login ke GitHub Packages
npm login --scope=@kuro-myths --registry=https://npm.pkg.github.com

# 2. Tambahkan di package.json:
"publishConfig": {
  "@kuro-myths:registry": "https://npm.pkg.github.com"
}

# 3. Publish
npm publish</code></pre>
                        </div>

                        {{-- Docker example --}}
                        <div class="bg-kvt-800/40 border border-kvt-700/30 rounded-xl p-4">
                            <h4 class="text-blue-400 font-semibold text-sm mb-3"><i class="fab fa-docker mr-2"></i>Buat Docker Image</h4>
                            <pre class="bg-kvt-950 rounded-lg p-3 text-xs text-gray-300 overflow-x-auto"><code># 1. Login ke GitHub Container Registry
echo $CR_PAT | docker login ghcr.io -u kuro-myths --password-stdin

# 2. Build & tag
docker build -t ghcr.io/kuro-myths/kvt-hub:latest .

# 3. Push
docker push ghcr.io/kuro-myths/kvt-hub:latest</code></pre>
                        </div>

                        {{-- Composer example --}}
                        <div class="bg-kvt-800/40 border border-kvt-700/30 rounded-xl p-4">
                            <h4 class="text-violet-400 font-semibold text-sm mb-3"><i class="fab fa-php mr-2"></i>Buat Composer (PHP) Package</h4>
                            <pre class="bg-kvt-950 rounded-lg p-3 text-xs text-gray-300 overflow-x-auto"><code># composer.json — tambahkan repository
{
  "repositories": [{
    "type": "vcs",
    "url": "https://github.com/kuro-myths/kvt-hub"
  }]
}

# Install dari GitHub
composer require kuro-myths/kvt-hub</code></pre>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Packages Use Case for KVT Hub --}}
        <div class="bg-gradient-to-r from-kvt-900/80 to-purple-900/30 border border-kvt-700/30 rounded-2xl p-6">
            <h3 class="text-white font-bold text-lg mb-4"><i class="fas fa-lightbulb text-yellow-400 mr-2"></i>Ide Packages untuk KVT Hub</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-kvt-800/40 rounded-xl p-4 border border-kvt-700/20">
                    <i class="fab fa-npm text-red-400 text-xl mb-3"></i>
                    <h4 class="text-white font-semibold mb-1">@kuro-myths/kvt-ui</h4>
                    <p class="text-gray-400 text-xs">Komponen UI reusable (Alpine.js + Tailwind) yang bisa dipakai di project lain. Button, modal, card, form, dll.</p>
                </div>
                <div class="bg-kvt-800/40 rounded-xl p-4 border border-kvt-700/20">
                    <i class="fab fa-docker text-blue-400 text-xl mb-3"></i>
                    <h4 class="text-white font-semibold mb-1">ghcr.io/kuro-myths/kvt-hub</h4>
                    <p class="text-gray-400 text-xs">Docker image siap deploy. Berisi PHP, NGINX, PostgreSQL config untuk one-click deployment.</p>
                </div>
                <div class="bg-kvt-800/40 rounded-xl p-4 border border-kvt-700/20">
                    <i class="fab fa-php text-violet-400 text-xl mb-3"></i>
                    <h4 class="text-white font-semibold mb-1">kuro-myths/kvt-sdk</h4>
                    <p class="text-gray-400 text-xs">PHP SDK untuk mengakses KVT Hub API dari aplikasi lain. Auth, data siswa, kelas, nilai.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== TAB 3: ISSUES & PRs ===== --}}
    <div x-show="activeTab === 'issues'" x-transition class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Issues --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-4"><i class="fas fa-exclamation-circle text-green-400 mr-2"></i>Issues ({{ count($ghIssues) }})</h3>
                @if(count($ghIssues) > 0)
                <div class="space-y-3 max-h-[500px] overflow-y-auto">
                    @foreach($ghIssues as $issue)
                    <a href="{{ $issue['html_url'] }}" target="_blank" class="block border border-kvt-700/30 rounded-xl p-4 hover:bg-kvt-800/40 transition">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-dot-circle {{ $issue['state'] === 'open' ? 'text-green-400' : 'text-purple-400' }} mt-1"></i>
                            <div class="flex-1 min-w-0">
                                <div class="text-white font-medium text-sm truncate">#{{ $issue['number'] }} {{ $issue['title'] }}</div>
                                <div class="flex items-center gap-2 mt-1 flex-wrap">
                                    <span class="text-xs px-2 py-0.5 rounded {{ $issue['state'] === 'open' ? 'bg-green-500/20 text-green-400' : 'bg-purple-500/20 text-purple-400' }}">{{ $issue['state'] }}</span>
                                    @foreach($issue['labels'] as $label)
                                    <span class="text-xs px-2 py-0.5 bg-kvt-700/50 text-kvt-300 rounded">{{ $label }}</span>
                                    @endforeach
                                    @if($issue['comments'] > 0)
                                    <span class="text-xs text-gray-500"><i class="fas fa-comment mr-1"></i>{{ $issue['comments'] }}</span>
                                    @endif
                                </div>
                                <div class="text-xs text-gray-500 mt-1">by {{ $issue['author'] }} • {{ \Carbon\Carbon::parse($issue['created_at'])->diffForHumans() }}</div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-check-circle text-3xl text-green-500 mb-3"></i>
                    <p>Tidak ada issues!</p>
                </div>
                @endif
            </div>

            {{-- Pull Requests --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-4"><i class="fas fa-code-branch text-blue-400 mr-2"></i>Pull Requests ({{ count($ghPulls) }})</h3>
                @if(count($ghPulls) > 0)
                <div class="space-y-3 max-h-[500px] overflow-y-auto">
                    @foreach($ghPulls as $pr)
                    <a href="{{ $pr['html_url'] }}" target="_blank" class="block border border-kvt-700/30 rounded-xl p-4 hover:bg-kvt-800/40 transition">
                        <div class="flex items-start gap-3">
                            @if($pr['merged_at'])
                                <i class="fas fa-code-branch text-purple-400 mt-1"></i>
                            @elseif($pr['state'] === 'open')
                                <i class="fas fa-code-branch text-green-400 mt-1"></i>
                            @else
                                <i class="fas fa-code-branch text-red-400 mt-1"></i>
                            @endif
                            <div class="flex-1 min-w-0">
                                <div class="text-white font-medium text-sm truncate">#{{ $pr['number'] }} {{ $pr['title'] }}</div>
                                <div class="flex items-center gap-2 mt-1">
                                    @if($pr['merged_at'])
                                        <span class="text-xs px-2 py-0.5 bg-purple-500/20 text-purple-400 rounded">merged</span>
                                    @elseif($pr['draft'])
                                        <span class="text-xs px-2 py-0.5 bg-gray-500/20 text-gray-400 rounded">draft</span>
                                    @else
                                        <span class="text-xs px-2 py-0.5 {{ $pr['state'] === 'open' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }} rounded">{{ $pr['state'] }}</span>
                                    @endif
                                </div>
                                <div class="text-xs text-gray-500 mt-1">by {{ $pr['author'] }} • {{ \Carbon\Carbon::parse($pr['created_at'])->diffForHumans() }}</div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-code-branch text-3xl text-blue-500 mb-3"></i>
                    <p>Tidak ada pull requests.</p>
                </div>
                @endif
            </div>
        </div>

        {{-- Releases --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <h3 class="text-white font-bold text-lg mb-4"><i class="fas fa-tag text-amber-400 mr-2"></i>Releases</h3>
            @if(count($ghReleases) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($ghReleases as $rel)
                <a href="{{ $rel['html_url'] }}" target="_blank" class="border border-kvt-700/30 rounded-xl p-4 hover:bg-kvt-800/40 transition">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-tag text-amber-400"></i>
                        <span class="text-white font-semibold">{{ $rel['tag_name'] }}</span>
                        @if($rel['prerelease']) <span class="text-xs px-2 py-0.5 bg-yellow-500/20 text-yellow-400 rounded">pre-release</span> @endif
                    </div>
                    <p class="text-gray-400 text-xs truncate">{{ $rel['name'] }}</p>
                    <p class="text-gray-600 text-xs mt-1">{{ $rel['author'] }} • {{ \Carbon\Carbon::parse($rel['published_at'])->diffForHumans() }}</p>
                </a>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <div class="w-14 h-14 bg-kvt-800/50 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-tag text-2xl text-gray-600"></i>
                </div>
                <p class="text-gray-400 mb-2">Belum ada release yang dipublikasikan</p>
                <p class="text-gray-600 text-sm">Buat release pertama di <a href="https://github.com/{{ $ghRepo['full_name'] }}/releases/new" target="_blank" class="text-kvt-400 hover:underline">GitHub</a></p>
            </div>
            @endif
        </div>
    </div>

    {{-- ===== TAB 4: LANGUAGE SHOWCASE & CODE RUNNER ===== --}}
    <div x-show="activeTab === 'languages'" x-transition class="space-y-6">
        {{-- Language Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($languageShowcase as $idx => $lang)
            <button @click="selectLanguage({{ $idx }})" :class="selectedLang === {{ $idx }} ? 'ring-2 ring-kvt-500 bg-kvt-800/60' : 'hover:bg-kvt-800/40'" class="text-left bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 transition">
                <div class="flex items-center gap-3 mb-2">
                    <i class="{{ $lang['icon'] }}" style="color: {{ $lang['color'] }}; font-size: 1.5rem;"></i>
                    <span class="text-white font-bold">{{ $lang['name'] }}</span>
                </div>
                <p class="text-gray-400 text-xs leading-relaxed">{{ $lang['description'] }}</p>
                <div class="mt-2 flex items-center gap-2">
                    @if($lang['runnable'])
                    <span class="text-[10px] px-2 py-0.5 bg-green-500/20 text-green-400 rounded-full"><i class="fas fa-play mr-1"></i>Runnable</span>
                    @else
                    <span class="text-[10px] px-2 py-0.5 bg-gray-500/20 text-gray-400 rounded-full"><i class="fas fa-eye mr-1"></i>Display</span>
                    @endif
                    <span class="text-[10px] text-gray-600">{{ $lang['mode'] }}</span>
                </div>
            </button>
            @endforeach
        </div>

        {{-- Code Editor & Runner --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
            {{-- Editor Header --}}
            <div class="flex items-center justify-between px-5 py-3 bg-kvt-800/60 border-b border-kvt-700/30">
                <div class="flex items-center gap-3">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                    <span class="text-white font-semibold text-sm" x-text="currentLang.name || 'Select Language'"></span>
                    <span class="text-gray-600 text-xs" x-text="currentLang.slug || ''"></span>
                </div>
                <div class="flex items-center gap-2">
                    <button @click="resetCode()" class="px-3 py-1.5 bg-kvt-700/50 text-gray-400 hover:text-white rounded-lg text-xs transition" title="Reset">
                        <i class="fas fa-undo mr-1"></i>Reset
                    </button>
                    <button @click="copyCode()" class="px-3 py-1.5 bg-kvt-700/50 text-gray-400 hover:text-white rounded-lg text-xs transition" title="Copy">
                        <i class="fas fa-copy mr-1"></i>Copy
                    </button>
                    <template x-if="currentLang.runnable">
                        <button @click="runCode()" :disabled="codeRunning" class="px-4 py-1.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg text-xs font-semibold hover:shadow-lg transition disabled:opacity-50">
                            <i :class="codeRunning ? 'fas fa-spinner fa-spin' : 'fas fa-play'" class="mr-1"></i>
                            <span x-text="codeRunning ? 'Running...' : 'Jalankan'"></span>
                        </button>
                    </template>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2">
                {{-- Code area --}}
                <div class="relative border-r border-kvt-700/30">
                    <div class="absolute top-2 left-3 text-xs text-gray-600 font-mono select-none z-10" style="pointer-events:none;">
                        <template x-for="(line, i) in codeLines" :key="i">
                            <div class="leading-6 text-right pr-3" x-text="i + 1" style="min-width: 2rem;"></div>
                        </template>
                    </div>
                    <textarea x-model="codeContent" @input="updateLines()" spellcheck="false" class="w-full font-mono text-sm text-green-300 bg-kvt-950 p-3 pl-14 outline-none resize-none leading-6 min-h-[400px]" :style="'height:' + Math.max(400, codeLines.length * 24 + 40) + 'px'"></textarea>
                </div>

                {{-- Output area --}}
                <div class="bg-kvt-950 min-h-[400px] flex flex-col">
                    <div class="px-4 py-2 bg-kvt-900/60 border-b border-kvt-700/30 text-xs text-gray-400 flex items-center justify-between">
                        <span><i class="fas fa-terminal mr-1"></i>Output</span>
                        <template x-if="codeTime > 0">
                            <span class="text-kvt-400"><i class="fas fa-clock mr-1"></i><span x-text="codeTime + 'ms'"></span></span>
                        </template>
                    </div>
                    <div class="flex-1 p-4 font-mono text-sm overflow-auto">
                        <template x-if="codeOutput">
                            <pre class="text-gray-300 whitespace-pre-wrap" x-text="codeOutput"></pre>
                        </template>
                        <template x-if="codeError">
                            <pre class="text-red-400 whitespace-pre-wrap" x-text="codeError"></pre>
                        </template>
                        <template x-if="!codeOutput && !codeError">
                            <div class="text-gray-600 text-center py-12">
                                <i class="fas fa-terminal text-2xl mb-2"></i>
                                <p>Klik "Jalankan" untuk melihat output</p>
                            </div>
                        </template>
                    </div>
                    {{-- HTML Preview iframe --}}
                    <template x-if="currentLang.mode === 'preview' && htmlPreview">
                        <div class="border-t border-kvt-700/30">
                            <div class="px-4 py-2 bg-kvt-900/60 text-xs text-gray-400"><i class="fas fa-eye mr-1"></i>Preview</div>
                            <iframe :srcdoc="htmlPreview" class="w-full bg-white" style="height: 300px;" sandbox="allow-scripts"></iframe>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== TAB 5: COMMITS ===== --}}
    <div x-show="activeTab === 'commits'" x-transition>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <h3 class="text-white font-bold text-lg mb-4"><i class="fas fa-history text-kvt-400 mr-2"></i>Commit Terbaru</h3>
            <div class="space-y-3">
                @foreach($ghCommits as $commit)
                <a href="{{ $commit['html_url'] }}" target="_blank" class="flex items-start gap-4 p-4 border border-kvt-700/20 rounded-xl hover:bg-kvt-800/40 transition">
                    @if($commit['avatar'])
                    <img src="{{ $commit['avatar'] }}" alt="{{ $commit['author'] }}" class="w-10 h-10 rounded-full border border-kvt-700">
                    @else
                    <div class="w-10 h-10 rounded-full bg-kvt-700 flex items-center justify-center"><i class="fas fa-user text-gray-500"></i></div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-medium truncate">{{ explode("\n", $commit['message'])[0] }}</p>
                        <div class="flex items-center gap-3 mt-1 text-xs text-gray-500">
                            <span class="text-kvt-400">{{ $commit['author'] }}</span>
                            <code class="bg-kvt-800 px-1.5 py-0.5 rounded text-kvt-300">{{ $commit['sha'] }}</code>
                            <span>{{ \Carbon\Carbon::parse($commit['date'])->diffForHumans() }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ===== TAB 6: WORKFLOWS / CI/CD ===== --}}
    <div x-show="activeTab === 'workflows'" x-transition>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <h3 class="text-white font-bold text-lg mb-4"><i class="fas fa-cogs text-orange-400 mr-2"></i>GitHub Actions / Workflows</h3>
            @if(count($ghWorkflows) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($ghWorkflows as $wf)
                <div class="border border-kvt-700/30 rounded-xl p-4">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-cog {{ $wf['state'] === 'active' ? 'text-green-400' : 'text-gray-500' }}"></i>
                        <div>
                            <span class="text-white font-semibold">{{ $wf['name'] }}</span>
                            <span class="text-xs text-gray-500 ml-2">{{ $wf['state'] }}</span>
                        </div>
                    </div>
                    <div class="text-xs text-gray-600 mt-2 font-mono">{{ $wf['path'] }}</div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <i class="fas fa-cogs text-3xl text-gray-600 mb-3"></i>
                <p class="text-gray-400 mb-2">Belum ada GitHub Actions workflow</p>
                <p class="text-gray-600 text-sm">Tambahkan file <code class="text-kvt-400">.github/workflows/ci.yml</code> untuk memulai CI/CD</p>
                <div class="mt-6 text-left max-w-lg mx-auto bg-kvt-800/40 border border-kvt-700/30 rounded-xl p-4">
                    <h4 class="text-kvt-400 font-semibold text-sm mb-2">Contoh workflow untuk KVT Hub:</h4>
                    <pre class="bg-kvt-950 rounded-lg p-3 text-xs text-gray-300 overflow-x-auto"><code>name: KVT Hub CI
on: [push, pull_request]
jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
      - run: composer install --no-progress
      - run: php artisan test</code></pre>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>

@endsection

@push('scripts')
{{-- Pyodide for Python execution --}}
<script src="https://cdn.jsdelivr.net/pyodide/v0.25.0/full/pyodide.js" defer></script>
{{-- sql.js for SQL execution --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sql.js/1.10.0/sql-wasm.js" defer></script>

<script>
function githubAI() {
    const langShowcase = @json($languageShowcase);

    return {
        // Tab state
        activeTab: 'chat',
        tabs: [
            { id: 'chat', label: 'AI Chat', icon: 'fas fa-robot', badge: null },
            { id: 'packages', label: 'Packages', icon: 'fas fa-box', badge: '{{ count($ghPackages) ?: "info" }}' },
            { id: 'issues', label: 'Issues & PRs', icon: 'fas fa-exclamation-circle', badge: '{{ count($ghIssues) + count($ghPulls) }}' },
            { id: 'languages', label: 'Code Runner', icon: 'fas fa-code', badge: '{{ count($languageShowcase) }}' },
            { id: 'commits', label: 'Commits', icon: 'fas fa-history', badge: '{{ count($ghCommits) }}' },
            { id: 'workflows', label: 'CI/CD', icon: 'fas fa-cogs', badge: '{{ count($ghWorkflows) ?: "0" }}' },
        ],

        // Chat state
        messages: [],
        chatInput: '',
        chatLoading: false,
        chatContext: 'general',
        chatContexts: [
            { id: 'general', label: 'Umum', icon: 'fas fa-globe' },
            { id: 'architecture', label: 'Arsitektur', icon: 'fas fa-project-diagram' },
            { id: 'github', label: 'GitHub', icon: 'fab fa-github' },
            { id: 'packages', label: 'Packages', icon: 'fas fa-box' },
            { id: 'languages', label: 'Bahasa', icon: 'fas fa-code' },
            { id: 'issues', label: 'Issues', icon: 'fas fa-bug' },
            { id: 'deployment', label: 'Deployment', icon: 'fas fa-rocket' },
        ],

        // Code Runner state
        selectedLang: 0,
        currentLang: langShowcase[0] || {},
        codeContent: langShowcase[0]?.example || '',
        codeLines: (langShowcase[0]?.example || '').split('\n'),
        codeOutput: '',
        codeError: '',
        codeTime: 0,
        codeRunning: false,
        htmlPreview: '',
        pyodideReady: false,
        pyodide: null,
        sqlReady: false,
        sqlDb: null,

        init() {
            this.loadChatHistory();
        },

        // =================== CHAT ===================
        async loadChatHistory() {
            try {
                const res = await fetch('{{ route("admin.github-ai.chat.history") }}');
                const data = await res.json();
                this.messages = data.messages || [];
                this.$nextTick(() => this.scrollChat());
            } catch (e) {}
        },

        async sendMessage() {
            const msg = this.chatInput.trim();
            if (!msg || this.chatLoading) return;

            this.messages.push({ role: 'user', content: msg, time: new Date().toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'}) });
            this.chatInput = '';
            this.chatLoading = true;
            this.scrollChat();

            try {
                const res = await fetch('{{ route("admin.github-ai.chat") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
                    body: JSON.stringify({ message: msg, context: this.chatContext })
                });
                const data = await res.json();
                if (data.success) {
                    this.messages.push(data.message);
                } else {
                    this.messages.push({ role: 'assistant', content: 'Maaf, terjadi kesalahan. Coba lagi ya! 🙏', time: new Date().toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'}) });
                }
            } catch (e) {
                this.messages.push({ role: 'assistant', content: 'Koneksi terputus. Periksa jaringan Anda.', time: new Date().toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'}) });
            }
            this.chatLoading = false;
            this.scrollChat();
        },

        sendQuickQuestion(q) {
            this.chatInput = q;
            this.sendMessage();
        },

        async resetChat() {
            if (!confirm('Hapus semua riwayat chat GitHub AI?')) return;
            try {
                await fetch('{{ route("admin.github-ai.chat.reset") }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content }
                });
                this.messages = [];
            } catch (e) {}
        },

        scrollChat() {
            this.$nextTick(() => {
                const el = this.$refs.chatMessages;
                if (el) el.scrollTop = el.scrollHeight;
            });
        },

        renderMarkdown(text) {
            if (!text) return '';
            // Simple markdown rendering
            return text
                .replace(/```(\w+)?\n([\s\S]*?)```/g, '<pre class="bg-kvt-950 rounded-lg p-3 my-2 overflow-x-auto text-xs"><code class="text-green-300">$2</code></pre>')
                .replace(/`([^`]+)`/g, '<code class="bg-kvt-800 px-1.5 py-0.5 rounded text-kvt-300 text-xs">$1</code>')
                .replace(/\*\*(.+?)\*\*/g, '<strong class="text-white">$1</strong>')
                .replace(/\*(.+?)\*/g, '<em>$1</em>')
                .replace(/^### (.+)$/gm, '<h4 class="text-kvt-400 font-bold mt-3 mb-1">$1</h4>')
                .replace(/^## (.+)$/gm, '<h3 class="text-white font-bold text-base mt-3 mb-1">$1</h3>')
                .replace(/^# (.+)$/gm, '<h2 class="text-white font-bold text-lg mt-3 mb-2">$1</h2>')
                .replace(/^- (.+)$/gm, '<div class="flex items-start gap-2 ml-2"><span class="text-kvt-400 mt-1">•</span><span>$1</span></div>')
                .replace(/^\d+\. (.+)$/gm, '<div class="ml-2">$1</div>')
                .replace(/\n/g, '<br>');
        },

        // =================== CODE RUNNER ===================
        selectLanguage(idx) {
            this.selectedLang = idx;
            this.currentLang = langShowcase[idx];
            this.codeContent = langShowcase[idx].example;
            this.codeOutput = '';
            this.codeError = '';
            this.codeTime = 0;
            this.htmlPreview = '';
            this.updateLines();
        },

        resetCode() {
            this.codeContent = this.currentLang.example || '';
            this.codeOutput = '';
            this.codeError = '';
            this.codeTime = 0;
            this.htmlPreview = '';
            this.updateLines();
        },

        copyCode() {
            navigator.clipboard.writeText(this.codeContent);
        },

        updateLines() {
            this.codeLines = this.codeContent.split('\n');
        },

        async runCode() {
            if (this.codeRunning) return;
            this.codeRunning = true;
            this.codeOutput = '';
            this.codeError = '';
            this.codeTime = 0;
            this.htmlPreview = '';

            const mode = this.currentLang.mode;
            const slug = this.currentLang.slug;
            const start = performance.now();

            try {
                if (mode === 'server') {
                    // PHP — server-side
                    await this.runServerCode();
                } else if (mode === 'preview') {
                    // HTML — iframe preview
                    this.htmlPreview = this.codeContent;
                    this.codeOutput = 'HTML preview ditampilkan di bawah.';
                    this.codeTime = Math.round(performance.now() - start);
                } else if (slug === 'javascript' || slug === 'typescript') {
                    await this.runJavaScript();
                } else if (slug === 'python') {
                    await this.runPython();
                } else if (slug === 'sql') {
                    await this.runSQL();
                } else if (slug === 'json') {
                    this.runJSON();
                } else {
                    this.codeOutput = `Bahasa "${this.currentLang.name}" ditampilkan sebagai display only.\nUntuk menjalankannya, gunakan terminal atau IDE.`;
                }

                if (!this.codeTime) this.codeTime = Math.round(performance.now() - start);
            } catch (e) {
                this.codeError = e.message || String(e);
                this.codeTime = Math.round(performance.now() - start);
            }
            this.codeRunning = false;
        },

        async runServerCode() {
            const res = await fetch('{{ route("admin.github-ai.run-code") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
                body: JSON.stringify({ code: this.codeContent, language: 'php' })
            });
            const data = await res.json();
            if (data.success) {
                this.codeOutput = data.output || '(tidak ada output)';
            } else {
                this.codeError = data.error || 'Execution failed';
            }
            this.codeTime = data.time_ms || 0;
        },

        async runJavaScript() {
            // Capture console.log output
            const logs = [];
            const origLog = console.log;
            const origWarn = console.warn;
            const origError = console.error;

            console.log = (...args) => logs.push(args.map(a => typeof a === 'object' ? JSON.stringify(a, null, 2) : String(a)).join(' '));
            console.warn = (...args) => logs.push('⚠️ ' + args.join(' '));
            console.error = (...args) => logs.push('❌ ' + args.join(' '));

            try {
                // Strip TypeScript type annotations for basic execution
                let code = this.codeContent;
                if (this.currentLang.slug === 'typescript') {
                    code = code.replace(/:\s*(string|number|boolean|any|void|never|object|undefined|null|unknown)\b(\[\])?/g, '');
                    code = code.replace(/interface\s+\w+\s*\{[^}]*\}/g, '');
                    code = code.replace(/<[^>]+>/g, '');
                }

                const result = eval(code);
                if (result !== undefined && logs.length === 0) {
                    logs.push(typeof result === 'object' ? JSON.stringify(result, null, 2) : String(result));
                }
                this.codeOutput = logs.join('\n') || '(tidak ada output)';
            } catch (e) {
                this.codeError = e.message;
                if (logs.length) this.codeOutput = logs.join('\n');
            } finally {
                console.log = origLog;
                console.warn = origWarn;
                console.error = origError;
            }
        },

        async runPython() {
            if (!this.pyodideReady) {
                this.codeOutput = '⏳ Memuat Python runtime (Pyodide)...';
                try {
                    this.pyodide = await loadPyodide();
                    this.pyodideReady = true;
                    this.codeOutput = '';
                } catch (e) {
                    this.codeError = 'Gagal memuat Pyodide: ' + e.message;
                    return;
                }
            }

            try {
                // Redirect stdout
                this.pyodide.runPython(`
import sys, io
sys.stdout = io.StringIO()
sys.stderr = io.StringIO()
                `);

                this.pyodide.runPython(this.codeContent);

                const stdout = this.pyodide.runPython('sys.stdout.getvalue()');
                const stderr = this.pyodide.runPython('sys.stderr.getvalue()');

                this.codeOutput = stdout || '(tidak ada output)';
                if (stderr) this.codeError = stderr;
            } catch (e) {
                this.codeError = e.message;
            }
        },

        async runSQL() {
            if (!this.sqlReady) {
                this.codeOutput = '⏳ Memuat SQL engine (sql.js)...';
                try {
                    const SQL = await initSqlJs({ locateFile: file => `https://cdnjs.cloudflare.com/ajax/libs/sql.js/1.10.0/${file}` });
                    this.sqlDb = new SQL.Database();
                    this.sqlReady = true;
                    this.codeOutput = '';
                } catch (e) {
                    this.codeError = 'Gagal memuat sql.js: ' + e.message;
                    return;
                }
            }

            try {
                // Reset DB for fresh execution
                const SQL = await initSqlJs({ locateFile: file => `https://cdnjs.cloudflare.com/ajax/libs/sql.js/1.10.0/${file}` });
                this.sqlDb = new SQL.Database();

                const statements = this.codeContent.split(';').filter(s => s.trim());
                const outputs = [];

                for (const stmt of statements) {
                    const trimmed = stmt.trim();
                    if (!trimmed) continue;

                    try {
                        const results = this.sqlDb.exec(trimmed);
                        if (results.length > 0) {
                            for (const result of results) {
                                // Format as table
                                const header = result.columns.join(' | ');
                                const sep = result.columns.map(c => '-'.repeat(c.length + 2)).join('|');
                                const rows = result.values.map(r => r.join(' | ')).join('\n');
                                outputs.push(`${header}\n${sep}\n${rows}`);
                            }
                        } else if (/^(insert|update|delete|create|drop|alter)/i.test(trimmed)) {
                            outputs.push(`✅ ${trimmed.split(' ').slice(0,3).join(' ')}... OK`);
                        }
                    } catch (e) {
                        outputs.push(`❌ Error: ${e.message}\n   → ${trimmed.substring(0, 50)}...`);
                    }
                }

                this.codeOutput = outputs.join('\n\n') || '(tidak ada output)';
            } catch (e) {
                this.codeError = e.message;
            }
        },

        runJSON() {
            try {
                const parsed = JSON.parse(this.codeContent);
                this.codeOutput = '✅ JSON Valid!\n\n' + JSON.stringify(parsed, null, 2);
            } catch (e) {
                this.codeError = '❌ JSON Invalid: ' + e.message;
            }
        },
    }
}

// AOS init
document.addEventListener('DOMContentLoaded', () => {
    if (typeof AOS !== 'undefined') AOS.init({ duration: 600, once: true });
});
</script>
@endpush

@push('styles')
<style>
textarea { tab-size: 4; -moz-tab-size: 4; }
textarea:focus { outline: none; }
.tab-btn { transition: all 0.2s; }
pre code { font-family: 'JetBrains Mono', 'Fira Code', 'Cascadia Code', monospace; }
/* Typing animation */
@keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-6px); } }
</style>
@endpush
