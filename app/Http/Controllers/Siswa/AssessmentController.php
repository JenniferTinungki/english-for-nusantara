<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentAttempt;
use App\Models\AssessmentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $assessments = Assessment::query()
            ->with(['materi', 'questions'])
            ->where('is_active', true)
            ->latest()
            ->get();

        $submittedAttempts = AssessmentAttempt::query()
            ->where('user_id', $user->id)
            ->where('status', 'submitted')
            ->orderByDesc('submitted_at')
            ->get()
            ->groupBy('assessment_id');

        $assessments = $assessments->map(function ($assessment) use ($submittedAttempts) {
            $attempts      = $submittedAttempts->get($assessment->id, collect());
            $bestAttempt   = $attempts->sortByDesc('score')->first();
            $latestAttempt = $attempts->sortByDesc(function ($item) {
                return optional($item->submitted_at)->timestamp ?? 0;
            })->first();

            $assessment->questions_count      = $assessment->questions->count();
            $assessment->student_status       = $bestAttempt ? 'Selesai' : 'Belum Dikerjakan';
            $assessment->student_score        = $bestAttempt->score ?? null;
            $assessment->student_submitted_at = $latestAttempt->submitted_at ?? null;
            $assessment->attempt_id           = $bestAttempt->id ?? null;

            return $assessment;
        });

        $totalAssessment     = $assessments->count();
        $completedAssessment = $assessments->where('student_status', 'Selesai')->count();
        $averageScore        = AssessmentAttempt::query()
            ->where('user_id', $user->id)
            ->where('status', 'submitted')
            ->avg('score');

        return view('siswa.assessment.index', compact(
            'assessments',
            'totalAssessment',
            'completedAssessment',
            'averageScore'
        ));
    }

    public function show($id)
    {
        $user       = Auth::user();
        $assessment = Assessment::with('questions')->where('is_active', true)->findOrFail($id);

        $latestAttempt = AssessmentAttempt::where('user_id', $user->id)
            ->where('assessment_id', $id)
            ->where('status', 'submitted')
            ->orderByDesc('submitted_at')
            ->first();

        return view('siswa.assessment.show', compact('assessment', 'latestAttempt'));
    }

    public function submit(Request $request, $id)
    {
        $user       = Auth::user();
        $assessment = Assessment::with('questions')->where('is_active', true)->findOrFail($id);

        $questions = $assessment->questions;
        $answers   = $request->input('answers', []);
        $correct   = 0;
        $total     = $questions->count();

        DB::beginTransaction();

        try {
            $attempt = AssessmentAttempt::create([
                'assessment_id'  => $assessment->id,
                'user_id'        => $user->id,
                'status'         => 'submitted',
                'submitted_at'   => now(),
                'started_at'     => now(),
                'attempt_number' => 1,
            ]);

            foreach ($questions as $question) {
                $selectedAnswer = $answers[$question->id] ?? null;
                $isCorrect      = $selectedAnswer === $question->correct_answer;

                if ($isCorrect) {
                    $correct++;
                }

                AssessmentAnswer::create([
                    'attempt_id'    => $attempt->id,
                    'question_id'   => $question->id,
                    'jawaban_siswa' => $selectedAnswer,
                    'is_correct'    => $isCorrect,
                ]);
            }

            $score = $total > 0 ? round(($correct / $total) * 100) : 0;
            $attempt->update(['score' => $score]);

            DB::commit();

            return redirect()
                ->route('siswa.assessment.result', $attempt->id)
                ->with('success', 'Assessment berhasil dikumpulkan.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('siswa.assessment.show', $id)
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function result($attemptId)
    {
        $user    = Auth::user();
        $attempt = AssessmentAttempt::with(['assessment', 'answers.question'])
            ->where('user_id', $user->id)
            ->findOrFail($attemptId);

        $assessment     = $attempt->assessment;
        $totalQuestions = $attempt->answers->count();
        $correct        = $attempt->answers->where('is_correct', true)->count();
        $wrong          = $attempt->answers->where('is_correct', false)->count();
        $score          = $attempt->score;
        $passed         = $score >= $assessment->passing_score;

        return view('siswa.assessment.result', compact(
            'attempt',
            'assessment',
            'totalQuestions',
            'correct',
            'wrong',
            'score',
            'passed'
        ));
    }
}