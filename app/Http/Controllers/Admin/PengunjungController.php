<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;

class PengunjungController extends Controller
{
    public function index()
    {
        return view('akun.admin.pengunjung');
    }
}
