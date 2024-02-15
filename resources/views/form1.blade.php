<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PhilRice CES Knowledge Sharing and Learning (KSL) Monitoring</title>

    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    @vite('resources/css/app.css')

    {{-- Boxicons --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{-- Flowbite CDN --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>


    {{-- <style>
        .max-h-64 {
            max-height: 16rem;
        }
        /*Quick overrides of the form input as using the CDN version*/
        .form-input,
        .form-textarea,
        .form-select,
        .form-multiselect {
            background-color: #edf2f7;
        }
    </style> --}}

</head>

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">

    {{-- Menu Container --}}
    <div class="container w-full flex flex-wrap mx-auto px-2 mt-16">
        <div class="w-full lg:w-1/5 px-6 text-xl text-gray-800 leading-normal">
            <p class="text-base font-bold py-2 lg:pb-6 text-gray-700">Menu</p>
            <div class="block lg:hidden sticky inset-0">
                <button id="menu-toggle" class="flex w-full justify-end px-3 py-3 bg-white lg:bg-transparent border rounded border-gray-600 hover:border-yellow-600 appearance-none focus:outline-none">
                    <svg class="fill-current h-3 float-right" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </button>
            </div>
            {{-- <div class="w-full sticky inset-0 hidden max-h-64 lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 my-2 lg:my-0 border border-gray-400 lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-20" style="top:6em;" id="menu-content"> --}}
            <div class="w-full sticky inset-0 hidden max-h-screen lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 my-2 lg:my-0 border border-gray-400 lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-20" style="top:6em;" id="menu-content">
                <ul class="list-reset py-2 md:py-0">
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent font-bold border-yellow-600">
                        <a href='#section1' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 1</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section2' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 2</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section3' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 3</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section4' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 4</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section5' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 5</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section6' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 6</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section7' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 7</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section8' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 8</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section9' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 9</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section10' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 10</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section11' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 11</span>
                        </a>
                    </li>
                    <li class="py-1 md:my-2 hover:bg-yellow-100 lg:hover:bg-transparent border-l-4 border-transparent">
                        <a href='#section12' class="block pl-4 align-middle text-gray-700 no-underline hover:text-yellow-600">
                            <span class="pb-1 md:pb-0 text-sm">Section 12</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Section Container --}}
        <section class="w-full lg:w-4/5">

            {{-- Form Title --}}
            <h1 class="flex items-center font-sans font-bold break-normal text-gray-700 px-2 text-xl mt-12 lg:mt-0 md:text-2xl">
                PhilRice CES Knowledge Sharing and Learning (KSL) Monitoring
			</h1>
            
            {{-- Section 1 --}}
            <hr class="bg-gray-300 my-12">
            <h2 id='section1' class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Section 1</h2>
            <div class="p-8 mt-6 lg:mt-0 leading-normal rounded shadow bg-white">
                <blockquote class="border-l-4 border-yellow-600 italic my-4 pl-8 md:pl-12">
                    Knowledge sharing and learning activities refer to simple information sharing or awareness-raising on a particular topic (e.g.  products, outputs, ideas, services, ideas, advocacies etc) during briefings, visits, workshops, dialogues, fora, symposia, conferences, seminars/webinars, info caravans and campaigns where you shared PhilRice/rice information. These are other activities not considered as training, technical dispatch, and techno demo that are initiated or implemented by PhilRice (including RCEF and other extra core and external projects), or in partnership with other agencies and sponsors.
                    <br><br>
                    Privacy Notice: PhilRice is committed to comply with Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012 to safeguard your privacy and personal information.
                </blockquote>

                <div class="my-10">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe@company.com" required>
                </div>
            </div>
            
            {{-- Section 2 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Profile</h2>
            <div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <form>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        
                        {{-- First Name --}}
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
                        </div>
                        
                        {{-- Middle Initial --}}
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Middle Initial</label>
                            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="F." required>
                        </div>
                        
                        {{-- Last Name --}}
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required>
                        </div>
                    </div>

                    {{-- Age Group --}}
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div>
                            <label for="age_group" class="block mb-2 text-sm font-medium text-gray-900">Age Group</label>                                               
                            <div class="relative">
                                <select class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="age_group">
                                    <option selected>Select</option>
                                    <option>Below 18</option>
                                    <option>18 - 30</option>
                                    <option>31 - 45</option>
                                    <option>46 - 59</option>
                                    <option>Above 60</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                              </div>
                        </div>

                        <div>
                            <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">Sex</label>                                               
                            <div class="relative">
                                <select class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="grid-state">
                                    <option selected>Select</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">Offices and Divisions</label>                                               
                            <div class="relative">
                                <select class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="grid-state">
                                    <option selected>Select</option>
                                    <option>ASD (Admin)</option>
                                    <option>ASPPD</option>
                                    <option>BDD</option>
                                    <option>CBC</option>
                                    <option>COA</option>
                                    <option>ComRel</option>
                                    <option>CPD</option>
                                    <option>CSD</option>
                                    <option>DevCom</option>
                                    <option>FMD</option>
                                    <option>GRD</option>
                                    <option>IAU</option>
                                    <option>IMSSO</option>
                                    <option>ISD</option>
                                    <option>ODEDASF</option>
                                    <option>ODEDD</option>
                                    <option>ODEDR</option>
                                    <option>OED</option>
                                    <option>PBBD</option>
                                    <option>PMD</option>
                                    <option>PPD</option>
                                    <option>RCEF</option>
                                    <option>RCFSD</option>
                                    <option>REMD</option>
                                    <option>SED</option>
                                    <option>TMSD</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                              </div>
                        </div>
                        
                    </div>
                </form>
            </div>

            {{-- Section 3 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">KSL Opportunity</h2>
            <div id='section3' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <form>

                    {{-- Mode of Sharing --}}
                    <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">Mode of Sharing</label>    
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded">
                            <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Face-to-Face</label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded">
                            <input checked id="bordered-radio-2" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Online/Virtual</label>
                        </div>
                    </div>

                    {{-- KSL Opportunity --}}
                    <div>
                        <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">KSL Opportunity</label>    
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="grid-state">
                                <option selected>Select</option>
                                <option>Briefing</option>
                                <option>Conference</option>
                                <option>Dialogue</option>
                                <option>Forum</option>
                                <option>Info Caravan/Campaign</option>
                                <option>Symposium</option>
                                <option>Seminar/Webinar</option>
                                <option>S&T Updates</option>
                                <option>Site Visit</option>
                                <option>Radio Interview</option>
                                <option>TV Interview</option>
                                <option>E-Inquiry (e.g. email, text, social media, etc.)</option>
                                <option>Other</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Section 4 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Activity/Event Details</h2>
            <div id='section4' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <form>

                    {{-- Title of Event/Activity --}}
                    <div class=" gap-6 mb-6">
                        <label for="event_title" class="block mb-2 text-sm font-medium text-gray-900">Title of Event/Activity</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Title of Event/Activity" required>
                    </div>

                    {{-- Start Date and End Date --}}
                    <div class="grid gap-6 mb-6 md:grid-cols-2">    
                        <div class=" gap-6 mb-6">                   
                            <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">Start Date</label>     
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                                </div>
                                <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select start date">
                            </div>
                        </div>
                        <div class="gap-6 mb-6">                   
                            <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">End Date</label>     
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                                </div>
                                <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select end date">
                            </div>
                        </div>
                    </div>

                    {{-- Event Organizer/Lead --}}
                    <label for="event_organizer" class="block mb-2 text-sm font-medium text-gray-900">Event Organizer/Lead</label>    
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded">
                            <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">PhilRice-organized/sponsored</label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded">
                            <input checked id="bordered-radio-2" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Organized/sponsored by other agency/partners</label>
                        </div>
                    </div>

                    {{-- If not --}}
                    <div class="gap-6 mb-6">
                        <label for="event_title" class="block mb-2 text-sm font-medium text-gray-900">If not PhilRice-organized/sponsored, write name of organizing or sponsoring agency/partner</label>
                        <p class="text-sm text-gray-500 mb-2">Write N/A if none</p>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Title of Event/Activity" required>
                    </div>

                    {{-- Venue --}}
                    <label for="venue" class="block mb-2 text-sm font-medium text-gray-900">Event Organizer/Lead</label>    
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div class="flex items-center ps-4 border border-gray-200 rounded">
                            <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Within PhilRice station</label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded">
                            <input checked id="bordered-radio-2" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Local (but outside PhilRice station)</label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded">
                            <input checked id="bordered-radio-2" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">International</label>
                        </div>
                    </div>                    
                </form>
            </div>

            {{-- Section 5 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Outside PhilRice</h2>
            <div id='section5' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    {{-- Province --}}
                    <div>
                        <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">Province</label>    
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="grid-state">
                                <option selected>Select</option>
                                <option>Abra</option>
                                <option>NCR</option>
                                <option>Agusan Del Norte</option>
                                <option>Agusan Del Sur</option>
                                <option>Aklan</option>
                                <option>Albay</option>
                                <option>Antique</option>
                                <option>Apayao</option>
                                <option>Aurora</option>
                                <option>Basilan</option>
                                <option>Bataan</option>
                                <option>Batanes</option>
                                <option>Batangas</option>
                                <option>Benguet</option>
                                <option>Biliran</option>
                                <option>Bohol</option>
                                <option>Bukidnon</option>
                                <option>Bulacan</option>
                                <option>Cagayan</option>
                                <option>Camarines Norte</option>
                                <option>Camarines Sur</option>
                                <option>Camiguin</option>
                                <option>Capiz</option>
                                <option>Catanduanes</option>
                                <option>Cavite</option>
                                <option>Cebu</option>
                                <option>Compostella Valley</option>
                                <option>Cotabato</option>
                                <option>Davao Del Norte</option>
                                <option>Davao Del Sur</option>
                                <option>Davao Occidental</option>
                                <option>Davao Oriental</option>
                                <option>Dinagat Islands</option>
                                <option>Eastern Samar</option>
                                <option>Guimaras</option>
                                <option>Ifugao</option>
                                <option>Ilocos Norte</option>
                                <option>Ilocos Sur</option>
                                <option>Iloilo</option>
                                <option>Isabela</option>
                                <option>Kalinga</option>
                                <option>La Union</option>
                                <option>Laguna</option>
                                <option>Lanao Del Norte</option>
                                <option>Lanao Del Sur</option>
                                <option>Leyte</option>
                                <option>Maguindanao</option>
                                <option>Marinduque</option>
                                <option>Masbate</option>
                                <option>Misamis Occidental</option>
                                <option>Misamis Oriental</option>
                                <option>Mountain Province</option>
                                <option>Metro Manila</option>
                                <option>Negros Occidental</option>
                                <option>Negros Oriental</option>
                                <option>Northern Samar</option>
                                <option>Nueva Ecija</option>
                                <option>Nueva Vizcaya</option>
                                <option>Occidental Mindoro</option>
                                <option>Oriental Mindoro</option>
                                <option>Palawan</option>
                                <option>Pampanga</option>
                                <option>Pangasinan</option>
                                <option>Quezon</option>
                                <option>Quirino</option>
                                <option>Rizal</option>
                                <option>Romblon</option>
                                <option>Samar</option>
                                <option>Sarangani</option>
                                <option>Siquijor</option>
                                <option>Sorsogon</option>
                                <option>South Cotabato</option>
                                <option>Southern Leyte</option>
                                <option>Sultan Kudarat</option>
                                <option>Sulu</option>
                                <option>Surigao Del Norte</option>
                                <option>Surigao Del Sur</option>
                                <option>Tarlac</option>
                                <option>Tawi-Tawi</option>
                                <option>Zambales</option>
                                <option>Zamboanga Del Norte</option>
                                <option>Zamboanga Del Sur</option>
                                <option>Zamboanga Sibugay</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="gap-6 mb-6">
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900">City/Municipality</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="City/Municipality" required>
                    </div>
                </div>
            </div>

            {{-- Section 6 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">International</h2>
            <div id='section6' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                
                <p class="text-sm text-gray-500 mb-2">Please specify the city and country where the activity was held</p>

                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    {{-- Country --}}
                    <div>
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900">Country</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="City/Municipality" required>
                    </div>

                    {{-- State/City/Province --}}
                    <div>
                        <label for="state" class="block mb-2 text-sm font-medium text-gray-900">State/City/Province</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="City/Municipality" required>
                    </div>

                </div>
            </div>

            {{-- Section 7 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Radio/TV Interview</h2>
            <div id='section7' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">Date of Interview</label>     
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                            </div>
                            <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date of interview">
                        </div>
                    </div>

                    {{-- Name of station/agency --}}
                    <div>
                        <label for="station" class="block mb-2 text-sm font-medium text-gray-900">Name of Station/Agency</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Name of station/agency" required>
                    </div>

                    {{-- Scope/Reach of Program --}}
                    <div>
                        <label for="scope" class="block mb-2 text-sm font-medium text-gray-900">Scope/Reach of Program</label>    
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="grid-state">
                                <option selected>Select</option>
                                <option>Community-Based</option>
                                <option>Provincial</option>
                                <option>Regional</option>
                                <option>National</option>
                                <option>International</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Title of Program --}}
                <div class="gap-6 mb-6">
                    <div>
                        <label for="station" class="block mb-2 text-sm font-medium text-gray-900">Title of Program</label>
                        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Title of Program" required>
                    </div>
                </div>
            </div>

            {{-- Section 8 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">E-Inquiry</h2>
            <div id='section8' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    {{-- Source of Inquiry --}}
                    <div>
                        <label for="scope" class="block mb-2 text-sm font-medium text-gray-900">Source of Inquiry</label>    
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="grid-state">
                                <option selected>Select</option>
                                <option>Email</option>
                                <option>Phone Call</option>
                                <option>Text/SMS</option>
                                <option>Online Messaging Tool</option>
                                <option>Social Media Platforms</option>
                                <option>Other</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Date inquiry was answered --}}
                    <div>
                        <label for="inquiry" class="block mb-2 text-sm font-medium text-gray-900">Date inquiry was answered</label>     
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                            </div>
                            <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date inquiry was answered">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 9 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">E-Inquiry</h2>
            <div id='section9' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                
                {{-- Topics Shared --}}
                <label for="inquiry" class="block mb-2 text-sm font-medium text-gray-900">Topic shared</label>  
                <p class="text-sm text-gray-500 mb-6">Specify the topic of your technical dispatch. Multiple Response. Select all that applies.</p>

                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Varieties</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Seeds</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Land Preparation</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Crop Establishment</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Nutrient Management (including decision support tools)</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Water Management</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Pest Management (insect pests, rats, birds, snails, etc)</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Disease Management</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Harvest Management</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Post Harvest</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Overview of the PalayChecl System</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Rice Machines and Mechanization</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Climate Change and rice</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Rice-based farming technologies</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Organic Agriculture</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">ICT-based knowledge tools (e.g PTC, PinoyRice)</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Mindsetting</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Rice Industry Situation</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Other soft skills (e.g communication, management, negotiation, leadership, teamwork, etc)</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Other...</label>
                    </div>
                </div>

                {{-- Title of Presentation --}}
                <div class="gap-6 mb-6">
                    <label for="presentation_title" class="block mb-2 text-sm font-medium text-gray-900">Title of Prensentation</label>
                    <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Title of Presentation" required>
                </div>
            </div>


            {{-- Section 10 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Participant's Profile 1</h2>
            <div id='section10' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                {{-- Classification of Participants --}}
                <div class="mb-10">
                    <label for="inquiry" class="block mb-2 text-sm font-medium text-gray-900">Classification of Participants</label>  
                    <p class="text-sm text-gray-500 mb-6">Multiple Response. Select all that applies.</p>
    
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Farmer or Seed grower</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Extension workers or other intermediaries (e.g LFT, trainer, extension worker)</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Researcher</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Educator (elementary/high school/college teachers)</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Student (e.g college student, post-graduate student)</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Policy maker (e.g local chief executive)</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Media (e.g broadcaster, vlogger, etc)</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">Industry Player (e.g trader, miller, wholesaler, retailer)</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="inline-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">other (e.g OFW, job seeker, freelancer, consultant)</label>
                        </div>
                    </div>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2"> 
                    <div>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Number of Participants</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Of the total number, how many are farmers and seed growers</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Of the total number, how many are extension workers and intermediaries (ATs/AEWs, AgRiDOCs, etc.)</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Of the total number, how many are members of the scientific community (researchers, academe)</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                </div>
                <div>
                    <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total number of other participants from other sectors (rice industry players, media, policymakers, general rice consumers)</label>
                    <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                    <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                </div>
            </div>

            {{-- Section 11 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Participant's Profile 2</h2>
            <div id='section11' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="grid gap-6 mb-6 md:grid-cols-2"> 
                    <div>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Male Participants</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Female Participants</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Indigenous People</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of PWD</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                </div>
            </div>

            {{-- Section 12 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Documentation</h2>
            <div id='section12' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="mb-6">                        
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Photo documentation of event/activity</label>
                    <p class="text-sm text-gray-500 mb-6">Upload up to 10 clear photo highlights of the event/activity</p>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>
                </div>
                <div class="mb-6">                        
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Photo documentation of event/activity</label>
                    <p class="text-sm text-gray-500 mb-6">You may upload other forms of documentation such as request letter, copy of event program, attendance/registration sheet, and other relevant documents, spreadsheet, or PDF file, as applicable</p>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>
                </div>
            </div>



        </section>

        {{-- Back Link --}}
        <div class="w-full lg:w-4/5 lg:ml-auto text-base md:text-sm text-gray-600 px-4 py-24 mb-12 flex items-center justify-between">
            <span class="text-base text-yellow-600 font-bold">&lt;</span> 
            <a href="#" class="text-base md:text-sm text-yellow-600 font-bold no-underline hover:underline mr-auto">Go back to home</a>
            
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                {{-- <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg> --}}
                <box-icon name='send' color="#ffffff"></box-icon>
                Submit
            </button>
        </div>
        
        

    </div>

{{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}

<!-- Toggle dropdown list -->

<script>

var userMenuDiv = document.getElementById("userMenu");
var userMenu = document.getElementById("userButton");

 var helpMenuDiv = document.getElementById("menu-content");
 var helpMenu = document.getElementById("menu-toggle");

document.onclick = check;

function check(e){
  var target = (e && e.target) || (event && event.srcElement);

  //User Menu
  if (!checkParent(target, userMenuDiv)) {
	// click NOT on the menu
	if (checkParent(target, userMenu)) {
	  // click on the link
	  if (userMenuDiv.classList.contains("invisible")) {
		userMenuDiv.classList.remove("invisible");
	  } else {userMenuDiv.classList.add("invisible");}
	} else {
	  // click both outside link and outside menu, hide menu
	  userMenuDiv.classList.add("invisible");
	}
  }

   //Help Menu
   if (!checkParent(target, helpMenuDiv)) {
	// click NOT on the menu
	if (checkParent(target, helpMenu)) {
	  // click on the link
	  if (helpMenuDiv.classList.contains("hidden")) {
		helpMenuDiv.classList.remove("hidden");
	  } else {helpMenuDiv.classList.add("hidden");}
	} else {
	  // click both outside link and outside menu, hide menu
	  helpMenuDiv.classList.add("hidden");
	}
   }

}

function checkParent(t, elm) {
  while(t.parentNode) {
	if( t == elm ) {return true;}
	t = t.parentNode;
  }
  return false;
}

</script>

<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Scroll Spy -->
<script>
/* http://jsfiddle.net/LwLBx/ */

// Cache selectors
var lastId,
    topMenu = $("#menu-content"),
    topMenuHeight = topMenu.outerHeight()+175,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.click(function(e){
  var href = $(this).attr("href"),
      offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
  $('html, body').stop().animate({ 
      scrollTop: offsetTop
  }, 300);
  if (!helpMenuDiv.classList.contains("hidden")) {
		helpMenuDiv.classList.add("hidden");
	  }
  e.preventDefault();
});

// Bind to scroll
$(window).scroll(function(){
   // Get container scroll position
   var fromTop = $(this).scrollTop()+topMenuHeight;

   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";

   if (lastId !== id) {
       lastId = id;
       // Set/remove active class
       menuItems
         .parent().removeClass("font-bold border-yellow-600")
         .end().filter("[href='#"+id+"']").parent().addClass("font-bold border-yellow-600");
   }                   
});

</script>

</body>
</html>