<div class="guru-sidebar">
    <div>
        {{-- BRAND --}}
        <div class="sidebar-brand">
            <h2>Menu Guru</h2>
            <p>Kelola pembelajaran</p>
        </div>

        {{-- PROFILE --}}
        <div class="guru-profile-card">
            <div class="guru-avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'G', 0, 1)) }}
            </div>
            <div>
                <h4>{{ Auth::user()->name ?? 'Guru' }}</h4>
                <span>{{ ucfirst(Auth::user()->role ?? 'guru') }}</span>
            </div>
        </div>

        {{-- MENU --}}
        <div class="sidebar-menu">
            <a href="{{ route('guru.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                <span class="sidebar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                </span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('guru.materi.index') }}"
               class="sidebar-link {{ request()->routeIs('guru.materi.*') ? 'active' : '' }}">
                <span class="sidebar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </span>
                <span>Materi</span>
            </a>

            <a href="{{ route('guru.tugas.index') }}"
               class="sidebar-link {{ request()->routeIs('guru.tugas.*') ? 'active' : '' }}">
                <span class="sidebar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                </span>
                <span>Tugas</span>
            </a>

            <a href="{{ route('guru.quiz.index') }}"
               class="sidebar-link {{ request()->routeIs('guru.quiz.*') ? 'active' : '' }}">
                <span class="sidebar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                </span>
                <span>Quiz</span>
            </a>

            <a href="{{ route('guru.assessment.index') }}"
               class="sidebar-link {{ request()->routeIs('guru.assessment.*') ? 'active' : '' }}">
                <span class="sidebar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </span>
                <span>Assessment</span>
            </a>

            <a href="{{ route('guru.siswa.index') }}"
               class="sidebar-link {{ request()->routeIs('guru.siswa.*') ? 'active' : '' }}">
                <span class="sidebar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </span>
                <span>Data Siswa</span>
            </a>

            <a href="{{ route('guru.penilaian.index') }}"
               class="sidebar-link {{ request()->routeIs('guru.penilaian.*') ? 'active' : '' }}">
                <span class="sidebar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                </span>
                <span>Penilaian</span>
            </a>

            <a href="{{ route('guru.progress.index') }}"
               class="sidebar-link {{ request()->routeIs('guru.progress.*') ? 'active' : '' }}">
                <span class="sidebar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                </span>
                <span>Monitoring Progress</span>
            </a>
        </div>

        {{-- INFO --}}
        <div class="sidebar-info">
            <div class="sidebar-info-title">Info Cepat</div>
            <p>Kelola materi, tugas, quiz, assessment, dan pantau perkembangan siswa dalam satu dashboard modern.</p>
        </div>
    </div>

    {{-- LOGOUT --}}
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</div>

<style>
    .guru-sidebar {
        width: 320px;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background:
            radial-gradient(circle at top left, rgba(255,255,255,0.15), transparent 26%),
            linear-gradient(180deg, #2451e6 0%, #1d43c9 55%, #1738ad 100%);
        padding: 28px 20px;
        color: #fff;
        overflow-y: auto;
        overflow-x: hidden;
        box-shadow: 8px 0 30px rgba(0,0,0,0.12);
    }

    .guru-sidebar::-webkit-scrollbar { width: 4px; }
    .guru-sidebar::-webkit-scrollbar-track { background: transparent; }
    .guru-sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 4px; }

    .sidebar-brand { margin-bottom: 26px; }
    .sidebar-brand h2 { margin: 0 0 6px; font-size: 2rem; font-weight: 800; letter-spacing: -0.5px; }
    .sidebar-brand p { margin: 0; color: rgba(255,255,255,0.75); font-size: 0.98rem; }

    .guru-profile-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: rgba(255,255,255,0.10);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 24px;
        padding: 18px 16px;
        margin-bottom: 24px;
        backdrop-filter: blur(8px);
    }

    .guru-avatar {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: rgba(255,255,255,0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        font-weight: 800;
        color: #fff;
        flex-shrink: 0;
    }

    .guru-profile-card h4 { margin: 0; font-size: 1.05rem; font-weight: 700; color: #fff; }
    .guru-profile-card span { font-size: 0.9rem; color: rgba(255,255,255,0.75); }

    .sidebar-menu { display: flex; flex-direction: column; gap: 6px; }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 15px 18px;
        border-radius: 20px;
        text-decoration: none;
        color: #fff;
        font-weight: 700;
        transition: all 0.25s ease;
        white-space: nowrap;
    }
    .sidebar-link:hover { background: rgba(255,255,255,0.10); color: #fff; transform: translateX(2px); }
    .sidebar-link.active { background: #ffffff; color: #2049da; box-shadow: 0 10px 24px rgba(0,0,0,0.10); }
    .sidebar-link.active .sidebar-icon svg { stroke: #2049da; }

    .sidebar-icon {
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .sidebar-icon svg { stroke: #fff; transition: stroke 0.25s; }

    .sidebar-info {
        margin-top: 26px;
        background: rgba(255,255,255,0.10);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 24px;
        padding: 18px;
    }
    .sidebar-info-title { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255,255,255,0.70); margin-bottom: 10px; }
    .sidebar-info p { margin: 0; line-height: 1.7; color: #fff; font-size: 0.96rem; }

    .logout-btn {
        width: 100%;
        border: none;
        border-radius: 20px;
        padding: 15px 18px;
        background: linear-gradient(135deg, #ff5b5b 0%, #ef4444 100%);
        color: #fff;
        font-weight: 800;
        font-size: 1rem;
        margin-top: 24px;
        box-shadow: 0 14px 24px rgba(239,68,68,0.22);
        cursor: pointer;
        transition: all 0.25s ease;
    }
    .logout-btn:hover { transform: translateY(-1px); box-shadow: 0 18px 28px rgba(239,68,68,0.28); }
</style>