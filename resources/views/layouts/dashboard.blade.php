<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ApexCharts CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- Boxicons --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/bc66a62b0a.js" crossorigin="anonymous"></script>


    {{-- Datatable CDN --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.tailwindcss.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">

    {{-- csrf for ajax --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Flowbite Datepicker --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

    {{-- jquery CDN --}}
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        @include('layouts.navbar')

        @yield('sidebar')

        @yield('content')

    </div>

    @yield('charts')


    @yield('alerts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @yield('scripts')

</body>

{{-- jquery CDN --}}
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- Remove all data in localStorage when log out is clicked --}}
<script>
    function resetLocalStorage() {
        localStorage.clear();
    }
</script>

{{-- Data Table --}}
@yield('datatable')

</html>
