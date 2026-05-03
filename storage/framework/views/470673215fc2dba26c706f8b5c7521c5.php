<?php $__env->startSection('title', 'Reset Password - English for Nusantara'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-slate-100 px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

        
        <div class="flex justify-center mb-6">
            <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center border border-blue-100">
                <img src="<?php echo e(asset('images/kemendikbud.jpg')); ?>" alt="Logo" class="w-10 h-10 object-contain">
            </div>
        </div>

        <h2 class="text-2xl font-extrabold text-slate-900 text-center mb-2">Reset Password</h2>
        <p class="text-sm text-slate-500 text-center mb-6">Masukkan password baru kamu di bawah ini.</p>

        
        <?php if($errors->any()): ?>
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <ul class="list-disc pl-5 space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('password.store')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

            
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-800 mb-2">Email</label>
                <input
                    id="email" type="email" name="email"
                    value="<?php echo e(old('email', $request->email)); ?>" required autofocus autocomplete="username"
                    class="w-full h-12 rounded-xl border-2 border-slate-200 bg-slate-100 px-4 text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >
            </div>

            
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-800 mb-2">Password Baru</label>
                <div class="relative">
                    <input
                        id="password" type="password" name="password"
                        required autocomplete="new-password"
                        placeholder="Masukkan password baru"
                        class="w-full h-12 rounded-xl border-2 border-slate-200 bg-slate-100 px-4 pr-12 text-slate-800 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                    >
                    <button type="button" onclick="togglePass('password','eye1')"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400 hover:text-blue-600 transition">
                        <span id="eye1">👁</span>
                    </button>
                </div>
            </div>

            
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-slate-800 mb-2">Konfirmasi Password</label>
                <div class="relative">
                    <input
                        id="password_confirmation" type="password" name="password_confirmation"
                        required autocomplete="new-password"
                        placeholder="Ulangi password baru"
                        class="w-full h-12 rounded-xl border-2 border-slate-200 bg-slate-100 px-4 pr-12 text-slate-800 placeholder-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                    >
                    <button type="button" onclick="togglePass('password_confirmation','eye2')"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400 hover:text-blue-600 transition">
                        <span id="eye2">👁</span>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full h-12 rounded-xl bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold text-sm shadow-md hover:shadow-lg hover:-translate-y-0.5 transition duration-300">
                Reset Password
            </button>

        </form>
    </div>
</div>

<script>
function togglePass(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.textContent = '🙈';
    } else {
        input.type = 'password';
        icon.textContent = '👁';
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\auth\reset-password.blade.php ENDPATH**/ ?>