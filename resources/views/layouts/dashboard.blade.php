<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @yield('title')

  {{-- Include compiled css to start using Tailwind Utility Classes --}}
  @vite('resources/css/app.css')

   {{-- ApexCharts CDN --}}
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  {{-- Boxicons --}}
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" /> --}}


</head>
<body>
  <div class="antialiased bg-gray-50 dark:bg-gray-900">

    @include('layouts.navbar')

    {{-- Navbar and Sidebar --}}
    @yield('sidebar')

    {{-- Main Content --}}
    @yield('content')

  </div>

    {{-- Charts --}}
    @yield('charts')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>

