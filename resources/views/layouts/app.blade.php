<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ "ElP" }} @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tiny.cloud/1/zrpcg1x4ynlays7o2fexsq6ecvj3spkuebyxobx20yepris3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://unpkg.com/cloudinary-video-player/dist/cld-video-player.min.js"></script>
    <link href="https://unpkg.com/cloudinary-video-player/dist/cld-video-player.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<nav class="bg-gray-800">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{--{{ route('user.projects.list') }}--}}" class="text-white text-lg font-semibold">ELP</a>
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
    © {{ date('Y') }} {{'ELP' }}. All rights reserved.

</footer>
<script src="{{ asset('js/toggleDropdown.js') }}"></script>
</body>
</html>
