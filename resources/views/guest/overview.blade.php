@extends('layouts.dashboard')

@section('title')
    Overview
@endsection

<style>
    /* Animation for the modal */
    @keyframes shake {
        0% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-5px);
        }

        50% {
            transform: translateX(5px);
        }

        75% {
            transform: translateX(-5px);
        }

        100% {
            transform: translateX(0);
        }
    }

    .shake {
        animation: shake 0.5s;
    }

    /* Animation for the emojis */
    .emoji-carousel {
        overflow: hidden;
    }

    .emoji-item {
        transition: transform 0.5s;
    }

    .animate {
        animation: none !important;
        transform: translateX(-100%);
        animation: carousel 10s linear infinite;
        /* Adjust the timing as needed */
    }

    .center-emoji {
        transform: scale(1.5);
        /* Increase size of center emoji */
        z-index: 1;
        /* Ensure center emoji is on top */
    }

    @keyframes carousel {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }
</style>

@section('sidebar')
    {{-- Sidebar --}}
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">

                {{-- Overview --}}
                <li>
                    <a href="{{ route('guest.overview') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg bg-green-100 dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
                        <span class="ml-3">Overview</span>
                    </a>
                </li>

                {{-- CES --}}
                <li>
                    <a href="{{ route('guest.ces') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">CES</span>
                    </a>
                </li>

                {{-- AGUSAN --}}
                <li>
                    <a href="{{ route('guest.agusan') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">AGUSAN</span>
                    </a>
                </li>

                {{-- BATAC --}}
                <li>
                    <a href="{{ route('guest.batac') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BATAC</span>
                    </a>
                </li>

                {{-- BICOL --}}
                <li>
                    <a href="{{ route('guest.bicol') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BICOL</span>
                    </a>
                </li>

                {{-- ISABELA --}}
                <li>
                    <a href="{{ route('guest.isabela') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">ISABELA</span>
                    </a>
                </li>

                {{-- LOS BAÑOS --}}
                <li>
                    <a href="{{ route('guest.losbaños') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">LOS BAÑOS</span>
                    </a>
                </li>

                {{-- MIDSAYAP --}}
                <li>
                    <a href="{{ route('guest.midsayap') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">MIDSAYAP</span>
                    </a>
                </li>

                {{-- NEGROS --}}
                <li>
                    <a href="{{ route('guest.negros') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">NEGROS</span>
                    </a>
                </li>

            </ul>
        </div>
        </div>
    </aside>
@endsection

@section('content')
    {{-- Main Content --}}
    <main class="p-4 md:ml-64 h-screen pt-20">

        {{-- Filters and Export --}}
        <div class="flex my-4">

            {{-- Year --}}
            <div class="mr-2">
                <select name="year"
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="yearSelect">
                    <option selected>Year</option>
                    <option>2024</option>
                    {{-- <option value="" selected>All Year</option>
                    @for ($year = date('Y'); $year >= 1990; $year--)
                        <option value="{{ $year }}" @if ($year == date('Y'))  @endif>
                            {{ $year }}
                        </option>
                    @endfor --}}
                </select>
            </div>

            {{-- From --}}
            <div class="mx-2">
                <select name="quarter"
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="quarterSelect">
                    <option selected>From</option>
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                </select>
            </div>


            {{-- To --}}
            <div class="mx-2">
                <select name="quarter"
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="quarterSelect">
                    <option selected>To</option>
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                </select>
            </div>

            {{-- Form --}}
            <div class="mx-2 mr-auto">
                <select
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="form">
                    <option selected>Form Type</option>
                    <option>Summary of Trainings Conducted</option>
                </select>
            </div>
        </div>

        {{-- Chart Row 1 --}}
        <div class="grid grid-cols-3 gap-4 mb-4 max-[1024px]:grid-cols-1">
            {{-- Total Number of Participants --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 class="mb-2 text-6xl font-extrabold">1973</h1>
                <p class="text-gray-500 dark:text-gray-400">Total Number of Participants</p>
            </div>

            {{-- Average Gain in Knowledge --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 class="mb-2 text-6xl font-extrabold">69.69%</h1>
                <p class="text-gray-500 dark:text-gray-400">Average Gain in Knowledge (GIK)</p>
            </div>

            {{-- Overall Training Evaluation Rating --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 class="mb-2 text-6xl font-extrabold">4.93</h1>
                <p class="font-bold text-gray-500 dark:text-gray-400">Excellent</p>
                <p class="text-gray-500 dark:text-gray-400">Overall Training Evaluation Rating</p>
            </div>
        </div>

        {{-- Chart Row 2 --}}
        <div class="grid grid-cols-3 gap-4 mb-4 max-[1024px]:grid-cols-1">
            {{-- Sex Distribution --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-auto flex flex-col justify-center items-center">
                <div id="sexChart"></div>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Breakdown of Participants by Sex</p>
            </div>
            {{-- IP Distribution --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lgh-auto flex flex-col justify-center items-center">
                <div id="ipChart"></div>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Breakdown of Participants by Indigenous Identity</p>
            </div>
            {{-- PWD Distribution --}}
            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-auto flex flex-col justify-center items-center">
                <div id="pwdChart"></div>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Breakdown of Participants by Ability Status</p>
            </div>
        </div>
    </main>

    <!-- Main modal -->
    <div id="evaluation-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 overflow-hidden flex items-center justify-center bg-black bg-opacity-50">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center p-4 md:p-5 border-b rounded-t">
                    <i class="fa-solid fa-comments"></i>
                    <h3 class="text-lg font-semibold text-[#0B1215] ml-2">
                        Feedback
                    </h3>
                </div>

                <div class="items-center justify-center mx-2 mt-2 px-4 pt-4">
                    <h3
                        class="mb-2 text-3xl font-extrabold leading-none tracking-tight text-center text-gray-900 dark:text-white">
                        Thanks for visiting us!</h3>
                    <p class="text-xs font-normal text-gray-500 dark:text-gray-400 text-balance text-center">We appreciate
                        your time. Please take just 2 minutes to complete our evaluation form.</p>


                    {{-- Group of Emojis --}}
                    <div class="flex items-center justify-center mt-4 emoji-carousel" id="emojiCarousel">
                        <div class="relative emoji-item">
                            <div class="flex items-center justify-center bg-gray-300 rounded-full w-12 h-12 mx-2">
                                <span id="emojiSpan" class="text-4xl flex items-center justify-center mb-1">😨</span>
                                <div id="emojiDim" class="absolute bg-gray-200 opacity-50 rounded-full w-12 h-12"></div>
                            </div>
                        </div>

                        <div class="relative emoji-item">
                            <div class="flex items-center justify-center bg-gray-300 rounded-full w-12 h-12 mx-2">
                                <span id="emojiSpan" class="text-4xl flex items-center justify-center mb-1">😔</span>
                                <div id="emojiDim" class="absolute bg-gray-200 opacity-50 rounded-full w-12 h-12"></div>
                            </div>
                        </div>

                        {{-- Center --}}
                        <div class="relative emoji-item">
                            <div id="emojiContainer" class="flex items-center justify-center bg-gray-300 rounded-full w-20 h-20 mx-2">
                                <span id="emojiSpan" class="text-6xl flex items-center justify-center mb-2">😌</span>
                                <div id="emojiDim" class=""></div>
                                {{-- <i class="fa-regular fa-face-laugh-beam"></i>1 --}}
                            </div>
                        </div>
                        

                        <div class="relative emoji-item">
                            <div id="emojiContainer" class="flex items-center justify-center bg-gray-300 rounded-full w-12 h-12 mx-2">
                                <span id="emojiSpan" class="text-4xl flex items-center justify-center mb-1">😄</span>
                                <div id="emojiDim" class="absolute bg-gray-200 opacity-50 rounded-full w-12 h-12"></div>
                            </div>
                        </div>

                        <div class="relative emoji-item">
                            <div id="emojiContainer" class="flex items-center justify-center bg-gray-300 rounded-full w-12 h-12 mx-2">
                                <span id="emojiSpan" class="text-4xl flex items-center justify-center mb-1">🤩</span>
                                <div id="emojiDim" class="absolute bg-gray-200 opacity-50 rounded-full w-12 h-12"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Modal body -->
                <form id="evaluationForm" class="px-4 pb-4" action="{{ route('evaluation.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">

                        {{-- Name --}}
                        <div class="mb-4">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        {{-- Sex --}}
                        {{-- <div class="mb-4">
                            <label for="sex" class="block mb-2 text-sm font-medium text-gray-900">Sex</label>
                            <select name="sex"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected>Select your sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div> --}}

                        {{-- Sector --}}
                        <div class="mb-4">
                            <label for="sector" class="block mb-2 text-sm font-medium text-gray-900">Sector</label>
                            <select name="sector"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected>Select your sector</option>
                                <option value="Farmers and Seed Growers">Farmers and Seed Growers</option>
                                <option value="Extension Workers and Intermediaries">Extension Workers and
                                    Intermediaries
                                </option>
                                <option value="Scientific Community">Scientific Community</option>
                                <option value="Other">Other (rice industry players, media, policymakers, general rice
                                    consumers)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose
                                <span class="text-gray-600 italic">(optional)</span></label>
                            <textarea name="purpose" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="What brings you here on our website today?"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" id="submitBtn"
                            class="text-white inline-flex items-center bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection


@section('charts')
@endsection

@section('scripts')
    {{-- Emoji Carousel --}}
    <script>
    // Function to rotate the carousel
    function rotateCarousel() {
        const carousel = document.getElementById('emojiCarousel');
        const emojiItems = carousel.getElementsByClassName('emoji-item');
        const emojiContainer = document.getElementById('emojiContainer');
        const emojiSpan = document.getElementById('emojiSpan');
        const emojiDim = document.getElementById('emojiDim');

        // Get the first item and move it to the end
        const firstItem = emojiItems[0];
        carousel.appendChild(firstItem);

        // Reset animation by removing and adding class
        firstItem.classList.remove('animate');
        void firstItem.offsetWidth; // Trigger reflow
        firstItem.classList.add('animate');

        // Check if the first item is now the center item
        const centerIndex = Math.floor(emojiItems.length / 2);
        for (let i = 0; i < emojiItems.length; i++) {
            if (i === centerIndex) {
                // emojiItems[i].classList.add('emoji-item');
                // emojiItems[i].classList.remove('relative');
                // emojiContainer.classList.remove('w-12 h-12');
                // emojiContainer.classList.add('w-20 h-20');
                // emojiSpan.classList.remove('text-4xl');
                // emojiSpan.classList.add('text-6xl');
                // emojiDim.classList.add('hidden');
                emojiDim.classList.remove('absolute bg-gray-200 opacity-50 rounded-full w-20 h-20');
            } else {
                // emojiItems[i].classList.add('relative');
                // emojiItems[i].classList.remove('emoji-item');
                emojiContainer.classList.remove('w-20 h-20');
                emojiContainer.classList.add('w-12 h-12');
                emojiSpan.classList.remove('text-6xl');
                emojiSpan.classList.add('text-4xl');
                emojiDim.classList.add('absolute bg-gray-200 opacity-50 rounded-full w-20 h-20');
            }
        }
    }

    // Rotate the carousel every 2.5 seconds (adjust as needed)
    setInterval(rotateCarousel, 2500);
</script>



    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     // Get the modal element
        //     var modal = document.getElementById("evaluation-modal");

        //     // Display the modal
        //     modal.classList.remove("hidden");

        //     window.onclick = function(event) {
        //         if (event.target == modal) {
        //             modal.classList.add('shake');
        //             setTimeout(function() {
        //                 modal.classList.remove('shake');
        //             }, 500); // Adjust the duration to match the animation duration
        //         }
        //     }
        // });

        document.addEventListener("DOMContentLoaded", function() {
            // Check if the modal has been shown before
            var modalShown = localStorage.getItem("modalShown");

            if (!modalShown) {
                // Get the modal element
                var modal = document.getElementById("evaluation-modal");

                // Display the modal
                modal.classList.remove("hidden");

                // Set a flag in localStorage indicating that the modal has been shown
                localStorage.setItem("modalShown", "true");

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.classList.add('shake');
                        setTimeout(function() {
                            modal.classList.remove('shake');
                        }, 500); // Adjust the duration to match the animation duration
                    }
                }
            }
        });
    </script>
@endsection

@section('alerts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to the save button
            document.getElementById('submitBtn').addEventListener('click', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Confirm Submission',
                    text: 'Are you sure you want to save your evaluation?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, submit it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Submit Successful!",
                            text: "Your evaluation has been submitted successfully.",
                            icon: "success",
                            confirmButtonText: 'Nice!'
                        }).then(() => {
                            document.getElementById('evaluationForm').submit();

                            var modal = document.getElementById("evaluation-modal");
                            modal.classList.add('hidden');
                        })
                    }
                });
            });
        });
    </script>
@endsection
