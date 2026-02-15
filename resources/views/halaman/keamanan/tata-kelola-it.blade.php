@extends('tata-letak.utama')
@section('judul', 'Tata Kelola IT - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-slate-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-slate-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #64748B 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-slate-800/50 border border-slate-600/30 rounded-full px-4 py-1.5 text-xs text-slate-300 mb-6" data-aos="fade-down">
            <i class="fas fa-balance-scale"></i> COBIT · ITIL · UU ITE · UU PDP · NIST
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Tata Kelola</span><br>
            <span class="teks-gradien">IT Governance</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Framework tata kelola teknologi informasi yang mengacu pada standar COBIT 2019, ITIL v4, NIST CSF,
            dan regulasi nasional UU ITE & UU PDP. Kepatuhan, transparansi, dan akuntabilitas penuh.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-slate-500 to-blue-500 hover:from-slate-400 hover:to-blue-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-slate-500/30 hover:-translate-y-0.5">
                <i class="fas fa-book-open mr-2"></i>Pelajari Framework
            </a>
            <a href="#framework" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-sitemap mr-2"></i>Lihat Struktur
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">5</div><div class="text-xs text-gray-500">Framework</div></div>
            <div><div class="text-2xl font-black text-white">100%</div><div class="text-xs text-gray-500">Compliant</div></div>
            <div><div class="text-2xl font-black text-white">4x</div><div class="text-xs text-gray-500">Audit / Tahun</div></div>
            <div><div class="text-2xl font-black text-white">Level 4</div><div class="text-xs text-gray-500">CMMI Maturity</div></div>
        </div>
    </div>
</section>

{{-- FRAMEWORK --}}
<section id="framework" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">FRAMEWORK</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Framework Tata Kelola IT</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Standar internasional dan nasional yang diterapkan untuk pengelolaan TI yang optimal</p>
    </div>
    @php
    $framework = [
        ['ikon' => 'fas fa-sitemap', 'warna' => 'blue', 'judul' => 'COBIT 2019', 'desc' => 'Control Objectives for Information Technologies — framework governance dan management IT enterprise yang komprehensif.', 'fitur' => ['40 Governance Objectives', '6 Design Factors', 'Goal Cascade System', 'Maturity Model (CMMI)']],
        ['ikon' => 'fas fa-gavel', 'warna' => 'red', 'judul' => 'UU ITE & PDP', 'desc' => 'Kepatuhan terhadap UU ITE No. 19/2016 dan UU Perlindungan Data Pribadi No. 27/2022.', 'fitur' => ['Hak Subjek Data', 'Kewajiban Pengendali Data', 'Sanksi Administratif & Pidana', 'Data Protection Officer']],
        ['ikon' => 'fas fa-shield-alt', 'warna' => 'green', 'judul' => 'NIST CSF 2.0', 'desc' => 'National Institute of Standards and Technology Cybersecurity Framework — 6 fungsi inti keamanan siber.', 'fitur' => ['Govern, Identify, Protect', 'Detect, Respond, Recover', 'Implementation Tiers', 'Framework Profiles']],
        ['ikon' => 'fas fa-clipboard-check', 'warna' => 'purple', 'judul' => 'ITIL v4', 'desc' => 'IT Infrastructure Library — best practices untuk service management dan IT service lifecycle.', 'fitur' => ['Service Value System', 'Incident Management', 'Change Enablement', 'Continual Improvement']],
        ['ikon' => 'fas fa-file-contract', 'warna' => 'amber', 'judul' => 'ISO 38500', 'desc' => 'Standar internasional untuk corporate governance of IT — mengarahkan dan mengendalikan penggunaan TI.', 'fitur' => ['Direct, Monitor, Evaluate', 'Responsibility & Strategy', 'Acquisition & Performance', 'Conformance & Behaviour']],
        ['ikon' => 'fas fa-chart-bar', 'warna' => 'cyan', 'judul' => 'Risk Management', 'desc' => 'Identifikasi, analisis, dan mitigasi risiko IT secara proaktif dengan pendekatan terstruktur.', 'fitur' => ['Risk Register & Heat Map', 'Risk Appetite Definition', 'KRI Dashboard', 'Quarterly Risk Review']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($framework as $idx => $f)
        <div class="kaca rounded-2xl p-6 border-{{ $f['warna'] }}-500/20 hover:border-{{ $f['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="w-12 h-12 bg-{{ $f['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="{{ $f['ikon'] }} text-{{ $f['warna'] }}-400 text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $f['judul'] }}</h3>
            <p class="text-gray-400 text-sm mb-3">{{ $f['desc'] }}</p>
            <ul class="space-y-1.5 text-sm text-gray-400">
                @foreach($f['fitur'] as $ft)
                <li><i class="fas fa-check text-{{ $f['warna'] }}-400 mr-2 text-xs"></i>{{ $ft }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</section>

{{-- GOVERNANCE STRUCTURE --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">STRUKTUR</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Struktur Tata Kelola</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Hierarki dan tanggung jawab dalam pengelolaan TI platform KVT Hub</p>
        </div>
        @php
        $struktur = [
            ['level' => 'Strategic', 'judul' => 'IT Steering Committee', 'ikon' => 'fa-crown', 'warna' => 'from-yellow-500 to-amber-500', 'desc' => 'Penetapan visi, strategi TI, alokasi anggaran, dan alignment dengan tujuan bisnis pendidikan.'],
            ['level' => 'Tactical', 'judul' => 'IT Governance Office', 'ikon' => 'fa-building', 'warna' => 'from-blue-500 to-indigo-500', 'desc' => 'Implementasi kebijakan, monitoring compliance, risk management, dan pelaporan berkala.'],
            ['level' => 'Operational', 'judul' => 'IT Operations Team', 'ikon' => 'fa-cogs', 'warna' => 'from-green-500 to-emerald-500', 'desc' => 'Operasional harian: infrastructure, security monitoring, incident response, dan service desk.'],
            ['level' => 'Compliance', 'judul' => 'Audit & Assurance', 'ikon' => 'fa-search', 'warna' => 'from-purple-500 to-violet-500', 'desc' => 'Audit internal/eksternal, penetration testing, compliance assessment, dan quality assurance.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($struktur as $idx => $s)
            <div class="kaca rounded-2xl p-5 hover:border-indigo-500/20 transition text-center" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
                <div class="w-14 h-14 bg-gradient-to-br {{ $s['warna'] }} rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                    <i class="fas {{ $s['ikon'] }} text-white text-lg"></i>
                </div>
                <span class="text-xs bg-kvt-800 text-gray-400 px-2 py-0.5 rounded-full font-mono">{{ $s['level'] }}</span>
                <h4 class="text-white font-bold mt-2 mb-1">{{ $s['judul'] }}</h4>
                <p class="text-gray-400 text-xs leading-relaxed">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-slate-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">COBIT</div><p class="text-gray-400 text-sm mt-1">2019</p></div>
        <div><div class="text-3xl font-black teks-gradien">NIST</div><p class="text-gray-400 text-sm mt-1">CSF 2.0</p></div>
        <div><div class="text-3xl font-black teks-gradien">100%</div><p class="text-gray-400 text-sm mt-1">Compliant</p></div>
        <div><div class="text-3xl font-black teks-gradien">UU ITE</div><p class="text-gray-400 text-sm mt-1">& UU PDP</p></div>
    </div>
</section>

{{-- COMPLIANCE CHECKLIST --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">COMPLIANCE</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Checklist Kepatuhan Regulasi</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Timeline penerapan regulasi dan status kepatuhan platform</p>
    </div>
    @php
    $regulasi = [
        ['tahun' => '2016', 'judul' => 'UU ITE No. 19/2016', 'status' => 'Compliant', 'warna' => 'green', 'ikon' => 'fa-check-circle', 'desc' => 'Kepatuhan terhadap transaksi elektronik, tanda tangan digital, dan perlindungan sistem elektronik.'],
        ['tahun' => '2019', 'judul' => 'PP 71/2019 (PSTE)', 'status' => 'Compliant', 'warna' => 'green', 'ikon' => 'fa-check-circle', 'desc' => 'Penyelenggaraan Sistem dan Transaksi Elektronik — pendaftaran PSE, data center lokal.'],
        ['tahun' => '2022', 'judul' => 'UU PDP No. 27/2022', 'status' => 'Compliant', 'warna' => 'green', 'ikon' => 'fa-check-circle', 'desc' => 'Perlindungan data pribadi: hak subjek data, kewajiban pengendali, dan sanksi pelanggaran.'],
        ['tahun' => '2024', 'judul' => 'NIST CSF 2.0', 'status' => 'Adopted', 'warna' => 'blue', 'ikon' => 'fa-check-circle', 'desc' => 'Framework keamanan siber terbaru dengan penambahan fungsi Govern sebagai inti governance.'],
        ['tahun' => '2025', 'judul' => 'ISO 27001:2022', 'status' => 'Certified', 'warna' => 'purple', 'ikon' => 'fa-certificate', 'desc' => 'Sertifikasi ISMS versi terbaru dengan kontrol keamanan yang diperbarui (Annex A).'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($regulasi as $idx => $r)
        <div class="kaca rounded-xl p-5 flex flex-col md:flex-row items-start md:items-center gap-4 border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 60 }}">
            <span class="text-xs bg-{{ $r['warna'] }}-500/10 text-{{ $r['warna'] }}-400 px-3 py-1 rounded-full font-mono whitespace-nowrap">{{ $r['tahun'] }}</span>
            <div class="flex-1">
                <h4 class="text-white font-bold">{{ $r['judul'] }}</h4>
                <p class="text-gray-400 text-sm">{{ $r['desc'] }}</p>
            </div>
            <span class="inline-flex items-center gap-1 text-xs text-{{ $r['warna'] }}-400 bg-{{ $r['warna'] }}-500/10 px-3 py-1 rounded-full">
                <i class="fas {{ $r['ikon'] }}"></i> {{ $r['status'] }}
            </span>
        </div>
        @endforeach
    </div>
</section>

{{-- VIDEO --}}
<section class="bg-gradient-to-br from-slate-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Tata Kelola IT</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'COBIT 2019 Framework Overview', 'durasi' => '16:40', 'views' => '18K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3B82F6?text=COBIT+2019'],
                ['judul' => 'UU PDP: Panduan untuk Platform', 'durasi' => '22:15', 'views' => '31K', 'warna' => 'red', 'thumb' => 'https://placehold.co/640x360/1a1a2e/EF4444?text=UU+PDP+Guide'],
                ['judul' => 'NIST CSF 2.0 Implementation', 'durasi' => '19:50', 'views' => '12K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=NIST+CSF+2.0'],
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
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-slate-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Lihat kebijakan governance yang berlaku', 'Akses panduan kepatuhan regulasi', 'Laporkan insiden atau pelanggaran', 'Baca panduan privasi & keamanan data', 'Ikuti training awareness keamanan', 'Akses FAQ tata kelola IT']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Instruktur', 'fitur' => ['Kelola data siswa sesuai UU PDP', 'Akses risk register per kelas', 'Laporkan risiko & insiden IT', 'Ikuti training COBIT & compliance', 'Gunakan template governance', 'Review laporan kepatuhan']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Dashboard governance real-time', 'Kelola kebijakan & SOP IT', 'Risk assessment & heat map', 'Audit trail & compliance report', 'Konfigurasi COBIT design factors', 'Kelola DPO & data processing']],
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
        <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum Tata Kelola IT</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apa itu COBIT 2019 dan mengapa digunakan?', 'a' => 'COBIT 2019 adalah framework governance IT dari ISACA. Digunakan untuk memastikan pengelolaan TI selaras dengan tujuan bisnis, mengelola risiko, dan mengoptimalkan value creation dari investasi TI.'],
        ['q' => 'Bagaimana KVT Hub mematuhi UU PDP?', 'a' => 'Kami menunjuk Data Protection Officer (DPO), menerapkan consent management, memfasilitasi hak subjek data (akses, koreksi, hapus), dan memberikan notifikasi breach dalam 72 jam sesuai ketentuan.'],
        ['q' => 'Apa perbedaan COBIT dan ITIL?', 'a' => 'COBIT berfokus pada governance (apa yang harus dicapai), sedangkan ITIL berfokus pada management (bagaimana cara mencapainya). Keduanya saling melengkapi — COBIT menentukan tujuan, ITIL memberikan best practices implementasi.'],
        ['q' => 'Seberapa sering audit IT dilakukan?', 'a' => 'Audit internal dilakukan setiap kuartal (4x/tahun). Audit eksternal oleh pihak ketiga independen dilakukan minimal 1x/tahun. Penetration testing dilakukan 4x/tahun oleh ethical hacker tersertifikasi.'],
        ['q' => 'Bagaimana cara melaporkan risiko IT?', 'a' => 'Gunakan fitur "Laporkan Risiko" di dashboard. Isi formulir risk assessment (deskripsi, dampak, likelihood), dan tim IT Governance akan merespons dalam 24 jam kerja.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-blue-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-slate-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Pelajari Tata Kelola IT Lebih Lanjut</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Akses dokumentasi lengkap framework COBIT, ITIL, NIST, dan panduan kepatuhan regulasi Indonesia.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-slate-500 to-blue-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-slate-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Akses Dokumen
        </a>
    </div>
</section>

@endsection
