<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentEssayAnswer;
use App\Models\Materi;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::with('materi')
            ->latest()
            ->paginate(10);

        $totalAssessment = Assessment::count();
        $assessmentAktif = Assessment::where('is_active', true)->count();

        return view('guru.assessment.index', compact(
            'assessments',
            'totalAssessment',
            'assessmentAktif'
        ));
    }

    public function create()
    {
        $materi = Materi::where('is_active', true)
            ->orderBy('judul')
            ->get();

        return view('guru.assessment.create', compact('materi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'materi_id'     => 'nullable|exists:materi,id',
            'deadline'      => 'nullable|date',
            'duration'      => 'nullable|integer|min:1|max:300',
            'passing_score' => 'nullable|integer|min:0|max:100',
        ], [
            'title.required'        => 'Judul assessment wajib diisi.',
            'title.max'             => 'Judul assessment maksimal 255 karakter.',
            'materi_id.exists'      => 'Materi yang dipilih tidak valid.',
            'deadline.date'         => 'Format deadline tidak valid.',
            'duration.integer'      => 'Durasi harus berupa angka.',
            'duration.min'          => 'Durasi minimal 1 menit.',
            'duration.max'          => 'Durasi maksimal 300 menit.',
            'passing_score.integer' => 'Passing score harus berupa angka.',
            'passing_score.min'     => 'Passing score minimal 0.',
            'passing_score.max'     => 'Passing score maksimal 100.',
        ]);

        Assessment::create([
            'title'                   => $request->title,
            'description'             => $request->description,
            'materi_id'               => $request->materi_id,
            'deadline'                => $request->deadline,
            'duration'                => $request->duration ?? 30,
            'passing_score'           => $request->passing_score ?? 75,
            'is_active'               => $request->has('is_active'),
            'shuffle_questions'       => $request->has('shuffle_questions'),
            'shuffle_answers'         => $request->has('shuffle_answers'),
            'show_result_immediately' => $request->has('show_result_immediately'),
            'created_by'              => auth()->id(),
        ]);

        return redirect()
            ->route('guru.assessment.index')
            ->with('success', 'Assessment berhasil ditambahkan.');
    }

    public function show($id)
    {
        $assessment = Assessment::with(['materi', 'questions'])->findOrFail($id);

        return view('guru.assessment.show', compact('assessment'));
    }

    public function edit($id)
    {
        $assessment = Assessment::findOrFail($id);

        $materi = Materi::where('is_active', true)
            ->orderBy('judul')
            ->get();

        return view('guru.assessment.edit', compact('assessment', 'materi'));
    }

    public function update(Request $request, $id)
    {
        $assessment = Assessment::findOrFail($id);

        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'materi_id'     => 'nullable|exists:materi,id',
            'deadline'      => 'nullable|date',
            'duration'      => 'nullable|integer|min:1|max:300',
            'passing_score' => 'nullable|integer|min:0|max:100',
        ], [
            'title.required'        => 'Judul assessment wajib diisi.',
            'title.max'             => 'Judul assessment maksimal 255 karakter.',
            'materi_id.exists'      => 'Materi yang dipilih tidak valid.',
            'deadline.date'         => 'Format deadline tidak valid.',
            'duration.integer'      => 'Durasi harus berupa angka.',
            'duration.min'          => 'Durasi minimal 1 menit.',
            'duration.max'          => 'Durasi maksimal 300 menit.',
            'passing_score.integer' => 'Passing score harus berupa angka.',
            'passing_score.min'     => 'Passing score minimal 0.',
            'passing_score.max'     => 'Passing score maksimal 100.',
        ]);

        $assessment->update([
            'title'                   => $request->title,
            'description'             => $request->description,
            'materi_id'               => $request->materi_id,
            'deadline'                => $request->deadline,
            'duration'                => $request->duration ?? 30,
            'passing_score'           => $request->passing_score ?? 75,
            'is_active'               => $request->has('is_active'),
            'shuffle_questions'       => $request->has('shuffle_questions'),
            'shuffle_answers'         => $request->has('shuffle_answers'),
            'show_result_immediately' => $request->has('show_result_immediately'),
        ]);

        return redirect()
            ->route('guru.assessment.index')
            ->with('success', 'Assessment berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->delete();

        return redirect()
            ->route('guru.assessment.index')
            ->with('success', 'Assessment berhasil dihapus.');
    }

    public function essayList($id)
    {
        $assessment = Assessment::with('questions')->findOrFail($id);

        $essayQuestions = $assessment->questions->where('type', 'essay');

        $essayAnswers = AssessmentEssayAnswer::with(['user', 'question'])
            ->where('assessment_id', $id)
            ->orderBy('user_id')
            ->get()
            ->groupBy('user_id');

        return view('guru.assessment.essay', compact('assessment', 'essayQuestions', 'essayAnswers'));
    }

    public function essayNilai(Request $request, $id)
    {
        $request->validate([
            'essay_id' => 'required|integer',
            'nilai'    => 'required|integer|min:0|max:100',
            'feedback' => 'nullable|string|max:500',
        ]);

        $essay = AssessmentEssayAnswer::findOrFail($request->essay_id);
        $essay->update([
            'nilai'    => $request->nilai,
            'feedback' => $request->feedback,
        ]);

        return redirect()->back()->with('success', 'Nilai essay berhasil disimpan.');
    }
}
