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
<!-- tailwind css -->
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" />
<!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
