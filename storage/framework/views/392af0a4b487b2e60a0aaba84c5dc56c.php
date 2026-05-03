

<?php $__env->startSection('content'); ?>
<div class="page-shell">

    
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 style="font-size:2.5rem;font-weight:800;letter-spacing:-1px;margin-bottom:8px;color:#102040;">
                Penilaian Siswa
            </h1>
            <p style="color:#6e7b91;font-size:1.05rem;margin:0;">
                Lihat nilai quiz dan assessment seluruh siswa.
            </p>
        </div>
    </div>

    
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="glass-card p-4 text-center">
                <div class="text-muted fw-semibold mb-1" style="font-size:0.85rem;">Total Siswa</div>
                <div class="fw-800" style="font-size:2rem;color:#102040;"><?php echo e($totalSiswa); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card p-4 text-center">
                <div class="text-muted fw-semibold mb-1" style="font-size:0.85rem;">Total Quiz Dikerjakan</div>
                <div class="fw-800" style="font-size:2rem;color:#1a56db;"><?php echo e($totalQuizAttempts); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card p-4 text-center">
                <div class="text-muted fw-semibold mb-1" style="font-size:0.85rem;">Rata-rata Nilai Quiz</div>
                <div class="fw-800" style="font-size:2rem;color:#059669;"><?php echo e(round($avgQuizScore)); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card p-4 text-center">
                <div class="text-muted fw-semibold mb-1" style="font-size:0.85rem;">Rata-rata Nilai Assessment</div>
                <div class="fw-800" style="font-size:2rem;color:#d97706;"><?php echo e(round($avgAssessmentScore)); ?></div>
            </div>
        </div>
    </div>

    
    <div class="glass-card-strong p-4 p-lg-5">
        <ul class="nav nav-pills mb-4 gap-2">
            <li class="nav-item">
                <a href="?tab=quiz" class="nav-link rounded-pill px-4 <?php echo e($tab === 'quiz' ? 'active' : ''); ?>">
                    Quiz
                </a>
            </li>
            <li class="nav-item">
                <a href="?tab=assessment" class="nav-link rounded-pill px-4 <?php echo e($tab === 'assessment' ? 'active' : ''); ?>">
                    Assessment
                </a>
            </li>
        </ul>

        <?php if($tab === 'quiz'): ?>
            
            <h4 class="fw-bold mb-3" style="color:#102040;">Nilai Quiz Siswa</h4>
            <?php if($quizAttempts->count()): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Siswa</th>
                                <th>Quiz</th>
                                <th>Nilai</th>
                                <th>Benar</th>
                                <th>Total Soal</th>
                                <th>Waktu Submit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $quizAttempts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attempt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td class="fw-semibold"><?php echo e($attempt->user->name ?? '-'); ?></td>
                                    <td><?php echo e($attempt->quiz->judul ?? '-'); ?></td>
                                    <td>
                                        <span class="badge rounded-pill px-3 py-2
                                            <?php echo e(($attempt->score ?? $attempt->nilai ?? 0) >= 75 ? 'bg-success' : 'bg-danger'); ?>">
                                            <?php echo e($attempt->score ?? $attempt->nilai ?? 0); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e($attempt->correct_answers ?? '-'); ?></td>
                                    <td><?php echo e($attempt->total_questions ?? '-'); ?></td>
                                    <td>
                                        <?php echo e($attempt->submitted_at ? $attempt->submitted_at->format('d/m/Y H:i') : '-'); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="rounded-3 bg-warning bg-opacity-10 border border-warning text-warning-emphasis px-4 py-4 text-center fw-semibold">
                    Belum ada siswa yang mengerjakan quiz.
                </div>
            <?php endif; ?>

        <?php else: ?>
            
            <h4 class="fw-bold mb-3" style="color:#102040;">Nilai Assessment Siswa</h4>
            <?php if($assessmentAttempts->count()): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Siswa</th>
                                <th>Assessment</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Waktu Submit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $assessmentAttempts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attempt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $passingScore = $attempt->assessment->passing_score ?? 75;
                                    $passed = $attempt->score >= $passingScore;
                                ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td class="fw-semibold"><?php echo e($attempt->user->name ?? '-'); ?></td>
                                    <td><?php echo e($attempt->assessment->title ?? '-'); ?></td>
                                    <td>
                                        <span class="badge rounded-pill px-3 py-2
                                            <?php echo e($passed ? 'bg-success' : 'bg-danger'); ?>">
                                            <?php echo e($attempt->score ?? 0); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <?php if($passed): ?>
                                            <span class="badge bg-success rounded-pill px-3">Lulus</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger rounded-pill px-3">Tidak Lulus</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($attempt->submitted_at ? $attempt->submitted_at->format('d/m/Y H:i') : '-'); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="rounded-3 bg-warning bg-opacity-10 border border-warning text-warning-emphasis px-4 py-4 text-center fw-semibold">
                    Belum ada siswa yang mengerjakan assessment.
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\guru\penilaian\index.blade.php ENDPATH**/ ?>