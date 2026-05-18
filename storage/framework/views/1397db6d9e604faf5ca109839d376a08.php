<?php $__env->startSection('content'); ?>
<div class="page-shell">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="font-size:2.5rem;font-weight:800;letter-spacing:-1px;margin-bottom:8px;color:#102040;">
                Data Siswa
            </h1>
            <p style="color:#6e7b91;font-size:1.05rem;margin:0;">
                Pantau data dan perkembangan seluruh siswa.
            </p>
        </div>
        <a href="<?php echo e(route('guru.siswa.create')); ?>" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">
            <i class="fas fa-plus me-2"></i> Tambah Siswa
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success rounded-3 mb-4"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center h-100">
                <div class="text-muted small fw-semibold mb-1">Total Siswa</div>
                <div class="fs-2 fw-bold text-primary"><?php echo e($totalSiswa); ?></div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center h-100">
                <div class="text-muted small fw-semibold mb-1">Siswa Aktif</div>
                <div class="fs-2 fw-bold text-success"><?php echo e($siswaAktif); ?></div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center h-100">
                <div class="text-muted small fw-semibold mb-1">Jumlah Kelas</div>
                <div class="fs-2 fw-bold text-info"><?php echo e($kelasList->count()); ?></div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 text-center h-100">
                <div class="text-muted small fw-semibold mb-1">Halaman</div>
                <div class="fs-2 fw-bold text-secondary"><?php echo e($siswa->currentPage()); ?>/<?php echo e($siswa->lastPage()); ?></div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3 p-3 mb-4">
        <form method="GET" action="<?php echo e(route('guru.siswa.index')); ?>" class="row g-2 align-items-end">
            <div class="col-md-5">
                <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                    class="form-control rounded-pill" placeholder="Cari nama, NIS, username, atau email...">
            </div>
            <div class="col-md-3">
                <select name="kelas" class="form-select rounded-pill">
                    <option value="">Semua Kelas</option>
                    <?php $__currentLoopData = $kelasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($kelas); ?>" <?php echo e(request('kelas') == $kelas ? 'selected' : ''); ?>>
                            <?php echo e($kelas); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2">
                <select name="gender" class="form-select rounded-pill">
                    <option value="">Semua Gender</option>
                    <option value="L" <?php echo e(request('gender') == 'L' ? 'selected' : ''); ?>>Laki-laki</option>
                    <option value="P" <?php echo e(request('gender') == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4 w-100">Filter</button>
                <?php if(request()->anyFilled(['search','kelas','gender'])): ?>
                    <a href="<?php echo e(route('guru.siswa.index')); ?>" class="btn btn-light rounded-pill px-3">Reset</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <div class="card border-0 shadow-sm rounded-3 p-3">
        <?php if($siswa->count()): ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Info Siswa</th>
                            <th>Kelas / Gender</th>
                            <th>Progress</th>
                            <th>Rata-rata Nilai</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle text-white fw-bold flex-shrink-0"
                                         style="width:42px;height:42px;font-size:1.1rem;background:#2563eb;">
                                        <?php echo e(strtoupper(substr($s->name, 0, 1))); ?>

                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark"><?php echo e($s->name); ?></div>
                                        <div class="text-muted small">NIS: <?php echo e($s->nis ?: '-'); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-1 align-items-center">
                                    <?php if($s->kelas): ?>
                                        <span class="badge bg-primary rounded-pill px-3"><?php echo e($s->kelas); ?></span>
                                    <?php endif; ?>
                                    <?php if($s->jenis_kelamin): ?>
                                        <span class="badge rounded-pill px-3"
                                            style="<?php echo e($s->jenis_kelamin === 'P' ? 'background:#ec4899;' : 'background:#06b6d4;'); ?> color:#fff;">
                                            <?php echo e($s->jenis_kelamin); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if(!$s->kelas && !$s->jenis_kelamin): ?>
                                        <span class="text-muted small">-</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <?php $progress = $s->progress_materi; ?>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="progress flex-grow-1" style="height:8px;min-width:80px;">
                                        <div class="progress-bar <?php echo e($progress >= 75 ? 'bg-success' : ($progress >= 40 ? 'bg-warning' : 'bg-danger')); ?>"
                                             style="width:<?php echo e($progress); ?>%"></div>
                                    </div>
                                    <span class="small fw-semibold"><?php echo e($progress); ?>%</span>
                                </div>
                            </td>
                            <td>
                                <?php $nilai = $s->nilai_rata_rata; ?>
                                <span class="fw-bold <?php echo e($nilai !== null && $nilai >= 75 ? 'text-success' : ($nilai !== null && $nilai >= 50 ? 'text-warning' : 'text-danger')); ?>">
                                    <?php echo e($nilai !== null ? $nilai : 'Belum ada nilai'); ?>

                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="<?php echo e(route('guru.siswa.show', $s->id)); ?>"
                                       class="btn btn-sm btn-light rounded-pill px-3">Detail</a>
                                    <a href="<?php echo e(route('guru.siswa.edit', $s->id)); ?>"
                                       class="btn btn-sm btn-warning rounded-pill px-3">Edit</a>
                                    <form action="<?php echo e(route('guru.siswa.destroy', $s->id)); ?>" method="POST"
                                          onsubmit="return confirm('Yakin hapus siswa <?php echo e($s->name); ?>?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <?php echo e($siswa->withQueryString()->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <div style="font-size:3rem;">👨‍🎓</div>
                <h4 class="fw-bold mt-3">Tidak ada siswa ditemukan</h4>
                <p class="text-muted">Coba ubah filter atau tambah siswa baru.</p>
                <a href="<?php echo e(route('guru.siswa.create')); ?>" class="btn btn-primary rounded-pill px-4 mt-2">
                    + Tambah Siswa
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u748564652/domains/englishfornusantara.com/proyek-pertama-saya/resources/views/guru/siswa/index.blade.php ENDPATH**/ ?>