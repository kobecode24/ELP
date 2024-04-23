<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @include('components.head')
    <style>
        .bgColor {
            background: linear-gradient(90deg, #282a35 0%, #282a35 20%, #000000 20%, #000000 75%, #282a35 75%, #282a35 100%);
        }
        .sticky-container {
            position: sticky;
            top: 0px;
        }
        .content-container {
            display: flex;
            min-height: 100vh;
        }
        .navbar, .sidebar {
            z-index: 1000;
            margin: 0;
            padding: 0;
        }
        .svg-purple {
            filter: invert(33%) sepia(81%) saturate(1352%) hue-rotate(247deg) brightness(90%) contrast(89%);
        }
    </style>
</head>
<body>
<main>
    <div class="min-h-screen w-full text-gray-700" x-data="layout">
        <div class="sticky-container">
            <!-- navbar -->
            @include('components.profile_navbar')

            <!-- aside -->
            <div class="sidebar">
                @include('components.instructor_sidenav')
            </div>
        </div>

        <div class="flex content-container">
            @yield('content')
        </div>
    </div>
</main>


<script src="{{ asset('js/toggleDropdown.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script src="{{ asset('js/jsForChart.js') }}"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('layout', () => ({
            asideOpen: true,
        }));
    });
</script>

</body>
</html>
