@extends('tata-letak.utama')
@section('judul', 'Akreditasi & Standar Mutu - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%2310B981%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-emerald-800/40 border border-emerald-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-award text-emerald-400"></i>
            <span class="text-emerald-300 text-sm font-semibold">Terakreditasi & Tersertifikasi</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Akreditasi & <span class="teks-gradien">Standar Mutu</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            KVT Hub berkomitmen pada standar mutu tertinggi. Terakreditasi secara nasional dan internasional untuk menjamin kualitas pendidikan terbaik.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#standar" class="bg-gradient-to-r from-emerald-600 to-emerald-400 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                <i class="fas fa-shield-alt mr-2"></i>Standar Mutu
            </a>
            <a href="#sertifikasi" class="border border-emerald-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-emerald-800/50 transition-all">
                <i class="fas fa-certificate mr-2"></i>Sertifikasi Kami
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['ISO 27001','Keamanan Data'],['AUN-QA','Mutu ASEAN'],['BAN-PT A','Akreditasi Nasional'],['ABET','Standar Internasional']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Standar Mutu --}}
<section class="py-20" id="standar">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Standar <span class="teks-gradien">Mutu</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Framework mutu yang kami terapkan untuk memastikan kualitas pendidikan dan layanan terbaik.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $standar = [
                ['icon'=>'fa-clipboard-check','color'=>'emerald','judul'=>'Kurikulum Terstandar','desc'=>'Kurikulum disusun berdasarkan KKNI dan standar kompetensi industri global','indikator'=>'100% compliance'],
                ['icon'=>'fa-user-shield','color'=>'kvt','judul'=>'Tenaga Pengajar Berkualitas','desc'=>'Seluruh pengajar tersertifikasi dan memiliki kualifikasi minimum S2','indikator'=>'95% tersertifikasi'],
                ['icon'=>'fa-server','color'=>'purple','judul'=>'Infrastruktur TI Modern','desc'=>'Data center tier-3, uptime 99.9%, dan sistem keamanan berlapis','indikator'=>'99.9% uptime'],
                ['icon'=>'fa-chart-pie','color'=>'amber','judul'=>'Evaluasi Berkelanjutan','desc'=>'Audit mutu internal setiap semester dan evaluasi kepuasan pengguna berkala','indikator'=>'2x per tahun'],
                ['icon'=>'fa-handshake','color'=>'teal','judul'=>'Kemitraan Industri','desc'=>'Kolaborasi dengan 200+ perusahaan untuk relevansi materi dan magang','indikator'=>'200+ partner'],
                ['icon'=>'fa-globe-asia','color'=>'pink','judul'=>'Benchmarking Internasional','desc'=>'Standar komparatif dengan universitas top 500 dunia dan best practices global','indikator'=>'Top 500 benchmark'],
            ];
            @endphp
            @foreach($standar as $s)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $s['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $s['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $s['icon'] }} text-{{ $s['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $s['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $s['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-{{ $s['color'] }}-400 text-xs font-semibold"><i class="fas fa-check-circle mr-1"></i>{{ $s['indikator'] }}</span>
                    <i class="fas fa-arrow-right text-gray-600 group-hover:text-{{ $s['color'] }}-400 transition"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Proses Akreditasi --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Proses <span class="teks-gradien">Akreditasi</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Tahapan akreditasi yang kami lalui untuk memperoleh dan mempertahankan status mutu tertinggi.</p>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            @php
            $proses = [
                ['step'=>'01','judul'=>'Self Assessment','desc'=>'Evaluasi mandiri terhadap seluruh aspek mutu internal','icon'=>'fa-search'],
                ['step'=>'02','judul'=>'Penyusunan Borang','desc'=>'Dokumentasi lengkap standar, prosedur, dan bukti mutu','icon'=>'fa-file-signature'],
                ['step'=>'03','judul'=>'Visitasi Asesor','desc'=>'Pemeriksaan langsung oleh tim asesor independen','icon'=>'fa-user-check'],
                ['step'=>'04','judul'=>'Penetapan Status','desc'=>'Pengumuman hasil dan peringkat akreditasi resmi','icon'=>'fa-trophy'],
            ];
            @endphp
            @foreach($proses as $p)
            <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-16 h-16 bg-emerald-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-emerald-500/20">
                    <i class="fas {{ $p['icon'] }} text-emerald-400 text-xl"></i>
                </div>
                <div class="text-emerald-400 text-xs font-bold mb-2">TAHAP {{ $p['step'] }}</div>
                <h3 class="text-white font-bold mb-2">{{ $p['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $p['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Sertifikasi Diraih --}}
<section class="py-20" id="sertifikasi">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Sertifikasi <span class="teks-gradien">Diraih</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pencapaian akreditasi dan sertifikasi yang membuktikan komitmen kami pada mutu pendidikan.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $sertifikasi = [
                ['badge'=>'ISO 27001','judul'=>'Information Security','tahun'=>'Sejak 2022','desc'=>'Standar internasional keamanan informasi dan data pengguna','color'=>'emerald'],
                ['badge'=>'AUN-QA','judul'=>'ASEAN Quality Assurance','tahun'=>'Sejak 2023','desc'=>'Jaminan mutu pendidikan tinggi tingkat ASEAN','color'=>'kvt'],
                ['badge'=>'BAN-PT A','judul'=>'Akreditasi Unggul','tahun'=>'Sejak 2021','desc'=>'Peringkat tertinggi akreditasi institusi pendidikan nasional','color'=>'amber'],
                ['badge'=>'ABET','judul'=>'Engineering Accreditation','tahun'=>'Sejak 2024','desc'=>'Akreditasi internasional untuk program teknik dan teknologi','color'=>'purple'],
            ];
            @endphp
            @foreach($sertifikasi as $s)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-20 h-20 bg-{{ $s['color'] }}-500/10 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-{{ $s['color'] }}-500/30">
                    <span class="text-{{ $s['color'] }}-400 font-black text-sm">{{ $s['badge'] }}</span>
                </div>
                <h3 class="text-white font-bold mb-1">{{ $s['judul'] }}</h3>
                <p class="text-{{ $s['color'] }}-400 text-xs font-semibold mb-3">{{ $s['tahun'] }}</p>
                <p class="text-gray-500 text-sm">{{ $s['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Pertanyaan <span class="teks-gradien">Umum</span></h2>
        </div>
        <div class="space-y-4">
            @php
            $faq = [
                ['q'=>'Apa itu akreditasi BAN-PT dan mengapa penting?','a'=>'BAN-PT adalah Badan Akreditasi Nasional Perguruan Tinggi yang menilai mutu institusi pendidikan. Akreditasi A (Unggul) menunjukkan standar mutu tertinggi yang diakui secara nasional.'],
                ['q'=>'Bagaimana KVT Hub menjaga standar mutu?','a'=>'Kami menerapkan sistem penjaminan mutu internal (SPMI) yang mencakup audit berkala, evaluasi pengajaran, survei kepuasan, dan benchmarking dengan standar internasional.'],
                ['q'=>'Apakah sertifikat dari KVT Hub diakui industri?','a'=>'Ya, seluruh sertifikat kami terverifikasi secara digital dan diakui oleh 200+ perusahaan partner. Sertifikasi juga merujuk pada standar kompetensi SKKNI.'],
                ['q'=>'Berapa lama masa berlaku akreditasi?','a'=>'Akreditasi BAN-PT berlaku 5 tahun, ISO 27001 berlaku 3 tahun dengan audit surveilans tahunan, sedangkan AUN-QA berlaku 5 tahun.'],
                ['q'=>'Bagaimana cara mengakses dokumen mutu?','a'=>'Dokumen mutu, laporan evaluasi diri, dan bukti akreditasi tersedia di portal transparansi KVT Hub yang dapat diakses oleh seluruh stakeholder.'],
            ];
            @endphp
            @foreach($faq as $f)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <h3 class="text-white font-bold mb-3 flex items-start gap-3">
                    <i class="fas fa-question-circle text-emerald-400 mt-1 flex-shrink-0"></i>
                    {{ $f['q'] }}
                </h3>
                <p class="text-gray-400 text-sm pl-8">{{ $f['a'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-emerald-800/50 to-kvt-900/50 border border-emerald-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Bergabung dengan Platform <span class="teks-gradien">Berstandar Mutu</span></h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Nikmati pengalaman belajar terjamin kualitasnya. Dukung oleh akreditasi nasional dan internasional.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-kvt-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </a>
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
