<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - English for Nusantara')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 50%, #ecfeff 100%); min-height: 100vh; }
        .glass-card { background: rgba(255,255,255,0.78); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.55); box-shadow: 0 8px 32px 0 rgba(31,38,135,0.07); }
        .submenu { max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out; }
        .submenu.open { max-height: 200px; transition: max-height 0.5s ease-in; }
        .chevron-rotate { transition: transform 0.3s ease; }
        .rotate-180 { transform: rotate(180deg); }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        #admin-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:40; }
        #admin-overlay.open { display:block; }
    </style>
</head>
<body class="antialiased text-slate-800">

<div id="admin-overlay" onclick="closeSidebar()"></div>

<div class="flex min-h-screen">
    {{-- SIDEBAR --}}
    <aside id="adminSidebar" class="w-72 fixed inset-y-0 left-0 z-50 transition-transform duration-300 lg:translate-x-0 -translate-x-full lg:static">
        <div class="h-full glass-card m-4 rounded-[2.5rem] p-6 flex flex-col">

            {{-- BRANDING --}}
            <div class="flex items-center gap-3 px-2 mb-10">
                <div class="w-11 h-11 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <i class="fas fa-book-open text-white text-xl"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-extrabold text-slate-800 leading-tight">English for Nusantara</span>
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wider">Dashboard Pembelajaran</span>
                </div>
            </div>

            <nav class="flex-1 space-y-2 overflow-y-auto pr-2 custom-scrollbar">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[2px] px-4 mb-4">Main Menu Admin</p>

                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-600' }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : 'bg-slate-100' }}">
                        <i class="fas fa-th-large text-sm"></i>
                    </div>
                    <span class="font-medium">Dashboard</span>
                </a>

                {{-- Kelola Materi --}}
                <a href="{{ route('admin.materi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.materi.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-600' }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.materi.*') ? 'bg-white/20' : 'bg-slate-100' }}">
                        <i class="fas fa-folder-open text-sm"></i>
                    </div>
                    <span class="font-medium">Kelola Materi</span>
                </a>

                {{-- Data Siswa (Dropdown) --}}
                <div>
                    <button id="btn-data-siswa" class="w-full flex items-center justify-between px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-600' }}">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-blue-100' : 'bg-slate-100' }}">
                                <i class="fas fa-users text-sm"></i>
                            </div>
                            <span class="font-medium">Data Siswa</span>
                        </div>
                        <i class="fas fa-chevron-down text-[10px] chevron-rotate {{ request()->routeIs('admin.users.*') ? 'rotate-180' : '' }}"></i>
                    </button>
                    <div id="menu-data-siswa" class="submenu {{ request()->routeIs('admin.users.*') ? 'open' : '' }} pl-12 mt-1 space-y-1">
                        <a href="{{ route('admin.users.index') }}" class="block py-2 text-sm {{ request()->routeIs('admin.users.index') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600' }}">Daftar Siswa</a>
                        <a href="{{ route('admin.users.create') }}" class="block py-2 text-sm {{ request()->routeIs('admin.users.create') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600' }}">Tambah Siswa</a>
                    </div>
                </div>

                {{-- Data Guru (Dropdown) --}}
                <div>
                    <button id="btn-data-guru" class="w-full flex items-center justify-between px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.guru.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-600' }}">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.guru.*') ? 'bg-blue-100' : 'bg-slate-100' }}">
                                <i class="fas fa-chalkboard-teacher text-sm"></i>
                            </div>
                            <span class="font-medium">Data Guru</span>
                        </div>
                        <i class="fas fa-chevron-down text-[10px] chevron-rotate {{ request()->routeIs('admin.guru.*') ? 'rotate-180' : '' }}"></i>
                    </button>
                    <div id="menu-data-guru" class="submenu {{ request()->routeIs('admin.guru.*') ? 'open' : '' }} pl-12 mt-1 space-y-1">
                        <a href="{{ route('admin.guru.index') }}" class="block py-2 text-sm {{ request()->routeIs('admin.guru.index') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600' }}">Daftar Guru</a>
                        <a href="{{ route('admin.guru.create') }}" class="block py-2 text-sm {{ request()->routeIs('admin.guru.create') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600' }}">Tambah Guru</a>
                    </div>
                </div>

                {{-- Quiz & Evaluasi --}}
                <a href="{{ route('admin.quiz-evaluasi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.quiz-evaluasi.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-600' }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.quiz-evaluasi.*') ? 'bg-white/20' : 'bg-slate-100' }}">
                        <i class="fas fa-tasks text-sm"></i>
                    </div>
                    <span class="font-medium">Quiz & Evaluasi</span>
                </a>

                {{-- Laporan --}}
                <a href="{{ url('/admin/laporan') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->routeIs('admin.laporan.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-600' }}">
                    <div class="w-8 h-8 flex items-center justify-center rounded-lg {{ request()->routeIs('admin.laporan.*') ? 'bg-white/20' : 'bg-slate-100' }}">
                        <i class="fas fa-chart-pie text-sm"></i>
                    </div>
                    <span class="font-medium">Laporan</span>
                </a>
            </nav>

            {{-- Logout --}}
            <div class="mt-auto pt-6 border-t border-slate-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-red-500 hover:bg-red-50 transition-all">
                        <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50">
                            <i class="fas fa-sign-out-alt text-sm"></i>
                        </div>
                        <span class="font-medium">Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 p-4 lg:p-8 lg:ml-0">
        {{-- Topbar --}}
        <div class="flex items-center justify-between mb-8">
            <button onclick="openSidebar()" class="lg:hidden text-2xl text-slate-600">
                <i class="fas fa-bars"></i>
            </button>

            <div class="hidden lg:block relative w-96">
                <span class="absolute inset-y-0 left-4 flex items-center text-slate-400"><i class="fas fa-search"></i></span>
                <input type="text" placeholder="Cari materi atau siswa..." class="w-full pl-12 pr-4 py-3 bg-white/50 border border-white rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block leading-tight">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Waktu Sistem</p>
                    <p class="text-sm font-bold text-slate-700">{{ now()->translatedFormat('d F Y') }}</p>
                </div>
                <div class="flex items-center gap-3 bg-white px-3 py-2 rounded-2xl shadow-sm border border-slate-100 border-l-4 border-l-blue-600">
                    <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="leading-tight">
                        <p class="text-sm font-semibold">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-slate-500 uppercase font-bold">Administrator</p>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </main>
</div>

<script>
    function openSidebar() {
        document.getElementById('adminSidebar').style.transform = 'translateX(0)';
        document.getElementById('admin-overlay').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
        document.getElementById('adminSidebar').style.transform = '';
        document.getElementById('admin-overlay').classList.remove('open');
        document.body.style.overflow = '';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const btnSiswa = document.getElementById('btn-data-siswa');
        const menuSiswa = document.getElementById('menu-data-siswa');
        const chevron = btnSiswa.querySelector('.chevron-rotate');
        btnSiswa.addEventListener('click', function() {
            menuSiswa.classList.toggle('open');
            chevron.classList.toggle('rotate-180');
        });

        const btnGuru = document.getElementById('btn-data-guru');
        const menuGuru = document.getElementById('menu-data-guru');
        const chevronGuru = btnGuru.querySelector('.chevron-rotate');
        btnGuru.addEventListener('click', function() {
            menuGuru.classList.toggle('open');
            chevronGuru.classList.toggle('rotate-180');
        });
    });
</script>

</body>
</html>
