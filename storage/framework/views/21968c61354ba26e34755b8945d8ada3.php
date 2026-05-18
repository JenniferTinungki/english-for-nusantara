

<?php $__env->startSection('title', 'Assessment Center'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap');
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .fade-in { animation: fadeInUp 0.6s ease both; }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .card-hover { transition: transform 0.25s ease, box-shadow 0.25s ease; }
    .card-hover:hover { transform: translateY(-3px); box-shadow: 0 20px 40px rgba(15,23,42,0.12); }

    .stat-card:nth-child(1) { animation: fadeInUp 0.5s .05s ease both; }
    .stat-card:nth-child(2) { animation: fadeInUp 0.5s .10s ease both; }
    .stat-card:nth-child(3) { animation: fadeInUp 0.5s .15s ease both; }

    .assessment-item { animation: fadeInUp 0.5s ease both; }
    <?php for($i = 1; $i <= 10; $i++): ?>
    .assessment-item:nth-child(<?php echo e($i); ?>) { animation-delay: <?php echo e($i * 0.07); ?>s; }
    <?php endfor; ?>

    .progress-ring { transition: stroke-dashoffset 1s cubic-bezier(.4,0,.2,1); }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $avg = isset($averageScore) && $averageScore !== null ? (int) $averageScore : null;
    $total = $totalAssessment ?? 0;
    $completed = $completedAssessment ?? 0;
    $pending = $total - $completed;
    $pct = $total > 0 ? round(($completed / $total) * 100) : 0;
?>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 fade-in">

    
    <?php if(session('success')): ?>
        <div class="mb-6 flex items-center gap-3 rounded-2xl bg-emerald-50 border border-emerald-200 px-5 py-4 text-emerald-800 text-sm font-semibold">
            <i class="fa-solid fa-circle-check text-emerald-500"></i>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="mb-6 flex items-center gap-3 rounded-2xl bg-red-50 border border-red-200 px-5 py-4 text-red-800 text-sm font-semibold">
            <i class="fa-solid fa-circle-exclamation text-red-500"></i>
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    
    
    
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-700 via-blue-600 to-indigo-600 text-white p-8 md:p-10 mb-6 shadow-2xl">
        
        <div class="pointer-events-none absolute -top-20 -right-20 w-80 h-80 rounded-full bg-white/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-indigo-300/20 blur-3xl"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center gap-8">

            
            <div class="flex-1">
                <span class="inline-flex items-center gap-2 rounded-full bg-white/15 border border-white/25 px-4 py-2 text-xs font-bold uppercase tracking-widest mb-5">
                    <i class="fa-solid fa-clipboard-list"></i>
                    Assessment Center
                </span>
                <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-3">
                    Daftar Assessment
                </h1>
                <p class="text-blue-100 text-base leading-relaxed max-w-lg">
                    Kerjakan assessment yang tersedia, pantau progresmu, dan lihat hasil nilaimu.
                </p>

                
                <div class="mt-6 max-w-sm">
                    <div class="flex justify-between text-sm text-blue-100 mb-2">
                        <span>Progres Penyelesaian</span>
                        <span class="font-bold text-white"><?php echo e($pct); ?>%</span>
                    </div>
                    <div class="h-2.5 rounded-full bg-white/20 overflow-hidden">
                        <div class="h-full rounded-full bg-white transition-all duration-1000"
                             style="width: <?php echo e($pct); ?>%"></div>
                    </div>
                    <p class="text-xs text-blue-200 mt-2"><?php echo e($completed); ?> dari <?php echo e($total); ?> assessment selesai</p>
                </div>
            </div>

            
            <div class="shrink-0 w-full lg:w-48">
                <div class="rounded-3xl bg-white/12 border border-white/20 backdrop-blur-sm p-6 text-center">
                    <p class="text-sm text-blue-100 mb-1">Rata-rata Nilai</p>
                    <p class="text-6xl font-black leading-none mt-2">
                        <?php echo e($avg !== null ? $avg : '—'); ?>

                    </p>
                    <p class="text-xs text-blue-200 mt-3">
                        <?php if($avg === null): ?> Belum ada nilai
                        <?php elseif($avg >= 75): ?> Hasil bagus! 🎉
                        <?php else: ?> Terus tingkatkan! 💪
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    
    
    
    <div class="grid grid-cols-3 gap-4 mb-8">

        <div class="stat-card card-hover rounded-2xl border border-slate-200 bg-white p-5 shadow-sm text-center">
            <div class="w-11 h-11 mx-auto rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mb-3">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>
            <h3 class="text-3xl font-black text-slate-800"><?php echo e($total); ?></h3>
            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider mt-1">Total</p>
        </div>

        <div class="stat-card card-hover rounded-2xl border border-slate-200 bg-white p-5 shadow-sm text-center">
            <div class="w-11 h-11 mx-auto rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <h3 class="text-3xl font-black text-slate-800"><?php echo e($completed); ?></h3>
            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider mt-1">Selesai</p>
        </div>

        <div class="stat-card card-hover rounded-2xl border border-slate-200 bg-white p-5 shadow-sm text-center">
            <div class="w-11 h-11 mx-auto rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center mb-3">
                <i class="fa-solid fa-hourglass-half"></i>
            </div>
            <h3 class="text-3xl font-black text-slate-800"><?php echo e($pending); ?></h3>
            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider mt-1">Pending</p>
        </div>
    </div>

    
    
    
    <div class="rounded-3xl border border-slate-200 bg-white shadow-sm overflow-hidden">

        
        <div class="px-7 py-5 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-800">Assessment Tersedia</h2>
                <p class="text-sm text-slate-400 mt-0.5">Pilih assessment untuk mulai atau lihat hasilnya</p>
            </div>
            <div class="w-10 h-10 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <i class="fa-solid fa-list-check"></i>
            </div>
        </div>

        
        <div class="divide-y divide-slate-100">

            <?php $__empty_1 = true; $__currentLoopData = $assessments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $assessment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $selesai = ($assessment->student_status ?? null) === 'Selesai';
                $score   = $assessment->student_score ?? null;
                $scoreColor = $score === null ? 'text-slate-400'
                    : ($score >= 75 ? 'text-emerald-600' : 'text-red-500');
            ?>

            <div class="assessment-item px-7 py-5 hover:bg-slate-50 transition-colors duration-200">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                    
                    <div class="flex items-center gap-4 flex-1 min-w-0">
                        
                        <div class="shrink-0 w-12 h-12 rounded-2xl flex items-center justify-center font-black text-lg
                            <?php echo e($selesai ? 'bg-emerald-100 text-emerald-700' : 'bg-blue-100 text-blue-700'); ?>">
                            <?php echo e($index + 1); ?>

                        </div>

                        
                        <div class="min-w-0">
                            <h3 class="font-bold text-slate-800 text-base leading-snug truncate">
                                <?php echo e($assessment->title); ?>

                            </h3>
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1 text-xs text-slate-400">
                                <span class="inline-flex items-center gap-1">
                                    <i class="fa-solid fa-circle-question"></i>
                                    <?php echo e($assessment->questions_count ?? 0); ?> soal
                                </span>
                                <?php if(!empty($assessment->student_submitted_at)): ?>
                                <span class="inline-flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    <?php echo e(\Carbon\Carbon::parse($assessment->student_submitted_at)->format('d M Y • H:i')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="shrink-0 text-center hidden sm:block">
                        <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider mb-1">Nilai</p>
                        <p class="text-2xl font-black <?php echo e($scoreColor); ?>">
                            <?php echo e($score !== null ? $score : '—'); ?>

                        </p>
                    </div>

                    
                    <div class="shrink-0 flex flex-col items-end gap-2 sm:gap-3">
                        
                        <?php if($selesai): ?>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold px-3 py-1.5">
                                <i class="fa-solid fa-check text-[10px]"></i>
                                Selesai
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1.5">
                                <i class="fa-solid fa-hourglass-half text-[10px]"></i>
                                Belum Dikerjakan
                            </span>
                        <?php endif; ?>

                        
                        <?php if($selesai): ?>
                            <a href="<?php echo e(route('siswa.assessment.result', $assessment->attempt_id ?? $assessment->id)); ?>"
                               class="inline-flex items-center gap-2 rounded-xl border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white text-sm font-bold px-5 py-2 transition-all duration-200">
                                <i class="fa-solid fa-chart-bar text-xs"></i>
                                Lihat Hasil
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('siswa.assessment.show', $assessment->id)); ?>"
                               class="inline-flex items-center gap-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2 shadow-md shadow-blue-200 transition-all duration-200">
                                <i class="fa-solid fa-play text-xs"></i>
                                Mulai
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                
                <?php if($score !== null): ?>
                <div class="mt-3 sm:hidden flex items-center gap-2 text-sm">
                    <span class="text-slate-400">Nilai kamu:</span>
                    <span class="font-black <?php echo e($scoreColor); ?>"><?php echo e($score); ?></span>
                </div>
                <?php endif; ?>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="px-7 py-16 text-center">
                <div class="w-16 h-16 mx-auto rounded-full bg-slate-100 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-folder-open text-slate-300 text-2xl"></i>
                </div>
                <p class="text-slate-500 font-semibold">Belum ada assessment tersedia.</p>
                <p class="text-slate-300 text-sm mt-1">Assessment baru akan muncul di sini.</p>
            </div>
            <?php endif; ?>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u748564652/domains/englishfornusantara.com/proyek-pertama-saya/resources/views/siswa/assessment/index.blade.php ENDPATH**/ ?>