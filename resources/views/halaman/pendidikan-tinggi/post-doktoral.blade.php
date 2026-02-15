@extends('tata-letak.utama')
@section('judul', 'Post-Doctoral - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-indigo-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(99,102,241,0.4) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-indigo-800/30 border border-indigo-600/30 rounded-full px-4 py-1.5 text-xs text-indigo-300 mb-6" data-aos="fade-down">
            <i class="fas fa-star"></i> Program Post-Doctoral Research
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Post-</span><span class="teks-gradien">Doctoral</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Riset lanjutan pasca doktorat. Kolaborasi dengan lab riset kelas dunia, publikasi di jurnal Nature & Science, dan bimbingan menuju profesor.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-indigo-400 hover:to-blue-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-indigo-500/20">
                <i class="fas fa-rocket mr-2"></i>Apply Now
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- Jenis Fellowship --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Jenis Fellowship Post-Doc</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Pilih jalur karir post-doctoral yang sesuai dengan tujuan risetmu</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-right" data-aos-delay="200">
        <div class="kaca rounded-2xl p-6 border-indigo-500/20 hover:border-indigo-500/40 transition group">
            <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-microscope text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">Research Fellow</h3>
            <p class="text-gray-400 text-sm mb-4">Posisi riset penuh waktu di lab universitas mitra. Fokus pada satu bidang riset spesifik selama 1-3 tahun.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-indigo-400 mr-2"></i>Full-time research</li>
                <li><i class="fas fa-check text-indigo-400 mr-2"></i>Salary & benefits</li>
                <li><i class="fas fa-check text-indigo-400 mr-2"></i>Lab access 24/7</li>
            </ul>
        </div>
        <div class="kaca rounded-2xl p-6 border-purple-500/20 hover:border-purple-500/40 transition group">
            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-chalkboard-teacher text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">Teaching Fellow</h3>
            <p class="text-gray-400 text-sm mb-4">Kombinasi riset dan pengajaran di universitas. Persiapan menuju posisi asisten profesor.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-purple-400 mr-2"></i>Teaching experience</li>
                <li><i class="fas fa-check text-purple-400 mr-2"></i>Research grant</li>
                <li><i class="fas fa-check text-purple-400 mr-2"></i>Tenure track prep</li>
            </ul>
        </div>
        <div class="kaca rounded-2xl p-6 border-blue-500/20 hover:border-blue-500/40 transition group">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-industry text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">Industry Post-Doc</h3>
            <p class="text-gray-400 text-sm mb-4">Riset terapan di R&D perusahaan teknologi. Google, Microsoft, NVIDIA, dan perusahaan top lainnya.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Applied research</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Industry salary</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Patent & IP rights</li>
            </ul>
        </div>
    </div>
</section>

{{-- Research Grants & Hibah --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Research Grants & Hibah Riset</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Pendanaan riset dari lembaga nasional dan internasional</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="zoom-in" data-aos-delay="200">
            @php
            $grants = [
                ['ERC Starting Grant', 'European Research Council grant hingga €1.5M untuk riset independen selama 5 tahun.', 'fa-euro-sign', 'text-blue-400'],
                ['NIH R01 Grant', 'National Institutes of Health grant untuk riset biomedis dan kesehatan.', 'fa-heartbeat', 'text-red-400'],
                ['BRIN Research Fund', 'Dana riset dari Badan Riset dan Inovasi Nasional Indonesia.', 'fa-flag', 'text-green-400'],
                ['KVT Innovation Grant', 'Hibah internal KVT Hub hingga $100K untuk riset inovatif dan disruptif.', 'fa-lightbulb', 'text-yellow-400'],
            ];
            @endphp
            @foreach($grants as $g)
            <div class="kaca rounded-2xl p-5 text-center hover:border-indigo-500/20 transition">
                <i class="fas {{ $g[2] }} {{ $g[3] }} text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">{{ $g[0] }}</h3>
                <p class="text-gray-400 text-xs">{{ $g[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- International Partnerships --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Kemitraan Internasional</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Kolaborasi riset dengan institusi riset terkemuka dunia</p>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4" data-aos="fade-up" data-aos-delay="200">
        @php
        $partners = [
            ['MIT', 'fa-university', 'text-red-400'],
            ['Stanford', 'fa-university', 'text-green-400'],
            ['CERN', 'fa-atom', 'text-blue-400'],
            ['Max Planck', 'fa-flask', 'text-purple-400'],
            ['RIKEN Japan', 'fa-dna', 'text-pink-400'],
            ['Oxford', 'fa-university', 'text-yellow-400'],
        ];
        @endphp
        @foreach($partners as $pt)
        <div class="kaca rounded-xl p-4 text-center hover:border-indigo-500/30 transition">
            <div class="w-10 h-10 mx-auto bg-kvt-800/50 rounded-lg flex items-center justify-center mb-2">
                <i class="fas {{ $pt[1] }} {{ $pt[2] }}"></i>
            </div>
            <span class="text-xs text-gray-400">{{ $pt[0] }}</span>
        </div>
        @endforeach
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-indigo-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">50+</div><p class="text-gray-400 text-sm mt-1">Posisi Post-Doc</p></div>
        <div><div class="text-3xl font-black teks-gradien">30+</div><p class="text-gray-400 text-sm mt-1">Lab Riset Mitra</p></div>
        <div><div class="text-3xl font-black teks-gradien">Nature/Science</div><p class="text-gray-400 text-sm mt-1">Target Publikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien">$80K+</div><p class="text-gray-400 text-sm mt-1">Rata-rata Salary</p></div>
    </div>
</section>

{{-- Video --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Pengalaman Post-Doctoral Researcher</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Testimoni dan kehidupan riset post-doc di laboratorium kelas dunia</p>
    </div>
    <div class="kaca rounded-2xl overflow-hidden aspect-video" data-aos="zoom-in" data-aos-delay="200">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Post-Doctoral Program KVT Hub" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>

{{-- Peran Pengguna (Researcher / Mentor / Admin) --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Fitur untuk Setiap Peran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
            @php
            $peran = [
                ['Post-Doc Researcher', 'fa-user-graduate', 'from-indigo-500 to-blue-500', [
                    'Portal riset & manajemen proyek',
                    'Tracking publikasi & impact factor',
                    'Akses database & jurnal premium',
                    'Networking dengan sesama post-doc global',
                ]],
                ['Mentor / PI (Supervisor)', 'fa-chalkboard-teacher', 'from-green-500 to-emerald-500', [
                    'Dashboard supervisi post-doc',
                    'Co-authoring & grant management',
                    'Evaluasi progress riset berkala',
                    'Rekomendasi untuk tenure track',
                ]],
                ['Admin Research Office', 'fa-user-shield', 'from-purple-500 to-violet-500', [
                    'Analitik output & impact riset',
                    'Manajemen kontrak & fellowship',
                    'Laporan pendanaan & grant usage',
                    'Koordinasi kemitraan internasional',
                ]],
            ];
            @endphp
            @foreach($peran as $p)
            <div class="kaca rounded-2xl p-6 hover:border-indigo-500/30 transition">
                <div class="w-12 h-12 bg-gradient-to-br {{ $p[2] }} rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $p[1] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-4">{{ $p[0] }}</h3>
                <ul class="space-y-2">
                    @foreach($p[3] as $fitur)
                    <li class="flex items-start gap-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-indigo-400 mt-0.5 shrink-0"></i>{{ $fitur }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Pertanyaan Umum (FAQ)</h2>
    <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
        @php
        $faq = [
            ['Apa itu program post-doctoral?', 'Post-doctoral adalah program riset lanjutan setelah meraih gelar doktor (PhD/S3). Peneliti post-doc bekerja di lab riset universitas atau industri selama 1-3 tahun untuk memperdalam keahlian dan membangun rekam jejak publikasi.'],
            ['Apa perbedaan Research Fellow dan Teaching Fellow?', 'Research Fellow fokus 100% pada riset di laboratorium, sedangkan Teaching Fellow mengkombinasikan riset (70%) dengan pengajaran (30%) sebagai persiapan menuju posisi asisten profesor.'],
            ['Berapa gaji post-doctoral researcher?', 'Gaji bervariasi berdasarkan negara dan institusi. Di AS rata-rata $55K-$80K/tahun, di Eropa €40K-€60K/tahun, dan di Indonesia Rp 15-30 juta/bulan tergantung lembaga dan grant.'],
            ['Bagaimana cara melamar posisi post-doc?', 'Lamar melalui portal KVT Hub dengan melampirkan CV akademik, daftar publikasi, research proposal, dan 2-3 surat rekomendasi dari promotor atau kolaborator riset.'],
            ['Apakah post-doc bisa berlanjut ke posisi profesor?', 'Ya, post-doc adalah jalur umum menuju karir akademik tetap. Setelah 1-3 tahun post-doc dengan track record publikasi kuat, peneliti dapat melamar posisi asisten profesor (tenure track).'],
        ];
        @endphp
        @foreach($faq as $f)
        <details class="kaca rounded-xl group">
            <summary class="flex items-center justify-between cursor-pointer p-5 text-white font-semibold hover:text-indigo-400 transition">
                <span>{{ $f[0] }}</span>
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm leading-relaxed">{{ $f[1] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-indigo-900/20 to-kvt-900/40 py-16">
    <div class="max-w-3xl mx-auto px-4 text-center" data-aos="zoom-in">
        <div class="kaca rounded-2xl p-10">
            <i class="fas fa-star text-indigo-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Lanjutkan Risetmu ke Level Dunia</h2>
            <p class="text-gray-400 mb-8">Bergabung dengan komunitas post-doctoral researcher global. Akses lab kelas dunia dan publikasi di jurnal terbaik!</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-indigo-400 hover:to-blue-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-indigo-500/20">
                    <i class="fas fa-rocket mr-2"></i>Apply Now
                </a>
                <a href="{{ route('masuk') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
