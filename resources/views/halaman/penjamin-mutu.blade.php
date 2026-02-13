@extends('tata-letak.utama')
@section('judul', 'Penjamin Mutu - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-teal-900/20 to-kvt-900"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-teal-800/30 border border-teal-600/30 rounded-full px-4 py-1.5 text-xs text-teal-300 mb-6" data-aos="fade-down">
            <i class="fas fa-check-double"></i> QA/QC &middot; SPK/DSS &middot; CRM
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Penjamin </span><span class="teks-gradien">Mutu</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Sistem penjaminan mutu terintegrasi untuk memastikan kualitas tertinggi dalam setiap aspek layanan pendidikan dan teknologi.
        </p>
    </div>
</section>

{{-- QA/QC --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Quality Assurance / Quality Control</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Penjaminan mutu menyeluruh di seluruh lini platform</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6" data-aos="fade-up" data-aos-delay="200">
        <div class="kaca rounded-2xl p-6 border-teal-500/20 hover:border-teal-500/40 transition">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-xl flex items-center justify-center"><i class="fas fa-search text-white text-xl"></i></div>
                <div><h3 class="text-white font-bold text-lg">Quality Assurance</h3><p class="text-gray-500 text-xs">Pencegahan Masalah</p></div>
            </div>
            <p class="text-gray-400 text-sm mb-4">Proses sistematis untuk memastikan kualitas sebelum layanan dikirimkan kepada pengguna.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-teal-400 mr-2"></i>Review konten oleh Subject Matter Expert (SME)</li>
                <li><i class="fas fa-check text-teal-400 mr-2"></i>Automated testing (unit, integration, e2e)</li>
                <li><i class="fas fa-check text-teal-400 mr-2"></i>Peer review dan teaching methodology audit</li>
                <li><i class="fas fa-check text-teal-400 mr-2"></i>Standar kurikulum berbasis kompetensi (OBE)</li>
                <li><i class="fas fa-check text-teal-400 mr-2"></i>Aksesibilitas (WCAG 2.1 AA compliance)</li>
            </ul>
        </div>
        <div class="kaca rounded-2xl p-6 border-blue-500/20 hover:border-blue-500/40 transition">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center"><i class="fas fa-clipboard-check text-white text-xl"></i></div>
                <div><h3 class="text-white font-bold text-lg">Quality Control</h3><p class="text-gray-500 text-xs">Deteksi & Koreksi</p></div>
            </div>
            <p class="text-gray-400 text-sm mb-4">Inspeksi dan evaluasi berkelanjutan untuk mendeteksi dan memperbaiki cacat mutu.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Monitoring KPI real-time (NPS, CSAT, SLA)</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Bug tracking dan incident response</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>User feedback analysis dan sentiment</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>A/B testing dan statistical analysis</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Regression testing pipeline (CI/CD)</li>
            </ul>
        </div>
    </div>
</section>

{{-- SPK/DSS --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Sistem Pendukung Keputusan (SPK/DSS)</h2>
            <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Decision Support System untuk pengambilan keputusan berbasis data</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
            <div class="kaca rounded-2xl p-6 hover:border-purple-500/30 transition">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-brain text-white text-lg"></i></div>
                <h3 class="text-white font-bold mb-2">Metode AHP</h3>
                <p class="text-gray-400 text-sm mb-3">Analytical Hierarchy Process untuk evaluasi multi-kriteria pemilihan jalur pendidikan dan karir.</p>
                <div class="bg-kvt-800/30 rounded-lg p-3"><p class="text-xs text-gray-500 font-mono">Kriteria: Minat, Bakat, Akademik, Finansial, Peluang Karir</p></div>
            </div>
            <div class="kaca rounded-2xl p-6 hover:border-yellow-500/30 transition">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-chart-bar text-white text-lg"></i></div>
                <h3 class="text-white font-bold mb-2">Metode TOPSIS</h3>
                <p class="text-gray-400 text-sm mb-3">Technique for Order of Preference untuk ranking alternatif berdasarkan proximity ke solusi ideal.</p>
                <div class="bg-kvt-800/30 rounded-lg p-3"><p class="text-xs text-gray-500 font-mono">Output: Ranking program studi, kursus, dan sertifikasi</p></div>
            </div>
            <div class="kaca rounded-2xl p-6 hover:border-green-500/30 transition">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-project-diagram text-white text-lg"></i></div>
                <h3 class="text-white font-bold mb-2">Metode SAW</h3>
                <p class="text-gray-400 text-sm mb-3">Simple Additive Weighting untuk scoring dan evaluasi kinerja pembelajaran secara terukur.</p>
                <div class="bg-kvt-800/30 rounded-lg p-3"><p class="text-xs text-gray-500 font-mono">Evaluasi: XP, Quiz Score, Completion Rate, Engagement</p></div>
            </div>
        </div>
    </div>
</section>

{{-- CRM --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Customer Relationship Management (CRM)</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Manajemen hubungan pengguna untuk pengalaman terbaik</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="200">
        @php
        $crm = [
            ['Segmentasi Pengguna', 'Clustering pengguna berdasarkan behavior, preferensi, dan level aktifitas.', 'fa-users-cog', 'text-blue-400'],
            ['Personalisasi', 'Rekomendasi konten, kursus, dan jalur karir berbasis AI.', 'fa-magic', 'text-purple-400'],
            ['Engagement Tracking', 'Monitor interaksi, retensi, churn rate, dan customer journey.', 'fa-chart-line', 'text-green-400'],
            ['Support System', 'Multi-channel support: live chat, email, ticket, dan knowledge base.', 'fa-headset', 'text-orange-400'],
            ['NPS & CSAT', 'Survei kepuasan dan Net Promoter Score untuk mengukur loyalitas.', 'fa-star', 'text-yellow-400'],
            ['Email Automation', 'Automated email marketing, onboarding, dan nurturing campaigns.', 'fa-envelope-open-text', 'text-pink-400'],
            ['Lifecycle Management', 'Kelola siklus hidup pengguna dari akuisisi sampai advokasi.', 'fa-sync-alt', 'text-cyan-400'],
            ['Analytics Dashboard', 'Real-time CRM analytics dengan insights dan actionable metrics.', 'fa-tachometer-alt', 'text-red-400'],
        ];
        @endphp
        @foreach($crm as $c)
        <div class="kaca rounded-xl p-4 hover:border-teal-500/20 transition group">
            <i class="fas {{ $c[2] }} {{ $c[3] }} text-xl mb-3 block"></i>
            <h4 class="text-white font-bold text-sm mb-1">{{ $c[0] }}</h4>
            <p class="text-gray-500 text-xs">{{ $c[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- PDCA Cycle --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-12" data-aos="fade-up">Siklus PDCA Continuous Improvement</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="100">
            <div class="kaca rounded-2xl p-6">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mb-3"><span class="text-white font-black text-lg">P</span></div>
                <h4 class="text-white font-bold mb-1">Plan</h4>
                <p class="text-gray-400 text-xs">Identifikasi masalah dan tentukan strategi perbaikan.</p>
            </div>
            <div class="kaca rounded-2xl p-6">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mb-3"><span class="text-white font-black text-lg">D</span></div>
                <h4 class="text-white font-bold mb-1">Do</h4>
                <p class="text-gray-400 text-xs">Implementasikan perubahan secara bertahap.</p>
            </div>
            <div class="kaca rounded-2xl p-6">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-yellow-500 to-amber-500 rounded-full flex items-center justify-center mb-3"><span class="text-white font-black text-lg">C</span></div>
                <h4 class="text-white font-bold mb-1">Check</h4>
                <p class="text-gray-400 text-xs">Evaluasi hasil dan bandingkan dengan target.</p>
            </div>
            <div class="kaca rounded-2xl p-6">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center mb-3"><span class="text-white font-black text-lg">A</span></div>
                <h4 class="text-white font-bold mb-1">Act</h4>
                <p class="text-gray-400 text-xs">Standardisasi solusi sukses dan ulangi siklus.</p>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-teal-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="fade-up">
        <div><div class="text-3xl font-black teks-gradien">4.8/5</div><p class="text-gray-400 text-sm mt-1">Rating Pengguna</p></div>
        <div><div class="text-3xl font-black teks-gradien">98%</div><p class="text-gray-400 text-sm mt-1">SLA Achievement</p></div>
        <div><div class="text-3xl font-black teks-gradien">72</div><p class="text-gray-400 text-sm mt-1">NPS Score</p></div>
        <div><div class="text-3xl font-black teks-gradien">ISO 9001</div><p class="text-gray-400 text-sm mt-1">Quality Standard</p></div>
    </div>
</section>

@endsection
