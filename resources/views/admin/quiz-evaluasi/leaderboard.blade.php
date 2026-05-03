@extends('layouts.admin')

@section('title', 'Leaderboard Quiz')

@section('content')

    {{-- BACK LINK --}}
    <a href="{{ route('admin.quiz-evaluasi.index') }}"
       class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 font-semibold mb-4 transition">
        <i class="fas fa-arrow-left text-xs"></i> Kembali ke Quiz & Evaluasi
    </a>

    {{-- HEADER BANNER --}}
    <div class="rounded-3xl bg-gradient-to-r from-yellow-400 to-orange-400 p-6 mb-6 shadow-lg shadow-yellow-200">
        <p class="text-yellow-900/70 text-sm font-semibold uppercase tracking-widest mb-1">Peringkat Siswa</p>
        <h1 class="text-3xl font-extrabold text-yellow-900 tracking-tight">🏆 Leaderboard Quiz</h1>
        <p class="text-yellow-900/70 text-sm mt-1">
            @if($selectedQuiz)
                Peringkat untuk: <strong>{{ $selectedQuiz->judul }}</strong>
            @else
                Peringkat siswa berdasarkan rata-rata skor semua quiz.
            @endif
        </p>
    </div>

    {{-- FILTER --}}
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 mb-6">
        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Filter & Pencarian</p>
        <form method="GET" action="{{ route('admin.quiz-evaluasi.leaderboard') }}"
              class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[160px]">
                <input type="text" name="search"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-slate-50"
                    placeholder="Cari nama atau NIS..."
                    value="{{ request('search') }}">
            </div>
            <div class="min-w-[200px]">
                <select name="quiz_id"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-slate-50">
                    <option value="">Semua Quiz</option>
                    @foreach($quizList as $q)
                        <option value="{{ $q->id }}" @selected(request('quiz_id') == $q->id)>
                            Ch.{{ $q->chapter ?? '-' }} - {{ $q->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-[130px]">
                <select name="kelas"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-slate-50">
                    <option value="">Semua Kelas</option>
                    @foreach($kelasList as $k)
                        <option value="{{ $k }}" @selected(request('kelas') == $k)>{{ $k }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit"
                    class="px-5 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-yellow-900 font-bold rounded-xl text-sm transition shadow-sm">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
                <a href="{{ route('admin.quiz-evaluasi.leaderboard') }}"
                    class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-xl text-sm transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    {{-- LEADERBOARD TABLE --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <p class="font-bold text-slate-700">Daftar Peringkat</p>
            <span class="text-xs text-slate-400 font-semibold">{{ $paginator->total() }} siswa</span>
        </div>

        @if($paginator->count())
            @php $startRank = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; @endphp
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <th class="px-4 py-3 text-center w-20">Peringkat</th>
                            <th class="px-4 py-3 text-left">Nama Siswa</th>
                            <th class="px-4 py-3 text-left w-24">NIS</th>
                            <th class="px-4 py-3 text-left w-24">Kelas</th>
                            <th class="px-4 py-3 text-center w-28">Total Attempt</th>
                            <th class="px-4 py-3 text-center w-32">Rata² Skor</th>
                            <th class="px-4 py-3 text-center w-24">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($paginator as $i => $siswa)
                            @php $rank = $startRank + $i; @endphp
                            <tr class="hover:bg-yellow-50/50 transition-colors {{ $rank <= 3 ? 'bg-yellow-50/30' : '' }}">
                                <td class="px-4 py-3.5 text-center">
                                    @if($rank === 1)
                                        <span class="text-2xl">🥇</span>
                                    @elseif($rank === 2)
                                        <span class="text-2xl">🥈</span>
                                    @elseif($rank === 3)
                                        <span class="text-2xl">🥉</span>
                                    @else
                                        <span class="text-slate-400 font-bold text-sm">#{{ $rank }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3.5">
                                    <p class="font-semibold text-slate-800">{{ $siswa->name }}</p>
                                    <p class="text-xs text-slate-400">{{ $siswa->email }}</p>
                                </td>
                                <td class="px-4 py-3.5 text-slate-500 text-xs">{{ $siswa->nis ?: '-' }}</td>
                                <td class="px-4 py-3.5 text-slate-600">{{ $siswa->kelas ?: '-' }}</td>
                                <td class="px-4 py-3.5 text-center font-semibold text-slate-700">
                                    {{ $siswa->quiz_attempts_count }}
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    @if($siswa->rata_quiz !== null)
                                        <span class="font-extrabold text-base
                                            {{ $siswa->rata_quiz >= 75 ? 'text-green-600' : ($siswa->rata_quiz >= 50 ? 'text-yellow-500' : 'text-red-500') }}">
                                            {{ $siswa->rata_quiz }}
                                        </span>
                                    @else
                                        <span class="text-slate-300 font-bold">—</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    @if($siswa->is_active)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span>
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-500 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400 inline-block"></span>
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-100">
                {{ $paginator->withQueryString()->links() }}
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <div class="text-5xl mb-4">🏆</div>
                <h3 class="text-lg font-extrabold text-slate-700 mb-1">Belum Ada Data Leaderboard</h3>
                <p class="text-sm text-slate-400">Belum ada siswa yang mengerjakan quiz.</p>
            </div>
        @endif
    </div>

@endsection