@extends('tata-letak.utama')
@section('judul', 'Admin Kerja Sama - KVT Hub')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white"><i class="fas fa-handshake text-yellow-400 mr-2"></i>Kelola Kerja Sama</h1>
            <p class="text-sm text-gray-500 mt-1">Total: {{ $kerjaSama->total() }} mitra</p>
        </div>
        <a href="{{ route('admin.kerja-sama.buat') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:from-kvt-400 hover:to-ungu-400 transition">
            <i class="fas fa-plus mr-1"></i> Tambah Mitra
        </a>
    </div>

    @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-4 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>
    @endif

    <div class="kaca-gelap rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-kvt-800/50 text-gray-400 text-left text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3">Mitra</th>
                        <th class="px-4 py-3">Tipe</th>
                        <th class="px-4 py-3">Tier</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Beranda</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-kvt-700/20">
                    @forelse($kerjaSama as $item)
                        <tr class="hover:bg-kvt-800/20 transition">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-white/5 rounded-lg flex items-center justify-center overflow-hidden shrink-0">
                                        @if($item->logo)
                                            <img src="{{ asset('storage/' . $item->logo) }}" alt="" class="max-w-full max-h-full p-0.5">
                                        @else
                                            <i class="fas fa-building text-gray-600 text-xs"></i>
                                        @endif
                                    </div>
                                    <span class="text-white font-medium">{{ $item->nama }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3"><span class="text-xs text-gray-400">{{ App\Models\KerjaSama::tipeList()[$item->tipe] ?? $item->tipe }}</span></td>
                            <td class="px-4 py-3"><span class="text-xs font-bold uppercase bg-gradient-to-r {{ $item->tierWarna() }} text-transparent bg-clip-text">{{ $item->tier }}</span></td>
                            <td class="px-4 py-3">
                                @if($item->aktif)
                                    <span class="text-xs text-green-400"><i class="fas fa-check-circle mr-1"></i>Aktif</span>
                                @else
                                    <span class="text-xs text-gray-500"><i class="fas fa-minus-circle mr-1"></i>Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($item->tampil_beranda)<i class="fas fa-check text-green-400 text-xs"></i>@else<i class="fas fa-minus text-gray-600 text-xs"></i>@endif
                            </td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.kerja-sama.edit', $item) }}" class="w-7 h-7 bg-kvt-800/50 rounded flex items-center justify-center text-kvt-400 hover:text-white transition"><i class="fas fa-edit text-xs"></i></a>
                                    <form method="POST" action="{{ route('admin.kerja-sama.hapus', $item) }}" onsubmit="return confirm('Hapus mitra ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-7 h-7 bg-kvt-800/50 rounded flex items-center justify-center text-red-400 hover:text-red-300 transition"><i class="fas fa-trash text-xs"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-4 py-8 text-center text-gray-500">Belum ada mitra</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-6">{{ $kerjaSama->links() }}</div>
</div>
@endsection
