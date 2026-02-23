@extends('tata-letak.utama')
@section('judul', 'Podcast Edukasi - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%233399FF%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-pink-800/40 border border-pink-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-podcast text-pink-400"></i>
            <span class="text-pink-300 text-sm font-semibold">Listen & Learn</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Podcast <span class="teks-gradien">Edukasi</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Dengarkan diskusi mendalam bersama para ahli, akademisi, dan praktisi industri. Belajar kapan saja, di mana saja melalui konten audio berkualitas.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#episode" class="bg-gradient-to-r from-pink-500 to-rose-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-pink-500/30 transition-all">
                <i class="fas fa-headphones mr-2"></i>Dengarkan Sekarang
            </a>
            <a href="#channel" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-rss mr-2"></i>Subscribe
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['200+','Episode'],['100K+','Listeners'],['30+','Host'],['4.8/5','Rating']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Channel Podcast --}}
<section class="py-20" id="channel">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Channel <span class="teks-gradien">Podcast</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pilih channel podcast sesuai minat dan bidang yang ingin Anda pelajari.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $channels = [
                ['icon'=>'fa-microchip','color'=>'pink','judul'=>'Tech Talk KVT','desc'=>'Diskusi tren teknologi, AI, startup, dan inovasi digital terkini','total'=>'65 episode'],
                ['icon'=>'fa-graduation-cap','color'=>'rose','judul'=>'Kampus Bicara','desc'=>'Kehidupan kampus, tips akademik, beasiswa, dan karier mahasiswa','total'=>'45 episode'],
                ['icon'=>'fa-briefcase','color'=>'kvt','judul'=>'Career Lab','desc'=>'Persiapan karier, interview tips, personal branding, dan networking','total'=>'38 episode'],
                ['icon'=>'fa-brain','color'=>'purple','judul'=>'Mindset Matters','desc'=>'Pengembangan diri, produktivitas, mental health, dan growth mindset','total'=>'30 episode'],
                ['icon'=>'fa-flask','color'=>'amber','judul'=>'Riset & Sains','desc'=>'Penemuan ilmiah, penelitian terbaru, dan wawancara dengan peneliti','total'=>'25 episode'],
                ['icon'=>'fa-paint-brush','color'=>'green','judul'=>'Kreator Studio','desc'=>'Content creation, desain, fotografi, dan industri kreatif','total'=>'22 episode'],
            ];
            @endphp
            @foreach($channels as $c)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $c['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $c['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $c['icon'] }} text-{{ $c['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $c['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $c['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-{{ $c['color'] }}-400 text-xs font-semibold">{{ $c['total'] }}</span>
                    <i class="fas fa-arrow-right text-gray-600 group-hover:text-{{ $c['color'] }}-400 transition"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Episode Terbaru --}}
<section class="py-20 bg-kvt-900/30" id="episode">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Episode <span class="teks-gradien">Terbaru</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Dengarkan episode terbaru dari podcast-podcast unggulan kami.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $episodes = [
                ['judul'=>'AI di 2026: Peluang atau Ancaman?','host'=>'Fikri Ramadhani','durasi'=>'45 min','tgl'=>'20 Feb 2026','channel'=>'Tech Talk','color'=>'pink'],
                ['judul'=>'Rahasia Lolos Beasiswa Luar Negeri','host'=>'Aulia Zahra, S.Pd','durasi'=>'38 min','tgl'=>'18 Feb 2026','channel'=>'Kampus Bicara','color'=>'rose'],
                ['judul'=>'First Job: Expectations vs Reality','host'=>'Dimas Prabowo','durasi'=>'42 min','tgl'=>'15 Feb 2026','channel'=>'Career Lab','color'=>'kvt'],
                ['judul'=>'Mengatasi Burnout di Dunia Akademik','host'=>'Dr. Maya Kartika, Psi','durasi'=>'35 min','tgl'=>'12 Feb 2026','channel'=>'Mindset','color'=>'purple'],
                ['judul'=>'Energi Terbarukan untuk Indonesia','host'=>'Prof. Budi Santoso','durasi'=>'50 min','tgl'=>'10 Feb 2026','channel'=>'Riset & Sains','color'=>'amber'],
                ['judul'=>'Membangun Personal Brand di LinkedIn','host'=>'Sarah Kusuma','durasi'=>'32 min','tgl'=>'8 Feb 2026','channel'=>'Kreator Studio','color'=>'green'],
            ];
            @endphp
            @foreach($episodes as $e)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="bg-gradient-to-r from-{{ $e['color'] }}-500/10 to-transparent p-5">
                    <span class="text-[10px] font-bold text-{{ $e['color'] }}-400 bg-{{ $e['color'] }}-500/10 px-3 py-1 rounded-full uppercase">{{ $e['channel'] }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h3 class="text-white font-bold text-lg mb-3">{{ $e['judul'] }}</h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-2">
                        <i class="fas fa-microphone text-xs"></i> {{ $e['host'] }}
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-xs mb-4">
                        <span><i class="fas fa-calendar mr-1"></i>{{ $e['tgl'] }}</span>
                        <span><i class="fas fa-clock mr-1"></i>{{ $e['durasi'] }}</span>
                    </div>
                    <button class="w-full bg-{{ $e['color'] }}-500/10 text-{{ $e['color'] }}-400 border border-{{ $e['color'] }}-500/20 py-2.5 rounded-xl text-sm font-semibold hover:bg-{{ $e['color'] }}-500/20 transition">
                        <i class="fas fa-play mr-2"></i>Putar Episode
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Platform --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Tersedia di <span class="teks-gradien">Platform</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Dengarkan podcast KVT Hub di platform favorit Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $platforms = [
                ['icon'=>'fa-spotify','judul'=>'Spotify','desc'=>'Streaming gratis dengan akun Spotify','color'=>'green'],
                ['icon'=>'fa-apple','judul'=>'Apple Podcasts','desc'=>'Tersedia untuk pengguna Apple devices','color'=>'pink'],
                ['icon'=>'fa-google','judul'=>'Google Podcasts','desc'=>'Akses langsung dari Google Search','color'=>'kvt'],
                ['icon'=>'fa-youtube','judul'=>'YouTube','desc'=>'Versi video podcast di YouTube channel','color'=>'rose'],
            ];
            @endphp
            @foreach($platforms as $pl)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $pl['color'] }}-500/30 transition-all card-hover text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-16 h-16 bg-{{ $pl['color'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fab {{ $pl['icon'] }} text-{{ $pl['color'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $pl['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $pl['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Ingin Menjadi <span class="teks-gradien">Host Podcast</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Punya keahlian atau cerita inspiratif? Bergabunglah sebagai host dan bagikan pengetahuan Anda ke ribuan pendengar.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-pink-500/30 transition-all">
                    <i class="fas fa-microphone-alt"></i> Jadi Host
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-info-circle"></i> Pelajari Lebih
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
