@extends('layouts.guru')

@section('content')
<div class="page-shell">

    {{-- Header --}}
    <div class="position-relative overflow-hidden rounded-4 mb-5 p-5"
         style="background: linear-gradient(135deg, #1a56db 0%, #1e429f 100%); min-height: 200px;">
        <div class="position-relative z-1">
            <span class="badge bg-white bg-opacity-25 text-white fw-semibold px-3 py-2 rounded-pill mb-3 d-inline-block"
                  style="font-size:0.82rem; letter-spacing:1px;">
                ASSESSMENT BUILDER
            </span>
            <h1 class="fw-800 text-white mb-2" style="font-size:2.6rem; font-weight:800;">
                Edit Assessment
            </h1>
            <p class="text-white text-opacity-75 mb-0" style="max-width:620px; line-height:1.7;">
                Perbarui informasi assessment agar tetap relevan dan siap digunakan siswa.
            </p>
        </div>
    </div>

    <form action="{{ route('guru.assessment.update', $assessment->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Informasi Utama --}}
        <div class="glass-card-strong p-4 p-lg-5 mb-4">
            <h4 class="fw-800 mb-1" style="font-size:1.3rem;">Informasi Utama</h4>
            <p class="text-muted mb-4">Lengkapi data dasar assessment.</p>

            <div class="mb-4">
                <label class="form-label fw-semibold">Judul Assessment <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror"
                    placeholder="Contoh: Assessment Bab 1"
                    value="{{ old('title', $assessment->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                    placeholder="Tulis deskripsi singkat tentang assessment ini...">{{ old('description', $assessment->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label fw-semibold">Pilih Materi</label>
                <select name="materi_id" class="form-select form-select-lg @error('materi_id') is-invalid @enderror">
                    <option value="">-- Pilih Materi --</option>
                    @foreach($materi as $m)
                        <option value="{{ $m->id }}"
                            {{ old('materi_id', $assessment->materi_id) == $m->id ? 'selected' : '' }}>
                            Bab {{ $m->bab }} - {{ $m->judul }}
                        </option>
                    @endforeach
                </select>
                @error('materi_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Pengaturan Assessment --}}
        <div class="glass-card-strong p-4 p-lg-5 mb-4">
            <h4 class="fw-800 mb-1" style="font-size:1.3rem;">Pengaturan Assessment</h4>
            <p class="text-muted mb-4">Atur deadline, durasi, dan nilai minimal kelulusan.</p>

            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Deadline</label>
                    <input type="datetime-local" name="deadline" class="form-control @error('deadline') is-invalid @enderror"
                        value="{{ old('deadline', $assessment->deadline ? $assessment->deadline->format('Y-m-d\TH:i') : '') }}">
                    @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Durasi (menit)</label>
                    <input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror"
                        placeholder="30" value="{{ old('duration', $assessment->duration) }}" min="1" max="300">
                    @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Passing Score</label>
                    <input type="number" name="passing_score" class="form-control @error('passing_score') is-invalid @enderror"
                        placeholder="75" value="{{ old('passing_score', $assessment->passing_score) }}" min="0" max="100">
                    @error('passing_score')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Opsi Tambahan --}}
        <div class="glass-card-strong p-4 p-lg-5 mb-4">
            <h4 class="fw-800 mb-1" style="font-size:1.3rem;">Opsi Tambahan</h4>
            <p class="text-muted mb-4">Atur perilaku assessment saat digunakan siswa.</p>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                                {{ old('is_active', $assessment->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_active">
                                Aktifkan Assessment
                            </label>
                        </div>
                        <p class="text-muted mb-0 mt-1" style="font-size:0.88rem; padding-left:1.5rem;">
                            Assessment bisa dilihat dan dikerjakan siswa.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100">
                        <div class="form-check">
                            <input type="checkbox" name="shuffle_questions" id="shuffle_questions" class="form-check-input"
                                {{ old('shuffle_questions', $assessment->shuffle_questions) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="shuffle_questions">
                                Acak Urutan Soal
                            </label>
                        </div>
                        <p class="text-muted mb-0 mt-1" style="font-size:0.88rem; padding-left:1.5rem;">
                            Soal akan ditampilkan dengan urutan acak.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100">
                        <div class="form-check">
                            <input type="checkbox" name="shuffle_answers" id="shuffle_answers" class="form-check-input"
                                {{ old('shuffle_answers', $assessment->shuffle_answers) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="shuffle_answers">
                                Acak Opsi Jawaban
                            </label>
                        </div>
                        <p class="text-muted mb-0 mt-1" style="font-size:0.88rem; padding-left:1.5rem;">
                            Pilihan jawaban ditampilkan secara acak.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100">
                        <div class="form-check">
                            <input type="checkbox" name="show_result_immediately" id="show_result_immediately" class="form-check-input"
                                {{ old('show_result_immediately', $assessment->show_result_immediately) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="show_result_immediately">
                                Tampilkan Hasil Otomatis
                            </label>
                        </div>
                        <p class="text-muted mb-0 mt-1" style="font-size:0.88rem; padding-left:1.5rem;">
                            Nilai bisa langsung dilihat setelah submit.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap gap-3">
            <button type="submit" class="btn-premium">Update Assessment</button>
            <a href="{{ route('guru.assessment.show', $assessment->id) }}" class="btn-soft">Kembali</a>
        </div>

    </form>
</div>
@endsection