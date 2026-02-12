@extends('tata-letak.utama')
@section('judul', $materi->judul . ' - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-5xl mx-auto">
        {{-- Breadcrumb --}}
        <div class="mb-6 text-sm text-gray-500" data-aos="fade-up">
            <a href="{{ route('kelas.tampilkan', $materi->kelas) }}" class="hover:text-kvt-400 transition">{{ $materi->kelas->nama }}</a>
            <i class="fas fa-chevron-right mx-2 text-xs"></i>
            <span class="text-gray-400">{{ $materi->judul }}</span>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Konten Utama --}}
            <div class="lg:col-span-2">
                {{-- Video Player --}}
                @if($materi->tipe === 'video' && $materi->youtube_id)
                    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden mb-6" data-aos="fade-up">
                        <div class="relative aspect-video">
                            <iframe id="videoPlayer" src="https://www.youtube.com/embed/{{ $materi->youtube_id }}?enablejsapi=1"
                                class="absolute inset-0 w-full h-full" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                @endif

                {{-- Konten Materi --}}
                <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="bg-kvt-500/20 text-kvt-400 text-xs px-3 py-1 rounded-full font-semibold">{{ ucfirst($materi->tipe) }}</span>
                        @if($materi->eksklusif)
                            <span class="bg-yellow-500/20 text-yellow-400 text-xs px-3 py-1 rounded-full"><i class="fas fa-crown mr-1"></i>Eksklusif</span>
                        @endif
                        <span class="text-gray-500 text-xs">+{{ $materi->xp_reward }} XP</span>
                    </div>

                    <h1 class="text-2xl font-black text-white mb-4">{{ $materi->judul }}</h1>

                    @if($materi->deskripsi)
                        <p class="text-gray-400 mb-6">{{ $materi->deskripsi }}</p>
                    @endif

                    @if($materi->konten)
                        <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed">
                            {!! nl2br(e($materi->konten)) !!}
                        </div>
                    @endif

                    {{-- Tombol Selesai --}}
                    @auth
                        @if(!$progres || $progres->status !== 'selesai')
                            <form method="POST" action="{{ route('materi.selesai', $materi) }}" class="mt-8">
                                @csrf
                                <button type="submit" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-400 hover:to-green-500 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg w-full">
                                    <i class="fas fa-check-circle mr-2"></i>Tandai Selesai (+{{ $materi->xp_reward }} XP)
                                </button>
                            </form>
                        @else
                            <div class="mt-8 bg-green-500/10 border border-green-500/30 rounded-xl p-4 text-center">
                                <i class="fas fa-check-circle text-green-400 text-2xl mb-2"></i>
                                <p class="text-green-400 font-semibold">Materi ini sudah selesai!</p>
                            </div>
                        @endif
                    @endauth
                </div>

                {{-- Kuis Terkait --}}
                @if($materi->kuis->count() > 0)
                    <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 mt-6" data-aos="fade-up">
                        <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-question-circle text-purple-400 mr-2"></i>Kuis</h2>
                        @foreach($materi->kuis as $kuis)
                            <a href="{{ route('kuis.mulai', $kuis) }}" class="flex items-center gap-4 bg-kvt-800/30 hover:bg-purple-500/10 rounded-xl p-4 mb-3 transition border border-kvt-700/20 hover:border-purple-500/30">
                                <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-brain text-purple-400"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-white font-semibold">{{ $kuis->judul }}</h3>
                                    <p class="text-gray-500 text-xs">{{ $kuis->pertanyaan->count() }} pertanyaan • +{{ $kuis->xp_reward }} XP</p>
                                </div>
                                <span class="bg-purple-500/20 text-purple-400 text-xs px-3 py-1 rounded-full">Mulai</span>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-5" data-aos="fade-left">
                    <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Info Materi</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-gray-500">Guru</span><span class="text-white">{{ $materi->guru->name ?? '-' }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Tipe</span><span class="text-kvt-400">{{ ucfirst($materi->tipe) }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Durasi</span><span class="text-white">{{ $materi->durasi_menit }} menit</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">XP Reward</span><span class="text-green-400">+{{ $materi->xp_reward }}</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Kuis</span><span class="text-white">{{ $materi->kuis->count() }}</span></div>
                    </div>
                </div>

                @if($progres)
                    <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-5" data-aos="fade-left" data-aos-delay="100">
                        <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Progres</h3>
                        <div class="w-full bg-kvt-800 rounded-full h-3 mb-2">
                            <div class="bg-gradient-to-r from-kvt-500 to-kvt-300 h-full rounded-full transition-all" style="width: {{ $progres->progres_persen }}%"></div>
                        </div>
                        <span class="text-gray-500 text-sm">{{ $progres->progres_persen }}% selesai</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
