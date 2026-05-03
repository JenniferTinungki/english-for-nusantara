@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Utama')

@section('content')
<div class="space-y-6">

    {{-- HERO --}}
    <div class="glass-card rounded-3xl p-6 md:p-8">
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 items-center">
            <div class="xl:col-span-2">
                <p class="text-sm text-slate-500 mb-2">Sistem Pembelajaran Interaktif</p>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-3">
                    Selamat datang, {{ Auth::user()->name }} 👋
                </h1>
                <p class="text-slate-600 leading-7 max-w-3xl">
                    Dashboard ini digunakan untuk mengelola materi, memantau perkembangan konten pembelajaran,
                    dan melihat ringkasan sistem English for Nusantara secara menyeluruh.
                </p>
            </div>

            <div class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white rounded-3xl p-6 shadow-lg">
                <p class="text-sm text-blue-100 mb-1">Ringkasan Hari Ini</p>
                <h3 class="text-2xl font-bold mb-2">{{ now()->format('d F Y') }}</h3>
                <p class="text-sm text-blue-100 leading-6">
                    Pastikan materi, evaluasi, dan data pembelajaran selalu terbarui.
                </p>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="rounded-3xl p-6 text-white shadow-xl bg-gradient-to-r from-blue-600 to-indigo-600">
            <p class="text-sm text-blue-100 mb-2">Siswa</p>
            <h3 class="text-4xl font-bold">{{ $totalSiswa }}</h3>
            <p class="text-sm text-blue-100 mt-2">Jumlah akun siswa aktif</p>
        </div>

        <div class="rounded-3xl p-6 text-white shadow-xl bg-gradient-to-r from-emerald-500 to-teal-600">
            <p class="text-sm text-emerald-100 mb-2">Guru</p>
            <h3 class="text-4xl font-bold">{{ $totalGuru }}</h3>
            <p class="text-sm text-emerald-100 mt-2">Jumlah akun guru</p>
        </div>

        <div class="rounded-3xl p-6 text-white shadow-xl bg-gradient-to-r from-fuchsia-500 to-purple-600">
            <p class="text-sm text-fuchsia-100 mb-2">Materi</p>
            <h3 class="text-4xl font-bold">{{ $totalMateri }}</h3>
            <p class="text-sm text-fuchsia-100 mt-2">Konten pembelajaran tersedia</p>
        </div>

        <div class="rounded-3xl p-6 text-white shadow-xl bg-gradient-to-r from-amber-500 to-orange-500">
            <p class="text-sm text-amber-100 mb-2">Quiz</p>
            <h3 class="text-4xl font-bold">{{ $totalQuiz }}</h3>
            <p class="text-sm text-amber-100 mt-2">Evaluasi yang tersimpan</p>
        </div>
    </div>

    {{-- MENU UTAMA + STATUS --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2 glass-card rounded-3xl p-6 md:p-8">
            <div class="mb-5">
                <h2 class="text-2xl font-bold text-slate-800">Fitur Utama</h2>
                <p class="text-sm text-slate-500 mt-1">
                    Akses cepat ke fungsi inti pengelolaan sistem pembelajaran.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('admin.materi.index') }}"
                   class="bg-white rounded-3xl border border-slate-200 p-5 hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800 text-lg mb-1">Kelola Materi</h3>
                            <p class="text-sm text-slate-500">Menambah, mengubah, melihat, dan menghapus materi pembelajaran.</p>
                        </div>
                    </div>
                </a>

                <div class="bg-white rounded-3xl border border-slate-200 p-5">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800 text-lg mb-1">Data Pengguna</h3>
                            <p class="text-sm text-slate-500">Melihat dan mengatur akun siswa maupun guru.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-slate-200 p-5">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl">
                            <i class="fa-solid fa-file-circle-question"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800 text-lg mb-1">Quiz & Evaluasi</h3>
                            <p class="text-sm text-slate-500">Mengelola penilaian, quiz, dan evaluasi pembelajaran.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-slate-200 p-5">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800 text-lg mb-1">Laporan</h3>
                            <p class="text-sm text-slate-500">Memantau perkembangan penggunaan sistem dan konten belajar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6 md:p-8">
            <h2 class="text-xl font-bold text-slate-800 mb-4">Status Sistem</h2>

            <div class="space-y-4">
                <div class="bg-white rounded-2xl border border-slate-200 p-4">
                    <p class="text-xs text-slate-500 mb-1">Dashboard</p>
                    <p class="font-semibold text-emerald-600">Aktif dan berjalan normal</p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-4">
                    <p class="text-xs text-slate-500 mb-1">Konten Tersedia</p>
                    <p class="font-semibold text-slate-800">{{ $totalMateri }} materi pembelajaran</p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-4">
                    <p class="text-xs text-slate-500 mb-1">Total Pengguna</p>
                    <p class="font-semibold text-slate-800">{{ $totalSiswa + $totalGuru + 1 }} akun</p>
                </div>

                <div class="bg-blue-600 text-white rounded-3xl p-5">
                    <p class="text-sm text-blue-100">Catatan</p>
                    <h4 class="font-bold text-lg mt-1">Sistem Siap Digunakan</h4>
                    <p class="text-sm text-blue-100 mt-2 leading-6">
                        Pengelolaan materi sudah terhubung dengan dashboard dan dapat digunakan untuk pengembangan fitur berikutnya.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- MATERI TERBARU + RINGKASAN --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2 glass-card rounded-3xl p-6 md:p-8">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">Materi Terbaru</h2>
                    <p class="text-sm text-slate-500 mt-1">Konten pembelajaran terbaru yang tersedia di sistem.</p>
                </div>

                <a href="{{ route('admin.materi.index') }}"
                   class="px-4 py-2 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium">
                    Lihat Semua
                </a>
            </div>

            <div class="space-y-4">
                @forelse($materiTerbaru as $item)
                    <div class="bg-white rounded-2xl border border-slate-200 p-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex items-center gap-4">
                            @if($item->gambar)
                                <img src="{{ asset('gambar/' . $item->gambar) }}"
                                     alt="{{ $item->judul }}"
                                     class="w-16 h-16 object-cover rounded-2xl border">
                            @else
                                <div class="w-16 h-16 bg-slate-100 rounded-2xl border flex items-center justify-center text-xs text-slate-400">
                                    No Image
                                </div>
                            @endif

                            <div>
                                <h3 class="font-semibold text-slate-800">{{ $item->judul }}</h3>
                                <p class="text-sm text-slate-500">{{ $item->subjudul ?: 'Tanpa subjudul' }}</p>
                                <p class="text-xs text-blue-600 mt-1">Bab {{ $item->bab }}</p>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('admin.materi.show', $item->id) }}"
                               class="px-4 py-2 rounded-xl bg-green-500 hover:bg-green-600 text-white text-sm font-medium">
                                Lihat
                            </a>

                            <a href="{{ route('admin.materi.edit', $item->id) }}"
                               class="px-4 py-2 rounded-xl bg-amber-400 hover:bg-amber-500 text-white text-sm font-medium">
                                Edit
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 text-center text-slate-500">
                        Belum ada materi tersedia.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6 md:p-8">
            <h2 class="text-xl font-bold text-slate-800 mb-4">Ringkasan Pengelolaan</h2>

            <div class="space-y-4">
                <div class="bg-white rounded-2xl border border-slate-200 p-4">
                    <p class="font-semibold text-slate-800">Materi</p>
                    <p class="text-sm text-slate-500 mt-1">Konten belajar dapat diperbarui kapan saja dari panel admin.</p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-4">
                    <p class="font-semibold text-slate-800">Pengguna</p>
                    <p class="text-sm text-slate-500 mt-1">Akun siswa dan guru dapat dipantau melalui sistem terpusat.</p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-4">
                    <p class="font-semibold text-slate-800">Evaluasi</p>
                    <p class="text-sm text-slate-500 mt-1">Quiz dan assessment dapat dikembangkan sebagai fitur lanjutan.</p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-4">
                    <p class="font-semibold text-slate-800">Arah Pengembangan</p>
                    <p class="text-sm text-slate-500 mt-1">Dashboard ini siap diperluas menjadi sistem pembelajaran yang lebih lengkap.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection