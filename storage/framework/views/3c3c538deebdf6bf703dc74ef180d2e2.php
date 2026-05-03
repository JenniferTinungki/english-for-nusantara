

<?php $__env->startSection('content'); ?>
<div class="page-shell">

    <div class="mb-4">
        <a href="<?php echo e(route('admin.users.index')); ?>" class="text-decoration-none text-muted small">
            ← Kembali ke Daftar Siswa
        </a>
        <h1 class="fw-bold mt-2" style="font-size:2rem;color:#102040;">Detail Siswa</h1>
    </div>

    <div class="row g-4">

        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 p-4 text-center h-100">

                <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle bg-primary text-white fw-bold"
                    style="width:80px;height:80px;font-size:2rem;">
                    <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                </div>

                <h5 class="fw-bold mb-0"><?php echo e($user->name); ?></h5>
                <p class="text-muted mb-3"><?php echo e($user->email); ?></p>

                <?php if($user->is_active): ?>
                    <span class="badge bg-success px-3 py-2 rounded-pill mb-3">● Aktif</span>
                <?php else: ?>
                    <span class="badge bg-secondary px-3 py-2 rounded-pill mb-3">● Nonaktif</span>
                <?php endif; ?>

                <table class="table table-sm text-start mt-2">
                    <tr>
                        <td class="text-muted">ID</td>
                        <td class="fw-semibold"><?php echo e($user->id); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">NIS</td>
                        <td class="fw-semibold"><?php echo e($user->nis ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Username</td>
                        <td class="fw-semibold"><?php echo e($user->username ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Kelas</td>
                        <td class="fw-semibold"><?php echo e($user->kelas ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Jenis Kelamin</td>
                        <td class="fw-semibold">
                            <?php if($user->jenis_kelamin === 'L'): ?> Laki-laki
                            <?php elseif($user->jenis_kelamin === 'P'): ?> Perempuan
                            <?php else: ?> -
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Bergabung</td>
                        <td class="fw-semibold"><?php echo e($user->created_at->format('d M Y')); ?></td>
                    </tr>
                </table>

                <div class="d-flex gap-2 mt-3">
                    <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                       class="btn btn-primary rounded-pill flex-grow-1">Edit</a>
                    <form action="<?php echo e(route('admin.users.toggle-status', $user->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <button type="submit"
                            class="btn rounded-pill <?php echo e($user->is_active ? 'btn-warning' : 'btn-success'); ?>">
                            <?php echo e($user->is_active ? 'Nonaktifkan' : 'Aktifkan'); ?>

                        </button>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-8">
            <div class="row g-3 mb-4">

                
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold mb-2">Progress Materi</div>
                        <?php $progress = $user->progress_materi; ?>
                        <div class="fs-2 fw-bold
                            <?php echo e($progress >= 75 ? 'text-success' : ($progress >= 40 ? 'text-warning' : 'text-danger')); ?>">
                            <?php echo e($progress); ?>%
                        </div>
                        <div class="progress mt-2" style="height:8px;">
                            <div class="progress-bar
                                <?php echo e($progress >= 75 ? 'bg-success' : ($progress >= 40 ? 'bg-warning' : 'bg-danger')); ?>"
                                style="width:<?php echo e($progress); ?>%">
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold mb-2">Nilai Rata-rata</div>
                        <?php $nilai = $user->nilai_rata_rata; ?>
                        <div class="fs-2 fw-bold
                            <?php echo e($nilai !== null && $nilai >= 75 ? 'text-success' : ($nilai !== null && $nilai >= 50 ? 'text-warning' : 'text-danger')); ?>">
                            <?php echo e($nilai !== null ? $nilai : '-'); ?>

                        </div>
                        <div class="text-muted small mt-1">dari Assessment, Quiz & Tugas</div>
                    </div>
                </div>

                
                <div class="col-4">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold">Assessment</div>
                        <div class="fs-3 fw-bold text-dark mt-1">
                            <?php echo e($user->assessmentResults->count()); ?>

                        </div>
                        <div class="text-muted small">percobaan</div>
                        <div class="text-muted small mt-1">
                            Rata²:
                            <strong><?php echo e($user->assessmentResults->avg('score') ? round($user->assessmentResults->avg('score'), 1) : '-'); ?></strong>
                        </div>
                    </div>
                </div>

                
                <div class="col-4">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold">Quiz</div>
                        <div class="fs-3 fw-bold text-dark mt-1">
                            <?php echo e($user->quizAttempts->count()); ?>

                        </div>
                        <div class="text-muted small">percobaan</div>
                        <div class="text-muted small mt-1">
                            Rata²:
                            <strong><?php echo e($user->quizAttempts->avg('score') ? round($user->quizAttempts->avg('score'), 1) : '-'); ?></strong>
                        </div>
                    </div>
                </div>

                
                <div class="col-4">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="text-muted small fw-semibold">Tugas</div>
                        <div class="fs-3 fw-bold text-dark mt-1">
                            <?php echo e($user->tugasSubmits->count()); ?>

                        </div>
                        <div class="text-muted small">dikumpulkan</div>
                        <div class="text-muted small mt-1">
                            Rata²:
                            <strong><?php echo e($user->tugasSubmits->whereNotNull('nilai')->avg('nilai') ? round($user->tugasSubmits->whereNotNull('nilai')->avg('nilai'), 1) : '-'); ?></strong>
                        </div>
                    </div>
                </div>

            </div>

            
            <?php if($user->assessmentResults->count()): ?>
                <div class="card border-0 shadow-sm rounded-3 p-3">
                    <h6 class="fw-bold mb-3">Riwayat Assessment</h6>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Assessment</th>
                                    <th width="80">Skor</th>
                                    <th width="80">Status</th>
                                    <th width="120">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $user->assessmentResults->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($result->assessment->title ?? '-'); ?></td>
                                        <td class="fw-bold <?php echo e($result->score >= 75 ? 'text-success' : 'text-danger'); ?>">
                                            <?php echo e($result->score); ?>

                                        </td>
                                        <td>
                                            <?php if($result->passed ?? $result->score >= 75): ?>
                                                <span class="badge bg-success">Lulus</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Tidak Lulus</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-muted small">
                                            <?php echo e($result->created_at->format('d M Y')); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\admin\users\show.blade.php ENDPATH**/ ?>