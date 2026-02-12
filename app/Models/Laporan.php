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
            'Bar Chart',
            'Horizontal Bar',
            'Stacked Bar',
            'Line Chart',
            'Area Chart',
            'Multi-Line',
            'Stepped Line',
            'Pie Chart',
            'Doughnut Chart',
            'Polar Area',
            'Radar Chart',
            'Scatter Plot',
            'Bubble Chart',
            'Mixed Chart',
            'Combo Chart',
            'Waterfall Chart',
            'Funnel Chart',
            'Gantt Chart',
            'Histogram',
            'Box Plot',
            'Heatmap',
            'Treemap',
            'Sunburst',
            'Sankey Diagram',
            'Gauge Chart',
            'Sparkline',
            'Candlestick',
            'Timeline',
            'Progress Bar',
            'KPI Card',
        ];
    }
}
