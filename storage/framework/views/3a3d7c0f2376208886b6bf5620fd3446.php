

<?php $__env->startSection('content'); ?>
<div class="page-shell">
    <div class="glass-card-strong p-5 mx-auto" style="max-width:1000px;">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h1 class="fw-bold mb-2 text-dark">Edit Soal Quiz</h1>
                <p class="text-muted mb-0">Quiz: <?php echo e($quiz->judul); ?></p>
            </div>

            <a href="<?php echo e(route('guru.quiz.show', $quiz->id)); ?>"
               class="btn btn-light rounded-pill px-4">
                Kembali
            </a>
        </div>

        <form action="<?php echo e(route('guru.quiz.questions.update', [$quiz->id, $question->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label class="form-label fw-semibold">Pertanyaan</label>
                <textarea name="question" rows="4" class="form-control" required><?php echo e(old('question', $question->question)); ?></textarea>
                <?php $__errorArgs = ['question'];
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

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan A</label>
                    <input type="text" name="option_a" class="form-control" value="<?php echo e(old('option_a', $question->option_a)); ?>" required>
                    <?php $__errorArgs = ['option_a'];
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

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan B</label>
                    <input type="text" name="option_b" class="form-control" value="<?php echo e(old('option_b', $question->option_b)); ?>" required>
                    <?php $__errorArgs = ['option_b'];
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

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan C</label>
                    <input type="text" name="option_c" class="form-control" value="<?php echo e(old('option_c', $question->option_c)); ?>" required>
                    <?php $__errorArgs = ['option_c'];
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

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pilihan D</label>
                    <input type="text" name="option_d" class="form-control" value="<?php echo e(old('option_d', $question->option_d)); ?>" required>
                    <?php $__errorArgs = ['option_d'];
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
            </div>

            <div class="mt-4">
                <label class="form-label fw-semibold">Jawaban Benar</label>
                <select name="correct_answer" class="form-select" required>
                    <option value="a" <?php echo e(old('correct_answer', $question->correct_answer) == 'a' ? 'selected' : ''); ?>>A</option>
                    <option value="b" <?php echo e(old('correct_answer', $question->correct_answer) == 'b' ? 'selected' : ''); ?>>B</option>
                    <option value="c" <?php echo e(old('correct_answer', $question->correct_answer) == 'c' ? 'selected' : ''); ?>>C</option>
                    <option value="d" <?php echo e(old('correct_answer', $question->correct_answer) == 'd' ? 'selected' : ''); ?>>D</option>
                </select>
                <?php $__errorArgs = ['correct_answer'];
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

            <div class="d-flex gap-3 flex-wrap mt-4">
                <button type="submit" class="btn-premium">
                    Update Soal
                </button>

                <a href="<?php echo e(route('guru.quiz.show', $quiz->id)); ?>"
                   class="btn btn-light rounded-pill px-4">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\guru\quiz\questions\edit.blade.php ENDPATH**/ ?>