<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
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

        if (Schema::hasColumn('quizzes', 'guru_id')) {
            $query->where('guru_id', Auth::id());
        }

        $quizzes = $query->latest('id')->paginate(10);

        $totalQuiz = (clone $query)->count();

        $quizAktif = Schema::hasColumn('quizzes', 'is_active')
            ? (clone $query)->where('is_active', 1)->count()
            : $totalQuiz;

        return view('guru.quiz.index', compact('quizzes', 'totalQuiz', 'quizAktif'));
    }

    public function create(): View
    {
        return view('guru.quiz.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'nullable|string|max:50',
        ], [
            'judul.required' => 'Judul quiz wajib diisi.',
            'judul.max' => 'Judul quiz maksimal 255 karakter.',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if (Schema::hasColumn('quizzes', 'tipe')) {
            $data['tipe'] = $request->tipe ?: 'quiz';
        }

        if (Schema::hasColumn('quizzes', 'guru_id')) {
            $data['guru_id'] = Auth::id();
        }

        if (Schema::hasColumn('quizzes', 'is_active')) {
            $data['is_active'] = $request->has('is_active') ? 1 : 0;
        }

        Quiz::create($data);

        return redirect()->route('guru.quiz.index')->with('success', 'Quiz berhasil ditambahkan.');
    }

    public function show(int $id): View
    {
        $quiz = Quiz::findOrFail($id);
        $this->authorizeQuiz($quiz);

        return view('guru.quiz.show', compact('quiz'));
    }

    public function edit(int $id): View
    {
        $quiz = Quiz::findOrFail($id);
        $this->authorizeQuiz($quiz);

        return view('guru.quiz.edit', compact('quiz'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $quiz = Quiz::findOrFail($id);
        $this->authorizeQuiz($quiz);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'nullable|string|max:50',
        ], [
            'judul.required' => 'Judul quiz wajib diisi.',
            'judul.max' => 'Judul quiz maksimal 255 karakter.',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if (Schema::hasColumn('quizzes', 'tipe')) {
            $data['tipe'] = $request->tipe ?: 'quiz';
        }

        if (Schema::hasColumn('quizzes', 'is_active')) {
            $data['is_active'] = $request->has('is_active') ? 1 : 0;
        }

        $quiz->update($data);

        return redirect()->route('guru.quiz.index')->with('success', 'Quiz berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $quiz = Quiz::findOrFail($id);
        $this->authorizeQuiz($quiz);

        $quiz->delete();

        return redirect()->route('guru.quiz.index')->with('success', 'Quiz berhasil dihapus.');
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