@extends('layouts.dashboard')

@section('title')
    PhilRice CES
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
                    <a href="{{ route('encoder.ces') }}"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                        aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
                        <box-icon name='chevron-down'></box-icon>
                    </a>
                    <ul id="dropdown-sales" class="py-2 space-y-2">
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



            </ul>
        </div>
    </aside>
@endsection

@section('content')
    {{-- Content --}}
    <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="justify-center">
            <div class="grid grid-cols-2 lg:grid-cols-4">

                {{-- Card for KSL Monitoring --}}
                <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                    <a href="{{ route('kslform.index') }}" target="_blank">
                        <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                        <div class="p-5">
                            <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES KSL Monitoring</h5>
                        </div>
                    </a>
                </div>

                {{-- Card for Technical Dispatch Monitoring --}}
                <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                    <a href="{{ route('dispatchform.index') }}" target="_blank">
                        <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                        <div class="p-5">
                            <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Technical Dispatch Monitoring
                            </h5>
                        </div>
                    </a>
                </div>

                {{-- Card for Techno Demo Monitoring --}}
                <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2 opacity-50">
                    <a href="#" target="_blank" class="cursor-not-allowed">
                        <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                        <div class="p-5">
                            <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Techno Demo Monitoring</h5>
                        </div>
                    </a>
                </div>

                {{-- Card for Summary of Trainings --}}
                <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2 opacity-50">
                    <a href="{{ route('trainingsform.index') }}" target="_blank" class="cursor-not-allowed">
                        <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                        <div class="p-5">
                            <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Summary of Trainings
                                Conducted</h5>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </main>
@endsection