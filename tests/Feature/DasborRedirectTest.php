<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DasborRedirectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * User terverifikasi (siswa) harus diarahkan ke dasbor pengguna.
     */
    public function test_user_terverifikasi_redirect_ke_dasbor(): void
    {
        $user = User::factory()->create([
            'peran' => User::PERAN_SISWA,
            'status_verifikasi' => User::STATUS_TERVERIFIKASI,
        ]);

        $response = $this->actingAs($user)->get('/dasbor');

        $response->assertRedirect(route('pengguna.dasbor'));
    }

    /**
     * User belum terverifikasi (siswa pending) harus diarahkan ke halaman status verifikasi.
     */
    public function test_user_belum_terverifikasi_redirect_ke_verifikasi_status(): void
    {
        $user = User::factory()->create([
            'peran' => User::PERAN_SISWA,
            'status_verifikasi' => User::STATUS_PENDING,
        ]);

        $response = $this->actingAs($user)->get('/dasbor');

        $response->assertRedirect(route('verifikasi.status'));
    }

    /**
     * User ditolak harus diarahkan ke halaman status verifikasi.
     */
    public function test_user_ditolak_redirect_ke_verifikasi_status(): void
    {
        $user = User::factory()->create([
            'peran' => User::PERAN_MAHASISWA,
            'status_verifikasi' => User::STATUS_DITOLAK,
        ]);

        $response = $this->actingAs($user)->get('/dasbor');

        $response->assertRedirect(route('verifikasi.status'));
    }

    /**
     * Pengunjung tidak butuh verifikasi, langsung ke dasbor.
     */
    public function test_pengunjung_tidak_butuh_verifikasi(): void
    {
        $user = User::factory()->create([
            'peran' => User::PERAN_PENGUNJUNG,
            'status_verifikasi' => User::STATUS_PENDING,
        ]);

        $response = $this->actingAs($user)->get('/dasbor');

        // Pengunjung tidak butuh verifikasi, jadi redirect ke dasbor pengguna
        $response->assertRedirect(route('pengguna.dasbor'));
    }

    /**
     * Admin langsung redirect ke dasbor admin.
     */
    public function test_admin_redirect_ke_dasbor_admin(): void
    {
        $user = User::factory()->create([
            'peran' => User::PERAN_ADMIN,
            'status_verifikasi' => User::STATUS_TERVERIFIKASI,
            'dibuat_oleh_admin' => true,
        ]);

        $response = $this->actingAs($user)->get('/dasbor');

        $response->assertRedirect(route('admin.dasbor'));
    }

    /**
     * Pengajar redirect ke dasbor pengajar.
     */
    public function test_pengajar_redirect_ke_dasbor_pengajar(): void
    {
        $user = User::factory()->create([
            'peran' => User::PERAN_PENGAJAR,
            'status_verifikasi' => User::STATUS_TERVERIFIKASI,
            'dibuat_oleh_admin' => true,
        ]);

        $response = $this->actingAs($user)->get('/dasbor');

        $response->assertRedirect(route('pengajar.dasbor'));
    }

    /**
     * Guest harus redirect ke login.
     */
    public function test_guest_redirect_ke_login(): void
    {
        $response = $this->get('/dasbor');

        $response->assertRedirect(route('masuk'));
    }
}
