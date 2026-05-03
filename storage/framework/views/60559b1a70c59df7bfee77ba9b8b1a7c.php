<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'English for Nusantara'); ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body{
            font-family:'Poppins',sans-serif;
            background:linear-gradient(135deg,#f8fafc 0%,#eef2ff 100%);
        }

        .glass{
            background:rgba(255,255,255,.92);
            backdrop-filter:blur(18px);
            border:1px solid rgba(255,255,255,.35);
            box-shadow:0 10px 35px rgba(0,0,0,.07);
        }

        .sidebar-gradient{
            background:linear-gradient(180deg,#1d4ed8 0%,#1e3a8a 100%);
        }

        .top-gradient{
            background:linear-gradient(135deg,#1e40af 0%,#3b82f6 100%);
        }

        .fadein{
            animation:fade .35s ease;
        }

        @keyframes fade{
            from{
                opacity:0;
                transform:translateY(12px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }
    </style>
</head>

<body x-data="{sidebarOpen:false}" class="min-h-screen text-slate-800 overflow-x-hidden">

<div class="min-h-screen flex">

    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->role === 'siswa'): ?>
            <?php echo $__env->make('layouts.sidebar-siswa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php elseif(Auth::user()->role === 'guru'): ?>
            <?php echo $__env->make('layouts.sidebar-guru', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php elseif(Auth::user()->role === 'admin'): ?>
            <?php echo $__env->make('layouts.sidebar-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>

    <div class="flex-1 min-h-screen lg:ml-[260px]">

        <header class="top-gradient sticky top-0 z-30 shadow-lg">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="h-20 flex items-center justify-between">

                    <div class="flex items-center gap-3">
                        <?php if(auth()->guard()->check()): ?>
                            <button
                                @click="sidebarOpen = true"
                                class="lg:hidden w-10 h-10 rounded-xl bg-white/15 text-white hover:bg-white/20 transition"
                            >
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        <?php endif; ?>

                        <div>
                            <h1 class="text-white text-xl md:text-2xl font-bold">
                                English for Nusantara
                            </h1>
                            <p class="text-blue-100 text-sm">
                                SMP Negeri 8 Bitung
                            </p>
                        </div>
                    </div>

                    <?php if(auth()->guard()->check()): ?>
                        <div class="flex items-center gap-3">
                            <div class="hidden md:block text-right">
                                <p class="text-white font-semibold leading-tight">
                                    <?php echo e(Auth::user()->name); ?>

                                </p>
                                <p class="text-blue-100 text-sm capitalize">
                                    <?php echo e(Auth::user()->role); ?>

                                </p>
                            </div>

                            <div class="w-11 h-11 rounded-full bg-white/20 text-white font-bold flex items-center justify-center">
                                <?php echo e(strtoupper(substr(Auth::user()->name,0,1))); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </header>

        <main class="px-4 sm:px-6 lg:px-8 pt-0 pb-8 fadein" id="main-content">
            <?php if(session('success')): ?>
                <div class="mb-4 px-4 py-3 rounded-xl bg-green-100 text-green-700">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="mb-4 px-4 py-3 rounded-xl bg-red-100 text-red-700">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="mb-4 px-4 py-3 rounded-xl bg-red-100 text-red-700">
                    <ul class="list-disc pl-5 space-y-1">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>

    </div>
</div>

<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html><?php /**PATH C:\Users\USER\Documents\proyek-pertama-saya\resources\views\layouts\app.blade.php ENDPATH**/ ?>