@extends('tata-letak.utama')
@section('judul', 'Kompetisi & Olimpiade - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%233399FF%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-yellow-800/40 border border-yellow-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-trophy text-yellow-400"></i>
            <span class="text-yellow-300 text-sm font-semibold">Compete & Win</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Kompetisi & <span class="teks-gradien">Olimpiade</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Uji kemampuan Anda di kompetisi akademik, olimpiade sains, hackathon teknologi, dan berbagai tantangan bergengsi tingkat nasional & internasional.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#kompetisi" class="bg-gradient-to-r from-yellow-500 to-amber-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-yellow-500/30 transition-all">
                <i class="fas fa-flag-checkered mr-2"></i>Ikut Kompetisi
            </a>
            <a href="#kalender" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-calendar mr-2"></i>Kalender Event
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['100+','Events'],['30K+','Peserta'],['500M+','Hadiah'],['25','Bidang']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Kompetisi --}}
<section class="py-20" id="kompetisi">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kategori <span class="teks-gradien">Kompetisi</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Temukan kompetisi yang sesuai dengan bidang keahlian dan passionmu.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kategoris = [
                ['icon'=>'fa-laptop-code','color'=>'yellow','judul'=>'Hackathon','desc'=>'Bangun solusi inovatif dalam 24-48 jam bersama tim terbaik','total'=>'20 event/tahun'],
                ['icon'=>'fa-atom','color'=>'amber','judul'=>'Olimpiade Sains','desc'=>'Matematika, fisika, kimia, biologi tingkat nasional & internasional','total'=>'15 olimpiade'],
                ['icon'=>'fa-robot','color'=>'kvt','judul'=>'AI & Data Challenge','desc'=>'Kompetisi machine learning, data science, dan artificial intelligence','total'=>'12 challenge'],
                ['icon'=>'fa-lightbulb','color'=>'green','judul'=>'Business Case','desc'=>'Pecahkan studi kasus bisnis dari perusahaan-perusahaan ternama','total'=>'18 kompetisi'],
                ['icon'=>'fa-pen-fancy','color'=>'purple','judul'=>'Karya Tulis Ilmiah','desc'=>'Lomba paper, esai ilmiah, dan penelitian mahasiswa berprestasi','total'=>'25 lomba'],
                ['icon'=>'fa-gamepad','color'=>'pink','judul'=>'Game Development','desc'=>'Ciptakan game inovatif dan bersaing di ajang game dev internasional','total'=>'8 event'],
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

{{-- Kompetisi Mendatang --}}
<section class="py-20 bg-kvt-900/30" id="kalender">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kompetisi <span class="teks-gradien">Mendatang</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Jangan lewatkan kesempatan berkompetisi. Daftar sebelum kuota habis!</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kompetisis = [
                ['judul'=>'National Hackathon 2026','penyelenggara'=>'Kemenkominfo RI','deadline'=>'15 Mar 2026','hadiah'=>'Rp 150 Juta','kategori'=>'Hackathon','color'=>'yellow'],
                ['judul'=>'Olimpiade Matematika Nasional','penyelenggara'=>'BRIN Indonesia','deadline'=>'1 Apr 2026','hadiah'=>'Rp 50 Juta','kategori'=>'Olimpiade','color'=>'amber'],
                ['judul'=>'AI Innovation Challenge','penyelenggara'=>'Google Indonesia','deadline'=>'20 Mar 2026','hadiah'=>'Rp 200 Juta','kategori'=>'AI Challenge','color'=>'kvt'],
                ['judul'=>'Startup Pitch Competition','penyelenggara'=>'Bekraf & IDX','deadline'=>'30 Mar 2026','hadiah'=>'Rp 500 Juta','kategori'=>'Business','color'=>'green'],
                ['judul'=>'Scientific Paper Award','penyelenggara'=>'LIPI','deadline'=>'10 Apr 2026','hadiah'=>'Rp 30 Juta','kategori'=>'KTI','color'=>'purple'],
                ['judul'=>'Indie Game Jam Indonesia','penyelenggara'=>'AGI & Unity ID','deadline'=>'25 Mar 2026','hadiah'=>'Rp 75 Juta','kategori'=>'Game Dev','color'=>'pink'],
            ];
            @endphp
            @foreach($kompetisis as $k)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $k['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $k['color'] }}-400 bg-{{ $k['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $k['kategori'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-3">{{ $k['judul'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-building text-xs"></i> {{ $k['penyelenggara'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-2">
                        <span><i class="fas fa-clock mr-1"></i>Deadline: {{ $k['deadline'] }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-yellow-400 text-xs font-semibold mb-4">
                        <i class="fas fa-gift"></i> {{ $k['hadiah'] }}
                    </div>
                    <button class="w-full bg-{{ $k['color'] }}-500/10 text-{{ $k['color'] }}-400 border border-{{ $k['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $k['color'] }}-500/20 transition">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Hall of Fame --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Hall of <span class="teks-gradien">Fame</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pemenang kompetisi yang telah mengharumkan nama almamater dan bangsa.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $juara = [
                ['nama'=>'Tim AlphaCode','prestasi'=>'Juara 1 National Hackathon 2025','color'=>'yellow'],
                ['nama'=>'Fikri Ramadhani','prestasi'=>'Gold Medal IOI 2025','color'=>'amber'],
                ['nama'=>'Tim DataMinds','prestasi'=>'Winner Kaggle Competition','color'=>'kvt'],
                ['nama'=>'Aulia Zahra','prestasi'=>'Best Paper ICSE 2025','color'=>'purple'],
            ];
            @endphp
            @foreach($juara as $j)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $j['color'] }}-500/30 transition-all card-hover text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-16 h-16 bg-{{ $j['color'] }}-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-medal text-{{ $j['color'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $j['nama'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $j['prestasi'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Siap Menjadi <span class="teks-gradien">Juara</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Daftarkan diri atau timmu sekarang dan raih prestasi di kompetisi tingkat nasional & internasional.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-amber-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-yellow-500/30 transition-all">
                    <i class="fas fa-trophy"></i> Daftar Kompetisi
                </a>
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Testimoni Peserta --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kata <span class="teks-gradien">Juara</span></h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
            $testimoni = [
                ['nama'=>'Fikri R.','peran'=>'Gold Medal IOI 2025','teks'=>'Persiapan di KVT Hub sangat membantu. Soal-soal latihan dan mentoring dari senior mempersiapkan saya meraih medali emas.','warna'=>'from-yellow-500 to-amber-500'],
                ['nama'=>'Nadia K.','peran'=>'Winner Hackathon 2025','teks'=>'Tim kami terbentuk di KVT Hub! Platform ini menghubungkan kami dengan sesama developer berbakat dari seluruh Indonesia.','warna'=>'from-kvt-500 to-blue-500'],
                ['nama'=>'Ahmad S.','peran'=>'Best Paper ICSE','teks'=>'Bimbingan riset di KVT Hub membawa paper saya hingga diterima di konferensi internasional. Luar biasa!','warna'=>'from-purple-500 to-violet-500'],
            ];
            @endphp
            @foreach($testimoni as $t)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $t['warna'] }} rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg">{{ strtoupper(substr($t['nama'],0,1)) }}</div>
                    <div>
                        <h4 class="text-white font-bold text-sm">{{ $t['nama'] }}</h4>
                        <p class="text-gray-500 text-xs">{{ $t['peran'] }}</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm italic leading-relaxed">"{{ $t['teks'] }}"</p>
                <div class="flex gap-0.5 mt-4">@for($s=0;$s<5;$s++)<i class="fas fa-star text-amber-400 text-xs"></i>@endfor</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ Kompetisi --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-4">FAQ <span class="teks-gradien">Kompetisi</span></h2>
        </div>
        <div class="space-y-3" data-aos="fade-up">
            @php
            $faqs = [
                ['q'=>'Apakah kompetisi terbuka untuk semua jenjang?','a'=>'Ya! Tersedia kompetisi untuk tingkat SMA, mahasiswa, dan profesional. Setiap kompetisi mencantumkan syarat peserta.'],
                ['q'=>'Bagaimana cara mendaftar kompetisi?','a'=>'Pilih kompetisi yang diminati, klik Daftar Sekarang, dan lengkapi formulir pendaftaran. Tim juga bisa mendaftar secara berkelompok.'],
                ['q'=>'Apakah ada biaya pendaftaran?','a'=>'Sebagian besar kompetisi di KVT Hub gratis. Beberapa kompetisi dengan hadiah besar mungkin memerlukan biaya pendaftaran minimal.'],
                ['q'=>'Apakah ada bimbingan persiapan kompetisi?','a'=>'Tentu! KVT Hub menyediakan modul latihan, soal-soal past paper, dan mentoring khusus untuk persiapan kompetisi.'],
            ];
            @endphp
            @foreach($faqs as $faq)
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl overflow-hidden">
                <button onclick="this.parentElement.classList.toggle('faq-open')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/30 transition">
                    <span class="text-white font-semibold text-sm pr-4">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-yellow-400 text-xs transition-transform faq-chevron"></i>
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
