@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="page-header mb-4">
        <h1>Tambah Soal</h1>
        <p>Tambahkan soal baru untuk assessment: <strong>{{ $assessment->title }}</strong></p>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <form action="{{ route('guru.assessment.questions.store', $assessment->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label fw-semibold">Pertanyaan <span class="text-danger">*</span></label>
                <textarea name="question" rows="3" class="form-control @error('question') is-invalid @enderror"
                    placeholder="Tulis pertanyaan di sini...">{{ old('question') }}</textarea>
                @error('question')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan A <span class="text-danger">*</span></label>
                    <input type="text" name="option_a" class="form-control @error('option_a') is-invalid @enderror"
                        placeholder="Isi pilihan A" value="{{ old('option_a') }}">
                    @error('option_a')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan B <span class="text-danger">*</span></label>
                    <input type="text" name="option_b" class="form-control @error('option_b') is-invalid @enderror"
                        placeholder="Isi pilihan B" value="{{ old('option_b') }}">
                    @error('option_b')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan C <span class="text-danger">*</span></label>
                    <input type="text" name="option_c" class="form-control @error('option_c') is-invalid @enderror"
                        placeholder="Isi pilihan C" value="{{ old('option_c') }}">
                    @error('option_c')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan D <span class="text-danger">*</span></label>
                    <input type="text" name="option_d" class="form-control @error('option_d') is-invalid @enderror"
                        placeholder="Isi pilihan D" value="{{ old('option_d') }}">
                    @error('option_d')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Jawaban Benar <span class="text-danger">*</span></label>
                <select name="correct_answer" class="form-select @error('correct_answer') is-invalid @enderror">
                    <option value="">-- Pilih Jawaban Benar --</option>
                    <option value="a" {{ old('correct_answer') === 'a' ? 'selected' : '' }}>A</option>
                    <option value="b" {{ old('correct_answer') === 'b' ? 'selected' : '' }}>B</option>
                    <option value="c" {{ old('correct_answer') === 'c' ? 'selected' : '' }}>C</option>
                    <option value="d" {{ old('correct_answer') === 'd' ? 'selected' : '' }}>D</option>
                </select>
                @error('correct_answer')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex flex-wrap gap-3">
                <button type="submit" class="btn-premium">Simpan Soal</button>
                <a href="{{ route('guru.assessment.show', $assessment->id) }}" class="btn-soft">Kembali</a>
            </div>
        </form>
    </div>

</div>
@endsection