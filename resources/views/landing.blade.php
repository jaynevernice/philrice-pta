@extends('layouts.app')

@section('title')
    {{ config('app.name') }}
@endsection

@section('content')
    <div class="flex flex-col h-screen">
        {{-- Hero --}}
        <div class="relative flex flex-col justify-center items-center w-full h-full">
            {{-- <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop>
                <source src="{{ asset('assets/training.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video> --}}
            <img src="{{ asset('assets/philrice-1.png') }}" alt="Background Image"
                class="absolute top-0 left-0 w-full h-full object-cover">

            {{-- Dim video using overlay --}}
            <div class="absolute inset-0 bg-black opacity-50"></div>

            {{-- Text Overlay --}}
            <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                <div class="max-w-2xl mx-auto px-4">
                    <h1 class="text-5xl font-bold text-center mb-6">{{ config('app.name') }}</h1>
                    <p class="text-lg text-center mb-6">Efficiently organizes and manages
                        training-related information for the Philippine Rice Research Institute, enhancing the effectiveness
                        of their agricultural education initiatives.</p>
                </div>

                <div class="flex flex-col lg:flex-row">
                    <a href="{{ route('guest.view') }}" class="mb-2 lg:mb-0">
                        <button type="button"
                            class="w-full lg:w-60 flex items-center justify-center text-gray-900 bg-white hover:bg-slate-100 border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-base text-center px-5 py-3 me-2">
                            <box-icon type='solid' name='user' class="mr-2"></box-icon>
                            View
                        </button>
                    </a>
                    <a href="{{ route('login') }}">
                        <button type="button"
                            class="w-full lg:w-60 flex items-center justify-center text-gray-900 bg-green-300 hover:bg-green-400 border border-green-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-base text-center px-5 py-3 me-2 mb-2">
                            <box-icon name='edit-alt' type='solid' class="mr-2"></box-icon>
                            Encode
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
