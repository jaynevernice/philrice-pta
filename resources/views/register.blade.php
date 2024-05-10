@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="h-screen bg-gray-100 text-[#0B1215] flex justify-center bg-gradient-to-r from-[#D1DCD8] to-[#CDD9D5]">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1 drop-shadow-lg">

            {{-- Left Side --}}
            <div class="flex-1 bg-green-100 text-center hidden lg:flex">
                <div class="w-full overflow-hidden relative">
                    <img src="{{ asset('assets/philrice-1.png') }}" class="h-full object-cover w-full">

                    {{-- Dim Video using Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-r to-emerald-600 from-sky-400 opacity-30"></div>

                    {{-- Text Overlay --}}
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                        <h1 class="text-8xl font-bold pb-4 text-balance drop-shadow-lg">{{ config('app.name') }}</h1>
                    </div>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class="flex flex-col items-center">
                    <div class="w-full flex-1">

                        <div class="flex flex-row items-center justify-center mb-2">
                            <a href="{{ url('/login') }}">
                                <button type="button"
                                    class="w-56 text-gray-600 bg-white border-b-4 border-gray-300 focus:outline-none hover:bg-gray-100 hover:border-[#1A73E8] hover:text-[#1A73E8] focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">LOGIN</button>
                            </a>

                            <a href="{{ url('/register') }}">
                                <button type="button"
                                    class="w-56 text-[#1A73E8] bg-white border-b-4 border-[#1A73E8] focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">REGISTER</button>
                            </a>
                        </div>

                        <h1 class="text-2xl xl:text-3xl font-extrabold text-left mb-2">Get Started!</h1>
                        <p class="justify-right text-lg text-[#0B1215]">Enter your details to register.</p>


                        <ol id="stepper" class="flex items-stretch w-full my-4 sm:mb-5 mx-auto">
                            {{-- Step 1 --}}
                            <li
                                class="stepIndicator flex w-full items-center text-green-600 dark:text-green-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-green-100 after:border-4 after:inline-block dark:after:border-green-800">
                                <div
                                    class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full lg:h-12 lg:w-12 dark:bg-green-800 shrink-0">
                                    <box-icon name='user-detail' type='solid'></box-icon>
                                </div>
                            </li>

                            {{-- Step 2 --}}
                            <li
                                class="stepIndicator flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                                <div
                                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <box-icon type='solid' name='briefcase-alt'></box-icon>
                                </div>
                            </li>

                            {{-- Step 3 --}}
                            <li
                                class="stepIndicator flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                                <div
                                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <box-icon type='solid' name='lock'></box-icon>
                                </div>
                            </li>

                            {{-- Step 4 --}}
                            <li class="stepIndicator flex items-center">
                                <div
                                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <box-icon name='question-mark'></box-icon>
                                </div>
                            </li>
                        </ol>

                        @include('_message')
                        @if ($errors->any())
                            <script>
                                let errorMessage = "<ul>";
                                @foreach ($errors->all() as $error)
                                    errorMessage += "<li>{{ $error }}</li>";
                                @endforeach
                                errorMessage += "</ul>";

                                Swal.fire({
                                    title: 'Oops!',
                                    html: errorMessage,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            </script>
                        @endif
                        <form action="{{ route('register.store') }}" method="POST" id="registrationForm">
                            @csrf
                            {{-- Step 1 --}}
                            <div class="step">
                                <h3 class="mb-4 text-lg font-medium leading-none text-[#0B1215] dark:text-white">Personal
                                    Information</h3>
                                <div class="my-4">
                                    <div class="flex justify-between">
                                        <label for="first_name"
                                            class="block mb-2 text-sm font-medium text-[#0B1215] dark:text-white">First
                                            Name</label>
                                        <p id="fname_error"
                                            class="hidden animate-pulse text-xs text-center text-red-600 dark:text-red-400">
                                            Your
                                            First Name is <span class="font-medium">Required</span>
                                        </p>
                                    </div>
                                    <input required type="text" id="first_name" name="first_name"
                                        value="{{ old('first_name') }}"
                                        class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                </div>
                                <div class="my-4">
                                    <div class="flex justify-between">
                                        <label for="mi"
                                            class="block mb-2 text-sm font-medium text-[#0B1215] dark:text-white">Middle
                                            Initial</label>
                                        <p id="mi_error"
                                            class="hidden animate-pulse text-xs text-center text-red-600 dark:text-red-400">
                                            Your
                                            Middle Initial is <span class="font-medium">Required</span></p>
                                    </div>
                                    <input required type="text" id="mi" name="mi" value="{{ old('mi') }}"
                                        class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="my-4">
                                    <div class="flex justify-between">
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-medium text-[#0B1215] dark:text-white">Last
                                            Name</label>
                                        <p id="lname_error"
                                            class="hidden animate-pulse text-xs text-center text-red-600 dark:text-red-400">
                                            Your
                                            Last Name is <span class="font-medium">Required</span></p>
                                    </div>
                                    <input required type="text" id="last_name" name="last_name"
                                        value="{{ old('last_name') }}"
                                        class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>

                            {{-- Step 2 --}}
                            <div class="step">
                                <div>
                                    <h3 class="mb-4 text-lg font-medium leading-none text-[#0B1215] dark:text-white">
                                        Professional Information</h3>
                                    {{-- Email --}}
                                    <div class="my-2">
                                        <div class="flex justify-between">
                                            <label for="email"
                                                class="block mb-1 text-sm font-medium text-[#0B1215] dark:text-white">Email</label>
                                            <p id="email_error"
                                                class="hidden animate-pulse text-xs text-center text-red-600 dark:text-red-400">
                                                Your Email is <span class="font-medium"> Required</span></p>
                                            <p id="email_taken_error"
                                                class="hidden animate-pulse text-xs text-center text-red-600 dark:text-red-400">
                                                <span class="font-medium">Oops! </span>This email is already taken
                                            </p>
                                        </div>
                                        <input type="email" name="email" value="{{ old('email') }}" id="email"
                                            class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    {{-- PhilRice ID --}}
                                    <div class="my-2" id="idField">
                                        <div class="flex justify-between">
                                            <label for="philrice_id"
                                                class="block mb-1 text-sm font-medium text-[#0B1215] dark:text-white">PhilRice
                                                ID</label>
                                            <p id="philrice_id_error"
                                                class="hidden animate-pulse text-xs text-center text-red-600 dark:text-red-400">
                                                Your
                                                PhilRice ID is <span class="font-medium">Required</span></p>
                                            <p id="philrice_id_taken_error"
                                                class="hidden animate-pulse text-xs  text-center text-red-600 dark:text-red-400">
                                                <span class="font-medium">Oops!</span> This PhilRice ID is already taken
                                            </p>
                                            <p id="philrice_id_syntax_error"
                                                class="hidden animate-pulse text-xs  text-center text-red-600 dark:text-red-400">
                                                <span class="font-medium">Oops!</span> Please ensure your PhilRice ID
                                                follows the correct syntax.
                                            </p>
                                        </div>
                                        <input type="text" id="philrice_id" name="philrice_id"
                                            value="{{ old('philrice_id') }}" id="philrice_id"
                                            class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    {{-- <form> --}}
                                    <div class="grid grid-cols-2 my-1">
                                        {{-- Station --}}
                                        <div class="relative mr-1 my-1" id="stationField">
                                            <div class="flex justify-between">
                                                <label for="station"
                                                    class="block text-sm font-medium text-[#0B1215] mb-1">Station</label>
                                                <p id="station_error"
                                                    class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                                    Your
                                                    Station is <span class="font-medium">Required</span></p>
                                            </div>
                                            <select name="station" id="station" {{ old('station') }} required
                                                class="bg-gray-50 block appearance-none w-full h-10 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                                <option selected disabled>Station</option>
                                                @foreach ($stations as $data)
                                                    <option value="{{ $data->id }}">PhilRice {{ $data->station }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Division --}}
                                        <div class="relative mr-1 my-1" id="divisionField">
                                            <div class="flex justify-between">
                                                <label for="division"
                                                    class="block text-sm font-medium text-[#0B1215] mb-1">Division</label>
                                                <p id="division_error"
                                                    class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                                    Your
                                                    Division is <span class="font-medium">Required</span></p>
                                            </div>
                                            <select name="division" id="division"
                                                class="bg-gray-50 block appearance-none w-full h-10 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                                required>
                                                <option value="" selected disabled>Division</option>
                                            </select>
                                        </div>

                                    </div>

                                    {{-- Position --}}
                                    <div class="relative my-2" id="positionField">
                                        <div class="flex justify-between">
                                            <label for="position"
                                                class="block text-sm font-medium text-[#0B1215] mb-1">Position</label>
                                            <p id="position_error"
                                                class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                                Your
                                                Position is <span class="font-medium">Required</span></p>
                                        </div>
                                        <select name="position" id="position"
                                            class="bg-gray-50 block appearance-none w-full h-10 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                            required>
                                            <option value="" selected disabled>Position</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Step 3 --}}
                            <div class="step">
                                <h3 class="mb-4 text-lg font-medium leading-none text-[#0B1215] dark:text-white">
                                    Credentials
                                </h3>
                                <div class="mb-2">
                                    <div class="flex justify-between">
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-[#0B1215] dark:text-white">Password</label>
                                        <p id="password_validate"
                                            class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                        </p>
                                        <p id="password_error"
                                            class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                            Your
                                            Password is <span class="font-medium">Required</span></p>
                                    </div>
                                    <input type="password" name="password" id="password"
                                        onkeyup="validatePassword(this)" required
                                        class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="mb-2">
                                    <div class="flex justify-between">
                                        <label for="confirm_password"
                                            class="block mb-2 text-sm font-medium text-[#0B1215] dark:text-white">Confirm
                                            password</label>
                                        <p id="confirm_password_validate"
                                            class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                        </p>
                                        <p id="confirm_password_error"
                                            class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                            Confirm Your Password</p>
                                    </div>
                                    <input type="password" name="password_confirmation" id="confirm_password"
                                        onkeyup="matchPassword(this)" required
                                        class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                {{-- Show Password --}}
                                <div class="flex items-center justify-end my-2">
                                    <input type="checkbox" id="showPasswordCheckbox"
                                        class="form-checkbox rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-600 dark:focus:ring-opacity-50 dark:text-blue-500">
                                    <label for="showPasswordCheckbox"
                                        class="text-sm font-medium text-[#0B1215] dark:text-white ml-2 cursor-pointer">Show
                                        Password</label>
                                </div>
                            </div>

                            {{-- Step 4 --}}
                            <div class="step">
                                <h3 class="mb-4 text-lg font-medium leading-none text-[#0B1215] dark:text-white">Security
                                    Questions</h3>
                                <p class="text-sm text-gray-600 mb-4 dark:text-gray-400">These will be used to verify your
                                    identity and reset your password in case you forget it.</p>
                                <div class="my-2">
                                    <div class="flex justify-between">
                                        <label for="sq1"
                                            class="block mb-2 text-sm font-medium text-[#0B1215] dark:text-white">What is
                                            your
                                            favorite color?</label>
                                        <p id="sq1_error"
                                            class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                             Answer is <span class="font-medium">Required</span>
                                        </p>
                                    </div>
                                    <input type="text" id="sq1" name="sq1" value="{{ old('sq1') }}"
                                        class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="my-2">
                                    <div class="flex justify-between">
                                        <label for="sq2"
                                            class="block mb-2 text-sm font-medium text-[#0B1215] dark:text-white">What
                                            province were you born in?</label>
                                        <p id="sq2_error"
                                            class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                            Answer is <span class="font-medium">Required</span>
                                        </p>
                                    </div>
                                    <input type="text" id="sq2" name="sq2" value="{{ old('sq2') }}"
                                        class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="my-2">
                                    <div class="flex justify-between">
                                        <label for="sq3"
                                            class="block mb-2 text-sm font-medium text-[#0B1215] dark:text-white">What is
                                            the
                                            name of your elementary school?</label>
                                        <p id="sq3_error"
                                            class="hidden animate-pulse text-xs text-center mr-2 text-red-600 dark:text-red-400">
                                            Answer is <span class="font-medium">Required</span>
                                        </p>
                                    </div>
                                    <input type="text" id="sq3" name="sq3" value="{{ old('sq3') }}"
                                        class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>

                            <div class="form-footer flex gap-3 my-4">
                                <button type="button" id="prevBtn"
                                    class="flex-1 focus:outline-none border border-gray-300 py-2 px-5 rounded-lg shadow-sm text-center text-gray-700 bg-white hover:bg-gray-100 text-lg"
                                    onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn"
                                    class="flex-1 border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-green-600 hover:bg-green-700 text-lg"
                                    onclick="nextPrev(1)">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        function validatePassword(inputField) {
            const password = inputField.value;
            var errorMessage = document.getElementById("password_validate");
            errorMessage.textContent = "";
            const nextBtn = document.getElementById('nextBtn');

            const minLength = 8;
            const hasLowerCase = /[a-z]/.test(password);
            const hasUpperCase = /[A-Z]/.test(password);
            const hasNumber = /\d/.test(password);
            const hasSpecialChar = /[!@#$%^&*()]/.test(password);

            let isValid = true;

            if (password.length < minLength) {
                isValid = false;
                errorMessage.textContent = "Password must be at least " + minLength + " characters long.";
                return; 
            }
            if (!hasLowerCase) {
                isValid = false;
                errorMessage.textContent = "Password must contain at least one lowercase letter (a-z).";
                return; 
            }
            if (!hasUpperCase) {
                isValid = false;
                errorMessage.textContent = "Password must contain at least one uppercase letter (A-Z).";
                return;
            }
            if (!hasNumber) {
                isValid = false;
                errorMessage.textContent = "Password must contain at least one number (0-9).";
                return;
            }
            if (!hasSpecialChar) {
                isValid = false;
                errorMessage.textContent = "Password must contain at least one special character (!@#$%^&*()).";
                return; 
            }
            errorMessage.textContent = "";
        }

        function matchPassword(inputField) {
            const password = $('#password').val();
            const confirm_password = inputField.value;
            const matchMessage = document.getElementById("confirm_password_validate");
            matchMessage.textContent = "";

            let isMatch = true;

            const errorList = [];
            if (password != confirm_password) {
                isMatch = false;
                errorList.push("Passwords do not match.");
            } else {
                isMatch = true;
                errorList.push("Passwords match.");
            }

            matchMessage.innerHTML = ""; 
            if (!isMatch) {
                const errorElement = document.createElement("ul");
                errorElement.style.color = "red"; 
                for (const error of errorList) {
                    const listItem = document.createElement("li");
                    listItem.textContent = error;
                    errorElement.appendChild(listItem);
                }
                matchMessage.appendChild(errorElement);
            }
            else {
                const errorElement = document.createElement("ul");
                errorElement.style.color = "green"; 
                for (const error of errorList) {
                    const listItem = document.createElement("li");
                    listItem.textContent = error;
                    errorElement.appendChild(listItem);
                }
                matchMessage.appendChild(errorElement);
            }
        }
    </script>

    <script>
        document.getElementById("showPasswordCheckbox").addEventListener("change", function() {
            var passwordInput = document.getElementById("password");
            var confirmPasswordInput = document.getElementById("confirm_password");

            if (this.checked) {
                passwordInput.type = "text";
                confirmPasswordInput.type = "text";
            } else {
                passwordInput.type = "password";
                confirmPasswordInput.type = "password";
            }
        });
    </script>

    <script>
        var currentStep = 0;
        updateStep(currentStep); 

        function updateStep(n) {
            var steps = document.getElementsByClassName("stepIndicator");
            var x = document.getElementsByClassName("step");
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("step");
            if (n == 1 && !validateForm()) return false;
            x[currentStep].style.display = "none";
            currentStep = currentStep + n;
            if (currentStep >= x.length) {
                document.getElementById("registrationForm").submit();
                return false;
            }
            updateStep(currentStep);
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentStep].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }
            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentStep].classList.add("finish");
            }
            return valid; 
        }


        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].classList.remove("active");
            }
            x[n].classList.add("active");
        }
    </script>

    <script>
        var current = 1; 

        document.getElementById("nextBtn").addEventListener("click", function() {
            var step2Div = document.querySelector('#stepper li:nth-child(2) div');
            var step2Li = document.querySelector('#stepper li:nth-child(2)');
            var step3Div = document.querySelector('#stepper li:nth-child(3) div');
            var step3Li = document.querySelector('#stepper li:nth-child(3)');
            var step4Div = document.querySelector('#stepper li:nth-child(4) div');

            if (current === 1) {
                step2Div.classList.add("bg-green-100");
                step2Li.classList.remove("after:border-gray-100");
                step2Li.classList.add("after:border-green-100");
                current = 2;
            } else if (current === 2) {
                step3Div.classList.add("bg-green-100");
                step3Li.classList.remove("after:border-gray-100");
                step3Li.classList.add("after:border-green-100");
                current = 3;
            } else if (current === 3) {
                step4Div.classList.add("bg-green-100");
                current = 4;
            }
        });

        document.getElementById("prevBtn").addEventListener("click", function() {
            var step2Div = document.querySelector('#stepper li:nth-child(2) div');
            var step2Li = document.querySelector('#stepper li:nth-child(2)');
            var step3Div = document.querySelector('#stepper li:nth-child(3) div');
            var step3Li = document.querySelector('#stepper li:nth-child(3)');
            var step4Div = document.querySelector('#stepper li:nth-child(4) div');

            if (current === 4) {
                step4Div.classList.remove("bg-green-100");
                current = 3;
            } else if (current === 3) {
                step3Div.classList.remove("bg-green-100");
                current = 2;
            } else if (current === 2) {
                step2Div.classList.remove("bg-green-100");
                step2Li.classList.remove("after:border-green-100");
                step2Li.classList.add("after:border-gray-100");
                current = 1;
            }
        });
    </script>

    {{-- Password Toggle --}}
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

    {{-- Changing Dropdown Choices in Registration --}}
    <script>
        $(document).ready(function() {
            $('#station').on('change', function() {
                var idStation = this.value;
                $("#division").html('');
                $.ajax({
                    url: "{{ route('register.fetchDivisions') }}",
                    type: "POST",
                    data: {
                        station_id: idStation,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',

                    success: function(result) {
                        $('#division').html(
                            '<option selected disabled value="">Division</option>');
                        $.each(result.divisions, function(key, value) {
                            $("#division").append('<option value="' + value.id + '">' +
                                value.division + '</option>');
                        });
                        $('#position').html(
                            '<option selected disabled value="">Position</option>');
                    }
                });
            });

            // division dropdown change event
            $('#division').on('change', function() {
                var idDivision = this.value;
                $("#position").html('');
                $.ajax({
                    url: "{{ route('register.fetchPositions') }}",
                    type: "POST",
                    data: {
                        division_id: idDivision,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',

                    success: function(res) {
                        $('#position').html(
                            '<option selected disabled value="">Position</option>');
                        $.each(res.positions, function(key, value) {
                            $("#position").append('<option value="' + value.id + '">' +
                                value.position + '</option>');
                        });
                    }
                });
            });

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

                // check in the database if PhilRice ID already exists
                var philriceID = $('#philrice_id').val(); // Get the current PhilRice ID value
                // $("#philriceid-error-message").css("color", "red");
                $.ajax({
                    url: "{{ route('check-if-exists') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                        checkPhilriceId: true,
                        philriceID: philriceID, // Send PhilRice ID as data
                    },
                    success: function(result) {
                        if (result.exists) {
                            $("#philrice_id_error").addClass('hidden');
                            $("#philrice_id_taken_error").removeClass('hidden');
                            $('#philrice_id').removeClass(
                                    'border-gray-300 text-gray-900 border-green-600 text-green-600'
                                )
                                .addClass('border-red-600 text-red-600');
                        } else {
                            $("#philrice_id_taken_error").addClass('hidden');
                            $("#philrice_id_error").addClass('hidden');
                            $('#philrice_id').removeClass(
                                    'border-gray-300 text-gray-900 border-red-600 text-red-600')
                                .addClass('border-green-600 text-green-600');
                        }
                    },
                    error: function(error) {
                        alert('Error checking your PhilRice ID');
                    }
                });
            });

            // CHECK EMAIL IF ALREADY TAKEN
            $('#email').on('input', function() {
                var email = $('#email').val(); // Get the current Email value
                // $("#email-error-message").css("color", "red");
                $.ajax({
                    url: "{{ route('check-if-exists') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                        checkEmail: true,
                        email: email, // Send Email as data
                    },
                    success: function(result) {
                        if (result.exists) {
                            // $("#email-error-message").text("Your Email is already taken!");
                            $("#email_error").addClass('hidden');
                            $("#email_taken_error").removeClass('hidden');
                            $('#email').removeClass(
                                    'border-gray-300 text-gray-900 border-green-600 text-green-600'
                                )
                                .addClass('border-red-600 text-red-600');
                        } else {
                            $("#email_taken_error").addClass('hidden');
                            $("#email_error").addClass('hidden');
                            $('#email').removeClass(
                                    'border-gray-300 text-gray-900 border-red-600 text-red-600')
                                .addClass('border-green-600 text-green-600');
                        }
                    },
                    error: function(error) {
                        alert('Error checking your Email');
                    }
                });
            });
        });
    </script>

    {{-- Live Validation --}}
    <script>
        // Step 1
        $('#first_name').on('keypress', function(event) {
            var fname = $(this).val().trim();
            if (fname !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#fname_error').addClass('hidden');
            }

            var mi = $('#mi').val().trim();
            var lname = $('#last_name').val().trim();
            var email = $('#email').val().trim();
            var philriceId = $('#philrice_id').val().trim();
            var station = $('#station').val();
            var division = $('#division').val();
            var position = $('#position').val();

            if (!mi) {
                $('#mi').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#mi_error').removeClass('hidden');
            }

            if (!lname) {
                $('#last_name').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#lname_error').removeClass('hidden');
            }

            if (!email) {
                $('#email').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#email_error').removeClass('hidden');
            }

            if (!philriceId) {
                $('#philrice_id').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#philrice_id_error').removeClass('hidden');
            }

            if (!station) {
                $('#station').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#station_error').removeClass('hidden');
            }

            if (!division) {
                $('#division').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#division_error').removeClass('hidden');
            }

            if (!position) {
                $('#position').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#position_error').removeClass('hidden');
            }
        });

        $('#mi').on('keypress', function(event) {
            var mi = $(this).val().trim();
            if (mi !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#mi_error').addClass('hidden');
            }

            var fname = $('#first_name').val().trim();
            var lname = $('#last_name').val().trim();

            if (!fname) {
                $('#first_name').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#fname_error').removeClass('hidden');
            }

            if (!lname) {
                $('#last_name').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#lname_error').removeClass('hidden');
            }
        });

        $('#last_name').on('keypress', function(event) {
            var lname = $(this).val().trim();
            if (lname !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#lname_error').addClass('hidden');
            }

            var fname = $('#first_name').val().trim();
            var mi = $('#mi').val().trim();

            if (!fname) {
                $('#first_name').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#fname_error').removeClass('hidden');
            }

            if (!mi) {
                $('#mi').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#mi_error').removeClass('hidden');
            }
        });

        // Step 2
        $('#email').on('keypress', function(event) {
            var email = $(this).val();
            if (email !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#email_error').addClass('hidden');
            }

            var password = $('#password').val().trim();
            var confPassword = $('#confirm_password').val().trim();

            if (!password) {
                $('#password').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#password_error').removeClass('hidden');
            }

            if (!confPassword) {
                $('#confirm_password').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#confirm_password_error').removeClass('hidden');
            }
        });

        $('#philrice_id').on('keypress', function(event) {
            var charCode = event.which ? event.which : event.keyCode;

            if (charCode < 48 || charCode > 57) {
                event.preventDefault();
                $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#philrice_id_syntax_error').removeClass('hidden').addClass('items-center');
                $('#philrice_id_error').addClass('hidden');
            } else {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600').addClass(
                    'border-green-600 text-green-600');
                $('#philrice_id_error').addClass('hidden');
                $('#philrice_id_syntax_error').addClass('hidden');
            }
        });

        $('#station').change(function() {
            var station = $(this).val();
            if (station !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#station_error').addClass('hidden');
            }
        });

        $('#division').change(function() {
            var division = $(this).val();
            if (division !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#division_error').addClass('hidden');
            }
        });

        $('#position').change(function() {
            var position = $(this).val();
            if (position !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#position_error').addClass('hidden');
            }
        });

        $('#password').on('keypress', function(event) {
            var password = $(this).val().trim();
            if (password !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#password_error').addClass('hidden');
                $('#password_validate').removeClass('hidden');
            }

            var sq1 = $('#sq1').val().trim();
            var sq2 = $('#sq2').val().trim();
            var sq3 = $('#sq3').val().trim();

            if (!sq1) {
                $('#sq1').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#sq1_error').removeClass('hidden');
            }

            if (!sq2) {
                $('#sq2').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#sq2_error').removeClass('hidden');
            }

            if (!sq1) {
                $('#sq3').removeClass(
                        'border-gray-300 text-gray-900 border-green-600 text-green-600')
                    .addClass('border-red-600 text-red-600');
                $('#sq3_error').removeClass('hidden');
            }
        });

        $('#confirm_password').on('keypress', function(event) {
            var confPassword = $(this).val().trim();
            if (confPassword !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#confirm_password_error').addClass('hidden');
                $('#confirm_password_validate').removeClass('hidden');
            }
        });

        // Step 4
        $('#sq1').on('keypress', function(event) {
            var sq1 = $(this).val().trim();
            if (sq1 !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#sq1_error').addClass('hidden');
            }
        });

        $('#sq2').on('keypress', function(event) {
            var sq2 = $(this).val().trim();
            if (sq2 !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#sq2_error').addClass('hidden');
            }
        });

        $('#sq3').on('keypress', function(event) {
            var sq3 = $(this).val().trim();
            if (sq3 !== "") {
                $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                    .addClass('border-green-600 text-green-600');
                $('#sq3_error').addClass('hidden');
            }
        });
    </script>
@endsection
