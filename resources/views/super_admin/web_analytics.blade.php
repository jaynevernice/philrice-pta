@extends('layouts.dashboard')

@section('title')
    Web Analytics
@endsection

@section('sidebar')
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">

                {{-- Overview --}}
                <li>
                    <a href="{{ route('super_admin.overview') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
                        <span class="ml-3">Overview</span>
                    </a>
                </li>

                {{-- CES --}}
                <li>
                    <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
                        aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
                        <box-icon name='chevron-down'></box-icon>
                    </a>
                    <ul id="dropdown-sales" class="hidden py-2 space-y-2">
                        <li>
                            <a href="{{ route('super_admin.ces_view') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='line-chart'></box-icon>
                                <span class="ml-3">View Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('super_admin.ces_add') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='plus'></box-icon>
                                <span class="ml-3">Add Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('super_admin.ces_edit') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='edit-alt' type='solid'></box-icon>
                                <span class="ml-3">Edit Data</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- BATAC --}}
                <li>
                    <a href="{{ route('super_admin.batac') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BATAC</span>
                    </a>
                </li>

                {{-- AGUSAN --}}
                <li>
                    <a href="{{ route('super_admin.agusan') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">AGUSAN</span>
                    </a>
                </li>

                {{-- BICOL --}}
                <li>
                    <a href="{{ route('super_admin.bicol') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">BICOL</span>
                    </a>
                </li>

                {{-- ISABELA --}}
                <li>
                    <a href="{{ route('super_admin.isabela') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">ISABELA</span>
                    </a>
                </li>

                {{-- LOS BAÑOS --}}
                <li>
                    <a href="{{ route('super_admin.losbaños') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">LOS BAÑOS</span>
                    </a>
                </li>

                {{-- MIDSAYAP --}}
                <li>
                    <a href="{{ route('super_admin.midsayap') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">MIDSAYAP</span>
                    </a>
                </li>

                {{-- NEGROS --}}
                <li>
                    <a href="{{ route('super_admin.negros') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
                        <box-icon name='building' type='solid'></box-icon>
                        <span class="ml-3">NEGROS</span>
                    </a>
                </li>

                <hr>

                {{-- Manage Encoders --}}
                <li>
                    <a href="{{ route('super_admin.manage_encoders') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg hover:bg-green-100group">
                        <box-icon type='solid' name='user-account'></box-icon>
                        <span class="ml-3">Manage Encoders</span>
                    </a>
                </li>

                {{-- Manage Admins --}}
                <li>
                    <a href="{{ route('super_admin.manage_admins') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg group">
                        <box-icon type='solid' name='user-account'></box-icon>
                        <span class="ml-3">Manage Admins</span>
                    </a>
                </li>

                <hr>

                {{-- Web Analytics --}}
                <li>
                    <a href="{{ route('super_admin.web_analytics') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg bg-green-100 group">
                        <box-icon name='desktop'></box-icon>
                        <span class="ml-3">Web Analytics</span>
                    </a>
                </li>

            </ul>
        </div>

        </div>
    </aside>
@endsection

@section('content')
    <main class="p-4 mb-40 md:ml-64 h-screen pt-20">

        <div class="my-2">
            <select id="monthSelect"
                class="block appearance-none h-12 border border-gray-300 text-[#0B1215] py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">
                <option disabled selected>Select Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
        </div>

        {{-- Cards --}}
        <div class="grid grid-cols-2 gap-2">

            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 id="monthlySiteViews" class="mb-2 text-6xl font-extrabold">-</h1>
                {{-- <p class="text-gray-500 dark:text-gray-400">Site Visits for <span id="selectedMonth">Month</span></p> --}}
                <p class="text-gray-500 dark:text-gray-400">Site Visits for <span id="selectedMonth">Month</span></p>
            </div>

            <div class="bg-slate-100 shadow-lg border-2 rounded-lg h-32 flex flex-col justify-center items-center">
                <h1 id="siteViews" class="mb-2 text-6xl font-extrabold">-</h1>
                <p class="text-gray-500 dark:text-gray-400">Total Site Visits</p>
            </div>

        </div>

        {{-- Table --}}
        <div class="my-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Sector
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Purpose
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    {{-- Records from Survey --}}
                </tbody>
            </table>
        </div>

        {{-- Previous and Next Buttons for Pagination --}}
        <div class="flex justify-end mb-4">
            <div class="mr-1">
                <button id="prevButton"
                    class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    <box-icon name='chevrons-left' type='solid' color="#ffffff" class="mr-2"></box-icon>
                    Previous
                </button>
            </div>
            <div class="ml-1">
                <button id="nextButton"
                    class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Next
                    <box-icon name='chevrons-right' color="#ffffff" class="ml-2"></box-icon>
                </button>
            </div>
        </div>

    </main>
@endsection

@section('scripts')
    {{-- Fetch Total Site Views and Site Views Per Month --}}
    <script>
        $(document).ready(function() {
            function getSiteViews() {
                $.ajax({
                    url: "{{ route('fetch_site_views') }}",
                    type: 'GET',
                    success: function(response) {
                        $('#siteViews').text(response.siteViews);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Call the functions initially when the page loads
            getSiteViews();

            // Refresh site views every second
            setInterval(getSiteViews, 1000); // Adjust interval as needed
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#monthSelect').change(function() {
                var selectedMonth = $(this).val();

                $.ajax({
                    url: "{{ route('fetch_site_views') }}",
                    type: "GET",
                    data: {
                        month: selectedMonth
                    },
                    success: function(response) {
                        $('#monthlySiteViews').text(response.siteViewsPerMonth);
                        // $('#siteViews').text(response.siteViews);
                        // $('#selectedMonth').text(response.selectedMonth);
                        $('#selectedMonth').text(selectedMonth);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

    {{-- Fetch Survey Records --}}
    {{-- <script>
        $(document).ready(function() {
            function getEvaluations() {
                $.ajax({
                    url: "{{ route('fetch_survey_records') }}", // Assuming this route exists in your routes file
                    type: "GET",
                    dataType: "json",
                    // success: function(response) {
                    //     var tableBody = $('#table-body');
                    //     tableBody.empty(); // Clear existing rows

                    //     $.each(response.evaluations, function(index, data) {
                    //         var row = '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">' +
                    //             '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">' + (data.name ? data.name : "Anonymous") + '</th>' +
                    //             '<td class="px-6 py-4">' + data.sector + '</td>' +
                    //             '<td class="px-6 py-4">' + data.purpose + '</td>' +
                    //             '<td class="px-6 py-4">';
                    //         tableBody.append(row);
                    //     });
                    // },
                    success: function(response) {
                        var tableBody = $('#table-body');
                        tableBody.empty(); // Clear existing rows

                        $.each(response.evaluations.data, function(index, data) {
                            var row =
                                '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">' +
                                '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">' +
                                (data.name ? data.name : "Anonymous") + '</th>' +
                                '<td class="px-6 py-4">' + data.sector + '</td>' +
                                '<td class="px-6 py-4">' + data.purpose + '</td>' +
                                '<td class="px-6 py-4">';
                            tableBody.append(row);
                        });
                    },

                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Call the function initially when the page loads
            getEvaluations();

            // Refresh evaluations every second (adjust interval as needed)
            setInterval(getEvaluations, 1000);
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            // Variable to keep track of the current page
            let currentPage = 1;

            // Function to fetch evaluations for a specific page
            function getEvaluations(page) {
                $.ajax({
                    url: "{{ route('fetch_survey_records') }}",
                    type: "GET",
                    dataType: "json",
                    data: {
                        page: page, // Pass the current page number
                        per_page: 5 // Define the number of items per page
                    },
                    success: function(response) {
                        var tableBody = $('#table-body');
                        tableBody.empty(); // Clear existing rows

                        $.each(response.evaluations.data, function(index, data) {
                            var row =
                                '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">' +
                                '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">' +
                                (data.name ? data.name : "Anonymous") + '</th>' +
                                '<td class="px-6 py-4">' + data.sector + '</td>' +
                                '<td class="px-6 py-4">' + data.purpose + '</td>' +
                                '<td class="px-6 py-4">';
                            tableBody.append(row);
                        });

                        // Update the current page number
                        currentPage = page;

                        // Show or hide the previous button based on the current page
                        if (currentPage === 1) {
                            $('#prevButton').hide();
                        } else {
                            $('#prevButton').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Call the function initially when the page loads
            getEvaluations(currentPage);

            // Previous button click event handler
            $('#prevButton').click(function() {
                if (currentPage > 1) {
                    getEvaluations(currentPage - 1); // Fetch previous page
                }
            });

            // Next button click event handler
            $('#nextButton').click(function() {
                // Assuming you have the total number of pages available
                var totalPages = 10; // Update this with the actual total number of pages
                if (currentPage < totalPages) {
                    getEvaluations(currentPage + 1); // Fetch next page
                }
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            // Variable to keep track of the current page
            let currentPage = 1;

            // Function to fetch evaluations for a specific page
            function getEvaluations(page) {
                $.ajax({
                    url: "{{ route('fetch_survey_records') }}",
                    type: "GET",
                    dataType: "json",
                    data: {
                        page: page, // Pass the current page number
                        per_page: 5 // Define the number of items per page
                    },
                    success: function(response) {
                        var tableBody = $('#table-body');
                        tableBody.empty(); // Clear existing rows

                        $.each(response.evaluations.data, function(index, data) {
                            var row =
                                '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">' +
                                '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">' +
                                (data.name ? data.name : "Anonymous") + '</th>' +
                                '<td class="px-6 py-4">' + data.sector + '</td>' +
                                '<td class="px-6 py-4">' + data.purpose + '</td>' +
                                '<td class="px-6 py-4">';
                            tableBody.append(row);
                        });

                        // Update the current page number
                        currentPage = page;

                        // Show or hide the previous button based on the current page
                        if (currentPage === 1) {
                            $('#prevButton').hide();
                        } else {
                            $('#prevButton').show();
                        }

                        // Hide the next button if all records have been fetched
                        if (currentPage * 5 >= response.evaluations.total) {
                            $('#nextButton').hide();
                        } else {
                            $('#nextButton').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Call the function initially when the page loads
            getEvaluations(currentPage);

            // Previous button click event handler
            $('#prevButton').click(function() {
                if (currentPage > 1) {
                    getEvaluations(currentPage - 1); // Fetch previous page
                }
            });

            // Next button click event handler
            $('#nextButton').click(function() {
                // Assuming you have the total number of pages available
                var totalPages = 10; // Update this with the actual total number of pages
                if (currentPage < totalPages) {
                    getEvaluations(currentPage + 1); // Fetch next page
                }
            });
        });
    </script>
@endsection

{{-- <script>
        $(document).ready(function() {
            function fetchSiteViews(selectedMonth) {
                $.ajax({
                    url: "{{ route('fetch_site_views') }}",
                    type: "GET",
                    data: {
                        month: selectedMonth
                    },
                    success: function(response) {
                        $('#monthlySiteViews').text(response.siteViewsPerMonth);
                        $('#siteViews').text(response.siteViews);
                        $('#selectedMonth').text(response.monthName);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Fetch total site views by default
            fetchSiteViews('');
            // setInterval(fetchSiteViews, 1000);

            // Event handler for month select change
            $('#monthSelect').change(function() {
                var selectedMonth = $(this).val();
                fetchSiteViews(selectedMonth);
            });
        });
    </script> --}}

{{-- <script>
        $(document).ready(function() {
            function getSiteViews() {
                $.ajax({
                    url: "{{ route('fetch_site_view') }}",
                    type: 'GET',
                    success: function(response) {
                        $('#siteViews').text(response.siteViews);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function getMonthlySiteViews() {
                $.ajax({
                    url: "{{ route('fetch_monthly_view') }}",
                    type: 'GET',
                    success: function(response) {
                        $('#monthlySiteViews').text(response.monthlySiteViews);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Call the functions initially when the page loads
            getSiteViews();
            getMonthlySiteViews();

            // Refresh site views every second
            setInterval(getSiteViews, 1000); // Adjust interval as needed

            // Refresh monthly page views every hour (adjust interval as needed)
            setInterval(getMonthlySiteViews, 3600000);
        });
    </script> --}}
