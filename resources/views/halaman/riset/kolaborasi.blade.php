@extends('tata-letak.utama')
@section('judul', 'Kolaborasi Riset - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-teal-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-teal-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #14B8A6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-teal-800/30 border border-teal-600/30 rounded-full px-4 py-1.5 text-xs text-teal-300 mb-6" data-aos="fade-down">
            <i class="fas fa-handshake"></i> Tim Riset Lintas Institusi
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Kolaborasi</span><br>
            <span class="teks-gradien">Riset</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Bangun tim riset interdisipliner dengan peneliti dari 150+ universitas di 75+ negara.
            Kolaborasi real-time, project management, dan virtual lab meeting di satu platform.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-400 hover:to-cyan-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-teal-500/30 hover:-translate-y-0.5">
                <i class="fas fa-users mr-2"></i>Cari Partner Riset
            </a>
            <a href="#model" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-project-diagram mr-2"></i>Lihat Model
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Proyek Aktif</div></div>
            <div><div class="text-2xl font-black text-white">150+</div><div class="text-xs text-gray-500">Institusi</div></div>
            <div><div class="text-2xl font-black text-white">75+</div><div class="text-xs text-gray-500">Negara</div></div>
            <div><div class="text-2xl font-black text-white">2K+</div><div class="text-xs text-gray-500">Peneliti</div></div>
        </div>
    </div>
</section>

{{-- MODEL KOLABORASI --}}
<section id="model" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">MODELS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Model Kolaborasi</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih model kerjasama yang sesuai dengan kebutuhan riset Anda</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $model = [
            ['Tim Multidisiplin', 'Gabungkan peneliti dari berbagai bidang — AI, biologi, fisika, dan sosial — untuk riset interdisipliner yang impactful.', 'fa-users', 'from-blue-500 to-indigo-500', ['Cross-faculty research', 'Shared virtual lab', 'Joint publication', 'Multi-perspective analysis']],
            ['Virtual Lab Meeting', 'Meeting virtual dengan whiteboard kolaboratif, screen sharing, recording, dan AI note-taker terintegrasi.', 'fa-video', 'from-green-500 to-emerald-500', ['HD video conference', 'Interactive whiteboard', 'Session recording', 'AI meeting summary']],
            ['Project Management', 'Kelola timeline, milestone, deliverables, dan anggaran riset dalam satu platform terpusat.', 'fa-project-diagram', 'from-purple-500 to-violet-500', ['Gantt chart & Kanban', 'Budget tracking', 'Milestone reminders', 'Progress reporting']],
        ];
        @endphp
        @foreach($model as $i => $m)
        <div class="kaca rounded-2xl p-6 border-teal-500/10 hover:border-teal-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $m[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $m[2] }} text-white text-xl"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $m[0] }}</h3>
            <p class="text-gray-400 text-sm mb-4">{{ $m[1] }}</p>
            <div class="space-y-2">
                @foreach($m[4] as $f)
                <div class="flex items-center gap-2 text-xs text-gray-400"><i class="fas fa-check text-teal-400 text-[10px]"></i>{{ $f }}</div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-teal-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">500+</div><p class="text-gray-400 text-sm mt-1">Proyek Aktif</p></div>
        <div><div class="text-3xl font-black teks-gradien">150+</div><p class="text-gray-400 text-sm mt-1">Institusi Mitra</p></div>
        <div><div class="text-3xl font-black teks-gradien">75+</div><p class="text-gray-400 text-sm mt-1">Negara</p></div>
        <div><div class="text-3xl font-black teks-gradien">2K+</div><p class="text-gray-400 text-sm mt-1">Peneliti Aktif</p></div>
    </div>
</section>

{{-- ALUR KOLABORASI --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">WORKFLOW</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Alur Kolaborasi</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Langkah mudah memulai kolaborasi riset di KVT Hub</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @php
        $workflow = [
            ['Temukan Partner', 'fa-search', 'text-blue-400', 'Cari peneliti berdasarkan bidang, expertise, universitas, dan track record publikasi.'],
            ['Buat Proposal Tim', 'fa-file-signature', 'text-green-400', 'Bentuk tim dan ajukan proposal riset bersama dengan peran dan timeline jelas.'],
            ['Eksekusi Bersama', 'fa-laptop-code', 'text-purple-400', 'Kerja bersama di virtual lab, share data, dan regular meeting via platform.'],
            ['Publikasi Joint', 'fa-trophy', 'text-amber-400', 'Publikasikan hasil riset sebagai joint paper di jurnal bereputasi.'],
        ];
        @endphp
        @foreach($workflow as $i => $w)
        <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <div class="w-16 h-16 mx-auto bg-kvt-800/50 rounded-2xl flex items-center justify-center border border-kvt-700/30 mb-4 relative">
                <i class="fas {{ $w[1] }} {{ $w[2] }} text-2xl"></i>
                <span class="absolute -top-2 -right-2 w-6 h-6 bg-teal-500 rounded-full text-white text-xs font-bold flex items-center justify-center">{{ $i + 1 }}</span>
            </div>
            <h4 class="text-white font-bold text-sm mb-2">{{ $w[0] }}</h4>
            <p class="text-gray-500 text-xs leading-relaxed">{{ $w[3] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- PARTNERSHIP AKTIF --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">PARTNERSHIPS</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Partnership Aktif</h2>
        </div>
        @php
        $partnerships = [
            ['AI & Healthcare Consortium', 'Kolaborasi 12 universitas dari 8 negara untuk riset AI dalam deteksi penyakit dini.', 'fa-heartbeat', 'from-red-500 to-rose-500', '12 universitas', '3 tahun'],
            ['ASEAN Cybersecurity Alliance', 'Aliansi riset keamanan siber negara-negara ASEAN untuk pertahanan digital regional.', 'fa-shield-alt', 'from-indigo-500 to-blue-500', '10 institusi', '5 tahun'],
            ['Green Energy Research Network', 'Jaringan riset energi terbarukan Asia-Pasifik untuk carbon neutrality 2050.', 'fa-solar-panel', 'from-green-500 to-emerald-500', '15 universitas', '4 tahun'],
            ['Quantum Computing Initiative', 'Program riset quantum computing bersama industri teknologi global.', 'fa-atom', 'from-purple-500 to-violet-500', '8 partner', '3 tahun'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($partnerships as $i => $p)
            <div class="kaca rounded-2xl p-6 hover:border-indigo-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $p[3] }} rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition">
                        <i class="fas {{ $p[2] }} text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-bold mb-1">{{ $p[0] }}</h3>
                        <p class="text-gray-400 text-sm mb-3">{{ $p[1] }}</p>
                        <div class="flex gap-3 text-xs">
                            <span class="text-teal-400"><i class="fas fa-university mr-1"></i>{{ $p[4] }}</span>
                            <span class="text-gray-500"><i class="fas fa-clock mr-1"></i>{{ $p[5] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Kolaborasi Riset</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Membangun Tim Riset Internasional', 'durasi' => '13:20', 'views' => '28K', 'warna' => 'teal', 'thumb' => 'https://placehold.co/640x360/1a1a2e/14B8A6?text=International+Team'],
            ['judul' => 'Best Practices Virtual Lab Meeting', 'durasi' => '09:45', 'views' => '19K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Virtual+Lab'],
            ['judul' => 'Joint Publication Strategy', 'durasi' => '17:30', 'views' => '33K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Joint+Publication'],
        ];
        @endphp
        @foreach($videos as $v)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $v['warna'] }}-500/20 hover:border-{{ $v['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="relative overflow-hidden">
                <img src="{{ $v['thumb'] }}" alt="{{ $v['judul'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur rounded-full flex items-center justify-center"><i class="fas fa-play text-white text-xl ml-1"></i></div>
                </div>
                <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-0.5 rounded">{{ $v['durasi'] }}</span>
            </div>
            <div class="p-4">
                <h4 class="text-white font-bold text-sm mb-1">{{ $v['judul'] }}</h4>
                <p class="text-gray-500 text-xs"><i class="fas fa-eye mr-1"></i>{{ $v['views'] }} views</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-teal-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Sesuai Peran Anda</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Mahasiswa / Peneliti', 'fitur' => ['Cari dan join tim riset aktif', 'Akses virtual lab & shared workspace', 'Attend virtual lab meetings', 'Co-author paper bersama tim', 'Akses dataset kolaboratif', 'Networking dengan 2K+ peneliti']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Dosen / PI (Principal Investigator)', 'fitur' => ['Buat dan kelola tim riset', 'Undang researcher dari institusi lain', 'Kelola budget & milestone proyek', 'Supervisi & review progress', 'Inisiasi MoU antar institusi', 'Mentoring researcher junior']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin Kolaborasi', 'fitur' => ['Kelola semua partnership & MoU', 'Dashboard analytics kolaborasi', 'Aprove proposal kolaborasi baru', 'Monitor compliance & deliverables', 'Laporan impact kolaborasi', 'Kelola resource allocation']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($roles as $r)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="bg-gradient-to-r {{ $r['gradien'] }} p-6 text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3"><i class="{{ $r['ikon'] }} text-white text-2xl"></i></div>
                    <h3 class="text-white font-bold text-xl">{{ $r['peran'] }}</h3>
                </div>
                <div class="p-6 space-y-3">
                    @foreach($r['fitur'] as $f)
                    <div class="flex items-start gap-2 text-sm text-gray-300"><i class="fas fa-check-circle text-{{ $r['warna'] }}-400 text-xs mt-1"></i>{{ $f }}</div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Bagaimana cara menemukan partner riset?', 'a' => 'Gunakan fitur "Cari Partner" di dashboard. Filter berdasarkan bidang keahlian, universitas, negara, dan h-index. Kirim undangan kolaborasi langsung melalui platform.'],
        ['q' => 'Apakah ada batasan jumlah anggota tim?', 'a' => 'Tidak ada batasan ketat. Tim bisa terdiri dari 2-50+ peneliti. Untuk tim besar (>20 anggota), kami menyediakan fitur sub-team dan work package management.'],
        ['q' => 'Bagaimana pembagian authorship pada joint paper?', 'a' => 'Pembagian authorship diatur di awal proyek melalui collaboration agreement. KVT Hub menyediakan template CRediT (Contributor Roles Taxonomy) standar.'],
        ['q' => 'Apakah bisa kolaborasi dengan institusi di luar KVT Hub?', 'a' => 'Ya, Anda bisa mengundang kolaborator eksternal sebagai guest researcher. Mereka mendapat akses terbatas ke workspace proyek selama durasi riset.'],
        ['q' => 'Bagaimana dengan Intellectual Property (IP)?', 'a' => 'Setiap kolaborasi memiliki IP agreement yang disetujui semua pihak di awal. KVT Hub menyediakan template IP agreement dan konsultasi HKI gratis.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $f)
        <details class="kaca rounded-xl group" data-aos="fade-up">
            <summary class="cursor-pointer p-5 flex items-center justify-between text-white font-semibold text-sm">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition text-xs"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-700/50 pt-3">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-teal-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Kolaborasi Riset Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Temukan partner riset dari 150+ universitas global dan bangun tim interdisipliner untuk proyek yang berdampak.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-teal-500 to-cyan-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-teal-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-handshake"></i> Cari Partner Riset
        </a>
    </div>
</section>

@endsection
