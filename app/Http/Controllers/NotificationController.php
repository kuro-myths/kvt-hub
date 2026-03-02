<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    /**
     * Get all active notifications (public + user-specific).
     */
    public function index(Request $request): JsonResponse
    {
        $notifications = Notification::where('aktif', true)
            ->where(function ($q) {
                $q->whereNull('mulai_pada')
                    ->orWhere('mulai_pada', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('berakhir_pada')
                    ->orWhere('berakhir_pada', '>=', now());
            })
            ->orderByDesc('dibuat_pada')
            ->take(20)
            ->get();

        // Merge with berita-based notifications
        $beritaNotifs = [];
        try {
            $berita = \App\Models\Berita::terbit()
                ->latest('terbit_pada')
                ->take(5)
                ->get(['id', 'judul', 'slug', 'ringkasan', 'kategori', 'terbit_pada']);

            foreach ($berita as $b) {
                $beritaNotifs[] = [
                    'id' => 'berita_' . $b->id,
                    'tipe' => 'berita',
                    'judul' => $b->judul,
                    'pesan' => $b->ringkasan ?? '',
                    'ikon' => 'fa-newspaper',
                    'warna' => 'text-blue-400',
                    'bg' => 'bg-blue-500/10',
                    'url' => '/berita/' . $b->slug,
                    'waktu' => $b->terbit_pada?->toISOString(),
                ];
            }
        } catch (\Exception $e) {
            // Berita model may not exist yet
        }

        $systemNotifs = $notifications->map(function ($n) {
            return [
                'id' => 'sys_' . $n->id,
                'tipe' => $n->tipe,
                'judul' => $n->judul,
                'pesan' => $n->pesan,
                'ikon' => $n->ikon ?? 'fa-bell',
                'warna' => $n->warna ?? 'text-kvt-400',
                'bg' => $n->bg_warna ?? 'bg-kvt-500/10',
                'url' => $n->url,
                'waktu' => $n->dibuat_pada?->toISOString(),
            ];
        })->toArray();

        // Merge and sort by time
        $all = collect(array_merge($systemNotifs, $beritaNotifs))
            ->sortByDesc('waktu')
            ->values()
            ->take(15)
            ->toArray();

        return response()->json([
            'total' => count($all),
            'notifikasi' => $all,
        ]);
    }

    /**
     * Mark notification as read (authenticated users).
     */
    public function markAsRead(Request $request): JsonResponse
    {
        $request->validate(['ids' => 'required|array']);

        // For system notifications, track in user's read list
        $user = $request->user();
        $readIds = $user->notif_dibaca ?? [];
        $readIds = array_unique(array_merge($readIds, $request->ids));
        $user->notif_dibaca = $readIds;
        $user->save();

        return response()->json(['success' => true]);
    }
}
