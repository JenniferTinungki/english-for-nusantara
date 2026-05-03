<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class QuizEvaluasiController extends Controller
{
    /**
     * Halaman utama - Rekap semua quiz
     */
    public function index(Request $request)
    {
        $query = Quiz::query()
            ->withCount('questions')
            ->withCount('attempts');

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'aktif' ? 1 : 0);
        }

        $quizzes = $query->orderBy('chapter')->latest('id')->paginate(10);

        $totalQuiz      = Quiz::count();
        $totalAttempt   = QuizAttempt::count();
        $totalSiswa     = QuizAttempt::distinct('user_id')->count('user_id');
        $rataRataGlobal = QuizAttempt::whereNotNull('score')->avg('score');

        return view('admin.quiz-evaluasi.index', compact(
            'quizzes',
            'totalQuiz',
            'totalAttempt',
            'totalSiswa',
            'rataRataGlobal'
        ));
    }

    /**
     * Detail quiz - hasil per siswa
     */
    public function show(Request $request, int $id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);

        $query = QuizAttempt::with('user')->where('quiz_id', $id);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('kelas')) {
            $kelas = $request->kelas;
            $query->whereHas('user', function ($q) use ($kelas) {
                $q->where('kelas', $kelas);
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'lulus') {
                $query->where('score', '>=', 75);
            } else {
                $query->where('score', '<', 75);
            }
        }

        $attempts = $query->latest()->paginate(15);

        $totalPeserta   = QuizAttempt::where('quiz_id', $id)->distinct('user_id')->count('user_id');
        $rataRata       = QuizAttempt::where('quiz_id', $id)->avg('score');
        $nilaiTertinggi = QuizAttempt::where('quiz_id', $id)->max('score');
        $nilaiTerendah  = QuizAttempt::where('quiz_id', $id)->min('score');
        $jumlahLulus    = QuizAttempt::where('quiz_id', $id)->where('score', '>=', 75)->count();

        $kelasList = User::where('role', 'siswa')
            ->whereNotNull('kelas')
            ->distinct()
            ->orderBy('kelas')
            ->pluck('kelas');

        return view('admin.quiz-evaluasi.show', compact(
            'quiz',
            'attempts',
            'totalPeserta',
            'rataRata',
            'nilaiTertinggi',
            'nilaiTerendah',
            'jumlahLulus',
            'kelasList'
        ));
    }

    /**
     * Leaderboard global semua quiz
     */
    public function leaderboard(Request $request)
    {
        $quizList  = Quiz::orderBy('chapter')->get();
        $kelasList = User::where('role', 'siswa')
            ->whereNotNull('kelas')
            ->distinct()
            ->orderBy('kelas')
            ->pluck('kelas');

        $query = User::where('role', 'siswa')->withCount('quizAttempts');

        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%');
            });
        }

        $selectedQuiz = null;
        if ($request->filled('quiz_id')) {
            $selectedQuiz = Quiz::find((int) $request->quiz_id);
        }

        $quizId   = $request->filled('quiz_id') ? (int) $request->quiz_id : null;
        $siswaAll = $query->get()->map(function (User $siswa) use ($quizId) {
            $q = QuizAttempt::where('user_id', $siswa->id)->whereNotNull('score');

            if ($quizId !== null) {
                $q->where('quiz_id', $quizId);
            }

            $rata            = $q->avg('score');
            $siswa->rata_quiz = $rata !== null ? round((float) $rata, 1) : null;

            return $siswa;
        })->sortByDesc('rata_quiz')->values();

        $page = max(1, (int) $request->input('page', 1));
        $perPage = 15;
        $total   = $siswaAll->count();
        $items   = $siswaAll->forPage($page, $perPage);

        $paginator = new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('admin.quiz-evaluasi.leaderboard', compact(
            'paginator',
            'quizList',
            'kelasList',
            'selectedQuiz'
        ));
    }

    /**
     * Semua hasil siswa di semua quiz
     */
    public function hasil(Request $request)
    {
        $quizList  = Quiz::orderBy('chapter')->get();
        $kelasList = User::where('role', 'siswa')
            ->whereNotNull('kelas')
            ->distinct()
            ->orderBy('kelas')
            ->pluck('kelas');

        $query = QuizAttempt::with(['user', 'quiz'])->latest();

        if ($request->filled('quiz_id')) {
            $query->where('quiz_id', (int) $request->quiz_id);
        }

        if ($request->filled('kelas')) {
            $kelas = $request->kelas;
            $query->whereHas('user', function ($q) use ($kelas) {
                $q->where('kelas', $kelas);
            });
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'lulus') {
                $query->where('score', '>=', 75);
            } else {
                $query->where('score', '<', 75);
            }
        }

        $attempts = $query->paginate(20);

        return view('admin.quiz-evaluasi.hasil', compact(
            'attempts',
            'quizList',
            'kelasList'
        ));
    }
}