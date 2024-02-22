<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CES Forms</title>

    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    @vite('resources/css/app.css')

    
    {{-- Boxicons --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        {{-- Navbar --}}
        @include('layouts.navbar')
    
        {{-- Sidebar --}}
        <aside
          class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
          aria-label="Sidenav"
          id="drawer-navigation"
        >
          <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <form action="#" method="GET" class="md:hidden mb-2">
              <label for="sidebar-search" class="sr-only">Search</label>
              <div class="relative">
                <div
                  class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
                >
                  <svg
                    class="w-5 h-5 text-gray-500 dark:text-gray-400"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    ></path>
                  </svg>
                </div>
                <input
                  type="text"
                  name="search"
                  id="sidebar-search"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Search"
                />
              </div>
            </form>
            <ul class="space-y-2">
    
              {{-- Overview --}}
              <li>
                <a
                  href="/encoder/dashboard"
                  class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group active:bg-green-200 "
                >
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                  </svg>
                  <span class="ml-3">Overview</span>
                </a>
              </li>
    
              {{-- CES --}}
              <li>
                <button
                  type="button"
                  class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                  aria-controls="dropdown-pages"
                  data-collapse-toggle="dropdown-pages"
                >
                  <box-icon type='solid' name='buildings' color='#6B7280'></box-icon>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
    
                  {{-- Down Arrow Symbol --}}
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
    
                {{-- Sub Item --}}
                <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                  <li>
                    <a
                      href="{{ route('encoder.forms') }}"
                      class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      >CES Form</a
                    >
                  </li>
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      >CES Analytics</a
                    >
                  </li>
                </ul>
              </li>
    
              {{-- BATAC --}}
              <li>
                <button
                  type="button"
                  class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                  aria-controls="dropdown-sales"
                  data-collapse-toggle="dropdown-sales"
                >
                  <box-icon type='solid' name='buildings' color='#6B7280'></box-icon>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">BATAC</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      >BATAC 1</a
                    >
                  </li>
                </ul>
              </li>
    
              {{-- AGUSAN --}}
              <li>
                <button
                  type="button"
                  class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                  aria-controls="dropdown-authentication"
                  data-collapse-toggle="dropdown-authentication"
                >
                  <box-icon type='solid' name='buildings' color='#6B7280'></box-icon> 
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">AGUSAN</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      >AGUSAN 1</a
                    >
                  </li>
                </ul>
              </li>
    
              {{-- BICOL --}}
              <li>
                <button
                  type="button"
                  class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                  aria-controls="dropdown-authentication"
                  data-collapse-toggle="dropdown-authentication"
                >
                  <box-icon type='solid' name='buildings' color='#6B7280'></box-icon>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">BICOL</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      >BICOL 1</a
                    >
                  </li>
                </ul>
              </li>
    
              {{-- ISABELA --}}
              <li>
                <button
                  type="button"
                  class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                  aria-controls="dropdown-authentication"
                  data-collapse-toggle="dropdown-authentication"
                >
                  <box-icon type='solid' name='buildings' color='#6B7280'></box-icon>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">ISABELA</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      >ISABELA 1</a
                    >
                  </li>
                </ul>
              </li>
    
              {{-- LOS BAÑOS --}}
              <li>
                <button
                  type="button"
                  class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                  aria-controls="dropdown-authentication"
                  data-collapse-toggle="dropdown-authentication"
                >
                  <box-icon type='solid' name='buildings' color='#6B7280'></box-icon>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">LOS BAÑOS</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      >LOS BAÑOS 1</a
                    >
                  </li>
                </ul>
              </li>
    
              {{-- MIDSAYAP --}}
              <li>
                <button
                  type="button"
                  class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                  aria-controls="dropdown-authentication"
                  data-collapse-toggle="dropdown-authentication"
                >
                  <box-icon type='solid' name='buildings' color='#6B7280'></box-icon>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">MIDSAYAP</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      >MIDSAYAP 1</a
                    >
                  </li>
                </ul>
              </li>
    
              {{-- NEGROS --}}
              <li>
                <button
                  type="button"
                  class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                  aria-controls="dropdown-authentication"
                  data-collapse-toggle="dropdown-authentication"
                >
                  <box-icon type='solid' name='buildings' color='#6B7280'></box-icon>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">NEGROS</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                      >NEGROS 1</a
                    >
                  </li>
                </ul>
              </li>
    
            </ul>
          </div>
    
          </div>
        </aside>
    
        


        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="justify-center">
                <div class="grid grid-cols-2 lg:grid-cols-4">
                    
                    {{-- Card for Form 1 --}}
                    <div class="flex flex-row justify-center items-center">
                        <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                            <a href="#">
                                <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                            </a>
                            <div class="p-5">
                                    <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900 flex-grow-0">CES Knowledge Sharing and Learning (KSL) Monitoring</h5>
                                <a href="{{ route('kslform.index') }}" class="inline-flex items-center px-3 py-2 mx-0.5text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">  Fill-Up Form
                                    <box-icon name='edit-alt' type="solid" color="#ffffff"></box-icon>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Card for Form 2 --}}
                    <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                        <a href="#">
                            <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                        </a>
                        <div class="p-5">
                            <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Summary of  Trainings Conducted</h5>
                            <a href="{{ route('trainingsform.index') }}" class="inline-flex items-center px-3 py-2 mx-0.5text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">  Fill-Up Form
                                <box-icon name='edit-alt' type="solid" color="#ffffff"></box-icon>
                            </a>
                        </div>
                    </div>

                    {{-- Card for Form 3 --}}
                    <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                        <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                        <div class="p-5">
                            <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Technical Dispatch Monitoring</h5>
                            <a href="{{ route('dispatchform.index') }}" class="inline-flex items-center px-3 py-2 mx-0.5text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">  Fill-Up Form
                                <box-icon name='edit-alt' type="solid" color="#ffffff"></box-icon>
                            </a>
                        </div>
                    </div>

                    {{-- Card for Form 4 --}}
                    <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                        <a href="#">
                            <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Technology Demonstration Monitoring</h5>
                            </a>
                            <a href="#" class="inline-flex items-center px-3 py-2 mx-0.5text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">  Fill-Up Form
                                <box-icon name='edit-alt' type="solid" color="#ffffff"></box-icon>
                            </a>
                        </div>
                    </div>



                </div>
            </div>
            
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>