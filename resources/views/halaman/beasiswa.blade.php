@extends('tata-letak.utama')
@section('judul', 'Program Beasiswa - KVT Hub')
@section('konten')

<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-amber-900/20 via-kvt-950 to-kvt-950"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-500/20 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-award text-amber-400"></i>
            <span class="text-amber-300 text-sm font-semibold">Pendanaan Pendidikan</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6">Program <span class="teks-gradien-emas">Beasiswa</span></h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Raih kesempatan emas mendapatkan beasiswa penuh dan parsial dari KVT Hub. Tersedia untuk semua jenjang pendidikan.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#jenis" class="bg-gradient-to-r from-amber-500 to-orange-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-amber-500/30 transition-all">
                <i class="fas fa-graduation-cap mr-2"></i>Lihat Beasiswa
            </a>
            <a href="#syarat" class="border border-amber-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-amber-800/20 transition-all">
                <i class="fas fa-clipboard-list mr-2"></i>Persyaratan
            </a>
        </div>
    </div>
</section>

<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['500+','Penerima/Tahun'],['15B+','Dana Tersalurkan'],['50+','Mitra Sponsor'],['100%','Transparan']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien-emas">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20" id="jenis">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Jenis <span class="teks-gradien-emas">Beasiswa</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Berbagai program beasiswa untuk mendukung perjalanan pendidikan Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $beasiswas = [
                ['icon'=>'fa-trophy','color'=>'amber','judul'=>'Beasiswa Prestasi','desc'=>'Untuk pelajar dengan prestasi akademik & non-akademik luar biasa','benefit'=>'SPP 100% + Buku + Laptop'],
                ['icon'=>'fa-hand-holding-heart','color'=>'green','judul'=>'Beasiswa Ekonomi','desc'=>'Bantuan pendidikan bagi keluarga kurang mampu','benefit'=>'SPP 100% + Biaya Hidup'],
                ['icon'=>'fa-microscope','color'=>'purple','judul'=>'Beasiswa Riset','desc'=>'Pendanaan untuk mahasiswa yang aktif dalam penelitian','benefit'=>'Dana Riset + Publikasi'],
                ['icon'=>'fa-globe-americas','color'=>'kvt','judul'=>'Beasiswa Internasional','desc'=>'Kesempatan belajar di universitas mitra luar negeri','benefit'=>'Full Ride + Visa + Akomodasi'],
                ['icon'=>'fa-laptop-code','color'=>'cyan','judul'=>'Beasiswa Tech Talent','desc'=>'Khusus bidang teknologi, AI, dan digital','benefit'=>'Bootcamp + Sertifikasi + Karir'],
                ['icon'=>'fa-paint-brush','color'=>'pink','judul'=>'Beasiswa Seni & Budaya','desc'=>'Untuk talenta di bidang seni dan kebudayaan','benefit'=>'Studio + Pameran + Mentoring'],
            ];
            @endphp
            @foreach($beasiswas as $b)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $b['color'] }}-500/30 transition-all card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $b['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas {{ $b['icon'] }} text-{{ $b['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $b['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $b['desc'] }}</p>
                <div class="bg-{{ $b['color'] }}-500/5 border border-{{ $b['color'] }}-500/10 rounded-xl px-4 py-2 text-{{ $b['color'] }}-400 text-xs font-semibold">
                    <i class="fas fa-gift mr-1"></i> {{ $b['benefit'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-kvt-900/30" id="syarat">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-black mb-12">Persyaratan <span class="teks-gradien-emas">Umum</span></h2>
        <div class="grid md:grid-cols-2 gap-4 text-left">
            @php $syarats = ['WNI atau WNA yang terdaftar di KVT Hub','IPK minimal 3.0 (atau setara)','Aktif dalam kegiatan akademik / non-akademik','Surat rekomendasi dari dosen/guru','Essay motivasi (500-1000 kata)','Tidak sedang menerima beasiswa lain','Bersedia mengikuti program mentoring','Lolos seleksi administrasi & wawancara']; @endphp
            @foreach($syarats as $s)
            <div class="flex items-start gap-3 bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="w-6 h-6 bg-amber-500/10 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                    <i class="fas fa-check text-amber-400 text-[10px]"></i>
                </div>
                <span class="text-gray-300 text-sm">{{ $s }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Timeline Seleksi --}}
<section class="py-20" id="timeline">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Alur <span class="teks-gradien-emas">Seleksi</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Proses seleksi beasiswa dari awal hingga pengumuman</p>
        </div>
        <div class="relative">
            <div class="absolute left-1/2 top-0 bottom-0 w-px bg-amber-700/20 hidden md:block"></div>
            @php
                $timeline = [
                    ['step' => '01', 'judul' => 'Pendaftaran Online', 'desc' => 'Isi formulir pendaftaran beasiswa melalui portal KVT Hub dan upload dokumen persyaratan', 'durasi' => '1-2 Minggu', 'ikon' => 'fa-clipboard-list'],
                    ['step' => '02', 'judul' => 'Verifikasi Dokumen', 'desc' => 'Tim verifikasi mengecek kelengkapan dan keabsahan semua dokumen yang diupload', 'durasi' => '1 Minggu', 'ikon' => 'fa-search'],
                    ['step' => '03', 'judul' => 'Seleksi Administrasi', 'desc' => 'Penilaian berdasarkan IPK, prestasi, essay motivasi, dan kelengkapan berkas', 'durasi' => '2 Minggu', 'ikon' => 'fa-filter'],
                    ['step' => '04', 'judul' => 'Wawancara', 'desc' => 'Kandidat terpilih diundang wawancara online via Zoom dengan panel seleksi', 'durasi' => '1 Minggu', 'ikon' => 'fa-video'],
                    ['step' => '05', 'judul' => 'Pengumuman', 'desc' => 'Hasil seleksi diumumkan melalui email dan portal. Penerima beasiswa menandatangani kontrak', 'durasi' => 'D-Day', 'ikon' => 'fa-trophy'],
                ];
            @endphp
            @foreach($timeline as $i => $t)
                <div class="relative flex items-center gap-8 mb-8 {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}" data-aos="{{ $i % 2 === 0 ? 'fade-right' : 'fade-left' }}">
                    <div class="flex-1 {{ $i % 2 === 0 ? 'md:text-right' : 'md:text-left' }}">
                        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-amber-500/20 transition">
                            <div class="flex items-center gap-2 {{ $i % 2 === 0 ? 'md:justify-end' : '' }} mb-2">
                                <span class="bg-amber-500/10 text-amber-400 text-xs font-bold px-3 py-1 rounded-full">Step {{ $t['step'] }}</span>
                                <span class="text-gray-600 text-xs">{{ $t['durasi'] }}</span>
                            </div>
                            <h3 class="text-white font-bold text-lg">{{ $t['judul'] }}</h3>
                            <p class="text-gray-500 text-sm mt-1">{{ $t['desc'] }}</p>
                        </div>
                    </div>
                    <div class="hidden md:flex w-12 h-12 bg-amber-500/10 border-2 border-amber-500/20 rounded-full items-center justify-center shrink-0 z-10">
                        <i class="fas {{ $t['ikon'] }} text-amber-400 text-sm"></i>
                    </div>
                    <div class="flex-1 hidden md:block"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimoni Penerima --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Cerita <span class="teks-gradien-emas">Penerima</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Kisah inspiratif dari para penerima beasiswa KVT Hub</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
                $testimoni = [
                    ['nama' => 'Rina Widyastuti', 'jurusan' => 'S1 Teknik Informatika', 'beasiswa' => 'Beasiswa Prestasi', 'teks' => 'Berkat beasiswa KVT Hub, saya bisa fokus belajar tanpa khawatir biaya kuliah. Sekarang saya bekerja di salah satu startup unicorn!', 'tahun' => '2024'],
                    ['nama' => 'Ahmad Fauzan', 'jurusan' => 'S2 Data Science', 'beasiswa' => 'Beasiswa Riset', 'teks' => 'Dana riset dari KVT Hub memungkinkan saya mempublikasikan 3 paper di jurnal internasional. Pengalaman yang sangat berharga!', 'tahun' => '2024'],
                    ['nama' => 'Maya Putri', 'jurusan' => 'SMK Multimedia', 'beasiswa' => 'Beasiswa Tech Talent', 'teks' => 'Program bootcamp + sertifikasi mengubah hidup saya. Dari siswa SMK biasa, sekarang saya sudah freelance sebagai UI/UX designer!', 'tahun' => '2025'],
                ];
            @endphp
            @foreach($testimoni as $i => $tes)
                <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-amber-500/20 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="flex gap-1 mb-4">
                        @for($s = 0; $s < 5; $s++) <i class="fas fa-star text-amber-400 text-sm"></i> @endfor
                    </div>
                    <p class="text-gray-300 text-sm italic mb-6">"{{ $tes['teks'] }}"</p>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                            {{ strtoupper(substr($tes['nama'], 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-white font-semibold text-sm">{{ $tes['nama'] }}</div>
                            <div class="text-gray-500 text-xs">{{ $tes['jurusan'] }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="bg-amber-500/10 text-amber-400 text-xs px-3 py-1 rounded-full font-semibold">{{ $tes['beasiswa'] }}</span>
                        <span class="text-gray-600 text-xs">{{ $tes['tahun'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ Beasiswa --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-4">FAQ <span class="teks-gradien-emas">Beasiswa</span></h2>
        </div>
        @php
            $faqBeasiswa = [
                ['q' => 'Kapan periode pendaftaran beasiswa?', 'a' => 'Pendaftaran dibuka 2 kali setahun: Periode 1 (Januari-Maret) dan Periode 2 (Juli-September). Pengumuman 1 bulan setelah pendaftaran tutup.'],
                ['q' => 'Apakah bisa mendaftar lebih dari satu jenis?', 'a' => 'Ya, Anda bisa mendaftar maksimal 2 jenis beasiswa dalam satu periode. Namun jika diterima, hanya boleh menerima 1 beasiswa aktif.'],
                ['q' => 'Bagaimana jika IPK saya belum 3.0?', 'a' => 'IPK 3.0 adalah syarat umum. Namun untuk Beasiswa Ekonomi dan Tech Talent, batas IPK bisa lebih rendah (2.75) dengan pertimbangan faktor lain seperti prestasi non-akademik.'],
                ['q' => 'Apakah WNA bisa mendaftar?', 'a' => 'Ya! WNA yang terdaftar sebagai pengguna aktif KVT Hub minimal 6 bulan bisa mendaftar Beasiswa Internasional.'],
            ];
        @endphp
        <div class="space-y-3">
            @foreach($faqBeasiswa as $i => $item)
                <div class="kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                    <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                        <span class="text-white font-semibold text-sm"><i class="fas fa-question-circle text-amber-400 mr-2"></i>{{ $item['q'] }}</span>
                        <i class="fas fa-chevron-down text-amber-400 text-xs transition-transform duration-300"></i>
                    </button>
                    <div class="hidden px-5 pb-5">
                        <p class="text-gray-400 text-sm leading-relaxed">{{ $item['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-amber-900/20 to-kvt-900/50 border border-amber-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Mulai Perjalanan <span class="teks-gradien-emas">Beasiswa</span> Anda</h2>
            <p class="text-gray-400 mb-8">Pendaftaran beasiswa periode 2026 dibuka sekarang. Jangan lewatkan kesempatan ini!</p>
            <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg transition-all">
                <i class="fas fa-paper-plane"></i> Daftar Sekarang
            </a>
        </div>
    </div>
</section>

@endsection
