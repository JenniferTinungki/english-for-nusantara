@extends('layouts.guru')

@section('content')
<div class="page-shell">
    <div class="page-header">
        <h1>Tambah Materi</h1>
        <p>Buat materi baru dengan isi pembelajaran yang lengkap dan tertata rapi.</p>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <form action="{{ route('guru.materi.store') }}" method="POST">
            @csrf

            <div class="row g-4">
                <div class="col-md-3">
                    <label class="form-label">Bab</label>
                    <input type="number" name="bab" class="form-control" value="{{ old('bab') }}">
                    @error('bab')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label">Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 1) }}">
                    @error('urutan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Durasi (menit)</label>
                    <input type="number" name="durasi" class="form-control" value="{{ old('durasi') }}">
                    @error('durasi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
                    @error('judul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Subjudul</label>
                    <input type="text" name="subjudul" class="form-control" value="{{ old('subjudul') }}">
                    @error('subjudul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="form-control">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Isi Materi</label>
                    <textarea name="isi_materi" rows="8" class="form-control">{{ old('isi_materi') }}</textarea>
                    @error('isi_materi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Link Video</label>
                    <input type="text" name="video" class="form-control" value="{{ old('video') }}" placeholder="https://youtube.com/...">
                    @error('video')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-check mt-2">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input" checked>
                        <label class="form-check-label fw-semibold" for="is_active">Aktifkan materi</label>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <button type="submit" class="btn-premium">Simpan Materi</button>
                <a href="{{ route('guru.materi.index') }}" class="btn-soft">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection