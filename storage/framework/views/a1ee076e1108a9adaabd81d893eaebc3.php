

<?php $__env->startSection('title', 'Tugas Saya'); ?>

<?php $__env->startSection('content'); ?>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(180deg, #f8fbff 0%, #eef4ff 100%);
    }

    .page-header {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #1d4ed8 0%, #3b82f6 55%, #60a5fa 100%);
        border-radius: 24px;
        padding: 30px;
        color: #fff;
        box-shadow: 0 18px 40px rgba(37, 99, 235, 0.22);
        margin-bottom: 24px;
    }

    .page-header::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at top right, rgba(255,255,255,0.18), transparent 30%),
            radial-gradient(circle at bottom left, rgba(255,255,255,0.12), transparent 25%);
        pointer-events: none;
    }

    .page-header-content {
        position: relative;
        z-index: 2;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        gap: 18px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: rgba(255,255,255,0.96);
        border: 1px solid #e2e8f0;
        border-radius: 22px;
        padding: 20px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .stat-label {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: #0f172a;
    }

    .section-title {
        font-size: 24px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .section-subtitle {
        color: #64748b;
        margin-bottom: 22px;
    }

    .task-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 22px;
    }

    .task-card {
        position: relative;
        background: rgba(255,255,255,0.97);
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 24px;
        box-shadow: 0 14px 35px rgba(15, 23, 42, 0.08);
        transition: 0.25s ease;
        overflow: hidden;
    }

    .task-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(37, 99, 235, 0.12);
    }

    .task-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, #2563eb, #60a5fa);
    }

    .task-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 16px;
    }

    .task-title {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 6px;
        line-height: 1.3;
    }

    .task-desc {
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
    }

    .badge-soft {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-active {
        background: rgba(37, 99, 235, 0.12);
        color: #1d4ed8;
    }

    .badge-submitted {
        background: rgba(16, 185, 129, 0.14);
        color: #047857;
    }

    .badge-late {
        background: rgba(239, 68, 68, 0.12);
        color: #dc2626;
    }

    .task-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin: 20px 0 18px;
    }

    .info-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 14px 16px;
    }

    .info-label {
        font-size: 12px;
        color: #64748b;
        margin-bottom: 6px;
    }

    .info-value {
        font-size: 14px;
        font-weight: 600;
        color: #0f172a;
        line-height: 1.5;
    }

    .progress-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .progress-title {
        font-size: 14px;
        font-weight: 600;
        color: #1e293b;
    }

    .progress-percent {
        font-size: 13px;
        font-weight: 700;
        color: #2563eb;
    }

    .progress {
        height: 10px;
        border-radius: 999px;
        background: #e2e8f0;
        overflow: hidden;
        margin-bottom: 18px;
    }

    .progress-bar {
        background: linear-gradient(90deg, #2563eb, #60a5fa);
        border-radius: 999px;
        height: 100%;
    }

    .task-footer {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 18px;
    }

    .btn-task {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border-radius: 14px;
        padding: 12px 18px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s ease;
    }

    .btn-primary-task {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: #fff;
        box-shadow: 0 10px 20px rgba(37, 99, 235, 0.22);
    }

    .btn-primary-task:hover {
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-secondary-task {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        color: #1d4ed8;
    }

    .btn-secondary-task:hover {
        background: #dbeafe;
        color: #1e40af;
    }

    .btn-dashboard {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 14px;
        background: rgba(255,255,255,0.18);
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        border: 1px solid rgba(255,255,255,0.25);
    }

    .btn-dashboard:hover {
        color: #fff;
        background: rgba(255,255,255,0.24);
    }

    .empty-state {
        background: rgba(255,255,255,0.97);
        border: 1px dashed #cbd5e1;
        border-radius: 24px;
        padding: 54px 24px;
        text-align: center;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.05);
    }

    .empty-icon {
        width: 76px;
        height: 76px;
        border-radius: 22px;
        margin: 0 auto 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #dbeafe, #eff6ff);
        color: #2563eb;
        font-size: 30px;
    }

    @media (max-width: 768px) {
        .task-info {
            grid-template-columns: 1fr;
        }

        .task-top {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header {
            padding: 24px;
        }
    }
</style>

<?php
    $totalTugas = $tugas->count();

    $submittedCount = $tugas->filter(function ($item) use ($submittedTugasIds) {
        return in_array($item->id, $submittedTugasIds);
    })->count();

    $pendingCount = $totalTugas - $submittedCount;

    $activeCount = $tugas->filter(function ($item) {
        return $item->deadline && \Carbon\Carbon::parse($item->deadline)->isFuture();
    })->count();
?>

<div class="container-fluid px-0">
    <div class="page-header">
        <div class="page-header-content">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                <div>
                    <p class="mb-2 small text-white-50 fw-semibold">Menu Tugas Siswa</p>
                    <h2 class="fw-bold mb-2">Tugas Saya</h2>
                    <p class="mb-0 text-white-50">
                        Lihat tugas aktif, tenggat waktu, dan status pengumpulanmu di sini.
                    </p>
                </div>

                <a href="<?php echo e(route('siswa.dashboard')); ?>" class="btn-dashboard">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success rounded-4 border-0 shadow-sm mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Total Tugas</div>
            <div class="stat-value"><?php echo e($totalTugas); ?></div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Sudah Submit</div>
            <div class="stat-value"><?php echo e($submittedCount); ?></div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Belum Submit</div>
            <div class="stat-value"><?php echo e($pendingCount); ?></div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Masih Aktif</div>
            <div class="stat-value"><?php echo e($activeCount); ?></div>
        </div>
    </div>

    <div class="mb-4">
        <div class="section-title">Daftar Tugas</div>
        <div class="section-subtitle">Kerjakan tugas dengan tepat waktu dan pantau progres belajarmu.</div>
    </div>

    <?php if($tugas->count() > 0): ?>
        <div class="task-grid">
            <?php $__currentLoopData = $tugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $deadline = $item->deadline ? \Carbon\Carbon::parse($item->deadline) : null;
                    $isSubmitted = in_array($item->id, $submittedTugasIds);
                    $isExpired = $deadline ? ($deadline->isPast() && !$isSubmitted) : false;
                    $progress = $isSubmitted ? 100 : (($deadline && $deadline->isFuture()) ? 45 : 20);
                ?>

                <div class="task-card">
                    <div class="task-top">
                        <div>
                            <div class="task-title"><?php echo e($item->judul); ?></div>
                            <div class="task-desc">
                                <?php echo e($item->deskripsi ? \Illuminate\Support\Str::limit($item->deskripsi, 110) : 'Kerjakan tugas ini sesuai instruksi yang diberikan guru.'); ?>

                            </div>
                        </div>

                        <?php if($isSubmitted): ?>
                            <span class="badge-soft badge-submitted">
                                <i class="fas fa-check-circle"></i> Sudah Submit
                            </span>
                        <?php elseif($isExpired): ?>
                            <span class="badge-soft badge-late">
                                <i class="fas fa-exclamation-circle"></i> Terlambat
                            </span>
                        <?php else: ?>
                            <span class="badge-soft badge-active">
                                <i class="fas fa-bolt"></i> Aktif
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="task-info">
                        <div class="info-box">
                            <div class="info-label">Deadline</div>
                            <div class="info-value">
                                <?php if($deadline): ?>
                                    <?php echo e($deadline->translatedFormat('d F Y')); ?><br>
                                    <?php echo e($deadline->format('H:i')); ?>

                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="info-box">
                            <div class="info-label">Status</div>
                            <div class="info-value">
                                <?php echo e($isSubmitted ? 'Tugas sudah dikumpulkan' : ($isExpired ? 'Melewati batas pengumpulan' : 'Menunggu pengumpulan')); ?>

                            </div>
                        </div>
                    </div>

                    <div class="progress-header">
                        <div class="progress-title">Progress</div>
                        <div class="progress-percent"><?php echo e($progress); ?>%</div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" style="width: <?php echo e($progress); ?>%"></div>
                    </div>

                    <div class="task-footer">
                        <a href="<?php echo e(route('siswa.tugas.show', $item->id)); ?>" class="btn-task btn-primary-task">
                            <i class="fas fa-folder-open"></i> Buka Tugas
                        </a>

                        <?php if($isSubmitted): ?>
                            <a href="<?php echo e(route('siswa.tugas.show', $item->id)); ?>" class="btn-task btn-secondary-task">
                                <i class="fas fa-eye"></i> Lihat Pengumpulan
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <h4 class="fw-bold text-dark mb-2">Belum Ada Tugas</h4>
            <p class="text-muted mb-0">
                Saat ini belum ada tugas yang tersedia. Tugas dari guru akan muncul di halaman ini.
            </p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\siswa\tugas\index.blade.php ENDPATH**/ ?>