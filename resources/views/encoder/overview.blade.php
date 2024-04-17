@extends('layouts.dashboard')

@section('title')
    Overview
@endsection

@section('sidebar')
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">

                {{-- Overview --}}
                <li>
                    <a href="{{ route('encoder.overview') }}"
                        class="flex items-center p-2 text-base font-medium text-[#0B1215] rounded-lg bg-green-100 dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
                        <span class="ml-3">Overview</span>
                    </a>
                </li>

                {{-- CES --}}
                <li>
                    <a class="flex items-center p-2 w-full text-base font-medium text-[#0B1215] rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                        aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
                        <box-icon name='chevron-down'></box-icon>
                    </a>
                    <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                        <li>
                            <a href="{{ route('encoder.ces_view') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-[#0B1215] rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='line-chart'></box-icon>
                                <span class="ml-3">View Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.ces_add') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-[#0B1215] rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='plus'></box-icon>
                                <span class="ml-3">Add Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.ces_edit') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-[#0B1215] rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='edit-alt' type='solid'></box-icon>
                                <span class="ml-3">Edit Data</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- AGUSAN --}}
                <li>
                    <a href="{{ route('encoder.agusan') }}"
                        class="flex items-center p-2 text-base font-medium text-[#0B1215] rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">AGUSAN</span>
                    </a>
                </li>

                {{-- BATAC --}}
                <li>
                    <a href="{{ route('encoder.batac') }}"
                        class="flex items-center p-2 text-base font-medium text-[#0B1215] rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BATAC</span>
                    </a>
                </li>

                {{-- BICOL --}}
                <li>
                    <a href="{{ route('encoder.bicol') }}"
                        class="flex items-center p-2 text-base font-medium text-[#0B1215] rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BICOL</span>
                    </a>
                </li>

                {{-- ISABELA --}}
                <li>
                    <a href="{{ route('encoder.isabela') }}"
                        class="flex items-center p-2 text-base font-medium text-[#0B1215] rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">ISABELA</span>
                    </a>
                </li>

                {{-- LOS BAÑOS --}}
                <li>
                    <a href="{{ route('encoder.losbaños') }}"
                        class="flex items-center p-2 text-base font-medium text-[#0B1215] rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">LOS BAÑOS</span>
                    </a>
                </li>

                {{-- MIDSAYAP --}}
                <li>
                    <a href="{{ route('encoder.midsayap') }}"
                        class="flex items-center p-2 text-base font-medium text-[#0B1215] rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">MIDSAYAP</span>
                    </a>
                </li>

                {{-- NEGROS --}}
                <li>
                    <a href="{{ route('encoder.negros') }}"
                        class="flex items-center p-2 text-base font-medium text-[#0B1215] rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">NEGROS</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
@endsection

@section('content')
    {{-- Main Content --}}
    <main class="p-4 md:ml-64 h-screen pt-20">

        {{-- Filters and Export --}}
        <div class="flex my-4">

            {{-- Year --}}
            <div class="mr-2">
                <select name="year"
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="yearSelect">
                    <option value="" disabled>Year</option>
                    <option value="" >All Year</option>
                    @for ($year = date('Y'); $year >= 1990; $year--)
                        <option value="{{ $year }}" @if ($year == date('Y')) selected @endif>
                            {{ $year }}
                        </option>
                    @endfor
                </select>
            </div>

            {{-- From --}}
            <div class="mx-2">
                <select name="quarter"
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="start_MonthSelect">
                    <option value="" selected disabled>From</option>
                    <option value="" >All Month</option>
                    <option value="1" >January</option>
                    <option value="2" >February</option>
                    <option value="3" >March</option>
                    <option value="4" >April</option>
                    <option value="5" >May</option>
                    <option value="6" >June</option>
                    <option value="7" >July</option>
                    <option value="8" >August</option>  
                    <option value="9" >September</option>
                    <option value="10" >October</option>
                    <option value="11" >November</option>
                    <option value="12" >December</option>
                </select>
            </div>


            {{-- To --}}
            <div class="mx-2">
                <select name="quarter"
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="end_MonthSelect">
                    <option value="" selected disabled>To</option>
                    <option value="" >All Month</option>
                    <option value="1" >January</option>
                    <option value="2" >February</option>
                    <option value="3" >March</option>
                    <option value="4" >April</option>
                    <option value="5" >May</option>
                    <option value="6" >June</option>
                    <option value="7" >July</option>
                    <option value="8" >August</option>  
                    <option value="9" >September</option>
                    <option value="10" >October</option>
                    <option value="11" >November</option>
                    <option value="12" >December</option>
                </select>
            </div>

            {{-- Form --}}
            <div class="mx-2">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="form">
                    <option disabled>Form Type</option>
                    <option value="1" selected>Summary of Trainings Conducted</option>
                    <option value="2">Knowledge Sharing and Learning (KSL) Monitoring</option>
                    <option value="3">Technical Dispatch Monitoring</option>
                    <option value="4">Technology Demonstration Monitoring</option>
                </select>
            </div>

            {{-- Training Titles--}}
            <div class="mx-2 mr-auto">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="training_title">
                    <option value="" selected disabled>Training Title</option>
                    <option value="" >All Training Title</option>
                    @foreach ($titles as $title)
                        <option value="{{ $title->id }}" >{{ $title->training_title }}</option>
                    @endforeach
                    <option value="Other" >Other</option>
                </select>
            </div>
        </div>


        {{-- Chart Row 1 --}}
        <div class="grid grid-cols-3 gap-4 mb-4 max-[1024px]:grid-cols-1">
            {{-- Total Number of Participants --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 class="mb-2 text-6xl font-extrabold">1973</h1>
                <p class="text-gray-500 dark:text-gray-400">Total Number of Participants</p>
            </div>

            {{-- Average Gain in Knowledge --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 class="mb-2 text-6xl font-extrabold">69.69%</h1>
                <p class="text-gray-500 dark:text-gray-400">Average Gain in Knowledge (GIK)</p>
            </div>

            {{-- Overall Training Evaluation Rating --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 class="mb-2 text-6xl font-extrabold">4.93</h1>
                <p class="font-bold text-gray-500 dark:text-gray-400">Excellent</p>
                <p class="text-gray-500 dark:text-gray-400">Overall Training Evaluation Rating</p>
            </div>
        </div>

        {{-- Chart Row 2 --}}
        <div class="grid grid-cols-3 gap-4 mb-4 max-[1024px]:grid-cols-1">
            {{-- Sex Distribution --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-auto flex flex-col justify-center items-center">
                <div id="sexChart"></div>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Breakdown of Participants by Sex</p>
            </div>
            {{-- IP Distribution --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lgh-auto flex flex-col justify-center items-center">
                <div id="ipChart"></div>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Breakdown of Participants by Indigenous Identity</p>
            </div>
            {{-- PWD Distribution --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-auto flex flex-col justify-center items-center">
                <div id="pwdChart"></div>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Breakdown of Participants by Ability Status</p>
            </div>
        </div>

        {{-- Chart Row 3 --}}
        <div class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600 h-96 mb-4 p-4">
            <div id="regionsChart"></div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Color
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Microsoft Surface Pro
                            </th>
                            <td class="px-6 py-4">
                                White
                            </td>
                            <td class="px-6 py-4">
                                Laptop PC
                            </td>
                            <td class="px-6 py-4">
                                $1999
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Magic Mouse 2
                            </th>
                            <td class="px-6 py-4">
                                Black
                            </td>
                            <td class="px-6 py-4">
                                Accessories
                            </td>
                            <td class="px-6 py-4">
                                $99
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Google Pixel Phone
                            </th>
                            <td class="px-6 py-4">
                                Gray
                            </td>
                            <td class="px-6 py-4">
                                Phone
                            </td>
                            <td class="px-6 py-4">
                                $799
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple Watch 5
                            </th>
                            <td class="px-6 py-4">
                                Red
                            </td>
                            <td class="px-6 py-4">
                                Wearables
                            </td>
                            <td class="px-6 py-4">
                                $999
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>



        {{-- <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
            <div
                class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600 h-32 md:h-64 flex justify-center items-center">
                <div id="chart1"></div>
            </div>
            <div
                class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600 h-32 md:h-64 flex justify-center items-center">
                <div id="chart2"></div>
            </div>
        </div> --}}

        {{-- <div class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600 h-96 mb-4 p-4">
            <div id="chart3"></div>
        </div> --}}

        {{-- <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
                <div id="chart4"></div>
            </div>
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
                <div id="chart5"></div>
            </div>
        </div> --}}
    </main>
@endsection

@section('charts')
    <script>
        // Sex Distribution
        var sex = {
            series: [55, 45],
            chart: {
                width: 380,
                type: 'pie',
                toolbar: {
                    show: true,
                }
            },
            labels: ['Female', 'Male'],
            colors: ['#f87171', '#06b6d4'],
            // title: {
            //     text: "Sex Distribution",
            //     align: 'center',
            //     margin: 0,
            //     offsetX: 0,
            //     offsetY: 0,
            //     floating: false,
            //     style: {
            //         fontSize: '14px',
            //         fontWeight: 'bold',
            //         fontFamily: undefined,
            //         color: '#263238'
            //     },
            // },
            // responsive: [{
            //     breakpoint: 480,
            //     options: {
            //         chart: {
            //             width: 200,
            //         },
            //         legend: {
            //             position: 'bottom'
            //         }
            //     }
            // }]
        };

        var chart = new ApexCharts(document.querySelector("#sexChart"), sex);
        chart.render();

        // IP Distribution
        var ip = {
            series: [23, 77],
            chart: {
                width: 380,
                type: 'pie',
                toolbar: {
                    show: true,
                }
            },
            labels: ['Indigenous', 'Non-IP'],
            colors: ['#1a2e05', '#164e63']
        };

        var chart = new ApexCharts(document.querySelector("#ipChart"), ip);
        chart.render();

        // PWD Distribution
        var pwd = {
            series: [40, 60],
            chart: {
                width: 380,
                type: 'pie',
                toolbar: {
                    show: true,
                }
            },
            labels: ['PWD', 'Non-PWD'],
            colors: ['#6d28d9', '#164e63']
        };

        var chart = new ApexCharts(document.querySelector("#pwdChart"), pwd);
        chart.render();

        // Regions
        var regions = {
            series: [{
                data: [{
                        x: 'Nueva Ecija',
                        y: 14
                    },
                    {
                        x: 'La Union',
                        y: 1
                    },
                    {
                        x: 'Metro Manila',
                        y: 2
                    },
                    {
                        x: 'Negros Occidental',
                        y: 1
                    },
                    {
                        x: 'Laguna',
                        y: 10
                    },
                    {
                        x: 'Benguet',
                        y: 2
                    },
                    {
                        x: 'Agusan Del Norte',
                        y: 4
                    },
                    {
                        x: 'Compostella Valley',
                        y: 1
                    },
                    {
                        x: 'Sorsogon',
                        y: 2
                    },
                    {
                        x: 'Leyte',
                        y: 5
                    },
                    {
                        x: 'Camarines Sur',
                        y: 4
                    },
                    {
                        x: 'Camarines Norte',
                        y: 1
                    },
                    {
                        x: 'Albay',
                        y: 3
                    }
                ]
            }],
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

        var chart = new ApexCharts(document.querySelector("#regionsChart"), regions);
        chart.render();



        // Samples
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
            series: [{
                data: [{
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
            }],
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
            series: [{
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
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart5"), options);
        chart.render();
    </script>
@endsection
