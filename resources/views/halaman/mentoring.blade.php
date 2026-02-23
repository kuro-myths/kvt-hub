@extends('tata-letak.utama')
@section('judul', 'Program Mentoring - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%238B5CF6%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-kvt-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-hand-holding-heart text-violet-400"></i>
            <span class="text-kvt-300 text-sm font-semibold">Bimbingan Personal</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Program <span class="teks-gradien">Mentoring</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Dapatkan bimbingan 1-on-1 dari mentor berpengalaman di berbagai industri. Percepat pertumbuhan karir dan kemampuan Anda.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#mentor" class="bg-gradient-to-r from-violet-500 to-purple-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-violet-500/30 transition-all">
                <i class="fas fa-user-friends mr-2"></i>Cari Mentor
            </a>
            <a href="#cara-kerja" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-route mr-2"></i>Cara Kerja
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['300+','Mentor'],['5K+','Sesi Selesai'],['4.9/5','Rating'],['50+','Industri']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Mentoring --}}
<section class="py-20" id="mentor">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Bidang <span class="teks-gradien">Mentoring</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pilih bidang mentoring yang sesuai dengan tujuan dan kebutuhan Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kategoris = [
                ['icon'=>'fa-graduation-cap','color'=>'violet','judul'=>'Akademik','desc'=>'Bimbingan skripsi, tesis, penelitian, dan persiapan beasiswa luar negeri','total'=>'85 mentor'],
                ['icon'=>'fa-briefcase','color'=>'purple','judul'=>'Karir','desc'=>'Career planning, interview prep, resume review, dan transisi karir','total'=>'72 mentor'],
                ['icon'=>'fa-rocket','color'=>'indigo','judul'=>'Startup','desc'=>'Validasi ide, business model, fundraising, dan scaling startup Anda','total'=>'48 mentor'],
                ['icon'=>'fa-flask','color'=>'kvt','judul'=>'Riset','desc'=>'Metodologi penelitian, publikasi jurnal, dan kolaborasi riset internasional','total'=>'35 mentor'],
                ['icon'=>'fa-laptop-code','color'=>'teal','judul'=>'Tech','desc'=>'Software engineering, data science, cloud, DevOps, dan teknologi terkini','total'=>'42 mentor'],
                ['icon'=>'fa-users-cog','color'=>'amber','judul'=>'Leadership','desc'=>'Soft skills, manajemen tim, public speaking, dan kepemimpinan organisasi','total'=>'28 mentor'],
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

{{-- Mentor Pilihan --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Mentor <span class="teks-gradien">Pilihan</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Mentor terbaik dengan rating tertinggi dan pengalaman mendalam.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $mentors = [
                ['nama'=>'Dr. Hendra Kusuma','jabatan'=>'VP of Engineering, Tokopedia','bidang'=>'Tech','sesi'=>'230','rating'=>'4.9','color'=>'violet'],
                ['nama'=>'Prof. Rina Marlina','jabatan'=>'Guru Besar FMIPA UI','bidang'=>'Akademik','sesi'=>'185','rating'=>'5.0','color'=>'purple'],
                ['nama'=>'Andi Wijaya, MBA','jabatan'=>'Founder & CEO, EduTech ID','bidang'=>'Startup','sesi'=>'160','rating'=>'4.9','color'=>'indigo'],
                ['nama'=>'Dian Purnama, PMP','jabatan'=>'Senior PM, Google','bidang'=>'Karir','sesi'=>'145','rating'=>'4.8','color'=>'kvt'],
                ['nama'=>'Dr. Budi Santoro','jabatan'=>'Peneliti Senior, BRIN','bidang'=>'Riset','sesi'=>'120','rating'=>'4.9','color'=>'teal'],
                ['nama'=>'Sarah Kartika','jabatan'=>'Head of People, Grab','bidang'=>'Leadership','sesi'=>'110','rating'=>'4.8','color'=>'amber'],
            ];
            @endphp
            @foreach($mentors as $m)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $m['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $m['color'] }}-400 bg-{{ $m['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $m['bidang'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-12 h-12 bg-{{ $m['color'] }}-500/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-{{ $m['color'] }}-400"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-bold">{{ $m['nama'] }}</h3>
                            <p class="text-gray-500 text-xs">{{ $m['jabatan'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-video mr-1"></i>{{ $m['sesi'] }} sesi</span>
                        <span><i class="fas fa-star text-yellow-400 mr-1"></i>{{ $m['rating'] }}/5</span>
                    </div>
                    <button class="w-full bg-{{ $m['color'] }}-500/10 text-{{ $m['color'] }}-400 border border-{{ $m['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $m['color'] }}-500/20 transition">
                        <i class="fas fa-calendar-check mr-2"></i>Jadwalkan Sesi
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Cara Kerja --}}
<section class="py-20" id="cara-kerja">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Cara <span class="teks-gradien">Kerja</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Mulai perjalanan mentoring Anda dalam 4 langkah sederhana.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $langkah = [
                ['no'=>'01','icon'=>'fa-search','judul'=>'Pilih Mentor','desc'=>'Jelajahi profil mentor dan pilih yang paling sesuai dengan tujuan Anda.'],
                ['no'=>'02','icon'=>'fa-calendar-alt','judul'=>'Jadwalkan Sesi','desc'=>'Pilih waktu yang tersedia dan booking sesi mentoring sesuai jadwal Anda.'],
                ['no'=>'03','icon'=>'fa-video','judul'=>'Mulai Mentoring','desc'=>'Bergabung dalam sesi video call 1-on-1 dengan mentor pilihan Anda.'],
                ['no'=>'04','icon'=>'fa-trophy','judul'=>'Capai Tujuan','desc'=>'Terapkan insight dari mentor dan raih pencapaian yang Anda targetkan.'],
            ];
            @endphp
            @foreach($langkah as $l)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-violet-500/20 text-5xl font-black mb-3">{{ $l['no'] }}</div>
                <div class="w-12 h-12 bg-violet-500/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $l['icon'] }} text-violet-400 text-lg"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $l['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimoni --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Apa Kata <span class="teks-gradien">Mentee</span>?</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pengalaman nyata dari para mentee yang telah merasakan dampak mentoring.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
            $testimoni = [
                ['nama'=>'Rizka Amelia','jabatan'=>'Software Engineer, Shopee','isi'=>'Mentor saya membantu saya mempersiapkan technical interview dan akhirnya saya diterima di perusahaan impian!','color'=>'violet'],
                ['nama'=>'Farhan Ramadhan','jabatan'=>'PhD Student, NUS','isi'=>'Bimbingan riset dari mentor KVT Hub sangat membantu saya mendapatkan beasiswa S3 di Singapura.','color'=>'purple'],
                ['nama'=>'Dewi Kartini','jabatan'=>'Co-Founder, StartupXYZ','isi'=>'Dari validasi ide hingga fundraising, mentor startup di KVT Hub memberikan arahan yang sangat berharga.','color'=>'indigo'],
            ];
            @endphp
            @foreach($testimoni as $t)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex items-center gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    @endfor
                </div>
                <p class="text-gray-400 text-sm mb-6 italic">"{{ $t['isi'] }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-{{ $t['color'] }}-500/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-{{ $t['color'] }}-400 text-sm"></i>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-sm">{{ $t['nama'] }}</h4>
                        <p class="text-gray-500 text-xs">{{ $t['jabatan'] }}</p>
                    </div>
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
            <h2 class="text-3xl font-black mb-4">Siap Berkembang dengan <span class="teks-gradien">Mentor Terbaik</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Daftar sekarang dan temukan mentor yang tepat untuk membantu Anda mencapai tujuan.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-violet-500 to-purple-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-violet-500/30 transition-all">
                    <i class="fas fa-rocket"></i> Daftar Sebagai Mentee
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-chalkboard-teacher"></i> Jadi Mentor
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
