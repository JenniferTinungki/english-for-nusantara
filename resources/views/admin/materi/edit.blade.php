@extends('layouts.admin')

@section('title', 'Edit Materi')

@section('content')
<div class="space-y-6">

    {{-- HEADER mirip dashboard --}}
    <div class="rounded-3xl bg-gradient-to-r from-amber-500 to-orange-500 p-8 text-white shadow-lg shadow-amber-200">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <a href="{{ route('admin.materi.index') }}"
                       class="text-amber-100 hover:text-white text-sm font-medium transition-colors">
                        ← Kelola Materi
                    </a>
                    <span class="text-amber-300">/</span>
                    <span class="text-amber-100 text-sm">Edit</span>
                </div>
                <span class="inline-block bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full mb-2">
                    Chapter {{ $materi->bab }}
                </span>
                <h1 class="text-3xl font-extrabold tracking-tight">Edit Materi</h1>
                <p class="text-amber-100 mt-1 text-sm">{{ $materi->judul }}</p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center text-3xl flex-shrink-0">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
        </div>
    </div>

    {{-- ERROR MESSAGES --}}
    @if($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl">
            <p class="font-bold text-sm mb-2"><i class="fa-solid fa-triangle-exclamation mr-2"></i>Terdapat kesalahan:</p>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <form action="{{ route('admin.materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- KOLOM KIRI (2/3) --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- INFO DASAR --}}
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                    <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-5">Informasi Dasar</h2>
                    <div class="space-y-4">

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Judul Materi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="judul" value="{{ old('judul', $materi->judul) }}"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all outline-none @error('judul') border-red-400 @enderror"
                                placeholder="Masukkan judul materi...">
                            @error('judul')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Subjudul</label>
                            <input type="text" name="subjudul" value="{{ old('subjudul', $materi->subjudul) }}"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all outline-none"
                                placeholder="Masukkan subjudul (opsional)...">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                            <textarea name="deskripsi" rows="3"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all outline-none resize-none"
                                placeholder="Masukkan deskripsi singkat materi...">{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                        </div>

                    </div>
                </div>

                {{-- ISI MATERI --}}
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                    <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-5">
                        Isi Materi <span class="text-red-500">*</span>
                    </h2>
                    <textarea name="isi_materi" rows="12"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all outline-none resize-y @error('isi_materi') border-red-400 @enderror"
                        placeholder="Tulis konten materi di sini...">{{ old('isi_materi', $materi->isi_materi) }}</textarea>
                    @error('isi_materi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- MEDIA --}}
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                    <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-5">Media</h2>
                    <div class="space-y-5">

                        {{-- Video --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                <i class="fa-solid fa-video text-red-400 mr-1"></i> Link Video (YouTube/URL)
                            </label>
                            <input type="text" name="video" value="{{ old('video', $materi->video) }}"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all outline-none"
                                placeholder="https://youtube.com/watch?v=...">
                        </div>

                        {{-- Audio --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                <i class="fa-solid fa-music text-green-400 mr-1"></i> Upload Audio
                                <span class="text-xs text-slate-400 font-normal ml-1">(mp3, wav, ogg — maks 10MB)</span>
                            </label>
                            <input type="file" name="audio" accept=".mp3,.wav,.ogg"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-amber-400 outline-none transition-all file:mr-4 file:py-1 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                            @error('audio')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            @if($materi->audio)
                                <div class="mt-3 p-3 bg-green-50 border border-green-100 rounded-xl">
                                    <p class="text-xs font-semibold text-green-700 mb-2">Audio saat ini:</p>
                                    <audio controls class="w-full h-10">
                                        <source src="{{ asset('storage/' . $materi->audio) }}">
                                    </audio>
                                    <p class="text-xs text-slate-400 mt-1">Upload file baru untuk mengganti audio ini.</p>
                                </div>
                            @endif
                        </div>

                        {{-- Gambar --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                <i class="fa-solid fa-image text-blue-400 mr-1"></i> Upload Gambar
                                <span class="text-xs text-slate-400 font-normal ml-1">(jpg, png, webp — maks 2MB)</span>
                            </label>
                            <input type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-amber-400 outline-none transition-all file:mr-4 file:py-1 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            @error('gambar')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            @if($materi->gambar)
                                <div class="mt-3 p-3 bg-blue-50 border border-blue-100 rounded-xl">
                                    <p class="text-xs font-semibold text-blue-700 mb-2">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $materi->gambar) }}" alt="Gambar Materi"
                                         class="w-40 rounded-xl shadow-sm border border-slate-200 object-cover">
                                    <p class="text-xs text-slate-400 mt-1">Upload file baru untuk mengganti gambar ini.</p>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

            </div>

            {{-- KOLOM KANAN (1/3) --}}
            <div class="space-y-6">

                {{-- PENGATURAN --}}
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                    <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-5">Pengaturan</h2>
                    <div class="space-y-4">

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Chapter (Bab) <span class="text-red-500">*</span>
                            </label>
                            <select name="bab"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none appearance-none cursor-pointer @error('bab') border-red-400 @enderror">
                                @foreach(range(0, 5) as $ch)
                                    <option value="{{ $ch }}" {{ old('bab', $materi->bab) == $ch ? 'selected' : '' }}>
                                        Chapter {{ $ch }}
                                    </option>
                                @endforeach
                            </select>
                            @error('bab')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Durasi (menit)</label>
                            <input type="number" name="durasi" value="{{ old('durasi', $materi->durasi) }}" min="0"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all outline-none"
                                placeholder="Contoh: 30">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-3">Status</label>
                            <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl border border-slate-200">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" id="is_active"
                                    {{ old('is_active', $materi->is_active) ? 'checked' : '' }}
                                    class="w-5 h-5 rounded text-amber-500 focus:ring-amber-400 cursor-pointer">
                                <label for="is_active" class="text-sm font-semibold text-slate-700 cursor-pointer">
                                    Aktif (tampil ke siswa)
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 space-y-3">
                    <button type="submit"
                        class="w-full inline-flex justify-center items-center px-6 py-3 rounded-2xl bg-amber-500 hover:bg-amber-600 text-white font-bold shadow-lg shadow-amber-200 transition-all active:scale-95">
                        <i class="fa-solid fa-check mr-2"></i> Update Materi
                    </button>
                    <a href="{{ route('admin.materi.show', $materi->id) }}"
                        class="w-full inline-flex justify-center items-center px-6 py-3 rounded-2xl bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold transition-all">
                        <i class="fa-solid fa-eye mr-2"></i> Lihat Detail
                    </a>
                    <a href="{{ route('admin.materi.index') }}"
                        class="w-full inline-flex justify-center items-center px-6 py-3 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold transition-all">
                        Batal
                    </a>
                </div>

                {{-- INFO --}}
                <div class="bg-amber-50 rounded-3xl border border-amber-100 p-5">
                    <p class="text-xs font-bold text-amber-700 uppercase tracking-wider mb-2">
                        <i class="fa-solid fa-circle-info mr-1"></i> Info
                    </p>
                    <ul class="text-xs text-amber-700 space-y-1.5">
                        <li>• Field bertanda <span class="text-red-500 font-bold">*</span> wajib diisi</li>
                        <li>• Upload audio/gambar baru akan mengganti file lama</li>
                        <li>• Jika tidak upload file baru, file lama tetap tersimpan</li>
                        <li>• Dibuat: {{ $materi->created_at->format('d M Y, H:i') }}</li>
                        <li>• Diperbarui: {{ $materi->updated_at->format('d M Y, H:i') }}</li>
                    </ul>
                </div>

            </div>
        </div>

    </form>
</div>
@endsection