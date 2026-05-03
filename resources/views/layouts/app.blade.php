<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'English for Nusantara')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family:'Poppins',sans-serif; background:linear-gradient(135deg,#f8fafc 0%,#eef2ff 100%); }
        .glass { background:rgba(255,255,255,.92); backdrop-filter:blur(18px); border:1px solid rgba(255,255,255,.35); box-shadow:0 10px 35px rgba(0,0,0,.07); }
        .sidebar-gradient { background:linear-gradient(180deg,#1d4ed8 0%,#1e3a8a 100%); }
        .top-gradient { background:linear-gradient(135deg,#1e40af 0%,#3b82f6 100%); }
        .fadein { animation:fade .35s ease; }
        @keyframes fade { from{opacity:0;transform:translateY(12px);} to{opacity:1;transform:translateY(0);} }
        #mobile-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:40; }
        #mobile-overlay.open { display:block; }
    </style>
</head>
<body class="min-h-screen text-slate-800 overflow-x-hidden">

<div id="mobile-overlay" onclick="closeSidebar()"></div>

<div class="min-h-screen flex">
    @auth
        @if(Auth::user()->role === 'siswa')
            @include('layouts.sidebar-siswa')
        @elseif(Auth::user()->role === 'guru')
            @include('layouts.sidebar-guru')
        @elseif(Auth::user()->role === 'admin')
            @include('layouts.sidebar-admin')
        @endif
    @endauth

    <div class="flex-1 min-h-screen lg:ml-[260px]">
        <header class="top-gradient sticky top-0 z-30 shadow-lg">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="h-20 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        @auth
                            <button onclick="openSidebar()" class="lg:hidden w-10 h-10 rounded-xl bg-white/15 text-white hover:bg-white/20 transition">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        @endauth
                        <div>
                            <h1 class="text-white text-xl md:text-2xl font-bold">English for Nusantara</h1>
                            <p class="text-blue-100 text-sm">SMP Negeri 8 Bitung</p>
                        </div>
                    </div>
                    @auth
                        <div class="flex items-center gap-3">
                            <div class="hidden md:block text-right">
                                <p class="text-white font-semibold leading-tight">{{ Auth::user()->name }}</p>
                                <p class="text-blue-100 text-sm capitalize">{{ Auth::user()->role }}</p>
                            </div>
                            <div class="w-11 h-11 rounded-full bg-white/20 text-white font-bold flex items-center justify-center">
                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </header>

        <main class="px-4 sm:px-6 lg:px-8 pt-0 pb-8 fadein" id="main-content">
            @if(session('success'))
                <div class="mb-4 px-4 py-3 rounded-xl bg-green-100 text-green-700">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 px-4 py-3 rounded-xl bg-red-100 text-red-700">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="mb-4 px-4 py-3 rounded-xl bg-red-100 text-red-700">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
<script>
function openSidebar() {
    document.querySelector('.sidebar-gradient') && document.querySelector('.sidebar-gradient').classList.add('translate-x-0');
    const sidebars = document.querySelectorAll('aside, nav[class*="fixed"]');
    sidebars.forEach(s => { s.style.transform = 'translateX(0)'; });
    document.getElementById('mobile-overlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeSidebar() {
    const sidebars = document.querySelectorAll('aside, nav[class*="fixed"]');
    sidebars.forEach(s => { s.style.transform = ''; });
    document.getElementById('mobile-overlay').classList.remove('open');
    document.body.style.overflow = '';
}
</script>
</body>
</html>