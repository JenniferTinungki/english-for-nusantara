<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssessmentQuestionController extends Controller
{
    public function create(int $assessmentId): View
    {
        $assessment = Assessment::findOrFail($assessmentId);
        return view('guru.assessment.questions.create', compact('assessment'));
    }

    public function store(Request $request, int $assessmentId): RedirectResponse
    {
        $assessment = Assessment::findOrFail($assessmentId);

        $type = $request->input('type', 'pilihan_ganda');

        if ($type === 'essay') {
            $request->validate([
                'question' => 'required|string',
            ], [
                'question.required' => 'Soal wajib diisi.',
            ]);

            AssessmentQuestion::create([
                'assessment_id' => $assessment->id,
                'type'          => 'essay',
                'question'      => $request->question,
                'option_a'      => null,
                'option_b'      => null,
                'option_c'      => null,
                'option_d'      => null,
                'correct_answer'=> null,
            ]);
        } else {
            $request->validate([
                'question'       => 'required|string',
                'option_a'       => 'required|string|max:255',
                'option_b'       => 'required|string|max:255',
                'option_c'       => 'required|string|max:255',
                'option_d'       => 'required|string|max:255',
                'correct_answer' => 'required|in:A,B,C,D,a,b,c,d',
            ], [
                'question.required'       => 'Soal wajib diisi.',
                'option_a.required'       => 'Pilihan A wajib diisi.',
                'option_b.required'       => 'Pilihan B wajib diisi.',
                'option_c.required'       => 'Pilihan C wajib diisi.',
                'option_d.required'       => 'Pilihan D wajib diisi.',
                'correct_answer.required' => 'Jawaban benar wajib dipilih.',
            ]);

            AssessmentQuestion::create([
                'assessment_id'  => $assessment->id,
                'type'           => 'pilihan_ganda',
                'question'       => $request->question,
                'option_a'       => $request->option_a,
                'option_b'       => $request->option_b,
                'option_c'       => $request->option_c,
                'option_d'       => $request->option_d,
                'correct_answer' => strtoupper($request->correct_answer),
            ]);
        }

        return redirect()
            ->route('guru.assessment.show', $assessment->id)
            ->with('success', 'Soal berhasil ditambahkan.');
    }

    public function edit(int $assessmentId, int $id): View
    {
        $assessment = Assessment::findOrFail($assessmentId);
        $question   = AssessmentQuestion::where('assessment_id', $assessment->id)->findOrFail($id);
        return view('guru.assessment.questions.edit', compact('assessment', 'question'));
    }

    public function update(Request $request, int $assessmentId, int $id): RedirectResponse
    {
        $assessment = Assessment::findOrFail($assessmentId);
        $question   = AssessmentQuestion::where('assessment_id', $assessment->id)->findOrFail($id);

        $type = $request->input('type', $question->type ?? 'pilihan_ganda');

        if ($type === 'essay') {
            $request->validate([
                'question' => 'required|string',
            ], [
                'question.required' => 'Soal wajib diisi.',
            ]);

            $question->update([
                'type'           => 'essay',
                'question'       => $request->question,
                'option_a'       => null,
                'option_b'       => null,
                'option_c'       => null,
                'option_d'       => null,
                'correct_answer' => null,
            ]);
        } else {
            $request->validate([
                'question'       => 'required|string',
                'option_a'       => 'required|string|max:255',
                'option_b'       => 'required|string|max:255',
                'option_c'       => 'required|string|max:255',
                'option_d'       => 'required|string|max:255',
                'correct_answer' => 'required|in:A,B,C,D,a,b,c,d',
            ], [
                'question.required'       => 'Soal wajib diisi.',
                'option_a.required'       => 'Pilihan A wajib diisi.',
                'option_b.required'       => 'Pilihan B wajib diisi.',
                'option_c.required'       => 'Pilihan C wajib diisi.',
                'option_d.required'       => 'Pilihan D wajib diisi.',
                'correct_answer.required' => 'Jawaban benar wajib dipilih.',
            ]);

            $question->update([
                'type'           => 'pilihan_ganda',
                'question'       => $request->question,
                'option_a'       => $request->option_a,
                'option_b'       => $request->option_b,
                'option_c'       => $request->option_c,
                'option_d'       => $request->option_d,
                'correct_answer' => strtoupper($request->correct_answer),
            ]);
        }

        return redirect()
            ->route('guru.assessment.show', $assessment->id)
            ->with('success', 'Soal berhasil diperbarui.');
    }

    public function destroy(int $assessmentId, int $id): RedirectResponse
    {
        $assessment = Assessment::findOrFail($assessmentId);
        $question   = AssessmentQuestion::where('assessment_id', $assessment->id)->findOrFail($id);
        $question->delete();

        return redirect()
            ->route('guru.assessment.show', $assessment->id)
            ->with('success', 'Soal berhasil dihapus.');
    }
}
