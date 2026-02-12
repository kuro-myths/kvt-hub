@extends('tata-letak.utama')
@section('judul', 'Paket Eksklusif - Admin KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-right">
            <div>
                <h1 class="text-2xl font-black text-white"><i class="fas fa-gem mr-3 text-purple-400"></i>Paket Eksklusif</h1>
                <p class="text-gray-400 text-sm mt-1">Kelola paket pembelajaran eksklusif</p>
            </div>
            <a href="{{ route('admin.dasbor') }}" class="text-gray-400 hover:text-white transition">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-6" data-aos="fade-up">
            <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-plus-circle mr-2 text-kvt-400"></i>Buat Paket Baru</h2>
            <form method="POST" action="{{ route('admin.paket.simpan') }}" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-gray-400 text-sm mb-1 block">Nama Paket</label>
                        <input type="text" name="nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition placeholder-gray-500" placeholder="Paket Premium Coding">
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-1 block">Harga (Rp)</label>
                        <input type="number" name="harga" required min="0" class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition placeholder-gray-500" placeholder="99000">
                    </div>
                </div>
                <div>
                    <label class="text-gray-400 text-sm mb-1 block">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition placeholder-gray-500 resize-none" placeholder="Deskripsi paket..."></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="text-gray-400 text-sm mb-1 block">Durasi (hari)</label>
                        <input type="number" name="durasi_hari" required min="1" class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition placeholder-gray-500" placeholder="30">
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-1 block">XP Bonus</label>
                        <input type="number" name="xp_bonus" value="0" min="0" class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition placeholder-gray-500">
                    </div>
                    <div class="flex items-end">
                        <label class="flex items-center gap-2 bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 w-full cursor-pointer">
                            <input type="checkbox" name="aktif" value="1" checked class="text-purple-500 focus:ring-purple-500 bg-kvt-700 border-kvt-600 rounded">
                            <span class="text-gray-300 text-sm">Aktif</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="text-gray-400 text-sm mb-1 block">Fitur (satu per baris)</label>
                    <textarea name="fitur" rows="4" class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition placeholder-gray-500 resize-none font-mono text-sm" placeholder="Akses semua materi&#10;Download offline&#10;Sertifikat digital&#10;Konsultasi guru"></textarea>
                </div>
                <button type="submit" class="bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-400 hover:to-purple-500 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg">
                    <i class="fas fa-save mr-2"></i>Simpan Paket
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" data-aos="fade-up">
            @forelse($paketList as $paket)
                <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 hover:border-purple-500/30 transition">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-purple-500/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-gem text-purple-400"></i>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full {{ $paket->aktif ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' }}">
                            {{ $paket->aktif ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                    <h3 class="text-white font-bold text-lg">{{ $paket->nama }}</h3>
                    <p class="text-purple-400 font-black text-2xl mt-1">Rp {{ number_format($paket->harga, 0, ',', '.') }}</p>
                    <p class="text-gray-500 text-xs mt-1">{{ $paket->durasi_hari }} hari • +{{ $paket->xp_bonus }} XP</p>
                    @if($paket->deskripsi)
                        <p class="text-gray-400 text-sm mt-3">{{ Str::limit($paket->deskripsi, 80) }}</p>
                    @endif
                    @if($paket->fitur)
                        <ul class="mt-3 space-y-1">
                            @foreach(explode("\n", $paket->fitur) as $fitur)
                                @if(trim($fitur))
                                    <li class="text-gray-400 text-xs"><i class="fas fa-check text-green-400 mr-1"></i>{{ trim($fitur) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                    <p class="text-gray-600 text-xs mt-3">{{ $paket->langganan->count() }} subscriber</p>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-gem text-gray-700 text-4xl mb-3"></i>
                    <p class="text-gray-500">Belum ada paket eksklusif.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
