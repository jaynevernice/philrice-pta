@extends('layouts.dashboard')

@section('title')
    PhilRice Isabela
@endsection

@section('sidebar')
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

                {{-- CMU --}}
                <li>
                    <a href="{{ route('guest.cmu') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">CMU</span>
                    </a>
                </li>

                {{-- ISABELA --}}
                <li>
                    <a href="{{ route('guest.isabela') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg bg-green-100 dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">ISABELA</span>
                    </a>
                </li>

                {{-- LOS BAÑOS --}}
                <li>
                    <a href="{{ route('guest.losbaños') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
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
@endsection

@section('content')
    <main class="p-4 md:ml-64 h-screen pt-20">

        {{-- Station --}}
        <div class="flex">
            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-4xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PhilRice</span> Isabela
            </h1>
        </div>

        {{-- Filters and Export --}}
        <div class="flex my-4">

            {{-- Year --}}
            <div class="mr-1 w-26">
                <select name="year"
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="yearSelect">
                    <option value="" selected disabled>Year</option>
                    <option value="">All Year</option>
                    @for ($year = date('Y'); $year >= 1990; $year--)
                        {{-- <option value="{{ $year }}" @if ($year == date('Y')) selected @endif> --}}
                        <option value="{{ $year }}">
                            {{ $year }}
                        </option>
                    @endfor
                </select>
            </div>

            {{-- From --}}
            <div class="mx-1 w-24">
                <select name="quarter"
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="start_MonthSelect">
                    <option value="" selected>From</option>
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
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="end_MonthSelect">
                    <option value="" selected>To</option>
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
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="form">
                    <option disabled>Form Type</option>
                    <option value="1" selected>Summary of Trainings Conducted</option>
                    <option value="0" disabled>Knowledge Sharing and Learning (KSL) Monitoring</option>
                    <option value="0" disabled>Technical Dispatch Monitoring</option>
                    <option value="0" disabled>Technology Demonstration Monitoring</option>
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

            {{-- Provinces --}}
            <div class="mx-1 w-36">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="provinceSelect">
                    <option value="" selected disabled>Province</option>
                    <option value="All">All Provinces</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->provCode }}">{{ $province->provDesc }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        {{-- Chart Row 1 --}}
        <div class="grid grid-cols-3 gap-4 mb-4 max-[1024px]:grid-cols-1">
            {{-- Total Number of Participants --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 id="total_participants_chart" class="mb-2 text-6xl font-extrabold">0</h1>
                <p class="text-gray-500 dark:text-gray-400">Participants</p>
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
                <p class="text-gray-500 dark:text-gray-400 mb-8">Sex</p>
            </div>
            {{-- IP Distribution --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lgh-auto flex flex-col justify-center items-center">
                <div id="ipChart"></div>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Indigenous People</p>
            </div>
            {{-- PWD Distribution --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-auto flex flex-col justify-center items-center">
                <div id="pwdChart"></div>
                <p class="text-gray-500 dark:text-gray-400 mb-8">People with Disabilities</p>
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
                    <tbody id="province-column-1">
                        {{-- data for column 1 of province --}}
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
                    <tbody id="province-column-2">
                        {{-- data for column 2 of province --}}
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
                    <tbody id="province-column-3">
                        {{-- data for column 3 of province --}}
                    </tbody>
                </table>

            </div>

        </div>

        {{-- Chart Row 6 --}}
        <div class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600  mb-4 p-4">
            {{-- <div id="municipalitiesChart"></div> --}}

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg grid grid-cols-3">
                
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Municipality
                            </th>
                        </tr>
                    </thead>
                    <tbody id="municipality-column-1">
                        
                    </tbody>
                </table>
               
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Municipality
                            </th>
                        </tr>
                    </thead>
                    <tbody id="municipality-column-2">
                        
                    </tbody>
                </table>

                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Municipality
                            </th>
                        </tr>
                    </thead>
                    <tbody id="municipality-column-3">
                        
                    </tbody>
                </table>

            </div>

            {{-- Previous and Next Buttons for Pagination --}}
            <div class="flex justify-end">
                <div class="mb-4">
                    {{-- page button for no filter --}}
                    <button id="prevButtonMunicipality" onclick="prevPageMunicipality()"
                        class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <box-icon name='chevrons-left' type='solid' color="#ffffff" class="mr-2"></box-icon>
                        Previous
                    </button>
                </div>
                <div class="ml-1 mb-4">
                    {{-- page button for no filter --}}
                    <button id="nextButtonMunicipality" onclick="nextPageMunicipality()"
                        class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Next
                        <box-icon name='chevrons-right' color="#ffffff" class="ml-2"></box-icon>
                    </button>
                </div>
            </div>
        </div>

        {{-- Line --}}
        <div class="border-t-2 border-gray-300 mt-6 my-4"></div>

        <div class="drop-shadow-md p-2 rounded-lg flex justify-between items-center">
            {{-- Search --}}
            <div class="mb-2 ">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="trainingsSearch"
                        class="h-12 block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search">
                </div>
            </div>

            {{-- Export Button --}}
            <div class="ml-auto">
                <button type="button" onclick="exportRecord()"
                    class="h-12 w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-50 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex justify-center items-center dark:focus:ring-green-50 me-2 mb-2">
                    <i class="fa-solid fa-file-excel"></i>
                    <span class="pl-2">Export</span>
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="my-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Training Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Date
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Conducting Division
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Total Participants
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Average GIK
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Evaluation Rating
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <span>Expand</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    {{-- Records --}}

                </tbody>
            </table>
        </div>

        {{-- Previous and Next Buttons for Pagination --}}
        <div class="flex justify-end">
            <div class="mb-4">
                {{-- page button for no filter --}}
                <button id="prevButton" onclick="prevPage()"
                    class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    <box-icon name='chevrons-left' type='solid' color="#ffffff" class="mr-2"></box-icon>
                    Previous
                </button>
            </div>
            <div class="ml-1 mb-4">
                {{-- page button for no filter --}}
                <button id="nextButton" onclick="nextPage()"
                    class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Next
                    <box-icon name='chevrons-right' color="#ffffff" class="ml-2"></box-icon>
                </button>
            </div>
        </div>

    </main>

    {{-- Modal for CES Summary of Trainings --}}
    <div id="trainings-modal" tabindex="-1" aria-hidden="true"
        class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 z-50 justify-center items-center pt-36">
        <div class="fixed inset-0 bg-black opacity-50 h-full"></div>
        <div class="relative p-4 w-full max-w-4xl">
            {{-- Modal Content --}}
            <div class="relative bg-white rounded-lg shadow">
                {{-- Modal Header --}}
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 id="title" class="text-md font-semibold text-gray-900"></h3>
                    <button type="button" onclick="closeModal()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <box-icon name='x'></box-icon>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                {{-- Modal Body --}}
                <form class="p-5">
                    {{-- Cards --}}
                    <div class="grid gap-4 mb-4 grid-cols-4">
                        <div>
                            <a
                                class="h-40 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                <div class="flex gap-1 my-2">
                                    <h1 id="num_of_participants" class="mb-2 text-6xl font-extrabold flex items-center">-
                                    </h1>
                                    <p class="font-normal text-gray-700 flex items-center">Participants</p>
                                </div>
                            </a>
                        </div>
                        <div class="grid grid-rows-2">
                            <a
                                class="h-[72px] max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                <div class="flex gap-3 my-2">
                                    <h1 id="num_of_female" class="mb-2 text-4xl font-extrabold flex items-center">-</h1>
                                    <p class="font-normal text-gray-700 flex items-center">Women</p>
                                </div>
                            </a>
                            <a
                                class="h-[72px] max-w-sm p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                <div class="flex gap-3 my-2">
                                    <h1 id="num_of_male" class="mb-2 text-4xl font-extrabold flex items-center">-</h1>
                                    <p class="font-normal text-gray-700 flex items-center">Men</p>
                                </div>
                            </a>
                        </div>
                        <div class="grid grid-rows-2">
                            <a
                                class="h-[72px] max-w-sm p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                <div class="flex gap-3 my-2">
                                    <h1 id="num_of_pwd" class="mb-2 text-4xl font-extrabold flex items-center">-</h1>
                                    <p class="font-normal text-gray-700 flex items-center">Indigenous People</p>
                                </div>
                            </a>
                            <a
                                class="h-[72px] max-w-sm p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                <div class="flex gap-3 my-2">
                                    <h1 id="num_of_indigenous" class="mb-2 text-4xl font-extrabold flex items-center">-
                                    </h1>
                                    <p class="font-normal text-gray-700flex items-center">People with Disabilities</p>
                                </div>
                            </a>
                        </div>
                        <div class="grid grid-rows-4">
                            <a
                                class="h-1 max-w-sm p-4 mb-0.5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                <div class="flex gap-3 items-center">
                                    <h1 id="num_of_farmers" class="mb-0 text-lg font-extrabold self-center">-</h1>
                                    <p class="text-xs text-gray-700">Farmers and Seed Growers</p>
                                </div>
                            </a>
                            <a
                                class="h-1 max-w-sm p-4 mb-0.5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                <div class="flex gap-3 items-center">
                                    <h1 id="num_of_extworkers" class="mb-0 text-lg font-extrabold self-center">-</h1>
                                    <p class="text-xs text-gray-700">Ext. Workers & Intermediaries</p>
                                </div>
                            </a>
                            <a
                                class="h-1 max-w-sm p-4 mb-0.5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                <div class="flex gap-3 items-center">
                                    <h1 id="num_of_scientific" class="mb-0 text-lg font-extrabold self-center">-</h1>
                                    <p class="text-xs text-gray-700">Scientific Community</p>
                                </div>
                            </a>
                            <a
                                class="h-1 max-w-sm p-3 mb-0.5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                <div class="flex gap-3 items-center">
                                    <h1 id="num_of_other" class="mb-0 text-lg font-extrabold self-center">-</h1>
                                    <p class="text-xs text-gray-700">Other Sectors</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- Start Date and End Date --}}
                    <div date-rangepicker class="my-2 mb-2 grid grid-cols-2 gap-x-4">
                        <div>
                            <label for="start_date" class="block my-2 text-sm font-medium text-gray-900">Start
                                Date</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="text" id="start_date" name="start" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                    placeholder="MM/DD/YYYY">
                            </div>
                        </div>
                        <div>
                            <label for="end_date" class="block my-2 text-sm font-medium text-gray-900">End Date</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="text" id="end_date" name="end" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                    placeholder="MM/DD/YYYY">
                            </div>
                        </div>
                    </div>

                    {{-- Training Details --}}
                    <div class="grid gap-4 mb-4 grid-cols-3">
                        <div>
                            <label for="training_type" class="block my-2 text-sm font-medium text-gray-900">Type of
                                Training</label>
                            <input disabled type="text" name="training_type" id="training_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="training_category" class="block my-2 text-sm font-medium text-gray-900">Training
                                Category</label>
                            <input disabled type="text" name="training_category" id="training_category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="mod" class="block my-2 text-sm font-medium text-gray-900">Mode of
                                Delivery</label>
                            <input disabled type="text" name="mod" id="mod"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                    </div>

                    {{-- Location --}}
                    {{-- Display Field for Venue if Training Type = International  --}}
                    <div id="international_container" class="grid gap-4 mb-4 grid-cols-3" style="display: none;">
                        <label for="international_address"
                            class="block my-2 text-sm font-medium text-gray-900">International Address</label>
                        <input disabled type="text" name="international_address" id="international_address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    {{-- Display Field for Venue if Training Type = Local  --}}
                    <div id="local_container" style="display: none;">
                        <div>
                            <label for="venue" class="block my-2 text-sm font-medium text-gray-900">Venue</label>
                            <input disabled type="text" name="venue" id="venue"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="local_address" class="block my-2 text-sm font-medium text-gray-900">Local
                                Address</label>
                            <input disabled type="text" name="local_address" id="local_address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                    </div>

                    {{-- Partners and Sponsors --}}
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div>
                            <label for="sponsor" class="block my-2 text-sm font-medium text-gray-900">Name of
                                Implementing
                                Partner/s or Co-Organizer/s</label>
                            <input disabled type="text" name="sponsor" id="sponsor"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="source_of_fund" class="block my-2 text-sm font-medium text-gray-900">Source of
                                Fund</label>
                            <input disabled type="text" name="source_of_fund" id="source_of_fund"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                    </div>

                    {{-- GIK and Training Evaluation --}}
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div>
                            <label for="average_gik" class="block my-2 text-sm font-medium text-gray-900">Average
                                GIK</label>
                            <input disabled type="text" name="average_gik" id="average_gik"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="evaluation" class="block my-2 text-sm font-medium text-gray-900">Overall Training
                                Evaluation Rating</label>
                            <input disabled type="text" name="evaluation" id="evaluation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
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

        var regions = {
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
        var province_charts = @json($province_charts);

        var provinces = {
            series: [{
                data: province_charts.map(function(item) {
                    return {
                        x: item.province_name,
                        y: parseInt(item.province_count)
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

@section('scripts')
    <script>
        function openModal(id, title, category, type, mod, sponsor, fund, gik, evaluation, start_date, end_date,
            num_of_participants, num_of_male, num_of_female, num_of_indigenous, num_of_pwd, num_of_farmers,
            num_of_extworkers, num_of_scientific, num_of_other, international_address, training_venue, province,
            municipality, station) {

            var modal = document.getElementById('trainings-modal');
            modal.classList.add('flex');
            modal.classList.remove('hidden');
            document.querySelector('body').classList.add('overflow-hidden');
            window.addEventListener('keydown', closeModalOnEsc);

            document.getElementById('title').innerText = title;
            document.getElementById('training_category').value = category;
            document.getElementById('training_type').value = type;
            document.getElementById('mod').value = mod;
            document.getElementById('sponsor').value = sponsor;
            document.getElementById('source_of_fund').value = fund;
            // document.getElementById('average_gik').value = gik;
            document.getElementById('average_gik').value = gik === '%' ? 'N/A' : gik;
            document.getElementById('evaluation').value = evaluation;
            document.getElementById('start_date').value = start_date;
            document.getElementById('end_date').value = end_date;
            document.getElementById('num_of_participants').innerText = num_of_participants;
            document.getElementById('num_of_male').innerText = num_of_male;
            document.getElementById('num_of_female').innerText = num_of_female;
            document.getElementById('num_of_indigenous').innerText = num_of_indigenous;
            document.getElementById('num_of_pwd').innerText = num_of_pwd;
            document.getElementById('num_of_farmers').innerText = num_of_farmers;
            document.getElementById('num_of_extworkers').innerText = num_of_extworkers;
            document.getElementById('num_of_scientific').innerText = num_of_scientific;
            document.getElementById('num_of_other').innerText = num_of_other;


            var type = document.getElementById('training_type');
            var internationalDiv = document.getElementById('international_container');
            var internationalAddress = document.getElementById('international_address');
            var localDiv = document.getElementById('local_container');
            var venue = document.getElementById('venue');
            var localAddress = document.getElementById('local_address');

            if (type.value === "International") {
                internationalDiv.style.display = 'block';
                internationalAddress.value = international_address;
                localDiv.style.display = 'none';
            } else if (type.value === "Local") {
                internationalDiv.style.display = 'none';
                localDiv.style.display = 'block';
                venue.value = training_venue;

                if (venue.value === 'Within PhilRice Station') {
                    if (parseInt(station) === 1) {
                        console.log(station.value);
                        localAddress.value = "PhilRice Central Experiment Station, Science City of Muñoz, 3119 Nueva Ecija"
                    } else if (parseInt(station) === 2) {
                        localAddress.value = "PhilRice Agusan, Basilisa, RTRomualdez, 8611 Agusan del Norte";
                    } else if (parseInt(station) === 3) {
                        localAddress.value = "PhilRice Batac, Batac City, 2906 Ilocos Norte";
                    } else if (parseInt(station) === 4) {
                        localAddress.value = "PhilRice Bicol, Ligao City, 4504 Albay";
                    } else if (parseInt(station) === 5) {
                        localAddress.value = "PhilRice CMU, Maramag, Bukidnon";
                    } else if (parseInt(station) === 6) {
                        localAddress.value = "PhilRice Isabela, San Mateo, 3318 Isabela";
                    } else if (parseInt(station) === 7) {
                        localAddress.value = "PhilRice Los Baños, Los Baños, 4031 Laguna";
                    } else if (parseInt(station) === 8) {
                        localAddress.value = "PhilRice Midsayap, Midsayap, 9410 North Cotabato";
                    } else if (parseInt(station) === 9) {
                        localAddress.value = "PhilRice Negros, Cansilayan, Murcia, 6129 Negros Occidental";
                    }
                } else if (venue.value === 'Outside PhilRice Station') {
                    // localAddress.value = municipality + ', ' + province;
                    localAddress.value = capitalizeFirstLetter(municipality) + ', ' + capitalizeFirstLetter(province);
                }

            } else {
                internationalDiv.style.display = 'none';
                localDiv.style.display = 'none';
            }
        }

        function capitalizeFirstLetter(string) {
            return string.toLowerCase().replace(/^\w|\s\w/g, function(letter) {
                return letter.toUpperCase();
            });
        }

        function closeModal() {
            var modal = document.getElementById('trainings-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.querySelector('body').classList.remove('overflow-hidden');
            window.addEventListener('keydown', closeModalOnEsc);
        }

        function closeModalOnEsc(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        }

        // Close modal when clicking outside the modal content area or on the overlay
        window.onclick = function(event) {
            var modal = document.getElementById('trainings-modal');
            var overlay = document.querySelector('.bg-black');
            if (event.target == modal || event.target == overlay) {
                closeModal();
            }
        }
    </script>
@endsection

@section('datatable')
    <script type="text/javascript">
        // Isabela STATION ONLY //
        const station = 6;
        // const region = '03';
        let currentPage = 1;
        let currentPageMunicipality = 1;
        const recordsPerPage = 5; // Change this number according to your preference
        const recordsPerPageMunicipality = 5;

        $(document).ready(function() {
            loadTrainings(currentPage);
            loadMunicipalities(currentPageMunicipality);
        });

        function showTrainings(result) {

            var datas = result;
            var tableRow = ``;

            // <td class="px-6 py-4">` + data["average_gik"] + `</td>

            datas.forEach(function(data) {
                tableRow +=
                    `
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">` +
                    data["title"] +
                    `</th>
                        <td class="px-6 py-4"> ` + formatDate(data["start_date"]) + ` - ` + formatDate(data[
                        "end_date"]) + ` </td>
                        <td class="px-6 py-4">` + data["division"] + `</td>
                        <td class="px-6 py-4">` + data["num_of_participants"] + `</td>
                        <td class="px-6 py-4">` + (data["average_gik"] ? data["average_gik"] : 'N/A') + `</td>
                        <td class="px-6 py-4">` + data["evaluation"] + `</td>

                        <td class="px-6 py-4 text-center">
                            <button
                            onclick="openModal('${data['id']}', '${data['title']}', '${data['category']}', '${data['type']}', '${data['mod']}', '${data['sponsor']}', '${data['fund']}', '${data['average_gik'] || ''}%', '${data['evaluation']}', formatDate('${data['start_date']}'), formatDate('${data['end_date']}'), '${data['num_of_participants']}', '${data['num_of_male']}', '${data['num_of_female']}', '${data['num_of_indigenous']}', '${data['num_of_pwd']}', '${data['num_of_farmers']}', '${data['num_of_extworkers']}', '${data['num_of_scientific']}', '${data['num_of_other']}', '${data['international_address']}', '${data['training_venue']}', '${data['provDesc']}', '${data['citymunDesc']}', '${data['station_id']}')"
                            type="button" 
                            class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8">
                                <box-icon name='expand-alt' size="xs"></box-icon>
                            </button>
                        </td>
                    </tr>
                `;
            });

            $("#table-body").html(tableRow);
        }

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

        function showProvinces(result) {
            var data_first_column = result.slice(0, 30);
            var tableRow = ``;
            data_first_column.forEach(function(data) {
                tableRow +=
                `<tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">` +
                    data["province_count"] +
                    `</th>
                    <td class="px-6 py-4">` + data["province_name"] + `</td>
                </tr>`;
            });
            $("#province-column-1").html(tableRow);

            var data_second_column = result.slice(30, 60);
            var tableRow = ``;
            data_second_column.forEach(function(data) {
                tableRow +=
                `<tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">` +
                    data["province_count"] +
                    `</th>
                    <td class="px-6 py-4">` + data["province_name"] + `</td>
                </tr>`;
            });
            $("#province-column-2").html(tableRow);

            var data_third_column = result.slice(60, 90);
            var tableRow = ``;
            data_third_column.forEach(function(data) {
                tableRow +=
                `<tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">` +
                    data["province_count"] +
                    `</th>
                    <td class="px-6 py-4">` + data["province_name"] + `</td>
                </tr>`;
            });
            $("#province-column-3").html(tableRow);
        }

        function showMunicipalitiesCol1(result) {
            // var municipality_data = result.slice(0, 549);
            var tableRow = ``;
            result.forEach(function(data) {
                tableRow +=
                `<tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">` +
                    data["city_count"] +
                    `</th>
                    <td class="px-6 py-4">` + data["city_name"] + `</td>
                </tr>`;
            });
            $("#municipality-column-1").html(tableRow);
        }

        function showMunicipalitiesCol2(result) {
            // var municipality_data = result.slice(0, 549);
            var tableRow = ``;
            result.forEach(function(data) {
                tableRow +=
                `<tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">` +
                    data["city_count"] +
                    `</th>
                    <td class="px-6 py-4">` + data["city_name"] + `</td>
                </tr>`;
            });
            $("#municipality-column-2").html(tableRow);
        }

        function showMunicipalitiesCol3(result) {
            // var municipality_data = result.slice(0, 549);
            var tableRow = ``;
            result.forEach(function(data) {
                tableRow +=
                `<tr>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">` +
                    data["city_count"] +
                    `</th>
                    <td class="px-6 py-4">` + data["city_name"] + `</td>
                </tr>`;
            });
            $("#municipality-column-3").html(tableRow);
        }

        function formatDate(dateString) {
            if (!dateString) return "-";

            const date = new Date(dateString);
            const monthNames = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ];

            const month = monthNames[date.getMonth()];
            const day = String(date.getDate()).padStart(2, "0");
            const year = date.getFullYear();

            return `${month}-${day}-${year}`;
        }

        function loadTrainings(page) {
            $.ajax({
                url: "{{ route('filter_station') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    showTrainingViewStation: true,
                    page: page,
                    recordsPerPage: recordsPerPage,
                    station: station,
                    // region: region,
                },
                success: function(result) {
                    showTrainings(result["records"]);
                    showRegions(result["regions"]);
                    showProvinces(result["provinces"]);
                    // showMunicipalitiesCol1(result["municipalities_col1"]);
                    // showMunicipalitiesCol2(result["municipalities_col2"]);
                    // showMunicipalitiesCol3(result["municipalities_col3"]);

                    currentPage = page; // Update current page

                    var total_participants = result['only_numbers'][0].total_participants;
                    var average_gik = result['only_numbers'][0].average_gik;
                    var evaluation = result['only_numbers'][0].evaluation;

                    $("#total_participants_chart").text(total_participants || '0');
                    $("#average_gik_chart").text((average_gik || '0') + '%');
                    $("#evaluation_chart").text(evaluation || '0');

                    // Check if there are more records beyond the current page
                    if (recordsPerPage != result["records"].length) {
                        $("#nextButton").hide();
                        $("#prevButton").show();
                    } else {
                        $("#nextButton").show();
                        $("#prevButton").show();
                    }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                },
            });
        }

        function loadMunicipalities(page) {
            $.ajax({
                // url: "/encoder/trainings/filter",
                url: "{{ route('filter_station') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    showMunicipalityViewStation: true,
                    page: page,
                    recordsPerPageMunicipality: recordsPerPageMunicipality,
                    station: station,
                    // region: region,
                },
                success: function(result) {
                    showMunicipalitiesCol1(result["municipalities_col1"]);
                    showMunicipalitiesCol2(result["municipalities_col2"]);
                    showMunicipalitiesCol3(result["municipalities_col3"]);

                    currentPageMunicipality = page; // Update current page

                    if (recordsPerPageMunicipality != result["municipalities_col3"].length) {
                        $("#nextButtonMunicipality").hide();
                        // $("#prevButton").show();
                        if(currentPageMunicipality == 1) {
                            $("#prevButtonMunicipality").hide();
                        } else {
                            $("#prevButtonMunicipality").show();
                        }
                    } else {
                        $("#nextButtonMunicipality").show();
                        if(currentPageMunicipality == 1) {
                            $("#prevButtonMunicipality").hide();
                        } else {
                            $("#prevButtonMunicipality").show();
                        }
                        // $("#prevButton").show();
                    }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                },
            });
        }

        function loadFilterMunicipalities(page) {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();
            var formType = parseInt($("#form").find(":selected").val());

            $.ajax({
                // url: "/encoder/trainings/filter",
                url: "{{ route('filter_station') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    showFilterMunicipalityViewStation: true,
                    searchInput: searchInput,
                    yearSelect: yearSelect,
                    start_MonthSelect: start_MonthSelect,
                    end_MonthSelect: end_MonthSelect,
                    trainingTitle: trainingTitle,
                    provinceSelect: provinceSelect,
                    formType: formType,
                    page: page,
                    recordsPerPageMunicipality: recordsPerPageMunicipality,
                    station: station,
                    // region: region,
                },
                success: function(result) {
                    showMunicipalitiesCol1(result["municipalities_col1"]);
                    showMunicipalitiesCol2(result["municipalities_col2"]);
                    showMunicipalitiesCol3(result["municipalities_col3"]);

                    currentPageMunicipality = page; // Update current page

                    if (recordsPerPageMunicipality != result["municipalities_col3"].length) {
                        $("#nextButtonMunicipality").hide();
                        // $("#prevButton").show();
                        if(currentPageMunicipality == 1) {
                            $("#prevButtonMunicipality").hide();
                        } else {
                            $("#prevButtonMunicipality").show();
                        }
                    } else {
                        $("#nextButtonMunicipality").show();
                        if(currentPageMunicipality == 1) {
                            $("#prevButtonMunicipality").hide();
                        } else {
                            $("#prevButtonMunicipality").show();
                        }
                        // $("#prevButton").show();
                    }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                },
            });
        }

        // LOAD ALL PIE CHART //
        function loadPieChart() {
            // Sex Distribution
            var sex_charts = @json($sex_charts);
            var sex_labels = Object.keys(sex_charts);
            var sex_values = Object.values(sex_charts);

            sex.series = sex_values;
            sex.labels = sex_labels;

            var sexChart = new ApexCharts(document.querySelector("#sexChart"), sex);
            sexChart.render();

            // IP Distribution
            var indigenous_charts = @json($indigenous_charts);
            var indigenous_labels = Object.keys(indigenous_charts);
            var indigenous_values = Object.values(indigenous_charts);

            ip.series = indigenous_values;
            ip.labels = indigenous_labels;

            var indigenousChart = new ApexCharts(document.querySelector("#ipChart"), ip);
            indigenousChart.render();

            // PWD Distribution
            var ability_charts = @json($ability_charts);
            var ability_labels = Object.keys(ability_charts);
            var ability_values = Object.values(ability_charts);

            pwd.series = ability_values;
            pwd.labels = ability_labels;

            var abilityChart = new ApexCharts(document.querySelector("#pwdChart"), pwd);
            abilityChart.render();
        }
        // LOAD ALL BAR CHART // 
        function loadBarChart() {
            // SECTOR CHART //
            var sector_charts = @json($sector_charts);
            var sector_labels = Object.keys(sector_charts);
            var sector_values = Object.values(sector_charts);

            sector.series[0].data = sector_values;
            sector.xaxis.categories = sector_labels;

            var sectorChart = new ApexCharts(document.querySelector("#sectorChart"), sector);
            sectorChart.render();
        }
        // LOAD ALL TREE MAP CHART // 
        function loadTreeMapChart() {
            // REGION CHART //
            var regions_charts = @json($region_charts);

            regions.series[0].data = regions_charts.map(function(item) {
                                        return {
                                            x: item.region_name,
                                            y: parseInt(item.region_count)
                                        };
                                    });

            var regionsChart = new ApexCharts(document.querySelector("#regionsChart"), regions);
            regionsChart.render();

            // PROVINCE CHART //
            var province_charts = @json($province_charts);

            provinces.series[0].data = province_charts.map(function(item) {
                                        return {
                                            x: item.province_name,
                                            y: parseInt(item.province_count)
                                        };
                                    });

            var provincesChart = new ApexCharts(document.querySelector("#provincesChart"), provinces);
            provincesChart.render();
            
            
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
        // RENDER TREE MAP CHART //
        function renderFilteredTreeMapChart(data, chart) {
            if(chart == 'regions') {
                regions.series[0].data = data.map(function(item) {
                                        return {
                                            x: item.region_name,
                                            y: parseInt(item.region_count)
                                        };
                                    });
                
                var regionsChart = new ApexCharts(document.querySelector("#regionsChart"), regions);
                regionsChart.render();
            }
            if(chart == 'provinces') {
                provinces.series[0].data = data.map(function(item) {
                                        return {
                                            x: item.province_name,
                                            y: parseInt(item.province_count)
                                        };
                                    });
                
                var provincesChart = new ApexCharts(document.querySelector("#provincesChart"), provinces);
                provincesChart.render();
            }
            // if(chart == 'municipalities') {
            //     municipalities.series[0].data = data.map(function(item) {
            //                             return {
            //                                 x: item.city_name,
            //                                 y: parseInt(item.city_count)
            //                             };
            //                         });
                
            //     var municipalitiesChart = new ApexCharts(document.querySelector("#municipalitiesChart"), municipalities);
            //     municipalitiesChart.render();
            // }
        }

        // Function to destroy a chart if it exists
        function destroyChart(chart) {
            if (chart) {
                chart.destroy();
            }
        }

        function loadFilterTrainings(page) {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();
            var formType = parseInt($("#form").find(":selected").val());

            $.ajax({
                // url: "/encoder/trainings/filter",
                url: "{{ route('filter_station') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    filterTrainingsViewStation: true,
                    searchInput: searchInput,
                    yearSelect: yearSelect,
                    start_MonthSelect: start_MonthSelect,
                    end_MonthSelect: end_MonthSelect,
                    trainingTitle: trainingTitle,
                    provinceSelect: provinceSelect,
                    formType: formType,
                    station: station,
                    page: page,
                    recordsPerPage: recordsPerPage,
                    // region: region,
                },
                success: function(result) {
                    showTrainings(result["records"]);

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
                    destroyChart(regionsChart);
                    destroyChart(provincesChart);

                    // call function to render filtered pie chart
                    renderFilteredPieChart(Object.keys(result['sex_charts']), Object.values(result['sex_charts']), 'sex');
                    renderFilteredPieChart(Object.keys(result['indigenous_charts']), Object.values(result['indigenous_charts']), 'ip');
                    renderFilteredPieChart(Object.keys(result['ability_charts']), Object.values(result['ability_charts']), 'pwd');

                    // call function to render filtered Bar chart
                    renderFilteredBarChart(Object.keys(result['sector_charts']), Object.values(result['sector_charts']), 'sector');

                    // call function to render filtered tree map chart
                    renderFilteredTreeMapChart(result['regions'], 'regions');
                    renderFilteredTreeMapChart(result['provinces'], 'provinces');

                    if (recordsPerPage != result["records"].length) {
                        $("#nextButton").hide();
                        $("#prevButton").show();
                    } else {
                        $("#nextButton").show();
                        $("#prevButton").show();
                    }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                },
            });
        }

        function nextPage() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == "" &&
                provinceSelect == ""
            ) {
                loadTrainings(currentPage + 1);
            } else {
                loadFilterTrainings(currentPage + 1);
            }
        }

        function prevPage() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == "" &&
                provinceSelect == ""
            ) {
                loadTrainings(currentPage - 1);
            } else {
                loadFilterTrainings(currentPage - 1);
            }
        }

        function nextPageMunicipality() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();
            // var formType = parseInt($("#form").val());

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == "" &&
                provinceSelect == ""
                // formType == ""
            ) {
                loadMunicipalities(currentPageMunicipality + 1);
            } else {
                // loadFilterTrainings(currentPage + 1);
                loadFilterMunicipalities(currentPageMunicipality + 1);
            }
        }

        function prevPageMunicipality() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();
            // var formType = parseInt($("#form").val());

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == "" &&
                provinceSelect == ""
                // formType == ""
            ) {
                if (currentPageMunicipality > 1) {
                    loadMunicipalities(currentPageMunicipality - 1);
                }
            } else {
                if (currentPageMunicipality > 1) {
                    // loadFilterTrainings(currentPage - 1);
                    loadFilterMunicipalities(currentPageMunicipality - 1);
                }
            }
        }

        $("#trainingsSearch").on("keyup input", function() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == "" &&
                provinceSelect == ""
            ) {
                loadTrainings(1);
                loadMunicipalities(1);

                // Destroy existing charts
                destroyChart(sexChart);
                destroyChart(indigenousChart);
                destroyChart(abilityChart);
                destroyChart(sectorChart);
                destroyChart(regionsChart);
                destroyChart(provincesChart);

                // Render new charts
                loadPieChart();
                loadBarChart();
                loadTreeMapChart();

            } else {
                loadFilterTrainings(1);
                loadFilterMunicipalities(1);
            }
        });

        $("#yearSelect, #start_MonthSelect, #end_MonthSelect, #training_title, #provinceSelect").on("change", function() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == "" &&
                provinceSelect == ""
            ) {
                loadTrainings(1);
                loadMunicipalities(1);

                // Destroy existing charts
                destroyChart(sexChart);
                destroyChart(indigenousChart);
                destroyChart(abilityChart);
                destroyChart(sectorChart);
                destroyChart(regionsChart);
                destroyChart(provincesChart);
                // destroyChart(municipalitiesChart);

                // Render new charts
                loadPieChart();
                loadBarChart();
                loadTreeMapChart();
            } else {
                loadFilterTrainings(1);
                loadFilterMunicipalities(1);
            }
        });

        function exportRecord() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();
            var formType = parseInt($("#form").find(":selected").val());

            $.ajax({
                // url: "/encoder/export/record",
                url: "{{ route('export.record') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    exportFilteredRecords: true,
                    searchInput: searchInput,
                    yearSelect: yearSelect,
                    start_MonthSelect: start_MonthSelect,
                    end_MonthSelect: end_MonthSelect,
                    trainingTitle: trainingTitle,
                    provinceSelect: provinceSelect,
                    formType: formType,
                    station: station,
                },
                cache: false,
                xhrFields: {
                    responseType: "blob",
                },
                success: function(result) {
                    // var fileName = 'PhilRice Central Experimental Station (' . date('Y') . ') - Summary of Trainings';
                    var station_name = '';
                    if(station == 1) {
                        station_name = 'CES';
                    } else if(station == 2) {
                        station_name = 'Agusan';
                    } else if(station == 3) {
                        station_name = 'Batac';
                    } else if(station == 4) {
                        station_name = 'Bicol';
                    } else if(station == 5) {
                        station_name = 'CMU';
                    } else if(station == 6) {
                        station_name = 'Isabela';
                    } else if(station == 7) {
                        station_name = 'Los Baños';
                    } else if(station == 8) {
                        station_name = 'Midsayap';
                    } else if(station == 9) {
                        station_name = 'Negros';
                    }
                    var fileName =
                        "PhilRice " + station_name + " (" +
                        new Date().getFullYear() +
                        ") - Summary of Trainings";

                    var blob = new Blob([result], {
                        type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                    });
                    var link = document.createElement("a");
                    link.href = URL.createObjectURL(result);
                    link.href = URL.createObjectURL(blob);
                    link.download = fileName + ".xls";
                    link.click();

                    // alert("Thank you for downloading!");
                    Swal.fire({
                        title: "Download Complete",
                        html: "Thank you for downloading!",
                        imageUrl: "{{ asset('assets/thankyou.gif') }}",
                        imageWidth: '80%',
                        // imageHeight: '90%',
                        imageAlt: "Thank You",
                    });
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                },
            });
        }
    </script>
@endsection
