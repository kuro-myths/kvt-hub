<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'user_id',
        'kelas_id',
        'tipe_diagram',
        'data_json',
        'status',
    ];

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public static function tipeDiagram(): array
    {
        return [
            // ===== BATANG / BAR (1-8) =====
            'Bar Chart',
            'Horizontal Bar',
            'Stacked Bar',
            'Grouped Bar',
            'Rounded Bar',
            'Gradient Bar',
            'Negative Bar',
            'Floating Bar',

            // ===== GARIS / LINE (9-16) =====
            'Line Chart',
            'Area Chart',
            'Multi-Line',
            'Stepped Line',
            'Curved Line',
            'Dashed Line',
            'Point Line',
            'Multi-Axis Line',

            // ===== LINGKARAN / CIRCLE (17-22) =====
            'Pie Chart',
            'Doughnut Chart',
            'Semi Doughnut',
            'Nested Doughnut',
            'Polar Area',
            'Rose Chart',

            // ===== RADAR & SCATTER (23-28) =====
            'Radar Chart',
            'Filled Radar',
            'Scatter Plot',
            'Bubble Chart',
            'XY Scatter',
            'Cluster Scatter',

            // ===== KOMBINASI (29-32) =====
            'Mixed Chart',
            'Combo Chart',
            'Bar-Line Combo',
            'Dual Axis',

            // ===== STATISTIK (33-38) =====
            'Histogram',
            'Box Plot',
            'Waterfall Chart',
            'Pareto Chart',
            'Bell Curve',
            'Error Bar',

            // ===== FLOW & RELATION (39-42) =====
            'Funnel Chart',
            'Pyramid Chart',
            'Sankey Diagram',
            'Sunburst',

            // ===== INDIKATOR (43-46) =====
            'Gauge Chart',
            'Progress Bar',
            'KPI Card',
            'Speedometer',

            // ===== KHUSUS (47-50) =====
            'Heatmap',
            'Treemap',
            'Candlestick',
            'Timeline',
        ];
    }
}
