

<?php $__env->startSection('title', 'Dashboard Siswa'); ?>

<?php $__env->startSection('content'); ?>
<?php
    $progress = min(max((int) ($progressPersen ?? 0), 0), 100);
    $quizSelesaiCount = (int) ($quizSelesai ?? 0);
    $totalMateriCount = (int) ($totalMateri ?? 0);
    $totalTugasCount = (int) ($totalTugas ?? 0);
    $totalAssessmentCount = (int) ($totalAssessment ?? 0);
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 fade-in">
    <div class="relative overflow-hidden rounded-[34px]">
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-blue-50 via-white to-indigo-50 rounded-[34px]"></div>
        <div class="absolute -top-24 -right-20 w-72 h-72 bg-blue-200/30 blur-3xl rounded-full -z-10"></div>
        <div class="absolute -bottom-24 -left-20 w-72 h-72 bg-indigo-200/30 blur-3xl rounded-full -z-10"></div>

        
        <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 mb-8 items-stretch">
            <div class="xl:col-span-3 relative overflow-hidden rounded-[30px] p-6 md:p-8 shadow-[0_20px_60px_rgba(37,99,235,0.18)] border border-white/60 bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-500 text-white min-h-[300px]">
                <div class="absolute top-0 right-0 w-72 h-72 bg-white/10 blur-3xl rounded-full"></div>
                <div class="absolute bottom-0 left-0 w-56 h-56 bg-indigo-300/20 blur-3xl rounded-full"></div>

                <div class="relative z-10 h-full flex flex-col justify-between">
                    <div class="max-w-3xl">
                        <span class="inline-flex items-center gap-2 rounded-full bg-white/15 border border-white/20 px-4 py-2 text-sm font-semibold backdrop-blur">
                            <i class="fa-solid fa-graduation-cap"></i>
                            Student Dashboard
                        </span>

                        <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mt-5 mb-3">
                            Selamat Datang, <?php echo e(Auth::user()->name); ?> 👋
                        </h1>

                        <p class="text-blue-100 text-base md:text-xl leading-8 max-w-2xl">
                            Lanjutkan pembelajaran Bahasa Inggris hari ini dengan tampilan dashboard yang lebih modern, rapi, dan nyaman digunakan.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="<?php echo e(route('siswa.materi.index')); ?>"
                               class="inline-flex items-center gap-2 rounded-2xl bg-white text-blue-700 font-bold px-6 py-3 shadow-lg hover:bg-blue-50 transition">
                                <i class="fa-solid fa-book-open"></i>
                                Mulai Belajar
                            </a>

                            <a href="<?php echo e(route('siswa.progress.index')); ?>"
                               class="inline-flex items-center gap-2 rounded-2xl bg-white/10 border border-white/20 text-white font-semibold px-6 py-3 backdrop-blur hover:bg-white/20 transition">
                                <i class="fa-solid fa-chart-line"></i>
                                Lihat Progress
                            </a>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-wrap items-center gap-3 text-sm text-blue-100">
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 border border-white/15">
                            <i class="fa-solid fa-book"></i>
                            <?php echo e($totalMateriCount); ?> Materi
                        </div>
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 border border-white/15">
                            <i class="fa-solid fa-circle-check"></i>
                            <?php echo e($quizSelesaiCount); ?> Quiz Selesai
                        </div>
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 border border-white/15">
                            <i class="fa-solid fa-chart-pie"></i>
                            <?php echo e($progress); ?>% Progress
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="rounded-[30px] border border-slate-200/70 bg-white/80 backdrop-blur-xl shadow-[0_20px_50px_rgba(15,23,42,0.08)] p-6 flex flex-col justify-between min-h-[300px]">
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Hari Ini</span>
                        <div class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <i class="fa-regular fa-calendar-days text-lg"></i>
                        </div>
                    </div>

                    <h3 class="text-4xl font-black text-slate-800 leading-tight">
                        <?php echo e(now()->format('d M')); ?>

                    </h3>
                    <h4 class="text-4xl font-black text-slate-800 leading-tight">
                        <?php echo e(now()->format('Y')); ?>

                    </h4>
                    <p class="text-slate-500 text-lg mt-3">
                        <?php echo e(now()->translatedFormat('l')); ?>

                    </p>
                </div>

                <div class="mt-8 rounded-2xl bg-slate-50 border border-slate-100 p-4">
                    <div class="flex items-center justify-between text-sm mb-2">
                        <span class="font-semibold text-slate-700">Progress Belajar</span>
                        <span class="font-bold text-blue-600"><?php echo e($progress); ?>%</span>
                    </div>
                    <div class="h-3 rounded-full bg-slate-200 overflow-hidden">
                        <div class="h-full rounded-full bg-gradient-to-r from-blue-500 to-indigo-500" style="width: <?php echo e($progress); ?>%"></div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 mb-8">
            <div class="rounded-[26px] border border-slate-200/70 bg-white/90 backdrop-blur-xl p-5 shadow-[0_15px_45px_rgba(15,23,42,0.06)] hover:-translate-y-1 transition">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-book"></i>
                </div>
                <p class="text-xs font-semibold text-slate-400 uppercase mb-2">Materi</p>
                <h3 class="text-4xl font-black text-slate-800"><?php echo e($totalMateriCount); ?></h3>
                <p class="text-sm text-slate-500 mt-2">Total materi tersedia</p>
            </div>

            <div class="rounded-[26px] border border-slate-200/70 bg-white/90 backdrop-blur-xl p-5 shadow-[0_15px_45px_rgba(15,23,42,0.06)] hover:-translate-y-1 transition">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <p class="text-xs font-semibold text-slate-400 uppercase mb-2">Quiz</p>
                <h3 class="text-4xl font-black text-slate-800"><?php echo e($quizSelesaiCount); ?></h3>
                <p class="text-sm text-slate-500 mt-2">Quiz yang sudah selesai</p>
            </div>

            <div class="rounded-[26px] border border-slate-200/70 bg-white/90 backdrop-blur-xl p-5 shadow-[0_15px_45px_rgba(15,23,42,0.06)] hover:-translate-y-1 transition">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-file-lines"></i>
                </div>
                <p class="text-xs font-semibold text-slate-400 uppercase mb-2">Tugas</p>
                <h3 class="text-4xl font-black text-slate-800"><?php echo e($totalTugasCount); ?></h3>
                <p class="text-sm text-slate-500 mt-2">Total tugas tersedia</p>
            </div>

            <div class="rounded-[26px] border border-slate-200/70 bg-white/90 backdrop-blur-xl p-5 shadow-[0_15px_45px_rgba(15,23,42,0.06)] hover:-translate-y-1 transition">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
                <p class="text-xs font-semibold text-slate-400 uppercase mb-2">Assessment</p>
                <h3 class="text-4xl font-black text-slate-800"><?php echo e($totalAssessmentCount); ?></h3>
                <p class="text-sm text-slate-500 mt-2">Assessment tersedia</p>
            </div>

            <div class="rounded-[26px] border border-slate-200/70 bg-white/90 backdrop-blur-xl p-5 shadow-[0_15px_45px_rgba(15,23,42,0.06)] hover:-translate-y-1 transition">
                <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <p class="text-xs font-semibold text-slate-400 uppercase mb-2">Progress</p>
                <h3 class="text-4xl font-black text-slate-800"><?php echo e($progress); ?>%</h3>
                <p class="text-sm text-slate-500 mt-2">Kemajuan pembelajaran</p>
            </div>
        </div>

        
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 items-start">
            
            <div class="xl:col-span-2 space-y-6">
                
                <div class="rounded-[30px] overflow-hidden relative p-7 md:p-8 text-white shadow-[0_20px_60px_rgba(79,70,229,0.25)] bg-gradient-to-br from-blue-700 via-blue-600 to-violet-500 min-h-[300px]">
                    <div class="absolute top-0 right-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-300/20 rounded-full blur-3xl"></div>

                    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8 h-full">
                        <div class="max-w-2xl">
                            <p class="inline-flex items-center gap-2 rounded-full bg-white/15 border border-white/20 px-4 py-2 text-sm font-semibold mb-5">
                                <i class="fa-solid fa-bolt"></i>
                                Lanjutkan Pembelajaran
                            </p>

                            <h2 class="text-3xl md:text-4xl font-extrabold mb-4 leading-tight">
                                <?php echo e($materiTerbaru->judul ?? 'Belum ada materi terbaru'); ?>

                            </h2>

                            <p class="text-blue-100 text-lg leading-8 mb-6">
                                <?php echo e($materiTerbaru->deskripsi ?? 'Materi terbaru akan muncul di sini.'); ?>

                            </p>

                            <?php if(isset($materiTerbaru)): ?>
                                <div class="flex flex-wrap gap-3">
                                    <a href="<?php echo e(route('siswa.materi.show', $materiTerbaru->id)); ?>"
                                       class="inline-flex items-center justify-center rounded-2xl bg-white text-blue-700 font-bold px-6 py-3 hover:bg-slate-100 transition">
                                        Buka Materi
                                    </a>

                                    <a href="<?php echo e(route('siswa.materi.index')); ?>"
                                       class="inline-flex items-center justify-center rounded-2xl bg-white/10 border border-white/20 text-white font-semibold px-6 py-3 hover:bg-white/20 transition">
                                        Lihat Semua Materi
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="w-full lg:w-60">
                            <div class="rounded-[28px] bg-white/10 border border-white/20 backdrop-blur-xl p-6 text-center">
                                <div class="text-sm text-blue-100 mb-2">Progress Saat Ini</div>
                                <div class="text-5xl font-black"><?php echo e($progress); ?>%</div>
                                <div class="h-3 rounded-full bg-white/20 overflow-hidden mt-4">
                                    <div class="h-full rounded-full bg-white" style="width: <?php echo e($progress); ?>%"></div>
                                </div>
                                <p class="text-blue-100 text-sm mt-4">Terus tingkatkan hasil belajarmu</p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="rounded-[30px] border border-slate-200/70 bg-white/90 backdrop-blur-xl p-6 lg:p-8 shadow-[0_20px_50px_rgba(15,23,42,0.08)]">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-slate-800">Tugas Terbaru</h3>
                            <p class="text-slate-500 mt-1">Lanjutkan tugas yang perlu kamu selesaikan</p>
                        </div>
                        <a href="<?php echo e(route('siswa.tugas.index')); ?>"
                           class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-semibold">
                            Lihat Semua
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="space-y-4">
                        <?php $__empty_1 = true; $__currentLoopData = $tugasTerbaru ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tugas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="rounded-[24px] border border-slate-200 bg-gradient-to-r from-white to-slate-50 p-5 hover:shadow-lg transition">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                    <div class="flex items-start gap-4">
                                        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                            <i class="fa-solid fa-file-lines text-xl"></i>
                                        </div>

                                        <div>
                                            <h4 class="text-lg md:text-xl font-bold text-slate-800">
                                                <?php echo e($tugas->judul); ?>

                                            </h4>
                                            <p class="text-slate-500 mt-1">
                                                Deadline:
                                                <?php echo e($tugas->deadline ? \Carbon\Carbon::parse($tugas->deadline)->format('d M Y • H:i') : 'Tidak ditentukan'); ?>

                                            </p>
                                        </div>
                                    </div>

                                    <a href="<?php echo e(route('siswa.tugas.show', $tugas->id)); ?>"
                                       class="inline-flex items-center justify-center rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-3 transition shadow-md">
                                        Buka
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="rounded-[24px] border border-dashed border-slate-300 p-10 text-center text-slate-500 bg-slate-50/70">
                                <div class="w-16 h-16 mx-auto rounded-full bg-slate-100 flex items-center justify-center mb-4">
                                    <i class="fa-solid fa-folder-open text-slate-400 text-2xl"></i>
                                </div>
                                Belum ada tugas terbaru.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="rounded-[30px] border border-slate-200/70 bg-white/90 backdrop-blur-xl p-6 lg:p-8 shadow-[0_20px_50px_rgba(15,23,42,0.08)]">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-slate-800">Ringkasan Belajar</h3>
                            <p class="text-slate-500 mt-1">Statistik ringkas perkembangan belajar kamu</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <i class="fa-solid fa-chart-pie"></i>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Materi</p>
                            <h4 class="text-3xl font-extrabold text-slate-800 mt-2"><?php echo e($totalMateriCount); ?></h4>
                        </div>

                        <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Quiz Selesai</p>
                            <h4 class="text-3xl font-extrabold text-slate-800 mt-2"><?php echo e($quizSelesaiCount); ?></h4>
                        </div>

                        <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Tugas</p>
                            <h4 class="text-3xl font-extrabold text-slate-800 mt-2"><?php echo e($totalTugasCount); ?></h4>
                        </div>

                        <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Assessment</p>
                            <h4 class="text-3xl font-extrabold text-slate-800 mt-2"><?php echo e($totalAssessmentCount); ?></h4>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="space-y-6">
                
                <div class="rounded-[30px] border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_20px_50px_rgba(15,23,42,0.08)] p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-slate-800">Target Hari Ini</h3>
                        <div class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center gap-4 rounded-2xl bg-slate-50 border border-slate-100 p-4">
                            <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Pelajari Materi</p>
                                <p class="text-sm text-slate-500">Buka materi terbaru hari ini</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 rounded-2xl bg-slate-50 border border-slate-100 p-4">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Kerjakan Quiz</p>
                                <p class="text-sm text-slate-500">Lihat quiz yang tersedia</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 rounded-2xl bg-slate-50 border border-slate-100 p-4">
                            <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">
                                <i class="fa-solid fa-file-pen"></i>
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">Cek Tugas</p>
                                <p class="text-sm text-slate-500">Pastikan tidak ada deadline terlewat</p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="rounded-[30px] border border-slate-200/70 bg-white/90 backdrop-blur-xl p-6 shadow-[0_20px_50px_rgba(15,23,42,0.08)]">
                    <h3 class="text-2xl font-bold text-slate-800 mb-6">Aksi Cepat</h3>

                    <div class="grid grid-cols-2 gap-4">
                        <a href="<?php echo e(route('siswa.materi.index')); ?>"
                           class="rounded-[24px] bg-gradient-to-br from-blue-600 to-blue-500 text-white p-5 text-center shadow-lg hover:-translate-y-1 transition">
                            <div class="w-14 h-14 mx-auto rounded-2xl bg-white/20 flex items-center justify-center mb-3">
                                <i class="fa-solid fa-book text-xl"></i>
                            </div>
                            <p class="font-bold">Materi</p>
                        </a>

                        <a href="<?php echo e(route('siswa.quiz.index')); ?>"
                           class="rounded-[24px] bg-slate-50 border border-slate-200 text-slate-800 p-5 text-center hover:-translate-y-1 hover:shadow-md transition">
                            <div class="w-14 h-14 mx-auto rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center mb-3">
                                <i class="fa-solid fa-clipboard-question text-xl"></i>
                            </div>
                            <p class="font-bold">Quiz</p>
                        </a>

                        <a href="<?php echo e(route('siswa.tugas.index')); ?>"
                           class="rounded-[24px] bg-slate-50 border border-slate-200 text-slate-800 p-5 text-center hover:-translate-y-1 hover:shadow-md transition">
                            <div class="w-14 h-14 mx-auto rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center mb-3">
                                <i class="fa-solid fa-file-lines text-xl"></i>
                            </div>
                            <p class="font-bold">Tugas</p>
                        </a>

                        <a href="<?php echo e(route('siswa.progress.index')); ?>"
                           class="rounded-[24px] bg-slate-50 border border-slate-200 text-slate-800 p-5 text-center hover:-translate-y-1 hover:shadow-md transition">
                            <div class="w-14 h-14 mx-auto rounded-2xl bg-violet-100 text-violet-600 flex items-center justify-center mb-3">
                                <i class="fa-solid fa-chart-line text-xl"></i>
                            </div>
                            <p class="font-bold">Progress</p>
                        </a>
                    </div>
                </div>

                
                <div class="rounded-[30px] overflow-hidden p-6 text-white shadow-[0_20px_60px_rgba(59,130,246,0.22)] bg-gradient-to-br from-indigo-500 via-blue-500 to-sky-400 min-h-[220px] flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-trophy text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3">Tetap Semangat</h3>
                        <p class="text-blue-100 leading-7">
                            Belajar sedikit demi sedikit setiap hari akan memberi hasil yang besar di kemudian hari.
                        </p>
                    </div>
                    <p class="text-sm text-white/80 mt-4">Konsisten lebih penting daripada terburu-buru.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\siswa\dashboard.blade.php ENDPATH**/ ?>