@extends('layouts.guru')

@section('content')
<div class="page-shell">
    <div class="glass-card-strong p-5 mx-auto" style="max-width:1000px;">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h1 class="fw-bold mb-2 text-dark">Tambah Soal Quiz</h1>
                <p class="text-muted mb-0">Quiz: {{ $quiz->judul }}</p>
            </div>

            <a href="{{ route('guru.quiz.show', $quiz->id) }}"
               class="btn btn-light rounded-pill px-4">
                Kembali
            </a>
        </div>

        <form action="{{ route('guru.quiz.questions.store', $quiz->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label fw-semibold">Pertanyaan</label>
                <textarea name="question" rows="4" class="form-control" required>{{ old('question') }}</textarea>
                @error('question')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan A</label>
                    <input type="text" name="option_a" class="form-control" value="{{ old('option_a') }}" required>
                    @error('option_a')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan B</label>
                    <input type="text" name="option_b" class="form-control" value="{{ old('option_b') }}" required>
                    @error('option_b')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan C</label>
                    <input type="text" name="option_c" class="form-control" value="{{ old('option_c') }}" required>
                    @error('option_c')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan D</label>
                    <input type="text" name="option_d" class="form-control" value="{{ old('option_d') }}" required>
                    @error('option_d')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <label class="form-label fw-semibold">Jawaban Benar</label>
                <select name="correct_answer" class="form-select" required>
                    <option value="">-- Pilih Jawaban Benar --</option>
                    <option value="a" {{ old('correct_answer') == 'a' ? 'selected' : '' }}>A</option>
                    <option value="b" {{ old('correct_answer') == 'b' ? 'selected' : '' }}>B</option>
                    <option value="c" {{ old('correct_answer') == 'c' ? 'selected' : '' }}>C</option>
                    <option value="d" {{ old('correct_answer') == 'd' ? 'selected' : '' }}>D</option>
                </select>
                @error('correct_answer')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex gap-3 flex-wrap mt-4">
                <button type="submit" class="btn-premium">
                    Simpan Soal
                </button>

                <a href="{{ route('guru.quiz.show', $quiz->id) }}"
                   class="btn btn-light rounded-pill px-4">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection