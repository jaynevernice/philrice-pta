<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PhilRice CES</title>

  {{-- Include compiled css to start using Tailwind Utility Classes --}}
  @vite('resources/css/app.css')

  {{-- Boxicons --}}
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" /> --}}

</head>
<body>
  <div class="antialiased bg-gray-50 dark:bg-gray-900">

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Sidebar --}}
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
          <ul class="space-y-2">
      
            {{-- Overview --}}
            <li>
              <a href="{{ route('encoder.overview') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
                <span class="ml-3">Overview</span>
              </a>
            </li>
      
            {{-- CES --}}
            <li>
                <a href="{{ route('encoder.ces') }}" class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700" aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                  <box-icon name='building' type='solid'></box-icon>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
                  <box-icon name='chevron-down'></box-icon>
                </a>
                <ul id="dropdown-sales" class="py-2 space-y-2">
                <li>
                    <a href="{{ route('encoder.ces_add') }}" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg  transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                    <box-icon name='plus'></box-icon>
                    <span class="ml-3">Add Data</span>
                    </a>  
                </li>
                <li>
                    <a href="{{ route('encoder.ces_edit') }}" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                    <box-icon name='edit-alt' type='solid'></box-icon>
                    <span class="ml-3">Edit Data</span>
                    </a>  
                </li>
                </ul>
            </li>
              
            
      
          </ul>
        </div>
      </aside>
    
    {{-- Content --}}
    <main class="p-4 md:ml-64 h-auto pt-20">
      
    </main>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>