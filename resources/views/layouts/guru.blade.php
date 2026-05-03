<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Guru' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-main: #f4f7fb;
            --text-main: #13233f;
            --text-soft: #6e7b91;
            --card-bg: rgba(255,255,255,0.92);
            --card-border: rgba(255,255,255,0.7);
            --primary: #2451e6;
            --primary-dark: #1c41bc;
            --secondary: #5b4df1;
            --success: #16a34a;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #06b6d4;
            --shadow-soft: 0 14px 40px rgba(31, 54, 120, 0.08);
            --shadow-medium: 0 20px 45px rgba(31, 54, 120, 0.12);
            --radius-xl: 30px;
            --radius-lg: 24px;
            --radius-md: 18px;
            --radius-sm: 14px;
        }

        *, *::before, *::after { box-sizing: border-box; }

        html, body { margin: 0; padding: 0; height: 100%; }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background:
                radial-gradient(circle at top right, rgba(36,81,230,0.07), transparent 18%),
                linear-gradient(180deg, #f8fbff 0%, #f3f6fb 100%);
            color: var(--text-main);
        }

        .guru-app { display: flex; min-height: 100vh; }

        .guru-app-sidebar {
            width: 320px;
            min-width: 320px;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            height: 100vh;
            z-index: 100;
        }

        .guru-app-main { flex: 1; min-width: 0; padding: 28px; overflow-x: hidden; }

        .page-shell { max-width: 1360px; margin: 0 auto; }

        .glass-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            box-shadow: var(--shadow-soft);
            border-radius: var(--radius-xl);
            backdrop-filter: blur(14px);
        }
        .glass-card-strong {
            background: #fff;
            border: 1px solid rgba(19,35,63,0.05);
            box-shadow: var(--shadow-medium);
            border-radius: var(--radius-xl);
        }

        .section-title { font-size: 2rem; font-weight: 800; letter-spacing: -0.03em; margin-bottom: 8px; color: var(--text-main); }
        .section-subtitle { color: var(--text-soft); font-size: 1.02rem; line-height: 1.8; margin-bottom: 0; }
        .page-header { margin-bottom: 24px; }
        .page-header h1 { font-size: 2.35rem; font-weight: 800; letter-spacing: -0.04em; margin: 0 0 8px; }
        .page-header p { margin: 0; color: var(--text-soft); font-size: 1.04rem; line-height: 1.8; }

        .btn-premium {
            display: inline-flex; align-items: center; justify-content: center; gap: 10px;
            border: none; text-decoration: none; border-radius: 18px; padding: 14px 22px;
            background: linear-gradient(135deg, #2451e6 0%, #5b4df1 100%);
            color: #fff; font-weight: 700; box-shadow: 0 18px 28px rgba(36,81,230,0.18); transition: all 0.25s ease;
        }
        .btn-premium:hover { color: #fff; transform: translateY(-1px); }
        .btn-soft {
            display: inline-flex; align-items: center; justify-content: center; gap: 10px;
            border: 1px solid rgba(36,81,230,0.12); text-decoration: none; border-radius: 18px; padding: 14px 22px;
            background: #fff; color: var(--primary); font-weight: 700; transition: all 0.25s ease;
        }
        .btn-soft:hover { color: var(--primary-dark); background: #f7f9ff; }
        .btn-danger-soft {
            display: inline-flex; align-items: center; justify-content: center;
            border: none; border-radius: 14px; padding: 10px 16px;
            background: rgba(239,68,68,0.10); color: var(--danger); font-weight: 700; transition: 0.25s ease;
        }
        .btn-danger-soft:hover { background: rgba(239,68,68,0.16); color: var(--danger); }

        .form-label { font-weight: 700; color: var(--text-main); margin-bottom: 10px; }
        .form-control, .form-select, textarea.form-control {
            border-radius: 16px; border: 1px solid rgba(19,35,63,0.10);
            padding: 14px 16px; min-height: 52px; box-shadow: none !important;
        }
        textarea.form-control { min-height: auto; }
        .form-control:focus, .form-select:focus, textarea.form-control:focus {
            border-color: rgba(36,81,230,0.35);
            box-shadow: 0 0 0 4px rgba(36,81,230,0.08) !important;
        }

        .table-premium { margin-bottom: 0; }
        .table-premium thead th { border: none; color: var(--text-soft); font-size: 0.92rem; font-weight: 700; padding: 0 16px 16px; }
        .table-premium tbody td { border: none; padding: 18px 16px; vertical-align: middle; }
        .table-premium tbody tr { background: #fff; transition: 0.2s ease; }
        .table-premium tbody tr:hover { background: #f8fbff; }
        .table-row-card { border: 1px solid rgba(19,35,63,0.05); border-radius: 22px; box-shadow: 0 8px 24px rgba(31,54,120,0.04); }

        .badge-premium-success, .badge-premium-secondary, .badge-premium-warning, .badge-premium-info {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 8px 14px; border-radius: 999px; font-weight: 700; font-size: 0.86rem;
        }
        .badge-premium-success  { background: rgba(22,163,74,0.12); color: #15803d; }
        .badge-premium-secondary{ background: rgba(100,116,139,0.12); color: #475569; }
        .badge-premium-warning  { background: rgba(245,158,11,0.14); color: #b45309; }
        .badge-premium-info     { background: rgba(6,182,212,0.14); color: #0f766e; }

        .empty-state { padding: 36px 24px; text-align: center; color: var(--text-soft); background: #f8fbff; border: 1px dashed rgba(36,81,230,0.16); border-radius: 24px; }

        /* Mobile topbar */
        .mobile-topbar {
            display: none;
            background: #2451e6;
            padding: 12px 18px;
            align-items: center;
            gap: 12px;
            position: sticky;
            top: 0;
            z-index: 997;
            width: 100%;
        }
        .mobile-topbar button {
            background: none;
            border: none;
            color: #fff;
            font-size: 1.6rem;
            cursor: pointer;
            line-height: 1;
        }
        .mobile-topbar span {
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
        }

        /* Mobile overlay */
        .mobile-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.45);
            z-index: 998;
        }
        .mobile-overlay.open { display: block; }

        /* Responsive */
        @media (max-width: 991.98px) {
            .mobile-topbar { display: flex; }
            .guru-app { flex-direction: column; }
            .guru-app-sidebar {
                position: fixed;
                top: 0;
                left: -320px;
                height: 100vh;
                z-index: 999;
                transition: left 0.3s ease;
                width: 300px;
                min-width: 300px;
            }
            .guru-app-sidebar.open { left: 0; }
            .guru-app-main { padding: 18px; }
        }
    </style>
</head>
<body>

<div class="mobile-overlay" id="mobileOverlay" onclick="closeSidebar()"></div>

<div class="mobile-topbar">
    <button onclick="openSidebar()">☰</button>
    <span>Menu Guru</span>
</div>

<div class="guru-app">
    <aside class="guru-app-sidebar" id="guruSidebar">
        @include('layouts.sidebar-guru')
    </aside>
    <main class="guru-app-main">
        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function openSidebar() {
    document.getElementById('guruSidebar').classList.add('open');
    document.getElementById('mobileOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeSidebar() {
    document.getElementById('guruSidebar').classList.remove('open');
    document.getElementById('mobileOverlay').classList.remove('open');
    document.body.style.overflow = '';
}
</script>
</body>
</html>