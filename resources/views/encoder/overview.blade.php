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
            <div class="mr-1 w-26">
                <select name="year"
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="yearSelect">
                    <option value="" disabled>Year</option>
                    <option value="">All Year</option>
                    @for ($year = date('Y'); $year >= 1990; $year--)
                        {{-- <option value="{{ $year }}" @if ($year == date('Y')) selected @endif> --}}
                        <option value="{{ $year }}" @if ($year == date('Y')) @endif>
                            {{ $year }}
                        </option>
                    @endfor
                </select>
            </div>

            {{-- From --}}
            <div class="mx-1 w-24">
                <select name="quarter"
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="start_MonthSelect">
                    <option value="" selected disabled>From</option>
                    <option value="">All Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>

            {{-- To --}}
            <div class="mx-1 w-24">
                <select name="quarter"
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="end_MonthSelect">
                    <option value="" selected disabled>To</option>
                    <option value="">All Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>

            {{-- Form --}}
            <div class="mx-1 w-48">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="form">
                    <option disabled>Form Type</option>
                    <option value="1" selected>Summary of Trainings Conducted</option>
                    <option value="0" disabled >Knowledge Sharing and Learning (KSL) Monitoring</option>
                    <option value="0" disabled >Technical Dispatch Monitoring</option>
                    <option value="0" disabled >Technology Demonstration Monitoring</option>
                </select>
            </div>

            {{-- Training Titles --}}
            <div class="mx-1 w-40">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="training_title">
                    <option value="" selected disabled>Training Title</option>
                    <option value="">All Training Title</option>
                    @foreach ($titles as $title)
                        <option value="{{ $title->training_title }}">{{ $title->training_title }}</option>
                    @endforeach
                    <option value="Other">Other</option>
                </select>
            </div>
            
            {{-- Regions --}}
            {{-- <div class="mx-1 w-36">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="regionSelect">
                    <option value="" selected disabled>Region</option>
                    <option value="">All Regions</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->regCode }}">{{ $region->regDesc }}</option>
                    @endforeach
                </select>
            </div> --}}

            {{-- Provinces --}}
            {{-- <div class="mx-1 w-36">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="provinceSelect">
                    <option value="" selected disabled>Province</option>
                    <option value="">All Provinces</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->provCode }}">{{ $province->provDesc }}</option>
                    @endforeach
                </select>
            </div> --}}

            {{-- Municipalities --}}
            {{-- <div class="mx-1 w-36">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="municipalitySelect">
                    <option value="" selected disabled>Municipality</option>
                    <option value="">All Municipalities</option>
                    @foreach ($municipalities as $municipality)
                        <option value="{{ $municipality->citymunCode }}">{{ $municipality->citymunDesc }}</option>
                    @endforeach
                </select>
            </div> --}}
        </div>


        {{-- Chart Row 1 --}}
        <div class="grid grid-cols-3 gap-4 mb-4 max-[1024px]:grid-cols-1">
            {{-- Total Number of Participants --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 id="total_participants_chart" class="mb-2 text-6xl font-extrabold">0</h1>
                <p class="text-gray-500 dark:text-gray-400">Total Number of Participants</p>
            </div>

            {{-- Average Gain in Knowledge --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 id="average_gik_chart" class="mb-2 text-6xl font-extrabold">0%</h1>
                <p class="text-gray-500 dark:text-gray-400">Average Gain in Knowledge (GIK)</p>
            </div>

            {{-- Overall Training Evaluation Rating --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 id="evaluation_chart" class="mb-2 text-6xl font-extrabold">0</h1>
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
        <div class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600  mb-4 p-4">
            <div id="sectorChart"></div>
        </div>

        {{-- Chart Row 4 --}}
        <div class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600  mb-4 p-4">
            <div id="regionsChart"></div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg grid grid-cols-3">
                {{-- Column 1 --}}
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Region
                            </th>
                        </tr>
                    </thead>
                    <tbody id="region-column-1">
                        {{-- data for column 1 of region --}}
                    </tbody>
                </table>

                {{-- Column 2 --}}
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Region
                            </th>
                        </tr>
                    </thead>
                    <tbody id="region-column-2">
                        {{-- data for column 2 of region --}}
                    </tbody>
                </table>

                {{-- Column 3 --}}
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Region
                            </th>
                        </tr>
                    </thead>
                    <tbody id="region-column-3">
                        {{-- data for column 3 of region --}}
                    </tbody>
                </table>

            </div>

        </div>

        {{-- Chart Row 5 --}}
        <div class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600  mb-4 p-4">
            <div id="provincesChart"></div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg grid grid-cols-3">
                {{-- Column 1 --}}
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Province
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                14
                            </th>
                            <td class="px-6 py-4">
                                Nueva Ecija
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- Column 2 --}}
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Province
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                14
                            </th>
                            <td class="px-6 py-4">
                                Nueva Ecija
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- Column 3 --}}
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Province
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                14
                            </th>
                            <td class="px-6 py-4">
                                Nueva Ecija
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

        @include('_message')
    </main>
@endsection

@section('charts')
    <script>
        // Sex Distribution
        var sex_charts = @json($sex_charts);
        var sex_labels = Object.keys(sex_charts);
        var sex_values = Object.values(sex_charts);

        var sex = {
            // series: [55, 45],
            series: sex_values,
            chart: {
                width: 380,
                type: 'pie',
                toolbar: {
                    show: true,
                }
            },
            // labels: ['Female', 'Male'],
            labels: sex_labels,
            colors: ['#CA6B54', '#3E6D81'],
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

        var sexChart = new ApexCharts(document.querySelector("#sexChart"), sex);
        sexChart.render();

        // IP Distribution
        var indigenous_charts = @json($indigenous_charts);
        var indigenous_labels = Object.keys(indigenous_charts);
        var indigenous_values = Object.values(indigenous_charts);

        var ip = {
            // series: [23, 77],
            series: indigenous_values,
            chart: {
                width: 380,
                type: 'pie',
                toolbar: {
                    show: true,
                }
            },
            // labels: ['Indigenous', 'Non-IP'],
            labels: indigenous_labels,
            colors: ['#FCCB71', '#D78A3D']
        };

        var indigenousChart = new ApexCharts(document.querySelector("#ipChart"), ip);
        indigenousChart.render();

        // PWD Distribution
        var ability_charts = @json($ability_charts);
        var ability_labels = Object.keys(ability_charts);
        var ability_values = Object.values(ability_charts);

        var pwd = {
            // series: [40, 60],
            series: ability_values,
            chart: {
                width: 380,
                type: 'pie',
                toolbar: {
                    show: true,
                }
            },
            // labels: ['PWD', 'Non-PWD'],
            labels: ability_labels,
            colors: ['#6d28d9', '#15A648']
        };

        var abilityChart = new ApexCharts(document.querySelector("#pwdChart"), pwd);
        abilityChart.render();

        // Sector Bar Chart
        var sector_charts = @json($sector_charts);
        var sector_labels = Object.keys(sector_charts);
        var sector_values = Object.values(sector_charts);

        var sector = {
            series: [{
                // data: [400, 430, 448, 470]
                data: sector_values
            }],
            chart: {
                type: 'bar',
                height: 240
            },
            plotOptions: {
                bar: {
                    barHeight: '100%',
                    distributed: true,
                    horizontal: true,
                    dataLabels: {
                        position: 'bottom'
                    },
                }
            },
            colors: ['#3D6A7F', '#C56D51', '#FDCB6D', '#12A64B'],
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                style: {
                    colors: ['#fff']
                },
                formatter: function(val, opt) {
                    return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                },
                offsetX: 0,
                dropShadow: {
                    enabled: true
                }
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            xaxis: {
                categories: sector_labels,
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            title: {
                text: 'Breakdown by Sector',
                align: 'center',
                floating: true
            },
            tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function() {
                            return ''
                        }
                    }
                }
            },
            legend: {
                show: false
            }
        };

        var sectorChart = new ApexCharts(document.querySelector("#sectorChart"), sector);
        sectorChart.render();

        // Regions
        var regions_charts = @json($region_charts);
        // console.log(regions_charts);
        // var regionsChartsData = Object.entries(regions_charts).map(([region_name, region_count]) => ({
        //     x: region_name,
        //     y: region_count
        // }));
        // console.log(regions_charts);

        var regions = {
            // series: [{
            //     data: regionsChartsData
            //     data: [{
            //             x: 'Nueva Ecija',
            //             y: 14
            //         },
            //         {
            //             x: 'La Union',
            //             y: 1
            //         },
            //         {
            //             x: 'Metro Manila',
            //             y: 2
            //         },
            //         {
            //             x: 'Negros Occidental',
            //             y: 1
            //         },
            //         {
            //             x: 'Laguna',
            //             y: 10
            //         },
            //         {
            //             x: 'Benguet',
            //             y: 2
            //         },
            //         {
            //             x: 'Agusan Del Norte',
            //             y: 4
            //         },
            //         {
            //             x: 'Compostella Valley',
            //             y: 1
            //         },
            //         {
            //             x: 'Sorsogon',
            //             y: 2
            //         },
            //         {
            //             x: 'Leyte',
            //             y: 5
            //         },
            //         {
            //             x: 'Camarines Sur',
            //             y: 4
            //         },
            //         {
            //             x: 'Camarines Norte',
            //             y: 1
            //         },
            //         {
            //             x: 'Albay',
            //             y: 3
            //         }
            //     ]
            // }],
            series: [{
                data: regions_charts.map(function(item) {
                    return {
                        x: item.region_name,
                        y: parseInt(item.region_count)
                    };
                })
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
                text: 'Regions',
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

        var regionsChart = new ApexCharts(document.querySelector("#regionsChart"), regions);
        regionsChart.render();

        // Provinces
        var provinces = {
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
                text: 'Provinces',
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

        var provincesChart = new ApexCharts(document.querySelector("#provincesChart"), provinces);
        provincesChart.render();
    </script>
@endsection

@section('datatable')
    <script type="text/javascript">
        let currentPage = 1;
        const recordsPerPage = 5; // Change this number according to your preference

        $(document).ready(function() {
            loadTrainings(currentPage);
        });

        function showRegions(result) {

            var data_first_column = result.slice(0, 6);
            var tableRow = ``;
            data_first_column.forEach(function(data) {
                tableRow +=
                `<tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">` +
                    data["region_count"] +
                    `</th>
                    <td class="px-6 py-4">` + data["region_name"] + `</td>
                </tr>`;
            });
            $("#region-column-1").html(tableRow);

            var data_second_column = result.slice(6, 12);
            var tableRow = ``;
            data_second_column.forEach(function(data) {
                tableRow +=
                `<tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">` +
                    data["region_count"] +
                    `</th>
                    <td class="px-6 py-4">` + data["region_name"] + `</td>
                </tr>`;
            });
            $("#region-column-2").html(tableRow);

            var data_third_column = result.slice(12, 18);
            var tableRow = ``;
            data_third_column.forEach(function(data) {
                tableRow +=
                `<tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">` +
                    data["region_count"] +
                    `</th>
                    <td class="px-6 py-4">` + data["region_name"] + `</td>
                </tr>`;
            });
            $("#region-column-3").html(tableRow);
        }   

        function loadTrainings(page) {
            $.ajax({
                // url: "/encoder/trainings/filter",
                url: "{{ route('filter_data') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    showOverview: true,
                    page: page,
                    recordsPerPage: recordsPerPage,
                },
                success: function(result) {
                    showRegions(result["regions"]);
                    
                    currentPage = page; // Update current page
                    var total_participants = result['only_numbers'][0].total_participants;
                    var average_gik = result['only_numbers'][0].average_gik;
                    var evaluation = result['only_numbers'][0].evaluation;

                    $("#total_participants_chart").text(total_participants);
                    $("#average_gik_chart").text(average_gik + '%');
                    $("#evaluation_chart").text(evaluation);
                    // Check if there are more records beyond the current page
                    // if (recordsPerPage != result["records"].length) {
                    //     $("#nextButton").hide();
                    //     $("#prevButton").show();
                    // } else {
                    //     $("#nextButton").show();
                    //     $("#prevButton").show();
                    // }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                },
            });
        }
        // SEX CHART //
        function loadSexPieChart() {
            // Sex Distribution
            var sex_charts = @json($sex_charts);
            var sex_labels = Object.keys(sex_charts);
            var sex_values = Object.values(sex_charts);

            sex.series = sex_values;
            sex.labels = sex_labels;

            var sexChart = new ApexCharts(document.querySelector("#sexChart"), sex);
            sexChart.render();
        }
        // INDIGENOUS CHART //
        function loadIndigenousPieChart() {
            // IP Distribution
            var indigenous_charts = @json($indigenous_charts);
            var indigenous_labels = Object.keys(indigenous_charts);
            var indigenous_values = Object.values(indigenous_charts);

            ip.series = indigenous_values;
            ip.labels = indigenous_labels;

            var indigenousChart = new ApexCharts(document.querySelector("#ipChart"), ip);
            indigenousChart.render();
        }
        // ABILITY CHART //
        function loadAbilityPieChart() {
            // PWD Distribution
            var ability_charts = @json($ability_charts);
            var ability_labels = Object.keys(ability_charts);
            var ability_values = Object.values(ability_charts);

            pwd.series = ability_values;
            pwd.labels = ability_labels;

            var abilityChart = new ApexCharts(document.querySelector("#pwdChart"), pwd);
            abilityChart.render();
        }
        // SECTOR CHART //
        function loadSectorBarChart() {
            var sector_charts = @json($sector_charts);
            var sector_labels = Object.keys(sector_charts);
            var sector_values = Object.values(sector_charts);

            sector.series[0].data = sector_values;
            sector.xaxis.categories = sector_labels;

            var sectorChart = new ApexCharts(document.querySelector("#sectorChart"), sector);
            sectorChart.render();
        }

        // RENDER FILTERED PIE CHART //
        function renderFilteredPieChart(keys, values, chart) {
            // fetch filtered data for pie chart
            var labels = keys;
            var values = values;
            // handle null data
            values = values.map(value => value === null ? 0 : value);
            
            if(chart == 'sex') {
                // update sex chart  
                sex.series = values;
                sex.labels = labels;
                // render sex chart
                var sexChart = new ApexCharts(document.querySelector("#sexChart"), sex);
                sexChart.render();
            }
            if(chart == 'ip') {
                // update indigenous chart  
                ip.series = values;
                ip.labels = labels;
                // render indigenous chart
                var indigenousChart = new ApexCharts(document.querySelector("#ipChart"), ip);
                indigenousChart.render();
            }
            if(chart == 'pwd') {
                // update PWD chart  
                pwd.series = values;
                pwd.labels = labels;
                // render PWD chart
                var abilityChart = new ApexCharts(document.querySelector("#pwdChart"), pwd);
                abilityChart.render();
            }

        }

        // RENDER FILTERED BAR CHART //
        function renderFilteredBarChart(keys, values, chart) {
            var labels = keys;
            var values = values;
            
            if(chart == 'sector') {
                sector.series[0].data = values;
                sector.xaxis.categories = labels;

                var sectorChart = new ApexCharts(document.querySelector("#sectorChart"), sector);
                sectorChart.render();
            }
        }

        // Function to destroy a chart if it exists
        function destroyChart(chart) {
            if (chart) {
                chart.destroy();
            }
        }

        function loadFilterTrainings(page) {
            // var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();
            var formType = parseInt($("#form").val());

            $.ajax({
                // url: "/encoder/trainings/filter",
                url: "{{ route('filter_data') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    filterShowOverview: true,
                    // searchInput: searchInput,
                    yearSelect: yearSelect,
                    start_MonthSelect: start_MonthSelect,
                    end_MonthSelect: end_MonthSelect,
                    trainingTitle: trainingTitle,
                    formType: formType,
                    page: page,
                    recordsPerPage: recordsPerPage,
                },
                success: function(result) {
                    currentPage = page; // Update current page
                    var total_participants = result['only_numbers'][0].total_participants != null ? result['only_numbers'][0].total_participants : '0'; 
                    var average_gik = result['only_numbers'][0].average_gik != null ? result['only_numbers'][0].average_gik : '0';
                    var evaluation = result['only_numbers'][0].evaluation != null ? result['only_numbers'][0].evaluation : '0';

                    $("#total_participants_chart").text(total_participants);
                    $("#average_gik_chart").text(average_gik + '%');
                    $("#evaluation_chart").text(evaluation);
                    
                    // Destroy existing charts
                    destroyChart(sexChart);
                    destroyChart(indigenousChart);
                    destroyChart(abilityChart);
                    destroyChart(sectorChart);
                    
                    // call function to render filtered pie chart
                    renderFilteredPieChart(Object.keys(result['sex_charts']), Object.values(result['sex_charts']), 'sex');
                    renderFilteredPieChart(Object.keys(result['indigenous_charts']), Object.values(result['indigenous_charts']), 'ip');
                    renderFilteredPieChart(Object.keys(result['ability_charts']), Object.values(result['ability_charts']), 'pwd');
                    
                    // call function to render filtered Bar chart
                    renderFilteredBarChart(Object.keys(result['sector_charts']), Object.values(result['sector_charts']), 'sector');

                    // if (recordsPerPage != result["records"].length) {
                    //     $("#nextButton").hide();
                    //     $("#prevButton").show();
                    // } else {
                    //     $("#nextButton").show();
                    //     $("#prevButton").show();
                    // }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                },
            });
        }

        $("#yearSelect").on("change", function() {
            // var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();

            if (
                // searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
            ) {
                loadTrainings(1);

                // Destroy existing charts
                destroyChart(sexChart);
                destroyChart(indigenousChart);
                destroyChart(abilityChart);
                destroyChart(sectorChart);

                // Render new charts
                loadSexPieChart();
                loadIndigenousPieChart();
                loadAbilityPieChart();
                loadSectorBarChart();

            } else {
                loadFilterTrainings(1);
                
            }
        });

         $("#start_MonthSelect").on("change", function() {
            // var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();

            if (
                // searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
            ) {
                loadTrainings(1);

                // Destroy existing charts
                destroyChart(sexChart);
                destroyChart(indigenousChart);
                destroyChart(abilityChart);
                destroyChart(sectorChart);

                // Render new charts
                loadSexPieChart();
                loadIndigenousPieChart();
                loadAbilityPieChart();
                loadSectorBarChart();

            } else {
                loadFilterTrainings(1);
            }
        });

        $("#end_MonthSelect").on("change", function() {
            // var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();

            if (
                // searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
            ) {
                loadTrainings(1);

                // Destroy existing charts
                destroyChart(sexChart);
                destroyChart(indigenousChart);
                destroyChart(abilityChart);
                destroyChart(sectorChart);

                // Render new charts
                loadSexPieChart();
                loadIndigenousPieChart();
                loadAbilityPieChart();
                loadSectorBarChart();

            } else {
                loadFilterTrainings(1);
            }
        });

        $("#training_title").on("change", function() {
            // var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();
            // console.log(trainingTitle);
            if (
                // searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
            ) {
                loadTrainings(1);

                // Destroy existing charts
                destroyChart(sexChart);
                destroyChart(indigenousChart);
                destroyChart(abilityChart);
                destroyChart(sectorChart);

                // Render new charts
                loadSexPieChart();
                loadIndigenousPieChart();
                loadAbilityPieChart();
                loadSectorBarChart();

            } else {
                loadFilterTrainings(1);
            }
        });

        $("#form").on("change", function() {
            // var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();
            var formType = parseInt($("#form").val());
            // console.log(formType);
            if (
                // searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == "" &&
                formType == "1"
            ) {
                loadTrainings(1);

                // Destroy existing charts
                destroyChart(sexChart);
                // destroyChart(indigenousChart);
                // destroyChart(abilityChart);
                // destroyChart(sectorChart);

                // Render new charts
                loadSexPieChart();
                // loadIndigenousPieChart();
                // loadAbilityPieChart();
                // loadSectorBarChart();

            } else {
                loadFilterTrainings(1);
            }
        });

        // regions, provinces, and municipalities dropdown change event
        $('#regionSelect').on('change', function() {
            var regCode = $("#regionSelect").val();
            $("#provinceSelect").html('');
            $.ajax({
                url: "{{ route('trainings.fetchProvinces') }}",
                type: "POST",
                data: {
                    regCode: regCode,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#provinceSelect').html(
                        '<option value="" selected disabled>Province</option><option value="">All Provinces</option>'
                    );
                    $.each(result, function(key, value) {
                        $("#provinceSelect").append('<option value="' + value.provCode + '">' +
                            value.provDesc + '</option>');
                    });
                    
                },
                error: function(error) {
                    alert('Something went wrong!');
                },
            });
        });

        $('#provinceSelect').on('change', function() {
            var provCode = $("#provinceSelect").val();
            $("#municipalitySelect").html('');
            $.ajax({
                url: "{{ route('trainings.fetchMunicipalities') }}",
                type: "POST",
                data: {
                    provCode: provCode,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#municipalitySelect').html(
                        '<option value="" selected disabled>Municipality</option><option value="">All Municipalities</option>');
                    $.each(result, function(key, value) {
                        $("#municipalitySelect").append('<option value="' + value.citymunCode + '">' +
                            value.citymunDesc + '</option>');
                    });
                    
                },
                error: function(error) {
                    alert('Something went wrong!');
                },
            });
        });
    </script>
@endsection