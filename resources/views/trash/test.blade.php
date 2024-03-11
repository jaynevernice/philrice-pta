<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    {{-- Flowbite JS CDN --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    {{-- Boxicons CDN --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    @vite('resources/css/app.css')

    {{-- jQuery CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
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
                        <source src="{{ asset('assets/training.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    {{-- Dim Video using Overlay --}}
                    <div class="absolute inset-0 bg-black opacity-50"></div>

                    {{-- Text Overlay --}}
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                        <h1 class="text-5xl font-bold pb-4">Training Records <br> Analysis and Charting <br> for Enhanced Results</h1>
                    </div>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                {{-- <div class="mt-12 flex flex-col items-center"> --}}
                <div class="flex flex-col items-center">
                    <h1 class="text-2xl xl:text-3xl font-extrabold">Register</h1>
                    {{-- <div class="w-full flex-1 mt-8"> --}}
                    <div class="w-full flex-1">

                        {{-- <div class="mx-auto max-w-xs"> --}}
                        <div class="mx-auto my-3">
                            <form action="{{ route('auth_login') }}" method="POST">
                                {{-- @include('_message') --}}
                                @csrf


                                
                                {{-- PhilRice Staff or Not --}}
                                <label for="staff" class="block mb-2 text-sm font-medium text-gray-900">What kind of user are you?</label> 
                                <div class="grid grid-cols-2 mb-4">                            
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 mr-1">
                                        <input id="bordered-radio-2" type="radio" value="non-philrice" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required checked onclick="showForm('non-philrice')">
                                        <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Non-PhilRice Staff</label>
                                    </div>
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 ml-1">
                                        <input id="bordered-radio-1" type="radio" value="philrice" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required onclick="showForm('philrice')">
                                        <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">PhilRice Staff</label>
                                    </div>
                                    
                                </div>

                                <!-- PhilRice Staff Form -->
                                <div id="philrice-form" style="display: none;">
                                    
                                    <div class="grid grid-cols-3 mb-2">
                                        <div class="mr-1">
                                            <label for="philrice_id" class="block mb-1 text-sm font-medium text-gray-900">PhilRice ID</label> 
                                            <input class="w-full h-10 px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" name="philrice_id" placeholder="PhilRice ID" />
                                        </div>
                                        <div class="ml-1 col-span-2">
                                            <label for="staff" class="block mb-1 text-sm font-medium text-gray-900">Email</label> 
                                            <input class="w-full h-10 px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="email" name="email" placeholder="Email" />
                                        </div>
                                    </div>

                                    <label for="full_name" class="block mb-1 text-sm font-medium text-gray-900">Full Name</label> 
                                    <div class="grid grid-cols-3 mb-2">
                                        <div class="mr-1">
                                            <input class="w-full h-10 px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" name="first_name" placeholder="Given" />
                                        </div>
                                        <div class="mr-1 ">
                                            <input class="w-full h-10 px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" name="last_name" placeholder="Last" />
                                        </div>
                                        <div>
                                            <input class="w-full h-10 px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" name="last_name" placeholder="Suffix" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 mb-2">
                                        <div class="relative mr-1">
                                            <label for="position" class="block text-sm font-medium text-gray-900 mb-1">Position</label> 
                                            <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="position">
                                                <option selected disabled>Select Position</option>
                                                <option>ASD (Admin)</option>
                                            </select>
                                        </div>
                                        <div class="relative ml-1">
                                            <label for="office" class="block text-sm font-medium text-gray-900 mb-1">Office</label> 
                                            <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="office">
                                                <option selected disabled>Select Office</option>
                                                <option>ASD (Admin)</option>
                                            </select>
                                        </div>
                                    </div>  

                                    <div>
                                        <div class="ml-1 mb-2">
                                            <label for="staff" class="block mb-1 text-sm font-medium text-gray-900">Password</label> 
                                            <input class="w-full h-10 px-8 py-4 rounded-lg font-mediumborder border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="password" name="password" placeholder="Password" />
                                        </div>
                                    </div>

                                    <div>
                                        <div class="ml-1 mb-2">
                                            <label for="staff" class="block mb-1 text-sm font-medium text-gray-900">Confirm Password</label> 
                                            <input class="w-full h-10 px-8 py-4 rounded-lg font-mediumborder border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="password" name="confirm_password" placeholder="Confirm Password" />
                                        </div>
                                    </div>

                                    <div>
                                        <div class="relative">
                                            <input type="checkbox" id="show-philrice-password" class="absolute top-2 right-2" />
                                            <label for="show-password" class="absolute top-2 right-8 cursor-pointer">Show Password</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Non-PhilRice Staff Form -->
                                <div id="non-philrice-form" style="display: block;">
                                    <label for="full_name" class="block mb-1 text-sm font-medium text-gray-900">Full Name</label> 
                                    <div class="grid grid-cols-3 mb-4">
                                        <div class="mr-1">
                                            <input class="w-full px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" name="first_name" placeholder="Given" required/>
                                        </div>
                                        <div class="mr-1">
                                            <input class="w-full px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" name="last_name" placeholder="Last" required />
                                        </div>
                                        <div>
                                            <input class="w-full px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" name="last_name" placeholder="Suffix" />
                                        </div>
                                    </div>
                                                                    
                                    <div class="ml-1 mb-4">
                                        <label for="staff" class="block mb-1 text-sm font-medium text-gray-900">Email</label> 
                                        <input class="w-full px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="email" name="email" placeholder="Email" required />
                                    </div>
                                
                                    <div class="ml-1 mb-4">
                                        <label for="staff" class="block mb-1 text-sm font-medium text-gray-900">Password</label> 
                                        <input class="w-full px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="password" name="password" placeholder="Password" required />
                                    </div>
                                
                                    <div class="ml-1">
                                        <label for="staff" class="block mb-1 text-sm font-medium text-gray-900">Confirm Password</label> 
                                        <input class="w-full px-8 py-4 rounded-lg font-medium border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="password" name="confirm_password" placeholder="Confirm Password" required />
                                    </div>
                                    
                                    <div>
                                        <div class="relative">
                                            <input type="checkbox" id="show-non-philrice-password" class="absolute top-2 right-2" />
                                            <label for="show-password" class="absolute top-2 right-8 cursor-pointer">Show Password</label>
                                        </div>
                                    </div>
                                </div>

                                
                                <button
                                    type="submit" class="mt-12 tracking-wide font-semibold bg-green-500 text-gray-100 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <span>
                                        Register
                                    </span>
                                </button>

                                <p class="block text-sm text-gray-600 my-4 hover:text-gray-900 text-center">Already have an account? <a href="{{ url('/login') }}" class="text-sm text-green-600 hover:text-green-900 text-center underline">Back to Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>

    <script>
        // Function to toggle password visibility for PhilRice Staff form
        document.getElementById('show-philrice-password').addEventListener('change', function() {
            var passwordInput = document.querySelector('#philrice-form input[name="password"]');
            var confirmPasswordInput = document.querySelector('#philrice-form input[name="confirm_password"]');
    
            if (this.checked) {
                passwordInput.type = 'text';
                confirmPasswordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                confirmPasswordInput.type = 'password';
            }
        });
    
        // Function to toggle password visibility for Non-PhilRice Staff form
        document.getElementById('show-non-philrice-password').addEventListener('change', function() {
            var passwordInput = document.querySelector('#non-philrice-form input[name="password"]');
            var confirmPasswordInput = document.querySelector('#non-philrice-form input[name="confirm_password"]');
    
            if (this.checked) {
                passwordInput.type = 'text';
                confirmPasswordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                confirmPasswordInput.type = 'password';
            }
        });
    </script>
    

    {{-- Display form depending if PhilRice staff or not --}}
    <script>
        function showForm(type) {
            if (type === 'philrice') {
                document.getElementById('philrice-form').style.display = 'block';
                document.getElementById('non-philrice-form').style.display = 'none';
            } else {
                document.getElementById('philrice-form').style.display = 'none';
                document.getElementById('non-philrice-form').style.display = 'block';
            }
        }
    </script>

    {{-- Password Toggle --}}
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var hidePasswordIcon = document.getElementById('hidePasswordIcon');
    
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                // Change SVG to Show Password
                hidePasswordIcon.innerHTML = '<path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/>';
            } else {
                passwordInput.type = "password";
                // Change SVG to Hide Password
                hidePasswordIcon.innerHTML = '<path d="M11.885 14.988l3.104-3.098.011.11c0 1.654-1.346 3-3 3l-.115-.012zm8.048-8.032l-3.274 3.268c.212.554.341 1.149.341 1.776 0 2.757-2.243 5-5 5-.631 0-1.229-.13-1.785-.344l-2.377 2.372c1.276.588 2.671.972 4.177.972 7.733 0 11.985-8.449 11.985-8.449s-1.415-2.478-4.067-4.595zm1.431-3.536l-18.619 18.58-1.382-1.422 3.455-3.447c-3.022-2.45-4.818-5.58-4.818-5.58s4.446-7.551 12.015-7.551c1.825 0 3.456.426 4.886 1.075l3.081-3.075 1.382 1.42zm-13.751 10.922l1.519-1.515c-.077-.264-.132-.538-.132-.827 0-1.654 1.346-3 3-3 .291 0 .567.055.833.134l1.518-1.515c-.704-.382-1.496-.619-2.351-.619-2.757 0-5 2.243-5 5 0 .852.235 1.641.613 2.342z"/>';
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>