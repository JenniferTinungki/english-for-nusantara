@extends('layouts.app')

@section('title', 'Quiz - ' . ($quiz->judul ?? 'Tanpa Judul'))

@section('content')
@php
    $isSubmitted = !empty($latestAttempt);
    $totalQuestions = $quiz->questions->count();
@endphp

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <a href="{{ route('siswa.quiz.index') }}"
       class="inline-flex items-center gap-2 text-blue-700 font-bold mb-6 hover:text-blue-800 transition">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali ke daftar quiz
    </a>

    <section class="relative overflow-hidden rounded-[32px] min-h-[220px] shadow-2xl mb-8">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 via-blue-700 to-indigo-600"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.15),transparent_35%)]"></div>
        <div class="relative z-10 p-6 lg:p-10 text-white flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/15 font-bold mb-5 backdrop-blur-sm">
                    <i class="fa-solid fa-circle-question"></i>
                    Quiz Chapter {{ $quiz->chapter ?? '-' }}
                </div>
                <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-3">{{ $quiz->judul }}</h1>
                <p class="text-white/80 leading-7">{{ $quiz->deskripsi ?? 'Kerjakan quiz ini dengan teliti. Pilih jawaban yang paling tepat.' }}</p>
            </div>
            <div class="flex flex-col gap-3 min-w-[180px]">
                <div class="rounded-2xl bg-white/10 border border-white/15 p-4 text-center backdrop-blur-sm">
                    <div class="text-4xl font-extrabold">{{ $totalQuestions }}</div>
                    <div class="text-white/70 text-sm mt-1">Total Soal</div>
                </div>
                @if($isSubmitted)
                <div class="rounded-2xl bg-emerald-400/20 border border-emerald-200/20 p-4 text-center">
                    <div class="text-4xl font-extrabold">{{ $latestAttempt->score }}</div>
                    <div class="text-white/70 text-sm mt-1">Skor Terakhir</div>
                </div>
                @endif
            </div>
        </div>
    </section>

    @if($isSubmitted)
    <div class="bg-emerald-50 border border-emerald-200 rounded-[24px] p-5 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <h4 class="font-extrabold text-emerald-800">Kamu sudah mengerjakan quiz ini</h4>
                <p class="text-emerald-600 text-sm">Skor terakhir: <strong>{{ $latestAttempt->score }}</strong> | Benar: <strong>{{ $latestAttempt->correct_answers }}/{{ $latestAttempt->total_questions }}</strong></p>
            </div>
        </div>
        <a href="{{ route('siswa.quiz.leaderboard', $quiz->id) }}" class="px-4 py-2 rounded-xl border border-emerald-300 text-emerald-700 font-bold hover:bg-emerald-100 transition">
            <i class="fa-solid fa-trophy mr-1"></i> Leaderboard
        </a>
    </div>
    @endif

    @if($totalQuestions > 0)
    <form id="quizForm" action="{{ route('siswa.quiz.submit', $quiz->id) }}" method="POST">
        @csrf
        <input type="hidden" name="auto_submitted" id="autoSubmitted" value="0">

        @if(!empty($quiz->durasi))
        <div class="bg-white rounded-[24px] border border-slate-200 shadow p-4 mb-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div>
                    <p class="text-slate-500 text-sm">Waktu tersisa</p>
                    <h4 id="timerDisplay" class="text-xl font-extrabold text-slate-800">{{ gmdate('H:i:s', $quiz->durasi * 60) }}</h4>
                </div>
            </div>
            <div class="text-slate-500 text-sm font-semibold">Durasi: {{ $quiz->durasi }} menit</div>
        </div>
        @endif

        <div class="space-y-6 mb-8">
            @foreach($quiz->questions as $index => $question)
            <div class="bg-white rounded-[24px] border border-slate-200 shadow-md p-6">
                <div class="flex items-start gap-4 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-extrabold text-sm flex-shrink-0">{{ $index + 1 }}</div>
                    <p class="text-slate-800 font-semibold text-base leading-7 pt-1">{{ $question->question }}</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pl-14">
                    @foreach(['A' => $question->option_a, 'B' => $question->option_b, 'C' => $question->option_c, 'D' => $question->option_d] as $key => $option)
                    @if(!empty($option))
                    <label class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-blue-50 hover:border-blue-300 cursor-pointer px-4 py-3 transition select-none">
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $key }}" class="accent-blue-600 w-4 h-4 flex-shrink-0">
                        <span class="text-slate-700 font-medium leading-6"><span class="font-extrabold text-blue-600 mr-1">{{ $key }}.</span>{{ $option }}</span>
                    </label>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="bg-white rounded-[24px] border border-slate-200 shadow-md p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-slate-500 text-sm">Pastikan semua soal sudah dijawab sebelum mengirim.</p>
            <button type="button" onclick="confirmSubmit()" class="px-8 py-3 rounded-2xl bg-gradient-to-r from-blue-700 to-blue-500 text-white font-extrabold shadow-lg hover:from-blue-800 hover:to-blue-600 transition">
                <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Jawaban
            </button>
        </div>
    </form>
    @else
    <div class="bg-amber-50 border border-amber-200 rounded-[24px] p-6 text-center text-amber-700 font-semibold">
        Quiz ini belum memiliki soal.
    </div>
    @endif
</div>

@push('scripts')
<script>
function confirmSubmit() {
    if (confirm('Yakin ingin mengirim jawaban? Pastikan semua soal sudah dijawab.')) {
        document.getElementById('quizForm').submit();
    }
}
@if(!empty($quiz->durasi))
(function () {
    let remaining = {{ $quiz->durasi * 60 }};
    const display = document.getElementById('timerDisplay');
    function pad(n) { return String(n).padStart(2, '0'); }
    function tick() {
        remaining--;
        const h = Math.floor(remaining / 3600);
        const m = Math.floor((remaining % 3600) / 60);
        const s = remaining % 60;
        if (display) display.textContent = h > 0 ? `${pad(h)}:${pad(m)}:${pad(s)}` : `${pad(m)}:${pad(s)}`;
        if (remaining <= 60 && display) display.classList.add('text-red-600');
        if (remaining <= 0) {
            document.getElementById('autoSubmitted').value = '1';
            document.getElementById('quizForm').submit();
        }
    }
    setInterval(tick, 1000);
})();
@endif
</script>
@endpush
@endsection
