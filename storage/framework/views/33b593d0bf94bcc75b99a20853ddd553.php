

<?php $__env->startSection('content'); ?>
<div class="page-shell">

    <div class="page-header mb-4">
        <h1>Tambah Soal</h1>
        <p>Tambahkan soal baru untuk assessment: <strong><?php echo e($assessment->title); ?></strong></p>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <form action="<?php echo e(route('guru.assessment.questions.store', $assessment->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>

            
            <div class="mb-4">
                <label class="form-label fw-semibold">Tipe Soal <span class="text-danger">*</span></label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="type_pg" value="pilihan_ganda"
                            <?php echo e(old('type', 'pilihan_ganda') === 'pilihan_ganda' ? 'checked' : ''); ?>

                            onchange="toggleTipe(this.value)">
                        <label class="form-check-label fw-semibold" for="type_pg">
                            Pilihan Ganda
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="type_essay" value="essay"
                            <?php echo e(old('type') === 'essay' ? 'checked' : ''); ?>

                            onchange="toggleTipe(this.value)">
                        <label class="form-check-label fw-semibold" for="type_essay">
                            Essay
                        </label>
                    </div>
                </div>
            </div>

            
            <div class="mb-4">
                <label class="form-label fw-semibold">Pertanyaan <span class="text-danger">*</span></label>
                <textarea name="question" rows="3" class="form-control <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    placeholder="Tulis pertanyaan di sini..."><?php echo e(old('question')); ?></textarea>
                <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div id="section_pg">
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pilihan A <span class="text-danger">*</span></label>
                        <input type="text" name="option_a" class="form-control <?php $__errorArgs = ['option_a'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Isi pilihan A" value="<?php echo e(old('option_a')); ?>">
                        <?php $__errorArgs = ['option_a'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pilihan B <span class="text-danger">*</span></label>
                        <input type="text" name="option_b" class="form-control <?php $__errorArgs = ['option_b'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Isi pilihan B" value="<?php echo e(old('option_b')); ?>">
                        <?php $__errorArgs = ['option_b'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pilihan C <span class="text-danger">*</span></label>
                        <input type="text" name="option_c" class="form-control <?php $__errorArgs = ['option_c'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Isi pilihan C" value="<?php echo e(old('option_c')); ?>">
                        <?php $__errorArgs = ['option_c'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pilihan D <span class="text-danger">*</span></label>
                        <input type="text" name="option_d" class="form-control <?php $__errorArgs = ['option_d'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Isi pilihan D" value="<?php echo e(old('option_d')); ?>">
                        <?php $__errorArgs = ['option_d'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Jawaban Benar <span class="text-danger">*</span></label>
                    <select name="correct_answer" class="form-select <?php $__errorArgs = ['correct_answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">-- Pilih Jawaban Benar --</option>
                        <option value="A" <?php echo e(old('correct_answer') === 'A' ? 'selected' : ''); ?>>A</option>
                        <option value="B" <?php echo e(old('correct_answer') === 'B' ? 'selected' : ''); ?>>B</option>
                        <option value="C" <?php echo e(old('correct_answer') === 'C' ? 'selected' : ''); ?>>C</option>
                        <option value="D" <?php echo e(old('correct_answer') === 'D' ? 'selected' : ''); ?>>D</option>
                    </select>
                    <?php $__errorArgs = ['correct_answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            
            <div id="section_essay" style="display:none;">
                <div class="alert alert-info rounded-3">
                    <i class="fas fa-info-circle me-2"></i>
                    Soal essay akan dinilai secara manual oleh guru setelah siswa mengumpulkan jawaban.
                </div>
            </div>

            <div class="d-flex flex-wrap gap-3">
                <button type="submit" class="btn-premium">Simpan Soal</button>
                <a href="<?php echo e(route('guru.assessment.show', $assessment->id)); ?>" class="btn-soft">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
function toggleTipe(value) {
    const pg = document.getElementById('section_pg');
    const essay = document.getElementById('section_essay');
    if (value === 'essay') {
        pg.style.display = 'none';
        essay.style.display = 'block';
    } else {
        pg.style.display = 'block';
        essay.style.display = 'none';
    }
}

// Jalankan saat halaman load
document.addEventListener('DOMContentLoaded', function() {
    const selected = document.querySelector('input[name="type"]:checked');
    if (selected) toggleTipe(selected.value);
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u748564652/domains/englishfornusantara.com/proyek-pertama-saya/resources/views/guru/assessment/questions/create.blade.php ENDPATH**/ ?>