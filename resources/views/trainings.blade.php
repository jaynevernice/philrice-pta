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
                            <a href="{{ route('encoder.view') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='line-chart'></box-icon>
                                <span class="ml-3">View Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.add') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='plus'></box-icon>
                                <span class="ml-3">Add Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.edit') }}"
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
                    {{-- class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PhilRice CES</span> --}}
                    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400"></span>
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

            {{-- @if ($errors->hasAny(['training_title', 'batch', 'otherTrainingInput', 'training_type', 'training_category', 'mod', 'internationalTrainingInput', 'withinPhilriceInput', 'province', 'municipalitySelect', 'start', 'end'])) --}}
            {{-- Section 2 --}}
            <div class="section" data-section="2" style="display: none;">
                <div class="flex">
                    <h6 class="text-lg font-bold dark:text-white">Training Details</h6>
                </div>

                <div class="my-2 grid grid-cols-5 gap-x-4">

                    {{-- Training Title --}}
                    {{-- <div class="col-span-2"> --}}
                    <div class="col-span-4">
                        <label for="training_title" class="block my-2 text-sm font-medium text-gray-900">Training
                            Title</label>
                        <div class="relative">
                            <select required id="training_title" name="training_title" onchange="toggleOtherTitle()"
                                class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                <option selected disabled value="">Select</option>
                                @foreach ($titles as $title)
                                    <option value="{{ $title->training_title }}">{{ $title->training_title }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>
                            <p id="training_title_error"
                                class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">Oops!</span> Select Training Title.</p>
                        </div>
                    </div>

                    {{-- Batch Number --}}
                    <div class="col-span-1">
                        <label for="batch" class="block my-2 text-sm font-medium text-gray-900">Batch No.</label>
                        <input type="number" id="batch" name="batch" value="{{ old('batch') }}" min="1"
                            step="1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                        <p id="batch_error" class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">Oops!</span> Input Batch Number.</p>
                    </div>

                    {{-- Additional Input Field for Training Title when Other is selected --}}
                    <div id="otherTrainingTitle" style="display: none;" class="col-span-5">
                        <label for="otherTrainingInput" class="block my-2 text-sm font-medium text-gray-900">Other
                            Training
                            Title</label>
                        <input type="text" id="otherTrainingInput" name="otherTrainingInput"
                            value="{{ old('otherTrainingInput') }}"
                            class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                        <p id="other_training_title_error"
                            class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">Oops!</span> Training Title is Required.</p>
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
                            <p id="training_type_error"
                                class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">Oops!</span> Select Training Type.</p>
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
                            <p id="training_category_error"
                                class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">Oops!</span> Select Training Category.</p>
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
                                <option value="Blended (Online + Face to Face)">Blended (Online + Face-to-Face)
                                </option>
                            </select>
                            <p id="mod_error" class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                                <span class="font-medium">Oops!</span> Select Training Category.
                            </p>
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
                            <p id="training_venue_error"
                                class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">Oops!</span> Select Training Category.</p>
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
                    <p id="international_training_error"
                        class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">Oops!</span> Address for International Venue is Required.</p>
                </div>

                {{-- Additional Input Field for Within PhilRice Station --}}
                <div id="withinPhilrice" style="display: none;">
                    <label for="withinPhilriceInput" class="block my-2 text-sm font-medium text-gray-900">Within
                        PhilRice
                        Station</label>
                    <select name="withinPhilriceInput" id="withinPhilriceInput"
                        class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                        <option selected disabled value="">Select</option>
                        @foreach ($stations as $station)
                            <option value="{{ $station->id }}">PhilRice {{ $station->station }}</option>
                        @endforeach
                    </select>
                    <p id="within_philrice_error"
                        class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">Oops!</span> Select a Station.</p>
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
                        <p id="province_error" class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops!</span> Select a Province.
                        </p>
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
                        <p id="municipality_error"
                            class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">Oops!</span> Select a Municipality.</p>
                        <input type="text" name="municipality" id="municipality" value="{{ old('municipality') }}"
                            hidden>
                    </div>
                </div>

                {{-- Start Date and End Date --}}
                <div date-rangepicker id="date_range" class="my-2 grid grid-cols-2 gap-x-4">
                    <div>
                        <label for="start_date" class="block my-2 text-sm font-medium text-gray-900">Start
                            Date</label>
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

                            <p id="start_date_error"
                                class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">Oops!</span> Input Start Date.</p>
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
                            <p id="end_date_error"
                                class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">Oops!</span> Input End Date.</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endif --}}

            {{-- Section 3 --}}
            <div class="section" data-section="3" style="display: none;">
                <div class="flex">
                    <h6 class="text-lg font-bold dark:text-white">Conduct of Training</h6>
                </div>
                {{-- <div id="date-error-message" class="text-red-500"></div> --}}

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
                        <p id="sponsor_error" class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops!</span> Name of Implementing Partner/s or Co-Organizer/s
                            required.
                        </p>
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
                            <p id="sof_error" class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                                <span class="font-medium">Oops!</span> Select Source of Fund.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Additional Input Field for Source of Fund when Other is selected --}}
                <div id="otherSourceFund" style="display: none;" class="col-span-2">
                    <label for="otherFundInput" class="block my-2 text-sm font-medium text-gray-900">Other
                        Source of Fund</label>
                    <input type="text" id="otherFundInput" name="otherFundInput" value="{{ old('otherFundInput') }}"
                        class="block w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                    <p id="other_fund_error" class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                        <span class="font-medium">Oops!</span> Input Other Source of Fund.
                    </p>
                </div>

                <div class="my-2 grid grid-cols-2 gap-x-4 max-[760px]:grid-cols-1">
                    {{-- Average GIK --}}
                    <div class="grid grid-rows-2">
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
                        <p id="gik_error" class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops!</span> Input Average Gain in Knowledge
                        </p>
                    </div>

                    {{-- Overall Training Evaluation --}}
                    <div class="grid grid-rows-2">
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
                                <p id="evaluation_error"
                                    class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                                    <span class="font-medium">Oops!</span> Input Overall Evaluation Rating.
                                </p>
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
                        <p id="total_participants_error"
                            class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops!</span> Input Total Number of Participants.
                        </p>
                    </div>
                </div>

                <hr class="my-4">
                <label class="block text-sm font-medium text-gray-900">Remaining Participants to Distribute: <span
                        class="text-red-600" id="remaining_label_1">-</span></label>
                {{-- <label class="block text-sm font-medium text-gray-900">Participants Remaining: <span class="text-red-600"
                        id="remaining_label_1">-</span></label> --}}
                {{-- <label class="block text-sm font-medium text-gray-900">Out of the <span class="text-red-600"
                        id="remaining_label_1">-</span> participants,</label> --}}
                {{-- <label class="block text-sm font-medium text-gray-900">Of the total number,</label> --}}
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
                        <p id="farmers_counter_error"
                            class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops!</span> Input Total Number of Farmers and Seed Growers
                        </p>
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
                        <p id="ext_counter_error"
                            class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops!</span> Input Total Number of Extension Workers and
                            Intermediaries
                        </p>
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
                        <p id="sci_counter_error"
                            class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops!</span> Input Total Number of Scientific Community Members
                        </p>
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
                        <p id="other_counter_error"
                            class="hidden animate-pulse mt-2 text-xs text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops!</span> Input Total Number of Other Sector
                        </p>
                    </div>
                </div>

                <p id="group_1_error"
                    class="hidden animate-pulse mt-2 text-xs text-center text-red-600 dark:text-red-400">
                    <span class="font-medium">Oops!</span> Please ensure that your distribution of sectors equals to the
                    total number of participants
                </p>

                <hr class="my-4">
                <label class="block text-sm font-medium text-gray-900 dark:text-white">Remaining Participants to
                    Distribute: <span class="text-red-600" id="remaining_label_2">-</span></label>
                {{-- <label class="block text-sm font-medium text-gray-900 dark:text-white">Out of the <span
                        class="text-red-600" id="remaining_label_2">-</span> participants,</label> --}}
                {{-- <label class="block text-sm font-medium text-gray-900 dark:text-white">Of the total number,</label> --}}

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

                <p id="group_2_error"
                    class="hidden animate-pulse mt-2 text-xs text-center text-red-600 dark:text-red-400">
                    <span class="font-medium">Oops!</span> Please ensure that your distribution of sexes equals to the
                    total number of participants
                </p>

                <hr class="my-4">

                <div class="my-1 grid grid-cols-2 gap-x-4 max-[760px]:grid-cols-1">
                    {{-- Total Num of Indigenous People --}}
                    <div class="grid grid-rows-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 dark:text-white">Out of the <span
                                    class="text-red-600" id="remaining_label_3">-</span> participants,</label>
                            {{-- <label class="block text-sm font-medium text-gray-900">Of the total
                                number,</label> --}}
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
                        <p id="ip_info"
                            class="hidden animate-pulse mt-2 text-xs text-center text-green-600 dark:text-green-400">
                            <span class="font-medium">Note: </span> You may leave this field as 0 if there were no
                            Indigenous People (IP)
                        </p>
                        <p id="ip_info_exceed"
                            class="hidden animate-pulse mt-2 text-xs text-center text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops! </span> It appears your input exceeds the total number of
                            participants.
                        </p>
                    </div>

                    {{-- Total Num of PWD --}}
                    <div class="grid grid-rows-2">
                        <div>
                            {{-- <label class="block text-sm font-medium text-gray-900">Of the total
                                number,</label> --}}
                            <label class="block text-sm font-medium text-gray-900">Out of the <span class="text-red-600"
                                    id="remaining_label_4">-</span> participants,</label>
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
                        <p id="pwd_info"
                            class="hidden animate-pulse mt-2 text-xs text-center text-green-600 dark:text-green-400">
                            <span class="font-medium">Note: </span> You may leave this field as 0 if there were no People
                            with Disability (PWD)
                        </p>
                        <p id="pwd_info_exceed"
                            class="hidden animate-pulse mt-2 text-xs text-center text-red-600 dark:text-red-400">
                            <span class="font-medium">Oops! </span> It appears your input exceeds the total number of
                            participants.
                        </p>
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
                            class="flex w-full text-sm text-red-600 border border-red-600 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="file" multiple>
                        {{--  onchange="displayPhotoDocPreviews(this)" --}}
                        {{-- <div id="errorImage" style="color: red; display: none;"></div> --}}
                        <p id="photo_doc_error" class=" mt-2 text-xs text-center text-red-600 dark:text-red-400">
                            Photo Documentation of Event/Activity is <span class="font-medium">Required</span>
                        </p>
                        <p id="photo_doc_error_more_than_10"
                            class="hidden animate-pulse mt-2 text-xs text-center text-red-600 dark:text-red-400"><span
                                class="font-medium">Oops!</span> You can only upload up to 10 photos
                        </p>
                        <p id="photo_doc_error_more_than_25mb"
                            class="hidden animate-pulse mt-2 text-xs text-center text-red-600 dark:text-red-400"><span
                                class="font-medium">Oops!</span> You can only upload photos up to 25MB in total size
                        </p>
                    </div>

                    {{-- Photo Documentation Previews --}}
                    <div id="photoDocContainer" class="mb-6 col-span-2" style="display: none;">
                        <div id="photoDocPreviews"
                            class="my-1 p-2 grid grid-cols-5 max-[760px]:grid-cols-1 gap-4 bg-gray-200 rounded-lg drop-shadow-lg">
                        </div>
                        <div class="flex justify-end">
                            <button id="clearPhotoDocs" type="button"
                                class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-600">Clear
                                All Photos
                            </button>
                        </div>
                    </div>

                    <div class="mb-6 col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="other_doc">Other
                            forms of documentation <span class="text-gray-600 italic">(optional)</span></label>
                        <p class="text-sm text-gray-500 mb-6">You may upload other forms of training documentation such as
                            attendance/registration sheet, copy of event program, short video or audio clip, and other
                            relevant documents, spreadsheet, or PDF file.</p>
                        <input id="other_doc" name="other_doc[]"
                            class="flex w-full text-sm text-green-600 border border-green-600 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="file" multiple>

                        {{-- <div id="errorFile" style="color: red; display: none;"></div> --}}
                        <p id="other_doc_error" class=" mt-2 text-xs text-center text-green-600 dark:text-green-400">
                            Other Documentation of Event/Activity is <span class="font-medium">Optional</span>
                        </p>
                        <p id="other_doc_error_more_than_10"
                            class="hidden animate-pulse mt-2 text-xs text-center text-red-600 dark:text-red-400"><span
                                class="font-medium">Oops!</span> You can only upload up to 10 files
                        </p>
                        <p id="other_doc_error_more_than_25mb"
                            class="hidden animate-pulse mt-2 text-xs text-center text-red-600 dark:text-red-400"><span
                                class="font-medium">Oops!</span> You can only upload files up to 25MB in total size
                        </p>
                    </div>

                    <div id="otherDocContainer" class="mb-6 col-span-2" style="display: none;">
                        <div id="otherDocPreviews"
                            class="my-1 p-2 grid grid-cols-4 max-[760px]:grid-cols-1 gap-4 bg-gray-200 rounded-lg drop-shadow-lg">
                        </div>
                        <div class="flex justify-end">
                            <button id="clearOtherDocs" type="button"
                                class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-600">Clear
                                All Files
                            </button>
                        </div>
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
    {{-- Photo Documentation Previews --}}
    <script>
        // Function to clear all images
        function clearImages() {
            var photoDocContainer = document.getElementById("photoDocPreviews");
            photoDocContainer.innerHTML = "";
            var container = document.getElementById('photoDocContainer');
            container.style.display = 'none';
            document.getElementById("photo_doc_event").value = "";
        }

        // Function to display images
        function displayImages() {
            var photoDocContainer = document.getElementById("photoDocPreviews");
            var existingImages = photoDocContainer.querySelectorAll("img");
            var files = document.getElementById("photo_doc_event").files;
            photoDocContainer.innerHTML = ""; // Clears previous upload

            // Check if the number of uploaded images exceeds 10
            if (files.length > 10) {
                document.getElementById("photo_doc_error_more_than_10").classList.remove("hidden");
                return; // Exit the function if more than 10 images are uploaded
            } else {
                document.getElementById("photo_doc_error_more_than_10").classList.add("hidden");
            }

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var alreadyDisplayed = Array.from(existingImages).some(function(img) {
                    return img.alt === file.name;
                });
                if (!alreadyDisplayed) {
                    displayImage(file);
                }
            }
        }

        // Function to display a single image
        function displayImage(file) {
            var a = document.createElement("a");
            a.href = URL.createObjectURL(file);
            a.setAttribute("target", "_blank");

            var img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.alt = file.name;

            a.appendChild(img);

            var photoDocContainer = document.getElementById("photoDocPreviews");
            photoDocContainer.appendChild(a);

            var container = document.getElementById('photoDocContainer');
            container.style.display = 'block';
        }

        document.getElementById("photo_doc_event").addEventListener("change", displayImages);
        document.getElementById("clearPhotoDocs").addEventListener("click", clearImages);
    </script>

    {{-- Other Documentation Previews --}}
    <script>
        document.getElementById('other_doc').addEventListener('change', function() {
            const files = this.files;
            const maxSize = 25 * 1024 * 1024; // Define the maximum file size in bytes (25MB)
            const previewContainer = document.getElementById('otherDocPreviews');
            previewContainer.innerHTML = ""; // Clears previous upload

            // Function to clear all files
            function clearFiles() {
                previewContainer.innerHTML = "";
                var container = document.getElementById('otherDocContainer');
                container.style.display = 'none';
                document.getElementById("other_doc").value = "";
            }

            // Loop through each file and display file name and size with Tailwind CSS classes
            for (const file of files) {
                const fileNameElement = document.createElement('p');
                const fileSizeFormatted = formatFileSize(file.size);
                const fileSizeElement = document.createElement('span');
                fileSizeElement.textContent = ` (${fileSizeFormatted})`;
                fileSizeElement.classList.add('text-blue-600'); // Add the blue text color class
                fileNameElement.textContent = file.name;
                fileNameElement.appendChild(fileSizeElement); // Append size element to file name element
                fileNameElement.classList.add('text-sm', 'bg-gray-300', 'rounded-lg', 'py-1', 'px-2', 'mb-2',
                    'overflow-hidden', 'text-wrap');

                // Check if the file size exceeds the maximum limit
                if (file.size > maxSize) {
                    // Add error styling and show error message
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600').addClass(
                        'border-red-600 text-red-600');
                    $('#other_doc_error_more_than_25mb').removeClass('hidden');
                    return; // Exit the function
                } else {
                    // Hide error message if the file size is within the limit
                    $('#other_doc_error_more_than_25mb').addClass('hidden');
                }

                previewContainer.appendChild(fileNameElement);
            }

            // Show the container if there are uploaded files
            if (files.length > 0) {
                document.getElementById('otherDocContainer').style.display = 'block';
                document.getElementById("clearOtherDocs").addEventListener("click", clearFiles);
            } else {
                document.getElementById('otherDocContainer').style.display = 'none';
            }
        });

        // Function to format file size in a human-readable format
        function formatFileSize(size) {
            if (size === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            const i = Math.floor(Math.log(size) / Math.log(k));
            return parseFloat((size / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    </script>



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
                    evaluationOutput.value = '😔 Fair';
                    evaluationOutputClass.remove("bg-red-700", "bg-yellow-300", "bg-lime-500", "bg-green-600");
                    evaluationOutputClass.add("bg-orange-500");
                } else if (evaluationInput <= 3.5) {
                    evaluationOutput.value = '😌 Good';
                    evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-lime-500", "bg-green-600");
                    evaluationOutputClass.add("bg-yellow-300");
                } else if (evaluationInput <= 4.5) {
                    evaluationOutput.value = '😄 Very Good';
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
                "batch": $("#batch").val(),
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
                $("#batch").val(formData.batch);
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

                // Styling
                // Section 2
                if (formData.training_title) {
                    $("#training_title").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.batch) {
                    $("#batch").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.training_type) {
                    $("#training_type").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.training_category) {
                    $("#training_category").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.mod) {
                    $("#mod").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.start_date) {
                    $("#start_date").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.end_date) {
                    $("#end_date").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.training_title === "Other") {
                    var otherTrainingTitleDiv = document.getElementById('otherTrainingTitle');

                    otherTrainingTitleDiv.style.display = 'block';
                    $("#otherTrainingInput").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                var row2 = document.getElementById("row2");
                var row2Classes = row2.classList;

                if (formData.training_type === "International") {
                    // Adjust grid columns
                    row2Classes.remove("grid-cols-4");
                    row2Classes.add("grid-cols-3");

                    var internationalTrainingDiv = document.getElementById('internationalTraining');
                    internationalTrainingDiv.style.display = 'block';
                    $("#internationalTrainingInput").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                } else if (formData.training_type === "Local") {
                    // Adjust grid columns
                    row2Classes.remove("grid-cols-3");
                    row2Classes.add("grid-cols-4");

                    if (formData.training_venue) {
                        var trainingVenueDiv = document.getElementById('training_venue_container');
                        trainingVenueDiv.style.display = 'block';
                        $("#training_venue").removeClass('border-gray-300 text-gray-900').addClass(
                            'border-green-600 text-green-600');

                        if (formData.training_venue === "Within PhilRice Station") {
                            var withinPhilriceDiv = document.getElementById('withinPhilriceInput');
                            withinPhilriceDiv.style.display = 'block';

                            if (formData.withinPhilriceInput) {
                                $("#withinPhilriceInput").removeClass('border-gray-300 text-gray-900').addClass(
                                    'border-green-600 text-green-600');
                            }


                        } else if (formData.training_venue === "Outside PhilRice Station") {
                            var outsidePhilriceDiv = document.getElementById('outsidePhilrice');
                            outsidePhilriceDiv.style.display = 'grid';

                            outsidePhilriceDiv.style.gridTemplateColumns = "repeat(2, minmax(0, 1fr))";

                            if (formData.province) {
                                $("#province").removeClass('border-gray-300 text-gray-900').addClass(
                                    'border-green-600 text-green-600');
                            }

                            if (formData.municipality) {
                                $("#municipalitySelect").removeClass('border-gray-300 text-gray-900').addClass(
                                    'border-green-600 text-green-600');
                            }
                        }
                    }
                }

                // Section 3
                if (formData.sponsor) {
                    $("#sponsor").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.source_of_fund) {
                    $("#source_of_fund").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');

                    if (formData.source_of_fund === "Other") {
                        var otherSourceFundDiv = document.getElementById('otherSourceFund');
                        otherSourceFundDiv.style.display = 'block';

                        if (formData.otherFundInput) {
                            $("#otherFundInput").removeClass('border-gray-300 text-gray-900').addClass(
                                'border-green-600 text-green-600');
                        }
                    }

                }

                if (formData.average_gik) {
                    $("#average_gik").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.evaluationInput) {
                    $("#evaluationInput").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');

                    $("#evaluationOutput").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');

                    var evaluationInput = formData.evaluationInput;
                    var evaluationOutput = document.getElementById('evaluationOutput');
                    var evaluationOutputClass = evaluationOutput.classList;

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
                        evaluationOutput.value = '😔 Fair';
                        evaluationOutputClass.remove("bg-red-700", "bg-yellow-300", "bg-lime-500", "bg-green-600");
                        evaluationOutputClass.add("bg-orange-500");
                    } else if (evaluationInput <= 3.5) {
                        evaluationOutput.value = '😌 Good';
                        evaluationOutputClass.remove("bg-red-700", "bg-orange-500", "bg-lime-500", "bg-green-600");
                        evaluationOutputClass.add("bg-yellow-300");
                    } else if (evaluationInput <= 4.5) {
                        evaluationOutput.value = '😄 Very Good';
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

                if (formData.total_participants) {
                    $("#total_participants").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.num_of_indigenous === "0") {
                    $("#num_of_indigenous").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                    $("#decrement-button7, #increment-button7").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }

                if (formData.num_of_pwd === "0") {
                    $("#num_of_pwd").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                    $("#decrement-button8, #increment-button8").removeClass('border-gray-300 text-gray-900').addClass(
                        'border-green-600 text-green-600');
                }
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
            });

            $('#otherTrainingInput, #internationalTrainingInput, #outsidePhilriceInput, #total_participants, #start_date, #end_date, #sponsor, #average_gik, #num_of_farmers_and_growers, #num_of_extension_workers, #num_of_scientific, #num_of_other, #num_of_female, #num_of_male, #num_of_indigenous, #num_of_pwd, #evaluationInput')
                .on('keyup input click', function() {
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

    {{-- Mano manong validation lets go lol --}}
    <script>
        $(document).ready(function() {
            // Error messages. Hidden by default.
            $('#batch_error, #training_title_error, #other_training_title_error, #training_type_error, #training_category_error, #mod_error, #training_venue_error, #international_training_error, #within_philrice_error, #start_date_error, #end_date_error')
                .addClass('hidden');

            // Section 2
            $('#training_title').change(function() {
                var trainingTitle = $(this).val();

                // If a value is selected (bukod sa default which is selected value=""), change the border and text color to green
                if (trainingTitle !== "") {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#training_title_error').addClass('hidden');
                }

                var otherTitle = $('#otherTrainingInput').val();
                var batch = $('#batch').val();
                var trainingType = $('#training_type').val();
                var trainingCategory = $('#training_category').val();
                var mod = $('#mod').val();
                var trainingVenue = $('#training_venue').val();
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();


                if (!otherTitle) {
                    $('#otherTrainingInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_training_title_error').removeClass('hidden');
                }

                if (!batch) {
                    $('#batch').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#batch_error').removeClass('hidden');
                }

                if (!trainingType) {
                    $('#training_type').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_type_error').removeClass('hidden');
                }

                if (!trainingCategory) {
                    $('#training_category').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_category_error').removeClass('hidden');
                }

                if (!mod) {
                    $('#mod').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#mod_error').removeClass('hidden');
                }

                if (!trainingVenue) {
                    $('#training_venue').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_venue_error').removeClass('hidden');
                }

                if (!startDate) {
                    $('#start_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#start_date_error').removeClass('hidden');
                }

                if (!endDate) {
                    $('#end_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#end_date_error').removeClass('hidden');
                }
            });

            $('#batch').on('input', function() {
                var batch = $(this).val();

                if (batch && !isNaN(batch)) {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#batch_error').addClass('hidden');
                } else {
                    $(this).removeClass('border-green-600 text-green-600 border-gray-300 text-gray-900')
                        .addClass('border-red-600 text-red-600');
                    $('#batch_error').removeClass('hidden');
                }
            });

            // If user is trying to input non number 
            $('#batch').on('keypress', function(event) {
                var charCode = event.which ? event.which : event.keyCode;

                if (charCode < 48 || charCode > 57) {
                    event.preventDefault();
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#batch_error').removeClass('hidden');
                }

                var trainingTitle = $('#training_title').val();
                var otherTitle = $('#otherTrainingInput').val();
                var trainingType = $('#training_type').val();
                var trainingCategory = $('#training_category').val();
                var mod = $('#mod').val();
                var trainingVenue = $('#training_venue').val();
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                if (!trainingTitle) {
                    $('#training_title').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_title_error').removeClass('hidden');
                }

                if (!otherTitle) {
                    $('#otherTrainingInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_training_title_error').removeClass('hidden');
                }

                if (!trainingType) {
                    $('#training_type').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_type_error').removeClass('hidden');
                }

                if (!trainingCategory) {
                    $('#training_category').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_category_error').removeClass('hidden');
                }

                if (!mod) {
                    $('#mod').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#mod_error').removeClass('hidden');
                }

                if (!trainingVenue) {
                    $('#training_venue').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_venue_error').removeClass('hidden');
                }

                if (!startDate) {
                    $('#start_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#start_date_error').removeClass('hidden');
                }

                if (!endDate) {
                    $('#end_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#end_date_error').removeClass('hidden');
                }
            });

            $('#otherTrainingInput').on('input', function() {
                var otherTitle = $(this).val().trim();

                if (otherTitle === '') {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_training_title_error').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#other_training_title_error').addClass('hidden');
                }
            });

            $('#training_type').change(function() {
                var trainingType = $(this).val();

                if (trainingType !== "") {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#training_type_error').addClass('hidden');
                }

                var trainingTitle = $('#training_title').val();
                var batch = $('#batch').val();
                var trainingCategory = $('#training_category').val();
                var mod = $('#mod').val();
                var trainingVenue = $('#training_venue').val();
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var otherTitle = $('#otherTrainingInput').val();

                var international = $('#internationalTrainingInput').val();

                if (!trainingTitle) {
                    $('#training_title').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_title_error').removeClass('hidden');
                }

                if (!otherTitle) {
                    $('#otherTrainingInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_training_title_error').removeClass('hidden');
                }

                if (!batch) {
                    $('#batch').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#batch_error').removeClass('hidden');
                }

                if (!trainingCategory) {
                    $('#training_category').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_category_error').removeClass('hidden');
                }

                if (!mod) {
                    $('#mod').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#mod_error').removeClass('hidden');
                }

                if (!trainingVenue) {
                    $('#training_venue').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_venue_error').removeClass('hidden');
                }

                if (!startDate) {
                    $('#start_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#start_date_error').removeClass('hidden');
                }

                if (!endDate) {
                    $('#end_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#end_date_error').removeClass('hidden');
                }

                if (!international) {
                    $('#internationalTrainingInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#international_training_error').removeClass('hidden');
                }

            });

            $('#training_category').change(function() {
                var trainingCategory = $(this).val();
                if (trainingCategory !== "") {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#training_category_error').addClass('hidden');
                }

                var trainingTitle = $('#training_title').val();
                var otherTitle = $('#otherTrainingInput').val();
                var batch = $('#batch').val();
                var trainingType = $('#training_type').val();
                var mod = $('#mod').val();
                var trainingVenue = $('#training_venue').val();
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                if (!trainingTitle) {
                    $('#training_title').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_title_error').removeClass('hidden');
                }

                if (!otherTitle) {
                    $('#otherTrainingInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_training_title_error').removeClass('hidden');
                }

                if (!batch) {
                    $('#batch').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#batch_error').removeClass('hidden');
                }

                if (!trainingType) {
                    $('#training_type').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_type_error').removeClass('hidden');
                }

                if (!mod) {
                    $('#mod').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#mod_error').removeClass('hidden');
                }

                if (!trainingVenue) {
                    $('#training_venue').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_venue_error').removeClass('hidden');
                }

                if (!startDate) {
                    $('#start_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#start_date_error').removeClass('hidden');
                }

                if (!endDate) {
                    $('#end_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#end_date_error').removeClass('hidden');
                }
            });

            $('#mod').change(function() {
                var mod = $(this).val();
                if (mod !== "") {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#mod_error').addClass('hidden');
                }

                var trainingTitle = $('#training_title').val();
                var otherTitle = $('#otherTrainingInput').val();
                var batch = $('#batch').val();
                var trainingType = $('#training_type').val();
                var trainingCategory = $('#training_category').val();
                var trainingVenue = $('#training_venue').val();
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                if (!trainingTitle) {
                    $('#training_title').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_title_error').removeClass('hidden');
                }

                if (!otherTitle) {
                    $('#otherTrainingInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_training_title_error').removeClass('hidden');
                }

                if (!batch) {
                    $('#batch').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#batch_error').removeClass('hidden');
                }

                if (!trainingType) {
                    $('#training_type').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_type_error').removeClass('hidden');
                }

                if (!trainingCategory) {
                    $('#training_category').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_category_error').removeClass('hidden');
                }

                if (!trainingVenue) {
                    $('#training_venue').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_venue_error').removeClass('hidden');
                }

                if (!startDate) {
                    $('#start_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#start_date_error').removeClass('hidden');
                }

                if (!endDate) {
                    $('#end_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#end_date_error').removeClass('hidden');
                }
            });

            $('#training_venue').change(function() {
                var trainingVenue = $(this).val();
                if (trainingVenue !== "") {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#training_venue_error').addClass('hidden');
                }

                var trainingTitle = $('#training_title').val();
                var otherTitle = $('#otherTrainingInput').val();
                var batch = $('#batch').val();
                var trainingType = $('#training_type').val();
                var trainingCategory = $('#training_category').val();
                var mod = $('#mod').val();
                var trainingVenue = $('#training_venue').val();
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();

                var withinPhilrice = $('#withinPhilriceInput').val();
                var province = $('#province').val();
                var municipality = $('#municipalitySelect').val();

                if (!trainingTitle) {
                    $('#training_title').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_title_error').removeClass('hidden');
                }

                if (!otherTitle) {
                    $('#otherTrainingInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_training_title_error').removeClass('hidden');
                }

                if (!batch) {
                    $('#batch').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#batch_error').removeClass('hidden');
                }

                if (!trainingType) {
                    $('#training_type').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_type_error').removeClass('hidden');
                }

                if (!trainingCategory) {
                    $('#training_category').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_category_error').removeClass('hidden');
                }

                if (!mod) {
                    $('#mod').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#mod_error').removeClass('hidden');
                }

                if (!trainingVenue) {
                    $('#training_venue').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_venue_error').removeClass('hidden');
                }

                if (!startDate) {
                    $('#start_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#start_date_error').removeClass('hidden');
                }

                if (!endDate) {
                    $('#end_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#end_date_error').removeClass('hidden');
                }

                if (!withinPhilrice) {
                    $('#withinPhilriceInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#within_philrice_error').removeClass('hidden');
                }

                if (!province) {
                    $('#province').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#province_error').removeClass('hidden');
                }

                if (!municipality) {
                    $('#municipalitySelect').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#municipality_error').removeClass('hidden');
                }
            });

            $('#internationalTrainingInput').on('input', function() {
                var internationalTraining = $(this).val().trim();

                if (internationalTraining === '') {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#international_training_error').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#international_training_error').addClass('hidden');
                }

            });

            $('#withinPhilriceInput').change(function() {
                var withinPhilrice = $(this).val();
                if (withinPhilrice !== "") {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#within_philrice_error').addClass('hidden');
                }
            });

            $('#province').change(function() {
                var province = $(this).val();
                if (province !== "") {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#province_error').addClass('hidden');
                }
            });

            $('#municipalitySelect').change(function() {
                var municipality = $(this).val();
                if (municipality !== "") {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#municipality_error').addClass('hidden');
                }
            });

            $('#start_date').on('changeDate', function() {
                var startDate = $(this).val().trim();

                if (startDate === '') {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#start_date_error').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#start_date_error').addClass('hidden');
                }
            });

            $('#end_date').on('changeDate', function() {
                var endDate = $(this).val().trim();

                if (endDate === '') {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#end_date_error').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#end_date_error').addClass('hidden');
                }

                var trainingTitle = $('#training_title').val();
                var otherTitle = $('#otherTrainingInput').val();
                var batch = $('#batch').val();
                var trainingType = $('#training_type').val();
                var trainingCategory = $('#training_category').val();
                var mod = $('#mod').val();
                var trainingVenue = $('#training_venue').val();
                var startDate = $('#start_date').val();

                if (!trainingTitle) {
                    $('#training_title').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_title_error').removeClass('hidden');
                }

                if (!otherTitle) {
                    $('#otherTrainingInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_training_title_error').removeClass('hidden');
                }

                if (!batch) {
                    $('#batch').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#batch_error').removeClass('hidden');
                }

                if (!trainingType) {
                    $('#training_type').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_type_error').removeClass('hidden');
                }

                if (!trainingCategory) {
                    $('#training_category').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_category_error').removeClass('hidden');
                }

                if (!mod) {
                    $('#mod').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#mod_error').removeClass('hidden');
                }

                if (!trainingVenue) {
                    $('#training_venue').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#training_venue_error').removeClass('hidden');
                }

                if (!startDate) {
                    $('#start_date').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#start_date_error').removeClass('hidden');
                }
            });

            // Section 3
            $('#sponsor_error, #sof_error, #gik_error, #evaluation_error, #other_fund_error').addClass('hidden');

            $('#sponsor').on('input', function() {
                var sponsor = $(this).val().trim();

                if (sponsor === '') {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#sponsor_error').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#sponsor_error').addClass('hidden');
                }

                var sof = $('#source_of_fund').val();
                var otherFund = $('#otherFundInput').val();
                var gik = $('#average_gik').val();
                var evaluationInput = $('#evaluationInput').val();

                if (!sof) {
                    $('#source_of_fund').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#sof_error').removeClass('hidden');
                }

                if (!otherFund) {
                    $('#otherFundInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_fun_error').removeClass('hidden');
                }

                if (!gik) {
                    $('#average_gik').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#gik_error').removeClass('hidden');
                }

                if (!evaluationInput) {
                    $('#evaluationInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');

                    $('#evaluationOutput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#evaluation_error').removeClass('hidden');
                }
            });

            $('#source_of_fund').change(function() {
                var sof = $(this).val();
                if (sof !== "") {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#sof_error').addClass('hidden');
                }

                var otherFund = $('#otherFundInput').val();
                var sponsor = $('#sponsor').val();
                var gik = $('#average_gik').val();
                var evaluationInput = $('#evaluationInput').val();

                if (!otherFund) {
                    $('#otherFundInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_fund_error').removeClass('hidden');
                }

                if (!sponsor) {
                    $('#sponsor').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#sponsor_error').removeClass('hidden');
                }

                if (!gik) {
                    $('#average_gik').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#gik_error').removeClass('hidden');
                }

                if (!evaluationInput) {
                    $('#evaluationInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');

                    $('#evaluationOutput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#evaluation_error').removeClass('hidden');
                }
            });

            $('#otherFundInput').on('input', function() {
                var otherFund = $(this).val().trim();

                if (otherFund === '') {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_fund_error').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#other_fund_error').addClass('hidden');
                }

                var sponsor = $('#sponsor').val();
                var sof = $('#source_of_fund').val();
                var gik = $('#average_gik').val();
                var evaluationInput = $('#evaluationInput').val();

                if (!sponsor) {
                    $('#sponsor').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#sponsor_error').removeClass('hidden');
                }

                if (!sof) {
                    $('#source_of_fund').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#sof_error').removeClass('hidden');
                }

                if (!gik) {
                    $('#average_gik').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#gik_error').removeClass('hidden');
                }

                if (!evaluationInput) {
                    $('#evaluationInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');

                    $('#evaluationOutput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#evaluation_error').removeClass('hidden');
                }
            });

            $('#average_gik').on('input', function() {
                var gik = $(this).val().trim();

                if (gik === '') {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#gik_error').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#gik_error').addClass('hidden');
                }

                var sponsor = $('#sponsor').val();
                var sof = $('#source_of_fund').val();
                var otherFund = $('#otherFundInput').val();
                var evaluationInput = $('#evaluationInput').val();

                if (!sponsor) {
                    $('#sponsor').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#sponsor_error').removeClass('hidden');
                }

                if (!sof) {
                    $('#source_of_fund').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#sof_error').removeClass('hidden');
                }

                if (!otherFund) {
                    $('#otherFundInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_fund_error').removeClass('hidden');
                }

                if (!evaluationInput) {
                    $('#evaluationInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');

                    $('#evaluationOutput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#evaluation_error').removeClass('hidden');
                }
            });

            $('#average_gik').on('keypress', function(event) {
                var charCode = event.which ? event.which : event.keyCode;

                if (charCode < 48 || charCode > 57) {
                    event.preventDefault();
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#gik_error').removeClass('hidden');
                }
            });

            $('#evaluationInput').on('input', function() {
                var evaluationInput = $(this).val().trim();

                if (evaluationInput === '') {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#evaluationOutput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#evaluation_error').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#evaluationOutput').removeClass(
                            'border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#evaluation_error').addClass('hidden');
                }

                var sponsor = $('#sponsor').val();
                var sof = $('#source_of_fund').val();
                var otherFund = $('#otherFundInput').val();
                var gik = $('#average_gik').val();

                if (!sponsor) {
                    $('#sponsor').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#sponsor_error').removeClass('hidden');
                }

                if (!sof) {
                    $('#source_of_fund').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#sof_error').removeClass('hidden');
                }

                if (!otherFund) {
                    $('#otherFundInput').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#other_fund_error').removeClass('hidden');
                }

                if (!gik) {
                    $('#average_gik').removeClass(
                            'border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#gik_error').removeClass('hidden');
                }
            });

            $('#evaluationInput').on('keypress', function(event) {
                var charCode = event.which ? event.which : event.keyCode;

                // if (charCode < 48 || charCode > 57) { -- nasasama yung decimal point since character yon
                if ((charCode < 48 || charCode > 57) && charCode !== 46) {
                    event.preventDefault();
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#evaluation_error').removeClass('hidden');
                }
            });

            // Section 4
            $('#total_participants_error, #group_1_error, #group_2_error, #ip_info, #ip_info_exceeds, #pwd_info, #pwd_info_exceeds')
                .addClass('hidden');

            $('#total_participants').on('input', function() {
                var totalParticipants = $(this).val().trim();

                if (totalParticipants === '') {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#total_participants_error').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');
                    $('#total_participants_error').addClass('hidden');
                }
            });

            $('#total_participants').on('keypress', function(event) {
                var charCode = event.which ? event.which : event.keyCode;

                if (charCode < 48 || charCode > 57) {
                    event.preventDefault();
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');
                    $('#total_participants_error').removeClass('hidden');
                }

                var farmersCounter = $('#num_of_farmers_and_growers').val();
                console.log("farmers counter value on keypress: " + farmersCounter);

                // typeof farmersCounter is string
                if (farmersCounter === '0') {
                    $('#num_of_farmers_and_growers, #decrement-button1, #increment-button1').removeClass(
                            'bg-gray-50 border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#group_1_error').removeClass('hidden').addClass('text-center');
                }

                var extCounter = $('#num_of_extension_workers').val();
                if (farmersCounter === '0') {
                    $('#num_of_extension_workers, #decrement-button2, #increment-button2').removeClass(
                            'bg-gray-50 border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#group_1_error').removeClass('hidden').addClass('text-center');
                }

                var sciCounter = $('#num_of_scientific').val();
                if (sciCounter === '0') {
                    $('#num_of_scientific, #decrement-button3, #increment-button3').removeClass(
                            'bg-gray-50 border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#group_1_error').removeClass('hidden').addClass('text-center');
                }

                var otherCounter = $('#num_of_other').val();
                if (otherCounter === '0') {
                    $('#num_of_other, #decrement-button4, #increment-button4').removeClass(
                            'bg-gray-50 border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#group_1_error').removeClass('hidden').addClass('text-center');
                }

                var maleCounter = $('#num_of_male').val();
                if (maleCounter === '0') {
                    $('#num_of_male, #decrement-button5, #increment-button5').removeClass(
                            'bg-gray-50 border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#group_2_error').removeClass('hidden').addClass('text-center');
                }

                var femCounter = $('#num_of_male').val();
                if (femCounter === '0') {
                    $('#num_of_female, #decrement-button6, #increment-button6').removeClass(
                            'bg-gray-50 border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#group_2_error').removeClass('hidden').addClass('text-center');
                }

                var ipCounter = $('#num_of_indigenous').val();
                if (ipCounter === '0') {
                    $('#num_of_indigenous, #decrement-button7, #increment-button7').removeClass(
                        'bg-gray-50 border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600'
                    ).addClass('bg-green-50 border-green-600 text-green-600');
                    $('#ip_info').removeClass('hidden').addClass('text-center');
                }

                var pwdCounter = $('#num_of_pwd').val();
                if (pwdCounter === '0') {
                    $('#num_of_pwd, #decrement-button8, #increment-button8').removeClass(
                        'bg-gray-50 border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600'
                    ).addClass('bg-green-50 border-green-600 text-green-600');
                    $('#pwd_info').removeClass('hidden').addClass('text-center');
                }
            });

            calculateGroup1();

            $('#total_participants, #num_of_farmers_and_growers, #num_of_extension_workers, #num_of_scientific, #num_of_other')
                .on('input', function(event) {
                    calculateGroup1();
                });

            $('#decrement-button1, #increment-button1, #decrement-button2, #increment-button2, #decrement-button3, #increment-button3, #decrement-button4, #increment-button4')
                .on('click', function(event) {
                    calculateGroup1();
                });

            function calculateGroup1() {
                var totalParticipants = parseInt($('#total_participants').val());
                var farmersInt = parseInt($('#num_of_farmers_and_growers').val());
                var extInt = parseInt($('#num_of_extension_workers').val());
                var sciInt = parseInt($('#num_of_scientific').val());
                var otherInt = parseInt($('#num_of_other').val());

                var group1Total = farmersInt + extInt + sciInt + otherInt;

                console.log("total participants: " + totalParticipants);
                console.log("total of group 1: " + group1Total);

                if (group1Total === totalParticipants) {
                    $('#num_of_farmers_and_growers, #num_of_extension_workers, #num_of_scientific, #num_of_other')
                        .removeClass('border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600')
                        .addClass('bg-green-50 border-green-600 text-green-600');
                    $('#decrement-button1, #increment-button1, #decrement-button2, #increment-button2, #decrement-button3, #increment-button3, #decrement-button4, #increment-button4')
                        .removeClass('border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600')
                        .addClass('bg-green-50 border-green-600 text-green-600');
                    $('#group_1_error')
                        .addClass('hidden');
                } else if (group1Total > totalParticipants) {
                    $('#num_of_farmers_and_growers, #num_of_extension_workers, #num_of_scientific, #num_of_other')
                        .removeClass('border-gray-300 text-gray-900 bg-green-50 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#decrement-button1, #increment-button1, #decrement-button2, #increment-button2, #decrement-button3, #increment-button3, #decrement-button4, #increment-button4')
                        .removeClass('border-gray-300 text-gray-900 bg-green-50 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#group_1_error')
                        .removeClass('hidden');
                }
            }

            calculateGroup2();

            $('#total_participants, #num_of_male, #num_of_female')
                .on('input', function(event) {
                    calculateGroup2();
                });

            $('#decrement-button5, #increment-button5, #decrement-button6, #increment-button6')
                .on('click', function(event) {
                    calculateGroup2();
                });

            function calculateGroup2() {
                var totalParticipants = parseInt($('#total_participants').val());
                var maleInt = parseInt($('#num_of_male').val());
                var femInt = parseInt($('#num_of_female').val());

                var group2Total = maleInt + femInt;

                console.log("total participants: " + totalParticipants);
                console.log("total of group 2: " + group2Total);

                if (group2Total === totalParticipants) {
                    $('#num_of_male, #num_of_female')
                        .removeClass('border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600')
                        .addClass('bg-green-50 border-green-600 text-green-600');
                    $('#decrement-button5, #increment-button5, #decrement-button6, #increment-button6')
                        .removeClass('border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600')
                        .addClass('bg-green-50 border-green-600 text-green-600');
                    $('#group_2_error')
                        .addClass('hidden');
                } else if (group2Total > totalParticipants) {
                    $('#num_of_male, #num_of_female')
                        .removeClass('border-gray-300 text-gray-900 bg-green-50 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#decrement-button5, #increment-button5, #decrement-button6, #increment-button6')
                        .removeClass('border-gray-300 text-gray-900 bg-green-50 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#group_2_error')
                        .removeClass('hidden');
                }
            }

            checkIpCount();

            $('#total_participants, #num_of_indigenous').on('input', function(event) {
                checkIpCount();
            });

            $('#decrement-button7, #increment-button7').on('click', function(event) {
                checkIpCount();
            });

            function checkIpCount() {
                var totalParticipants = parseInt($('#total_participants').val());
                var ipInt = parseInt($('#num_of_indigenous').val());

                if (ipInt > totalParticipants) {
                    $('#num_of_indigenous')
                        .removeClass('border-gray-300 text-gray-900 bg-green-50 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#decrement-button7, #increment-button7')
                        .removeClass('border-gray-300 text-gray-900 bg-green-50 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#ip_info')
                        .addClass('hidden');
                    $('#ip_info_exceed')
                        .removeClass('hidden');
                } else if (ipInt <= totalParticipants && ipInt !== 0) {
                    $('#num_of_indigenous')
                        .removeClass('border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600')
                        .addClass('bg-green-50 border-green-600 text-green-600');
                    $('#decrement-button7, #increment-button7')
                        .removeClass('border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600')
                        .addClass('bg-green-50 border-green-600 text-green-600');
                    $('#ip_info')
                        .removeClass('hidden');
                    $('#ip_info_exceed')
                        .addClass('hidden');
                }
            }

            checkPwdCount();

            $('#total_participants, #num_of_pwd').on('input', function(event) {
                checkPwdCount();
            });

            $('#decrement-button8, #increment-button8').on('click', function(event) {
                checkPwdCount();
            });

            function checkPwdCount() {
                var totalParticipants = parseInt($('#total_participants').val());
                var pwdInt = parseInt($('#num_of_pwd').val());

                if (pwdInt > totalParticipants) {
                    $('#num_of_pwd')
                        .removeClass('border-gray-300 text-gray-900 bg-green-50 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#decrement-button8, #increment-button8')
                        .removeClass('border-gray-300 text-gray-900 bg-green-50 border-green-600 text-green-600')
                        .addClass('bg-red-50 border-red-600 text-red-600');
                    $('#pwd_info')
                        .addClass('hidden');
                    $('#pwd_info_exceed')
                        .removeClass('hidden');
                } else if (pwdInt <= totalParticipants && pwdInt !== 0) {
                    $('#num_of_pwd')
                        .removeClass('border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600')
                        .addClass('bg-green-50 border-green-600 text-green-600');
                    $('#decrement-button8, #increment-button8')
                        .removeClass('border-gray-300 text-gray-900 bg-red-50 border-red-600 text-red-600')
                        .addClass('bg-green-50 border-green-600 text-green-600');
                    $('#pwd_info')
                        .removeClass('hidden');
                    $('#pwd_info_exceed')
                        .addClass('hidden');
                }
            }

            // Section 5
            $('#photo_doc_event').change(function() {
                var photos = this.files;
                var totalSize = 0; // Variable to store the total size of uploaded photos
                var photoType;
                var maxPhotos = 10; // Define the maximum number of allowed photos
                var maxSize = 25 * 1024 * 1024; // Define the maximum total size in bytes (25MB)

                // Calculate the total size of uploaded photos
                for (var i = 0; i < photos.length; i++) {
                    totalSize += photos[i].size;
                }

                // Check if the total size exceeds the maximum limit
                if (totalSize > maxSize) {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');

                    // Display error message
                    $('#photo_doc_error').addClass('hidden');
                    $('#photo_doc_error_more_than_10').addClass('hidden');
                    $('#photo_doc_error_more_than_25mb').removeClass('hidden');
                    return; // Exit the function
                } else {
                    // Hide error message if the total size is within the limit
                    $('#photo_doc_error').addClass('hidden');
                    $('#photo_doc_error_more_than_25mb').addClass('hidden');
                    $('#photo_doc_error_more_than_10').addClass('hidden');
                }

                // Check if the number of uploaded photos exceeds the maximum limit
                if (photos.length > maxPhotos) {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');

                    // Display error message
                    $('#photo_doc_error').addClass('hidden');
                    $('#photo_doc_error_more_than_25mb').addClass('hidden');
                    $('#photo_doc_error_more_than_10').removeClass('hidden');
                    return; // Exit the function
                } else {
                    // Hide error message if the number of uploaded photos is within the limit
                    $('#photo_doc_error').addClass('hidden');
                    $('#photo_doc_error_more_than_25mb').addClass('hidden');
                    $('#photo_doc_error_more_than_10').addClass('hidden');
                }

                // Loop through each uploaded photo
                for (var i = 0; i < photos.length; i++) {
                    var photo = photos[i];
                    photoType = photo.type;

                    // Check if the file type indicates it's an image
                    if (photoType.startsWith('image/')) {
                        $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                            .addClass('border-green-600 text-green-600');
                        $('#photo_doc_error').addClass('hidden');
                    } else {
                        $('#photo_doc_error').addClass('hidden');
                        $('#photo_doc_error_more_than_25mb').addClass('hidden');
                        $('#photo_doc_error_more_than_10').addClass('hidden');
                    }
                }
            });

            $('#other_doc').change(function() {
                var files = this.files;
                var maxSize = 25 * 1024 * 1024;
                var totalSize = 0;

                for (var i = 0; i < files.length; i++) {
                    totalSize += files[i].size;
                }

                if (totalSize > maxSize) {
                    $(this).removeClass('border-gray-300 text-gray-900 border-green-600 text-green-600')
                        .addClass('border-red-600 text-red-600');

                    $('#other_doc_error').addClass('hidden');
                    $('#other_doc_error_more_than_25mb').removeClass('hidden');
                } else {
                    $(this).removeClass('border-gray-300 text-gray-900 border-red-600 text-red-600')
                        .addClass('border-green-600 text-green-600');

                    $('#other_doc_error').addClass('hidden');
                    $('#other_doc_error_more_than_25mb').addClass('hidden');
                }
            });
        });
    </script>

    {{-- Complete Working Section 4 Counter Validation --}}
    <script>
        $(document).ready(function() {
            var totalParticipantsInput = document.getElementById('total_participants');
            var remainingNumberLabel1 = document.getElementById('remaining_label_1');
            var farmers = document.getElementById('num_of_farmers_and_growers');
            var extension = document.getElementById('num_of_extension_workers');
            var scientific = document.getElementById('num_of_scientific');
            var other = document.getElementById('num_of_other');

            totalParticipantsInput.addEventListener('input', function() {
                updateRemainingParticipants1();
                updateRemainingParticipants2();
                updateRemainingParticipants3();
                updateRemainingParticipants4();
            });

            farmers.addEventListener('input', function() {
                updateRemainingParticipants1();
            });

            $('#increment-button1').click(function() {
                updateRemainingParticipants1();
            });

            $('#decrement-button1').click(function() {
                updateRemainingParticipants1();
            });

            extension.addEventListener('input', function() {
                updateRemainingParticipants1();
            });

            $('#increment-button2').click(function() {
                updateRemainingParticipants1();
            });

            $('#decrement-button2').click(function() {
                updateRemainingParticipants1();
            });

            scientific.addEventListener('input', function() {
                updateRemainingParticipants1();
            });

            $('#increment-button3').click(function() {
                updateRemainingParticipants1();
            });

            $('#decrement-button3').click(function() {
                updateRemainingParticipants1();
            });

            other.addEventListener('input', function() {
                updateRemainingParticipants1();
            });

            $('#increment-button4').click(function() {
                updateRemainingParticipants1();
            });

            $('#decrement-button4').click(function() {
                updateRemainingParticipants1();
            });

            function updateRemainingParticipants1() {
                var otherParticipants = parseInt(other.value);
                console.log("Other: " + otherParticipants);

                var sciParticipants = parseInt(scientific.value);
                console.log("Sci: " + sciParticipants);

                var extParticipants = parseInt(extension.value);
                console.log("Ext: " + extParticipants);

                var farmerParticipants = parseInt(farmers.value);
                console.log("Farmers: " + farmerParticipants);

                var totalParticipants = parseInt(totalParticipantsInput.value);
                var distributedParticipants1 = farmerParticipants + extParticipants + sciParticipants +
                    otherParticipants;

                const remainingParticipants1 = totalParticipants - distributedParticipants1;
                remainingNumberLabel1.textContent = remainingParticipants1;
            }

            var remainingNumberLabel2 = document.getElementById('remaining_label_2');
            var male = document.getElementById('num_of_male');
            var female = document.getElementById('num_of_female');

            male.addEventListener('input', function() {
                updateRemainingParticipants2();
            });

            $('#increment-button5').click(function() {
                updateRemainingParticipants2();
            });

            $('#decrement-button5').click(function() {
                updateRemainingParticipants2();
            });

            female.addEventListener('input', function() {
                updateRemainingParticipants2();
            });

            $('#increment-button6').click(function() {
                updateRemainingParticipants2();
            });

            $('#decrement-button6').click(function() {
                updateRemainingParticipants2();
            });

            function updateRemainingParticipants2() {
                var femParticipants = parseInt(female.value);
                console.log(femParticipants);

                var maleParticipants = parseInt(male.value);
                console.log(maleParticipants);

                var totalParticipants = parseInt(totalParticipantsInput.value);
                const distributedParticipants2 = maleParticipants + femParticipants;

                const remainingParticipants2 = totalParticipants - distributedParticipants2;
                remainingNumberLabel2.textContent = remainingParticipants2;
            }

            var remainingNumberLabel3 = document.getElementById('remaining_label_3');
            var ip = document.getElementById('num_of_indigenous');

            ip.addEventListener('input', function() {
                updateRemainingParticipants3();
            });

            $('#increment-button7').click(function() {
                updateRemainingParticipants3();
            });

            $('#decrement-button7').click(function() {
                updateRemainingParticipants3();
            });

            function updateRemainingParticipants3() {
                var ipParticipants = parseInt(ip.value);
                console.log(ipParticipants);
                var totalParticipants = parseInt(totalParticipantsInput.value);
                const remainingParticipants3 = totalParticipants;
                remainingNumberLabel3.textContent = remainingParticipants3;
            }

            var remainingNumberLabel4 = document.getElementById('remaining_label_4');
            var pwd = document.getElementById('num_of_pwd');

            pwd.addEventListener('input', function() {
                updateRemainingParticipants4();
            });

            $('#increment-button8').click(function() {
                updateRemainingParticipants4();
            });

            $('#decrement-button8').click(function() {
                updateRemainingParticipants4();
            });

            function updateRemainingParticipants4() {
                var pwdParticipants = parseInt(pwd.value);
                console.log(pwdParticipants);
                var totalParticipants = parseInt(totalParticipantsInput.value);
                var remainingParticipants4 = totalParticipants;
                remainingNumberLabel4.textContent = remainingParticipants4;
            }
        });
    </script>
@endsection
