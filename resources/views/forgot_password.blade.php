@extends('layouts.app')

@section('title')
    Forgot Password
@endsection

@section('content')
    <div class="min-h-screen p-12 bg-gray-100 text-[#0B1215] flex justify-center items-center">
        <div class="max-w-lg w-full sm:m-10 bg-white shadow sm:rounded-lg flex flex-col justify-center">

            {{-- Redirect Back --}}
            {{-- <a href="{{ route('login') }}">
                <div
                    class="absolute -left-16 top-1/2 transform -translate-y-1/2 w-60 h-60 bg-gray-400 hover:bg-gray-700 rounded-r-full flex items-center justify-center hover:-translate-x-8 transition-transform duration-300 ease-in-out">
                    <div class="text-white">
                        <box-icon name='arrow-back' color="white" type='solid' class="w-16 h-16 ml-10"></box-icon>
                    </div>
                </div>
            </a> --}}

            <div class="px-20 py-16 ">
                <h1 class="text-2xl xl:text-3xl font-extrabold text-center mb-8">Forgot Password?</h1>

                <div class="text-center">
                    <p
                        class="text-sm text-gray-600 tracking-wide font-medium bg-white inline-block px-2 py-1 transform -translate-y-1/2">
                        Please select the option for resetting your password</p>
                </div>

                <a href="{{ route('reset_email') }}"
                    class="w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 text-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white flex items-center justify-center hover:bg-gray-300">
                    <box-icon name='envelope' color="#64748b"></box-icon>
                    <span class="ml-2 text-gray-500">Send a verification via Email</span>
                </a>

                <a href="{{ route('reset_sq') }}"
                    class="w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 text-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white flex items-center justify-center mt-4 hover:bg-gray-300">
                    <box-icon name='check-shield' color="#64748b"></box-icon>
                    <span class="ml-2 text-gray-500">Answer one of the security questions</span>
                </a>



                <div class="text-center mt-8">
                    <a href="{{ route('login') }}"
                        class="text-green-400 hover:text-green-500 hover:underline font-medium">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
