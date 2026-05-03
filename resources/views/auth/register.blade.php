<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register - English For Nusantara</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<style>
.fade-in{
animation:fadeIn .6s ease;
}

@keyframes fadeIn{
from{opacity:0;transform:translateY(10px);}
to{opacity:1;transform:translateY(0);}
}
</style>

</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 flex items-center justify-center px-4">

<div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl grid md:grid-cols-2 overflow-hidden fade-in">

<!-- LEFT SIDE -->
<div class="hidden md:flex flex-col justify-center items-center bg-indigo-600 text-white p-8">

<img src="{{ asset('images/learning.png') }}"
class="w-48 mb-6">

<h1 class="text-2xl font-bold text-center">
English For Nusantara
</h1>

<p class="text-center text-indigo-100 text-sm mt-3">
Buat akun siswa untuk mulai belajar
bahasa Inggris secara interaktif.
</p>

</div>


<!-- RIGHT SIDE -->
<div class="flex items-center justify-center p-8">

<div class="w-full max-w-sm">

<h2 class="text-xl font-bold text-gray-800 text-center mb-6">
Daftar Akun
</h2>

<form method="POST" action="{{ route('register') }}">
@csrf

<!-- NAMA -->
<div class="mb-3">

<label class="block text-sm text-gray-600 mb-1">
Nama Lengkap
</label>

<input
type="text"
name="name"
required
class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">

</div>


<!-- EMAIL -->
<div class="mb-3">

<label class="block text-sm text-gray-600 mb-1">
Email
</label>

<input
type="email"
name="email"
required
class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">

</div>


<!-- PASSWORD -->
<div class="mb-3">

<label class="block text-sm text-gray-600 mb-1">
Password
</label>

<input
type="password"
name="password"
required
class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">

</div>


<!-- KONFIRMASI PASSWORD -->
<div class="mb-5">

<label class="block text-sm text-gray-600 mb-1">
Konfirmasi Password
</label>

<input
type="password"
name="password_confirmation"
required
class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">

</div>


<!-- BUTTON -->
<button
type="submit"
class="w-full bg-indigo-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition">

Daftar

</button>

<p class="text-center text-xs text-gray-500 mt-4">

Sudah punya akun?

<a href="{{ route('login') }}"
class="text-indigo-600 hover:underline">

Login

</a>

</p>

</form>

</div>

</div>

</div>

</body>
</html>