@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    <div>
        <a href="{{ route('admin.guru.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors mb-2">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Guru
        </a>
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-800">Detail Guru</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Profile Card --}}
        <div class="glass-card p-6 rounded-3xl flex flex-col items-center text-center">
            <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-white flex items-center justify-center text-4xl font-bold shadow-lg mb-4">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <h2 class="text-xl font-bold text-slate-800">{{ $user->name }}</h2>
            <p class="text-slate-500 text-sm mt-1">{{ $user->email }}</p>

            @if($user->is_active)
                <span class="mt-3 inline-block px-4 py-1.5 bg-green-100 text-green-700 text-xs font-bold rounded-full">
                    Akun Aktif
                </span>
            @else
                <span class="mt-3 inline-block px-4 py-1.5 bg-red-100 text-red-700 text-xs font-bold rounded-full">
                    Akun Nonaktif
                </span>
            @endif

            <div class="mt-6 w-full space-y-2">
                <a href="{{ route('admin.guru.edit', $user->id) }}"
                   class="w-full inline-flex justify-center items-center px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-all">
                    <i class="fas fa-edit mr-2"></i> Edit Data
                </a>

                <form action="{{ route('admin.guru.toggle-status', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="w-full inline-flex justify-center items-center px-6 py-2.5 {{ $user->is_active ? 'bg-orange-100 text-orange-700 hover:bg-orange-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }} font-semibold rounded-xl transition-all">
                        <i class="fas {{ $user->is_active ? 'fa-ban' : 'fa-check' }} mr-2"></i>
                        {{ $user->is_active ? 'Nonaktifkan Akun' : 'Aktifkan Akun' }}
                    </button>
                </form>

                <form action="{{ route('admin.guru.destroy', $user->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full inline-flex justify-center items-center px-6 py-2.5 bg-red-100 text-red-700 font-semibold rounded-xl hover:bg-red-200 transition-all">
                        <i class="fas fa-trash mr-2"></i> Hapus Guru
                    </button>
                </form>
            </div>
        </div>

        {{-- Detail Info --}}
        <div class="lg:col-span-2 glass-card p-6 rounded-3xl">
            <h3 class="text-lg font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">
                Informasi Lengkap
            </h3>

            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Nama Lengkap</p>
                        <p class="font-semibold text-slate-800">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Username</p>
                        <p class="font-semibold text-slate-800">{{ $user->username ?? '-' }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Email</p>
                        <p class="font-semibold text-slate-800">{{ $user->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Jenis Kelamin</p>
                        <p class="font-semibold text-slate-800">
                            @if($user->jenis_kelamin == 'L')
                                Laki-laki
                            @elseif($user->jenis_kelamin == 'P')
                                Perempuan
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Role</p>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full capitalize">
                            {{ $user->role }}
                        </span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Status</p>
                        @if($user->is_active)
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">Aktif</span>
                        @else
                            <span class="inline-block px-3 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-full">Nonaktif</span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Terdaftar</p>
                        <p class="font-semibold text-slate-800">{{ $user->created_at->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Terakhir Diupdate</p>
                        <p class="font-semibold text-slate-800">{{ $user->updated_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection