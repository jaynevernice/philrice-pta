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
<style>
    /* CSS to fit the image in the modal */
    /* .glightbox a {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    } */

    /* iframe #document body img {
        width: 100vw;
        height: 100vh;
    } */

    /* html.glightbox-open body.gscrollbar-fixer.glightbox-open div#glightbox-body.glightbox-container.glightbox-clean div.gcontainer div#glightbox-slider.gslider div.gslide.loaded.current div.gslide-inner-content div.ginner-container div.gslide-media.gslide-external iframe.vimeo-video.gvideo.node-ready html body img {
        width: 100vw !important;
        height: 100vh !important;
    } */

    /* html.glightbox-open body.gscrollbar-fixer.glightbox-open div#glightbox-body.glightbox-container.glightbox-clean div.gcontainer div#glightbox-slider.gslider div.gslide.loaded.current div.gslide-inner-content div.ginner-container div.gslide-media.gslide-external iframe.vimeo-video.gvideo.node-ready html body img {
        width: 100vw !important;
        height: 100vh !important;
    } */

    .glightbox-open .gcontainer .gslider .gslide.loaded.current .gslide-inner-content .ginner-container .gslide-media.gslide-external iframe.vimeo-video.gvideo.node-ready #document body img {
        height: 100vh !important;
    }
</style>
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
        @if ($errors->any())
            {{-- <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> --}}
            <script>
                // Prepare error message HTML
                let errorMessage = "<ul>";
                @foreach ($errors->all() as $error)
                    errorMessage += "<li>{{ $error }}</li>";
                @endforeach
                errorMessage += "</ul>";

                // Display SweetAlert2 popup with the error message
                Swal.fire({
                    title: 'Oops!',
                    html: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

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
                        <label for="training_title" class="block my-2 text-sm font-medium text-gray-900">Training Title</label>
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
                            value="{{ old('otherTrainingInput') }}"
                            class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                    </div>
                </div>

                <div id="row2" class="my-2 grid grid-cols-3 gap-x-4 max-[760px]:grid-cols-1">
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

                    {{-- Training Category --}}
                    <div>
                        <label for="training_category" class="block my-2 text-sm font-medium text-gray-900">Training
                            Category</label>
                        <div class="relative">
                            <select id="training_category" name="training_category" required
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled value="">Select</option>
                                <option value="Beginner Course">Beginner Course</option>
                                <option value="Intermediate Course">Intermediate Course</option>
                                <option value="Advanced Course">Advanced Course</option>
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
                                <option value="Online">Online</option>
                                <option value="Face-to-Face">Face-to-Face</option>
                                <option value="Blended (Online + Face to Face)">Blended (Online + Face-to-Face)</option>
                            </select>
                        </div>
                    </div>

                    {{-- Venue --}}
                    <div id="training_venue_container" style="display: none;">
                        <label for="training_venue" class="block my-2 text-sm font-medium text-gray-900">Venue</label>
                        <div class="relative">
                            <select id="training_venue" name="training_venue" onchange="toggleVenue()"
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
                <div id="internationalTraining" style="display: none;">
                    <label for="internationalTrainingInput"
                        class="block my-2 text-sm font-medium text-gray-900">International Venue</label>
                    <input type="text" id="internationalTrainingInput" name="internationalTrainingInput"
                        value="{{ old('internationalTrainingInput') }}"
                        class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                </div>

                {{-- Additional Input Field for Within PhilRice Station --}}
                <div id="withinPhilrice" style="display: none;">
                    <label for="withinPhilriceInput" class="block my-2 text-sm font-medium text-gray-900">Within PhilRice
                        Station</label>
                    <select name="withinPhilriceInput" id="withinPhilriceInput"
                        class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                        <option selected disabled>Select</option>
                        @foreach ($stations as $station)
                            <option value="{{ $station->id }}">PhilRice {{ $station->station }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Additional Input Field for Outside PhilRice Station --}}
                <div id="outsidePhilrice" style="display: none;">
                    {{-- Province --}}
                    <div class="relative mr-2">
                        <label for="province" class="block my-2 text-sm font-medium text-gray-900">
                            Province
                        </label>
                        <select name="province" id="province"
                            class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                            <option selected disabled value="">Select</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->provCode }}">{{ $province->provDesc }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Municipality --}}
                    <div class="relative ml-2">
                        <label for="municipality" class="block my-2 text-sm font-medium text-gray-900">
                            Municipality
                        </label>
                        <select name="municipalitySelect" id="municipalitySelect"
                            class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                            {{-- <option selected disabled>Select</option> --}}
                            {{-- @foreach ($municipalities as $municipality)
                                <option value="{{ $municipality->citymunCode }}">{{ $municipality->citymunDesc }}</option>
                            @endforeach --}}
                        </select>
                        <input type="text" name="municipality" id="municipality" value="{{ old('municipality') }}"
                            hidden>
                    </div>
                </div>

                {{-- Start Date and End Date --}}
                <div date-rangepicker id="date_range" class="my-2 grid grid-cols-2 gap-x-4">
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
                            <input type="text" id="start_date" name="start" value="{{ old('start') }}"
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
                            <input type="text" id="end_date" name="end" value="{{ old('end') }}"
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
                <div id="date-error-message" class="text-red-500"></div>

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
                            <select id="source_of_fund" name="source_of_fund" onchange="toggleFund()"
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                                required>
                                <option selected disabled value="">Select</option>
                                @foreach ($funds as $fund)
                                    <option value="{{ $fund->fund }}">{{ $fund->fund }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>
                            {{-- <input type="text" name="other_fund" id="other_fund" value="{{ old('other_fund') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                style="display: none;"> --}}
                        </div>
                    </div>
                </div>

                {{-- Additional Input Field for Source of Fund when Other is selected --}}
                <div id="otherSourceFund" style="display: none;" class="col-span-2">
                    <label for="otherFundInput" class="block my-2 text-sm font-medium text-gray-900">Other
                        Source of Fund</label>
                    <input type="text" id="otherFundInput" name="otherFundInput" value="{{ old('otherFundInput') }}"
                        class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                </div>

                <div class="my-2 grid grid-cols-2 gap-x-4 max-[760px]:grid-cols-1">
                    {{-- Average GIK --}}
                    <div>
                        <label for="average_gik"
                            class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Average Gain in Knowledge
                            (GIK)</label>
                        <p class="text-sm text-gray-500 mb-2">Please specify the Average GIK as a percentage (%). Write N/A
                            if
                            there is no GIK to input.</p>
                        <input type="text" id="average_gik" name="average_gik" value="{{ old('average_gik') }}"
                            min="0" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="40" required />
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
                    <h6 class="text-lg font-bold dark:text-white">Participant's Profile</h6>
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
                <label class="block text-sm font-medium text-gray-900">Of the total number,</label>
                {{-- <label class="block text-sm font-medium text-gray-900">Of the total number ( <span
                        id="left_to_distribute_sector" class="text-red-500"></span> ) </label> --}}

                {{-- Breakdown of Participants  --}}
                <div class="my-1 grid grid-cols-4 gap-x-4 max-[900px]:grid-cols-1">

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
                                value="0" data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" required />
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
                            <button type="button" id="decrement-button5" data-input-counter-decrement="num_of_male"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_male" name="num_of_male" data-input-counter value="0"
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" required />
                            <div
                                class="absolute bottom-2 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-person"></i>
                            </div>
                            <button type="button" id="increment-button5" data-input-counter-increment="num_of_male"
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
                            <button type="button" id="decrement-button6" data-input-counter-decrement="num_of_female"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_female" name="num_of_female" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="0" required />
                            <div
                                class="absolute bottom-2 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-person-dress"></i>
                            </div>
                            <button type="button" id="increment-button6" data-input-counter-increment="num_of_female"
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
                            <label class="block text-sm font-medium text-gray-900">Of the total
                                number,</label>
                            <p class="text-sm text-gray-500 mb-2">How many are indigenous individuals?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button7"
                                data-input-counter-decrement="num_of_indigenous"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_indigenous" name="num_of_indigenous" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="0" required />
                            <div
                                class="absolute bottom-2 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-people-group"></i>
                            </div>
                            <button type="button" id="increment-button7"
                                data-input-counter-increment="num_of_indigenous"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-12 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Total Num of PWD --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-900">Of the total
                                number,</label>
                            <p class="text-sm text-gray-500 mb-2">How many are differently abled individuals (PWD)?</p>
                        </div>
                        <div class="relative flex items-center">
                            <button type="button" id="decrement-button8" data-input-counter-decrement="num_of_pwd"
                                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-12 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="num_of_pwd" name="num_of_pwd" data-input-counter
                                data-input-counter-min="0" data-input-counter-max=""
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-12 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                placeholder="0" value="0" required />
                            <div
                                class="absolute bottom-2 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                <i class="fa-solid fa-wheelchair"></i>
                            </div>
                            <button type="button" id="increment-button8" data-input-counter-increment="num_of_pwd"
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

                {{-- Preview of Uploaded Images --}}
                {{-- <div id="photoContainer"
                    class="my-2 grid grid-cols-5 max-[760px]:grid-cols-1 gap-4 bg-gray-200 rounded-lg drop-shadow-lg">
                </div> --}}

                <div class="my-2 grid grid-cols-2 gap-x-4 max-[760px]:grid-cols-1">
                    <div class="mb-6 col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="photo_doc_event">Photo documentation of event/activity</label>
                        <p class="text-sm text-gray-500 mb-6">Upload up to 10 clear photo highlights of the training
                            conducted. Ensure that photo files have been named properly before uploading using the
                            Station_typeoftraining_site format (e.g. Batac_FFS_Piddig)</p>
                        <input required id="photo_doc_event" name="photo_doc_event[]"
                            accept="image/png, image/gif, image/jpeg"
                            class="flex w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="file" multiple>
                        <div id="errorImage" style="color: red; display: none;"></div>
                    </div>

                    {{-- Uploaded Image Preview --}}
                    {{-- <div class="mb-6 col-span-2">
                        <div id="photoContainer"
                            class="my-2 grid grid-cols-5 max-[760px]:grid-cols-1 gap-4 bg-gray-200 rounded-lg drop-shadow-lg">
                            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="preview">Preview: </label>
                        </div>
                    </div> --}}
                    {{-- <div class="mb-6 col-span-2">
                        <div id="photoContainer"
                            class="my-2 p-2 grid grid-cols-5 max-w-[760px]:grid-cols-1 gap-4 bg-gray-200 rounded-lg shadow-lg overflow-hidden">
                            <label class="block my-2 ml-4 text-sm font-medium text-gray-700 dark:text-white"
                                for="preview">Preview:</label>
                            <img class="col-span-5 md:col-span-3 h-auto w-full" src="https://via.placeholder.com/300x200"
                                alt="Preview Image">
                        </div>
                    </div> --}}

                    <div class="mb-6 col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="other_doc">Other
                            forms of documentation <span class="text-gray-600 italic">(optional)</span></label>
                        <p class="text-sm text-gray-500 mb-6">You may upload other forms of training documentation such as
                            attendance/registration sheet, copy of event program, short video or audio clip, and other
                            relevant documents, spreadsheet, or PDF file.</p>
                        <input id="other_doc" name="other_doc[]"
                            class="flex w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="file" multiple>
                        {{-- <input id="other_doc" name="other_doc[]"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="file" multiple> --}}

                        <div id="errorFile" style="color: red; display: none;"></div>
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
                    <button type="submit" id="submitBtn" hidden
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Submit
                    </button>
                </div>
            </div>

        </form>
    </main>
@endsection

@section('scripts')
    <!-- Turn all file input elements into ponds -->
    {{-- <script>
        FilePond.parse(document.body);
    </script> --}}

    {{-- <script>
        // Register the plugins 
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);

        // Wait for the DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize FilePond
            FilePond.create(document.getElementById('other_doc'), {
                allowMultiple: true, // Allow multiple files to be uploaded
                allowFileTypeValidation: true, // Enable file type validation
                allowFileSizeValidation: true, // Enable file size validation
                maxFileSize: '25MB', // Maximum file size allowed
                acceptedFileTypes: ['image/*', 'video/*', 'audio/*',
                'application/pdf'], // Accepted file types
                labelIdle: 'Drag & Drop your files or <span class="filepond--label-action">Browse</span>',
                // Configure other FilePond options as needed
            });

            FilePond.create(document.getElementById('photo_doc_event'), {
                allowMultiple: true, // Allow multiple files to be uploaded
                allowFileTypeValidation: true, // Enable file type validation
                allowFileSizeValidation: true, // Enable file size validation
                maxFileSize: '25MB', // Maximum file size allowed
                acceptedFileTypes: ['image/*'], // Accepted file types
                labelIdle: 'Drag & Drop your files or <span class="filepond--label-action">Browse</span>',
                // Configure other FilePond options as needed
            });
        });
    </script> --}}

    {{-- <script>
        // Function to display images
        function displayImages() {
            var photoContainer = document.getElementById("photoContainer");
            var existingImages = photoContainer.querySelectorAll("img");
            var files = document.getElementById("photo_doc_event").files;

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var alreadyDisplayed = Array.from(existingImages).some(function(img) {
                    return img.alt === file.name;
                });
                if (!alreadyDisplayed) {
                    displayImage(file);
                }
            }

            const lightbox = GLightbox({
                selector: '.glightbox',
                loop: true,
                touchNavigation: true,
                closeOnOutsideClick: true,
                slideEffect: 'zoom',
                zoomable: true,
                // Add an event listener for the opening event
                // onOpen: function() {
                //     // Apply styles to images inside the glightbox
                //     var images = document.querySelectorAll('.glightbox-open img');
                //     images.forEach(function(img) {
                //         img.style.width = '100vw';
                //         img.style.height = '100vh';
                //     });
                // }

            });

            // Wait for the document to be fully loaded
            // document.addEventListener("DOMContentLoaded", function() {
            //     // Add event listener for 'open' event on lightbox
            //     lightbox.on('open', () => {
            //         // Get the image element
            //         const image = document.querySelector(
            //             '.glightbox-open .gcontainer .gslider .gslide.loaded.current .gslide-inner-content .ginner-container .gslide-media.gslide-external iframe.vimeo-video.gvideo.node-ready #document body img'
            //             );

            //         // Check if the image exists
            //         if (image) {
            //             // Set the height of the image to 100vh
            //             image.style.height = '100vh';
            //         }
            //     });
            // });


            // Wait for the document to be fully loaded
            // document.addEventListener("DOMContentLoaded", function() {
            //     // Add event listener for 'open' event on lightbox
            //     lightbox.on('open', () => {
            //         // Do something
            //         const image = document.querySelector('.glightbox-open .glightbox-container .goverlay .gcontainer');
            //         if (image) {
            //             // Set the height of the image to 100vh
            //             image.style.height = '100vh !important';
            //         }
            //     });
            // });


            // lightbox.on('open', (instance) => {
            //     // Do something
            //     const image = instance.elements.content.querySelector('img');
            //     if (image) {
            //         // Set the height of the image to 100vh
            //         image.style.height = '100vh';
            //     }
            // });

            // lightbox.on('open', () => {
            //     // Do something
            //     const image = instance.elements.content.querySelector('img');
            //     if (image) {
            //         // Set the height of the image to 100vh
            //         image.style.height = '100vh';
            //     }
            // });

        }

        // Function to display a single image
        function displayImage(file) {
            var a = document.createElement("a");
            a.href = URL.createObjectURL(file);
            a.className = "glightbox mb-2";
            a.setAttribute("data-sizes", "(max-width: 600px) 480px, 800px");

            var img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.alt = file.name;

            a.appendChild(img);

            var photoContainer = document.getElementById("photoContainer");
            photoContainer.appendChild(a);
        }

        document.getElementById("photo_doc_event").addEventListener("change", displayImages);
    </script> --}}

    {{-- <script>
        // Function to display uploaded images in the photoContainer using glightbox
        function displayImages() {
            // Get the photoContainer
            var photoContainer = document.getElementById("photoContainer");

            // Get the existing images in the photoContainer
            var existingImages = photoContainer.querySelectorAll("img");

            // Get the uploaded files
            var files = document.getElementById("photo_doc_event").files;

            // Loop through each uploaded file
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                // Check if the file is already displayed
                var alreadyDisplayed = Array.from(existingImages).some(function(img) {
                    return img.alt === file.name;
                });
                if (!alreadyDisplayed) {
                    displayImage(file); // Display the newly uploaded image
                }
            }

            // Initialize glightbox
            const lightbox = GLightbox({
                selector: '.glightbox',
                loop: true,
                touchNavigation: true,
                closeOnOutsideClick: true, // Close the lightbox when clicking outside the image
                slideEffect: 'zoom',
                zoomable: true
            });
        }

        // Function to display a single image
        function displayImage(file) {
            // Create a new <a> element
            var a = document.createElement("a");
            a.href = URL.createObjectURL(file);
            a.className = "glightbox mb-2";
            // a.setAttribute("glightbox", "title: " + file.name);
            a.setAttribute("data-sizes", "(max-width: 600px) 480px, 800px");


            // Create an <img> element
            var img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.alt = file.name;
            
            // Set max-width and max-height for the image
            // img.style.maxWidth = "100";
            // img.style.maxHeight = "200px"; // Adjust this value as needed

            // Append the <img> element to the <a> element
            a.appendChild(img);

            // Get the photoContainer
            var photoContainer = document.getElementById("photoContainer");

            // Append the <a> element to the photoContainer
            photoContainer.appendChild(a);
        }

        // Call the function when files are selected
        document.getElementById("photo_doc_event").addEventListener("change", displayImages);
    </script> --}}


    {{-- <script>

        // Function to display uploaded images in the photoContainer using glightbox
        function displayImages() {
            // Get the photoContainer
            var photoContainer = document.getElementById("photoContainer");

            // Get the existing images in the photoContainer
            var existingImages = photoContainer.querySelectorAll("img");

            // Get the uploaded files
            var files = document.getElementById("photo_doc_event").files;

            // Loop through each uploaded file
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                // Check if the file is already displayed
                var alreadyDisplayed = Array.from(existingImages).some(function(img) {
                    return img.alt === file.name;
                });
                if (!alreadyDisplayed) {
                    displayImage(file); // Display the newly uploaded image
                }
            }

            // Initialize glightbox
            const lightbox = GLightbox({
                selector: '.glightbox',
                loop: true,
                touchNavigation: true,
                closeOnOutsideClick: true, // Close the lightbox when clicking outside the image
                slideEffect: 'zoom',
                zoomable: true
            });
        }

        // Function to display a single image
        function displayImage(file) {
            // Create a new <a> element
            var a = document.createElement("a");
            a.href = URL.createObjectURL(file);
            a.className = "glightbox mb-2";
            // a.setAttribute("glightbox", "title: " + file.name);
            a.setAttribute("data-sizes", "(max-width: 600px) 480px, 800px");


            // Create an <img> element
            var img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.alt = file.name;
            // img.className = "object-fit";
            // Append the <img> element to the <a> element
            a.appendChild(img);

            // Get the photoContainer
            var photoContainer = document.getElementById("photoContainer");

            // Append the <a> element to the photoContainer
            photoContainer.appendChild(a);
        }

        // Call the function when files are selected
        document.getElementById("photo_doc_event").addEventListener("change", displayImages);
    </script> --}}

    {{-- <script>
        // Function to update the amount left to distribute in each category
        function updateDistribution() {
            // Get the total number of participants
            var totalParticipants = parseInt(document.getElementById('total_participants').value);

            // Get the number of participants in each category
            var farmersAndGrowers = parseInt(document.getElementById('num_of_farmers_and_growers').value);
            var extensionWorkers = parseInt(document.getElementById('num_of_extension_workers').value);
            var scientificCommunity = parseInt(document.getElementById('num_of_scientific').value);
            var otherParticipants = parseInt(document.getElementById('num_of_other').value);
            var maleParticipants = parseInt(document.getElementById('num_of_male').value);
            var femaleParticipants = parseInt(document.getElementById('num_of_female').value);
            var indigenousParticipants = parseInt(document.getElementById('num_of_indigenous').value);
            var pwdParticipants = parseInt(document.getElementById('num_of_pwd').value);

            // Calculate the amount left to distribute
            var leftToDistributeSector = totalParticipants - (farmersAndGrowers + extensionWorkers + scientificCommunity +
                otherParticipants);

            // + maleParticipants + femaleParticipants + indigenousParticipants + pwdParticipants

            // Update the display for each category
            document.getElementById('left_to_distribute_sector').textContent = leftToDistributeSector;
            // document.getElementById('left_to_distribute_extension_workers').textContent = leftToDistribute;
            // document.getElementById('left_to_distribute_scientific').textContent = leftToDistribute;
            // document.getElementById('left_to_distribute_other').textContent = leftToDistribute;
            // document.getElementById('left_to_distribute_male').textContent = leftToDistribute;
            // document.getElementById('left_to_distribute_female').textContent = leftToDistribute;
            // document.getElementById('left_to_distribute_indigenous').textContent = leftToDistribute;
            // document.getElementById('left_to_distribute_pwd').textContent = leftToDistribute;
            
            if(isNaN(totalParticipants)) {
                $('#left_to_distribute_sector').text('');
            }
            $('#left_to_distribute_sector').text($('#total_participants').val());
        }

        // Attach event listeners to the input fields
        document.getElementById('total_participants').addEventListener('input', updateDistribution);
        document.getElementById('num_of_farmers_and_growers').addEventListener('input', updateDistribution);
        document.getElementById('num_of_extension_workers').addEventListener('input', updateDistribution);
        document.getElementById('num_of_scientific').addEventListener('input', updateDistribution);
        document.getElementById('num_of_other').addEventListener('input', updateDistribution);
        document.getElementById('num_of_male').addEventListener('input', updateDistribution);
        document.getElementById('num_of_female').addEventListener('input', updateDistribution);
        document.getElementById('num_of_indigenous').addEventListener('input', updateDistribution);
        document.getElementById('num_of_pwd').addEventListener('input', updateDistribution);

        // Call the function initially to update the display
        updateDistribution();
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
                outsidePhilrice.style.display = "grid";
                outsidePhilrice.style.gridTemplateColumns = "repeat(2, minmax(0, 1fr))";
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

        function toggleFund() {
            var selectElement = document.getElementById("source_of_fund");
            var otherSourceFund = document.getElementById("otherSourceFund");

            if (selectElement.value === "Other") {
                otherSourceFund.style.display = "block";
            } else {
                otherSourceFund.style.display = "none";
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
                    evaluationOutput.value = '😨 Poor';
                    evaluationOutputClass.remove("bg-orange-500", "bg-yellow-300", "bg-lime-500", "bg-green-600");
                    evaluationOutputClass.add("bg-red-700");
                } else if (evaluationInput <= 2.5) {
                    evaluationOutput.value = '😔 Unsatisfactory';
                    evaluationOutputClass.remove("bg-red-700", "bg-yellow-300", "bg-lime-500", "bg-green-600");
                    evaluationOutputClass.add("bg-orange-500");
                } else if (evaluationInput <= 3.5) {
                    evaluationOutput.value = '😌 Satisfactory';
                    evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-lime-500", "bg-green-600");
                    evaluationOutputClass.add("bg-yellow-300");
                } else if (evaluationInput <= 4.5) {
                    evaluationOutput.value = '😄 Very Satisfactory';
                    evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-yellow-300", "bg-green-600");
                    evaluationOutputClass.add("bg-lime-500");
                } else if (evaluationInput <= 5) {
                    evaluationOutput.value = '🤩 Excellent';
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
        const today = new Date(); // getting date today and formatting into (MM/DD/YYYY)
        // const formattedDateToday = today.toLocaleDateString('en-US', {
        //     month: '2-digit',
        //     day: '2-digit',
        //     year: 'numeric'
        // });
        // const [month, day, year] = formattedDateToday.split('/');
        // const dateObject = new Date(`${month}/${day}/${year}`);

        // Function to save form data to localStorage
        function saveFormData() {
            let formData = {
                // Section 2
                "training_title": $("#training_title").val(),
                "otherTrainingInput": $("#otherTrainingInput").val(),
                "training_category": $("#training_category").val(),
                "training_type": $("#training_type").val(),
                "mod": $("#mod").val(),
                "training_venue": $("#training_venue").val(),
                "internationalTrainingInput": $("#internationalTrainingInput").val(),
                "withinPhilriceInput": $("#withinPhilriceInput").val(),
                // "outsidePhilriceInput": $("#outsidePhilriceInput").val(),
                "province": $("#province").val(),
                "municipality": $("#municipality").val() || $("#municipalitySelect").val(),
                "start_date": $("#start_date").val(),
                "end_date": $("#end_date").val(),
                // Section 3
                "sponsor": $("#sponsor").val(),
                "source_of_fund": $("#source_of_fund").val(),
                "otherFundInput": $("#otherFundInput").val(),
                "average_gik": $("#average_gik").val(),
                "evaluationInput": $("#evaluationInput").val(),
                // Section 4 
                "total_participants": $("#total_participants").val(),
                "num_of_farmers_and_growers": $("#num_of_farmers_and_growers").val(),
                "num_of_extension_workers": $("#num_of_extension_workers").val(),
                "num_of_scientific": $("#num_of_scientific").val(),
                "num_of_other": $("#num_of_other").val(),
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
                $("#otherTrainingInput").val(formData.otherTrainingInput);
                $("#training_category").val(formData.training_category);
                $("#training_type").val(formData.training_type);
                $("#mod").val(formData.mod);
                $("#training_venue").val(formData.training_venue);
                $("#internationalTrainingInput").val(formData.internationalTrainingInput);
                $("#withinPhilriceInput").val(formData.withinPhilriceInput);
                // $("#outsidePhilriceInput").val(formData.outsidePhilriceInput);
                $("#province").val(formData.province);
                $("#municipality").val(formData.municipality);
                $("#start_date").val(formData.start_date);
                $("#end_date").val(formData.end_date);
                // Section 3
                $("#sponsor").val(formData.sponsor);
                $("#source_of_fund").val(formData.source_of_fund);
                $("#otherFundInput").val(formData.otherFundInput);
                $("#average_gik").val(formData.average_gik);
                $("#evaluationInput").val(formData.evaluationInput);
                // Section 4 
                $("#total_participants").val(formData.total_participants);
                $("#num_of_farmers_and_growers").val(formData.num_of_farmers_and_growers);
                $("#num_of_extension_workers").val(formData.num_of_extension_workers);
                $("#num_of_scientific").val(formData.num_of_scientific);
                $("#num_of_other").val(formData.num_of_other);
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
                nextBtn.innerHTML = 'Submit';
            } else {
                nextBtn.innerHTML = 'Next';
            }

            // Update section number
            sectionNumberElement.innerText = "Section " + currentSection + " of " + sections.length; // Added
        }

        function checkSection4() {
            var totalParticipants = parseInt($("#total_participants").val());
            var farmersAndGrowers = parseInt($("#num_of_farmers_and_growers").val());
            var extensionWorkers = parseInt($("#num_of_extension_workers").val());
            var numScientific = parseInt($("#num_of_scientific").val());
            var numOther = parseInt($("#num_of_other").val());
            var numFemale = parseInt($("#num_of_female").val());
            var numMale = parseInt($("#num_of_male").val());
            var numIndigenous = parseInt($("#num_of_indigenous").val());
            var numPwd = parseInt($("#num_of_pwd").val());

            if (!$("#total_participants").val()) {
                nextBtn.disabled = true;
            } else {
                // enable nextBtn if all input for breakdown of participants in Section 4 is equal to total_participants
                if ((totalParticipants == (farmersAndGrowers + extensionWorkers + numScientific + numOther)) &&
                    (totalParticipants == (numFemale + numMale)) &&
                    (numIndigenous <= totalParticipants) &&
                    (numPwd <= totalParticipants)) {
                    nextBtn.disabled = false;
                } else {
                    nextBtn.disabled = true;
                }
            }
        }

        function checkSection3() {
            var sponsor = $("#sponsor").val();
            var source_of_fund = $("#source_of_fund").val();
            var average_gik = $("#average_gik").val();
            var evaluationInput = $("#evaluationInput").val();

            var inputValue = average_gik;
            // Check if the input contains both "N/A" and numbers
            if (/N\/A/i.test(inputValue) && /[0-9]/.test(inputValue)) {
                // If both "N/A" and numbers are present, remove the numbers
                inputValue = inputValue.replace(/[0-9]/g, '');
            }
            // Remove any characters that are not numbers, periods, slashes, or "NA"
            var sanitizedValue = inputValue.replace(/[^0-9./NA]/gi, '');
            // Ensure only one period is present
            sanitizedValue = sanitizedValue.replace(/(\..*)\./, '$1');
            // Update the input field value with the sanitized value
            $("#average_gik").val(sanitizedValue);
            var average_gik = $("#average_gik").val();

            if (isNaN(parseFloat(average_gik))) {
                if (average_gik == 'N/A') {
                    nextBtn.disabled = false;
                } else {
                    nextBtn.disabled = true;
                }
            } else {
                var average_gik = $("#average_gik").val();
                if (parseFloat(average_gik) > 100) {
                    var newAverageGik = 100.00;
                    $("#average_gik").val(newAverageGik);
                    nextBtn.disabled = false;
                }
                if (parseFloat(average_gik) < 1) {
                    var newAverageGik = 1.00;
                    $("#average_gik").val(newAverageGik);
                    nextBtn.disabled = false;
                }
            }

            if (!sponsor || !source_of_fund || !average_gik || !evaluationInput) {
                nextBtn.disabled = true;
            } else {
                nextBtn.disabled = false;
                if (source_of_fund === 'Other' && !$("#otherFundInput").val()) {
                    nextBtn.disabled = true;
                }
            }

            // const $startDate = $("#start_date");
            // const $endDate = $("#end_date");
            // $("#date-error-message").css("color", "red");
            // // if ($startDate.val() > formattedDateToday || $endDate.val() > formattedDateToday) {
            // if (new Date($startDate.val()) > today || new Date($endDate.val()) > today) {
            //     $("#date-error-message").text("Start Date or End Date is Invalid. Please go back to Section 1");
            //     nextBtn.disabled = true;
            // } else {
            //     $("#date-error-message").text("");
            // }
        }

        function checkSection2() {
            const $trainingTitle = $("#training_title");
            const $trainingCategory = $("#training_category");
            const $trainingType = $("#training_type");
            const $mod = $("#mod");
            const $startDate = $("#start_date");
            const $endDate = $("#end_date");
            const $trainingVenue = $("#training_venue");
            const $withinPhilriceInput = $("#withinPhilriceInput");
            const $province = $("#province");
            const $municipalitySelect = $("#municipalitySelect");
            const $municipality = $("#municipality");
            const $otherTrainingInput = $("#otherTrainingInput");
            const $internationalTrainingInput = $("#internationalTrainingInput");

            const isLocalTraining = $trainingType.val() === 'Local';
            const isInternationalTraining = $trainingType.val() === 'International';

            const isNextBtnDisabled = (
                !$trainingTitle.val() ||
                !$trainingCategory.val() ||
                !$trainingType.val() ||
                !$mod.val() ||
                (!$startDate.val() || !$endDate.val()) ||
                ($trainingTitle.val() === 'Other' && !$otherTrainingInput.val()) ||
                (isLocalTraining && (!$trainingVenue.val() ||
                    ($trainingVenue.val() === 'Within PhilRice Station' && !$withinPhilriceInput.val()) ||
                    ($trainingVenue.val() === 'Outside PhilRice Station' && (!$province.val() || (!
                        $municipalitySelect.val() && !$municipality.val())))
                )) ||
                (isInternationalTraining && !$internationalTrainingInput.val())
                // (isInternationalTraining && !$internationalTrainingInput.val()) ||
                // (new Date($startDate.val()) > today || new Date($endDate.val()) > today)
            );
            nextBtn.disabled = isNextBtnDisabled;
        }

        $(document).ready(function() {
            loadFormData(); // Load form data when document is ready

            // Show the initial section
            showSection(currentSection);
            updateButtons();

            // retain the old value in municipality when document is ready
            if ($("#province").val()) {
                var provCode = $("#province").val();
                var citymunCode = $("#municipality").val();
                $.ajax({
                    url: "{{ route('trainings.fetchMunicipalities') }}",
                    type: "POST",
                    data: {
                        provCode: provCode,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#municipalitySelect').html(
                            '<option selected disabled value="">Select</option>');
                        $.each(result, function(key, value) {
                            var isSelected = value.citymunCode ===
                                citymunCode; // More explicit comparison
                            $("#municipalitySelect").append('<option' + (isSelected ?
                                    ' selected' : '') +
                                ' value="' + value.citymunCode + '">' + value.citymunDesc +
                                '</option>');
                            // $("#municipalitySelect").append('<option @if (' + citymunCode + ' == ' + value.citymunCode + ') selected @endif value="' + value.citymunCode + '">' +
                            //     value.citymunDesc + '</option>');
                        });

                    },
                    error: function(error) {
                        alert('Something went wrong!');
                    },
                });
            }

            $('#prevBtn').on('click', function() {
                saveFormData();
                loadFormData();
                $("#nextBtn").removeAttr("hidden");
                $("#submitBtn").attr("hidden", true);
                nextBtn.disabled = false;
                nextBtn.type = 'button';
                // disable nextBtn if any of the input for breakdown of participants and total_participants are blank (Section 4)
                if (currentSection == 4) {
                    var totalParticipants = parseInt($("#total_participants").val());
                    var farmersAndGrowers = parseInt($("#num_of_farmers_and_growers").val());
                    var extensionWorkers = parseInt($("#num_of_extension_workers").val());
                    var numScientific = parseInt($("#num_of_scientific").val());
                    var numOther = parseInt($("#num_of_other").val());
                    var numFemale = parseInt($("#num_of_female").val());
                    var numMale = parseInt($("#num_of_male").val());
                    var numIndigenous = parseInt($("#num_of_indigenous").val());
                    var numPwd = parseInt($("#num_of_pwd").val());
                    // enable nextBtn if all input for breakdown of participants in Section 4 is equal to total_participants
                    if ((totalParticipants == (farmersAndGrowers + extensionWorkers + numScientific +
                            numOther)) &&
                        (totalParticipants == (numFemale + numMale)) &&
                        (numIndigenous <= totalParticipants) &&
                        (numPwd <= totalParticipants)) {
                        nextBtn.disabled = false;
                    } else {
                        nextBtn.disabled = true;
                    }
                }
            });

            $('#nextBtn').on('click', function() {
                saveFormData();
                loadFormData();

                // changes the type of nextBtn into submit
                if (currentSection == 5) {
                    $("#submitBtn").removeAttr("hidden");
                    $("#nextBtn").attr("hidden", true);
                }

                // disable nextBtn if any of the input for breakdown of participants and total_participants are blank (Section 4)
                if (currentSection == 4) {
                    checkSection4();
                }
                // disable nextBtn if any of the input are blank (Section 3)
                if (currentSection == 3) {
                    checkSection3();
                }
                // disable nextBtn if any of the input are blank (Section 2)
                if (currentSection === 2) {
                    checkSection2();
                }
                // if (currentSection == 2) {
                //     // disable nextBtn if one of the input field is blank
                //     if (!$("#training_title").val() || !$("#training_category").val() || !$(
                //             "#training_type").val() || !$("#mod").val() || !$("#start_date").val() || !$(
                //             "#end_date").val()) {
                //         nextBtn.disabled = true;
                //     } else {

                //         if ($("#training_title").val() == 'Other') {
                //             if (!$("#otherTrainingInput").val()) {
                //                 nextBtn.disabled = true;
                //             } else {
                //                 nextBtn.disabled = false;
                //             }
                //         }
                //         if ($("#training_type").val() == 'Local') {
                //             // disable nextBtn if training_venue is blank and training_type == Local
                //             if (!$("#training_venue").val()) {
                //                 nextBtn.disabled = true;
                //             } else {
                //                 if ($("#training_venue").val() == 'Within PhilRice Station') {
                //                     // disable nextBtn if withinPhilriceInput is blank and training_venue == Within PhilRice Station
                //                     if (!$("#withinPhilriceInput").val()) {
                //                         nextBtn.disabled = true;
                //                     } else {
                //                         nextBtn.disabled = false;
                //                     }

                //                 } else if ($("#training_venue").val() == 'Outside PhilRice Station') {
                //                     // disable nextBtn if outsidePhilriceInput is blank and training_venue == Outside PhilRice Station
                //                     if (!$("#province").val() || !$("#municipality").val()) {
                //                         nextBtn.disabled = true;
                //                     } else {
                //                         nextBtn.disabled = false;
                //                     }
                //                 }
                //             }
                //         }
                //         if ($("#training_type").val() == 'International') {
                //             // disable nextBtn if internationalTrainingInput is blank and training_type == International
                //             if (!$("#internationalTrainingInput").val()) {
                //                 nextBtn.disabled = true;
                //             } else {
                //                 nextBtn.disabled = false;
                //             }
                //         }

                //         // disable nextBtn if start_date or end_date exceeded today's date
                //         if (($("#start_date").val() > formattedDateToday) || ($("#end_date").val() > formattedDateToday)) {
                //             nextBtn.disabled = true;
                //         } else {
                //             nextBtn.disabled = false;
                //         }
                //     }
                // }

            });

            $('#otherTrainingInput, #internationalTrainingInput, #outsidePhilriceInput, #total_participants, #start_date, #end_date, #sponsor, #average_gik, #num_of_farmers_and_growers, #num_of_extension_workers, #num_of_scientific, #num_of_other, #num_of_female, #num_of_male, #num_of_indigenous, #num_of_pwd, #evaluationInput')
                .on('keyup input click', function() {
                    // console.log(today);
                    // console.log($("#start_date").val());
                    // console.log($("#end_date").val());
                    // $("#municipality").val($("#municipalitySelect").val());
                    // disable nextBtn if any of the input for breakdown of participants and total_participants are blank
                    if (currentSection == 4) {
                        checkSection4();
                    }
                    // Prevent input exceed more than 5 and less than 1
                    if (parseFloat($("#evaluationInput").val()) > 5) {
                        parseFloat($("#evaluationInput").val(5));
                        $("#evaluationOutput").val('Outstanding');
                        $("#evaluationOutput").addClass("bg-green-600");
                    } else if (parseFloat($("#evaluationInput").val()) < 1) {
                        parseFloat($("#evaluationInput").val(1));
                        $("#evaluationOutput").val('Poor');
                        $("#evaluationOutput").addClass("bg-red-700");
                    }

                    // disable nextBtn if any of the input are blank (Section 3)
                    if (currentSection == 3) {
                        checkSection3();
                    }
                    // disable nextBtn if any of the input are blank (Section 2)
                    if (currentSection === 2) {
                        checkSection2();
                    }
                    // if (currentSection == 2) {
                    //     // disable nextBtn if one of the input field is blank
                    //     if (!$("#training_title").val() || !$("#training_category").val() || !$(
                    //             "#training_type").val() || !$("#mod").val() || (!$("#start_date").val() || !$(
                    //             "#end_date").val())) {
                    //         nextBtn.disabled = true;
                    //     } else {
                    //         if ($("#training_title").val() == 'Other') {
                    //             if ($("#otherTrainingInput").val() == '') {
                    //                 nextBtn.disabled = true;
                    //             } else {
                    //                 nextBtn.disabled = false;
                    //             }
                    //             // console.log($("#otherTrainingInput").val());
                    //         }
                    //         if ($("#training_type").val() == 'Local') {
                    //             // disable nextBtn if training_venue is blank and training_type == Local
                    //             if (!$("#training_venue").val()) {
                    //                 nextBtn.disabled = true;
                    //             } else {
                    //                 if ($("#training_venue").val() == 'Within PhilRice Station') {
                    //                     // disable nextBtn if withinPhilriceInput is blank and training_venue == Within PhilRice Station
                    //                     if (!$("#withinPhilriceInput").val()) {
                    //                         nextBtn.disabled = true;
                    //                         console.log($("#start_date").val());
                    //                     } else {
                    //                         nextBtn.disabled = false;
                    //                     }

                    //                 } else if ($("#training_venue").val() == 'Outside PhilRice Station') {
                    //                     // disable nextBtn if outsidePhilriceInput is blank and training_venue == Outside PhilRice Station
                    //                     if (!$("#province").val() || !$("#municipality").val()) {
                    //                         nextBtn.disabled = true;
                    //                     } else {
                    //                         nextBtn.disabled = false;
                    //                     }
                    //                 }
                    //             }
                    //         }
                    //         if ($("#training_type").val() == 'International') {
                    //             // disable nextBtn if internationalTrainingInput is blank and training_type == International
                    //             if (!$("#internationalTrainingInput").val()) {
                    //                 nextBtn.disabled = true;
                    //             } else {
                    //                 nextBtn.disabled = false;
                    //             }
                    //         }

                    //         // disable nextBtn if start_date or end_date exceeded today's date
                    //         if (($("#start_date").val() > formattedDateToday) || ($("#end_date").val() > formattedDateToday)) {
                    //             nextBtn.disabled = true;
                    //         } else {
                    //             nextBtn.disabled = false;
                    //         }
                    //     }
                    // }
                });

            $('#decrement-button1, #decrement-button2, #decrement-button3, #decrement-button4, #decrement-button5, #decrement-button6, #decrement-button7, #decrement-button8')
                .on('click', function() {
                    // disable nextBtn if any of the input for breakdown of participants and total_participants are blank
                    if (currentSection == 4) {
                        checkSection4();
                    }
                });

            $('#increment-button1, #increment-button2, #increment-button3, #increment-button4, #increment-button5, #increment-button6, #increment-button7, #increment-button8')
                .on('click', function() {
                    // disable nextBtn if any of the input for breakdown of participants and total_participants are blank
                    if (currentSection == 4) {
                        checkSection4();
                    }
                });

            $('#training_title, #training_category, #training_type, #mod, #training_venue, #withinPhilriceInput, #province, #municipalitySelect, #source_of_fund')
                .on('change', function() {
                    // $("#municipality").val($("#municipalitySelect").val());
                    // disable nextBtn if any of the input are blank (Section 3)
                    if (currentSection == 3) {
                        var sponsor = $("#sponsor").val();
                        var source_of_fund = $("#source_of_fund").val();
                        var average_gik = $("#average_gik").val();
                        var evaluationInput = $("#evaluationInput").val();

                        if (!sponsor || !source_of_fund || !average_gik || !evaluationInput) {
                            nextBtn.disabled = true;
                        } else {
                            nextBtn.disabled = false;
                        }

                        // const $startDate = $("#start_date");
                        // const $endDate = $("#end_date");
                        // // if ($startDate.val() > formattedDateToday || $endDate.val() > formattedDateToday) {
                        // if (new Date($startDate.val()) > today || new Date($endDate.val()) > today) {
                        //     $("#date-error-message").text("Start Date or End Date is Invalid");
                        //     nextBtn.disabled = true;
                        // } else {
                        //     $("#date-error-message").text("");
                        // }
                    }
                    // disable nextBtn if any of the input are blank (Section 2)
                    if (currentSection === 2) {
                        checkSection2();
                    }
                });

            // check image size
            $('#photo_doc_event').on('change', function() {
                var images = this.files;
                var errorImage = $('#errorImage');

                for (var i = 0; i < images.length; i++) {
                    var image = images[i];
                    var imageSize = image.size / 1024 / 1024; // Convert bytes to MB

                    if (imageSize > 25) {
                        errorImage.text('Image size exceeds 25MB. Please upload a smaller image.');
                        errorImage.show(); // Show the error message
                        $(this).val(''); // Clear the file input
                        return; // Stop further processing
                    }
                }
                // Hide the error message if all images are within size limit
                errorImage.hide();
            });
            // check file size
            $('#other_doc').on('change', function() {
                var files = this.files;
                var errorFile = $('#errorFile');

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var fileSize = file.size / 1024 / 1024; // Convert bytes to MB

                    if (fileSize > 25) {
                        errorFile.text('File size exceeds 25MB. Please upload a smaller file.');
                        errorFile.show(); // Show the error message
                        $(this).val(''); // Clear the file input
                        return; // Stop further processing
                    }
                }
                errorFile.hide();
            });

            // province and municipality dropdown change event
            $('#province').on('change', function() {
                var provCode = $("#province").val();
                // $("#municipalitySelect").html('');

                $.ajax({
                    url: "{{ route('trainings.fetchMunicipalities') }}",
                    type: "POST",
                    data: {
                        provCode: provCode,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#municipalitySelect').html(
                            '<option selected disabled value="">Select</option>');
                        $.each(result, function(key, value) {
                            $("#municipalitySelect").append('<option value="' + value
                                .citymunCode + '">' +
                                value.citymunDesc + '</option>');
                        });

                    },
                    error: function(error) {
                        alert('Something went wrong!');
                    },
                });
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
