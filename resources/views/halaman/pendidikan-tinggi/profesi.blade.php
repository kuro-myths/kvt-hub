@extends('tata-letak.utama')
@section('judul', 'Program Profesi - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-amber-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(245,158,11,0.4) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-amber-800/30 border border-amber-600/30 rounded-full px-4 py-1.5 text-xs text-amber-300 mb-6" data-aos="fade-down">
            <i class="fas fa-user-md"></i> Pendidikan Profesi Terakreditasi
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Program </span><span class="teks-gradien-emas">Profesi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Pendidikan profesi untuk dokter, apoteker, akuntan, insinyur, notaris, dan profesi lainnya. Lisensi resmi dan terakreditasi.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-amber-500/20">
                <i class="fas fa-rocket mr-2"></i>Daftar Program
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- Jenis Program Profesi --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Program Profesi Tersedia</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">9 program profesi terakreditasi dengan lisensi dan sertifikasi resmi</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-right" data-aos-delay="200">
        @php
        $profesi = [
            ['Profesi Dokter', 'Pendidikan profesi dokter umum dan spesialis (Sp.1, Sp.2). Koass dan residensi.', 'fa-user-md', 'from-red-500 to-pink-500', '2-5 Tahun'],
            ['Profesi Apoteker', 'Farmasi klinis, industri farmasi, dan regulasi obat. Sertifikasi STRA.', 'fa-prescription-bottle-alt', 'from-green-500 to-emerald-500', '1 Tahun'],
            ['Profesi Insinyur', 'Insinyur profesional (IPM) di berbagai bidang teknik dan rekayasa.', 'fa-hard-hat', 'from-yellow-500 to-amber-500', '1-2 Tahun'],
            ['Profesi Akuntan', 'Akuntan publik (CPA), akuntan manajemen, dan auditor bersertifikasi.', 'fa-calculator', 'from-blue-500 to-indigo-500', '1 Tahun'],
            ['Profesi Advokat', 'Pendidikan khusus profesi advokat (PKPA) dan ujian profesi advokat.', 'fa-gavel', 'from-purple-500 to-violet-500', '6-12 Bulan'],
            ['Profesi Guru', 'Pendidikan profesi guru (PPG) prajabatan dan dalam jabatan.', 'fa-chalkboard-teacher', 'from-orange-500 to-red-500', '1 Tahun'],
            ['Profesi Notaris', 'Program pendidikan magister kenotariatan dan PPAT.', 'fa-stamp', 'from-teal-500 to-cyan-500', '2 Tahun'],
            ['Profesi Psikolog', 'Psikolog klinis, industri, dan pendidikan. Sertifikasi HIMPSI.', 'fa-brain', 'from-pink-500 to-rose-500', '2 Tahun'],
            ['Profesi Arsitek', 'Perancang bangunan profesional teregistrasi IAI.', 'fa-drafting-compass', 'from-indigo-500 to-blue-500', '1-2 Tahun'],
        ];
        @endphp
        @foreach($profesi as $p)
        <div class="kaca rounded-2xl p-6 hover:border-amber-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br {{ $p[3] }} rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $p[2] }} text-white text-lg"></i>
                </div>
                <span class="text-[10px] bg-amber-500/10 text-amber-400 px-2 py-0.5 rounded-full border border-amber-500/20">{{ $p[4] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $p[0] }}</h3>
            <p class="text-gray-400 text-sm">{{ $p[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Uji Kompetensi & Lisensi --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Uji Kompetensi & Lisensi Profesi</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Tahapan untuk mendapatkan lisensi praktik profesional resmi</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="zoom-in" data-aos-delay="200">
            @php
            $tahapan = [
                ['Pendidikan Akademik', 'Menyelesaikan program S1/S2 sesuai bidang profesi yang dituju.', 'fa-graduation-cap', 'text-blue-400'],
                ['Program Profesi', 'Mengikuti pendidikan profesi terakreditasi dengan praktik lapangan.', 'fa-user-tie', 'text-green-400'],
                ['Uji Kompetensi', 'Lulus ujian kompetensi nasional yang diselenggarakan oleh organisasi profesi.', 'fa-clipboard-check', 'text-orange-400'],
                ['Surat Tanda Registrasi', 'Memperoleh STR/lisensi praktik resmi dari kementerian terkait.', 'fa-id-card', 'text-amber-400'],
            ];
            @endphp
            @foreach($tahapan as $t)
            <div class="kaca rounded-2xl p-5 text-center hover:border-amber-500/20 transition">
                <i class="fas {{ $t[2] }} {{ $t[3] }} text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">{{ $t[0] }}</h3>
                <p class="text-gray-400 text-xs">{{ $t[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Internship & Praktik Lapangan --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Internship & Praktik Lapangan</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Pengalaman praktik di institusi dan lembaga profesional terkemuka</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
        @php
        $praktik = [
            ['Rumah Sakit & Klinik', 'Koass dan residensi di RS pendidikan tipe A dan B untuk profesi dokter dan apoteker.', 'fa-hospital', 'from-red-500 to-pink-500'],
            ['Kantor Hukum & Pengadilan', 'Magang di law firm dan pengadilan untuk profesi advokat dan notaris.', 'fa-landmark', 'from-purple-500 to-violet-500'],
            ['Kantor Akuntan Publik', 'Praktik di KAP Big Four dan nasional untuk profesi akuntan dan auditor.', 'fa-file-invoice-dollar', 'from-blue-500 to-indigo-500'],
            ['Proyek Konstruksi', 'Site practice di proyek infrastruktur untuk profesi insinyur dan arsitek.', 'fa-hard-hat', 'from-yellow-500 to-amber-500'],
            ['Sekolah & Lembaga Pendidikan', 'Praktik mengajar di sekolah mitra untuk profesi guru PPG.', 'fa-school', 'from-green-500 to-emerald-500'],
            ['Klinik Psikologi', 'Praktik konseling dan asesmen di lembaga psikologi profesional.', 'fa-brain', 'from-pink-500 to-rose-500'],
        ];
        @endphp
        @foreach($praktik as $pr)
        <div class="kaca rounded-2xl p-5 hover:border-amber-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-11 h-11 bg-gradient-to-br {{ $pr[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $pr[2] }} text-white"></i>
            </div>
            <h3 class="text-white font-bold text-sm mb-1">{{ $pr[0] }}</h3>
            <p class="text-gray-400 text-xs">{{ $pr[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-amber-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien-emas">9</div><p class="text-gray-400 text-sm mt-1">Program Profesi</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">2,000+</div><p class="text-gray-400 text-sm mt-1">Lulusan Profesi</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">98%</div><p class="text-gray-400 text-sm mt-1">Lulus Uji Kompetensi</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">100%</div><p class="text-gray-400 text-sm mt-1">Terakreditasi</p></div>
    </div>
</section>

{{-- Video --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Perjalanan Menjadi Profesional</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Testimoni lulusan dan pengalaman pendidikan profesi di KVT Hub</p>
    </div>
    <div class="kaca rounded-2xl overflow-hidden aspect-video" data-aos="zoom-in" data-aos-delay="200">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Program Profesi KVT Hub" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>

{{-- Peran Pengguna (Siswa / Guru / Admin) --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Fitur untuk Setiap Peran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
            @php
            $peran = [
                ['Peserta Profesi', 'fa-user-graduate', 'from-amber-500 to-yellow-500', [
                    'Logbook praktik lapangan digital',
                    'Simulasi ujian kompetensi online',
                    'Tracking jam praktik & rotasi',
                    'Portofolio kasus profesional',
                ]],
                ['Dosen / Pembimbing Klinik', 'fa-chalkboard-teacher', 'from-green-500 to-emerald-500', [
                    'Penilaian kompetensi praktik',
                    'Supervisi lapangan terintegrasi',
                    'Manajemen rotasi peserta didik',
                    'Feedback dan evaluasi real-time',
                ]],
                ['Admin Program Profesi', 'fa-user-shield', 'from-purple-500 to-violet-500', [
                    'Dashboard akreditasi program',
                    'Manajemen mitra praktik lapangan',
                    'Laporan kelulusan uji kompetensi',
                    'Koordinasi STR dan sertifikasi',
                ]],
            ];
            @endphp
            @foreach($peran as $p)
            <div class="kaca rounded-2xl p-6 hover:border-amber-500/30 transition">
                <div class="w-12 h-12 bg-gradient-to-br {{ $p[2] }} rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $p[1] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-4">{{ $p[0] }}</h3>
                <ul class="space-y-2">
                    @foreach($p[3] as $fitur)
                    <li class="flex items-start gap-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-amber-400 mt-0.5 shrink-0"></i>{{ $fitur }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Pertanyaan Umum (FAQ)</h2>
    <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
        @php
        $faq = [
            ['Apa itu program pendidikan profesi?', 'Program profesi adalah pendidikan lanjutan setelah S1/S2 yang fokus pada keterampilan praktik dan kompetensi profesional. Lulusan mendapatkan gelar profesi (dr., Apt., Ak., Ir., dll.) dan lisensi untuk praktik.'],
            ['Apa perbedaan program profesi dan program akademik?', 'Program akademik (S1, S2, S3) fokus pada pengembangan ilmu pengetahuan dan riset, sedangkan program profesi fokus pada kompetensi praktik dan lisensi untuk menjalankan profesi tertentu secara legal.'],
            ['Bagaimana cara mengikuti uji kompetensi?', 'Setelah menyelesaikan program profesi, peserta mengikuti uji kompetensi nasional yang diselenggarakan oleh organisasi profesi terkait (IDI untuk dokter, IAI untuk apoteker, IAPI untuk akuntan, dll.).'],
            ['Apakah lulusan profesi wajib memiliki STR?', 'Ya, untuk praktik secara legal, lulusan program profesi wajib memiliki Surat Tanda Registrasi (STR) yang diterbitkan oleh kementerian terkait. STR berlaku selama 5 tahun dan harus diperpanjang.'],
            ['Berapa biaya pendidikan profesi?', 'Biaya bervariasi per program. Program profesi dokter spesialis bisa lebih mahal karena durasi lebih lama. KVT Hub menyediakan informasi beasiswa dan program cicilan.'],
        ];
        @endphp
        @foreach($faq as $f)
        <details class="kaca rounded-xl group">
            <summary class="flex items-center justify-between cursor-pointer p-5 text-white font-semibold hover:text-amber-400 transition">
                <span>{{ $f[0] }}</span>
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm leading-relaxed">{{ $f[1] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-amber-900/20 to-kvt-900/40 py-16">
    <div class="max-w-3xl mx-auto px-4 text-center" data-aos="zoom-in">
        <div class="kaca rounded-2xl p-10">
            <i class="fas fa-user-md text-amber-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Raih Lisensi Profesionalmu</h2>
            <p class="text-gray-400 mb-8">Bergabung dengan program profesi terakreditasi. Dapatkan kompetensi, lisensi, dan mulai karir profesional yang bermakna!</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-amber-500/20">
                    <i class="fas fa-rocket mr-2"></i>Daftar Program
                </a>
                <a href="{{ route('masuk') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
