<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    @vite('resources/css/app.css')

    {{-- ApexCharts CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- Boxicons --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/bc66a62b0a.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" /> --}}

    {{-- Datatable CDN --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.tailwindcss.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">

    {{-- csrf for ajax --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Flowbite CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

    {{-- jquery CDN --}}
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>
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
    @yield('charts')

    {{-- Scripts --}}
    @yield('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    
    {{-- realrashid/sweet-alert --}}
    @include('sweetalert::alert')
</body>

{{-- jquery CDN --}}
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js">
</script> --}}


{{-- Data Table --}}
@yield('datatable')

</html>
