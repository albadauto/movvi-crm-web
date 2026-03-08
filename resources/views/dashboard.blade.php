<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

</head>

<body class="bg-[#FDFDFC] min-h-screen flex flex-col font-[Instrument_Sans]">

<!-- Navbar -->
<header class="w-full border-b border-gray-200 bg-white/80 backdrop-blur-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

        <!-- Logo -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('img/logo.png') }}" width="100"/>

        </div>

        <!-- Menu Desktop -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
            <a href="{{ route('dashboard') }}" class="hover:text-black transition">Home</a>
            <a href="{{ route('leads') }}" class="hover:text-black transition">Leads</a>
            <a href="#" class="hover:text-black transition">Sobre</a>
            <a href="#" class="hover:text-black transition">Docs</a>
        </nav>

        <!-- Actions -->
        <div class="hidden md:flex items-center gap-3">
            <a href="{{ route('logout') }}" class="text-sm font-medium text-gray-600 hover:text-black">
                Logout
            </a>
        </div>

        <!-- Mobile Button -->
        <button id="menuBtn" class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden border-t border-gray-200 px-6 pb-6 pt-4 space-y-4 bg-white">

        <a href="/" class="block text-gray-700 hover:text-black">Home</a>
        <a href="#" class="block text-gray-700 hover:text-black">Features</a>
        <a href="#" class="block text-gray-700 hover:text-black">Pricing</a>
        <a href="#" class="block text-gray-700 hover:text-black">Docs</a>

        <div class="pt-4 flex flex-col gap-2">
            <a href="/login" class="text-gray-700 hover:text-black">Login</a>

            <a href="/register"
               class="px-4 py-2 text-center text-white bg-black rounded-lg hover:bg-gray-800">
                Register
            </a>
        </div>

    </div>
</header>

<!-- Page Content -->
<main class="flex-1 w-full max-w-7xl mx-auto px-6 py-10">
    @yield('content')
</main>

<!-- SortableJS CDN -->
<script>
    const btn = document.getElementById('menuBtn')
    const menu = document.getElementById('mobileMenu')

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden')
    })
</script>

</body>
</html>
