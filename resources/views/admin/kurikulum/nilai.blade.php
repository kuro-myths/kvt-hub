@extends('tata-letak.utama')
@section('judul', 'Kelola Nilai - Admin')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-xl font-bold text-white"><i class="fas fa-star text-yellow-400 mr-2"></i>Kelola Nilai</h1>
            <form method="GET" class="flex gap-2">
                <select name="kurikulum_id" onchange="this.form.submit()" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                    <option value="">Semua Kurikulum</option>
                    @foreach($kurikulumList as $k)
                    <option value="{{ $k->id }}" {{ request('kurikulum_id') == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Input Form --}}
            <div class="kaca rounded-xl p-5 border border-kvt-700/20 h-fit">
                <h2 class="text-sm font-bold text-white mb-4">Input Nilai</h2>
                <form action="{{ route('admin.nilai.simpan') }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">User ID</label>
                        <input type="number" name="user_id" required placeholder="ID Pengguna" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500 placeholder-gray-600">
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Mata Pelajaran ID</label>
                        <input type="number" name="mata_pelajaran_id" required placeholder="ID Mata Pelajaran" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500 placeholder-gray-600">
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="text-xs text-gray-400 mb-1 block">Tugas</label>
                            <input type="number" name="tugas" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 mb-1 block">UTS</label>
                            <input type="number" name="uts" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="text-xs text-gray-400 mb-1 block">UAS</label>
                            <input type="number" name="uas" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 mb-1 block">Praktik</label>
                            <input type="number" name="praktik" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                        </div>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Partisipasi</label>
                        <input type="number" name="partisipasi" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-kvt-500 to-ungu-500 text-white py-2 rounded-lg text-xs font-semibold">
                        <i class="fas fa-save mr-1"></i>Simpan Nilai
                    </button>
                </form>
            </div>

            {{-- Table --}}
            <div class="lg:col-span-2 kaca rounded-xl border border-kvt-700/20 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-xs text-gray-500 border-b border-kvt-700/15 bg-kvt-900/30">
                                <th class="px-4 py-3 text-left">Pengguna</th>
                                <th class="px-4 py-3 text-left">Mata Pelajaran</th>
                                <th class="px-4 py-3 text-center">Tugas</th>
                                <th class="px-4 py-3 text-center">UTS</th>
                                <th class="px-4 py-3 text-center">UAS</th>
                                <th class="px-4 py-3 text-center">Akhir</th>
                                <th class="px-4 py-3 text-center">Mutu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($nilaiList as $n)
                            <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                                <td class="px-4 py-3 text-white text-xs">{{ $n->pengguna->name ?? '-' }}</td>
                                <td class="px-4 py-3 text-gray-300 text-xs">{{ $n->mataPelajaran->nama ?? '-' }}</td>
                                <td class="px-4 py-3 text-center text-gray-400 text-xs">{{ $n->tugas ?? '-' }}</td>
                                <td class="px-4 py-3 text-center text-gray-400 text-xs">{{ $n->uts ?? '-' }}</td>
                                <td class="px-4 py-3 text-center text-gray-400 text-xs">{{ $n->uas ?? '-' }}</td>
                                <td class="px-4 py-3 text-center text-white font-semibold">{{ $n->nilai_akhir ? number_format($n->nilai_akhir, 1) : '-' }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="font-bold {{ match($n->huruf_mutu) { 'A' => 'text-green-400', 'B' => 'text-blue-400', 'C' => 'text-yellow-400', default => 'text-red-400' } }}">
                                        {{ $n->huruf_mutu ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="px-4 py-8 text-center text-gray-500">Belum ada data nilai.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-kvt-700/15">{{ $nilaiList->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
