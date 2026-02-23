@extends('tata-letak.utama')
@section('judul', 'Konsultasi Akademik - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-teal-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%2314B8A6%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-teal-800/40 border border-teal-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-headset text-teal-400"></i>
            <span class="text-teal-300 text-sm font-semibold">Bimbingan Personal & Grup</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Konsultasi <span class="teks-gradien">Akademik</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Dapatkan bimbingan langsung dari konsultan berpengalaman untuk mendukung perjalanan akademik Anda. Tersedia 24/7 secara online maupun tatap muka.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#layanan" class="bg-gradient-to-r from-teal-600 to-teal-400 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-teal-500/30 transition-all">
                <i class="fas fa-calendar-check mr-2"></i>Booking Sesi
            </a>
            <a href="#konsultan" class="border border-teal-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-teal-800/50 transition-all">
                <i class="fas fa-user-tie mr-2"></i>Lihat Konsultan
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['200+','Konsultan'],['10K+','Sesi Selesai'],['4.9/5','Rating'],['24/7','Available']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Layanan Konsultasi --}}
<section class="py-20" id="layanan">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Layanan <span class="teks-gradien">Konsultasi</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Berbagai layanan konsultasi akademik yang dirancang untuk membantu Anda meraih prestasi terbaik.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $layanan = [
                ['icon'=>'fa-book-reader','color'=>'teal','judul'=>'Bimbingan Skripsi & Tesis','desc'=>'Pendampingan penuh dari proposal hingga sidang akhir dengan mentor berpengalaman','durasi'=>'60 menit/sesi'],
                ['icon'=>'fa-brain','color'=>'purple','judul'=>'Konseling Karir Akademik','desc'=>'Perencanaan jalur akademik, beasiswa, dan studi lanjut ke luar negeri','durasi'=>'45 menit/sesi'],
                ['icon'=>'fa-chalkboard-teacher','color'=>'kvt','judul'=>'Tutoring Mata Kuliah','desc'=>'Bimbingan intensif per mata kuliah dengan tutor terbaik di bidangnya','durasi'=>'90 menit/sesi'],
                ['icon'=>'fa-file-alt','color'=>'amber','judul'=>'Review Jurnal & Paper','desc'=>'Proofreading, review metodologi, dan bimbingan publikasi jurnal internasional','durasi'=>'30 menit/sesi'],
                ['icon'=>'fa-users','color'=>'pink','judul'=>'Diskusi Grup Studi','desc'=>'Sesi diskusi kelompok kecil dengan fasilitator ahli untuk pemahaman mendalam','durasi'=>'120 menit/sesi'],
                ['icon'=>'fa-laptop-medical','color'=>'green','judul'=>'Konsultasi Online 24/7','desc'=>'Chat langsung dengan konsultan kapan saja melalui platform terintegrasi','durasi'=>'Fleksibel'],
            ];
            @endphp
            @foreach($layanan as $l)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $l['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $l['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $l['icon'] }} text-{{ $l['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $l['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $l['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-{{ $l['color'] }}-400 text-xs font-semibold"><i class="fas fa-clock mr-1"></i>{{ $l['durasi'] }}</span>
                    <i class="fas fa-arrow-right text-gray-600 group-hover:text-{{ $l['color'] }}-400 transition"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Konsultan Unggulan --}}
<section class="py-20 bg-kvt-900/30" id="konsultan">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Konsultan <span class="teks-gradien">Unggulan</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Tim konsultan kami terdiri dari akademisi dan praktisi berpengalaman di bidangnya masing-masing.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $konsultan = [
                ['nama'=>'Dr. Rina Hartati, M.Pd','bidang'=>'Pendidikan & Kurikulum','rating'=>'4.9','sesi'=>'1.2K sesi','color'=>'teal'],
                ['nama'=>'Prof. Ahmad Fauzi','bidang'=>'Teknik Informatika','rating'=>'4.9','sesi'=>'980 sesi','color'=>'kvt'],
                ['nama'=>'Dr. Maya Sari, M.Sc','bidang'=>'Matematika & Statistika','rating'=>'4.8','sesi'=>'850 sesi','color'=>'purple'],
                ['nama'=>'Dr. Budi Wicaksono','bidang'=>'Manajemen & Bisnis','rating'=>'4.9','sesi'=>'1.5K sesi','color'=>'green'],
            ];
            @endphp
            @foreach($konsultan as $k)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-20 h-20 bg-{{ $k['color'] }}-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-graduate text-{{ $k['color'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold mb-1">{{ $k['nama'] }}</h3>
                <p class="text-gray-500 text-sm mb-3">{{ $k['bidang'] }}</p>
                <div class="flex items-center justify-center gap-3 text-xs">
                    <span class="text-amber-400"><i class="fas fa-star mr-1"></i>{{ $k['rating'] }}</span>
                    <span class="text-gray-600">|</span>
                    <span class="text-gray-400">{{ $k['sesi'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Cara Booking --}}
<section class="py-20">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Cara <span class="teks-gradien">Booking</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Proses booking konsultasi mudah dan cepat hanya dalam 4 langkah.</p>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            @php
            $langkah = [
                ['step'=>'01','judul'=>'Pilih Layanan','desc'=>'Tentukan jenis konsultasi yang Anda butuhkan','icon'=>'fa-hand-pointer'],
                ['step'=>'02','judul'=>'Pilih Konsultan','desc'=>'Pilih konsultan sesuai bidang keahlian','icon'=>'fa-user-check'],
                ['step'=>'03','judul'=>'Jadwalkan Sesi','desc'=>'Tentukan tanggal dan waktu yang sesuai','icon'=>'fa-calendar-alt'],
                ['step'=>'04','judul'=>'Mulai Konsultasi','desc'=>'Bergabung via video call atau tatap muka','icon'=>'fa-video'],
            ];
            @endphp
            @foreach($langkah as $l)
            <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-16 h-16 bg-teal-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-teal-500/20">
                    <i class="fas {{ $l['icon'] }} text-teal-400 text-xl"></i>
                </div>
                <div class="text-teal-400 text-xs font-bold mb-2">STEP {{ $l['step'] }}</div>
                <h3 class="text-white font-bold mb-2">{{ $l['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimoni --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Apa Kata <span class="teks-gradien">Mereka</span></h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
            $testimoni = [
                ['nama'=>'Anisa Rahma','peran'=>'Mahasiswa S1 Teknik','teks'=>'Konsultasi skripsi di KVT Hub sangat membantu. Dosen pembimbing saya sampai kagum dengan perbaikan yang saya lakukan setelah sesi konsultasi.','rating'=>5],
                ['nama'=>'Rizky Pratama','peran'=>'Mahasiswa S2 Pendidikan','teks'=>'Platform yang luar biasa! Konsultan sangat responsif dan sesi bisa dijadwalkan kapan saja. Sangat fleksibel untuk mahasiswa bekerja.','rating'=>5],
                ['nama'=>'Dewi Lestari','peran'=>'Mahasiswa S1 Farmasi','teks'=>'Tutoring mata kuliah di sini sangat berbeda. Penjelasannya detail dan sabar. Nilai saya naik signifikan dalam satu semester.','rating'=>5],
            ];
            @endphp
            @foreach($testimoni as $t)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex items-center gap-1 mb-4">
                    @for($i = 0; $i < $t['rating']; $i++)
                    <i class="fas fa-star text-amber-400 text-sm"></i>
                    @endfor
                </div>
                <p class="text-gray-400 text-sm mb-5 italic">"{{ $t['teks'] }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-teal-500/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-teal-400 text-sm"></i>
                    </div>
                    <div>
                        <div class="text-white text-sm font-bold">{{ $t['nama'] }}</div>
                        <div class="text-gray-500 text-xs">{{ $t['peran'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-teal-800/50 to-kvt-900/50 border border-teal-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Siap Meningkatkan <span class="teks-gradien">Prestasi Akademik</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Daftarkan diri Anda sekarang dan dapatkan sesi konsultasi pertama gratis bersama konsultan pilihan.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-teal-500 to-kvt-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-teal-500/30 transition-all">
                    <i class="fas fa-rocket"></i> Mulai Konsultasi
                </a>
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
