<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Kehadiran;
use App\Models\User;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadiran = Kehadiran::with('user')
            ->whereMonth('tanggal', now()->month)
            ->latest('tanggal')
            ->paginate(20);

        return view('akun.staff.kehadiran.index', compact('kehadiran'));
    }

    public function rekap()
    {
        $pengguna = User::where('peran', 'pengguna')
            ->withCount(['kehadiran as hadir_count' => fn($q) => $q->where('status', 'hadir')->whereMonth('tanggal', now()->month)])
            ->paginate(20);

        return view('akun.staff.kehadiran.rekap', compact('pengguna'));
    }
}
