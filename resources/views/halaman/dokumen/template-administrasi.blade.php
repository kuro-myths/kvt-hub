@extends('tata-letak.utama')
@section('judul', 'Template Administrasi - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-amber-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F59E0B 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-amber-800/30 border border-amber-600/30 rounded-full px-4 py-1.5 text-xs text-amber-300 mb-6" data-aos="fade-down">
            <i class="fas fa-file-alt"></i> Download Template Siap Pakai
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Template</span><br>
            <span class="teks-gradien-emas">Administrasi Lengkap</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Koleksi 100+ template administrasi pendidikan siap pakai — dari akademik, keuangan, SDM, hingga IT. Format DOCX, XLSX, PDF yang dapat diedit dan disesuaikan.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-amber-500/30 hover:-translate-y-0.5">
                <i class="fas fa-download mr-2"></i>Download Semua
            </a>
            <a href="#kategori" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-th-large mr-2"></i>Lihat Kategori
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">100+</div><div class="text-xs text-gray-500">Template</div></div>
            <div><div class="text-2xl font-black text-white">4</div><div class="text-xs text-gray-500">Kategori</div></div>
            <div><div class="text-2xl font-black text-white">50K+</div><div class="text-xs text-gray-500">Download</div></div>
            <div><div class="text-2xl font-black text-white">Free</div><div class="text-xs text-gray-500">& Premium</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI TEMPLATE --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Template Administrasi</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih kategori sesuai kebutuhan administrasi institusi Anda</p>
    </div>
    @php
    $kategori = [
        ['ikon' => 'fas fa-graduation-cap', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Akademik', 'desc' => 'Template terkait kegiatan belajar mengajar, kurikulum, dan penilaian.', 'jumlah' => 35, 'items' => ['Rencana Pelaksanaan Pembelajaran (RPP)', 'Silabus & Kalender Akademik', 'Daftar Nilai & Rapor', 'Jadwal Pelajaran & Ujian']],
        ['ikon' => 'fas fa-coins', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Keuangan', 'desc' => 'Template laporan keuangan, anggaran, dan pembukuan institusi.', 'jumlah' => 28, 'items' => ['Rencana Anggaran Biaya (RAB)', 'Laporan Keuangan Bulanan', 'Bukti Pembayaran SPP', 'Rekapitulasi Dana BOS']],
        ['ikon' => 'fas fa-users-cog', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'SDM & Kepegawaian', 'desc' => 'Template manajemen tenaga pendidik dan kependidikan.', 'jumlah' => 22, 'items' => ['Kontrak Kerja Guru & Staff', 'Penilaian Kinerja (SKP)', 'Surat Keputusan (SK)', 'Data Pokok Pegawai']],
        ['ikon' => 'fas fa-server', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'judul' => 'IT & Infrastruktur', 'desc' => 'Template pengelolaan sistem informasi dan infrastruktur teknologi.', 'jumlah' => 18, 'items' => ['SOP Keamanan Sistem', 'Inventaris Perangkat IT', 'Backup & Recovery Plan', 'Laporan Insiden & Maintenance']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($kategori as $k)
        <div class="kaca rounded-2xl p-8 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="flex items-start gap-5">
                <div class="w-16 h-16 bg-gradient-to-br {{ $k['gradien'] }} rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition">
                    <i class="{{ $k['ikon'] }} text-white text-2xl"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-white font-bold text-xl">{{ $k['judul'] }}</h3>
                        <span class="text-xs bg-{{ $k['warna'] }}-500/10 text-{{ $k['warna'] }}-400 px-2 py-1 rounded-full">{{ $k['jumlah'] }} template</span>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">{{ $k['desc'] }}</p>
                    <div class="grid grid-cols-1 gap-2">
                        @foreach($k['items'] as $item)
                        <span class="flex items-center gap-2 text-xs text-gray-300"><i class="fas fa-file text-{{ $k['warna'] }}-400 text-[10px]"></i>{{ $item }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- TEMPLATE CARDS DENGAN DOWNLOAD --}}
<section class="bg-gradient-to-br from-amber-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">POPULER</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Template Paling Banyak Diunduh</h2>
        </div>
        @php
        $templates = [
            ['judul' => 'RPP Kurikulum Merdeka', 'kategori' => 'Akademik', 'format' => 'DOCX', 'ukuran' => '245 KB', 'download' => '12.4K', 'warna' => 'blue', 'ikon' => 'fas fa-file-word', 'ikon_warna' => 'blue'],
            ['judul' => 'Rencana Anggaran Biaya', 'kategori' => 'Keuangan', 'format' => 'XLSX', 'ukuran' => '180 KB', 'download' => '9.8K', 'warna' => 'green', 'ikon' => 'fas fa-file-excel', 'ikon_warna' => 'green'],
            ['judul' => 'SK Pengangkatan Guru', 'kategori' => 'SDM', 'format' => 'DOCX', 'ukuran' => '120 KB', 'download' => '8.2K', 'warna' => 'purple', 'ikon' => 'fas fa-file-word', 'ikon_warna' => 'blue'],
            ['judul' => 'Raport Digital K-Merdeka', 'kategori' => 'Akademik', 'format' => 'XLSX', 'ukuran' => '310 KB', 'download' => '7.5K', 'warna' => 'cyan', 'ikon' => 'fas fa-file-excel', 'ikon_warna' => 'green'],
            ['judul' => 'Laporan Keuangan BOS', 'kategori' => 'Keuangan', 'format' => 'XLSX', 'ukuran' => '425 KB', 'download' => '6.9K', 'warna' => 'emerald', 'ikon' => 'fas fa-file-excel', 'ikon_warna' => 'green'],
            ['judul' => 'SOP Keamanan Jaringan', 'kategori' => 'IT', 'format' => 'PDF', 'ukuran' => '560 KB', 'download' => '5.1K', 'warna' => 'red', 'ikon' => 'fas fa-file-pdf', 'ikon_warna' => 'red'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($templates as $i => $t)
            <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-{{ $t['ikon_warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="{{ $t['ikon'] }} text-{{ $t['ikon_warna'] }}-400 text-xl"></i></div>
                    <div>
                        <span class="text-xs bg-{{ $t['warna'] }}-500/10 text-{{ $t['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $t['kategori'] }}</span>
                        @if($i < 3)<span class="text-xs bg-amber-500/10 text-amber-400 px-2 py-0.5 rounded-full ml-1">#{{ $i + 1 }} Top</span>@endif
                    </div>
                </div>
                <h4 class="text-white font-bold mb-3">{{ $t['judul'] }}</h4>
                <div class="flex items-center gap-4 text-xs text-gray-400 mb-4">
                    <span><i class="fas fa-file mr-1"></i>{{ $t['format'] }}</span>
                    <span><i class="fas fa-weight-hanging mr-1"></i>{{ $t['ukuran'] }}</span>
                    <span><i class="fas fa-download mr-1"></i>{{ $t['download'] }}</span>
                </div>
                <button class="w-full bg-gradient-to-r from-{{ $t['warna'] }}-500/20 to-{{ $t['warna'] }}-600/20 hover:from-{{ $t['warna'] }}-500/30 hover:to-{{ $t['warna'] }}-600/30 text-{{ $t['warna'] }}-400 py-2.5 rounded-xl text-sm font-semibold transition border border-{{ $t['warna'] }}-500/20">
                    <i class="fas fa-download mr-2"></i>Download Template
                </button>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PREVIEW SECTION --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">PREVIEW</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Preview Template Sebelum Download</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Lihat tampilan template sebelum mengunduh untuk memastikan kesesuaian dengan kebutuhan Anda</p>
    </div>
    @php
    $previews = [
        ['judul' => 'RPP Kurikulum Merdeka', 'desc' => 'Rencana Pelaksanaan Pembelajaran sesuai format terbaru Kemendikbudristek 2026. Mencakup profil pelajar Pancasila, asesmen formatif & sumatif.', 'thumb' => 'https://placehold.co/600x400/1a1a2e/F59E0B?text=RPP+Preview', 'warna' => 'amber'],
        ['judul' => 'Laporan Keuangan BOS', 'desc' => 'Template laporan penggunaan Dana BOS lengkap dengan auto-calculation formula, pivot table, dan chart. Sesuai Permendikbud terbaru.', 'thumb' => 'https://placehold.co/600x400/1a1a2e/22C55E?text=Laporan+BOS', 'warna' => 'green'],
        ['judul' => 'SK Pengangkatan', 'desc' => 'Surat Keputusan Pengangkatan Guru/Staff dengan format resmi, kop surat otomatis, dan nomor surat auto-increment.', 'thumb' => 'https://placehold.co/600x400/1a1a2e/A855F7?text=SK+Template', 'warna' => 'purple'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($previews as $p)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $p['warna'] }}-500/20 hover:border-{{ $p['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="relative overflow-hidden">
                <img src="{{ $p['thumb'] }}" alt="{{ $p['judul'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur rounded-full flex items-center justify-center"><i class="fas fa-eye text-white text-xl"></i></div>
                </div>
            </div>
            <div class="p-5">
                <h4 class="text-white font-bold mb-2">{{ $p['judul'] }}</h4>
                <p class="text-gray-400 text-sm">{{ $p['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- RANKING DOWNLOAD --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-amber-900/10 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">RANKING</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Top 10 Template Terpopuler</h2>
        </div>
        @php
        $ranking = [
            ['rank' => 1, 'judul' => 'RPP Kurikulum Merdeka (SD)', 'download' => '12.4K', 'kategori' => 'Akademik', 'warna' => 'amber'],
            ['rank' => 2, 'judul' => 'RAB Kegiatan Sekolah', 'download' => '9.8K', 'kategori' => 'Keuangan', 'warna' => 'gray'],
            ['rank' => 3, 'judul' => 'SK Pengangkatan Guru Tetap', 'download' => '8.2K', 'kategori' => 'SDM', 'warna' => 'orange'],
            ['rank' => 4, 'judul' => 'Raport Digital SD/SMP', 'download' => '7.5K', 'kategori' => 'Akademik', 'warna' => 'kvt'],
            ['rank' => 5, 'judul' => 'Laporan Dana BOS 2026', 'download' => '6.9K', 'kategori' => 'Keuangan', 'warna' => 'kvt'],
            ['rank' => 6, 'judul' => 'SOP Keamanan Lab Komputer', 'download' => '5.1K', 'kategori' => 'IT', 'warna' => 'kvt'],
            ['rank' => 7, 'judul' => 'Jadwal Pelajaran Otomatis', 'download' => '4.7K', 'kategori' => 'Akademik', 'warna' => 'kvt'],
            ['rank' => 8, 'judul' => 'Kontrak Kerja Staff', 'download' => '4.2K', 'kategori' => 'SDM', 'warna' => 'kvt'],
        ];
        @endphp
        <div class="kaca rounded-2xl overflow-hidden border-amber-500/20" data-aos="fade-up">
            <div class="divide-y divide-kvt-800/50">
                @foreach($ranking as $r)
                <div class="flex items-center justify-between px-6 py-4 hover:bg-kvt-800/30 transition">
                    <div class="flex items-center gap-4">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full font-black text-sm {{ $r['rank'] <= 3 ? 'bg-' . $r['warna'] . '-500/20 text-' . $r['warna'] . '-400' : 'bg-kvt-700/30 text-gray-400' }}">{{ $r['rank'] }}</span>
                        <div>
                            <h4 class="text-white font-semibold text-sm">{{ $r['judul'] }}</h4>
                            <span class="text-xs text-gray-500">{{ $r['kategori'] }}</span>
                        </div>
                    </div>
                    <span class="text-sm text-gray-400"><i class="fas fa-download text-xs mr-1"></i>{{ $r['download'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Template Berdasarkan Peran</h2>
    </div>
    @php
    $roles = [
        ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Download template tugas & laporan', 'Akses formulir pendaftaran', 'Template proposal kegiatan OSIS', 'Template CV & portfolio siswa', 'Formulir beasiswa', 'Template presentasi ilmiah']],
        ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Download RPP & Silabus template', 'Template penilaian & rapor', 'Formulir kehadiran siswa', 'Template sertifikat kelulusan', 'Buat template kustom sendiri', 'Bagikan template ke sesama guru']],
        ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Akses seluruh 100+ template', 'Upload & kelola template baru', 'Statistik download real-time', 'Template keuangan & SDM premium', 'Kustomisasi branding institusi', 'Batch export & print template']],
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
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-amber-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Download 100+ Template Gratis</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar sekarang untuk mengakses seluruh koleksi template administrasi pendidikan. Gratis untuk pengguna terdaftar.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-amber-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-download"></i> Daftar & Download Gratis
        </a>
    </div>
</section>

@endsection
