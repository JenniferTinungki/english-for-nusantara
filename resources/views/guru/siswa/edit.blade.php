@extends('layouts.guru')

@section('content')
<div class="page-shell">

    <div class="mb-4">
        <a href="{{ route('guru.siswa.index') }}" class="text-decoration-none text-muted small">
            ← Kembali ke Daftar Siswa
        </a>
        <h1 class="fw-bold mt-2" style="font-size:2rem;color:#102040;">Edit Data Siswa</h1>
        <p class="text-muted">Mengubah data: <strong class="text-primary">{{ $user->name }}</strong></p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger rounded-3 mb-4">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3 p-4 p-lg-5">
        <form action="{{ route('guru.siswa.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <h6 class="fw-bold text-muted text-uppercase small border-bottom pb-2 mb-4">Identitas Siswa</h6>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="fw-semibold mb-2">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="form-control rounded-3 @error('name') is-invalid @enderror"
                        placeholder="Nama lengkap siswa">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="fw-semibold mb-2">NIS</label>
                    <input type="text" name="nis" value="{{ old('nis', $user->nis) }}"
                        class="form-control rounded-3 @error('nis') is-invalid @enderror"
                        placeholder="Nomor Induk Siswa">
                    @error('nis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4">
                    <label class="fw-semibold mb-2">Kelas</label>
                    <input type="text" name="kelas" value="{{ old('kelas', $user->kelas) }}"
                        class="form-control rounded-3 @error('kelas') is-invalid @enderror"
                        placeholder="Contoh: 7A">
                    @error('kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4">
                    <label class="fw-semibold mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select rounded-3 @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 d-flex align-items-end pb-1">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $user->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="is_active">Akun Aktif</label>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-muted text-uppercase small border-bottom pb-2 mb-4 mt-2">Data Akun</h6>

            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <label class="fw-semibold mb-2">Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                        class="form-control rounded-3 @error('username') is-invalid @enderror"
                        placeholder="Username untuk login">
                    @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="fw-semibold mb-2">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="form-control rounded-3 @error('email') is-invalid @enderror"
                        placeholder="email@siswa.sch.id">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-12">
                    <p class="text-warning small bg-warning bg-opacity-10 rounded-2 px-3 py-2 d-inline-block border border-warning border-opacity-25">
                        <i class="fas fa-lock me-1"></i> Kosongkan password jika tidak ingin mengubahnya.
                    </p>
                </div>
                <div class="col-md-6">
                    <label class="fw-semibold mb-2">Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password"
                            class="form-control rounded-start-3 @error('password') is-invalid @enderror"
                            placeholder="Minimal 6 karakter">
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePass('password', 'icon1')">
                            <i id="icon1" class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label class="fw-semibold mb-2">Konfirmasi Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control rounded-start-3"
                            placeholder="Ulangi password baru">
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePass('password_confirmation', 'icon2')">
                            <i id="icon2" class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold">
                    <i class="fas fa-check-circle me-2"></i> Simpan Perubahan
                </button>
                <a href="{{ route('guru.siswa.index') }}" class="btn btn-light rounded-pill px-5 py-2 fw-bold">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function togglePass(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>
@endsection
