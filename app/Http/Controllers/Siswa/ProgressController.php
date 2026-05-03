<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\MateriProgress;
use App\Models\SubMateri;
use App\Models\SubMateriProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProgressController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $materiList = Materi::orderBy('id', 'asc')->get();

        $progressMap = MateriProgress::where('user_id', $user->id)
            ->get()
            ->keyBy('materi_id');

        $progressData = $materiList->map(function ($materi) use ($progressMap, $user) {
            $progress = $progressMap->get($materi->id);

            $totalSub = SubMateri::where('materi_id', $materi->id)->count();

            $completedSub = SubMateriProgress::where('user_id', $user->id)
                ->where('materi_id', $materi->id)
                ->where('is_completed', true)
                ->count();

            $percent = $totalSub > 0 ? round(($completedSub / $totalSub) * 100) : 0;

            $status = 'Belum Dibuka';
            if ($percent === 100) {
                $status = 'Selesai';
            } elseif (($progress?->is_opened ?? false) || $percent > 0) {
                $status = 'Sedang Dipelajari';
            }

            return [
                'id' => $materi->id,
                'bab' => $materi->bab,
                'judul' => $materi->judul,
                'subjudul' => $materi->subjudul,
                'deskripsi' => $materi->deskripsi,
                'durasi' => $materi->durasi,
                'status' => $status,
                'percent' => $percent,
                'last_accessed_at' => $progress?->last_accessed_at,
                'completed_at' => $progress?->completed_at,
            ];
        });

        $totalMateri = $progressData->count();
        $openedMateri = $progressData->filter(fn ($item) => $item['percent'] > 0 || $item['status'] === 'Sedang Dipelajari')->count();
        $completedMateri = $progressData->where('percent', 100)->count();
        $overallPercent = $totalMateri > 0 ? round($progressData->avg('percent')) : 0;

        return view('siswa.progress.index', compact(
            'progressData',
            'totalMateri',
            'openedMateri',
            'completedMateri',
            'overallPercent'
        ));
    }
}