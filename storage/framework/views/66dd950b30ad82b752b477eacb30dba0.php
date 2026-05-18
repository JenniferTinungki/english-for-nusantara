

<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-800">
                Kelola Data Siswa
            </h1>
            <p class="text-slate-500 mt-1">
                Manajemen akun, progress, dan nilai seluruh siswa.
            </p>
        </div>
        <a href="<?php echo e(route('admin.users.create')); ?>" 
           class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-2xl shadow-lg shadow-blue-200 transition-all active:scale-95">
            <i class="fas fa-plus mr-2"></i> Tambah Siswa
        </a>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="glass-card p-5 rounded-3xl flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-xl">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Total Siswa</p>
                <h3 class="text-2xl font-bold text-slate-800"><?php echo e($siswa->total()); ?></h3>
            </div>
        </div>
        
    </div>

    
    <div class="glass-card p-6 rounded-3xl">
        <form action="<?php echo e(route('admin.users.index')); ?>" method="GET" class="flex flex-col lg:flex-row gap-4">
            <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" 
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none"
                           placeholder="Cari nama atau NIS...">
                </div>

                
                <select name="kelas" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">Semua Kelas</option>
                    <option value="X" <?php echo e(request('kelas') == 'X' ? 'selected' : ''); ?>>Kelas X</option>
                    <option value="XI" <?php echo e(request('kelas') == 'XI' ? 'selected' : ''); ?>>Kelas XI</option>
                    <option value="XII" <?php echo e(request('kelas') == 'XII' ? 'selected' : ''); ?>>Kelas XII</option>
                </select>

                
                <select name="gender" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">Semua Gender</option>
                    <option value="L" <?php echo e(request('gender') == 'L' ? 'selected' : ''); ?>>Laki-laki</option>
                    <option value="P" <?php echo e(request('gender') == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="px-6 py-2.5 bg-slate-800 text-white font-medium rounded-xl hover:bg-slate-900 transition-all">
                    Filter
                </button>
                <?php if(request()->anyFilled(['search', 'kelas', 'gender'])): ?>
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="px-6 py-2.5 bg-slate-200 text-slate-700 font-medium rounded-xl hover:bg-slate-300 transition-all text-center">
                        Reset
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    
    <div class="glass-card rounded-3xl overflow-hidden">
        <?php if($siswa->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Info Siswa</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">Kelas / Gender</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">Progress</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">Rata-rata Nilai</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-white flex items-center justify-center font-bold shadow-sm">
                                            <?php echo e(strtoupper(substr($s->name, 0, 1))); ?>

                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800"><?php echo e($s->name); ?></div>
                                            <div class="text-xs text-slate-500">NIS: <?php echo e($s->nis ?? '-'); ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 text-xs font-bold rounded-full mr-1">
                                        <?php echo e($s->kelas); ?>

                                    </span>
                                    <span class="inline-block px-3 py-1 <?php echo e($s->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700'); ?> text-xs font-bold rounded-full">
                                        <?php echo e($s->jenis_kelamin); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex flex-col items-center gap-1">
                                        <div class="w-24 bg-slate-200 rounded-full h-1.5 overflow-hidden">
                                            <div class="bg-blue-600 h-full rounded-full" style="width: <?php echo e($s->progress_materi); ?>%"></div>
                                        </div>
                                        <span class="text-[10px] font-bold text-blue-600"><?php echo e($s->progress_materi); ?>% Selesai</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php if($s->nilai_rata_rata !== null): ?>
                                        <div class="text-lg font-black text-slate-800"><?php echo e($s->nilai_rata_rata); ?></div>
                                    <?php else: ?>
                                        <span class="text-xs italic text-slate-400">Belum ada nilai</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="<?php echo e(route('admin.users.edit', $s->id)); ?>" 
                                           class="w-8 h-8 flex items-center justify-center bg-amber-100 text-amber-600 rounded-lg hover:bg-amber-200 transition-colors" title="Edit">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.users.destroy', $s->id)); ?>" method="POST" 
                                              onsubmit="return confirm('Yakin hapus siswa <?php echo e($s->name); ?>?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors" title="Hapus">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            
            <div class="p-6 border-t border-slate-100 bg-slate-50/30">
                <?php echo e($siswa->withQueryString()->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-20">
                <div class="w-20 h-20 bg-slate-100 text-slate-300 rounded-full flex items-center justify-center text-4xl mx-auto mb-4">
                    <i class="fas fa-user-slash"></i>
                </div>
                <h5 class="text-xl font-bold text-slate-800">Belum Ada Data Siswa</h5>
                <p class="text-slate-500 mt-1">Tambahkan siswa pertama untuk mulai mengelola data.</p>
                <a href="<?php echo e(route('admin.users.create')); ?>" class="inline-block mt-6 px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 shadow-md">
                    + Tambah Siswa
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u748564652/domains/englishfornusantara.com/proyek-pertama-saya/resources/views/admin/users/index.blade.php ENDPATH**/ ?>