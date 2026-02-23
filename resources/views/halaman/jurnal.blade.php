@extends('tata-letak.utama')
@section('judul', 'Jurnal Akademik & Publikasi - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%233399FF%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-purple-800/40 border border-purple-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-book-open text-purple-400"></i>
            <span class="text-purple-300 text-sm font-semibold">Publish & Cite</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Jurnal Akademik & <span class="teks-gradien">Publikasi</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Publikasikan penelitian Anda di jurnal terakreditasi, dapatkan peer review berkualitas, dan tingkatkan kontribusi ilmiah Anda secara global.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#jurnal" class="bg-gradient-to-r from-purple-500 to-violet-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-purple-500/30 transition-all">
                <i class="fas fa-paper-plane mr-2"></i>Submit Paper
            </a>
            <a href="#koleksi" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-search mr-2"></i>Cari Jurnal
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['30+','Jurnal'],['5K+','Paper'],['Sinta 2','Akreditasi'],['DOI','Indexed']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Bidang Jurnal --}}
<section class="py-20" id="jurnal">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Bidang <span class="teks-gradien">Jurnal</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Jurnal terakreditasi nasional dan terindeks internasional di berbagai bidang keilmuan.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $bidangs = [
                ['icon'=>'fa-laptop-code','color'=>'purple','judul'=>'Informatika & Teknologi','desc'=>'Computer science, software engineering, information systems','total'=>'8 jurnal aktif'],
                ['icon'=>'fa-flask','color'=>'violet','judul'=>'Sains & Matematika','desc'=>'Fisika, kimia, biologi, matematika murni dan terapan','total'=>'6 jurnal aktif'],
                ['icon'=>'fa-heartbeat','color'=>'pink','judul'=>'Ilmu Kesehatan','desc'=>'Kedokteran, keperawatan, farmasi, kesehatan masyarakat','total'=>'5 jurnal aktif'],
                ['icon'=>'fa-university','color'=>'kvt','judul'=>'Ekonomi & Bisnis','desc'=>'Manajemen, akuntansi, ekonomi pembangunan, fintech','total'=>'4 jurnal aktif'],
                ['icon'=>'fa-gavel','color'=>'amber','judul'=>'Hukum & Sosial','desc'=>'Hukum, sosiologi, ilmu politik, hubungan internasional','total'=>'4 jurnal aktif'],
                ['icon'=>'fa-seedling','color'=>'green','judul'=>'Pertanian & Lingkungan','desc'=>'Agroteknologi, kehutanan, ilmu lingkungan, perikanan','total'=>'3 jurnal aktif'],
            ];
            @endphp
            @foreach($bidangs as $b)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $b['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $b['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $b['icon'] }} text-{{ $b['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $b['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $b['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-{{ $b['color'] }}-400 text-xs font-semibold">{{ $b['total'] }}</span>
                    <i class="fas fa-arrow-right text-gray-600 group-hover:text-{{ $b['color'] }}-400 transition"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Artikel Terbaru --}}
<section class="py-20 bg-kvt-900/30" id="koleksi">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Artikel <span class="teks-gradien">Terbaru</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Paper dan artikel ilmiah terbaru yang telah dipublikasikan oleh peneliti kami.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $artikels = [
                ['judul'=>'Deep Learning for Indonesian NLP: A Comprehensive Survey','penulis'=>'Dr. Andi Wijaya et al.','jurnal'=>'J. Informatika KVT','tahun'=>'2026','sitasi'=>'45 Sitasi','color'=>'purple'],
                ['judul'=>'Sustainable Energy Policy in Southeast Asia','penulis'=>'Prof. Budi Santoso','jurnal'=>'J. Lingkungan & Energi','tahun'=>'2026','sitasi'=>'32 Sitasi','color'=>'green'],
                ['judul'=>'Fintech Adoption Among Gen-Z in Indonesia','penulis'=>'Dr. Sari Mulyani, MBA','jurnal'=>'J. Ekonomi Digital','tahun'=>'2025','sitasi'=>'28 Sitasi','color'=>'kvt'],
                ['judul'=>'Novel Drug Delivery System Using Nanoparticles','penulis'=>'Dr. Amelia Putri, Apt','jurnal'=>'J. Farmasi Terapan','tahun'=>'2025','sitasi'=>'51 Sitasi','color'=>'pink'],
                ['judul'=>'Constitutional Reform and Digital Democracy','penulis'=>'Prof. Hendra Kusuma, SH','jurnal'=>'J. Hukum & Politik','tahun'=>'2026','sitasi'=>'19 Sitasi','color'=>'amber'],
                ['judul'=>'Quantum Computing: Current State and Future','penulis'=>'Dr. Rizky Amanullah','jurnal'=>'J. Fisika Modern','tahun'=>'2026','sitasi'=>'38 Sitasi','color'=>'violet'],
            ];
            @endphp
            @foreach($artikels as $a)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $a['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $a['color'] }}-400 bg-{{ $a['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $a['jurnal'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-3 leading-snug">{{ $a['judul'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-user-edit text-xs"></i> {{ $a['penulis'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-calendar mr-1"></i>{{ $a['tahun'] }}</span>
                        <span><i class="fas fa-quote-right mr-1"></i>{{ $a['sitasi'] }}</span>
                    </div>
                    <button class="w-full bg-{{ $a['color'] }}-500/10 text-{{ $a['color'] }}-400 border border-{{ $a['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $a['color'] }}-500/20 transition">
                        <i class="fas fa-file-pdf mr-2"></i>Baca Paper
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Proses Publikasi --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Proses <span class="teks-gradien">Publikasi</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Alur publikasi yang transparan dengan peer review berkualitas tinggi.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $proses = [
                ['icon'=>'fa-upload','judul'=>'Submit Paper','desc'=>'Upload manuscript melalui sistem OJS dengan template yang tersedia','color'=>'purple'],
                ['icon'=>'fa-user-check','judul'=>'Peer Review','desc'=>'Double-blind peer review oleh reviewer ahli di bidangnya','color'=>'violet'],
                ['icon'=>'fa-edit','judul'=>'Revisi & Editing','desc'=>'Perbaikan berdasarkan masukan reviewer dan proofreading profesional','color'=>'pink'],
                ['icon'=>'fa-globe','judul'=>'Publikasi & Indexing','desc'=>'Terbit online dengan DOI dan terindeks di database internasional','color'=>'kvt'],
            ];
            @endphp
            @foreach($proses as $p)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $p['color'] }}-500/30 transition-all card-hover text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-16 h-16 bg-{{ $p['color'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $p['icon'] }} text-{{ $p['color'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $p['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $p['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Siap <span class="teks-gradien">Mempublikasikan</span> Riset Anda?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Submit paper Anda sekarang dan kontribusikan pengetahuan untuk kemajuan ilmu pengetahuan Indonesia.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-violet-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-purple-500/30 transition-all">
                    <i class="fas fa-paper-plane"></i> Submit Paper
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-book"></i> Panduan Penulis
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
