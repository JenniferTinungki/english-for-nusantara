

<?php $__env->startSection('content'); ?>
<div class="page-shell">
    <div class="page-header">
        <h1>Edit Tugas</h1>
        <p>Perbarui tugas agar tetap relevan, jelas, dan siap dibagikan ke siswa.</p>
    </div>

    <div class="glass-card-strong p-4 p-lg-5">
        <form action="<?php echo e(route('guru.tugas.update', $tugas->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="row g-4">
                <div class="col-12">
                    <label class="form-label">Judul Tugas</label>
                    <input type="text" name="judul" class="form-control"
                           value="<?php echo e(old('judul', $tugas->judul)); ?>"
                           placeholder="Contoh: Tugas Bahasa Inggris Bab 1">
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

                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="6" class="form-control"
                              placeholder="Tulis penjelasan tugas untuk siswa..."><?php echo e(old('deskripsi', $tugas->deskripsi)); ?></textarea>
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

                <div class="col-md-6">
                    <label class="form-label">Deadline</label>
                    <input type="datetime-local" name="deadline" class="form-control"
                           value="<?php echo e(old('deadline', !empty($tugas->deadline) ? \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d\TH:i') : '')); ?>">
                    <?php $__errorArgs = ['deadline'];
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
                    <label class="form-label">Lampiran / File Materi</label>
                    <input type="file" name="file_materi" class="form-control">
                    <?php if(!empty($tugas->file_materi)): ?>
                        <small class="d-block mt-2">
                            <a href="<?php echo e(asset('storage/' . $tugas->file_materi)); ?>" target="_blank">
                                Lihat file saat ini
                            </a>
                        </small>
                    <?php endif; ?>
                    <?php $__errorArgs = ['file_materi'];
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

                <?php if(isset($tugas->is_active)): ?>
                <div class="col-12">
                    <div class="form-check mt-2">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                               <?php echo e($tugas->is_active ? 'checked' : ''); ?>>
                        <label class="form-check-label fw-semibold" for="is_active">
                            Aktifkan tugas
                        </label>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <button type="submit" class="btn-premium">Update Tugas</button>
                <a href="<?php echo e(route('guru.tugas.index')); ?>" class="btn-soft">Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\guru\tugas\edit.blade.php ENDPATH**/ ?>