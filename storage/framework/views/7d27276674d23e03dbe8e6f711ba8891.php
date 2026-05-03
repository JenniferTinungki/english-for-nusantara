<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

<div class="flex justify-between h-16 items-center">

<!-- Logo -->
<div class="flex items-center">

<a href="<?php echo e(url('/')); ?>" class="text-xl font-bold text-indigo-600">
English For Nusantara
</a>

</div>


<!-- Right Side -->
<div class="hidden sm:flex sm:items-center sm:space-x-6">

<?php if(auth()->guard()->check()): ?>

<span class="text-gray-700 font-medium">
<?php echo e(Auth::user()->name); ?>

</span>

<form method="POST" action="<?php echo e(route('logout')); ?>">
<?php echo csrf_field(); ?>
<button type="submit" class="text-red-500 hover:text-red-700 font-semibold">
Logout
</button>
</form>

<?php else: ?>

<a href="<?php echo e(route('login')); ?>" 
class="text-indigo-600 hover:text-indigo-800 font-semibold">
Login
</a>

<?php endif; ?>

</div>

</div>

</div>

</nav><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\layouts\navigation.blade.php ENDPATH**/ ?>