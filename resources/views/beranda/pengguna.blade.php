@extends('tata-letak.utama')
@section('judul', 'Dashboard - KVT Hub')
@section('konten')

{{-- WELCOME HEADER --}}
<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-kvt-950"></div>
    <div class="absolute inset-0">
        <div class="absolute top-10 right-20 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 bg-ungu-400/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 py-12">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6" data-aos="fade-up">
            <div class="flex items-center gap-5">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-kvt-500 to-ungu-500 flex items-center justify-center shadow-lg shadow-kvt-500/30 text-3xl font-black text-white">
                    {{ strtoupper(substr(auth()->user()->nama ?? auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Selamat datang kembali,</p>
                    <h1 class="text-2xl md:text-3xl font-black text-white">{{ auth()->user()->nama ?? auth()->user()->name ?? 'Pengguna' }} 👋</h1>
                    <div class="flex items-center gap-3 mt-1">
                        <span class="inline-flex items-center gap-1.5 text-xs bg-kvt-500/20 text-kvt-300 px-2.5 py-0.5 rounded-full">
                            <i class="fas fa-{{ auth()->user()->peran === 'tim' ? 'chalkboard-teacher' : (auth()->user()->peran === 'admin' ? 'user-shield' : 'user-graduate') }}"></i>
                            {{ ucfirst(auth()->user()->peran ?? 'pengguna') }}
                        </span>
                        @if(isset($levelInfo))
                        <span class="text-xs text-amber-400"><i class="fas fa-star mr-1"></i>Level {{ $levelInfo['level'] ?? 1 }} · {{ $levelInfo['xp'] ?? 0 }} XP</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('dasbor') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-5 py-2.5 rounded-xl text-sm font-semibold transition border border-kvt-700/50">
                    <i class="fas fa-tachometer-alt mr-2"></i>Full Dashboard
                </a>
                @if(in_array(auth()->user()->peran, ['tim', 'admin']))
                <a href="{{ route('kelas.buat') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition shadow-lg shadow-kvt-500/30 hover:-translate-y-0.5">
                    <i class="fas fa-plus mr-2"></i>Buat Kelas
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- QUICK STATS --}}
<section class="max-w-7xl mx-auto px-4 -mt-4 mb-8 relative z-10">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="100">
        @php
        $quickStats = [
            ['ikon' => 'fas fa-book-open', 'warna' => 'blue', 'label' => 'Kelas Diikuti', 'value' => $kelasSaya ?? 0],
            ['ikon' => 'fas fa-tasks', 'warna' => 'green', 'label' => 'Materi Selesai', 'value' => $materiSelesai ?? 0],
            ['ikon' => 'fas fa-clipboard-check', 'warna' => 'purple', 'label' => 'Kuis Dikerjakan', 'value' => $kuisDikerjakan ?? 0],
            ['ikon' => 'fas fa-trophy', 'warna' => 'amber', 'label' => 'Pencapaian', 'value' => $totalPencapaian ?? 0],
        ];
        @endphp
        @foreach($quickStats as $qs)
        <div class="kaca rounded-xl p-4 border-{{ $qs['warna'] }}-500/20">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-{{ $qs['warna'] }}-500/20 rounded-lg flex items-center justify-center">
                    <i class="{{ $qs['ikon'] }} text-{{ $qs['warna'] }}-400"></i>
                </div>
                <div>
                    <div class="text-xl font-black text-white">{{ $qs['value'] }}</div>
                    <div class="text-xs text-gray-500">{{ $qs['label'] }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-8" data-aos="fade-up">
        <img src="{{ asset('images/dashboard-preview.svg') }}" alt="Dashboard Preview" class="w-full max-w-4xl mx-auto rounded-2xl shadow-2xl shadow-kvt-500/10 border border-kvt-700/20 opacity-60 hover:opacity-100 transition-opacity duration-300">
    </div>
</section>

{{-- KELAS SAYA --}}
@if(isset($kelasAktif) && count($kelasAktif) > 0)
<section class="max-w-7xl mx-auto px-4 mb-12">
    <div class="flex items-center justify-between mb-6" data-aos="fade-up">
        <div>
            <h2 class="text-xl font-bold text-white"><i class="fas fa-book-open text-kvt-400 mr-2"></i>Kelas Saya</h2>
            <p class="text-gray-500 text-sm">Lanjutkan pembelajaran terakhir Anda</p>
        </div>
        <a href="{{ route('kelas.index') }}" class="text-kvt-400 hover:text-kvt-300 text-sm font-semibold transition">Lihat Semua <i class="fas fa-arrow-right ml-1"></i></a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($kelasAktif->take(3) as $kelas)
        <div class="kaca rounded-2xl overflow-hidden border-kvt-500/20 hover:border-kvt-500/40 transition group" data-aos="fade-up">
            <div class="relative h-36 bg-gradient-to-br from-kvt-800 to-kvt-700 overflow-hidden">
                @if($kelas->gambar)
                <img src="{{ asset('storage/' . $kelas->gambar) }}" alt="{{ $kelas->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                @else
                <div class="w-full h-full flex items-center justify-center"><i class="fas fa-chalkboard text-kvt-600 text-4xl"></i></div>
                @endif
                <div class="absolute top-2 right-2 bg-kvt-900/80 text-kvt-300 text-xs px-2 py-0.5 rounded-full">{{ $kelas->tingkat ?? 'Umum' }}</div>
            </div>
            <div class="p-4">
                <h3 class="text-white font-bold text-sm mb-1 truncate">{{ $kelas->nama }}</h3>
                <p class="text-gray-500 text-xs mb-3">{{ $kelas->deskripsi_singkat ?? 'Oleh: ' . ($kelas->guru->nama ?? '-') }}</p>
                @php $progres = $kelas->pivot->progres ?? 0; @endphp
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex-1 h-2 bg-kvt-800 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-kvt-500 to-ungu-500 rounded-full transition-all" style="width: {{ $progres }}%"></div>
                    </div>
                    <span class="text-xs text-kvt-400 font-mono">{{ $progres }}%</span>
                </div>
                <a href="{{ route('kelas.tampilkan', $kelas) }}" class="block text-center text-sm bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 py-2 rounded-lg transition font-semibold">
                    <i class="fas fa-play mr-1"></i>Lanjutkan
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

{{-- JADWAL & TUGAS --}}
<section class="max-w-7xl mx-auto px-4 mb-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Tugas Mendatang --}}
        <div class="kaca rounded-2xl p-6 border-amber-500/20" data-aos="fade-up">
            <h3 class="text-white font-bold mb-4 flex items-center gap-2"><i class="fas fa-clipboard-list text-amber-400"></i> Tugas & Kuis Mendatang</h3>
            @if(isset($tugasMendatang) && count($tugasMendatang) > 0)
            <div class="space-y-3">
                @foreach($tugasMendatang->take(5) as $tugas)
                <div class="flex items-center gap-3 p-3 bg-kvt-800/30 rounded-xl">
                    <div class="w-10 h-10 bg-amber-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-{{ $tugas->tipe === 'kuis' ? 'question-circle' : 'file-alt' }} text-amber-400"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-semibold truncate">{{ $tugas->judul }}</p>
                        <p class="text-gray-500 text-xs">{{ $tugas->kelas->nama ?? '-' }}</p>
                    </div>
                    <span class="text-xs text-amber-400 whitespace-nowrap">{{ $tugas->deadline?->diffForHumans() ?? '-' }}</span>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <i class="fas fa-check-circle text-green-400/50 text-3xl mb-2"></i>
                <p class="text-gray-500 text-sm">Tidak ada tugas mendatang. Semua beres! 🎉</p>
            </div>
            @endif
        </div>

        {{-- Aktivitas Terbaru --}}
        <div class="kaca rounded-2xl p-6 border-kvt-500/20" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-white font-bold mb-4 flex items-center gap-2"><i class="fas fa-history text-kvt-400"></i> Aktivitas Terbaru</h3>
            @if(isset($aktivitasTerbaru) && count($aktivitasTerbaru) > 0)
            <div class="space-y-3">
                @foreach($aktivitasTerbaru->take(5) as $akt)
                <div class="flex items-center gap-3 p-3 bg-kvt-800/30 rounded-xl">
                    <div class="w-8 h-8 bg-kvt-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-{{ $akt->ikon ?? 'circle' }} text-kvt-400 text-sm"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-gray-300 text-sm truncate">{{ $akt->deskripsi }}</p>
                        <p class="text-gray-600 text-xs">{{ $akt->created_at?->diffForHumans() ?? '-' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <i class="fas fa-clock text-gray-600 text-3xl mb-2"></i>
                <p class="text-gray-500 text-sm">Belum ada aktivitas. Mulai belajar sekarang!</p>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- REKOMENDASI KELAS --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-ungu-900/20 py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between mb-6" data-aos="fade-up">
            <div>
                <h2 class="text-xl font-bold text-white"><i class="fas fa-compass text-ungu-400 mr-2"></i>Rekomendasi untuk Anda</h2>
                <p class="text-gray-500 text-sm">Kelas populer yang mungkin Anda suka</p>
            </div>
            <a href="{{ route('kelas.index') }}" class="text-ungu-400 hover:text-ungu-300 text-sm font-semibold transition">Eksplor <i class="fas fa-arrow-right ml-1"></i></a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($kelasPopuler->take(3) as $kelas)
            <div class="kaca rounded-2xl overflow-hidden border-ungu-500/20 hover:border-ungu-500/40 transition group" data-aos="fade-up">
                <div class="relative h-36 bg-gradient-to-br from-ungu-800/50 to-kvt-800/50 overflow-hidden">
                    @if($kelas->gambar)
                    <img src="{{ asset('storage/' . $kelas->gambar) }}" alt="{{ $kelas->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                    <div class="w-full h-full flex items-center justify-center"><i class="fas fa-graduation-cap text-ungu-600 text-4xl"></i></div>
                    @endif
                    <div class="absolute bottom-2 left-2 bg-ungu-500/80 text-white text-xs px-2 py-0.5 rounded-full">{{ $kelas->anggota_count ?? 0 }} siswa</div>
                </div>
                <div class="p-4">
                    <h3 class="text-white font-bold text-sm mb-1">{{ $kelas->nama }}</h3>
                    <p class="text-gray-500 text-xs mb-3 line-clamp-2">{{ $kelas->deskripsi_singkat ?? Str::limit($kelas->deskripsi, 80) }}</p>
                    <a href="{{ route('kelas.tampilkan', $kelas) }}" class="block text-center text-sm bg-ungu-500/20 hover:bg-ungu-500/30 text-ungu-300 py-2 rounded-lg transition font-semibold">
                        <i class="fas fa-eye mr-1"></i>Lihat Kelas
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
@if(isset($beritaTerbaru) && count($beritaTerbaru) > 0)
<section class="max-w-7xl mx-auto px-4 py-12">
    <div class="flex items-center justify-between mb-6" data-aos="fade-up">
        <div>
            <h2 class="text-xl font-bold text-white"><i class="fas fa-newspaper text-emerald-400 mr-2"></i>Berita Terbaru</h2>
            <p class="text-gray-500 text-sm">Update terbaru dari KVT Hub</p>
        </div>
        <a href="{{ route('berita.index') }}" class="text-emerald-400 hover:text-emerald-300 text-sm font-semibold transition">Semua Berita <i class="fas fa-arrow-right ml-1"></i></a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($beritaTerbaru as $berita)
        <div class="kaca rounded-2xl overflow-hidden border-emerald-500/20 hover:border-emerald-500/40 transition group" data-aos="fade-up">
            <div class="relative h-36 bg-gradient-to-br from-emerald-800/30 to-kvt-800/30 overflow-hidden">
                @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                @else
                <div class="w-full h-full flex items-center justify-center"><i class="fas fa-newspaper text-emerald-600 text-3xl"></i></div>
                @endif
            </div>
            <div class="p-4">
                <span class="text-xs text-emerald-400">{{ $berita->terbit_pada?->format('d M Y') ?? '-' }}</span>
                <h3 class="text-white font-bold text-sm mt-1 line-clamp-2">{{ $berita->judul }}</h3>
                <a href="{{ route('berita.tampilkan', $berita) }}" class="text-emerald-400 hover:text-emerald-300 text-xs font-semibold mt-2 inline-block transition">Baca Selengkapnya →</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

{{-- QUICK ACTIONS --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-kvt-800/20 py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-xl font-bold text-white mb-6 text-center" data-aos="fade-up"><i class="fas fa-bolt text-amber-400 mr-2"></i>Aksi Cepat</h2>
        @php
        $actions = [
            ['route' => 'kelas.index', 'ikon' => 'fas fa-search', 'warna' => 'blue', 'label' => 'Cari Kelas', 'desc' => 'Eksplor katalog kelas'],
            ['route' => 'halaman.kurikulum', 'ikon' => 'fas fa-book-reader', 'warna' => 'indigo', 'label' => 'Kurikulum', 'desc' => 'Lihat standar akademik'],
            ['route' => 'halaman.sertifikasi', 'ikon' => 'fas fa-award', 'warna' => 'amber', 'label' => 'Sertifikasi', 'desc' => 'Ambil sertifikat'],
            ['route' => 'halaman.komunitas', 'ikon' => 'fas fa-users', 'warna' => 'pink', 'label' => 'Komunitas', 'desc' => 'Gabung forum'],
            ['route' => 'halaman.media', 'ikon' => 'fas fa-play-circle', 'warna' => 'rose', 'label' => 'Media', 'desc' => 'Tonton video'],
            ['route' => 'halaman.alur-panduan', 'ikon' => 'fas fa-project-diagram', 'warna' => 'teal', 'label' => 'Panduan', 'desc' => 'Baca panduan'],
        ];
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4" data-aos="fade-up">
            @foreach($actions as $a)
            <a href="{{ route($a['route']) }}" class="kaca rounded-xl p-4 text-center border-{{ $a['warna'] }}-500/20 hover:border-{{ $a['warna'] }}-500/40 transition group">
                <div class="w-12 h-12 bg-{{ $a['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition">
                    <i class="{{ $a['ikon'] }} text-{{ $a['warna'] }}-400 text-lg"></i>
                </div>
                <div class="text-white text-sm font-bold">{{ $a['label'] }}</div>
                <div class="text-gray-500 text-xs">{{ $a['desc'] }}</div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- PLATFORM STATS --}}
<section class="max-w-7xl mx-auto px-4 py-12">
    <div class="kaca rounded-2xl p-6 border-kvt-500/20" data-aos="fade-up">
        <h3 class="text-white font-bold text-center mb-6"><i class="fas fa-chart-line text-kvt-400 mr-2"></i>Statistik Platform</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <div class="text-3xl font-black teks-gradien">{{ number_format($statistik['total_siswa']) }}</div>
                <div class="text-gray-500 text-sm">Peserta Didik</div>
            </div>
            <div>
                <div class="text-3xl font-black teks-gradien">{{ number_format($statistik['total_guru']) }}</div>
                <div class="text-gray-500 text-sm">Pengajar</div>
            </div>
            <div>
                <div class="text-3xl font-black teks-gradien">{{ number_format($statistik['total_kelas']) }}</div>
                <div class="text-gray-500 text-sm">Kelas Aktif</div>
            </div>
            <div>
                <div class="text-3xl font-black teks-gradien">{{ number_format($statistik['total_materi']) }}</div>
                <div class="text-gray-500 text-sm">Materi</div>
            </div>
        </div>
    </div>
</section>

@endsection
