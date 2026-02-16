<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Kehadiran;
use Illuminate\Support\Facades\Auth;

class DasborController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $statistik = [
            'total_pengguna' => User::where('peran', 'pengguna')->count(),
            'total_pengajar' => User::where('peran', 'pengajar')->count(),
            'total_kelas' => Kelas::where('status', 'aktif')->count(),
            'total_materi' => Materi::where('status', 'terbit')->count(),
        ];

        $penggunaTerbaru = User::where('peran', 'pengguna')->latest()->take(10)->get();

        return view('akun.staff.dasbor', compact('user', 'statistik', 'penggunaTerbaru'));
    }
}
