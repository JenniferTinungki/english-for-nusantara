@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="font-size:2.5rem;font-weight:800;letter-spacing:-1px;margin-bottom:8px;color:#102040;">
                Kelola Assessment
            </h1>
            <p style="color:#6e7b91;font-size:1.05rem;margin:0;max-width:700px;">
                Buat dan kelola assessment siswa dengan tampilan modern dan premium.
            </p>
        </div>

        <a href="{{ route('guru.assessment.create') }}" class="btn-premium">
            + Tambah Assessment
        </a>
    </div>

    @if(session('success'))
        <div class="glass-card-strong p-3 mb-4" style="border-left:5px solid #16a34a;">
            <strong style="color:#15803d;">{{ session('success') }}</strong>
        </div>
    @endif

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div class="text-muted fw-semibold">Total Assessment</div>
                <div class="display-6 fw-bold text-dark mt-2">{{ $totalAssessment ?? 0 }}</div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div class="text-muted fw-semibold">Assessment Aktif</div>
                <div class="display-6 fw-bold text-success mt-2">{{ $assessmentAktif ?? 0 }}</div>
            </div>
        </div>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        @if($assessments->count())
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="140">Status</th>
                            <th class="text-end" width="260">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assessments as $index => $assessment)
                            <tr>
                                <td>{{ $assessments->firstItem() + $index }}</td>
                                <td class="fw-bold text-dark">{{ $assessment->title }}</td>
                                <td class="text-muted">
                                    {{ \Illuminate\Support\Str::limit($assessment->description ?: '-', 90) }}
                                </td>
                                <td>
                                    @if(isset($assessment->is_active) && $assessment->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif(isset($assessment->is_active))
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @else
                                        <span class="badge bg-primary">Tersedia</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('guru.assessment.show', $assessment->id) }}"
                                       class="btn btn-sm btn-light rounded-pill px-3">
                                        Detail
                                    </a>

                                    <a href="{{ route('guru.assessment.edit', $assessment->id) }}"
                                       class="btn btn-sm btn-light rounded-pill px-3">
                                        Edit
                                    </a>

                                    <form action="{{ route('guru.assessment.destroy', $assessment->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin hapus assessment ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3">
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
                {{ $assessments->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <div style="font-size:3rem;">📝</div>
                <h4 class="fw-bold mt-3">Belum Ada Assessment</h4>
                <p class="text-muted">Tambahkan assessment pertama untuk mulai evaluasi siswa.</p>
                <a href="{{ route('guru.assessment.create') }}" class="btn-premium mt-2">
                    + Tambah Assessment
                </a>
            </div>
        @endif
    </div>
</div>
@endsection