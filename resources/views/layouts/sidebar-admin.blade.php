<div>
    <div x-show="sidebarOpen"
         x-transition.opacity
         class="fixed inset-0 z-40 bg-slate-950/50 lg:hidden"
         @click="sidebarOpen = false"
         style="display: none;">
    </div>

    <aside
        class="fixed top-0 left-0 z-50 h-screen w-64 sidebar-gradient text-white shadow-2xl
               transform transition-transform duration-300 lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

        <div class="flex h-full flex-col">
            <div class="px-5 py-6 border-b border-white/10">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-2xl font-extrabold">Menu Admin</h2>
                        <p class="mt-1 text-sm text-blue-100">Kelola sistem</p>
                    </div>
                    <button @click="sidebarOpen = false"
                            class="lg:hidden flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 hover:bg-white/20 transition">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <div class="px-4 py-5 overflow-y-auto flex-1">
                <div class="mb-6 rounded-2xl bg-white/10 p-4 border border-white/10">
                    <div class="flex items-center gap-3">
                        <div class="h-12 w-12 rounded-full bg-white/20 flex items-center justify-center text-lg font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-bold text-white leading-tight">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-blue-100 capitalize">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                </div>

                <nav class="space-y-2">

                    {{-- Dashboard --}}
                    <a href="{{ url('/admin/dashboard') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 font-semibold transition
                       {{ request()->is('admin/dashboard') ? 'bg-white text-blue-700 shadow-lg' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <i class="fa-solid fa-house w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>

                    {{-- Kelola Materi --}}
                    <div x-data="{ open: {{ request()->routeIs('admin.materi.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open"
                            class="w-full flex items-center justify-between rounded-2xl px-4 py-3 font-semibold transition
                            {{ request()->routeIs('admin.materi.*') ? 'bg-white/20' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-book-open w-5 text-center"></i>
                                <span>Kelola Materi</span>
                            </div>
                            <i class="fa-solid fa-chevron-down transition-transform duration-300 text-xs"
                               :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-transition.opacity
                             class="pl-12 pr-4 py-2 space-y-3 mt-1"
                             style="display: none;">
                            <a href="{{ route('admin.materi.index') }}"
                               class="block text-sm transition-colors {{ request()->routeIs('admin.materi.index') ? 'text-white font-bold' : 'text-blue-200 hover:text-white' }}">
                                Daftar Materi
                            </a>
                            <a href="{{ route('admin.materi.create') }}"
                               class="block text-sm transition-colors {{ request()->routeIs('admin.materi.create') ? 'text-white font-bold' : 'text-blue-200 hover:text-white' }}">
                                Tambah Materi
                            </a>
                        </div>
                    </div>

                    {{-- Data Siswa --}}
                    <div x-data="{ open: {{ request()->routeIs('admin.users.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-3 rounded-2xl transition
                            {{ request()->routeIs('admin.users.*') ? 'bg-white/20' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-users w-5 text-center"></i>
                                <span>Data Siswa</span>
                            </div>
                            <i class="fa-solid fa-chevron-down transition-transform duration-300 text-xs"
                               :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" x-transition.opacity
                             class="pl-12 pr-4 py-2 space-y-3 mt-1"
                             style="display: none;">
                            <a href="{{ route('admin.users.index') }}"
                               class="block text-sm transition-colors {{ request()->routeIs('admin.users.index') ? 'text-white font-bold' : 'text-blue-200 hover:text-white' }}">
                                Daftar Siswa
                            </a>
                            <a href="{{ route('admin.users.create') }}"
                               class="block text-sm transition-colors {{ request()->routeIs('admin.users.create') ? 'text-white font-bold' : 'text-blue-200 hover:text-white' }}">
                                Tambah Siswa
                            </a>
                        </div>
                    </div>

                    {{-- Quiz & Evaluasi --}}
                    <div x-data="{ open: {{ request()->routeIs('admin.quiz-evaluasi.*') ? 'true' : 'false' }} }">
                        <a href="{{ route('admin.quiz-evaluasi.index') }}"
                            class="w-full flex items-center justify-between px-4 py-3 rounded-2xl transition
                            {{ request()->routeIs('admin.quiz-evaluasi.*') ? 'bg-white/20' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-list-check w-5 text-center"></i>
                                <span>Quiz & Evaluasi</span>
                            </div>
                            <i class="fa-solid fa-chevron-down transition-transform duration-300 text-xs cursor-pointer"
                               :class="open ? 'rotate-180' : ''"
                               @click.prevent="open = !open"></i>
                        </a>
                        <div x-show="open" x-transition.opacity
                             class="pl-12 pr-4 py-2 space-y-3 mt-1"
                             style="{{ request()->routeIs('admin.quiz-evaluasi.*') ? '' : 'display: none;' }}">
                            <a href="{{ route('admin.quiz-evaluasi.index') }}"
                               class="block text-sm transition-colors {{ request()->routeIs('admin.quiz-evaluasi.index') ? 'text-white font-bold' : 'text-blue-200 hover:text-white' }}">
                                Rekap Quiz
                            </a>
                            <a href="{{ route('admin.quiz-evaluasi.hasil') }}"
                               class="block text-sm transition-colors {{ request()->routeIs('admin.quiz-evaluasi.hasil') ? 'text-white font-bold' : 'text-blue-200 hover:text-white' }}">
                                Hasil Siswa
                            </a>
                            <a href="{{ route('admin.quiz-evaluasi.leaderboard') }}"
                               class="block text-sm transition-colors {{ request()->routeIs('admin.quiz-evaluasi.leaderboard') ? 'text-white font-bold' : 'text-blue-200 hover:text-white' }}">
                                🏆 Leaderboard
                            </a>
                        </div>
                    </div>

                    {{-- Laporan --}}
                    <a href="{{ url('/admin/laporan') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 font-semibold transition
                       {{ request()->is('admin/laporan*') ? 'bg-white text-blue-700 shadow-lg' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <i class="fa-solid fa-chart-bar w-5 text-center"></i>
                        <span>Laporan</span>
                    </a>

                </nav>

                <div class="mt-8 rounded-2xl bg-white/10 border border-white/10 p-4">
                    <p class="text-xs uppercase tracking-wider text-blue-100 mb-2">Ringkasan</p>
                    <p class="text-sm leading-6 text-white/90">
                        Admin dapat mengelola materi pembelajaran, memantau pengguna, dan menjaga sistem tetap rapi.
                    </p>
                </div>
            </div>

            <div class="p-4 border-t border-white/10">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center justify-center gap-2 rounded-2xl bg-red-500 hover:bg-red-600 text-white font-bold px-4 py-3 transition shadow-lg">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>
</div>