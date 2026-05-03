<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

<div class="flex justify-between h-16 items-center">

<!-- Logo -->
<div class="flex items-center">

<a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">
English For Nusantara
</a>

</div>


<!-- Right Side -->
<div class="hidden sm:flex sm:items-center sm:space-x-6">

@auth

<span class="text-gray-700 font-medium">
{{ Auth::user()->name }}
</span>

<form method="POST" action="{{ route('logout') }}">
@csrf
<button type="submit" class="text-red-500 hover:text-red-700 font-semibold">
Logout
</button>
</form>

@else

<a href="{{ route('login') }}" 
class="text-indigo-600 hover:text-indigo-800 font-semibold">
Login
</a>

@endauth

</div>

</div>

</div>

</nav>