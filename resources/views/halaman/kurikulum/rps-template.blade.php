@extends('tata-letak.utama')
@section('judul', 'Template RPS & Modul Ajar - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-teal-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-16 right-16 w-80 h-80 bg-teal-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-16 left-16 w-64 h-64 bg-green-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #14B8A6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-teal-800/30 border border-teal-600/30 rounded-full px-4 py-1.5 text-xs text-teal-300 mb-6" data-aos="fade-down">
            <i class="fas fa-file-signature"></i> Template Siap Pakai Kurikulum Merdeka
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Template RPS &</span><br>
            <span class="teks-gradien-emas">Modul Ajar</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Koleksi template Rencana Pembelajaran Semester dan Modul Ajar siap pakai.
            Sesuai format Kurikulum Merdeka, dilengkapi panduan pengisian dan contoh lengkap.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-teal-500 to-green-500 hover:from-teal-400 hover:to-green-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-teal-500/30 hover:-translate-y-0.5">
                <i class="fas fa-download mr-2"></i>Download Template
            </a>
            <a href="#galeri" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-images mr-2"></i>Lihat Galeri Template
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">25+</div><div class="text-xs text-gray-500">Template RPS</div></div>
            <div><div class="text-2xl font-black text-white">40+</div><div class="text-xs text-gray-500">Modul Ajar</div></div>
            <div><div class="text-2xl font-black text-white">PDF/DOCX</div><div class="text-xs text-gray-500">Format</div></div>
            <div><div class="text-2xl font-black text-white">100%</div><div class="text-xs text-gray-500">Gratis</div></div>
        </div>
    </div>
</section>

{{-- GALERI TEMPLATE --}}
<section id="galeri" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">GALERI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Galeri Template RPS & Modul Ajar</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih template yang sesuai dengan jenjang dan mata pelajaran Anda</p>
    </div>
    @php $templates = [
        ['ikon'=>'fas fa-file-word','warna'=>'blue','judul'=>'RPS Kurikulum Merdeka SD','format'=>'DOCX','ukuran'=>'245 KB','jenjang'=>'SD/MI','desc'=>'Template RPS lengkap untuk guru SD, mencakup ATP, asesmen diagnostik, dan projek P5.'],
        ['ikon'=>'fas fa-file-word','warna'=>'green','judul'=>'RPS Kurikulum Merdeka SMP','format'=>'DOCX','ukuran'=>'312 KB','jenjang'=>'SMP/MTs','desc'=>'RPS SMP dengan integrasi teknologi, diferensiasi pembelajaran, dan asesmen formatif.'],
        ['ikon'=>'fas fa-file-word','warna'=>'amber','judul'=>'RPS Kurikulum Merdeka SMA','format'=>'DOCX','ukuran'=>'380 KB','jenjang'=>'SMA/MA','desc'=>'Template RPS peminatan MIPA, IPS, Bahasa dengan CP Fase E-F dan projek capstone.'],
        ['ikon'=>'fas fa-file-word','warna'=>'purple','judul'=>'RPS Perguruan Tinggi (OBE)','format'=>'DOCX','ukuran'=>'425 KB','jenjang'=>'PT','desc'=>'RPS berbasis OBE untuk dosen, dengan CPMK, sub-CPMK, dan rubrik asesmen.'],
        ['ikon'=>'fas fa-file-pdf','warna'=>'red','judul'=>'Modul Ajar IPA Kelas 7','format'=>'PDF','ukuran'=>'1.8 MB','jenjang'=>'SMP/MTs','desc'=>'Modul ajar lengkap IPA Fase D, dilengkapi lembar kerja peserta didik dan rubrik.'],
        ['ikon'=>'fas fa-file-pdf','warna'=>'cyan','judul'=>'Modul Ajar Informatika','format'=>'PDF','ukuran'=>'2.1 MB','jenjang'=>'SMA/MA','desc'=>'Modul informatika dengan praktikum coding, computational thinking, dan proyek akhir.'],
    ]; @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($templates as $t)
        <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-{{ $t['warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-xl"></i></div>
                <span class="bg-{{ $t['warna'] }}-500/10 text-{{ $t['warna'] }}-400 text-xs px-2 py-1 rounded-full">{{ $t['jenjang'] }}</span>
            </div>
            <h3 class="text-white font-bold mb-2">{{ $t['judul'] }}</h3>
            <p class="text-gray-400 text-sm mb-4">{{ $t['desc'] }}</p>
            <div class="flex items-center justify-between pt-3 border-t border-kvt-800/50">
                <div class="flex items-center gap-3 text-xs text-gray-500">
                    <span><i class="fas fa-file mr-1"></i>{{ $t['format'] }}</span>
                    <span><i class="fas fa-weight-hanging mr-1"></i>{{ $t['ukuran'] }}</span>
                </div>
                <button class="text-{{ $t['warna'] }}-400 text-xs font-semibold hover:underline"><i class="fas fa-download mr-1"></i>Unduh</button>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- PANDUAN STEP-BY-STEP --}}
<section class="bg-gradient-to-br from-teal-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">PANDUAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Cara Membuat RPS dalam 6 Langkah</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Ikuti panduan step-by-step berikut untuk menyusun RPS yang sesuai standar</p>
        </div>
        @php $langkah = [
            ['no'=>'1','ikon'=>'fas fa-crosshairs','warna'=>'teal','judul'=>'Tentukan Capaian Pembelajaran','desc'=>'Identifikasi CP dari Permendikbudristek atau standar kurikulum yang berlaku untuk mata pelajaran Anda.'],
            ['no'=>'2','ikon'=>'fas fa-sitemap','warna'=>'green','judul'=>'Susun Alur Tujuan Pembelajaran','desc'=>'Breakdown CP menjadi tujuan pembelajaran spesifik yang terukur menggunakan kata kerja operasional Bloom.'],
            ['no'=>'3','ikon'=>'fas fa-calendar-alt','warna'=>'blue','judul'=>'Rancang Timeline Pertemuan','desc'=>'Distribusikan materi ke dalam pertemuan mingguan, sesuaikan dengan kalender akademik semester.'],
            ['no'=>'4','ikon'=>'fas fa-chalkboard','warna'=>'indigo','judul'=>'Pilih Metode & Media','desc'=>'Tentukan model pembelajaran (PBL, inquiry, collaborative) dan media yang relevan untuk setiap pertemuan.'],
            ['no'=>'5','ikon'=>'fas fa-tasks','warna'=>'purple','judul'=>'Rancang Asesmen','desc'=>'Buat rubrik asesmen formatif dan sumatif yang aligned dengan tujuan pembelajaran di setiap tahap.'],
            ['no'=>'6','ikon'=>'fas fa-check-double','warna'=>'amber','judul'=>'Review & Validasi','desc'=>'Lakukan peer review dengan rekan sejawat dan validasi dengan koordinator kurikulum sebelum publish.'],
        ]; @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($langkah as $l)
            <div class="kaca rounded-2xl p-6 border-{{ $l['warna'] }}-500/20 relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="absolute -top-3 -left-3 w-10 h-10 bg-gradient-to-br from-{{ $l['warna'] }}-500 to-{{ $l['warna'] }}-600 rounded-full flex items-center justify-center text-white font-black text-sm shadow-lg">{{ $l['no'] }}</div>
                <div class="pt-2">
                    <div class="w-10 h-10 bg-{{ $l['warna'] }}-500/20 rounded-lg flex items-center justify-center mb-3"><i class="{{ $l['ikon'] }} text-{{ $l['warna'] }}-400"></i></div>
                    <h3 class="text-white font-bold mb-2">{{ $l['judul'] }}</h3>
                    <p class="text-gray-400 text-sm">{{ $l['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur Template Sesuai Peran Anda</h2>
    </div>
    @php $roles = [
        ['ikon'=>'fas fa-chalkboard-teacher','warna'=>'teal','gradien'=>'from-teal-500 to-green-500','peran'=>'Guru / Dosen','fitur'=>['Download template RPS siap edit','Generate RPS otomatis dari CP','Upload modul ajar custom','Kolaborasi penyusunan dengan tim','Version control dokumen','Export Multi-format (PDF/DOCX/HTML)']],
        ['ikon'=>'fas fa-user','warna'=>'blue','gradien'=>'from-blue-500 to-cyan-500','peran'=>'Siswa / Mahasiswa','fitur'=>['Lihat RPS mata kuliah yang diambil','Download modul ajar pendukung','Tracking progress per pertemuan','Akses rubrik asesmen','Referensi daftar pustaka','Notifikasi update RPS terbaru']],
        ['ikon'=>'fas fa-user-shield','warna'=>'red','gradien'=>'from-red-500 to-rose-500','peran'=>'Admin / Prodi','fitur'=>['Approve & publish template resmi','Monitoring kelengkapan RPS dosen','Audit kesesuaian format standar','Dashboard statistik penggunaan','Bulk import/export template','Integrasi dengan SISTER/PDDIKTI']],
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

{{-- FAQ --}}
<section class="bg-gradient-to-br from-green-900/10 to-kvt-900/30 py-20">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FAQ</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum tentang RPS</h2>
        </div>
        @php $faq = [
            ['q'=>'Apa perbedaan RPS dengan RPP?','a'=>'RPS (Rencana Pembelajaran Semester) digunakan di perguruan tinggi, sedangkan RPP (Rencana Pelaksanaan Pembelajaran) digunakan di sekolah dasar dan menengah. Di Kurikulum Merdeka, RPP diganti dengan Modul Ajar yang lebih fleksibel.'],
            ['q'=>'Apakah template ini sesuai Kurikulum Merdeka?','a'=>'Ya, semua template sudah disesuaikan dengan format terbaru Kurikulum Merdeka (Kemendikbudristek 2026) termasuk integrasi Capaian Pembelajaran, Projek P5, dan asesmen diagnostik.'],
            ['q'=>'Bisakah saya mengedit template yang sudah didownload?','a'=>'Tentu! Template DOCX bisa langsung diedit di Microsoft Word atau Google Docs. Kami juga menyediakan panduan pengisian di setiap bagian template.'],
            ['q'=>'Apakah tersedia template untuk semua mata pelajaran?','a'=>'Saat ini kami menyediakan template umum yang bisa diadaptasi ke semua mata pelajaran, plus template khusus untuk MIPA, IPS, Bahasa, dan Informatika.'],
            ['q'=>'Bagaimana cara menggunakan template RPS berbasis OBE?','a'=>'Template OBE kami sudah dilengkapi kolom CPMK (Capaian Pembelajaran Mata Kuliah), Sub-CPMK, metode asesmen, dan rubrik. Ikuti panduan 6 langkah di atas untuk pengisian.'],
        ]; @endphp
        <div class="space-y-4">
            @foreach($faq as $f)
            <div class="kaca rounded-xl p-6 border-amber-500/10 hover:border-amber-500/30 transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <h4 class="text-white font-bold flex items-start gap-3"><i class="fas fa-question-circle text-amber-400 mt-1"></i>{{ $f['q'] }}</h4>
                <p class="text-gray-400 text-sm mt-3 ml-7">{{ $f['a'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-teal-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Download Template RPS Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Akses 25+ template RPS dan 40+ modul ajar siap pakai. Gratis untuk semua guru dan dosen terdaftar.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-teal-500 to-green-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-teal-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-file-download"></i> Download Gratis Sekarang
        </a>
    </div>
</section>

@endsection
