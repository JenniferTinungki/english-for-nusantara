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
                Tambah Assessment Baru
            </h1>
            <p class="text-white text-opacity-75 mb-0" style="max-width:620px; line-height:1.7;">
                Buat assessment yang lebih rapi, modern, dan siap digunakan oleh siswa.
                Lengkapi informasi dasar, pengaturan nilai, dan status publikasi.
            </p>
        </div>

        <div class="position-absolute top-0 end-0 p-4" style="max-width:240px;">
            <div class="bg-white bg-opacity-10 rounded-3 p-3 text-white">
                <div class="fw-bold mb-2" style="font-size:0.9rem;">Tips Cepat</div>
                <ul class="mb-0 ps-3" style="font-size:0.85rem; line-height:2; opacity:0.9;">
                    <li>Isi judul yang jelas</li>
                    <li>Hubungkan dengan materi</li>
                    <li>Atur deadline dan durasi</li>
                    <li>Tentukan passing score</li>
                </ul>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger rounded-3 mb-4">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('guru.assessment.store') }}" method="POST">
        @csrf

        {{-- Informasi Utama --}}
        <div class="glass-card-strong p-4 p-lg-5 mb-4">
            <h4 class="fw-800 mb-1" style="font-size:1.3rem;">Informasi Utama</h4>
            <p class="text-muted mb-4">Lengkapi data dasar assessment.</p>

            <div class="mb-4">
                <label class="form-label fw-semibold">Judul Assessment <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror"
                    placeholder="Contoh: Assessment Bab 1" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                    placeholder="Tulis deskripsi singkat tentang assessment ini...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label fw-semibold">Pilih Materi</label>
                <select name="materi_id" class="form-select form-select-lg @error('materi_id') is-invalid @enderror">
                    <option value="">-- Pilih Materi --</option>
                    @foreach($materi as $m)
                        <option value="{{ $m->id }}" {{ old('materi_id') == $m->id ? 'selected' : '' }}>
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
                    <input type="datetime-local" name="deadline"
                        class="form-control @error('deadline') is-invalid @enderror"
                        value="{{ old('deadline') }}">
                    @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Durasi (menit)</label>
                    <input type="number" name="duration"
                        class="form-control @error('duration') is-invalid @enderror"
                        placeholder="30" value="{{ old('duration', 30) }}" min="1" max="300">
                    @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Passing Score</label>
                    <input type="number" name="passing_score"
                        class="form-control @error('passing_score') is-invalid @enderror"
                        placeholder="75" value="{{ old('passing_score', 75) }}" min="0" max="100">
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
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" checked>
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
                                {{ old('shuffle_questions') ? 'checked' : '' }}>
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
                                {{ old('shuffle_answers') ? 'checked' : '' }}>
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
                            <input type="checkbox" name="show_result_immediately" id="show_result_immediately"
                                class="form-check-input" checked>
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
            <button type="submit" class="btn-premium">Simpan Assessment</button>
            <a href="{{ route('guru.assessment.index') }}" class="btn-soft">Kembali</a>
        </div>

    </form>
</div>
@endsection