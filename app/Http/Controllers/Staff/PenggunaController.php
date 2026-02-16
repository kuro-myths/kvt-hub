<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::where('peran', 'pengguna')->latest()->paginate(20);
        return view('akun.staff.pengguna.index', compact('pengguna'));
    }

    public function tampilkan(User $pengguna)
    {
        $pengguna->load(['kelasYangDiikuti', 'nilai', 'krs']);
        return view('akun.staff.pengguna.tampilkan', compact('pengguna'));
    }
}
