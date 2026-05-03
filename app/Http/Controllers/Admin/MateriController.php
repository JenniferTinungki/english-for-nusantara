<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $query = Materi::query();

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('bab')) {
            $query->where('bab', $request->bab);
        }

        $materi = $query->orderBy('bab')->latest()->get();

        return view('admin.materi.index', compact('materi'));
    }

    public function create()
    {
        return view('admin.materi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bab'        => 'required|integer|min:0|max:99',
            'judul'      => 'required|string|max:255',
            'isi_materi' => 'required|string',
            'audio'      => 'nullable|file|mimes:mp3,wav,ogg|max:10240',
            'gambar'     => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'bab.required'        => 'Bab wajib dipilih.',
            'bab.min'             => 'Bab minimal 0.',
            'judul.required'      => 'Judul materi wajib diisi.',
            'isi_materi.required' => 'Konten materi wajib diisi.',
            'audio.mimes'         => 'Audio harus berformat mp3, wav, atau ogg.',
            'audio.max'           => 'Ukuran audio maksimal 10MB.',
            'gambar.mimes'        => 'Gambar harus berformat jpg, jpeg, png, atau webp.',
            'gambar.max'          => 'Ukuran gambar maksimal 2MB.',
        ]);

        $audioPath  = null;
        $gambarPath = null;

        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('audio', 'public');
        }

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar', 'public');
        }

        Materi::create([
            'bab'        => $request->bab,
            'judul'      => $request->judul,
            'subjudul'   => $request->subjudul,
            'deskripsi'  => $request->deskripsi,
            'isi_materi' => $request->isi_materi,
            'video'      => $request->video,
            'durasi'     => $request->durasi,
            'audio'      => $audioPath,
            'gambar'     => $gambarPath,
            'is_active'  => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.materi.index')
            ->with('success', 'Materi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $materi = Materi::with(['subMateri', 'assessments'])->findOrFail($id);

        return view('admin.materi.show', compact('materi'));
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);

        return view('admin.materi.edit', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bab'        => 'required|integer|min:0|max:99',
            'judul'      => 'required|string|max:255',
            'isi_materi' => 'required|string',
            'audio'      => 'nullable|file|mimes:mp3,wav,ogg|max:10240',
            'gambar'     => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'bab.required'        => 'Bab wajib dipilih.',
            'bab.min'             => 'Bab minimal 0.',
            'judul.required'      => 'Judul materi wajib diisi.',
            'isi_materi.required' => 'Konten materi wajib diisi.',
            'audio.mimes'         => 'Audio harus berformat mp3, wav, atau ogg.',
            'audio.max'           => 'Ukuran audio maksimal 10MB.',
            'gambar.mimes'        => 'Gambar harus berformat jpg, jpeg, png, atau webp.',
            'gambar.max'          => 'Ukuran gambar maksimal 2MB.',
        ]);

        $materi = Materi::findOrFail($id);

        // Update audio jika ada file baru
        if ($request->hasFile('audio')) {
            if ($materi->audio && Storage::disk('public')->exists($materi->audio)) {
                Storage::disk('public')->delete($materi->audio);
            }
            $materi->audio = $request->file('audio')->store('audio', 'public');
        }

        // Update gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            if ($materi->gambar && Storage::disk('public')->exists($materi->gambar)) {
                Storage::disk('public')->delete($materi->gambar);
            }
            $materi->gambar = $request->file('gambar')->store('gambar', 'public');
        }

        $materi->bab        = $request->bab;
        $materi->judul      = $request->judul;
        $materi->subjudul   = $request->subjudul;
        $materi->deskripsi  = $request->deskripsi;
        $materi->isi_materi = $request->isi_materi;
        $materi->video      = $request->video;
        $materi->durasi     = $request->durasi;
        $materi->is_active  = $request->boolean('is_active');
        $materi->save();

        return redirect()->route('admin.materi.show', $materi->id)
            ->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);

        if ($materi->audio && Storage::disk('public')->exists($materi->audio)) {
            Storage::disk('public')->delete($materi->audio);
        }

        if ($materi->gambar && Storage::disk('public')->exists($materi->gambar)) {
            Storage::disk('public')->delete($materi->gambar);
        }

        $materi->delete();

        return redirect()->route('admin.materi.index')
            ->with('success', 'Materi berhasil dihapus.');
    }
}