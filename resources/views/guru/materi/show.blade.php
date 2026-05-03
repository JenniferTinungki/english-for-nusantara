@extends('layouts.guru')

@section('content')
<div class="page-shell">
    <div class="page-header">
        <h1>Detail Materi</h1>
        <p>Lihat informasi lengkap dan kelola sub-materi pembelajaran.</p>
    </div>

    {{-- INFO MATERI --}}
    <div class="glass-card-strong p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-start gap-4 mb-4">
            <div>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span class="badge-premium-info">Bab {{ $materi->bab }}</span>
                    <span class="badge-premium-warning">Urutan {{ $materi->urutan }}</span>
                    @if($materi->is_active)
                        <span class="badge-premium-success">Aktif</span>
                    @else
                        <span class="badge-premium-secondary">Nonaktif</span>
                    @endif
                </div>
                <h2 style="font-size:2.1rem;font-weight:800;margin-bottom:8px;">{{ $materi->judul }}</h2>
                <p style="color:#6e7b91;font-size:1.05rem;margin-bottom:0;">{{ $materi->subjudul ?: '-' }}</p>
            </div>
            <div style="min-width:180px;">
                <div style="color:#6e7b91;font-size:0.95rem;">Durasi</div>
                <div style="font-size:1.35rem;font-weight:800;color:#13233f;">
                    {{ $materi->durasi ? $materi->durasi . ' menit' : '-' }}
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="glass-card p-4 h-100">
                    <h4 style="font-weight:800;margin-bottom:16px;">Deskripsi</h4>
                    <div style="color:#4b5a73;line-height:1.9;">{{ $materi->deskripsi ?: '-' }}</div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="glass-card p-4 h-100">
                    <h4 style="font-weight:800;margin-bottom:16px;">Media</h4>
                    <div>
                        <div style="color:#6e7b91;font-size:0.95rem;">Video</div>
                        @if($materi->video)
                            <a href="{{ $materi->video }}" target="_blank">{{ $materi->video }}</a>
                        @else
                            -
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="glass-card p-4">
                    <h4 style="font-weight:800;margin-bottom:16px;">Isi Materi</h4>
                    <div style="color:#4b5a73;line-height:1.95;">{!! nl2br(e($materi->isi_materi ?: '-')) !!}</div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap gap-3 mt-4">
            <a href="{{ route('guru.materi.index') }}" class="btn-soft">Kembali</a>
            <a href="{{ route('guru.materi.edit', $materi->id) }}" class="btn-premium">Edit Materi</a>
        </div>
    </div>

    {{-- SUB MATERI --}}
    <div class="glass-card-strong p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 style="font-weight:800;margin:0;">Sub Materi</h3>
            <button class="btn-premium" data-bs-toggle="modal" data-bs-target="#modalTambahSub">
                + Tambah Sub Materi
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-3 mb-3">{{ session('success') }}</div>
        @endif

        @if($materi->subMateri->count())
            <div class="row g-3">
                @foreach($materi->subMateri->sortBy('urutan') as $sub)
                    <div class="col-12">
                        <div class="glass-card p-4">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        @if($sub->icon)
                                            <span style="font-size:1.5rem;">{{ $sub->icon }}</span>
                                        @endif
                                        <h5 style="font-weight:700;margin:0;">{{ $sub->judul }}</h5>
                                        <span class="badge bg-secondary">{{ $sub->tipe }}</span>
                                        <span class="badge bg-light text-dark">Urutan {{ $sub->urutan }}</span>
                                    </div>
                                    @if($sub->deskripsi)
                                        <p style="color:#64748b;margin-bottom:12px;">{{ $sub->deskripsi }}</p>
                                    @endif

                                    {{-- ISI DETAIL --}}
                                    @if($sub->isiDetail->count())
                                        <div class="table-responsive mt-2">
                                            <table class="table table-sm table-bordered" style="font-size:13px;">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Label</th>
                                                        <th>Nilai</th>
                                                        <th>Arti</th>
                                                        <th>Warna</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($sub->isiDetail->sortBy('urutan') as $detail)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $detail->label }}</td>
                                                            <td>{{ $detail->nilai ?? '-' }}</td>
                                                            <td>{{ $detail->arti ?? '-' }}</td>
                                                            <td>
                                                                @if($detail->warna)
                                                                    <span class="badge" style="background:{{ $detail->warna }};">{{ $detail->warna }}</span>
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('guru.materi.detail.destroy', [$materi->id, $sub->id, $detail->id]) }}" method="POST"
                                                                    onsubmit="return confirm('Hapus item ini?')">
                                                                    @csrf @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <p class="text-muted" style="font-size:13px;">Belum ada isi detail.</p>
                                    @endif

                                    {{-- Form tambah isi detail --}}
                                    <button class="btn btn-sm btn-outline-primary mt-2"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#formDetail{{ $sub->id }}">
                                        + Tambah Isi Detail
                                    </button>
                                    <div class="collapse mt-2" id="formDetail{{ $sub->id }}">
                                        <form action="{{ route('guru.materi.detail.store', [$materi->id, $sub->id]) }}" method="POST">
                                            @csrf
                                            <div class="row g-2">
                                                <div class="col-md-3">
                                                    <input type="text" name="label" class="form-control form-control-sm" placeholder="Label *" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="nilai" class="form-control form-control-sm" placeholder="Nilai">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="arti" class="form-control form-control-sm" placeholder="Arti">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="warna" class="form-control form-control-sm" placeholder="Warna (hex)">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" name="urutan" class="form-control form-control-sm" placeholder="Urutan" value="0">
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="d-flex gap-2 flex-shrink-0">
                                    <button class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditSub{{ $sub->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('guru.materi.sub.destroy', [$materi->id, $sub->id]) }}" method="POST"
                                        onsubmit="return confirm('Hapus sub materi ini beserta semua isinya?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Edit Sub --}}
                    <div class="modal fade" id="modalEditSub{{ $sub->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Sub Materi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="{{ route('guru.materi.sub.update', [$materi->id, $sub->id]) }}" method="POST">
                                    @csrf @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Judul *</label>
                                            <input type="text" name="judul" class="form-control" value="{{ $sub->judul }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="3">{{ $sub->deskripsi }}</textarea>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label">Tipe</label>
                                                <input type="text" name="tipe" class="form-control" value="{{ $sub->tipe }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Icon (emoji)</label>
                                                <input type="text" name="icon" class="form-control" value="{{ $sub->icon }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Urutan</label>
                                                <input type="number" name="urutan" class="form-control" value="{{ $sub->urutan }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5 text-muted">
                <div style="font-size:3rem;">📚</div>
                <p class="mt-2">Belum ada sub materi. Klik "+ Tambah Sub Materi" untuk mulai.</p>
            </div>
        @endif
    </div>
</div>

{{-- Modal Tambah Sub Materi --}}
<div class="modal fade" id="modalTambahSub" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sub Materi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('guru.materi.sub.store', $materi->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul *</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Tipe</label>
                            <input type="text" name="tipe" class="form-control" placeholder="alphabet">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Icon (emoji)</label>
                            <input type="text" name="icon" class="form-control" placeholder="🔤">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Urutan</label>
                            <input type="number" name="urutan" class="form-control" value="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection