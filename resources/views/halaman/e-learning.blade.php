@extends('tata-letak.utama')
@section('judul', 'E-Learning Platform - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%233399FF%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-kvt-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-graduation-cap text-kvt-400"></i>
            <span class="text-kvt-300 text-sm font-semibold">Learning Management System</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            E-Learning <span class="teks-gradien">Platform</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Akses ribuan kursus online berkualitas tinggi dari instruktur terbaik. Belajar kapan saja, di mana saja, dengan sertifikasi resmi.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#kursus" class="bg-gradient-to-r from-kvt-500 to-kvt-400 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-kvt-500/30 transition-all">
                <i class="fas fa-play-circle mr-2"></i>Jelajahi Kursus
            </a>
            <a href="#jalur" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-route mr-2"></i>Jalur Belajar
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['1000+','Kursus'],['100K+','Siswa'],['500+','Instruktur'],['50+','Kategori']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kursus Populer --}}
<section class="py-20" id="kursus">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kursus <span class="teks-gradien">Populer</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Kursus paling diminati oleh pelajar dan profesional di seluruh Indonesia.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kursus = [
                ['icon'=>'fa-code','color'=>'kvt','judul'=>'Full-Stack Web Development','desc'=>'HTML, CSS, JavaScript, Laravel, React — dari dasar hingga production-ready','siswa'=>'12.5K siswa','level'=>'Beginner'],
                ['icon'=>'fa-robot','color'=>'purple','judul'=>'Machine Learning & AI','desc'=>'Python, TensorFlow, neural networks, dan proyek AI end-to-end','siswa'=>'8.3K siswa','level'=>'Intermediate'],
                ['icon'=>'fa-mobile-alt','color'=>'green','judul'=>'Mobile App Development','desc'=>'Flutter & React Native untuk membangun aplikasi mobile cross-platform','siswa'=>'9.1K siswa','level'=>'Beginner'],
                ['icon'=>'fa-shield-alt','color'=>'red','judul'=>'Cybersecurity Essentials','desc'=>'Ethical hacking, penetration testing, dan keamanan jaringan','siswa'=>'6.7K siswa','level'=>'Advanced'],
                ['icon'=>'fa-chart-bar','color'=>'amber','judul'=>'Data Science & Analytics','desc'=>'Pandas, SQL, visualisasi data, dan business intelligence','siswa'=>'10.2K siswa','level'=>'Intermediate'],
                ['icon'=>'fa-cloud','color'=>'teal','judul'=>'Cloud Computing & DevOps','desc'=>'AWS, Docker, Kubernetes, CI/CD pipeline, dan infrastructure as code','siswa'=>'7.8K siswa','level'=>'Advanced'],
            ];
            @endphp
            @foreach($kursus as $k)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $k['color'] }}-500/10 to-transparent p-5">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 bg-{{ $k['color'] }}-500/10 rounded-xl flex items-center justify-center">
                            <i class="fas {{ $k['icon'] }} text-{{ $k['color'] }}-400 text-lg"></i>
                        </div>
                        <span class="text-[10px] font-bold text-{{ $k['color'] }}-400 bg-{{ $k['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $k['level'] }}</span>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
                    <p class="text-gray-500 text-sm mb-4">{{ $k['desc'] }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-xs"><i class="fas fa-users mr-1"></i>{{ $k['siswa'] }}</span>
                        <button class="text-{{ $k['color'] }}-400 text-sm font-semibold hover:underline">Mulai Belajar <i class="fas fa-arrow-right ml-1"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Jalur Belajar --}}
<section class="py-20 bg-kvt-900/30" id="jalur">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Jalur <span class="teks-gradien">Belajar</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Kurikulum terstruktur yang dirancang untuk membawa Anda dari pemula hingga profesional.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $jalur = [
                ['icon'=>'fa-laptop-code','judul'=>'Frontend Developer','kursus'=>'12 Kursus','durasi'=>'6 bulan','color'=>'kvt'],
                ['icon'=>'fa-server','judul'=>'Backend Developer','kursus'=>'14 Kursus','durasi'=>'8 bulan','color'=>'green'],
                ['icon'=>'fa-database','judul'=>'Data Engineer','kursus'=>'10 Kursus','durasi'=>'7 bulan','color'=>'purple'],
                ['icon'=>'fa-paint-brush','judul'=>'UI/UX Designer','kursus'=>'9 Kursus','durasi'=>'5 bulan','color'=>'pink'],
            ];
            @endphp
            @foreach($jalur as $j)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $j['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-14 h-14 bg-{{ $j['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $j['icon'] }} text-{{ $j['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $j['judul'] }}</h3>
                <div class="flex items-center gap-3 text-xs text-gray-500 mb-4">
                    <span><i class="fas fa-book mr-1"></i>{{ $j['kursus'] }}</span>
                    <span><i class="fas fa-clock mr-1"></i>{{ $j['durasi'] }}</span>
                </div>
                <button class="w-full bg-{{ $j['color'] }}-500/10 text-{{ $j['color'] }}-400 border border-{{ $j['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $j['color'] }}-500/20 transition">
                    Lihat Jalur <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Fitur LMS --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Fitur <span class="teks-gradien">LMS</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Fitur pembelajaran modern yang mendukung pengalaman belajar terbaik Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $fitur = [
                ['icon'=>'fa-video','judul'=>'Video HD Interaktif','desc'=>'Video berkualitas tinggi dengan subtitle, speed control, dan catatan otomatis'],
                ['icon'=>'fa-tasks','judul'=>'Kuis & Tugas','desc'=>'Auto-grading quiz, coding challenges, dan project-based assessment'],
                ['icon'=>'fa-certificate','judul'=>'Sertifikasi Resmi','desc'=>'Sertifikat digital terverifikasi yang diakui oleh industri'],
                ['icon'=>'fa-comments','judul'=>'Forum Diskusi','desc'=>'Interaksi dengan instruktur dan sesama peserta dalam forum terstruktur'],
                ['icon'=>'fa-chart-line','judul'=>'Progress Tracking','desc'=>'Dashboard progres belajar real-time dengan analytics personal'],
                ['icon'=>'fa-mobile-alt','judul'=>'Akses Multi-Device','desc'=>'Belajar di smartphone, tablet, atau desktop dengan sinkronisasi otomatis'],
            ];
            @endphp
            @foreach($fitur as $f)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-kvt-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-12 h-12 bg-kvt-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $f['icon'] }} text-kvt-400 text-lg"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $f['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Instruktur --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Instruktur <span class="teks-gradien">Terbaik</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Belajar langsung dari para ahli di bidangnya dengan pengalaman industri bertahun-tahun.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $instruktur = [
                ['nama'=>'Hendra Wijaya','bidang'=>'Web Development','kursus'=>'24 Kursus','siswa'=>'18K siswa','color'=>'kvt'],
                ['nama'=>'Dr. Siti Nurhaliza','bidang'=>'Data Science','kursus'=>'18 Kursus','siswa'=>'14K siswa','color'=>'purple'],
                ['nama'=>'Raka Mahendra','bidang'=>'Mobile Development','kursus'=>'15 Kursus','siswa'=>'11K siswa','color'=>'green'],
                ['nama'=>'Ayu Lestari, M.Des','bidang'=>'UI/UX Design','kursus'=>'12 Kursus','siswa'=>'9K siswa','color'=>'pink'],
            ];
            @endphp
            @foreach($instruktur as $i)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-20 h-20 bg-{{ $i['color'] }}-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chalkboard-teacher text-{{ $i['color'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold mb-1">{{ $i['nama'] }}</h3>
                <p class="text-{{ $i['color'] }}-400 text-sm mb-3">{{ $i['bidang'] }}</p>
                <div class="flex items-center justify-center gap-3 text-xs text-gray-500">
                    <span><i class="fas fa-book mr-1"></i>{{ $i['kursus'] }}</span>
                    <span><i class="fas fa-users mr-1"></i>{{ $i['siswa'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Mulai Perjalanan <span class="teks-gradien">Belajar</span> Anda</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Bergabung dengan 100K+ pelajar lainnya. Akses semua kursus dengan satu langganan terjangkau.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-kvt-500/30 transition-all">
                    <i class="fas fa-rocket"></i> Daftar Gratis
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-info-circle"></i> Pelajari Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
