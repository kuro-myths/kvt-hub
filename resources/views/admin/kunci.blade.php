@extends('tata-letak.utama')
@section('judul', 'Kunci Admin - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-right">
            <div>
                <h1 class="text-2xl font-black text-white"><i class="fas fa-key mr-3 text-yellow-400"></i>Kunci Admin</h1>
                <p class="text-gray-400 text-sm mt-1">Kelola kunci akses admin</p>
            </div>
            <a href="{{ route('admin.dasbor') }}" class="text-gray-400 hover:text-white transition">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-6" data-aos="fade-up">
            <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-plus-circle mr-2 text-kvt-400"></i>Buat Kunci Baru</h2>
            <form method="POST" action="{{ route('admin.kunci.buat') }}" class="flex gap-4">
                @csrf
                <input type="text" name="deskripsi" placeholder="Deskripsi kunci (opsional)" class="flex-1 bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500/50 transition placeholder-gray-500">
                <button type="submit" class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg">
                    <i class="fas fa-key mr-2"></i>Generate
                </button>
            </form>
        </div>

        @if(session('kunci_baru'))
            <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-2xl p-6 mb-6" data-aos="fade-up">
                <p class="text-yellow-400 font-bold mb-2"><i class="fas fa-exclamation-triangle mr-2"></i>Kunci baru berhasil dibuat!</p>
                <div class="bg-kvt-800/80 rounded-xl p-4 flex items-center justify-between">
                    <code class="text-yellow-300 text-lg font-mono">{{ session('kunci_baru') }}</code>
                    <button onclick="navigator.clipboard.writeText('{{ session('kunci_baru') }}')" class="text-gray-400 hover:text-yellow-400 transition">
                        <i class="fas fa-copy text-xl"></i>
                    </button>
                </div>
                <p class="text-gray-500 text-xs mt-2">Salin dan simpan kunci ini. Kunci tidak akan ditampilkan lagi.</p>
            </div>
        @endif

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-kvt-800/50 border-b border-kvt-700/30">
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">#</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Kunci</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Deskripsi</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Digunakan Oleh</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Dibuat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-kvt-700/20">
                    @forelse($kunciList as $kunci)
                        <tr class="hover:bg-kvt-800/30 transition">
                            <td class="px-6 py-4 text-gray-500 text-sm">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <code class="text-kvt-400 text-sm font-mono">{{ Str::mask($kunci->kunci, '*', 8) }}</code>
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">{{ $kunci->deskripsi ?: '-' }}</td>
                            <td class="px-6 py-4">
                                @if($kunci->digunakan)
                                    <span class="text-xs px-2 py-1 rounded-full bg-gray-500/20 text-gray-400">Sudah Digunakan</span>
                                @else
                                    <span class="text-xs px-2 py-1 rounded-full bg-green-500/20 text-green-400">Tersedia</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">{{ $kunci->pengguna ? $kunci->pengguna->name : '-' }}</td>
                            <td class="px-6 py-4 text-gray-500 text-xs">{{ $kunci->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">Belum ada kunci admin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
