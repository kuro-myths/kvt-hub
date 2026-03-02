@extends('tata-letak.utama')
@section('judul', 'Staff Hub - KVT Hub')
@section('konten')

{{-- ==================== HERO ==================== --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 opacity-5">
        <svg width="100%" height="100%"><defs><pattern id="staffGrid" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="currentColor"/></pattern></defs><rect fill="url(#staffGrid)" width="100%" height="100%" class="text-orange-400"/></svg>
    </div>
    {{-- Floating decorations --}}
    <div class="absolute top-20 left-10 w-32 h-32 bg-orange-500/5 rounded-full blur-2xl"></div>
    <div class="absolute bottom-20 right-10 w-48 h-48 bg-amber-500/5 rounded-full blur-3xl"></div>
    <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-orange-400/30 rounded-full animate-pulse"></div>
    <div class="absolute bottom-1/3 left-1/4 w-1.5 h-1.5 bg-amber-400/40 rounded-full animate-pulse" style="animation-delay:1s"></div>

    <div class="relative max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-orange-500/20 text-orange-400 text-xs font-bold px-4 py-2 rounded-full mb-6">
            <i class="fas fa-user-tie"></i> Pusat Kepengurusan
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight">
            <span class="teks-gradien">Staff Hub</span>
        </h1>
        <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-8">
            Pusat informasi kepengurusan KVT Hub. Lihat struktur organisasi, divisi, alumni pengurus, dan informasi rekrutmen.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#pengurus" class="bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-400 hover:to-amber-400 text-white px-8 py-3.5 rounded-2xl font-bold transition shadow-lg shadow-orange-500/20 flex items-center gap-2">
                <i class="fas fa-users-cog"></i> Lihat Pengurus
            </a>
            <a href="#rekrutmen" class="border border-kvt-600/40 text-gray-300 hover:text-white hover:bg-kvt-800/40 px-8 py-3.5 rounded-2xl font-bold transition flex items-center gap-2">
                <i class="fas fa-user-plus"></i> Daftar Staff
            </a>
        </div>
    </div>
</section>

{{-- ==================== STATS ==================== --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        @php
        $stats = [
            ['icon' => 'fa-users-cog', 'color' => 'text-orange-400', 'bg' => 'bg-orange-500/10', 'value' => '50+', 'label' => 'Staff Aktif'],
            ['icon' => 'fa-sitemap', 'color' => 'text-blue-400', 'bg' => 'bg-blue-500/10', 'value' => '8', 'label' => 'Divisi'],
            ['icon' => 'fa-user-graduate', 'color' => 'text-amber-400', 'bg' => 'bg-amber-500/10', 'value' => '120+', 'label' => 'Alumni Pengurus'],
            ['icon' => 'fa-calendar-alt', 'color' => 'text-green-400', 'bg' => 'bg-green-500/10', 'value' => '5', 'label' => 'Periode'],
            ['icon' => 'fa-project-diagram', 'color' => 'text-purple-400', 'bg' => 'bg-purple-500/10', 'value' => '30+', 'label' => 'Program Aktif'],
            ['icon' => 'fa-trophy', 'color' => 'text-pink-400', 'bg' => 'bg-pink-500/10', 'value' => '15+', 'label' => 'Pencapaian'],
        ];
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($stats as $i => $s)
            <div class="text-center p-5 rounded-2xl border border-kvt-700/20 bg-kvt-900/30 hover:bg-kvt-800/30 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="w-11 h-11 {{ $s['bg'] }} rounded-xl flex items-center justify-center mx-auto mb-3">
                    <i class="fas {{ $s['icon'] }} {{ $s['color'] }}"></i>
                </div>
                <div class="text-2xl font-black text-white">{{ $s['value'] }}</div>
                <div class="text-[10px] text-gray-500 font-semibold mt-1 uppercase tracking-wide">{{ $s['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ==================== PENGURUS AKTIF ==================== --}}
<section class="py-20" id="pengurus">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 bg-orange-500/10 text-orange-400 text-xs font-bold px-3 py-1 rounded-full mb-4">
                <i class="fas fa-star"></i> Periode 2025/2026
            </div>
            <h2 class="text-3xl font-black mb-3"><span class="teks-gradien">Pengurus Aktif</span></h2>
            <p class="text-gray-400 max-w-xl mx-auto">Struktur kepengurusan periode saat ini</p>
        </div>

        {{-- Pimpinan Inti --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10" data-aos="fade-up" data-aos-delay="100">
            @php
            $pimpinan = [
                ['jabatan' => 'Ketua Umum', 'icon' => 'fa-crown', 'color' => 'from-orange-400 to-amber-500', 'border' => 'border-orange-500/20', 'bg' => 'from-orange-500/5 to-amber-500/5', 'desc' => 'Pimpinan tertinggi KVT Hub. Bertanggung jawab atas seluruh operasional, arah strategis, dan keputusan utama platform.'],
                ['jabatan' => 'Wakil Ketua', 'icon' => 'fa-user-shield', 'color' => 'from-blue-400 to-cyan-500', 'border' => 'border-blue-500/20', 'bg' => 'from-blue-500/5 to-cyan-500/5', 'desc' => 'Mendampingi Ketua Umum, mengkoordinasikan antar divisi, dan menjadi pengganti saat Ketua berhalangan.'],
                ['jabatan' => 'Sekretaris & Bendahara', 'icon' => 'fa-file-invoice-dollar', 'color' => 'from-green-400 to-emerald-500', 'border' => 'border-green-500/20', 'bg' => 'from-green-500/5 to-emerald-500/5', 'desc' => 'Mengelola administrasi, dokumen, keuangan, pencatatan, serta laporan berkala kegiatan.'],
            ];
            @endphp
            @foreach($pimpinan as $p)
            <div class="p-6 rounded-2xl border {{ $p['border'] }} bg-gradient-to-br {{ $p['bg'] }} text-center group hover:scale-[1.02] transition-all">
                <div class="w-16 h-16 bg-gradient-to-br {{ $p['color'] }} rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas {{ $p['icon'] }} text-white text-xl"></i>
                </div>
                <h3 class="text-base font-bold text-white">{{ $p['jabatan'] }}</h3>
                <p class="text-xs text-gray-500 mt-2 leading-relaxed">{{ $p['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Divisi Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="divisi">
            @php
            $divisi = [
                ['nama' => 'Teknologi & Pengembangan', 'icon' => 'fa-code', 'color' => 'text-cyan-400', 'bg' => 'bg-cyan-500/10', 'border' => 'border-cyan-500/20', 'desc' => 'Backend, Frontend, DevOps, Database, AI/ML', 'anggota' => '12'],
                ['nama' => 'Konten & Akademik', 'icon' => 'fa-book-open', 'color' => 'text-blue-400', 'bg' => 'bg-blue-500/10', 'border' => 'border-blue-500/20', 'desc' => 'Kurikulum, materi, konten edukasi', 'anggota' => '8'],
                ['nama' => 'Desain & Kreatif', 'icon' => 'fa-palette', 'color' => 'text-pink-400', 'bg' => 'bg-pink-500/10', 'border' => 'border-pink-500/20', 'desc' => 'UI/UX, grafis, branding, media', 'anggota' => '6'],
                ['nama' => 'Hubungan Masyarakat', 'icon' => 'fa-bullhorn', 'color' => 'text-green-400', 'bg' => 'bg-green-500/10', 'border' => 'border-green-500/20', 'desc' => 'Marketing, sosial media, partnership', 'anggota' => '7'],
                ['nama' => 'Keuangan & Operasional', 'icon' => 'fa-chart-pie', 'color' => 'text-amber-400', 'bg' => 'bg-amber-500/10', 'border' => 'border-amber-500/20', 'desc' => 'Budget, sponsor, langganan, keuangan', 'anggota' => '5'],
                ['nama' => 'Riset & Inovasi', 'icon' => 'fa-microscope', 'color' => 'text-purple-400', 'bg' => 'bg-purple-500/10', 'border' => 'border-purple-500/20', 'desc' => 'R&D, eksperimen, fitur baru', 'anggota' => '6'],
                ['nama' => 'Keamanan & Mutu', 'icon' => 'fa-shield-alt', 'color' => 'text-red-400', 'bg' => 'bg-red-500/10', 'border' => 'border-red-500/20', 'desc' => 'QA, security, compliance, penjaminan mutu', 'anggota' => '4'],
                ['nama' => 'Komunitas & Event', 'icon' => 'fa-users', 'color' => 'text-indigo-400', 'bg' => 'bg-indigo-500/10', 'border' => 'border-indigo-500/20', 'desc' => 'Forum, webinar, hackathon, networking', 'anggota' => '8'],
            ];
            @endphp
            @foreach($divisi as $i => $d)
            <div class="p-5 rounded-2xl border {{ $d['border'] }} bg-kvt-900/30 hover:bg-kvt-800/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <div class="flex items-start justify-between mb-3">
                    <div class="w-11 h-11 {{ $d['bg'] }} rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas {{ $d['icon'] }} {{ $d['color'] }}"></i>
                    </div>
                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-white/5 text-gray-500 font-bold">{{ $d['anggota'] }} anggota</span>
                </div>
                <h4 class="text-sm font-bold text-white mb-1">{{ $d['nama'] }}</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">{{ $d['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ==================== PROGRAM KERJA ==================== --}}
<section class="py-20 border-t border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-3"><span class="teks-gradien">Program Kerja</span></h2>
            <p class="text-gray-400 max-w-xl mx-auto">Inisiatif utama yang sedang dikerjakan oleh tim</p>
        </div>

        @php
        $proker = [
            ['nama' => 'K-Arma AI Development', 'status' => 'Aktif', 'progress' => 75, 'color' => 'bg-pink-500', 'badge' => 'bg-green-500/20 text-green-400', 'divisi' => 'Teknologi', 'desc' => 'Pengembangan asisten AI K-Arma dengan kemampuan analisis, generate video, dan interaksi multi-modal.'],
            ['nama' => 'Kurikulum Ecosystem v3', 'status' => 'Aktif', 'progress' => 60, 'color' => 'bg-blue-500', 'badge' => 'bg-green-500/20 text-green-400', 'divisi' => 'Konten & Akademik', 'desc' => 'Revisi kurikulum untuk 13 jenjang pendidikan dengan 500+ program studi dan learning path.'],
            ['nama' => 'Partnership Global 2026', 'status' => 'Berjalan', 'progress' => 40, 'color' => 'bg-amber-500', 'badge' => 'bg-amber-500/20 text-amber-400', 'divisi' => 'Humas', 'desc' => 'Kerjasama dengan 150+ universitas dan 500+ industri untuk program magang dan sertifikasi.'],
            ['nama' => 'Security Audit Q1', 'status' => 'Selesai', 'progress' => 100, 'color' => 'bg-green-500', 'badge' => 'bg-blue-500/20 text-blue-400', 'divisi' => 'Keamanan', 'desc' => 'Audit keamanan platform, penetration testing, dan compliance review keseluruhan.'],
            ['nama' => 'Webinar Series 2026', 'status' => 'Aktif', 'progress' => 30, 'color' => 'bg-purple-500', 'badge' => 'bg-green-500/20 text-green-400', 'divisi' => 'Komunitas', 'desc' => 'Rangkaian webinar bulanan dengan pembicara dari industri dan akademisi internasional.'],
            ['nama' => 'Design System v2', 'status' => 'Berjalan', 'progress' => 55, 'color' => 'bg-pink-500', 'badge' => 'bg-amber-500/20 text-amber-400', 'divisi' => 'Desain', 'desc' => 'Pembaruan design system untuk konsistensi visual di seluruh platform dan mobile app.'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($proker as $i => $pk)
            <div class="p-5 rounded-2xl border border-kvt-700/20 bg-kvt-900/30 hover:bg-kvt-800/30 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-[10px] px-2 py-0.5 rounded-full {{ $pk['badge'] }} font-bold">{{ $pk['status'] }}</span>
                    <span class="text-[10px] text-gray-600 font-semibold">{{ $pk['divisi'] }}</span>
                </div>
                <h4 class="text-sm font-bold text-white mb-2">{{ $pk['nama'] }}</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed mb-3">{{ $pk['desc'] }}</p>
                <div class="w-full h-1.5 bg-kvt-800 rounded-full overflow-hidden">
                    <div class="{{ $pk['color'] }} h-full rounded-full transition-all" style="width:{{ $pk['progress'] }}%"></div>
                </div>
                <div class="text-[10px] text-gray-600 mt-1 text-right font-semibold">{{ $pk['progress'] }}%</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ==================== STRUKTUR ORGANISASI ==================== --}}
<section class="py-20 border-t border-kvt-700/20" id="struktur">
    <div class="max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-black mb-3"><span class="teks-gradien">Struktur Organisasi</span></h2>
        <p class="text-gray-400 mb-10 max-w-xl mx-auto">Bagan hierarki kepengurusan KVT Hub</p>

        <div class="p-8 rounded-3xl border border-kvt-700/20 bg-kvt-900/30">
            {{-- Org chart visual --}}
            <div class="flex flex-col items-center gap-6">
                <div class="px-6 py-3 bg-gradient-to-r from-orange-500 to-amber-500 rounded-2xl text-white font-bold text-sm shadow-lg shadow-orange-500/20">
                    <i class="fas fa-crown mr-2"></i> Ketua Umum
                </div>
                <div class="w-px h-6 bg-kvt-600/30"></div>
                <div class="flex gap-4 flex-wrap justify-center">
                    <div class="px-4 py-2 bg-blue-500/10 border border-blue-500/20 rounded-xl text-blue-400 text-xs font-bold">
                        <i class="fas fa-user-shield mr-1"></i> Wakil Ketua
                    </div>
                    <div class="px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-xl text-green-400 text-xs font-bold">
                        <i class="fas fa-file-alt mr-1"></i> Sekretaris
                    </div>
                    <div class="px-4 py-2 bg-amber-500/10 border border-amber-500/20 rounded-xl text-amber-400 text-xs font-bold">
                        <i class="fas fa-coins mr-1"></i> Bendahara
                    </div>
                </div>
                <div class="w-px h-6 bg-kvt-600/30"></div>
                <div class="text-[10px] text-gray-600 font-semibold uppercase tracking-widest mb-2">Kepala Divisi</div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 w-full max-w-3xl">
                    @foreach($divisi as $d)
                    <div class="px-3 py-3 {{ $d['bg'] }} border {{ $d['border'] }} rounded-lg text-center hover:scale-[1.03] transition-transform">
                        <i class="fas {{ $d['icon'] }} {{ $d['color'] }} text-sm block mb-1.5"></i>
                        <span class="text-[10px] text-gray-400 font-semibold leading-tight block">{{ $d['nama'] }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="w-px h-6 bg-kvt-600/30"></div>
                <div class="text-[10px] text-gray-600 font-semibold uppercase tracking-widest">Anggota & Kontributor</div>
                <div class="px-6 py-2 bg-white/3 border border-kvt-700/20 rounded-xl text-gray-500 text-xs">
                    50+ anggota aktif tersebar di 8 divisi
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== NILAI & BUDAYA ==================== --}}
<section class="py-20 border-t border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-3"><span class="teks-gradien">Nilai & Budaya Kerja</span></h2>
            <p class="text-gray-400 max-w-xl mx-auto">Prinsip yang membentuk karakter tim KVT Hub</p>
        </div>

        @php
        $nilai = [
            ['icon' => 'fa-lightbulb', 'color' => 'text-amber-400', 'bg' => 'bg-amber-500/10', 'judul' => 'Inovatif', 'desc' => 'Selalu berinovasi, mencari solusi kreatif, dan tidak takut bereksperimen dengan ide baru.'],
            ['icon' => 'fa-handshake', 'color' => 'text-blue-400', 'bg' => 'bg-blue-500/10', 'judul' => 'Kolaboratif', 'desc' => 'Bekerja sama lintas divisi, saling mendukung, dan menghargai kontribusi setiap anggota.'],
            ['icon' => 'fa-rocket', 'color' => 'text-pink-400', 'bg' => 'bg-pink-500/10', 'judul' => 'Proaktif', 'desc' => 'Inisiatif tinggi, tidak menunggu instruksi, dan selalu mencari cara untuk berkontribusi lebih.'],
            ['icon' => 'fa-heart', 'color' => 'text-red-400', 'bg' => 'bg-red-500/10', 'judul' => 'Berdedikasi', 'desc' => 'Berkomitmen penuh terhadap visi platform dan memberikan yang terbaik di setiap tugas.'],
            ['icon' => 'fa-globe', 'color' => 'text-green-400', 'bg' => 'bg-green-500/10', 'judul' => 'Inklusif', 'desc' => 'Terbuka untuk semua latar belakang, menghargai keberagaman, dan menciptakan lingkungan yang aman.'],
            ['icon' => 'fa-graduation-cap', 'color' => 'text-purple-400', 'bg' => 'bg-purple-500/10', 'judul' => 'Terus Belajar', 'desc' => 'Growth mindset, selalu upgrade skill, berbagi ilmu, dan membantu sesama berkembang.'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($nilai as $i => $n)
            <div class="p-6 rounded-2xl border border-kvt-700/20 bg-kvt-900/30 hover:bg-kvt-800/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="w-12 h-12 {{ $n['bg'] }} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $n['icon'] }} {{ $n['color'] }} text-lg"></i>
                </div>
                <h4 class="text-base font-bold text-white mb-2">{{ $n['judul'] }}</h4>
                <p class="text-xs text-gray-500 leading-relaxed">{{ $n['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ==================== ALUMNI PENGURUS ==================== --}}
<section class="py-20 border-t border-kvt-700/20" id="alumni">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-3"><span class="teks-gradien">Alumni Pengurus</span></h2>
            <p class="text-gray-400 max-w-xl mx-auto">Penghargaan untuk para pengurus yang telah mengabdi di periode sebelumnya</p>
        </div>

        @php
        $periode = [
            ['tahun' => '2025/2026', 'status' => 'Aktif', 'badge' => 'bg-green-500/20 text-green-400', 'jumlah' => '50+', 'highlight' => 'K-Arma AI, Ecosystem v3, Global Partnership'],
            ['tahun' => '2024/2025', 'status' => 'Alumni', 'badge' => 'bg-amber-500/20 text-amber-400', 'jumlah' => '45', 'highlight' => 'Platform v2 Launch, 100 Level System'],
            ['tahun' => '2023/2024', 'status' => 'Alumni', 'badge' => 'bg-blue-500/20 text-blue-400', 'jumlah' => '38', 'highlight' => 'First 50 University Partners'],
            ['tahun' => '2022/2023', 'status' => 'Alumni', 'badge' => 'bg-purple-500/20 text-purple-400', 'jumlah' => '30', 'highlight' => 'Platform Founding & Beta Launch'],
            ['tahun' => '2021/2022', 'status' => 'Perintis', 'badge' => 'bg-pink-500/20 text-pink-400', 'jumlah' => '15', 'highlight' => 'Konsep Awal & Tim Pertama'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4" id="riwayat">
            @foreach($periode as $i => $p)
            <div class="p-5 rounded-2xl border border-kvt-700/20 bg-kvt-900/30 text-center hover:bg-kvt-800/30 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="text-xl font-black text-white mb-2">{{ $p['tahun'] }}</div>
                <span class="text-[10px] px-2.5 py-1 rounded-full {{ $p['badge'] }} font-bold">{{ $p['status'] }}</span>
                <div class="mt-3 text-sm text-gray-400"><i class="fas fa-users mr-1"></i> {{ $p['jumlah'] }} anggota</div>
                <div class="mt-2 text-[10px] text-gray-600 leading-relaxed">{{ $p['highlight'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ==================== TESTIMONI STAFF ==================== --}}
<section class="py-20 border-t border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-3"><span class="teks-gradien">Kata Mereka</span></h2>
            <p class="text-gray-400 max-w-xl mx-auto">Pengalaman langsung dari para staff dan alumni</p>
        </div>

        @php
        $testimoni = [
            ['pesan' => 'Bergabung di KVT Hub mengubah cara saya melihat pendidikan digital. Kolaborasi antar divisi sangat luar biasa!', 'posisi' => 'Divisi Teknologi', 'periode' => '2024-sekarang'],
            ['pesan' => 'Lingkungan yang mendukung pertumbuhan. Setiap hari belajar hal baru dari rekan-rekan yang luar biasa berbakat.', 'posisi' => 'Divisi Desain', 'periode' => '2023-2025'],
            ['pesan' => 'KVT Hub bukan sekadar organisasi, tapi keluarga. Soft skill dan hard skill berkembang pesat di sini.', 'posisi' => 'Divisi Komunitas', 'periode' => '2024-sekarang'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($testimoni as $i => $t)
            <div class="p-6 rounded-2xl border border-kvt-700/20 bg-kvt-900/30" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="text-orange-400 mb-4"><i class="fas fa-quote-left text-lg"></i></div>
                <p class="text-sm text-gray-300 leading-relaxed mb-4 italic">"{{ $t['pesan'] }}"</p>
                <div class="border-t border-kvt-700/20 pt-3">
                    <div class="text-xs font-bold text-white">{{ $t['posisi'] }}</div>
                    <div class="text-[10px] text-gray-600">{{ $t['periode'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ==================== REKRUTMEN ==================== --}}
<section class="py-20 border-t border-kvt-700/20" id="rekrutmen">
    <div class="max-w-5xl mx-auto px-6" data-aos="fade-up">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-black mb-3"><span class="teks-gradien">Bergabung dengan Kami</span></h2>
            <p class="text-gray-400 max-w-xl mx-auto">Tertarik menjadi bagian dari tim? Pendaftaran staff baru terbuka sepanjang tahun</p>
        </div>

        {{-- Benefits --}}
        @php
        $benefits = [
            ['icon' => 'fa-certificate', 'color' => 'text-amber-400', 'title' => 'Sertifikat Resmi', 'desc' => 'Sertifikat kepengurusan yang diakui'],
            ['icon' => 'fa-laptop-code', 'color' => 'text-cyan-400', 'title' => 'Skill Development', 'desc' => 'Pelatihan dan mentoring intensif'],
            ['icon' => 'fa-network-wired', 'color' => 'text-purple-400', 'title' => 'Networking Global', 'desc' => 'Koneksi dengan professional global'],
            ['icon' => 'fa-star', 'color' => 'text-pink-400', 'title' => 'XP & Achievement', 'desc' => 'Sistem reward berbasis kontribusi'],
        ];
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-10">
            @foreach($benefits as $b)
            <div class="p-4 rounded-xl border border-kvt-700/20 bg-kvt-900/30 text-center">
                <i class="fas {{ $b['icon'] }} {{ $b['color'] }} text-lg mb-2 block"></i>
                <div class="text-xs font-bold text-white">{{ $b['title'] }}</div>
                <div class="text-[10px] text-gray-600 mt-1">{{ $b['desc'] }}</div>
            </div>
            @endforeach
        </div>

        {{-- Steps --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
            @php
            $langkah = [
                ['icon' => 'fa-file-alt', 'color' => 'text-blue-400', 'bg' => 'bg-blue-500/10', 'title' => '1. Daftar Online', 'desc' => 'Isi formulir pendaftaran dengan portofolio atau CV kamu'],
                ['icon' => 'fa-comments', 'color' => 'text-green-400', 'bg' => 'bg-green-500/10', 'title' => '2. Interview & Review', 'desc' => 'Sesi wawancara online, review portofolio, dan technical test ringan'],
                ['icon' => 'fa-check-circle', 'color' => 'text-orange-400', 'bg' => 'bg-orange-500/10', 'title' => '3. Onboarding', 'desc' => 'Orientasi, pengenalan tim, tools, dan langsung mulai berkontribusi'],
            ];
            @endphp
            @foreach($langkah as $l)
            <div class="p-6 rounded-2xl border border-kvt-700/20 bg-kvt-900/30 text-center">
                <div class="w-12 h-12 {{ $l['bg'] }} rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $l['icon'] }} {{ $l['color'] }} text-lg"></i>
                </div>
                <h4 class="font-bold text-white text-sm mb-1">{{ $l['title'] }}</h4>
                <p class="text-xs text-gray-500 leading-relaxed">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="text-center">
            <a href="{{ route('halaman.komunitas.forum-diskusi') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-400 hover:to-amber-400 text-white px-8 py-3.5 rounded-2xl font-bold transition shadow-lg shadow-orange-500/20">
                <i class="fas fa-paper-plane"></i> Hubungi Tim Rekrutmen
            </a>
            <p class="text-xs text-gray-600 mt-3">Atau hubungi langsung melalui Discord / Forum Diskusi</p>
        </div>
    </div>
</section>

{{-- ==================== FAQ STAFF ==================== --}}
<section class="py-20 border-t border-kvt-700/20">
    <div class="max-w-3xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-3"><span class="teks-gradien">FAQ Staff</span></h2>
            <p class="text-gray-400">Pertanyaan yang sering ditanyakan calon staff</p>
        </div>

        @php
        $faqs = [
            ['q' => 'Apa saja syarat untuk bergabung?', 'a' => 'Minimal memiliki ketertarikan di salah satu divisi, bersedia aktif minimal 5 jam/minggu, dan memiliki semangat belajar tinggi. Tidak ada batasan usia atau latar belakang pendidikan.'],
            ['q' => 'Apakah ini kerja volunteer atau dibayar?', 'a' => 'KVT Hub merupakan organisasi edukasi. Staff mendapatkan XP, sertifikat, akses premium platform, networking, dan portofilio. Untuk posisi tertentu ada kompensasi tambahan.'],
            ['q' => 'Berapa lama masa kepengurusan?', 'a' => 'Satu periode kepengurusan berlangsung 1 tahun (Januari-Desember). Anggota boleh melanjutkan ke periode berikutnya melalui evaluasi.'],
            ['q' => 'Apakah bisa bergabung dari luar negeri?', 'a' => 'Tentu! KVT Hub adalah platform global. Semua koordinasi dilakukan secara online. Kami memiliki anggota dari berbagai negara.'],
            ['q' => 'Skill apa yang paling dibutuhkan?', 'a' => 'Saat ini kami sangat membutuhkan: Developer (Full-stack/Backend), UI/UX Designer, Content Creator, dan Community Manager. Tapi semua bidang terbuka.'],
        ];
        @endphp

        <div class="space-y-3">
            @foreach($faqs as $i => $faq)
            <details class="group rounded-2xl border border-kvt-700/20 bg-kvt-900/30 overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <summary class="p-5 cursor-pointer flex items-center justify-between text-sm font-bold text-white hover:text-orange-400 transition list-none">
                    {{ $faq['q'] }}
                    <i class="fas fa-chevron-down text-gray-600 text-xs transition-transform group-open:rotate-180"></i>
                </summary>
                <div class="px-5 pb-5 text-xs text-gray-400 leading-relaxed">{{ $faq['a'] }}</div>
            </details>
            @endforeach
        </div>
    </div>
</section>

@endsection
