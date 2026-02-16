<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\KuisHasil;
use App\Models\Kehadiran;
use App\Models\MateriProgres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DasborController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->adalahAdmin()) {
            return redirect()->route('admin.dasbor');
        }

        if ($user->adalahPengajar()) {
            return redirect()->route('pengajar.dasbor');
        }

        if ($user->adalahStaff()) {
            return redirect()->route('staff.dasbor');
        }

        return redirect()->route('pengguna.dasbor');
    }
}
