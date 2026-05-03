@extends('layouts.app')

@section('title', 'Materi Pembelajaran')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- HERO SECTION --}}
    <section class="relative overflow-hidden rounded-[32px] bg-gradient-to-br from-slate-700 via-slate-600 to-slate-800 shadow-2xl mb-10">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(255,255,255,0.12),transparent_28%),radial-gradient(circle_at_top_right,rgba(250,204,21,0.18),transparent_22%)]"></div>

        <div class="relative grid lg:grid-cols-2 gap-8 p-6 lg:p-10 items-center">

            {{-- LEFT CONTENT --}}
            <div>

                {{-- LOGO --}}
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 rounded-2xl bg-white shadow-lg flex items-center justify-center overflow-hidden">
                        <img
                            src="{{ asset('images/kemendikbud.jpg') }}"
                            alt="Logo Kemendikbud"
                            class="w-14 h-14 object-contain"
                            onerror="this.style.display='none'"
                        >
                    </div>

                    <div>
                        <h2 class="text-white text-2xl font-extrabold">
                            English for Nusantara
                        </h2>
                        <p class="text-white/80">
                            SMP Negeri 8 Bitung
                        </p>
                    </div>
                </div>

                {{-- TITLE --}}
                <h1 class="text-white font-extrabold text-4xl md:text-5xl lg:text-6xl leading-tight tracking-tight mb-4">
                    Materi Pembelajaran
                    <span class="block text-yellow-400">
                        Bahasa Inggris
                    </span>
                </h1>

                {{-- DESCRIPTION --}}
                <p class="text-white/85 text-base md:text-lg leading-8 max-w-2xl mb-6">
                    Pilih chapter yang ingin dipelajari terlebih dahulu.
                    Setiap chapter berisi video pembelajaran, isi materi per bagian,
                    audio interaktif, dan pengalaman belajar yang lebih menyenangkan.
                </p>

                {{-- BUTTON DASHBOARD --}}
                <div class="flex flex-wrap gap-3 mb-4">

                    <a
                        href="{{ route('siswa.dashboard') }}"
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-white text-slate-800 font-bold shadow-lg hover:-translate-y-0.5 transition"
                    >
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali Dashboard
                    </a>

                </div>

                {{-- BADGES --}}
                <div class="flex flex-wrap gap-3">

                    <div class="px-5 py-3 rounded-2xl bg-white/10 border border-white/15 text-white font-semibold">
                        <i class="fa-solid fa-book-open mr-2"></i>
                        {{ $materi->count() }} Chapter
                    </div>

                    <div class="px-5 py-3 rounded-2xl bg-white/10 border border-white/15 text-white font-semibold">
                        <i class="fa-solid fa-circle-play mr-2"></i>
                        Video YouTube
                    </div>

                    <div class="px-5 py-3 rounded-2xl bg-white/10 border border-white/15 text-white font-semibold">
                        <i class="fa-solid fa-volume-high mr-2"></i>
                        Audio Interaktif
                    </div>

                </div>

            </div>

            {{-- RIGHT CONTENT --}}
            <div class="bg-white rounded-[28px] p-6 shadow-xl">

                <h3 class="text-slate-800 font-extrabold text-2xl mb-2">
                    Belajar Lebih Terarah
                </h3>

                <p class="text-slate-500 leading-8 mb-5">
                    Materi dibagi per chapter agar lebih rapi,
                    fokus, dan mudah dipelajari oleh siswa.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div class="rounded-3xl bg-blue-50 p-5">
                        <p class="text-slate-500 mb-2">Total Chapter</p>
                        <h4 class="text-4xl font-extrabold text-blue-600">
                            {{ count($materi) }}
                        </h4>
                    </div>

                    <div class="rounded-3xl bg-emerald-50 p-5">
                        <p class="text-slate-500 mb-2">Mode Belajar</p>
                        <h4 class="text-xl font-extrabold text-emerald-600 leading-8">
                            Interaktif & Menyenangkan
                        </h4>
                    </div>

                </div>

            </div>

        </div>
    </section>

    {{-- HEADER CHAPTER --}}
    <section class="mb-6 flex flex-col md:flex-row md:items-end md:justify-between gap-4">

        <div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">
                Daftar Chapter
            </h2>

            <p class="text-slate-500 mt-2">
                Pilih chapter untuk masuk ke materi pembelajaran.
            </p>
        </div>

        <div class="inline-flex items-center px-5 py-3 rounded-full bg-white border border-slate-200 shadow-md text-slate-700 font-bold">
            {{ count($materi) }} chapter tersedia
        </div>

    </section>

    {{-- CARD CHAPTER --}}
    <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @foreach($materi as $chapter)

            <div class="bg-white rounded-[28px] overflow-hidden border border-slate-200 shadow-lg hover:-translate-y-1 hover:shadow-2xl transition duration-300">

                {{-- COVER --}}
                <div class="relative h-56 bg-slate-700">

                    <img
                        src="{{ asset($chapter->gambar) }}"
                        alt="{{ $chapter->judul }}"
                        class="w-full h-full object-cover"
                        onerror="this.src='https://placehold.co/800x500?text=Chapter+Cover'"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 to-slate-800/10"></div>

                    <div class="absolute top-4 left-4 px-4 py-2 rounded-full bg-white/20 backdrop-blur-md border border-white/20 text-white text-sm font-bold">
                        Chapter {{ $chapter->bab }}
                    </div>

                </div>

                {{-- CONTENT --}}
                <div class="p-6">

                    <h3 class="text-2xl font-extrabold text-slate-800 mb-2">
                        {{ $chapter->judul }}
                    </h3>

                    <p class="text-slate-500 leading-8 min-h-[88px]">
                        {{ $chapter->subjudul ?? $chapter->deskripsi }}
                    </p>

                    <div class="mt-5 flex items-center justify-between gap-4">

                        <div class="text-slate-500 font-semibold text-sm">
                            <i class="fa-solid fa-layer-group mr-2"></i>

                            {{ $chapter->sub_materi_count ?? 5 }} Materi
                        </div>

                        <a
                            href="{{ route('siswa.materi.show', $chapter->id) }}"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold shadow-lg hover:shadow-xl"
                        >
                            Masuk Chapter
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </section>

</div>
@endsection