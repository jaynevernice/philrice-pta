@extends('layouts.app')

@section('title')
    Forgot Password
@endsection

@section('content')
    <div class="min-h-screen p-12 bg-gray-100 text-[#0B1215] flex justify-center items-center">
        <div class="max-w-lg w-full sm:m-10 bg-white shadow sm:rounded-lg flex flex-col justify-center">

            <div class="px-20 py-16 ">
                <h1 class="text-2xl xl:text-3xl font-extrabold text-center mb-8">Forgot Password?</h1>

                <div class="text-center">
                    <p
                        class="text-sm text-gray-600 tracking-wide font-medium bg-white inline-block px-2 py-1 transform -translate-y-1/2">
                        Enter the email associated with your account</p>
                </div>

                <form action="{{ url('/forgot') }}" method="POST" class="space-y-4">
                    @include('_message')
                    @csrf
                    <input
                        class="w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                        type="email" name="email" placeholder="Email" required />

                    <button type="submit"
                        class="w-full bg-green-500 text-gray-100 py-3 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline">
                        Send
                    </button>
                </form>

                <div class="text-center mt-8">
                    <a href="{{ route('forgot') }}"
                        class="text-green-400 hover:text-green-500 hover:underline font-medium">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection