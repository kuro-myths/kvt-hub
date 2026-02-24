<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\KunciAdmin;
use Illuminate\Support\Facades\DB;

class DasborController extends Controller
{
    public function index()
    {
        $totalPengguna = User::count();
        $totalKelas = Kelas::count();
        $totalMateri = Materi::count();
        $totalKunci = KunciAdmin::where('digunakan', false)->count();
        $penggunaTerbaru = User::latest()->take(10)->get();

        // Data chart: Pengguna per bulan (6 bulan terakhir)
        $penggunaPerBulan = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = now()->subMonths($i);
            $penggunaPerBulan[] = [
                'label' => $bulan->locale('id')->isoFormat('MMM Y'),
                'jumlah' => User::whereYear('created_at', $bulan->year)
                    ->whereMonth('created_at', $bulan->month)
                    ->count(),
            ];
        }

        // Data chart: Distribusi peran
        $distribusiPeran = User::select('peran', DB::raw('count(*) as total'))
            ->groupBy('peran')
            ->pluck('total', 'peran')
            ->toArray();

        return view('akun.admin.dasbor', compact(
            'totalPengguna', 'totalKelas', 'totalMateri', 'totalKunci',
            'penggunaTerbaru', 'penggunaPerBulan', 'distribusiPeran'
        ));
    }

    public function eksporExcel()
    {
        $users = User::select('name', 'email', 'peran', 'level', 'poin', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        $filename = 'data-pengguna-kvthub-' . now()->format('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            // BOM for Excel UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, ['Nama', 'Email', 'Peran', 'Level', 'Poin', 'Terdaftar']);
            foreach ($users as $u) {
                fputcsv($file, [
                    $u->name,
                    $u->email,
                    ucfirst($u->peran ?? 'pengguna'),
                    $u->level ?? 0,
                    $u->poin ?? 0,
                    $u->created_at->format('d/m/Y H:i'),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
