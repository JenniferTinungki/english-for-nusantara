

<?php $__env->startSection('title', $materi->judul); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    
    <div class="rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white shadow-lg shadow-blue-200">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <a href="<?php echo e(route('admin.materi.index')); ?>"
                       class="text-blue-200 hover:text-white text-sm font-medium transition-colors">
                        ← Kelola Materi
                    </a>
                    <span class="text-blue-300">/</span>
                    <span class="text-blue-100 text-sm">Detail</span>
                </div>
                <span class="inline-block bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full mb-2">
                    Chapter <?php echo e($materi->bab); ?>

                </span>
                <h1 class="text-3xl font-extrabold tracking-tight"><?php echo e($materi->judul); ?></h1>
                <?php if($materi->subjudul): ?>
                    <p class="text-blue-100 mt-1 text-sm"><?php echo e($materi->subjudul); ?></p>
                <?php endif; ?>
            </div>
            <div class="flex gap-3 flex-shrink-0">
                <a href="<?php echo e(route('admin.materi.edit', $materi->id)); ?>"
                   class="inline-flex items-center px-5 py-3 bg-white/20 hover:bg-white/30 text-white font-bold rounded-2xl transition-all">
                    <i class="fa-solid fa-edit mr-2"></i> Edit
                </a>
                <form action="<?php echo e(route('admin.materi.destroy', $materi->id)); ?>" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit"
                       class="inline-flex items-center px-5 py-3 bg-red-500/80 hover:bg-red-500 text-white font-bold rounded-2xl transition-all">
                        <i class="fa-solid fa-trash mr-2"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800"><?php echo e($materi->subMateri->count()); ?></p>
                <p class="text-xs text-slate-500 font-medium">Sub Materi</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-clipboard-check"></i>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800"><?php echo e($materi->assessments->count()); ?></p>
                <p class="text-xs text-slate-500 font-medium">Assessment</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-<?php echo e($materi->video ? 'video' : 'video-slash'); ?>"></i>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800"><?php echo e($materi->video ? 'Ada' : 'Tidak'); ?></p>
                <p class="text-xs text-slate-500 font-medium">Video</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-<?php echo e($materi->is_active ? 'emerald' : 'slate'); ?>-100 text-<?php echo e($materi->is_active ? 'emerald' : 'slate'); ?>-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-slate-800"><?php echo e($materi->is_active ? 'Aktif' : 'Nonaktif'); ?></p>
                <p class="text-xs text-slate-500 font-medium">Status</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        
        <div class="lg:col-span-2 space-y-6">

            
            <?php if($materi->deskripsi): ?>
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-3 flex items-center gap-2">
                    <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-align-left"></i>
                    </span>
                    Deskripsi
                </h2>
                <p class="text-slate-600 leading-relaxed"><?php echo e($materi->deskripsi); ?></p>
            </div>
            <?php endif; ?>

            
            <?php if($materi->isi_materi): ?>
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-book-open"></i>
                    </span>
                    Isi Materi
                </h2>
                <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed">
                    <?php echo nl2br(e($materi->isi_materi)); ?>

                </div>
            </div>
            <?php endif; ?>

            
            <?php if($materi->video): ?>
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 bg-red-100 text-red-600 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-video"></i>
                    </span>
                    Video Pembelajaran
                </h2>
                <?php
                    $videoUrl = $materi->video;
                    // Cek apakah YouTube
                    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\s]+)/', $videoUrl, $matches);
                    $youtubeId = $matches[1] ?? null;
                ?>
                <?php if($youtubeId): ?>
                    <div class="rounded-2xl overflow-hidden aspect-video">
                        <iframe class="w-full h-full"
                            src="https://www.youtube.com/embed/<?php echo e($youtubeId); ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                <?php else: ?>
                    <video controls class="w-full rounded-2xl">
                        <source src="<?php echo e(asset('storage/' . $videoUrl)); ?>">
                        Browser Anda tidak mendukung video.
                    </video>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            
            <?php if($materi->subMateri->count() > 0): ?>
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 bg-green-100 text-green-600 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-layer-group"></i>
                    </span>
                    Sub Materi
                    <span class="ml-auto text-xs text-slate-400 bg-slate-100 px-2 py-1 rounded-full">
                        <?php echo e($materi->subMateri->count()); ?> sub
                    </span>
                </h2>
                <div class="space-y-3">
                    <?php $__currentLoopData = $materi->subMateri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-start gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-blue-200 hover:bg-blue-50/40 transition-colors">
                        <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm flex-shrink-0">
                            <?php echo e($index + 1); ?>

                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-slate-800"><?php echo e($sub->judul ?? $sub->nama ?? 'Sub Materi ' . ($index + 1)); ?></p>
                            <?php if(isset($sub->deskripsi) && $sub->deskripsi): ?>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2"><?php echo e($sub->deskripsi); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

        </div>

        
        <div class="space-y-6">

            
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <?php if($materi->gambar): ?>
                    <img src="<?php echo e(asset('storage/' . $materi->gambar)); ?>"
                         alt="<?php echo e($materi->judul); ?>"
                         class="w-full object-cover h-52">
                <?php else: ?>
                    <div class="w-full h-52 bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center">
                        <i class="fa-solid fa-image text-5xl text-blue-300"></i>
                    </div>
                <?php endif; ?>
                <div class="p-5">
                    <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-1">Gambar Materi</p>
                    <p class="text-sm text-slate-600"><?php echo e($materi->gambar ? basename($materi->gambar) : 'Belum ada gambar'); ?></p>
                </div>
            </div>

            
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4">Informasi Materi</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Chapter</span>
                        <span class="text-sm font-bold text-slate-800 bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full border border-indigo-100">
                            Chapter <?php echo e($materi->bab); ?>

                        </span>
                    </div>
                    <?php if($materi->subjudul): ?>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Subjudul</span>
                        <span class="text-sm font-semibold text-slate-700"><?php echo e($materi->subjudul); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($materi->durasi): ?>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Durasi</span>
                        <span class="text-sm font-semibold text-slate-700"><?php echo e($materi->durasi); ?> menit</span>
                    </div>
                    <?php endif; ?>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Status</span>
                        <span class="text-xs font-bold px-3 py-1 rounded-full
                            <?php echo e($materi->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-500 border border-slate-200'); ?>">
                            <?php echo e($materi->is_active ? 'Aktif' : 'Nonaktif'); ?>

                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Dibuat</span>
                        <span class="text-sm font-semibold text-slate-700"><?php echo e($materi->created_at->format('d M Y')); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Diperbarui</span>
                        <span class="text-sm font-semibold text-slate-700"><?php echo e($materi->updated_at->format('d M Y')); ?></span>
                    </div>
                </div>
            </div>

            
            <?php if($materi->assessments->count() > 0): ?>
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4">Assessment</h3>
                <div class="space-y-3">
                    <?php $__currentLoopData = $materi->assessments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assessment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center gap-3 p-3 bg-purple-50 rounded-xl border border-purple-100">
                        <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center text-sm">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-800"><?php echo e($assessment->judul ?? 'Assessment'); ?></p>
                            <?php if(isset($assessment->jumlah_soal)): ?>
                                <p class="text-xs text-slate-500"><?php echo e($assessment->jumlah_soal); ?> soal</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\admin\materi\show.blade.php ENDPATH**/ ?>