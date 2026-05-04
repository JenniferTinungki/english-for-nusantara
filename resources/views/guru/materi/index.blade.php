@extends('layouts.guru')

@section('content')
<div class="page-shell">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h1 style="
                font-size:2.4rem;
                font-weight:800;
                letter-spacing:-1px;
                margin-bottom:8px;
                color:#102040;
            ">
                Kelola Materi
            </h1>

            <p style="
                color:#6e7b91;
                font-size:1.05rem;
                margin:0;
            ">
                Atur materi pembelajaran dengan tampilan modern, rapi, dan profesional.
            </p>
        </div>

        <a href="{{ route('guru.materi.create') }}" class="btn-premium">
            + Tambah Materi
        </a>

    </div>


    {{-- Alert --}}
    @if(session('success'))
        <div class="glass-card-strong p-3 mb-4"
             style="border-left:5px solid #16a34a;">
            <strong style="color:#15803d;">
                {{ session('success') }}
            </strong>
        </div>
    @endif


    {{-- Main Card --}}
    <div class="glass-card-strong p-4 p-lg-5">

        @if($materis->count())

            <div class="table-responsive">

                <table class="table align-middle materi-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bab</th>
                            <th>Judul</th>
                            <th>Subjudul</th>
                            <th>Durasi</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($materis as $index => $materi)

                        <tr class="materi-row">

                            <td width="70">
                                {{ $materis->firstItem() + $index }}
                            </td>

                            <td width="120">
                                <div class="bab-badge">
                                    Bab {{ $materi->bab }}
                                </div>
                            </td>

                            <td width="260">
                                <div class="judul-main">
                                    {{ $materi->judul }}
                                </div>
                            </td>

                            <td>
                                <div class="subjudul-text">
                                    {{ $materi->subjudul ?: '-' }}
                                </div>
                            </td>

                            <td width="120">
                                <strong>
                                    {{ $materi->durasi ? $materi->durasi.' menit' : '-' }}
                                </strong>
                            </td>

                            <td width="130">
                                @if($materi->is_active)
                                    <span class="status-active">
                                        Aktif
                                    </span>
                                @else
                                    <span class="status-off">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td width="250">

                                <div class="d-flex justify-content-end gap-2 flex-wrap">

                                    <a href="{{ route('guru.materi.show',$materi->id) }}"
                                       class="mini-btn blue">
                                        Detail
                                    </a>

                                    <a href="{{ route('guru.materi.edit',$materi->id) }}"
                                       class="mini-btn white">
                                        Edit
                                    </a>

                                    <form action="{{ route('guru.materi.destroy',$materi->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus materi ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="mini-btn red">
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                        <tr style="height:14px;"></tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION MANUAL TANPA SVG --}}
            <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">
                @if($materis->onFirstPage())
                    <span class="btn btn-outline-secondary disabled">« Previous</span>
                @else
                    <a href="{{ $materis->previousPageUrl() }}" class="btn btn-outline-primary">« Previous</a>
                @endif

                <span class="text-muted">
                    Showing {{ $materis->firstItem() }} to {{ $materis->lastItem() }} of {{ $materis->total() }} results
                </span>

                @if($materis->hasMorePages())
                    <a href="{{ $materis->nextPageUrl() }}" class="btn btn-outline-primary">Next »</a>
                @else
                    <span class="btn btn-outline-secondary disabled">Next »</span>
                @endif
            </div>

        @else

            <div class="empty-state">

                <h4 style="font-weight:800; margin-bottom:10px;">
                    Belum Ada Materi
                </h4>

                <p style="margin-bottom:20px;">
                    Tambahkan materi pertama untuk mulai pembelajaran.
                </p>

                <a href="{{ route('guru.materi.create') }}"
                   class="btn-premium">
                    + Tambah Materi
                </a>

            </div>

        @endif

    </div>

</div>



<style>
.materi-table thead th{
    border:none;
    color:#7b879c;
    font-size:.92rem;
    font-weight:700;
    padding-bottom:18px;
}

.materi-table tbody td{
    border:none;
    padding:22px 16px;
    vertical-align:middle;
}

.materi-row{
    background:#fff;
    border-radius:24px;
    box-shadow:0 10px 30px rgba(0,0,0,.04);
    transition:.25s ease;
}

.materi-row:hover{
    transform:translateY(-2px);
    box-shadow:0 16px 35px rgba(36,81,230,.08);
}

.bab-badge{
    width:62px;
    height:62px;
    border-radius:18px;
    background:linear-gradient(135deg,#d9f2ff,#eefcff);
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:800;
    color:#0f766e;
    font-size:.92rem;
    text-align:center;
    line-height:1.2;
}

.judul-main{
    font-weight:800;
    font-size:1.15rem;
    color:#13233f;
}

.subjudul-text{
    color:#4c5a70;
    line-height:1.7;
    max-width:260px;
}

.status-active{
    background:#dcfce7;
    color:#15803d;
    padding:8px 16px;
    border-radius:999px;
    font-weight:700;
    font-size:.86rem;
}

.status-off{
    background:#f1f5f9;
    color:#475569;
    padding:8px 16px;
    border-radius:999px;
    font-weight:700;
    font-size:.86rem;
}

.mini-btn{
    border:none;
    text-decoration:none;
    padding:10px 16px;
    border-radius:14px;
    font-weight:700;
    font-size:.92rem;
    transition:.25s ease;
    cursor:pointer;
}

.mini-btn.blue{
    background:#eef4ff;
    color:#2451e6;
}

.mini-btn.white{
    background:#fff;
    color:#13233f;
    border:1px solid #e5e7eb;
}

.mini-btn.red{
    background:#fee2e2;
    color:#dc2626;
}

.mini-btn:hover{
    transform:translateY(-1px);
}

.empty-state{
    padding:70px 20px;
    text-align:center;
}
</style>

@endsection