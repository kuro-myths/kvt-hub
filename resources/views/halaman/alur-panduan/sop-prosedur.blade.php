@extends('tata-letak.utama')
@section('judul', 'SOP & Prosedur Standar - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-emerald-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-green-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #10B981 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-emerald-800/30 border border-emerald-600/30 rounded-full px-4 py-1.5 text-xs text-emerald-300 mb-6" data-aos="fade-down">
            <i class="fas fa-clipboard-list"></i> Standard Operating Procedures
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">SOP &</span><br>
            <span class="teks-gradien-emas">Prosedur Standar</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Kumpulan Standard Operating Procedures resmi KVT Hub — meliputi prosedur akademik,
            administrasi, IT, dan keamanan. Panduan wajib untuk memastikan kualitas dan konsistensi operasional.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#kategori-sop" class="bg-gradient-to-r from-emerald-500 to-green-500 hover:from-emerald-400 hover:to-green-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5">
                <i class="fas fa-folder-open mr-2"></i>Lihat Kategori SOP
            </a>
            <a href="#checklist" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-tasks mr-2"></i>Compliance Checklist
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">4</div><div class="text-xs text-gray-500">Kategori SOP</div></div>
            <div><div class="text-2xl font-black text-white">16+</div><div class="text-xs text-gray-500">Dokumen SOP</div></div>
            <div><div class="text-2xl font-black text-white">100%</div><div class="text-xs text-gray-500">Compliance Rate</div></div>
            <div><div class="text-2xl font-black text-white">24/7</div><div class="text-xs text-gray-500">Audit Trail</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI SOP --}}
<section id="kategori-sop" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori SOP Platform</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Empat pilar prosedur standar yang menjamin operasional KVT Hub berjalan optimal</p>
    </div>
    @php
    $kategori = [
        ['ikon' => 'fas fa-graduation-cap', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'SOP Akademik', 'desc' => 'Prosedur terkait kegiatan belajar-mengajar, kurikulum, dan asesmen.', 'items' => ['Pembuatan & publikasi kelas baru', 'Upload dan review materi pembelajaran', 'Pelaksanaan kuis dan ujian online', 'Penilaian, grading, dan rapor digital']],
        ['ikon' => 'fas fa-building', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-orange-500', 'judul' => 'SOP Administrasi', 'desc' => 'Prosedur manajemen pengguna, data, dan operasional harian.', 'items' => ['Registrasi dan verifikasi akun pengguna', 'Manajemen peran dan hak akses', 'Pengelolaan berita dan pengumuman', 'Pengelolaan kerja sama dan sponsor']],
        ['ikon' => 'fas fa-server', 'warna' => 'violet', 'gradien' => 'from-violet-500 to-purple-500', 'judul' => 'SOP IT & Teknis', 'desc' => 'Prosedur maintenance, deployment, dan pengelolaan infrastruktur.', 'items' => ['Backup database harian & mingguan', 'Deployment & update versi platform', 'Monitoring server dan performance', 'Pengelolaan storage dan file upload']],
        ['ikon' => 'fas fa-shield-alt', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'judul' => 'SOP Keamanan', 'desc' => 'Prosedur keamanan data, akses, dan respons insiden.', 'items' => ['Kebijakan password dan autentikasi', 'Penanganan insiden keamanan (incident response)', 'Audit akses dan log monitoring', 'Perlindungan data pribadi pengguna']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($kategori as $k)
        <div class="kaca rounded-2xl p-8 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="flex items-start gap-5">
                <div class="w-14 h-14 bg-gradient-to-br {{ $k['gradien'] }} rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition">
                    <i class="{{ $k['ikon'] }} text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-xl mb-2">{{ $k['judul'] }}</h3>
                    <p class="text-gray-400 text-sm mb-4">{{ $k['desc'] }}</p>
                    <div class="space-y-2">
                        @foreach($k['items'] as $item)
                        <span class="flex items-center gap-2 text-xs text-gray-300"><i class="fas fa-file-alt text-{{ $k['warna'] }}-400 text-[10px]"></i>{{ $item }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- SOP DETAIL CARDS --}}
<section class="bg-gradient-to-br from-emerald-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">PROSEDUR DETAIL</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">SOP dengan Langkah Terperinci</h2>
        </div>
        @php
        $sopDetail = [
            ['ikon' => 'fas fa-plus-circle', 'warna' => 'blue', 'judul' => 'SOP Pembuatan Kelas Baru', 'kode' => 'SOP-AKD-001', 'langkah' => ['Guru login ke dashboard dan klik "Buat Kelas"', 'Isi formulir: nama kelas, deskripsi, jenjang, kapasitas', 'Upload gambar cover kelas (maks 2MB, JPG/PNG)', 'Review informasi dan klik "Publikasikan"', 'Sistem generate kode kelas unik otomatis', 'Kelas aktif dan tersedia di katalog untuk siswa']],
            ['ikon' => 'fas fa-user-check', 'warna' => 'green', 'judul' => 'SOP Verifikasi Akun Pengguna', 'kode' => 'SOP-ADM-001', 'langkah' => ['Pengguna submit form registrasi', 'Sistem kirim email verifikasi otomatis', 'Pengguna klik link verifikasi dalam 24 jam', 'Jika expired, pengguna request ulang link', 'Akun terverifikasi dan bisa login', 'Admin dapat review dan mengubah peran jika perlu']],
            ['ikon' => 'fas fa-database', 'warna' => 'violet', 'judul' => 'SOP Backup Database', 'kode' => 'SOP-IT-001', 'langkah' => ['Scheduler otomatis trigger backup jam 02:00 WIB', 'Dump database MySQL ke file .sql terenkripsi', 'Upload backup ke cloud storage (S3/GCS)', 'Verifikasi integritas file backup (checksum)', 'Hapus backup lokal lebih dari 7 hari', 'Log hasil backup ke audit trail sistem']],
            ['ikon' => 'fas fa-exclamation-triangle', 'warna' => 'red', 'judul' => 'SOP Penanganan Insiden Keamanan', 'kode' => 'SOP-SEC-001', 'langkah' => ['Deteksi anomali oleh monitoring system', 'Tim IT klasifikasi severity: Low/Medium/High/Critical', 'Isolasi sistem terdampak jika severity High+', 'Investigasi root cause dan dampak', 'Implementasi fix dan patch keamanan', 'Post-mortem report dan update SOP terkait']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($sopDetail as $s)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $s['warna'] }}-500/20" data-aos="fade-up">
                <div class="flex items-center justify-between p-5 border-b border-kvt-700/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-{{ $s['warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="{{ $s['ikon'] }} text-{{ $s['warna'] }}-400"></i></div>
                        <h3 class="text-white font-bold text-sm">{{ $s['judul'] }}</h3>
                    </div>
                    <span class="text-xs bg-{{ $s['warna'] }}-500/10 text-{{ $s['warna'] }}-400 px-2 py-1 rounded-lg font-mono">{{ $s['kode'] }}</span>
                </div>
                <div class="p-5">
                    <ol class="space-y-2.5">
                        @foreach($s['langkah'] as $i => $l)
                        <li class="flex items-start gap-3 text-sm">
                            <span class="w-6 h-6 bg-{{ $s['warna'] }}-500/20 rounded-full flex items-center justify-center flex-shrink-0 text-{{ $s['warna'] }}-400 text-xs font-bold">{{ $i + 1 }}</span>
                            <span class="text-gray-300">{{ $l }}</span>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- COMPLIANCE CHECKLIST & AUDIT --}}
<section id="checklist" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">COMPLIANCE</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Compliance Checklist & Audit Trail</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="kaca rounded-2xl p-6 border-emerald-500/20" data-aos="fade-up">
            <h3 class="text-white font-bold text-lg mb-5"><i class="fas fa-check-double text-emerald-400 mr-2"></i>Checklist Kepatuhan</h3>
            @php
            $checklist = [
                'Semua pengguna terverifikasi email',
                'Password minimum 8 karakter dengan kombinasi huruf & angka',
                'Backup database dilakukan harian',
                'Audit log aktif untuk setiap CRUD operation',
                'CSRF protection aktif di semua form',
                'File upload dibatasi tipe dan ukuran',
                'Session timeout setelah 2 jam inaktif',
                'Data personal terenkripsi di database',
            ];
            @endphp
            <div class="space-y-3">
                @foreach($checklist as $c)
                <div class="flex items-center gap-3">
                    <div class="w-5 h-5 bg-emerald-500/20 rounded flex items-center justify-center flex-shrink-0"><i class="fas fa-check text-emerald-400 text-[10px]"></i></div>
                    <span class="text-gray-300 text-sm">{{ $c }}</span>
                </div>
                @endforeach
            </div>
        </div>
        <div class="kaca rounded-2xl p-6 border-cyan-500/20" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-white font-bold text-lg mb-5"><i class="fas fa-history text-cyan-400 mr-2"></i>Audit Trail Info</h3>
            @php
            $audit = [
                ['aksi' => 'Login / Logout', 'detail' => 'Timestamp, IP address, user agent, lokasi', 'ikon' => 'fas fa-sign-in-alt', 'warna' => 'blue'],
                ['aksi' => 'CRUD Operations', 'detail' => 'Siapa, kapan, data apa yang diubah (before/after)', 'ikon' => 'fas fa-edit', 'warna' => 'green'],
                ['aksi' => 'Permission Changes', 'detail' => 'Perubahan peran, hak akses, dan konfigurasi', 'ikon' => 'fas fa-user-cog', 'warna' => 'amber'],
                ['aksi' => 'File Operations', 'detail' => 'Upload, download, delete file — ukuran dan tipe', 'ikon' => 'fas fa-file', 'warna' => 'purple'],
                ['aksi' => 'Security Events', 'detail' => 'Gagal login, brute force attempts, anomali', 'ikon' => 'fas fa-shield-alt', 'warna' => 'red'],
            ];
            @endphp
            <div class="space-y-4">
                @foreach($audit as $a)
                <div class="flex items-start gap-3">
                    <div class="w-9 h-9 bg-{{ $a['warna'] }}-500/20 rounded-lg flex items-center justify-center flex-shrink-0"><i class="{{ $a['ikon'] }} text-{{ $a['warna'] }}-400 text-sm"></i></div>
                    <div><h4 class="text-white font-semibold text-sm">{{ $a['aksi'] }}</h4><p class="text-gray-500 text-xs">{{ $a['detail'] }}</p></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ROLE RESPONSIBILITIES MATRIX --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-emerald-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">RACI MATRIX</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Matriks Tanggung Jawab per Peran</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">R = Responsible, A = Accountable, C = Consulted, I = Informed</p>
        </div>
        @php
        $matrix = [
            ['aktivitas' => 'Pembuatan Kelas', 'siswa' => 'I', 'guru' => 'R', 'admin' => 'A'],
            ['aktivitas' => 'Upload Materi', 'siswa' => 'I', 'guru' => 'R', 'admin' => 'C'],
            ['aktivitas' => 'Pelaksanaan Kuis', 'siswa' => 'R', 'guru' => 'A', 'admin' => 'I'],
            ['aktivitas' => 'Input Kehadiran', 'siswa' => 'I', 'guru' => 'R', 'admin' => 'C'],
            ['aktivitas' => 'Manajemen Pengguna', 'siswa' => 'I', 'guru' => 'I', 'admin' => 'R'],
            ['aktivitas' => 'Publikasi Berita', 'siswa' => 'I', 'guru' => 'C', 'admin' => 'R'],
            ['aktivitas' => 'Keamanan Sistem', 'siswa' => 'I', 'guru' => 'I', 'admin' => 'R'],
            ['aktivitas' => 'Backup Database', 'siswa' => '-', 'guru' => 'I', 'admin' => 'R'],
        ];
        @endphp
        <div class="kaca rounded-2xl overflow-hidden border-kvt-700/30" data-aos="fade-up">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-kvt-700/50">
                            <th class="text-left text-gray-400 font-semibold px-6 py-4">Aktivitas</th>
                            <th class="text-center text-blue-400 font-semibold px-4 py-4"><i class="fas fa-user-graduate mr-1"></i>Siswa</th>
                            <th class="text-center text-green-400 font-semibold px-4 py-4"><i class="fas fa-chalkboard-teacher mr-1"></i>Guru</th>
                            <th class="text-center text-red-400 font-semibold px-4 py-4"><i class="fas fa-user-shield mr-1"></i>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matrix as $m)
                        <tr class="border-b border-kvt-800/30 hover:bg-kvt-800/20 transition">
                            <td class="text-gray-300 px-6 py-3">{{ $m['aktivitas'] }}</td>
                            <td class="text-center px-4 py-3"><span class="inline-block w-7 h-7 rounded-lg text-xs font-bold leading-7 {{ $m['siswa'] === 'R' ? 'bg-blue-500/20 text-blue-400' : ($m['siswa'] === 'A' ? 'bg-amber-500/20 text-amber-400' : ($m['siswa'] === 'C' ? 'bg-green-500/20 text-green-400' : ($m['siswa'] === 'I' ? 'bg-gray-500/20 text-gray-400' : 'bg-kvt-800/30 text-kvt-600'))) }}">{{ $m['siswa'] }}</span></td>
                            <td class="text-center px-4 py-3"><span class="inline-block w-7 h-7 rounded-lg text-xs font-bold leading-7 {{ $m['guru'] === 'R' ? 'bg-green-500/20 text-green-400' : ($m['guru'] === 'A' ? 'bg-amber-500/20 text-amber-400' : ($m['guru'] === 'C' ? 'bg-cyan-500/20 text-cyan-400' : 'bg-gray-500/20 text-gray-400')) }}">{{ $m['guru'] }}</span></td>
                            <td class="text-center px-4 py-3"><span class="inline-block w-7 h-7 rounded-lg text-xs font-bold leading-7 {{ $m['admin'] === 'R' ? 'bg-red-500/20 text-red-400' : ($m['admin'] === 'A' ? 'bg-amber-500/20 text-amber-400' : ($m['admin'] === 'C' ? 'bg-cyan-500/20 text-cyan-400' : 'bg-gray-500/20 text-gray-400')) }}">{{ $m['admin'] }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Jalankan Prosedur dengan Benar</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">SOP yang terstruktur memastikan setiap proses berjalan konsisten, aman, dan berkualitas tinggi.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-green-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Akses SOP Lengkap
        </a>
    </div>
</section>

@endsection
