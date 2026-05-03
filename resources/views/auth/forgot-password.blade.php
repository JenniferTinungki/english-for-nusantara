@extends('layouts.guest')

@section('title', 'Lupa Password - English for Nusantara')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-slate-100 px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center border border-blue-100">
                <img src="{{ asset('images/kemendikbud.jpg') }}" alt="Logo" class="w-10 h-10 object-contain">
            </div>
        </div>

        <h2 class="text-2xl font-extrabold text-slate-900 text-center mb-2">Lupa Password?</h2>
        <p class="text-sm text-slate-500 text-center mb-6 leading-relaxed">
            Masukkan email kamu dan kami akan mengirimkan link untuk mereset password.
        </p>

        {{-- Status --}}
        @if (session('status'))
            <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('status') }}
            </div>
        @endif

        {{-- Error --}}
        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-semibold text-slate-800 mb-2">Email</label>
                <input
                    id="email" type="email" name="email"
                    value="{{ old('email') }}" required autofocus
                    placeholder="Masukkan email anda"
                    class="w-full h-12 rounded-xl border-2 border-slate-200 bg-slate-100 px-4 text-slate-800 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >
            </div>

            <button type="submit"
                class="w-full h-12 rounded-xl bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold text-sm shadow-md hover:shadow-lg hover:-translate-y-0.5 transition duration-300">
                Kirim Link Reset Password
            </button>

            <div class="text-center">
                <a href="{{ route('login') }}"
                    class="text-sm text-slate-500 hover:text-blue-700 font-medium transition">
                    ← Kembali ke Login
                </a>
            </div>
        </form>

    </div>
</div>
@endsection