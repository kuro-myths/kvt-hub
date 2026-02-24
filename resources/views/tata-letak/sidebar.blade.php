{{-- ==================== ROLE-BASED SIDEBAR NAVIGATION ==================== --}}
@auth
@php
    $peran = auth()->user()->peran ?? 'pengguna';
    $routeAktif = request()->route()?->getName() ?? '';

    $menuAdmin = [
        ['label' => 'Dashboard', 'ikon' => 'fas fa-tachometer-alt', 'route' => 'admin.dasbor', 'warna' => 'red'],
        ['label' => 'Pengguna', 'ikon' => 'fas fa-users', 'route' => 'admin.pengguna', 'warna' => 'blue'],
        ['label' => 'Kelas', 'ikon' => 'fas fa-chalkboard', 'route' => 'admin.kelas.index', 'warna' => 'green'],
        ['label' => 'Berita', 'ikon' => 'fas fa-newspaper', 'route' => 'admin.berita.index', 'warna' => 'emerald'],
        ['label' => 'Kerja Sama', 'ikon' => 'fas fa-handshake', 'route' => 'admin.kerja-sama.index', 'warna' => 'yellow'],
        ['label' => 'Kurikulum', 'ikon' => 'fas fa-book-reader', 'route' => 'admin.kurikulum.index', 'warna' => 'indigo'],
        ['label' => 'Mata Pelajaran', 'ikon' => 'fas fa-list-alt', 'route' => 'admin.mata-pelajaran.index', 'warna' => 'purple'],
        ['label' => 'Organisasi', 'ikon' => 'fas fa-sitemap', 'route' => 'admin.organisasi.index', 'warna' => 'pink'],
        ['label' => 'KRS Mahasiswa', 'ikon' => 'fas fa-clipboard-list', 'route' => 'admin.krs.index', 'warna' => 'cyan'],
        ['label' => 'Nilai', 'ikon' => 'fas fa-star-half-alt', 'route' => 'admin.nilai.index', 'warna' => 'amber'],
        ['label' => 'Bobot Nilai', 'ikon' => 'fas fa-balance-scale', 'route' => 'admin.bobot-nilai.index', 'warna' => 'teal'],
        ['label' => 'Laporan Akademik', 'ikon' => 'fas fa-file-medical-alt', 'route' => 'admin.laporan-akademik.index', 'warna' => 'orange'],
        ['label' => 'Verifikasi Akun', 'ikon' => 'fas fa-user-check', 'route' => 'admin.verifikasi', 'warna' => 'cyan'],
        ['label' => 'Pengunjung', 'ikon' => 'fas fa-chart-line', 'route' => 'admin.pengunjung', 'warna' => 'lime'],
        ['label' => 'Paket Eksklusif', 'ikon' => 'fas fa-gem', 'route' => 'admin.paket', 'warna' => 'violet'],
        ['label' => 'Kunci Admin', 'ikon' => 'fas fa-key', 'route' => 'admin.kunci', 'warna' => 'rose'],
        ['label' => 'Cerita Kuro', 'ikon' => 'fas fa-book-dead', 'route' => 'admin.kuro-cerita.index', 'warna' => 'violet'],
        ['label' => 'Cerita Karakter', 'ikon' => 'fas fa-users', 'route' => 'admin.karakter-cerita.index', 'warna' => 'amber'],
        ['label' => 'Materi', 'ikon' => 'fas fa-book-open', 'route' => 'admin.materi.index', 'warna' => 'sky'],
        ['label' => 'Edukasi Gratis', 'ikon' => 'fas fa-gift', 'route' => 'admin.edukasi-gratis.index', 'warna' => 'green'],
        ['label' => 'Pendaftaran Edukasi', 'ikon' => 'fas fa-clipboard-check', 'route' => 'admin.pendaftaran-edukasi.index', 'warna' => 'emerald'],
        ['label' => 'Aturan Edukasi', 'ikon' => 'fas fa-exclamation-triangle', 'route' => 'admin.aturan-edukasi.index', 'warna' => 'red'],
        ['label' => 'Repositori', 'ikon' => 'fab fa-github', 'route' => 'admin.repositori', 'warna' => 'cyan'],
    ];

    $menuPengajar = [
        ['label' => 'Dashboard', 'ikon' => 'fas fa-tachometer-alt', 'route' => 'pengajar.dasbor', 'warna' => 'green'],
        ['label' => 'Kelas Saya', 'ikon' => 'fas fa-chalkboard-teacher', 'route' => 'pengajar.kelas.index', 'warna' => 'blue'],
        ['label' => 'Buat Kelas', 'ikon' => 'fas fa-plus-circle', 'route' => 'pengajar.kelas.buat', 'warna' => 'kvt'],
        ['label' => 'Materi Saya', 'ikon' => 'fas fa-book', 'route' => 'pengajar.materi.index', 'warna' => 'purple'],
        ['label' => 'Buat Materi', 'ikon' => 'fas fa-file-medical', 'route' => 'pengajar.materi.buat', 'warna' => 'indigo'],
        ['label' => 'Silabus', 'ikon' => 'fas fa-scroll', 'route' => 'pengajar.silabus.index', 'warna' => 'teal'],
        ['label' => 'Jurnal Mengajar', 'ikon' => 'fas fa-journal-whills', 'route' => 'pengajar.jurnal.index', 'warna' => 'violet'],
        ['label' => 'Nilai & Penilaian', 'ikon' => 'fas fa-star-half-alt', 'route' => 'pengajar.nilai.index', 'warna' => 'amber'],
        ['label' => 'Diagram Builder', 'ikon' => 'fas fa-chart-pie', 'route' => 'laporan.builder', 'warna' => 'indigo'],
        ['label' => 'Laporan & Diagram', 'ikon' => 'fas fa-chart-bar', 'route' => 'laporan.index', 'warna' => 'orange'],
        ['label' => 'Kurikulum', 'ikon' => 'fas fa-book-reader', 'route' => 'halaman.kurikulum', 'warna' => 'cyan'],
        ['label' => 'Sertifikasi', 'ikon' => 'fas fa-award', 'route' => 'halaman.sertifikasi', 'warna' => 'yellow'],
        ['label' => 'Komunitas', 'ikon' => 'fas fa-users', 'route' => 'halaman.komunitas', 'warna' => 'pink'],
    ];

    $menuStaff = [
        ['label' => 'Dashboard', 'ikon' => 'fas fa-tachometer-alt', 'route' => 'staff.dasbor', 'warna' => 'orange'],
        ['label' => 'Data Pengguna', 'ikon' => 'fas fa-users-cog', 'route' => 'staff.pengguna.index', 'warna' => 'blue'],
        ['label' => 'Kehadiran', 'ikon' => 'fas fa-calendar-check', 'route' => 'staff.kehadiran.index', 'warna' => 'green'],
        ['label' => 'Rekap Kehadiran', 'ikon' => 'fas fa-clipboard-list', 'route' => 'staff.kehadiran.rekap', 'warna' => 'indigo'],
        ['label' => 'Kelas', 'ikon' => 'fas fa-chalkboard', 'route' => 'kelas.index', 'warna' => 'purple'],
        ['label' => 'Diagram Builder', 'ikon' => 'fas fa-chart-pie', 'route' => 'laporan.builder', 'warna' => 'violet'],
        ['label' => 'Laporan & Diagram', 'ikon' => 'fas fa-chart-bar', 'route' => 'laporan.index', 'warna' => 'amber'],
    ];

    $menuPengguna = [
        ['label' => 'Dashboard', 'ikon' => 'fas fa-tachometer-alt', 'route' => 'pengguna.dasbor', 'warna' => 'kvt'],
        ['label' => 'Kelas Saya', 'ikon' => 'fas fa-book-open', 'route' => 'kelas.index', 'warna' => 'blue'],
        ['label' => 'KRS Akademik', 'ikon' => 'fas fa-clipboard-list', 'route' => 'pengguna.krs.index', 'warna' => 'indigo'],
        ['label' => 'KHS', 'ikon' => 'fas fa-scroll', 'route' => 'pengguna.khs', 'warna' => 'emerald'],
        ['label' => 'Diagram Builder', 'ikon' => 'fas fa-chart-pie', 'route' => 'laporan.builder', 'warna' => 'indigo'],
        ['label' => 'Laporan & Diagram', 'ikon' => 'fas fa-chart-bar', 'route' => 'laporan.index', 'warna' => 'amber'],
        ['label' => 'Kurikulum', 'ikon' => 'fas fa-book-reader', 'route' => 'halaman.kurikulum', 'warna' => 'purple'],
        ['label' => 'Sertifikasi', 'ikon' => 'fas fa-award', 'route' => 'halaman.sertifikasi', 'warna' => 'yellow'],
        ['label' => 'Komunitas', 'ikon' => 'fas fa-users', 'route' => 'halaman.komunitas', 'warna' => 'pink'],
        ['label' => 'Media', 'ikon' => 'fas fa-play-circle', 'route' => 'halaman.media', 'warna' => 'rose'],
        ['label' => 'Panduan', 'ikon' => 'fas fa-map-signs', 'route' => 'halaman.alur-panduan', 'warna' => 'teal'],
    ];

    $menu = match($peran) {
        'admin' => $menuAdmin,
        'pengajar', 'guru' => $menuPengajar,
        'staff' => $menuStaff,
        default => $menuPengguna,
    };

    $peranWarna = match($peran) {
        'admin' => 'red',
        'pengajar', 'guru' => 'green',
        'staff' => 'orange',
        'mahasiswa' => 'indigo',
        'orang_tua' => 'amber',
        'pengunjung' => 'gray',
        default => 'kvt',
    };
    $peranIkon = match($peran) {
        'admin' => 'fas fa-shield-alt',
        'pengajar', 'guru' => 'fas fa-chalkboard-teacher',
        'staff' => 'fas fa-user-tie',
        'mahasiswa' => 'fas fa-university',
        'orang_tua' => 'fas fa-user-friends',
        'pengunjung' => 'fas fa-eye',
        default => 'fas fa-user-graduate',
    };
    $peranLabel = match($peran) {
        'admin' => 'Administrator',
        'pengajar', 'guru' => 'Pengajar / Guru',
        'staff' => 'Staff',
        'siswa' => 'Siswa',
        'mahasiswa' => 'Mahasiswa',
        'orang_tua' => 'Orang Tua',
        'pengunjung' => 'Pengunjung',
        default => 'Pengguna',
    };
@endphp

{{-- Sidebar Toggle Button (Mobile) — only used on old utama layout --}}
{{-- Toggle is now in the dashboard header --}}

{{-- Sidebar Overlay (Mobile) --}}
<div class="fixed inset-0 z-20 bg-black/50 backdrop-blur-sm hidden lg:hidden" id="sidebarOverlay" onclick="toggleSidebar()"></div>

{{-- Sidebar --}}
<aside class="fixed top-0 left-0 z-20 w-64 h-full bg-kvt-950/95 backdrop-blur border-r border-kvt-700/20 pt-20 pb-6 transition-transform duration-300 -translate-x-full lg:translate-x-0 overflow-y-auto" id="sidebarNav">

    {{-- User Profile Card --}}
    <div class="px-4 mb-5">
        <div class="bg-gradient-to-br from-{{ $peranWarna }}-500/10 to-{{ $peranWarna }}-600/5 border border-{{ $peranWarna }}-500/20 rounded-xl p-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-{{ $peranWarna }}-400 to-{{ $peranWarna }}-600 flex items-center justify-center text-white font-black text-sm shadow-lg">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-white truncate">{{ auth()->user()->name }}</p>
                    <div class="flex items-center gap-1.5">
                        <i class="{{ $peranIkon }} text-{{ $peranWarna }}-400 text-[10px]"></i>
                        <span class="text-[10px] text-{{ $peranWarna }}-400 font-semibold uppercase">{{ $peranLabel }}</span>
                        @if(auth()->user()->level)
                        <span class="text-[10px] text-amber-400 ml-1">Lv.{{ auth()->user()->level }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Navigation Menu --}}
    <nav class="px-3 space-y-0.5">
        <p class="text-[10px] text-gray-600 uppercase tracking-widest font-bold px-3 mb-2">Menu {{ $peranLabel }}</p>

        @foreach($menu as $item)
        @php
            $aktif = str_starts_with($routeAktif, $item['route']);
        @endphp
        <a href="{{ route($item['route']) }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition group
                  {{ $aktif ? 'bg-'.$item['warna'].'-500/15 text-'.$item['warna'].'-400 border border-'.$item['warna'].'-500/30' : 'text-gray-400 hover:bg-kvt-800/50 hover:text-white' }}">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center transition
                        {{ $aktif ? 'bg-'.$item['warna'].'-500/20' : 'bg-kvt-800/50 group-hover:bg-kvt-700/50' }}">
                <i class="{{ $item['ikon'] }} text-xs {{ $aktif ? 'text-'.$item['warna'].'-400' : 'text-gray-500 group-hover:text-gray-300' }}"></i>
            </div>
            <span>{{ $item['label'] }}</span>
            @if($aktif)
            <span class="w-1.5 h-1.5 bg-{{ $item['warna'] }}-400 rounded-full ml-auto"></span>
            @endif
        </a>
        @endforeach
    </nav>

    {{-- Quick Links --}}
    <div class="px-4 mt-6">
        <p class="text-[10px] text-gray-600 uppercase tracking-widest font-bold px-0 mb-2">Lainnya</p>
        <div class="space-y-0.5">
            <a href="{{ route('beranda') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm text-gray-500 hover:text-gray-300 hover:bg-kvt-800/50 transition">
                <i class="fas fa-home text-xs w-8 text-center"></i> Beranda
            </a>
            <a href="{{ route('berita.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm text-gray-500 hover:text-gray-300 hover:bg-kvt-800/50 transition">
                <i class="fas fa-newspaper text-xs w-8 text-center"></i> Berita
            </a>
            <a href="{{ route('kerja-sama.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm text-gray-500 hover:text-gray-300 hover:bg-kvt-800/50 transition">
                <i class="fas fa-handshake text-xs w-8 text-center"></i> Kerja Sama
            </a>
            <a href="{{ route('edukasi-gratis.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm text-green-500/70 hover:text-green-400 hover:bg-green-500/5 transition">
                <i class="fas fa-gift text-xs w-8 text-center"></i> Edukasi Gratis
            </a>
        </div>
    </div>

    {{-- Logout --}}
    <div class="px-4 mt-6">
        <form method="POST" action="{{ route('keluar') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-red-400/70 hover:text-red-400 hover:bg-red-500/10 transition">
                <div class="w-8 h-8 rounded-lg bg-red-500/10 flex items-center justify-center">
                    <i class="fas fa-sign-out-alt text-xs text-red-400/70"></i>
                </div>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>

@endauth
