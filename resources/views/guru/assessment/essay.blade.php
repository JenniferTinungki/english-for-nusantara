@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="mb-4">
        <a href="{{ route('guru.assessment.show', $assessment->id) }}" class="text-decoration-none text-muted small">
            ← Kembali ke Detail Assessment
        </a>
        <h1 class="fw-bold mt-2" style="font-size:2rem;color:#102040;">Penilaian Essay</h1>
        <p class="text-muted">Assessment: <strong>{{ $assessment->title }}</strong></p>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
    @endif

    {{-- Statistik --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center">
                <div class="text-muted small fw-semibold mb-1">Total Soal Essay</div>
                <div class="fs-2 fw-bold text-warning">{{ $essayQuestions->count() }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center">
                <div class="text-muted small fw-semibold mb-1">Siswa yang Menjawab</div>
                <div class="fs-2 fw-bold text-primary">{{ $essayAnswers->count() }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center">
                <div class="text-muted small fw-semibold mb-1">Belum Dinilai</div>
                <div class="fs-2 fw-bold text-danger">
                    {{ $essayAnswers->flatten()->whereNull('nilai')->count() }}
                </div>
            </div>
        </div>
    </div>

    @if($essayAnswers->count() === 0)
        <div class="card border-0 shadow-sm rounded-3 p-5 text-center">
            <div style="font-size:3rem;">📝</div>
            <h4 class="fw-bold mt-3">Belum ada jawaban essay</h4>
            <p class="text-muted">Siswa belum mengumpulkan jawaban essay untuk assessment ini.</p>
        </div>
    @else
        @foreach($essayAnswers as $userId => $answers)
            @php $siswa = $answers->first()->user; @endphp
            <div class="card border-0 shadow-sm rounded-3 p-4 mb-4">

                {{-- Header Siswa --}}
                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                    <div class="d-flex align-items-center justify-content-center rounded-circle text-white fw-bold flex-shrink-0"
                         style="width:46px;height:46px;background:#2563eb;font-size:1.1rem;">
                        {{ strtoupper(substr($siswa->name ?? 'S', 0, 1)) }}
                    </div>
                    <div>
                        <div class="fw-bold text-dark">{{ $siswa->name ?? '-' }}</div>
                        <div class="text-muted small">
                            NIS: {{ $siswa->nis ?? '-' }} | Kelas: {{ $siswa->kelas ?? '-' }}
                        </div>
                    </div>
                    <div class="ms-auto">
                        @php $sudahDinilai = $answers->whereNotNull('nilai')->count(); @endphp
                        @if($sudahDinilai === $answers->count())
                            <span class="badge bg-success px-3 py-2">Semua Sudah Dinilai</span>
                        @else
                            <span class="badge bg-warning text-dark px-3 py-2">
                                {{ $sudahDinilai }}/{{ $answers->count() }} Dinilai
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Jawaban Essay --}}
                @foreach($answers as $answer)
                    <div class="border rounded-3 p-4 mb-3 {{ $answer->nilai !== null ? 'border-success' : 'border-warning' }}">
                        <div class="fw-semibold text-dark mb-3">
                            <span class="badge bg-secondary me-2">Soal {{ $loop->iteration }}</span>
                            {{ $answer->question->question ?? '-' }}
                        </div>

                        <div class="bg-light rounded-3 p-3 mb-3">
                            <div class="text-muted small fw-semibold mb-1">Jawaban Siswa:</div>
                            @if($answer->jawaban)
                                <div class="text-dark" style="line-height:1.7;">{{ $answer->jawaban }}</div>
                            @else
                                <em class="text-muted">Tidak dijawab</em>
                            @endif
                        </div>

                        @if($answer->nilai !== null)
                            <div class="d-flex gap-3 align-items-center mb-3 p-3 bg-success bg-opacity-10 rounded-3">
                                <div>
                                    <div class="text-muted small">Nilai</div>
                                    <div class="fw-bold fs-4 text-success">{{ $answer->nilai }}/100</div>
                                </div>
                                @if($answer->feedback)
                                    <div>
                                        <div class="text-muted small">Feedback</div>
                                        <div class="text-dark">{{ $answer->feedback }}</div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <form action="{{ route('guru.assessment.essay.nilai', $assessment->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="essay_id" value="{{ $answer->id }}">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-3">
                                    <label class="fw-semibold small mb-1">
                                        {{ $answer->nilai !== null ? 'Ubah Nilai' : 'Beri Nilai' }} (0-100)
                                    </label>
                                    <input type="number" name="nilai" min="0" max="100"
                                        value="{{ $answer->nilai }}"
                                        class="form-control rounded-3" required>
                                </div>
                                <div class="col-md-7">
                                    <label class="fw-semibold small mb-1">Feedback (opsional)</label>
                                    <input type="text" name="feedback"
                                        value="{{ $answer->feedback }}"
                                        class="form-control rounded-3"
                                        placeholder="Tulis feedback untuk siswa...">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary rounded-pill w-100 fw-bold">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
@endsection
