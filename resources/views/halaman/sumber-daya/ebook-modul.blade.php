@extends('tata-letak.utama')
@section('judul', 'E-Book & Modul - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-emerald-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #10B981 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-emerald-800/30 border border-emerald-600/30 rounded-full px-4 py-1.5 text-xs text-emerald-300 mb-6" data-aos="fade-down">
            <i class="fas fa-book"></i> Perpustakaan Digital
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">E-Book & </span><span class="teks-gradien">Modul</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Akses ribuan e-book, modul pembelajaran, dan referensi akademik. Gratis untuk anggota KVT Hub —
            unduh kapan saja, baca di mana saja dalam format PDF dan EPUB.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-emerald-500 to-green-500 hover:from-emerald-400 hover:to-green-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5">
                <i class="fas fa-book-reader mr-2"></i>Jelajahi Perpustakaan
            </a>
            <a href="#kategori" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-th-large mr-2"></i>Lihat Kategori
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">1.6K+</div><div class="text-xs text-gray-500">E-Book</div></div>
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Modul</div></div>
            <div><div class="text-2xl font-black text-white">PDF</div><div class="text-xs text-gray-500">& EPUB</div></div>
            <div><div class="text-2xl font-black text-white">Gratis</div><div class="text-xs text-gray-500">Akses</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI BUKU --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori E-Book & Modul</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Koleksi lengkap dari berbagai bidang ilmu dan keahlian</p>
    </div>
    @php
    $kategori = [
        ['ikon' => 'fas fa-laptop-code', 'warna' => 'blue', 'judul' => 'Pemrograman', 'jumlah' => '450+', 'desc' => 'Buku dan modul programming: Python, JavaScript, PHP, Java, Go, Rust, dan lebih banyak lagi.'],
        ['ikon' => 'fas fa-brain', 'warna' => 'purple', 'judul' => 'AI & Data Science', 'jumlah' => '280+', 'desc' => 'Machine learning, deep learning, NLP, computer vision, dan data engineering.'],
        ['ikon' => 'fas fa-calculator', 'warna' => 'green', 'judul' => 'Matematika & Sains', 'jumlah' => '350+', 'desc' => 'Kalkulus, statistik, fisika, kimia, biologi — dari dasar hingga riset lanjut.'],
        ['ikon' => 'fas fa-chart-pie', 'warna' => 'amber', 'judul' => 'Bisnis & Manajemen', 'jumlah' => '200+', 'desc' => 'Manajemen, entrepreneurship, marketing digital, dan financial literacy.'],
        ['ikon' => 'fas fa-palette', 'warna' => 'pink', 'judul' => 'Desain & Kreativitas', 'jumlah' => '180+', 'desc' => 'UI/UX design, graphic design, motion graphics, dan creative thinking.'],
        ['ikon' => 'fas fa-globe', 'warna' => 'cyan', 'judul' => 'Bahasa & Komunikasi', 'jumlah' => '150+', 'desc' => 'TOEFL/IELTS prep, business English, public speaking, dan academic writing.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($kategori as $k)
        <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group hover:-translate-y-1" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-{{ $k['warna'] }}-500/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition"><i class="{{ $k['ikon'] }} text-{{ $k['warna'] }}-400 text-xl"></i></div>
                <span class="text-lg font-bold text-{{ $k['warna'] }}-400">{{ $k['jumlah'] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $k['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- BESTSELLERS --}}
<section class="bg-gradient-to-br from-emerald-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">TERPOPULER</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">E-Book Paling Banyak Diunduh</h2>
        </div>
        @php
        $bestsellers = [
            ['judul' => 'Python for Data Science Handbook', 'penulis' => 'Dr. Ahmad Fauzi', 'warna' => 'blue', 'ikon' => 'fas fa-python', 'download' => '18.5K', 'rating' => '4.9', 'halaman' => '420'],
            ['judul' => 'Panduan Lengkap Laravel 12', 'penulis' => 'Budi Santoso', 'warna' => 'red', 'ikon' => 'fas fa-code', 'download' => '15.2K', 'rating' => '4.8', 'halaman' => '380'],
            ['judul' => 'Machine Learning A-Z', 'penulis' => 'Siti Nurhaliza', 'warna' => 'purple', 'ikon' => 'fas fa-brain', 'download' => '12.8K', 'rating' => '4.9', 'halaman' => '510'],
            ['judul' => 'JavaScript Modern ES2025+', 'penulis' => 'Rizky Pratama', 'warna' => 'amber', 'ikon' => 'fab fa-js-square', 'download' => '11.3K', 'rating' => '4.7', 'halaman' => '290'],
            ['judul' => 'Statistika untuk Penelitian', 'penulis' => 'Prof. Hendra', 'warna' => 'green', 'ikon' => 'fas fa-chart-bar', 'download' => '9.6K', 'rating' => '4.8', 'halaman' => '350'],
            ['judul' => 'UI/UX Design Principles', 'penulis' => 'Maya Dewi', 'warna' => 'pink', 'ikon' => 'fas fa-palette', 'download' => '8.9K', 'rating' => '4.7', 'halaman' => '240'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($bestsellers as $b)
            <div class="kaca rounded-xl p-5 border-{{ $b['warna'] }}-500/20 hover:border-{{ $b['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 bg-{{ $b['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                        <i class="{{ $b['ikon'] }} text-{{ $b['warna'] }}-400 text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-bold text-sm mb-1 group-hover:text-emerald-400 transition">{{ $b['judul'] }}</h4>
                        <p class="text-gray-500 text-xs mb-2">{{ $b['penulis'] }} · {{ $b['halaman'] }} halaman</p>
                        <div class="flex items-center gap-3 text-xs text-gray-500">
                            <span><i class="fas fa-download mr-1 text-{{ $b['warna'] }}-400"></i>{{ $b['download'] }}</span>
                            <span><i class="fas fa-star mr-1 text-yellow-400"></i>{{ $b['rating'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FORMAT & FITUR BACA --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">FORMAT</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Format & Fitur Pembaca</h2>
    </div>
    @php
    $format = [
        ['ikon' => 'fas fa-file-pdf', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'judul' => 'PDF Download', 'desc' => 'Unduh e-book dalam format PDF berkualitas tinggi. Baca offline di semua perangkat.'],
        ['ikon' => 'fas fa-book-open', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'EPUB Reader', 'desc' => 'Format EPUB responsif yang menyesuaikan layar. Ideal untuk membaca di smartphone dan tablet.'],
        ['ikon' => 'fas fa-laptop', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-indigo-500', 'judul' => 'Online Reader', 'desc' => 'Baca langsung di browser tanpa perlu download. Highlight, bookmark, dan catatan tersimpan otomatis.'],
        ['ikon' => 'fas fa-headphones', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Audio Summary', 'desc' => 'Ringkasan audio 10-15 menit untuk setiap e-book. Dengarkan saat commuting atau olahraga.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($format as $f)
        <div class="kaca rounded-2xl p-6 border-{{ $f['warna'] }}-500/20 hover:border-{{ $f['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="w-14 h-14 bg-gradient-to-br {{ $f['gradien'] }} rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="{{ $f['ikon'] }} text-white text-xl"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $f['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $f['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- AUTHOR SUBMISSIONS --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">AUTHOR PROGRAM</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Program Penulis</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Kontribusikan karya tulis Anda dan jangkau ribuan pembaca</p>
        </div>
        @php
        $author = [
            ['ikon' => 'fas fa-pen-fancy', 'warna' => 'blue', 'judul' => 'Submit Naskah', 'desc' => 'Upload draft e-book atau modul. Tim editor akan me-review dan memberikan feedback dalam 7 hari.'],
            ['ikon' => 'fas fa-search', 'warna' => 'green', 'judul' => 'Peer Review', 'desc' => 'Naskah direview oleh 2 expert reviewer untuk memastikan kualitas konten dan akurasi materi.'],
            ['ikon' => 'fas fa-upload', 'warna' => 'amber', 'judul' => 'Publish & Distribute', 'desc' => 'E-book Anda dipublikasikan di perpustakaan KVT Hub dan bisa diakses oleh seluruh anggota.'],
            ['ikon' => 'fas fa-trophy', 'warna' => 'purple', 'judul' => 'Royalti & Recognition', 'desc' => 'Dapatkan royalti digital, badge Author, dan profil penulis yang ditampilkan di halaman utama.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($author as $a)
            <div class="kaca rounded-2xl p-6 border-{{ $a['warna'] }}-500/20 hover:border-{{ $a['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="w-12 h-12 bg-{{ $a['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition"><i class="{{ $a['ikon'] }} text-{{ $a['warna'] }}-400 text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $a['judul'] }}</h3>
                <p class="text-gray-400 text-sm">{{ $a['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-emerald-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">1.6K+</div><p class="text-gray-400 text-sm mt-1">E-Book</p></div>
        <div><div class="text-3xl font-black teks-gradien">500+</div><p class="text-gray-400 text-sm mt-1">Modul</p></div>
        <div><div class="text-3xl font-black teks-gradien">250K+</div><p class="text-gray-400 text-sm mt-1">Unduhan</p></div>
        <div><div class="text-3xl font-black teks-gradien">120+</div><p class="text-gray-400 text-sm mt-1">Penulis</p></div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Cara Download & Baca E-Book', 'durasi' => '05:30', 'views' => '32K', 'warna' => 'emerald', 'thumb' => 'https://placehold.co/640x360/1a1a2e/10B981?text=Download+Guide'],
            ['judul' => 'Tips Membaca Efektif', 'durasi' => '09:15', 'views' => '18K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3B82F6?text=Reading+Tips'],
            ['judul' => 'Cara Submit Naskah Penulis', 'durasi' => '07:40', 'views' => '11K', 'warna' => 'amber', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F59E0B?text=Author+Guide'],
        ];
        @endphp
        @foreach($videos as $v)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $v['warna'] }}-500/20 hover:border-{{ $v['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="relative overflow-hidden">
                <img src="{{ $v['thumb'] }}" alt="{{ $v['judul'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur rounded-full flex items-center justify-center"><i class="fas fa-play text-white text-xl ml-1"></i></div>
                </div>
                <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-0.5 rounded">{{ $v['durasi'] }}</span>
            </div>
            <div class="p-4">
                <h4 class="text-white font-bold text-sm mb-1">{{ $v['judul'] }}</h4>
                <p class="text-gray-500 text-xs"><i class="fas fa-eye mr-1"></i>{{ $v['views'] }} views</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-emerald-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pembaca', 'fitur' => ['Download e-book PDF & EPUB gratis', 'Baca online dengan highlight & bookmark', 'Dengarkan audio summary', 'Simpan ke reading list pribadi', 'Rate & review setiap buku', 'Track progress membaca']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Penulis', 'fitur' => ['Submit naskah e-book & modul', 'Dapatkan peer review gratis', 'Monitor statistik pembaca', 'Buat reading list per kelas', 'Assign buku ke siswa', 'Dapatkan badge & royalti']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola seluruh katalog perpustakaan', 'Moderasi naskah & review', 'Dashboard analytics pembaca', 'Kelola lisensi & hak cipta', 'Konfigurasi format & distribusi', 'Laporan statistik perpustakaan']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($roles as $r)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="bg-gradient-to-r {{ $r['gradien'] }} p-6 text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3"><i class="{{ $r['ikon'] }} text-white text-2xl"></i></div>
                    <h3 class="text-white font-bold text-xl">{{ $r['peran'] }}</h3>
                </div>
                <div class="p-6 space-y-3">
                    @foreach($r['fitur'] as $f)
                    <div class="flex items-start gap-2 text-sm text-gray-300"><i class="fas fa-check-circle text-{{ $r['warna'] }}-400 text-xs mt-1"></i>{{ $f }}</div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apakah semua e-book gratis?', 'a' => 'Ya, seluruh koleksi e-book dan modul di KVT Hub tersedia secara gratis untuk semua anggota terdaftar. Tidak ada biaya berlangganan atau paywall.'],
        ['q' => 'Format apa saja yang tersedia?', 'a' => 'E-book tersedia dalam format PDF (untuk desktop) dan EPUB (untuk mobile). Anda juga bisa membaca langsung di browser menggunakan online reader kami.'],
        ['q' => 'Bagaimana cara submit naskah sebagai penulis?', 'a' => 'Login ke akun Anda, buka menu "Author Program", klik "Submit Naskah". Upload file draft (DOCX/PDF), isi metadata, dan submit. Tim reviewer akan memberikan feedback dalam 7 hari.'],
        ['q' => 'Apakah ada batasan download?', 'a' => 'Tidak ada batasan jumlah download. Anda bisa mengunduh sebanyak yang Anda butuhkan. File tersimpan di akun Anda dan bisa diunduh ulang kapan saja.'],
        ['q' => 'Apakah e-book bisa digunakan untuk keperluan mengajar?', 'a' => 'Ya, sebagian besar e-book berlisensi Creative Commons yang mengizinkan penggunaan untuk keperluan pendidikan. Guru bisa assign buku ke kelas dan membuat reading list khusus.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-emerald-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-emerald-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Akses Perpustakaan Digital Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis dan jelajahi 2.000+ e-book & modul dari berbagai bidang ilmu. Unduh kapan saja, baca di mana saja.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-green-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Baca Gratis
        </a>
    </div>
</section>

@endsection
