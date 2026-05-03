@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="glass-card-strong p-5 mx-auto" style="max-width:900px;">

        <h1 class="fw-bold mb-4 text-dark">
            Edit Quiz
        </h1>

        <form action="{{ route('guru.quiz.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label fw-semibold">Judul Quiz</label>
                <input type="text"
                       name="judul"
                       class="form-control form-control-lg"
                       value="{{ old('judul', $quiz->judul) }}"
                       required>
                @error('judul')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          rows="5"
                          class="form-control">{{ old('deskripsi', $quiz->deskripsi) }}</textarea>
                @error('deskripsi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Tipe</label>
                <select name="tipe" class="form-select">
                    <option value="quiz" {{ old('tipe', $quiz->tipe) == 'quiz' ? 'selected' : '' }}>Quiz</option>
                    <option value="latihan" {{ old('tipe', $quiz->tipe) == 'latihan' ? 'selected' : '' }}>Latihan</option>
                    <option value="ulangan" {{ old('tipe', $quiz->tipe) == 'ulangan' ? 'selected' : '' }}>Ulangan</option>
                </select>
                @error('tipe')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            @if(isset($quiz->is_active))
            <div class="form-check mb-4">
                <input class="form-check-input"
                       type="checkbox"
                       name="is_active"
                       id="is_active"
                       {{ $quiz->is_active ? 'checked' : '' }}>

                <label class="form-check-label" for="is_active">
                    Aktifkan Quiz
                </label>
            </div>
            @endif

            <div class="d-flex gap-3 flex-wrap">
                <button type="submit" class="btn-premium">
                    Update Quiz
                </button>

                <a href="{{ route('guru.quiz.show', $quiz->id) }}"
                   class="btn btn-light rounded-pill px-4">
                    Kembali
                </a>
            </div>

        </form>
    </div>

</div>
@endsection