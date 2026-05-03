@extends('layouts.admin')

@section('title', 'Semua Hasil Quiz')

@section('content')

    {{-- BACK LINK --}}
    <a href="{{ route('admin.quiz-evaluasi.index') }}"
       class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 font-semibold mb-4 transition">
        <i class="fas fa-arrow-left text-xs"></i> Kembali ke Quiz & Evaluasi
    </a>

    {{-- HEADER BANNER --}}
    <div class="rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 p-6 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 shadow-lg shadow-blue-200">
        <div>
            <p class="text-blue-100 text-sm font-semibold uppercase tracking-widest mb-1">Rekap Lengkap</p>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Semua Hasil Quiz Siswa</h1>
            <p class="text-blue-100 text-sm mt-1">Rekap seluruh attempt quiz dari semua siswa.</p>
        </div>
        <a href="{{ route('admin.quiz-evaluasi.leaderboard') }}"
           class="inline-flex items-center gap-2 bg-yellow-400 text-yellow-900 font-bold px-4 py-2 rounded-2xl shadow hover:bg-yellow-300 transition text-sm flex-shrink-0">
            🏆 Leaderboard
        </a>
    </div>

    {{-- FILTER --}}
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 mb-6">
        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Filter & Pencarian</p>
        <form method="GET" action="{{ route('admin.quiz-evaluasi.hasil') }}"
              class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[160px]">
                <input type="text" name="search"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50"
                    placeholder="Cari nama atau NIS..."
                    value="{{ request('search') }}">
            </div>
            <div class="min-w-[200px]">
                <select name="quiz_id"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50">
                    <option value="">Semua Quiz</option>
                    @foreach($quizList as $q)
                        <option value="{{ $q->id }}" @selected(request('quiz_id') == $q->id)>
                            Ch.{{ $q->chapter ?? '-' }} - {{ Str::limit($q->judul, 30) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-[130px]">
                <select name="kelas"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50">
                    <option value="">Semua Kelas</option>
                    @foreach($kelasList as $k)
                        <option value="{{ $k }}" @selected(request('kelas') == $k)>{{ $k }}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-[150px]">
                <select name="status"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50">
                    <option value="">Semua Status</option>
                    <option value="lulus" @selected(request('status') == 'lulus')>Lulus (≥75)</option>
                    <option value="tidak_lulus" @selected(request('status') == 'tidak_lulus')>Tidak Lulus</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit"
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-sm transition shadow-sm shadow-blue-200">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
                <a href="{{ route('admin.quiz-evaluasi.hasil') }}"
                    class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-xl text-sm transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    {{-- TABEL HASIL --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <p class="font-bold text-slate-700">Daftar Hasil</p>
            @if($attempts->count())
                <span class="text-xs text-slate-400 font-semibold">
                    {{ $attempts->firstItem() }}–{{ $attempts->lastItem() }} dari {{ $attempts->total() }} hasil
                </span>
            @endif
        </div>

        @if($attempts->count())
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <th class="px-4 py-3 text-left w-10">No</th>
                            <th class="px-4 py-3 text-left">Nama Siswa</th>
                            <th class="px-4 py-3 text-left w-24">NIS</th>
                            <th class="px-4 py-3 text-left w-20">Kelas</th>
                            <th class="px-4 py-3 text-left">Quiz</th>
                            <th class="px-4 py-3 text-center w-16">Ch.</th>
                            <th class="px-4 py-3 text-center w-20">Skor</th>
                            <th class="px-4 py-3 text-center w-28">Jwb Benar</th>
                            <th class="px-4 py-3 text-center w-28">Status</th>
                            <th class="px-4 py-3 text-left w-36">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($attempts as $i => $attempt)
                            @php $score = $attempt->score ?? $attempt->nilai ?? 0; @endphp
                            <tr class="hover:bg-blue-50/40 transition-colors">
                                <td class="px-4 py-3.5 text-slate-400 font-medium">
                                    {{ $attempts->firstItem() + $i }}
                                </td>
                                <td class="px-4 py-3.5 font-semibold text-slate-800">
                                    {{ $attempt->user->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3.5 text-slate-500 text-xs">
                                    {{ $attempt->user->nis ?? '-' }}
                                </td>
                                <td class="px-4 py-3.5 text-slate-600">
                                    {{ $attempt->user->kelas ?? '-' }}
                                </td>
                                <td class="px-4 py-3.5 text-slate-500 text-xs">
                                    {{ Str::limit($attempt->quiz->judul ?? '-', 35) }}
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-blue-600 text-white text-xs font-extrabold">
                                        {{ $attempt->quiz->chapter ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="font-extrabold text-base
                                        {{ $score >= 75 ? 'text-green-600' : 'text-red-500' }}">
                                        {{ $score }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-center text-slate-500 font-medium">
                                    {{ $attempt->correct_answers ?? '-' }} /
                                    {{ $attempt->total_questions ?? ($attempt->quiz->questions->count() ?? '-') }}
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    @if($score >= 75)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span>
                                            Lulus
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-red-100 text-red-600 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500 inline-block"></span>
                                            Tidak Lulus
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3.5 text-slate-400 text-xs">
                                    {{ ($attempt->finished_at ?? $attempt->submitted_at ?? $attempt->created_at)?->format('d M Y H:i') ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-100">
                {{ $attempts->withQueryString()->links() }}
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <div class="text-5xl mb-4">📋</div>
                <h3 class="text-lg font-extrabold text-slate-700 mb-1">Tidak Ada Hasil Ditemukan</h3>
                <p class="text-sm text-slate-400">Coba ubah filter pencarian.</p>
            </div>
        @endif
    </div>

@endsection