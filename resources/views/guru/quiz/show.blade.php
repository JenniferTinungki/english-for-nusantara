@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="font-size:2.5rem;font-weight:800;letter-spacing:-1px;margin-bottom:8px;color:#102040;">
                Detail Quiz
            </h1>
            <p style="color:#6e7b91;font-size:1.05rem;margin:0;max-width:700px;">
                Lihat detail quiz dan kelola soal quiz.
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('guru.quiz.questions.create', $quiz->id) }}" class="btn-premium">
                + Tambah Soal
            </a>
            <a href="{{ route('guru.quiz.edit', $quiz->id) }}" class="btn btn-light rounded-pill px-4">
                Edit Quiz
            </a>
            <a href="{{ route('guru.quiz.index') }}" class="btn btn-light rounded-pill px-4">
                Kembali
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="glass-card-strong p-3 mb-4" style="border-left:5px solid #16a34a;">
            <strong style="color:#15803d;">{{ session('success') }}</strong>
        </div>
    @endif

    <div class="glass-card-strong p-4 p-lg-5 mb-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="glass-card p-4 h-100">
                    <div class="mb-3">
                        <div class="text-muted fw-semibold mb-2">Judul Quiz</div>
                        <h2 class="fw-bold text-dark mb-0">{{ $quiz->judul }}</h2>
                    </div>

                    <div>
                        <div class="text-muted fw-semibold mb-2">Deskripsi</div>
                        <div class="text-secondary" style="line-height:1.9;">
                            {{ $quiz->deskripsi ?: 'Tidak ada deskripsi quiz.' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-card p-4 h-100">
                    <div class="mb-4">
                        <div class="text-muted fw-semibold mb-2">Tipe</div>
                        <span class="badge bg-info text-dark px-3 py-2 rounded-pill">
                            {{ $quiz->tipe ?? 'quiz' }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <div class="text-muted fw-semibold mb-2">Status</div>
                        @if(isset($quiz->is_active) && $quiz->is_active)
                            <span class="badge bg-success px-3 py-2 rounded-pill">Aktif</span>
                        @elseif(isset($quiz->is_active))
                            <span class="badge bg-secondary px-3 py-2 rounded-pill">Nonaktif</span>
                        @else
                            <span class="badge bg-primary px-3 py-2 rounded-pill">Tersedia</span>
                        @endif
                    </div>

                    <div>
                        <div class="text-muted fw-semibold mb-2">Jumlah Soal</div>
                        <div class="fw-bold text-dark">{{ $quiz->questions->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-dark mb-1">Daftar Soal</h3>
                <p class="text-muted mb-0">Kelola soal pilihan ganda untuk quiz ini.</p>
            </div>
        </div>

        @if($quiz->questions->count())
            <div class="d-flex flex-column gap-3">
                @foreach($quiz->questions as $index => $question)
                    <div class="p-4 rounded-4 border bg-white shadow-sm">
                        <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap">
                            <div style="max-width: 800px;">
                                <div class="fw-bold text-primary mb-2">Soal {{ $index + 1 }}</div>
                                <div class="fw-semibold text-dark mb-3">{{ $question->question }}</div>

                                <div class="small text-secondary" style="line-height:1.9;">
                                    <div>A. {{ $question->option_a }}</div>
                                    <div>B. {{ $question->option_b }}</div>
                                    <div>C. {{ $question->option_c }}</div>
                                    <div>D. {{ $question->option_d }}</div>
                                </div>

                                <div class="mt-3">
                                    <span class="badge bg-success rounded-pill px-3 py-2">
                                        Jawaban benar: {{ strtoupper($question->correct_answer) }}
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('guru.quiz.questions.edit', [$quiz->id, $question->id]) }}"
                                   class="btn btn-sm btn-light rounded-pill px-3">
                                    Edit
                                </a>

                                <form action="{{ route('guru.quiz.questions.destroy', [$quiz->id, $question->id]) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus soal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div style="font-size:3rem;">❓</div>
                <h4 class="fw-bold mt-3">Belum Ada Soal</h4>
                <p class="text-muted">Tambahkan soal pertama untuk quiz ini.</p>
                <a href="{{ route('guru.quiz.questions.create', $quiz->id) }}" class="btn-premium mt-2">
                    + Tambah Soal
                </a>
            </div>
        @endif
    </div>
</div>
@endsection