@extends('layouts.dashboard')

@section('title')
    {{-- <title>Encoder Overview</title> --}}
    {{-- PhilRice CES - Summary of Trainings ({{ date('Y') }}) --}}
    PhilRice CES | Edit Data
@endsection

@section('sidebar')
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-full pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
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

                {{-- If Encoder is from CES --}}
                @if (Auth::user()->station === '1')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('encoder.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 grou hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lgtransition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('encoder.ces') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">CES</span>
                        </a>
                    </li>
                @endif

                {{-- AGUSAN --}}
                @if (Auth::user()->station === '2')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">AGUSAN</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('encoder.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('encoder.agusan') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">AGUSAN</span>
                        </a>
                    </li>
                @endif

                {{-- BATAC --}}
                @if (Auth::user()->station === '3')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">BATAC</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('encoder.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('encoder.batac') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">BATAC</span>
                        </a>
                    </li>
                @endif

                {{-- BICOL --}}
                @if (Auth::user()->station === '4')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">BICOL</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('encoder.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('encoder.bicol') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">BICOL</span>
                        </a>
                    </li>
                @endif

                {{-- Central Mindanao University --}}
                @if (Auth::user()->station === '5')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">CMU</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('encoder.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('encoder.cmu') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">CMU</span>
                        </a>
                    </li>
                @endif

                {{-- ISABELA --}}
                @if (Auth::user()->station === '6')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">ISABELA</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('encoder.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('encoder.isabela') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">ISABELA</span>
                        </a>
                    </li>
                @endif

                {{-- LOS BAÑOS --}}
                @if (Auth::user()->station === '7')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">LOS BAÑOS</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('encoder.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('encoder.losbaños') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">LOS BAÑOS</span>
                        </a>
                    </li>
                @endif

                {{-- MIDSAYAP --}}
                @if (Auth::user()->station === '8')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">MIDSAYAP</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('encoder.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('encoder.midsayap') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">MIDSAYAP</span>
                        </a>
                    </li>
                @endif

                {{-- NEGROS --}}
                @if (Auth::user()->station === '9')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">NEGROS</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="py-2 space-y-2">
                            <li>
                                <a href="{{ route('encoder.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encoder.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('encoder.negros') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">NEGROS</span>
                        </a>
                    </li>
                @endif

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
                {{-- Finds equivalent station name nung id sa station model --}}
                {{ \App\Models\Station::find(Auth::user()->station)->station }}
        </div>

        {{-- Filters and Export --}}
        <div class="flex my-4">

            {{-- Year --}}
            <div class="mr-1 w-26">
                <select name="year"
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="yearSelect">
                    {{-- <option selected>Year</option> --}}
                    <option value="" disabled>Year</option>
                    <option value="">All Year</option>
                    @for ($year = date('Y'); $year >= 1990; $year--)
                        <option value="{{ $year }}" @if ($year == date('Y'))  @endif>
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

            {{-- Search --}}
            <div class="mx-1">
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="trainingsSearch"
                        class="h-12 block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search">
                </div>
            </div>
        </div>

        @include('_message')

        {{-- Table --}}
        <div id="custom_table" class="my-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table id="table_data" data-page-length='5'
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                            <span>Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    {{-- @foreach ($records as $key => $record)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{ ($records->currentPage() - 1) * $records->perPage() + $loop->iteration }}
                    1
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">
                    {{ $record->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $record->division }}
                </td>
                <td class="px-6 py-4">
                    {{ $record->start_date }} - {{ $record->end_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $record->venue }}
                </td>
                <td class="px-6 py-4">
                    @if (!empty($record->province && $record->municipality))
                      {{ $record->province }}, {{ $record->municipality }}
                    @else
                      {{ $record->state }}, {{ $record->country }}
                    @endif
                </td>
                <td style="text-align: left;" >
                    {{ $record->num_of_participants }}
                </td>
                <td style="text-align: left;" >
                    {{ \Carbon\Carbon::parse($record->created_at)->format('Y-m-d') }}
                </td>
                <td class="px-6 py-4 text-left">
                    <a href="#" target="_blank">
                        <button type="button" class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <box-icon name='expand-alt' size="xs"></box-icon>
                            <span class="sr-only">Edit</span>
                        </button>
                    </a>
                    <a href="{{ route('trainingsform.edit', $record->id) }}">
                      <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                    </a>
                    <form action="{{ route('trainingsform.delete', $record->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure to delete?')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </form>
                </td>
            </tr>
          @endforeach --}}
                </tbody>
            </table>
        </div>

        {{-- Previous and Next Buttons for Pagination --}}
        <div class="flex justify-end mb-10">
            <div>
                <button id="prevButton" onclick="prevPage()"
                    class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    <box-icon name='chevrons-left' type='solid' color="#ffffff" class="mr-2"></box-icon>
                    Previous
                </button>
            </div>
            <div class="ml-1">
                <button id="nextButton" onclick="nextPage()"
                    class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Next
                    <box-icon name='chevrons-right' color="#ffffff" class="ml-2"></box-icon>
                </button>
            </div>
        </div>

        {{-- <div class="pagination-container">
      <ul class="pagination flex list-none justify-center">
        {!! $records->links() !!}
      </ul>
  </div> --}}

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
                                        <h1 id="num_of_participants"
                                            class="mb-2 text-6xl font-extrabold flex items-center">-
                                        </h1>
                                        <p class="font-normal text-gray-700 flex items-center">Participants</p>
                                    </div>
                                </a>
                            </div>
                            <div class="grid grid-rows-2">
                                <a
                                    class="h-[72px] max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center">
                                    <div class="flex gap-3 my-2">
                                        <h1 id="num_of_female" class="mb-2 text-4xl font-extrabold flex items-center">-
                                        </h1>
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
                                        <h1 id="num_of_indigenous" class="mb-2 text-4xl font-extrabold flex items-center">
                                            -
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
                                <label for="end_date" class="block my-2 text-sm font-medium text-gray-900">End
                                    Date</label>
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
                                <label for="training_category"
                                    class="block my-2 text-sm font-medium text-gray-900">Training
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
                                <label for="evaluation" class="block my-2 text-sm font-medium text-gray-900">Overall
                                    Training
                                    Evaluation Rating</label>
                                <input disabled type="text" name="evaluation" id="evaluation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </main>
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
    <script>
        // 1 is for CES
        // let station = '1';
        const station =
            @if (Auth::check())
                '{{ Auth::user()->station }}'
            @else
                ''
            @endif ;

        let currentPage = 1;
        const recordsPerPage = 5; // Change this number according to your preference

        $(document).ready(function() {
            loadTrainings(currentPage);
        });

        function showTrainings(result) {
            // const tableBody = $('#table-body');

            var datas = result;
            var tableRow = ``;

            //  <td class="px-6 py-4">` + (data["international_address"] || (data["citymunDesc"] || data["municipality"]) + `, `) + (data["provDesc"] || data["province"] || '') + `</td>
            // <td class="px-6 py-4">` + formatDate(data["created_at"]) + `</td>

            datas.forEach(function(data) {
                // console.log(data["id"]);
                tableRow +=
                    `
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">` +
                    data["title"] + `</th>
                        <td class="px-6 py-4">` + formatDate(data["start_date"]) + ` - ` + formatDate(data[
                        "end_date"]) + `</td>
                        <td class="px-6 py-4">` + data["division"] + `</td>
                        <td class="px-6 py-4">` + data["num_of_participants"] + `</td>                       
                        <td class="px-6 py-4">` + (data["average_gik"] ? data["average_gik"] : 'N/A') + `</td>            
                        <td class="px-6 py-4">` + data["evaluation"] + `</td>               
                        
                        
                        <td class="px-6 py-4 text-center">
                             <div class="flex items-center justify-center">
                            <button
                            onclick="openModal('${data['id']}', '${data['title']}', '${data['category']}', '${data['type']}', '${data['mod']}', '${data['sponsor']}', '${data['fund']}', '${data['average_gik'] || ''}%', '${data['evaluation']}', formatDate('${data['start_date']}'), formatDate('${data['end_date']}'), '${data['num_of_participants']}', '${data['num_of_male']}', '${data['num_of_female']}', '${data['num_of_indigenous']}', '${data['num_of_pwd']}', '${data['num_of_farmers']}', '${data['num_of_extworkers']}', '${data['num_of_scientific']}', '${data['num_of_other']}', '${data['international_address']}', '${data['training_venue']}', '${data['provDesc']}', '${data['citymunDesc']}', '${data['station_id']}')"
                            type="button" 
                            class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px] mx-1">
                                <box-icon name='expand-alt' size="xs"></box-icon>
                            </button>`;


                tableRow += `
                            <a href="{{ route('trainingsform.edit', ':id') }}" target="_blank" >
                                <button type="button" class="text-white bg-blue-300 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px] mx-1">
                                    <box-icon type='solid' name='edit-alt' size="xs"></box-icon>
                                </button>
                            <a>
                            `.replace(':id', data["id"]);
                tableRow +=
                    `
                            <button onclick="deleteRecord(` + data["id"] + `)" type="button"
                                class="text-white bg-red-300 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px] mx-1">
                                <box-icon name='trash' type='solid' size="xs"></box-icon>
                            </button>
                        </div>
                        </td>
                    </tr>
                    `;
            });

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
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    showTraining: true,
                    page: page,
                    recordsPerPage: recordsPerPage,
                    station: station,
                },
                success: function(result) {
                    showTrainings(result['records']);
                    currentPage = page; // Update current page

                    // Check if there are more records beyond the current page
                    if (recordsPerPage != result['records'].length) {
                        $('#nextButton').hide();
                        $('#prevButton').show();
                    } else {
                        $('#nextButton').show();
                        $('#prevButton').show();
                    }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                }
            })
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
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    filterTrainings: true,
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
                    showTrainings(result['records']);
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
                }
            })
        }

        $('#trainingsSearch').on('keyup input', function() {
            var searchInput = $('#trainingsSearch').val();
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
                loadFilterTrainings(1);
            }
        });

        $('#yearSelect').on('change', function() {
            var searchInput = $('#trainingsSearch').val();
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
                loadFilterTrainings(1);
            }
        })

        $('#start_MonthSelect').on('change', function() {
            var searchInput = $('#trainingsSearch').val();
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
                loadFilterTrainings(1);
            }
        })

        $('#end_MonthSelect').on('change', function() {
            var searchInput = $('#trainingsSearch').val();
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
                loadFilterTrainings(1);
            }
        })

        $("#training_title").on("change", function() {
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

        function showRecord(id) {
            window.location.href = "{{ route('trainingsform.edit', ':id') }}".replace(':id', id);
        }

        function deleteRecord(id) {
            Swal.fire({
                title: 'Are you sure you want to delete this data?',
                text: "This action can't be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Use AJAX to send a DELETE request to the appropriate route
                    $.ajax({
                        url: '{{ route('trainingsform.delete', ['id' => ':id']) }}'.replace(':id', id),
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'deleteRecord': true
                        },
                        success: function(response) {
                            if (response.message === 'Data deleted successfully') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'The data has been deleted successfully.',
                                    showConfirmButton: false,
                                });
                                $(`[data-id="${id}"]`).remove(); // Remove the deleted training row
                                loadTrainings(currentPage); // Reload current page's trainings
                            } else {
                                console.error('Error deleting training:', response
                                    .error); // Handle potential errors
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'An error occurred while deleting the data.'
                                });
                            }
                        },
                        error: function(error) {
                            console.error('Error deleting data:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'There was an error during deletion.'
                            });
                        }
                    });
                }
            });
        }

        function nextPage() {
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

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == ""
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
    </script>
    {{-- <script type="text/javascript" src="{{ asset('assets/datatable_edit.js') }}"></script> --}}
@endsection
