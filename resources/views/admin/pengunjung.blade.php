@extends('tata-letak.utama')
@section('judul', 'Admin Pengunjung - KVT Hub')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-white mb-6"><i class="fas fa-chart-area text-kvt-400 mr-2"></i>Analitik Pengunjung</h1>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="kaca-gelap rounded-2xl p-5" data-aos="fade-up">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-kvt-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-eye text-kvt-400 text-lg"></i></div>
                <div>
                    <p class="text-xs text-gray-500">Hari Ini</p>
                    <p class="text-2xl font-bold text-white">{{ number_format($stats['hari_ini']) }}</p>
                </div>
            </div>
        </div>
        <div class="kaca-gelap rounded-2xl p-5" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-green-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-users text-green-400 text-lg"></i></div>
                <div>
                    <p class="text-xs text-gray-500">Online</p>
                    <p class="text-2xl font-bold text-green-400">{{ number_format($stats['online']) }}</p>
                </div>
            </div>
        </div>
        <div class="kaca-gelap rounded-2xl p-5" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-yellow-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-chart-line text-yellow-400 text-lg"></i></div>
                <div>
                    <p class="text-xs text-gray-500">Total</p>
                    <p class="text-2xl font-bold text-white">{{ number_format($stats['total']) }}</p>
                </div>
            </div>
        </div>
        <div class="kaca-gelap rounded-2xl p-5" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-purple-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-fingerprint text-purple-400 text-lg"></i></div>
                <div>
                    <p class="text-xs text-gray-500">Unik</p>
                    <p class="text-2xl font-bold text-white">{{ number_format($stats['total_unik']) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        {{-- Weekly Chart --}}
        <div class="kaca-gelap rounded-2xl p-6" data-aos="fade-up">
            <h3 class="text-sm font-bold text-white mb-4"><i class="fas fa-chart-bar text-kvt-400 mr-2"></i>Pengunjung 7 Hari Terakhir</h3>
            <canvas id="chartMingguan" height="200"></canvas>
        </div>

        {{-- Hourly Chart --}}
        <div class="kaca-gelap rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-sm font-bold text-white mb-4"><i class="fas fa-clock text-yellow-400 mr-2"></i>Pengunjung Per Jam (Hari Ini)</h3>
            <canvas id="chartPerJam" height="200"></canvas>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        {{-- Top Countries --}}
        <div class="kaca-gelap rounded-2xl p-6" data-aos="fade-up">
            <h3 class="text-sm font-bold text-white mb-4"><i class="fas fa-globe text-kvt-400 mr-2"></i>Negara Teratas</h3>
            <div class="space-y-2">
                @foreach($perNegara as $ng)
                    <div class="flex items-center justify-between py-1.5">
                        <div class="flex items-center gap-2">
                            <img src="https://flagcdn.com/w20/{{ strtolower($ng->kode_negara ?: 'xx') }}.png" alt="" class="w-5 h-4 rounded-sm object-cover">
                            <span class="text-sm text-gray-300">{{ $ng->negara ?: 'Unknown' }}</span>
                        </div>
                        <span class="text-sm text-white font-medium">{{ number_format($ng->total) }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Popular Pages --}}
        <div class="kaca-gelap rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-sm font-bold text-white mb-4"><i class="fas fa-file text-green-400 mr-2"></i>Halaman Populer</h3>
            <div class="space-y-2">
                @foreach($halamanPopuler as $h)
                    <div class="flex items-center justify-between py-1.5">
                        <span class="text-sm text-gray-300 truncate max-w-[200px]">{{ $h->halaman }}</span>
                        <span class="text-sm text-white font-medium">{{ number_format($h->total) }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Browser Distribution --}}
        <div class="kaca-gelap rounded-2xl p-6" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-sm font-bold text-white mb-4"><i class="fas fa-globe text-purple-400 mr-2"></i>Browser</h3>
            <canvas id="chartBrowser" height="200"></canvas>
        </div>
    </div>

    {{-- Recent Visitors --}}
    <div class="kaca-gelap rounded-2xl overflow-hidden" data-aos="fade-up">
        <div class="px-6 py-4 border-b border-kvt-700/20">
            <h3 class="text-sm font-bold text-white"><i class="fas fa-history text-kvt-400 mr-2"></i>Kunjungan Terbaru (50 terakhir)</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-xs">
                <thead class="bg-kvt-800/50 text-gray-400 text-left uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-2.5">Waktu</th>
                        <th class="px-4 py-2.5">IP</th>
                        <th class="px-4 py-2.5">Halaman</th>
                        <th class="px-4 py-2.5">Negara</th>
                        <th class="px-4 py-2.5">Browser</th>
                        <th class="px-4 py-2.5">OS</th>
                        <th class="px-4 py-2.5">Device</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-kvt-700/10">
                    @foreach($recentVisitors as $v)
                        <tr class="hover:bg-kvt-800/20 transition">
                            <td class="px-4 py-2 text-gray-400">{{ $v->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-2 text-gray-300 font-mono">{{ $v->ip_address }}</td>
                            <td class="px-4 py-2 text-kvt-400 truncate max-w-[200px]">{{ $v->halaman }}</td>
                            <td class="px-4 py-2">
                                <div class="flex items-center gap-1.5">
                                    <img src="https://flagcdn.com/w20/{{ strtolower($v->kode_negara ?: 'xx') }}.png" alt="" class="w-4 h-3 rounded-sm">
                                    <span class="text-gray-300">{{ $v->negara ?: '-' }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-2 text-gray-400">{{ $v->browser ?: '-' }}</td>
                            <td class="px-4 py-2 text-gray-400">{{ $v->os ?: '-' }}</td>
                            <td class="px-4 py-2 text-gray-400">{{ $v->perangkat ?: '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Weekly chart
    const mingguanData = @json($grafikMingguan);
    new Chart(document.getElementById('chartMingguan'),{type:'bar',data:{labels:mingguanData.map(d=>d.tanggal),datasets:[{label:'Pengunjung',data:mingguanData.map(d=>d.total),backgroundColor:'rgba(51,153,255,0.6)',borderRadius:6}]},options:{responsive:true,plugins:{legend:{display:false}},scales:{x:{ticks:{color:'#6B7280',font:{size:10}},grid:{display:false}},y:{ticks:{color:'#6B7280',font:{size:10}},grid:{color:'rgba(51,153,255,0.1)'}}}}});

    // Hourly chart
    const perJamData = @json($grafikPerJam);
    new Chart(document.getElementById('chartPerJam'),{type:'line',data:{labels:perJamData.map(d=>d.jam+':00'),datasets:[{label:'Pengunjung',data:perJamData.map(d=>d.total),borderColor:'#EAB308',backgroundColor:'rgba(234,179,8,0.1)',fill:true,tension:0.4,pointRadius:3}]},options:{responsive:true,plugins:{legend:{display:false}},scales:{x:{ticks:{color:'#6B7280',font:{size:10}},grid:{display:false}},y:{ticks:{color:'#6B7280',font:{size:10}},grid:{color:'rgba(234,179,8,0.1)'}}}}});

    // Browser pie chart
    const browserCounts = {};
    @foreach($recentVisitors as $v)
        browserCounts['{{ $v->browser ?: "Unknown" }}'] = (browserCounts['{{ $v->browser ?: "Unknown" }}'] || 0) + 1;
    @endforeach
    const browserLabels = Object.keys(browserCounts).slice(0,5);
    const browserValues = browserLabels.map(l=>browserCounts[l]);
    new Chart(document.getElementById('chartBrowser'),{type:'doughnut',data:{labels:browserLabels,datasets:[{data:browserValues,backgroundColor:['#3399FF','#8B5CF6','#10B981','#EAB308','#EF4444'],borderWidth:0}]},options:{responsive:true,plugins:{legend:{position:'bottom',labels:{color:'#9CA3AF',font:{size:10},padding:8}}}}});
</script>
@endpush
@endsection
