@extends('tata-letak.utama')
@section('judul', 'CV Builder - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-teal-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-teal-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #14B8A6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-teal-800/30 border border-teal-600/30 rounded-full px-4 py-1.5 text-xs text-teal-300 mb-6" data-aos="fade-down">
            <i class="fas fa-file-alt"></i> AI-Powered & ATS-Friendly
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">CV</span><br>
            <span class="teks-gradien">Builder</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Buat CV profesional yang lolos ATS dalam hitungan menit. AI-powered content suggestions,
            50+ template modern, integrasi LinkedIn, dan export multi-format untuk portofolio digital Anda.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-400 hover:to-cyan-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-teal-500/30 hover:-translate-y-0.5">
                <i class="fas fa-plus-circle mr-2"></i>Buat CV Sekarang
            </a>
            <a href="#fitur" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-magic mr-2"></i>Lihat Fitur
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">50+</div><div class="text-xs text-gray-500">Template</div></div>
            <div><div class="text-2xl font-black text-white">10K+</div><div class="text-xs text-gray-500">CV Dibuat</div></div>
            <div><div class="text-2xl font-black text-white">95%</div><div class="text-xs text-gray-500">Lolos ATS</div></div>
            <div><div class="text-2xl font-black text-white">Gratis</div><div class="text-xs text-gray-500">Basic Plan</div></div>
        </div>
    </div>
</section>

{{-- FITUR BUILDER --}}
<section id="fitur" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">FITUR</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur CV Builder</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Semua yang Anda butuhkan untuk membuat CV profesional yang menonjol</p>
    </div>
    @php
    $fitur = [
        ['ikon' => 'fas fa-robot', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-indigo-500', 'judul' => 'AI Content Writer', 'desc' => 'AI membantu menulis deskripsi pengalaman kerja dan achievement yang impaktif sesuai standar industri global.', 'badge' => 'AI-Powered'],
        ['ikon' => 'fas fa-palette', 'warna' => 'pink', 'gradien' => 'from-pink-500 to-rose-500', 'judul' => '50+ Template Modern', 'desc' => 'Template profesional untuk berbagai industri — Tech, Finance, Creative, Healthcare, dan Engineering.', 'badge' => 'Popular'],
        ['ikon' => 'fas fa-check-double', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'ATS Score Checker', 'desc' => 'Scanner untuk memastikan CV Anda lolos Applicant Tracking System dengan skor detail dan rekomendasi perbaikan.', 'badge' => 'Essential'],
        ['ikon' => 'fas fa-language', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Multi-Bahasa Support', 'desc' => 'Buat CV dalam Bahasa Indonesia, Inggris, Jepang, Jerman, Mandarin, dan 10+ bahasa lainnya.', 'badge' => '15+ Bahasa'],
        ['ikon' => 'fab fa-linkedin', 'warna' => 'cyan', 'gradien' => 'from-cyan-500 to-blue-500', 'judul' => 'LinkedIn Import & Optimize', 'desc' => 'Import profil LinkedIn Anda langsung dan optimize headline, summary, serta keywords untuk visibility.', 'badge' => 'Sync'],
        ['ikon' => 'fas fa-download', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-yellow-500', 'judul' => 'Export PDF / DOCX / Web', 'desc' => 'Unduh CV dalam format PDF, DOCX, atau publish sebagai portfolio website dengan custom domain.', 'badge' => 'Multi-Format'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($fitur as $idx => $f)
        <div class="kaca rounded-2xl p-6 border-{{ $f['warna'] }}-500/20 hover:border-{{ $f['warna'] }}-500/40 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="flex items-start justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br {{ $f['gradien'] }} rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="{{ $f['ikon'] }} text-white text-xl"></i>
                </div>
                <span class="text-[10px] bg-{{ $f['warna'] }}-500/10 text-{{ $f['warna'] }}-400 px-2 py-0.5 rounded-full border border-{{ $f['warna'] }}-500/20">{{ $f['badge'] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $f['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $f['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- TEMPLATE GALLERY --}}
<section class="bg-gradient-to-br from-teal-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-pink-500/10 text-pink-400 px-3 py-1 rounded-full">TEMPLATE</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Galeri Template CV</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Template profesional untuk setiap industri dan level pengalaman</p>
        </div>
        @php
        $templates = [
            ['nama' => 'Tech Minimal', 'industri' => 'IT & Software', 'warna' => 'blue', 'rating' => '4.9', 'dipakai' => '3.2K'],
            ['nama' => 'Executive Bold', 'industri' => 'Management & C-level', 'warna' => 'purple', 'rating' => '4.8', 'dipakai' => '2.8K'],
            ['nama' => 'Creative Studio', 'industri' => 'Design & Creative', 'warna' => 'pink', 'rating' => '4.7', 'dipakai' => '2.1K'],
            ['nama' => 'Finance Pro', 'industri' => 'Banking & Finance', 'warna' => 'green', 'rating' => '4.8', 'dipakai' => '1.9K'],
            ['nama' => 'Academic Classic', 'industri' => 'Education & Research', 'warna' => 'amber', 'rating' => '4.6', 'dipakai' => '1.5K'],
            ['nama' => 'Fresh Graduate', 'industri' => 'Entry Level & Internship', 'warna' => 'cyan', 'rating' => '4.9', 'dipakai' => '4.1K'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($templates as $idx => $t)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                <div class="h-40 bg-gradient-to-br from-{{ $t['warna'] }}-500/10 to-kvt-800/30 flex items-center justify-center">
                    <div class="w-24 h-32 bg-white/10 rounded-lg border border-white/20 flex items-center justify-center group-hover:scale-110 transition">
                        <i class="fas fa-file-alt text-{{ $t['warna'] }}-400 text-2xl"></i>
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="text-white font-bold text-sm mb-1">{{ $t['nama'] }}</h4>
                    <p class="text-gray-500 text-xs mb-2">{{ $t['industri'] }}</p>
                    <div class="flex justify-between text-xs text-gray-400">
                        <span><i class="fas fa-star text-yellow-400 mr-1"></i>{{ $t['rating'] }}</span>
                        <span><i class="fas fa-users mr-1"></i>{{ $t['dipakai'] }} dipakai</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ATS TIPS --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">ATS TIPS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Tips Lolos ATS Scanner</h2>
    </div>
    @php
    $tips = [
        ['ikon' => 'fa-spell-check', 'warna' => 'blue', 'judul' => 'Gunakan Keyword yang Tepat', 'desc' => 'Cocokkan kata kunci di CV Anda dengan yang ada di job description. ATS mencari exact match untuk skill dan qualifications.'],
        ['ikon' => 'fa-align-left', 'warna' => 'green', 'judul' => 'Format yang Clean', 'desc' => 'Hindari tabel, header/footer, text box, dan gambar. Gunakan format standar yang mudah diparsing oleh ATS.'],
        ['ikon' => 'fa-chart-bar', 'warna' => 'purple', 'judul' => 'Quantify Achievement', 'desc' => 'Gunakan angka dan metrik untuk mendeskripsikan pencapaian. Contoh: "Meningkatkan revenue 35% dalam 6 bulan."'],
        ['ikon' => 'fa-file-pdf', 'warna' => 'red', 'judul' => 'Submit dalam PDF', 'desc' => 'PDF mempertahankan formatting lebih baik. Pastikan teks bisa di-copy paste (bukan scan/gambar) agar ATS bisa membacanya.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($tips as $idx => $t)
        <div class="kaca rounded-2xl p-6 flex items-start gap-4 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="w-12 h-12 bg-{{ $t['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0"><i class="fas {{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-xl"></i></div>
            <div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $t['judul'] }}</h3>
                <p class="text-gray-400 text-sm">{{ $t['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">STATISTIK</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">CV Builder dalam Angka</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="zoom-in-up">
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien">50+</div><p class="text-gray-400 text-sm mt-2">Template</p></div>
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien">10K+</div><p class="text-gray-400 text-sm mt-2">CV Dibuat</p></div>
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien">95%</div><p class="text-gray-400 text-sm mt-2">Lolos ATS</p></div>
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien">15+</div><p class="text-gray-400 text-sm mt-2">Bahasa</p></div>
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">CV Builder untuk Semua</h2>
    </div>
    @php
    $roles = [
        ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Mahasiswa', 'fitur' => ['Buat CV pertama dengan guided wizard', 'Template khusus fresh graduate', 'AI suggestion untuk mahasiswa', 'Import data dari LinkedIn/portfolio', 'Export PDF & web portfolio gratis', 'ATS score checker unlimited']],
        ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Dosen', 'fitur' => ['Review & feedback CV siswa', 'Template CV akademik & riset', 'Assign CV building sebagai tugas', 'Dashboard progress siswa', 'Bulk export CV kelas', 'Panduan ATS untuk career class']],
        ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola template library', 'Monitor penggunaan & analitik', 'Custom branding untuk institusi', 'Manage user licenses & quota', 'Integrasi dengan career module', 'Quality assurance template baru']],
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
</section>

{{-- VIDEO TUTORIAL --}}
<section class="bg-gradient-to-br from-teal-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Tutorial CV Builder</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'Cara Membuat CV ATS-Friendly', 'durasi' => '12:40', 'views' => '35K', 'warna' => 'teal', 'thumb' => 'https://placehold.co/640x360/1a1a2e/14B8A6?text=ATS+CV+Guide'],
                ['judul' => 'Optimasi LinkedIn Profile 2026', 'durasi' => '15:22', 'views' => '28K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=LinkedIn+Tips'],
                ['judul' => 'Portfolio Website dari CV Builder', 'durasi' => '09:18', 'views' => '19K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Portfolio+Web'],
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

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apakah CV Builder gratis?', 'a' => 'Ya, basic plan gratis selamanya dengan akses ke 10 template, AI suggestions, dan export PDF. Premium plan membuka 50+ template, ATS checker unlimited, portofolio web, dan multi-bahasa.'],
        ['q' => 'Apa itu ATS dan mengapa penting?', 'a' => 'ATS (Applicant Tracking System) adalah software yang digunakan 90%+ perusahaan untuk menyaring CV otomatis. CV yang tidak ATS-friendly akan ditolak sebelum dibaca oleh HR.'],
        ['q' => 'Bisakah import data dari LinkedIn?', 'a' => 'Ya, cukup hubungkan akun LinkedIn Anda dan data pengalaman kerja, pendidikan, skills, dan sertifikasi akan otomatis terisi di CV builder.'],
        ['q' => 'Format file apa yang bisa di-export?', 'a' => 'CV bisa di-export dalam format PDF (pixel-perfect), DOCX (editable), dan HTML (web portfolio). Premium plan juga mendukung export untuk print-ready dan A4/Letter size.'],
        ['q' => 'Apakah data CV saya aman?', 'a' => 'Sangat aman. Data dienkripsi dengan AES-256, disimpan di server dengan sertifikasi ISO 27001, dan tidak pernah dibagikan ke pihak ketiga tanpa izin Anda.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-2xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 60 }}">
            <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
                <span class="text-white font-semibold text-sm pr-4">{{ $f['q'] }}</span>
                <i class="fas fa-chevron-down text-gray-500 text-xs group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-teal-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Buat CV Profesional Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Gratis selamanya untuk basic plan. Buat CV ATS-friendly dalam 10 menit dengan AI content writer dan 50+ template modern.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-teal-500 to-cyan-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-teal-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Buat CV Gratis
        </a>
    </div>
</section>

@endsection
