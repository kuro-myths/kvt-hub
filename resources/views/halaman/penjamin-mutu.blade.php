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
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Quality Assurance / Quality Control</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Penjaminan mutu menyeluruh di seluruh lini platform</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6" data-aos="fade-right" data-aos-delay="200">
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

{{-- Accreditation Process Flowchart --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Alur <span class="teks-gradien-emas">Akreditasi</span></h2>
            <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Accreditation process flowchart — dari self-assessment hingga peringkat akhir</p>
        </div>
        <div class="flex flex-col gap-3" data-aos="fade-up" data-aos-delay="200">
            @php
            $alurAkreditasi = [
                ['Self-Assessment (Evaluasi Diri)','fa-clipboard-list','from-blue-500 to-cyan-500','Pengisian borang dan analisis SWOT internal oleh unit'],
                ['Penyusunan Dokumen SPMI','fa-file-alt','from-teal-500 to-green-500','Kompilasi standar, SOP, dan bukti pendukung mutu'],
                ['Audit Internal (AMI)','fa-search','from-yellow-500 to-amber-500','Tim auditor internal memeriksa kesesuaian standar'],
                ['Perbaikan & Tindak Lanjut','fa-wrench','from-orange-500 to-red-500','Koreksi temuan audit dan implementasi rekomendasi'],
                ['Visitasi Asesor BAN-PT','fa-user-tie','from-purple-500 to-violet-500','Tim asesor eksternal melakukan verifikasi lapangan'],
                ['Penetapan Peringkat','fa-trophy','from-amber-500 to-yellow-500','Hasil akreditasi: Unggul / Baik Sekali / Baik'],
            ];
            @endphp
            @foreach($alurAkreditasi as $i => $a)
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-gradient-to-br {{ $a[2] }} rounded-full flex items-center justify-center shrink-0 shadow-lg">
                    <i class="fas {{ $a[1] }} text-white text-sm"></i>
                </div>
                <div class="flex-1 kaca rounded-xl px-4 py-3">
                    <span class="text-white font-bold text-sm">{{ $i + 1 }}. {{ $a[0] }}</span>
                    <p class="text-gray-500 text-xs mt-0.5">{{ $a[3] }}</p>
                </div>
                @if($i < count($alurAkreditasi) - 1)<i class="fas fa-arrow-down text-kvt-600 text-xs ml-4 hidden md:block"></i>@endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Quality Standards Grid --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Standar <span class="teks-gradien">Mutu</span></h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Quality standards yang diterapkan di seluruh lini pendidikan</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="200">
        @php
        $standar = [
            ['BAN-PT','Badan Akreditasi Nasional Perguruan Tinggi — akreditasi program studi & institusi.','fa-university','text-blue-400','from-blue-500 to-indigo-500'],
            ['SPMI','Sistem Penjaminan Mutu Internal — evaluasi mandiri dan continuous improvement.','fa-shield-alt','text-teal-400','from-teal-500 to-cyan-500'],
            ['SPME','Sistem Penjaminan Mutu Eksternal — validasi oleh lembaga independen.','fa-external-link-alt','text-purple-400','from-purple-500 to-violet-500'],
            ['ISO 9001:2015','Standar internasional manajemen mutu — proses, dokumentasi, audit.','fa-globe','text-green-400','from-green-500 to-emerald-500'],
            ['IWA 2:2007','Pedoman ISO untuk organisasi pendidikan — learning outcomes.','fa-book-reader','text-amber-400','from-amber-500 to-yellow-500'],
            ['KKNI','Kerangka Kualifikasi Nasional Indonesia — 9 level kompetensi.','fa-layer-group','text-red-400','from-red-500 to-pink-500'],
            ['OBE','Outcome-Based Education — kurikulum berbasis capaian pembelajaran.','fa-bullseye','text-cyan-400','from-cyan-500 to-blue-500'],
            ['MBKM','Merdeka Belajar Kampus Merdeka — fleksibilitas lintas program.','fa-door-open','text-orange-400','from-orange-500 to-amber-500'],
        ];
        @endphp
        @foreach($standar as $s)
        <div class="kaca rounded-xl p-4 hover:border-kvt-500/20 transition group">
            <div class="w-10 h-10 bg-gradient-to-br {{ $s[4] }} rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition">
                <i class="fas {{ $s[2] }} text-white text-sm"></i>
            </div>
            <h4 class="text-white font-bold text-sm mb-1">{{ $s[0] }}</h4>
            <p class="text-gray-500 text-xs leading-relaxed">{{ $s[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Audit Schedule --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Jadwal <span class="teks-gradien-emas">Audit</span></h2>
            <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Audit schedule — siklus pemeriksaan mutu berkala</p>
        </div>
        <div class="kaca rounded-2xl overflow-x-auto" data-aos="fade-up" data-aos-delay="200">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-kvt-700/40 text-kvt-300 text-xs uppercase">
                        <th class="px-4 py-3">Jenis Audit</th><th class="px-4 py-3">Frekuensi</th><th class="px-4 py-3">Pelaksana</th><th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $audit = [
                        ['Audit Mutu Internal (AMI)','Setiap Semester','Tim SPMI Internal','Selesai'],
                        ['Review Kurikulum','Tahunan','Komite Kurikulum','Berjalan'],
                        ['Audit Keuangan','Tahunan','Auditor Eksternal','Terjadwal'],
                        ['Evaluasi Dosen/Pengajar','Setiap Semester','Mahasiswa & Peer','Selesai'],
                        ['Visitasi BAN-PT','Per 5 Tahun','Asesor BAN-PT','Terjadwal'],
                        ['Survei Kepuasan','Triwulanan','Tim CRM','Berjalan'],
                    ];
                    @endphp
                    @foreach($audit as $a)
                    <tr class="border-b border-kvt-800/30 hover:bg-kvt-800/20 transition">
                        <td class="px-4 py-2.5 text-white font-semibold">{{ $a[0] }}</td>
                        <td class="px-4 py-2.5 text-gray-400">{{ $a[1] }}</td>
                        <td class="px-4 py-2.5 text-gray-400">{{ $a[2] }}</td>
                        <td class="px-4 py-2.5">
                            <span class="text-xs px-2 py-0.5 rounded-full {{ $a[3] === 'Selesai' ? 'bg-green-500/10 text-green-400' : ($a[3] === 'Berjalan' ? 'bg-blue-500/10 text-blue-400' : 'bg-yellow-500/10 text-yellow-400') }}">{{ $a[3] }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- SPK/DSS --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-down">Sistem Pendukung Keputusan (SPK/DSS)</h2>
        <p class="text-gray-400" data-aos="fade-down" data-aos-delay="100">Decision Support System untuk pengambilan keputusan berbasis data</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-left" data-aos-delay="200">
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
</section>

{{-- Improvement Metrics --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Metrik <span class="teks-gradien">Peningkatan</span></h2>
            <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Improvement metrics — indikator kinerja mutu platform</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="200">
            @php
            $metrik = [
                ['Completion Rate','87%','from-green-500 to-emerald-500','+12% vs semester lalu','fa-check-circle'],
                ['Kepuasan Pengguna','4.8/5','from-blue-500 to-cyan-500','+0.3 vs tahun lalu','fa-smile'],
                ['Bug Resolution Time','< 4 Jam','from-purple-500 to-violet-500','-60% response time','fa-bug'],
                ['Uptime Platform','99.95%','from-teal-500 to-green-500','SLA target: 99.9%','fa-server'],
                ['Pass Rate Ujian','92%','from-yellow-500 to-amber-500','+8% vs semester lalu','fa-award'],
                ['Retensi Pengguna','78%','from-pink-500 to-rose-500','+15% YoY growth','fa-user-check'],
                ['Content Quality Score','A+','from-indigo-500 to-blue-500','Peer-reviewed 100%','fa-star'],
                ['Response Time Support','< 2 Min','from-orange-500 to-red-500','24/7 multi-channel','fa-headset'],
            ];
            @endphp
            @foreach($metrik as $mk)
            <div class="kaca rounded-xl p-4 hover:border-kvt-500/20 transition text-center">
                <div class="w-10 h-10 mx-auto bg-gradient-to-br {{ $mk[2] }} rounded-lg flex items-center justify-center mb-2">
                    <i class="fas {{ $mk[4] }} text-white text-sm"></i>
                </div>
                <div class="text-2xl font-black teks-gradien mb-1">{{ $mk[1] }}</div>
                <h4 class="text-white font-semibold text-sm">{{ $mk[0] }}</h4>
                <p class="text-green-400 text-xs mt-1"><i class="fas fa-arrow-up mr-1"></i>{{ $mk[3] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CRM --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in-up">Customer Relationship Management (CRM)</h2>
        <p class="text-gray-400" data-aos="zoom-in-up" data-aos-delay="100">Manajemen hubungan pengguna untuk pengalaman terbaik</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-aos="fade-right" data-aos-delay="200">
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
        <h2 class="text-3xl font-bold text-white mb-12" data-aos="fade-down">Siklus PDCA Continuous Improvement</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="zoom-in" data-aos-delay="100">
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

{{-- Video --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Video <span class="teks-gradien">Penjaminan Mutu</span></h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Pelajari proses QA/QC dan akreditasi lewat video</p>
    </div>
    <div class="kaca rounded-2xl overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
        <div class="relative aspect-video bg-kvt-900 flex items-center justify-center">
            <div class="text-center">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-teal-500 to-cyan-500 rounded-full flex items-center justify-center mb-4 shadow-lg shadow-teal-500/30 cursor-pointer hover:scale-110 transition">
                    <i class="fas fa-play text-white text-2xl ml-1"></i>
                </div>
                <p class="text-gray-400 text-sm">Sistem Penjaminan Mutu KVT Hub — Proses & Standar</p>
                <p class="text-gray-600 text-xs mt-1">Durasi: 10 menit &middot; Bahasa Indonesia</p>
            </div>
        </div>
    </div>
</section>

{{-- Role Features --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Fitur per <span class="teks-gradien-emas">Peran</span></h2>
            <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Kontribusi setiap peran dalam penjaminan mutu</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
            @php
            $peran = [
                ['Siswa / Student','fa-user-graduate','from-blue-500 to-cyan-500','border-blue-500/20',['Isi survei kepuasan (CSAT)','Berikan rating materi & pengajar','Laporkan bug atau masalah','Akses dashboard progres personal','Lihat hasil evaluasi & feedback']],
                ['Guru / Teacher','fa-chalkboard-teacher','from-green-500 to-emerald-500','border-green-500/20',['Audit mandiri kualitas materi','Ikuti pelatihan pedagogi berkala','Submit laporan evaluasi kelas','Peer-review sesama pengajar','Update konten sesuai standar OBE']],
                ['Admin / Administrator','fa-user-shield','from-purple-500 to-violet-500','border-purple-500/20',['Kelola siklus PDCA platform','Jalankan Audit Mutu Internal','Monitor seluruh KPI mutu','Siapkan dokumen akreditasi','Kelola compliance & sertifikasi']],
            ];
            @endphp
            @foreach($peran as $p)
            <div class="kaca rounded-2xl p-6 {{ $p[3] }} hover:border-kvt-500/30 transition">
                <div class="w-14 h-14 bg-gradient-to-br {{ $p[2] }} rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $p[1] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-4">{{ $p[0] }}</h3>
                <ul class="space-y-2">
                    @foreach($p[4] as $fitur)
                    <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check text-green-400 mt-0.5 text-xs"></i>{{ $fitur }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
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

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Pertanyaan <span class="teks-gradien">Umum</span></h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Frequently Asked Questions tentang penjaminan mutu</p>
    </div>
    <div class="space-y-3" data-aos="fade-up" data-aos-delay="200">
        @php
        $faq = [
            ['Apa itu SPMI dan SPME?','SPMI (Sistem Penjaminan Mutu Internal) adalah evaluasi mandiri oleh institusi, sedangkan SPME (Sistem Penjaminan Mutu Eksternal) dilakukan oleh lembaga independen seperti BAN-PT.'],
            ['Bagaimana proses akreditasi di KVT Hub?','Proses dimulai dari evaluasi diri, penyusunan dokumen SPMI, audit internal, perbaikan, hingga visitasi asesor BAN-PT dan penetapan peringkat akreditasi.'],
            ['Seberapa sering audit mutu dilakukan?','Audit Mutu Internal (AMI) dilakukan setiap semester, review kurikulum tahunan, dan visitasi BAN-PT setiap 5 tahun.'],
            ['Apakah sertifikasi ISO berlaku untuk platform edukasi?','Ya, KVT Hub mengadopsi ISO 9001:2015 untuk manajemen mutu dan IWA 2:2007 sebagai pedoman khusus organisasi pendidikan.'],
            ['Bagaimana cara melaporkan masalah mutu?','Pengguna dapat melaporkan via live chat, email support, atau sistem tiket. Response time rata-rata kurang dari 2 menit.'],
        ];
        @endphp
        @foreach($faq as $f)
        <details class="kaca rounded-xl group">
            <summary class="px-5 py-4 cursor-pointer flex items-center justify-between text-white font-semibold text-sm hover:text-kvt-300 transition">
                {{ $f[0] }}
                <i class="fas fa-chevron-down text-kvt-500 text-xs group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-4 text-gray-400 text-sm leading-relaxed">{{ $f[1] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-teal-800/10 to-kvt-800/20 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <div class="kaca rounded-2xl p-10">
            <h2 class="text-3xl font-bold text-white mb-4">Komitmen pada <span class="teks-gradien">Kualitas</span></h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto">Bergabunglah dengan platform yang menjunjung standar mutu tertinggi — BAN-PT, ISO, SPMI terintegrasi.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-400 hover:to-cyan-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-teal-500/20">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </a>
                <a href="{{ route('masuk') }}" class="border border-teal-500/30 hover:bg-kvt-800/30 text-white px-8 py-3 rounded-xl font-semibold transition">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
