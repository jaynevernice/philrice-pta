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

    {{-- <style>
        .step {
            display: none;
        }
    </style> --}}
    
</head>
<body>
    <div class="h-screen bg-gray-100 text-gray-900 flex justify-center bg-gradient-to-r from-[#D1DCD8] to-[#CDD9D5]">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1 drop-shadow-lg">
            
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
                <div class="flex flex-col items-center">
                    {{-- <h1 class="text-2xl xl:text-3xl font-extrabold">Register</h1> --}}
                    <div class="w-full flex-1">
                        {{-- <div class="mx-auto my-3"> --}}

                            <div class="flex flex-row items-center justify-center mb-2">
                                <a href="{{ url('/login') }}">
                                    <button type="button" class="w-56 text-gray-600 bg-white border-b-4 border-gray-300 focus:outline-none hover:bg-gray-100 hover:border-[#1A73E8] hover:text-[#1A73E8] focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">LOGIN</button>
                                </a>
    
                                <a href="{{ url('/register') }}">
                                    <button type="button" class="w-56 text-[#1A73E8] bg-white border-b-4 border-[#1A73E8] focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">REGISTER</button>
                                </a>
                            </div>

                            <h1 class="text-2xl xl:text-3xl font-extrabold text-left mb-2">REGISTER</h1>
                            <p class="justify-right text-lg text-gray-700">Welcome to TRACER. Please provide all the information needed to create your account.</p>

                        
                            <ol id="stepper" class="flex items-stretch w-full my-4 sm:mb-5 mx-auto">
                                {{-- Step 1 --}}
                                <li class="stepIndicator flex w-full items-center text-green-600 dark:text-green-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-green-100 after:border-4 after:inline-block dark:after:border-green-800">
                                    <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full lg:h-12 lg:w-12 dark:bg-green-800 shrink-0">
                                        <box-icon name='user-detail' type='solid'></box-icon>
                                    </div>
                                </li>
                            
                                {{-- Step 2 --}}
                                <li class="stepIndicator flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                                    <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                        <box-icon type='solid' name='briefcase-alt'></box-icon>
                                    </div>
                                </li>

                                {{-- Step 3 --}}
                                <li class="stepIndicator flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                                    <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                        <box-icon type='solid' name='lock'></box-icon>
                                    </div>
                                </li>
                            
                                {{-- Step 4 --}}
                                <li class="stepIndicator flex items-center">
                                    <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                        <box-icon name='question-mark' ></box-icon>
                                    </div>
                                </li>
                            </ol>
                            
                            {{-- <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">User Information</h3> --}}
                            <form action="#" id="registrationForm">
                                {{-- Step 1 --}}
                                <div class="step">   
                                    <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Personal Information</h3>
                                    <div class="my-4">
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                        <input type="text" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name">
                                    </div>
                                    <div class="my-4">
                                        <label for="mi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Initial</label>
                                        <input type="text" name="mi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Middle Initial">
                                    </div>
                                    <div class="my-4">
                                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                        <input type="text" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name">
                                    </div>
                                </div>
                                    
                                {{-- Step 2 --}}
                                <div class="step">
                                        <div>
                                            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Professional Information</h3>
                                            {{-- Email --}}
                                            <div class="my-2">
                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com">
                                            </div>

                                            {{-- PhilRice ID --}}
                                            <div class="my-2" id="idField">
                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PhilRice ID #</label>
                                                <input type="text" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                                            </div>

                                            <div class="grid grid-cols-3 my-2">
                                                {{-- Station --}}
                                                <div class="relative mr-1 my-2" id="stationField">
                                                    <label for="station" class="block text-sm font-medium text-gray-900 mb-1">Station</label> 
                                                    <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="station" required>
                                                        <option selected disabled>Station</option>
                                                        <option>CES</option>
                                                        <option>Agusan</option>
                                                        <option>Batac</option>
                                                        <option>Bicol</option>
                                                        <option>Isabela</option>
                                                        <option>Los Baños</option>
                                                        <option>Midsayap</option>
                                                        <option>Negros</option>
                                                    </select>
                                                </div>
                                    
                                                {{-- Division --}}
                                                <div class="relative mr-1 my-2" id="divisionField">
                                                    <label for="division" class="block text-sm font-medium text-gray-900 mb-1">Division</label> 
                                                    <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="division" required>
                                                        <option selected disabled>Division</option>
                                                        <option>TMSD</option>
                                                    </select>
                                                </div>
                                    
                                                {{-- Position --}}
                                                <div class="relative my-2" id="positionField">
                                                    <label for="position" class="block text-sm font-medium text-gray-900 mb-1">Position</label> 
                                                    <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="position" required>
                                                        <option selected disabled>Position</option>
                                                        <option>Division Head</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                                    
                                {{-- Step 3 --}}
                                <div class="step">
                                    <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Credentials</h3>
                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••">
                                    </div>                        <div>
                                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••">
                                    </div>
                                    {{-- Show Password --}}
                                    <div class="flex items-center justify-end my-2">
                                        <input type="checkbox" id="showPasswordCheckbox" class="form-checkbox rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-600 dark:focus:ring-opacity-50 dark:text-blue-500">
                                        <label for="showPasswordCheckbox" class="text-sm font-medium text-gray-900 dark:text-white ml-2 cursor-pointer">Show Password</label>
                                    </div>
                                </div>

                                {{-- Step 4 --}}
                                <div class="step">
                                    <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Security Questions</h3>
                                    <div class="my-2">
                                        <label for="sq1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What is the name of your first pet?</label>
                                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Security Question 1">
                                    </div>
                                    <div class="my-2">
                                        <label for="sq2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What city were you born in?</label>
                                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Security Question 2">
                                    </div>
                                    <div class="my-2">
                                        <label for="sq3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What is the name of your elementary school?</label>
                                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Security Question 3">
                                    </div>
                                </div>
                                    
                                <div class="form-footer flex gap-3 my-4">
                                    <button type="button" id="prevBtn" class="flex-1 focus:outline-none border border-gray-300 py-2 px-5 rounded-lg shadow-sm text-center text-gray-700 bg-white hover:bg-gray-100 text-lg" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" class="flex-1 border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-green-600 hover:bg-green-700 text-lg" onclick="nextPrev(1)">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>

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
        var currentStep = 0; // Current step is set to be the first step (0)
        updateStep(currentStep); // Display the current step

        function updateStep(n) {
            // This function will display the specified step of the form...
            var steps = document.getElementsByClassName("stepIndicator");
            var x = document.getElementsByClassName("step");
            // Hide all steps:
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            // Show the current step:
            x[n].style.display = "block";
            // Fix the Previous/Next buttons:
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
            // Run a function that will display the correct step indicator:
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            // This function will figure out which step to display
            var x = document.getElementsByClassName("step");
            // Exit the function if any field in the current step is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current step:
            x[currentStep].style.display = "none";
            // Increase or decrease the current step by 1:
            currentStep = currentStep + n;
            // If you have reached the end of the steps...
            if (currentStep >= x.length) {
                // ...the form gets submitted:
                document.getElementById("registrationForm").submit();
                return false;
            }
            // Otherwise, display the correct step:
            updateStep(currentStep);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentStep].getElementsByTagName("input");
            // A loop that checks every input field in the current step:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // Add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // And set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentStep].classList.add("finish");
            }
            return valid; // Return the valid status
        }

        // function validateForm() {
        // // This function deals with validation of the form fields
        // var x, y, i, valid = true;
        // x = document.getElementsByClassName("step");
        // y = x[currentStep].getElementsByTagName("input");
        // // A loop that checks every input field in the current step:
        // for (i = 0; i < y.length; i++) {
        //     // Only validate visible fields
        //     if (y[i].offsetParent !== null) {
        //         // If a field is empty...
        //         if (y[i].value.trim() === "") {
        //             // Add an "invalid" class to the field:
        //             y[i].className += " invalid";
        //             // And set the current valid status to false
        //             valid = false;
        //         }
        //     }
        // }
        // // If the valid status is true, mark the step as finished and valid:
        // if (valid) {
        //     document.getElementsByClassName("stepIndicator")[currentStep].classList.add("finish");
        // }
        //  return valid; // Return the valid status
        // }


        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].classList.remove("active");
            }
            //... and adds the "active" class on the current step:
            x[n].classList.add("active");
        }
    </script>

    {{-- <script>
        var current = 1; // Initialize current step to Step 1

        document.getElementById("nextBtn").addEventListener("click", function() {
            var step2Div = document.querySelector('#stepper li:nth-child(2) div');
            var step2Li = document.querySelector('#stepper li:nth-child(2)');
            var step3Div = document.querySelector('#stepper li:nth-child(3) div');

            if (current === 1) {
                step2Div.classList.add("bg-green-100");
                step2Li.classList.remove("after:border-gray-100");
                step2Li.classList.add("after:border-green-100");
                current = 2;
            } else if (current === 2) {
                step3Div.classList.add("bg-green-100");
                current = 3;
            }
        });

        document.getElementById("prevBtn").addEventListener("click", function() {
            var step2Div = document.querySelector('#stepper li:nth-child(2) div');
            var step2Li = document.querySelector('#stepper li:nth-child(2)');
            var step3Div = document.querySelector('#stepper li:nth-child(3) div');

            if (current === 3) {
                step3Div.classList.remove("bg-green-100");
                current = 2;
            } else if (current === 2) {
                step2Div.classList.remove("bg-green-100");
                step2Li.classList.remove("after:border-green-100");
                step2Li.classList.add("after:border-gray-100");
                current = 1;
            }
        });
    </script> --}}

    <script>
        var current = 1; // Initialize current step to Step 1
    
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