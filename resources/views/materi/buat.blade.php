@extends('tata-letak.utama')
@section('judul', 'Buat Materi - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8" data-aos="fade-up">
            <h1 class="text-2xl font-black text-white mb-6"><i class="fas fa-file-medical text-green-400 mr-2"></i>Buat Materi Baru</h1>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-3 mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('materi.simpan') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Judul Materi</label>
                    <input type="text" name="judul" required class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition" placeholder="Judul materi pembelajaran">
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Tipe</label>
                    <select name="tipe" class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition">
                        <option value="artikel">Artikel</option>
                        <option value="video">Video</option>
                        <option value="tutorial">Tutorial</option>
                        <option value="praktik">Praktik</option>
                        <option value="quiz">Quiz</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Deskripsi</label>
                    <textarea name="deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition" placeholder="Deskripsi singkat..."></textarea>
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">URL Video (YouTube/IG)</label>
                    <input type="url" name="video_url" class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition" placeholder="https://youtube.com/watch?v=...">
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Konten</label>
                    <textarea name="konten" rows="8" class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition" placeholder="Tulis konten materi di sini..."></textarea>
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">XP Reward</label>
                    <input type="number" name="xp_reward" value="10" min="1" max="100" class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-xl font-semibold transition shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i>Publikasikan Materi
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
