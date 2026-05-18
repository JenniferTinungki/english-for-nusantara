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

            {{-- TIPE SOAL --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Tipe Soal <span class="text-danger">*</span></label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="type_pg" value="pilihan_ganda"
                            {{ old('type', 'pilihan_ganda') === 'pilihan_ganda' ? 'checked' : '' }}
                            onchange="toggleTipe(this.value)">
                        <label class="form-check-label fw-semibold" for="type_pg">
                            Pilihan Ganda
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="type_essay" value="essay"
                            {{ old('type') === 'essay' ? 'checked' : '' }}
                            onchange="toggleTipe(this.value)">
                        <label class="form-check-label fw-semibold" for="type_essay">
                            Essay
                        </label>
                    </div>
                </div>
            </div>

            {{-- PERTANYAAN --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Pertanyaan <span class="text-danger">*</span></label>
                <textarea name="question" rows="3" class="form-control @error('question') is-invalid @enderror"
                    placeholder="Tulis pertanyaan di sini...">{{ old('question') }}</textarea>
                @error('question')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- PILIHAN GANDA --}}
            <div id="section_pg">
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
                        <option value="A" {{ old('correct_answer') === 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('correct_answer') === 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ old('correct_answer') === 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ old('correct_answer') === 'D' ? 'selected' : '' }}>D</option>
                    </select>
                    @error('correct_answer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- INFO ESSAY --}}
            <div id="section_essay" style="display:none;">
                <div class="alert alert-info rounded-3">
                    <i class="fas fa-info-circle me-2"></i>
                    Soal essay akan dinilai secara manual oleh guru setelah siswa mengumpulkan jawaban.
                </div>
            </div>

            <div class="d-flex flex-wrap gap-3">
                <button type="submit" class="btn-premium">Simpan Soal</button>
                <a href="{{ route('guru.assessment.show', $assessment->id) }}" class="btn-soft">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
function toggleTipe(value) {
    const pg = document.getElementById('section_pg');
    const essay = document.getElementById('section_essay');
    if (value === 'essay') {
        pg.style.display = 'none';
        essay.style.display = 'block';
    } else {
        pg.style.display = 'block';
        essay.style.display = 'none';
    }
}

// Jalankan saat halaman load
document.addEventListener('DOMContentLoaded', function() {
    const selected = document.querySelector('input[name="type"]:checked');
    if (selected) toggleTipe(selected.value);
});
</script>
@endsection
