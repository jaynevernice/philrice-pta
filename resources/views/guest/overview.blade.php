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
  
  
          <a href="{{ url('/') }}" class="flex items-center justify-between mr-4">
            <img
              src="{{ asset('assets/logo.png') }}"
              class="mr-3 h-8"
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
            <button type="button" class="flex items-center text-white bg-gray-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
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
        
        {{-- AGUSAN --}}
        <li>
          <a href="{{ route('guest.agusan') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
            <box-icon name='building' type='solid'></box-icon>
            <span class="ml-3">AGUSAN</span>
          </a>
        </li>

        {{-- BATAC --}}
        <li>
          <a href="{{ route('guest.batac') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
            <box-icon name='building' type='solid'></box-icon>
            <span class="ml-3">BATAC</span>
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


      {{-- Filters and Export --}}
      <div class="flex my-4">
        
        {{-- Form --}}
        <div class="mr-2">
          <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="form">
              <option selected disabled>Select Form</option>
              <option>Summary of Trainings</option>
              <option>Technical Dispatch</option>
              <option>KSL</option>
          </select>
        </div>

        {{-- Year --}}
        <div class="mx-2">
          <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="year">
              <option selected disabled>Select Year</option>
              <option>2024</option>
              <option>2023</option>
          </select>
        </div>

        {{-- Quarter --}}
        <div class="mx-2">
          <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="quarter">
              <option selected disabled>Select Quarter</option>
              <option>ASD (Admin)</option>
          </select>
        </div>

        {{-- Export Button --}}
        <div class="ml-auto">
          <button type="button" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-50 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:focus:ring-green-50 me-2 mb-2">
            <box-icon name='file-export' type='solid' color="#ffffff" size="sm" ></box-icon>
                <span class="px-1">Export</span>
          </button>
        </div>

      </div>

      <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
        {{-- <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
          <div id="chart1" class="items-center"></div>
        </div> --}}
        {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div> --}}
  
        <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex justify-center items-center">
          <div id="chart1"></div>
        </div>
        <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex justify-center items-center">
          <div id="chart2"></div>
        </div>
      
      </div>

      <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4">
        <div id="chart3"></div>
      </div>


      <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
          <div id="chart4"></div>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
          <div id="chart5"></div>
        </div>
        {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div> --}}
        {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div> --}}
      </div>
      {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div> --}}
      {{-- <div class="grid grid-cols-2 gap-4">
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
      </div> --}}
    </main>
    

  </div>

    {{-- ApexCharts CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- Charts --}}
    <script>
      var bar = {
        series: [{
        data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
      }],
        chart: {
        type: 'bar',
        height: 290,
        toolbar: {
          show: false,
        },
      },
      plotOptions: {
        bar: {
          borderRadius: 4,
          horizontal: true,
        }
      },
      dataLabels: {
        enabled: false
      },
      xaxis: {
        categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
          'United States', 'China', 'Germany'
        ],
      }
      };
      
      var chart = new ApexCharts(document.querySelector("#chart1"), bar);
      chart.render();
      
      
      var timeline = {
        series: [
        {
          data: [
            {
              x: 'Code',
              y: [
                new Date('2019-03-02').getTime(),
                new Date('2019-03-04').getTime()
              ]
            },
            {
              x: 'Test',
              y: [
                new Date('2019-03-04').getTime(),
                new Date('2019-03-08').getTime()
              ]
            },
            {
              x: 'Validation',
              y: [
                new Date('2019-03-08').getTime(),
                new Date('2019-03-12').getTime()
              ]
            },
            {
              x: 'Deployment',
              y: [
                new Date('2019-03-12').getTime(),
                new Date('2019-03-18').getTime()
              ]
            }
          ]
        }
      ],
        chart: {
        height: 290,
        type: 'rangeBar',
        toolbar: {
          show: false,
        },
      },
      plotOptions: {
        bar: {
          horizontal: true
        }
      },
      xaxis: {
        type: 'datetime'
      }
      };
      
      var chart = new ApexCharts(document.querySelector("#chart2"), timeline);
      chart.render();    

      var options = {
          series: [
          {
            data: [
              {
                x: 'New Delhi',
                y: 218
              },
              {
                x: 'Kolkata',
                y: 149
              },
              {
                x: 'Mumbai',
                y: 184
              },
              {
                x: 'Ahmedabad',
                y: 55
              },
              {
                x: 'Bangaluru',
                y: 84
              },
              {
                x: 'Pune',
                y: 31
              },
              {
                x: 'Chennai',
                y: 70
              },
              {
                x: 'Jaipur',
                y: 30
              },
              {
                x: 'Surat',
                y: 44
              },
              {
                x: 'Hyderabad',
                y: 68
              },
              {
                x: 'Lucknow',
                y: 28
              },
              {
                x: 'Indore',
                y: 19
              },
              {
                x: 'Kanpur',
                y: 29
              }
            ]
          }
        ],
          legend: {
          show: false
        },
        chart: {
          height: 350,
          type: 'treemap',
          toolbar: {
            show: false,
          },
        },
        title: {
          text: 'Distibuted Treemap (different color for each cell)',
          align: 'center'
        },
        colors: [
          '#3B93A5',
          '#F7B844',
          '#ADD8C7',
          '#EC3C65',
          '#CDD7B6',
          '#C1F666',
          '#D43F97',
          '#1E5D8C',
          '#421243',
          '#7F94B0',
          '#EF6537',
          '#C0ADDB'
        ],
        plotOptions: {
          treemap: {
            distributed: true,
            enableShades: false
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();

        var options = {
          series: [
          {
            name: 'Q1 Budget',
            group: 'budget',
            data: [44000, 55000, 41000, 67000, 22000, 43000]
          },
          {
            name: 'Q1 Actual',
            group: 'actual',
            data: [48000, 50000, 40000, 65000, 25000, 40000]
          },
          {
            name: 'Q2 Budget',
            group: 'budget',
            data: [13000, 36000, 20000, 8000, 13000, 27000]
          },
          {
            name: 'Q2 Actual',
            group: 'actual',
            data: [20000, 40000, 25000, 10000, 12000, 28000]
          }
        ],
          chart: {
          type: 'bar',
          height: 290,
          stacked: true,
          toolbar: {
            show: false,
          },
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        dataLabels: {
          formatter: (val) => {
            return val / 1000 + 'K'
          }
        },
        plotOptions: {
          bar: {
            horizontal: false
          }
        },
        xaxis: {
          labels: {
            show: false
          }
        },
        fill: {
          opacity: 1
        },
        colors: ['#80c7fd', '#008FFB', '#80f1cb', '#00E396'],
        yaxis: {
          labels: {
            formatter: (val) => {
              return val / 1000 + 'K'
            }
          }
        },
        legend: {
          show: false
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart4"), options);
        chart.render();


        var options = {
          series: [{
          name: 'Net Profit',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Revenue',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Free Cash Flow',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
          height: 280,
          toolbar: {
            show: false,
          }
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
          labels: {
            show: false
          },
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart5"), options);
        chart.render();
    
    </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>