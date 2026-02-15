@extends('tata-letak.utama')
@section('judul', 'Blockchain Credential - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-violet-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-violet-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #8B5CF6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-violet-800/30 border border-violet-600/30 rounded-full px-4 py-1.5 text-xs text-violet-300 mb-6" data-aos="fade-down">
            <i class="fas fa-link"></i> Terverifikasi On-Chain
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Blockchain </span><span class="teks-gradien">Credential</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Sertifikat digital yang tercatat di blockchain. Tidak bisa dipalsukan, berlaku seumur hidup,
            dan dapat diverifikasi secara instan oleh siapa saja di seluruh dunia.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-violet-500 to-purple-500 hover:from-violet-400 hover:to-purple-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-violet-500/30 hover:-translate-y-0.5">
                <i class="fas fa-certificate mr-2"></i>Raih Credential
            </a>
            <a href="#cara-kerja" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-search mr-2"></i>Cara Kerja
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">12K+</div><div class="text-xs text-gray-500">Credential Issued</div></div>
            <div><div class="text-2xl font-black text-white">100%</div><div class="text-xs text-gray-500">Terverifikasi</div></div>
            <div><div class="text-2xl font-black text-white">∞</div><div class="text-xs text-gray-500">Masa Berlaku</div></div>
            <div><div class="text-2xl font-black text-white">W3C</div><div class="text-xs text-gray-500">Standard</div></div>
        </div>
    </div>
</section>

{{-- FITUR BLOCKCHAIN CREDENTIAL --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-violet-500/10 text-violet-400 px-3 py-1 rounded-full">FITUR UTAMA</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Keunggulan Blockchain Credential</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Teknologi blockchain menjamin keaslian, keamanan, dan portabilitas credential Anda</p>
    </div>
    @php
    $fitur = [
        ['ikon' => 'fas fa-fingerprint', 'warna' => 'violet', 'gradien' => 'from-violet-500 to-purple-500', 'judul' => 'Verifikasi Instan', 'desc' => 'Setiap sertifikat memiliki hash unik yang bisa diverifikasi di blockchain dalam hitungan detik.'],
        ['ikon' => 'fas fa-lock', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-indigo-500', 'judul' => 'Anti-Pemalsuan', 'desc' => 'Teknologi blockchain memastikan sertifikat tidak dapat dimodifikasi atau dipalsukan.'],
        ['ikon' => 'fas fa-infinity', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Berlaku Selamanya', 'desc' => 'Tidak ada masa kedaluwarsa. Sertifikat Anda tersimpan permanen di distributed ledger.'],
        ['ikon' => 'fas fa-share-alt', 'warna' => 'cyan', 'gradien' => 'from-cyan-500 to-teal-500', 'judul' => 'Mudah Dibagikan', 'desc' => 'Share credential via link, QR code, atau embed di LinkedIn dan portfolio digital.'],
        ['ikon' => 'fas fa-globe', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-orange-500', 'judul' => 'Pengakuan Global', 'desc' => 'Standar Open Badges 3.0 dan W3C Verifiable Credentials yang diakui internasional.'],
        ['ikon' => 'fas fa-wallet', 'warna' => 'pink', 'gradien' => 'from-pink-500 to-rose-500', 'judul' => 'Digital Wallet', 'desc' => 'Kelola semua credential di satu wallet digital. Integrasi dengan MetaMask dan Phantom.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($fitur as $f)
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

{{-- CARA KERJA VERIFIKASI --}}
<section id="cara-kerja" class="bg-gradient-to-br from-violet-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">HOW IT WORKS</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Bagaimana Blockchain Verification Bekerja</h2>
        </div>
        @php
        $steps = [
            ['step' => '01', 'judul' => 'Selesaikan Kursus', 'desc' => 'Pelajar menyelesaikan kursus dan lulus asesmen dengan skor memenuhi standar.', 'ikon' => 'fas fa-graduation-cap'],
            ['step' => '02', 'judul' => 'Generate Hash', 'desc' => 'Sistem membuat hash kriptografis unik dari data credential (nama, tanggal, kompetensi).', 'ikon' => 'fas fa-hashtag'],
            ['step' => '03', 'judul' => 'Record On-Chain', 'desc' => 'Hash dicatat di blockchain publik (Ethereum/Polygon) sebagai transaksi permanen.', 'ikon' => 'fas fa-cube'],
            ['step' => '04', 'judul' => 'Issue Credential', 'desc' => 'Credential digital diterbitkan sebagai Verifiable Credential (VC) standar W3C.', 'ikon' => 'fas fa-certificate'],
            ['step' => '05', 'judul' => 'Mint NFT Badge', 'desc' => 'Badge visual di-mint sebagai NFT yang bisa ditampilkan di wallet dan profil.', 'ikon' => 'fas fa-gem'],
            ['step' => '06', 'judul' => 'Verify Anywhere', 'desc' => 'Siapa pun bisa memverifikasi keaslian credential via QR code atau verification URL.', 'ikon' => 'fas fa-check-double'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($steps as $s)
            <div class="kaca rounded-2xl p-5 text-center border-kvt-700/30 hover:border-violet-500/30 transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="text-2xl font-black teks-gradien mb-3">{{ $s['step'] }}</div>
                <div class="w-10 h-10 bg-violet-500/20 rounded-full flex items-center justify-center mx-auto mb-3"><i class="{{ $s['ikon'] }} text-violet-400 text-sm"></i></div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $s['judul'] }}</h4>
                <p class="text-gray-500 text-xs">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- JENIS CREDENTIAL --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">CREDENTIAL TYPES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Jenis Credential</h2>
    </div>
    @php
    $types = [
        ['ikon' => 'fas fa-certificate', 'warna' => 'green', 'judul' => 'Course Completion', 'desc' => 'Sertifikat penyelesaian kursus dengan detail kompetensi dan skor akhir.', 'badge' => 'Otomatis'],
        ['ikon' => 'fas fa-trophy', 'warna' => 'amber', 'judul' => 'Achievement Badge', 'desc' => 'Badge prestasi untuk pencapaian khusus: top scorer, streak, contribution.', 'badge' => 'Gamified'],
        ['ikon' => 'fas fa-award', 'warna' => 'blue', 'judul' => 'Professional Cert', 'desc' => 'Sertifikasi profesional setelah lulus ujian kompetensi terstandarisasi.', 'badge' => 'Proctored'],
        ['ikon' => 'fas fa-gem', 'warna' => 'purple', 'judul' => 'NFT Diploma', 'desc' => 'Ijazah digital sebagai NFT dengan metadata lengkap dan artwork unik.', 'badge' => 'Limited Edition'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($types as $t)
        <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition group hover:-translate-y-1" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-{{ $t['warna'] }}-500/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition"><i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-xl"></i></div>
                <span class="text-[10px] bg-{{ $t['warna'] }}-500/10 text-{{ $t['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $t['badge'] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $t['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $t['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- PARTNER CHAINS --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">SUPPORTED CHAINS</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Blockchain Networks</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Credential Anda di-record di jaringan blockchain terpercaya</p>
        </div>
        @php
        $chains = [
            ['Ethereum', 'fab fa-ethereum', 'text-blue-400', 'Mainnet & Goerli'],
            ['Polygon', 'fas fa-hexagon-vertical-nft', 'text-purple-400', 'Low gas fees'],
            ['Solana', 'fas fa-sun', 'text-green-400', 'High throughput'],
            ['Avalanche', 'fas fa-mountain', 'text-red-400', 'Sub-second finality'],
        ];
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="100">
            @foreach($chains as $c)
            <div class="kaca rounded-xl p-6 text-center hover:border-violet-500/30 transition group">
                <i class="{{ $c[1] }} {{ $c[2] }} text-3xl mb-3 block group-hover:scale-110 transition"></i>
                <span class="text-sm text-white font-semibold block">{{ $c[0] }}</span>
                <span class="text-xs text-gray-500">{{ $c[3] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-violet-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">12K+</div><p class="text-gray-400 text-sm mt-1">Credential Issued</p></div>
        <div><div class="text-3xl font-black teks-gradien">100%</div><p class="text-gray-400 text-sm mt-1">Terverifikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien">∞</div><p class="text-gray-400 text-sm mt-1">Masa Berlaku</p></div>
        <div><div class="text-3xl font-black teks-gradien">W3C</div><p class="text-gray-400 text-sm mt-1">Standard</p></div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Pengenalan</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Blockchain Credential Explained', 'durasi' => '12:20', 'views' => '18K', 'warna' => 'violet', 'thumb' => 'https://placehold.co/640x360/1a1a2e/8B5CF6?text=Blockchain+101'],
            ['judul' => 'Cara Verifikasi Sertifikat', 'durasi' => '06:45', 'views' => '25K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3B82F6?text=Verify+Demo'],
            ['judul' => 'Setup Digital Wallet', 'durasi' => '09:10', 'views' => '14K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Wallet+Setup'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-violet-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Raih blockchain credential otomatis', 'Kumpulkan NFT badges & achievements', 'Kelola credential di digital wallet', 'Share ke LinkedIn & portfolio', 'Verifikasi credential orang lain', 'Export credential sebagai PDF/JSON']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Instruktur', 'fitur' => ['Issue credential untuk siswa', 'Design badge artwork & metadata', 'Buat kriteria credential custom', 'Monitor issued credentials', 'Revoke credential jika diperlukan', 'Analytics engagement credential']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola smart contract & chains', 'Konfigurasi credential templates', 'Dashboard on-chain analytics', 'Kelola gas fee & batch minting', 'Audit trail semua transactions', 'Integrasi W3C & Open Badges']],
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
        ['q' => 'Apakah saya butuh crypto wallet untuk menerima credential?', 'a' => 'Tidak wajib. KVT Hub menyediakan custodial wallet otomatis saat Anda mendaftar. Namun Anda bisa menghubungkan wallet MetaMask atau Phantom untuk kontrol penuh atas credential Anda.'],
        ['q' => 'Apakah ada biaya gas fee untuk menerima credential?', 'a' => 'Tidak. KVT Hub menanggung semua gas fee untuk penerbitan credential. Kami menggunakan Polygon untuk meminimalkan biaya transaksi.'],
        ['q' => 'Bagaimana cara memverifikasi credential?', 'a' => 'Ada 3 cara: (1) Scan QR code pada sertifikat, (2) Masukkan credential ID di halaman verifikasi KVT Hub, (3) Cek langsung di blockchain explorer (Etherscan/Polygonscan).'],
        ['q' => 'Apakah credential bisa dicabut/revoke?', 'a' => 'Ya, issuer (guru/admin) dapat melakukan revoke credential jika ditemukan pelanggaran. Status revoke juga tercatat di blockchain sehingga transparan.'],
        ['q' => 'Apa bedanya dengan sertifikat PDF biasa?', 'a' => 'Sertifikat PDF bisa dipalsukan dengan mudah. Blockchain credential memiliki hash kriptografis unik yang tercatat secara permanen di blockchain publik — tidak bisa dimodifikasi oleh siapa pun.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-violet-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-violet-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Raih Credential Berbasis Blockchain</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis dan mulai kumpulkan credential digital yang terverifikasi, permanen, dan diakui global.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-violet-500 to-purple-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-violet-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Mulai Kumpulkan Credential
        </a>
    </div>
</section>

@endsection

@endsection
