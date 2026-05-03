<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index(): View
    {
        $query = Quiz::query();

        if (Schema::hasColumn('quizzes', 'is_active')) {
            $query->where('is_active', 1);
        }

        $query->withCount('questions');

        if (method_exists(Quiz::class, 'attempts')) {
            $query->with([
                'attempts' => function ($q) {
                    $q->where('user_id', Auth::id());

                    if (Schema::hasColumn('quiz_attempts', 'submitted_at')) {
                        $q->latest('submitted_at');
                    }

                    $q->latest('id');
                }
            ]);
        }

        if (Schema::hasColumn('quizzes', 'chapter')) {
            $query->orderBy('chapter', 'asc');
        }

        $query->latest('id');

        $quizzes = $query->get();

        return view('siswa.quiz.index', compact('quizzes'));
    }

    public function show(int $id): View
    {
        $query = Quiz::with('questions');

        if (Schema::hasColumn('quizzes', 'is_active')) {
            $query->where('is_active', 1);
        }

        $quiz = $query->findOrFail($id);

        $latestAttempt = null;

        if (class_exists(QuizAttempt::class) && Schema::hasTable('quiz_attempts')) {
            $attemptQuery = QuizAttempt::where('quiz_id', $quiz->id)
                ->where('user_id', Auth::id());

            if (Schema::hasColumn('quiz_attempts', 'submitted_at')) {
                $attemptQuery->latest('submitted_at');
            }

            $latestAttempt = $attemptQuery->latest('id')->first();
        }

        return view('siswa.quiz.show', compact('quiz', 'latestAttempt'));
    }

    public function submit(Request $request, int $id): RedirectResponse
    {
        $quiz = Quiz::with('questions')->findOrFail($id);

        if (Schema::hasColumn('quizzes', 'is_active') && !$quiz->is_active) {
            return redirect()
                ->route('siswa.quiz.index')
                ->with('error', 'Quiz ini sedang tidak aktif.');
        }

        $rules = [];

        foreach ($quiz->questions as $question) {
            $rules["answers.{$question->id}"] = ['nullable', 'in:A,B,C,D,a,b,c,d'];
        }

        $validated = $request->validate($rules, [
            'in' => 'Pilihan jawaban tidak valid.',
        ]);

        $answers = $validated['answers'] ?? [];
        $autoSubmitted = (bool) $request->input('auto_submitted', 0);

        $correctAnswers = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            $selectedAnswer = strtoupper((string) ($answers[$question->id] ?? ''));
            $correctAnswer = strtoupper((string) ($question->correct_answer ?? ''));

            if ($selectedAnswer !== '' && $selectedAnswer === $correctAnswer) {
                $correctAnswers++;
            }
        }

        $score = $totalQuestions > 0
            ? (int) round(($correctAnswers / $totalQuestions) * 100)
            : 0;

        $data = [
            'quiz_id' => $quiz->id,
            'user_id' => Auth::id(),
        ];

        if (Schema::hasColumn('quiz_attempts', 'score')) {
            $data['score'] = $score;
        }

        if (Schema::hasColumn('quiz_attempts', 'nilai')) {
            $data['nilai'] = $score;
        }

        if (Schema::hasColumn('quiz_attempts', 'correct_answers')) {
            $data['correct_answers'] = $correctAnswers;
        }

        if (Schema::hasColumn('quiz_attempts', 'total_questions')) {
            $data['total_questions'] = $totalQuestions;
        }

        if (Schema::hasColumn('quiz_attempts', 'submitted_at')) {
            $data['submitted_at'] = now();
        }

        if (Schema::hasColumn('quiz_attempts', 'finished_at')) {
            $data['finished_at'] = now();
        }

        $attempt = QuizAttempt::create($data);

        return redirect()
            ->route('siswa.quiz.result', $attempt->id)
            ->with(
                'success',
                $autoSubmitted
                    ? 'Quiz otomatis dikirim karena waktu habis atau kamu keluar dari halaman quiz.'
                    : 'Quiz berhasil diselesaikan.'
            );
    }

    public function result(int $attemptId): View
    {
        $attemptQuery = QuizAttempt::with('quiz')
            ->where('user_id', Auth::id());

        $attempt = $attemptQuery->findOrFail($attemptId);

        return view('siswa.quiz.result', compact('attempt'));
    }

    public function leaderboard(int $id): View
    {
        $quiz = Quiz::findOrFail($id);

        $leaderboardQuery = QuizAttempt::query()->where('quiz_id', $quiz->id);

        if (method_exists(QuizAttempt::class, 'user')) {
            $leaderboardQuery->with('user');
        } elseif (method_exists(QuizAttempt::class, 'siswa')) {
            $leaderboardQuery->with('siswa');
        }

        if (Schema::hasColumn('quiz_attempts', 'score')) {
            $leaderboardQuery->orderByDesc('score');
        } elseif (Schema::hasColumn('quiz_attempts', 'nilai')) {
            $leaderboardQuery->orderByDesc('nilai');
        }

        if (Schema::hasColumn('quiz_attempts', 'correct_answers')) {
            $leaderboardQuery->orderByDesc('correct_answers');
        }

        if (Schema::hasColumn('quiz_attempts', 'submitted_at')) {
            $leaderboardQuery->orderBy('submitted_at');
        }

        $leaderboard = $leaderboardQuery->orderBy('id')->take(10)->get();

        $myLatestAttemptQuery = QuizAttempt::where('quiz_id', $quiz->id)
            ->where('user_id', Auth::id());

        if (Schema::hasColumn('quiz_attempts', 'submitted_at')) {
            $myLatestAttemptQuery->latest('submitted_at');
        }

        $myLatestAttempt = $myLatestAttemptQuery->latest('id')->first();

        return view('siswa.quiz.leaderboard', compact('quiz', 'leaderboard', 'myLatestAttempt'));
    }
}