

<?php $__env->startSection('title', 'Laporan - Admin Panel'); ?>

<?php $__env->startSection('content'); ?>

    
    <div class="rounded-3xl bg-gradient-to-r from-slate-700 to-slate-900 p-6 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 shadow-lg">
        <div>
            <p class="text-slate-400 text-sm font-semibold uppercase tracking-widest mb-1">Ringkasan Sistem</p>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">📊 Laporan & Analitik</h1>
            <p class="text-slate-400 text-sm mt-1">Rekap progress belajar, performa quiz, dan statistik siswa.</p>
        </div>
        <div class="flex gap-2 flex-wrap">
            <a href="<?php echo e(route('admin.laporan.export.excel')); ?>"
               class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 rounded-2xl shadow transition text-sm">
                <i class="fas fa-file-csv"></i> Ekspor CSV
            </a>
        </div>
    </div>

    
    <?php if(session('info')): ?>
        <div class="mb-6 flex items-center gap-3 bg-blue-50 border border-blue-200 text-blue-800 rounded-2xl px-5 py-4 text-sm font-semibold shadow-sm">
            <span class="text-blue-500 text-lg"><i class="fas fa-circle-info"></i></span>
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>

    
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 text-xl flex-shrink-0">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Siswa</p>
                <p class="text-3xl font-extrabold text-blue-600 leading-none mt-1"><?php echo e($totalSiswa); ?></p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600 text-xl flex-shrink-0">
                <i class="fas fa-book-open"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Materi</p>
                <p class="text-3xl font-extrabold text-indigo-600 leading-none mt-1"><?php echo e($totalMateri); ?></p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-purple-600 text-xl flex-shrink-0">
                <i class="fas fa-list-check"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Quiz</p>
                <p class="text-3xl font-extrabold text-purple-600 leading-none mt-1"><?php echo e($totalQuiz); ?></p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-xl flex-shrink-0
                <?php echo e(($rataRataGlobal ?? 0) >= 75 ? 'bg-green-100 text-green-600' : (($rataRataGlobal ?? 0) >= 50 ? 'bg-yellow-100 text-yellow-600' : 'bg-red-100 text-red-500')); ?>">
                <i class="fas fa-chart-simple"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Rata-rata Skor</p>
                <p class="text-3xl font-extrabold leading-none mt-1
                    <?php echo e(($rataRataGlobal ?? 0) >= 75 ? 'text-green-600' : (($rataRataGlobal ?? 0) >= 50 ? 'text-yellow-500' : 'text-red-500')); ?>">
                    <?php echo e($rataRataGlobal ? round($rataRataGlobal, 1) : '-'); ?>

                </p>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mb-6">

        
        <div class="xl:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="font-bold text-slate-700">Rata-rata Skor per Chapter</p>
                    <p class="text-xs text-slate-400 mt-0.5">Perbandingan nilai rata-rata tiap chapter quiz</p>
                </div>
            </div>
            <canvas id="chartChapter" height="120"></canvas>
        </div>

        
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
            <div class="mb-4">
                <p class="font-bold text-slate-700">Status Kelulusan</p>
                <p class="text-xs text-slate-400 mt-0.5">Dari <?php echo e($jumlahLulus + $jumlahTidakLulus); ?> total attempt</p>
            </div>
            <canvas id="chartLulus" height="180"></canvas>
            <div class="flex justify-center gap-6 mt-4 text-xs font-semibold">
                <div class="flex items-center gap-1.5">
                    <span class="w-3 h-3 rounded-full bg-green-500 inline-block"></span>
                    Lulus (<?php echo e($jumlahLulus); ?>)
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="w-3 h-3 rounded-full bg-red-400 inline-block"></span>
                    Tidak Lulus (<?php echo e($jumlahTidakLulus); ?>)
                </div>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 mb-6">

        
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
            <p class="font-bold text-slate-700 mb-4">🏆 Top 5 Siswa Terbaik</p>
            <?php if($topSiswa->count()): ?>
                <div class="space-y-3">
                    <?php $__currentLoopData = $topSiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $medals = ['🥇','🥈','🥉'];
                            $medal  = $medals[$i] ?? '#' . ($i+1);
                            $rata   = round($siswa->rata_quiz ?? 0, 1);
                            $pct    = min($rata, 100);
                        ?>
                        <div class="flex items-center gap-3">
                            <span class="text-xl w-8 text-center flex-shrink-0"><?php echo e($medal); ?></span>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <p class="text-sm font-semibold text-slate-700 truncate"><?php echo e($siswa->name); ?></p>
                                    <span class="text-sm font-extrabold ml-2
                                        <?php echo e($rata >= 75 ? 'text-green-600' : ($rata >= 50 ? 'text-yellow-500' : 'text-red-500')); ?>">
                                        <?php echo e($rata); ?>

                                    </span>
                                </div>
                                <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full rounded-full transition-all
                                        <?php echo e($rata >= 75 ? 'bg-green-500' : ($rata >= 50 ? 'bg-yellow-400' : 'bg-red-400')); ?>"
                                         style="width: <?php echo e($pct); ?>%"></div>
                                </div>
                                <p class="text-xs text-slate-400 mt-0.5"><?php echo e($siswa->total_attempt); ?> attempt</p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-sm text-slate-400 text-center py-8">Belum ada data.</p>
            <?php endif; ?>
        </div>

        
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
            <p class="font-bold text-slate-700 mb-4">📚 Statistik per Chapter</p>
            <?php if($chapterStats->count()): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                <th class="pb-2 text-left">Chapter</th>
                                <th class="pb-2 text-center">Peserta</th>
                                <th class="pb-2 text-center">Attempt</th>
                                <th class="pb-2 text-center">Rata² Skor</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php $__currentLoopData = $chapterStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="py-2.5">
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-blue-600 text-white text-xs font-extrabold">
                                            <?php echo e($ch->chapter); ?>

                                        </span>
                                    </td>
                                    <td class="py-2.5 text-center text-slate-600 font-medium"><?php echo e($ch->peserta); ?></td>
                                    <td class="py-2.5 text-center text-slate-600 font-medium"><?php echo e($ch->total_attempt); ?></td>
                                    <td class="py-2.5 text-center">
                                        <?php if($ch->rata_skor !== null): ?>
                                            <span class="font-extrabold
                                                <?php echo e($ch->rata_skor >= 75 ? 'text-green-600' : ($ch->rata_skor >= 50 ? 'text-yellow-500' : 'text-red-500')); ?>">
                                                <?php echo e($ch->rata_skor); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="text-slate-300">—</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-sm text-slate-400 text-center py-8">Belum ada data chapter.</p>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100">
            <p class="font-bold text-slate-700 mb-3">Detail Performa Siswa</p>
            <form method="GET" action="<?php echo e(route('admin.laporan.index')); ?>"
                  class="flex flex-wrap gap-3 items-end">
                <div class="flex-1 min-w-[160px]">
                    <input type="text" name="search"
                        class="w-full px-4 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50"
                        placeholder="Cari nama atau NIS..."
                        value="<?php echo e(request('search')); ?>">
                </div>
                <div class="min-w-[130px]">
                    <select name="kelas"
                        class="w-full px-4 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-slate-50">
                        <option value="">Semua Kelas</option>
                        <?php $__currentLoopData = $kelasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k); ?>" <?php if(request('kelas') == $k): echo 'selected'; endif; ?>><?php echo e($k); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-sm transition">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                    <a href="<?php echo e(route('admin.laporan.index')); ?>"
                        class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-xl text-sm transition">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <?php if($siswaList->count()): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider">
                            <th class="px-4 py-3 text-left w-10">No</th>
                            <th class="px-4 py-3 text-left">Nama Siswa</th>
                            <th class="px-4 py-3 text-left w-24">NIS</th>
                            <th class="px-4 py-3 text-left w-24">Kelas</th>
                            <th class="px-4 py-3 text-center w-28">Total Attempt</th>
                            <th class="px-4 py-3 text-center w-32">Rata-rata Skor</th>
                            <th class="px-4 py-3 text-center w-32">Performa</th>
                            <th class="px-4 py-3 text-center w-28">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php $__currentLoopData = $siswaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $rata       = round($siswa->rata_quiz ?? 0, 1);
                                $status     = $rata >= 75 ? 'Baik' : ($rata >= 50 ? 'Cukup' : 'Perlu Perhatian');
                                $colorClass = $rata >= 75 ? 'text-green-600' : ($rata >= 50 ? 'text-yellow-500' : 'text-red-500');
                                $barColor   = $rata >= 75 ? 'bg-green-500' : ($rata >= 50 ? 'bg-yellow-400' : 'bg-red-400');
                                $badgeBg    = $rata >= 75 ? 'bg-green-100 text-green-700' : ($rata >= 50 ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-600');
                            ?>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-4 py-3.5 text-slate-400 font-medium">
                                    <?php echo e($siswaList->firstItem() + $i); ?>

                                </td>
                                <td class="px-4 py-3.5">
                                    <p class="font-semibold text-slate-800"><?php echo e($siswa->name); ?></p>
                                    <p class="text-xs text-slate-400"><?php echo e($siswa->email); ?></p>
                                </td>
                                <td class="px-4 py-3.5 text-slate-500 text-xs"><?php echo e($siswa->nis ?? '-'); ?></td>
                                <td class="px-4 py-3.5 text-slate-600"><?php echo e($siswa->kelas ?? '-'); ?></td>
                                <td class="px-4 py-3.5 text-center font-semibold text-slate-700">
                                    <?php echo e($siswa->total_attempt); ?>

                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="font-extrabold text-base <?php echo e($colorClass); ?>">
                                        <?php echo e($siswa->rata_quiz ? $rata : '-'); ?>

                                    </span>
                                </td>
                                <td class="px-4 py-3.5">
                                    <div class="h-2 bg-slate-100 rounded-full overflow-hidden w-full">
                                        <div class="h-full rounded-full <?php echo e($barColor); ?>"
                                             style="width: <?php echo e(min($rata, 100)); ?>%"></div>
                                    </div>
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="inline-block px-2.5 py-1 rounded-lg text-xs font-bold <?php echo e($badgeBg); ?>">
                                        <?php echo e($status); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-100">
                <?php echo e($siswaList->links()); ?>

            </div>
        <?php else: ?>
            <div class="flex flex-col items-center justify-center py-16 text-center">
                <div class="text-5xl mb-4">📊</div>
                <h3 class="text-lg font-extrabold text-slate-700 mb-1">Tidak Ada Data Ditemukan</h3>
                <p class="text-sm text-slate-400">Coba ubah filter pencarian.</p>
            </div>
        <?php endif; ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chapterLabels = <?php echo json_encode($chapterStats->pluck('chapter')->map(fn($c) => 'Chapter ' . $c), 15, 512) ?>;
        const chapterScores = <?php echo json_encode($chapterStats->pluck('rata_skor'), 15, 512) ?>;
        const chapterPeserta = <?php echo json_encode($chapterStats->pluck('peserta'), 15, 512) ?>;

        const ctxBar = document.getElementById('chartChapter').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: chapterLabels,
                datasets: [
                    {
                        label: 'Rata-rata Skor',
                        data: chapterScores,
                        backgroundColor: chapterScores.map(s =>
                            s >= 75 ? 'rgba(34,197,94,0.8)' :
                            s >= 50 ? 'rgba(234,179,8,0.8)' :
                                      'rgba(239,68,68,0.8)'
                        ),
                        borderRadius: 8,
                        borderSkipped: false,
                    },
                    {
                        label: 'Jumlah Peserta',
                        data: chapterPeserta,
                        backgroundColor: 'rgba(99,102,241,0.3)',
                        borderColor: 'rgba(99,102,241,0.8)',
                        borderWidth: 2,
                        type: 'line',
                        tension: 0.4,
                        yAxisID: 'y2',
                        pointBackgroundColor: 'rgba(99,102,241,1)',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: { callbacks: {
                        label: ctx => ctx.dataset.label + ': ' + (ctx.raw ?? '-')
                    }}
                },
                scales: {
                    y:  { beginAtZero: true, max: 100, title: { display: true, text: 'Skor (0-100)' } },
                    y2: { beginAtZero: true, position: 'right', title: { display: true, text: 'Peserta' }, grid: { drawOnChartArea: false } }
                }
            }
        });

        const ctxDonut = document.getElementById('chartLulus').getContext('2d');
        new Chart(ctxDonut, {
            type: 'doughnut',
            data: {
                labels: ['Lulus', 'Tidak Lulus'],
                datasets: [{
                    data: [<?php echo e($jumlahLulus); ?>, <?php echo e($jumlahTidakLulus); ?>],
                    backgroundColor: ['rgba(34,197,94,0.85)', 'rgba(239,68,68,0.75)'],
                    borderWidth: 0,
                    hoverOffset: 6,
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: { callbacks: {
                        label: ctx => ' ' + ctx.label + ': ' + ctx.raw + ' attempt'
                    }}
                }
            }
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\admin\laporan\index.blade.php ENDPATH**/ ?>