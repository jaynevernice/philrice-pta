<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PhilRice CES Summary of Trainings Conducted</title>

    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    @vite('resources/css/app.css')

    {{-- Boxicons --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{-- Flowbite CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

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
                </ul>
            </div>
        </div>

        {{-- Section Container --}}
        <section class="w-full lg:w-4/5">

            {{-- Form Title --}}
            <h1 class="flex items-center font-sans font-bold break-normal text-gray-700 px-2 text-xl mt-12 lg:mt-0 md:text-2xl">
                PhilRice CES Summary of Trainings Conducted
			</h1>
            
            {{-- Section 1 --}}
            <hr class="bg-gray-300 my-12">

            @include('_message')

            <h2 id='section1' class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Section 1</h2>
            <div class="p-8 mt-6 lg:mt-0 leading-normal rounded shadow bg-white">
                <blockquote class="border-l-4 border-yellow-600 italic my-4 pl-8 md:pl-12">
                    Training refers to activities aimed at developing or improving the knowledge and skills of rice stakeholders wherein gain in knowledge is measured. These may be initiated or implemented by PhilRice (including RCEF and other extra core and external projects), or in partnership with other agencies and sponsors.
                    <br><br>
                    Privacy Notice: PhilRice is committed to comply with Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012 to safeguard your privacy and personal information.
                </blockquote>

                @if ($errors->any())
                    <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('trainingsform.update', $record->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-10">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
                    <input type="email" id="email" value="{{ Auth::user()->email }}" disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe@company.com" required>    
                </div>
            </div>
            
            {{-- Section 2 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">PhilRice CES Offices/Divisions</h2>
            <div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                {{-- <form> --}}
                    {{-- Offices and Division --}}
                    <div class="grid gap-6">
                        <label for="offices_and_division" class="block mb-2 text-sm font-medium text-gray-900">Offices and Divisions</label>                                               
                        <div class="relative">
                            <select id="offices_and_division" name="offices_and_division" class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" required>
                                <option selected disabled>Select</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->division }}" @if($record->division == $division->division) selected @endif >{{ $division->division }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>

            {{-- Section 3 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Training Details</h2>
            <div id='section3' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                {{-- <form> --}}
                    <div>
                        {{-- Title of Training and Type of Training --}}
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="training_title" class="block mb-2 text-sm font-medium text-gray-900">Title of Training</label>
                                <input type="text" id="training_title" name="training_title" value="{{ $record->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Title of Training" required>
                            </div>
                            <div>   
                                <label for="training_type" class="block mb-2 text-sm font-medium text-gray-900">Type of Training</label>                                               
                                <div class="relative">
                                    <select id="training_type" name="training_type" class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" required>
                                        <option selected disabled>Select</option>
                                        @foreach ($training_types as $training_type)
                                            <option value="{{ $training_type->training_type }}" @if($record->training_type == $training_type->training_type) selected @endif >{{ $training_type->training_type }}</option>
                                        @endforeach
                                        <option value="other" @if (!in_array((string)$record->training_type, $training_types->pluck('training_type')->toArray()))
                                            selected
                                        @endif >Other</option>
                                    </select>
                                    <input type="text" name="other_trainingType" id="other_trainingType" value="{{ $record->training_type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" style="display: none;">
                                </div>
                            </div>
                        </div>
                        
                        {{-- Training Style/Format --}}
                        <label for="training_style" class="block mb-2 text-sm font-medium text-gray-900">Training Style/Format</label>    
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div class="flex items-center ps-4 border border-gray-200 rounded">
                                <input id="bordered-radio-1" type="radio" value="Face-to-Face" @if($record->training_style =='Face-to-Face') checked @endif name="training_style_group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" required>
                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Face-to-Face</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded">
                                <input id="bordered-radio-2" type="radio" value="Online" @if($record->training_style =='Online') checked @endif name="training_style_group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Online</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded">
                                <input id="bordered-radio-3" type="radio" value="Blended (Online + Face-to-Face)" @if($record->training_style =='Blended (Online + Face-to-Face)') checked @endif name="training_style_group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="bordered-radio-3" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Blended (Online + Face-to-Face)</label>
                            </div>
                        </div>

                        {{-- Start Date and End Date --}}
                        <div class="grid gap-6 md:grid-cols-2">
                            <div class=" gap-6 mb-6">                   
                                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">Start Date</label>     
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                    </div>
                                    <input datepicker type="text" name="start_date" value="{{ \Carbon\Carbon::parse($record->start_date)->format('m-d-Y') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select start date" required>
                                </div>
                            </div>
                            <div class="gap-6 mb-6">                   
                                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900">End Date</label>     
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                    </div>
                                    <input datepicker type="text" name="end_date" value="{{ \Carbon\Carbon::parse($record->end_date)->format('m-d-Y') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select end date" required>
                                </div>
                            </div>
                        </div>

                        {{-- Venue --}}
                        <label for="venue" class="block mb-2 text-sm font-medium text-gray-900">Venue</label>    
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div class="flex items-center ps-4 border border-gray-200 rounded">
                                <input id="bordered-radio-5" type="radio" value="Within PhilRice station" name="venue_group" @if($record->venue =='Within PhilRice station') checked @endif class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" required>
                                <label for="bordered-radio-5" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Within PhilRice station</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded">
                                <input id="bordered-radio-6" type="radio" value="Local (but outside PhilRice station)" name="venue_group" @if($record->venue =='Local (but outside PhilRice station)') checked @endif class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="bordered-radio-6" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Local (but outside PhilRice station)</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded">
                                <input id="bordered-radio-7" type="radio" value="International" name="venue_group" @if($record->venue =='International') checked @endif class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="bordered-radio-7" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">International</label>
                            </div>
                        </div>           
                    </div>                   
                {{-- </form> --}}
            </div>
        
            {{-- Section 4 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Local Venue (but outside station)</h2>
            <div id='section4' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                {{-- <form> --}}
                    {{-- Province and Municipality --}}
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="province" class="block mb-2 text-sm font-medium text-gray-900">Province</label>    
                            <div class="relative">
                                <select id="province" name="province" class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                                    <option selected disabled>Select</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->province_name }}" @if($record->province == $province->province_name) selected @endif >{{ $province->province_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">City/Municipality</label>
                            <input type="text" id="city" name="city" value="{{ $record->municipality }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="City/Municipality">
                        </div>
                    </div>
                {{-- </form> --}}
            </div>

            {{-- Section 5 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">International Venue</h2>
            <div id='section5' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                
                {{-- Country and State/City/Province --}}
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900">Country</label>
                        <input type="text" id="country" name="country" value="{{ $record->country }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Country" >
                    </div>
                    <div>
                        <label for="state" class="block mb-2 text-sm font-medium text-gray-900">State/City/Province</label>
                        <input type="text" id="state" name="state" value="{{ $record->state }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="State/City/Province" >
                    </div>
                </div>
            </div>

            {{-- Section 6 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Conduct of Training</h2>
            <div id='section6' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                {{-- Name of Implementing Partner/s or Co-Organizer/s --}}
                <div class="gap-6 mb-6">
                    <div>
                        <label for="sponsor" class="block mb-2 text-sm font-medium text-gray-900">Name of Implementing Partner/s or Co-Organizer/s</label>
                        <p class="text-sm text-gray-500 mb-2">Specify name of partner, sponsor, or co-organizer. If more than one, separate with comma. If no co-implementer write NONE.</p>
                        <input type="text" id="sponsor" name="sponsor" value="{{ $record->sponsor }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Name of Implementing Partner/s or Co-Organizer/s" required>
                    </div>
                </div>

                {{-- Average Gain in Knowledge (GIK) --}}
                <div class="gap-6 mb-6">
                    <div>
                        <label for="average_gik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Average Gain in Knowledge (GIK)</label>
                        <input type="number" id="average_gik" name="average_gik" value="{{ $record->average_gik }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                </div>

                {{-- Source of Fund --}}
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="source_of_fund" class="block mb-2 text-sm font-medium text-gray-900">Source of Fund</label>    
                        <p class="text-sm text-gray-500 mb-2">Specify source of fund for conduct of training</p>
                        <div class="relative">
                            <select id="source_of_fund" name="source_of_fund" class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" required>
                                <option selected disabled>Select</option>
                                @foreach ($funds as $fund)
                                    <option value="{{ $fund->fund }}" @if($record->fund == $fund->fund) selected @endif >{{ $fund->fund }}</option>
                                @endforeach
                                <option value="other" @if (!in_array((string)$record->fund, $funds->pluck('fund')->toArray()))
                                    selected
                                @endif >Other</option>
                            </select>
                            <input type="text" name="other_fund" id="other_fund" value="{{ $record->fund }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" style="display: none;">
                        </div>
                    </div>
                    <div>
                        <label for="evaluation" class="block mb-2 text-sm font-medium text-gray-900">Overall Training Evaluation Rating</label>
                        <p class="text-sm text-gray-500 mb-2">Write numerical score(average) and its corresponding rating</p>
                        <input type="text" id="evaluation" name="evaluation" value="{{ $record->evaluation }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="4.8 = Excellent" required>
                    </div>
                </div>
            </div>

            
            {{-- Section 7 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Participant's Profile 1</h2>
            <div id='section7' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                {{-- Participants --}}
                <div class="mb-10">
                    <label for="classification_of_participants" class="block mb-2 text-sm font-medium text-gray-900">Participants</label>  
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        @foreach ($participants as $participant)
                            <div class="flex items-center me-4">
                                <input id="inline-checkbox" type="checkbox" value="{{ $participant->classification }}" name="participants[]" @foreach($participants_cb as $check_single) @if($check_single == $participant->classification) checked @endif @endforeach class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900">{{ $participant->classification }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2"> 
                    <div>
                        <label for="num_of_participants" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Number of Participants</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="num_of_participants" name="num_of_participants" value="{{ $record->num_of_participants }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="num_of_farmers_and_growers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Of the total number, how many are farmers and seed growers</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="num_of_farmers_and_growers" name="num_of_farmers_and_growers" value="{{ $record->num_of_farmers }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="num_of_extension_workers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Of the total number, how many are extension workers and intermediaries (ATs/AEWs, AgRiDOCs, etc.)</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="num_of_extension_workers" name="num_of_extension_workers" value="{{ $record->num_of_extworkers }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="num_of_scientific_com" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Of the total number, how many are members of the scientific community (researchers, academe)</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="num_of_scientific_com" name="num_of_scientific_com" value="{{ $record->num_of_scientific }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                </div>
                <div>
                    <label for="num_of_other_participants" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total number of other participants from other sectors (rice industry players, media, policymakers, general rice consumers)</label>
                    <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                    <input type="number" id="num_of_other_participants" name="num_of_other_participants" value="{{ $record->num_of_other_sectors }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                </div>
            </div>

            {{-- Section 8 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Participant's Profile 2</h2>
            <div id='section8' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="grid gap-6 mb-6 md:grid-cols-2"> 
                    <div>
                        <label for="num_of_male" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Male Participants</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="num_of_male" name="num_of_male" value="{{ $record->num_of_male }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="num_of_female" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Female Participants</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="num_of_female" name="num_of_female" value="{{ $record->num_of_female }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="num_of_indigenous" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Indigenous People</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="num_of_indigenous" name="num_of_indigenous" value="{{ $record->num_of_indigenous }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                    <div>
                        <label for="num_of_pwd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of PWD</label>
                        <p class="text-sm text-gray-500 mb-6">If exact number is unknown, make rough estimate</p>
                        <input type="number" id="num_of_pwd" name="num_of_pwd" value="{{ $record->num_of_pwd }}" min="0" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="50" required />
                    </div>
                </div>
            </div>

            @php
                $images = explode('|', $record->image);
                $files = explode('|', $record->file);
                // $check_me = explode(',', $record->check_me);
            @endphp

            {{-- Section 9 --}}
            <hr class="bg-gray-300 my-12">
            <h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Documentation</h2>
            <div id='section9' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div class="mb-6">                        
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo_doc_event">Photo documentation of event/activity</label>
                    <p class="text-sm text-gray-500 mb-6">Upload up to 10 clear photo highlights of the training conducted. Ensure that photo files have been named properly before uploading using the Station_typeoftraining_site format (e.g. Batac_FFS_Piddig)</p>
                    <input id="photo_doc_event" name="photo_doc_event[]" accept="image/png, image/gif, image/jpeg" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" multiple>
                    @foreach ($images as $image)
                        <a href="{{ URL::to('public/images/' . $image) }}" target="_blank" >{{ $image }},</a>
                    @endforeach
                </div>
                <div class="mb-6">                        
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="other_doc">Other forms of documentation</label>
                    <p class="text-sm text-gray-500 mb-6">You may upload other forms of training documentation such as attendance/registration sheet, copy of event program, short video or audio clip, and other relevant documents, spreadsheet, or PDF file.</p>
                    <input id="other_doc" name="other_doc[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" multiple>
                    @foreach ($files as $file)
                        <a href="{{ URL::to('public/files/' . $file) }}" download="{{ 'public/files/' . $file }}">{{ $file }},</a>
                    @endforeach
                </div>

                {{-- </form> --}}
            </div>



        </section>

        {{-- Back Link --}}
        <div class="w-full lg:w-4/5 lg:ml-auto text-base md:text-sm text-gray-600 px-4 py-24 mb-12 flex items-center justify-between">
            <span class="text-base text-yellow-600 font-bold">&lt;</span> 
            <a 
                @if(Auth::user()->user_type == 'encoder') href="{{ route('encoder.ces_view') }}" @endif 
                class="text-base md:text-sm text-yellow-600 font-bold no-underline hover:underline mr-auto">Go back to home</a>
            
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                <box-icon name='send' color="#ffffff"></box-icon>
                Save
            </button>
        </div>

                </form>
    </div>

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // training_type
        // other_trainingType
        // other
        const selectElement = document.getElementById("training_type");
        const otherTrainingType = document.getElementById("other_trainingType");
        const otherOption = selectElement.querySelector('option[value="other"]');

        // Function to toggle the display of the custom occupation input field
        function toggleCustomInputDisplay() {
            otherTrainingType.style.display = selectElement.value === "other" ? "block" : "none";
        }

        // Event listener for the change event on the select element
        selectElement.addEventListener("change", function() {
            toggleCustomInputDisplay();
        });

        // Event listener for the input event on the custom occupation input field
        otherTrainingType.addEventListener("input", function() {
            const otherValue = otherTrainingType.value.trim();
            otherOption.textContent = otherValue || "Other";
            otherOption.value = otherValue || "other";
        });

        // Initial call to toggleCustomInputDisplay to ensure correct initial display state
        toggleCustomInputDisplay();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // source_of_fund
        // other_fund
        // other
        const selectElement = document.getElementById("source_of_fund");
        const otherFund = document.getElementById("other_fund");
        const otherOption = selectElement.querySelector('option[value="other"]');

        // Function to toggle the display of the custom occupation input field
        function toggleCustomInputDisplay() {
            otherFund.style.display = selectElement.value === "other" ? "block" : "none";
        }

        // Event listener for the change event on the select element
        selectElement.addEventListener("change", function() {
            toggleCustomInputDisplay();
        });

        // Event listener for the input event on the custom occupation input field
        otherFund.addEventListener("input", function() {
            const otherValue = otherFund.value.trim();
            otherOption.textContent = otherValue || "Other";
            otherOption.value = otherValue || "other";
        });

        // Initial call to toggleCustomInputDisplay to ensure correct initial display state
        toggleCustomInputDisplay();
    });
</script>

</body>
</html>