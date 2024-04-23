@extends('layouts.app')

@section('title')
    Forgot Password | Security Questions
@endsection

@section('content')
    <div class="min-h-screen p-12 bg-gray-100 text-[#0B1215] flex justify-center items-center">
        <div class="max-w-lg w-full sm:m-10 bg-white shadow sm:rounded-lg flex flex-col justify-center">

            {{-- Redirect Back --}}
            <a href="{{ route('forgot') }}">
                <div
                    class="absolute -left-16 top-1/2 transform -translate-y-1/2 w-60 h-60 bg-gray-400 hover:bg-gray-700 rounded-r-full flex items-center justify-center hover:-translate-x-8 transition-transform duration-300 ease-in-out">
                    <div class="text-white">
                        <box-icon name='arrow-back' color="white" type='solid' class="w-16 h-16 ml-10"></box-icon>
                    </div>
                </div>
            </a>

            <div class="px-20 py-16 ">
                <h1 class="text-2xl xl:text-3xl font-extrabold text-center mb-4">Forgot Password?</h1>

                <div class="mb-12 border-b text-center">
                    <div
                        class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                        Choose a security question and provide the response you provided during registration.
                    </div>
                </div>

                <form action="{{ route('post-reset-sq') }}" method="POST">
                    @include('_message')
                    @csrf
                    {{-- <input
                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                        type="email" name="email" placeholder="Email" required /> --}}

                    {{-- PhilRice ID --}}
                    <div class="my-2" id="idField">
                        {{-- <label for="philrice_id" class="block text-sm font-medium text-gray-900 dark:text-white">PhilRice
                            ID</label> --}}
                        <input required type="text" name="philrice_id" value="{{ old('philrice_id') }}" id="philrice_id"
                            class="w-full px-8 py-4 mt-2 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                            placeholder="PhilRice ID">
                    </div>

                    <div class="relative">
                        <select required id="security_question" name="security_question"
                            class="block appearance-none w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white">
                            <option value="" disabled selected>Choose security question</option>
                            <option value="sq1">What is your favorite color?</option>
                            <option value="sq2">What province were you born in?</option>
                            <option value="sq3">What's the name of your elementary school?
                            </option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            {{-- <box-icon name='chevron-down'></box-icon> --}}
                        </div>
                    </div>

                    <div id="additional_field" style="display: none;">
                        <input required id="answer_input" type="text"
                            class="w-full px-8 py-4 mt-2 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                            name="answer" placeholder="Your answer" />
                    </div>


                    <button type="submit"
                        class="mt-5 tracking-wide font-semibold bg-green-500 text-gray-100 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                        <span class="ml-3">
                            Send
                        </span>
                    </button>

                    <div class="text-center my-8">
                        <a href="{{ route('reset_email') }}"
                            class="font-medium text-green-400 hover:text-green-500 hover:underline">Reset Using
                            Email</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

        
        $(document).ready(function() {
            // PHILRICE ID FORMAT
            $('#philrice_id').on('input', function() {

                var inputValue = $(this).val();
                // Remove characters that are not numbers or dashes
                var filteredValue = inputValue.replace(/[^\d-]/g, '');

                // Limit only 2 numbers before the dash
                var parts = filteredValue.split('-');
                var beforeDash = parts[0].substring(0, 2);

                // Get the current year
                var currentYear = new Date().getFullYear() % 100; // Last two digits of the current year
                if (parseInt(beforeDash) > parseInt(currentYear)) {
                    beforeDash = currentYear.toString();
                }

                // Limit only 4 numbers after the dash
                var afterDash = parts[1] || ''; // Handle case where there's no dash yet
                afterDash = afterDash.substring(0, 4);

                // Validate the third and fourth numbers (representing month) to be within 01 to 12
                var month = parseInt(afterDash.substring(0, 2));
                if (month < 1 || month > 12) {
                    afterDash = '0'; 
                }

                // If there are more than 2 numbers before the dash, add dash after the second number
                if (beforeDash.length >= 2 && !inputValue.endsWith('-')) {
                    beforeDash = beforeDash.substring(0, 2) + '-';
                }

                // Update the input value with formatted value
                $(this).val(beforeDash + afterDash);
                
            });
        });
    </script>
@endsection
