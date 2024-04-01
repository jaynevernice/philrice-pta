@extends('layouts.dashboard')

@section('title')
    PhilRice Los Baños
@endsection

@section('content')
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        {{-- Navbar --}}
        <nav
            class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">

                    <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd">
                            </path>
                        </svg>

                        <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd">
                            </path>
                        </svg>

                        <span class="sr-only">Toggle sidebar</span>
                    </button>


                    <a href="{{ route('landing') }}" class="flex items-center justify-between mr-4">
                        <img src="{{ asset('assets/logo.png') }}" class="mr-3 h-8" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PTA</span>
                    </a>

                </div>


                <div class="flex items-center lg:order-2">

                    <!-- Dropdown menu -->
                    <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl"
                        id="notification-dropdown">
                    </div>

                    <a href="{{ route('login') }}">
                        <button type="button"
                            class="flex items-center text-white bg-gray-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <box-icon name='log-in' class="mr-2" color="#ffffff"></box-icon>
                            Login
                        </button>
                    </a>

                    <!-- Dropdown menu -->
                    <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                        id="dropdown">
                        {{-- User Name and Email --}}
                        <div class="py-3 px-4">
                            <span class="block text-sm font-semibold text-gray-900 dark:text-white">Neil Sims</span>
                            <span class="block text-sm text-gray-900 truncate dark:text-white">name@flowbite.com</span>
                        </div>

                        {{-- User Profile --}}
                        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                            <li>
                                <a href="{{ route('profile') }}"
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                                    Manage profile
                                </a>
                            </li>
                        </ul>

                        {{-- Sign Out --}}
                        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                            <li>
                                <a href="{{ route('logout') }}"
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
            aria-label="Sidenav" id="drawer-navigation">
            <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
                <ul class="space-y-2">

                    {{-- Overview --}}
                    <li>
                        <a href="{{ route('guest.overview') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
                            <span class="ml-3">Overview</span>
                        </a>
                    </li>

                    {{-- CES --}}
                    <li>
                        <a href="{{ route('guest.ces') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">CES</span>
                        </a>
                    </li>

                    {{-- AGUSAN --}}
                    <li>
                        <a href="{{ route('guest.agusan') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">AGUSAN</span>
                        </a>
                    </li>

                    {{-- BATAC --}}
                    <li>
                        <a href="{{ route('guest.batac') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">BATAC</span>
                        </a>
                    </li>

                    {{-- BICOL --}}
                    <li>
                        <a href="{{ route('guest.bicol') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg   dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">BICOL</span>
                        </a>
                    </li>

                    {{-- ISABELA --}}
                    <li>
                        <a href="{{ route('guest.isabela') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">ISABELA</span>
                        </a>
                    </li>

                    {{-- LOS BAÑOS --}}
                    <li>
                        <a href="{{ route('guest.losbaños') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg bg-green-100 dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">LOS BAÑOS</span>
                        </a>
                    </li>

                    {{-- MIDSAYAP --}}
                    <li>
                        <a href="{{ route('guest.midsayap') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">MIDSAYAP</span>
                        </a>
                    </li>

                    {{-- NEGROS --}}
                    <li>
                        <a href="{{ route('guest.negros') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">NEGROS</span>
                        </a>
                    </li>

                </ul>
            </div>
        </aside>

        {{-- Content --}}
        <main class="p-4 md:ml-64 h-auto pt-20">

            {{-- Station --}}
            <div class="flex">
                <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-4xl"><span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PhilRice</span>
                    Los Baños</h1>
            </div>

            {{-- Filters and Export --}}
            <div class="flex my-4">

                {{-- Form --}}
                <div class="mr-2">
                    <select
                        class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                        id="form">
                        {{-- <option selected disabled>Select Form</option> --}}
                        <option selected>Summary of Trainings</option>
                    </select>
                </div>

                {{-- Year --}}
                <div class="mx-2">
                    <select
                        class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                        id="year">
                        <option selected disabled>Select Year</option>
                        <option>2024</option>
                        <option>2023</option>
                    </select>
                </div>

                {{-- Quarter --}}
                <div class="mx-2">
                    <select
                        class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                        id="quarter">
                        <option selected disabled>Select Quarter</option>
                        <option>ASD (Admin)</option>
                    </select>
                </div>

                {{-- Export Button --}}
                <div class="ml-auto">
                    <button type="button"
                        class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-50 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:focus:ring-green-50 me-2 mb-2">
                        <box-icon name='file-export' type='solid' color="#ffffff" size="sm"></box-icon>
                        <span class="px-1">Export</span>
                    </button>
                </div>

            </div>

            <div class="grid grid-cols-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div id="chart1"
                    class="border-2 mx-auto border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64">
                </div>

                <div id="chart2"
                    class="border-2 mx-auto border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64">
                </div>

                <div id="chart3"
                    class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>

                <div id="chart4"
                    class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>

            </div>

            {{-- Line --}}
            <div class="border-t-2 border-gray-300 mt-6 my-4"></div>

            <div class="drop-shadow-md p-2 rounded-lg">


                {{-- Search --}}
                <div class="mb-2 ">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search-users"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for users">
                    </div>
                </div>


                {{-- Table --}}
                <div class="my-4 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Title of Event
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Offices and Divisions
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Date
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Venue
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        RCEF Training of Trainers on the Production of High-Quality Inbred Rice and Seeds, and Farm Mechanization - CES 2023 Batch 01
                      </th>
                      <td class="px-6 py-4">
                          TMSD
                      </td>
                      <td class="px-6 py-4">
                          March 13, 2023
                      </td>
                      <td class="px-6 py-4">
                          Within PhilRice Station
                      </td>
                      <td class="px-6 py-4 text-right">
                          <a href="" target="_blank">
                            <button type="button" class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                              <box-icon name='expand-alt' size="xs" ></box-icon>
                              <span class="sr-only">Edit</span>
                            </button>
                          </a>
                          
                          
                          //<a href="" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><box-icon name='expand-alt'></box-icon></a>
                      </td>
                  </tr> --}}

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">
                                    RCEF Training of Trainers on the Production of High-Quality Inbred Rice and Seeds, and
                                    Farm Mechanization - CES 2023 Batch 01
                                </th>
                                <td class="px-6 py-4">
                                    TMSD
                                </td>
                                <td class="px-6 py-4">
                                    March 13, 2023
                                </td>
                                <td class="px-6 py-4">
                                    Within PhilRice Station
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" target="_blank">
                                        <button type="button"
                                            class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <box-icon name='expand-alt' size="xs"></box-icon>
                                            {{-- <span class="sr-only">Edit</span> --}}
                                        </button>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>



        </main>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    {{-- Charts --}}
    {{-- <script src="{{ asset('data/ces.js') }}" ></script> --}}
    <script>
        // Chart 1
        var pie = {
            series: [44, 55, 13, 43, 22],
            chart: {
                width: 300,
                type: 'pie',
                toolbar: {
                    show: true,
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
                    fontSize: '14px',
                    fontWeight: 'bold',
                    fontFamily: undefined,
                    color: '#263238'
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


        //   Chart 2
        var polar = {
            series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
            chart: {
                width: 300,
                type: 'polarArea',
            },

            title: {
                text: 'Chart Title',
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                    fontSize: '14px',
                    fontWeight: 'bold',
                    fontFamily: undefined,
                    color: '#263238'
                },
            },

            stroke: {
                colors: ['#fff']
            },

            fill: {
                opacity: 0.8
            },

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
            },


        };

        var chart = new ApexCharts(document.querySelector("#chart2"), polar);
        chart.render();

        //   Chart 3
        var spline = {
            series: [{
                name: 'series1',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'series2',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            chart: {
                height: 240,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                    "2018-09-19T06:30:00.000Z"
                ]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart3"), spline);
        chart.render();


        //   Chart 4
        var line = {
            series: [{
                    name: "High - 2013",
                    data: [28, 29, 33, 36, 32, 32, 33]
                },
                {
                    name: "Low - 2013",
                    data: [12, 11, 14, 18, 17, 13, 13]
                }
            ],
            chart: {
                height: 240,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#77B6EA', '#545454'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 1
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                title: {
                    text: 'Month'
                }
            },
            yaxis: {
                title: {
                    text: 'Temperature'
                },
                min: 5,
                max: 40
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart4"), line);
        chart.render();
    </script>

    </body>

    </html>
@endsection
