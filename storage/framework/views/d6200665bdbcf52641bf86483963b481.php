

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    /* =============================================
       MONITORING PROGRESS - GURU (REDESIGNED)
       ============================================= */
    :root {
        --blue:   #3b82f6;
        --blue-d: #1d4ed8;
        --blue-bg:#eff6ff;
        --orange: #f59e0b;
        --orange-bg:#fffbeb;
        --green:  #22c55e;
        --green-d:#15803d;
        --green-bg:#f0fdf4;
        --purple: #8b5cf6;
        --purple-bg:#f5f3ff;
        --red:    #ef4444;
        --red-bg: #fef2f2;
        --slate-50:#f8fafc;
        --slate-100:#f1f5f9;
        --slate-200:#e2e8f0;
        --slate-400:#94a3b8;
        --slate-500:#64748b;
        --slate-700:#334155;
        --slate-900:#0f172a;
        --radius-xl:20px;
        --radius-lg:14px;
        --radius-md:10px;
        --shadow-card: 0 1px 3px rgba(0,0,0,.06), 0 8px 24px rgba(15,23,42,.08);
        --shadow-hover:0 4px 12px rgba(15,23,42,.12), 0 16px 40px rgba(15,23,42,.1);
        --font: 'Plus Jakarta Sans', system-ui, sans-serif;
    }

    /* Hapus padding dari .guru-app-main (padding: 28px) khusus halaman ini */
    .guru-app-main:has(.monitor-page) {
        padding: 0 !important;
    }

    .monitor-page {
        font-family: var(--font);
        padding: 28px 28px 56px 28px;
        max-width: 1280px;
        width: 100%;
        box-sizing: border-box;
    }

    /* ── PAGE HEADER ─────────────────────────── */
    .monitor-header {
        margin-bottom: 32px;
        width: 100%;
    }
    .monitor-title {
        font-size: 28px;
        font-weight: 800;
        color: var(--slate-900);
        letter-spacing: -0.5px;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .monitor-title .title-icon {
        width: 40px; height: 40px;
        border-radius: 12px;
        background: linear-gradient(135deg, #3b82f6, #6366f1);
        display: flex; align-items: center; justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .monitor-subtitle {
        font-size: 14px;
        color: var(--slate-500);
        margin-left: 0;
        margin-top: 4px;
    }

    /* ── SUMMARY CARDS ───────────────────────── */
    .summary-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 16px;
        margin-bottom: 24px;
        width: 100%;
        box-sizing: border-box;
    }
    .s-card {
        background: #fff;
        border-radius: var(--radius-xl);
        padding: 22px 20px 18px;
        box-shadow: var(--shadow-card);
        position: relative;
        overflow: hidden;
        transition: transform .2s, box-shadow .2s;
    }
    .s-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-hover);
    }
    .s-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        border-radius: var(--radius-xl) var(--radius-xl) 0 0;
    }
    .s-card.blue::before   { background: linear-gradient(90deg, #3b82f6, #60a5fa); }
    .s-card.orange::before { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
    .s-card.green::before  { background: linear-gradient(90deg, #22c55e, #4ade80); }
    .s-card.purple::before { background: linear-gradient(90deg, #8b5cf6, #a78bfa); }
    .s-card.red::before    { background: linear-gradient(90deg, #ef4444, #f87171); }

    .s-card-icon {
        width: 38px; height: 38px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px;
        margin-bottom: 14px;
    }
    .s-card.blue   .s-card-icon { background: var(--blue-bg); }
    .s-card.orange .s-card-icon { background: var(--orange-bg); }
    .s-card.green  .s-card-icon { background: var(--green-bg); }
    .s-card.purple .s-card-icon { background: var(--purple-bg); }
    .s-card.red    .s-card-icon { background: var(--red-bg); }

    .s-label {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--slate-400);
        text-transform: uppercase;
        letter-spacing: .07em;
        margin-bottom: 6px;
    }
    .s-value {
        font-size: 34px;
        font-weight: 800;
        line-height: 1;
        letter-spacing: -1px;
    }
    .s-card.blue   .s-value { color: #2563eb; }
    .s-card.orange .s-value { color: #d97706; }
    .s-card.green  .s-value { color: #16a34a; }
    .s-card.purple .s-value { color: #7c3aed; }
    .s-card.red    .s-value { color: #dc2626; }

    /* ── FILTER PANEL ────────────────────────── */
    .filter-card {
        background: #fff;
        border-radius: var(--radius-xl);
        padding: 20px 24px;
        box-shadow: var(--shadow-card);
        margin-bottom: 20px;
        border: 1px solid var(--slate-200);
        box-sizing: border-box;
        width: 100%;
    }
    .filter-card form {
        display: flex;
        align-items: flex-end;
        gap: 14px;
        flex-wrap: wrap;
        width: 100%;
    }
    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
        flex: 1;
        min-width: 180px;
    }
    .filter-label {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--slate-700);
        text-transform: uppercase;
        letter-spacing: .06em;
    }
    .filter-select {
        border: 1.5px solid var(--slate-200);
        border-radius: var(--radius-md);
        padding: 10px 14px;
        font-size: 14px;
        font-family: var(--font);
        color: var(--slate-900);
        background: var(--slate-50);
        outline: none;
        transition: border-color .2s, box-shadow .2s;
        width: 100%;
        cursor: pointer;
    }
    .filter-select:focus {
        border-color: var(--blue);
        box-shadow: 0 0 0 3px rgba(59,130,246,.12);
        background: #fff;
    }

    .btn-filter {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
        border: none;
        border-radius: var(--radius-md);
        padding: 10px 22px;
        font-size: 14px;
        font-weight: 700;
        font-family: var(--font);
        cursor: pointer;
        white-space: nowrap;
        transition: opacity .2s, transform .15s;
        display: flex; align-items: center; gap: 7px;
    }
    .btn-filter:hover { opacity: .9; transform: translateY(-1px); }
    .btn-reset {
        background: var(--slate-100);
        color: var(--slate-500);
        border: none;
        border-radius: var(--radius-md);
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 600;
        font-family: var(--font);
        cursor: pointer;
        white-space: nowrap;
        text-decoration: none;
        transition: background .2s, color .2s;
        display: flex; align-items: center; gap: 6px;
    }
    .btn-reset:hover { background: var(--slate-200); color: var(--slate-700); }

    /* ── MAIN TABLE CARD ─────────────────────── */
    .main-card {
        background: #fff;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-card);
        overflow: hidden;
        border: 1px solid var(--slate-200);
        width: 100%;
        box-sizing: border-box;
    }
    .main-card-header {
        background: #fff;
        border-bottom: 1px solid var(--slate-200);
        padding: 18px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }
    .main-card-title {
        font-size: 15px;
        font-weight: 800;
        color: var(--slate-900);
        margin: 0;
        display: flex; align-items: center; gap: 8px;
    }
    .main-card-title::before {
        content: '';
        display: inline-block;
        width: 4px; height: 18px;
        border-radius: 4px;
        background: linear-gradient(180deg, #3b82f6, #6366f1);
    }
    .result-count {
        font-size: 12px;
        font-weight: 600;
        color: var(--slate-500);
        background: var(--slate-100);
        padding: 4px 12px;
        border-radius: 999px;
        border: 1px solid var(--slate-200);
    }

    /* ── SISWA BLOCK ─────────────────────────── */
    .siswa-block {
        border-bottom: 1px solid var(--slate-100);
    }
    .siswa-block:last-child { border-bottom: none; }

    .siswa-header-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 24px;
        background: var(--slate-50);
        cursor: pointer;
        border-bottom: 1px solid transparent;
        gap: 16px;
        flex-wrap: wrap;
        user-select: none;
        transition: background .15s;
    }
    .siswa-header-row:hover { background: #eef2ff; }
    .siswa-header-row.is-open {
        background: #eff6ff;
        border-bottom-color: var(--slate-200);
    }

    .siswa-info {
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .siswa-avatar {
        width: 42px; height: 42px;
        border-radius: 12px;
        background: linear-gradient(135deg, #3b82f6, #6366f1);
        color: #fff;
        font-size: 16px;
        font-weight: 800;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(59,130,246,.3);
    }
    .siswa-name {
        font-weight: 700;
        color: var(--slate-900);
        font-size: 15px;
    }
    .siswa-nis {
        font-size: 12px;
        color: var(--slate-400);
        margin-top: 2px;
    }

    .siswa-right {
        display: flex;
        align-items: center;
        gap: 28px;
        flex-wrap: wrap;
    }
    .siswa-stats {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .stat-item { text-align: center; min-width: 52px; }
    .stat-val {
        font-size: 18px;
        font-weight: 800;
        color: var(--slate-900);
        line-height: 1;
    }
    .stat-val.green { color: #16a34a; }
    .stat-lbl {
        font-size: 10.5px;
        font-weight: 600;
        color: var(--slate-400);
        margin-top: 3px;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .stat-divider {
        width: 1px;
        height: 28px;
        background: var(--slate-200);
        flex-shrink: 0;
    }

    .mini-progress-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 160px;
    }
    .mini-bar {
        flex: 1;
        height: 7px;
        background: var(--slate-200);
        border-radius: 999px;
        overflow: hidden;
    }
    .mini-bar-fill {
        height: 100%;
        border-radius: 999px;
        transition: width .5s cubic-bezier(.4,0,.2,1);
    }
    .mini-pct {
        font-size: 13px;
        font-weight: 700;
        color: var(--slate-700);
        min-width: 36px;
        text-align: right;
    }

    .toggle-btn {
        width: 30px; height: 30px;
        border-radius: 8px;
        background: var(--slate-200);
        display: flex; align-items: center; justify-content: center;
        transition: background .2s, transform .25s;
        flex-shrink: 0;
        font-size: 14px;
        color: var(--slate-500);
    }
    .siswa-header-row:hover .toggle-btn { background: #dbeafe; color: var(--blue-d); }
    .toggle-btn.open { transform: rotate(180deg); background: #dbeafe; color: var(--blue-d); }

    /* ── COLLAPSIBLE DETAIL ──────────────────── */
    .siswa-detail {
        display: none;
        background: #fff;
    }
    .siswa-detail.show { display: block; }

    /* ── INNER TABLE ─────────────────────────── */
    .inner-table-wrap {
        overflow-x: auto;
        padding: 0 24px 20px;
    }
    .inner-table {
        width: 100%;
        min-width: 860px;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 16px;
    }
    .inner-table thead th {
        font-size: 11px;
        font-weight: 700;
        color: var(--slate-400);
        text-transform: uppercase;
        letter-spacing: .07em;
        background: var(--slate-50);
        padding: 10px 14px;
        border-top: 1px solid var(--slate-100);
        border-bottom: 1px solid var(--slate-200);
        white-space: nowrap;
        vertical-align: middle;
    }
    .inner-table thead th:first-child { border-radius: 10px 0 0 0; }
    .inner-table thead th:last-child  { border-radius: 0 10px 0 0; }

    .inner-table tbody td {
        padding: 13px 14px;
        font-size: 13.5px;
        color: var(--slate-900);
        border-bottom: 1px solid var(--slate-100);
        vertical-align: middle;
        transition: background .1s;
    }
    .inner-table tbody tr:last-child td { border-bottom: none; }
    .inner-table tbody tr:hover td { background: var(--slate-50); }

    .row-number {
        font-size: 12px;
        font-weight: 700;
        color: var(--slate-400);
        background: var(--slate-100);
        width: 26px; height: 26px;
        border-radius: 6px;
        display: flex; align-items: center; justify-content: center;
    }
    .bab-badge {
        font-size: 12px;
        font-weight: 700;
        color: var(--blue-d);
        background: var(--blue-bg);
        padding: 3px 9px;
        border-radius: 6px;
        white-space: nowrap;
    }

    .materi-title-text {
        font-weight: 600;
        color: var(--slate-900);
        margin-bottom: 2px;
        line-height: 1.35;
        font-size: 13.5px;
    }
    .materi-sub-text {
        font-size: 11.5px;
        color: var(--slate-400);
        line-height: 1.3;
    }

    .durasi-text {
        font-size: 13px;
        font-weight: 600;
        color: var(--slate-700);
        white-space: nowrap;
    }

    /* Badge */
    .badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 11px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 700;
        white-space: nowrap;
    }
    .badge-pill::before {
        content: '';
        width: 6px; height: 6px;
        border-radius: 50%;
    }
    .badge-belum   { background: var(--slate-100); color: var(--slate-500); }
    .badge-belum::before { background: var(--slate-400); }
    .badge-belajar { background: #dbeafe; color: #1d4ed8; }
    .badge-belajar::before { background: #3b82f6; animation: pulse-dot 1.5s infinite; }
    .badge-selesai { background: var(--green-bg); color: var(--green-d); }
    .badge-selesai::before { background: #22c55e; }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; }
        50% { opacity: .4; }
    }

    /* Progress bar */
    .prog-wrap { min-width: 130px; }
    .prog-bar-outer {
        height: 7px;
        background: var(--slate-200);
        border-radius: 999px;
        overflow: hidden;
    }
    .prog-bar-inner {
        height: 100%;
        border-radius: 999px;
        transition: width .5s;
    }
    .prog-pct {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--slate-500);
        text-align: right;
        margin-top: 4px;
    }

    /* Date */
    .date-main { font-weight: 600; color: var(--slate-900); font-size: 13px; }
    .date-sub  { font-size: 11px; color: var(--slate-400); margin-top: 2px; }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 64px 24px;
    }
    .empty-icon {
        font-size: 52px;
        margin-bottom: 16px;
        filter: grayscale(.4);
    }
    .empty-text { font-size: 16px; font-weight: 700; color: var(--slate-700); }
    .empty-hint { font-size: 13px; color: var(--slate-400); margin-top: 6px; }

    /* ── RESPONSIVE ──────────────────────────── */
    @media (max-width: 900px) {
        .summary-grid { grid-template-columns: repeat(3, 1fr); }
    }
    @media (max-width: 640px) {
        .monitor-page { padding: 16px 16px 32px 16px; }
        .summary-grid { grid-template-columns: repeat(2, 1fr); }
        .siswa-stats  { gap: 12px; }
        .mini-progress-wrap { min-width: 100px; }
    }
</style>

<div class="monitor-page">

    
    <div class="monitor-header">
        <div class="monitor-title">
            <span class="title-icon">📊</span>
            Monitoring Progress Siswa
        </div>
        <div class="monitor-subtitle">Pantau perkembangan belajar setiap siswa secara menyeluruh dan real-time.</div>
    </div>

    
    <div class="summary-grid">
        <div class="s-card blue">
            <div class="s-card-icon">👥</div>
            <div class="s-label">Total Siswa</div>
            <div class="s-value"><?php echo e($totalSiswa); ?></div>
        </div>
        <div class="s-card orange">
            <div class="s-card-icon">⚡</div>
            <div class="s-label">Siswa Aktif</div>
            <div class="s-value"><?php echo e($siswaAktif); ?></div>
        </div>
        <div class="s-card green">
            <div class="s-card-icon">✅</div>
            <div class="s-label">Siswa Selesai</div>
            <div class="s-value"><?php echo e($siswaSelesai); ?></div>
        </div>
        <div class="s-card purple">
            <div class="s-card-icon">📚</div>
            <div class="s-label">Total Materi</div>
            <div class="s-value"><?php echo e($totalMateri); ?></div>
        </div>
        <div class="s-card red">
            <div class="s-card-icon">📈</div>
            <div class="s-label">Rata-rata Progress</div>
            <div class="s-value"><?php echo e($avgOverall); ?>%</div>
        </div>
    </div>

    
    <div class="filter-card">
        <form method="GET" action="<?php echo e(route('guru.progress.index')); ?>">
            <div class="filter-group">
                <label class="filter-label">Filter Siswa</label>
                <select name="siswa_id" class="filter-select">
                    <option value="">Semua Siswa</option>
                    <?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($s->id); ?>" <?php echo e($selectedSiswaId == $s->id ? 'selected' : ''); ?>>
                            <?php echo e($s->name); ?> <?php echo e($s->nis ? '('.$s->nis.')' : ''); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="filter-group">
                <label class="filter-label">Filter Materi</label>
                <select name="materi_id" class="filter-select">
                    <option value="">Semua Materi</option>
                    <?php $__currentLoopData = $materiList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($m->id); ?>" <?php echo e($selectedMateriId == $m->id ? 'selected' : ''); ?>>
                            Bab <?php echo e($m->bab); ?> – <?php echo e($m->judul); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="btn-filter">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                Terapkan
            </button>
            <a href="<?php echo e(route('guru.progress.index')); ?>" class="btn-reset">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                Reset
            </a>
        </form>
    </div>

    
    <div class="main-card">
        <div class="main-card-header">
            <h4 class="main-card-title">Daftar Progress Per Siswa</h4>
            <span class="result-count"><?php echo e($tableData->count()); ?> siswa ditampilkan</span>
        </div>

        <?php if($tableData->isEmpty()): ?>
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <div class="empty-text">Tidak ada data ditemukan</div>
                <div class="empty-hint">Coba ubah filter atau pastikan siswa sudah terdaftar.</div>
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $tableData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $avg = $row['avg_percent'];
                    $barColor = $avg == 100 ? '#22c55e' : ($avg > 0 ? '#3b82f6' : '#94a3b8');
                    $siswaId = $row['siswa']->id;
                ?>
                <div class="siswa-block">
                    
                    <div class="siswa-header-row"
                         onclick="toggleDetail('siswa-<?php echo e($siswaId); ?>', this)"
                         id="hdr-<?php echo e($siswaId); ?>">

                        <div class="siswa-info">
                            <div class="siswa-avatar">
                                <?php echo e(strtoupper(substr($row['siswa']->name, 0, 1))); ?>

                            </div>
                            <div>
                                <div class="siswa-name"><?php echo e($row['siswa']->name); ?></div>
                                <div class="siswa-nis">
                                    <?php echo e($row['siswa']->nis ? 'NIS: '.$row['siswa']->nis : $row['siswa']->email); ?>

                                </div>
                            </div>
                        </div>

                        <div class="siswa-right">
                            <div class="siswa-stats">
                                <div class="stat-item">
                                    <div class="stat-val"><?php echo e($row['opened_count']); ?></div>
                                    <div class="stat-lbl">Dibuka</div>
                                </div>
                                <div class="stat-divider"></div>
                                <div class="stat-item">
                                    <div class="stat-val green"><?php echo e($row['completed_count']); ?></div>
                                    <div class="stat-lbl">Selesai</div>
                                </div>
                            </div>

                            <div class="mini-progress-wrap">
                                <div class="mini-bar">
                                    <div class="mini-bar-fill"
                                         style="width:<?php echo e($avg); ?>%; background:<?php echo e($barColor); ?>;"></div>
                                </div>
                                <span class="mini-pct"><?php echo e($avg); ?>%</span>
                            </div>

                            <div class="toggle-btn" id="icon-<?php echo e($siswaId); ?>">▾</div>
                        </div>
                    </div>

                    
                    <div class="siswa-detail" id="siswa-<?php echo e($siswaId); ?>">
                        <div class="inner-table-wrap">
                            <table class="inner-table">
                                <thead>
                                    <tr>
                                        <th style="width:44px;">No</th>
                                        <th style="width:60px;">Bab</th>
                                        <th style="min-width:220px;">Materi</th>
                                        <th style="min-width:80px;">Durasi</th>
                                        <th style="min-width:130px;">Status</th>
                                        <th style="min-width:150px;">Progress</th>
                                        <th style="min-width:110px;">Terakhir Dibuka</th>
                                        <th style="min-width:110px;">Selesai Pada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $row['materi_progress']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $pct = $mp['percent'];
                                            $pbColor = $pct == 100 ? '#22c55e' : ($pct > 0 ? '#3b82f6' : '#94a3b8');
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="row-number"><?php echo e($loop->iteration); ?></div>
                                            </td>
                                            <td>
                                                <span class="bab-badge"><?php echo e($mp['bab']); ?></span>
                                            </td>
                                            <td>
                                                <div class="materi-title-text"><?php echo e($mp['judul']); ?></div>
                                                <?php if($mp['subjudul']): ?>
                                                    <div class="materi-sub-text"><?php echo e($mp['subjudul']); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="durasi-text"><?php echo e($mp['durasi']); ?> mnt</span>
                                            </td>
                                            <td>
                                                <?php if($pct == 100): ?>
                                                    <span class="badge-pill badge-selesai">Selesai</span>
                                                <?php elseif($pct > 0): ?>
                                                    <span class="badge-pill badge-belajar">Dipelajari</span>
                                                <?php else: ?>
                                                    <span class="badge-pill badge-belum">Belum Dibuka</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="prog-wrap">
                                                    <div class="prog-bar-outer">
                                                        <div class="prog-bar-inner"
                                                             style="width:<?php echo e($pct); ?>%; background:<?php echo e($pbColor); ?>;"></div>
                                                    </div>
                                                    <div class="prog-pct"><?php echo e($pct); ?>%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if($mp['last_accessed_at']): ?>
                                                    <div class="date-main"><?php echo e(\Carbon\Carbon::parse($mp['last_accessed_at'])->format('d M Y')); ?></div>
                                                    <div class="date-sub"><?php echo e(\Carbon\Carbon::parse($mp['last_accessed_at'])->format('H:i')); ?> WIB</div>
                                                <?php else: ?>
                                                    <span style="color:#cbd5e1; font-size:13px;">—</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($mp['completed_at']): ?>
                                                    <div class="date-main"><?php echo e(\Carbon\Carbon::parse($mp['completed_at'])->format('d M Y')); ?></div>
                                                    <div class="date-sub"><?php echo e(\Carbon\Carbon::parse($mp['completed_at'])->format('H:i')); ?> WIB</div>
                                                <?php else: ?>
                                                    <span style="color:#cbd5e1; font-size:13px;">—</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>

<script>
    function toggleDetail(id, headerEl) {
        const detail = document.getElementById(id);
        const siswaId = id.replace('siswa-', '');
        const icon = document.getElementById('icon-' + siswaId);

        if (detail.classList.contains('show')) {
            detail.classList.remove('show');
            icon.classList.remove('open');
            headerEl.classList.remove('is-open');
        } else {
            detail.classList.add('show');
            icon.classList.add('open');
            headerEl.classList.add('is-open');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const blocks = document.querySelectorAll('.siswa-block');
        if (blocks.length === 1) {
            const header = blocks[0].querySelector('.siswa-header-row');
            const detail = blocks[0].querySelector('.siswa-detail');
            const icon   = blocks[0].querySelector('.toggle-btn');
            if (detail) detail.classList.add('show');
            if (icon)   icon.classList.add('open');
            if (header) header.classList.add('is-open');
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u748564652/domains/englishfornusantara.com/proyek-pertama-saya/resources/views/guru/progress/index.blade.php ENDPATH**/ ?>