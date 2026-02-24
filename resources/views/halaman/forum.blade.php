@extends('tata-letak.utama')
@section('judul', 'Forum Diskusi - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%236366F1%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-kvt-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-comments text-indigo-400"></i>
            <span class="text-kvt-300 text-sm font-semibold">Komunitas Aktif</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Forum <span class="teks-gradien">Diskusi</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Tempat berbagi pengetahuan, bertanya, dan berdiskusi bersama komunitas pelajar, pengajar, dan profesional dari seluruh Indonesia.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#diskusi" class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-indigo-500/30 transition-all">
                <i class="fas fa-pen-fancy mr-2"></i>Mulai Diskusi
            </a>
            <a href="#panduan" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-book mr-2"></i>Panduan Forum
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['50K+','Thread'],['200K+','Balasan'],['30K+','Anggota'],['95%','Terjawab']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Forum --}}
<section class="py-20" id="diskusi">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kategori <span class="teks-gradien">Forum</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pilih topik diskusi yang sesuai dengan minat dan keahlian Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kategoris = [
                ['icon'=>'fa-graduation-cap','color'=>'indigo','judul'=>'Akademik','desc'=>'Diskusi seputar pelajaran, tugas, ujian, dan strategi belajar efektif','total'=>'15.200 thread'],
                ['icon'=>'fa-laptop-code','color'=>'blue','judul'=>'Teknologi','desc'=>'Programming, web dev, AI/ML, cybersecurity, dan tren teknologi terbaru','total'=>'12.800 thread'],
                ['icon'=>'fa-briefcase','color'=>'kvt','judul'=>'Karir','desc'=>'Tips karir, lowongan kerja, interview preparation, dan pengembangan diri','total'=>'8.500 thread'],
                ['icon'=>'fa-globe','color'=>'teal','judul'=>'Umum','desc'=>'Obrolan ringan, sharing pengalaman, hobi, dan topik menarik lainnya','total'=>'7.300 thread'],
                ['icon'=>'fa-bug','color'=>'red','judul'=>'Bug Report','desc'=>'Laporkan bug dan kendala teknis platform untuk perbaikan bersama','total'=>'3.200 thread'],
                ['icon'=>'fa-lightbulb','color'=>'amber','judul'=>'Saran','desc'=>'Berikan masukan dan ide untuk pengembangan layanan KVT Hub','total'=>'2.970 thread'],
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

{{-- Diskusi Populer --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Diskusi <span class="teks-gradien">Populer</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Topik yang paling aktif dan banyak diminati minggu ini.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $diskusi = [
                ['judul'=>'Bagaimana Cara Belajar Data Science dari Nol?','penulis'=>'Rizky Aditya','kategori'=>'Teknologi','balasan'=>'128','views'=>'3.2K','color'=>'indigo'],
                ['judul'=>'Tips Lolos Beasiswa LPDP 2026','penulis'=>'Nisa Fitriani','kategori'=>'Akademik','balasan'=>'95','views'=>'2.8K','color'=>'blue'],
                ['judul'=>'Review Magang di Perusahaan Startup Unicorn','penulis'=>'Fajar Pratama','kategori'=>'Karir','balasan'=>'87','views'=>'2.5K','color'=>'kvt'],
                ['judul'=>'Rekomendasi Framework JavaScript 2026','penulis'=>'Dimas Nugroho','kategori'=>'Teknologi','balasan'=>'76','views'=>'2.1K','color'=>'teal'],
                ['judul'=>'Strategi Menghadapi Ujian Akhir Semester','penulis'=>'Putri Handayani','kategori'=>'Akademik','balasan'=>'64','views'=>'1.9K','color'=>'purple'],
                ['judul'=>'Fitur Baru yang Diharapkan di KVT Hub','penulis'=>'Andi Saputra','kategori'=>'Saran','balasan'=>'52','views'=>'1.5K','color'=>'amber'],
            ];
            @endphp
            @foreach($diskusi as $d)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $d['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $d['color'] }}-400 bg-{{ $d['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $d['kategori'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-3">{{ $d['judul'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-user text-xs"></i> {{ $d['penulis'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-comment mr-1"></i>{{ $d['balasan'] }} balasan</span>
                        <span><i class="fas fa-eye mr-1"></i>{{ $d['views'] }} views</span>
                    </div>
                    <button class="w-full bg-{{ $d['color'] }}-500/10 text-{{ $d['color'] }}-400 border border-{{ $d['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $d['color'] }}-500/20 transition">
                        <i class="fas fa-comments mr-2"></i>Ikut Diskusi
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Top Kontributor --}}
<section class="py-20" id="panduan">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Top <span class="teks-gradien">Kontributor</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Anggota paling aktif dan membantu dalam komunitas forum.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $kontributor = [
                ['nama'=>'Budi Setiawan','jabatan'=>'Full-Stack Developer','jawaban'=>'1.250','badge'=>'Expert','color'=>'indigo'],
                ['nama'=>'Sari Wulandari','jabatan'=>'Data Scientist','jawaban'=>'980','badge'=>'Expert','color'=>'blue'],
                ['nama'=>'Eko Prasetyo','jabatan'=>'Dosen Informatika','jawaban'=>'875','badge'=>'Mentor','color'=>'kvt'],
                ['nama'=>'Maya Putri','jabatan'=>'UI/UX Designer','jawaban'=>'720','badge'=>'Pro','color'=>'teal'],
            ];
            @endphp
            @foreach($kontributor as $kon)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-16 h-16 bg-{{ $kon['color'] }}-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-{{ $kon['color'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold mb-1">{{ $kon['nama'] }}</h3>
                <p class="text-gray-500 text-xs mb-3">{{ $kon['jabatan'] }}</p>
                <span class="text-[10px] font-bold text-{{ $kon['color'] }}-400 bg-{{ $kon['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $kon['badge'] }}</span>
                <div class="mt-4 text-gray-400 text-sm">
                    <i class="fas fa-check-circle text-green-400 mr-1"></i>{{ $kon['jawaban'] }} jawaban
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
            <h2 class="text-3xl font-black mb-4">Punya Pertanyaan atau <span class="teks-gradien">Ide Menarik</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Bergabung dengan ribuan anggota komunitas dan mulai berbagi pengetahuan di Forum KVT Hub.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-blue-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-indigo-500/30 transition-all">
                    <i class="fas fa-pen"></i> Buat Thread Baru
                </a>
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Panduan Forum --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Panduan <span class="teks-gradien">Forum</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Ikuti etika dan panduan agar diskusi tetap produktif dan bermanfaat.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $rules = [
                ['icon'=>'fa-handshake','judul'=>'Sopan & Hormat','desc'=>'Gunakan bahasa yang sopan dan hormati pendapat orang lain.','color'=>'indigo'],
                ['icon'=>'fa-search','judul'=>'Cari Dulu','desc'=>'Gunakan fitur pencarian sebelum membuat thread baru yang mungkin sudah ada.','color'=>'blue'],
                ['icon'=>'fa-tag','judul'=>'Gunakan Tag','desc'=>'Beri tag kategori yang tepat agar thread mudah ditemukan orang lain.','color'=>'kvt'],
                ['icon'=>'fa-ban','judul'=>'Tanpa Spam','desc'=>'Jangan posting spam, promosi, atau konten tidak relevan di forum.','color'=>'red'],
            ];
            @endphp
            @foreach($rules as $r)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $r['color'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $r['icon'] }} text-{{ $r['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $r['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $r['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ Forum --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-4">FAQ <span class="teks-gradien">Forum</span></h2>
        </div>
        <div class="space-y-3" data-aos="fade-up">
            @php
            $faqs = [
                ['q'=>'Apakah harus login untuk membaca forum?','a'=>'Tidak, Anda bisa membaca semua thread tanpa login. Namun untuk membuat thread baru atau membalas, Anda perlu membuat akun terlebih dahulu.'],
                ['q'=>'Bagaimana cara mendapatkan badge Expert?','a'=>'Badge diberikan otomatis berdasarkan kontribusi Anda: jumlah jawaban yang ditandai sebagai solusi, reputasi, dan tingkat aktivitas di forum.'],
                ['q'=>'Apakah boleh mempromosikan produk di forum?','a'=>'Promosi produk komersial tidak diperbolehkan. Namun Anda boleh membagikan project open-source atau resource belajar yang bermanfaat.'],
                ['q'=>'Bagaimana cara melaporkan konten tidak pantas?','a'=>'Klik tombol Report pada post yang bersangkutan. Tim moderator kami akan meninjau laporan dalam 24 jam.'],
            ];
            @endphp
            @foreach($faqs as $faq)
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl overflow-hidden">
                <button onclick="this.parentElement.classList.toggle('faq-open')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/30 transition">
                    <span class="text-white font-semibold text-sm pr-4">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-indigo-400 text-xs transition-transform faq-chevron"></i>
                </button>
                <div class="faq-answer px-5 pb-0 max-h-0 overflow-hidden transition-all duration-300">
                    <p class="text-gray-400 text-sm leading-relaxed pb-5">{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>.faq-open .faq-chevron{transform:rotate(180deg)}.faq-open .faq-answer{max-height:200px;padding-bottom:1.25rem}</style>
@endpush
