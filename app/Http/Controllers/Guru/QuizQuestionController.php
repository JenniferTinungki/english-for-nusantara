<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class QuizQuestionController extends Controller
{
    public function create(int $quizId): View
    {
        $quiz = Quiz::findOrFail($quizId);
        $this->authorizeQuiz($quiz);

        return view('guru.quiz.questions.create', compact('quiz'));
    }

    public function store(Request $request, int $quizId): RedirectResponse
    {
        $quiz = Quiz::findOrFail($quizId);
        $this->authorizeQuiz($quiz);

        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'correct_answer' => 'required|in:a,b,c,d',
        ], [
            'question.required' => 'Soal wajib diisi.',
            'option_a.required' => 'Pilihan A wajib diisi.',
            'option_b.required' => 'Pilihan B wajib diisi.',
            'option_c.required' => 'Pilihan C wajib diisi.',
            'option_d.required' => 'Pilihan D wajib diisi.',
            'correct_answer.required' => 'Jawaban benar wajib dipilih.',
        ]);

        QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()
            ->route('guru.quiz.show', $quiz->id)
            ->with('success', 'Soal quiz berhasil ditambahkan.');
    }

    public function edit(int $quizId, int $id): View
    {
        $quiz = Quiz::findOrFail($quizId);
        $this->authorizeQuiz($quiz);

        $question = QuizQuestion::where('quiz_id', $quiz->id)->findOrFail($id);

        return view('guru.quiz.questions.edit', compact('quiz', 'question'));
    }

    public function update(Request $request, int $quizId, int $id): RedirectResponse
    {
        $quiz = Quiz::findOrFail($quizId);
        $this->authorizeQuiz($quiz);

        $question = QuizQuestion::where('quiz_id', $quiz->id)->findOrFail($id);

        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'correct_answer' => 'required|in:a,b,c,d',
        ]);

        $question->update([
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()
            ->route('guru.quiz.show', $quiz->id)
            ->with('success', 'Soal quiz berhasil diperbarui.');
    }

    public function destroy(int $quizId, int $id): RedirectResponse
    {
        $quiz = Quiz::findOrFail($quizId);
        $this->authorizeQuiz($quiz);

        $question = QuizQuestion::where('quiz_id', $quiz->id)->findOrFail($id);
        $question->delete();

        return redirect()
            ->route('guru.quiz.show', $quiz->id)
            ->with('success', 'Soal quiz berhasil dihapus.');
    }

    private function authorizeQuiz(Quiz $quiz): void
    {
        if (Schema::hasColumn('quizzes', 'guru_id')) {
            if ((int) $quiz->guru_id !== (int) Auth::id()) {
                abort(403, 'Akses ditolak.');
            }
        }
    }
}