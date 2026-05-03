@extends('layouts.guru')

@section('content')
<div class="page-shell">
    <div class="page-header">
        <h1>Tambah Tugas</h1>
        <p>Buat tugas baru untuk siswa dengan tampilan form yang lebih rapi, premium, dan nyaman digunakan.</p>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <form action="{{ route('guru.tugas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <div class="col-12">
                    <label class="form-label">Judul Tugas</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" placeholder="Contoh: Tugas Bahasa Inggris Bab 1">
                    @error('judul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="6" class="form-control" placeholder="Tulis penjelasan tugas untuk siswa...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Deadline</label>
                    <input type="datetime-local" name="deadline" class="form-control"
                           value="{{ old('deadline') ? \Carbon\Carbon::parse(old('deadline'))->format('Y-m-d\TH:i') : '' }}">
                    @error('deadline')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Lampiran / File Materi</label>
                    <input type="file" name="file_materi" class="form-control">
                    @error('file_materi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-check mt-2">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input" checked>
                        <label class="form-check-label fw-semibold" for="is_active">
                            Aktifkan tugas
                        </label>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <button type="submit" class="btn-premium">Simpan Tugas</button>
                <a href="{{ route('guru.tugas.index') }}" class="btn-soft">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection