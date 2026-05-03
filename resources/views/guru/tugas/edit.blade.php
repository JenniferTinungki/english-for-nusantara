@extends('layouts.guru')

@section('content')
<div class="page-shell">
    <div class="page-header">
        <h1>Edit Tugas</h1>
        <p>Perbarui tugas agar tetap relevan, jelas, dan siap dibagikan ke siswa.</p>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <form action="{{ route('guru.tugas.update', $tugas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-12">
                    <label class="form-label">Judul Tugas</label>
                    <input type="text" name="judul" class="form-control"
                           value="{{ old('judul', $tugas->judul) }}"
                           placeholder="Contoh: Tugas Bahasa Inggris Bab 1">
                    @error('judul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="6" class="form-control"
                              placeholder="Tulis penjelasan tugas untuk siswa...">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Deadline</label>
                    <input type="datetime-local" name="deadline" class="form-control"
                           value="{{ old('deadline', !empty($tugas->deadline) ? \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d\TH:i') : '') }}">
                    @error('deadline')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Lampiran / File Materi</label>
                    <input type="file" name="file_materi" class="form-control">
                    @if(!empty($tugas->file_materi))
                        <small class="d-block mt-2">
                            <a href="{{ asset('storage/' . $tugas->file_materi) }}" target="_blank">
                                Lihat file saat ini
                            </a>
                        </small>
                    @endif
                    @error('file_materi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @if(isset($tugas->is_active))
                <div class="col-12">
                    <div class="form-check mt-2">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                               {{ $tugas->is_active ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="is_active">
                            Aktifkan tugas
                        </label>
                    </div>
                </div>
                @endif
            </div>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <button type="submit" class="btn-premium">Update Tugas</button>
                <a href="{{ route('guru.tugas.index') }}" class="btn-soft">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection