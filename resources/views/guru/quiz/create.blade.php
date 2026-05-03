@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="glass-card-strong p-5 mx-auto" style="max-width:900px;">

        <h1 class="fw-bold mb-4 text-dark">
            Tambah Quiz Baru
        </h1>

        <form action="{{ route('guru.quiz.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label fw-semibold">Judul Quiz</label>
                <input type="text"
                       name="judul"
                       class="form-control form-control-lg"
                       value="{{ old('judul') }}"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          rows="5"
                          class="form-control">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Tipe</label>
                <select name="tipe" class="form-select">
                    <option value="quiz">Quiz</option>
                    <option value="latihan">Latihan</option>
                    <option value="ulangan">Ulangan</option>
                </select>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input"
                       type="checkbox"
                       name="is_active"
                       id="is_active"
                       checked>

                <label class="form-check-label" for="is_active">
                    Aktifkan Quiz
                </label>
            </div>

            <div class="d-flex gap-3">
                <button type="submit" class="btn-premium">
                    Simpan Quiz
                </button>

                <a href="{{ route('guru.quiz.index') }}"
                   class="btn btn-light rounded-pill px-4">
                    Kembali
                </a>
            </div>

        </form>
    </div>

</div>
@endsection