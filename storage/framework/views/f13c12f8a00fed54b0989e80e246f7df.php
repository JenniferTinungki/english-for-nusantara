

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <?php if(session('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 px-4 py-3">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="assessment-result-page">
        <div class="result-shell">
            <div class="result-hero">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="result-chip">Hasil Assessment</span>
                        <h1 class="result-title"><?php echo e($attempt->assessment->title); ?></h1>
                        <p class="result-subtitle mb-0">
                            Assessment telah berhasil diselesaikan. Berikut ringkasan hasil dan detail jawabanmu.
                        </p>
                    </div>

                    <div class="col-lg-4">
                        <div class="score-panel">
                            <div class="score-label">Nilai Akhir</div>
                            <div class="score-value"><?php echo e($attempt->score); ?></div>
                            <div class="score-caption">dari 100 poin</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="result-stats">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="stat-card">
                            <div class="stat-label">Status</div>
                            <div class="stat-value">
                                <?php if($attempt->status === 'submitted'): ?>
                                    <span class="status-pill status-success">Submitted</span>
                                <?php else: ?>
                                    <span class="status-pill status-neutral"><?php echo e(ucfirst($attempt->status)); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stat-card">
                            <div class="stat-label">Waktu Kumpul</div>
                            <div class="stat-value-text">
                                <?php echo e(optional($attempt->submitted_at)->format('d-m-Y H:i') ?? '-'); ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stat-card">
                            <div class="stat-label">Jumlah Jawaban</div>
                            <div class="stat-value-text">
                                <?php echo e($attempt->answers->count()); ?> soal
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="answers-section">
                <div class="section-head">
                    <div>
                        <h3 class="section-title">Detail Jawaban</h3>
                        <p class="section-subtitle">Periksa hasil dari setiap soal yang sudah kamu kerjakan.</p>
                    </div>

                    <a href="<?php echo e(route('siswa.assessment.index')); ?>" class="btn btn-outline-primary rounded-pill px-4">
                        Kembali
                    </a>
                </div>

                <?php $__empty_1 = true; $__currentLoopData = $attempt->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="answer-card">
                        <div class="answer-card-top">
                            <div class="answer-left">
                                <div class="question-number"><?php echo e($index + 1); ?></div>

                                <div>
                                    <div class="question-title">
                                        <?php echo e($answer->question->question); ?>

                                    </div>
                                    <div class="question-meta">Soal nomor <?php echo e($index + 1); ?></div>
                                </div>
                            </div>

                            <div class="answer-right">
                                <?php if($answer->is_correct): ?>
                                    <span class="answer-badge answer-badge-correct">Benar</span>
                                <?php else: ?>
                                    <span class="answer-badge answer-badge-wrong">Salah</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row g-3 mt-1">
                            <div class="col-md-6">
                                <div class="answer-box">
                                    <div class="answer-box-label">Jawaban Kamu</div>
                                    <div class="answer-box-value"><?php echo e($answer->jawaban_siswa ?? '-'); ?></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="answer-box">
                                    <div class="answer-box-label">Kunci Jawaban</div>
                                    <div class="answer-box-value"><?php echo e($answer->question->correct_answer ?? '-'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-card">
                        Tidak ada jawaban tersimpan.
                    </div>
                <?php endif; ?>

                <div class="bottom-action">
                    <a href="<?php echo e(route('siswa.assessment.index')); ?>" class="btn btn-primary rounded-pill px-4 py-2">
                        Kembali ke Daftar Assessment
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .assessment-result-page {
        padding-bottom: 12px;
    }

    .result-shell {
        background: #ffffff;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        border: 1px solid rgba(226, 232, 240, 0.9);
    }

    .result-hero {
        padding: 32px;
        background:
            radial-gradient(circle at top right, rgba(255,255,255,0.18), transparent 30%),
            linear-gradient(135deg, #1d4ed8 0%, #2563eb 45%, #3b82f6 100%);
        color: #ffffff;
    }

    .result-chip {
        display: inline-block;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
        background: rgba(255,255,255,0.16);
        border: 1px solid rgba(255,255,255,0.18);
        padding: 8px 14px;
        border-radius: 999px;
        margin-bottom: 14px;
        backdrop-filter: blur(8px);
    }

    .result-title {
        font-size: 34px;
        font-weight: 800;
        line-height: 1.15;
        margin-bottom: 10px;
        color: #ffffff;
    }

    .result-subtitle {
        max-width: 700px;
        color: rgba(255,255,255,0.85);
        font-size: 15px;
        line-height: 1.7;
    }

    .score-panel {
        background: rgba(255,255,255,0.14);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 24px;
        padding: 24px;
        text-align: center;
        backdrop-filter: blur(10px);
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }

    .score-label {
        color: rgba(255,255,255,0.8);
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .score-value {
        font-size: 56px;
        line-height: 1;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 8px;
    }

    .score-caption {
        color: rgba(255,255,255,0.75);
        font-size: 13px;
    }

    .result-stats {
        padding: 24px 32px 8px 32px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 20px;
        height: 100%;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
    }

    .stat-label {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .stat-value,
    .stat-value-text {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        padding: 10px 16px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 700;
    }

    .status-success {
        background: #dcfce7;
        color: #166534;
    }

    .status-neutral {
        background: #e2e8f0;
        color: #334155;
    }

    .answers-section {
        padding: 32px;
        background: #ffffff;
    }

    .section-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .section-title {
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .section-subtitle {
        color: #64748b;
        margin-bottom: 0;
        font-size: 14px;
    }

    .answer-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 24px;
        margin-bottom: 18px;
        box-shadow: 0 10px 28px rgba(15, 23, 42, 0.05);
    }

    .answer-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .answer-left {
        display: flex;
        align-items: flex-start;
        gap: 14px;
    }

    .question-number {
        width: 46px;
        height: 46px;
        min-width: 46px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: #ffffff;
        font-weight: 800;
        box-shadow: 0 8px 18px rgba(37, 99, 235, 0.25);
    }

    .question-title {
        font-size: 18px;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.5;
        margin-bottom: 4px;
    }

    .question-meta {
        font-size: 13px;
        color: #64748b;
    }

    .answer-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        padding: 10px 16px;
        font-size: 14px;
        font-weight: 700;
    }

    .answer-badge-correct {
        background: #dcfce7;
        color: #166534;
    }

    .answer-badge-wrong {
        background: #fee2e2;
        color: #991b1b;
    }

    .answer-box {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 18px;
        height: 100%;
    }

    .answer-box-label {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        color: #64748b;
        margin-bottom: 8px;
    }

    .answer-box-value {
        font-size: 28px;
        font-weight: 800;
        line-height: 1;
        color: #0f172a;
    }

    .empty-card {
        border: 1px dashed #cbd5e1;
        background: #f8fafc;
        border-radius: 20px;
        padding: 24px;
        color: #64748b;
        text-align: center;
    }

    .bottom-action {
        margin-top: 28px;
        text-align: center;
    }

    @media (max-width: 991.98px) {
        .result-title {
            font-size: 28px;
        }

        .score-value {
            font-size: 48px;
        }
    }

    @media (max-width: 767.98px) {
        .result-hero,
        .result-stats,
        .answers-section {
            padding-left: 20px;
            padding-right: 20px;
        }

        .result-title {
            font-size: 24px;
        }

        .section-title {
            font-size: 20px;
        }

        .answer-box-value {
            font-size: 24px;
        }

        .score-panel {
            padding: 20px;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\siswa\assessment\result.blade.php ENDPATH**/ ?>