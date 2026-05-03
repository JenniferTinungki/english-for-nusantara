

<?php $__env->startSection('title', 'Quiz Chapter'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4 px-3">
    <style>
        :root{
            --bg:#f4f7fb;
            --card:#ffffff;
            --line:#e7edf5;
            --text:#16213e;
            --muted:#74839a;
            --blue:#2563eb;
        }

        body{ background:var(--bg); }

        .quiz-shell{
            max-width:1520px;
            margin:0 auto;
        }

        .hero{
            background: linear-gradient(135deg, #08245f 0%, #0a2e7b 45%, #123da0 100%);
            border-radius:24px;
            padding:20px;
            color:#fff;
            box-shadow: 0 18px 42px rgba(8,36,95,.16);
            margin-bottom:20px;
        }

        .hero-badge{
            display:inline-flex;
            align-items:center;
            background:rgba(255,255,255,.12);
            border:1px solid rgba(255,255,255,.16);
            color:#fff;
            border-radius:999px;
            padding:8px 14px;
            font-weight:800;
            font-size:.9rem;
            margin-bottom:12px;
        }

        .hero-title{
            margin:0 0 6px 0;
            font-size:1.35rem;
            font-weight:900;
            color:#fff;
        }

        .hero-sub{
            margin:0;
            color:rgba(255,255,255,.82);
            font-size:.95rem;
            max-width:760px;
        }

        .quiz-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(270px, 1fr));
            gap:24px;
        }

        .quiz-card{
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 20px;
            box-shadow: 0 8px 22px rgba(15,23,42,.04);
            overflow: hidden;
            transition: all .18s ease;
        }

        .quiz-card:hover{
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(15,23,42,.06);
        }

        .quiz-cover{
            height: 105px;
            position: relative;
            overflow: hidden;
        }

        .quiz-cover::after{
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,.18), rgba(0,0,0,.02));
        }

        .quiz-cover-content{
            position: absolute;
            left: 14px;
            bottom: 12px;
            z-index: 2;
            color: #fff;
        }

        .chapter-pill{
            display:inline-flex;
            align-items:center;
            border-radius:999px;
            padding:8px 12px;
            font-size:.8rem;
            font-weight:800;
            background:rgba(255,255,255,.18);
            border:1px solid rgba(255,255,255,.20);
            color:#fff;
            margin-bottom:8px;
        }

        .cover-title{
            font-size:.92rem;
            font-weight:900;
            margin:0;
            line-height:1.2;
        }

        .quiz-body{
            padding:14px;
        }

        .quiz-title{
            font-size:.95rem;
            font-weight:800;
            color:var(--text);
            margin-bottom:4px;
            line-height:1.3;
        }

        .quiz-desc{
            color:var(--muted);
            font-size:.86rem;
            line-height:1.45;
            min-height:34px;
            margin-bottom:12px;
        }

        .meta-row{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:10px;
            margin-bottom:12px;
        }

        .meta-box{
            border:1px solid #e8eef7;
            background:#f8fbff;
            border-radius:14px;
            padding:10px 12px;
            text-align:center;
        }

        .meta-label{
            display:block;
            color:#6b7280;
            font-size:.76rem;
            font-weight:700;
            margin-bottom:4px;
        }

        .meta-value{
            display:block;
            color:var(--text);
            font-size:.9rem;
            font-weight:800;
        }

        .score-badge{
            display:inline-flex;
            align-items:center;
            gap:8px;
            background:#f0fdf4;
            border:1px solid #cdebd7;
            color:#169c4f;
            border-radius:999px;
            padding:7px 11px;
            font-size:.8rem;
            font-weight:800;
            margin-bottom:12px;
        }

        .btn-premium{
            border-radius:12px;
            font-weight:800;
            padding:10px 16px;
            min-height:42px;
            font-size:.9rem;
        }

        .empty-card{
            background:var(--card);
            border:1px solid var(--line);
            border-radius:20px;
            box-shadow:0 8px 22px rgba(15,23,42,.04);
            padding:42px 24px;
            text-align:center;
        }
    </style>

    <?php
        $covers = [
            0 => 'linear-gradient(135deg, #2563eb 0%, #60a5fa 100%)',
            1 => 'linear-gradient(135deg, #0f766e 0%, #2dd4bf 100%)',
            2 => 'linear-gradient(135deg, #7c3aed 0%, #a78bfa 100%)',
            3 => 'linear-gradient(135deg, #ea580c 0%, #fb923c 100%)',
            4 => 'linear-gradient(135deg, #db2777 0%, #f472b6 100%)',
            5 => 'linear-gradient(135deg, #059669 0%, #34d399 100%)',
        ];
    ?>

    <div class="quiz-shell">
        <div class="hero">
            <div class="hero-badge">Interactive Quiz</div>
            <h1 class="hero-title">Quiz Per Chapter</h1>
            <p class="hero-sub">
                Pilih chapter yang ingin kamu kerjakan. Setiap quiz memiliki durasi 5 menit dan akan otomatis terkirim saat waktu habis.
            </p>
        </div>

        <?php if($quizzes->count() > 0): ?>
            <div class="quiz-grid">
                <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $latestAttempt = $quiz->attempts->first() ?? null;
                        $chapter = $quiz->chapter ?? 0;
                        $cover = $covers[$chapter] ?? 'linear-gradient(135deg, #2563eb 0%, #60a5fa 100%)';
                    ?>

                    <div class="quiz-card">
                        <div class="quiz-cover" style="background: <?php echo e($cover); ?>;">
                            <div class="quiz-cover-content">
                                <div class="chapter-pill">Chapter <?php echo e($quiz->chapter ?? '-'); ?></div>
                                <h3 class="cover-title"><?php echo e($quiz->display_title); ?></h3>
                            </div>
                        </div>

                        <div class="quiz-body">
                            <div class="quiz-title"><?php echo e($quiz->display_title); ?></div>
                            <div class="quiz-desc">
                                <?php echo e(\Illuminate\Support\Str::limit($quiz->display_description, 65)); ?>

                            </div>

                            <div class="meta-row">
                                <div class="meta-box">
                                    <span class="meta-label">Jumlah Soal</span>
                                    <span class="meta-value"><?php echo e($quiz->questions_count); ?></span>
                                </div>

                                <div class="meta-box">
                                    <span class="meta-label">Durasi</span>
                                    <span class="meta-value">5 menit</span>
                                </div>
                            </div>

                            <?php if($latestAttempt): ?>
                                <div class="score-badge">
                                    Skor terakhir: <?php echo e($latestAttempt->display_score); ?>

                                </div>
                            <?php endif; ?>

                            <div class="d-grid">
                                <a href="<?php echo e(route('siswa.quiz.show', $quiz->id)); ?>" class="btn btn-primary btn-premium">
                                    Mulai Quiz
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="empty-card">
                <h4 class="fw-bold mb-2">Belum ada quiz tersedia</h4>
                <p class="text-muted mb-0">Quiz akan muncul setelah data berhasil ditambahkan ke database.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\siswa\quiz\index.blade.php ENDPATH**/ ?>