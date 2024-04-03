@extends('layouts.app')

@section('title')
    Forgot Password | Security Questions
@endsection

@section('content')
    <div class="h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">

            {{-- Left Side --}}
            <div class="flex-1 bg-green-100 text-center hidden lg:flex">
                {{-- <div class="m-12 xl:m-16 w-full overflow-hidden"> --}}
                <div class="w-full overflow-hidden relative">
                    {{-- <video autoplay muted loop class="w-full"> --}}
                    <video autoplay muted loop class="h-full object-cover w-full">
                        <source src="{{ asset('assets/training.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    {{-- Dim Video using Overlay --}}
                    <div class="absolute inset-0 bg-black opacity-50"></div>

                    {{-- Text Overlay --}}
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                        <h1 class="text-5xl font-bold pb-4">{{ config('app.name') }}</h1>
                    </div>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class="mt-12 flex flex-col items-center">
                    <h1 class="text-2xl xl:text-3xl font-extrabold">Forgot Password?</h1>
                    <div class="w-full flex-1 mt-8">

                        <div class="my-12 border-b text-center">
                            <div
                                class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                Choose a security question and provide the response you provided during registration.
                            </div>
                        </div>

                        <div class="mx-auto max-w-xs">
                            <form action="{{ url('/resetsq') }}" method="POST">
                                @include('_message')
                                @csrf
                                {{-- <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="email" name="email" placeholder="Email" required /> --}}

                                {{-- PhilRice ID --}}
                                <div class="my-2" id="idField">
                                    <label for="philrice_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PhilRice ID</label>
                                    <input type="text" name="philrice_id" value="{{ old('philrice_id') }}"
                                        id="philrice_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="XX-XXXX">
                                </div>
                                
                                <div class="relative">
                                    <select id="security_question"
                                        class="block appearance-none w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white">
                                        <option value="" disabled selected>Choose security question</option>
                                        <option value="favorite_color">What is your favorite color?</option>
                                        <option value="birth_location">What province/city were you born in?</option>
                                        <option value="elementary_school">What is the name of your elementary school?
                                        </option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        {{-- <box-icon name='chevron-down'></box-icon> --}}
                                    </div>
                                </div>

                                <div id="additional_field" style="display: none;">
                                    <input id="answer_input" type="text"
                                        class="w-full px-8 py-4 mt-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        name="answer" placeholder="Your answer" />
                                </div>


                                <button type="submit"
                                    class="mt-5 tracking-wide font-semibold bg-green-500 text-gray-100 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <span class="ml-3">
                                        Send
                                    </span>
                                </button>

                                <div class="text-center my-16">
                                    <a href="{{ url('/forgot') }}"
                                        class="font-medium text-green-400 hover:text-green-500 hover:underline">Reset Using
                                        Email</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('security_question').addEventListener('change', function() {
            var selectedOption = this.value;
            var additionalField = document.getElementById('additional_field');
            var answerInput = document.getElementById('answer_input');

            if (selectedOption !== '') {
                additionalField.style.display = 'block';
                answerInput.setAttribute('required', 'required');
            } else {
                additionalField.style.display = 'none';
                answerInput.removeAttribute('required');
            }
        });
    </script>
@endsection
