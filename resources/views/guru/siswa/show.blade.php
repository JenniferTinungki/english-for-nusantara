@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="mb-4">
        <a href="{{ route('guru.siswa.index') }}" class="text-decoration-none text-muted small">
            ← Kembali ke Daftar Siswa
        </a>
        <h1 class="fw-bold mt-2" style="font-size:2rem;color:#102040;">Detail Siswa</h1>
    </div>

    <div class="row g-4">

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 p-4 text-center h-100">
                <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle bg-primary text-white fw-bold"
                    style="width:80px;height:80px;font-size:2rem;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <h5 class="fw-bold mb-0">{{ $user->name }}</h5>
                <p class="text-muted mb-3">{{ $user->email }}</p>
                @if($user->is_active)
                    <span class="badge bg-success px-3 py-2 rounded-pill mb-3">● Aktif</span>
                @else
                    <span class="badge bg-secondary px-3 py-2 rounded-pill mb-3">● Nonaktif</span>
                @endif
                <table class="table table-sm text-start mt-2">
                    <tr><td class="text-muted">NIS</td><td class="fw-semibold">{{ $user->nis ?: '-' }}</td></tr>
                    <tr><td class="text-muted">Username</td><td class="fw-semibold">{{ $user->username ?: '-' }}</td></tr>
                    <tr><td class="text-muted">Kelas</td><td class="fw-semibold">{{ $user->kelas ?: '-' }}</td></tr>
                    <tr>
                        <td class="text-muted">Jenis Kelamin</td>
                        <td class="fw-semibold">
                            @if($user->jenis_kelamin === 'L') Laki-laki
                            @elseif($user->jenis_kelamin === 'P') Perempuan
                            @else -
                            @endif
                        </td>
                    </tr>
                    <tr><td class="text-muted">Bergabung</td><td class="fw-semibold">{{ $user->created_at->format('d M Y') }}</td></tr>
                </table>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="row g-3 mb-4">
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold mb-2">Progress Materi</div>
                        @php $progress = $user->progress_materi; @endphp
                        <div class="fs-2 fw-bold {{ $progress >= 75 ? 'text-success' : ($progress >= 40 ? 'text-warning' : 'text-danger') }}">
                            {{ $progress }}%
                        </div>
                        <div class="progress mt-2" style="height:8px;">
                            <div class="progress-bar {{ $progress >= 75 ? 'bg-success' : ($progress >= 40 ? 'bg-warning' : 'bg-danger') }}"
                                style="width:{{ $progress }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold mb-2">Nilai Rata-rata</div>
                        @php $nilai = $user->nilai_rata_rata; @endphp
                        <div class="fs-2 fw-bold {{ $nilai !== null && $nilai >= 75 ? 'text-success' : ($nilai !== null && $nilai >= 50 ? 'text-warning' : 'text-danger') }}">
                            {{ $nilai !== null ? $nilai : '-' }}
                        </div>
                        <div class="text-muted small mt-1">dari Assessment, Quiz & Tugas</div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold">Assessment</div>
                        <div class="fs-3 fw-bold text-dark mt-1">{{ $user->assessmentResults->count() }}</div>
                        <div class="text-muted small">percobaan</div>
                        <div class="text-muted small mt-1">Rata²: <strong>{{ $user->assessmentResults->avg('final_score') ? round($user->assessmentResults->avg('final_score'), 1) : '-' }}</strong></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold">Quiz</div>
                        <div class="fs-3 fw-bold text-dark mt-1">{{ $user->quizAttempts->count() }}</div>
                        <div class="text-muted small">percobaan</div>
                        <div class="text-muted small mt-1">Rata²: <strong>{{ $user->quizAttempts->avg('score') ? round($user->quizAttempts->avg('score'), 1) : '-' }}</strong></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold">Tugas</div>
                        <div class="fs-3 fw-bold text-dark mt-1">{{ $user->tugasSubmits->count() }}</div>
                        <div class="text-muted small">dikumpulkan</div>
                        <div class="text-muted small mt-1">Rata²: <strong>{{ $user->tugasSubmits->whereNotNull('nilai')->avg('nilai') ? round($user->tugasSubmits->whereNotNull('nilai')->avg('nilai'), 1) : '-' }}</strong></div>
                    </div>
                </div>
            </div>

            @if($user->quizAttempts->count())
            <div class="card border-0 shadow-sm rounded-3 p-3 mb-3">
                <h6 class="fw-bold mb-3">Riwayat Quiz</h6>
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr><th>Quiz</th><th width="80">Skor</th><th width="80">Benar</th><th width="120">Tanggal</th></tr>
                        </thead>
                        <tbody>
                            @foreach($user->quizAttempts->take(5) as $attempt)
                            <tr>
                                <td>{{ $attempt->quiz->judul ?? '-' }}</td>
                                <td class="fw-bold {{ $attempt->score >= 75 ? 'text-success' : 'text-danger' }}">{{ $attempt->score }}</td>
                                <td class="text-muted">{{ $attempt->correct_answers }}/{{ $attempt->total_questions }}</td>
                                <td class="text-muted small">{{ $attempt->created_at->format('d M Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            @if($user->assessmentResults->count())
            <div class="card border-0 shadow-sm rounded-3 p-3 mb-3">
                <h6 class="fw-bold mb-3">Riwayat Assessment</h6>
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr><th>Assessment</th><th width="80">Skor</th><th width="80">Status</th><th width="120">Tanggal</th></tr>
                        </thead>
                        <tbody>
                            @foreach($user->assessmentResults->take(5) as $result)
                            <tr>
                                <td>{{ $result->assessment->title ?? '-' }}</td>
                                <td class="fw-bold {{ $result->final_score >= 75 ? 'text-success' : 'text-danger' }}">{{ $result->final_score }}</td>
                                <td>
                                    @if($result->final_score >= 75)
                                        <span class="badge bg-success">Lulus</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Lulus</span>
                                    @endif
                                </td>
                                <td class="text-muted small">{{ $result->created_at->format('d M Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            @if($user->tugasSubmits->count())
            <div class="card border-0 shadow-sm rounded-3 p-3">
                <h6 class="fw-bold mb-3">Riwayat Tugas</h6>
                <div class="table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr><th>Tugas</th><th width="80">Nilai</th><th width="120">Tanggal</th></tr>
                        </thead>
                        <tbody>
                            @foreach($user->tugasSubmits->take(5) as $submit)
                            <tr>
                                <td>{{ $submit->tugas->judul ?? '-' }}</td>
                                <td class="fw-bold {{ $submit->nilai !== null && $submit->nilai >= 75 ? 'text-success' : ($submit->nilai !== null ? 'text-danger' : 'text-muted') }}">
                                    {{ $submit->nilai ?? 'Belum dinilai' }}
                                </td>
                                <td class="text-muted small">{{ $submit->created_at->format('d M Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
