@extends('tata-letak.utama')
@section('judul', 'Pengumuman Resmi - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-red-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23F97316%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-orange-800/40 border border-orange-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-bullhorn text-orange-400"></i>
            <span class="text-orange-300 text-sm font-semibold">Info Resmi & Terkini</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Pengumuman <span class="teks-gradien">Resmi</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Dapatkan informasi terbaru, pengumuman akademik, jadwal penting, dan berita resmi dari KVT Hub secara real-time.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#terbaru" class="bg-gradient-to-r from-red-600 to-orange-400 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-orange-500/30 transition-all">
                <i class="fas fa-bell mr-2"></i>Pengumuman Terbaru
            </a>
            <a href="#arsip" class="border border-orange-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-orange-800/50 transition-all">
                <i class="fas fa-archive mr-2"></i>Arsip Pengumuman
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['500+','Pengumuman'],['Real-time','Update'],['Semua','Jenjang'],['Multi','Channel']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Pengumuman Terbaru --}}
<section class="py-20" id="terbaru">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Pengumuman <span class="teks-gradien">Terbaru</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Informasi penting yang perlu Anda ketahui terkait kegiatan dan kebijakan terkini.</p>
        </div>
        <div class="space-y-4">
            @php
            $pengumuman = [
                ['judul'=>'Pendaftaran Semester Genap 2026/2027 Dibuka','kategori'=>'Akademik','tgl'=>'20 Feb 2026','prioritas'=>'Penting','color'=>'red','desc'=>'Pendaftaran mata kuliah semester genap dibuka mulai 20 Februari hingga 5 Maret 2026. Pastikan KRS sudah diisi lengkap.','icon'=>'fa-exclamation-circle'],
                ['judul'=>'Jadwal UTS Semester Genap 2026/2027','kategori'=>'Ujian','tgl'=>'18 Feb 2026','prioritas'=>'Penting','color'=>'orange','desc'=>'Ujian Tengah Semester dijadwalkan pada 20 April - 2 Mei 2026. Jadwal detail per mata kuliah tersedia di portal.','icon'=>'fa-calendar-check'],
                ['judul'=>'Beasiswa Prestasi Akademik Batch 2','kategori'=>'Beasiswa','tgl'=>'15 Feb 2026','prioritas'=>'Info','color'=>'green','desc'=>'Pendaftaran beasiswa prestasi akademik batch 2 dibuka untuk mahasiswa dengan IPK minimal 3.5.','icon'=>'fa-award'],
                ['judul'=>'Maintenance Server Platform E-Learning','kategori'=>'Teknis','tgl'=>'12 Feb 2026','prioritas'=>'Info','color'=>'kvt','desc'=>'Pemeliharaan server dijadwalkan pada 28 Februari 2026 pukul 00:00-06:00 WIB. Akses platform sementara terganggu.','icon'=>'fa-tools'],
                ['judul'=>'Lomba Karya Tulis Ilmiah Nasional','kategori'=>'Kompetisi','tgl'=>'10 Feb 2026','prioritas'=>'Umum','color'=>'purple','desc'=>'KVT Hub menyelenggarakan LKTI Nasional dengan total hadiah 50 juta rupiah. Pendaftaran hingga 15 Maret 2026.','icon'=>'fa-pen-fancy'],
                ['judul'=>'Workshop Persiapan Karir & Interview','kategori'=>'Event','tgl'=>'8 Feb 2026','prioritas'=>'Umum','color'=>'teal','desc'=>'Career Development Center mengadakan workshop gratis untuk mempersiapkan mahasiswa menghadapi dunia kerja.','icon'=>'fa-briefcase'],
            ];
            @endphp
            @foreach($pengumuman as $p)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $p['color'] }}-500/30 transition-all card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                <div class="flex flex-col md:flex-row md:items-start gap-4">
                    <div class="w-12 h-12 bg-{{ $p['color'] }}-500/10 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas {{ $p['icon'] }} text-{{ $p['color'] }}-400 text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-2 mb-2">
                            <span class="text-[10px] font-bold text-{{ $p['color'] }}-400 bg-{{ $p['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $p['kategori'] }}</span>
                            <span class="text-[10px] font-bold text-white bg-{{ $p['color'] }}-500/30 px-3 py-1 rounded-full uppercase">{{ $p['prioritas'] }}</span>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-2">{{ $p['judul'] }}</h3>
                        <p class="text-gray-500 text-sm mb-3">{{ $p['desc'] }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 text-xs"><i class="fas fa-calendar mr-1"></i>{{ $p['tgl'] }}</span>
                            <span class="text-{{ $p['color'] }}-400 text-sm font-semibold cursor-pointer hover:underline">Selengkapnya <i class="fas fa-arrow-right ml-1"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Pengumuman --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kategori <span class="teks-gradien">Pengumuman</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Filter pengumuman berdasarkan kategori untuk menemukan informasi yang relevan.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $kategori = [
                ['icon'=>'fa-graduation-cap','judul'=>'Akademik','total'=>'180 pengumuman','color'=>'red','desc'=>'Jadwal kuliah, KRS, UTS, UAS, dan wisuda'],
                ['icon'=>'fa-hand-holding-usd','judul'=>'Beasiswa','total'=>'75 pengumuman','color'=>'green','desc'=>'Beasiswa internal, eksternal, dan bantuan biaya'],
                ['icon'=>'fa-calendar-alt','judul'=>'Event & Kegiatan','total'=>'120 pengumuman','color'=>'kvt','desc'=>'Seminar, workshop, lomba, dan kegiatan kampus'],
                ['icon'=>'fa-cog','judul'=>'Teknis & Sistem','total'=>'45 pengumuman','color'=>'orange','desc'=>'Maintenance, update fitur, dan informasi teknis'],
            ];
            @endphp
            @foreach($kategori as $k)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $k['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-14 h-14 bg-{{ $k['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $k['icon'] }} text-{{ $k['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-1">{{ $k['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-3">{{ $k['desc'] }}</p>
                <span class="text-{{ $k['color'] }}-400 text-xs font-semibold">{{ $k['total'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Arsip Pengumuman --}}
<section class="py-20" id="arsip">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Arsip <span class="teks-gradien">Pengumuman</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Akses pengumuman lama berdasarkan periode waktu untuk referensi dan dokumentasi.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
            $arsip = [
                ['periode'=>'Februari 2026','total'=>'28 pengumuman','icon'=>'fa-folder-open','color'=>'red'],
                ['periode'=>'Januari 2026','total'=>'35 pengumuman','icon'=>'fa-folder','color'=>'orange'],
                ['periode'=>'Desember 2025','total'=>'22 pengumuman','icon'=>'fa-folder','color'=>'amber'],
                ['periode'=>'November 2025','total'=>'31 pengumuman','icon'=>'fa-folder','color'=>'green'],
                ['periode'=>'Oktober 2025','total'=>'27 pengumuman','icon'=>'fa-folder','color'=>'kvt'],
                ['periode'=>'September 2025','total'=>'40 pengumuman','icon'=>'fa-folder','color'=>'purple'],
            ];
            @endphp
            @foreach($arsip as $a)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-5 flex items-center gap-4 hover:border-{{ $a['color'] }}-500/30 transition-all card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-12 h-12 bg-{{ $a['color'] }}-500/10 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas {{ $a['icon'] }} text-{{ $a['color'] }}-400 text-lg"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-white font-bold">{{ $a['periode'] }}</h3>
                    <p class="text-gray-500 text-xs">{{ $a['total'] }}</p>
                </div>
                <i class="fas fa-chevron-right text-gray-600"></i>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Notifikasi Settings --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Pengaturan <span class="teks-gradien">Notifikasi</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pilih channel notifikasi agar Anda tidak ketinggalan pengumuman penting.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-6">
            @php
            $notif = [
                ['icon'=>'fa-envelope','judul'=>'Email Notification','desc'=>'Terima pengumuman langsung di inbox email Anda. Ringkasan harian atau mingguan tersedia.','color'=>'red'],
                ['icon'=>'fa-mobile-alt','judul'=>'Push Notification','desc'=>'Notifikasi instan di smartphone melalui aplikasi KVT Hub. Real-time alert untuk info penting.','color'=>'orange'],
                ['icon'=>'fa-comment-dots','judul'=>'WhatsApp & Telegram','desc'=>'Bergabung dengan grup broadcast resmi untuk mendapatkan update melalui chat messenger.','color'=>'green'],
                ['icon'=>'fa-rss','judul'=>'RSS Feed','desc'=>'Subscribe RSS feed untuk integrasi dengan pembaca berita atau agregator konten pilihan Anda.','color'=>'kvt'],
            ];
            @endphp
            @foreach($notif as $n)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 flex items-start gap-4 hover:border-{{ $n['color'] }}-500/30 transition-all card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-12 h-12 bg-{{ $n['color'] }}-500/10 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas {{ $n['icon'] }} text-{{ $n['color'] }}-400 text-lg"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold mb-1">{{ $n['judul'] }}</h3>
                    <p class="text-gray-500 text-sm mb-3">{{ $n['desc'] }}</p>
                    <button class="text-{{ $n['color'] }}-400 text-sm font-semibold hover:underline">Aktifkan <i class="fas fa-toggle-on ml-1"></i></button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-red-800/50 to-kvt-900/50 border border-red-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Jangan Lewatkan <span class="teks-gradien">Info Penting</span></h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Daftar sekarang untuk mendapatkan akses penuh ke seluruh pengumuman dan notifikasi real-time.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-orange-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-red-500/30 transition-all">
                    <i class="fas fa-bell"></i> Aktifkan Notifikasi
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-info-circle"></i> Tentang KVT Hub
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
