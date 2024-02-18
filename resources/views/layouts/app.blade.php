<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ "Arty Collabs" }} @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<nav class="bg-gray-800">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{--{{ route('user.projects.list') }}--}}" class="text-white text-lg font-semibold">Arty Collabs</a>
                <ul class="flex items-center space-x-4 ml-10">
                    <li><a href="{{--{{ route('home') }}--}}" class="text-gray-300 hover:text-white">Home</a></li>
                    <li><a href="{{--{{ route('about') }}--}}" class="text-gray-300 hover:text-white">About</a></li>
                    <li><a href="{{--{{ route('contact') }}--}}" class="text-gray-300 hover:text-white">Contact</a></li>
                </ul>
            </div>
            @guest
                <div>
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 text-gray-300 hover:text-white">Register</a>
                </div>
            @else
                <div>
                    <span class="text-gray-300">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="ml-4 text-gray-300 hover:text-white">Logout</button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</nav>

<header class="bg-white shadow">
    <div class="container mx-auto px-6 py-6">
        <h1 class="font-semibold text-xl text-gray-800">@yield('header')</h1>
    </div>
</header>

<main class="container mx-auto px-6 py-8">
    @yield('content')
</main>

<footer class="bg-gray-800 text-white text-center p-4">
    © {{ date('Y') }} {{'Arty Collabs' }}. All rights reserved.

</footer>

</body>
</html>
