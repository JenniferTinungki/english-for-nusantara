@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    <div>
        <a href="{{ route('admin.guru.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors mb-2">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Guru
        </a>
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-800">Tambah Guru Baru</h1>
    </div>

    @if($errors->any())
        <div class="p-5 bg-red-50 border border-red-200 rounded-2xl text-red-600 shadow-sm">
            <ul class="list-disc pl-5 space-y-1 text-sm font-medium">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="glass-card p-6 md:p-8 rounded-3xl">
        <form action="{{ route('admin.guru.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                <div class="md:col-span-12">
                    <h6 class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100 pb-2 mb-1">
                        Identitas Guru
                    </h6>
                </div>

                <div class="md:col-span-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name"
                        class="w-full px-4 py-2.5 bg-slate-50 border @error('name') border-red-400 @else border-slate-200 @enderror rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none"
                        value="{{ old('name') }}" placeholder="Nama lengkap guru">
                    @error('name') <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="md:col-span-4 flex items-center md:items-end pb-1">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" id="is_active" value="1" class="sr-only peer" @checked(old('is_active', true))>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-semibold text-slate-700">Akun Aktif</span>
                    </label>
                </div>

                <div class="md:col-span-12 mt-4">
                    <h6 class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100 pb-2 mb-1">
                        Data Akun
                    </h6>
                </div>

                <div class="md:col-span-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Username</label>
                    <input type="text" name="username"
                        class="w-full px-4 py-2.5 bg-slate-50 border @error('username') border-red-400 @else border-slate-200 @enderror rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"
                        value="{{ old('username') }}" placeholder="Username untuk login">
                    @error('username') <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email"
                        class="w-full px-4 py-2.5 bg-slate-50 border @error('email') border-red-400 @else border-slate-200 @enderror rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"
                        value="{{ old('email') }}" placeholder="email@guru.sch.id">
                    @error('email') <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                            class="w-full pl-4 pr-12 py-2.5 bg-slate-50 border @error('password') border-red-400 @else border-slate-200 @enderror rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Minimal 6 karakter">
                        <button type="button" onclick="togglePassword('password', 'eye1')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-blue-600">
                            <i id="eye1" class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password') <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-6">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Konfirmasi Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full pl-4 pr-12 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"
                            placeholder="Ulangi password">
                        <button type="button" onclick="togglePassword('password_confirmation', 'eye2')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-blue-600">
                            <i id="eye2" class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

            </div>

            <div class="flex flex-col sm:flex-row gap-3 mt-10">
                <button type="submit" class="inline-flex justify-center items-center px-8 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all active:scale-95">
                    <i class="fas fa-save mr-2"></i> Simpan Guru
                </button>
                <a href="{{ route('admin.guru.index') }}" class="inline-flex justify-center items-center px-8 py-3 bg-slate-100 text-slate-700 font-semibold rounded-xl hover:bg-slate-200 transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword(inputId, iconId) {
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