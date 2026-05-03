<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\TugasSubmit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TugasController extends Controller
{
    public function index(): View
    {
        $userId = Auth::id();
        $tugas = Tugas::orderBy('deadline', 'asc')->get();

        $submittedTugasIds = TugasSubmit::where('user_id', $userId)
           ->pluck('tugas_id')
           ->toArray();

        return view('siswa.tugas.index', compact('tugas', 'submittedTugasIds'));
    }

    public function show(int $id): View
    {
        $tugas = Tugas::findOrFail($id);

        $submission = TugasSubmit::where('tugas_id', $tugas->id)
            ->where('user_id', Auth::id())
            ->latest()
            ->first();

        return view('siswa.tugas.show', compact('tugas', 'submission'));
    }

    public function submit(Request $request, int $id): RedirectResponse
    {
        $tugas = Tugas::findOrFail($id);

        $validated = $request->validate([
            'jawaban' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:5120'],
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('tugas_submit', 'public');
        }

        TugasSubmit::create([
            'tugas_id' => $tugas->id,
            'user_id' => Auth::id(),
            'jawaban' => $validated['jawaban'] ?? null,
            'file' => $filePath,
        ]);

        return redirect()
            ->route('siswa.tugas.show', $tugas->id)
            ->with('success', 'Tugas berhasil dikumpulkan.');
    }
}