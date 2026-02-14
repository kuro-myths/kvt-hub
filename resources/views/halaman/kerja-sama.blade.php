@extends('tata-letak.utama')
@section('judul', 'Kerja Sama - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[55vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-blue-900/20"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(51,153,255,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 40%, rgba(139,92,246,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-500/10 border border-kvt-500/20 rounded-full px-4 py-1.5 text-xs text-kvt-400 mb-6" data-aos="fade-down">
            <i class="fas fa-handshake"></i> Program Kerja Sama
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Kerja </span><span class="teks-gradien">Sama</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Bersama membangun ekosistem pendidikan digital Indonesia. Bergabunglah dengan jaringan partner KVT Hub dari berbagai sektor.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="#program" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/20">
                <i class="fas fa-handshake mr-2"></i>Lihat Program
            </a>
            <a href="mailto:kerjasama@kvthub.id" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-envelope mr-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>

{{-- Statistik Kerja Sama --}}
<section class="bg-kvt-900/30 py-12">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in">
        <div><div class="text-3xl font-black teks-gradien">50+</div><p class="text-gray-400 text-sm mt-1">Institusi Mitra</p></div>
        <div><div class="text-3xl font-black teks-gradien">200+</div><p class="text-gray-400 text-sm mt-1">Kreator Konten</p></div>
        <div><div class="text-3xl font-black teks-gradien">30+</div><p class="text-gray-400 text-sm mt-1">Perusahaan</p></div>
        <div><div class="text-3xl font-black teks-gradien">15+</div><p class="text-gray-400 text-sm mt-1">Komunitas & NGO</p></div>
    </div>
</section>

{{-- 4 Program Kerja Sama --}}
<section id="program" class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-down">Program Kerja Sama</h2>
        <p class="text-gray-400" data-aos="fade-down" data-aos-delay="100">Empat jalur kolaborasi yang dirancang untuk berbagai kebutuhan</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Institusi Pendidikan --}}
        <div class="kaca rounded-2xl p-8 hover:border-blue-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-right">
            <div class="flex items-center gap-4 mb-5">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas fa-school text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg">Institusi Pendidikan</h3>
                    <span class="text-xs text-blue-400 bg-blue-500/10 px-2 py-0.5 rounded-full">Sekolah & Kampus</span>
                </div>
            </div>
            <p class="text-gray-400 text-sm leading-relaxed mb-4">Integrasikan KVT Hub sebagai platform e-learning di sekolah atau kampus Anda. Dapatkan fitur khusus, dashboard akademik, dan dukungan teknis penuh.</p>
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-blue-400 flex-shrink-0"></i>Branding sekolah di platform</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-blue-400 flex-shrink-0"></i>Akun guru & siswa tanpa batas</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-blue-400 flex-shrink-0"></i>Laporan akademik otomatis</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-blue-400 flex-shrink-0"></i>Kustomisasi kurikulum</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-blue-400 flex-shrink-0"></i>Pelatihan guru & IT support</div>
            </div>
        </div>

        {{-- Developer & Kreator --}}
        <div class="kaca rounded-2xl p-8 hover:border-purple-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-left">
            <div class="flex items-center gap-4 mb-5">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas fa-laptop-code text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg">Developer & Kreator</h3>
                    <span class="text-xs text-purple-400 bg-purple-500/10 px-2 py-0.5 rounded-full">Kontributor</span>
                </div>
            </div>
            <p class="text-gray-400 text-sm leading-relaxed mb-4">Bergabung sebagai kontributor konten. Buat materi, kuis, dan kelas berkualitas. Dapatkan royalti dan pengakuan dari komunitas belajar.</p>
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-purple-400 flex-shrink-0"></i>Revenue sharing hingga 70%</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-purple-400 flex-shrink-0"></i>Profil kreator terverifikasi</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-purple-400 flex-shrink-0"></i>Tools pembuatan konten canggih</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-purple-400 flex-shrink-0"></i>Analytics performa konten</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-purple-400 flex-shrink-0"></i>Komunitas kreator eksklusif</div>
            </div>
        </div>

        {{-- Perusahaan & Startup --}}
        <div class="kaca rounded-2xl p-8 hover:border-green-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-right">
            <div class="flex items-center gap-4 mb-5">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas fa-building text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg">Perusahaan & Startup</h3>
                    <span class="text-xs text-green-400 bg-green-500/10 px-2 py-0.5 rounded-full">Enterprise</span>
                </div>
            </div>
            <p class="text-gray-400 text-sm leading-relaxed mb-4">Gunakan KVT Hub untuk program training internal, onboarding karyawan, atau CSR di bidang pendidikan teknologi.</p>
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-green-400 flex-shrink-0"></i>Kelas privat perusahaan</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-green-400 flex-shrink-0"></i>Sertifikat branded</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-green-400 flex-shrink-0"></i>API integration</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-green-400 flex-shrink-0"></i>SSO & LDAP support</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-green-400 flex-shrink-0"></i>Dedicated account manager</div>
            </div>
        </div>

        {{-- Komunitas & NGO --}}
        <div class="kaca rounded-2xl p-8 hover:border-orange-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-left">
            <div class="flex items-center gap-4 mb-5">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas fa-globe text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg">Komunitas & NGO</h3>
                    <span class="text-xs text-orange-400 bg-orange-500/10 px-2 py-0.5 rounded-full">Non-Profit</span>
                </div>
            </div>
            <p class="text-gray-400 text-sm leading-relaxed mb-4">Bersama memperluas akses pendidikan teknologi ke seluruh Indonesia melalui program beasiswa dan pelatihan gratis.</p>
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-orange-400 flex-shrink-0"></i>Program beasiswa bersama</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-orange-400 flex-shrink-0"></i>Event kolaborasi</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-orange-400 flex-shrink-0"></i>Dukungan komunitas</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-orange-400 flex-shrink-0"></i>Pelatihan gratis untuk daerah 3T</div>
                <div class="flex items-center gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-orange-400 flex-shrink-0"></i>Co-branding program sosial</div>
            </div>
        </div>
    </div>
</section>

{{-- Proses Kerja Sama --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in-up">Alur Kerja Sama</h2>
            <p class="text-gray-400" data-aos="zoom-in-up" data-aos-delay="100">Langkah mudah untuk memulai kolaborasi</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6" data-aos="fade-up" data-aos-delay="200">
            @php
            $alur = [
                ['1', 'Hubungi Kami', 'Kirim proposal atau email ke tim', 'fa-envelope', 'from-kvt-500 to-kvt-600'],
                ['2', 'Diskusi Awal', 'Meeting untuk membahas kebutuhan', 'fa-comments', 'from-ungu-500 to-purple-600'],
                ['3', 'MoU/Perjanjian', 'Penandatanganan kerja sama resmi', 'fa-file-signature', 'from-pink-500 to-rose-600'],
                ['4', 'Implementasi', 'Integrasi dan setup teknis', 'fa-cogs', 'from-green-500 to-emerald-600'],
                ['5', 'Go Live', 'Kerja sama aktif berjalan', 'fa-rocket', 'from-yellow-500 to-amber-600'],
            ];
            @endphp
            @foreach($alur as $al)
            <div class="text-center">
                <div class="w-14 h-14 bg-gradient-to-br {{ $al[4] }} rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                    <span class="text-white font-black text-xl">{{ $al[0] }}</span>
                </div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $al[1] }}</h4>
                <p class="text-gray-500 text-xs">{{ $al[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Benefit --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-right">Benefit Kerja Sama</h2>
        <p class="text-gray-400" data-aos="fade-right" data-aos-delay="100">Keuntungan yang didapat dari bermitra dengan KVT Hub</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-left" data-aos-delay="200">
        @php
        $benefit = [
            ['Akses Platform Full', 'Seluruh fitur premium KVT Hub termasuk analytics, sertifikasi, dan konten eksklusif.', 'fa-unlock-alt', 'from-blue-500 to-cyan-500'],
            ['Support Prioritas', 'Tim teknis dedicated siap membantu 24/7, termasuk setup, training, dan troubleshooting.', 'fa-headset', 'from-green-500 to-emerald-500'],
            ['Co-Branding', 'Logo dan brand mitra tampil di platform, meningkatkan visibility dan reach.', 'fa-palette', 'from-purple-500 to-violet-500'],
            ['Dashboard Analytics', 'Real-time reporting penggunaan, progres siswa, dan performa keseluruhan.', 'fa-chart-line', 'from-orange-500 to-yellow-500'],
            ['Kustom Konten', 'Konten pembelajaran dapat disesuaikan dengan kurikulum dan kebutuhan mitra.', 'fa-edit', 'from-pink-500 to-rose-500'],
            ['Network Access', 'Bergabung dengan jaringan partner KVT Hub dari berbagai sektor dan daerah.', 'fa-project-diagram', 'from-teal-500 to-cyan-500'],
        ];
        @endphp
        @foreach($benefit as $b)
        <div class="kaca rounded-2xl p-6 hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-12 h-12 bg-gradient-to-br {{ $b[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $b[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold mb-2">{{ $b[0] }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ $b[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-kvt-800/20 to-blue-700/10 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <h2 class="text-2xl font-bold text-white mb-3">Siap Memulai Kerja Sama?</h2>
        <p class="text-gray-400 mb-6">Isi formulir atau hubungi kami langsung untuk memulai diskusi kerja sama yang bermakna.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="mailto:kerjasama@kvthub.id" class="bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg">
                <i class="fas fa-envelope mr-2"></i>kerjasama@kvthub.id
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 rounded-xl font-bold transition">
                <i class="fab fa-whatsapp mr-2"></i>WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
