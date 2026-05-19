@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-800">Kelola Data Guru</h1>
            <p class="text-slate-500 mt-1">Manajemen akun seluruh guru.</p>
        </div>
        <a href="{{ route('admin.guru.create') }}"
           class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-2xl shadow-lg shadow-blue-200 transition-all active:scale-95">
            <i class="fas fa-plus mr-2"></i> Tambah Guru
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 border border-green-200 rounded-2xl text-green-700 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="glass-card p-5 rounded-3xl flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-xl">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Total Guru</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $totalGuru }}</h3>
            </div>
        </div>
        <div class="glass-card p-5 rounded-3xl flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-xl">
                <i class="fas fa-user-check"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Guru Aktif</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $guruAktif }}</h3>
            </div>
        </div>
    </div>

    <div class="glass-card p-6 rounded-3xl">
        <form action="{{ route('admin.guru.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4">
            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}"
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"
                           placeholder="Cari nama, email, atau username...">
                </div>
                <select name="status" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">Semua Status</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-6 py-2.5 bg-slate-800 text-white font-medium rounded-xl hover:bg-slate-900 transition-all">
                    Filter
                </button>
                @if(request()->anyFilled(['search', 'status']))
                    <a href="{{ route('admin.guru.index') }}" class="px-6 py-2.5 bg-slate-200 text-slate-700 font-medium rounded-xl hover:bg-slate-300 transition-all text-center">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <div class="glass-card rounded-3xl overflow-hidden">
        @if($guru->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Info Guru</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">Gender</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($guru as $g)
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-white flex items-center justify-center font-bold shadow-sm">
                                            {{ strtoupper(substr($g->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800">{{ $g->name }}</div>
                                            <div class="text-xs text-slate-500">{{ $g->email }}</div>
                                            <div class="text-xs text-slate-400">{{ $g->username ?? '-' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($g->jenis_kelamin)
                                        <span class="inline-block px-3 py-1 {{ $g->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' }} text-xs font-bold rounded-full">
                                            {{ $g->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </span>
                                    @else
                                        <span class="text-slate-400 text-xs">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($g->is_active)
                                        <span class="badge bg-success px-3 py-2 rounded-pill">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2 rounded-pill">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.guru.edit', $g->id) }}"
                                           class="w-8 h-8 flex items-center justify-center bg-amber-100 text-amber-600 rounded-lg hover:bg-amber-200 transition-colors" title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        <form action="{{ route('admin.guru.toggle-status', $g->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="w-8 h-8 flex items-center justify-center {{ $g->is_active ? 'bg-orange-100 text-orange-600 hover:bg-orange-200' : 'bg-green-100 text-green-600 hover:bg-green-200' }} rounded-lg transition-colors"
                                                title="{{ $g->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                <i class="fas {{ $g->is_active ? 'fa-ban' : 'fa-check' }} text-xs"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.guru.destroy', $g->id) }}" method="POST"
                                              onsubmit="return confirm('Yakin hapus guru {{ $g->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors" title="Hapus">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-6 border-t border-slate-100 bg-slate-50/30">
                {{ $guru->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="w-20 h-20 bg-slate-100 text-slate-300 rounded-full flex items-center justify-center text-4xl mx-auto mb-4">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h5 class="text-xl font-bold text-slate-800">Belum Ada Data Guru</h5>
                <p class="text-slate-500 mt-1">Tambahkan guru pertama untuk mulai mengelola data.</p>
                <a href="{{ route('admin.guru.create') }}" class="inline-block mt-6 px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 shadow-md">
                    + Tambah Guru
                </a>
            </div>
        @endif
    </div>
</div>
@endsection