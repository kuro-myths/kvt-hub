@extends('tata-letak.utama')
@section('judul', 'TK / PAUD - Usia 4-6 Tahun - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-pink-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(236,72,153,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 50%, rgba(251,191,36,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-pink-800/30 border border-pink-600/30 rounded-full px-4 py-1.5 text-xs text-pink-300 mb-6" data-aos="fade-down">
            <i class="fas fa-baby"></i> Pendidikan Usia Dini — Fase Fondasi
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">TK / </span><span class="teks-gradien">PAUD</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Program play-based learning untuk usia 4-6 tahun. Stimulasi motorik, bahasa, kreativitas, dan sosial-emosional melalui permainan edukatif interaktif sesuai Kurikulum Merdeka Fase Fondasi.
        </p>
        <div class="flex justify-center gap-4 flex-wrap" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-400 hover:to-rose-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-pink-500/20">
                <i class="fas fa-rocket mr-2"></i>Mulai Belajar
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- CP Fase Fondasi --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Capaian Pembelajaran Fase Fondasi</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Dirancang sesuai Kurikulum Merdeka Belajar untuk anak usia dini</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $kurikulum = [
            ['Nilai Agama & Budi Pekerti', 'Mengenal nilai-nilai agama, berdoa, sopan santun, dan perilaku baik sehari-hari.', 'fa-pray', 'from-pink-500 to-rose-500'],
            ['Jati Diri', 'Mengenal diri sendiri, keluarga, kemandirian, dan kepercayaan diri anak.', 'fa-child', 'from-blue-500 to-cyan-500'],
            ['Literasi & Numerasi Awal', 'Mengenal huruf, bunyi, angka 1-20, bentuk geometri, dan pola sederhana.', 'fa-spell-check', 'from-green-500 to-emerald-500'],
            ['Seni & Kreativitas', 'Menggambar, mewarnai, musik, tari, dan drama. Ekspresikan imajinasi anak.', 'fa-palette', 'from-purple-500 to-violet-500'],
            ['Motorik Halus & Kasar', 'Menggunting, menempel, melipat, berlari, melompat, dan koordinasi tubuh.', 'fa-hand-paper', 'from-red-500 to-pink-500'],
            ['Sosial-Emosional', 'Berbagi, antri, empati, mengenal emosi, dan berinteraksi dengan teman sebaya.', 'fa-heart', 'from-yellow-500 to-amber-500'],
        ];
        @endphp
        @foreach($kurikulum as $idx => $k)
        <div class="kaca rounded-2xl p-6 hover:border-pink-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <div class="w-12 h-12 bg-gradient-to-br {{ $k[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $k[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $k[0] }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ $k[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Jenis Aktivitas --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Jenis Aktivitas Play-Based Learning</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Belajar melalui bermain — metode terbaik untuk anak usia dini</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $aktivitas = [
                ['Bermain Peran', 'Simulasi profesi seperti dokter, guru, dan koki untuk melatih imajinasi.', 'fa-theater-masks', 'text-pink-400'],
                ['Seni & Kerajinan', 'Finger painting, clay, kolase, dan craft dari bahan daur ulang.', 'fa-paint-brush', 'text-purple-400'],
                ['Eksplorasi Alam', 'Mengamati tumbuhan, hewan, cuaca, dan eksperimen sains sederhana.', 'fa-seedling', 'text-green-400'],
                ['Gerak & Lagu', 'Senam, tarian, dan lagu edukatif untuk koordinasi motorik kasar.', 'fa-music', 'text-yellow-400'],
                ['Bermain Konstruksi', 'Membangun dengan balok, lego, dan puzzle untuk logika spasial.', 'fa-cubes', 'text-blue-400'],
                ['Cerita & Dongeng', 'Storytelling interaktif dengan boneka tangan dan buku cerita bergambar.', 'fa-book-reader', 'text-red-400'],
                ['Permainan Digital', 'Game edukatif touchscreen yang aman dan sesuai usia anak.', 'fa-tablet-alt', 'text-cyan-400'],
                ['Proyek Mini', 'Proyek sederhana mingguan yang melibatkan orang tua di rumah.', 'fa-project-diagram', 'text-orange-400'],
            ];
            @endphp
            @foreach($aktivitas as $idx => $a)
            <div class="kaca rounded-2xl p-5 text-center hover:border-pink-500/20 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <i class="fas {{ $a[2] }} {{ $a[3] }} text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">{{ $a[0] }}</h3>
                <p class="text-gray-400 text-xs leading-relaxed">{{ $a[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-pink-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">200+</div><p class="text-gray-400 text-sm mt-1">Aktivitas Belajar</p></div>
        <div><div class="text-3xl font-black teks-gradien">50+</div><p class="text-gray-400 text-sm mt-1">Video Animasi</p></div>
        <div><div class="text-3xl font-black teks-gradien">100+</div><p class="text-gray-400 text-sm mt-1">Permainan Edukatif</p></div>
        <div><div class="text-3xl font-black teks-gradien">30+</div><p class="text-gray-400 text-sm mt-1">Lagu Anak</p></div>
    </div>
</section>

{{-- Metode Asesmen --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Metode Asesmen Perkembangan</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Penilaian holistik tanpa tes formal — sesuai prinsip PAUD</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $asesmen = [
            ['Observasi Harian', 'Guru mencatat perkembangan anak melalui pengamatan selama interaksi dan bermain di kelas.', 'fa-eye', 'from-pink-500 to-rose-500'],
            ['Portofolio Karya', 'Kumpulan hasil karya anak: gambar, foto aktivitas, dan rekaman video sebagai bukti perkembangan.', 'fa-folder-open', 'from-blue-500 to-cyan-500'],
            ['Catatan Anekdot', 'Pencatatan momen penting dan unik yang menunjukkan capaian perkembangan anak.', 'fa-pencil-alt', 'from-green-500 to-emerald-500'],
        ];
        @endphp
        @foreach($asesmen as $idx => $a)
        <div class="kaca rounded-2xl p-6 hover:border-pink-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $a[3] }} rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $a[2] }} text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $a[0] }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ $a[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Bahan Ajar & Materi --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Bahan Ajar & Materi Interaktif</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="kaca rounded-2xl p-6 text-center" data-aos="fade-up">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-user-shield text-white text-2xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">Aman untuk Anak</h3>
                <p class="text-gray-400 text-sm">Konten 100% aman, tanpa iklan, dengan kontrol orang tua terintegrasi.</p>
            </div>
            <div class="kaca rounded-2xl p-6 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-star text-white text-2xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">Reward & Badge</h3>
                <p class="text-gray-400 text-sm">Sistem reward bintang dan badge untuk memotivasi anak belajar konsisten.</p>
            </div>
            <div class="kaca rounded-2xl p-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-chart-line text-white text-2xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">Laporan Perkembangan</h3>
                <p class="text-gray-400 text-sm">Orang tua dapat memantau perkembangan anak melalui laporan berkala.</p>
            </div>
        </div>
    </div>
</section>

{{-- Panduan Orang Tua --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <div data-aos="fade-right">
            <h2 class="text-3xl font-bold text-white mb-4">Panduan untuk Orang Tua</h2>
            <p class="text-gray-400 mb-6 leading-relaxed">Keterlibatan orang tua sangat krusial dalam pendidikan usia dini. KVT Hub menyediakan panduan lengkap agar orang tua bisa mendampingi proses belajar anak di rumah.</p>
            <ul class="space-y-3 text-gray-300 text-sm">
                <li><i class="fas fa-check-circle text-pink-400 mr-2"></i>Tips mendampingi anak belajar sesuai usia perkembangan</li>
                <li><i class="fas fa-check-circle text-pink-400 mr-2"></i>Jadwal aktivitas harian yang terstruktur namun fleksibel</li>
                <li><i class="fas fa-check-circle text-pink-400 mr-2"></i>Ide permainan edukatif dari bahan sekitar rumah</li>
                <li><i class="fas fa-check-circle text-pink-400 mr-2"></i>Webinar rutin bersama psikolog anak dan pendidik PAUD</li>
                <li><i class="fas fa-check-circle text-pink-400 mr-2"></i>Komunitas orang tua untuk berbagi pengalaman dan tips</li>
            </ul>
        </div>
        <div class="kaca rounded-2xl p-2 overflow-hidden" data-aos="fade-left">
            <div class="aspect-video bg-kvt-900 rounded-xl flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-play-circle text-pink-400 text-5xl mb-3 hover:scale-110 transition cursor-pointer"></i>
                    <p class="text-gray-400 text-sm">Video: Panduan PAUD di Rumah</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Video Pembelajaran --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">Video Pengenalan Program</h2>
        <p class="text-gray-400 mb-8" data-aos="fade-up" data-aos-delay="100">Lihat bagaimana anak-anak belajar sambil bermain di KVT Hub</p>
        <div class="kaca rounded-2xl p-2 overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
            <div class="aspect-video bg-kvt-900 rounded-xl flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-play-circle text-pink-400 text-6xl mb-4 hover:scale-110 transition cursor-pointer"></i>
                    <p class="text-gray-500 text-sm">Klik untuk memutar video pengenalan TK/PAUD KVT Hub</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Fitur per Role --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Fitur untuk Setiap Peran</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $roles = [
            ['Siswa (Anak)', 'fa-child', 'from-pink-500 to-rose-500', 'border-pink-500/20', [
                'Game edukatif interaktif sesuai usia',
                'Video animasi dengan karakter lucu',
                'Kumpulkan bintang dan badge',
                'Lagu & musik anak yang seru',
            ]],
            ['Guru / Pendidik', 'fa-chalkboard-teacher', 'from-blue-500 to-cyan-500', 'border-blue-500/20', [
                'Dashboard pemantauan perkembangan murid',
                'Template RPPH & modul ajar siap pakai',
                'Tools asesmen observasi digital',
                'Komunitas guru PAUD se-Indonesia',
            ]],
            ['Orang Tua / Admin', 'fa-user-tie', 'from-green-500 to-emerald-500', 'border-green-500/20', [
                'Laporan perkembangan anak real-time',
                'Kontrol waktu screen time anak',
                'Notifikasi pencapaian milestone',
                'Akses panduan & webinar parenting',
            ]],
        ];
        @endphp
        @foreach($roles as $idx => $r)
        <div class="kaca rounded-2xl p-6 {{ $r[3] }} hover:border-opacity-60 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $r[2] }} rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $r[1] }} text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-3">{{ $r[0] }}</h3>
            <ul class="space-y-2">
                @foreach($r[4] as $fitur)
                <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check text-pink-400 mt-0.5 text-xs"></i>{{ $fitur }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</section>

{{-- FAQ --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Pertanyaan Umum (FAQ)</h2>
        @php
        $faq = [
            ['Apakah program ini cocok untuk anak usia 3 tahun?', 'Program TK/PAUD KVT Hub dirancang untuk anak usia 4-6 tahun sesuai Fase Fondasi Kurikulum Merdeka. Namun, beberapa konten dasar juga dapat diakses oleh anak usia 3 tahun dengan pendampingan orang tua.'],
            ['Bagaimana metode pengajaran yang digunakan?', 'Kami menggunakan pendekatan play-based learning (belajar melalui bermain) yang terbukti efektif untuk anak usia dini. Setiap aktivitas dirancang untuk menstimulasi perkembangan kognitif, motorik, dan sosial-emosional anak.'],
            ['Apakah orang tua perlu mendampingi anak?', 'Sangat dianjurkan, terutama untuk anak usia 4 tahun. Platform kami menyediakan panduan lengkap untuk orang tua dan fitur parental control untuk mengatur waktu belajar anak.'],
            ['Berapa lama durasi belajar ideal per hari?', 'Untuk anak usia 4-6 tahun, durasi screen time yang direkomendasikan adalah 30-60 menit per hari. Setiap sesi dirancang berdurasi 10-15 menit agar anak tetap fokus.'],
            ['Apakah ada sertifikat setelah menyelesaikan program?', 'Ya, anak akan mendapatkan sertifikat digital penyelesaian setiap tema. Selain itu, ada badge virtual dan bintang sebagai motivasi belajar.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $idx => $f)
            <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <summary class="flex items-center justify-between p-5 cursor-pointer text-white font-semibold text-sm hover:text-pink-300 transition">
                    {{ $f[0] }}
                    <i class="fas fa-chevron-down text-pink-400 text-xs group-open:rotate-180 transition-transform"></i>
                </summary>
                <div class="px-5 pb-5 text-gray-400 text-sm leading-relaxed border-t border-kvt-700/30 pt-4">{{ $f[1] }}</div>
            </details>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="kaca rounded-3xl p-10 border-pink-500/20" data-aos="zoom-in">
            <i class="fas fa-baby text-pink-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Mulai Petualangan Belajar si Kecil!</h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto">Bergabunglah sekarang dan berikan fondasi terbaik untuk masa depan anak Anda melalui program PAUD interaktif KVT Hub.</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-400 hover:to-rose-400 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-pink-500/20">
                    <i class="fas fa-rocket mr-2"></i>Daftar Gratis
                </a>
                <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                    <i class="fas fa-info-circle mr-2"></i>Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
