@extends('tata-letak.utama')
@section('judul', $kuis->judul . ' - Kuis KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-3xl mx-auto">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8" data-aos="fade-up">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-brain text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-black text-white">{{ $kuis->judul }}</h1>
                @if($kuis->deskripsi)
                    <p class="text-gray-400 mt-2">{{ $kuis->deskripsi }}</p>
                @endif
                <div class="flex justify-center gap-4 mt-3 text-sm text-gray-500">
                    <span><i class="fas fa-list mr-1"></i>{{ $kuis->pertanyaan->count() }} pertanyaan</span>
                    <span><i class="fas fa-star mr-1 text-yellow-400"></i>+{{ $kuis->xp_reward }} XP</span>
                    <span><i class="fas fa-clock mr-1"></i>{{ $kuis->durasi_detik }} detik</span>
                </div>
            </div>

            <form method="POST" action="{{ route('kuis.kirim', $kuis) }}" id="formKuis">
                @csrf

                @foreach($kuis->pertanyaan as $i => $p)
                    <div class="bg-kvt-800/30 rounded-xl p-6 mb-4 border border-kvt-700/20">
                        <div class="flex items-start gap-3 mb-4">
                            <span class="bg-kvt-500/20 text-kvt-400 text-sm font-bold w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">{{ $i + 1 }}</span>
                            <p class="text-white font-medium">{{ $p->pertanyaan }}</p>
                        </div>

                        <div class="space-y-2 ml-11">
                            @foreach($p->pilihan as $j => $pilihan)
                                <label class="flex items-center gap-3 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg p-3 cursor-pointer transition border border-transparent hover:border-kvt-500/30">
                                    <input type="radio" name="jawaban[{{ $p->id }}]" value="{{ $pilihan }}" class="text-kvt-500 focus:ring-kvt-500 bg-kvt-700 border-kvt-600" required>
                                    <span class="text-gray-300 text-sm">{{ $pilihan }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-400 hover:to-purple-500 text-white py-4 rounded-xl font-bold text-lg transition shadow-lg mt-6">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim Jawaban
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
