@extends('layouts.dashboard')

@section('title')
    PhilRice CES | View Data
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
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
                        <span class="ml-3">Overview</span>
                    </a>
                </li>

                {{-- CES --}}
                <li>
                    <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                        aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
                        <box-icon name='chevron-down'></box-icon>
                    </a>
                    <ul id="dropdown-sales" class="py-2 space-y-2">
                        <li>
                            <a href=""
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='line-chart'></box-icon>
                                <span class="ml-3">View Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.ces_add') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='plus'></box-icon>
                                <span class="ml-3">Add Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.ces_edit') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='edit-alt' type='solid'></box-icon>
                                <span class="ml-3">Edit Data</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- AGUSAN --}}
                <li>
                    <a href="{{ route('encoder.agusan') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">AGUSAN</span>
                    </a>
                </li>

                {{-- BATAC --}}
                <li>
                    <a href="{{ route('encoder.batac') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BATAC</span>
                    </a>
                </li>

                {{-- BICOL --}}
                <li>
                    <a href="{{ route('encoder.bicol') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BICOL</span>
                    </a>
                </li>

                {{-- ISABELA --}}
                <li>
                    <a href="{{ route('encoder.isabela') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">ISABELA</span>
                    </a>
                </li>

                {{-- LOS BAÑOS --}}
                <li>
                    <a href="{{ route('encoder.losbaños') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">LOS BAÑOS</span>
                    </a>
                </li>

                {{-- MIDSAYAP --}}
                <li>
                    <a href="{{ route('encoder.midsayap') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">MIDSAYAP</span>
                    </a>
                </li>

                {{-- NEGROS --}}
                <li>
                    <a href="{{ route('encoder.negros') }}"
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
                    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PhilRice</span>
                Central Experimental Station</h1>
        </div>

        {{-- Filters and Export --}}
        <div class="flex my-4">

            {{-- Year --}}
            <div class="mr-2 w-24">
                <select name="year"
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="yearSelect">
                    {{-- <option selected>Year</option> --}}
                    <option value="" disabled>Year</option>
                    <option value="">All Year</option>
                    @for ($year = date('Y'); $year >= 1990; $year--)
                        <option value="{{ $year }}" @if ($year == date('Y')) selected @endif>
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
            <div class="mx-1 w-36">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="form">
                    <option disabled>Form Type</option>
                    <option value="" selected>Summary of Trainings Conducted</option>
                    <option value="0">Knowledge Sharing and Learning (KSL) Monitoring</option>
                    <option value="0">Technical Dispatch Monitoring</option>
                    <option value="0">Technology Demonstration Monitoring</option>
                </select>
            </div>

            {{-- Training Titles --}}
            <div class="mx-1 w-56">
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

            {{-- Export Button --}}
            {{-- <div class="ml-auto">
                <button type="button" onclick="exportRecord()"
                    class="h-12 w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-50 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex justify-center items-center dark:focus:ring-green-50 me-2 mb-2">
                    <i class="fa-solid fa-file-excel"></i>
                    <span class="pl-2">Export</span>
                </button>
            </div> --}}

        </div>

        {{-- Charts --}}
        <div class="grid grid-cols-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">

            <div class="bg-slate-100 shadow-lg border-2 mx-auto rounded-lg dark:border-gray-600 h-32 md:h-64">
                <div id="chart1"></div>
            </div>

            <div class="bg-slate-100 shadow-lg border-2 mx-auto rounded-lg dark:border-gray-600 h-32 md:h-64">
                <div id="chart2"></div>
            </div>

            <div class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600 h-32 md:h-64">
                <div id="chart3"></div>
            </div>

            <div class="bg-slate-100 shadow-lg border-2 rounded-lg dark:border-gray-600 h-32 md:h-64">
                <div id="chart4"></div>
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
                            Title of Training
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Type of Training
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Date
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Venue
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
            <div>
                {{-- page button for no filter --}}
                <button id="prevButton" onclick="prevPage()"
                    class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    <box-icon name='chevrons-left' type='solid' color="#ffffff" class="mr-2"></box-icon>
                    Previous
                </button>
            </div>
            <div class="ml-1">
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
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 bottom-0 left-0 z-50 justify-center items-center">
        <div class="fixed inset-0 bg-black opacity-50 h-full"></div>
        <div class="relative p-4 w-full max-w-4xl">
            {{-- Modal Content --}}
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                {{-- Modal Header --}}
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 id="title" class="text-lg font-semibold text-gray-900"></h3>
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
                                class="h-40 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                <h1 id="num_of_participants" class="mb-2 text-6xl font-extrabold">-</h1>
                                <p class="font-normal text-gray-700">Total Number of Participants</p>
                            </a>
                        </div>
                        <div>
                            <a
                                class="h-40 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                <div class="flex gap-3 my-2">
                                    <h1 id="num_of_male" class="mb-2 text-4xl font-extrabold">-</h1>
                                    <p class="font-normal text-gray-700">Total Number of Male</p>
                                </div>
                                <div class="flex gap-3 my-2">
                                    <h1 id="num_of_female" class="mb-2 text-4xl font-extrabold">-</h1>
                                    <p class="font-normal text-gray-700">Total Number of Female</p>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a
                                class="h-40 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                <div class="flex gap-3 my-2">
                                    <h1 id="num_of_indigenous" class="mb-2 text-4xl font-extrabold">-</h1>
                                    <p class="font-normal text-gray-700">Total Number of PWD</p>
                                </div>
                                <div class="flex gap-3 my-2">
                                    <h1 id="num_of_pwd" class="mb-2 text-4xl font-extrabold">-</h1>
                                    <p class="font-normal text-gray-700">Total Number of IP</p>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a
                                class="h-40 block max-w-sm p-2 pl-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                <div class="flex gap-3 items-center">
                                    <h1 id="num_of_farmers" class="mb-2 text-lg font-extrabold">-</h1>
                                    <p class="text-xs text-gray-700">Farmers and Seed Growers</p>
                                </div>
                                <div class="flex gap-3 items-center">
                                    <h1 id="num_of_extworkers" class="mb-2 text-lg font-extrabold">-</h1>
                                    <p class="text-xs text-gray-700">Ext. Workers & Intermediaries</p>
                                </div>
                                <div class="flex gap-3 items-center">
                                    <h1 id="num_of_scientific" class="mb-2 text-lg font-extrabold">-</h1>
                                    <p class="text-xs text-gray-700">Scientific Community</p>
                                </div>
                                <div class="flex gap-3 items-center">
                                    <h1 id="num_of_other" class="mb-2 text-lg font-extrabold">-</h1>
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
                                <input type="text" id="start_date" name="start" value="{{ old('start') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                    placeholder="MM/DD/YYYY" onkeypress="return isNumericDateInput(event)" required>
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
                                <input type="text" id="end_date" name="end" value="{{ old('end') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                    placeholder="MM/DD/YYYY" onkeypress="return isNumericDateInput(event)" required>
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
                toolbar: {
                    show: true,
                }
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
                    show: true,
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
                    show: true,
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
            document.getElementById('average_gik').value = gik;
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
                        localAddress.value = "PhilRice Negros, Midsayap, 9410 North Cotabato";
                    }
                } else if (venue.value === 'Outside PhilRice Station') {
                    localAddress.value = municipality + ', ' + province;
                }

            } else {
                internationalDiv.style.display = 'none';
                localDiv.style.display = 'none';
            }
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
        // CES
        let station = 'CES';
    </script>
    <script type="text/javascript">
        let currentPage = 1;
        const recordsPerPage = 5; // Change this number according to your preference

        $(document).ready(function() {
            loadTrainings(currentPage);
        });

        function showTrainings(result) {
            // const tableBody = $('#table-body');

            var datas = result;
            var tableRow = ``;

            datas.forEach(function(data) {
                tableRow +=
                    `
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">` +
                    data["title"] +
                    `</th>
                        <td class="px-6 py-4">` +
                    data["division"] +
                    `</td>
                        <td class="px-6 py-4">` +
                    formatDate(data["start_date"]) +
                    ` - ` +
                    formatDate(data["end_date"]) +
                    `</td>
                        <td class="px-6 py-4">` +
                    data["type"] +
                    `</td>
                        <td class="px-6 py-4 text-center">
                            <button
                            onclick="openModal('${data['id']}', '${data['title']}', '${data['category']}', '${data['type']}', '${data['mod']}', '${data['sponsor']}', '${data['fund']}', '${data['average_gik']}', '${data['evaluation']}', '${data['start_date']}', '${data['end_date']}', '${data['num_of_participants']}', '${data['num_of_male']}', '${data['num_of_female']}', '${data['num_of_indigenous']}', '${data['num_of_pwd']}', '${data['num_of_farmers']}', '${data['num_of_extworkers']}', '${data['num_of_scientific']}', '${data['num_of_other']}', '${data['international_address']}', '${data['training_venue']}', '${data['province']}', '${data['municipality']}', '${data['station']}')"
                            type="button" 
                            class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8">
                                <box-icon name='expand-alt' size="xs"></box-icon>
                            </button>
                        </td>
                    </tr>
                `;
            });

            // Efficient template literal construction using map()
            // const trainingRows = result.map(data => `
        // <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        //     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">${data.title}</th>
        //     <td class="px-6 py-4">${data.division || '-'}</td>
        //     <td class="px-6 py-4">${formatDate(data.start_date)} - ${formatDate(data.end_date)}</td>
        //     <td class="px-6 py-4">${data.venue || '-'}</td>
        //     <td class="px-6 py-4 text-center">
        //         <button
        //         data-modal-target="trainings-modal"
        //         data-modal-toggle="trainings-modal"
        //         type="button"
        //         class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8">
        //             <box-icon name='expand-alt' size="xs"></box-icon>
        //         </button>
        //     </td>
        // </tr>
        // `).join('');

            // Single DOM manipulation for better performance
            // tableBody.html(trainingRows);
            $("#table-body").html(tableRow);
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
                // url: "/encoder/trainings/filter",
                url: "{{ route('filter_data') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    showTrainingView: true,
                    page: page,
                    recordsPerPage: recordsPerPage,
                    station: station,
                },
                success: function(result) {
                    showTrainings(result["records"]);
                    currentPage = page; // Update current page

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

        function loadFilterTrainings(page) {
            var searchInput = $("#trainingsSearch").val();
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
                    filterTrainingsView: true,
                    searchInput: searchInput,
                    yearSelect: yearSelect,
                    start_MonthSelect: start_MonthSelect,
                    end_MonthSelect: end_MonthSelect,
                    trainingTitle: trainingTitle,
                    formType: formType,
                    station: station,
                    page: page,
                    recordsPerPage: recordsPerPage,
                },
                success: function(result) {
                    showTrainings(result["records"]);
                    currentPage = page; // Update current page

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

        $("#trainingsSearch").on("keyup input", function() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
            ) {
                loadTrainings(1);
            } else {
                // $.ajax({
                //     // url: "/encoder/trainings/filter",
                //     url: "{{ route('filter_data') }}",
                //     method: "POST",
                //     headers: {
                //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                //     },
                //     data: {
                //         filterTrainingsView: true,
                //         searchInput: searchInput,
                //         yearSelect: yearSelect,
                //         start_MonthSelect: start_MonthSelect,
                //         end_MonthSelect: end_MonthSelect,
                //         station: station,
                //         page: page,
                //         recordsPerPage: recordsPerPage,
                //     },
                //     success: function (result) {
                //         showTrainings(result["records"]);
                //         $("#nextButton").hide();
                //         $("#prevButton").hide();
                //     },
                //     error: function (error) {
                //         alert("Oops something went wrong!");
                //     },
                // });
                loadFilterTrainings(1);
            }
        });

        $("#yearSelect").on("change", function() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
            ) {
                loadTrainings(1);
            } else {
                // $.ajax({
                //     url: "/encoder/trainings/filter",
                //     method: "POST",
                //     headers: {
                //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                //     },
                //     data: {
                //         filterTrainingsView: true,
                //         searchInput: searchInput,
                //         yearSelect: yearSelect,
                //         start_MonthSelect: start_MonthSelect,
                //         end_MonthSelect: end_MonthSelect,
                //         station: station,
                //     },
                //     success: function (result) {
                //         showTrainings(result["records"]);
                //         $("#nextButton").hide();
                //         $("#prevButton").hide();
                //     },
                //     error: function (error) {
                //         alert("Oops something went wrong!");
                //     },
                // });
                loadFilterTrainings(1);
            }
        });

        $("#start_MonthSelect").on("change", function() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
            ) {
                loadTrainings(1);
            } else {
                // $.ajax({
                //     url: "/encoder/trainings/filter",
                //     method: "POST",
                //     headers: {
                //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                //     },
                //     data: {
                //         filterTrainingsView: true,
                //         searchInput: searchInput,
                //         yearSelect: yearSelect,
                //         start_MonthSelect: start_MonthSelect,
                //         end_MonthSelect: end_MonthSelect,
                //         station: station,
                //     },
                //     success: function (result) {
                //         showTrainings(result["records"]);
                //         $("#nextButton").hide();
                //         $("#prevButton").hide();
                //     },
                //     error: function (error) {
                //         alert("Oops something went wrong!");
                //     },
                // });
                loadFilterTrainings(1);
            }
        });

        $("#end_MonthSelect").on("change", function() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
            ) {
                loadTrainings(1);
            } else {
                // $.ajax({
                //     url: "/encoder/trainings/filter",
                //     method: "POST",
                //     headers: {
                //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                //     },
                //     data: {
                //         filterTrainingsView: true,
                //         searchInput: searchInput,
                //         yearSelect: yearSelect,
                //         start_MonthSelect: start_MonthSelect,
                //         end_MonthSelect: end_MonthSelect,
                //         station: station,
                //     },
                //     success: function (result) {
                //         showTrainings(result["records"]);
                //         $("#nextButton").hide();
                //         $("#prevButton").hide();
                //     },
                //     error: function (error) {
                //         alert("Oops something went wrong!");
                //     },
                // });
                loadFilterTrainings(1);
            }
        });

        $("#training_title").on("change", function() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();
            // console.log(trainingTitle);
            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
            ) {
                loadTrainings(1);
            } else {
                loadFilterTrainings(1);
            }
        });

        $("#form").on("change", function() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();
            var formType = parseInt($("#form").val());
            // console.log(formType);
            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == "" &&
                formType == ""
            ) {
                loadTrainings(1);
            } else {
                loadFilterTrainings(1);
            }
        });

        function nextPage() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();
            // var formType = parseInt($("#form").val());

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
                // formType == ""
            ) {
                loadTrainings(currentPage + 1);
            } else {
                loadFilterTrainings(currentPage + 1);
            }
        }

        function prevPage() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();
            // var formType = parseInt($("#form").val());

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
                // formType == ""
            ) {
                if (currentPage > 1) {
                    loadTrainings(currentPage - 1);
                }
            } else {
                if (currentPage > 1) {
                    loadFilterTrainings(currentPage - 1);
                }
            }
        }

        function exportRecord() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();
            var trainingTitle = $("#training_title").val();
            var formType = parseInt($("#form").val());

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
                    formType: formType,
                    station: station,
                },
                cache: false,
                xhrFields: {
                    responseType: "blob",
                },
                success: function(result) {
                    // var fileName = 'PhilRice Central Experimental Station (' . date('Y') . ') - Summary of Trainings';
                    var fileName =
                        "PhilRice " + station + " (" +
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

                    alert("Thank you for downloading!");
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                },
            });
        }
    </script>
@endsection
