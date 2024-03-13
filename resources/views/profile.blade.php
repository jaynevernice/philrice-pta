<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Profile</title>

    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    @vite('resources/css/app.css')

    {{-- Boxicons --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
    @include('layouts.navbar')

    <main class="p-4 h-screen pt-20 bg-gray-50 drop-shadow flex items-center justify-center">
        <div class="w-full sm:max-w-xl sm:rounded-lg">
            {{-- <h2 class="pr-12 text-right text-3xl font-bold">User Profile</h2> --}}
    
            {{-- Photo Section --}}
            <div class="grid grid-cols-2 max-w-2xl mx-auto justify-center items-center">
                <div class="items-center space-y-5 sm:flex-row sm:space-y-0">
                    <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                        src="{{ asset('assets/icon.jpg') }}"
                        alt="Bordered avatar">
                </div>
           
            
                {{-- Input Field --}}
                <div class="items-center text-[#202142]">

                    <div class="grid grid-cols-3 gap-2 my-2">
                        <div class="w-full">
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                            <input type="text" id="first_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 "
                                placeholder="First Name">
                        </div>
        
                        <div class="w-full">
                            <label for="mi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Initial</label>
                            <input type="text" id="mi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 "
                                placeholder="Middle Initial">
                        </div>
        
                        <div class="w-full">
                            <label for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                            <input type="text" id="last_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 "
                                placeholder="Last name">
                        </div>
                    </div>
        
                    <div class="mb-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            email</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 "
                            placeholder="your.email@mail.com" required>
                    </div>
        
                    {{-- <div class="mb-2" >
                        <label for="profession" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profession</label>
                        <input type="text" id="profession"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                            placeholder="Position" required>
                    </div> --}}

                    {{-- Position --}}
                    <div class="mb-2">
                        <label for="position" class="block text-sm font-medium text-gray-900 mb-1">Position</label> 
                        <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="position" required>
                            <option selected disabled>Position</option>
                            <option>ASD (Admin)</option>
                        </select>
                    </div>
        
                    <div class="flex justify-end">
                        <button type="submit"
                            class="text-white bg-gray-700  hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>