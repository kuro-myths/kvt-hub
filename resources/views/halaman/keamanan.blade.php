@extends('tata-letak.utama')
@section('judul', 'Keamanan - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-red-900/20 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(239,68,68,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-red-800/30 border border-red-600/30 rounded-full px-4 py-1.5 text-xs text-red-300 mb-6" data-aos="fade-down">
            <i class="fas fa-shield-alt"></i> ISO 27001 & COBIT 2019 Certified
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Keamanan & </span><span class="teks-gradien">Privasi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Keamanan informasi tingkat enterprise sesuai standar internasional. Data Anda dilindungi dengan enkripsi kelas militer.
        </p>
    </div>
</section>

{{-- Standards --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Standar Keamanan yang Diterapkan</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
        <div class="kaca rounded-2xl p-6 border-green-500/20 hover:border-green-500/40 transition group">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center"><i class="fas fa-shield-alt text-white text-xl"></i></div>
                <div><h3 class="text-white font-bold text-lg">ISO 27001</h3><p class="text-gray-500 text-xs">Information Security Management</p></div>
            </div>
            <p class="text-gray-400 text-sm mb-4">Sistem Manajemen Keamanan Informasi (ISMS) sesuai standar ISO/IEC 27001:2022 untuk melindungi kerahasiaan, integritas, dan ketersediaan data.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-green-400 mr-2"></i>Risk Assessment & Treatment</li>
                <li><i class="fas fa-check text-green-400 mr-2"></i>Access Control (RBAC)</li>
                <li><i class="fas fa-check text-green-400 mr-2"></i>Incident Management</li>
                <li><i class="fas fa-check text-green-400 mr-2"></i>Business Continuity</li>
            </ul>
        </div>
        <div class="kaca rounded-2xl p-6 border-blue-500/20 hover:border-blue-500/40 transition group">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center"><i class="fas fa-sitemap text-white text-xl"></i></div>
                <div><h3 class="text-white font-bold text-lg">COBIT 2019</h3><p class="text-gray-500 text-xs">IT Governance Framework</p></div>
            </div>
            <p class="text-gray-400 text-sm mb-4">Framework tata kelola dan manajemen TI enterprise. Optimalisasi nilai TI, manajemen risiko, dan alignment strategi bisnis.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Governance Objectives</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Design Factors</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Performance Management</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Maturity Model (CMMI)</li>
            </ul>
        </div>
        <div class="kaca rounded-2xl p-6 border-yellow-500/20 hover:border-yellow-500/40 transition group">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center"><i class="fas fa-gavel text-white text-xl"></i></div>
                <div><h3 class="text-white font-bold text-lg">UU ITE & PDP</h3><p class="text-gray-500 text-xs">Regulasi Nasional Indonesia</p></div>
            </div>
            <p class="text-gray-400 text-sm mb-4">Kepatuhan penuh terhadap UU ITE No. 19/2016 dan UU Perlindungan Data Pribadi No. 27/2022 untuk melindungi hak pengguna.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-yellow-400 mr-2"></i>Consent Management</li>
                <li><i class="fas fa-check text-yellow-400 mr-2"></i>Data Subject Rights</li>
                <li><i class="fas fa-check text-yellow-400 mr-2"></i>Data Protection Officer</li>
                <li><i class="fas fa-check text-yellow-400 mr-2"></i>Breach Notification</li>
            </ul>
        </div>
    </div>
</section>

{{-- Security Layers --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Lapisan Keamanan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="100">
            @php
            $lapisan = [
                ['Enkripsi AES-256', 'Semua data dienkripsi dengan AES-256-GCM. TLS 1.3 untuk transmisi data.', 'fa-lock', 'from-red-500 to-pink-500'],
                ['Multi-Factor Auth', '2FA/MFA dengan TOTP, SMS, dan biometric. Passwordless login tersedia.', 'fa-fingerprint', 'from-blue-500 to-indigo-500'],
                ['WAF & DDoS Shield', 'Web Application Firewall dan perlindungan DDoS dengan Cloudflare Enterprise.', 'fa-fire-alt', 'from-orange-500 to-red-500'],
                ['Audit Trail', 'Log aktivitas lengkap 365 hari. Real-time monitoring dan anomaly detection.', 'fa-clipboard-list', 'from-green-500 to-emerald-500'],
                ['Penetration Testing', 'Pengujian keamanan berkala oleh ethical hacker tersertifikasi CEH/OSCP.', 'fa-bug', 'from-purple-500 to-violet-500'],
                ['Zero Trust Architecture', 'Arsitektur Zero Trust: never trust, always verify. Micro-segmentation.', 'fa-network-wired', 'from-cyan-500 to-blue-500'],
                ['Backup & Recovery', 'Backup otomatis harian dengan RPO 1 jam dan RTO 4 jam. Geo-redundant.', 'fa-database', 'from-teal-500 to-green-500'],
                ['Compliance Monitoring', 'Automated compliance checks dan reporting sesuai regulatory requirements.', 'fa-clipboard-check', 'from-yellow-500 to-amber-500'],
            ];
            @endphp
            @foreach($lapisan as $l)
            <div class="kaca rounded-2xl p-5 hover:border-red-500/20 transition group">
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

{{-- Security Stats --}}
<section class="bg-gradient-to-br from-red-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="fade-up">
        <div><div class="text-3xl font-black teks-gradien">99.99%</div><p class="text-gray-400 text-sm mt-1">Uptime SLA</p></div>
        <div><div class="text-3xl font-black teks-gradien">0</div><p class="text-gray-400 text-sm mt-1">Data Breach</p></div>
        <div><div class="text-3xl font-black teks-gradien">AES-256</div><p class="text-gray-400 text-sm mt-1">Encryption Grade</p></div>
        <div><div class="text-3xl font-black teks-gradien">24/7</div><p class="text-gray-400 text-sm mt-1">SOC Monitoring</p></div>
    </div>
</section>

{{-- Report --}}
<section class="max-w-4xl mx-auto px-4 py-16 text-center" data-aos="fade-up">
    <div class="kaca rounded-2xl p-8 border-red-500/20">
        <i class="fas fa-exclamation-triangle text-red-400 text-3xl mb-4"></i>
        <h2 class="text-2xl font-bold text-white mb-3">Laporkan Kerentanan</h2>
        <p class="text-gray-400 mb-6">Temukan celah keamanan? Laporkan ke tim keamanan kami untuk mendapatkan reward melalui program Bug Bounty.</p>
        <a href="mailto:security@kvthub.id" class="inline-block bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-400 hover:to-orange-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-red-500/20">
            <i class="fas fa-envelope mr-2"></i>security@kvthub.id
        </a>
    </div>
</section>

@endsection
