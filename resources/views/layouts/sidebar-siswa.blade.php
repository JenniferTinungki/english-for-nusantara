<div>
    <div x-show="sidebarOpen"
         x-transition.opacity
         class="fixed inset-0 z-40 bg-slate-950/50 lg:hidden"
         @click="sidebarOpen = false"
         style="display: none;">
    </div>

    <aside
        class="fixed top-0 left-0 z-50 h-screen w-full sm:w-64 sidebar-gradient text-white shadow-2xl
               transform transition-transform duration-300 lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

        <div class="flex h-full flex-col">
            <div class="px-5 py-6 border-b border-white/10">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-2xl font-extrabold">Menu Siswa</h2>
                        <p class="mt-1 text-sm text-blue-100">Belajar lebih interaktif</p>
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
                            @if(!empty(Auth::user()->nis))
                                <p class="text-xs text-blue-200 mt-1">NIS: {{ Auth::user()->nis }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('siswa.dashboard') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 font-semibold transition
                       {{ request()->routeIs('siswa.dashboard') ? 'bg-white text-blue-700 shadow-lg' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <i class="fa-solid fa-house w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('siswa.materi.index') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 font-semibold transition
                       {{ request()->routeIs('siswa.materi.*') ? 'bg-white text-blue-700 shadow-lg' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <i class="fa-solid fa-book-open w-5 text-center"></i>
                        <span>Materi Belajar</span>
                    </a>

                    <a href="{{ route('siswa.quiz.index') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 font-semibold transition
                       {{ request()->routeIs('siswa.quiz.*') ? 'bg-white text-blue-700 shadow-lg' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <i class="fa-solid fa-pen-to-square w-5 text-center"></i>
                        <span>Quiz</span>
                    </a>

                    <a href="{{ route('siswa.tugas.index') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 font-semibold transition
                       {{ request()->routeIs('siswa.tugas.*') ? 'bg-white text-blue-700 shadow-lg' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <i class="fa-solid fa-list-check w-5 text-center"></i>
                        <span>Tugas</span>
                    </a>

                    <a href="{{ route('siswa.assessment.index') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 font-semibold transition
                       {{ request()->routeIs('siswa.assessment.*') ? 'bg-white text-blue-700 shadow-lg' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <i class="fa-solid fa-clipboard-check w-5 text-center"></i>
                        <span>Assessment</span>
                    </a>

                    <a href="{{ route('siswa.progress.index') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 font-semibold transition
                       {{ request()->routeIs('siswa.progress.*') ? 'bg-white text-blue-700 shadow-lg' : 'text-white/90 hover:bg-white/10 hover:text-white' }}">
                        <i class="fa-solid fa-chart-line w-5 text-center"></i>
                        <span>Progress Belajar</span>
                    </a>
                </nav>
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