

<?php $__env->startSection('title', 'Quiz & Evaluasi - Admin Panel'); ?>

<?php $__env->startSection('content'); ?>

    
    <div class="rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 p-6 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 shadow-lg shadow-blue-200">
        <div>
            <p class="text-blue-100 text-sm font-semibold uppercase tracking-widest mb-1">Manajemen Evaluasi</p>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Quiz & Evaluasi 📋</h1>
            <p class="text-blue-100 text-sm mt-1">Pantau seluruh quiz, hasil siswa, dan leaderboard.</p>
        </div>
        <div class="flex gap-2 flex-wrap">
            <a href="<?php echo e(route('admin.quiz-evaluasi.hasil')); ?>"
               class="inline-flex items-center gap-2 bg-white text-blue-700 font-bold px-4 py-2 rounded-2xl shadow hover:bg-blue-50 transition text-sm">
                📋 Semua Hasil
            </a>
            <a href="<?php echo e(route('admin.quiz-evaluasi.leaderboard')); ?>"
               class="inline-flex items-center gap-2 bg-yellow-400 text-yellow-900 font-bold px-4 py-2 rounded-2xl shadow hover:bg-yellow-300 transition text-sm">
                🏆 Leaderboard
            </a>
        </div>
    </div>

    
    <?php if(session('success')): ?>
        <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 rounded-2xl px-5 py-4 text-sm font-semibold shadow-sm">
            <span class="text-green-500 text-lg">✓</span>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 text-xl flex-shrink-0">
                <i class="fas fa-list-check"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Quiz</p>
                <p class="text-3xl font-extrabold text-blue-600 leading-none mt-1"><?php echo e($totalQuiz); ?></p>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 text-xl flex-shrink-0">
                <i class="fas fa-pen-to-square"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Attempt</p>
                <p class="text-3xl font-extrabold text-slate-700 leading-none mt-1"><?php echo e($totalAttempt); ?></p>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-green-600 text-xl flex-shrink-0">
                <i class="fas fa-user-check"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Siswa Mengerjakan</p>
                <p class="text-3xl font-extrabold text-green-600 leading-none mt-1"><?php echo e($totalSiswa); ?></p>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-xl flex-shrink-0
                <?php echo e($rataRataGlobal >= 75 ? 'bg-green-100 text-green-600' : ($rataRataGlobal >= 50 ? 'bg-yellow-100 text-yellow-600' : 'bg-red-100 text-red-500')); ?>">
                <i class="fas fa-chart-simple"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Rata-rata Skor</p>
                <p class="text-3xl font-extrabold leading-none mt-1
                    <?php echo e($rataRataGlobal >= 75 ? 'text-green-600' : ($rataRataGlobal >= 50 ? 'text-yellow-500' : 'text-red-500')); ?>">
                    <?php echo e($rataRataGlobal ? round($rataRataGlobal, 1) : '-'); ?>

                </p>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 mb-6">
        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Filter & Pencarian</p>
        <form method="GET" action="<?php echo e(route('admin.quiz-evaluasi.index')); ?>"
              class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <input type="text" name="search"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50"
                    placeholder="Cari judul quiz..."
                    value="<?php echo e(request('search')); ?>">
            </div>
            <div class="min-w-[130px]">
                <select name="tipe"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50">
                    <option value="">Semua Tipe</option>
                    <option value="quiz" <?php if(request('tipe') == 'quiz'): echo 'selected'; endif; ?>>Quiz</option>
                    <option value="evaluasi" <?php if(request('tipe') == 'evaluasi'): echo 'selected'; endif; ?>>Evaluasi</option>
                </select>
            </div>
            <div class="min-w-[130px]">
                <select name="status"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50">
                    <option value="">Semua Status</option>
                    <option value="aktif" <?php if(request('status') == 'aktif'): echo 'selected'; endif; ?>>Aktif</option>
                    <option value="nonaktif" <?php if(request('status') == 'nonaktif'): echo 'selected'; endif; ?>>Nonaktif</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit"
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-sm transition shadow-sm shadow-blue-200">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
                <a href="<?php echo e(route('admin.quiz-evaluasi.index')); ?>"
                    class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-xl text-sm transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <p class="font-bold text-slate-700">Daftar Quiz</p>
            <span class="text-xs text-slate-400 font-semibold"><?php echo e($quizzes->total()); ?> quiz ditemukan</span>
        </div>

        <?php if($quizzes->count()): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <th class="px-4 py-3 text-left w-10">No</th>
                            <th class="px-4 py-3 text-left w-24">Chapter</th>
                            <th class="px-4 py-3 text-left">Judul Quiz</th>
                            <th class="px-4 py-3 text-center w-20">Tipe</th>
                            <th class="px-4 py-3 text-center w-24">Jml Soal</th>
                            <th class="px-4 py-3 text-center w-28">Jml Attempt</th>
                            <th class="px-4 py-3 text-center w-28">Rata² Skor</th>
                            <th class="px-4 py-3 text-center w-24">Status</th>
                            <th class="px-4 py-3 text-right w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $rata = $quiz->attempts->whereNotNull('score')->avg('score');
                            ?>
                            <tr class="hover:bg-blue-50/40 transition-colors">
                                <td class="px-4 py-3.5 text-slate-400 font-medium">
                                    <?php echo e($quizzes->firstItem() + $i); ?>

                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-blue-600 text-white text-xs font-extrabold shadow-sm shadow-blue-200">
                                        <?php echo e($quiz->chapter ?? '-'); ?>

                                    </span>
                                </td>
                                <td class="px-4 py-3.5 font-semibold text-slate-800">
                                    <?php echo e($quiz->judul); ?>

                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="inline-block px-2.5 py-1 rounded-lg text-xs font-bold
                                        <?php echo e(($quiz->tipe ?? 'quiz') === 'evaluasi' ? 'bg-purple-100 text-purple-700' : 'bg-sky-100 text-sky-700'); ?>">
                                        <?php echo e($quiz->tipe ?? 'quiz'); ?>

                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-center font-semibold text-slate-700">
                                    <?php echo e($quiz->questions_count); ?>

                                </td>
                                <td class="px-4 py-3.5 text-center font-semibold text-slate-700">
                                    <?php echo e($quiz->attempts_count); ?>

                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <?php if($rata !== null): ?>
                                        <span class="font-extrabold text-base
                                            <?php echo e($rata >= 75 ? 'text-green-600' : ($rata >= 50 ? 'text-yellow-500' : 'text-red-500')); ?>">
                                            <?php echo e(round($rata, 1)); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="text-slate-300 font-bold">—</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <?php if($quiz->is_active): ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-100 text-green-700 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span>
                                            Aktif
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-500 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400 inline-block"></span>
                                            Nonaktif
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3.5 text-right">
                                    <a href="<?php echo e(route('admin.quiz-evaluasi.show', $quiz->id)); ?>"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl transition shadow-sm shadow-blue-200">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            
            <div class="px-6 py-4 border-t border-slate-100">
                <?php echo e($quizzes->withQueryString()->links()); ?>

            </div>

        <?php else: ?>
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <div class="text-5xl mb-4">📝</div>
                <h3 class="text-lg font-extrabold text-slate-700 mb-1">Belum Ada Quiz</h3>
                <p class="text-sm text-slate-400">Quiz dibuat oleh guru melalui menu Kelola Quiz.</p>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\admin\quiz-evaluasi\index.blade.php ENDPATH**/ ?>