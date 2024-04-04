@extends('layouts.app')

@section('title')
    Reset Password
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
                        <source src="{{ asset('assets/hero.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    {{-- Dim Video using Overlay --}}
                    <div class="absolute inset-0 bg-black opacity-50"></div>

                    {{-- Text Overlay --}}
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                        <h1 class="text-5xl font-bold pb-4">PhilRice Training Database Management System</h1>
                    </div>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class="mt-12 flex flex-col items-center">
                    <h1 class="text-2xl xl:text-3xl font-extrabold">New Password</h1>
                    <div class="w-full flex-1 mt-8">

                        <div class="mx-auto max-w-xs">
                            <form action="" method="POST">
                                @csrf
                                @include('_message')
                                @if ($errors->any())
                                    <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                    type="password" name="password" placeholder="Password" id="password" onkeyup="validatePassword(this)" required />
                                <div id="password-error-message"></div>

                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                    type="password" name="confirm_password" placeholder="Confirm Password"
                                    id="confirm_password" onkeyup="matchPassword(this)" required />
                                <div id="password-match-message"></div>

                                {{-- Tailwind checkbox for showing password field --}}
                                <div class="mt-4 flex items-center">
                                    <input type="checkbox" id="show_password" onchange="togglePasswordVisibility()"
                                        class="form-checkbox h-5 w-5 text-green-500 transition duration-150 ease-in-out">
                                    <label for="show_password" class="ml-2 text-sm text-gray-600">Show Password</label>
                                </div>

                                <button type="submit"
                                    class="mt-5 tracking-wide font-semibold bg-green-500 text-gray-100 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <span class="ml-3">
                                        Submit
                                    </span>
                                </button>

                                {{-- Back to Login --}}
                                <a href="{{ url('/login') }}"
                                    class="block text-sm text-gray-600 my-4 hover:text-gray-900 text-right underline">Go
                                    Back to Login</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function validatePassword(inputField) {
            const password = inputField.value;
            const errorMessage = document.getElementById("password-error-message");
            errorMessage.textContent = ""; // Clear previous error message

            // Define password requirements
            const minLength = 8;
            const hasLowerCase = /[a-z]/.test(password);
            const hasUpperCase = /[A-Z]/.test(password);
            const hasNumber = /\d/.test(password);
            const hasSpecialChar = /[!@#$%^&*()]/.test(password);

            let isValid = true;

            // Check each requirement and update error message
            const errorList = [];
            if (password.length < minLength) {
                isValid = false;
                errorList.push("Password must be at least " + minLength + " characters long.");
            }
            if (!hasLowerCase) {
                isValid = false;
                errorList.push("Password must contain at least one lowercase letter (a-z).");
            }
            if (!hasUpperCase) {
                isValid = false;
                errorList.push("Password must contain at least one uppercase letter (A-Z).");
            }
            if (!hasNumber) {
                isValid = false;
                errorList.push("Password must contain at least one number (0-9).");
            }
            if (!hasSpecialChar) {
                isValid = false;
                errorList.push("Password must contain at least one special character (!@#$%^&*()).");
            }

            // Update error message with list and red color
            errorMessage.innerHTML = ""; // Clear previous content (optional)
            if (!isValid) {
                const errorElement = document.createElement("ul");
                errorElement.style.color = "red"; // Set error message color to red
                for (const error of errorList) {
                    const listItem = document.createElement("li");
                    listItem.textContent = error;
                    errorElement.appendChild(listItem);
                }
                errorMessage.appendChild(errorElement);
            }

            // You can use "isValid" for further actions like enabling/disabling submit button
            // based on password validity
        }

        function matchPassword(inputField) {
            var passInput = document.getElementById('password');
            const password = passInput.value;
            const confirm_password = inputField.value;
            const matchMessage = document.getElementById("password-match-message");
            matchMessage.textContent = ""; // Clear previous error message

            let isMatch = true;

            const errorList = [];
            if (password != confirm_password) {
                isMatch = false;
                errorList.push("Password and Confirm Password did not match.");
            } else {
                isMatch = true;
                errorList.push("Password and Confirm Password are match.");
            }

            // Update error message with list and red color
            matchMessage.innerHTML = ""; // Clear previous content (optional)
            if (!isMatch) {
                const errorElement = document.createElement("ul");
                errorElement.style.color = "red"; // Set error message color to red
                for (const error of errorList) {
                    const listItem = document.createElement("li");
                    listItem.textContent = error;
                    errorElement.appendChild(listItem);
                }
                matchMessage.appendChild(errorElement);
            }
            // Update match message with green color 
            else  {
                const errorElement = document.createElement("ul");
                errorElement.style.color = "green"; // Set match message color to green
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
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('confirm_password');
            var showPasswordCheckbox = document.getElementById('show_password');

            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
                confirmPasswordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                confirmPasswordInput.type = 'password';
            }
        }
    </script>
@endsection
