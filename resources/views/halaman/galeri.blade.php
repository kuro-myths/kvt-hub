@extends('tata-letak.utama')
@section('judul', 'Galeri Foto & Video - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-rose-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23F43F5E%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-rose-800/40 border border-rose-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-camera-retro text-rose-400"></i>
            <span class="text-rose-300 text-sm font-semibold">Foto, Video & Dokumentasi</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Galeri <span class="teks-gradien">Foto & Video</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Jelajahi momen-momen berharga dari berbagai kegiatan akademik, event, dan pencapaian komunitas KVT Hub.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#album" class="bg-gradient-to-r from-rose-600 to-pink-400 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-rose-500/30 transition-all">
                <i class="fas fa-images mr-2"></i>Lihat Album
            </a>
            <a href="#video" class="border border-rose-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-rose-800/50 transition-all">
                <i class="fas fa-film mr-2"></i>Video Highlights
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['5K+','Foto'],['500+','Video'],['200+','Event'],['50+','Album']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Album Terbaru --}}
<section class="py-20" id="album">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Album <span class="teks-gradien">Terbaru</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Dokumentasi terbaru dari berbagai kegiatan dan acara yang diselenggarakan KVT Hub.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $album = [
                ['judul'=>'Wisuda Angkatan 2025','foto'=>'128 Foto','tgl'=>'15 Feb 2026','color'=>'rose','icon'=>'fa-graduation-cap','desc'=>'Dokumentasi lengkap upacara wisuda angkatan 2025 di auditorium utama'],
                ['judul'=>'Hackathon KVT 2026','foto'=>'95 Foto','tgl'=>'8 Feb 2026','color'=>'kvt','icon'=>'fa-code','desc'=>'Kompetisi coding 48 jam dengan peserta dari seluruh Indonesia'],
                ['judul'=>'Workshop AI & Machine Learning','foto'=>'64 Foto','tgl'=>'1 Feb 2026','color'=>'purple','icon'=>'fa-robot','desc'=>'Workshop intensif 3 hari bersama praktisi AI dari Silicon Valley'],
                ['judul'=>'Festival Seni & Budaya','foto'=>'210 Foto','tgl'=>'25 Jan 2026','color'=>'amber','icon'=>'fa-music','desc'=>'Pentas seni tahunan menampilkan kreativitas mahasiswa dari berbagai jurusan'],
                ['judul'=>'Seminar Nasional Pendidikan','foto'=>'87 Foto','tgl'=>'18 Jan 2026','color'=>'green','icon'=>'fa-chalkboard','desc'=>'Seminar nasional dengan keynote speaker dari Kemendikbud dan akademisi'],
                ['judul'=>'Outbound & Team Building','foto'=>'156 Foto','tgl'=>'10 Jan 2026','color'=>'teal','icon'=>'fa-campground','desc'=>'Kegiatan outbound untuk mempererat kebersamaan civitas akademika'],
            ];
            @endphp
            @foreach($album as $a)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="h-48 bg-gradient-to-br from-{{ $a['color'] }}-500/20 to-{{ $a['color'] }}-900/10 flex items-center justify-center relative">
                    <i class="fas {{ $a['icon'] }} text-{{ $a['color'] }}-400/30 text-6xl group-hover:scale-110 transition-transform"></i>
                    <div class="absolute top-4 right-4 bg-black/50 text-white text-xs px-3 py-1 rounded-full">
                        <i class="fas fa-camera mr-1"></i>{{ $a['foto'] }}
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-white font-bold text-lg mb-2">{{ $a['judul'] }}</h3>
                    <p class="text-gray-500 text-sm mb-3">{{ $a['desc'] }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-xs"><i class="fas fa-calendar mr-1"></i>{{ $a['tgl'] }}</span>
                        <span class="text-{{ $a['color'] }}-400 text-sm font-semibold group-hover:underline cursor-pointer">Lihat Album <i class="fas fa-arrow-right ml-1"></i></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Galeri --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kategori <span class="teks-gradien">Galeri</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Telusuri galeri berdasarkan kategori kegiatan yang Anda minati.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $kategori = [
                ['icon'=>'fa-university','judul'=>'Akademik','total'=>'1.5K foto','color'=>'kvt'],
                ['icon'=>'fa-trophy','judul'=>'Kompetisi','total'=>'890 foto','color'=>'amber'],
                ['icon'=>'fa-users','judul'=>'Komunitas','total'=>'1.2K foto','color'=>'green'],
                ['icon'=>'fa-palette','judul'=>'Seni & Budaya','total'=>'750 foto','color'=>'rose'],
            ];
            @endphp
            @foreach($kategori as $k)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $k['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-14 h-14 bg-{{ $k['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $k['icon'] }} text-{{ $k['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $k['total'] }}</p>
                <button class="w-full bg-{{ $k['color'] }}-500/10 text-{{ $k['color'] }}-400 border border-{{ $k['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $k['color'] }}-500/20 transition">
                    Jelajahi <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Video Highlights --}}
<section class="py-20" id="video">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Video <span class="teks-gradien">Highlights</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Tonton video dokumentasi terbaik dari kegiatan-kegiatan unggulan KVT Hub.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul'=>'Highlight Wisuda 2025','durasi'=>'12:34','views'=>'8.5K views','color'=>'rose'],
                ['judul'=>'After Movie Hackathon','durasi'=>'8:21','views'=>'6.2K views','color'=>'kvt'],
                ['judul'=>'Campus Tour Virtual','durasi'=>'15:00','views'=>'12K views','color'=>'green'],
                ['judul'=>'Testimonial Alumni','durasi'=>'10:45','views'=>'9.8K views','color'=>'purple'],
                ['judul'=>'Recap Festival Budaya','durasi'=>'6:18','views'=>'5.1K views','color'=>'amber'],
                ['judul'=>'Behind the Scenes Workshop','durasi'=>'9:55','views'=>'4.3K views','color'=>'teal'],
            ];
            @endphp
            @foreach($videos as $v)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="h-44 bg-gradient-to-br from-{{ $v['color'] }}-500/10 to-kvt-900 flex items-center justify-center relative">
                    <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-{{ $v['color'] }}-500/30 transition-all cursor-pointer">
                        <i class="fas fa-play text-white text-xl ml-1"></i>
                    </div>
                    <div class="absolute bottom-3 right-3 bg-black/70 text-white text-xs px-2 py-1 rounded">{{ $v['durasi'] }}</div>
                </div>
                <div class="p-5">
                    <h3 class="text-white font-bold mb-2">{{ $v['judul'] }}</h3>
                    <div class="flex items-center gap-3 text-gray-500 text-xs">
                        <span><i class="fas fa-eye mr-1"></i>{{ $v['views'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Upload Karya --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Upload <span class="teks-gradien">Karya</span> Anda</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Bagikan momen terbaik Anda! Kontribusikan foto dan video kegiatan untuk galeri komunitas.</p>
        </div>
        <div class="bg-kvt-900/50 border-2 border-dashed border-kvt-700/30 rounded-3xl p-12 text-center" data-aos="fade-up">
            <div class="w-20 h-20 bg-rose-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-cloud-upload-alt text-rose-400 text-3xl"></i>
            </div>
            <h3 class="text-white font-bold text-xl mb-3">Drag & Drop atau Klik untuk Upload</h3>
            <p class="text-gray-500 text-sm mb-6">Format: JPG, PNG, MP4, MOV — Maks 50MB per file</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="bg-gradient-to-r from-rose-500 to-pink-500 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:shadow-rose-500/30 transition-all">
                    <i class="fas fa-camera mr-2"></i>Upload Foto
                </button>
                <button class="border border-rose-700/50 text-rose-400 px-6 py-3 rounded-xl font-semibold hover:bg-rose-800/20 transition-all">
                    <i class="fas fa-video mr-2"></i>Upload Video
                </button>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-rose-800/50 to-kvt-900/50 border border-rose-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Abadikan Setiap <span class="teks-gradien">Momen</span> Berharga</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Bergabunglah dengan komunitas KVT Hub dan jadilah bagian dari setiap momen bersejarah.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-kvt-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-rose-500/30 transition-all">
                    <i class="fas fa-heart"></i> Gabung Sekarang
                </a>
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
