<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'English for Nusantara')</title>

    {{-- Tailwind CDN (pengganti @vite sementara npm belum bisa dijalankan) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>

    @stack('styles')
</head>
<body class="antialiased bg-slate-100 text-slate-900">
    @yield('content')
    @stack('scripts')
</body>
</html>