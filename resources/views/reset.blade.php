<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>

    {{-- Flowbite JS CDN --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    {{-- Boxicons CDN --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    @vite('resources/css/app.css')
</head>
<body>
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
                            <form action="{{ route('auth_login') }}" method="POST">
                                @include('_message')
                                @csrf

                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                    type="password" name="password" placeholder="Password" id="password" />

                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                    type="password" name="password" placeholder="Confirm Password" id="confirm_password" />

                                {{-- Tailwind checkbox for showing password field --}}
                                <div class="mt-4 flex items-center">
                                    <input type="checkbox" id="show_password" onchange="togglePasswordVisibility()" class="form-checkbox h-5 w-5 text-green-500 transition duration-150 ease-in-out">
                                    <label for="show_password" class="ml-2 text-sm text-gray-600">Show Password</label>
                                </div>
                                
                                <button
                                    type="submit" class="mt-5 tracking-wide font-semibold bg-green-500 text-gray-100 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <span class="ml-3">
                                        Submit
                                    </span>
                                </button>

                                {{-- Back to Login --}}
                                <a href="{{ url('/login') }}" class="block text-sm text-gray-600 my-4 hover:text-gray-900 text-right underline">Go Back to Login</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>