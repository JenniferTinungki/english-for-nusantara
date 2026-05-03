

<?php $__env->startSection('content'); ?>
<div class="page-shell">

    <div class="glass-card-strong p-5 mx-auto" style="max-width:900px;">

        <h1 class="fw-bold mb-4 text-dark">
            Edit Quiz
        </h1>

        <form action="<?php echo e(route('guru.quiz.update', $quiz->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label class="form-label fw-semibold">Judul Quiz</label>
                <input type="text"
                       name="judul"
                       class="form-control form-control-lg"
                       value="<?php echo e(old('judul', $quiz->judul)); ?>"
                       required>
                <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          rows="5"
                          class="form-control"><?php echo e(old('deskripsi', $quiz->deskripsi)); ?></textarea>
                <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Tipe</label>
                <select name="tipe" class="form-select">
                    <option value="quiz" <?php echo e(old('tipe', $quiz->tipe) == 'quiz' ? 'selected' : ''); ?>>Quiz</option>
                    <option value="latihan" <?php echo e(old('tipe', $quiz->tipe) == 'latihan' ? 'selected' : ''); ?>>Latihan</option>
                    <option value="ulangan" <?php echo e(old('tipe', $quiz->tipe) == 'ulangan' ? 'selected' : ''); ?>>Ulangan</option>
                </select>
                <?php $__errorArgs = ['tipe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <?php if(isset($quiz->is_active)): ?>
            <div class="form-check mb-4">
                <input class="form-check-input"
                       type="checkbox"
                       name="is_active"
                       id="is_active"
                       <?php echo e($quiz->is_active ? 'checked' : ''); ?>>

                <label class="form-check-label" for="is_active">
                    Aktifkan Quiz
                </label>
            </div>
            <?php endif; ?>

            <div class="d-flex gap-3 flex-wrap">
                <button type="submit" class="btn-premium">
                    Update Quiz
                </button>

                <a href="<?php echo e(route('guru.quiz.show', $quiz->id)); ?>"
                   class="btn btn-light rounded-pill px-4">
                    Kembali
                </a>
            </div>

        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\guru\quiz\edit.blade.php ENDPATH**/ ?>