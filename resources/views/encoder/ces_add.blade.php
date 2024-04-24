@extends('layouts.dashboard')

@section('title')
    PhilRice CES | Add Data
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
                    <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                        aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
                        <box-icon name='chevron-down'></box-icon>
                    </a>
                    <ul id="dropdown-sales" class="py-2 space-y-2">
                        <li>
                            <a href="{{ route('encoder.ces_view') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='line-chart'></box-icon>
                                <span class="ml-3">View Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.ces_add') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
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

        <div class="flex">
            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-4xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PhilRice</span>
                Central Experimental Station</h1>
        </div>

        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">

                {{-- Card 1 --}}
                <a href="{{ route('trainingsform.create') }}" target="_blank">
                    <div
                        class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 hover:drop-shadow-lg hover:animate-pulse">
                        <img class="w-full lg:w-[296px] lg:h-[214px] rounded-lg sm:rounded-none sm:rounded-l-lg"
                            src="{{ asset('assets/rice.jpg') }}">
                        <div class="p-5">
                            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Summary of Trainings
                            </h3>
                            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Bonnie drives the technical
                                strategy of the flowbite platform and brand.</p>
                        </div>
                    </div>
                </a>

                {{-- Card 2 --}}
                {{-- <a href="{{ route('kslanalytics.index') }}" target="_blank"> --}}
                <a href="#" target="_blank">
                    <div
                        class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 cursor-not-allowed opacity-75">
                        <img class="w-full lg:w-[296px] lg:h-[214px] rounded-lg sm:rounded-none sm:rounded-l-lg"
                            src="{{ asset('assets/rice.jpg') }}">
                        <div class="p-5">
                            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">KSL</h3>
                            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Jese drives the technical
                                strategy of the flowbite platform and brand.</p>
                        </div>
                    </div>
                </a>

                {{-- Card 3 --}}
                {{-- <a href="{{ route('dispatchform.index') }}" target="_blank"> --}}
                <a href="#" target="_blank">
                    <div
                        class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 cursor-not-allowed opacity-75">
                        <img class="w-full lg:w-[296px] lg:h-[214px] rounded-lg sm:rounded-none sm:rounded-l-lg"
                            src="{{ asset('assets/rice.jpg') }}">
                        <div class="p-5">
                            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Dispatch Trainings
                            </h3>
                            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Michael drives the technical
                                strategy of the flowbite platform and brand.</p>
                        </div>
                    </div>
                </a>

                {{-- Card 4 --}}
                {{-- <a href="{{ route('technodemo') }}" target="_blank"> --}}
                <a href="#" target="_blank">
                    <div
                        class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 cursor-not-allowed opacity-75">
                        <img class="w-full lg:w-[296px] lg:h-[214px] rounded-lg sm:rounded-none sm:rounded-l-lg"
                            src="{{ asset('assets/rice.jpg') }}">
                        <div class="p-5">
                            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Technology
                                Demonstration</h3>
                            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Lana drives the technical
                                strategy of the flowbite platform and brand.</p>
                        </div>
                    </div>
            </div>
        </div>
    </main>
@endsection

@section('charts')
@endsection
