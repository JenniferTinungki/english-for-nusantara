

<?php $__env->startSection('title', 'Semua Hasil Quiz'); ?>

<?php $__env->startSection('content'); ?>

    
    <a href="<?php echo e(route('admin.quiz-evaluasi.index')); ?>"
       class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 font-semibold mb-4 transition">
        <i class="fas fa-arrow-left text-xs"></i> Kembali ke Quiz & Evaluasi
    </a>

    
    <div class="rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 p-6 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 shadow-lg shadow-blue-200">
        <div>
            <p class="text-blue-100 text-sm font-semibold uppercase tracking-widest mb-1">Rekap Lengkap</p>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Semua Hasil Quiz Siswa</h1>
            <p class="text-blue-100 text-sm mt-1">Rekap seluruh attempt quiz dari semua siswa.</p>
        </div>
        <a href="<?php echo e(route('admin.quiz-evaluasi.leaderboard')); ?>"
           class="inline-flex items-center gap-2 bg-yellow-400 text-yellow-900 font-bold px-4 py-2 rounded-2xl shadow hover:bg-yellow-300 transition text-sm flex-shrink-0">
            🏆 Leaderboard
        </a>
    </div>

    
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 mb-6">
        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Filter & Pencarian</p>
        <form method="GET" action="<?php echo e(route('admin.quiz-evaluasi.hasil')); ?>"
              class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[160px]">
                <input type="text" name="search"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50"
                    placeholder="Cari nama atau NIS..."
                    value="<?php echo e(request('search')); ?>">
            </div>
            <div class="min-w-[200px]">
                <select name="quiz_id"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50">
                    <option value="">Semua Quiz</option>
                    <?php $__currentLoopData = $quizList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($q->id); ?>" <?php if(request('quiz_id') == $q->id): echo 'selected'; endif; ?>>
                            Ch.<?php echo e($q->chapter ?? '-'); ?> - <?php echo e(Str::limit($q->judul, 30)); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="min-w-[130px]">
                <select name="kelas"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50">
                    <option value="">Semua Kelas</option>
                    <?php $__currentLoopData = $kelasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($k); ?>" <?php if(request('kelas') == $k): echo 'selected'; endif; ?>><?php echo e($k); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="min-w-[150px]">
                <select name="status"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50">
                    <option value="">Semua Status</option>
                    <option value="lulus" <?php if(request('status') == 'lulus'): echo 'selected'; endif; ?>>Lulus (≥75)</option>
                    <option value="tidak_lulus" <?php if(request('status') == 'tidak_lulus'): echo 'selected'; endif; ?>>Tidak Lulus</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit"
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-sm transition shadow-sm shadow-blue-200">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
                <a href="<?php echo e(route('admin.quiz-evaluasi.hasil')); ?>"
                    class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-xl text-sm transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <p class="font-bold text-slate-700">Daftar Hasil</p>
            <?php if($attempts->count()): ?>
                <span class="text-xs text-slate-400 font-semibold">
                    <?php echo e($attempts->firstItem()); ?>–<?php echo e($attempts->lastItem()); ?> dari <?php echo e($attempts->total()); ?> hasil
                </span>
            <?php endif; ?>
        </div>

        <?php if($attempts->count()): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <th class="px-4 py-3 text-left w-10">No</th>
                            <th class="px-4 py-3 text-left">Nama Siswa</th>
                            <th class="px-4 py-3 text-left w-24">NIS</th>
                            <th class="px-4 py-3 text-left w-20">Kelas</th>
                            <th class="px-4 py-3 text-left">Quiz</th>
                            <th class="px-4 py-3 text-center w-16">Ch.</th>
                            <th class="px-4 py-3 text-center w-20">Skor</th>
                            <th class="px-4 py-3 text-center w-28">Jwb Benar</th>
                            <th class="px-4 py-3 text-center w-28">Status</th>
                            <th class="px-4 py-3 text-left w-36">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php $__currentLoopData = $attempts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $attempt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $score = $attempt->score ?? $attempt->nilai ?? 0; ?>
                            <tr class="hover:bg-blue-50/40 transition-colors">
                                <td class="px-4 py-3.5 text-slate-400 font-medium">
                                    <?php echo e($attempts->firstItem() + $i); ?>

                                </td>
                                <td class="px-4 py-3.5 font-semibold text-slate-800">
                                    <?php echo e($attempt->user->name ?? '-'); ?>

                                </td>
                                <td class="px-4 py-3.5 text-slate-500 text-xs">
                                    <?php echo e($attempt->user->nis ?? '-'); ?>

                                </td>
                                <td class="px-4 py-3.5 text-slate-600">
                                    <?php echo e($attempt->user->kelas ?? '-'); ?>

                                </td>
                                <td class="px-4 py-3.5 text-slate-500 text-xs">
                                    <?php echo e(Str::limit($attempt->quiz->judul ?? '-', 35)); ?>

                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-blue-600 text-white text-xs font-extrabold">
                                        <?php echo e($attempt->quiz->chapter ?? '-'); ?>

                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="font-extrabold text-base
                                        <?php echo e($score >= 75 ? 'text-green-600' : 'text-red-500'); ?>">
                                        <?php echo e($score); ?>

                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-center text-slate-500 font-medium">
                                    <?php echo e($attempt->correct_answers ?? '-'); ?> /
                                    <?php echo e($attempt->total_questions ?? ($attempt->quiz->questions->count() ?? '-')); ?>

                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <?php if($score >= 75): ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span>
                                            Lulus
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-red-100 text-red-600 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500 inline-block"></span>
                                            Tidak Lulus
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3.5 text-slate-400 text-xs">
                                    <?php echo e(($attempt->finished_at ?? $attempt->submitted_at ?? $attempt->created_at)?->format('d M Y H:i') ?? '-'); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-100">
                <?php echo e($attempts->withQueryString()->links()); ?>

            </div>
        <?php else: ?>
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <div class="text-5xl mb-4">📋</div>
                <h3 class="text-lg font-extrabold text-slate-700 mb-1">Tidak Ada Hasil Ditemukan</h3>
                <p class="text-sm text-slate-400">Coba ubah filter pencarian.</p>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\admin\quiz-evaluasi\hasil.blade.php ENDPATH**/ ?>