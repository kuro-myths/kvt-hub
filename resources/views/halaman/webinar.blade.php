@extends('tata-letak.utama')
@section('judul', 'Webinar & Seminar Online - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%233399FF%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-kvt-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-video text-kvt-400"></i>
            <span class="text-kvt-300 text-sm font-semibold">Live & On-Demand</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Webinar & <span class="teks-gradien">Seminar Online</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Ikuti webinar dari pakar industri, akademisi, dan praktisi teknologi. Tersedia live session dan rekaman on-demand.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#jadwal" class="bg-gradient-to-r from-kvt-500 to-kvt-400 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-kvt-500/30 transition-all">
                <i class="fas fa-calendar-alt mr-2"></i>Jadwal Webinar
            </a>
            <a href="#arsip" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-play-circle mr-2"></i>Tonton Rekaman
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['250+','Webinar'],['50K+','Peserta'],['120+','Pembicara'],['98%','Rating']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Webinar --}}
<section class="py-20" id="jadwal">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kategori <span class="teks-gradien">Webinar</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pilih topik yang sesuai dengan minat & kebutuhan pengembangan diri Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kategoris = [
                ['icon'=>'fa-laptop-code','color'=>'kvt','judul'=>'Teknologi & Programming','desc'=>'Web dev, AI/ML, cloud computing, cybersecurity','total'=>'45 webinar'],
                ['icon'=>'fa-chart-line','color'=>'green','judul'=>'Bisnis & Entrepreneurship','desc'=>'Startup, digital marketing, leadership, finance','total'=>'38 webinar'],
                ['icon'=>'fa-flask','color'=>'purple','judul'=>'Sains & Riset','desc'=>'Penelitian terapan, publikasi jurnal, metodologi','total'=>'32 webinar'],
                ['icon'=>'fa-palette','color'=>'pink','judul'=>'Desain & Kreativitas','desc'=>'UI/UX, graphic design, content creation','total'=>'28 webinar'],
                ['icon'=>'fa-heartbeat','color'=>'red','judul'=>'Kesehatan & Psikologi','desc'=>'Mental health, wellness, public health','total'=>'25 webinar'],
                ['icon'=>'fa-gavel','color'=>'amber','judul'=>'Hukum & Kebijakan','desc'=>'Regulasi digital, hak cipta, kebijakan publik','total'=>'20 webinar'],
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

{{-- Upcoming Webinar --}}
<section class="py-20 bg-kvt-900/30" id="arsip">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Webinar <span class="teks-gradien">Mendatang</span></h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $webinars = [
                ['judul'=>'Masa Depan AI di Pendidikan Indonesia','speaker'=>'Dr. Andi Wijaya','tgl'=>'5 Mar 2026','jam'=>'19:00 WIB','kategori'=>'Teknologi','color'=>'kvt'],
                ['judul'=>'Strategi Membangun Startup EdTech','speaker'=>'Sarah Kusuma, MBA','tgl'=>'12 Mar 2026','jam'=>'14:00 WIB','kategori'=>'Bisnis','color'=>'green'],
                ['judul'=>'Publikasi Jurnal Internasional Q1','speaker'=>'Prof. Budi Santoso','tgl'=>'19 Mar 2026','jam'=>'10:00 WIB','kategori'=>'Riset','color'=>'purple'],
                ['judul'=>'UI/UX Design System untuk Pemula','speaker'=>'Dika Pratama','tgl'=>'26 Mar 2026','jam'=>'19:00 WIB','kategori'=>'Desain','color'=>'pink'],
                ['judul'=>'Cloud Architecture Best Practices','speaker'=>'Reza Fahmi, AWS SA','tgl'=>'2 Apr 2026','jam'=>'15:00 WIB','kategori'=>'Teknologi','color'=>'kvt'],
                ['judul'=>'Mental Health untuk Mahasiswa','speaker'=>'Dr. Amelia Putri, Psi','tgl'=>'9 Apr 2026','jam'=>'13:00 WIB','kategori'=>'Kesehatan','color'=>'red'],
            ];
            @endphp
            @foreach($webinars as $w)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $w['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $w['color'] }}-400 bg-{{ $w['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $w['kategori'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-3">{{ $w['judul'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-user-tie text-xs"></i> {{ $w['speaker'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-calendar mr-1"></i>{{ $w['tgl'] }}</span>
                        <span><i class="fas fa-clock mr-1"></i>{{ $w['jam'] }}</span>
                    </div>
                    <button class="w-full bg-{{ $w['color'] }}-500/10 text-{{ $w['color'] }}-400 border border-{{ $w['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $w['color'] }}-500/20 transition">
                        <i class="fas fa-ticket-alt mr-2"></i>Daftar Sekarang
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Ingin Menjadi <span class="teks-gradien">Pembicara</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Bagikan keahlian Anda kepada ribuan peserta. Daftarkan diri sebagai pembicara webinar KVT Hub.</p>
            <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-kvt-500/30 transition-all">
                <i class="fas fa-microphone-alt"></i> Ajukan Proposal
            </a>
        </div>
    </div>
</section>

@endsection
