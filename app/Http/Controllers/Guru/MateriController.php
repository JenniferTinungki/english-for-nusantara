<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\SubMateri;
use App\Models\IsiMateriDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class MateriController extends Controller
{
    public function index()
    {
        $query = Materi::query();

        if (Schema::hasColumn('materi', 'guru_id')) {
            $query->where('guru_id', Auth::id());
        }

        if (Schema::hasColumn('materi', 'bab')) {
            $query->orderBy('bab');
        }

        if (Schema::hasColumn('materi', 'urutan')) {
            $query->orderBy('urutan');
        } else {
            $query->latest('id');
        }

        $materis = $query->paginate(10);

        return view('guru.materi.index', compact('materis'));
    }

    public function create()
    {
        return view('guru.materi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bab'        => 'required|integer|min:0',
            'judul'      => 'required|string|max:255',
            'subjudul'   => 'nullable|string|max:255',
            'deskripsi'  => 'nullable|string',
            'isi_materi' => 'nullable|string',
            'video'      => 'nullable|string|max:255',
            'durasi'     => 'nullable|integer|min:0',
        ], [
            'bab.required'   => 'Bab wajib diisi.',
            'judul.required' => 'Judul wajib diisi.',
        ]);

        $data = [
            'bab'        => $request->bab,
            'judul'      => $request->judul,
            'subjudul'   => $request->subjudul,
            'deskripsi'  => $request->deskripsi,
            'isi_materi' => $request->isi_materi,
            'video'      => $request->video,
            'durasi'     => $request->durasi,
        ];

        if (Schema::hasColumn('materi', 'guru_id')) {
            $data['guru_id'] = Auth::id();
        }

        if (Schema::hasColumn('materi', 'urutan')) {
            $data['urutan'] = $request->urutan ?? 1;
        }

        if (Schema::hasColumn('materi', 'is_active')) {
            $data['is_active'] = $request->has('is_active') ? 1 : 0;
        }

        Materi::create($data);

        return redirect()->route('guru.materi.index')
            ->with('success', 'Materi berhasil ditambahkan.');
    }

    public function show(Materi $materi)
    {
        $this->authorizeMateri($materi);
        $materi->load(['subMateri.isiDetail']);

        return view('guru.materi.show', compact('materi'));
    }

    public function edit(Materi $materi)
    {
        $this->authorizeMateri($materi);

        return view('guru.materi.edit', compact('materi'));
    }

    public function update(Request $request, Materi $materi)
    {
        $this->authorizeMateri($materi);

        $request->validate([
            'bab'        => 'required|integer|min:0',
            'judul'      => 'required|string|max:255',
            'subjudul'   => 'nullable|string|max:255',
            'deskripsi'  => 'nullable|string',
            'isi_materi' => 'nullable|string',
            'video'      => 'nullable|string|max:255',
            'durasi'     => 'nullable|integer|min:0',
        ], [
            'bab.required'   => 'Bab wajib diisi.',
            'judul.required' => 'Judul wajib diisi.',
        ]);

        $data = [
            'bab'        => $request->bab,
            'judul'      => $request->judul,
            'subjudul'   => $request->subjudul,
            'deskripsi'  => $request->deskripsi,
            'isi_materi' => $request->isi_materi,
            'video'      => $request->video,
            'durasi'     => $request->durasi,
        ];

        if (Schema::hasColumn('materi', 'urutan')) {
            $data['urutan'] = $request->urutan ?? 1;
        }

        if (Schema::hasColumn('materi', 'is_active')) {
            $data['is_active'] = $request->has('is_active') ? 1 : 0;
        }

        $materi->update($data);

        return redirect()->route('guru.materi.index')
            ->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Materi $materi)
    {
        $this->authorizeMateri($materi);
        $materi->delete();

        return redirect()->route('guru.materi.index')
            ->with('success', 'Materi berhasil dihapus.');
    }

    /*
    |------------------------------------------------------------------
    | SUB MATERI
    |------------------------------------------------------------------
    */

    public function subStore(Request $request, Materi $materi)
    {
        $this->authorizeMateri($materi);
        $request->validate(['judul' => 'required|string|max:255']);

        $materi->subMateri()->create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe'      => $request->tipe ?? 'default',
            'icon'      => $request->icon,
            'urutan'    => $request->urutan ?? 1,
        ]);

        return redirect()->route('guru.materi.show', $materi->id)
            ->with('success', 'Sub materi berhasil ditambahkan.');
    }

    public function subUpdate(Request $request, Materi $materi, $subId)
    {
        $this->authorizeMateri($materi);
        $sub = SubMateri::findOrFail($subId);
        $request->validate(['judul' => 'required|string|max:255']);

        $sub->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe'      => $request->tipe ?? 'default',
            'icon'      => $request->icon,
            'urutan'    => $request->urutan ?? 1,
        ]);

        return redirect()->route('guru.materi.show', $materi->id)
            ->with('success', 'Sub materi berhasil diperbarui.');
    }

    public function subDestroy(Materi $materi, $subId)
    {
        $this->authorizeMateri($materi);
        $sub = SubMateri::findOrFail($subId);
        $sub->isiDetail()->delete();
        $sub->delete();

        return redirect()->route('guru.materi.show', $materi->id)
            ->with('success', 'Sub materi berhasil dihapus.');
    }

    /*
    |------------------------------------------------------------------
    | ISI DETAIL
    |------------------------------------------------------------------
    */

    public function detailStore(Request $request, Materi $materi, $subId)
    {
        $this->authorizeMateri($materi);
        $sub = SubMateri::findOrFail($subId);
        $request->validate(['label' => 'required|string|max:255']);

        $sub->isiDetail()->create([
            'label'  => $request->label,
            'nilai'  => $request->nilai,
            'arti'   => $request->arti,
            'warna'  => $request->warna,
            'urutan' => $request->urutan ?? 0,
        ]);

        return redirect()->route('guru.materi.show', $materi->id)
            ->with('success', 'Isi detail berhasil ditambahkan.');
    }

    public function detailDestroy(Materi $materi, $subId, $detailId)
    {
        $this->authorizeMateri($materi);
        IsiMateriDetail::findOrFail($detailId)->delete();

        return redirect()->route('guru.materi.show', $materi->id)
            ->with('success', 'Isi detail berhasil dihapus.');
    }

    /*
    |------------------------------------------------------------------
    | PRIVATE
    |------------------------------------------------------------------
    */

    private function authorizeMateri(Materi $materi): void
    {
        if (Schema::hasColumn('materi', 'guru_id')) {
            if ((int) $materi->guru_id !== (int) Auth::id()) {
                abort(403, 'Akses ditolak.');
            }
        }
    }
}