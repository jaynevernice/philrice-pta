<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @yield('title')

  {{-- Include compiled css to start using Tailwind Utility Classes --}}
  @vite('resources/css/app.css')

  {{-- Boxicons --}}
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" /> --}}

  <script src="{{ mix('js/random.js') }}" defer></script>

</head>
<body>
  <div class="antialiased bg-gray-50 dark:bg-gray-900">

    @include('layouts.navbar')

    {{-- Navbar and Sidebar --}}
    @yield('sidebar')

    {{-- Main Content --}}
    @yield('content')

  </div>

  {{-- ApexCharts CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  {{-- Charts --}}
  {{-- <script>
    var options = {
      chart: {
        type: 'line'
      },
      series: [{
        name: 'sales',
        data: [30,40,35,50,49,60,70,91,125]
      }],
      xaxis: {
        categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
      }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
  </script> --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
  

</body>
</html>

