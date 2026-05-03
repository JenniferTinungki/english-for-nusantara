@extends('layouts.admin')

@section('title', 'Kelola Materi')

@section('content')
<div class="space-y-6">

    {{-- HEADER mirip dashboard --}}
    <div class="rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white shadow-lg shadow-blue-200">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <p class="text-blue-200 text-sm font-medium mb-1">Manajemen Konten</p>
                <h1 class="text-3xl font-extrabold tracking-tight">Kelola Materi 📚</h1>
                <p class="text-blue-100 mt-1 text-sm">Atur materi pembelajaran berdasarkan Chapter 0 sampai 5.</p>
            </div>
            <a href="{{ route('admin.materi.create') }}"
               class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-bold rounded-2xl shadow hover:bg-blue-50 transition-all">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Materi
            </a>
        </div>
    </div>

    {{-- STATS CARDS --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @php
            $totalMateri = $materi->count();
            $chapters = $materi->groupBy('bab');
        @endphp

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-book-open"></i>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800">{{ $totalMateri }}</p>
                <p class="text-xs text-slate-500 font-medium">Total Materi</p>
            </div>
        </div>

        @foreach(range(0, 2) as $ch)
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            @php
                $colors = ['purple', 'green', 'orange'];
                $color = $colors[$ch];
            @endphp
            <div class="w-12 h-12 rounded-2xl bg-{{ $color }}-100 text-{{ $color }}-600 flex items-center justify-center text-xl font-bold">
                {{ $ch }}
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800">{{ $chapters->get($ch, collect())->count() }}</p>
                <p class="text-xs text-slate-500 font-medium">Chapter {{ $ch }}</p>
            </div>
        </div>
        @endforeach
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl flex items-center gap-3">
            <i class="fa-solid fa-check-circle text-green-500"></i>
            <p class="font-semibold text-sm">{{ session('success') }}</p>
        </div>
    @endif

    {{-- FILTER & SEARCH --}}
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
        <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4">Filter & Pencarian</p>
        <form method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                    <i class="fa-solid fa-search"></i>
                </span>
                <input type="text" name="search" value="{{ request('search') }}"
                       class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-500 outline-none transition-all"
                       placeholder="Cari judul materi...">
            </div>

            <div class="w-full md:w-56 relative">
                <select name="bab" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-500 outline-none appearance-none cursor-pointer">
                    <option value="">Semua Chapter</option>
                    @foreach(range(0, 5) as $ch)
                        <option value="{{ $ch }}" {{ request('bab') == $ch ? 'selected' : '' }}>Chapter {{ $ch }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </div>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-2xl hover:bg-blue-700 transition-all">
                    <i class="fa-solid fa-filter mr-1"></i> Filter
                </button>
                @if(request('search') || request('bab') !== null && request('bab') !== '')
                    <a href="{{ route('admin.materi.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 font-semibold rounded-2xl hover:bg-slate-200 transition-all flex items-center">
                        <i class="fa-solid fa-xmark mr-1"></i> Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- TABLE SECTION --}}
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <p class="font-bold text-slate-700">Daftar Materi</p>
            <span class="text-xs text-slate-400 bg-slate-100 px-3 py-1 rounded-full">{{ $materi->count() }} materi</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Materi</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">Chapter</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Bab</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($materi as $item)
                        <tr class="hover:bg-blue-50/40 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                                        <i class="fa-solid fa-book-open"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800">{{ $item->judul }}</div>
                                        @if($item->deskripsi)
                                            <div class="text-xs text-slate-500 line-clamp-1">{{ \Illuminate\Support\Str::limit($item->deskripsi, 45) }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @php
                                    $chapterColors = [
                                        0 => 'bg-slate-100 text-slate-700 border-slate-200',
                                        1 => 'bg-blue-50 text-blue-700 border-blue-100',
                                        2 => 'bg-indigo-50 text-indigo-700 border-indigo-100',
                                        3 => 'bg-purple-50 text-purple-700 border-purple-100',
                                        4 => 'bg-green-50 text-green-700 border-green-100',
                                        5 => 'bg-orange-50 text-orange-700 border-orange-100',
                                    ];
                                    $colorClass = $chapterColors[$item->bab] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                                @endphp
                                <span class="inline-block px-3 py-1 text-xs font-bold rounded-full border {{ $colorClass }}">
                                    Chapter {{ $item->bab }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-600 font-medium">{{ $item->subjudul ?? $item->bab }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.materi.show', $item->id) }}"
                                       class="w-9 h-9 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl hover:bg-blue-200 transition-colors" title="Detail">
                                        <i class="fa-solid fa-eye text-sm"></i>
                                    </a>
                                    <a href="{{ route('admin.materi.edit', $item->id) }}"
                                       class="w-9 h-9 flex items-center justify-center bg-amber-100 text-amber-600 rounded-xl hover:bg-amber-200 transition-colors" title="Edit">
                                        <i class="fa-solid fa-edit text-sm"></i>
                                    </a>
                                    <form action="{{ route('admin.materi.destroy', $item->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-9 h-9 flex items-center justify-center bg-red-100 text-red-600 rounded-xl hover:bg-red-200 transition-colors" title="Hapus">
                                            <i class="fa-solid fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="w-16 h-16 bg-blue-50 text-blue-300 rounded-full flex items-center justify-center text-3xl mx-auto mb-3">
                                    <i class="fa-solid fa-folder-open"></i>
                                </div>
                                <h5 class="text-lg font-bold text-slate-800">Belum Ada Materi</h5>
                                <p class="text-sm text-slate-500 mt-1">Silakan tambahkan materi pembelajaran pertama Anda.</p>
                                <a href="{{ route('admin.materi.create') }}" class="inline-flex items-center mt-4 px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded-xl hover:bg-blue-700 transition-all">
                                    <i class="fa-solid fa-plus mr-2"></i> Tambah Materi
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if(method_exists($materi, 'links') && $materi->hasPages())
            <div class="p-6 border-t border-slate-100 bg-slate-50">
                {{ $materi->withQueryString()->links() }}
            </div>
        @endif
    </div>

</div>
@endsection