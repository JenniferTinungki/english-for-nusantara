<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\TugasSubmit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TugasController extends Controller
{
    public function index(): View
    {
        $query = Tugas::query();

        if (Schema::hasColumn('tugas', 'guru_id')) {
            $query->where('guru_id', Auth::id());
        }

        if (Schema::hasColumn('tugas', 'deadline')) {
            $query->orderByDesc('deadline');
        } else {
            $query->latest('id');
        }

        $tugas = $query->paginate(10);

        $totalTugas = (clone $query)->count();

        $tugasAktif = Schema::hasColumn('tugas', 'is_active')
            ? (clone $query)->where('is_active', 1)->count()
            : $totalTugas;

        $totalSubmit = 0;
        $belumDinilai = 0;

        if (class_exists(TugasSubmit::class) && Schema::hasTable('tugas_submit')) {
            $tugasIds = (clone $query)->pluck('id');

            $submitQuery = TugasSubmit::whereIn('tugas_id', $tugasIds);

            $totalSubmit = (clone $submitQuery)->count();

            $belumDinilai = Schema::hasColumn('tugas_submit', 'nilai')
                ? (clone $submitQuery)->whereNull('nilai')->count()
                : $totalSubmit;
        }

        return view('guru.tugas.index', compact(
            'tugas',
            'totalTugas',
            'tugasAktif',
            'totalSubmit',
            'belumDinilai'
        ));
    }

    public function create(): View
    {
        return view('guru.tugas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'file_materi' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip,rar|max:10240',
        ], [
            'judul.required' => 'Judul tugas wajib diisi.',
            'judul.max' => 'Judul tugas maksimal 255 karakter.',
            'deadline.date' => 'Format deadline tidak valid.',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
        ];

        if (Schema::hasColumn('tugas', 'guru_id')) {
            $data['guru_id'] = Auth::id();
        }

        if (Schema::hasColumn('tugas', 'is_active')) {
            $data['is_active'] = $request->has('is_active') ? 1 : 0;
        }

        if (Schema::hasColumn('tugas', 'file_materi') && $request->hasFile('file_materi')) {
            $data['file_materi'] = $request->file('file_materi')->store('tugas/file_materi', 'public');
        }

        Tugas::create($data);

        return redirect()->route('guru.tugas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function show(int $id): View
    {
        $tugas = Tugas::findOrFail($id);
        $this->authorizeTugas($tugas);

        $submits = collect();

        if (class_exists(TugasSubmit::class) && Schema::hasTable('tugas_submit')) {
            $submits = TugasSubmit::where('tugas_id', $tugas->id)
                ->latest('id')
                ->get();
        }

        return view('guru.tugas.show', compact('tugas', 'submits'));
    }

    public function edit(int $id): View
    {
        $tugas = Tugas::findOrFail($id);
        $this->authorizeTugas($tugas);

        return view('guru.tugas.edit', compact('tugas'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $tugas = Tugas::findOrFail($id);
        $this->authorizeTugas($tugas);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'file_materi' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip,rar|max:10240',
        ], [
            'judul.required' => 'Judul tugas wajib diisi.',
            'judul.max' => 'Judul tugas maksimal 255 karakter.',
            'deadline.date' => 'Format deadline tidak valid.',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
        ];

        if (Schema::hasColumn('tugas', 'is_active')) {
            $data['is_active'] = $request->has('is_active') ? 1 : 0;
        }

        if (Schema::hasColumn('tugas', 'file_materi') && $request->hasFile('file_materi')) {
            if (!empty($tugas->file_materi) && Storage::disk('public')->exists($tugas->file_materi)) {
                Storage::disk('public')->delete($tugas->file_materi);
            }

            $data['file_materi'] = $request->file('file_materi')->store('tugas/file_materi', 'public');
        }

        $tugas->update($data);

        return redirect()->route('guru.tugas.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $tugas = Tugas::findOrFail($id);
        $this->authorizeTugas($tugas);

        if (Schema::hasColumn('tugas', 'file_materi')) {
            if (!empty($tugas->file_materi) && Storage::disk('public')->exists($tugas->file_materi)) {
                Storage::disk('public')->delete($tugas->file_materi);
            }
        }

        $tugas->delete();

        return redirect()->route('guru.tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }

    public function nilai(Request $request, int $id): RedirectResponse
    {
        if (!class_exists(TugasSubmit::class) || !Schema::hasTable('tugas_submit')) {
            return back()->with('error', 'Fitur penilaian belum tersedia.');
        }

        if (!Schema::hasColumn('tugas_submit', 'nilai')) {
            return back()->with('error', 'Kolom nilai belum tersedia di database.');
        }

        $request->validate([
            'nilai' => 'required|numeric|min:0|max:100',
        ], [
            'nilai.required' => 'Nilai wajib diisi.',
            'nilai.numeric' => 'Nilai harus berupa angka.',
            'nilai.min' => 'Nilai minimal 0.',
            'nilai.max' => 'Nilai maksimal 100.',
        ]);

        $submit = TugasSubmit::findOrFail($id);

        if (method_exists($submit, 'tugas') && $submit->tugas) {
            $this->authorizeTugas($submit->tugas);
        }

        $submit->update([
            'nilai' => $request->nilai,
        ]);

        return back()->with('success', 'Nilai berhasil disimpan.');
    }

    private function authorizeTugas(Tugas $tugas): void
    {
        if (Schema::hasColumn('tugas', 'guru_id')) {
            if ((int) $tugas->guru_id !== (int) Auth::id()) {
                abort(403, 'Akses ditolak.');
            }
        }
    }
}