<?php $__env->startSection('title', 'English for Nusantara | SMP Negeri 8 Bitung'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-white text-slate-900 selection:bg-yellow-300/70 selection:text-blue-950">
    <nav class="fixed inset-x-0 top-0 z-50 border-b border-white/20 bg-white/85 backdrop-blur-xl">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-10">
            <a href="#home" class="group flex items-center gap-4">
                <div class="flex h-14 w-14 items-center justify-center overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-md transition duration-300 group-hover:scale-[1.03] group-hover:shadow-lg">
                    <img
                        src="<?php echo e(asset('images/kemendikbud.jpg')); ?>"
                        alt="Logo Kemendikbud"
                        class="h-10 w-10 object-contain"
                        onerror="this.style.display='none'; this.parentElement.innerHTML='<span class=\'text-blue-700 font-black text-lg\'>EN</span>'"
                    >
                </div>
                <div>
                    <h1 class="text-xl font-black leading-tight text-blue-950 md:text-2xl">English for Nusantara</h1>
                    <p class="text-sm font-medium text-slate-500">SMP Negeri 8 Bitung</p>
                </div>
            </a>

            <div class="hidden items-center gap-8 md:flex">
                <a href="#fitur" class="text-sm font-semibold text-slate-600 transition hover:text-blue-700">Fitur</a>
                <a href="#chapter" class="text-sm font-semibold text-slate-600 transition hover:text-blue-700">Chapter</a>
                <a href="#penulis" class="text-sm font-semibold text-slate-600 transition hover:text-blue-700">Penulis</a>
                <a href="#guru" class="text-sm font-semibold text-slate-600 transition hover:text-blue-700">Untuk Guru</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="#fitur" class="hidden rounded-2xl border border-slate-200 px-5 py-3 text-sm font-bold text-slate-700 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-800 sm:inline-flex">
                    Jelajahi Fitur
                </a>
                <a href="<?php echo e(url('/login')); ?>" class="inline-flex items-center justify-center rounded-2xl bg-yellow-400 px-6 py-3 text-sm font-black text-blue-950 shadow-lg shadow-yellow-400/25 transition hover:-translate-y-0.5 hover:bg-yellow-300 hover:shadow-xl">
                    Masuk
                </a>
            </div>
        </div>
    </nav>

    <header id="home" class="relative overflow-hidden bg-[radial-gradient(circle_at_top_left,_rgba(253,224,71,0.28),_transparent_28%),linear-gradient(135deg,_#0b1f6d_0%,_#173ea5_52%,_#2457d6_100%)] pt-32 text-white">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-72 w-72 rounded-full bg-yellow-300/20 blur-3xl"></div>
            <div class="absolute right-0 top-24 h-80 w-80 rounded-full bg-cyan-300/15 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-blue-200/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto grid max-w-7xl gap-16 px-6 pb-24 lg:grid-cols-[1.08fr_0.92fr] lg:px-10">
            <div class="flex flex-col justify-center">
                <div class="inline-flex w-fit items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-black uppercase tracking-[0.24em] text-yellow-300 shadow-lg shadow-blue-950/20 backdrop-blur-md">
                    Platform English for Nusantara
                </div>

                <h2 class="mt-7 max-w-3xl text-4xl font-black leading-[1.05] md:text-5xl lg:text-7xl">
                    Belajar Bahasa Inggris
                    <span class="block text-yellow-300">lebih kontekstual, modern, dan siap pakai</span>
                </h2>

                <p class="mt-6 max-w-2xl text-base leading-8 text-blue-100 md:text-lg">
                    Platform pembelajaran bahasa Inggris berbasis buku <em>English for Nusantara</em> untuk membantu siswa belajar aktif dan membantu guru mengajar lebih efektif melalui materi per chapter, latihan interaktif, audio-video, dan evaluasi terstruktur.
                </p>

                <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                    <a href="<?php echo e(url('/login')); ?>" class="inline-flex items-center justify-center rounded-2xl bg-yellow-400 px-7 py-4 text-base font-black text-blue-950 shadow-xl shadow-yellow-400/20 transition hover:-translate-y-0.5 hover:bg-yellow-300">
                        Mulai Sekarang
                    </a>
                    <a href="#guru" class="inline-flex items-center justify-center rounded-2xl border border-white/20 bg-white/10 px-7 py-4 text-base font-bold text-white backdrop-blur-sm transition hover:bg-white/15">
                        Lihat Dukungan Guru
                    </a>
                </div>

                <div class="mt-10 grid max-w-2xl gap-4 sm:grid-cols-3">
                    <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur-md shadow-lg">
                        <p class="text-3xl font-black">Chapter-based</p>
                        <p class="mt-2 text-sm text-blue-100">Materi mengikuti alur buku dan tujuan pembelajaran.</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur-md shadow-lg">
                        <p class="text-3xl font-black">Interactive</p>
                        <p class="mt-2 text-sm text-blue-100">Speaking, listening, quiz, dan latihan lebih hidup.</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur-md shadow-lg">
                        <p class="text-3xl font-black">Teacher-ready</p>
                        <p class="mt-2 text-sm text-blue-100">Mendukung guru dengan materi, LKPD, dan evaluasi.</p>
                    </div>
                </div>
            </div>

            <div class="relative flex items-center justify-center">
                <div class="absolute -inset-6 rounded-[2.5rem] bg-white/10 blur-3xl"></div>
                <div class="relative overflow-hidden rounded-[2rem] border border-white/15 bg-white/10 p-4 shadow-2xl shadow-blue-950/30 backdrop-blur-md">
                    <img
                        src="<?php echo e(asset('images/smp8.png')); ?>"
                        alt="Pembelajaran English for Nusantara di SMP Negeri 8 Bitung"
                        class="h-[520px] w-full rounded-[1.5rem] object-cover"
                    >
                    <div class="absolute bottom-8 left-8 right-8 rounded-[1.5rem] border border-white/15 bg-slate-950/45 p-5 text-white shadow-xl backdrop-blur-md">
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.2em] text-yellow-300">English for Nusantara</p>
                                <h3 class="mt-2 text-xl font-extrabold">Learning companion for students and teachers</h3>
                            </div>
                            <div class="rounded-2xl bg-white/10 px-4 py-3 text-sm font-semibold text-blue-50">
                                SMP Negeri 8 Bitung
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="relative -mt-8 pb-4">
        <div class="mx-auto grid max-w-6xl gap-4 px-6 lg:grid-cols-4 lg:px-10">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-3xl font-black text-blue-900">10+</p>
                <p class="mt-2 text-sm font-medium text-slate-600">Materi pembelajaran terstruktur</p>
            </div>
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-3xl font-black text-blue-900">20+</p>
                <p class="mt-2 text-sm font-medium text-slate-600">Latihan interaktif dan evaluasi</p>
            </div>
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-3xl font-black text-blue-900">Audio</p>
                <p class="mt-2 text-sm font-medium text-slate-600">Listening support untuk latihan kelas</p>
            </div>
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-3xl font-black text-blue-900">Ready</p>
                <p class="mt-2 text-sm font-medium text-slate-600">Siap digunakan untuk guru dan siswa</p>
            </div>
        </div>
    </section>

    <section id="fitur" class="bg-slate-50 py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-10">
            <div class="mx-auto max-w-3xl text-center">
                <span class="text-sm font-black uppercase tracking-[0.24em] text-blue-700">Fitur Unggulan</span>
                <h2 class="mt-4 text-3xl font-black text-slate-950 md:text-5xl">
                    Dirancang khusus untuk pembelajaran bahasa Inggris yang relevan
                </h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Bukan sekadar landing page sekolah, tetapi wajah platform yang menunjukkan kualitas, fokus, dan kesiapan penggunaan dalam proses belajar mengajar.
                </p>
            </div>

            <div class="mt-14 grid gap-8 md:grid-cols-2 xl:grid-cols-4">
                <?php $__currentLoopData = [
                    ['icon'=>'fa-book-open-reader','title'=>'Materi per Chapter','desc'=>'Konten belajar diatur mengikuti struktur <em>English for Nusantara</em> agar mudah dipahami, diajarkan, dan diakses kembali.'],
                    ['icon'=>'fa-headphones-simple','title'=>'Listening & Speaking','desc'=>'Mendukung latihan mendengar dan berbicara agar pembelajaran tidak hanya membaca, tetapi juga komunikatif dan aktif.'],
                    ['icon'=>'fa-file-pen','title'=>'Worksheet & Quiz','desc'=>'LKPD, latihan, dan quiz interaktif untuk memperkuat pemahaman vocabulary, grammar, reading, dan writing.'],
                    ['icon'=>'fa-chart-line','title'=>'Evaluasi Terstruktur','desc'=>'Penilaian formatif yang membantu guru memantau progres belajar siswa secara lebih cepat dan terarah.'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fitur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-700 text-white shadow-md transition group-hover:bg-yellow-400 group-hover:text-blue-950">
                        <i class="fa-solid <?php echo e($fitur['icon']); ?> text-lg"></i>
                    </div>
                    <h3 class="mt-6 text-2xl font-black text-blue-950"><?php echo e($fitur['title']); ?></h3>
                    <p class="mt-4 leading-7 text-slate-600"><?php echo $fitur['desc']; ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <section id="chapter" class="bg-white py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-10">
            <div class="grid gap-14 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                <div>
                    <span class="text-sm font-black uppercase tracking-[0.24em] text-blue-700">Struktur Materi</span>
                    <h2 class="mt-4 text-3xl font-black text-slate-950 md:text-5xl">Rapi, fokus, dan mudah dipakai sesuai alur buku</h2>
                    <p class="mt-5 text-lg leading-8 text-slate-600">
                        Salah satu kekuatan utama platform ini adalah penyusunan materi yang mengikuti buku. Guru tidak perlu menjelaskan dari nol, dan siswa lebih mudah mengikuti alur pembelajaran dari chapter ke chapter.
                    </p>

                    <div class="mt-8 space-y-4">
                        <?php $__currentLoopData = [
                            ['num'=>'1','title'=>'Vocabulary & Warm-up','desc'=>'Pembuka materi yang memudahkan siswa memahami topik sebelum masuk ke inti pelajaran.'],
                            ['num'=>'2','title'=>'Reading, Listening, Speaking','desc'=>'Aktivitas inti yang membantu siswa berlatih memahami dan menggunakan bahasa Inggris secara aktif.'],
                            ['num'=>'3','title'=>'Practice & Assessment','desc'=>'Latihan dan evaluasi untuk mengukur perkembangan siswa dengan lebih sistematis.'],
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-5">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-700 font-black text-white"><?php echo e($step['num']); ?></div>
                            <div>
                                <h3 class="text-lg font-black text-slate-900"><?php echo e($step['title']); ?></h3>
                                <p class="mt-1 text-slate-600"><?php echo e($step['desc']); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="grid gap-5 md:grid-cols-2">
                    <div class="rounded-[2rem] border border-slate-200 bg-gradient-to-br from-blue-50 to-white p-7 shadow-sm">
                        <p class="text-sm font-black uppercase tracking-[0.2em] text-blue-700">Sample Chapter</p>
                        <h3 class="mt-4 text-2xl font-black text-blue-950">Chapter 1</h3>
                        <p class="mt-2 text-lg font-semibold text-slate-700">Introducing Myself</p>
                        <p class="mt-4 leading-7 text-slate-600">Membangun kepercayaan diri siswa untuk memperkenalkan diri dalam konteks yang sederhana dan bermakna.</p>
                    </div>
                    <div class="rounded-[2rem] border border-slate-200 bg-gradient-to-br from-slate-50 to-white p-7 shadow-sm">
                        <p class="text-sm font-black uppercase tracking-[0.2em] text-blue-700">Sample Chapter</p>
                        <h3 class="mt-4 text-2xl font-black text-blue-950">Chapter 2</h3>
                        <p class="mt-2 text-lg font-semibold text-slate-700">School Activities</p>
                        <p class="mt-4 leading-7 text-slate-600">Mendorong siswa memahami aktivitas sekolah sambil memperkaya vocabulary yang dekat dengan kehidupan mereka.</p>
                    </div>
                    <div class="rounded-[2rem] border border-slate-200 bg-gradient-to-br from-slate-50 to-white p-7 shadow-sm">
                        <p class="text-sm font-black uppercase tracking-[0.2em] text-blue-700">Sample Chapter</p>
                        <h3 class="mt-4 text-2xl font-black text-blue-950">Chapter 3</h3>
                        <p class="mt-2 text-lg font-semibold text-slate-700">Describing People and Places</p>
                        <p class="mt-4 leading-7 text-slate-600">Melatih siswa mendeskripsikan orang dan tempat dengan kalimat yang lebih kaya dan terstruktur.</p>
                    </div>
                    <div class="rounded-[2rem] border border-dashed border-blue-200 bg-blue-950 p-7 text-white shadow-xl shadow-blue-950/10">
                        <p class="text-sm font-black uppercase tracking-[0.2em] text-yellow-300">Expandable</p>
                        <h3 class="mt-4 text-2xl font-black">Tambahkan semua chapter di sini</h3>
                        <p class="mt-4 leading-7 text-blue-100">Bagian ini bisa dikembangkan menjadi grid chapter, carousel materi, atau preview menu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    
    
    <section id="penulis" class="bg-slate-100 py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-10">
            <div class="mx-auto max-w-3xl text-center">
                <span class="text-sm font-black uppercase tracking-[0.24em] text-blue-700">Tim Penulis</span>
                <h2 class="mt-4 text-3xl font-black text-slate-950 md:text-5xl">Fondasi materi dari penulis buku utama</h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">
                    Menampilkan penulis buku memberi kredibilitas kuat pada platform karena pengunjung langsung memahami sumber materi yang digunakan.
                </p>
            </div>

            <?php
                $penulisList = [
                    [
                        'nama'    => 'Ika Lestari Damayanti',
                        'peran'   => 'Penulis Utama',
                        'desc'    => 'Pakar pendidikan bahasa Inggris dan literasi anak.',
                        'foto'    => 'images/ika.png',
                        'warna'   => 'from-blue-600 to-indigo-600',
                        'badge'   => 'text-blue-700',
                        'initial' => 'IL',
                    ],
                    [
                        'nama'    => 'Yusnita Febrianti',
                        'peran'   => 'Tim Penulis',
                        'desc'    => 'Pengembang kurikulum dan materi pembelajaran interaktif.',
                        'foto'    => 'images/penulis/yusnita.jpg',
                        'warna'   => 'from-emerald-500 to-teal-600',
                        'badge'   => 'text-emerald-600',
                        'initial' => 'YF',
                    ],
                    [
                        'nama'    => 'Iyen Nurlaelawati',
                        'peran'   => 'Tim Penulis',
                        'desc'    => 'Ahli metodologi pembelajaran kreatif dan kontekstual.',
                        'foto'    => 'images/penulis/iyen.jpg',
                        'warna'   => 'from-amber-500 to-orange-500',
                        'badge'   => 'text-amber-600',
                        'initial' => 'IN',
                    ],
                    [
                        'nama'    => 'Pipit Priwanda',
                        'peran'   => 'Tim Penulis',
                        'desc'    => 'Integrasi teknologi dalam pembelajaran bahasa Inggris modern.',
                        'foto'    => 'images/penulis/pipit.jpg',
                        'warna'   => 'from-rose-500 to-pink-600',
                        'badge'   => 'text-rose-600',
                        'initial' => 'PP',
                    ],
                ];
            ?>

            <div class="mt-14 grid gap-8 sm:grid-cols-2 xl:grid-cols-4">
                <?php $__currentLoopData = $penulisList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                    
                    <div class="relative h-72 overflow-hidden bg-gradient-to-br <?php echo e($p['warna']); ?>">

                        
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <div class="flex h-28 w-28 items-center justify-center rounded-full bg-white/20 border-4 border-white/30">
                                <span class="text-4xl font-black text-white"><?php echo e($p['initial']); ?></span>
                            </div>
                            <p class="mt-4 text-sm font-semibold text-white/70"><?php echo e($p['peran']); ?></p>
                        </div>

                        
                        <img
                            src="<?php echo e(asset($p['foto'])); ?>"
                            alt="<?php echo e($p['nama']); ?>"
                            class="absolute inset-0 h-full w-full object-cover object-top transition duration-500 hover:scale-105"
                            onerror="this.style.display='none'"
                        >
                    </div>

                    <div class="p-6 text-center">
                        <h3 class="text-lg font-black text-slate-950"><?php echo e($p['nama']); ?></h3>
                        <p class="mt-2 text-sm font-bold <?php echo e($p['badge']); ?>"><?php echo e($p['peran']); ?></p>
                        <p class="mt-3 text-sm leading-6 text-slate-500"><?php echo e($p['desc']); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <section id="guru" class="relative overflow-hidden bg-[radial-gradient(circle_at_bottom_right,_rgba(253,224,71,0.12),_transparent_22%),linear-gradient(135deg,_#0b1f6d_0%,_#102b85_50%,_#173ea5_100%)] py-24 text-white">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-10 top-0 h-72 w-72 rounded-full bg-cyan-300/10 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-yellow-300/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto grid max-w-7xl gap-12 px-6 lg:grid-cols-[1fr_0.95fr] lg:px-10">
            <div>
                <span class="text-sm font-black uppercase tracking-[0.24em] text-yellow-300">Untuk Guru</span>
                <h2 class="mt-4 max-w-2xl text-3xl font-black leading-tight md:text-5xl">
                    Mengajar <em>English for Nusantara</em> jadi lebih mudah, rapi, dan meyakinkan
                </h2>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-blue-100">
                    Section ini dibuat lebih spesifik untuk guru bahasa Inggris. Bukan platform umum, tetapi pendamping mengajar yang relevan dengan buku, kebutuhan kelas, dan alur pembelajaran di sekolah.
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <?php $__currentLoopData = [
                        ['title'=>'Materi sesuai chapter',      'desc'=>'Guru lebih mudah menyesuaikan pembelajaran dengan buku utama.'],
                        ['title'=>'Worksheet & LKPD',           'desc'=>'Bahan ajar siap pakai untuk aktivitas kelas dan tugas siswa.'],
                        ['title'=>'Listening & speaking support','desc'=>'Membantu guru menghadirkan pembelajaran yang lebih aktif dan komunikatif.'],
                        ['title'=>'Evaluasi lebih terarah',     'desc'=>'Mempermudah guru memantau pemahaman siswa setelah pembelajaran.'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur-md">
                        <div class="flex items-start gap-3">
                            <span class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-yellow-400 font-black text-blue-950">✓</span>
                            <div>
                                <h3 class="font-black"><?php echo e($item['title']); ?></h3>
                                <p class="mt-1 text-sm leading-6 text-blue-100"><?php echo e($item['desc']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="<?php echo e(url('/login')); ?>" class="inline-flex items-center justify-center rounded-2xl bg-yellow-400 px-6 py-4 font-black text-blue-950 shadow-xl shadow-yellow-400/20 transition hover:-translate-y-0.5 hover:bg-yellow-300">
                        Masuk Sebagai Guru
                    </a>
                    <a href="#chapter" class="inline-flex items-center justify-center rounded-2xl border border-white/20 bg-white/10 px-6 py-4 font-bold text-white backdrop-blur-sm transition hover:bg-white/15">
                        Lihat Struktur Materi
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-4 rounded-[2.5rem] bg-white/10 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-white/10 p-4 shadow-2xl backdrop-blur-md">
                    <img
                        src="<?php echo e(asset('images/SirAlberto.jpeg')); ?>"
                        alt="Guru Bahasa Inggris SMP Negeri 8 Bitung"
                        class="h-[520px] w-full rounded-[1.5rem] object-cover"
                    >
                    <div class="absolute bottom-8 left-8 right-8 rounded-[1.5rem] border border-white/15 bg-slate-950/50 p-5 backdrop-blur-md">
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-yellow-300">Teacher Highlight</p>
                        <h3 class="mt-2 text-xl font-black text-white">Guru Bahasa Inggris SMP Negeri 8 Bitung</h3>
                        <p class="mt-2 text-sm leading-6 text-blue-100">Sir. Alberto Takaliuang, S.Pd, GR</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-24">
        <div class="mx-auto max-w-5xl px-6 lg:px-10">
            <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800 px-8 py-10 text-white shadow-2xl shadow-blue-950/10 md:px-12 md:py-14">
                <div class="grid gap-8 md:grid-cols-[1fr_auto] md:items-center">
                    <div>
                        <p class="text-sm font-black uppercase tracking-[0.24em] text-yellow-300">Siap Digunakan</p>
                        <h2 class="mt-4 text-3xl font-black leading-tight md:text-4xl">Bangun pengalaman belajar bahasa Inggris yang lebih premium</h2>
                        <p class="mt-4 max-w-2xl text-lg leading-8 text-blue-100">
                            Landing page ini sekarang lebih fokus, lebih rapi, dan lebih kuat secara positioning: khusus untuk pembelajaran bahasa Inggris berbasis <em>English for Nusantara</em>.
                        </p>
                    </div>
                    <div>
                        <a href="<?php echo e(url('/login')); ?>" class="inline-flex items-center justify-center rounded-2xl bg-yellow-400 px-7 py-4 text-base font-black text-blue-950 shadow-xl shadow-yellow-400/20 transition hover:-translate-y-0.5 hover:bg-yellow-300">
                            Masuk ke Platform
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-950 text-slate-300">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 lg:grid-cols-[1.2fr_0.8fr_0.8fr] lg:px-10">
            <div>
                <h3 class="text-2xl font-black text-white">English for Nusantara</h3>
                <p class="mt-4 max-w-md leading-7 text-slate-400">
                    Platform pembelajaran bahasa Inggris berbasis web yang dirancang untuk mendukung siswa dan guru SMP Negeri 8 Bitung melalui materi yang kontekstual, terstruktur, dan modern.
                </p>
            </div>
            <div>
                <h4 class="text-sm font-black uppercase tracking-[0.2em] text-white">Navigasi</h4>
                <ul class="mt-4 space-y-3 text-slate-400">
                    <li><a href="#fitur"   class="transition hover:text-white">Fitur</a></li>
                    <li><a href="#chapter" class="transition hover:text-white">Chapter</a></li>
                    <li><a href="#penulis" class="transition hover:text-white">Tim Penulis</a></li>
                    <li><a href="#guru"    class="transition hover:text-white">Untuk Guru</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-black uppercase tracking-[0.2em] text-white">Informasi</h4>
                <ul class="mt-4 space-y-3 text-slate-400">
                    <li>SMP Negeri 8 Bitung</li>
                    <li>Bitung, Sulawesi Utara</li>
                    <li>Platform pembelajaran digital</li>
                    <li>Berbasis buku <em>English for Nusantara</em></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-slate-800 px-6 py-6 text-center text-sm text-slate-500 lg:px-10">
            &copy; <?php echo e(date('Y')); ?> English for Nusantara — SMP Negeri 8 Bitung. All rights reserved.
        </div>
    </footer>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u748564652/domains/englishfornusantara.com/proyek-pertama-saya/resources/views/landing.blade.php ENDPATH**/ ?>