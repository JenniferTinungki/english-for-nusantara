<?php $__env->startSection('title', 'Lupa Password - English for Nusantara'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-slate-100 px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

        
        <div class="flex justify-center mb-6">
            <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center border border-blue-100">
                <img src="<?php echo e(asset('images/kemendikbud.jpg')); ?>" alt="Logo" class="w-10 h-10 object-contain">
            </div>
        </div>

        <h2 class="text-2xl font-extrabold text-slate-900 text-center mb-2">Lupa Password?</h2>
        <p class="text-sm text-slate-500 text-center mb-6 leading-relaxed">
            Masukkan email kamu dan kami akan mengirimkan link untuk mereset password.
        </p>

        
        <?php if(session('status')): ?>
            <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        
        <?php if($errors->any()): ?>
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <ul class="list-disc pl-5 space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('password.email')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>

            <div>
                <label for="email" class="block text-sm font-semibold text-slate-800 mb-2">Email</label>
                <input
                    id="email" type="email" name="email"
                    value="<?php echo e(old('email')); ?>" required autofocus
                    placeholder="Masukkan email anda"
                    class="w-full h-12 rounded-xl border-2 border-slate-200 bg-slate-100 px-4 text-slate-800 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >
            </div>

            <button type="submit"
                class="w-full h-12 rounded-xl bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold text-sm shadow-md hover:shadow-lg hover:-translate-y-0.5 transition duration-300">
                Kirim Link Reset Password
            </button>

            <div class="text-center">
                <a href="<?php echo e(route('login')); ?>"
                    class="text-sm text-slate-500 hover:text-blue-700 font-medium transition">
                    ← Kembali ke Login
                </a>
            </div>
        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\auth\forgot-password.blade.php ENDPATH**/ ?>