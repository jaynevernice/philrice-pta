@extends('layouts.dashboard')

@section('title')
    Manage Account
@endsection

@section('sidebar')
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">

                {{-- Overview --}}
                <li>
                    <a href="{{ route('auth.overview') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
                        <span class="ml-3">Overview</span>
                    </a>
                </li>

                {{-- If Encoder is from CES --}}
                @if (Auth::user()->station === '1')
                    <li>
                        <a class="exclude-from-confirm flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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
                        <a class="exclude-from-confirm flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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
                        <a class="exclude-from-confirm flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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
                        <a class="exclude-from-confirm flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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
                        <a class="exclude-from-confirm flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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
                        <a class="exclude-from-confirm flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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
                        <a class="exclude-from-confirm flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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
                        <a class="exclude-from-confirm flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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
                        <a class="exclude-from-confirm flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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

                @if (Auth::user()->user_type === 'admin')
                    <hr>
                    {{-- Manage Encoder --}}
                    <li>
                        <a href="{{ route('admin.manage_encoders') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon type='solid' name='user-account'></box-icon>
                            <span class="ml-3">Manage Encoders</span>
                        </a>
                    </li>
                @elseif (Auth::user()->user_type === 'super_admin')
                    <hr>

                    {{-- Manage Encoders --}}
                    <li>
                        <a href="{{ route('super_admin.manage_encoders') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                            <box-icon type='solid' name='user-account'></box-icon>
                            <span class="ml-3">Manage Encoders</span>
                        </a>
                    </li>

                    {{-- Manage Admins --}}
                    <li>
                        <a href="{{ route('super_admin.manage_admins') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
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
    <main class="p-8 md:ml-64 pt-24 h-full bg-gray-50">
        {{-- Background Image --}}
        <img src="{{ asset('assets/profile-bg-1.jpg') }}" class="absolute inset-0 h-3/4 w-full object-cover">

        <div
            class="relative px-20 py-2 mb-10 shadow-md rounded-2xl bg-white mx-auto border-solid border-2 border-gray-100">

            <form id="profileForm" action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex w-full items-center">
                    {{-- Profile Picture --}}
                    <div class="m-10">
                        <div class="relative flex items-center">
                            <label for="profile_picture"
                                class="h-40 w-40 rounded-full bg-gray-100 relative cursor-pointer border border-gray-900 overflow-visible">

                                <img alt="Current Profile Picture" class="h-full w-full rounded-full object-cover"
                                    id="profile_picture_preview"
                                    @if (Auth::check() && Auth::user()->profile_picture) src="{{ "/philrice-pta/". Auth::user()->profile_picture }}"
                    @else
                        src="{{ asset('assets/icon.jpg') }}" @endif>

                                {{-- Edit pencil button --}}
                                <div class="absolute bottom-1 right-1 bg-yellow-200 rounded-full p-1 text-center">
                                    <box-icon name='pencil' class="w-5 h-5 m-1"></box-icon>
                                </div>
                            </label>
                            <input id="profile_picture" name="profile_picture" type="file" class="sr-only"
                                accept="image/*" onchange="previewProfilePicture(event)">
                        </div>
                    </div>

                    <div class="ml-10">
                        <h1 class="text-4xl font-bold my-1">{{ old('first_name', Auth::user()->first_name) }}
                            {{ old('mi', Auth::user()->mi) }} {{ old('last_name', Auth::user()->last_name) }}</h1>
                        <p class="text-md text-gray-600 my-1">{{ old('email', Auth::user()->email) }}</p>
                        <span
                            class="inline-block bg-green-200 text-green-400 text-md font-semibold px-2 py-1 rounded-lg">{{ old('philrice_id', Auth::user()->philrice_id) }}</span>

                    </div>
                </div>

                {{-- Profile --}}
                <div class="flex items-center mb-4">
                    <box-icon type='solid' name='user-account' color="#0B1215" class="mr-2"></box-icon>
                    <h2 class="text-lg font-extrabold text-[#0B1215]">Profile</h2>
                </div>


                <div class="grid grid-cols-2 gap-x-4 items-center mb-4">
                    <div>
                        <label for="station" class="block text-sm font-medium text-[#0B1215] mb-1">Station</label>
                        <select
                            class="block bg-gray-50 appearance-none w-full h-10 border border-gray-300 text-[#0B1215] py-2 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                            id="station" name="station">

                            @foreach ($stations as $station)
                                <option value="{{ $station->id }}"
                                    {{ old('station', Auth::user()->station) == $station->id ? 'selected' : '' }}>
                                    {{ $station->station }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="division" class="block text-sm font-medium text-[#0B1215] mb-1">Division</label>
                        <select
                            class="block bg-gray-50 appearance-none w-full h-10 border border-gray-300 text-[#0B1215] py-2 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                            id="division" name="division">
                        </select>
                    </div>
                </div>

                <div class="flex w-full items-center mb-4">
                    <div class="my-2 flex-1">
                        <label for="position" class="block text-sm font-medium text-[#0B1215] mb-1">Position</label>
                        <select
                            class="block bg-gray-50 appearance-none w-full h-10 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                            id="position" name="position">
                        </select>
                    </div>
                </div>

                {{-- Security Questions --}}
                <div class="flex items-center mb-4">
                    <box-icon type='solid' name='user-account' color="#0B1215" class="mr-2"></box-icon>
                    <h2 class="text-lg font-extrabold text-[#0B1215]">Security Questions</h2>
                </div>

                <div class="w-full items-center mb-4">
                    <div class="mb-2">
                        <label for="sq1" class="block mb-2 text-sm font-medium text-[#0B1215]">What is your favorite
                            color?</label>
                        <input type="text" id="sq1" name="sq1"
                            class="h-10 bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                            placeholder="Security Question 1" value="{{ old('sq1', Auth::user()->sq1) }}">
                    </div>

                    <div class="mb-2">
                        <label for="sq2" class="block mb-2 text-sm font-medium text-[#0B1215]">What province were you
                            born
                            in?</label>
                        <input type="text" id="sq2" name="sq2"
                            class="h-10 bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                            placeholder="Security Question 2" value="{{ old('sq2', Auth::user()->sq2) }}">
                    </div>

                    <div class="mb-2">
                        <label for="sq3" class="block mb-2 text-sm font-medium text-[#0B1215]">What is the name of
                            your
                            elementary school?</label>
                        <input type="text" id="sq3" name="sq3"
                            class="h-10 bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                            placeholder="Security Question 3" value="{{ old('sq3', Auth::user()->sq3) }}">
                    </div>
                </div>

                {{-- Password --}}
                <div class="flex items-center mb-4">
                    <box-icon name='lock' type='solid' class="mr-2"></box-icon>
                    <h2 class="text-lg font-extrabold text-[#0B1215]">Password</h2>
                </div>

                <div class="w-full items-center mb-4">
                    <div class="my-2 w-full">
                        <label for="old_password" class="block mb-2 text-sm font-medium text-[#0B1215]">Old
                            Password</label>
                        <input type="password" name="old_password" id="old_password" autocomplete="off"
                            class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                    </div>
                    <div class="my-2 w-full">
                        <label for="password" class="block mb-2 text-sm font-medium text-[#0B1215]">New Password</label>
                        <input type="password" name="password" id="password" autocomplete="off"
                            onkeyup="validatePasswords()"
                            class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                        <div id="password-error-message"></div>
                    </div>
                    <div class="my-2 w-full">
                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-[#0B1215]">Confirm
                            password</label>
                        <input type="password" name="password_confirmation" id="confirm_password" autocomplete="off"
                            onkeyup="validatePasswords()"
                            class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                        <div id="password-match-message"></div>
                    </div>
                    {{-- Show Password --}}
                    <div class="flex items-center justify-end my-2 w-full">
                        <input type="checkbox" id="showPasswordCheckbox"
                            class="form-checkbox rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            onchange="togglePasswordVisibility('old_password'); togglePasswordVisibility('password'); togglePasswordVisibility('confirm_password');">
                        <label for="showPasswordCheckbox"
                            class="text-sm font-medium text-[#0B1215] ml-2 cursor-pointer">Show
                            Password</label>
                    </div>
                </div>

                {{-- Save and Go Back --}}
                <div class="flex justify-end w-full my-8">
                    <a href="{{ route('auth.overview') }}"
                        class="text-gray-700 hover:text-[#0B1215] font-medium rounded-lg text-sm px-3 py-2.5"
                        id="goBackBtn">
                        Go Back
                    </a>
                    <button type="submit" id="saveProfileBtn"
                        class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var stationDropdown = document.getElementById('station');
            var divisionDropdown = document.getElementById('division');
            var positionDropdown = document.getElementById('position');
            var divisions = {!! json_encode($divisions) !!};
            var positions = {!! json_encode($positions) !!};

            function populateDivisions(stationId) {
                divisionDropdown.innerHTML = '';
                divisions.forEach(function(division) {
                    if (division.station_id == stationId) {
                        var option = document.createElement('option');
                        option.value = division.id;
                        option.textContent = division.division;
                        divisionDropdown.appendChild(option);
                    }
                });
                populatePositions(divisionDropdown.value);
            }

            function populatePositions(divisionId) {
                positionDropdown.innerHTML = '';
                positions.forEach(function(position) {
                    if (position.division_id == divisionId) {
                        var option = document.createElement('option');
                        option.value = position.id;
                        option.textContent = position.position;
                        positionDropdown.appendChild(option);
                    }
                });
            }

            var oldStationId = "{{ old('station', Auth::user()->station) }}";
            var oldDivisionId = "{{ old('division', Auth::user()->division) }}";
            var oldPositionId = "{{ old('position', Auth::user()->position) }}";

            populateDivisions(oldStationId);
            populatePositions(oldDivisionId);

            stationDropdown.value = oldStationId;
            divisionDropdown.value = oldDivisionId;
            positionDropdown.value = oldPositionId;

            // Event listeners for  changes
            stationDropdown.addEventListener('change', function() {
                populateDivisions(this.value);
            });

            divisionDropdown.addEventListener('change', function() {
                populatePositions(this.value);
            });
        });
    </script>

    {{-- Show All Password --}}
    <script>
        document.getElementById("showPasswordCheckbox").addEventListener("change", function() {
            var oldPasswordInput = document.getElementById("old_password");
            var newPasswordInput = document.getElementById("password");
            var confirmNewPasswordInput = document.getElementById("confirm_password");

            if (this.checked) {
                oldPasswordInput.type = "text";
                newPasswordInput.type = "text";
                confirmNewPasswordInput.type = "text";
            } else {
                oldPasswordInput.type = "password";
                newPasswordInput.type = "password";
                confirmNewPasswordInput.type = "password";
            }
        });
    </script>

    <script>
        function previewProfilePicture(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile_picture_preview').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            const errorMessage = document.getElementById('password-error-message');
            const matchMessage = document.getElementById('password-match-message');

            errorMessage.textContent = ''; 
            errorMessage.style.color = "red";
            matchMessage.textContent = '';

            const minLength = 8;
            const hasLowerCase = /[a-z]/.test(password);
            const hasUpperCase = /[A-Z]/.test(password);
            const hasNumber = /\d/.test(password);
            const hasSpecialChar = /[!@#$%^&*()]/.test(password);

            let isValid = true;

            const errorList = [];

            if (password.length < minLength) {
                isValid = false;
                errorMessage.textContent = "Your new password must be at least " + minLength + " characters long.";
                return; 
            }
            if (!hasLowerCase) {
                isValid = false;
                errorMessage.textContent = "Your new password must contain at least one lowercase letter (a-z).";
                return;
            }
            if (!hasUpperCase) {
                isValid = false;
                errorMessage.textContent = "Your new password must contain at least one uppercase letter (A-Z).";
                return;
            }
            if (!hasNumber) {
                isValid = false;
                errorMessage.textContent = "Your new password must contain at least one number (0-9).";
                return;
            }
            if (!hasSpecialChar) {
                isValid = false;
                errorMessage.textContent = "Your new password must contain at least one special character (!@#$%^&*()).";
                return;
            }

            errorMessage.textContent = "";

            if (!isValid) {
                errorMessage.style.color = 'red';
                errorList.forEach(function(error) {
                    errorMessage.innerHTML += '<li>' + error + '</li>';
                });
            }

            if (password !== confirmPassword) {
                isValid = false;
                matchMessage.style.color = 'red';
                matchMessage.textContent = 'Passwords do not match.';
            } else {
                matchMessage.style.color = 'green';
                matchMessage.textContent = 'Passwords match.';
            }
        }

        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
@endsection

@section('alerts')
    {{-- Save Button --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('saveProfileBtn').addEventListener('click', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Confirm Changes',
                    text: 'Are you sure you want to save the changes?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Update Successful!",
                            text: "Your profile has been updated successfully.",
                            icon: "success"
                        }).then((result) => {
                            document.getElementById('profileForm').submit();
                        });

                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while updating your profile. Please try again later.',
                            icon: 'error'
                        });
                    }
                });
            });
        });
    </script>

    <script>
        document.getElementById('goBackBtn').addEventListener('click', function(event) {
            event.preventDefault(); 

            Swal.fire({
                title: 'Are you sure?',
                text: "You have unsaved changes. Are you sure you want to leave without saving?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, leave without saving',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    var userType = "{{ auth()->user()->user_type }}";
                    var redirectUrl = "";
                    redirectUrl = "{{ route('auth.overview') }}";
                    window.location.href = redirectUrl;
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('#drawer-navigation li a');
            links.forEach(link => {
                if (!link.classList.contains('exclude-from-confirm')) {
                    link.addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent default navigation behavior
                        const href = this.getAttribute('href');
                        // Display confirmation dialog
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'You have unsaved changes. Are you sure you want to leave without saving?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, leave without saving!',
                            cancelButtonText: 'No, stay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = href;
                            }
                        });
                    });
                }
            });
        });
    </script>
@endsection
