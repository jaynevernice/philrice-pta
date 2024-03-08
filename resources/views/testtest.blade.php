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
    
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
        
        .stepIndicator {
            list-style-type: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: 1rem;
            padding: 0;
        }
    
        .stepIndicator li {
            flex: 1;
            text-align: center;
            position: relative;
        }
    
        .stepIndicator .active {
            font-weight: 600;
            color: #5a67d8;
        }
    
        .stepIndicator .finish {
            font-weight: 600;
            color: #5a67d8;
        }
    
        .stepIndicator li::before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            z-index: 9;
            width: 20px;
            height: 20px;
            background-color: #c3dafe;
            border-radius: 50%;
            border: 3px solid #ebf4ff;
        }
    
        .stepIndicator .active::before {
            background-color: #a3bffa;
            border: 3px solid #c3dafe;
        }
    
        .stepIndicator .finish::before {
            background-color: #5a67d8;
            border: 3px solid #c3dafe;
        }
    
        .stepIndicator li::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 8px;
            width: 100%;
            height: 3px;
            background-color: #f3f3f3;
        }
    
        .stepIndicator .active::after {
            background-color: #a3bffa;
        }
    
        .stepIndicator .finish::after {
            background-color: #5a67d8;
        }
    
        .stepIndicator li:last-child:after {
            display: none;
        }
    
        input.invalid {
            border: 2px solid #ffaba5;
        }
    
        .step {
            display: none;
        }
    </style>    
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
                            
                            <h1 class="text-lg font-bold text-gray-700 leading-tight text-center mt-12 mb-5">Form Wizard - Multi Step Form</h1>
                            <form id="signUpForm" class="p-12 shadow-md rounded-2xl bg-white mx-auto border-solid border-2 border-gray-100 mb-8" action="#!">
                                <!-- start step indicators -->
                                <div class="form-header flex gap-3 mb-4 text-xs text-center">
                                    <span class="stepIndicator flex-1 pb-8 relative">Account Setup</span>
                                    <span class="stepIndicator flex-1 pb-8 relative">Social Profiles</span>
                                    <span class="stepIndicator flex-1 pb-8 relative">Personal Details</span>
                                </div>
                                <!-- end step indicators -->

                                <!-- step one -->
                                <div class="step">
                                    <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Create your account</p>
                                    <div class="mb-6">
                                        <input type="email" placeholder="Email Address" name="email" class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                                    </div>
                                    <div class="mb-6">
                                        <input type="password" placeholder="Password" name="password" class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                                    </div>
                                    <div class="mb-6">
                                        <input type="password" placeholder="Confirm Password" name="password" class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                                    </div>
                                </div>
                                <!-- step two -->
                                <div class="step">
                                    <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Your presence on the social network</p>
                                    <div class="mb-6">
                                        <input type="text" placeholder="Linked In" name="linkedin" class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                                    </div>
                                    <div class="mb-6">
                                        <input type="text" placeholder="Twitter" name="twitter" class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                                    </div>
                                    <div class="mb-6">
                                        <input type="text" placeholder="Facebook" name="facebook" class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                                    </div>
                                </div>
                                <!-- step three -->
                                <div class="step">
                                    <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">We will never sell it</p>
                                    <div class="mb-6">
                                        <input type="text" placeholder="Full name" name="fullname" class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                                    </div>
                                    <div class="mb-6">
                                        <input type="text" placeholder="Mobile" name="mobile" class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                                    </div>
                                    <div class="mb-6">
                                        <input type="text" placeholder="Address" name="address" class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                                    </div>
                                </div>
                                <!-- start previous / next buttons -->
                                <div class="form-footer flex gap-3">
                                    <button type="button" id="prevBtn" class="flex-1 focus:outline-none border border-gray-300 py-2 px-5 rounded-lg shadow-sm text-center text-gray-700 bg-white hover:bg-gray-100 text-lg" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" class="flex-1 border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-indigo-600 hover:bg-indigo-700 text-lg" onclick="nextPrev(1)">Next</button>
                                </div>
                                <!-- end previous / next buttons -->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        
        function showTab(n) {
          // This function will display the specified tab of the form...
          var x = document.getElementsByClassName("step");
          x[n].style.display = "block";
          //... and fix the Previous/Next buttons:
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
          //... and run a function that will display the correct step indicator:
          fixStepIndicator(n)
        }
        
        function nextPrev(n) {
          // This function will figure out which tab to display
          var x = document.getElementsByClassName("step");
          // Exit the function if any field in the current tab is invalid:
          if (n == 1 && !validateForm()) return false;
          // Hide the current tab:
          x[currentTab].style.display = "none";
          // Increase or decrease the current tab by 1:
          currentTab = currentTab + n;
          // if you have reached the end of the form...
          if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("signUpForm").submit();
            return false;
          }
          // Otherwise, display the correct tab:
          showTab(currentTab);
        }
        
        function validateForm() {
          // This function deals with validation of the form fields
          var x, y, i, valid = true;
          x = document.getElementsByClassName("step");
          y = x[currentTab].getElementsByTagName("input");
          // A loop that checks every input field in the current tab:
          for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false
              valid = false;
            }
          }
          // If the valid status is true, mark the step as finished and valid:
          if (valid) {
            document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
          }
          return valid; // return the valid status
        }
        
        function fixStepIndicator(n) {
          // This function removes the "active" class of all steps...
          var i, x = document.getElementsByClassName("stepIndicator");
          for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
          }
          //... and adds the "active" class on the current step:
          x[n].className += " active";
        }
    </script>

    {{-- Optimized version of code above --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const steps = document.querySelectorAll(".step");
            const stepIndicators = document.querySelectorAll(".stepIndicator");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");
            let currentStep = 0;
    
            updateStep(currentStep);
    
            function updateStep(n) {
                steps.forEach(step => step.style.display = "none");
                steps[n].style.display = "block";
                prevBtn.style.display = (n === 0) ? "none" : "inline";
                nextBtn.innerHTML = (n === steps.length - 1) ? "Submit" : "Next";
                fixStepIndicator(n);
            }
    
            function nextPrev(n) {
                if (n === 1 && !validateForm()) return false;
                steps[currentStep].style.display = "none";
                currentStep += n;
                if (currentStep >= steps.length) {
                    document.getElementById("signUpForm").submit();
                    return false;
                }
                updateStep(currentStep);
            }
    
            function validateForm() {
                const inputs = steps[currentStep].querySelectorAll("input");
                let valid = true;
                inputs.forEach(input => {
                    if (input.value.trim() === "") {
                        input.classList.add("invalid");
                        valid = false;
                    }
                });
                if (valid) {
                    stepIndicators[currentStep].classList.add("finish");
                }
                return valid;
            }
    
            function fixStepIndicator(n) {
                stepIndicators.forEach(indicator => indicator.classList.remove("active"));
                stepIndicators[n].classList.add("active");
            }
    
            prevBtn.addEventListener("click", () => nextPrev(-1));
            nextBtn.addEventListener("click", () => nextPrev(1));
        });
    </script>
    

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
