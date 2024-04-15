@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="h-screen text-[#0B1215] flex justify-center bg-gradient-to-r from-[#D1DCD8] to-[#CDD9D5]">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1 drop-shadow-lg">

            {{-- Left Side --}}
            <div class="flex-1 bg-green-100 text-center hidden lg:flex">
                {{-- <div class="m-12 xl:m-16 w-full overflow-hidden"> --}}
                <div class="w-full overflow-hidden relative">
                    {{-- <video autoplay muted loop class="w-full"> --}}
                    {{-- <video autoplay muted loop class="h-full object-cover w-full">
                        <source src="{{ asset('assets/training.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> --}}
                    <img src="{{ asset('assets/philrice-1.png') }}" class="h-full object-cover w-full">

                    {{-- Dim Video using Overlay --}}
                    <div class="absolute inset-0 bg-black opacity-50"></div>

                    {{-- Text Overlay --}}
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                        <h1 class="text-8xl font-bold pb-4 text-balance">{{ config('app.name') }}</h1>
                    </div>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class=" flex flex-col items-center">
                    {{-- <div class="mt-12 flex flex-col items-center"> --}}
                    {{-- <h1 class="text-2xl xl:text-3xl font-extrabold">Login</h1> --}}


                    {{-- <div class="w-full flex-1 mt-8"> --}}
                    <div class="w-full flex-1">

                        <div class="flex flex-row items-center justify-center">
                            <a href="{{ url('/login') }}">
                                <button type="button"
                                    class="w-56 text-[#1A73E8] bg-white border-b-4 border-[#1A73E8] focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">LOGIN</button>
                            </a>

                            <a href="{{ url('/register') }}">
                                <button type="button"
                                    class="w-56 text-gray-600 bg-white border-b-4 border-gray-300 focus:outline-none hover:bg-gray-100 hover:border-[#1A73E8] hover:text-[#1A73E8] focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">REGISTER</button>
                            </a>
                        </div>

                        <h1 class="text-2xl xl:text-3xl font-extrabold my-4">LOGIN</h1>
                        <p class="justify-right text-lg text-gray-700 mb-8">Please login with your data that you entered
                            during registration</p>


                        {{-- <div class="drop-shadow flex items-center justify-center my-4">
                            <a href="{{ route('guest.overview') }}">
                                <button type="button" class="lg:w-[436px] flex items-center justify-center text-white bg-gray-700 border border-gray-300 focus:outline-none hover:bg-gray-900 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-base px-5 py-3 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-900 dark:hover:border-gray-600 dark:focus:ring-gray-700 ">
                                    <box-icon name='user' color="#ffffff" class="mr-4" ></box-icon>
                                    Browse as Guest
                                </button>
                            </a>
                        </div> --}}



                        {{-- <div class="my-12 border-b text-center"> --}}
                        {{-- <div class="my-4 border-b text-center">
                            <div
                                class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                OR
                            </div>
                        </div> --}}


                        <div class="w-full flex-1 mt-8">
                            {{-- <div class="mx-auto max-w-xs"> --}}
                            <form action="{{ route('auth_login') }}" method="POST">
                                @include('_message')
                                @csrf
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white lg:w-[436px]"
                                    type="email" name="email" placeholder="Email" />

                                <div class="relative mt-5">
                                    <input id="password"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white lg:w-[436px]"
                                        type="password" name="password" placeholder="Password" />


                                    {{-- Toggle password visbility --}}
                                    <button type="button" onclick="togglePasswordVisibility()"
                                        class="absolute inset-y-0 right-0 px-4 py-2 mr-2 focus:outline-none">
                                        <svg id="hidePasswordIcon" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24">
                                            <path
                                                d="M11.885 14.988l3.104-3.098.011.11c0 1.654-1.346 3-3 3l-.115-.012zm8.048-8.032l-3.274 3.268c.212.554.341 1.149.341 1.776 0 2.757-2.243 5-5 5-.631 0-1.229-.13-1.785-.344l-2.377 2.372c1.276.588 2.671.972 4.177.972 7.733 0 11.985-8.449 11.985-8.449s-1.415-2.478-4.067-4.595zm1.431-3.536l-18.619 18.58-1.382-1.422 3.455-3.447c-3.022-2.45-4.818-5.58-4.818-5.58s4.446-7.551 12.015-7.551c1.825 0 3.456.426 4.886 1.075l3.081-3.075 1.382 1.42zm-13.751 10.922l1.519-1.515c-.077-.264-.132-.538-.132-.827 0-1.654 1.346-3 3-3 .291 0 .567.055.833.134l1.518-1.515c-.704-.382-1.496-.619-2.351-.619-2.757 0-5 2.243-5 5 0 .852.235 1.641.613 2.342z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="grid grid-cols-2">
                                    <div>
                                        <button type="submit"
                                            class="mt-5 tracking-wide font-semibold bg-green-500 text-gray-100 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                            <span class="ml-3 text-base">
                                                LOG IN
                                            </span>
                                        </button>
                                    </div>

                                    <div class="flex items-center justify-center h-full">
                                        {{-- Forgot Password --}}
                                        {{-- <a href="{{ url('/forgot') }}" class="block text-sm text-gray-600 my-4 hover:text-[#0B1215] text-right underline">Forgot Password?</a> --}}
                                        <a href="{{ url('/forgot') }}"
                                            class="block text-base text-[#1A73E8] mt-5 hover:text-blue-700 text-left">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>


                                {{-- <p class="block text-sm text-gray-600 my-8 hover:text-[#0B1215] text-center">Don't have an account? <a href="{{ url('/register') }}" class="text-sm text-green-600 my-4 hover:text-green-900 text-center underline">Register Now</a></p> --}}
                            </form>



                            {{-- Terms and Conditions --}}
                            {{-- <p class="mt-6 text-xs text-gray-600 text-center">
                                I agree to abide by PhilRice's
                                <a href="#" class="border-b border-gray-500 border-dotted">
                                    Terms of Service
                                </a>
                                and its
                                <a href="#" class="border-b border-gray-500 border-dotted">
                                    Privacy Policy
                                </a>
                            </p> --}}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var hidePasswordIcon = document.getElementById('hidePasswordIcon');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                // Change SVG to Show Password
                hidePasswordIcon.innerHTML =
                    '<path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/>';
            } else {
                passwordInput.type = "password";
                // Change SVG to Hide Password
                hidePasswordIcon.innerHTML =
                    '<path d="M11.885 14.988l3.104-3.098.011.11c0 1.654-1.346 3-3 3l-.115-.012zm8.048-8.032l-3.274 3.268c.212.554.341 1.149.341 1.776 0 2.757-2.243 5-5 5-.631 0-1.229-.13-1.785-.344l-2.377 2.372c1.276.588 2.671.972 4.177.972 7.733 0 11.985-8.449 11.985-8.449s-1.415-2.478-4.067-4.595zm1.431-3.536l-18.619 18.58-1.382-1.422 3.455-3.447c-3.022-2.45-4.818-5.58-4.818-5.58s4.446-7.551 12.015-7.551c1.825 0 3.456.426 4.886 1.075l3.081-3.075 1.382 1.42zm-13.751 10.922l1.519-1.515c-.077-.264-.132-.538-.132-.827 0-1.654 1.346-3 3-3 .291 0 .567.055.833.134l1.518-1.515c-.704-.382-1.496-.619-2.351-.619-2.757 0-5 2.243-5 5 0 .852.235 1.641.613 2.342z"/>';
            }
        }
    </script>
@endsection
