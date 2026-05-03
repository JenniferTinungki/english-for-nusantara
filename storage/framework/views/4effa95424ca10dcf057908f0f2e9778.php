

<?php $__env->startSection('title', 'Hasil Quiz'); ?>

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

        .result-shell{
            max-width:1000px;
            margin:0 auto;
        }

        .hero{
            background: linear-gradient(135deg, #08245f 0%, #0a2e7b 45%, #123da0 100%);
            border-radius:24px;
            padding:20px;
            color:#fff;
            box-shadow: 0 18px 42px rgba(8,36,95,.16);
            margin-bottom:20px;
            text-align:center;
        }

        .hero-title{
            font-size:1.4rem;
            font-weight:900;
            margin-bottom:6px;
        }

        .hero-sub{
            color:rgba(255,255,255,.82);
            margin:0;
        }

        .card-box{
            background:var(--card);
            border:1px solid var(--line);
            border-radius:20px;
            box-shadow:0 8px 22px rgba(15,23,42,.04);
            padding:24px;
        }

        .score{
            font-size:3rem;
            font-weight:900;
            color:var(--blue);
            line-height:1;
        }

        .muted{
            color:var(--muted);
        }

        .btn-premium{
            border-radius:12px;
            font-weight:800;
            padding:12px 16px;
            min-height:44px;
        }
    </style>

    <div class="result-shell">
        <div class="hero">
            <div class="hero-title"><?php echo e($attempt->quiz->judul); ?></div>
            <p class="hero-sub">Quiz selesai. Berikut hasil pengerjaanmu.</p>
        </div>

        <div class="card-box text-center">
            <div class="score mb-2"><?php echo e($attempt->score); ?></div>
            <div class="muted mb-4">Skor Akhir</div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="border rounded-4 p-3">
                        <div class="fw-bold">Benar</div>
                        <div><?php echo e($attempt->correct_answers); ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded-4 p-3">
                        <div class="fw-bold">Total Soal</div>
                        <div><?php echo e($attempt->total_questions); ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded-4 p-3">
                        <div class="fw-bold">Chapter</div>
                        <div><?php echo e($attempt->quiz->chapter); ?></div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-center">
                <a href="<?php echo e(route('siswa.quiz.index')); ?>" class="btn btn-outline-secondary btn-premium">
                    Kembali ke Daftar Quiz
                </a>
                <a href="<?php echo e(route('siswa.quiz.show', $attempt->quiz->id)); ?>" class="btn btn-primary btn-premium">
                    Kerjakan Lagi
                </a>
                <a href="<?php echo e(route('siswa.quiz.leaderboard', $attempt->quiz->id)); ?>" class="btn btn-outline-primary btn-premium">
                    Leaderboard
                </a>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const messages = [
            "Kerja bagus! Terus semangat belajar dan tingkatkan skormu lagi.",
            "Hebat! Setiap latihan membuat kemampuanmu semakin kuat.",
            "Bagus sekali! Jangan berhenti, lanjutkan ke chapter berikutnya.",
            "Kamu sudah berusaha dengan baik. Terus konsisten, hasilmu akan makin bagus.",
            "Mantap! Belajar sedikit demi sedikit setiap hari akan membawa hasil besar."
        ];

        const randomMessage = messages[Math.floor(Math.random() * messages.length)];
        setTimeout(() => {
            alert("🎉 Quiz selesai!\n\n" + randomMessage);
        }, 300);
    });
    </script>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\siswa\quiz\result.blade.php ENDPATH**/ ?>