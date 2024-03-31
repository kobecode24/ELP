<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('components.head')
<body>
@include('components.auth_header')

<main class="container mx-auto px-6 py-8">
    @yield('content')
</main>

 @include('components.auth_footer')
<script src="{{ asset('js/toggleDropdown.js') }}"></script>
</body>
</html>
