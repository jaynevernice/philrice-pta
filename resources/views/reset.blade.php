@extends('layouts.app')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="min-h-screen p-12 bg-gray-100 text-[#0B1215] flex justify-center items-center">
        <div class="max-w-lg w-full sm:m-10 bg-white shadow sm:rounded-lg flex flex-col justify-center">

            <div class="px-20 py-16 ">
                <h1 class="text-2xl xl:text-3xl font-extrabold text-center mb-8">New Password?</h1>

                <div class="text-center">
                    <p
                        class="text-sm text-gray-600 tracking-wide font-medium bg-white inline-block px-2 py-1 transform -translate-y-1/2">
                        Set a new password for your account.</p>
                </div>

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
                        type="password" name="password" placeholder="Password" id="password"
                        onkeyup="validatePassword(this)" required />
                    <div id="password-error-message"></div>

                    <input
                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                        type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password"
                        onkeyup="matchPassword(this)" required />
                    <div id="password-match-message"></div>

                    {{-- ShowPassword --}}
                    <div class="flex items-center justify-end my-4">
                        <input type="checkbox" id="show_password" onchange="togglePasswordVisibility()"
                            class="form-checkbox rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-600 dark:focus:ring-opacity-50 dark:text-blue-500">
                        <label for="showPasswordCheckbox"
                            class="text-sm font-medium text-gray-900 dark:text-white ml-2 cursor-pointer">Show
                            Password</label>
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
            else {
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
