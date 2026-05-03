@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="font-size:2.5rem;font-weight:800;letter-spacing:-1px;margin-bottom:8px;color:#102040;">
                Detail Assessment
            </h1>
            <p style="color:#6e7b91;font-size:1.05rem;margin:0;max-width:700px;">
                Lihat informasi dan kelola soal assessment.
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('guru.assessment.edit', $assessment->id) }}" class="btn-premium">
                Edit Assessment
            </a>
            <a href="{{ route('guru.assessment.index') }}" class="btn btn-light rounded-pill px-4">
                Kembali
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
    @endif

    {{-- Info Assessment --}}
    <div class="glass-card-strong p-4 p-lg-5 mb-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="glass-card p-4 h-100">
                    <div class="mb-3">
                        <div class="text-muted fw-semibold mb-2">Judul Assessment</div>
                        <h2 class="fw-bold text-dark mb-0">{{ $assessment->title }}</h2>
                    </div>
                    <div>
                        <div class="text-muted fw-semibold mb-2">Deskripsi</div>
                        <div class="text-secondary" style="line-height:1.9;">
                            {{ $assessment->description ?: 'Tidak ada deskripsi assessment.' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-card p-4 h-100">
                    <div class="mb-3">
                        <div class="text-muted fw-semibold mb-2">Status</div>
                        @if($assessment->is_active)
                            <span class="badge bg-success px-3 py-2 rounded-pill">Aktif</span>
                        @else
                            <span class="badge bg-secondary px-3 py-2 rounded-pill">Nonaktif</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <div class="text-muted fw-semibold mb-2">Durasi</div>
                        <div class="fw-bold text-dark">{{ $assessment->duration }} menit</div>
                    </div>
                    <div class="mb-3">
                        <div class="text-muted fw-semibold mb-2">Passing Score</div>
                        <div class="fw-bold text-dark">{{ $assessment->passing_score }}</div>
                    </div>
                    <div class="mb-3">
                        <div class="text-muted fw-semibold mb-2">Deadline</div>
                        <div class="fw-bold text-dark">
                            {{ $assessment->deadline ? $assessment->deadline->format('d/m/Y H:i') : '-' }}
                        </div>
                    </div>
                    <div>
                        <div class="text-muted fw-semibold mb-2">Materi</div>
                        <div class="fw-bold text-dark">{{ $assessment->materi->judul ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <form action="{{ route('guru.assessment.destroy', $assessment->id) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin hapus assessment ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger rounded-pill px-4">
                    Hapus Assessment
                </button>
            </form>
        </div>
    </div>

    {{-- Daftar Soal --}}
    <div class="glass-card-strong p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h3 style="font-size:1.6rem;font-weight:800;color:#102040;margin-bottom:4px;">
                    Daftar Soal
                </h3>
                <p style="color:#6e7b91;margin:0;">
                    Total {{ $assessment->questions->count() }} soal tersedia.
                </p>
            </div>
            <a href="{{ route('guru.assessment.questions.create', $assessment->id) }}" class="btn-premium">
                + Tambah Soal
            </a>
        </div>

        @if($assessment->questions->count())
            <div class="d-flex flex-column gap-3">
                @foreach($assessment->questions as $index => $question)
                    <div class="glass-card p-4">
                        <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap">
                            <div style="flex:1;">
                                <div class="fw-bold text-muted mb-2">Soal {{ $index + 1 }}</div>
                                <div class="fw-semibold text-dark mb-3" style="font-size:1.05rem;line-height:1.7;">
                                    {{ $question->question }}
                                </div>

                                <div class="row g-2">
                                    @foreach(['a','b','c','d'] as $opt)
                                        <div class="col-md-6">
                                            <div class="rounded-3 px-3 py-2 d-flex align-items-center gap-2
                                                {{ $question->correct_answer === $opt ? 'bg-success bg-opacity-10 border border-success' : 'bg-light border' }}">
                                                <span class="fw-bold {{ $question->correct_answer === $opt ? 'text-success' : 'text-muted' }}">
                                                    {{ strtoupper($opt) }}.
                                                </span>
                                                <span class="{{ $question->correct_answer === $opt ? 'text-success fw-semibold' : 'text-dark' }}">
                                                    {{ $question->{'option_' . $opt} }}
                                                </span>
                                                @if($question->correct_answer === $opt)
                                                    <span class="ms-auto badge bg-success">Benar</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('guru.assessment.questions.edit', [$assessment->id, $question->id]) }}"
                                   class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    Edit
                                </a>
                                <form action="{{ route('guru.assessment.questions.destroy', [$assessment->id, $question->id]) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus soal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 w-100">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="rounded-3 bg-warning bg-opacity-10 border border-warning text-warning-emphasis px-4 py-4 text-center fw-semibold">
                Belum ada soal. Klik <strong>+ Tambah Soal</strong> untuk menambahkan soal pertama.
            </div>
        @endif
    </div>

</div>
@endsection