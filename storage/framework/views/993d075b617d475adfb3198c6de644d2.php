

<?php $__env->startSection('content'); ?>
<div class="page-shell">

    
    <div class="position-relative overflow-hidden rounded-4 mb-5 p-5"
         style="background: linear-gradient(135deg, #1a56db 0%, #1e429f 100%); min-height: 200px;">
        <div class="position-relative z-1">
            <span class="badge bg-white bg-opacity-25 text-white fw-semibold px-3 py-2 rounded-pill mb-3 d-inline-block"
                  style="font-size:0.82rem; letter-spacing:1px;">
                ASSESSMENT BUILDER
            </span>
            <h1 class="fw-800 text-white mb-2" style="font-size:2.6rem; font-weight:800;">
                Edit Assessment
            </h1>
            <p class="text-white text-opacity-75 mb-0" style="max-width:620px; line-height:1.7;">
                Perbarui informasi assessment agar tetap relevan dan siap digunakan siswa.
            </p>
        </div>
    </div>

    <form action="<?php echo e(route('guru.assessment.update', $assessment->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="glass-card-strong p-4 p-lg-5 mb-4">
            <h4 class="fw-800 mb-1" style="font-size:1.3rem;">Informasi Utama</h4>
            <p class="text-muted mb-4">Lengkapi data dasar assessment.</p>

            <div class="mb-4">
                <label class="form-label fw-semibold">Judul Assessment <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control form-control-lg <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    placeholder="Contoh: Assessment Bab 1"
                    value="<?php echo e(old('title', $assessment->title)); ?>">
                <?php $__errorArgs = ['title'];
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

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" rows="4" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    placeholder="Tulis deskripsi singkat tentang assessment ini..."><?php echo e(old('description', $assessment->description)); ?></textarea>
                <?php $__errorArgs = ['description'];
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

            <div class="mb-2">
                <label class="form-label fw-semibold">Pilih Materi</label>
                <select name="materi_id" class="form-select form-select-lg <?php $__errorArgs = ['materi_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">-- Pilih Materi --</option>
                    <?php $__currentLoopData = $materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($m->id); ?>"
                            <?php echo e(old('materi_id', $assessment->materi_id) == $m->id ? 'selected' : ''); ?>>
                            Bab <?php echo e($m->bab); ?> - <?php echo e($m->judul); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['materi_id'];
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

        
        <div class="glass-card-strong p-4 p-lg-5 mb-4">
            <h4 class="fw-800 mb-1" style="font-size:1.3rem;">Pengaturan Assessment</h4>
            <p class="text-muted mb-4">Atur deadline, durasi, dan nilai minimal kelulusan.</p>

            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Deadline</label>
                    <input type="datetime-local" name="deadline" class="form-control <?php $__errorArgs = ['deadline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('deadline', $assessment->deadline ? $assessment->deadline->format('Y-m-d\TH:i') : '')); ?>">
                    <?php $__errorArgs = ['deadline'];
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

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Durasi (menit)</label>
                    <input type="number" name="duration" class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="30" value="<?php echo e(old('duration', $assessment->duration)); ?>" min="1" max="300">
                    <?php $__errorArgs = ['duration'];
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

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Passing Score</label>
                    <input type="number" name="passing_score" class="form-control <?php $__errorArgs = ['passing_score'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="75" value="<?php echo e(old('passing_score', $assessment->passing_score)); ?>" min="0" max="100">
                    <?php $__errorArgs = ['passing_score'];
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
        </div>

        
        <div class="glass-card-strong p-4 p-lg-5 mb-4">
            <h4 class="fw-800 mb-1" style="font-size:1.3rem;">Opsi Tambahan</h4>
            <p class="text-muted mb-4">Atur perilaku assessment saat digunakan siswa.</p>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                                <?php echo e(old('is_active', $assessment->is_active) ? 'checked' : ''); ?>>
                            <label class="form-check-label fw-semibold" for="is_active">
                                Aktifkan Assessment
                            </label>
                        </div>
                        <p class="text-muted mb-0 mt-1" style="font-size:0.88rem; padding-left:1.5rem;">
                            Assessment bisa dilihat dan dikerjakan siswa.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100">
                        <div class="form-check">
                            <input type="checkbox" name="shuffle_questions" id="shuffle_questions" class="form-check-input"
                                <?php echo e(old('shuffle_questions', $assessment->shuffle_questions) ? 'checked' : ''); ?>>
                            <label class="form-check-label fw-semibold" for="shuffle_questions">
                                Acak Urutan Soal
                            </label>
                        </div>
                        <p class="text-muted mb-0 mt-1" style="font-size:0.88rem; padding-left:1.5rem;">
                            Soal akan ditampilkan dengan urutan acak.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100">
                        <div class="form-check">
                            <input type="checkbox" name="shuffle_answers" id="shuffle_answers" class="form-check-input"
                                <?php echo e(old('shuffle_answers', $assessment->shuffle_answers) ? 'checked' : ''); ?>>
                            <label class="form-check-label fw-semibold" for="shuffle_answers">
                                Acak Opsi Jawaban
                            </label>
                        </div>
                        <p class="text-muted mb-0 mt-1" style="font-size:0.88rem; padding-left:1.5rem;">
                            Pilihan jawaban ditampilkan secara acak.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100">
                        <div class="form-check">
                            <input type="checkbox" name="show_result_immediately" id="show_result_immediately" class="form-check-input"
                                <?php echo e(old('show_result_immediately', $assessment->show_result_immediately) ? 'checked' : ''); ?>>
                            <label class="form-check-label fw-semibold" for="show_result_immediately">
                                Tampilkan Hasil Otomatis
                            </label>
                        </div>
                        <p class="text-muted mb-0 mt-1" style="font-size:0.88rem; padding-left:1.5rem;">
                            Nilai bisa langsung dilihat setelah submit.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap gap-3">
            <button type="submit" class="btn-premium">Update Assessment</button>
            <a href="<?php echo e(route('guru.assessment.show', $assessment->id)); ?>" class="btn-soft">Kembali</a>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u748564652/domains/englishfornusantara.com/proyek-pertama-saya/resources/views/guru/assessment/edit.blade.php ENDPATH**/ ?>