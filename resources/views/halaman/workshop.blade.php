@extends('tata-letak.utama')
@section('judul', 'Workshop & Pelatihan Praktis - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%233399FF%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-emerald-800/40 border border-emerald-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-tools text-emerald-400"></i>
            <span class="text-emerald-300 text-sm font-semibold">Hands-On Learning</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Workshop & <span class="teks-gradien">Pelatihan Praktis</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Belajar langsung dari praktisi industri melalui workshop intensif, bootcamp terstruktur, dan pelatihan hands-on yang dirancang untuk skill masa depan.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#workshop" class="bg-gradient-to-r from-emerald-500 to-green-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                <i class="fas fa-hammer mr-2"></i>Lihat Workshop
            </a>
            <a href="#bootcamp" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-laptop-code mr-2"></i>Bootcamp
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['150+','Workshop'],['20K+','Alumni'],['50+','Instruktur'],['98%','Puas']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Workshop --}}
<section class="py-20" id="workshop">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kategori <span class="teks-gradien">Workshop</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pilih workshop sesuai minat dan level keahlian Anda, dari pemula hingga mahir.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kategoris = [
                ['icon'=>'fa-code','color'=>'emerald','judul'=>'Web Development','desc'=>'Full-stack development dengan Laravel, React, Next.js, dan teknologi modern','total'=>'35 workshop'],
                ['icon'=>'fa-mobile-alt','color'=>'green','judul'=>'Mobile App Development','desc'=>'Android, iOS, Flutter, dan React Native untuk pemula hingga mahir','total'=>'20 workshop'],
                ['icon'=>'fa-brain','color'=>'kvt','judul'=>'AI & Machine Learning','desc'=>'Python, TensorFlow, PyTorch, NLP, dan computer vision hands-on','total'=>'25 workshop'],
                ['icon'=>'fa-cloud','color'=>'purple','judul'=>'Cloud & DevOps','desc'=>'AWS, GCP, Azure, Docker, Kubernetes, dan CI/CD pipeline','total'=>'18 workshop'],
                ['icon'=>'fa-palette','color'=>'pink','judul'=>'UI/UX Design','desc'=>'Figma, prototyping, user research, dan design system dari nol','total'=>'22 workshop'],
                ['icon'=>'fa-shield-alt','color'=>'amber','judul'=>'Cybersecurity','desc'=>'Ethical hacking, penetration testing, dan keamanan jaringan','total'=>'15 workshop'],
            ];
            @endphp
            @foreach($kategoris as $k)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $k['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $k['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $k['icon'] }} text-{{ $k['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $k['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-{{ $k['color'] }}-400 text-xs font-semibold">{{ $k['total'] }}</span>
                    <i class="fas fa-arrow-right text-gray-600 group-hover:text-{{ $k['color'] }}-400 transition"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Workshop Terbaru --}}
<section class="py-20 bg-kvt-900/30" id="bootcamp">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Workshop <span class="teks-gradien">Terbaru</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Workshop terbaru yang tersedia untuk Anda ikuti. Kuota terbatas!</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $workshops = [
                ['judul'=>'Laravel 12 Masterclass','instruktur'=>'Ahmad Fauzi, Senior Dev','durasi'=>'3 Hari','tgl'=>'8-10 Mar 2026','kategori'=>'Web Dev','color'=>'emerald'],
                ['judul'=>'Flutter Mobile Bootcamp','instruktur'=>'Dian Pratiwi, Mobile Lead','durasi'=>'5 Hari','tgl'=>'15-19 Mar 2026','kategori'=>'Mobile','color'=>'green'],
                ['judul'=>'Data Science with Python','instruktur'=>'Dr. Rizki Amanullah','durasi'=>'4 Hari','tgl'=>'22-25 Mar 2026','kategori'=>'AI/ML','color'=>'kvt'],
                ['judul'=>'Kubernetes in Production','instruktur'=>'Bagus Setiawan, SRE','durasi'=>'2 Hari','tgl'=>'1-2 Apr 2026','kategori'=>'DevOps','color'=>'purple'],
                ['judul'=>'Figma Advanced Prototyping','instruktur'=>'Luna Maharani, UX Lead','durasi'=>'2 Hari','tgl'=>'5-6 Apr 2026','kategori'=>'Design','color'=>'pink'],
                ['judul'=>'Ethical Hacking Workshop','instruktur'=>'Rudi Hermawan, OSCP','durasi'=>'3 Hari','tgl'=>'12-14 Apr 2026','kategori'=>'Security','color'=>'amber'],
            ];
            @endphp
            @foreach($workshops as $w)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $w['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $w['color'] }}-400 bg-{{ $w['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $w['kategori'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-3">{{ $w['judul'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-chalkboard-teacher text-xs"></i> {{ $w['instruktur'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-calendar mr-1"></i>{{ $w['tgl'] }}</span>
                        <span><i class="fas fa-hourglass-half mr-1"></i>{{ $w['durasi'] }}</span>
                    </div>
                    <button class="w-full bg-{{ $w['color'] }}-500/10 text-{{ $w['color'] }}-400 border border-{{ $w['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $w['color'] }}-500/20 transition">
                        <i class="fas fa-ticket-alt mr-2"></i>Daftar Workshop
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Keunggulan --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Mengapa <span class="teks-gradien">Workshop Kami</span>?</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Keunggulan workshop KVT Hub yang membedakan kami dari yang lain.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $keunggulan = [
                ['icon'=>'fa-hands-helping','judul'=>'Hands-On 100%','desc'=>'Praktik langsung dengan project nyata, bukan sekedar teori','color'=>'emerald'],
                ['icon'=>'fa-user-tie','judul'=>'Instruktur Industri','desc'=>'Pengajar dari praktisi senior perusahaan teknologi terkemuka','color'=>'green'],
                ['icon'=>'fa-certificate','judul'=>'Sertifikat Resmi','desc'=>'Dapatkan sertifikat yang diakui industri setelah menyelesaikan workshop','color'=>'kvt'],
                ['icon'=>'fa-users','judul'=>'Kelas Kecil','desc'=>'Maksimal 25 peserta per kelas untuk bimbingan lebih intensif','color'=>'purple'],
            ];
            @endphp
            @foreach($keunggulan as $u)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $u['color'] }}-500/30 transition-all card-hover text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-16 h-16 bg-{{ $u['color'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $u['icon'] }} text-{{ $u['color'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $u['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $u['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimoni --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kata <span class="teks-gradien">Peserta</span></h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
            $testimoni = [
                ['nama' => 'Adi Nugroho', 'role' => 'Full Stack Dev', 'teks' => 'Workshop Laravel di KVT Hub langsung praktek bikin project. Dalam 3 hari saya sudah bisa deploy app sendiri!', 'rating' => 5],
                ['nama' => 'Sinta Dewi', 'role' => 'UI/UX Designer', 'teks' => 'Workshop design system sangat terstruktur. Materinya up-to-date dan instrukturnya ramah.', 'rating' => 5],
                ['nama' => 'Bimo Sakti', 'role' => 'Data Analyst', 'teks' => 'Hands-on Python workshop membantu saya menguasai pandas dan matplotlib dalam seminggu.', 'rating' => 4],
            ];
            @endphp
            @foreach($testimoni as $i => $t)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex gap-1 mb-3">@for($s=0;$s<$t['rating'];$s++)<i class="fas fa-star text-amber-400 text-xs"></i>@endfor @for($s=$t['rating'];$s<5;$s++)<i class="fas fa-star text-gray-700 text-xs"></i>@endfor</div>
                <p class="text-gray-300 text-sm italic mb-4">"{{ $t['teks'] }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-gradient-to-br from-emerald-500 to-green-500 rounded-full flex items-center justify-center text-white text-xs font-bold">{{ strtoupper(substr($t['nama'],0,1)) }}</div>
                    <div><div class="text-white font-semibold text-xs">{{ $t['nama'] }}</div><div class="text-gray-500 text-[10px]">{{ $t['role'] }}</div></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-4">FAQ <span class="teks-gradien">Workshop</span></h2>
        </div>
        @php
        $faq = [
            ['q' => 'Apakah perlu pengalaman sebelumnya?', 'a' => 'Setiap workshop memiliki level berbeda (Pemula/Menengah/Lanjut). Cek deskripsi workshop untuk prasyarat.'],
            ['q' => 'Apakah ada sertifikat?', 'a' => 'Ya! Setiap peserta yang menyelesaikan workshop mendapat sertifikat digital yang bisa diverifikasi online.'],
            ['q' => 'Berapa lama durasi workshop?', 'a' => 'Workshop bervariasi dari 1 hari (intensif) hingga 5 hari (comprehensive). Rata-rata 2-3 hari dengan 6 jam/hari.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $i => $item)
            <div class="kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                    <span class="text-white font-semibold text-sm"><i class="fas fa-question-circle text-emerald-400 mr-2"></i>{{ $item['q'] }}</span>
                    <i class="fas fa-chevron-down text-emerald-400 text-xs transition-transform duration-300"></i>
                </button>
                <div class="hidden px-5 pb-5"><p class="text-gray-400 text-sm">{{ $item['a'] }}</p></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Ingin Menjadi <span class="teks-gradien">Instruktur</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Bagikan keahlian praktis Anda dan bantu generasi baru menguasai skill yang dibutuhkan industri.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-green-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                    <i class="fas fa-chalkboard-teacher"></i> Daftar Instruktur
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-info-circle"></i> Pelajari Lebih
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
