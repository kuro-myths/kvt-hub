@extends('tata-letak.utama')
@section('judul', 'Silabus & RPS - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-blue-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 left-20 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 right-10 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #3B82F6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-blue-800/30 border border-blue-600/30 rounded-full px-4 py-1.5 text-xs text-blue-300 mb-6" data-aos="fade-down">
            <i class="fas fa-list-alt"></i> Silabus & Rencana Pembelajaran Semester
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Silabus &</span><br>
            <span class="teks-gradien">Rencana Pembelajaran</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Koleksi silabus lengkap dan Rencana Pembelajaran Semester (RPS) untuk setiap jenjang pendidikan.
            Tersedia dalam format Kurikulum Merdeka, Cambridge, IB, dan KKNI.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-blue-500/30 hover:-translate-y-0.5">
                <i class="fas fa-download mr-2"></i>Unduh Silabus
            </a>
            <a href="#mata-pelajaran" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-th-large mr-2"></i>Lihat Mata Pelajaran
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">50+</div><div class="text-xs text-gray-500">Silabus</div></div>
            <div><div class="text-2xl font-black text-white">200+</div><div class="text-xs text-gray-500">Mata Pelajaran</div></div>
            <div><div class="text-2xl font-black text-white">6</div><div class="text-xs text-gray-500">Jenjang</div></div>
            <div><div class="text-2xl font-black text-white">4</div><div class="text-xs text-gray-500">Kurikulum</div></div>
        </div>
    </div>
</section>

{{-- MATA PELAJARAN PER JENJANG --}}
<section id="mata-pelajaran" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">MATA PELAJARAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Silabus per Jenjang Pendidikan</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih jenjang untuk melihat daftar silabus yang tersedia</p>
    </div>
    @php
    $mapel = [
        ['ikon'=>'fas fa-baby','warna'=>'pink','judul'=>'TK / PAUD','mapel'=>['Bahasa & Literasi Awal','Numerasi Dasar','Seni & Kreativitas','Motorik Halus & Kasar','Sosial-Emosional','Pengenalan Lingkungan']],
        ['ikon'=>'fas fa-book-open','warna'=>'blue','judul'=>'SD / MI','mapel'=>['Matematika','Bahasa Indonesia','Bahasa Inggris','IPA','IPS','PPKn','PJOK','Seni Budaya']],
        ['ikon'=>'fas fa-book','warna'=>'green','judul'=>'SMP / MTs','mapel'=>['Matematika','Bahasa Indonesia','Bahasa Inggris','IPA Terpadu','IPS Terpadu','Informatika','PPKn','Prakarya']],
        ['ikon'=>'fas fa-school','warna'=>'amber','judul'=>'SMA / MA','mapel'=>['Matematika Wajib','Matematika Peminatan','Fisika','Kimia','Biologi','Ekonomi','Sosiologi','Geografi']],
        ['ikon'=>'fas fa-tools','warna'=>'orange','judul'=>'SMK','mapel'=>['Teknik Komputer Jaringan','Rekayasa Perangkat Lunak','Akuntansi & Keuangan','Multimedia','Teknik Mesin','Bisnis & Pemasaran']],
        ['ikon'=>'fas fa-user-graduate','warna'=>'purple','judul'=>'Perguruan Tinggi','mapel'=>['Algoritma & Pemrograman','Basis Data','Kalkulus','Statistika','Manajemen Proyek','Metodologi Penelitian']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($mapel as $m)
        <div class="kaca rounded-2xl p-6 border-{{ $m['warna'] }}-500/20 hover:border-{{ $m['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-{{ $m['warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="{{ $m['ikon'] }} text-{{ $m['warna'] }}-400 text-xl"></i></div>
                <h3 class="text-white font-bold text-lg">{{ $m['judul'] }}</h3>
            </div>
            <ul class="space-y-2">
                @foreach($m['mapel'] as $mp)
                <li class="flex items-center gap-2 text-sm text-gray-400 hover:text-gray-200 transition cursor-pointer"><i class="fas fa-file-alt text-{{ $m['warna'] }}-400/60 text-xs"></i>{{ $mp }}</li>
                @endforeach
            </ul>
            <div class="mt-4 pt-3 border-t border-kvt-800/50">
                <span class="text-xs text-{{ $m['warna'] }}-400 font-semibold cursor-pointer hover:underline"><i class="fas fa-arrow-right mr-1"></i>Lihat semua silabus</span>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- STRUKTUR SILABUS --}}
<section class="bg-gradient-to-br from-blue-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">STRUKTUR</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Struktur Silabus Standar</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Setiap silabus di KVT Hub mengikuti struktur baku berikut</p>
        </div>
        @php
        $struktur = [
            ['no'=>'01','ikon'=>'fas fa-bullseye','warna'=>'blue','judul'=>'Capaian Pembelajaran (CP)','desc'=>'Kompetensi inti dan kompetensi dasar yang harus dicapai peserta didik di akhir fase pembelajaran.'],
            ['no'=>'02','ikon'=>'fas fa-stream','warna'=>'indigo','judul'=>'Alur Tujuan Pembelajaran','desc'=>'Peta urutan learning objectives yang terstruktur dari pertemuan ke pertemuan secara sequential.'],
            ['no'=>'03','ikon'=>'fas fa-calendar-week','warna'=>'purple','judul'=>'Rincian Minggu ke Minggu','desc'=>'Breakdown detail materi, metode pengajaran, dan sumber belajar di setiap pertemuan tatap muka.'],
            ['no'=>'04','ikon'=>'fas fa-clipboard-check','warna'=>'green','judul'=>'Asesmen & Evaluasi','desc'=>'Rubrik penilaian, bobot asesmen formatif/sumatif, dan instrumen evaluasi hasil belajar.'],
            ['no'=>'05','ikon'=>'fas fa-books','warna'=>'amber','judul'=>'Daftar Pustaka & Sumber','desc'=>'Referensi buku teks, jurnal, video, dan sumber digital yang direkomendasikan.'],
            ['no'=>'06','ikon'=>'fas fa-project-diagram','warna'=>'teal','judul'=>'Projek & Tugas','desc'=>'Deskripsi projek, tugas mandiri/kelompok, dan rubrik penilaian projek P5 atau capstone.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($struktur as $s)
            <div class="kaca rounded-2xl p-6 border-{{ $s['warna'] }}-500/20 hover:border-{{ $s['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-3xl font-black text-{{ $s['warna'] }}-500/20">{{ $s['no'] }}</span>
                    <div class="w-10 h-10 bg-{{ $s['warna'] }}-500/20 rounded-lg flex items-center justify-center"><i class="{{ $s['ikon'] }} text-{{ $s['warna'] }}-400"></i></div>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $s['judul'] }}</h3>
                <p class="text-gray-400 text-sm">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- LEARNING OUTCOMES TABLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">CAPAIAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Contoh Learning Outcomes per Fase</h2>
    </div>
    <div class="kaca rounded-2xl overflow-hidden border-green-500/20" data-aos="fade-up" data-aos-delay="100">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="bg-green-500/10 text-green-300">
                    <th class="px-6 py-4 text-left font-semibold">Fase</th>
                    <th class="px-6 py-4 text-left font-semibold">Jenjang</th>
                    <th class="px-6 py-4 text-left font-semibold">Contoh CP Matematika</th>
                    <th class="px-6 py-4 text-left font-semibold">Level Bloom</th>
                </tr></thead>
                <tbody class="divide-y divide-kvt-800/50">
                    @php $faseData = [
                        ['fase'=>'Fondasi','jenjang'=>'PAUD/TK','cp'=>'Mengenal bilangan 1-20, menghitung benda konkret','bloom'=>'Mengingat (C1)'],
                        ['fase'=>'A','jenjang'=>'Kelas 1-2 SD','cp'=>'Operasi hitung penjumlahan & pengurangan hingga 100','bloom'=>'Memahami (C2)'],
                        ['fase'=>'B','jenjang'=>'Kelas 3-4 SD','cp'=>'Perkalian, pembagian, pecahan sederhana','bloom'=>'Menerapkan (C3)'],
                        ['fase'=>'C','jenjang'=>'Kelas 5-6 SD','cp'=>'Geometri bangun datar, statistika dasar, rasio','bloom'=>'Menganalisis (C4)'],
                        ['fase'=>'D','jenjang'=>'Kelas 7-9 SMP','cp'=>'Aljabar, fungsi linier, teorema Pythagoras','bloom'=>'Menganalisis (C4)'],
                        ['fase'=>'E','jenjang'=>'Kelas 10 SMA','cp'=>'Trigonometri, limit fungsi, statistika inferensial','bloom'=>'Mengevaluasi (C5)'],
                        ['fase'=>'F','jenjang'=>'Kelas 11-12 SMA','cp'=>'Kalkulus diferensial-integral, matriks, probabilitas','bloom'=>'Mencipta (C6)'],
                    ]; @endphp
                    @foreach($faseData as $f)
                    <tr class="hover:bg-kvt-800/30 transition">
                        <td class="px-6 py-3 text-green-400 font-bold">{{ $f['fase'] }}</td>
                        <td class="px-6 py-3 text-gray-300">{{ $f['jenjang'] }}</td>
                        <td class="px-6 py-3 text-gray-400">{{ $f['cp'] }}</td>
                        <td class="px-6 py-3"><span class="bg-green-500/10 text-green-300 text-xs px-2 py-1 rounded-full">{{ $f['bloom'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-blue-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Silabus Sesuai Peran Anda</h2>
        </div>
        @php $roles = [
            ['ikon'=>'fas fa-user','warna'=>'blue','gradien'=>'from-blue-500 to-cyan-500','peran'=>'Siswa','fitur'=>['Akses silabus semua mata pelajaran','Download PDF silabus per semester','Lihat learning outcomes yang harus dicapai','Pantau progress per capaian pembelajaran','Akses contoh soal dari setiap bab','Bookmark silabus favorit']],
            ['ikon'=>'fas fa-chalkboard-teacher','warna'=>'green','gradien'=>'from-green-500 to-emerald-500','peran'=>'Guru / Dosen','fitur'=>['Upload & edit silabus mata pelajaran','Buat RPS dengan template standar','Mapping CP ke asesmen & materi','Generate silabus otomatis dari ATP','Kolaborasi penyusunan silabus tim','Export ke format PDF / DOCX']],
            ['ikon'=>'fas fa-user-shield','warna'=>'red','gradien'=>'from-red-500 to-rose-500','peran'=>'Admin Kurikulum','fitur'=>['Approve & publish silabus resmi','Monitoring kelengkapan silabus','Audit kesesuaian CP Kemendikbud','Kelola bank silabus institusi','Laporan statistik silabus','Sinkronisasi kurikulum nasional']],
        ]; @endphp
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

{{-- VIDEO PANDUAN --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Silabus</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php $videos = [
            ['judul'=>'Cara Membaca Silabus Merdeka','durasi'=>'10:25','views'=>'38K','warna'=>'red','thumb'=>'https://placehold.co/640x360/1a1a2e/3B82F6?text=Silabus+Merdeka'],
            ['judul'=>'Menyusun ATP dari CP','durasi'=>'14:50','views'=>'27K','warna'=>'blue','thumb'=>'https://placehold.co/640x360/1a1a2e/22C55E?text=ATP+dari+CP'],
            ['judul'=>'Mapping Silabus ke Asesmen','durasi'=>'11:30','views'=>'19K','warna'=>'purple','thumb'=>'https://placehold.co/640x360/1a1a2e/A855F7?text=Mapping+Asesmen'],
        ]; @endphp
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

{{-- CTA --}}
<section class="bg-gradient-to-r from-blue-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Unduh Silabus Lengkap Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Akses lebih dari 50 silabus dan RPS dari semua jenjang. Gratis untuk semua pengguna terdaftar KVT Hub.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-blue-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Unduh Gratis
        </a>
    </div>
</section>

@endsection
