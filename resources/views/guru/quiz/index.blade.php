@extends('layouts.guru')

@section('content')
<div class="page-shell">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="
                font-size:2.5rem;
                font-weight:800;
                letter-spacing:-1px;
                margin-bottom:8px;
                color:#102040;
            ">
                Kelola Quiz
            </h1>

            <p style="
                color:#6e7b91;
                font-size:1.05rem;
                margin:0;
                max-width:700px;
            ">
                Buat dan kelola quiz siswa dengan sistem modern dan premium.
            </p>
        </div>

        <a href="{{ route('guru.quiz.create') }}" class="btn-premium">
            + Tambah Quiz
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="glass-card-strong p-3 mb-4" style="border-left:5px solid #16a34a;">
            <strong style="color:#15803d;">
                {{ session('success') }}
            </strong>
        </div>
    @endif

    {{-- Statistik --}}
    <div class="row g-4 mb-4">

        <div class="col-md-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div class="text-muted fw-semibold">Total Quiz</div>
                <div class="display-6 fw-bold text-dark mt-2">
                    {{ $totalQuiz ?? 0 }}
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div class="text-muted fw-semibold">Quiz Aktif</div>
                <div class="display-6 fw-bold text-success mt-2">
                    {{ $quizAktif ?? 0 }}
                </div>
            </div>
        </div>

    </div>

    {{-- Table --}}
    <div class="glass-card-strong p-4 p-lg-5">

        @if($quizzes->count())

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="130">Tipe</th>
                            <th width="140">Status</th>
                            <th class="text-end" width="260">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($quizzes as $index => $quiz)
                            <tr>
                                <td>
                                    {{ $quizzes->firstItem() + $index }}
                                </td>

                                <td class="fw-bold text-dark">
                                    {{ $quiz->judul }}
                                </td>

                                <td class="text-muted">
                                    {{ \Illuminate\Support\Str::limit($quiz->deskripsi ?: '-', 90) }}
                                </td>

                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $quiz->tipe ?? 'quiz' }}
                                    </span>
                                </td>

                                <td>
                                    @if(isset($quiz->is_active) && $quiz->is_active)
                                        <span class="badge bg-success">
                                            Aktif
                                        </span>
                                    @elseif(isset($quiz->is_active))
                                        <span class="badge bg-secondary">
                                            Nonaktif
                                        </span>
                                    @else
                                        <span class="badge bg-primary">
                                            Tersedia
                                        </span>
                                    @endif
                                </td>

                                <td class="text-end">

                                    <a href="{{ route('guru.quiz.show', $quiz->id) }}"
                                       class="btn btn-sm btn-light rounded-pill px-3">
                                        Detail
                                    </a>

                                    <a href="{{ route('guru.quiz.edit', $quiz->id) }}"
                                       class="btn btn-sm btn-light rounded-pill px-3">
                                        Edit
                                    </a>

                                    <form action="{{ route('guru.quiz.destroy', $quiz->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin hapus quiz ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger rounded-pill px-3">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="mt-4">
                {{ $quizzes->links() }}
            </div>

        @else

            <div class="text-center py-5">
                <div style="font-size:3rem;">📝</div>

                <h4 class="fw-bold mt-3">
                    Belum Ada Quiz
                </h4>

                <p class="text-muted">
                    Tambahkan quiz pertama untuk mulai evaluasi siswa.
                </p>

                <a href="{{ route('guru.quiz.create') }}"
                   class="btn-premium mt-2">
                    + Tambah Quiz
                </a>
            </div>

        @endif

    </div>
</div>
@endsection