<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\KunciAdmin;

class DasborController extends Controller
{
    public function index()
    {
        $totalPengguna = User::count();
        $totalKelas = Kelas::count();
        $totalMateri = Materi::count();
        $totalKunci = KunciAdmin::where('digunakan', false)->count();
        $penggunaTerbaru = User::latest()->take(10)->get();

        return view('akun.admin.dasbor', compact('totalPengguna', 'totalKelas', 'totalMateri', 'totalKunci', 'penggunaTerbaru'));
    }
}
