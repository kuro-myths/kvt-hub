@extends('tata-letak.utama')
@section('judul', 'Program Magang - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23F97316%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-kvt-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-building text-orange-400"></i>
            <span class="text-kvt-300 text-sm font-semibold">Kemitraan Industri</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Program <span class="teks-gradien">Magang</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Raih pengalaman kerja nyata di perusahaan ternama. Program magang terstruktur dengan bimbingan profesional di berbagai industri.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#posisi" class="bg-gradient-to-r from-orange-500 to-amber-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-orange-500/30 transition-all">
                <i class="fas fa-search mr-2"></i>Cari Posisi Magang
            </a>
            <a href="#langkah" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-clipboard-list mr-2"></i>Cara Mendaftar
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['200+','Perusahaan'],['1K+','Posisi Tersedia'],['90%','Tingkat Penempatan'],['80+','Kota']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Magang --}}
<section class="py-20" id="posisi">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Bidang <span class="teks-gradien">Magang</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Temukan posisi magang yang sesuai dengan jurusan dan minat karir Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kategoris = [
                ['icon'=>'fa-laptop-code','color'=>'orange','judul'=>'IT / Software','desc'=>'Web development, mobile apps, backend, QA testing, dan DevOps','total'=>'320 posisi'],
                ['icon'=>'fa-database','color'=>'amber','judul'=>'Data Science','desc'=>'Data analyst, machine learning engineer, BI analyst, dan data engineer','total'=>'180 posisi'],
                ['icon'=>'fa-paint-brush','color'=>'pink','judul'=>'Design','desc'=>'UI/UX design, graphic design, product design, dan motion graphics','total'=>'150 posisi'],
                ['icon'=>'fa-bullhorn','color'=>'kvt','judul'=>'Marketing','desc'=>'Digital marketing, content creator, SEO specialist, dan social media','total'=>'135 posisi'],
                ['icon'=>'fa-chart-pie','color'=>'green','judul'=>'Finance','desc'=>'Financial analyst, accounting, auditing, dan fintech operations','total'=>'95 posisi'],
                ['icon'=>'fa-cogs','color'=>'teal','judul'=>'Engineering','desc'=>'Mechanical, electrical, civil, chemical, dan industrial engineering','total'=>'120 posisi'],
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

{{-- Lowongan Magang --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Lowongan <span class="teks-gradien">Terbaru</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Posisi magang yang sedang terbuka dari perusahaan mitra kami.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $lowongan = [
                ['posisi'=>'Frontend Developer Intern','perusahaan'=>'Tokopedia','lokasi'=>'Jakarta','durasi'=>'6 bulan','kategori'=>'IT / Software','color'=>'orange'],
                ['posisi'=>'Data Analyst Intern','perusahaan'=>'Gojek','lokasi'=>'Jakarta','durasi'=>'4 bulan','kategori'=>'Data Science','color'=>'amber'],
                ['posisi'=>'UI/UX Design Intern','perusahaan'=>'Shopee','lokasi'=>'Jakarta','durasi'=>'6 bulan','kategori'=>'Design','color'=>'pink'],
                ['posisi'=>'Digital Marketing Intern','perusahaan'=>'Bukalapak','lokasi'=>'Bandung','durasi'=>'3 bulan','kategori'=>'Marketing','color'=>'kvt'],
                ['posisi'=>'Financial Analyst Intern','perusahaan'=>'Bank Mandiri','lokasi'=>'Jakarta','durasi'=>'6 bulan','kategori'=>'Finance','color'=>'green'],
                ['posisi'=>'Mechanical Engineer Intern','perusahaan'=>'Astra International','lokasi'=>'Surabaya','durasi'=>'4 bulan','kategori'=>'Engineering','color'=>'teal'],
            ];
            @endphp
            @foreach($lowongan as $l)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $l['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $l['color'] }}-400 bg-{{ $l['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $l['kategori'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-2">{{ $l['posisi'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-building text-xs"></i> {{ $l['perusahaan'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-map-marker-alt mr-1"></i>{{ $l['lokasi'] }}</span>
                        <span><i class="fas fa-clock mr-1"></i>{{ $l['durasi'] }}</span>
                    </div>
                    <button class="w-full bg-{{ $l['color'] }}-500/10 text-{{ $l['color'] }}-400 border border-{{ $l['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $l['color'] }}-500/20 transition">
                        <i class="fas fa-paper-plane mr-2"></i>Lamar Sekarang
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Langkah Pendaftaran --}}
<section class="py-20" id="langkah">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Langkah <span class="teks-gradien">Pendaftaran</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Proses pendaftaran magang yang mudah dan transparan.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $langkah = [
                ['no'=>'01','icon'=>'fa-file-alt','judul'=>'Lengkapi Profil','desc'=>'Isi data diri, CV, portofolio, dan dokumen pendukung di profil Anda.'],
                ['no'=>'02','icon'=>'fa-search','judul'=>'Cari & Lamar','desc'=>'Temukan posisi magang yang sesuai dan kirimkan lamaran Anda.'],
                ['no'=>'03','icon'=>'fa-tasks','judul'=>'Seleksi','desc'=>'Ikuti proses seleksi dari perusahaan termasuk tes dan interview.'],
                ['no'=>'04','icon'=>'fa-handshake','judul'=>'Mulai Magang','desc'=>'Selamat! Mulai pengalaman magang Anda dengan bimbingan mentor.'],
            ];
            @endphp
            @foreach($langkah as $l)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-orange-500/20 text-5xl font-black mb-3">{{ $l['no'] }}</div>
                <div class="w-12 h-12 bg-orange-500/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $l['icon'] }} text-orange-400 text-lg"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $l['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Perusahaan Mitra --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Perusahaan <span class="teks-gradien">Mitra</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Lebih dari 200 perusahaan terkemuka yang bermitra dengan KVT Hub.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @php
            $mitra = ['Tokopedia','Gojek','Shopee','Bukalapak','Traveloka','Bank Mandiri','Telkom','Astra','XL Axiata','Pertamina','BCA','Unilever'];
            @endphp
            @foreach($mitra as $m)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4 text-center hover:border-orange-500/30 transition-all card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="w-10 h-10 bg-orange-500/10 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-building text-orange-400 text-sm"></i>
                </div>
                <span class="text-gray-400 text-xs font-semibold">{{ $m }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Siap Memulai <span class="teks-gradien">Karir Profesional</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Daftar sekarang dan temukan posisi magang yang tepat untuk membangun fondasi karir Anda.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-amber-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-orange-500/30 transition-all">
                    <i class="fas fa-rocket"></i> Daftar & Lamar
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-handshake"></i> Jadi Mitra
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
