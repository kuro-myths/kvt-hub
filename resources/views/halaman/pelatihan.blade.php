@extends('tata-letak.utama')
@section('judul', 'Pelatihan Profesional - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%233399FF%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-kvt-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-award text-kvt-400"></i>
            <span class="text-kvt-300 text-sm font-semibold">Certified & Professional</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Pelatihan <span class="teks-gradien">Profesional</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Tingkatkan kompetensi profesional Anda dengan program pelatihan bersertifikasi, persiapan ujian sertifikasi internasional, dan pengembangan skill industry-ready.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#program" class="bg-gradient-to-r from-kvt-500 to-kvt-400 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-kvt-500/30 transition-all">
                <i class="fas fa-graduation-cap mr-2"></i>Lihat Program
            </a>
            <a href="#sertifikasi" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-certificate mr-2"></i>Sertifikasi
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['300+','Program'],['40K+','Lulusan'],['50+','Sertifikasi'],['95%','Lulus']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Jalur Pelatihan --}}
<section class="py-20" id="program">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Jalur <span class="teks-gradien">Pelatihan</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pilih jalur pelatihan sesuai tujuan karier dan bidang profesional Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $jalurs = [
                ['icon'=>'fa-laptop-code','color'=>'kvt','judul'=>'Software Engineering','desc'=>'Full-stack, backend, frontend, DevOps, dan arsitektur software modern','total'=>'60 program'],
                ['icon'=>'fa-chart-pie','color'=>'blue','judul'=>'Data & Analytics','desc'=>'Data science, data engineering, business intelligence, dan big data','total'=>'45 program'],
                ['icon'=>'fa-shield-alt','color'=>'emerald','judul'=>'Cybersecurity','desc'=>'Security analyst, ethical hacking, compliance, dan incident response','total'=>'35 program'],
                ['icon'=>'fa-project-diagram','color'=>'purple','judul'=>'Project Management','desc'=>'PMP, Scrum Master, Agile Coach, dan product management','total'=>'40 program'],
                ['icon'=>'fa-cloud','color'=>'amber','judul'=>'Cloud Computing','desc'=>'AWS, Azure, GCP certification prep dan cloud architecture','total'=>'50 program'],
                ['icon'=>'fa-robot','color'=>'pink','judul'=>'AI & Automation','desc'=>'Machine learning engineer, AI specialist, dan RPA developer','total'=>'38 program'],
            ];
            @endphp
            @foreach($jalurs as $j)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $j['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $j['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $j['icon'] }} text-{{ $j['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $j['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $j['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-{{ $j['color'] }}-400 text-xs font-semibold">{{ $j['total'] }}</span>
                    <i class="fas fa-arrow-right text-gray-600 group-hover:text-{{ $j['color'] }}-400 transition"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Program Unggulan --}}
<section class="py-20 bg-kvt-900/30" id="sertifikasi">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Program <span class="teks-gradien">Unggulan</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Program pelatihan paling diminati dengan tingkat kelulusan sertifikasi tertinggi.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $programs = [
                ['judul'=>'AWS Solutions Architect Prep','mentor'=>'Reza Fahmi, AWS SA Pro','durasi'=>'12 Minggu','level'=>'Intermediate','kategori'=>'Cloud','color'=>'kvt'],
                ['judul'=>'Certified Scrum Master (CSM)','mentor'=>'Andi Setiawan, CSM','durasi'=>'8 Minggu','level'=>'Beginner','kategori'=>'PM','color'=>'purple'],
                ['judul'=>'Google Data Analytics Certificate','mentor'=>'Dr. Sari Mulyani','durasi'=>'16 Minggu','level'=>'Beginner','kategori'=>'Data','color'=>'blue'],
                ['judul'=>'CompTIA Security+ Bootcamp','mentor'=>'Rudi Hermawan, CISSP','durasi'=>'10 Minggu','level'=>'Intermediate','kategori'=>'Security','color'=>'emerald'],
                ['judul'=>'Kubernetes Administrator (CKA)','mentor'=>'Bagus Setiawan, CKA','durasi'=>'8 Minggu','level'=>'Advanced','kategori'=>'DevOps','color'=>'amber'],
                ['judul'=>'TensorFlow Developer Certificate','mentor'=>'Dr. Rizky Amanullah','durasi'=>'14 Minggu','level'=>'Intermediate','kategori'=>'AI/ML','color'=>'pink'],
            ];
            @endphp
            @foreach($programs as $p)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $p['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $p['color'] }}-400 bg-{{ $p['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $p['kategori'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-3">{{ $p['judul'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-user-tie text-xs"></i> {{ $p['mentor'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-2">
                        <span><i class="fas fa-clock mr-1"></i>{{ $p['durasi'] }}</span>
                        <span><i class="fas fa-signal mr-1"></i>{{ $p['level'] }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-kvt-400 text-xs font-semibold mb-4">
                        <i class="fas fa-certificate"></i> Sertifikat Resmi
                    </div>
                    <button class="w-full bg-{{ $p['color'] }}-500/10 text-{{ $p['color'] }}-400 border border-{{ $p['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $p['color'] }}-500/20 transition">
                        <i class="fas fa-rocket mr-2"></i>Daftar Program
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
            <h2 class="text-3xl md:text-4xl font-black mb-4">Keunggulan <span class="teks-gradien">Pelatihan</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Mengapa pelatihan profesional KVT Hub menjadi pilihan utama ribuan profesional.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $keunggulan = [
                ['icon'=>'fa-award','judul'=>'Sertifikasi Global','desc'=>'Persiapan ujian sertifikasi internasional yang diakui dunia','color'=>'kvt'],
                ['icon'=>'fa-users-cog','judul'=>'Mentor Berpengalaman','desc'=>'Bimbingan dari praktisi dengan sertifikasi dan pengalaman nyata','color'=>'blue'],
                ['icon'=>'fa-laptop-house','judul'=>'Fleksibel','desc'=>'Belajar online atau offline dengan jadwal yang bisa disesuaikan','color'=>'emerald'],
                ['icon'=>'fa-handshake','judul'=>'Job Guarantee','desc'=>'Garansi penempatan kerja untuk program tertentu dengan mitra industri','color'=>'purple'],
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

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Siap Meningkatkan <span class="teks-gradien">Karier Profesional</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Daftarkan diri sekarang dan raih sertifikasi profesional yang diakui industri global.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-kvt-500 to-kvt-400 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-kvt-500/30 transition-all">
                    <i class="fas fa-rocket"></i> Mulai Pelatihan
                </a>
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Testimoni Alumni --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kata <span class="teks-gradien">Alumni</span></h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
            $testimoni = [
                ['nama'=>'Faisal Ahmad','peran'=>'AWS SA Pro - Gojek','teks'=>'Berkat pelatihan AWS di KVT Hub, saya berhasil lulus sertifikasi Solutions Architect Professional dan mendapat tawaran di Gojek!','warna'=>'from-kvt-500 to-blue-500'],
                ['nama'=>'Diana Putri','peran'=>'Scrum Master - Tokopedia','teks'=>'Program CSM sangat comprehensive. Mentor-nya praktisi langsung dari industri, jadi materinya sangat relevan dengan dunia kerja nyata.','warna'=>'from-purple-500 to-violet-500'],
                ['nama'=>'Bagus Setiawan','peran'=>'Security Analyst - Bank BCA','teks'=>'Pelatihan cybersecurity KVT Hub mempersiapkan saya untuk CompTIA Security+. Hands-on lab-nya sangat mirip ujian asli.','warna'=>'from-emerald-500 to-green-500'],
            ];
            @endphp
            @foreach($testimoni as $t)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $t['warna'] }} rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg">{{ strtoupper(substr($t['nama'],0,1)) }}</div>
                    <div>
                        <h4 class="text-white font-bold text-sm">{{ $t['nama'] }}</h4>
                        <p class="text-gray-500 text-xs">{{ $t['peran'] }}</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm italic leading-relaxed">"{{ $t['teks'] }}"</p>
                <div class="flex gap-0.5 mt-4">@for($s=0;$s<5;$s++)<i class="fas fa-star text-amber-400 text-xs"></i>@endfor</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ Pelatihan --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl font-black mb-4">FAQ <span class="teks-gradien">Pelatihan</span></h2>
        </div>
        <div class="space-y-3" data-aos="fade-up">
            @php
            $faqs = [
                ['q'=>'Apakah sertifikat yang diberikan diakui industri?','a'=>'Ya! KVT Hub bermitra dengan lembaga sertifikasi resmi seperti AWS, Google, CompTIA, dan Scrum Alliance. Sertifikat yang diterbitkan diakui secara global.'],
                ['q'=>'Berapa lama durasi program pelatihan?','a'=>'Bervariasi antara 8-16 minggu tergantung programnya. Setiap program memiliki jadwal fleksibel yang bisa disesuaikan dengan waktu Anda.'],
                ['q'=>'Apakah ada garansi lulus sertifikasi?','a'=>'Beberapa program premium menawarkan garansi: jika tidak lulus dalam 2 kali percobaan, biaya pelatihan dikembalikan 100%.'],
                ['q'=>'Bagaimana sistem pembayaran pelatihan?','a'=>'Tersedia opsi bayar penuh, cicilan 3/6/12 bulan tanpa bunga, dan beasiswa untuk mahasiswa berprestasi.'],
            ];
            @endphp
            @foreach($faqs as $faq)
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl overflow-hidden">
                <button onclick="this.parentElement.classList.toggle('faq-open')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/30 transition">
                    <span class="text-white font-semibold text-sm pr-4">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-kvt-400 text-xs transition-transform faq-chevron"></i>
                </button>
                <div class="faq-answer px-5 pb-0 max-h-0 overflow-hidden transition-all duration-300">
                    <p class="text-gray-400 text-sm leading-relaxed pb-5">{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>.faq-open .faq-chevron{transform:rotate(180deg)}.faq-open .faq-answer{max-height:200px;padding-bottom:1.25rem}</style>
@endpush
