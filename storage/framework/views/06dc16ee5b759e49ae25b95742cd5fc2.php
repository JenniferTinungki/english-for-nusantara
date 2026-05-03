

<?php $__env->startSection('title', $quiz->judul . ' - Detail Quiz'); ?>

<?php $__env->startSection('content'); ?>

    
    <a href="<?php echo e(route('admin.quiz-evaluasi.index')); ?>"
       class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 font-semibold mb-4 transition">
        <i class="fas fa-arrow-left text-xs"></i> Kembali ke Daftar Quiz
    </a>

    
    <div class="rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 p-6 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 shadow-lg shadow-blue-200">
        <div>
            <div class="flex items-center gap-2 mb-2 flex-wrap">
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-white/20 text-white text-xs font-extrabold">
                    <?php echo e($quiz->chapter ?? '-'); ?>

                </span>
                <span class="px-2.5 py-1 rounded-lg bg-white/20 text-white text-xs font-bold">
                    <?php echo e($quiz->tipe ?? 'quiz'); ?>

                </span>
                <?php if($quiz->is_active): ?>
                    <span class="px-2.5 py-1 rounded-lg bg-green-400/30 text-green-100 text-xs font-bold">● Aktif</span>
                <?php else: ?>
                    <span class="px-2.5 py-1 rounded-lg bg-white/10 text-white/60 text-xs font-bold">● Nonaktif</span>
                <?php endif; ?>
            </div>
            <h1 class="text-2xl font-extrabold text-white tracking-tight"><?php echo e($quiz->judul); ?></h1>
            <p class="text-blue-100 text-sm mt-1">Chapter <?php echo e($quiz->chapter ?? '-'); ?> • <?php echo e($quiz->questions->count()); ?> soal</p>
        </div>
        <a href="<?php echo e(route('admin.quiz-evaluasi.leaderboard', ['quiz_id' => $quiz->id])); ?>"
           class="inline-flex items-center gap-2 bg-yellow-400 text-yellow-900 font-bold px-4 py-2 rounded-2xl shadow hover:bg-yellow-300 transition text-sm flex-shrink-0">
            🏆 Leaderboard Quiz Ini
        </a>
    </div>

    
    <?php $pctLulus = $attempts->total() > 0 ? round(($jumlahLulus / $attempts->total()) * 100) : 0; ?>
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 text-xl flex-shrink-0">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Peserta</p>
                <p class="text-3xl font-extrabold text-blue-600 leading-none mt-1"><?php echo e($totalPeserta); ?></p>
                <p class="text-xs text-slate-400 mt-0.5">siswa unik</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-xl flex-shrink-0
                <?php echo e(($rataRata ?? 0) >= 75 ? 'bg-green-100 text-green-600' : (($rataRata ?? 0) >= 50 ? 'bg-yellow-100 text-yellow-600' : 'bg-red-100 text-red-500')); ?>">
                <i class="fas fa-chart-simple"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Rata-rata Skor</p>
                <p class="text-3xl font-extrabold leading-none mt-1
                    <?php echo e(($rataRata ?? 0) >= 75 ? 'text-green-600' : (($rataRata ?? 0) >= 50 ? 'text-yellow-500' : 'text-red-500')); ?>">
                    <?php echo e($rataRata ? round($rataRata, 1) : '-'); ?>

                </p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-green-600 text-xl flex-shrink-0">
                <i class="fas fa-trophy"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nilai Tertinggi</p>
                <p class="text-3xl font-extrabold text-green-600 leading-none mt-1"><?php echo e($nilaiTertinggi ?? '-'); ?></p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-600 text-xl flex-shrink-0">
                <i class="fas fa-circle-check"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Siswa Lulus</p>
                <p class="text-3xl font-extrabold text-emerald-600 leading-none mt-1"><?php echo e($jumlahLulus); ?></p>
                <p class="text-xs text-slate-400 mt-0.5"><?php echo e($pctLulus); ?>% dari total attempt</p>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 mb-6">
        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Filter & Pencarian</p>
        <form method="GET" action="<?php echo e(route('admin.quiz-evaluasi.show', $quiz->id)); ?>"
              class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <input type="text" name="search"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50"
                    placeholder="Cari nama atau NIS siswa..."
                    value="<?php echo e(request('search')); ?>">
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
                <a href="<?php echo e(route('admin.quiz-evaluasi.show', $quiz->id)); ?>"
                    class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-xl text-sm transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <p class="font-bold text-slate-700">Hasil Pengerjaan Siswa</p>
            <span class="text-xs text-slate-400 font-semibold"><?php echo e($attempts->total()); ?> attempt</span>
        </div>

        <?php if($attempts->count()): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <th class="px-4 py-3 text-left w-10">No</th>
                            <th class="px-4 py-3 text-left">Nama Siswa</th>
                            <th class="px-4 py-3 text-left w-24">NIS</th>
                            <th class="px-4 py-3 text-left w-24">Kelas</th>
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
                                <td class="px-4 py-3.5 text-center">
                                    <span class="font-extrabold text-base
                                        <?php echo e($score >= 75 ? 'text-green-600' : 'text-red-500'); ?>">
                                        <?php echo e($score); ?>

                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-center text-slate-500 font-medium">
                                    <?php echo e($attempt->correct_answers ?? '-'); ?> /
                                    <?php echo e($attempt->total_questions ?? $quiz->questions->count()); ?>

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
                <div class="text-5xl mb-4">📊</div>
                <h3 class="text-lg font-extrabold text-slate-700 mb-1">Belum Ada Siswa yang Mengerjakan</h3>
                <p class="text-sm text-slate-400">Quiz ini belum dikerjakan oleh siswa manapun.</p>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\admin\quiz-evaluasi\show.blade.php ENDPATH**/ ?>