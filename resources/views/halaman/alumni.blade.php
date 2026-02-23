@extends('tata-letak.utama')
@section('judul', 'Jaringan Alumni - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23F43F5E%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-kvt-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-network-wired text-rose-400"></i>
            <span class="text-kvt-300 text-sm font-semibold">Jaringan Global</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Jaringan <span class="teks-gradien">Alumni</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Terhubung dengan ribuan alumni KVT Hub di seluruh dunia. Bangun relasi, temukan peluang, dan berkontribusi bersama komunitas alumni.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#direktori" class="bg-gradient-to-r from-rose-500 to-red-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-rose-500/30 transition-all">
                <i class="fas fa-users mr-2"></i>Jelajahi Direktori
            </a>
            <a href="#acara" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-calendar-alt mr-2"></i>Acara Mendatang
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['25K+','Alumni'],['150+','Acara/Tahun'],['500+','Perusahaan'],['Global','Jaringan']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Jaringan --}}
<section class="py-20" id="direktori">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Layanan <span class="teks-gradien">Alumni</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Berbagai layanan eksklusif untuk para alumni KVT Hub.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kategoris = [
                ['icon'=>'fa-address-book','color'=>'rose','judul'=>'Direktori','desc'=>'Cari dan terhubung dengan alumni berdasarkan angkatan, bidang, atau lokasi','total'=>'25.000 profil'],
                ['icon'=>'fa-calendar-check','color'=>'red','judul'=>'Acara','desc'=>'Reuni, gathering, workshop, dan acara networking eksklusif alumni','total'=>'150+ acara/tahun'],
                ['icon'=>'fa-briefcase','color'=>'pink','judul'=>'Lowongan Alumni','desc'=>'Akses lowongan kerja eksklusif dari perusahaan yang dikelola alumni','total'=>'800 lowongan'],
                ['icon'=>'fa-hand-holding-heart','color'=>'kvt','judul'=>'Mentoring','desc'=>'Program mentoring alumni-mahasiswa untuk transfer pengalaman','total'=>'120 mentor'],
                ['icon'=>'fa-donate','color'=>'amber','judul'=>'Donasi','desc'=>'Berkontribusi untuk pengembangan institusi dan beasiswa adik-adik angkatan','total'=>'Rp 2.5M+ terkumpul'],
                ['icon'=>'fa-trophy','color'=>'green','judul'=>'Cerita Sukses','desc'=>'Kisah inspiratif alumni yang berhasil di berbagai bidang dan industri','total'=>'350 cerita'],
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

{{-- Alumni Unggulan --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Alumni <span class="teks-gradien">Unggulan</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Alumni berprestasi yang telah memberikan dampak di berbagai industri.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $alumni = [
                ['nama'=>'Reza Firmansyah','jabatan'=>'CTO, TechCorp Indonesia','angkatan'=>'2018','bidang'=>'Teknologi','prestasi'=>'Forbes 30 Under 30 Asia','color'=>'rose'],
                ['nama'=>'Dr. Linda Sari','jabatan'=>'Peneliti Senior, MIT','angkatan'=>'2015','bidang'=>'Riset','prestasi'=>'Penerima Grant NSF 2025','color'=>'red'],
                ['nama'=>'Arief Budiman','jabatan'=>'Founder, GreenTech ID','angkatan'=>'2017','bidang'=>'Startup','prestasi'=>'Startup of the Year 2025','color'=>'pink'],
                ['nama'=>'Putri Rahayu','jabatan'=>'VP Product, Grab','angkatan'=>'2016','bidang'=>'Produk','prestasi'=>'Women in Tech Leader','color'=>'kvt'],
                ['nama'=>'Dr. Hadi Pranoto','jabatan'=>'Guru Besar, ITB','angkatan'=>'2010','bidang'=>'Akademik','prestasi'=>'100+ Publikasi Internasional','color'=>'amber'],
                ['nama'=>'Sinta Dewi','jabatan'=>'Country Director, Google ID','angkatan'=>'2014','bidang'=>'Bisnis','prestasi'=>'Top 50 Business Leaders','color'=>'green'],
            ];
            @endphp
            @foreach($alumni as $a)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $a['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $a['color'] }}-400 bg-{{ $a['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $a['bidang'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-12 h-12 bg-{{ $a['color'] }}-500/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-graduate text-{{ $a['color'] }}-400"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-bold">{{ $a['nama'] }}</h3>
                            <p class="text-gray-500 text-xs">{{ $a['jabatan'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-3">
                        <span><i class="fas fa-graduation-cap mr-1"></i>Angkatan {{ $a['angkatan'] }}</span>
                    </div>
                    <div class="bg-{{ $a['color'] }}-500/5 border border-{{ $a['color'] }}-500/10 rounded-lg px-3 py-2 mb-4">
                        <span class="text-{{ $a['color'] }}-400 text-xs font-semibold"><i class="fas fa-award mr-1"></i>{{ $a['prestasi'] }}</span>
                    </div>
                    <button class="w-full bg-{{ $a['color'] }}-500/10 text-{{ $a['color'] }}-400 border border-{{ $a['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $a['color'] }}-500/20 transition">
                        <i class="fas fa-user-plus mr-2"></i>Lihat Profil
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Acara Mendatang --}}
<section class="py-20" id="acara">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Acara <span class="teks-gradien">Mendatang</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Jadwal acara dan kegiatan untuk komunitas alumni KVT Hub.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $acara = [
                ['judul'=>'Grand Reunion Alumni 2026','tgl'=>'15 Mar 2026','lokasi'=>'Jakarta Convention Center','tipe'=>'Reunion','peserta'=>'2.000+','color'=>'rose'],
                ['judul'=>'Alumni Career Fair','tgl'=>'22 Apr 2026','lokasi'=>'Online & Offline','tipe'=>'Karir','peserta'=>'500+','color'=>'red'],
                ['judul'=>'Workshop: AI in Business','tgl'=>'10 Mei 2026','lokasi'=>'Bandung Creative Hub','tipe'=>'Workshop','peserta'=>'150','color'=>'pink'],
                ['judul'=>'Alumni Golf Tournament','tgl'=>'28 Mei 2026','lokasi'=>'Sentul Golf Club','tipe'=>'Olahraga','peserta'=>'120','color'=>'kvt'],
                ['judul'=>'Fundraising Gala Dinner','tgl'=>'15 Jun 2026','lokasi'=>'Hotel Indonesia','tipe'=>'Donasi','peserta'=>'300','color'=>'amber'],
                ['judul'=>'Startup Meetup & Pitch Night','tgl'=>'5 Jul 2026','lokasi'=>'Surabaya Co-working','tipe'=>'Networking','peserta'=>'200','color'=>'green'],
            ];
            @endphp
            @foreach($acara as $ac)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $ac['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $ac['color'] }}-400 bg-{{ $ac['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $ac['tipe'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-3">{{ $ac['judul'] }}</h3>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-2">
                        <span><i class="fas fa-calendar mr-1"></i>{{ $ac['tgl'] }}</span>
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-map-marker-alt mr-1"></i>{{ $ac['lokasi'] }}</span>
                        <span><i class="fas fa-users mr-1"></i>{{ $ac['peserta'] }}</span>
                    </div>
                    <button class="w-full bg-{{ $ac['color'] }}-500/10 text-{{ $ac['color'] }}-400 border border-{{ $ac['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $ac['color'] }}-500/20 transition">
                        <i class="fas fa-ticket-alt mr-2"></i>Daftar Acara
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Statistik Alumni --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Statistik <span class="teks-gradien">Alumni</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Sebaran alumni KVT Hub di berbagai sektor dan wilayah.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $statAlumni = [
                ['icon'=>'fa-laptop-code','judul'=>'Teknologi','persen'=>'35%','jumlah'=>'8.750 alumni','color'=>'rose'],
                ['icon'=>'fa-chart-line','judul'=>'Bisnis & Finance','persen'=>'25%','jumlah'=>'6.250 alumni','color'=>'red'],
                ['icon'=>'fa-flask','judul'=>'Riset & Akademik','persen'=>'20%','jumlah'=>'5.000 alumni','color'=>'pink'],
                ['icon'=>'fa-rocket','judul'=>'Startup & Wirausaha','persen'=>'20%','jumlah'=>'5.000 alumni','color'=>'amber'],
            ];
            @endphp
            @foreach($statAlumni as $sa)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-14 h-14 bg-{{ $sa['color'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $sa['icon'] }} text-{{ $sa['color'] }}-400 text-xl"></i>
                </div>
                <div class="text-3xl font-black teks-gradien mb-1">{{ $sa['persen'] }}</div>
                <h3 class="text-white font-bold mb-1">{{ $sa['judul'] }}</h3>
                <p class="text-gray-500 text-xs">{{ $sa['jumlah'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Bergabung dengan <span class="teks-gradien">Jaringan Alumni</span></h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Tetap terhubung, saling mendukung, dan tumbuh bersama komunitas alumni KVT Hub di seluruh dunia.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-red-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-rose-500/30 transition-all">
                    <i class="fas fa-user-plus"></i> Daftar Alumni
                </a>
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
