@extends('tata-letak.utama')
@section('judul', 'Kalender Akademik - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-cyan-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 left-1/4 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 right-10 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #06B6D4 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-cyan-800/30 border border-cyan-600/30 rounded-full px-4 py-1.5 text-xs text-cyan-300 mb-6" data-aos="fade-down">
            <i class="fas fa-calendar-alt"></i> Tahun Akademik 2025/2026
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Kalender</span><br>
            <span class="teks-gradien">Akademik 2025/2026</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Kalender akademik lengkap dengan jadwal ujian, hari libur nasional, kegiatan sekolah,
            dan event pendidikan penting sepanjang tahun ajaran 2025/2026.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-400 hover:to-blue-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-cyan-500/30 hover:-translate-y-0.5">
                <i class="fas fa-download mr-2"></i>Download Kalender
            </a>
            <a href="#semester-ganjil" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-calendar-week mr-2"></i>Lihat Timeline
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">2</div><div class="text-xs text-gray-500">Semester</div></div>
            <div><div class="text-2xl font-black text-white">42</div><div class="text-xs text-gray-500">Minggu Efektif</div></div>
            <div><div class="text-2xl font-black text-white">24</div><div class="text-xs text-gray-500">Hari Libur</div></div>
            <div><div class="text-2xl font-black text-white">15+</div><div class="text-xs text-gray-500">Event</div></div>
        </div>
    </div>
</section>

{{-- TIMELINE SEMESTER --}}
<section id="semester-ganjil" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">TIMELINE</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Timeline Semester Ganjil & Genap</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Rangkuman kegiatan utama di setiap bulan tahun akademik</p>
    </div>
    @php $timeline = [
        ['bulan'=>'Juli 2025','warna'=>'blue','events'=>[
            ['ikon'=>'fas fa-user-plus','judul'=>'PPDB Online','tgl'=>'1 - 15 Jul','desc'=>'Penerimaan Peserta Didik Baru jalur zonasi, prestasi, dan afirmasi.'],
            ['ikon'=>'fas fa-school','judul'=>'MPLS','tgl'=>'21 - 23 Jul','desc'=>'Masa Pengenalan Lingkungan Sekolah bagi siswa baru.'],
        ]],
        ['bulan'=>'Agustus 2025','warna'=>'red','events'=>[
            ['ikon'=>'fas fa-flag','judul'=>'HUT RI ke-80','tgl'=>'17 Agt','desc'=>'Hari Kemerdekaan RI — upacara bendera & lomba 17-an.'],
            ['ikon'=>'fas fa-book-open','judul'=>'Awal KBM Efektif','tgl'=>'4 Agt','desc'=>'Mulai kegiatan belajar mengajar efektif semester ganjil.'],
        ]],
        ['bulan'=>'Oktober 2025','warna'=>'amber','events'=>[
            ['ikon'=>'fas fa-edit','judul'=>'UTS Semester Ganjil','tgl'=>'6 - 17 Okt','desc'=>'Ujian Tengah Semester untuk evaluasi tengah semester.'],
            ['ikon'=>'fas fa-trophy','judul'=>'Olimpiade Sains','tgl'=>'20 - 24 Okt','desc'=>'Seleksi OSN tingkat kabupaten/kota.'],
        ]],
        ['bulan'=>'Desember 2025','warna'=>'green','events'=>[
            ['ikon'=>'fas fa-file-alt','judul'=>'UAS Semester Ganjil','tgl'=>'1 - 12 Des','desc'=>'Ujian Akhir Semester ganjil semua mata pelajaran.'],
            ['ikon'=>'fas fa-gift','judul'=>'Libur Winter Break','tgl'=>'22 Des - 3 Jan','desc'=>'Libur akhir semester & Natal tahun baru.'],
        ]],
    ]; @endphp
    <div class="space-y-6">
        @foreach($timeline as $t)
        <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition" data-aos="fade-up">
            <h3 class="text-white font-bold text-xl mb-4 flex items-center gap-2">
                <span class="w-10 h-10 bg-{{ $t['warna'] }}-500/20 rounded-lg flex items-center justify-center"><i class="fas fa-calendar text-{{ $t['warna'] }}-400"></i></span>
                {{ $t['bulan'] }}
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($t['events'] as $e)
                <div class="flex items-start gap-4 bg-kvt-800/30 rounded-xl p-4">
                    <div class="w-10 h-10 bg-{{ $t['warna'] }}-500/10 rounded-lg flex items-center justify-center flex-shrink-0"><i class="{{ $e['ikon'] }} text-{{ $t['warna'] }}-400"></i></div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <h4 class="text-white font-semibold text-sm">{{ $e['judul'] }}</h4>
                            <span class="text-xs bg-{{ $t['warna'] }}-500/10 text-{{ $t['warna'] }}-400 px-2 py-0.5 rounded-full font-mono">{{ $e['tgl'] }}</span>
                        </div>
                        <p class="text-gray-400 text-xs">{{ $e['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- TANGGAL PENTING --}}
<section class="bg-gradient-to-br from-cyan-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">PENTING</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Tanggal-Tanggal Penting</h2>
        </div>
        @php $penting = [
            ['ikon'=>'fas fa-user-plus','warna'=>'blue','judul'=>'PPDB Online','tgl'=>'1 - 15 Juli 2025','desc'=>'Pendaftaran peserta didik baru via portal online'],
            ['ikon'=>'fas fa-book-reader','warna'=>'green','judul'=>'Awal Semester Ganjil','tgl'=>'4 Agustus 2025','desc'=>'Hari pertama KBM semester ganjil'],
            ['ikon'=>'fas fa-edit','warna'=>'amber','judul'=>'UTS Ganjil','tgl'=>'6 - 17 Oktober 2025','desc'=>'Ujian tengah semester ganjil'],
            ['ikon'=>'fas fa-file-alt','warna'=>'red','judul'=>'UAS Ganjil','tgl'=>'1 - 12 Desember 2025','desc'=>'Ujian akhir semester ganjil'],
            ['ikon'=>'fas fa-play-circle','warna'=>'teal','judul'=>'Awal Semester Genap','tgl'=>'5 Januari 2026','desc'=>'Hari pertama KBM semester genap'],
            ['ikon'=>'fas fa-pen-fancy','warna'=>'indigo','judul'=>'UTS Genap','tgl'=>'2 - 13 Maret 2026','desc'=>'Ujian tengah semester genap'],
            ['ikon'=>'fas fa-pencil-alt','warna'=>'purple','judul'=>'SNBT / UTBK','tgl'=>'20 April - 8 Mei 2026','desc'=>'Seleksi Nasional Berdasarkan Tes'],
            ['ikon'=>'fas fa-graduation-cap','warna'=>'cyan','judul'=>'Wisuda & Pelepasan','tgl'=>'20 Juni 2026','desc'=>'Upacara wisuda dan pelepasan siswa'],
        ]; @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($penting as $p)
            <div class="kaca rounded-xl p-5 border-{{ $p['warna'] }}-500/20 hover:border-{{ $p['warna'] }}-500/40 transition text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="w-12 h-12 bg-{{ $p['warna'] }}-500/20 rounded-full flex items-center justify-center mx-auto mb-3"><i class="{{ $p['ikon'] }} text-{{ $p['warna'] }}-400 text-lg"></i></div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $p['judul'] }}</h4>
                <span class="text-{{ $p['warna'] }}-400 text-xs font-mono block mb-2">{{ $p['tgl'] }}</span>
                <p class="text-gray-500 text-xs">{{ $p['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- JADWAL UJIAN --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">UJIAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Jadwal Ujian Tahun Akademik</h2>
    </div>
    <div class="kaca rounded-2xl overflow-hidden border-purple-500/20" data-aos="fade-up" data-aos-delay="100">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="bg-purple-500/10 text-purple-300">
                    <th class="px-6 py-4 text-left font-semibold">Jenis Ujian</th>
                    <th class="px-6 py-4 text-left font-semibold">Jenjang</th>
                    <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                    <th class="px-6 py-4 text-left font-semibold">Status</th>
                </tr></thead>
                <tbody class="divide-y divide-kvt-800/50">
                    @php $ujian = [
                        ['jenis'=>'UTS Semester Ganjil','jenjang'=>'Semua Jenjang','tgl'=>'6 - 17 Okt 2025','status'=>'Terjadwal','warna'=>'blue'],
                        ['jenis'=>'UAS Semester Ganjil','jenjang'=>'Semua Jenjang','tgl'=>'1 - 12 Des 2025','status'=>'Terjadwal','warna'=>'blue'],
                        ['jenis'=>'UTS Semester Genap','jenjang'=>'Semua Jenjang','tgl'=>'2 - 13 Mar 2026','status'=>'Terjadwal','warna'=>'amber'],
                        ['jenis'=>'ANBK (Asesmen Nasional)','jenjang'=>'SD, SMP, SMA','tgl'=>'Mar - Apr 2026','status'=>'Terjadwal','warna'=>'amber'],
                        ['jenis'=>'SNBT / UTBK Gelombang 1','jenjang'=>'SMA/MA/SMK','tgl'=>'20 Apr - 8 Mei 2026','status'=>'Terjadwal','warna'=>'amber'],
                        ['jenis'=>'UAS Semester Genap','jenjang'=>'Semua Jenjang','tgl'=>'1 - 12 Jun 2026','status'=>'Terjadwal','warna'=>'green'],
                        ['jenis'=>'Uji Kompetensi Keahlian','jenjang'=>'SMK','tgl'=>'23 Feb - 6 Mar 2026','status'=>'Terjadwal','warna'=>'amber'],
                    ]; @endphp
                    @foreach($ujian as $u)
                    <tr class="hover:bg-kvt-800/30 transition">
                        <td class="px-6 py-3 text-white font-medium">{{ $u['jenis'] }}</td>
                        <td class="px-6 py-3 text-gray-400">{{ $u['jenjang'] }}</td>
                        <td class="px-6 py-3 text-gray-300 font-mono text-xs">{{ $u['tgl'] }}</td>
                        <td class="px-6 py-3"><span class="bg-{{ $u['warna'] }}-500/10 text-{{ $u['warna'] }}-400 text-xs px-3 py-1 rounded-full">{{ $u['status'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- HARI LIBUR --}}
<section class="bg-gradient-to-br from-green-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">LIBUR</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Hari Libur Nasional & Cuti Bersama</h2>
        </div>
        @php $libur = [
            ['tgl'=>'17 Agt 2025','nama'=>'Hari Kemerdekaan RI','warna'=>'red'],
            ['tgl'=>'27 Sep 2025','nama'=>'Maulid Nabi Muhammad SAW','warna'=>'green'],
            ['tgl'=>'25 Des 2025','nama'=>'Hari Raya Natal','warna'=>'red'],
            ['tgl'=>'1 Jan 2026','nama'=>'Tahun Baru 2026','warna'=>'blue'],
            ['tgl'=>'29 Jan 2026','nama'=>'Tahun Baru Imlek','warna'=>'amber'],
            ['tgl'=>'20 Mar 2026','nama'=>'Hari Raya Nyepi','warna'=>'purple'],
            ['tgl'=>'20 - 21 Mar 2026','nama'=>'Hari Raya Idul Fitri','warna'=>'green'],
            ['tgl'=>'2 Apr 2026','nama'=>'Wafat Isa Al-Masih','warna'=>'indigo'],
            ['tgl'=>'1 Mei 2026','nama'=>'Hari Buruh','warna'=>'red'],
            ['tgl'=>'12 Mei 2026','nama'=>'Kenaikan Isa Al-Masih','warna'=>'cyan'],
            ['tgl'=>'29 Mei 2026','nama'=>'Hari Raya Waisak','warna'=>'amber'],
            ['tgl'=>'1 Jun 2026','nama'=>'Hari Lahir Pancasila','warna'=>'teal'],
        ]; @endphp
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($libur as $l)
            <div class="kaca rounded-xl p-4 border-{{ $l['warna'] }}-500/20 hover:border-{{ $l['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 30 }}">
                <span class="text-{{ $l['warna'] }}-400 text-xs font-mono font-bold block mb-1">{{ $l['tgl'] }}</span>
                <span class="text-gray-300 text-sm">{{ $l['nama'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kelola Kalender Sesuai Peran</h2>
    </div>
    @php $roles = [
        ['ikon'=>'fas fa-user','warna'=>'cyan','gradien'=>'from-cyan-500 to-blue-500','peran'=>'Siswa','fitur'=>['Lihat jadwal ujian & kegiatan','Sinkronisasi ke Google Calendar','Notifikasi H-7 sebelum ujian','Download kalender PDF','Set reminder deadline tugas','Lihat countdown hari penting']],
        ['ikon'=>'fas fa-chalkboard-teacher','warna'=>'green','gradien'=>'from-green-500 to-teal-500','peran'=>'Guru / Dosen','fitur'=>['Tambah event kelas & remedial','Atur jadwal ujian mata pelajaran','Kirim pengumuman ke siswa','Kelola jadwal konsultasi','Input tanggal pengumpulan tugas','Laporan kehadiran per event']],
        ['ikon'=>'fas fa-user-shield','warna'=>'red','gradien'=>'from-red-500 to-rose-500','peran'=>'Admin Sekolah','fitur'=>['Kelola kalender akademik resmi','Publish jadwal ujian sekolah','Atur cuti bersama & libur khusus','Dashboard statistik kehadiran','Broadcast pengumuman massal','Cetak kalender tahunan']],
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

{{-- CTA --}}
<section class="bg-gradient-to-r from-cyan-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Sinkronisasi Kalender Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar untuk mendapatkan akses kalender akademik interaktif, notifikasi otomatis, dan sinkronisasi ke Google Calendar.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-cyan-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-calendar-check"></i> Sinkronisasi Sekarang
        </a>
    </div>
</section>

@endsection
