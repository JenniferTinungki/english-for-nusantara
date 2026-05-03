@extends('layouts.app')

@section('content')
<style>
    .progress-page {
        padding: 20px 24px 24px 6px;
    }

    .progress-title {
        font-size: 28px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 6px;
    }

    .progress-subtitle {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 24px;
    }

    .summary-card {
        border: none;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
    }

    .summary-label {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 6px;
        font-weight: 500;
    }

    .summary-value {
        font-size: 32px;
        font-weight: 700;
        margin: 0;
        line-height: 1.1;
    }

    .main-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        overflow: hidden;
    }

    .main-card .card-header {
        background: #ffffff;
        border-bottom: 1px solid #e2e8f0;
        padding: 20px 24px;
    }

    .main-card .card-body {
        padding: 24px;
    }

    .table-responsive {
        overflow-x: auto;
        overflow-y: hidden;
        padding-bottom: 6px;
        -webkit-overflow-scrolling: touch;
    }

    .table-responsive::-webkit-scrollbar {
        height: 6px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 999px;
    }

    .table-progress {
        width: 100%;
        table-layout: auto;
    }

    .table-progress thead th {
        font-size: 13px;
        font-weight: 700;
        color: #334155;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        white-space: nowrap;
        padding: 12px 10px;
        vertical-align: middle;
    }

    .table-progress tbody td {
        vertical-align: middle;
        padding: 14px 10px;
        border-color: #eef2f7;
        color: #1e293b;
        font-size: 13px;
    }

    .materi-title {
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 2px;
        line-height: 1.4;
        font-size: 13px;
    }

    .materi-desc {
        font-size: 12px;
        color: #64748b;
        margin-bottom: 0;
        line-height: 1.45;
    }

    .custom-badge {
        display: inline-block;
        border-radius: 999px;
        padding: 5px 10px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-belum   { background: #e2e8f0; color: #475569; }
    .badge-belajar { background: #dbeafe; color: #1d4ed8; }
    .badge-selesai { background: #dcfce7; color: #15803d; }

    .progress-wrap { min-width: 100px; }

    .progress {
        height: 8px;
        border-radius: 999px;
        background: #e2e8f0;
        overflow: hidden;
    }

    .progress-bar {
        border-radius: 999px;
    }

    .progress-text {
        margin-top: 4px;
        font-size: 11px;
        color: #64748b;
        text-align: right;
    }

    .date-col {
        white-space: nowrap;
        min-width: 90px;
    }

    .date-main {
        display: block;
        font-weight: 600;
        color: #1e293b;
        font-size: 12px;
        line-height: 1.3;
    }

    .date-sub {
        display: block;
        font-size: 11px;
        color: #64748b;
        line-height: 1.3;
        margin-top: 1px;
    }

    .empty-state {
        border: 1px dashed #cbd5e1;
        border-radius: 16px;
        padding: 32px;
        text-align: center;
        color: #64748b;
        background: #f8fafc;
    }

    @media (max-width: 768px) {
        .progress-page {
            padding: 16px;
        }
        .summary-value {
            font-size: 24px;
        }
        .main-card .card-body {
            padding: 12px;
        }
    }
</style>

<div class="progress-page">
    <div class="mb-4">
        <div class="progress-title">Progress Belajar</div>
        <div class="progress-subtitle">Pantau perkembangan belajar setiap materi dengan lebih rapi dan jelas.</div>
    </div>

    {{-- STAT CARDS --}}
    <div class="d-flex flex-wrap gap-3 mb-4">
        <div class="card summary-card flex-fill" style="min-width: 140px;">
            <div class="card-body">
                <div class="summary-label">Total Materi</div>
                <h2 class="summary-value text-dark">{{ $totalMateri }}</h2>
            </div>
        </div>
        <div class="card summary-card flex-fill" style="min-width: 140px;">
            <div class="card-body">
                <div class="summary-label">Sudah Dibuka</div>
                <h2 class="summary-value text-primary">{{ $openedMateri }}</h2>
            </div>
        </div>
        <div class="card summary-card flex-fill" style="min-width: 140px;">
            <div class="card-body">
                <div class="summary-label">Selesai</div>
                <h2 class="summary-value text-success">{{ $completedMateri }}</h2>
            </div>
        </div>
        <div class="card summary-card flex-fill" style="min-width: 140px;">
            <div class="card-body">
                <div class="summary-label">Progress Keseluruhan</div>
                <h2 class="summary-value text-info">{{ $overallPercent }}%</h2>
            </div>
        </div>
    </div>

    {{-- TABEL PROGRESS --}}
    <div class="card main-card">
        <div class="card-header">
            <h4 class="mb-0 fw-bold">Daftar Progress Materi</h4>
        </div>

        <div class="card-body">
            @if($progressData->isEmpty())
                <div class="empty-state">
                    Belum ada data materi untuk ditampilkan.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-progress align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width:40px;">No</th>
                                <th style="width:50px;">Bab</th>
                                <th style="min-width:200px;">Materi</th>
                                <th style="width:80px;">Durasi</th>
                                <th style="width:130px;">Status</th>
                                <th style="min-width:120px;">Progress</th>
                                <th style="width:100px;">Terakhir Dibuka</th>
                                <th style="width:100px;">Selesai Pada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($progressData as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['bab'] }}</td>

                                    <td>
                                        <div class="materi-title">{{ $item['judul'] }}</div>
                                        <p class="materi-desc">
                                            {{ $item['subjudul'] ?: ($item['deskripsi'] ?: '-') }}
                                        </p>
                                    </td>

                                    <td>{{ $item['durasi'] }} menit</td>

                                    <td>
                                        @if($item['percent'] == 100)
                                            <span class="custom-badge badge-selesai">Selesai</span>
                                        @elseif($item['percent'] > 0)
                                            <span class="custom-badge badge-belajar">Sedang Dipelajari</span>
                                        @else
                                            <span class="custom-badge badge-belum">Belum Dibuka</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="progress-wrap">
                                            <div class="progress">
                                                <div class="progress-bar
                                                        @if($item['percent'] == 100) bg-success
                                                        @elseif($item['percent'] > 0) bg-primary
                                                        @else bg-secondary @endif"
                                                    role="progressbar"
                                                    style="width: {{ $item['percent'] }}%"
                                                    aria-valuenow="{{ $item['percent'] }}"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="progress-text">{{ $item['percent'] }}%</div>
                                        </div>
                                    </td>

                                    <td class="date-col">
                                        @if($item['last_accessed_at'])
                                            <span class="date-main">{{ \Carbon\Carbon::parse($item['last_accessed_at'])->format('d-m-Y') }}</span>
                                            <span class="date-sub">{{ \Carbon\Carbon::parse($item['last_accessed_at'])->format('H:i') }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <td class="date-col">
                                        @if($item['completed_at'])
                                            <span class="date-main">{{ \Carbon\Carbon::parse($item['completed_at'])->format('d-m-Y') }}</span>
                                            <span class="date-sub">{{ \Carbon\Carbon::parse($item['completed_at'])->format('H:i') }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection