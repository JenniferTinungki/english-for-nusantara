@extends('layouts.siswa')

@section('content')
<div class="container">
    <h1 class="mb-4">Kerjakan Assessment</h1>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h4>{{ $assessment->title }}</h4>
            <p class="mb-1"><strong>Durasi:</strong> {{ $assessment->duration }} menit</p>
            <p class="mb-0"><strong>Mulai:</strong> {{ $attempt->started_at ? $attempt->started_at->format('d M Y H:i') : '-' }}</p>
        </div>
    </div>

    @foreach($questions as $index => $question)
        @php
            $savedAnswer = $attempt->answers->firstWhere('question_id', $question->id);
        @endphp

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h5>Soal {{ $index + 1 }}</h5>
                <p>{{ $question->question }}</p>

                <form action="{{ route('siswa.assessment.saveAnswer', $assessment->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}">

                    @if($question->question_type === 'mcq' || $question->question_type === 'true_false')
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban_siswa" value="A"
                                {{ optional($savedAnswer)->jawaban_siswa == 'A' ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $question->option_a }}</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban_siswa" value="B"
                                {{ optional($savedAnswer)->jawaban_siswa == 'B' ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $question->option_b }}</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban_siswa" value="C"
                                {{ optional($savedAnswer)->jawaban_siswa == 'C' ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $question->option_c }}</label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="jawaban_siswa" value="D"
                                {{ optional($savedAnswer)->jawaban_siswa == 'D' ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $question->option_d }}</label>
                        </div>
                    @elseif($question->question_type === 'essay')
                        <div class="mb-3">
                            <textarea name="jawaban_siswa" class="form-control" rows="4">{{ optional($savedAnswer)->jawaban_siswa }}</textarea>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-outline-primary btn-sm">
                        Simpan Jawaban
                    </button>
                </form>
            </div>
        </div>
    @endforeach

    <form action="{{ route('siswa.assessment.submit', $assessment->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success"
            onclick="return confirm('Yakin ingin mengumpulkan assessment ini?')">
            Kumpulkan Assessment
        </button>
    </form>
</div>
@endsection