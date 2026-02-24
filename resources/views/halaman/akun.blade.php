@extends('tata-letak.utama')
@section('judul', 'Akun Saya - KVT Hub')
@section('konten')

<section class="pt-24 pb-12 px-4">
    <div class="max-w-5xl mx-auto">
        @auth
        @php $user = auth()->user(); @endphp

        {{-- Profile Card --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden mb-6" data-aos="fade-up">
            {{-- Banner --}}
            <div class="relative h-32 bg-gradient-to-r from-kvt-600 via-ungu-500 to-kvt-500 overflow-hidden">
                <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;100&quot; height=&quot;100&quot;><circle cx=&quot;50&quot; cy=&quot;50&quot; r=&quot;40&quot; fill=&quot;none&quot; stroke=&quot;white&quot; stroke-width=&quot;0.5&quot;/></svg>')"></div>
            </div>
            <div class="px-8 pb-8 -mt-12 relative">
                <div class="flex flex-col md:flex-row gap-6 items-start md:items-end">
                    <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-kvt-400 to-kvt-600 flex items-center justify-center text-4xl font-black text-white shadow-lg border-4 border-kvt-900">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="flex-1">
                        <h1 class="text-2xl font-black text-white">{{ $user->name }}</h1>
                        <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                        <div class="flex items-center gap-3 mt-2 flex-wrap">
                            <span class="bg-kvt-500/20 text-kvt-400 text-xs px-3 py-1 rounded-full font-semibold">
                                <i class="fas fa-user-tag mr-1"></i>{{ ucfirst($user->peran) }}
                            </span>
                            @if($user->level)
                            <span class="bg-amber-500/20 text-amber-400 text-xs px-3 py-1 rounded-full font-semibold">
                                <i class="fas fa-star mr-1"></i>Lv.{{ $user->level }}
                            </span>
                            @endif
                            @if($user->rank_title)
                            <span class="bg-purple-500/20 text-purple-400 text-xs px-3 py-1 rounded-full font-semibold">
                                <i class="fas fa-crown mr-1"></i>{{ $user->rank_title }}
                            </span>
                            @endif
                            <span class="text-gray-600 text-xs">
                                <i class="fas fa-calendar-alt mr-1"></i>Bergabung {{ $user->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('dasbor') }}" class="bg-gradient-to-r from-kvt-500 to-kvt-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:from-kvt-400 transition shadow-lg text-sm">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            @php
                $akStats = [
                    ['ikon' => 'fa-star', 'label' => 'XP Total', 'nilai' => $user->xp ?? 0, 'warna' => 'amber'],
                    ['ikon' => 'fa-gamepad', 'label' => 'Level', 'nilai' => $user->level ?? 1, 'warna' => 'kvt'],
                    ['ikon' => 'fa-calendar-check', 'label' => 'Hari Aktif', 'nilai' => $user->created_at->diffInDays(now()), 'warna' => 'green'],
                    ['ikon' => 'fa-trophy', 'label' => 'Rank', 'nilai' => $user->rank_title ?? 'Pemula', 'warna' => 'purple'],
                ];
            @endphp
            @foreach($akStats as $i => $st)
                <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5 text-center" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="w-10 h-10 bg-{{ $st['warna'] }}-500/10 rounded-xl flex items-center justify-center mx-auto mb-2">
                        <i class="fas {{ $st['ikon'] }} text-{{ $st['warna'] }}-400"></i>
                    </div>
                    <div class="text-2xl font-black text-white">{{ is_numeric($st['nilai']) ? number_format($st['nilai']) : $st['nilai'] }}</div>
                    <div class="text-gray-500 text-xs">{{ $st['label'] }}</div>
                </div>
            @endforeach
        </div>

        {{-- XP Progress --}}
        @if($user->level)
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-6" data-aos="fade-up">
            <div class="flex items-center justify-between mb-3">
                <div class="text-white font-bold text-sm"><i class="fas fa-chart-line text-kvt-400 mr-2"></i>Progress Level</div>
                <div class="text-kvt-400 text-sm font-bold">Level {{ $user->level }} → {{ $user->level + 1 }}</div>
            </div>
            @php $progress = $user->xp ? min(($user->xp % 100), 100) : 0; @endphp
            <div class="w-full bg-kvt-800 rounded-full h-3 mb-2">
                <div class="bg-gradient-to-r from-kvt-500 to-ungu-500 h-3 rounded-full transition-all" style="width: {{ $progress }}%"></div>
            </div>
            <div class="flex justify-between text-xs text-gray-500">
                <span>{{ $user->xp ?? 0 }} XP</span>
                <span>{{ 100 - $progress }} XP lagi</span>
            </div>
        </div>
        @endif

        <div class="grid md:grid-cols-2 gap-6 mb-6">
            {{-- Info Pribadi --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
                <h3 class="text-white font-bold mb-5"><i class="fas fa-id-card text-kvt-400 mr-2"></i>Informasi Pribadi</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between py-3 border-b border-kvt-700/20">
                        <span class="text-gray-400 text-sm">Nama Lengkap</span>
                        <span class="text-white font-semibold text-sm">{{ $user->name }}</span>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-kvt-700/20">
                        <span class="text-gray-400 text-sm">Email</span>
                        <span class="text-white font-semibold text-sm">{{ $user->email }}</span>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-kvt-700/20">
                        <span class="text-gray-400 text-sm">Peran</span>
                        <span class="bg-kvt-500/20 text-kvt-400 text-xs px-3 py-1 rounded-full font-semibold">{{ ucfirst($user->peran) }}</span>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-kvt-700/20">
                        <span class="text-gray-400 text-sm">Bergabung</span>
                        <span class="text-white font-semibold text-sm">{{ $user->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-gray-400 text-sm">Status</span>
                        <span class="bg-green-500/20 text-green-400 text-xs px-3 py-1 rounded-full font-semibold"><i class="fas fa-circle text-[6px] mr-1"></i>Aktif</span>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-white font-bold mb-5"><i class="fas fa-bolt text-amber-400 mr-2"></i>Aksi Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('dasbor') }}" class="flex items-center gap-3 p-3 bg-kvt-800/50 rounded-xl hover:bg-kvt-700/50 transition">
                        <div class="w-10 h-10 bg-kvt-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-tachometer-alt text-kvt-400"></i></div>
                        <div class="flex-1"><div class="text-white font-semibold text-sm">Dashboard</div><div class="text-gray-500 text-xs">Lihat ringkasan aktivitas</div></div>
                        <i class="fas fa-chevron-right text-gray-600 text-xs"></i>
                    </a>
                    <a href="{{ route('kelas.index') }}" class="flex items-center gap-3 p-3 bg-kvt-800/50 rounded-xl hover:bg-kvt-700/50 transition">
                        <div class="w-10 h-10 bg-green-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-school text-green-400"></i></div>
                        <div class="flex-1"><div class="text-white font-semibold text-sm">Kelas Saya</div><div class="text-gray-500 text-xs">Kelola kelas yang diikuti</div></div>
                        <i class="fas fa-chevron-right text-gray-600 text-xs"></i>
                    </a>
                    <a href="{{ route('platform') }}" class="flex items-center gap-3 p-3 bg-kvt-800/50 rounded-xl hover:bg-kvt-700/50 transition">
                        <div class="w-10 h-10 bg-purple-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-laptop-code text-purple-400"></i></div>
                        <div class="flex-1"><div class="text-white font-semibold text-sm">Platform</div><div class="text-gray-500 text-xs">Jelajahi fitur platform</div></div>
                        <i class="fas fa-chevron-right text-gray-600 text-xs"></i>
                    </a>
                    <a href="{{ route('langganan') }}" class="flex items-center gap-3 p-3 bg-kvt-800/50 rounded-xl hover:bg-kvt-700/50 transition">
                        <div class="w-10 h-10 bg-amber-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-crown text-amber-400"></i></div>
                        <div class="flex-1"><div class="text-white font-semibold text-sm">Langganan</div><div class="text-gray-500 text-xs">Kelola paket langganan</div></div>
                        <i class="fas fa-chevron-right text-gray-600 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Achievements --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-6" data-aos="fade-up">
            <h3 class="text-white font-bold mb-5"><i class="fas fa-medal text-amber-400 mr-2"></i>Pencapaian</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                    $achievements = [
                        ['ikon' => 'fa-user-plus', 'judul' => 'Pendaftar Baru', 'desc' => 'Bergabung di KVT Hub', 'unlocked' => true],
                        ['ikon' => 'fa-book-reader', 'judul' => 'Pembaca Setia', 'desc' => 'Baca 10 materi', 'unlocked' => ($user->xp ?? 0) > 50],
                        ['ikon' => 'fa-fire', 'judul' => 'Streak 7 Hari', 'desc' => 'Login 7 hari berturut', 'unlocked' => ($user->created_at->diffInDays(now())) > 7],
                        ['ikon' => 'fa-crown', 'judul' => 'Level 10', 'desc' => 'Capai level 10', 'unlocked' => ($user->level ?? 0) >= 10],
                        ['ikon' => 'fa-graduation-cap', 'judul' => 'Pelajar Aktif', 'desc' => 'Ikuti 5 kelas', 'unlocked' => false],
                        ['ikon' => 'fa-trophy', 'judul' => 'Quiz Master', 'desc' => 'Selesaikan 20 kuis', 'unlocked' => false],
                        ['ikon' => 'fa-comments', 'judul' => 'Kontributor', 'desc' => 'Post 10 diskusi forum', 'unlocked' => false],
                        ['ikon' => 'fa-rocket', 'judul' => 'Level 50', 'desc' => 'Capai level 50', 'unlocked' => ($user->level ?? 0) >= 50],
                    ];
                @endphp
                @foreach($achievements as $ach)
                    <div class="bg-kvt-800/50 rounded-xl p-4 text-center {{ $ach['unlocked'] ? 'border border-amber-500/20' : 'border border-kvt-700/10 opacity-50' }}">
                        <div class="w-12 h-12 {{ $ach['unlocked'] ? 'bg-amber-500/10' : 'bg-kvt-700/20' }} rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas {{ $ach['ikon'] }} {{ $ach['unlocked'] ? 'text-amber-400' : 'text-gray-600' }}"></i>
                        </div>
                        <div class="text-{{ $ach['unlocked'] ? 'white' : 'gray-600' }} font-semibold text-xs">{{ $ach['judul'] }}</div>
                        <div class="text-gray-{{ $ach['unlocked'] ? '500' : '700' }} text-[10px] mt-1">{{ $ach['desc'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Logout Button --}}
        <div class="text-center" data-aos="fade-up">
            <form method="POST" action="{{ route('keluar') }}" class="inline-block">
                @csrf
                <button type="submit" class="px-8 py-3 border border-red-500/30 text-red-400 rounded-xl font-semibold hover:bg-red-500/10 transition">
                    <i class="fas fa-sign-out-alt mr-2"></i>Keluar dari Akun
                </button>
            </form>
        </div>

        @else
        {{-- Guest view --}}
        <div class="max-w-2xl mx-auto">
            <div class="kaca rounded-2xl p-12 text-center border-kvt-500/20" data-aos="zoom-in">
                <div class="w-24 h-24 bg-kvt-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-user-circle text-kvt-400 text-5xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-3">Belum Login</h2>
                <p class="text-gray-400 mb-8 max-w-md mx-auto">Silakan masuk untuk melihat profil, statistik, dan pencapaian Anda.</p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('masuk') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-8 py-3 rounded-xl font-semibold hover:from-kvt-400 transition shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                    </a>
                    <a href="{{ route('daftar') }}" class="border border-kvt-600/50 text-kvt-300 px-8 py-3 rounded-xl font-semibold hover:bg-kvt-800/50 transition">
                        <i class="fas fa-user-plus mr-2"></i>Daftar
                    </a>
                </div>
            </div>

            {{-- Why Join --}}
            <div class="mt-12">
                <h3 class="text-xl font-bold text-white text-center mb-8" data-aos="fade-up">Mengapa Bergabung?</h3>
                <div class="grid md:grid-cols-3 gap-4">
                    @php
                        $reasons = [
                            ['ikon' => 'fa-graduation-cap', 'judul' => 'Belajar Tanpa Batas', 'desc' => 'Akses ribuan materi dan kelas dari 13 jenjang', 'warna' => 'kvt'],
                            ['ikon' => 'fa-gamepad', 'judul' => 'Gamifikasi Seru', 'desc' => 'Naik level, kumpulkan badge, dan bersaing', 'warna' => 'amber'],
                            ['ikon' => 'fa-certificate', 'judul' => 'Sertifikasi Resmi', 'desc' => 'Dapatkan sertifikat yang diakui industri', 'warna' => 'green'],
                        ];
                    @endphp
                    @foreach($reasons as $i => $r)
                        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5 text-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="w-12 h-12 bg-{{ $r['warna'] }}-500/10 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <i class="fas {{ $r['ikon'] }} text-{{ $r['warna'] }}-400"></i>
                            </div>
                            <h4 class="text-white font-bold text-sm mb-1">{{ $r['judul'] }}</h4>
                            <p class="text-gray-500 text-xs">{{ $r['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endauth
    </div>
</section>
@endsection
