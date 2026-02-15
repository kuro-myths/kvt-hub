@extends('tata-letak.utama')
@section('judul', 'Capaian Pembelajaran - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-purple-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-16 right-20 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-16 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #A855F7 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-purple-800/30 border border-purple-600/30 rounded-full px-4 py-1.5 text-xs text-purple-300 mb-6" data-aos="fade-down">
            <i class="fas fa-bullseye"></i> Learning Outcomes & KKNI Framework
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Capaian</span><br>
            <span class="teks-gradien-emas">Pembelajaran (CP)</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Framework capaian pembelajaran berbasis KKNI (Kerangka Kualifikasi Nasional Indonesia) yang
            terstruktur dari setiap jenjang. Mapping ke Taksonomi Bloom dan alignment dengan asesmen.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-purple-500 to-indigo-500 hover:from-purple-400 hover:to-indigo-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-purple-500/30 hover:-translate-y-0.5">
                <i class="fas fa-download mr-2"></i>Unduh CP Lengkap
            </a>
            <a href="#kkni" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-layer-group mr-2"></i>Lihat Piramida KKNI
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">9</div><div class="text-xs text-gray-500">Level KKNI</div></div>
            <div><div class="text-2xl font-black text-white">6</div><div class="text-xs text-gray-500">Level Bloom</div></div>
            <div><div class="text-2xl font-black text-white">150+</div><div class="text-xs text-gray-500">CP Tersedia</div></div>
            <div><div class="text-2xl font-black text-white">100%</div><div class="text-xs text-gray-500">Aligned</div></div>
        </div>
    </div>
</section>

{{-- PIRAMIDA KKNI --}}
<section id="kkni" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">KKNI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Piramida Level KKNI</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">9 level kualifikasi dari operator hingga ahli, sesuai Perpres No. 8 Tahun 2012</p>
    </div>
    @php $kkni = [
        ['level'=>'9','warna'=>'red','judul'=>'Spesialis / Pakar','jenjang'=>'S3 / Doktor','desc'=>'Mengembangkan pengetahuan baru melalui riset multidisiplin dan kontribusi orisinal.'],
        ['level'=>'8','warna'=>'rose','judul'=>'Profesional / Manager','jenjang'=>'S2 / Magister','desc'=>'Memecahkan masalah kompleks dengan pendekatan inter/multidisiplin yang inovatif.'],
        ['level'=>'7','warna'=>'purple','judul'=>'Profesional Muda','jenjang'=>'Profesi','desc'=>'Menerapkan keahlian profesional dan membuat keputusan strategis dalam bidang keahlian.'],
        ['level'=>'6','warna'=>'indigo','judul'=>'Analis','jenjang'=>'S1 / D4','desc'=>'Mengaplikasikan ilmu, teknologi, dan seni untuk penyelesaian masalah secara sistematis.'],
        ['level'=>'5','warna'=>'blue','judul'=>'Teknisi Senior','jenjang'=>'D3','desc'=>'Menyelesaikan pekerjaan berlingkup luas dengan metode yang sesuai dari berbagai pilihan.'],
        ['level'=>'4','warna'=>'cyan','judul'=>'Teknisi / Analis Muda','jenjang'=>'D2','desc'=>'Menguasai konsep teoretis dan mampu merumuskan penyelesaian masalah prosedural.'],
        ['level'=>'3','warna'=>'teal','judul'=>'Operator Mahir','jenjang'=>'D1 / SMA/SMK','desc'=>'Mampu melaksanakan tugas spesifik dengan alat, informasi, dan prosedur kerja yang sudah ada.'],
        ['level'=>'2','warna'=>'green','judul'=>'Operator Dasar','jenjang'=>'SMP','desc'=>'Mampu melaksanakan satu tugas spesifik berulang dengan bimbingan langsung.'],
        ['level'=>'1','warna'=>'amber','judul'=>'Operator Pemula','jenjang'=>'SD','desc'=>'Mampu melaksanakan tugas sederhana, terbatas, rutin, dengan pengawasan langsung.'],
    ]; @endphp
    <div class="space-y-3 max-w-4xl mx-auto">
        @foreach($kkni as $k)
        @php $width = 40 + (10 - (int)$k['level']) * 7; @endphp
        <div class="mx-auto" style="width: {{ $width }}%" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
            <div class="kaca rounded-xl p-4 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group cursor-pointer">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-{{ $k['warna'] }}-500 to-{{ $k['warna'] }}-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition">
                        <span class="text-white font-black text-lg">{{ $k['level'] }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <h3 class="text-white font-bold text-sm">{{ $k['judul'] }}</h3>
                            <span class="bg-{{ $k['warna'] }}-500/10 text-{{ $k['warna'] }}-400 text-[10px] px-2 py-0.5 rounded-full">{{ $k['jenjang'] }}</span>
                        </div>
                        <p class="text-gray-400 text-xs mt-1 hidden md:block">{{ $k['desc'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- CAPAIAN PER PROGRAM STUDI --}}
<section class="bg-gradient-to-br from-purple-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">PROGRAM STUDI</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Capaian Pembelajaran per Program Studi</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Contoh learning outcomes untuk berbagai program studi populer</p>
        </div>
        @php $prodi = [
            ['ikon'=>'fas fa-laptop-code','warna'=>'blue','judul'=>'Teknik Informatika','level'=>'KKNI Level 6 (S1)','cp'=>['Mampu merancang dan mengembangkan sistem perangkat lunak skala enterprise','Menguasai minimal 3 bahasa pemrograman dan 2 framework modern','Mampu menerapkan algoritma untuk memecahkan masalah komputasional','Mampu bekerja dalam tim agile dan mengelola proyek software']],
            ['ikon'=>'fas fa-flask','warna'=>'green','judul'=>'Pendidikan Sains','level'=>'KKNI Level 6 (S1)','cp'=>['Menguasai konsep fundamental fisika, kimia, dan biologi secara integratif','Mampu merancang pembelajaran sains berbasis inquiry dan eksperimen','Mampu mengevaluasi literasi sains peserta didik menggunakan instrumen valid','Mampu mengembangkan media pembelajaran berbasis teknologi']],
            ['ikon'=>'fas fa-chart-line','warna'=>'amber','judul'=>'Manajemen Bisnis','level'=>'KKNI Level 6 (S1)','cp'=>['Mampu menganalisis lingkungan bisnis dan merumuskan strategi perusahaan','Menguasai tools analisis keuangan, pemasaran, dan operasional','Mampu memimpin tim dan membuat keputusan berbasis data','Mampu merancang business plan dan proposal investasi']],
            ['ikon'=>'fas fa-gavel','warna'=>'red','judul'=>'Ilmu Hukum','level'=>'KKNI Level 6 (S1)','cp'=>['Menguasai asas-asas hukum pidana, perdata, tata negara, dan internasional','Mampu menganalisis kasus hukum dan menyusun legal opinion','Mampu melakukan penelitian hukum normatif dan empiris','Mampu menyusun dokumen hukum (kontrak, gugatan, pledoi)']],
            ['ikon'=>'fas fa-heartbeat','warna'=>'pink','judul'=>'Keperawatan','level'=>'KKNI Level 6 (S1)','cp'=>['Mampu memberikan asuhan keperawatan komprehensif kepada individu & kelompok','Menguasai komunikasi terapeutik dan etika profesi keperawatan','Mampu menggunakan critical thinking dalam pengambilan keputusan klinis','Mampu melakukan riset keperawatan berbasis evidence-based practice']],
            ['ikon'=>'fas fa-pencil-ruler','warna'=>'cyan','judul'=>'Desain Komunikasi Visual','level'=>'KKNI Level 6 (S1)','cp'=>['Mampu merancang solusi visual untuk masalah komunikasi yang kompleks','Menguasai software desain industri (Adobe Suite, Figma, Blender)','Mampu menerapkan prinsip desain, tipografi, dan teori warna','Mampu membuat portofolio profesional dan presentasi konsep desain']],
        ]; @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($prodi as $p)
            <div class="kaca rounded-2xl p-6 border-{{ $p['warna'] }}-500/20 hover:border-{{ $p['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-12 h-12 bg-{{ $p['warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="{{ $p['ikon'] }} text-{{ $p['warna'] }}-400 text-xl"></i></div>
                    <div>
                        <h3 class="text-white font-bold text-sm">{{ $p['judul'] }}</h3>
                        <span class="text-{{ $p['warna'] }}-400 text-[10px]">{{ $p['level'] }}</span>
                    </div>
                </div>
                <ul class="space-y-2">
                    @foreach($p['cp'] as $c)
                    <li class="flex items-start gap-2 text-xs text-gray-400"><i class="fas fa-check text-{{ $p['warna'] }}-400/70 text-[10px] mt-1"></i>{{ $c }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TAKSONOMI BLOOM --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">BLOOM'S TAXONOMY</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Mapping Taksonomi Bloom</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Setiap capaian pembelajaran di-mapping ke level kognitif Bloom's Revised Taxonomy</p>
    </div>
    @php $bloom = [
        ['level'=>'C6','warna'=>'red','judul'=>'Mencipta (Create)','desc'=>'Menghasilkan karya/produk baru, mendesain solusi original.','kata'=>['Merancang','Mengembangkan','Memformulasikan','Mengonstruksi','Merencanakan'],'contoh'=>'Merancang arsitektur microservices untuk aplikasi e-commerce.'],
        ['level'=>'C5','warna'=>'amber','judul'=>'Mengevaluasi (Evaluate)','desc'=>'Membuat penilaian atau justifikasi berdasarkan kriteria.','kata'=>['Menilai','Mengkritik','Memvalidasi','Membandingkan','Merekomendasi'],'contoh'=>'Mengevaluasi efektivitas algoritma sorting berdasarkan time complexity.'],
        ['level'=>'C4','warna'=>'purple','judul'=>'Menganalisis (Analyze)','desc'=>'Memecah informasi menjadi bagian, menemukan pola dan hubungan.','kata'=>['Menganalisis','Membedakan','Menginvestigasi','Mengkategorikan','Mendeteksi'],'contoh'=>'Menganalisis bottleneck performa pada sistem database relasional.'],
        ['level'=>'C3','warna'=>'blue','judul'=>'Menerapkan (Apply)','desc'=>'Menggunakan konsep pada situasi baru atau konteks berbeda.','kata'=>['Menerapkan','Mengimplementasikan','Menghitung','Mengoperasikan','Mendemonstrasikan'],'contoh'=>'Mengimplementasikan RESTful API menggunakan Laravel framework.'],
        ['level'=>'C2','warna'=>'cyan','judul'=>'Memahami (Understand)','desc'=>'Menjelaskan makna, menginterpretasikan, dan merangkum.','kata'=>['Menjelaskan','Mengklasifikasikan','Merangkum','Menginterpretasikan','Menyimpulkan'],'contoh'=>'Menjelaskan prinsip kerja protokol TCP/IP dalam jaringan komputer.'],
        ['level'=>'C1','warna'=>'green','judul'=>'Mengingat (Remember)','desc'=>'Mengenali, mengingat kembali fakta, konsep dasar.','kata'=>['Menyebutkan','Mendefinisikan','Mengidentifikasi','Menuliskan','Menghafal'],'contoh'=>'Mendefinisikan tipe data primitif dalam bahasa pemrograman Java.'],
    ]; @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($bloom as $b)
        <div class="kaca rounded-2xl p-6 border-{{ $b['warna'] }}-500/20 hover:border-{{ $b['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
            <div class="flex items-center gap-3 mb-3">
                <span class="text-2xl font-black text-{{ $b['warna'] }}-500/40">{{ $b['level'] }}</span>
                <h3 class="text-white font-bold text-sm">{{ $b['judul'] }}</h3>
            </div>
            <p class="text-gray-400 text-xs mb-3">{{ $b['desc'] }}</p>
            <div class="mb-3">
                <span class="text-[10px] text-gray-500 uppercase tracking-wider font-semibold">Kata Kerja Operasional:</span>
                <div class="flex flex-wrap gap-1.5 mt-1.5">
                    @foreach($b['kata'] as $k)
                    <span class="bg-{{ $b['warna'] }}-500/10 text-{{ $b['warna'] }}-400 text-[10px] px-2 py-0.5 rounded-full">{{ $k }}</span>
                    @endforeach
                </div>
            </div>
            <div class="bg-kvt-800/40 rounded-lg p-3 mt-3">
                <span class="text-[10px] text-gray-500 block mb-1">Contoh CP:</span>
                <p class="text-gray-300 text-xs italic">{{ $b['contoh'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- ALIGNMENT ASESMEN --}}
<section class="bg-gradient-to-br from-indigo-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">ALIGNMENT</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Assessment Alignment Matrix</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Setiap CP harus aligned dengan metode asesmen yang tepat</p>
        </div>
        <div class="kaca rounded-2xl overflow-hidden border-teal-500/20" data-aos="fade-up" data-aos-delay="100">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="bg-teal-500/10 text-teal-300">
                        <th class="px-5 py-4 text-left font-semibold">Level Bloom</th>
                        <th class="px-5 py-4 text-left font-semibold">Metode Asesmen</th>
                        <th class="px-5 py-4 text-left font-semibold">Instrumen</th>
                        <th class="px-5 py-4 text-left font-semibold">Bobot</th>
                    </tr></thead>
                    <tbody class="divide-y divide-kvt-800/50">
                        @php $alignment = [
                            ['bloom'=>'C1 - C2 (LOTS)','metode'=>'Tes Tertulis (Formatif)','instrumen'=>'Kuis, Pilihan Ganda, True/False','bobot'=>'15%','warna'=>'green'],
                            ['bloom'=>'C3 (Applying)','metode'=>'Praktikum & Demo','instrumen'=>'Rubrik Observasi, Checklist','bobot'=>'20%','warna'=>'blue'],
                            ['bloom'=>'C4 (Analyzing)','metode'=>'Studi Kasus & Problem Solving','instrumen'=>'Rubrik Analitis, Laporan','bobot'=>'25%','warna'=>'purple'],
                            ['bloom'=>'C5 (Evaluating)','metode'=>'Presentasi & Peer Review','instrumen'=>'Rubrik Presentasi, Self-Assessment','bobot'=>'15%','warna'=>'amber'],
                            ['bloom'=>'C6 (Creating)','metode'=>'Proyek / Capstone','instrumen'=>'Rubrik Proyek, Portfolio Assessment','bobot'=>'25%','warna'=>'red'],
                        ]; @endphp
                        @foreach($alignment as $a)
                        <tr class="hover:bg-kvt-800/30 transition">
                            <td class="px-5 py-3"><span class="bg-{{ $a['warna'] }}-500/10 text-{{ $a['warna'] }}-400 text-xs px-2 py-1 rounded-full font-bold">{{ $a['bloom'] }}</span></td>
                            <td class="px-5 py-3 text-gray-300 text-xs">{{ $a['metode'] }}</td>
                            <td class="px-5 py-3 text-gray-400 text-xs">{{ $a['instrumen'] }}</td>
                            <td class="px-5 py-3 text-white font-bold text-sm">{{ $a['bobot'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kelola Learning Outcomes</h2>
    </div>
    @php $roles = [
        ['ikon'=>'fas fa-user','warna'=>'purple','gradien'=>'from-purple-500 to-indigo-500','peran'=>'Siswa / Mahasiswa','fitur'=>['Lihat CP mata kuliah yang diambil','Tracking pencapaian per kompetensi','Self-assessment level Bloom','Visualisasi radar chart kompetensi','Download dokumen CP per prodi','Bandingkan progress dengan target']],
        ['ikon'=>'fas fa-chalkboard-teacher','warna'=>'green','gradien'=>'from-green-500 to-teal-500','peran'=>'Guru / Dosen','fitur'=>['Susun CP dan Sub-CP mata kuliah','Mapping CP ke asesmen & materi','Generate rubrik dari CP otomatis','Analisis pencapaian CP per kelas','Export alignment matrix','Kolaborasi penyusunan CP tim prodi']],
        ['ikon'=>'fas fa-user-shield','warna'=>'red','gradien'=>'from-red-500 to-rose-500','peran'=>'Admin / QA','fitur'=>['Audit alignment CP seluruh prodi','Dashboard pencapaian CP institusi','Mapping ke standar akreditasi BAN-PT','Monitoring konsistensi antar mata kuliah','Laporan gap analysis kompetensi','Sinkronisasi dengan KKNI nasional']],
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
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-purple-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Akses Framework CP Lengkap</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar untuk mengakses database capaian pembelajaran, tools alignment, dan rubrik asesmen dari semua jenjang.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-purple-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-bullseye"></i> Mulai Mapping CP Sekarang
        </a>
    </div>
</section>

@endsection
