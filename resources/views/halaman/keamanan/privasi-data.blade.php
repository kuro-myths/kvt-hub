@extends('tata-letak.utama')
@section('judul', 'Privasi Data - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-rose-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-rose-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F43F5E 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-rose-800/30 border border-rose-600/30 rounded-full px-4 py-1.5 text-xs text-rose-300 mb-6" data-aos="fade-down">
            <i class="fas fa-user-shield"></i> GDPR Ready · UU PDP Compliant
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Privasi &</span><br>
            <span class="teks-gradien">Perlindungan Data</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Komitmen KVT Hub dalam melindungi data pribadi pengguna sesuai UU PDP Indonesia No. 27/2022
            dan standar GDPR Eropa. Enkripsi end-to-end, zero-knowledge, dan transparansi penuh.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-400 hover:to-pink-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-rose-500/30 hover:-translate-y-0.5">
                <i class="fas fa-shield-alt mr-2"></i>Baca Kebijakan Privasi
            </a>
            <a href="#prinsip" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-lock mr-2"></i>Lihat Prinsip
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">AES-256</div><div class="text-xs text-gray-500">Enkripsi</div></div>
            <div><div class="text-2xl font-black text-white">GDPR</div><div class="text-xs text-gray-500">Ready</div></div>
            <div><div class="text-2xl font-black text-white">72 Jam</div><div class="text-xs text-gray-500">Breach Alert</div></div>
            <div><div class="text-2xl font-black text-white">UU PDP</div><div class="text-xs text-gray-500">Compliant</div></div>
        </div>
    </div>
</section>

{{-- PRINSIP PRIVASI --}}
<section id="prinsip" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">PRINSIP</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Prinsip Perlindungan Data</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Enam prinsip utama yang menjadi fondasi kebijakan privasi KVT Hub</p>
    </div>
    @php
    $kebijakan = [
        ['ikon' => 'fas fa-lock', 'warna' => 'rose', 'judul' => 'Enkripsi End-to-End', 'desc' => 'Seluruh data pengguna dienkripsi menggunakan AES-256 saat transit dan at rest. Tidak ada pihak ketiga yang bisa mengakses.'],
        ['ikon' => 'fas fa-eye-slash', 'warna' => 'blue', 'judul' => 'Zero-Knowledge', 'desc' => 'Kami tidak menyimpan password dalam bentuk plain text. Hashing bcrypt dengan salt unik untuk setiap akun.'],
        ['ikon' => 'fas fa-trash-alt', 'warna' => 'red', 'judul' => 'Right to Delete', 'desc' => 'Pengguna berhak menghapus seluruh data pribadi kapan saja. Proses penghapusan permanen dalam 30 hari.'],
        ['ikon' => 'fas fa-download', 'warna' => 'green', 'judul' => 'Data Portability', 'desc' => 'Unduh seluruh data Anda dalam format JSON/CSV. Portabilitas data sesuai hak pengguna.'],
        ['ikon' => 'fas fa-bell', 'warna' => 'amber', 'judul' => 'Breach Notification', 'desc' => 'Notifikasi dalam 72 jam jika terjadi kebocoran data sesuai regulasi UU PDP Pasal 46.'],
        ['ikon' => 'fas fa-cookie-bite', 'warna' => 'purple', 'judul' => 'Cookie Consent', 'desc' => 'Transparansi penggunaan cookie. Pengguna memiliki kontrol penuh atas preferensi tracking dan analytics.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($kebijakan as $idx => $k)
        <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="w-12 h-12 bg-{{ $k['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="{{ $k['ikon'] }} text-{{ $k['warna'] }}-400 text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $k['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- DATA LIFECYCLE --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">DATA LIFECYCLE</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Siklus Hidup Data</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Bagaimana data Anda dikelola dari pengumpulan hingga penghapusan</p>
        </div>
        @php
        $lifecycle = [
            ['fase' => 'Pengumpulan', 'ikon' => 'fa-plus-circle', 'warna' => 'from-blue-500 to-cyan-500', 'desc' => 'Data dikumpulkan hanya yang diperlukan (data minimization). Consent eksplisit sebelum pengumpulan.'],
            ['fase' => 'Penyimpanan', 'ikon' => 'fa-database', 'warna' => 'from-green-500 to-emerald-500', 'desc' => 'Disimpan terenkripsi AES-256 di data center Indonesia. Akses terbatas berdasarkan role.'],
            ['fase' => 'Pemrosesan', 'ikon' => 'fa-cogs', 'warna' => 'from-purple-500 to-violet-500', 'desc' => 'Diproses hanya untuk tujuan yang telah disetujui. Tidak ada penjualan data ke pihak ketiga.'],
            ['fase' => 'Pembagian', 'ikon' => 'fa-share-alt', 'warna' => 'from-orange-500 to-amber-500', 'desc' => 'Shared hanya dengan persetujuan pengguna. Third-party processor terikat DPA (Data Processing Agreement).'],
            ['fase' => 'Retensi', 'ikon' => 'fa-clock', 'warna' => 'from-pink-500 to-rose-500', 'desc' => 'Disimpan selama diperlukan. Kebijakan retensi jelas untuk setiap jenis data (maks 5 tahun).'],
            ['fase' => 'Penghapusan', 'ikon' => 'fa-trash-alt', 'warna' => 'from-red-500 to-rose-600', 'desc' => 'Penghapusan permanen (secure wipe) setelah periode retensi atau atas permintaan pengguna.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($lifecycle as $idx => $l)
            <div class="kaca rounded-2xl p-4 text-center hover:border-rose-500/20 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 70 }}">
                <div class="w-12 h-12 bg-gradient-to-br {{ $l['warna'] }} rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg">
                    <i class="fas {{ $l['ikon'] }} text-white text-sm"></i>
                </div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $l['fase'] }}</h4>
                <p class="text-gray-400 text-xs leading-relaxed">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-rose-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">AES-256</div><p class="text-gray-400 text-sm mt-1">Enkripsi</p></div>
        <div><div class="text-3xl font-black teks-gradien">UU PDP</div><p class="text-gray-400 text-sm mt-1">Compliant</p></div>
        <div><div class="text-3xl font-black teks-gradien">GDPR</div><p class="text-gray-400 text-sm mt-1">Ready</p></div>
        <div><div class="text-3xl font-black teks-gradien">72 Jam</div><p class="text-gray-400 text-sm mt-1">Breach Alert</p></div>
    </div>
</section>

{{-- HAK SUBJEK DATA --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">HAK PENGGUNA</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Hak Subjek Data</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Hak-hak Anda sebagai pemilik data sesuai UU PDP dan GDPR</p>
    </div>
    @php
    $hakData = [
        ['judul' => 'Hak Akses', 'ikon' => 'fa-eye', 'warna' => 'blue', 'desc' => 'Anda berhak mengakses dan mengetahui data pribadi apa saja yang kami simpan tentang Anda.'],
        ['judul' => 'Hak Koreksi', 'ikon' => 'fa-edit', 'warna' => 'green', 'desc' => 'Anda berhak memperbarui atau memperbaiki data pribadi yang tidak akurat atau tidak lengkap.'],
        ['judul' => 'Hak Hapus', 'ikon' => 'fa-trash-alt', 'warna' => 'red', 'desc' => 'Anda berhak meminta penghapusan data pribadi (right to be forgotten) kapan saja.'],
        ['judul' => 'Hak Portabilitas', 'ikon' => 'fa-file-export', 'warna' => 'purple', 'desc' => 'Anda berhak mengunduh salinan data dalam format terstruktur (JSON/CSV) untuk dipindahkan.'],
        ['judul' => 'Hak Keberatan', 'ikon' => 'fa-ban', 'warna' => 'orange', 'desc' => 'Anda berhak menolak pemrosesan data untuk tujuan pemasaran langsung atau profiling otomatis.'],
        ['judul' => 'Hak Pembatasan', 'ikon' => 'fa-pause-circle', 'warna' => 'cyan', 'desc' => 'Anda berhak meminta pembatasan pemrosesan data dalam kondisi tertentu sesuai regulasi.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($hakData as $idx => $h)
        <div class="kaca rounded-2xl p-5 border-{{ $h['warna'] }}-500/20 hover:border-{{ $h['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-{{ $h['warna'] }}-500/20 rounded-lg flex items-center justify-center">
                    <i class="fas {{ $h['ikon'] }} text-{{ $h['warna'] }}-400"></i>
                </div>
                <h4 class="text-white font-bold">{{ $h['judul'] }}</h4>
            </div>
            <p class="text-gray-400 text-sm">{{ $h['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- VIDEO --}}
<section class="bg-gradient-to-br from-rose-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Privasi Data</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'UU PDP Indonesia: Yang Perlu Diketahui', 'durasi' => '15:30', 'views' => '35K', 'warna' => 'rose', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F43F5E?text=UU+PDP+Guide'],
                ['judul' => 'Cara Mengelola Privasi di KVT Hub', 'durasi' => '08:45', 'views' => '22K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3B82F6?text=Privacy+Settings'],
                ['judul' => 'GDPR vs UU PDP: Perbandingan', 'durasi' => '20:10', 'views' => '18K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=GDPR+vs+PDP'],
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
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-rose-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Kelola preferensi privasi pribadi', 'Download salinan data (JSON/CSV)', 'Ajukan penghapusan akun & data', 'Atur consent cookie & tracking', 'Lihat log akses data pribadi', 'Blokir sharing data ke pihak ketiga']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Instruktur', 'fitur' => ['Kelola data siswa sesuai UU PDP', 'Anonimisasi data untuk laporan', 'Akses panduan pemrosesan data', 'Kelola consent siswa per kelas', 'Enkripsi otomatis dokumen siswa', 'Training privasi data berkala']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Dashboard DPO & compliance', 'Kelola kebijakan privasi platform', 'Proses permintaan subjek data', 'Konfigurasi data retention policy', 'Audit data processing activities', 'Kelola breach notification system']],
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
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum Privasi Data</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apakah data saya dijual ke pihak ketiga?', 'a' => 'Tidak. KVT Hub tidak pernah menjual, menyewakan, atau membagikan data pribadi Anda kepada pihak ketiga untuk tujuan komersial. Data hanya diproses untuk layanan yang Anda gunakan.'],
        ['q' => 'Bagaimana cara mengunduh salinan data saya?', 'a' => 'Masuk ke Pengaturan → Privasi → Unduh Data Saya. Pilih format (JSON/CSV), dan file akan disiapkan dalam 24 jam. Anda akan mendapat notifikasi email saat file siap diunduh.'],
        ['q' => 'Berapa lama data saya disimpan?', 'a' => 'Data akun aktif disimpan selama akun aktif. Setelah penghapusan akun, data dihapus permanen dalam 30 hari. Data backup dihapus setelah 90 hari. Log aktivitas disimpan maksimal 365 hari.'],
        ['q' => 'Apa yang terjadi jika terjadi kebocoran data?', 'a' => 'Sesuai UU PDP Pasal 46, kami akan mengirimkan notifikasi kepada pengguna terdampak dan otoritas pengawas dalam 72 jam. Langkah containment, investigasi, dan remediasi dilakukan segera.'],
        ['q' => 'Bagaimana cara menghapus akun dan semua data saya?', 'a' => 'Masuk ke Pengaturan → Privasi → Hapus Akun. Konfirmasi dengan password. Proses penghapusan memerlukan 30 hari cooling period, setelah itu semua data dihapus permanen tanpa bisa dikembalikan.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-rose-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-rose-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Data Anda, Kendali Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Kelola privasi data Anda dengan mudah. Unduh, koreksi, atau hapus data kapan saja dari dashboard pribadi.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-pink-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-rose-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-user-shield"></i> Kelola Privasi Saya
        </a>
    </div>
</section>

@endsection
