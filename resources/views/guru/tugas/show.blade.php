@extends('layouts.guru')

@section('content')
<div class="page-shell">
    <div class="page-header">
        <h1>Detail Tugas</h1>
        <p>Lihat detail tugas, status, lampiran, dan submit siswa dalam satu halaman premium.</p>
    </div>

    @if(session('success'))
        <div class="glass-card-strong p-3 mb-4" style="border-left:5px solid #16a34a;">
            <strong style="color:#15803d;">{{ session('success') }}</strong>
        </div>
    @endif

    @if(session('error'))
        <div class="glass-card-strong p-3 mb-4" style="border-left:5px solid #ef4444;">
            <strong style="color:#b91c1c;">{{ session('error') }}</strong>
        </div>
    @endif

    <div class="glass-card-strong p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-start gap-4 mb-4">
            <div>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    @if(isset($tugas->is_active) && $tugas->is_active)
                        <span class="badge-premium-success">Aktif</span>
                    @elseif(isset($tugas->is_active))
                        <span class="badge-premium-secondary">Nonaktif</span>
                    @else
                        <span class="badge-premium-info">Tersedia</span>
                    @endif

                    @if(!empty($tugas->deadline))
                        <span class="badge-premium-warning">
                            Deadline {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y • H:i') }}
                        </span>
                    @endif
                </div>

                <h2 style="font-size: 2.1rem; font-weight: 800; margin-bottom: 8px;">
                    {{ $tugas->judul }}
                </h2>

                <p style="color:#6e7b91; font-size:1.03rem; margin-bottom:0;">
                    {{ $tugas->deskripsi ?: 'Tidak ada deskripsi tugas.' }}
                </p>
            </div>

            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('guru.tugas.edit', $tugas->id) }}" class="btn-premium">Edit Tugas</a>
                <a href="{{ route('guru.tugas.index') }}" class="btn-soft">Kembali</a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="glass-card p-4 h-100">
                    <h4 style="font-weight:800; margin-bottom:16px;">Informasi Tugas</h4>

                    <div class="d-flex flex-column gap-3">
                        <div>
                            <div style="color:#6e7b91; font-size:0.95rem;">Judul</div>
                            <div style="font-weight:700; color:#13233f;">{{ $tugas->judul }}</div>
                        </div>

                        <div>
                            <div style="color:#6e7b91; font-size:0.95rem;">Deadline</div>
                            <div style="font-weight:700; color:#13233f;">
                                @if(!empty($tugas->deadline))
                                    {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y • H:i') }}
                                @else
                                    -
                                @endif
                            </div>
                        </div>

                        <div>
                            <div style="color:#6e7b91; font-size:0.95rem;">Status</div>
                            <div style="font-weight:700; color:#13233f;">
                                @if(isset($tugas->is_active) && $tugas->is_active)
                                    Aktif
                                @elseif(isset($tugas->is_active))
                                    Nonaktif
                                @else
                                    Tersedia
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="glass-card p-4 h-100">
                    <h4 style="font-weight:800; margin-bottom:16px;">Lampiran</h4>

                    @if(!empty($tugas->file_materi))
                        <a href="{{ asset('storage/' . $tugas->file_materi) }}" target="_blank" class="btn-soft">
                            Lihat / Download File
                        </a>
                    @else
                        <p style="color:#6e7b91; margin:0;">Belum ada lampiran.</p>
                    @endif
                </div>
            </div>

            <div class="col-12">
                <div class="glass-card p-4">
                    <h4 style="font-weight:800; margin-bottom:16px;">Deskripsi Lengkap</h4>
                    <div style="color:#4b5a73; line-height:1.95;">
                        {!! nl2br(e($tugas->deskripsi ?: '-')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h2 class="section-title" style="font-size: 1.9rem; margin-bottom: 6px;">Submit Siswa</h2>
                <p class="section-subtitle">Pantau hasil pengumpulan dan beri nilai dengan lebih mudah.</p>
            </div>
        </div>

        @if(isset($submits) && count($submits))
            <div class="table-responsive">
                <table class="table align-middle submit-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Siswa</th>
                            <th>File</th>
                            <th>Keterangan</th>
                            <th>Nilai</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submits as $index => $submit)
                            <tr class="submit-row">
                                <td width="70">{{ $index + 1 }}</td>

                                <td width="220">
                                    <div class="judul-main">
                                        {{ $submit->siswa->name ?? 'Siswa' }}
                                    </div>
                                </td>

                                <td width="180">
                                    @if(!empty($submit->file))
                                        <a href="{{ asset('storage/' . $submit->file) }}" target="_blank" class="mini-btn blue">
                                            Lihat File
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    <div class="deskripsi-text">
                                        {{ $submit->keterangan ?: '-' }}
                                    </div>
                                </td>

                                <td width="140">
                                    @if(!is_null($submit->nilai))
                                        <span class="status-active">{{ $submit->nilai }}</span>
                                    @else
                                        <span class="status-off">Belum Dinilai</span>
                                    @endif
                                </td>

                                <td width="280">
                                    <form action="{{ route('guru.tugas.nilai', $submit->id) }}" method="POST" class="d-flex justify-content-end gap-2 flex-wrap">
                                        @csrf
                                        <input type="number" name="nilai" min="0" max="100"
                                               value="{{ old('nilai', $submit->nilai) }}"
                                               class="form-control"
                                               style="max-width:100px; min-height:44px;">

                                        <button type="submit" class="mini-btn blue">
                                            Simpan Nilai
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <tr style="height:14px;"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <h4 style="font-weight:800; margin-bottom:10px;">Belum Ada Submit</h4>
                <p style="margin:0;">Belum ada siswa yang mengumpulkan tugas ini.</p>
            </div>
        @endif
    </div>
</div>

<style>
.submit-table thead th{
    border:none;
    color:#7b879c;
    font-size:.92rem;
    font-weight:700;
    padding-bottom:18px;
}

.submit-table tbody td{
    border:none;
    padding:22px 16px;
    vertical-align:middle;
}

.submit-row{
    background:#fff;
    border-radius:24px;
    box-shadow:0 10px 30px rgba(0,0,0,.04);
    transition:.25s ease;
}

.submit-row:hover{
    transform:translateY(-2px);
    box-shadow:0 16px 35px rgba(36,81,230,.08);
}
</style>
@endsection