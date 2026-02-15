@extends('tata-letak.utama')
@section('judul', 'Bobot Nilai - Admin')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

        <h1 class="text-xl font-bold text-white mb-6"><i class="fas fa-weight text-yellow-400 mr-2"></i>Bobot Nilai / Konversi</h1>

        @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Form --}}
            <div class="kaca rounded-xl p-5 border border-kvt-700/20 h-fit">
                <h2 class="text-sm font-bold text-white mb-4">Pilih & Tambah</h2>

                <form method="GET" class="mb-5">
                    <label class="text-xs text-gray-400 mb-1 block">Kurikulum</label>
                    <select name="kurikulum_id" onchange="this.form.submit()" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500">
                        <option value="">Pilih Kurikulum</option>
                        @foreach($kurikulumList as $k)
                        <option value="{{ $k->id }}" {{ $kurikulumId == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </form>

                @if($kurikulumId)
                <form action="{{ route('admin.bobot-nilai.simpan') }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="hidden" name="kurikulum_id" value="{{ $kurikulumId }}">
                    <input type="text" name="huruf" placeholder="Huruf (A, B+, dst)" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500 placeholder-gray-600">
                    <input type="number" name="bobot" placeholder="Bobot (4.00)" step="0.01" min="0" max="4" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500 placeholder-gray-600">
                    <div class="grid grid-cols-2 gap-2">
                        <input type="number" name="batas_bawah" placeholder="Min" min="0" max="100" required class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500 placeholder-gray-600">
                        <input type="number" name="batas_atas" placeholder="Max" min="0" max="100" required class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500 placeholder-gray-600">
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-kvt-500 to-ungu-500 text-white py-2 rounded-lg text-xs font-semibold">
                        <i class="fas fa-plus mr-1"></i>Tambah Bobot
                    </button>
                </form>
                @endif
            </div>

            {{-- Table --}}
            <div class="lg:col-span-2 kaca rounded-xl border border-kvt-700/20 overflow-hidden">
                @if($bobotNilai->isNotEmpty())
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-gray-500 border-b border-kvt-700/15 bg-kvt-900/30">
                            <th class="px-5 py-3 text-center">Huruf</th>
                            <th class="px-5 py-3 text-center">Bobot</th>
                            <th class="px-5 py-3 text-center">Batas Bawah</th>
                            <th class="px-5 py-3 text-center">Batas Atas</th>
                            <th class="px-5 py-3 text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bobotNilai as $bn)
                        <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                            <td class="px-5 py-3 text-center text-white font-bold text-lg">{{ $bn->huruf }}</td>
                            <td class="px-5 py-3 text-center text-kvt-400 font-semibold">{{ number_format($bn->bobot, 2) }}</td>
                            <td class="px-5 py-3 text-center text-gray-400">{{ $bn->batas_bawah }}</td>
                            <td class="px-5 py-3 text-center text-gray-400">{{ $bn->batas_atas }}</td>
                            <td class="px-5 py-3 text-center text-gray-500 text-xs">{{ $bn->keterangan ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="p-12 text-center text-gray-500">
                    {{ $kurikulumId ? 'Belum ada bobot nilai untuk kurikulum ini.' : 'Pilih kurikulum terlebih dahulu.' }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
