

<?php $__env->startSection('content'); ?>
<div class="page-shell">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="font-size:2.5rem;font-weight:800;letter-spacing:-1px;margin-bottom:8px;color:#102040;">
                Detail Quiz
            </h1>
            <p style="color:#6e7b91;font-size:1.05rem;margin:0;max-width:700px;">
                Lihat detail quiz dan kelola soal quiz.
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="<?php echo e(route('guru.quiz.questions.create', $quiz->id)); ?>" class="btn-premium">
                + Tambah Soal
            </a>
            <a href="<?php echo e(route('guru.quiz.edit', $quiz->id)); ?>" class="btn btn-light rounded-pill px-4">
                Edit Quiz
            </a>
            <a href="<?php echo e(route('guru.quiz.index')); ?>" class="btn btn-light rounded-pill px-4">
                Kembali
            </a>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="glass-card-strong p-3 mb-4" style="border-left:5px solid #16a34a;">
            <strong style="color:#15803d;"><?php echo e(session('success')); ?></strong>
        </div>
    <?php endif; ?>

    <div class="glass-card-strong p-4 p-lg-5 mb-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="glass-card p-4 h-100">
                    <div class="mb-3">
                        <div class="text-muted fw-semibold mb-2">Judul Quiz</div>
                        <h2 class="fw-bold text-dark mb-0"><?php echo e($quiz->judul); ?></h2>
                    </div>

                    <div>
                        <div class="text-muted fw-semibold mb-2">Deskripsi</div>
                        <div class="text-secondary" style="line-height:1.9;">
                            <?php echo e($quiz->deskripsi ?: 'Tidak ada deskripsi quiz.'); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-card p-4 h-100">
                    <div class="mb-4">
                        <div class="text-muted fw-semibold mb-2">Tipe</div>
                        <span class="badge bg-info text-dark px-3 py-2 rounded-pill">
                            <?php echo e($quiz->tipe ?? 'quiz'); ?>

                        </span>
                    </div>

                    <div class="mb-4">
                        <div class="text-muted fw-semibold mb-2">Status</div>
                        <?php if(isset($quiz->is_active) && $quiz->is_active): ?>
                            <span class="badge bg-success px-3 py-2 rounded-pill">Aktif</span>
                        <?php elseif(isset($quiz->is_active)): ?>
                            <span class="badge bg-secondary px-3 py-2 rounded-pill">Nonaktif</span>
                        <?php else: ?>
                            <span class="badge bg-primary px-3 py-2 rounded-pill">Tersedia</span>
                        <?php endif; ?>
                    </div>

                    <div>
                        <div class="text-muted fw-semibold mb-2">Jumlah Soal</div>
                        <div class="fw-bold text-dark"><?php echo e($quiz->questions->count()); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-dark mb-1">Daftar Soal</h3>
                <p class="text-muted mb-0">Kelola soal pilihan ganda untuk quiz ini.</p>
            </div>
        </div>

        <?php if($quiz->questions->count()): ?>
            <div class="d-flex flex-column gap-3">
                <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-4 rounded-4 border bg-white shadow-sm">
                        <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap">
                            <div style="max-width: 800px;">
                                <div class="fw-bold text-primary mb-2">Soal <?php echo e($index + 1); ?></div>
                                <div class="fw-semibold text-dark mb-3"><?php echo e($question->question); ?></div>

                                <div class="small text-secondary" style="line-height:1.9;">
                                    <div>A. <?php echo e($question->option_a); ?></div>
                                    <div>B. <?php echo e($question->option_b); ?></div>
                                    <div>C. <?php echo e($question->option_c); ?></div>
                                    <div>D. <?php echo e($question->option_d); ?></div>
                                </div>

                                <div class="mt-3">
                                    <span class="badge bg-success rounded-pill px-3 py-2">
                                        Jawaban benar: <?php echo e(strtoupper($question->correct_answer)); ?>

                                    </span>
                                </div>
                            </div>

                            <div class="d-flex gap-2 flex-wrap">
                                <a href="<?php echo e(route('guru.quiz.questions.edit', [$quiz->id, $question->id])); ?>"
                                   class="btn btn-sm btn-light rounded-pill px-3">
                                    Edit
                                </a>

                                <form action="<?php echo e(route('guru.quiz.questions.destroy', [$quiz->id, $question->id])); ?>"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus soal ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <div style="font-size:3rem;">❓</div>
                <h4 class="fw-bold mt-3">Belum Ada Soal</h4>
                <p class="text-muted">Tambahkan soal pertama untuk quiz ini.</p>
                <a href="<?php echo e(route('guru.quiz.questions.create', $quiz->id)); ?>" class="btn-premium mt-2">
                    + Tambah Soal
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\guru\quiz\show.blade.php ENDPATH**/ ?>