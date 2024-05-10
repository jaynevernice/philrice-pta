@extends('layouts.dashboard')

@section('title')
    Overview
@endsection

@section('sidebar')
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-full pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">

                {{-- Overview --}}
                <li>
                    <a href="{{ route('auth.overview') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white bg-green-100 hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
                        <span class="ml-3">Overview</span>
                    </a>
                </li>

                {{-- If Encoder is from CES --}}
                @if (Auth::user()->station === '1')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('auth.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.ces') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">CES</span>
                        </a>
                    </li>
                @endif

                {{-- AGUSAN --}}
                @if (Auth::user()->station === '2')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">AGUSAN</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('auth.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.agusan') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">AGUSAN</span>
                        </a>
                    </li>
                @endif

                {{-- BATAC --}}
                @if (Auth::user()->station === '3')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">BATAC</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('auth.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.batac') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">BATAC</span>
                        </a>
                    </li>
                @endif

                {{-- BICOL --}}
                @if (Auth::user()->station === '4')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">BICOL</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('auth.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.bicol') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">BICOL</span>
                        </a>
                    </li>
                @endif

                {{-- Central Mindanao University --}}
                @if (Auth::user()->station === '5')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">CMU</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('auth.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.cmu') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">CMU</span>
                        </a>
                    </li>
                @endif

                {{-- ISABELA --}}
                @if (Auth::user()->station === '6')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">ISABELA</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('auth.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lgtransition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.isabela') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">ISABELA</span>
                        </a>
                    </li>
                @endif

                {{-- LOS BAÑOS --}}
                @if (Auth::user()->station === '7')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">LOS BAÑOS</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('auth.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.losbaños') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">LOS BAÑOS</span>
                        </a>
                    </li>
                @endif

                {{-- MIDSAYAP --}}
                @if (Auth::user()->station === '8')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">MIDSAYAP</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('auth.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.midsayap') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">MIDSAYAP</span>
                        </a>
                    </li>
                @endif

                {{-- NEGROS --}}
                @if (Auth::user()->station === '9')
                    <li>
                        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">NEGROS</span>
                            <box-icon name='chevron-down'></box-icon>
                        </a>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('auth.view') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='line-chart'></box-icon>
                                    <span class="ml-3">View Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.add') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='plus'></box-icon>
                                    <span class="ml-3">Add Data</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.edit') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                    <box-icon name='edit-alt' type='solid'></box-icon>
                                    <span class="ml-3">Edit Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.negros') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon name='building' type='solid'></box-icon>
                            <span class="ml-3">NEGROS</span>
                        </a>
                    </li>
                @endif

                {{-- Show Manage Encoders if User is Admin --}}
                @if (Auth::user()->user_type === 'admin')
                    <hr>
                    <li>
                        <a href="{{ route('admin.manage_encoders') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon type='solid' name='user-account'></box-icon>
                            <span class="ml-3">Manage Encoders</span>
                        </a>
                    </li>

                    {{-- For Super Admin Only --}}
                @elseif (Auth::user()->user_type === 'super_admin')
                    {{-- Manage Encoders --}}
                    <hr>
                    <li>
                        <a href="{{ route('super_admin.manage_encoders') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg hover:bg-green-100group">
                            <box-icon type='solid' name='user-account'></box-icon>
                            <span class="ml-3">Manage Encoders</span>
                        </a>
                    </li>
                    {{-- Manage Admins --}}
                    <li>
                        <a href="{{ route('super_admin.manage_admins') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg group">
                            <box-icon type='solid' name='user-account'></box-icon>
                            <span class="ml-3">Manage Admins</span>
                        </a>
                    </li>
                    <hr>
                    {{-- Web Analytics --}}
                    <li>
                        <a href="{{ route('super_admin.web_analytics') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg group">
                            <box-icon name='desktop'></box-icon>
                            <span class="ml-3">Web Analytics</span>
                        </a>
                    </li>
                @endif

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
                    show: true,
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
                    show: true,
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
        const recordsPerPage = 15; // Change this number according to your preference

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
                    showProvinces(result["provinces"]);
                    showMunicipalitiesCol1(result["municipalities_col1"]);
                    showMunicipalitiesCol2(result["municipalities_col2"]);
                    showMunicipalitiesCol3(result["municipalities_col3"]);

                    currentPage = page; // Update current page

                    var total_participants = result['only_numbers'][0].total_participants != null ? result[
                        'only_numbers'][0].total_participants : '0';
                    var average_gik = result['only_numbers'][0].average_gik != null ? result['only_numbers'][0]
                        .average_gik : '0';
                    var evaluation = result['only_numbers'][0].evaluation != null ? result['only_numbers'][0]
                        .evaluation : '0';

                    $("#total_participants_chart").text(total_participants);
                    $("#average_gik_chart").text(average_gik + '%');
                    $("#evaluation_chart").text(evaluation);

                    // Check if there are more records beyond the current page
                    if (recordsPerPage != result["municipalities_col3"].length) {
                        $("#nextButton").hide();
                        // $("#prevButton").show();
                        if (currentPage == 1) {
                            $("#prevButton").hide();
                        } else {
                            $("#prevButton").show();
                        }
                    } else {
                        $("#nextButton").show();
                        if (currentPage == 1) {
                            $("#prevButton").hide();
                        } else {
                            $("#prevButton").show();
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

            if (chart == 'sex') {
                // update sex chart  
                sex.series = values;
                sex.labels = labels;
                // render sex chart
                var sexChart = new ApexCharts(document.querySelector("#sexChart"), sex);
                sexChart.render();
            }
            if (chart == 'ip') {
                // update indigenous chart  
                ip.series = values;
                ip.labels = labels;
                // render indigenous chart
                var indigenousChart = new ApexCharts(document.querySelector("#ipChart"), ip);
                indigenousChart.render();
            }
            if (chart == 'pwd') {
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

            if (chart == 'sector') {
                sector.series[0].data = values;
                sector.xaxis.categories = labels;

                var sectorChart = new ApexCharts(document.querySelector("#sectorChart"), sector);
                sectorChart.render();
            }
        }
        // RENDER TREE MAP CHART //
        function renderFilteredTreeMapChart(data, chart) {
            if (chart == 'regions') {
                regions.series[0].data = data.map(function(item) {
                    return {
                        x: item.region_name,
                        y: parseInt(item.region_count)
                    };
                });

                var regionsChart = new ApexCharts(document.querySelector("#regionsChart"), regions);
                regionsChart.render();
            }
            if (chart == 'provinces') {
                provinces.series[0].data = data.map(function(item) {
                    return {
                        x: item.province_name,
                        y: parseInt(item.province_count)
                    };
                });

                var provincesChart = new ApexCharts(document.querySelector("#provincesChart"), provinces);
                provincesChart.render();
            }
            if (chart == 'municipalities') {
                municipalities.series[0].data = data.map(function(item) {
                    return {
                        x: item.city_name,
                        y: parseInt(item.city_count)
                    };
                });

                var municipalitiesChart = new ApexCharts(document.querySelector("#municipalitiesChart"), municipalities);
                municipalitiesChart.render();
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
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();
            var formType = parseInt($("#form").find(":selected").val());

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
                    provinceSelect: provinceSelect,
                    formType: formType,
                    page: page,
                    recordsPerPage: recordsPerPage,
                },
                success: function(result) {
                    currentPage = page; // Update current page
                    var total_participants = result['only_numbers'][0].total_participants != null ? result[
                        'only_numbers'][0].total_participants : '0';
                    var average_gik = result['only_numbers'][0].average_gik != null ? result['only_numbers'][0]
                        .average_gik : '0';
                    var evaluation = result['only_numbers'][0].evaluation != null ? result['only_numbers'][0]
                        .evaluation : '0';

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
                    // destroyChart(municipalitiesChart);

                    // call function to render filtered pie chart
                    renderFilteredPieChart(Object.keys(result['sex_charts']), Object.values(result[
                        'sex_charts']), 'sex');
                    renderFilteredPieChart(Object.keys(result['indigenous_charts']), Object.values(result[
                        'indigenous_charts']), 'ip');
                    renderFilteredPieChart(Object.keys(result['ability_charts']), Object.values(result[
                        'ability_charts']), 'pwd');

                    // call function to render filtered Bar chart
                    renderFilteredBarChart(Object.keys(result['sector_charts']), Object.values(result[
                        'sector_charts']), 'sector');

                    // call function to render filtered tree map chart
                    renderFilteredTreeMapChart(result['regions'], 'regions');
                    renderFilteredTreeMapChart(result['provinces'], 'provinces');
                    // renderFilteredTreeMapChart(result['municipalities'], 'municipalities');

                    showMunicipalitiesCol1(result["municipalities_col1"]);
                    showMunicipalitiesCol2(result["municipalities_col2"]);
                    showMunicipalitiesCol3(result["municipalities_col3"]);

                    var recordsPerPage = 15;
                    if (provinceSelect) {
                        var recordsPerPage = 5;
                    }
                    if (recordsPerPage != result["municipalities_col3"].length) {
                        $("#nextButton").hide();
                        // $("#prevButton").show();
                        if (currentPage == 1) {
                            $("#prevButton").hide();
                        } else {
                            $("#prevButton").show();
                        }
                    } else {
                        $("#nextButton").show();
                        if (currentPage == 1) {
                            $("#prevButton").hide();
                        } else {
                            $("#prevButton").show();
                        }
                        // $("#prevButton").show();
                    }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                },
            });
        }

        $("#yearSelect, #start_MonthSelect, #end_MonthSelect, #training_title, #provinceSelect").on("change", function() {
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();

            if (
                // searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == "" &&
                trainingTitle == "" &&
                provinceSelect == ""
            ) {
                loadTrainings(1);

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
            }
        });

        function nextPage() {
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();

            if (
                // searchInput == "" &&
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
            var yearSelect = $("#yearSelect").find(":selected").val();
            var start_MonthSelect = $("#start_MonthSelect").find(":selected").val();
            var end_MonthSelect = $("#end_MonthSelect").find(":selected").val();
            var trainingTitle = $("#training_title").find(":selected").val();
            var provinceSelect = $("#provinceSelect").find(":selected").val();

            if (
                // searchInput == "" &&
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

        // $("#yearSelect").on("change", function() {
        //     // var searchInput = $("#trainingsSearch").val();
        //     var yearSelect = $("#yearSelect").val();
        //     var start_MonthSelect = $("#start_MonthSelect").val();
        //     var end_MonthSelect = $("#end_MonthSelect").val();
        //     var trainingTitle = $("#training_title").val();

        //     if (
        //         // searchInput == "" &&
        //         start_MonthSelect == "" &&
        //         end_MonthSelect == "" &&
        //         yearSelect == "" &&
        //         trainingTitle == ""
        //     ) {
        //         loadTrainings(1);

        //         // Destroy existing charts
        //         destroyChart(sexChart);
        //         destroyChart(indigenousChart);
        //         destroyChart(abilityChart);
        //         destroyChart(sectorChart);

        //         // Render new charts
        //         loadSexPieChart();
        //         loadIndigenousPieChart();
        //         loadAbilityPieChart();
        //         loadBarChart();

        //     } else {
        //         loadFilterTrainings(1);
        //     }
        // });

        //  $("#start_MonthSelect").on("change", function() {
        //     // var searchInput = $("#trainingsSearch").val();
        //     var yearSelect = $("#yearSelect").val();
        //     var start_MonthSelect = $("#start_MonthSelect").val();
        //     var end_MonthSelect = $("#end_MonthSelect").val();
        //     var trainingTitle = $("#training_title").val();

        //     if (
        //         // searchInput == "" &&
        //         start_MonthSelect == "" &&
        //         end_MonthSelect == "" &&
        //         yearSelect == "" &&
        //         trainingTitle == ""
        //     ) {
        //         loadTrainings(1);

        //         // Destroy existing charts
        //         destroyChart(sexChart);
        //         destroyChart(indigenousChart);
        //         destroyChart(abilityChart);
        //         destroyChart(sectorChart);

        //         // Render new charts
        //         loadSexPieChart();
        //         loadIndigenousPieChart();
        //         loadAbilityPieChart();
        //         loadBarChart();

        //     } else {
        //         loadFilterTrainings(1);
        //     }
        // });

        // $("#end_MonthSelect").on("change", function() {
        //     // var searchInput = $("#trainingsSearch").val();
        //     var yearSelect = $("#yearSelect").val();
        //     var start_MonthSelect = $("#start_MonthSelect").val();
        //     var end_MonthSelect = $("#end_MonthSelect").val();
        //     var trainingTitle = $("#training_title").val();

        //     if (
        //         // searchInput == "" &&
        //         start_MonthSelect == "" &&
        //         end_MonthSelect == "" &&
        //         yearSelect == "" &&
        //         trainingTitle == ""
        //     ) {
        //         loadTrainings(1);

        //         // Destroy existing charts
        //         destroyChart(sexChart);
        //         destroyChart(indigenousChart);
        //         destroyChart(abilityChart);
        //         destroyChart(sectorChart);

        //         // Render new charts
        //         loadSexPieChart();
        //         loadIndigenousPieChart();
        //         loadAbilityPieChart();
        //         loadBarChart();

        //     } else {
        //         loadFilterTrainings(1);
        //     }
        // });

        // $("#training_title").on("change", function() {
        //     // var searchInput = $("#trainingsSearch").val();
        //     var yearSelect = $("#yearSelect").val();
        //     var start_MonthSelect = $("#start_MonthSelect").val();
        //     var end_MonthSelect = $("#end_MonthSelect").val();
        //     var trainingTitle = $("#training_title").val();
        //     // console.log(trainingTitle);
        //     if (
        //         // searchInput == "" &&
        //         start_MonthSelect == "" &&
        //         end_MonthSelect == "" &&
        //         yearSelect == "" &&
        //         trainingTitle == ""
        //     ) {
        //         loadTrainings(1);

        //         // Destroy existing charts
        //         destroyChart(sexChart);
        //         destroyChart(indigenousChart);
        //         destroyChart(abilityChart);
        //         destroyChart(sectorChart);

        //         // Render new charts
        //         loadSexPieChart();
        //         loadIndigenousPieChart();
        //         loadAbilityPieChart();
        //         loadBarChart();

        //     } else {
        //         loadFilterTrainings(1);
        //     }
        // });

        // $("#form").on("change", function() {
        //     // var searchInput = $("#trainingsSearch").val();
        //     var yearSelect = $("#yearSelect").val();
        //     var start_MonthSelect = $("#start_MonthSelect").val();
        //     var end_MonthSelect = $("#end_MonthSelect").val();
        //     var trainingTitle = $("#training_title").val();
        //     var formType = parseInt($("#form").val());
        //     // console.log(formType);
        //     if (
        //         // searchInput == "" &&
        //         start_MonthSelect == "" &&
        //         end_MonthSelect == "" &&
        //         yearSelect == "" &&
        //         trainingTitle == "" &&
        //         formType == "1"
        //     ) {
        //         loadTrainings(1);

        //         // Destroy existing charts
        //         destroyChart(sexChart);
        //         // destroyChart(indigenousChart);
        //         // destroyChart(abilityChart);
        //         // destroyChart(sectorChart);

        //         // Render new charts
        //         loadSexPieChart();
        //         // loadIndigenousPieChart();
        //         // loadAbilityPieChart();
        //         // loadBarChart();

        //     } else {
        //         loadFilterTrainings(1);
        //     }
        // });

        // regions, provinces, and municipalities dropdown change event
        // $('#regionSelect').on('change', function() {
        //     var regCode = $("#regionSelect").val();
        //     $("#provinceSelect").html('');
        //     $.ajax({
        //         url: "{{ route('trainings.fetchProvinces') }}",
        //         type: "POST",
        //         data: {
        //             regCode: regCode,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         dataType: 'json',
        //         success: function(result) {
        //             $('#provinceSelect').html(
        //                 '<option value="" selected disabled>Province</option><option value="">All Provinces</option>'
        //             );
        //             $.each(result, function(key, value) {
        //                 $("#provinceSelect").append('<option value="' + value.provCode + '">' +
        //                     value.provDesc + '</option>');
        //             });

        //         },
        //         error: function(error) {
        //             alert('Something went wrong!');
        //         },
        //     });
        // });

        // $('#provinceSelect').on('change', function() {
        //     var provCode = $("#provinceSelect").val();
        //     $("#municipalitySelect").html('');
        //     $.ajax({
        //         url: "{{ route('trainings.fetchMunicipalities') }}",
        //         type: "POST",
        //         data: {
        //             provCode: provCode,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         dataType: 'json',
        //         success: function(result) {
        //             $('#municipalitySelect').html(
        //                 '<option value="" selected disabled>Municipality</option><option value="">All Municipalities</option>');
        //             $.each(result, function(key, value) {
        //                 $("#municipalitySelect").append('<option value="' + value.citymunCode + '">' +
        //                     value.citymunDesc + '</option>');
        //             });

        //         },
        //         error: function(error) {
        //             alert('Something went wrong!');
        //         },
        //     });
        // });
        // $('#provinceSelect').on('change', function() {
        //     var yearSelect = $("#yearSelect").val();
        //     var start_MonthSelect = $("#start_MonthSelect").val();
        //     var end_MonthSelect = $("#end_MonthSelect").val();
        //     var trainingTitle = $("#training_title").val();
        //     var province = $("#provinceSelect").val();


        // });
    </script>
@endsection
