

<?php $__env->startSection('content'); ?>
<div class="page-shell">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="
                font-size:2.5rem;
                font-weight:800;
                letter-spacing:-1px;
                margin-bottom:8px;
                color:#102040;
            ">
                Kelola Tugas
            </h1>

            <p style="
                color:#6e7b91;
                font-size:1.05rem;
                margin:0;
                max-width:700px;
            ">
                Atur tugas siswa dengan tampilan modern, premium, dan mudah dikelola.
            </p>
        </div>

        <a href="<?php echo e(route('guru.tugas.create')); ?>" class="btn-premium">
            + Tambah Tugas
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="glass-card-strong p-3 mb-4" style="border-left:5px solid #16a34a;">
            <strong style="color:#15803d;">
                <?php echo e(session('success')); ?>

            </strong>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="glass-card-strong p-3 mb-4" style="border-left:5px solid #ef4444;">
            <strong style="color:#b91c1c;">
                <?php echo e(session('error')); ?>

            </strong>
        </div>
    <?php endif; ?>

    
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100 stat-card">
                <div class="stat-icon blue">📘</div>
                <div class="stat-label">Total Tugas</div>
                <div class="stat-value"><?php echo e($totalTugas ?? 0); ?></div>
                <div class="stat-desc">Seluruh tugas yang tersedia</div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100 stat-card">
                <div class="stat-icon green">✅</div>
                <div class="stat-label">Tugas Aktif</div>
                <div class="stat-value"><?php echo e($tugasAktif ?? 0); ?></div>
                <div class="stat-desc">Tugas yang sedang dibuka</div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100 stat-card">
                <div class="stat-icon amber">📤</div>
                <div class="stat-label">Total Submit</div>
                <div class="stat-value"><?php echo e($totalSubmit ?? 0); ?></div>
                <div class="stat-desc">Jumlah pengumpulan siswa</div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100 stat-card">
                <div class="stat-icon red">📝</div>
                <div class="stat-label">Belum Dinilai</div>
                <div class="stat-value"><?php echo e($belumDinilai ?? 0); ?></div>
                <div class="stat-desc">Submit yang menunggu nilai</div>
            </div>
        </div>
    </div>

    
    <div class="glass-card-strong p-4 p-lg-5">
        <?php if($tugas->count()): ?>
            <div class="table-responsive">
                <table class="table align-middle tugas-table">
                    <thead>
                        <tr>
                            <th width="70">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="190">Deadline</th>
                            <th width="150">Status</th>
                            <th class="text-end" width="280">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $tugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $deadline = !empty($item->deadline) ? \Carbon\Carbon::parse($item->deadline) : null;
                                $isExpired = $deadline ? $deadline->isPast() : false;
                                $isToday = $deadline ? $deadline->isToday() : false;
                                $diffText = $deadline
                                    ? ($isExpired
                                        ? 'Lewat ' . abs((int) now()->diffInDays($deadline, false)) . ' hari'
                                        : ($isToday
                                            ? 'Hari ini'
                                            : $deadline->diffForHumans()))
                                    : null;
                            ?>

                            <tr class="tugas-row">
                                <td>
                                    <div class="no-badge">
                                        <?php echo e($tugas->firstItem() + $index); ?>

                                    </div>
                                </td>

                                <td>
                                    <div class="judul-main">
                                        <?php echo e($item->judul); ?>

                                    </div>
                                </td>

                                <td>
                                    <div class="deskripsi-text">
                                        <?php echo e(\Illuminate\Support\Str::limit($item->deskripsi ?: '-', 90)); ?>

                                    </div>
                                </td>

                                <td>
                                    <?php if($deadline): ?>
                                        <div class="deadline-box <?php echo e($isExpired ? 'danger' : ($isToday ? 'warning' : 'normal')); ?>">
                                            <div class="deadline-date">
                                                <?php echo e($deadline->format('d M Y')); ?>

                                            </div>
                                            <div class="deadline-meta">
                                                <?php echo e($diffText); ?>

                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="deadline-box normal">
                                            <div class="deadline-date">-</div>
                                            <div class="deadline-meta">Tidak ditentukan</div>
                                        </div>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php if(isset($item->is_active) && $item->is_active): ?>
                                        <span class="status-active">Aktif</span>
                                    <?php elseif(isset($item->is_active)): ?>
                                        <span class="status-off">Nonaktif</span>
                                    <?php else: ?>
                                        <span class="status-info">Tersedia</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-end gap-2 flex-wrap">
                                        <a href="<?php echo e(route('guru.tugas.show', $item->id)); ?>" class="mini-btn blue">
                                            👁 Detail
                                        </a>

                                        <a href="<?php echo e(route('guru.tugas.edit', $item->id)); ?>" class="mini-btn white">
                                            ✏ Edit
                                        </a>

                                        <form action="<?php echo e(route('guru.tugas.destroy', $item->id)); ?>"
                                              method="POST"
                                              onsubmit="return confirm('Yakin hapus tugas ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="mini-btn red">
                                                🗑 Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <tr class="row-spacer">
                                <td colspan="6"></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <?php if(method_exists($tugas, 'links')): ?>
                <div class="mt-4">
                    <?php echo e($tugas->links()); ?>

                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">📚</div>
                <h4 style="font-weight:800; margin-bottom:10px;">
                    Belum Ada Tugas
                </h4>

                <p style="margin-bottom:20px;">
                    Tambahkan tugas pertama untuk mulai membagikan aktivitas ke siswa.
                </p>

                <a href="<?php echo e(route('guru.tugas.create')); ?>" class="btn-premium">
                    + Tambah Tugas
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.tugas-table thead th{
    border:none;
    color:#7b879c;
    font-size:.92rem;
    font-weight:700;
    padding-bottom:18px;
}

.tugas-table tbody td{
    border:none;
    padding:22px 16px;
    vertical-align:middle;
}

.tugas-row{
    background:#fff;
    border-radius:24px;
    box-shadow:0 12px 30px rgba(15,23,42,.05);
    transition:.25s ease;
}

.tugas-row:hover{
    transform:translateY(-2px);
    box-shadow:0 18px 36px rgba(36,81,230,.10);
}

.row-spacer td{
    height:14px;
    padding:0;
    background:transparent !important;
    box-shadow:none !important;
}

.no-badge{
    width:42px;
    height:42px;
    border-radius:14px;
    background:#f1f5f9;
    color:#13233f;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:800;
}

.judul-main{
    font-weight:800;
    font-size:1.15rem;
    color:#13233f;
    line-height:1.4;
    max-width:240px;
}

.deskripsi-text{
    color:#4c5a70;
    line-height:1.8;
    max-width:320px;
}

.deadline-box{
    border-radius:16px;
    padding:12px 14px;
    min-width:140px;
}

.deadline-box.normal{
    background:#f8fafc;
}

.deadline-box.warning{
    background:#fef3c7;
}

.deadline-box.danger{
    background:#fee2e2;
}

.deadline-date{
    font-weight:800;
    color:#13233f;
    font-size:.98rem;
}

.deadline-meta{
    margin-top:4px;
    font-size:.82rem;
    color:#64748b;
    font-weight:600;
}

.status-active{
    background:#dcfce7;
    color:#15803d;
    padding:8px 16px;
    border-radius:999px;
    font-weight:700;
    font-size:.86rem;
}

.status-off{
    background:#f1f5f9;
    color:#475569;
    padding:8px 16px;
    border-radius:999px;
    font-weight:700;
    font-size:.86rem;
}

.status-info{
    background:#e0f2fe;
    color:#0369a1;
    padding:8px 16px;
    border-radius:999px;
    font-weight:700;
    font-size:.86rem;
}

.mini-btn{
    border:none;
    text-decoration:none;
    padding:10px 16px;
    border-radius:14px;
    font-weight:700;
    font-size:.92rem;
    transition:.25s ease;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;
}

.mini-btn.blue{
    background:#eef4ff;
    color:#2451e6;
}

.mini-btn.white{
    background:#fff;
    color:#13233f;
    border:1px solid #e5e7eb;
}

.mini-btn.red{
    background:#fee2e2;
    color:#dc2626;
}

.mini-btn:hover{
    transform:translateY(-1px);
}

.stat-card{
    position:relative;
    overflow:hidden;
}

.stat-card::after{
    content:'';
    position:absolute;
    top:-20px;
    right:-20px;
    width:90px;
    height:90px;
    border-radius:50%;
    background:rgba(255,255,255,.35);
    filter:blur(12px);
}

.stat-icon{
    width:54px;
    height:54px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1.3rem;
    margin-bottom:14px;
}

.stat-icon.blue{ background:#dbeafe; }
.stat-icon.green{ background:#dcfce7; }
.stat-icon.amber{ background:#fef3c7; }
.stat-icon.red{ background:#fee2e2; }

.stat-label{
    color:#6e7b91;
    font-size:.95rem;
    font-weight:700;
}

.stat-value{
    font-size:2.2rem;
    font-weight:800;
    color:#13233f;
    line-height:1.2;
    margin-top:6px;
}

.stat-desc{
    color:#94a3b8;
    font-size:.85rem;
    margin-top:6px;
}

.empty-state{
    padding:70px 20px;
    text-align:center;
}

.empty-icon{
    font-size:2.5rem;
    margin-bottom:12px;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\guru\tugas\index.blade.php ENDPATH**/ ?>