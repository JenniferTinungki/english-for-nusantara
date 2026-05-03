<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\AssessmentAttempt;
use App\Models\QuizAttempt;
use App\Models\User;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'quiz');

        // Data Quiz
        $quizAttempts = QuizAttempt::with(['quiz', 'user'])
            ->whereHas('user', fn($q) => $q->where('role', 'siswa'))
            ->orderByDesc('created_at')
            ->get();

        // Data Assessment
        $assessmentAttempts = AssessmentAttempt::with(['assessment', 'user'])
            ->whereHas('user', fn($q) => $q->where('role', 'siswa'))
            ->where('status', 'submitted')
            ->orderByDesc('submitted_at')
            ->get();

        // Statistik
        $totalSiswa          = User::where('role', 'siswa')->count();
        $totalQuizAttempts   = $quizAttempts->count();
        $avgQuizScore        = $quizAttempts->avg('score') ?? 0;
        $totalAssessments    = $assessmentAttempts->count();
        $avgAssessmentScore  = $assessmentAttempts->avg('score') ?? 0;

        return view('guru.penilaian.index', compact(
            'tab',
            'quizAttempts',
            'assessmentAttempts',
            'totalSiswa',
            'totalQuizAttempts',
            'avgQuizScore',
            'totalAssessments',
            'avgAssessmentScore'
        ));
    }
}