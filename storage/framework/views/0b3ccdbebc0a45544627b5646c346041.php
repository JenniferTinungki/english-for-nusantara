

<?php $__env->startSection('title', 'Tugas - ' . ($tugas->judul ?? 'Tanpa Judul')); ?>

<?php $__env->startSection('content'); ?>
<?php
    $isSubmitted = !empty($submission);
    $deadline = !empty($tugas->deadline) ? \Carbon\Carbon::parse($tugas->deadline) : null;
    $isLate = $deadline ? now()->gt($deadline) : false;
?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <a href="<?php echo e(route('siswa.tugas.index')); ?>"
       class="inline-flex items-center gap-2 text-blue-700 font-bold mb-6 hover:text-blue-800 transition">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali ke daftar tugas
    </a>

    <section class="relative overflow-hidden rounded-[32px] shadow-2xl mb-8">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-800 via-blue-700 to-indigo-600"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.18),transparent_30%)]"></div>

        <div class="relative z-10 p-6 lg:p-10 text-white">
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
                <div class="max-w-3xl">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/15 font-bold mb-5 backdrop-blur-sm">
                        <i class="fa-solid fa-folder-open"></i>
                        Detail Tugas
                    </div>

                    <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-4">
                        <?php echo e($tugas->judul ?? 'Tanpa Judul'); ?>

                    </h1>

                    <p class="text-white/85 text-base md:text-lg leading-8">
                        <?php echo e($tugas->deskripsi ?? 'Kerjakan tugas ini sesuai instruksi yang diberikan guru.'); ?>

                    </p>

                    <div class="flex flex-wrap gap-3 mt-6">
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/10 text-white/90 font-semibold">
                            <i class="fa-solid fa-calendar-days"></i>
                            Deadline:
                            <?php echo e($deadline ? $deadline->translatedFormat('d F Y H:i') : '-'); ?>

                        </span>

                        <?php if($isSubmitted): ?>
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-400/20 border border-emerald-200/20 text-white font-semibold">
                                <i class="fa-solid fa-circle-check"></i>
                                Sudah Submit
                            </span>
                        <?php elseif($isLate): ?>
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-400/20 border border-red-200/20 text-white font-semibold">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                Deadline Lewat
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-400/20 border border-amber-200/20 text-white font-semibold">
                                <i class="fa-solid fa-clock"></i>
                                Menunggu Pengumpulan
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="w-full max-w-sm rounded-[28px] bg-white/10 border border-white/15 backdrop-blur p-5">
                    <h3 class="text-xl font-extrabold mb-4">Ringkasan</h3>

                    <div class="space-y-4">
                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-white/70 text-sm mb-1">Status</p>
                            <h4 class="font-extrabold text-lg">
                                <?php if($isSubmitted): ?>
                                    Sudah Dikumpulkan
                                <?php elseif($isLate): ?>
                                    Terlambat / Belum Submit
                                <?php else: ?>
                                    Belum Dikumpulkan
                                <?php endif; ?>
                            </h4>
                        </div>

                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-white/70 text-sm mb-1">Waktu Deadline</p>
                            <h4 class="font-extrabold text-lg">
                                <?php echo e($deadline ? $deadline->format('d-m-Y H:i') : '-'); ?>

                            </h4>
                        </div>

                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-white/70 text-sm mb-1">Nilai</p>
                            <h4 class="font-extrabold text-lg">
                                <?php echo e($submission->nilai ?? '-'); ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <section class="bg-white rounded-[28px] border border-slate-200 shadow-lg p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <i class="fa-solid fa-file-lines text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-extrabold text-slate-800">Instruksi Tugas</h3>
                        <p class="text-slate-500">Baca instruksi dengan teliti sebelum mengumpulkan.</p>
                    </div>
                </div>

                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5 text-slate-700 leading-8 whitespace-pre-line">
                    <?php echo e($tugas->deskripsi ?? 'Instruksi tugas belum tersedia.'); ?>

                </div>

                <?php if(!empty($tugas->file)): ?>
                    <div class="mt-5">
                        <a href="<?php echo e(asset('storage/' . $tugas->file)); ?>"
                           target="_blank"
                           class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold transition">
                            <i class="fa-solid fa-download"></i>
                            Download Lampiran Tugas
                        </a>
                    </div>
                <?php endif; ?>
            </section>

            <?php if($isSubmitted): ?>
                <section class="bg-white rounded-[28px] border border-slate-200 shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <i class="fa-solid fa-paper-plane text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-extrabold text-slate-800">Hasil Pengumpulan</h3>
                            <p class="text-slate-500">Detail tugas yang sudah kamu kirim.</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5">
                            <p class="text-slate-500 mb-2">Waktu Submit</p>
                            <h4 class="text-lg font-extrabold text-slate-800">
                                <?php echo e(!empty($submission->created_at) ? \Carbon\Carbon::parse($submission->created_at)->format('d-m-Y H:i') : '-'); ?>

                            </h4>
                        </div>

                        <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5">
                            <p class="text-slate-500 mb-2">Nilai</p>
                            <h4 class="text-lg font-extrabold text-slate-800">
                                <?php echo e($submission->nilai ?? '-'); ?>

                            </h4>
                        </div>
                    </div>

                    <?php if(!empty($submission->jawaban)): ?>
                        <div class="mt-5 rounded-2xl bg-slate-50 border border-slate-200 p-5">
                            <p class="text-slate-500 mb-2 font-semibold">Jawaban / Catatan</p>
                            <div class="text-slate-700 whitespace-pre-line leading-8">
                                <?php echo e($submission->jawaban); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($submission->file)): ?>
                        <div class="mt-5">
                            <a href="<?php echo e(asset('storage/' . $submission->file)); ?>"
                               target="_blank"
                               class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition">
                                <i class="fa-solid fa-file-arrow-down"></i>
                                Lihat File Pengumpulan
                            </a>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endif; ?>
        </div>

        <div class="space-y-6">
            <section class="bg-white rounded-[28px] border border-slate-200 shadow-lg p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center">
                        <i class="fa-solid fa-upload text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-extrabold text-slate-800">Pengumpulan</h3>
                        <p class="text-slate-500">Upload jawaban tugasmu di sini.</p>
                    </div>
                </div>

                <?php if(session('success')): ?>
                    <div class="mb-4 rounded-2xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-emerald-700 font-semibold">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="mb-4 rounded-2xl bg-red-50 border border-red-200 px-4 py-3 text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(!$isSubmitted): ?>
                    <form action="<?php echo e(route('siswa.tugas.submit', $tugas->id)); ?>"
                          method="POST"
                          enctype="multipart/form-data"
                          class="space-y-4">
                        <?php echo csrf_field(); ?>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Jawaban / Catatan</label>
                            <textarea
                                name="jawaban"
                                rows="6"
                                class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Tulis jawaban atau catatan tugas di sini..."><?php echo e(old('jawaban')); ?></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Upload File</label>
                            <input
                                type="file"
                                name="file"
                                class="w-full rounded-2xl border border-slate-300 px-4 py-3 bg-white">
                        </div>

                        <button
                            type="submit"
                            class="w-full px-5 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold shadow-lg transition">
                            <i class="fa-solid fa-paper-plane mr-2"></i>
                            Kirim Tugas
                        </button>
                    </form>
                <?php else: ?>
                    <div class="rounded-2xl bg-emerald-50 border border-emerald-200 px-4 py-4 text-emerald-700 font-semibold">
                        Kamu sudah mengumpulkan tugas ini.
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\siswa\tugas\show.blade.php ENDPATH**/ ?>