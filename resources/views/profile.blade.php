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

    <main class="p-4 h-screen pt-1 bg-gray-100 flex items-center justify-center">
        <div class="w-full max-w-4xl">
            {{-- Tabs --}}
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul
                    class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-t-lg">
                    <li class="me-2">
                        <a href="#"
                            class="tab-link inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group bg-gray-200"
                            aria-current="page" data-tab="profile">
                            <box-icon type='solid' name='user-account' color="#2563eb" class="mr-2"></box-icon>
                            Profile
                        </a>
                    </li>
                    <li class="me-2">
                        <a href="#"
                            class="tab-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group"
                            data-tab="security">
                            <box-icon name='question-mark' color="#9ca3af" class="mr-2"></box-icon>
                            Security Questions
                        </a>
                    </li>
                    <li class="me-2">
                        <a href="#"
                            class="tab-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group"
                            data-tab="update_pass">
                            <box-icon name='lock' type='solid' color="#9ca3af" class="mr-2"></box-icon>
                            Password
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Profile Container --}}
            <div id="profile" class="tab-content drop-shadow-lg bg-white p-4 flex border w-full flex-wrap">

                {{-- Image --}}
                <div class="mx-auto my-8 sm:mx-10 sm:my-10">
                    <div class="relative flex items-center justify-center">
                        <label for="profile_photo"
                            class="h-40 w-40 rounded-full bg-gray-100 relative cursor-pointer border border-gray-900 overflow-visible">

                            {{-- Placeholder for current profile photo --}}
                            <img alt="Current Profile Photo" class="h-full w-full object-cover"
                                @if (Auth::check() && Auth::user()->profile_picture) src="{{ Auth::user()->profile_picture }}"
                                @else
                                    src="{{ asset('assets/icon.jpg') }}" @endif>

                            {{-- Edit pencil button --}}
                            <div class="absolute bottom-1 right-1 bg-yellow-200 rounded-full p-1 text-center">
                                <box-icon name='pencil' class="w-5 h-5 m-1"></box-icon>
                            </div>
                        </label>
                        <input id="profile_photo" name="profile_photo" type="file" class="sr-only" accept="image/*">
                    </div>
                </div>

                {{-- Input Fields --}}
                <div class="flex flex-col">
                    <div class="flex">
                        <div class="my-2 mx-1 flex-1">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                            <input type="text" name="first_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="First Name" disabled
                                @if (Auth::check()) value="{{ Auth::user()->first_name }}" @endif>
                        </div>
                        <div class="my-2 mx-1 flex-1">
                            <label for="mi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle
                                Initial</label>
                            <input type="text" name="mi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Middle Initial" disabled
                                @if (Auth::check()) value="{{ Auth::user()->mi }}" @endif>
                        </div>
                        <div class="my-2 mx-1 flex-1">
                            <label for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                            <input type="text" name="last_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Last Name" disabled
                                @if (Auth::check()) value="{{ Auth::user()->last_name }}" @endif>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="my-2 mx-1 flex-1">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PhilRice ID</label>
                            <input type="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="PhilRice ID" disabled
                                @if (Auth::check()) value="{{ Auth::user()->philrice_id }}" @endif>
                        </div>
                        <div class="my-2 mx-1 flex-1">
                            <label for="philrice_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="philrice_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Email" disabled
                                @if (Auth::check()) value="{{ Auth::user()->email }}" @endif>
                        </div>
                    </div>

                    {{-- Station --}}
                    <div class="flex">
                        <div class="my-2 mx-1 flex-1">
                            <label for="station" class="block text-sm font-medium text-gray-900 mb-1">Station</label>
                            <select
                                class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                id="station" required>
                                <option>
                                    @if (Auth::check())
                                        {{ Auth::user()->station }}
                                    @endif
                                </option>
                                <option>Batac</option>
                            </select>
                        </div>
                        <div class="my-2 mx-1 flex-1">
                            <label for="station" class="block text-sm font-medium text-gray-900 mb-1">Division</label>
                            <select
                                class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                id="station" required>
                                <option>
                                    @if (Auth::check())
                                        {{ Auth::user()->division }}
                                    @endif
                                </option>
                            </select>
                        </div>
                        <div class="my-2 mx-1 flex-1">
                            <label for="station"
                                class="block text-sm font-medium text-gray-900 mb-1">Position</label>
                            <select
                                class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                id="station" required>
                                <option>
                                    @if (Auth::check())
                                        {{ Auth::user()->position }}
                                    @endif
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="mt-4 flex justify-end w-full">
                            <button type="submit" id="saveProfileBtn"
                                class="text-white bg-gray-700  hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Security Questions Container --}}
            <div id="security" class="hidden tab-content drop-shadow-lg bg-white p-4 border w-full flex-wrap">
                <div class="my-4">
                    <label for="sq1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What is
                        the name of your favorite color?</label>
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Security Question 1"  @if (Auth::check()) value="{{ Auth::user()->sq1 }}" @endif>
                </div>
                <div class="my-4">
                    <label for="sq2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What
                        province/city were you born in?</label>
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Security Question 2"  @if (Auth::check()) value="{{ Auth::user()->sq2 }}" @endif>
                </div>
                <div class="my-4">
                    <label for="sq3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What is
                        the name of your elementary school?</label>
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Security Question 3"  @if (Auth::check()) value="{{ Auth::user()->sq3 }}" @endif>
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit" id="saveSecurityBtn"
                        class="text-white bg-gray-700  hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Save</button>
                </div>
            </div>

            {{-- Password Container --}}
            <div id="update_pass" class="hidden tab-content drop-shadow-lg bg-white p-4 flex border w-full flex-wrap">
                <div class="my-2 w-full">
                    <label for="old_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old
                        Password</label>
                    <input type="password" name="old_password" id="old_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="my-2 w-full">
                    <label for="new_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="new_password" id="new_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="my-2 w-full">
                    <label for="confirm_new_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                {{-- Show Password --}}
                <div class="flex items-center justify-end my-2 w-full">
                    <input type="checkbox" id="showPasswordCheckbox"
                        class="form-checkbox rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-600 dark:focus:ring-blue-600 dark:focus:ring-opacity-50 dark:text-blue-500">
                    <label for="showPasswordCheckbox"
                        class="text-sm font-medium text-gray-900 dark:text-white ml-2 cursor-pointer">Show
                        Password</label>
                </div>

                <div class="mt-4 flex justify-end w-full">
                    <button type="submit" id="savePasswordBtn"
                        class="text-white bg-gray-700  hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Save</button>
                </div>
            </div>
        </div>
    </main>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    {{-- Show All Password --}}
    <script>
        document.getElementById("showPasswordCheckbox").addEventListener("change", function() {
            var oldPasswordInput = document.getElementById("old_password");
            var newPasswordInput = document.getElementById("new_password");
            var confirmNewPasswordInput = document.getElementById("confirm_new_password");

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

    {{-- Tab --}}
    {{-- <script>
        // JavaScript for tabs
        const tabs = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = tab.dataset.tab;
                tabContents.forEach(content => {
                    if (content.id === target) {
                        content.classList.remove('hidden');
                    } else {
                        content.classList.add('hidden');
                    }
                });
                tabs.forEach(tab => tab.classList.remove('active'));
                tab.classList.add('active');
            });
        });
    </script> --}}

    <script>
        // JavaScript for tabs
        const tabs = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = tab.dataset.tab;
                tabContents.forEach(content => {
                    if (content.id === target) {
                        content.classList.remove('hidden');
                    } else {
                        content.classList.add('hidden');
                    }
                });
                tabs.forEach(tab => {
                    tab.classList.remove('border-blue-600', 'text-blue-600', 'bg-gray-200',
                        'border-transparent');
                    tab.querySelector('box-icon').setAttribute('color',
                        '#9ca3af'); // Set default color
                }); // Remove active classes from all tabs
                tab.classList.add('border-blue-600', 'text-blue-600',
                    'bg-gray-200'); // Add active classes to the clicked tab
                tab.querySelector('box-icon').setAttribute('color', '#2563eb'); // Set active color
            });
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

</body>

</html>
