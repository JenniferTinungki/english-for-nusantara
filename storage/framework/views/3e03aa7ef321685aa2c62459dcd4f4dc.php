

<?php $__env->startSection('content'); ?>
<div class="page-shell">
    <div class="row g-4 align-items-stretch mb-4">
        <div class="col-lg-8">
            <div class="glass-card p-4 p-lg-5 h-100" style="background: linear-gradient(135deg, #2451e6 0%, #5b4df1 100%); color: white;">
                <div class="d-flex flex-column h-100 justify-content-between">
                    <div>
                        <div class="mb-3" style="font-size: 0.95rem; letter-spacing: 0.12em; text-transform: uppercase; opacity: 0.8; font-weight: 700;">
                            Dashboard Guru
                        </div>

                        <h1 style="font-size: 3rem; line-height: 1.08; font-weight: 800; letter-spacing: -0.04em; margin-bottom: 18px;">
                            Kelola pembelajaran<br>lebih modern dan elegan
                        </h1>

                        <p style="font-size: 1.08rem; line-height: 1.9; max-width: 780px; opacity: 0.92; margin-bottom: 0;">
                            Pantau materi, tugas, submit siswa, dan penilaian dalam satu dashboard
                            dengan tampilan yang lebih premium, bersih, dan nyaman digunakan.
                        </p>
                    </div>

                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="<?php echo e(route('guru.materi.create')); ?>" class="btn-premium" style="background: white; color: #2049da;">
                            + Tambah Materi
                        </a>
                        <a href="<?php echo e(route('guru.tugas.create')); ?>" class="btn-soft" style="background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.2); color: white;">
                            + Tambah Tugas
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="glass-card-strong p-4 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div style="font-size: 0.9rem; color: #6e7b91; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em;">
                            Profil Guru
                        </div>
                        <h3 style="font-size: 1.55rem; font-weight: 800; margin-top: 10px; margin-bottom: 6px;">
                            <?php echo e(Auth::user()->name ?? 'Guru'); ?>

                        </h3>
                        <p style="color: #6e7b91; margin-bottom: 0;">
                            <?php echo e(ucfirst(Auth::user()->role ?? 'guru')); ?>

                        </p>
                    </div>

                    <div style="width: 56px; height: 56px; border-radius: 18px; background: linear-gradient(135deg, #2451e6 0%, #5b4df1 100%); color: white; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.15rem;">
                        <?php echo e(strtoupper(substr(Auth::user()->name ?? 'G', 0, 1))); ?>

                    </div>
                </div>

                <hr style="margin: 20px 0; border-color: rgba(19,35,63,0.08);">

                <div class="row g-3">
                    <div class="col-6">
                        <div style="color: #6e7b91; font-size: 0.95rem;">Role</div>
                        <div style="font-weight: 800; color: #13233f;">Guru</div>
                    </div>
                    <div class="col-6">
                        <div style="color: #6e7b91; font-size: 0.95rem;">Status</div>
                        <div style="font-weight: 800; color: #16a34a;">Aktif</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div style="color:#6e7b91; font-weight:600;">Total Materi</div>
                <div style="font-size:2.4rem; font-weight:800; margin-top:10px;"><?php echo e($totalMateri ?? 0); ?></div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div style="color:#6e7b91; font-weight:600;">Total Tugas</div>
                <div style="font-size:2.4rem; font-weight:800; margin-top:10px;"><?php echo e($totalTugas ?? 0); ?></div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div style="color:#6e7b91; font-weight:600;">Total Submit</div>
                <div style="font-size:2.4rem; font-weight:800; margin-top:10px;"><?php echo e($totalSubmit ?? 0); ?></div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="glass-card-strong p-4 h-100">
                <div style="color:#6e7b91; font-weight:600;">Total Siswa</div>
                <div style="font-size:2.4rem; font-weight:800; margin-top:10px;"><?php echo e($totalSiswa ?? 0); ?></div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="glass-card-strong p-4 p-lg-5 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="section-title" style="font-size: 2rem; margin-bottom: 6px;">Tugas Terbaru</h2>
                        <p class="section-subtitle">Pantau tugas terbaru dan akses detailnya dengan cepat.</p>
                    </div>

                    <a href="<?php echo e(route('guru.tugas.index')); ?>" class="btn-soft">Lihat Semua</a>
                </div>

                <?php if(isset($tugasTerbaru) && count($tugasTerbaru)): ?>
                    <div class="d-flex flex-column gap-3">
                        <?php $__currentLoopData = $tugasTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tugas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 p-4"
                                 style="background:#f8faff; border:1px solid rgba(36,81,230,0.08); border-radius:22px;">
                                <div>
                                    <h5 style="margin-bottom:8px; font-weight:800; color:#13233f;">
                                        <?php echo e($tugas->judul); ?>

                                    </h5>
                                    <div style="color:#6e7b91;">
                                        Deadline:
                                        <?php echo e(\Carbon\Carbon::parse($tugas->deadline)->format('d M Y • H:i')); ?>

                                    </div>
                                </div>

                                <a href="<?php echo e(route('guru.tugas.show', $tugas->id)); ?>" class="btn-premium">
                                    Detail
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        Belum ada tugas terbaru.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="glass-card-strong p-4 p-lg-5 h-100">
                <div class="mb-4">
                    <h2 class="section-title" style="font-size: 2rem; margin-bottom: 6px;">Aksi Cepat</h2>
                    <p class="section-subtitle">Akses fitur utama dengan satu klik.</p>
                </div>

                <div class="d-grid gap-3">
                    <a href="<?php echo e(route('guru.materi.create')); ?>" class="btn-premium">
                        + Tambah Materi
                    </a>

                    <a href="<?php echo e(route('guru.tugas.create')); ?>" class="btn-premium">
                        + Tambah Tugas
                    </a>

                    <a href="<?php echo e(route('guru.materi.index')); ?>" class="btn-soft">
                        Kelola Materi
                    </a>

                    <a href="<?php echo e(route('guru.tugas.index')); ?>" class="btn-soft">
                        Kelola Tugas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u748564652/domains/englishfornusantara.com/proyek-pertama-saya/resources/views/guru/dashboard.blade.php ENDPATH**/ ?>