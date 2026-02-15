@extends('tata-letak.utama')
@section('judul', 'Keamanan - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-red-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-red-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #EF4444 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-red-800/30 border border-red-600/30 rounded-full px-4 py-1.5 text-xs text-red-300 mb-6" data-aos="fade-down">
            <i class="fas fa-shield-alt"></i> ISO 27001 · Zero Trust · COBIT 2019
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Keamanan &</span><br>
            <span class="teks-gradien">Privasi Platform</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Keamanan informasi tingkat enterprise sesuai standar internasional. Arsitektur Zero Trust,
            enkripsi kelas militer AES-256, dan pemantauan SOC 24/7 untuk melindungi seluruh data Anda.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-red-500 to-rose-500 hover:from-red-400 hover:to-rose-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-red-500/30 hover:-translate-y-0.5">
                <i class="fas fa-lock mr-2"></i>Pelajari Lebih Lanjut
            </a>
            <a href="#standar" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-shield-alt mr-2"></i>Lihat Standar
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">99.99%</div><div class="text-xs text-gray-500">Uptime SLA</div></div>
            <div><div class="text-2xl font-black text-white">0</div><div class="text-xs text-gray-500">Data Breach</div></div>
            <div><div class="text-2xl font-black text-white">24/7</div><div class="text-xs text-gray-500">SOC Monitoring</div></div>
            <div><div class="text-2xl font-black text-white">AES-256</div><div class="text-xs text-gray-500">Encryption</div></div>
        </div>
        <div class="mt-12" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('images/keamanan-shield.svg') }}" alt="Keamanan" class="w-full max-w-3xl mx-auto rounded-2xl shadow-2xl shadow-green-500/10 border border-green-700/20">
        </div>
    </div>
</section>

{{-- STANDAR KEAMANAN --}}
<section id="standar" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">STANDAR</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Standar Keamanan yang Diterapkan</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Sertifikasi dan kepatuhan terhadap standar keamanan internasional dan nasional</p>
    </div>
    @php
    $standar = [
        ['ikon' => 'fas fa-shield-alt', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'ISO 27001:2022', 'desc' => 'Sistem Manajemen Keamanan Informasi (ISMS) untuk melindungi kerahasiaan, integritas, dan ketersediaan data.', 'fitur' => ['Risk Assessment & Treatment', 'Access Control (RBAC)', 'Incident Management', 'Business Continuity Planning']],
        ['ikon' => 'fas fa-sitemap', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-indigo-500', 'judul' => 'COBIT 2019', 'desc' => 'Framework tata kelola dan manajemen TI enterprise. Optimalisasi nilai TI dan alignment strategi bisnis.', 'fitur' => ['Governance Objectives', 'Design Factors', 'Performance Management', 'Maturity Model (CMMI)']],
        ['ikon' => 'fas fa-gavel', 'warna' => 'yellow', 'gradien' => 'from-yellow-500 to-amber-500', 'judul' => 'UU ITE & PDP', 'desc' => 'Kepatuhan terhadap UU ITE No. 19/2016 dan UU Perlindungan Data Pribadi No. 27/2022.', 'fitur' => ['Consent Management', 'Data Subject Rights', 'Data Protection Officer', 'Breach Notification 72 Jam']],
        ['ikon' => 'fas fa-fingerprint', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Zero Trust Architecture', 'desc' => 'Never trust, always verify. Setiap akses diverifikasi secara kontinu tanpa asumsi kepercayaan implisit.', 'fitur' => ['Micro-Segmentation', 'Continuous Verification', 'Least Privilege Access', 'Identity-Centric Security']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($standar as $idx => $s)
        <div class="kaca rounded-2xl p-6 border-{{ $s['warna'] }}-500/20 hover:border-{{ $s['warna'] }}-500/40 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-14 h-14 bg-gradient-to-br {{ $s['gradien'] }} rounded-xl flex items-center justify-center shadow-lg"><i class="{{ $s['ikon'] }} text-white text-xl"></i></div>
                <div><h3 class="text-white font-bold text-lg">{{ $s['judul'] }}</h3><p class="text-gray-500 text-xs">Security Standard</p></div>
            </div>
            <p class="text-gray-400 text-sm mb-4">{{ $s['desc'] }}</p>
            <ul class="space-y-2 text-sm text-gray-400">
                @foreach($s['fitur'] as $f)
                <li><i class="fas fa-check text-{{ $s['warna'] }}-400 mr-2"></i>{{ $f }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</section>

{{-- LAPISAN KEAMANAN --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">LAPISAN PERTAHANAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">8 Lapisan Keamanan</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Defense-in-depth: setiap lapisan dirancang untuk menghentikan ancaman yang lolos dari lapisan sebelumnya</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $lapisan = [
                ['Enkripsi AES-256', 'Semua data dienkripsi dengan AES-256-GCM. TLS 1.3 untuk transmisi data end-to-end.', 'fa-lock', 'from-red-500 to-pink-500'],
                ['Multi-Factor Auth', '2FA/MFA dengan TOTP, SMS, dan biometric. Passwordless login tersedia.', 'fa-fingerprint', 'from-blue-500 to-indigo-500'],
                ['WAF & DDoS Shield', 'Web Application Firewall dan perlindungan DDoS dengan Cloudflare Enterprise.', 'fa-fire-alt', 'from-orange-500 to-red-500'],
                ['Audit Trail', 'Log aktivitas lengkap 365 hari. Real-time monitoring dan anomaly detection.', 'fa-clipboard-list', 'from-green-500 to-emerald-500'],
                ['Penetration Testing', 'Pengujian keamanan berkala oleh ethical hacker tersertifikasi CEH/OSCP.', 'fa-bug', 'from-purple-500 to-violet-500'],
                ['Zero Trust Network', 'Arsitektur Zero Trust: never trust, always verify. Micro-segmentation.', 'fa-network-wired', 'from-cyan-500 to-blue-500'],
                ['Backup & Recovery', 'Backup otomatis harian dengan RPO 1 jam dan RTO 4 jam. Geo-redundant.', 'fa-database', 'from-teal-500 to-green-500'],
                ['Compliance Monitor', 'Automated compliance checks dan reporting sesuai regulatory requirements.', 'fa-clipboard-check', 'from-yellow-500 to-amber-500'],
            ];
            @endphp
            @foreach($lapisan as $idx => $l)
            <div class="kaca rounded-2xl p-5 hover:border-red-500/20 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <div class="w-12 h-12 bg-gradient-to-br {{ $l[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg">
                    <i class="fas {{ $l[2] }} text-white text-lg"></i>
                </div>
                <h4 class="text-white font-bold mb-1">{{ $l[0] }}</h4>
                <p class="text-gray-400 text-xs leading-relaxed">{{ $l[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK KEAMANAN --}}
<section class="bg-gradient-to-br from-red-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in">
        <div><div class="text-3xl font-black teks-gradien">12+</div><p class="text-gray-400 text-sm mt-1">Pen-Test / Tahun</p></div>
        <div><div class="text-3xl font-black teks-gradien">500+</div><p class="text-gray-400 text-sm mt-1">Vulnerability Patched</p></div>
        <div><div class="text-3xl font-black teks-gradien">&lt;15 Min</div><p class="text-gray-400 text-sm mt-1">Incident Response</p></div>
        <div><div class="text-3xl font-black teks-gradien">SOC 2</div><p class="text-gray-400 text-sm mt-1">Type II Audit</p></div>
    </div>
</section>

{{-- INCIDENT RESPONSE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">INCIDENT RESPONSE</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Prosedur Penanganan Insiden</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Langkah-langkah respons insiden keamanan terstruktur sesuai NIST SP 800-61</p>
    </div>
    @php
    $insiden = [
        ['fase' => 'Identifikasi', 'ikon' => 'fa-search', 'warna' => 'blue', 'waktu' => '< 5 Menit', 'desc' => 'Deteksi otomatis via SIEM, IDS/IPS, dan anomaly detection. Alert dikirim ke tim SOC 24/7.'],
        ['fase' => 'Containment', 'ikon' => 'fa-hand-paper', 'warna' => 'orange', 'waktu' => '< 15 Menit', 'desc' => 'Isolasi sistem terdampak, block IP mencurigakan, dan aktifkan firewall rules darurat.'],
        ['fase' => 'Eradikasi', 'ikon' => 'fa-broom', 'warna' => 'red', 'waktu' => '< 2 Jam', 'desc' => 'Hapus malware, patch vulnerability, dan lakukan forensic analysis untuk root cause.'],
        ['fase' => 'Pemulihan', 'ikon' => 'fa-undo-alt', 'warna' => 'green', 'waktu' => '< 4 Jam', 'desc' => 'Restore dari backup, verifikasi integritas data, dan monitoring intensif pasca-insiden.'],
        ['fase' => 'Pelajaran', 'ikon' => 'fa-book', 'warna' => 'purple', 'waktu' => '48 Jam', 'desc' => 'Post-incident review, update runbook, dan perbaikan kontrol keamanan yang relevan.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        @foreach($insiden as $idx => $i)
        <div class="kaca rounded-2xl p-5 border-{{ $i['warna'] }}-500/20 hover:border-{{ $i['warna'] }}-500/40 transition text-center" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="w-12 h-12 bg-{{ $i['warna'] }}-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas {{ $i['ikon'] }} text-{{ $i['warna'] }}-400 text-lg"></i>
            </div>
            <span class="text-xs bg-{{ $i['warna'] }}-500/10 text-{{ $i['warna'] }}-400 px-2 py-0.5 rounded-full font-mono">{{ $i['waktu'] }}</span>
            <h4 class="text-white font-bold mt-2 mb-1">{{ $i['fase'] }}</h4>
            <p class="text-gray-400 text-xs leading-relaxed">{{ $i['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- VIDEO --}}
<section class="bg-gradient-to-br from-red-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Keamanan</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'Zero Trust Architecture Explained', 'durasi' => '14:20', 'views' => '28K', 'warna' => 'red', 'thumb' => 'https://placehold.co/640x360/1a1a2e/EF4444?text=Zero+Trust'],
                ['judul' => 'Cara Aktifkan 2FA di KVT Hub', 'durasi' => '06:45', 'views' => '42K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3B82F6?text=2FA+Guide'],
                ['judul' => 'Audit Keamanan & Pen-Test Demo', 'durasi' => '18:30', 'views' => '15K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Pen+Test+Demo'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-red-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Aktifkan 2FA untuk akun pribadi', 'Lihat log aktivitas login', 'Kelola session & perangkat aktif', 'Atur preferensi privasi data', 'Laporkan aktivitas mencurigakan', 'Download data pribadi (GDPR)']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Instruktur', 'fitur' => ['Kelola akses materi per kelas', 'Atur permission siswa', 'Lihat audit log kelas', 'Enkripsi dokumen yang diupload', 'Kelola data ujian dengan aman', 'Laporan keamanan kelas']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Dashboard SOC & monitoring', 'Kelola kebijakan keamanan', 'Konfigurasi WAF & firewall rules', 'Audit log seluruh platform', 'Kelola sertifikat SSL/TLS', 'Incident response & forensic']],
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
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum Keamanan</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apakah data saya dienkripsi?', 'a' => 'Ya, seluruh data dienkripsi menggunakan AES-256-GCM saat disimpan (at rest) dan TLS 1.3 saat ditransmisikan (in transit). Tidak ada data yang disimpan dalam bentuk plain text.'],
        ['q' => 'Bagaimana cara mengaktifkan 2FA?', 'a' => 'Masuk ke Pengaturan → Keamanan → Two-Factor Authentication. Scan QR code menggunakan aplikasi authenticator (Google Authenticator, Authy) dan masukkan kode verifikasi.'],
        ['q' => 'Apa yang terjadi jika terjadi kebocoran data?', 'a' => 'Sesuai UU PDP Pasal 46, kami akan memberitahu pengguna terdampak dalam waktu 72 jam. Tim incident response akan segera melakukan containment, eradikasi, dan pemulihan.'],
        ['q' => 'Apakah KVT Hub melakukan penetration testing?', 'a' => 'Ya, kami melakukan penetration testing minimal 4x per tahun oleh ethical hacker tersertifikasi CEH/OSCP. Hasil dan rekomendasi diimplementasikan dalam 30 hari.'],
        ['q' => 'Bagaimana saya melaporkan kerentanan keamanan?', 'a' => 'Kirim email ke security@kvthub.id dengan detail kerentanan. Kami memiliki program Bug Bounty dengan reward Rp500.000 — Rp50.000.000 tergantung severity.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-red-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-red-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <i class="fas fa-exclamation-triangle text-red-400 text-3xl mb-4"></i>
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Laporkan Kerentanan Keamanan</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Temukan celah keamanan? Laporkan ke tim keamanan kami untuk mendapatkan reward melalui program Bug Bounty.</p>
        <a href="mailto:security@kvthub.id" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-400 hover:to-orange-400 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-red-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-envelope"></i> security@kvthub.id
        </a>
    </div>
</section>

@endsection
