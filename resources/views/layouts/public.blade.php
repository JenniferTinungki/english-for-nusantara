<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'English for Nusantara | SMP Negeri 8 Bitung')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
        }

        .soft-shadow {
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.10);
        }

        .card-shadow {
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }
    </style>

    @stack('styles')
</head>

<body class="min-h-screen text-slate-900 antialiased">
    @yield('content')
    @stack('scripts')
</body>
</html>