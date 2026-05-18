@extends('layouts.guest')

@section('title', 'Login - English for Nusantara')

@section('content')
<div class="min-h-screen w-full overflow-x-hidden bg-slate-100">
    <div class="grid min-h-screen lg:grid-cols-2">

        {{-- KIRI: Form Login --}}
        <div class="bg-slate-50 flex items-center justify-center px-6 py-8 sm:px-10 lg:px-14 xl:px-20">
            <div class="w-full max-w-md">

                {{-- Logo & Judul --}}
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center shadow-md border border-slate-200 overflow-hidden shrink-0">
                        <img src="{{ asset('images/kemendikbud.jpg') }}" alt="Logo" class="w-11 h-11 object-contain">
                    </div>
                    <div>
                        <h2 class="text-3xl font-extrabold text-blue-900 leading-tight">
                            English for <br>Nusantara
                        </h2>
                        <p class="text-sm text-slate-500 mt-1 leading-relaxed">
                            Platform pembelajaran interaktif berbasis Kurikulum Merdeka
                            untuk mendukung proses belajar Bahasa Inggris.
                        </p>
                    </div>
                </div>

                {{-- Heading --}}
                <div class="mb-8">
                    <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-3">
                        Selamat Datang Kembali
                    </h3>
                    <p class="text-slate-500 leading-relaxed">
                        Silakan masuk untuk mengakses materi, tugas, kuis, dan evaluasi
                        pembelajaran Bahasa Inggris.
                    </p>
                </div>

                {{-- Status & Error --}}
                @if (session('status'))
                    <div class="mb-4 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-800 mb-2">Email</label>
                        <input
                            id="email" type="email" name="email"
                            value="{{ old('email') }}" required autofocus autocomplete="username"
                            placeholder="Masukkan email anda"
                            class="w-full h-14 rounded-2xl border-2 border-slate-200 bg-slate-100 px-4 text-slate-800 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-800 mb-2">Password</label>
                        <div class="relative">
                            <input
                                id="password" type="password" name="password"
                                required autocomplete="current-password"
                                placeholder="Masukkan password"
                                class="w-full h-14 rounded-2xl border-2 border-slate-200 bg-slate-100 px-4 pr-12 text-slate-800 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            >
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-500 hover:text-blue-700 transition">
                                <span id="eyeIcon">👁</span>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-sm">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                        <label for="remember_me" class="text-slate-700 cursor-pointer">Ingat saya</label>
                    </div>

                    <button type="submit"
                        class="w-full h-14 rounded-2xl bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold text-base shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition duration-300">
                        Masuk ke Dashboard
                    </button>

                    <div class="text-center pt-1">
                        <a href="{{ route('landing') }}"
                            class="inline-flex items-center gap-2 text-slate-500 hover:text-blue-700 font-medium transition">
                            ← Kembali ke Beranda
                        </a>
                    </div>
                </form>

            </div>
        </div>

        {{-- KANAN: Gambar Dekoratif --}}
        <div class="relative hidden lg:flex items-center justify-center bg-gradient-to-b from-blue-950 via-blue-800 to-blue-700 p-8 xl:p-10 overflow-hidden">
            <div class="absolute -top-10 -right-10 w-56 h-56 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 w-56 h-56 bg-blue-300/10 rounded-full blur-3xl"></div>

            <div class="relative z-10 w-full max-w-2xl">
                <div class="mb-6 text-white">
                    <h3 class="text-2xl xl:text-3xl font-bold mb-2">Lingkungan Belajar</h3>
                    <p class="text-blue-100 leading-relaxed">
                        Belajar, berkembang, dan berprestasi bersama dalam suasana sekolah
                        yang aktif, kreatif, dan inspiratif.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @foreach(['login1.jpeg','login2.jpeg','login3.jpeg','login4.jpeg'] as $img)
                    <div class="overflow-hidden rounded-3xl border border-white/20 shadow-xl bg-white/10">
                        <img src="{{ asset('images/'.$img) }}" alt="Aktivitas sekolah"
                            class="w-full h-44 object-cover hover:scale-105 transition duration-500">
                    </div>
                    @endforeach
                </div>

                <div class="text-center text-white mt-8">
                    <h2 class="text-4xl font-extrabold mb-3">English for Nusantara</h2>
                    <p class="text-blue-100 text-lg leading-relaxed max-w-xl mx-auto">
                        Akses pembelajaran bahasa Inggris yang interaktif, modern,
                        dan berbasis budaya lokal melalui platform
                        <span class="font-bold text-yellow-300">English for Nusantara</span>.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.textContent = '🙈';
    } else {
        input.type = 'password';
        icon.textContent = '👁';
    }
}
</script>
@endsection