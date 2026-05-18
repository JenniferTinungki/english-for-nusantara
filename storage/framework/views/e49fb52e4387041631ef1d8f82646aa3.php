<?php $__env->startSection('title', 'Quiz - ' . ($quiz->judul ?? 'Tanpa Judul')); ?>

<?php $__env->startSection('content'); ?>
<?php
    $isSubmitted = !empty($latestAttempt);
    $totalQuestions = $quiz->questions->count();
?>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <a href="<?php echo e(route('siswa.quiz.index')); ?>"
       class="inline-flex items-center gap-2 text-blue-700 font-bold mb-6 hover:text-blue-800 transition">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali ke daftar quiz
    </a>

    <section class="relative overflow-hidden rounded-[32px] min-h-[220px] shadow-2xl mb-8">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 via-blue-700 to-indigo-600"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.15),transparent_35%)]"></div>
        <div class="relative z-10 p-6 lg:p-10 text-white flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/15 font-bold mb-5 backdrop-blur-sm">
                    <i class="fa-solid fa-circle-question"></i>
                    Quiz Chapter <?php echo e($quiz->chapter ?? '-'); ?>

                </div>
                <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-3"><?php echo e($quiz->judul); ?></h1>
                <p class="text-white/80 leading-7"><?php echo e($quiz->deskripsi ?? 'Kerjakan quiz ini dengan teliti. Pilih jawaban yang paling tepat.'); ?></p>
            </div>
            <div class="flex flex-col gap-3 min-w-[180px]">
                <div class="rounded-2xl bg-white/10 border border-white/15 p-4 text-center backdrop-blur-sm">
                    <div class="text-4xl font-extrabold"><?php echo e($totalQuestions); ?></div>
                    <div class="text-white/70 text-sm mt-1">Total Soal</div>
                </div>
                <?php if($isSubmitted): ?>
                <div class="rounded-2xl bg-emerald-400/20 border border-emerald-200/20 p-4 text-center">
                    <div class="text-4xl font-extrabold"><?php echo e($latestAttempt->score); ?></div>
                    <div class="text-white/70 text-sm mt-1">Skor Terakhir</div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if($isSubmitted): ?>
    <div class="bg-emerald-50 border border-emerald-200 rounded-[24px] p-5 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <h4 class="font-extrabold text-emerald-800">Kamu sudah mengerjakan quiz ini</h4>
                <p class="text-emerald-600 text-sm">Skor terakhir: <strong><?php echo e($latestAttempt->score); ?></strong> | Benar: <strong><?php echo e($latestAttempt->correct_answers); ?>/<?php echo e($latestAttempt->total_questions); ?></strong></p>
            </div>
        </div>
        <a href="<?php echo e(route('siswa.quiz.leaderboard', $quiz->id)); ?>" class="px-4 py-2 rounded-xl border border-emerald-300 text-emerald-700 font-bold hover:bg-emerald-100 transition">
            <i class="fa-solid fa-trophy mr-1"></i> Leaderboard
        </a>
    </div>
    <?php endif; ?>

    <?php if($totalQuestions > 0): ?>
    <form id="quizForm" action="<?php echo e(route('siswa.quiz.submit', $quiz->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="auto_submitted" id="autoSubmitted" value="0">

        <?php if(!empty($quiz->durasi)): ?>
        <div class="bg-white rounded-[24px] border border-slate-200 shadow p-4 mb-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div>
                    <p class="text-slate-500 text-sm">Waktu tersisa</p>
                    <h4 id="timerDisplay" class="text-xl font-extrabold text-slate-800"><?php echo e(gmdate('H:i:s', $quiz->durasi * 60)); ?></h4>
                </div>
            </div>
            <div class="text-slate-500 text-sm font-semibold">Durasi: <?php echo e($quiz->durasi); ?> menit</div>
        </div>
        <?php endif; ?>

        <div class="space-y-6 mb-8">
            <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-[24px] border border-slate-200 shadow-md p-6">
                <div class="flex items-start gap-4 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-extrabold text-sm flex-shrink-0"><?php echo e($index + 1); ?></div>
                    <p class="text-slate-800 font-semibold text-base leading-7 pt-1"><?php echo e($question->question); ?></p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pl-14">
                    <?php $__currentLoopData = ['A' => $question->option_a, 'B' => $question->option_b, 'C' => $question->option_c, 'D' => $question->option_d]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($option)): ?>
                    <label class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-blue-50 hover:border-blue-300 cursor-pointer px-4 py-3 transition select-none">
                        <input type="radio" name="answers[<?php echo e($question->id); ?>]" value="<?php echo e($key); ?>" class="accent-blue-600 w-4 h-4 flex-shrink-0">
                        <span class="text-slate-700 font-medium leading-6"><span class="font-extrabold text-blue-600 mr-1"><?php echo e($key); ?>.</span><?php echo e($option); ?></span>
                    </label>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="bg-white rounded-[24px] border border-slate-200 shadow-md p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-slate-500 text-sm">Pastikan semua soal sudah dijawab sebelum mengirim.</p>
            <button type="button" onclick="confirmSubmit()" class="px-8 py-3 rounded-2xl bg-gradient-to-r from-blue-700 to-blue-500 text-white font-extrabold shadow-lg hover:from-blue-800 hover:to-blue-600 transition">
                <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Jawaban
            </button>
        </div>
    </form>
    <?php else: ?>
    <div class="bg-amber-50 border border-amber-200 rounded-[24px] p-6 text-center text-amber-700 font-semibold">
        Quiz ini belum memiliki soal.
    </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function confirmSubmit() {
    if (confirm('Yakin ingin mengirim jawaban? Pastikan semua soal sudah dijawab.')) {
        document.getElementById('quizForm').submit();
    }
}
<?php if(!empty($quiz->durasi)): ?>
(function () {
    let remaining = <?php echo e($quiz->durasi * 60); ?>;
    const display = document.getElementById('timerDisplay');
    function pad(n) { return String(n).padStart(2, '0'); }
    function tick() {
        remaining--;
        const h = Math.floor(remaining / 3600);
        const m = Math.floor((remaining % 3600) / 60);
        const s = remaining % 60;
        if (display) display.textContent = h > 0 ? `${pad(h)}:${pad(m)}:${pad(s)}` : `${pad(m)}:${pad(s)}`;
        if (remaining <= 60 && display) display.classList.add('text-red-600');
        if (remaining <= 0) {
            document.getElementById('autoSubmitted').value = '1';
            document.getElementById('quizForm').submit();
        }
    }
    setInterval(tick, 1000);
})();
<?php endif; ?>
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u748564652/domains/englishfornusantara.com/proyek-pertama-saya/resources/views/siswa/quiz/show.blade.php ENDPATH**/ ?>