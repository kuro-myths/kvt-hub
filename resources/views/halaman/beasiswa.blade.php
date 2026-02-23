@extends('tata-letak.utama')
@section('judul', 'Program Beasiswa - KVT Hub')
@section('konten')

<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-amber-900/20 via-kvt-950 to-kvt-950"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-500/20 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-award text-amber-400"></i>
            <span class="text-amber-300 text-sm font-semibold">Pendanaan Pendidikan</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6">Program <span class="teks-gradien-emas">Beasiswa</span></h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Raih kesempatan emas mendapatkan beasiswa penuh dan parsial dari KVT Hub. Tersedia untuk semua jenjang pendidikan.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#jenis" class="bg-gradient-to-r from-amber-500 to-orange-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-amber-500/30 transition-all">
                <i class="fas fa-graduation-cap mr-2"></i>Lihat Beasiswa
            </a>
            <a href="#syarat" class="border border-amber-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-amber-800/20 transition-all">
                <i class="fas fa-clipboard-list mr-2"></i>Persyaratan
            </a>
        </div>
    </div>
</section>

<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['500+','Penerima/Tahun'],['15B+','Dana Tersalurkan'],['50+','Mitra Sponsor'],['100%','Transparan']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien-emas">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20" id="jenis">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Jenis <span class="teks-gradien-emas">Beasiswa</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Berbagai program beasiswa untuk mendukung perjalanan pendidikan Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $beasiswas = [
                ['icon'=>'fa-trophy','color'=>'amber','judul'=>'Beasiswa Prestasi','desc'=>'Untuk pelajar dengan prestasi akademik & non-akademik luar biasa','benefit'=>'SPP 100% + Buku + Laptop'],
                ['icon'=>'fa-hand-holding-heart','color'=>'green','judul'=>'Beasiswa Ekonomi','desc'=>'Bantuan pendidikan bagi keluarga kurang mampu','benefit'=>'SPP 100% + Biaya Hidup'],
                ['icon'=>'fa-microscope','color'=>'purple','judul'=>'Beasiswa Riset','desc'=>'Pendanaan untuk mahasiswa yang aktif dalam penelitian','benefit'=>'Dana Riset + Publikasi'],
                ['icon'=>'fa-globe-americas','color'=>'kvt','judul'=>'Beasiswa Internasional','desc'=>'Kesempatan belajar di universitas mitra luar negeri','benefit'=>'Full Ride + Visa + Akomodasi'],
                ['icon'=>'fa-laptop-code','color'=>'cyan','judul'=>'Beasiswa Tech Talent','desc'=>'Khusus bidang teknologi, AI, dan digital','benefit'=>'Bootcamp + Sertifikasi + Karir'],
                ['icon'=>'fa-paint-brush','color'=>'pink','judul'=>'Beasiswa Seni & Budaya','desc'=>'Untuk talenta di bidang seni dan kebudayaan','benefit'=>'Studio + Pameran + Mentoring'],
            ];
            @endphp
            @foreach($beasiswas as $b)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $b['color'] }}-500/30 transition-all card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $b['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas {{ $b['icon'] }} text-{{ $b['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $b['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $b['desc'] }}</p>
                <div class="bg-{{ $b['color'] }}-500/5 border border-{{ $b['color'] }}-500/10 rounded-xl px-4 py-2 text-{{ $b['color'] }}-400 text-xs font-semibold">
                    <i class="fas fa-gift mr-1"></i> {{ $b['benefit'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-kvt-900/30" id="syarat">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-black mb-12">Persyaratan <span class="teks-gradien-emas">Umum</span></h2>
        <div class="grid md:grid-cols-2 gap-4 text-left">
            @php $syarats = ['WNI atau WNA yang terdaftar di KVT Hub','IPK minimal 3.0 (atau setara)','Aktif dalam kegiatan akademik / non-akademik','Surat rekomendasi dari dosen/guru','Essay motivasi (500-1000 kata)','Tidak sedang menerima beasiswa lain','Bersedia mengikuti program mentoring','Lolos seleksi administrasi & wawancara']; @endphp
            @foreach($syarats as $s)
            <div class="flex items-start gap-3 bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="w-6 h-6 bg-amber-500/10 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                    <i class="fas fa-check text-amber-400 text-[10px]"></i>
                </div>
                <span class="text-gray-300 text-sm">{{ $s }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-amber-900/20 to-kvt-900/50 border border-amber-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Mulai Perjalanan <span class="teks-gradien-emas">Beasiswa</span> Anda</h2>
            <p class="text-gray-400 mb-8">Pendaftaran beasiswa periode 2026 dibuka sekarang. Jangan lewatkan kesempatan ini!</p>
            <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg transition-all">
                <i class="fas fa-paper-plane"></i> Daftar Sekarang
            </a>
        </div>
    </div>
</section>

@endsection
