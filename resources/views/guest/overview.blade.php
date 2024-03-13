<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Guest</title>

  {{-- Include compiled css to start using Tailwind Utility Classes --}}
  @vite('resources/css/app.css')

  {{-- Boxicons --}}
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
  <div class="antialiased bg-gray-50 dark:bg-gray-900">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
      <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
          
          <button
            data-drawer-target="drawer-navigation"
            data-drawer-toggle="drawer-navigation"
            aria-controls="drawer-navigation"
            class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          >
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd">
              </path>
            </svg>
  
            <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd">
              </path>
            </svg>
  
            <span class="sr-only">Toggle sidebar</span>
          </button>
  
  
          <a href="https://flowbite.com" class="flex items-center justify-between mr-4">
            <img
              src="{{ asset('assets/logo.png') }}"
              class="mr-3 h-8"
              alt="Flowbite Logo"
            />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">TRACER</span>
          </a>
  
        </div>
  
  
        <div class="flex items-center lg:order-2">
  
          <!-- Dropdown menu -->
          <div
            class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl"
            id="notification-dropdown"
          >
          </div>
          
          <a href="{{ route('login') }}">
            <button type="button" class="flex items-center text-white bg-gradient-to-br from-[#16A44B] to-[#14506A] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
              <box-icon name='log-in' class="mr-2" color="#ffffff" ></box-icon>
              Login
            </button>
          </a> 
          
          <!-- Dropdown menu -->
          <div
            class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
            id="dropdown"
          >
            {{-- User Name and Email --}}
            <div class="py-3 px-4">
              <span class="block text-sm font-semibold text-gray-900 dark:text-white">Neil Sims</span>
              <span class="block text-sm text-gray-900 truncate dark:text-white">name@flowbite.com</span>
            </div>
  
            {{-- User Profile --}}
            <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
              <li>
                <a
                  href="{{ route('profile') }}"
                  class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"> 
                  Manage profile
                </a>
              </li>
            </ul>
  
            {{-- Sign Out --}}
            <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
              <li>
                <a
                  href="{{ route('logout') }}"
                  class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  Sign out
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    {{-- Sidebar --}}
    <aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
  >
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
      <ul class="space-y-2">

        {{-- Overview --}}
        <li>
          <a
            href="{{ route('guest.overview') }}"
            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg bg-green-100 dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group"
          >
              <box-icon type='solid' name='pie-chart-alt-2' ></box-icon>
              <span class="ml-3">Overview</span>
          </a>
        </li>

        {{-- CES --}}
        <li>
          <a
            href="{{ route('guest.ces') }}"
            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group"
          >
              <box-icon name='building' type='solid' ></box-icon>
              <span class="ml-3">CES</span>
          </a>
        </li>

        {{-- BATAC --}}
        <li>
          <a href="{{ route('guest.batac') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
            <box-icon name='building' type='solid'></box-icon>
            <span class="ml-3">BATAC</span>
          </a>
        </li>

        {{-- AGUSAN --}}
        <li>
          <a href="{{ route('guest.agusan') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
            <box-icon name='building' type='solid'></box-icon>
            <span class="ml-3">AGUSAN</span>
          </a>
        </li>

        {{-- BICOL --}}
        <li>
          <a href="{{ route('guest.bicol') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
            <box-icon name='building' type='solid'></box-icon>
            <span class="ml-3">BICOL</span>
          </a>
        </li>

        {{-- ISABELA --}}
        <li>
          <a href="{{ route('guest.isabela') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
            <box-icon name='building' type='solid'></box-icon>
            <span class="ml-3">ISABELA</span>
          </a>
        </li>

        {{-- LOS BAÑOS --}}
        <li>
          <a href="{{ route('guest.losbaños') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
            <box-icon name='building' type='solid'></box-icon>
            <span class="ml-3">LOS BAÑOS</span>
          </a>
        </li>

        {{-- MIDSAYAP --}}
        <li>
          <a href="{{ route('guest.midsayap') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
            <box-icon name='building' type='solid'></box-icon>
            <span class="ml-3">MIDSAYAP</span>
          </a>
        </li>

        {{-- NEGROS --}}
        <li>
          <a href="{{ route('guest.negros') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
            <box-icon name='building' type='solid'></box-icon>
            <span class="ml-3">NEGROS</span>
          </a>
        </li>

      </ul>
    </div>

    </div>
  </aside>

    {{-- Main Content --}}
    <main class="p-4 md:ml-64 h-auto pt-20">
      <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
        {{-- <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
          <div id="chart1" class="items-center"></div>
        </div> --}}
        {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div> --}}
  
        <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex justify-center items-center">
          <div id="chart1"></div>
        </div>
        <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex justify-center items-center">
          <div id="chart1"></div>
        </div>
      
      </div>
      <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
      </div>
      <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
      <div class="grid grid-cols-2 gap-4">
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
      </div>
    </main>
    

  </div>

    {{-- ApexCharts CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- Charts --}}
    <script>
      var pie = {
            series: [44, 55, 13, 43, 22],
            chart: {
            width: 300,
            type: 'pie',
            toolbar: {
              show: false,
            },
        },
    
        title: {
            text: 'Chart Title',
            align: 'center',
            margin: 10,
            offsetX: 0,
            offsetY: 0,
            floating: false,
            style: {
              fontSize:  '14px',
              fontWeight:  'bold',
              fontFamily:  undefined,
              color:  '#263238'
            },
        },
        
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
     
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
    
        legend: {
            show: false
        }
      };
    
      var chart = new ApexCharts(document.querySelector("#chart1"), pie);
      chart.render();
    
    
    </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>