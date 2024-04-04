@extends('layouts.dashboard')

@section('title')
    Summary of Trainings Conducted
@endsection

@section('sidebar')
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">

                {{-- Overview --}}
                <li>
                    <a href="{{ route('encoder.overview') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
                        <span class="ml-3">Overview</span>
                    </a>
                </li>

                {{-- CES --}}
                <li>
                    <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                        aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
                        <box-icon name='chevron-down'></box-icon>
                    </a>
                    <ul id="dropdown-sales" class="py-2 space-y-2">
                        <li>
                            <a href="{{ route('encoder.ces_view') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='line-chart'></box-icon>
                                <span class="ml-3">View Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.ces_add') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='plus'></box-icon>
                                <span class="ml-3">Add Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.ces_edit') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='edit-alt' type='solid'></box-icon>
                                <span class="ml-3">Edit Data</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- AGUSAN --}}
                <li>
                    <a href="{{ route('encoder.agusan') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">AGUSAN</span>
                    </a>
                </li>

                {{-- BATAC --}}
                <li>
                    <a href="{{ route('encoder.batac') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BATAC</span>
                    </a>
                </li>

                {{-- BICOL --}}
                <li>
                    <a href="{{ route('encoder.bicol') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BICOL</span>
                    </a>
                </li>

                {{-- ISABELA --}}
                <li>
                    <a href="{{ route('encoder.isabela') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">ISABELA</span>
                    </a>
                </li>

                {{-- LOS BAÑOS --}}
                <li>
                    <a href="{{ route('encoder.losbaños') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">LOS BAÑOS</span>
                    </a>
                </li>

                {{-- MIDSAYAP --}}
                <li>
                    <a href="{{ route('encoder.midsayap') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">MIDSAYAP</span>
                    </a>
                </li>

                {{-- NEGROS --}}
                <li>
                    <a href="{{ route('encoder.negros') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">NEGROS</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
@endsection

@section('content')
    <main class="p-8 md:ml-64 pt-20 h-screen">

        {{-- Form Title --}}
        <div class="flex mb-4">
            <h1 class="text-xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-4xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PhilRice CES</span>
                Summary of Trainings Conducted</h1>
        </div>

        {{-- Multi Page Form --}}
        <form id="trainingsForm"
            class="px-10 py-8 shadow-md rounded-2xl bg-white mx-auto border-solid border-2 border-gray-100">

            {{-- Section 1 --}}
            <div class="section" data-section="1">
                <div>
                    <div class="w-full h-80 overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ asset('assets/form1.jpg') }}" alt="Form Header">
                    </div>
                </div>
                <div>
                    <blockquote class="border-l-4 border-yellow-400 italic my-4 pl-8 md:pl-12">
                        Training refers to activities aimed at developing or improving the knowledge and skills of rice
                        stakeholders wherein gain in knowledge is measured. These may be initiated or implemented by
                        PhilRice (including RCEF and other extra core and external projects), or in partnership with other
                        agencies and sponsors.
                        <br><br>
                        Privacy Notice: PhilRice is committed to comply with Republic Act No. 10173, otherwise known as the
                        Data Privacy Act of 2012 to safeguard your privacy and personal information.
                    </blockquote>
                </div>
            </div>

            {{-- Section 2 --}}
            <div class="section" data-section="2" style="display: none;">
                <div class="flex">
                    <h6 class="text-lg font-bold dark:text-white">Training Details</h6>
                </div>

                <div class="my-2 grid grid-cols-2 gap-x-4">

                    {{-- Training Title --}}
                    <div class="col-span-2">
                        <label for="training_title" class="block my-2 text-sm font-medium text-gray-900">Title of
                            Training</label>
                        <div class="relative">
                            <select id="training_title" name="training_title" onchange="toggleOtherTitle()"
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled>Select</option>
                                <option>RCEF Training of Trainers on the Production of High-Quality Inbred Rice and Seeds,
                                    and Farm Mechanization - CES 2023 Batch 01</option>
                                <option>BC1- Introduction to the PalayCheck System for Irrigated Lowland Rice</option>
                                <option>Farmers Field School on Mechanized Direct-seeded Rice</option>
                                <option>RCEF Refresher Course for Rice Specialists</option>
                                <option>RCEF Short Course on Pest and Nutrient Management</option>
                                <option>Integrated Nutrient Management in Rice</option>
                                <option>RCEF Refresher Course for AgRiDOCs</option>
                                <option>Training of Trainers on pest and nutrient management</option>
                                <option>Integrated Pest Management in Rice</option>
                                <option>RCEF-Rice Specialists' Training Course</option>
                                <option>RCEF Refresher Course for Rice Trainers</option>
                                <option>Training on Internal Seed Quality Control and Assurance for the Internal Seed
                                    Quality Control Committee (IQCC) of Siquijor Province</option>
                                <option>RCEF Short Course on Pest and Nutrient Management (Batch 04)</option>
                                <option>RCEF Farmer Field School on the Production of High-Quality Inbred Rice, Seed
                                    Certification, and Farm Mechanization (Batch 01)</option>
                                <option>Specialized Training on High Quality Inbre Rice Seed Production, and
                                    Entrepreneurship and Marketing for Local Seed Producers in Siquijor, Province</option>
                                <option>Rice Crop Manager Services Regional Training - Region 7</option>
                                <option>RCMAS Retooling, Target Setting, and Strategic Planning MIMAROPA in Magsaysay,
                                    Occidental Mindoro</option>
                                <option>Rice Crop Manager Advisory Services Training DA RFO 9</option>
                                <option>Philippine Good Agricultural Practices</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>

                    {{-- Additional Input Field for Training Title when Other is selected --}}
                    <div id="otherTrainingTitle" style="display: none;" class="col-span-2">
                        <label for="otherTrainingInput" class="block my-2 text-sm font-medium text-gray-900">Other Training
                            Title</label>
                        <input type="text" id="otherTrainingInput" name="otherTrainingInput"
                            class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                    </div>
                </div>

                <div class="my-2 grid grid-cols-3 gap-x-4 max-[760px]:grid-cols-1">
                    {{-- Training Category --}}
                    <div>
                        <label for="training_category" class="block my-2 text-sm font-medium text-gray-900">Training
                            Category</label>
                        <div class="relative">
                            <select id="training_category" name="training_category" onchange="toggleOtherTitle()"
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled>Select</option>
                                <option>Specialized Course</option>
                                <option>Customized/Short Course</option>
                                <option>Farmers' Field School (FFS)</option>
                                <option>Refresher Course</option>
                                <option>Training of Trainers (TOT)</option>
                                <option>Rice Specialists' Training Course (RSTC)</option>
                                <option>Short Course</option>
                                <option>PhilGap Training</option>
                                <option>Philippine Good Agricultural Practices Training</option>
                            </select>
                        </div>
                    </div>

                    {{-- Training Style --}}
                    <div>
                        <label for="training_style" class="block my-2 text-sm font-medium text-gray-900">Training
                            Style</label>
                        <div class="relative">
                            <select id="training_style" name="training_style"
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled>Select</option>
                                <option>Face to Face</option>
                                <option>Online</option>
                                <option>Blended (Online + Face to Face)</option>
                            </select>
                        </div>
                    </div>

                    <div>


                        {{-- Venue --}}
                        <div>
                            <label for="training_venue" class="block my-2 text-sm font-medium text-gray-900">Venue</label>
                            <div class="relative">
                                <select id="training_venue" name="training_venue" onchange="toggleOutsidePhilrice()"
                                    class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                    <option selected disabled>Select</option>
                                    <option>Within PhilRice Station</option>
                                    <option>Outside PhilRice Station (Local)</option>
                                </select>
                            </div>
                        </div>

                        {{-- Additional Input Field for Outside PhilRice Station --}}
                        <div id="outsidePhilrice" style="display: none;" class="col-span-3">
                            <label for="outsidePhilriceInput" class="block my-2 text-sm font-medium text-gray-900">Outside
                                PhilRice Station (Local)</label>
                            <input type="text" id="outsidePhilriceInput" name="outsidePhilriceInput"
                                class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                        </div>
                    </div>

                </div>

                {{-- Start Date and End Date --}}
                <div class="my-2 grid grid-cols-2 gap-x-4">
                    <div>
                        <label for="start_date" class="block my-2 text-sm font-medium text-gray-900">Start Date</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker type="text" name="start_date" value="{{ old('start_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                placeholder="MM/DD/YYYY" required>
                        </div>
                    </div>
                    <div>
                        <label for="end_date" class="block my-2 text-sm font-medium text-gray-900">End Date</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker type="text" name="end_date" value="{{ old('end_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                placeholder="MM/DD/YYYY" required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 3 --}}
            <div class="section" data-section="3" style="display: none;">
                <div class="flex">
                    <h6 class="text-lg font-bold dark:text-white">Conduct of Training</h6>
                </div>

                {{-- Name of Implementing Partner/s or Co-Organizer/s --}}
                <div class="my-2 grid grid-cols-2 gap-x-4">
                    <div class="col-span-2">
                        <label for="sponsor" class="block my-2 text-sm font-medium text-gray-900">Name of Implementing
                            Partner/s or Co-Organizer/s</label>
                        <p class="text-sm text-gray-500 mb-2">Specify name of partner, sponsor, or co-organizer. If more
                            than one, separate with comma. If no co-implementer write NONE.</p>
                        <input type="text" id="sponsor" name="sponsor" value="{{ old('sponsor') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Name of Implementing Partner/s or Co-Organizer/s" required>
                    </div>
                </div>

                {{-- Source of Fund --}}
                <div class="my-2 grid grid-cols-2 gap-x-4">
                    <div class="col-span-2">
                        <label for="source_of_fund" class="block my-2 text-sm font-medium text-gray-900">Source of
                            Fund</label>
                        <p class="text-sm text-gray-500 mb-2">Specify source of fund for conduct of training</p>
                        <div class="relative">
                            <select id="source_of_fund" name="source_of_fund"
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                required>
                                <option selected disabled>Select</option>
                                <option value="Core Fund">Core Fund</option>
                                <option value="RCEF">RCEF</option>
                                <option value="Other: Extra-core Fund">Other: Extra-core Fund</option>
                                <option value="Other: External Fund">Other: External Fund</option>
                                <option value="other">Other</option>
                            </select>
                            <input type="text" name="other_fund" id="other_fund" value="{{ old('other_fund') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                style="display: none;">
                        </div>
                    </div>
                </div>

                <div class="my-2 grid grid-cols-2 gap-x-4 max-[760px]:grid-cols-1">
                    {{-- Average GIK --}}
                    <div>
                        <label for="average_gik"
                            class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Average Gain in Knowledge
                            (GIK)</label>
                        <p class="text-sm text-gray-500 mb-2">Please specify the Average GIK as a percentage</p>
                        <input type="text" id="average_gik" name="average_gik" value="{{ old('average_gik') }}"
                            min="0" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="100%" required />
                    </div>

                    {{-- Overall Training Evaluation --}}
                    <div>
                        <label for="evaluation" class="block my-2 text-sm font-medium text-gray-900">Overall Training
                            Evaluation Rating</label>
                        <p class="text-sm text-gray-500 mb-2">Write numerical score(average) and its corresponding
                            rating</p>
                        <div class="grid grid-cols-2 gap-x-1">
                            <div>
                                <input type="number" id="evaluationInput" name="evaluationInput"
                                    value="{{ old('evaluation') }}" min="1" max="5"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="4.8" required>
                            </div>
                            <div>
                                <input disabled type="text" id="evaluationOutput" name="evaluationOutput"
                                    value="{{ old('evaluation') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Section 4 --}}
            <div class="section" data-section="4" style="display: none;">
                <div class="flex">
                    <h6 class="text-lg font-bold dark:text-white">Participant's Profile (Sector)</h6>
                </div>
                {{-- Total Num of Participants --}}
                <div class="my-2 grid grid-cols-2">
                    <div class="col-span-2">
                        <label for="total_participants"
                            class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Total Number of
                            Participants</label>
                        <p class="text-sm text-gray-500 mb-2">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="total_participants" name="total_participants"
                            value="{{ old('total_participants') }}" min="0"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="100" required />
                    </div>
                </div>

                {{-- Breakdown of Participants  --}}
                <div class="my-2 grid grid-cols-3 gap-x-4 max-[760px]:grid-cols-1">

                    {{-- Total Num of Farmers and Seed Growers --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_farmers_and_growers"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How
                                many are farmers and seed growers?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button"
                                data-input-counter-decrement="num_of_farmers_and_growers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_farmers_and_growers" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-seedling"></i>
                                {{-- <span>Farmers and Seed Growers</span> --}}
                            </div>
                            <button type="button" id="increment-button"
                                data-input-counter-increment="num_of_farmers_and_growers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Extension Workers  --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_extension_workers"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How many are extension
                                workers and intermediaries (ATs/AEWs, AgRiDOCs, etc.)?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button"
                                data-input-counter-decrement="num_of_extension_workers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_extension_workers" data-input-counter
                                data-input-counter-min="1" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <button type="button" id="increment-button"
                                data-input-counter-increment="num_of_extension_workers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Scientific Community --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_scientific"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How many are members
                                of the scientific community (researchers, academe)?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button" data-input-counter-decrement="num_of_scientific"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_scientific" data-input-counter data-input-counter-min="1"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-book-open-reader"></i>
                            </div>
                            <button type="button" id="increment-button" data-input-counter-increment="num_of_scientific"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="my-2 grid grid-cols-3 gap-x-4 max-[760px]:grid-cols-1">
                    {{-- Total Num of Educator (elementary/high school/college teachers) --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_educators"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How
                                many are educators (elementary/high school/college teachers)?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button" data-input-counter-decrement="num_of_educators"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_educators" data-input-counter data-input-counter-min="0"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-person-chalkboard"></i>
                            </div>
                            <button type="button" id="increment-button" data-input-counter-increment="num_of_educators"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Industry Players (e.g trader, miller, wholesaler, retailer)  --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_industry_players"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How many are Industry
                                Players (e.g trader, miller, wholesaler, retailer)?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button"
                                data-input-counter-decrement="num_of_industry_players"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_industry_players" data-input-counter
                                data-input-counter-min="1" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-industry"></i>
                            </div>
                            <button type="button" id="increment-button"
                                data-input-counter-increment="num_of_industry_players"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Policy maker (e.g local chief executive) --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_policy_makers"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How many are Policy
                                makers (e.g local chief executive)?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button"
                                data-input-counter-decrement="num_of_policy_makers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_policy_makers" data-input-counter data-input-counter-min="1"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-building-shield"></i>
                            </div>
                            <button type="button" id="increment-button"
                                data-input-counter-increment="num_of_policy_makers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="my-2 grid grid-cols-3 gap-x-4 max-[760px]:grid-cols-1">
                    {{-- Total Num of Researchers --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_researchers"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How
                                many are Researchers?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button"
                                data-input-counter-decrement="num_of_researchers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_researchers" data-input-counter data-input-counter-min="0"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-book"></i>
                            </div>
                            <button type="button" id="increment-button"
                                data-input-counter-increment="num_of_researchers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Students  --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_students"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How many are
                                Students?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button" data-input-counter-decrement="num_of_students"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_students" data-input-counter data-input-counter-min="1"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-school"></i>
                            </div>
                            <button type="button" id="increment-button" data-input-counter-increment="num_of_students"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Media (e.g broadcaster, vlogger, etc) --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_media"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How many are Media
                                (e.g broadcaster, vlogger, etc)?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button" data-input-counter-decrement="num_of_media"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_media" data-input-counter data-input-counter-min="1"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-building-shield"></i>
                            </div>
                            <button type="button" id="increment-button" data-input-counter-increment="num_of_media"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 5 --}}
            <div class="section" data-section="5" style="display: none;">
                <div class="flex">
                    <h6 class="text-lg font-bold dark:text-white">Participant's Profile (Demographic)</h6>
                </div>

                <div class="my-2 grid grid-cols-2 gap-x-4 max-[760px]:grid-cols-1">

                    {{-- Total Num of Female Participants --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_female"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How
                                many are female?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button" data-input-counter-decrement="num_of_female"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_female" data-input-counter data-input-counter-min="0"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-person-dress"></i>
                            </div>
                            <button type="button" id="increment-button" data-input-counter-increment="num_of_female"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Male Participants --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_male"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How
                                many are male?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button" data-input-counter-decrement="num_of_male"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_male" data-input-counter data-input-counter-min="0"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-person"></i>
                            </div>
                            <button type="button" id="increment-button" data-input-counter-increment="num_of_male"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Indigenous --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_indigenous"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How
                                many are indigenous?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button" data-input-counter-decrement="num_of_indigenous"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_indigenous" data-input-counter data-input-counter-min="0"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-people-group"></i>
                            </div>
                            <button type="button" id="increment-button" data-input-counter-increment="num_of_indigenous"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of PWD --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label for="num_of_pwd"
                                class="block my-2 text-sm font-medium text-gray-900 dark:text-white">How
                                many are PWD?</label>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button" data-input-counter-decrement="num_of_pwd"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_pwd" data-input-counter data-input-counter-min="0"
                                data-input-counter-max="" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-3 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-wheelchair"></i>
                            </div>
                            <button type="button" id="increment-button" data-input-counter-increment="num_of_pwd"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Section 6 --}}
            <div class="section" data-section="6" style="display: none;">
                <div class="flex">
                    <h6 class="text-lg font-bold dark:text-white">Documentation</h6>
                </div>

                <div class="my-2 grid grid-cols-2 gap-x-4 max-[760px]:grid-cols-1">
                    <div class="mb-6 col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="photo_doc_event">Photo documentation of event/activity</label>
                        <p class="text-sm text-gray-500 mb-6">Upload up to 10 clear photo highlights of the training
                            conducted. Ensure that photo files have been named properly before uploading using the
                            Station_typeoftraining_site format (e.g. Batac_FFS_Piddig)</p>
                        <input required id="photo_doc_event" name="photo_doc_event[]"
                            accept="image/png, image/gif, image/jpeg"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="file" multiple>
                    </div>
                    <div class="mb-6 col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="other_doc">Other
                            forms of documentation</label>
                        <p class="text-sm text-gray-500 mb-6">You may upload other forms of training documentation such as
                            attendance/registration sheet, copy of event program, short video or audio clip, and other
                            relevant documents, spreadsheet, or PDF file.</p>
                        <input required id="other_doc" name="other_doc[]"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="file" multiple>
                    </div>
                </div>
            </div>


            {{-- Previous and Next Button --}}
            <div class="mt my-4 flex justify-between items-center">
                <div>
                    <span id="sectionNumber" class="text-gray-600 font-medium mr-4"></span>
                </div>
                <div>
                    <button type="button" id="prevBtn" onclick="prevSection()"
                        class="text-gray-900 border border-gray-300 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-2">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextSection()"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Next</button>
                </div>
            </div>

        </form>
    </main>
@endsection

@section('scripts')
    {{-- Toggle for Optional Inputs --}}
    <script>
        function toggleOtherTitle() {
            var selectElement = document.getElementById("training_title");
            var otherTrainingTitle = document.getElementById("otherTrainingTitle");

            if (selectElement.value === "Other") {
                otherTrainingTitle.style.display = "block";
            } else {
                otherTrainingTitle.style.display = "none";
            }
        }

        function toggleOutsidePhilrice() {
            var selectElement = document.getElementById("training_venue");
            var outsidePhilrice = document.getElementById("outsidePhilrice");

            if (selectElement.value === "Outside PhilRice Station (Local)") {
                outsidePhilrice.style.display = "block";
            } else {
                outsidePhilrice.style.display = "none";
            }
        }
    </script>

    {{-- 1 to 5 Evaluation Scale --}}
    <script>
        document.getElementById('evaluationInput').addEventListener('input', function() {
            var evaluationInput = parseInt(this.value);
            var evaluationOutput = document.getElementById('evaluationOutput');

            if (evaluationInput === 0) {
                evaluationOutput.value = 'Minimum rate is 1';
            } else if (evaluationInput > 5) {
                evaluationOutput.value = "Maximum rate is 5"
            } else {
                switch (evaluationInput) {
                    case 1:
                        evaluationOutput.value = 'Poor';
                        break;
                    case 2:
                        evaluationOutput.value = 'Unsatisfactory';
                        break;
                    case 3:
                        evaluationOutput.value = 'Satisfactory';
                        break;
                    case 4:
                        evaluationOutput.value = 'Very Satisfactory';
                        break;
                    case 5:
                        evaluationOutput.value = 'Outstanding';
                        break;
                    default:
                        evaluationOutput.value = '';
                }
            }
        });
    </script>

    {{-- Paginate Trainings Form --}}
    <script>
        let currentSection = 1;
        const sections = document.querySelectorAll('.section');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const sectionNumberElement = document.getElementById('sectionNumber'); // Added

        function showSection(sectionNumber) {
            sections.forEach(section => {
                if (section.dataset.section == sectionNumber) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        }

        function prevSection() {
            if (currentSection > 1) {
                currentSection--;
                showSection(currentSection);
            }
            updateButtons();
        }

        function nextSection() {
            if (currentSection < sections.length) {
                currentSection++;
                showSection(currentSection);
            }
            updateButtons();
        }

        function updateButtons() {
            if (currentSection === 1) {
                prevBtn.disabled = true;
                prevBtn.style.display = 'none';
            } else {
                prevBtn.disabled = false;
                prevBtn.style.display = 'inline-flex';
            }

            if (currentSection === sections.length) {
                nextBtn.innerHTML = 'Submit';
            } else {
                nextBtn.innerHTML = 'Next';
            }

            // Update section number
            sectionNumberElement.innerText = "Section " + currentSection + " of " + sections.length; // Added
        }

        // Show the initial section
        showSection(currentSection);
        updateButtons();
    </script>
@endsection
