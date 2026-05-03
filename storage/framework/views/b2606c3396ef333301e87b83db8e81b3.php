

<?php $__env->startSection('content'); ?>
<div class="page-shell">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="font-size:2.5rem;font-weight:800;letter-spacing:-1px;margin-bottom:8px;color:#102040;">
                Kelola Assessment
            </h1>
            <p style="color:#6e7b91;font-size:1.05rem;margin:0;max-width:700px;">
                Buat dan kelola assessment siswa dengan tampilan modern dan premium.
            </p>
        </div>

        <a href="<?php echo e(route('guru.assessment.create')); ?>" class="btn-premium">
            + Tambah Assessment
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="glass-card-strong p-3 mb-4" style="border-left:5px solid #16a34a;">
            <strong style="color:#15803d;"><?php echo e(session('success')); ?></strong>
        </div>
    <?php endif; ?>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div class="text-muted fw-semibold">Total Assessment</div>
                <div class="display-6 fw-bold text-dark mt-2"><?php echo e($totalAssessment ?? 0); ?></div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div class="text-muted fw-semibold">Assessment Aktif</div>
                <div class="display-6 fw-bold text-success mt-2"><?php echo e($assessmentAktif ?? 0); ?></div>
            </div>
        </div>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <?php if($assessments->count()): ?>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="140">Status</th>
                            <th class="text-end" width="260">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $assessments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $assessment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($assessments->firstItem() + $index); ?></td>
                                <td class="fw-bold text-dark"><?php echo e($assessment->title); ?></td>
                                <td class="text-muted">
                                    <?php echo e(\Illuminate\Support\Str::limit($assessment->description ?: '-', 90)); ?>

                                </td>
                                <td>
                                    <?php if(isset($assessment->is_active) && $assessment->is_active): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php elseif(isset($assessment->is_active)): ?>
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-primary">Tersedia</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="<?php echo e(route('guru.assessment.show', $assessment->id)); ?>"
                                       class="btn btn-sm btn-light rounded-pill px-3">
                                        Detail
                                    </a>

                                    <a href="<?php echo e(route('guru.assessment.edit', $assessment->id)); ?>"
                                       class="btn btn-sm btn-light rounded-pill px-3">
                                        Edit
                                    </a>

                                    <form action="<?php echo e(route('guru.assessment.destroy', $assessment->id)); ?>"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin hapus assessment ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <?php echo e($assessments->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <div style="font-size:3rem;">📝</div>
                <h4 class="fw-bold mt-3">Belum Ada Assessment</h4>
                <p class="text-muted">Tambahkan assessment pertama untuk mulai evaluasi siswa.</p>
                <a href="<?php echo e(route('guru.assessment.create')); ?>" class="btn-premium mt-2">
                    + Tambah Assessment
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\guru\assessment\index.blade.php ENDPATH**/ ?>