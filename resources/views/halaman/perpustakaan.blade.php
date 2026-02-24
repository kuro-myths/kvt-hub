@extends('tata-letak.utama')
@section('judul', 'Perpustakaan Digital - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%2310B981%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-kvt-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-book-open text-emerald-400"></i>
            <span class="text-kvt-300 text-sm font-semibold">Akses 24/7</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Perpustakaan <span class="teks-gradien">Digital</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Akses ratusan ribu koleksi e-book, jurnal ilmiah, skripsi, dan referensi akademik dari berbagai penerbit terkemuka di dunia.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#koleksi" class="bg-gradient-to-r from-emerald-500 to-green-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                <i class="fas fa-search mr-2"></i>Jelajahi Koleksi
            </a>
            <a href="#cara-akses" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-key mr-2"></i>Cara Akses
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['100K+','Judul Buku'],['500K+','Pembaca'],['200+','Penerbit'],['24/7','Akses']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Koleksi --}}
<section class="py-20" id="koleksi">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kategori <span class="teks-gradien">Koleksi</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Temukan sumber bacaan dan referensi sesuai kebutuhan akademik Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kategoris = [
                ['icon'=>'fa-tablet-alt','color'=>'emerald','judul'=>'E-Book','desc'=>'Ribuan buku digital dari berbagai bidang ilmu, tersedia dalam format PDF dan EPUB','total'=>'45.000 judul'],
                ['icon'=>'fa-file-alt','color'=>'green','judul'=>'Jurnal Ilmiah','desc'=>'Akses jurnal nasional dan internasional bereputasi, terindeks Scopus & WoS','total'=>'28.000 artikel'],
                ['icon'=>'fa-graduation-cap','color'=>'teal','judul'=>'Skripsi & Tesis','desc'=>'Koleksi karya ilmiah mahasiswa dari berbagai perguruan tinggi di Indonesia','total'=>'15.000 karya'],
                ['icon'=>'fa-bookmark','color'=>'kvt','judul'=>'Referensi','desc'=>'Ensiklopedia, kamus, handbook, dan materi referensi lengkap lainnya','total'=>'8.000 judul'],
                ['icon'=>'fa-headphones','color'=>'purple','judul'=>'Audio Book','desc'=>'Dengarkan buku favorit Anda dalam format audio berkualitas tinggi','total'=>'3.500 judul'],
                ['icon'=>'fa-unlock-alt','color'=>'amber','judul'=>'Open Access','desc'=>'Koleksi gratis dan terbuka dari repositori akademik di seluruh dunia','total'=>'12.000 judul'],
            ];
            @endphp
            @foreach($kategoris as $k)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $k['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $k['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $k['icon'] }} text-{{ $k['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $k['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-{{ $k['color'] }}-400 text-xs font-semibold">{{ $k['total'] }}</span>
                    <i class="fas fa-arrow-right text-gray-600 group-hover:text-{{ $k['color'] }}-400 transition"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Buku Populer --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Buku <span class="teks-gradien">Populer</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Koleksi yang paling banyak dibaca bulan ini.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $buku = [
                ['judul'=>'Algoritma & Pemrograman Modern','penulis'=>'Dr. Rina Wijaya','kategori'=>'E-Book','pembaca'=>'12.5K','color'=>'emerald'],
                ['judul'=>'Metodologi Penelitian Kuantitatif','penulis'=>'Prof. Ahmad Dahlan','kategori'=>'Referensi','pembaca'=>'9.8K','color'=>'green'],
                ['judul'=>'Machine Learning: Teori & Praktik','penulis'=>'Dian Saputra, M.Cs','kategori'=>'E-Book','pembaca'=>'8.7K','color'=>'teal'],
                ['judul'=>'Jurnal Teknologi Informasi Vol. 15','penulis'=>'Tim Redaksi JTI','kategori'=>'Jurnal','pembaca'=>'7.2K','color'=>'kvt'],
                ['judul'=>'Psikologi Pendidikan Abad 21','penulis'=>'Dr. Sari Dewi, Psi','kategori'=>'E-Book','pembaca'=>'6.5K','color'=>'purple'],
                ['judul'=>'Manajemen Strategis Digital','penulis'=>'Budi Hartono, MBA','kategori'=>'Audio Book','pembaca'=>'5.9K','color'=>'amber'],
            ];
            @endphp
            @foreach($buku as $b)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $b['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $b['color'] }}-400 bg-{{ $b['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $b['kategori'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-3">{{ $b['judul'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-user-edit text-xs"></i> {{ $b['penulis'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-eye mr-1"></i>{{ $b['pembaca'] }} pembaca</span>
                    </div>
                    <button class="w-full bg-{{ $b['color'] }}-500/10 text-{{ $b['color'] }}-400 border border-{{ $b['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $b['color'] }}-500/20 transition">
                        <i class="fas fa-book-reader mr-2"></i>Baca Sekarang
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Cara Akses --}}
<section class="py-20" id="cara-akses">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Cara <span class="teks-gradien">Akses</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Mulai membaca dalam 4 langkah mudah.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $langkah = [
                ['no'=>'01','icon'=>'fa-user-plus','judul'=>'Daftar Akun','desc'=>'Buat akun KVT Hub gratis atau masuk dengan akun institusi Anda.'],
                ['no'=>'02','icon'=>'fa-search','judul'=>'Cari Koleksi','desc'=>'Gunakan pencarian canggih untuk menemukan buku, jurnal, atau referensi.'],
                ['no'=>'03','icon'=>'fa-download','judul'=>'Unduh atau Baca','desc'=>'Baca langsung online atau unduh untuk akses offline di perangkat Anda.'],
                ['no'=>'04','icon'=>'fa-bookmark','judul'=>'Simpan & Kelola','desc'=>'Tandai favorit, buat koleksi pribadi, dan atur daftar bacaan Anda.'],
            ];
            @endphp
            @foreach($langkah as $l)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-emerald-500/20 text-5xl font-black mb-3">{{ $l['no'] }}</div>
                <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $l['icon'] }} text-emerald-400 text-lg"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $l['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Reading Stats --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Buku <span class="teks-gradien">Populer</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Buku yang paling banyak dibaca oleh komunitas KVT Hub</p>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            @php
            $buku = [
                ['judul' => 'Clean Code', 'penulis' => 'Robert C. Martin', 'readers' => '5.2K', 'ikon' => 'fa-laptop-code', 'warna' => 'kvt'],
                ['judul' => 'Data Structures & Algorithms', 'penulis' => 'Thomas Cormen', 'readers' => '4.1K', 'ikon' => 'fa-project-diagram', 'warna' => 'green'],
                ['judul' => 'AI: A Modern Approach', 'penulis' => 'Stuart Russell', 'readers' => '3.8K', 'ikon' => 'fa-robot', 'warna' => 'purple'],
                ['judul' => 'Design Patterns', 'penulis' => 'GoF', 'readers' => '3.5K', 'ikon' => 'fa-cubes', 'warna' => 'amber'],
            ];
            @endphp
            @foreach($buku as $i => $b)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-5 text-center hover:border-{{ $b['warna'] }}-500/30 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="w-14 h-14 bg-{{ $b['warna'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-3">
                    <i class="fas {{ $b['ikon'] }} text-{{ $b['warna'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-sm mb-1">{{ $b['judul'] }}</h3>
                <p class="text-gray-500 text-xs mb-2">{{ $b['penulis'] }}</p>
                <span class="text-{{ $b['warna'] }}-400 text-xs font-semibold"><i class="fas fa-users mr-1"></i>{{ $b['readers'] }} pembaca</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-4">FAQ <span class="teks-gradien">Perpustakaan</span></h2>
        </div>
        @php
        $faq = [
            ['q' => 'Apakah bisa membaca offline?', 'a' => 'Pengguna Premium bisa mendownload buku dalam format EPUB dan PDF untuk dibaca offline di perangkat manapun.'],
            ['q' => 'Berapa buku yang bisa dipinjam?', 'a' => 'Pengguna Gratis bisa meminjam 3 buku sekaligus. Premium unlimited. Masa pinjam 14 hari dan bisa diperpanjang.'],
            ['q' => 'Bagaimana cara request buku baru?', 'a' => 'Gunakan fitur "Request Buku" di perpustakaan. Tim kurasi akan meninjau dan menambahkan buku yang sesuai dalam 1-2 minggu.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $i => $item)
            <div class="kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                    <span class="text-white font-semibold text-sm"><i class="fas fa-question-circle text-emerald-400 mr-2"></i>{{ $item['q'] }}</span>
                    <i class="fas fa-chevron-down text-emerald-400 text-xs transition-transform duration-300"></i>
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
            <h2 class="text-3xl font-black mb-4">Mulai Membaca <span class="teks-gradien">Tanpa Batas</span></h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Akses seluruh koleksi perpustakaan digital KVT Hub dan tingkatkan wawasan Anda setiap hari.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-green-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                    <i class="fas fa-rocket"></i> Daftar Gratis
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-info-circle"></i> Pelajari Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
