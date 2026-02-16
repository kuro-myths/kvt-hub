<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            // Role-based route files
            Route::middleware(['web', 'auth', 'cek.peran:admin'])
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            Route::middleware(['web', 'auth', 'cek.peran:pengguna,siswa,mahasiswa,orang_tua,pengunjung'])
                ->prefix('pengguna')
                ->name('pengguna.')
                ->group(base_path('routes/pengguna.php'));

            Route::middleware(['web', 'auth', 'cek.peran:pengajar,guru'])
                ->prefix('pengajar')
                ->name('pengajar.')
                ->group(base_path('routes/pengajar.php'));

            Route::middleware(['web', 'auth', 'cek.peran:staff'])
                ->prefix('staff')
                ->name('staff.')
                ->group(base_path('routes/staff.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'cek.peran' => \App\Http\Middleware\CekPeran::class,
        ]);

        $middleware->web(append: [
            \App\Http\Middleware\CatatPengunjung::class,
        ]);

        $middleware->redirectGuestsTo('/masuk');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
