<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        try {
            $totalSiswa   = User::where('role', 'siswa')->count();
            $totalMateri  = Materi::count();
            $totalQuiz    = Quiz::count();
            $totalAttempt = QuizAttempt::count();
            $rataRataGlobal = QuizAttempt::whereNotNull('score')->avg('score');

            $chapterStats = Quiz::select('chapter')
                ->selectRaw('COUNT(DISTINCT quiz_attempts.user_id) as peserta')
                ->selectRaw('ROUND(AVG(quiz_attempts.score), 1) as rata_skor')
                ->selectRaw('COUNT(quiz_attempts.id) as total_attempt')
                ->leftJoin('quiz_attempts', 'quizzes.id', '=', 'quiz_attempts.quiz_id')
                ->whereNotNull('chapter')
                ->groupBy('chapter')
                ->orderBy('chapter')
                ->get();

            $search      = $request->input('search');
            $kelasFilter = $request->input('kelas');

            $siswaQuery = User::where('role', 'siswa')
                ->withCount(['quizAttempts as total_attempt'])
                ->withAvg(['quizAttempts as rata_quiz' => function ($q) {
                    $q->whereNotNull('score');
                }], 'score');

            if ($search) {
                $siswaQuery->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhere('nis', 'like', "%$search%");
                });
            }

            if ($kelasFilter) {
                $siswaQuery->where('kelas', $kelasFilter);
            }

            $siswaList = $siswaQuery->orderByDesc('rata_quiz')->paginate(15)->withQueryString();

            $kelasList = User::where('role', 'siswa')
                ->whereNotNull('kelas')
                ->distinct()
                ->pluck('kelas')
                ->sort()
                ->values();

            $jumlahLulus      = QuizAttempt::whereNotNull('score')->where('score', '>=', 75)->count();
            $jumlahTidakLulus = QuizAttempt::whereNotNull('score')->where('score', '<', 75)->count();

            $topSiswa = User::where('role', 'siswa')
                ->withAvg(['quizAttempts as rata_quiz' => function ($q) {
                    $q->whereNotNull('score');
                }], 'score')
                ->withCount('quizAttempts as total_attempt')
                ->orderByDesc('rata_quiz')
                ->limit(5)
                ->get();

            return view('admin.laporan.index', compact(
                'totalSiswa', 'totalMateri', 'totalQuiz', 'totalAttempt',
                'rataRataGlobal', 'chapterStats', 'siswaList', 'kelasList',
                'jumlahLulus', 'jumlahTidakLulus', 'topSiswa'
            ));

        } catch (\Exception $e) {
            return 'ERROR: ' . $e->getMessage();
        }
    }

    public function exportExcel(Request $request)
    {
        $siswaData = User::where('role', 'siswa')
            ->withCount('quizAttempts as total_attempt')
            ->withAvg(['quizAttempts as rata_quiz' => function ($q) {
                $q->whereNotNull('score');
            }], 'score')
            ->orderByDesc('rata_quiz')
            ->get();

        $filename = 'laporan-siswa-' . now()->format('Ymd-His') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($siswaData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['No', 'Nama Siswa', 'NIS', 'Email', 'Kelas', 'Total Attempt', 'Rata-rata Skor', 'Status']);
            foreach ($siswaData as $i => $siswa) {
                $rata   = $siswa->rata_quiz ? round($siswa->rata_quiz, 1) : '-';
                $status = ($siswa->rata_quiz ?? 0) >= 75 ? 'Baik' : (($siswa->rata_quiz ?? 0) >= 50 ? 'Cukup' : 'Perlu Perhatian');
                fputcsv($file, [
                    $i + 1,
                    $siswa->name,
                    $siswa->nis ?? '-',
                    $siswa->email,
                    $siswa->kelas ?? '-',
                    $siswa->total_attempt,
                    $rata,
                    $status,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportPdf()
    {
        return redirect()->route('admin.laporan.index')
            ->with('info', 'Fitur ekspor PDF memerlukan package dompdf. Gunakan ekspor CSV untuk sementara.');
    }
}