<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Flowbite JS CDN --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    {{-- Boxicons CDN --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    @vite('resources/css/app.css')

</head>

<body>

    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    
    @yield('scripts')
    
     {{-- realrashid/sweet-alert --}}
     @include('sweetalert::alert')

</body>

</html>
