<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\MateriProgress;
use App\Models\SubMateri;
use App\Models\SubMateriProgress;
use App\Models\User;
use Illuminate\Http\Request;

class MonitoringProgressController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua siswa
        $siswas = User::where('role', 'siswa')
            ->orderBy('name')
            ->get();

        // Ambil semua materi
        $materiList = Materi::orderBy('bab')->orderBy('id')->get();

        // Filter opsional
        $selectedSiswaId = $request->get('siswa_id');
        $selectedMateriId = $request->get('materi_id');

        // ----------------------------------------------------------------
        // RINGKASAN KESELURUHAN (semua siswa)
        // ----------------------------------------------------------------
        $totalSiswa    = $siswas->count();
        $totalMateri   = $materiList->count();

        // Rata-rata progress semua siswa
        $overallProgressData = collect();

        foreach ($siswas as $siswa) {
            $progressMap = MateriProgress::where('user_id', $siswa->id)
                ->get()
                ->keyBy('materi_id');

            $avgPercent = $materiList->avg(function ($materi) use ($siswa, $progressMap) {
                $totalSub = SubMateri::where('materi_id', $materi->id)->count();
                if ($totalSub === 0) return 0;

                $completedSub = SubMateriProgress::where('user_id', $siswa->id)
                    ->where('materi_id', $materi->id)
                    ->where('is_completed', true)
                    ->count();

                return round(($completedSub / $totalSub) * 100);
            });

            $overallProgressData->push(round($avgPercent));
        }

        $avgOverall = $overallProgressData->count() > 0
            ? round($overallProgressData->avg())
            : 0;

        $siswaAktif = $overallProgressData->filter(fn($p) => $p > 0)->count();
        $siswaSelesai = $overallProgressData->filter(fn($p) => $p === 100)->count();

        // ----------------------------------------------------------------
        // DATA TABEL: per siswa (bisa difilter)
        // ----------------------------------------------------------------
        $siswaQuery = User::where('role', 'siswa')->orderBy('name');

        if ($selectedSiswaId) {
            $siswaQuery->where('id', $selectedSiswaId);
        }

        $filteredSiswa = $siswaQuery->get();

        $targetMateri = $selectedMateriId
            ? $materiList->where('id', $selectedMateriId)
            : $materiList;

        $tableData = $filteredSiswa->map(function ($siswa) use ($targetMateri) {
            $progressMap = MateriProgress::where('user_id', $siswa->id)
                ->get()
                ->keyBy('materi_id');

            $materiProgress = $targetMateri->map(function ($materi) use ($siswa, $progressMap) {
                $progress = $progressMap->get($materi->id);

                $totalSub = SubMateri::where('materi_id', $materi->id)->count();
                $completedSub = SubMateriProgress::where('user_id', $siswa->id)
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
                    'materi_id'       => $materi->id,
                    'bab'             => $materi->bab,
                    'judul'           => $materi->judul,
                    'subjudul'        => $materi->subjudul,
                    'durasi'          => $materi->durasi,
                    'status'          => $status,
                    'percent'         => $percent,
                    'last_accessed_at'=> $progress?->last_accessed_at,
                    'completed_at'    => $progress?->completed_at,
                ];
            });

            $avgPercent = $materiProgress->count() > 0
                ? round($materiProgress->avg('percent'))
                : 0;

            $completedCount = $materiProgress->where('percent', 100)->count();
            $openedCount    = $materiProgress->filter(
                fn($m) => $m['percent'] > 0 || $m['status'] === 'Sedang Dipelajari'
            )->count();

            return [
                'siswa'          => $siswa,
                'materi_progress'=> $materiProgress,
                'avg_percent'    => $avgPercent,
                'completed_count'=> $completedCount,
                'opened_count'   => $openedCount,
            ];
        });

        return view('guru.progress.index', compact(
            'siswas',
            'materiList',
            'selectedSiswaId',
            'selectedMateriId',
            'totalSiswa',
            'totalMateri',
            'avgOverall',
            'siswaAktif',
            'siswaSelesai',
            'tableData',
            'targetMateri'
        ));
    }
}