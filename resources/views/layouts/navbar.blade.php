<nav
    class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">

            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd">
                    </path>
                </svg>

                <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd">
                    </path>
                </svg>

                <span class="sr-only">Toggle sidebar</span>
            </button>


            <a href="" onclick="location.reload();" class="flex items-center justify-between mr-4">
                <img src="{{ asset('assets/logo.png') }}" class="mr-3 h-8" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PTA</span>
            </a>

        </div>


        <div class="flex items-center lg:order-2">

            <!-- Dropdown menu -->
            <div
                class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl">
            </div>

            @if (!Auth::check() || Auth::user()->user_type === 'guest')
                <a href="{{ route('login') }}">
                    <button type="button"
                        class="flex items-center text-white bg-gray-900 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        Login
                    </button>
                </a>
            @else
                <button type="button"
                    class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown"
                    data-tooltip-target="user-menu-tooltip">
                    <div id="user-menu-tooltip" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        User Menu
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    {{-- <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" src="{{ asset('assets/icon.jpg') }}" --}}
                    {{-- alt="user photo" /> --}}
                    <img class="w-8 h-8 rounded-full"
                        @if (Auth::check() && Auth::user()->profile_picture) src="{{ Auth::user()->profile_picture }}" 
                    @else 
                    src="{{ asset('assets/icon.jpg') }}" @endif
                        alt="Profile Picture" />
                </button>
            @endif

            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                id="dropdown">
                {{-- User Name and Email --}}
                <div class="py-3 px-4">
                    {{-- <span class="block text-sm font-semibold text-gray-900 dark:text-white">Neil Sims</span> --}}
                    <span class="block text-sm font-semibold text-gray-900 dark:text-white">
                        @if (Auth::check())
                            {{ Auth::user()->first_name }}
                            @if (Auth::user()->mi)
                                {{ mb_substr(Auth::user()->mi, 0, 1) }}.
                            @endif
                            {{ Auth::user()->last_name }}
                        @endif
                    </span>
                    <span class="block text-sm text-gray-900 truncate dark:text-white">
                        @if (Auth::check())
                            {{ Str::ucfirst(Auth::user()->user_type) }}
                        @endif
                    </span>
                </div>

                {{-- User Profile --}}
                <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                    <li>
                        <a href="{{ route('profile') }}"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                            Manage profile
                        </a>
                    </li>
                </ul>

                {{-- Sign Out --}}
                <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                    <li>
                        <a href="{{ route('logout') }}"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Sign out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
