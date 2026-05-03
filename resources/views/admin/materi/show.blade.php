@extends('layouts.admin')

@section('title', $materi->judul)

@section('content')
<div class="space-y-6">

    {{-- HEADER mirip dashboard --}}
    <div class="rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white shadow-lg shadow-blue-200">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <a href="{{ route('admin.materi.index') }}"
                       class="text-blue-200 hover:text-white text-sm font-medium transition-colors">
                        ← Kelola Materi
                    </a>
                    <span class="text-blue-300">/</span>
                    <span class="text-blue-100 text-sm">Detail</span>
                </div>
                <span class="inline-block bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full mb-2">
                    Chapter {{ $materi->bab }}
                </span>
                <h1 class="text-3xl font-extrabold tracking-tight">{{ $materi->judul }}</h1>
                @if($materi->subjudul)
                    <p class="text-blue-100 mt-1 text-sm">{{ $materi->subjudul }}</p>
                @endif
            </div>
            <div class="flex gap-3 flex-shrink-0">
                <a href="{{ route('admin.materi.edit', $materi->id) }}"
                   class="inline-flex items-center px-5 py-3 bg-white/20 hover:bg-white/30 text-white font-bold rounded-2xl transition-all">
                    <i class="fa-solid fa-edit mr-2"></i> Edit
                </a>
                <form action="{{ route('admin.materi.destroy', $materi->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                       class="inline-flex items-center px-5 py-3 bg-red-500/80 hover:bg-red-500 text-white font-bold rounded-2xl transition-all">
                        <i class="fa-solid fa-trash mr-2"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- STATS CARDS --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800">{{ $materi->subMateri->count() }}</p>
                <p class="text-xs text-slate-500 font-medium">Sub Materi</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-clipboard-check"></i>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800">{{ $materi->assessments->count() }}</p>
                <p class="text-xs text-slate-500 font-medium">Assessment</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-{{ $materi->video ? 'video' : 'video-slash' }}"></i>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800">{{ $materi->video ? 'Ada' : 'Tidak' }}</p>
                <p class="text-xs text-slate-500 font-medium">Video</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-{{ $materi->is_active ? 'emerald' : 'slate' }}-100 text-{{ $materi->is_active ? 'emerald' : 'slate' }}-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800">{{ $materi->is_active ? 'Aktif' : 'Nonaktif' }}</p>
                <p class="text-xs text-slate-500 font-medium">Status</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- KOLOM KIRI (2/3) --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- DESKRIPSI --}}
            @if($materi->deskripsi)
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-3 flex items-center gap-2">
                    <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-align-left"></i>
                    </span>
                    Deskripsi
                </h2>
                <p class="text-slate-600 leading-relaxed">{{ $materi->deskripsi }}</p>
            </div>
            @endif

            {{-- ISI MATERI --}}
            @if($materi->isi_materi)
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-book-open"></i>
                    </span>
                    Isi Materi
                </h2>
                <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed">
                    {!! nl2br(e($materi->isi_materi)) !!}
                </div>
            </div>
            @endif

            {{-- VIDEO --}}
            @if($materi->video)
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 bg-red-100 text-red-600 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-video"></i>
                    </span>
                    Video Pembelajaran
                </h2>
                @php
                    $videoUrl = $materi->video;
                    // Cek apakah YouTube
                    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\s]+)/', $videoUrl, $matches);
                    $youtubeId = $matches[1] ?? null;
                @endphp
                @if($youtubeId)
                    <div class="rounded-2xl overflow-hidden aspect-video">
                        <iframe class="w-full h-full"
                            src="https://www.youtube.com/embed/{{ $youtubeId }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                @else
                    <video controls class="w-full rounded-2xl">
                        <source src="{{ asset('storage/' . $videoUrl) }}">
                        Browser Anda tidak mendukung video.
                    </video>
                @endif
            </div>
            @endif

            {{-- SUB MATERI --}}
            @if($materi->subMateri->count() > 0)
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 bg-green-100 text-green-600 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-layer-group"></i>
                    </span>
                    Sub Materi
                    <span class="ml-auto text-xs text-slate-400 bg-slate-100 px-2 py-1 rounded-full">
                        {{ $materi->subMateri->count() }} sub
                    </span>
                </h2>
                <div class="space-y-3">
                    @foreach($materi->subMateri as $index => $sub)
                    <div class="flex items-start gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-blue-200 hover:bg-blue-50/40 transition-colors">
                        <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm flex-shrink-0">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-slate-800">{{ $sub->judul ?? $sub->nama ?? 'Sub Materi ' . ($index + 1) }}</p>
                            @if(isset($sub->deskripsi) && $sub->deskripsi)
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2">{{ $sub->deskripsi }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

        {{-- KOLOM KANAN (1/3) --}}
        <div class="space-y-6">

            {{-- GAMBAR --}}
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                @if($materi->gambar)
                    <img src="{{ asset('storage/' . $materi->gambar) }}"
                         alt="{{ $materi->judul }}"
                         class="w-full object-cover h-52">
                @else
                    <div class="w-full h-52 bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center">
                        <i class="fa-solid fa-image text-5xl text-blue-300"></i>
                    </div>
                @endif
                <div class="p-5">
                    <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1">Gambar Materi</p>
                    <p class="text-sm text-slate-600">{{ $materi->gambar ? basename($materi->gambar) : 'Belum ada gambar' }}</p>
                </div>
            </div>

            {{-- INFO MATERI --}}
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4">Informasi Materi</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Chapter</span>
                        <span class="text-sm font-bold text-slate-800 bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full border border-indigo-100">
                            Chapter {{ $materi->bab }}
                        </span>
                    </div>
                    @if($materi->subjudul)
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Subjudul</span>
                        <span class="text-sm font-semibold text-slate-700">{{ $materi->subjudul }}</span>
                    </div>
                    @endif
                    @if($materi->durasi)
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Durasi</span>
                        <span class="text-sm font-semibold text-slate-700">{{ $materi->durasi }} menit</span>
                    </div>
                    @endif
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Status</span>
                        <span class="text-xs font-bold px-3 py-1 rounded-full
                            {{ $materi->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-500 border border-slate-200' }}">
                            {{ $materi->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Dibuat</span>
                        <span class="text-sm font-semibold text-slate-700">{{ $materi->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Diperbarui</span>
                        <span class="text-sm font-semibold text-slate-700">{{ $materi->updated_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>

            {{-- ASSESSMENTS --}}
            @if($materi->assessments->count() > 0)
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4">Assessment</h3>
                <div class="space-y-3">
                    @foreach($materi->assessments as $assessment)
                    <div class="flex items-center gap-3 p-3 bg-purple-50 rounded-xl border border-purple-100">
                        <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center text-sm">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-800">{{ $assessment->judul ?? 'Assessment' }}</p>
                            @if(isset($assessment->jumlah_soal))
                                <p class="text-xs text-slate-500">{{ $assessment->jumlah_soal }} soal</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>

</div>
@endsection