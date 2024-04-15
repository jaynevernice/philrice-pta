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

        {{-- Success/Error Message from TrainingsFormController --}}
        @include('_message')

        {{-- Multi Page Form --}}
        <form id="trainingsForm" action="{{ route('trainingsform.store') }}" method="POST" enctype="multipart/form-data"
            class="px-10 py-8 shadow-md rounded-2xl bg-white mx-auto border-solid border-2 border-gray-100">
            @csrf
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
                            <select required id="training_title" name="training_title" onchange="toggleOtherTitle()"
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled value="">Select</option>
                                @foreach ($titles as $title)
                                    <option value="{{ $title->training_title }}">{{ $title->training_title }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    {{-- Additional Input Field for Training Title when Other is selected --}}
                    <div id="otherTrainingTitle" style="display: none;" class="col-span-2">
                        <label for="otherTrainingInput" class="block my-2 text-sm font-medium text-gray-900">Other
                            Training
                            Title</label>
                        <input type="text" id="otherTrainingInput" name="otherTrainingInput"
                            class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                    </div>
                </div>

                <div id="row2" class="my-2 grid grid-cols-3 gap-x-4 max-[760px]:grid-cols-1">
                    {{-- Training Category --}}
                    <div>
                        <label for="training_category" class="block my-2 text-sm font-medium text-gray-900">Training
                            Category</label>
                        <div class="relative">
                            <select id="training_category" name="training_category" required
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled value="">Select</option>
                                <option value="">Beginner Course</option>
                                <option value="">Intermediate Course</option>
                                <option value="">Advanced Course</option>
                            </select>
                        </div>
                    </div>

                    {{-- Type of Training --}}
                    <div>
                        <label for="training_type" class="block my-2 text-sm font-medium text-gray-900">Type of
                            Training</label>
                        <div class="relative">
                            <select id="training_type" name="training_type" onchange="toggleType()" required
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled value="">Select</option>
                                <option value="Local">Local</option>
                                <option value="International">International</option>
                            </select>
                        </div>
                    </div>

                    {{-- Mode of Delivery --}}
                    <div>
                        <label for="mod" class="block my-2 text-sm font-medium text-gray-900">Mode of
                            Delivery</label>
                        <div class="relative">
                            <select id="mod" name="mod" required
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled value="">Select</option>
                                <option value="Face to Face">Face-to-Face</option>
                                <option value="Online">Online</option>
                                <option value="Blended (Online + Face to Face)">Blended (Online + Face-to-Face)</option>
                            </select>
                        </div>
                    </div>

                    {{-- Venue --}}
                    <div id="training_venue_container" style="display: none;">
                        <label for="training_venue" class="block my-2 text-sm font-medium text-gray-900">Venue</label>
                        <div class="relative">
                            <select id="training_venue" name="training_venue" onchange="toggleVenue()" required
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled value="">Select</option>
                                <option value="Within PhilRice Station">Within PhilRice Station</option>
                                <option value="Outside PhilRice Station">Outside PhilRice Station</option>
                            </select>
                        </div>
                    </div>

                    {{-- Additional Input Field for Outside PhilRice Station --}}
                    {{-- <div id="outsidePhilrice" style="display: none;" class="col-span-3"> --}}
                    {{-- <div id="outsidePhilrice" style="display: none;" class="col-span-3">
                            <label for="outsidePhilriceInput" class="block my-2 text-sm font-medium text-gray-900">Outside
                                PhilRice Station</label>
                            <input type="text" id="outsidePhilriceInput" name="outsidePhilriceInput"
                                class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                        </div> --}}

                </div>

                {{-- Additional Input Field for International Training Type --}}
                <div id="internationalTraining" style="display: none;" class="col-span-2">
                    <label for="internationalTrainingInput"
                        class="block my-2 text-sm font-medium text-gray-900">International Venue</label>
                    <input type="text" id="internationalTrainingInput" name="internationalTrainingInput"
                        class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                </div>

                {{-- Additional Input Field for Within PhilRice Station --}}
                <div id="withinPhilrice" style="display: none;" class="col-span-3">
                    <label for="withinPhilriceInput" class="block my-2 text-sm font-medium text-gray-900">Within PhilRice
                        Station</label>
                    <select name="withinPhilriceInput" id="withinPhilriceInput"
                        class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                        <option selected disabled>Select</option>
                        <option value="">CES</option>
                    </select>
                </div>

                {{-- Additional Input Field for Outside PhilRice Station --}}
                <div id="outsidePhilrice" style="display: none;" class="col-span-3">
                    <label for="outsidePhilriceInput" class="block my-2 text-sm font-medium text-gray-900">Outside
                        PhilRice Station</label>
                    <input type="text" id="outsidePhilriceInput" name="outsidePhilriceInput"
                        class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                </div>


                {{-- Start Date and End Date --}}
                <div date-rangepicker class="my-2 grid grid-cols-2 gap-x-4">
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
                            <input type="text" id="start_date" name="start" value="{{ old('start_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                placeholder="MM/DD/YYYY" onkeypress="return isNumericDateInput(event)" required>
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
                            <input type="text" id="end_date" name="end" value="{{ old('end_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                placeholder="MM/DD/YYYY" onkeypress="return isNumericDateInput(event)" required>
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
                            than one, separate with comma. Please do not abbreviate the name(s). If no co-implementer write
                            N/A. </p>
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
                                <option selected disabled value="">Select</option>
                                @foreach ($funds as $fund)
                                    <option value="{{ $fund->fund }}">{{ $fund->fund }}</option>
                                @endforeach
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
                        <p class="text-sm text-gray-500 mb-2">Please specify the Average GIK as a percentage. Write N/A if
                            there is no GIK to input.</p>
                        <input type="text" id="average_gik" name="average_gik" value="{{ old('average_gik') }}"
                            min="0" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="40%" required />
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
                                    value="{{ old('evaluationInput') }}" min="1" max="5" step="0.01"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="4.8" required>
                            </div>
                            <div>
                                <input disabled type="text" id="evaluationOutput" name="evaluationOutput"
                                    value="{{ old('evaluationOutput') }}"
                                    class="border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-white font-bold">
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

                <hr class="my-4">
                <label class="block text-sm font-medium text-gray-900 dark:text-white">Of the total number,</label>


                {{-- Breakdown of Participants  --}}
                <div class="my-1 grid grid-cols-4 gap-x-4 max-[760px]:grid-cols-1">

                    {{-- Total Num of Farmers and Seed Growers --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <p class="text-sm text-gray-500 mb-2">How
                                many are farmers and seed growers?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button1"
                                data-input-counter-decrement="num_of_farmers_and_growers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_farmers_and_growers" name="num_of_farmers_and_growers"
                                data-input-counter data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="0" required />
                            <div
                                class="absolute bottom-5 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-seedling"></i>
                                {{-- <span>Farmers and Seed Growers</span> --}}
                            </div>
                            <button type="button" id="increment-button1"
                                data-input-counter-increment="num_of_farmers_and_growers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Extension Workers  --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <p class="text-sm text-gray-500 mb-2">How many are extension
                                workers and intermediaries (ATs/AEWs, AgRiDOCs, etc.)?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button2"
                                data-input-counter-decrement="num_of_extension_workers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_extension_workers" name="num_of_extension_workers"
                                data-input-counter data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="0" required />
                            <div
                                class="absolute bottom-5 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <button type="button" id="increment-button2"
                                data-input-counter-increment="num_of_extension_workers"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Scientific Community --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <p class="text-sm text-gray-500 mb-2">How many are members
                                of the scientific community (researchers, academe)?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button3"
                                data-input-counter-decrement="num_of_scientific"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_scientific" name="num_of_scientific" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="0" required />
                            <div
                                class="absolute bottom-5 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-book-open-reader"></i>
                            </div>
                            <button type="button" id="increment-button3"
                                data-input-counter-increment="num_of_scientific"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Other Participants --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <p class="text-sm text-gray-500 mb-2">How many are from
                                other sectors (rice industry players, media, policymakers, general rice consumers)?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button4" data-input-counter-decrement="num_of_other"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_other" name="num_of_other" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-5 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-building-shield"></i>
                            </div>
                            <button type="button" id="increment-button4" data-input-counter-increment="num_of_other"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <label class="block text-sm font-medium text-gray-900 dark:text-white">Of the total number,</label>

                <div class="my-1 grid grid-cols-2 gap-x-4 max-[760px]:grid-cols-1">

                    {{-- Total Num of Male Participants --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <p class="text-sm text-gray-500 mb-2">How many are male?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button4" data-input-counter-decrement="num_of_male"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_male" name="num_of_male" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-2 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-person"></i>
                            </div>
                            <button type="button" id="increment-button4" data-input-counter-increment="num_of_male"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of Female Participants --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <p class="text-sm text-gray-500 mb-2">How many are female?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button4" data-input-counter-decrement="num_of_female"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_female" name="num_of_female" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-2 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-people-group"></i>
                            </div>
                            <button type="button" id="increment-button4" data-input-counter-increment="num_of_female"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="my-1 grid grid-cols-2 gap-x-4 max-[760px]:grid-cols-1">
                    {{-- Total Num of Indigenous People --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 dark:text-white">Of the total
                                number,</label>
                            <p class="text-sm text-gray-500 mb-2">How many are indigenous individuals?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button5"
                                data-input-counter-decrement="num_of_indigenous"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_indigenous" name="num_of_indigenous" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-2 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-person-dress"></i>
                            </div>
                            <button type="button" id="increment-button5"
                                data-input-counter-increment="num_of_indigenous"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of PWD --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 dark:text-white">Of the total
                                number,</label>
                            <p class="text-sm text-gray-500 mb-2">How many are differently abled individuals (PWD)?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button6" data-input-counter-decrement="num_of_pwd"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_pwd" name="num_of_pwd" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="" required />
                            <div
                                class="absolute bottom-2 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-wheelchair"></i>
                            </div>
                            <button type="button" id="increment-button6" data-input-counter-increment="num_of_pwd"
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
    {{-- <script>
        function toggleOtherTitle() {
            var selectElement = document.getElementById("training_title");
            var otherTrainingTitle = document.getElementById("otherTrainingTitle");

            if (selectElement.value === "Other") {
                otherTrainingTitle.style.display = "block";
            } else {
                otherTrainingTitle.style.display = "none";
            }
        }

        function toggleVenue() {
            var selectElement = document.getElementById("training_venue");
            var outsidePhilrice = document.getElementById("outsidePhilrice");
            var withinPhilrice = document.getElementById("withinPhilrice");

            if (selectElement.value === "Outside PhilRice Station") {
                outsidePhilrice.style.display = "block";
                withinPhilrice.style.display = "none"; // Ensure this is hidden when the other is shown
            } else if (selectElement.value === "Within PhilRice Station") {
                withinPhilrice.style.display = "block";
                outsidePhilrice.style.display = "none"; // Ensure this is hidden when the other is shown
            } 
            else {
                outsidePhilrice.style.display = "none";
                withinPhilrice.style.display = "none";
            }
        }


        function toggleType() {
            var selectElement = document.getElementById("training_type");
            var localTraining = document.getElementById("training_venue_container");
            var internationalTraining = document.getElementById("internationalTraining");

            // Store row2 na div sa variable
            var row2 = document.getElementById("row2");
            var row2Classes = row2.classList;

            if (selectElement.value === "Local") {
                localTraining.style.display = "block";
                internationalTraining.style.display = "none";

                // Adjust grid columns
                row2Classes.remove("grid-cols-3");
                row2Classes.add("grid-cols-4");
            } else if (selectElement.value === "International") {
                localTraining.style.display = "none";
                internationalTraining.style.display = "block";

                outsidePhilrice.style.display = "none";
                withinPhilrice.style.display = "none";

                // Adjust grid columns
                row2Classes.remove("grid-cols-4");
                row2Classes.add("grid-cols-3");
            } else {
                localTraining.style.display = "none";
                internationalTraining.style.display = "none";
                outsidePhilrice.style.display = "none";
                withinPhilrice.style.display = "none";
            }
        }
    </script> --}}
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

        function toggleVenue() {
            var selectElement = document.getElementById("training_venue");
            var outsidePhilrice = document.getElementById("outsidePhilrice");
            var withinPhilrice = document.getElementById("withinPhilrice");

            if (selectElement.value === "Outside PhilRice Station") {
                outsidePhilrice.style.display = "block";
                withinPhilrice.style.display = "none"; // Ensure this is hidden when the other is shown
            } else if (selectElement.value === "Within PhilRice Station") {
                withinPhilrice.style.display = "block";
                outsidePhilrice.style.display = "none"; // Ensure this is hidden when the other is shown
            } else {
                outsidePhilrice.style.display = "none";
                withinPhilrice.style.display = "none";
            }
        }

        function toggleType() {
            var selectElement = document.getElementById("training_type");
            var localTraining = document.getElementById("training_venue_container");
            var internationalTraining = document.getElementById("internationalTraining");
            var outsidePhilrice = document.getElementById("outsidePhilrice");
            var withinPhilrice = document.getElementById("withinPhilrice");

            // Store row2 na div sa variable
            var row2 = document.getElementById("row2");
            var row2Classes = row2.classList;

            if (selectElement.value === "Local") {
                localTraining.style.display = "block";
                internationalTraining.style.display = "none";
                outsidePhilrice.style.display = "none";
                withinPhilrice.style.display = "none";

                // Adjust grid columns
                row2Classes.remove("grid-cols-3");
                row2Classes.add("grid-cols-4");
            } else if (selectElement.value === "International") {
                localTraining.style.display = "none";
                internationalTraining.style.display = "block";
                outsidePhilrice.style.display = "none";
                withinPhilrice.style.display = "none";

                // Adjust grid columns
                row2Classes.remove("grid-cols-4");
                row2Classes.add("grid-cols-3");
            } else {
                localTraining.style.display = "none";
                internationalTraining.style.display = "none";
                outsidePhilrice.style.display = "none";
                withinPhilrice.style.display = "none";
            }
        }
    </script>


    {{-- Likert Scale --}}
    <script>
        document.getElementById('evaluationInput').addEventListener('input', function() {
            var evaluationInput = parseFloat(this.value);
            var evaluationOutput = document.getElementById('evaluationOutput');

            var evaluationOutputClass = evaluationOutput.classList;

            if (isNaN(evaluationInput)) {
                evaluationOutput.value = 'Invalid input';
                evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-yellow-300", "bg-lime-500",
                    "bg-green-600");
                evaluationOutputClass.add("bg-gray-900");
            } else {
                // Round up if the decimal part is .50 or greater
                if (evaluationInput % 1 >= 0.5) {
                    evaluationInput = Math.ceil(evaluationInput);
                }

                if (evaluationInput < 1) {
                    evaluationOutput.value = 'Minimum rate is 1';
                    evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-yellow-300", "bg-lime-500",
                        "bg-green-600");
                    evaluationOutputClass.add("bg-gray-900");
                } else if (evaluationInput <= 1.5) {
                    evaluationOutput.value = 'Poor';
                    evaluationOutputClass.remove("bg-orange-500", "bg-yellow-300", "bg-lime-500", "bg-green-600");
                    evaluationOutputClass.add("bg-red-700");
                } else if (evaluationInput <= 2.5) {
                    evaluationOutput.value = 'Unsatisfactory';
                    evaluationOutputClass.remove("bg-red-700", "bg-yellow-300", "bg-lime-500", "bg-green-600");
                    evaluationOutputClass.add("bg-orange-500");
                } else if (evaluationInput <= 3.5) {
                    evaluationOutput.value = 'Satisfactory';
                    evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-lime-500", "bg-green-600");
                    evaluationOutputClass.add("bg-yellow-300");
                } else if (evaluationInput <= 4.5) {
                    evaluationOutput.value = 'Very Satisfactory';
                    evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-yellow-300", "bg-green-600");
                    evaluationOutputClass.add("bg-lime-500");
                } else if (evaluationInput <= 5) {
                    evaluationOutput.value = 'Outstanding';
                    evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-yellow-300", "bg-lime-500");
                    evaluationOutputClass.add("bg-green-600");
                } else {
                    evaluationOutput.value = 'Maximum rate is 5';
                    evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-yellow-300", "bg-lime-500",
                        "bg-green-600");
                    evaluationOutputClass.add("bg-gray-900");
                }
            }
        });
    </script>



    {{-- <script>
        document.getElementById('evaluationInput').addEventListener('input', function() {
            var evaluationInput = parseFloat(this.value);
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
    </script> --}}

    {{-- <script>
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
    </script> --}}

    {{-- Paginate Trainings Form --}}
    <script>
        let currentSection = 1;
        const sections = document.querySelectorAll('.section');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const sectionNumberElement = document.getElementById('sectionNumber'); // Added

        // Function to save form data to localStorage
        function saveFormData() {
            let formData = {
                // Section 2
                "training_title": $("#training_title").val(),
                "training_category": $("#training_category").val(),
                "training_style": $("#training_style").val(),
                "training_venue": $("#training_venue").val(),
                "start_date": $("#start_date").val(),
                "end_date": $("#end_date").val(),
                // Section 3
                "sponsor": $("#sponsor").val(),
                "source_of_fund": $("#source_of_fund").val(),
                "average_gik": $("#average_gik").val(),
                "evaluationInput": $("#evaluationInput").val(),
                // Section 4 
                "total_participants": $("#total_participants").val(),
                "num_of_farmers_and_growers": $("#num_of_farmers_and_growers").val(),
                "num_of_extension_workers": $("#num_of_extension_workers").val(),
                "num_of_scientific": $("#num_of_scientific").val(),
                "num_of_educators": $("#num_of_educators").val(),
                "num_of_industry_players": $("#num_of_industry_players").val(),
                "num_of_policy_makers": $("#num_of_policy_makers").val(),
                "num_of_researchers": $("#num_of_researchers").val(),
                "num_of_students": $("#num_of_students").val(),
                "num_of_media": $("#num_of_media").val(),
                // Section 5
                "num_of_female": $("#num_of_female").val(),
                "num_of_male": $("#num_of_male").val(),
                "num_of_indigenous": $("#num_of_indigenous").val(),
                "num_of_pwd": $("#num_of_pwd").val(),
            };

            localStorage.setItem('formTrainings', JSON.stringify(formData));
        }
        // Function to load form data from localStorage
        function loadFormData() {
            var storedData = localStorage.getItem('formTrainings');

            if (storedData) {
                var formData = JSON.parse(storedData);
                // Section 2
                $("#training_title").val(formData.training_title);
                $("#training_category").val(formData.training_category);
                $("#training_style").val(formData.training_style);
                $("#training_venue").val(formData.training_venue);
                $("#start_date").val(formData.start_date);
                $("#end_date").val(formData.end_date);
                // Section 3
                $("#sponsor").val(formData.sponsor);
                $("#source_of_fund").val(formData.source_of_fund);
                $("#average_gik").val(formData.average_gik);
                $("#evaluationInput").val(formData.evaluationInput);
                // Section 4 
                $("#total_participants").val(formData.total_participants);
                $("#num_of_farmers_and_growers").val(formData.num_of_farmers_and_growers);
                $("#num_of_extension_workers").val(formData.num_of_extension_workers);
                $("#num_of_scientific").val(formData.num_of_scientific);
                $("#num_of_educators").val(formData.num_of_educators);
                $("#num_of_industry_players").val(formData.num_of_industry_players);
                $("#num_of_policy_makers").val(formData.num_of_policy_makers);
                $("#num_of_researchers").val(formData.num_of_researchers);
                $("#num_of_students").val(formData.num_of_students);
                $("#num_of_media").val(formData.num_of_media);
                // Section 5
                $("#num_of_female").val(formData.num_of_female);
                $("#num_of_male").val(formData.num_of_male);
                $("#num_of_indigenous").val(formData.num_of_indigenous);
                $("#num_of_pwd").val(formData.num_of_pwd);
            }

        }

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
                console.log(currentSection);

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
                // nextBtn.type = 'submit';
                nextBtn.innerHTML = 'Submit';
            } else {
                nextBtn.innerHTML = 'Next';
            }

            // Update section number
            sectionNumberElement.innerText = "Section " + currentSection + " of " + sections.length; // Added
        }

        // Function to check if all keys have values
        function allKeysHaveValues(obj) {
            for (var key in obj) {
                if (!obj[key]) {
                    return false;
                }
            }
            return true;
        }

        // function to change the type of next button into submit
        function toSubmit() {
            var storedData = localStorage.getItem('formTrainings');
            if (storedData) {
                var formData = JSON.parse(storedData);

                if (allKeysHaveValues(formData)) {
                    // All keys have values
                    return true;
                } else {
                    // Some keys are missing values
                    return false;
                }
            }
        }

        $(document).ready(function() {
            loadFormData(); // Load form data when document is ready

            // Show the initial section
            showSection(currentSection);
            updateButtons();

            $('#prevBtn').on('click', function() {
                saveFormData();
                nextBtn.disabled = false;
                // disable nextBtn if any of the input for breakdown of participants and total_participants are blank (Section 4)
                if (currentSection == 4) {
                    // enable nextBtn if all input for breakdown of participants in Section 4 is equal to total_participants
                    if (parseInt($("#total_participants").val()) == (parseInt($(
                            "#num_of_farmers_and_growers").val()) + parseInt($(
                            "#num_of_extension_workers").val()) + parseInt($("#num_of_scientific")
                            .val()) + parseInt($("#num_of_educators").val()) + parseInt($(
                            "#num_of_industry_players").val()) + parseInt($("#num_of_policy_makers")
                            .val()) + parseInt($("#num_of_researchers").val()) + parseInt($(
                            "#num_of_students").val()) + parseInt($("#num_of_media").val()))) {
                        nextBtn.disabled = false;
                    } else {
                        nextBtn.disabled = true;
                    }
                }
                // disable nextBtn if any of the input for breakdown of participants and total_participants are blank (Section 5)
                if (currentSection == 5) {
                    // enable nextBtn if all input for breakdown of participants in Section 5 is equal to total_participants
                    if (parseInt($("#total_participants").val()) == (parseInt($("#num_of_female").val()) +
                            parseInt($("#num_of_male").val()) + parseInt($("#num_of_indigenous").val()) +
                            parseInt($("#num_of_pwd").val()))) {
                        nextBtn.disabled = false;
                    } else {
                        nextBtn.disabled = true;
                    }
                }
            });

            $('#nextBtn').on('click', function() {
                saveFormData();
                // changes the type of nextBtn into submit
                if (toSubmit() && currentSection == 6) {
                    nextBtn.type = 'submit';
                } else {
                    nextBtn.type = 'button';
                }
                // disable nextBtn if any of the input for breakdown of participants and total_participants are blank (Section 4)
                if (currentSection == 4) {
                    // if(!total_participants || !num_of_farmers_and_growers || !num_of_extension_workers || !num_of_scientific || !num_of_educators || !num_of_industry_players || !num_of_policy_makers || !num_of_researchers || !num_of_students || !num_of_media) {
                    if (!$("#total_participants").val() || !$("#num_of_farmers_and_growers").val() || !$(
                            "#num_of_extension_workers").val() || !$("#num_of_scientific").val() || !$(
                            "#num_of_educators").val() || !$("#num_of_industry_players").val() || !$(
                            "#num_of_policy_makers").val() || !$("#num_of_researchers").val() || !$(
                            "#num_of_students").val() || !$("#num_of_media").val()) {
                        // console.log('empty');
                        nextBtn.disabled = true;
                    } else {
                        // enable nextBtn if all input for breakdown of participants in Section 4 is equal to total_participants
                        if (parseInt($("#total_participants").val()) == (parseInt($(
                                "#num_of_farmers_and_growers").val()) + parseInt($(
                                "#num_of_extension_workers").val()) + parseInt($("#num_of_scientific")
                                .val()) + parseInt($("#num_of_educators").val()) + parseInt($(
                                "#num_of_industry_players").val()) + parseInt($("#num_of_policy_makers")
                                .val()) + parseInt($("#num_of_researchers").val()) + parseInt($(
                                "#num_of_students").val()) + parseInt($("#num_of_media").val()))) {
                            nextBtn.disabled = false;
                        } else {
                            nextBtn.disabled = true;
                        }
                    }
                }
                // disable nextBtn if any of the input for breakdown of participants and total_participants are blank (Section 5)
                if (currentSection == 5) {
                    if (!$("#num_of_female").val() || !$("#num_of_male").val() || !$("#num_of_indigenous")
                        .val() || !$("#num_of_pwd").val()) {
                        // console.log('empty');
                        nextBtn.disabled = true;
                    } else {
                        // enable nextBtn if all input for breakdown of participants in Section 5 is equal to total_participants
                        if (parseInt($("#total_participants").val()) == (parseInt($("#num_of_female")
                                .val()) + parseInt($("#num_of_male").val()) + parseInt($(
                                    "#num_of_indigenous")
                                .val()) + parseInt($("#num_of_pwd").val()))) {
                            nextBtn.disabled = false;
                        } else {
                            nextBtn.disabled = true;
                        }
                    }
                }

            });

            $('#total_participants, #num_of_farmers_and_growers, #num_of_extension_workers, #num_of_scientific, #num_of_educators, #num_of_industry_players, #num_of_policy_makers, #num_of_researchers, #num_of_students, #num_of_media, #num_of_female, #num_of_male, #num_of_indigenous, #num_of_pwd')
                .on('keyup input', function() {
                    // disable nextBtn if any of the input for breakdown of participants and total_participants are blank
                    if (currentSection == 4) {
                        if (!$("#total_participants").val() || !$("#num_of_farmers_and_growers").val() || !$(
                                "#num_of_extension_workers").val() || !$("#num_of_scientific").val() || !$(
                                "#num_of_educators").val() || !$("#num_of_industry_players").val() || !$(
                                "#num_of_policy_makers").val() || !$("#num_of_researchers").val() || !$(
                                "#num_of_students").val() || !$("#num_of_media").val()) {
                            // console.log('empty');
                            nextBtn.disabled = true;
                        } else {
                            // enable nextBtn if all input for breakdown of participants in Section 4 is equal to total_participants
                            if (parseInt($("#total_participants").val()) == (parseInt($(
                                    "#num_of_farmers_and_growers").val()) + parseInt($(
                                    "#num_of_extension_workers").val()) + parseInt($("#num_of_scientific")
                                    .val()) + parseInt($("#num_of_educators").val()) + parseInt($(
                                    "#num_of_industry_players").val()) + parseInt($("#num_of_policy_makers")
                                    .val()) + parseInt($("#num_of_researchers").val()) + parseInt($(
                                    "#num_of_students").val()) + parseInt($("#num_of_media").val()))) {
                                nextBtn.disabled = false;
                            } else {
                                nextBtn.disabled = true;
                            }
                        }
                    }
                    // disable nextBtn if any of the input for breakdown of participants and total_participants are blank (Section 5)
                    if (currentSection == 5) {
                        if (!$("#num_of_female").val() || !$("#num_of_male").val() || !$("#num_of_indigenous")
                            .val() || !$("#num_of_pwd").val()) {
                            // console.log('empty');
                            nextBtn.disabled = true;
                        } else {
                            // enable nextBtn if all input for breakdown of participants in Section 5 is equal to total_participants
                            if (parseInt($("#total_participants").val()) == (parseInt($("#num_of_female")
                                    .val()) + parseInt($("#num_of_male").val()) + parseInt($(
                                        "#num_of_indigenous")
                                    .val()) + parseInt($("#num_of_pwd").val()))) {
                                nextBtn.disabled = false;
                            } else {
                                nextBtn.disabled = true;
                            }
                        }
                    }
                });

            $('#decrement-button1, #decrement-button2, #decrement-button3, #decrement-button4, #decrement-button5, #decrement-button6, #decrement-button7, #decrement-button8, #decrement-button9, #decrement-button10, #decrement-button11, #decrement-button12, #decrement-button13')
                .on('click', function() {
                    // disable nextBtn if any of the input for breakdown of participants and total_participants are blank
                    if (currentSection == 4) {
                        if (!$("#total_participants").val() || !$("#num_of_farmers_and_growers").val() || !$(
                                "#num_of_extension_workers").val() || !$("#num_of_scientific").val() || !$(
                                "#num_of_educators").val() || !$("#num_of_industry_players").val() || !$(
                                "#num_of_policy_makers").val() || !$("#num_of_researchers").val() || !$(
                                "#num_of_students").val() || !$("#num_of_media").val()) {
                            // console.log('empty');
                            nextBtn.disabled = true;
                        } else {
                            // enable nextBtn if all input for breakdown of participants in Section 4 is equal to total_participants
                            if (parseInt($("#total_participants").val()) == (parseInt($(
                                    "#num_of_farmers_and_growers").val()) + parseInt($(
                                    "#num_of_extension_workers").val()) + parseInt($("#num_of_scientific")
                                    .val()) + parseInt($("#num_of_educators").val()) + parseInt($(
                                    "#num_of_industry_players").val()) + parseInt($("#num_of_policy_makers")
                                    .val()) + parseInt($("#num_of_researchers").val()) + parseInt($(
                                    "#num_of_students").val()) + parseInt($("#num_of_media").val()))) {
                                nextBtn.disabled = false;
                            } else {
                                nextBtn.disabled = true;
                            }
                        }
                    }
                    // disable nextBtn if any of the input for breakdown of participants and total_participants are blank (Section 5)
                    if (currentSection == 5) {
                        if (!$("#num_of_female").val() || !$("#num_of_male").val() || !$("#num_of_indigenous")
                            .val() || !$("#num_of_pwd").val()) {
                            // console.log('empty');
                            nextBtn.disabled = true;
                        } else {
                            // enable nextBtn if all input for breakdown of participants in Section 5 is equal to total_participants
                            if (parseInt($("#total_participants").val()) == (parseInt($("#num_of_female")
                                    .val()) + parseInt($("#num_of_male").val()) + parseInt($(
                                        "#num_of_indigenous")
                                    .val()) + parseInt($("#num_of_pwd").val()))) {
                                nextBtn.disabled = false;
                            } else {
                                nextBtn.disabled = true;
                            }
                        }
                    }
                });

            $('#increment-button1, #increment-button2, #increment-button3, #increment-button4, #increment-button5, #increment-button6, #increment-button7, #increment-button8, #increment-button9, #increment-button10, #increment-button11, #increment-button12, #increment-button13')
                .on('click', function() {
                    // disable nextBtn if any of the input for breakdown of participants and total_participants are blank
                    if (currentSection == 4) {
                        if (!$("#total_participants").val() || !$("#num_of_farmers_and_growers").val() || !$(
                                "#num_of_extension_workers").val() || !$("#num_of_scientific").val() || !$(
                                "#num_of_educators").val() || !$("#num_of_industry_players").val() || !$(
                                "#num_of_policy_makers").val() || !$("#num_of_researchers").val() || !$(
                                "#num_of_students").val() || !$("#num_of_media").val()) {
                            // console.log('empty');
                            nextBtn.disabled = true;
                        } else {
                            // enable nextBtn if all input for breakdown of participants in Section 4 is equal to total_participants
                            if (parseInt($("#total_participants").val()) == (parseInt($(
                                    "#num_of_farmers_and_growers").val()) + parseInt($(
                                    "#num_of_extension_workers").val()) + parseInt($("#num_of_scientific")
                                    .val()) + parseInt($("#num_of_educators").val()) + parseInt($(
                                    "#num_of_industry_players").val()) + parseInt($("#num_of_policy_makers")
                                    .val()) + parseInt($("#num_of_researchers").val()) + parseInt($(
                                    "#num_of_students").val()) + parseInt($("#num_of_media").val()))) {
                                nextBtn.disabled = false;
                            } else {
                                nextBtn.disabled = true;
                            }
                        }
                    }
                    // disable nextBtn if any of the input for breakdown of participants and total_participants are blank (Section 5)
                    if (currentSection == 5) {
                        if (!$("#num_of_female").val() || !$("#num_of_male").val() || !$("#num_of_indigenous")
                            .val() || !$("#num_of_pwd").val()) {
                            // console.log('empty');
                            nextBtn.disabled = true;
                        } else {
                            // enable nextBtn if all input for breakdown of participants in Section 5 is equal to total_participants
                            if (parseInt($("#total_participants").val()) == (parseInt($("#num_of_female")
                                    .val()) + parseInt($("#num_of_male").val()) + parseInt($(
                                        "#num_of_indigenous")
                                    .val()) + parseInt($("#num_of_pwd").val()))) {
                                nextBtn.disabled = false;
                            } else {
                                nextBtn.disabled = true;
                            }
                        }
                    }
                });

        });
    </script>

    {{-- start_date and end_date restrictions for letters --}}
    <script>
        function isNumericDateInput(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode != 47 && charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
@endsection
