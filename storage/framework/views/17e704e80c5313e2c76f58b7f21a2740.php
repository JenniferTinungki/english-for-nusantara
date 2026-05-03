

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Kerjakan Assessment</h1>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h4><?php echo e($assessment->title); ?></h4>
            <p class="mb-1"><strong>Durasi:</strong> <?php echo e($assessment->duration); ?> menit</p>
            <p class="mb-0"><strong>Mulai:</strong> <?php echo e($attempt->started_at ? $attempt->started_at->format('d M Y H:i') : '-'); ?></p>
        </div>
    </div>

    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $savedAnswer = $attempt->answers->firstWhere('question_id', $question->id);
        ?>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h5>Soal <?php echo e($index + 1); ?></h5>
                <p><?php echo e($question->question); ?></p>

                <form action="<?php echo e(route('siswa.assessment.saveAnswer', $assessment->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="question_id" value="<?php echo e($question->id); ?>">

                    <?php if($question->question_type === 'mcq' || $question->question_type === 'true_false'): ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban_siswa" value="A"
                                <?php echo e(optional($savedAnswer)->jawaban_siswa == 'A' ? 'checked' : ''); ?>>
                            <label class="form-check-label"><?php echo e($question->option_a); ?></label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban_siswa" value="B"
                                <?php echo e(optional($savedAnswer)->jawaban_siswa == 'B' ? 'checked' : ''); ?>>
                            <label class="form-check-label"><?php echo e($question->option_b); ?></label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban_siswa" value="C"
                                <?php echo e(optional($savedAnswer)->jawaban_siswa == 'C' ? 'checked' : ''); ?>>
                            <label class="form-check-label"><?php echo e($question->option_c); ?></label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="jawaban_siswa" value="D"
                                <?php echo e(optional($savedAnswer)->jawaban_siswa == 'D' ? 'checked' : ''); ?>>
                            <label class="form-check-label"><?php echo e($question->option_d); ?></label>
                        </div>
                    <?php elseif($question->question_type === 'essay'): ?>
                        <div class="mb-3">
                            <textarea name="jawaban_siswa" class="form-control" rows="4"><?php echo e(optional($savedAnswer)->jawaban_siswa); ?></textarea>
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-outline-primary btn-sm">
                        Simpan Jawaban
                    </button>
                </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <form action="<?php echo e(route('siswa.assessment.submit', $assessment->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-success"
            onclick="return confirm('Yakin ingin mengumpulkan assessment ini?')">
            Kumpulkan Assessment
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.siswa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\siswa\assessment\question.blade.php ENDPATH**/ ?>