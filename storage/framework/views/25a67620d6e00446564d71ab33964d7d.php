<?php $__env->startSection('title', 'Verifikasi Email - English for Nusantara'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-slate-100 px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 text-center">

        
        <div class="flex justify-center mb-6">
            <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center border-2 border-blue-100">
                <span class="text-3xl">📧</span>
            </div>
        </div>

        <h2 class="text-2xl font-extrabold text-slate-900 mb-3">Verifikasi Email Kamu</h2>

        <p class="text-sm text-slate-500 leading-relaxed mb-6">
            Terima kasih sudah mendaftar! Sebelum mulai, mohon verifikasi alamat email kamu
            dengan mengklik link yang sudah kami kirimkan. Jika belum menerima email, kami
            bisa mengirimkan ulang.
        </p>

        
        <?php if(session('status') == 'verification-link-sent'): ?>
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                Link verifikasi baru sudah dikirimkan ke email kamu.
            </div>
        <?php endif; ?>

        <div class="space-y-3">

            
            <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"
                    class="w-full h-12 rounded-xl bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold text-sm shadow-md hover:shadow-lg hover:-translate-y-0.5 transition duration-300">
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"
                    class="w-full h-12 rounded-xl border-2 border-slate-200 text-slate-600 font-semibold text-sm hover:border-slate-300 hover:bg-slate-50 transition">
                    Keluar
                </button>
            </form>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\auth\verify-email.blade.php ENDPATH**/ ?>