<!DOCTYPE html>
<html lang="en">
    <header>
        @include('components.head')
    </header>
  <body>
    @include('components.home_navbar')

<main>
    @yield('content')
</main>

@include('components.footer')

<script src="{{ asset('js/toggleDropdown.js') }}"></script>
<script
type="text/javascript"
src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"
></script>
    <style>
        .sticky-navbar {
            position: sticky;
            top: 0;
            z-index: 50;
        }
    </style>
<script>

const data = {
    datasets: [
        {
            data: [775, 948, 594],
            backgroundColor: [
                "rgba(217, 238, 225, 1)",

                "rgba(34, 197, 94, 1)",
                "rgba(255, 244, 163, 1)",
            ],
            borderColor: "white",
            borderWidth: 4,
            cutout: "87%",
            circumference: 180,
            rotation: 270,
            borderRadius: 5,
        },
    ],
};

// config
const config = {
    type: "doughnut",
    data,
    options: {},
};

// render init block
const myChart = new Chart(document.getElementById("myChart"), config);

// Instantly assign Chart.js version
const chartVersion = document.getElementById("chartVersion");
chartVersion.innerText = Chart.version;

</script>

    <script>
        tinymce.init({
            selector: '#requirements',
        });
    </script>
    @stack('scripts')
 </body>
</html>
