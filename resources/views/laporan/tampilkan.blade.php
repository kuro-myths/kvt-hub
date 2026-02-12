@extends('tata-letak.utama')
@section('judul', $laporan->judul . ' - Laporan KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-right">
            <div>
                <a href="{{ route('laporan.index') }}" class="text-gray-500 hover:text-kvt-400 text-sm transition mb-2 inline-block">
                    <i class="fas fa-arrow-left mr-1"></i>Kembali ke Laporan
                </a>
                <h1 class="text-2xl font-black text-white">{{ $laporan->judul }}</h1>
                <div class="flex items-center gap-3 mt-1 text-sm text-gray-500">
                    <span><i class="fas fa-chart-pie mr-1"></i>{{ $laporan->tipe_diagram }}</span>
                    <span>•</span>
                    <span>{{ $laporan->pembuat->name }}</span>
                    <span>•</span>
                    <span>{{ $laporan->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        @if($laporan->deskripsi)
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-6" data-aos="fade-up">
                <p class="text-gray-400">{{ $laporan->deskripsi }}</p>
            </div>
        @endif

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8" data-aos="fade-up">
            <div class="relative" style="height: 400px;">
                <canvas id="chartLaporan"></canvas>
            </div>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mt-6" data-aos="fade-up">
            <h3 class="text-white font-bold mb-3"><i class="fas fa-database mr-2 text-kvt-400"></i>Data Mentah</h3>
            <pre class="bg-kvt-800/50 rounded-xl p-4 text-sm text-gray-400 overflow-x-auto font-mono">{{ json_encode(json_decode($laporan->data_json), JSON_PRETTY_PRINT) }}</pre>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('chartLaporan').getContext('2d');
    const rawData = @json(json_decode($laporan->data_json, true));
    const tipeDiagram = '{{ $laporan->tipe_diagram }}';

    const chartTypeMap = {
        'Bar Chart': 'bar',
        'Horizontal Bar': 'bar',
        'Stacked Bar': 'bar',
        'Line Chart': 'line',
        'Area Chart': 'line',
        'Multi-Line': 'line',
        'Stepped Line': 'line',
        'Pie Chart': 'pie',
        'Doughnut Chart': 'doughnut',
        'Polar Area': 'polarArea',
        'Radar Chart': 'radar',
        'Scatter Plot': 'scatter',
        'Bubble Chart': 'bubble',
        'Mixed Chart': 'bar',
        'Combo Chart': 'bar',
        'Waterfall Chart': 'bar',
        'Funnel Chart': 'bar',
        'Gantt Chart': 'bar',
        'Histogram': 'bar',
        'Box Plot': 'bar',
        'Heatmap': 'bar',
        'Treemap': 'bar',
        'Sunburst': 'doughnut',
        'Sankey Diagram': 'bar',
        'Gauge Chart': 'doughnut',
        'Sparkline': 'line',
        'Candlestick': 'bar',
        'Timeline': 'bar',
        'Progress Bar': 'bar',
        'KPI Card': 'bar'
    };

    const chartType = chartTypeMap[tipeDiagram] || 'bar';

    const colors = [
        'rgba(59, 130, 246, 0.8)', 'rgba(168, 85, 247, 0.8)', 'rgba(34, 197, 94, 0.8)',
        'rgba(234, 179, 8, 0.8)', 'rgba(239, 68, 68, 0.8)', 'rgba(6, 182, 212, 0.8)',
        'rgba(249, 115, 22, 0.8)', 'rgba(236, 72, 153, 0.8)', 'rgba(132, 204, 22, 0.8)',
        'rgba(99, 102, 241, 0.8)'
    ];

    const datasets = (rawData.datasets || []).map((ds, i) => ({
        ...ds,
        backgroundColor: ds.backgroundColor || colors,
        borderColor: ds.borderColor || colors[i % colors.length],
        borderWidth: ds.borderWidth || 2,
        fill: tipeDiagram === 'Area Chart' ? true : (ds.fill || false),
        tension: 0.4
    }));

    const options = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { labels: { color: '#9ca3af', font: { family: 'Inter' } } },
            title: { display: false }
        },
        scales: {}
    };

    if (!['pie', 'doughnut', 'polarArea', 'radar'].includes(chartType)) {
        options.scales = {
            x: { ticks: { color: '#6b7280' }, grid: { color: 'rgba(107, 114, 128, 0.1)' } },
            y: { ticks: { color: '#6b7280' }, grid: { color: 'rgba(107, 114, 128, 0.1)' } }
        };
    }

    if (tipeDiagram === 'Horizontal Bar') {
        options.indexAxis = 'y';
    }

    if (tipeDiagram === 'Stacked Bar') {
        options.scales.x.stacked = true;
        options.scales.y.stacked = true;
    }

    if (tipeDiagram === 'Stepped Line') {
        datasets.forEach(ds => ds.stepped = true);
    }

    new Chart(ctx, {
        type: chartType,
        data: { labels: rawData.labels || [], datasets },
        options
    });
});
</script>
@endpush
