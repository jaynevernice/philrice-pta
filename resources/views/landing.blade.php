@extends('layouts.app')

@section('title')
    {{ config('app.name') }}
@endsection

@section('content')
    <div class="flex flex-col h-screen">
        {{-- <header class="antialiased">
            <nav class="bg-white border-b border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center"> --}}
        {{-- Logo --}}
        {{-- <div class="flex justify-start items-center"> --}}
        {{-- <a href="#" onclick="location.reload();" class="flex mr-4"> --}}
        {{-- <a href="" onclick="location.reload();" class="flex mr-4">
                            <img src="https://www.philrice.gov.ph/philrice-logo/" class="mr-3 h-10" alt="Logo" />
                        </a>
                    </div> --}}
        {{-- Login Button --}}
        {{-- <div class="flex items-center lg:order-2">
                        <div> --}}
        {{-- <a href="{{ route('login') }}"> --}}
        {{-- <button type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button> --}}
        {{-- <button type="button" class="text-white bg-gradient-to-br from-[#16A44B] to-[#14506A] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button> --}}
        {{-- </a> --}}
        {{-- </div>
                    </div>
                </div>
            </nav>
        </header> --}}

        {{-- Hero --}}
        <div class="relative flex flex-col justify-center items-center w-full h-full">
            <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop>
                <source src="{{ asset('assets/training.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            {{-- Dim video using overlay --}}
            <div class="absolute inset-0 bg-black opacity-50"></div>

            {{-- Text Overlay --}}
            <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                <div class="max-w-2xl mx-auto px-4">
                    <h1 class="text-4xl sm:text-5xl font-bold text-center mb-6">{{ config('app.name') }}</h1>
                    <p class="text-lg text-center mb-6">PTA efficiently organizes and manages
                        training-related information for the Philippine Rice Research Institute, enhancing the effectiveness
                        of their agricultural education initiatives.</p>
                </div>

                <div class="flex flex-col lg:flex-row">
                    <a href="{{ route('guest.overview') }}" class="mb-2 lg:mb-0">
                        <button type="button" onclick="showAlert"
                            class="w-full lg:w-60 flex items-center justify-center text-gray-900 bg-white hover:bg-slate-100 border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-base text-center px-5 py-3 me-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            <box-icon type='solid' name='user' class="mr-2"></box-icon>
                            View
                        </button>
                    </a>
                    <a href="{{ route('login') }}">
                        <button type="button"
                            class="w-full lg:w-60 flex items-center justify-center text-gray-900 bg-green-300 hover:bg-green-400 border border-green-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-base text-center px-5 py-3 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            <box-icon name='edit-alt' type='solid' class="mr-2"></box-icon>
                            Encode
                        </button>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection