<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\MateriProgress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MateriController extends Controller
{
    public function index(): View
    {
        $materi = Materi::query()

            ->where('is_active', true)
            ->orderBy('bab', 'asc')
            ->orderBy('id', 'asc')
            ->get()
            ->unique('bab')
            ->values();

            dd($materi->count()); // tambahkan ini sementara

        return view('siswa.materi.index', compact('materi'));
    }

    public function show(int $id): View
    {
        $materi = Materi::with([
            'subMateri.detailItems'
        ])->findOrFail($id);

        $progress = MateriProgress::query()
            ->where('user_id', Auth::id())
            ->where('materi_id', $materi->id)
            ->first();

        return view('siswa.materi.show', compact('materi', 'progress'));
    }

    public function markOpened(int $id): JsonResponse
    {
        $materi = Materi::findOrFail($id);

        $progress = MateriProgress::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'materi_id' => $materi->id,
            ],
            [
                'is_opened' => false,
                'is_completed' => false,
            ]
        );

        $progress->is_opened = true;
        $progress->last_accessed_at = now();
        $progress->save();

        return response()->json([
            'success' => true,
            'message' => 'Materi berhasil ditandai dibuka.',
            'data' => [
                'materi_id' => $materi->id,
                'percent' => $progress->is_completed ? 100 : 50,
                'is_opened' => $progress->is_opened,
                'is_completed' => $progress->is_completed,
                'last_accessed_at' => optional($progress->last_accessed_at)?->toISOString(),
                'completed_at' => optional($progress->completed_at)?->toISOString(),
            ],
        ]);
    }

    public function markCompleted(int $id): JsonResponse
    {
        $materi = Materi::findOrFail($id);

        $progress = MateriProgress::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'materi_id' => $materi->id,
            ],
            [
                'is_opened' => false,
                'is_completed' => false,
            ]
        );

        $progress->is_opened = true;
        $progress->is_completed = true;
        $progress->last_accessed_at = now();
        $progress->completed_at = now();
        $progress->save();

        return response()->json([
            'success' => true,
            'message' => 'Materi berhasil diselesaikan.',
            'data' => [
                'materi_id' => $materi->id,
                'percent' => 100,
                'is_opened' => true,
                'is_completed' => true,
                'last_accessed_at' => optional($progress->last_accessed_at)?->toISOString(),
                'completed_at' => optional($progress->completed_at)?->toISOString(),
            ],
        ]);
    }

    public function markSubOpened(int $materiId, int $subId): JsonResponse
    {
        $materi = Materi::with('subMateri')->findOrFail($materiId);

        $subMateri = $materi->subMateri->firstWhere('id', $subId);

        if (!$subMateri) {
            return response()->json([
                'success' => false,
                'message' => 'Sub materi tidak ditemukan.',
            ], 404);
        }

        $progress = MateriProgress::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'materi_id' => $materi->id,
            ],
            [
                'is_opened' => false,
                'is_completed' => false,
            ]
        );

        $progress->is_opened = true;
        $progress->last_accessed_at = now();
        $progress->save();

        return response()->json([
            'success' => true,
            'message' => 'Sub materi berhasil ditandai dibuka.',
            'data' => [
                'materi_id' => $materi->id,
                'sub_id' => $subMateri->id,
                'percent' => $progress->is_completed ? 100 : 50,
                'is_opened' => $progress->is_opened,
                'is_completed' => $progress->is_completed,
                'last_accessed_at' => optional($progress->last_accessed_at)?->toISOString(),
                'completed_at' => optional($progress->completed_at)?->toISOString(),
            ],
        ]);
    }

    public function markSubCompleted(int $materiId, int $subId): JsonResponse
    {
        $materi = Materi::with('subMateri')->findOrFail($materiId);

        $subMateri = $materi->subMateri->firstWhere('id', $subId);

        if (!$subMateri) {
            return response()->json([
                'success' => false,
                'message' => 'Sub materi tidak ditemukan.',
            ], 404);
        }

        $progress = MateriProgress::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'materi_id' => $materi->id,
            ],
            [
                'is_opened' => false,
                'is_completed' => false,
            ]
        );

        $progress->is_opened = true;
        $progress->is_completed = true;
        $progress->last_accessed_at = now();
        $progress->completed_at = now();
        $progress->save();

        return response()->json([
            'success' => true,
            'message' => 'Sub materi berhasil diselesaikan.',
            'data' => [
                'materi_id' => $materi->id,
                'sub_id' => $subMateri->id,
                'percent' => 100,
                'is_opened' => true,
                'is_completed' => true,
                'last_accessed_at' => optional($progress->last_accessed_at)?->toISOString(),
                'completed_at' => optional($progress->completed_at)?->toISOString(),
            ],
        ]);
    }

    public function feedback(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'materi_id' => ['nullable', 'integer'],
            'feedback' => ['nullable', 'string'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback berhasil dikirim.',
            'data' => $validated,
        ]);
    }
}