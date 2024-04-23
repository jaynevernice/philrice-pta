@extends('layouts.dashboard')

@section('title')
    Manage Profile
@endsection

@section('content')
    <main class="pt-20 h-full w-[1100px] mx-auto bg-gray-50">
        <div class="px-20 py-2 mb-10 shadow-md rounded-2xl bg-white mx-auto border-solid border-2 border-gray-100">

            <form id="profileForm" action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex w-full items-center">
                    {{-- Profile Picture --}}
                    <div class="m-10">
                        <div class="relative flex items-center">
                            <label for="profile_picture"
                                class="h-40 w-40 rounded-full bg-gray-100 relative cursor-pointer border border-gray-900 overflow-visible">

                                {{-- Placeholder for current profile Picture --}}
                                <img alt="Current Profile Picture" class="h-full w-full rounded-full object-cover"
                                    id="profile_picture_preview"
                                    @if (Auth::check() && Auth::user()->profile_picture) src="{{ Auth::user()->profile_picture }}"
                    @else
                        src="{{ asset('assets/icon.jpg') }}" @endif>

                                {{-- Edit pencil button --}}
                                <div class="absolute bottom-1 right-1 bg-yellow-200 rounded-full p-1 text-center">
                                    <box-icon name='pencil' class="w-5 h-5 m-1"></box-icon>
                                </div>
                            </label>
                            <input id="profile_picture" name="profile_picture" type="file" class="sr-only"
                                accept="image/*" onchange="previewProfilePicture(event)">
                        </div>
                    </div>

                    <div class="ml-10">
                        <h1 class="text-2xl font-bold">{{ old('first_name', Auth::user()->first_name) }}
                            {{ old('mi', Auth::user()->mi) }} {{ old('last_name', Auth::user()->last_name) }}</h1>
                        <p class="text-gray-600">{{ old('email', Auth::user()->email) }}</p>
                        <p class="text-gray-600">{{ old('philrice_id', Auth::user()->philrice_id) }}</p>
                    </div>
                </div>

                {{-- Profile --}}
                <div class="flex items-center mb-4">
                    <box-icon type='solid' name='user-account' color="#0B1215" class="mr-2"></box-icon>
                    <h2 class="text-lg font-extrabold text-[#0B1215]">Profile</h2>
                </div>


                <div class="grid grid-cols-2 gap-x-4 items-center mb-4">
                    <div>
                        <label for="station" class="block text-sm font-medium text-[#0B1215] mb-1">Station</label>
                        <select
                            class="block bg-gray-50 appearance-none w-full h-10 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                            id="station">
                            <option>{{ old('station', Auth::user()->station) }}</option>
                        </select>
                    </div>

                    <div>
                        <label for="division" class="block text-sm font-medium text-[#0B1215] mb-1">Division</label>
                        <select
                            class="block bg-gray-50 appearance-none w-full h-10 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                            id="division">
                            <option>{{ old('division', Auth::user()->division) }}</option>
                        </select>
                    </div>
                </div>

                <div class="flex w-full items-center mb-4">
                    <div class="my-2 flex-1">
                        <label for="position" class="block text-sm font-medium text-[#0B1215] mb-1">Position</label>
                        <select
                            class="block bg-gray-50 appearance-none w-full h-10 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                            id="position">
                            <option>{{ old('position', Auth::user()->position) }}</option>
                        </select>
                    </div>
                </div>

                {{-- Security Questions --}}
                <div class="flex items-center mb-4">
                    <box-icon type='solid' name='user-account' color="#0B1215" class="mr-2"></box-icon>
                    <h2 class="text-lg font-extrabold text-[#0B1215]">Security Questions</h2>
                </div>

                <div class="w-full items-center mb-4">
                    <div class="mb-2">
                        <label for="sq1" class="block mb-2 text-sm font-medium text-[#0B1215]">What is your favorite
                            color?</label>
                        <input type="text" id="sq1" name="sq1"
                            class="h-10 bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                            placeholder="Security Question 1" value="{{ old('sq1', Auth::user()->sq1) }}">
                        {{-- @if (Auth::check()) value="{{ Auth::user()->sq1 }}" @endif> --}}
                    </div>

                    <div class="mb-2">
                        <label for="sq2" class="block mb-2 text-sm font-medium text-[#0B1215]">What province were you
                            born
                            in?</label>
                        <input type="text" id="sq2" name="sq2"
                            class="h-10 bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                            placeholder="Security Question 2" value="{{ old('sq2', Auth::user()->sq2) }}">
                        {{-- @if (Auth::check()) value="{{ Auth::user()->sq2 }}" @endif> --}}
                    </div>

                    <div class="mb-2">
                        <label for="sq3" class="block mb-2 text-sm font-medium text-[#0B1215]">What is the name of your
                            elementary school?</label>
                        <input type="text" id="sq3" name="sq3"
                            class="h-10 bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                            placeholder="Security Question 3" value="{{ old('sq3', Auth::user()->sq3) }}">
                        {{-- @if (Auth::check()) value="{{ Auth::user()->sq3 }}" @endif> --}}
                    </div>
                </div>

                {{-- Password --}}
                <div class="flex items-center mb-4">
                    <box-icon name='lock' type='solid' color="#0B1215" class="mr-2"></box-icon>
                    <h2 class="text-lg font-extrabold text-[#0B1215]">Password</h2>
                </div>

                <div class="w-full items-center mb-4">
                    <div class="my-2 w-full">
                        <label for="old_password" class="block mb-2 text-sm font-medium text-[#0B1215]">Old Password</label>
                        <input type="password" name="old_password" id="old_password" autocomplete="off"
                            class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                    </div>
                    <div class="my-2 w-full">
                        <label for="password" class="block mb-2 text-sm font-medium text-[#0B1215]">New Password</label>
                        <input type="password" name="password" id="password" autocomplete="off"
                            onkeyup="validatePasswords()"
                            class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                        <div id="password-error-message"></div>
                    </div>
                    <div class="my-2 w-full">
                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-[#0B1215]">Confirm
                            password</label>
                        <input type="password" name="password_confirmation" id="confirm_password" autocomplete="off"
                            onkeyup="validatePasswords()"
                            class="bg-gray-50 border border-gray-300 text-[#0B1215] text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                        <div id="password-match-message"></div>
                    </div>
                    {{-- Show Password --}}
                    <div class="flex items-center justify-end my-2 w-full">
                        <input type="checkbox" id="showPasswordCheckbox"
                            class="form-checkbox rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            onchange="togglePasswordVisibility('old_password'); togglePasswordVisibility('password'); togglePasswordVisibility('confirm_password');">
                        <label for="showPasswordCheckbox"
                            class="text-sm font-medium text-[#0B1215] ml-2 cursor-pointer">Show
                            Password</label>
                    </div>
                </div>

                {{-- Save and Go Back --}}
                {{-- href="{{ url()->previous() }}" --}}
                <div class="flex justify-end w-full my-8">
                    <a @if (auth()->user()->user_type === 'encoder') href="{{ route('encoder.overview') }}"
                        @elseif (auth()->user()->user_type === 'admin')
                        href="{{ route('admin.overview') }}"
                        @elseif (auth()->user()->user_type === 'super_admin')
                        href="{{ route('super_admin.overview') }}" @endif
                        class="text-gray-700 hover:text-[#0B1215] font-medium rounded-lg text-sm px-3 py-2.5">Go Back</a>
                    <button type="submit" id="saveProfileBtn"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
                </div>
            </form>
        </div>
    </main>
@endsection


@section('scripts')
    {{-- Show All Password --}}
    <script>
        document.getElementById("showPasswordCheckbox").addEventListener("change", function() {
            var oldPasswordInput = document.getElementById("old_password");
            var newPasswordInput = document.getElementById("password");
            var confirmNewPasswordInput = document.getElementById("confirm_password");

            if (this.checked) {
                oldPasswordInput.type = "text";
                newPasswordInput.type = "text";
                confirmNewPasswordInput.type = "text";
            } else {
                oldPasswordInput.type = "password";
                newPasswordInput.type = "password";
                confirmNewPasswordInput.type = "password";
            }
        });
    </script>

    {{-- Script para maidisplay kaagad sa div yung sinelect sa file prompt --}}
    <script>
        function previewProfilePicture(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile_picture_preview').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    {{-- Live Password Validation --}}
    <script>
        function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            const errorMessage = document.getElementById('password-error-message');
            const matchMessage = document.getElementById('password-match-message');

            errorMessage.textContent = ''; // Clear previous error message
            errorMessage.style.color = "red";
            matchMessage.textContent = ''; // Clear previous match message

            // Define password requirements
            const minLength = 8;
            const hasLowerCase = /[a-z]/.test(password);
            const hasUpperCase = /[A-Z]/.test(password);
            const hasNumber = /\d/.test(password);
            const hasSpecialChar = /[!@#$%^&*()]/.test(password);

            let isValid = true;

            const errorList = [];

            // Check each requirement and update error message
            if (password.length < minLength) {
                isValid = false;
                errorMessage.textContent = "Your new password must be at least " + minLength + " characters long.";
                return; // Exit the function early
            }
            if (!hasLowerCase) {
                isValid = false;
                errorMessage.textContent = "Your new password must contain at least one lowercase letter (a-z).";
                return; // Exit the function early
            }
            if (!hasUpperCase) {
                isValid = false;
                errorMessage.textContent = "Your new password must contain at least one uppercase letter (A-Z).";
                return; // Exit the function early
            }
            if (!hasNumber) {
                isValid = false;
                errorMessage.textContent = "Your new password must contain at least one number (0-9).";
                return; // Exit the function early
            }
            if (!hasSpecialChar) {
                isValid = false;
                errorMessage.textContent = "Your new password must contain at least one special character (!@#$%^&*()).";
                return; // Exit the function early
            }

            // If all requirements are met, clear the error message
            errorMessage.textContent = "";

            // Update error message with list and red color
            if (!isValid) {
                errorMessage.style.color = 'red';
                errorList.forEach(function(error) {
                    errorMessage.innerHTML += '<li>' + error + '</li>';
                });
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                isValid = false;
                matchMessage.style.color = 'red';
                matchMessage.textContent = 'Passwords do not match.';
            } else {
                matchMessage.style.color = 'green';
                matchMessage.textContent = 'Passwords match.';
            }
        }

        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to the save button
            document.getElementById('saveProfileBtn').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default form submission behavior

                // Show SweetAlert2 confirmation dialog
                Swal.fire({
                    title: 'Confirm Changes',
                    text: 'Are you sure you want to save the changes?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form if confirmed
                        document.getElementById('profileForm').submit();
                        Swal.fire({
                            title: "Update Successful!",
                            text: "Your profile has been updated successfully.",
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while updating your profile. Please try again later.',
                            icon: 'error'
                        });
                    }
                });
            });
        });
    </script>
@endsection
