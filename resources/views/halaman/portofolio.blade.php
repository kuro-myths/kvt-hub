@extends('tata-letak.utama')
@section('judul', 'E-Portfolio Mahasiswa - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%233399FF%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-sky-800/40 border border-sky-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-briefcase text-sky-400"></i>
            <span class="text-sky-300 text-sm font-semibold">Showcase & Verify</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            E-Portfolio <span class="teks-gradien">Mahasiswa</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Bangun portofolio digital profesional, tampilkan proyek terbaik, dan verifikasi keahlian Anda untuk menarik perhatian recruiter & industri.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-sky-500 to-blue-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-sky-500/30 transition-all">
                <i class="fas fa-plus-circle mr-2"></i>Buat Portfolio
            </a>
            <a href="#showcase" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-eye mr-2"></i>Lihat Showcase
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['15K+','Portfolios'],['50K+','Projects'],['200+','Templates'],['90%','Hired']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Fitur Portfolio --}}
<section class="py-20" id="showcase">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Fitur <span class="teks-gradien">Portfolio</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Buat portfolio yang menarik dengan berbagai fitur unggulan untuk menampilkan kemampuan terbaik Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $fitur = [
                ['icon'=>'fa-project-diagram','color'=>'sky','judul'=>'Project Showcase','desc'=>'Tampilkan proyek dengan deskripsi, screenshot, dan link demo secara profesional','total'=>'200+ template'],
                ['icon'=>'fa-certificate','color'=>'blue','judul'=>'Skill Verification','desc'=>'Verifikasi keahlian melalui asesmen dan badge digital tervalidasi','total'=>'50+ skill badges'],
                ['icon'=>'fa-file-pdf','color'=>'emerald','judul'=>'Resume Builder','desc'=>'Generate CV/resume otomatis dari data portfolio Anda dalam berbagai format','total'=>'30+ format'],
                ['icon'=>'fa-code','color'=>'purple','judul'=>'Code Repository','desc'=>'Integrasikan repository GitHub, GitLab dan tampilkan kontribusi kode Anda','total'=>'GitHub sync'],
                ['icon'=>'fa-share-alt','color'=>'pink','judul'=>'Public Profile','desc'=>'Dapatkan URL portfolio publik yang bisa dibagikan ke recruiter dan perusahaan','total'=>'Custom domain'],
                ['icon'=>'fa-chart-bar','color'=>'amber','judul'=>'Analytics Dashboard','desc'=>'Pantau siapa yang melihat portfolio, dari perusahaan mana, dan engagement-nya','total'=>'Real-time data'],
            ];
            @endphp
            @foreach($fitur as $f)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $f['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $f['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $f['icon'] }} text-{{ $f['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $f['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $f['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-{{ $f['color'] }}-400 text-xs font-semibold">{{ $f['total'] }}</span>
                    <i class="fas fa-arrow-right text-gray-600 group-hover:text-{{ $f['color'] }}-400 transition"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Portfolio Terbaik --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Portfolio <span class="teks-gradien">Terbaik</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Lihat portfolio mahasiswa berprestasi yang telah berhasil mendapatkan pekerjaan impian.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $portfolios = [
                ['nama'=>'Rina Anggraini','jurusan'=>'Informatika','proyek'=>'12 Projects','skill'=>'Full-Stack Developer','color'=>'sky'],
                ['nama'=>'Dimas Prabowo','jurusan'=>'Desain Komunikasi Visual','proyek'=>'18 Projects','skill'=>'UI/UX Designer','color'=>'blue'],
                ['nama'=>'Siti Nurhaliza','jurusan'=>'Data Science','proyek'=>'9 Projects','skill'=>'Data Analyst','color'=>'emerald'],
                ['nama'=>'Andi Setiawan','jurusan'=>'Teknik Elektro','proyek'=>'15 Projects','skill'=>'IoT Engineer','color'=>'purple'],
                ['nama'=>'Maya Putri','jurusan'=>'Sistem Informasi','proyek'=>'11 Projects','skill'=>'Product Manager','color'=>'pink'],
                ['nama'=>'Farhan Rizky','jurusan'=>'Ilmu Komputer','proyek'=>'20 Projects','skill'=>'Mobile Developer','color'=>'amber'],
            ];
            @endphp
            @foreach($portfolios as $p)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $p['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $p['color'] }}-400 bg-{{ $p['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $p['skill'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-2">{{ $p['nama'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-graduation-cap text-xs"></i> {{ $p['jurusan'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-folder-open mr-1"></i>{{ $p['proyek'] }}</span>
                        <span><i class="fas fa-star mr-1 text-yellow-500"></i>Featured</span>
                    </div>
                    <button class="w-full bg-{{ $p['color'] }}-500/10 text-{{ $p['color'] }}-400 border border-{{ $p['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $p['color'] }}-500/20 transition">
                        <i class="fas fa-eye mr-2"></i>Lihat Portfolio
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Template Section --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Template <span class="teks-gradien">Profesional</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pilih dari ratusan template portfolio yang dirancang untuk berbagai bidang keahlian.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $templates = [
                ['judul'=>'Developer Pro','desc'=>'Untuk software engineer & developer','color'=>'sky'],
                ['judul'=>'Creative Studio','desc'=>'Untuk desainer & kreator konten','color'=>'pink'],
                ['judul'=>'Research Scholar','desc'=>'Untuk peneliti & akademisi','color'=>'purple'],
                ['judul'=>'Business Executive','desc'=>'Untuk profesional bisnis & manajemen','color'=>'emerald'],
            ];
            @endphp
            @foreach($templates as $t)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $t['color'] }}-500/30 transition-all card-hover text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-16 h-16 bg-{{ $t['color'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-palette text-{{ $t['color'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $t['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $t['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Showcase --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Portofolio <span class="teks-gradien">Terbaik</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Karya terbaik dari anggota komunitas KVT Hub</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
            $showcase = [
                ['judul' => 'E-Learning Dashboard', 'author' => 'Andi R.', 'tags' => ['UI/UX','Figma'], 'views' => '2.1K', 'likes' => '340', 'warna' => 'sky'],
                ['judul' => 'API Gateway System', 'author' => 'Dewi S.', 'tags' => ['Backend','Go'], 'views' => '1.8K', 'likes' => '285', 'warna' => 'green'],
                ['judul' => 'Mobile Health App', 'author' => 'Budi P.', 'tags' => ['Flutter','Firebase'], 'views' => '3.2K', 'likes' => '520', 'warna' => 'purple'],
            ];
            @endphp
            @foreach($showcase as $i => $s)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden hover:border-{{ $s['warna'] }}-500/30 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="h-40 bg-gradient-to-br from-{{ $s['warna'] }}-900/30 to-kvt-900/30 flex items-center justify-center">
                    <i class="fas fa-laptop-code text-{{ $s['warna'] }}-400/30 text-6xl"></i>
                </div>
                <div class="p-5">
                    <h3 class="text-white font-bold mb-2">{{ $s['judul'] }}</h3>
                    <p class="text-gray-500 text-xs mb-3">oleh {{ $s['author'] }}</p>
                    <div class="flex gap-2 mb-3">@foreach($s['tags'] as $tag)<span class="bg-{{ $s['warna'] }}-500/10 text-{{ $s['warna'] }}-400 text-[10px] px-2 py-1 rounded-full">{{ $tag }}</span>@endforeach</div>
                    <div class="flex gap-4 text-gray-500 text-xs"><span><i class="fas fa-eye mr-1"></i>{{ $s['views'] }}</span><span><i class="fas fa-heart mr-1"></i>{{ $s['likes'] }}</span></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-4">FAQ <span class="teks-gradien">Portofolio</span></h2>
        </div>
        @php
        $faq = [
            ['q' => 'Siapa yang bisa membuat portofolio?', 'a' => 'Semua pengguna terdaftar bisa membuat portofolio. Fitur premium memberikan template tambahan dan custom domain.'],
            ['q' => 'Apakah portofolio bisa dilihat publik?', 'a' => 'Ya! Portofolio bersifat publik secara default. Anda juga bisa mengatur visibilitas ke private atau unlisted.'],
            ['q' => 'Format file apa yang didukung?', 'a' => 'Gambar (JPG, PNG, SVG), PDF, video (MP4), dan link ke repository GitHub, Figma, atau Behance.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $i => $item)
            <div class="kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                    <span class="text-white font-semibold text-sm"><i class="fas fa-question-circle text-sky-400 mr-2"></i>{{ $item['q'] }}</span>
                    <i class="fas fa-chevron-down text-sky-400 text-xs transition-transform duration-300"></i>
                </button>
                <div class="hidden px-5 pb-5"><p class="text-gray-400 text-sm">{{ $item['a'] }}</p></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Siap Membangun <span class="teks-gradien">Portfolio Impian</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Buat portfolio profesional Anda sekarang dan tunjukkan kemampuan terbaik kepada dunia industri.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-blue-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-sky-500/30 transition-all">
                    <i class="fas fa-rocket"></i> Mulai Gratis
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-info-circle"></i> Pelajari Lebih
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
