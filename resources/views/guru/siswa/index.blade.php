@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="font-size:2.5rem;font-weight:800;letter-spacing:-1px;margin-bottom:8px;color:#102040;">
                Data Siswa
            </h1>
            <p style="color:#6e7b91;font-size:1.05rem;margin:0;">
                Pantau data dan perkembangan seluruh siswa.
            </p>
        </div>
        <a href="{{ route('guru.siswa.create') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">
            <i class="fas fa-plus me-2"></i> Tambah Siswa
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3 mb-4">{{ session('success') }}</div>
    @endif

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center h-100">
                <div class="text-muted small fw-semibold mb-1">Total Siswa</div>
                <div class="fs-2 fw-bold text-primary">{{ $totalSiswa }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center h-100">
                <div class="text-muted small fw-semibold mb-1">Siswa Aktif</div>
                <div class="fs-2 fw-bold text-success">{{ $siswaAktif }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center h-100">
                <div class="text-muted small fw-semibold mb-1">Jumlah Kelas</div>
                <div class="fs-2 fw-bold text-info">{{ $kelasList->count() }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center h-100">
                <div class="text-muted small fw-semibold mb-1">Halaman</div>
                <div class="fs-2 fw-bold text-secondary">{{ $siswa->currentPage() }}/{{ $siswa->lastPage() }}</div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3 p-3 mb-4">
        <form method="GET" action="{{ route('guru.siswa.index') }}" class="row g-2 align-items-end">
            <div class="col-md-5">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="form-control rounded-pill" placeholder="Cari nama, NIS, username, atau email...">
            </div>
            <div class="col-md-3">
                <select name="kelas" class="form-select rounded-pill">
                    <option value="">Semua Kelas</option>
                    @foreach($kelasList as $kelas)
                        <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>
                            {{ $kelas }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="gender" class="form-select rounded-pill">
                    <option value="">Semua Gender</option>
                    <option value="L" {{ request('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ request('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4 w-100">Filter</button>
                @if(request()->anyFilled(['search','kelas','gender']))
                    <a href="{{ route('guru.siswa.index') }}" class="btn btn-light rounded-pill px-3">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <div class="card border-0 shadow-sm rounded-3 p-3">
        @if($siswa->count())
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Info Siswa</th>
                            <th>Kelas / Gender</th>
                            <th>Progress</th>
                            <th>Rata-rata Nilai</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $s)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle text-white fw-bold flex-shrink-0"
                                         style="width:42px;height:42px;font-size:1.1rem;background:#2563eb;">
                                        {{ strtoupper(substr($s->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $s->name }}</div>
                                        <div class="text-muted small">NIS: {{ $s->nis ?: '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-1 align-items-center">
                                    @if($s->kelas)
                                        <span class="badge bg-primary rounded-pill px-3">{{ $s->kelas }}</span>
                                    @endif
                                    @if($s->jenis_kelamin)
                                        <span class="badge rounded-pill px-3"
                                            style="{{ $s->jenis_kelamin === 'P' ? 'background:#ec4899;' : 'background:#06b6d4;' }} color:#fff;">
                                            {{ $s->jenis_kelamin }}
                                        </span>
                                    @endif
                                    @if(!$s->kelas && !$s->jenis_kelamin)
                                        <span class="text-muted small">-</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @php $progress = $s->progress_materi; @endphp
                                <div class="d-flex align-items-center gap-2">
                                    <div class="progress flex-grow-1" style="height:8px;min-width:80px;">
                                        <div class="progress-bar {{ $progress >= 75 ? 'bg-success' : ($progress >= 40 ? 'bg-warning' : 'bg-danger') }}"
                                             style="width:{{ $progress }}%"></div>
                                    </div>
                                    <span class="small fw-semibold">{{ $progress }}%</span>
                                </div>
                            </td>
                            <td>
                                @php $nilai = $s->nilai_rata_rata; @endphp
                                <span class="fw-bold {{ $nilai !== null && $nilai >= 75 ? 'text-success' : ($nilai !== null && $nilai >= 50 ? 'text-warning' : 'text-danger') }}">
                                    {{ $nilai !== null ? $nilai : 'Belum ada nilai' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('guru.siswa.show', $s->id) }}"
                                       class="btn btn-sm btn-light rounded-pill px-3">Detail</a>
                                    <a href="{{ route('guru.siswa.edit', $s->id) }}"
                                       class="btn btn-sm btn-warning rounded-pill px-3">Edit</a>
                                    <form action="{{ route('guru.siswa.destroy', $s->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin hapus siswa {{ $s->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                {{ $siswa->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <div style="font-size:3rem;">👨‍🎓</div>
                <h4 class="fw-bold mt-3">Tidak ada siswa ditemukan</h4>
                <p class="text-muted">Coba ubah filter atau tambah siswa baru.</p>
                <a href="{{ route('guru.siswa.create') }}" class="btn btn-primary rounded-pill px-4 mt-2">
                    + Tambah Siswa
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
