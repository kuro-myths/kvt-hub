@extends('tata-letak.utama')
@section('judul', 'Konferensi & Seminar - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-indigo-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #6366F1 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-indigo-800/30 border border-indigo-600/30 rounded-full px-4 py-1.5 text-xs text-indigo-300 mb-6" data-aos="fade-down">
            <i class="fas fa-calendar-alt"></i> Event & Seminar Ilmiah
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Konferensi &</span><br>
            <span class="teks-gradien">Seminar</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Ikuti konferensi ilmiah nasional dan internasional. Presentasikan riset, networking dengan ahli global,
            dan dapatkan feedback langsung dari reviewer internasional.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-indigo-400 hover:to-blue-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-indigo-500/30 hover:-translate-y-0.5">
                <i class="fas fa-ticket-alt mr-2"></i>Daftar Event
            </a>
            <a href="#events" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-calendar mr-2"></i>Lihat Jadwal
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">24</div><div class="text-xs text-gray-500">Event/Tahun</div></div>
            <div><div class="text-2xl font-black text-white">5K+</div><div class="text-xs text-gray-500">Peserta</div></div>
            <div><div class="text-2xl font-black text-white">200+</div><div class="text-xs text-gray-500">Speaker</div></div>
            <div><div class="text-2xl font-black text-white">30+</div><div class="text-xs text-gray-500">Negara</div></div>
        </div>
    </div>
</section>

{{-- UPCOMING EVENTS --}}
<section id="events" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">UPCOMING</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Upcoming Events</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Konferensi dan seminar yang akan datang di KVT Hub</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $events = [
            ['KVT AI Summit 2026', 'Konferensi AI terbesar di Asia Tenggara. Keynote dari Google DeepMind & OpenAI.', 'Mar 2026', 'fa-brain', 'from-blue-500 to-indigo-500', '2,000 peserta', 'Jakarta'],
            ['Cybersecurity Forum', 'Forum keamanan siber dengan demo hacking live dan CTF competition.', 'Apr 2026', 'fa-shield-alt', 'from-red-500 to-orange-500', '800 peserta', 'Bandung'],
            ['BioTech Conference', 'Konferensi bioteknologi: CRISPR, genomics, dan precision medicine.', 'May 2026', 'fa-dna', 'from-green-500 to-emerald-500', '600 peserta', 'Surabaya'],
            ['EdTech Innovation', 'Inovasi teknologi pendidikan, adaptive learning, dan AI tutoring.', 'Jun 2026', 'fa-chalkboard-teacher', 'from-purple-500 to-violet-500', '1,200 peserta', 'Yogyakarta'],
            ['FinTech Summit', 'Blockchain, DeFi, digital banking, dan regulasi keuangan digital.', 'Jul 2026', 'fa-coins', 'from-yellow-500 to-amber-500', '900 peserta', 'Jakarta'],
            ['Green Energy Symposium', 'Energi terbarukan, carbon neutral, dan sustainable development.', 'Aug 2026', 'fa-solar-panel', 'from-teal-500 to-cyan-500', '700 peserta', 'Bali'],
        ];
        @endphp
        @foreach($events as $i => $e)
        <div class="kaca rounded-2xl p-6 hover:border-indigo-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br {{ $e[4] }} rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $e[3] }} text-white text-lg"></i>
                </div>
                <span class="text-[10px] bg-indigo-500/10 text-indigo-400 px-2 py-0.5 rounded-full border border-indigo-500/20">{{ $e[2] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $e[0] }}</h3>
            <p class="text-gray-400 text-sm mb-3">{{ $e[1] }}</p>
            <div class="flex items-center gap-3 text-xs text-gray-500">
                <span><i class="fas fa-users mr-1"></i>{{ $e[5] }}</span>
                <span><i class="fas fa-map-marker-alt mr-1"></i>{{ $e[6] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-indigo-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">24</div><p class="text-gray-400 text-sm mt-1">Event/Tahun</p></div>
        <div><div class="text-3xl font-black teks-gradien">5K+</div><p class="text-gray-400 text-sm mt-1">Total Peserta</p></div>
        <div><div class="text-3xl font-black teks-gradien">200+</div><p class="text-gray-400 text-sm mt-1">Speaker Global</p></div>
        <div><div class="text-3xl font-black teks-gradien">30+</div><p class="text-gray-400 text-sm mt-1">Negara Peserta</p></div>
    </div>
</section>

{{-- CALL FOR PAPERS --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">CALL FOR PAPERS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Call for Papers</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Submit riset Anda ke konferensi berikut sebelum deadline</p>
    </div>
    @php
    $cfp = [
        ['KVT AI Summit 2026', 'Machine Learning, Deep Learning, NLP, Computer Vision, Robotics, Ethics in AI', '28 Feb 2026', 'Scopus-Indexed', 'from-blue-500 to-indigo-500'],
        ['International Cybersec Conference', 'Network Security, Cryptography, Digital Forensics, Zero Trust Architecture', '15 Mar 2026', 'IEEE Indexed', 'from-red-500 to-rose-500'],
        ['Asia-Pacific BioTech Forum', 'Genomics, CRISPR, Bioinformatics, Precision Medicine, Agri-Biotech', '1 Apr 2026', 'Springer Indexed', 'from-green-500 to-emerald-500'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($cfp as $i => $c)
        <div class="kaca rounded-2xl p-6 hover:border-rose-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="flex flex-col md:flex-row md:items-center gap-4">
                <div class="flex-1">
                    <h3 class="text-white font-bold mb-1">{{ $c[0] }}</h3>
                    <p class="text-gray-400 text-sm mb-2">{{ $c[1] }}</p>
                    <div class="flex flex-wrap items-center gap-3 text-xs">
                        <span class="text-rose-400"><i class="fas fa-clock mr-1"></i>Deadline: {{ $c[2] }}</span>
                        <span class="bg-green-500/10 text-green-400 px-2 py-0.5 rounded-full border border-green-500/20">{{ $c[3] }}</span>
                    </div>
                </div>
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r {{ $c[4] }} text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:-translate-y-0.5 transition flex-shrink-0">
                    <i class="fas fa-paper-plane mr-1"></i>Submit
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- SPEAKER --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">SPEAKERS</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Featured Speakers</h2>
        </div>
        @php
        $speakers = [
            ['Prof. Dr. Andrew Ng', 'Stanford University / Coursera', 'AI & Machine Learning Pioneer', 'fa-brain', 'from-blue-500 to-cyan-500'],
            ['Dr. Fei-Fei Li', 'Stanford HAI Director', 'Computer Vision & ImageNet Creator', 'fa-eye', 'from-purple-500 to-violet-500'],
            ['Prof. Bambang Riyanto', 'Institut Teknologi Bandung', 'Control Systems & Robotics Expert', 'fa-robot', 'from-green-500 to-emerald-500'],
            ['Dr. Adi Utarini', 'Universitas Gadjah Mada', 'Wolbachia Researcher - Time 100 Most Influential', 'fa-dna', 'from-red-500 to-rose-500'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($speakers as $i => $s)
            <div class="kaca rounded-2xl p-6 text-center hover:border-purple-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br {{ $s[4] }} rounded-full flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $s[3] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-sm mb-1">{{ $s[0] }}</h3>
                <p class="text-indigo-400 text-xs mb-1">{{ $s[1] }}</p>
                <p class="text-gray-500 text-xs">{{ $s[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Highlight Konferensi</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'KVT AI Summit 2025 Recap', 'durasi' => '25:10', 'views' => '67K', 'warna' => 'indigo', 'thumb' => 'https://placehold.co/640x360/1a1a2e/6366F1?text=AI+Summit+2025'],
            ['judul' => 'Tips Presentasi di Konferensi', 'durasi' => '11:30', 'views' => '31K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Presentation+Tips'],
            ['judul' => 'Networking di Event Ilmiah', 'durasi' => '08:45', 'views' => '22K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Networking+Guide'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-indigo-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Sesuai Peran Anda</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Peserta / Mahasiswa', 'fitur' => ['Daftar event online & offline', 'Submit paper ke konferensi', 'Akses rekaman & materi presentasi', 'Networking dengan peserta & speaker', 'Dapatkan sertifikat kehadiran', 'Early bird discount registration']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Speaker / Reviewer', 'fitur' => ['Ajukan diri sebagai keynote speaker', 'Review paper submission', 'Akses speaker dashboard', 'Kelola sesi & Q&A interaktif', 'Buat workshop & tutorial', 'Honorarium & travel support']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Organizer / Admin', 'fitur' => ['Buat & kelola event baru', 'Dashboard registrasi & attendance', 'Kelola call for papers & review', 'Konfigurasi jadwal & track', 'Laporan post-event analytics', 'Kelola sponsor & partnership']],
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
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Bagaimana cara mendaftar konferensi?', 'a' => 'Pilih event yang diminati, klik tombol "Daftar Event", dan isi formulir registrasi. Pembayaran bisa melalui transfer bank, e-wallet, atau kartu kredit. Early bird discount tersedia 2 bulan sebelum event.'],
        ['q' => 'Apakah bisa ikut secara online (virtual)?', 'a' => 'Ya, semua konferensi KVT Hub bersifat hybrid. Anda bisa hadir secara onsite atau online via platform streaming kami dengan fitur Q&A interaktif.'],
        ['q' => 'Bagaimana proses submit paper ke konferensi?', 'a' => 'Upload paper melalui submission portal, pilih track yang sesuai, dan tunggu hasil review (biasanya 4-6 minggu). Paper yang diterima akan dipresentasikan dan dipublikasikan di prosiding.'],
        ['q' => 'Apakah prosiding terindeks Scopus?', 'a' => 'Sebagian besar konferensi KVT Hub memiliki prosiding yang terindeks Scopus, IEEE Xplore, atau Springer. Informasi indexing tercantum di halaman masing-masing event.'],
        ['q' => 'Apakah ada sertifikat untuk peserta?', 'a' => 'Ya, semua peserta (onsite & online) mendapatkan e-certificate yang bisa diverifikasi secara digital. Presenter mendapat sertifikat tambahan sebagai paper presenter.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $f)
        <details class="kaca rounded-xl group" data-aos="fade-up">
            <summary class="cursor-pointer p-5 flex items-center justify-between text-white font-semibold text-sm">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition text-xs"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-700/50 pt-3">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-indigo-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Ikuti Konferensi & Seminar Berikutnya</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar sekarang untuk presentasi riset, networking global, dan dapatkan sertifikat serta publikasi di prosiding internasional.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-blue-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-indigo-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-ticket-alt"></i> Daftar Event Sekarang
        </a>
    </div>
</section>

@endsection
