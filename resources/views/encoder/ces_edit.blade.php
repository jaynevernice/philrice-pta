@extends('layouts.dashboard')

@section('title')
    {{-- <title>Encoder Overview</title> --}}
    {{-- PhilRice CES - Summary of Trainings ({{ date('Y') }}) --}}
    PhilRice CES | Edit Data
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
                    <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group bg-green-100 hover:bg-green-100 dark:text-white dark:hover:bg-green-700"
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
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
                                <box-icon name='plus'></box-icon>
                                <span class="ml-3">Add Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('encoder.ces_edit') }}"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg bg-green-100 transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
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
    <main class="p-4 md:ml-64 h-screen pt-20">

        {{-- Station --}}
        <div class="flex">
            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-4xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PhilRice</span>
                Central Experimental Station</h1>
        </div>

        {{-- Filters and Export --}}
        <div class="flex my-4">

            {{-- Year --}}
            <div class="mr-2">
                <select name="year"
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="yearSelect">
                    {{-- <option selected>Year</option>
                    <option>2024</option> --}}
                    <option value="" selected>All Year</option>
                    @for ($year = date('Y'); $year >= 1990; $year--)
                        <option value="{{ $year }}" @if ($year == date('Y'))  @endif>
                            {{ $year }}
                        </option>
                    @endfor
                </select>
            </div>

            {{-- From --}}
            <div class="mx-2">
                <select name="quarter"
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="start_MonthSelect">
                    <option value="" selected>From</option>
                    <option value="1" >January</option>
                    <option value="2" >February</option>
                    <option value="3" >March</option>
                    <option value="4" >April</option>
                    <option value="5" >May</option>
                    <option value="6" >June</option>
                    <option value="7" >July</option>
                    <option value="8" >August</option>  
                    <option value="9" >September</option>
                    <option value="10" >October</option>
                    <option value="11" >November</option>
                    <option value="12" >December</option>
                </select>
            </div>


            {{-- To --}}
            <div class="mx-2">
                <select name="quarter"
                    class="block appearance-none w-full h-12 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm"
                    id="end_MonthSelect">
                    <option value="" selected>To</option>
                    <option value="1" >January</option>
                    <option value="2" >February</option>
                    <option value="3" >March</option>
                    <option value="4" >April</option>
                    <option value="5" >May</option>
                    <option value="6" >June</option>
                    <option value="7" >July</option>
                    <option value="8" >August</option>  
                    <option value="9" >September</option>
                    <option value="10" >October</option>
                    <option value="11" >November</option>
                    <option value="12" >December</option>
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

            {{-- Search --}}
            <div class="mr-2">
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="trainingsSearch"
                        class="h-12 block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search">
                </div>
            </div>
        </div>

        @include('_message')

        {{-- Table --}}
        <div id="custom_table" class="my-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table id="table_data" data-page-length='5'
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Title of Training
                                {{-- <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                        </svg></a> --}}
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Office
                                {{-- <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                        </svg></a> --}}
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Date
                                {{-- <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                        </svg></a> --}}
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Venue
                                {{-- <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                        </svg></a> --}}
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Location
                                {{-- <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                        </svg></a> --}}
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Participants
                                {{-- <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                        </svg></a> --}}
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Date Encoded
                                {{-- <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                        </svg></a> --}}
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                                Actions
                                {{-- <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                        </svg></a> --}}
                        </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    {{-- @foreach ($records as $key => $record)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{ ($records->currentPage() - 1) * $records->perPage() + $loop->iteration }}
                    1
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">
                    {{ $record->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $record->division }}
                </td>
                <td class="px-6 py-4">
                    {{ $record->start_date }} - {{ $record->end_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $record->venue }}
                </td>
                <td class="px-6 py-4">
                    @if (!empty($record->province && $record->municipality))
                      {{ $record->province }}, {{ $record->municipality }}
                    @else
                      {{ $record->state }}, {{ $record->country }}
                    @endif
                </td>
                <td style="text-align: left;" >
                    {{ $record->num_of_participants }}
                </td>
                <td style="text-align: left;" >
                    {{ \Carbon\Carbon::parse($record->created_at)->format('Y-m-d') }}
                </td>
                <td class="px-6 py-4 text-left">
                    <a href="#" target="_blank">
                        <button type="button" class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <box-icon name='expand-alt' size="xs"></box-icon>
                            <span class="sr-only">Edit</span>
                        </button>
                    </a>
                    <a href="{{ route('trainingsform.edit', $record->id) }}">
                      <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                    </a>
                    <form action="{{ route('trainingsform.delete', $record->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure to delete?')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </form>
                </td>
            </tr>
          @endforeach --}}
                </tbody>
            </table>
        </div>

        {{-- Previous and Next Buttons for Pagination --}}
        <div class="flex justify-end">
            <div>
                <button id="prevButton" onclick="prevPage()"
                    class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    <box-icon name='chevrons-left' type='solid' color="#ffffff" class="mr-2"></box-icon>
                    Previous
                </button>
            </div>
            <div class="ml-1">
                <button id="nextButton" onclick="nextPage()"
                    class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Next
                    <box-icon name='chevrons-right' color="#ffffff" class="ml-2"></box-icon>
                </button>
            </div>
        </div>

        {{-- <div class="pagination-container">
      <ul class="pagination flex list-none justify-center">
        {!! $records->links() !!}
      </ul>
  </div> --}}

    </main>
@endsection

@section('charts')
    {{-- <script>
    // Chart 1
  var pie = {
          series: [44, 55, 13, 43, 22],
          chart: {
          width: 300,
          type: 'pie',
          toolbar: {
            show: true,
          },
      },

      title: {
          text: 'Chart Title',
          align: 'center',
          margin: 10,
          offsetX: 0,
          offsetY: 0,
          floating: false,
          style: {
            fontSize:  '14px',
            fontWeight:  'bold',
            fontFamily:  undefined,
            color:  '#263238'
          },
      },
      
      labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],

      responsive: [{
          breakpoint: 480,
          options: {
              chart: {
                  width: 200
              },
              legend: {
                  position: 'bottom'
              }
          }
      }],

      legend: {
          show: false
      }
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), pie);
    chart.render();


  //   Chart 2
  var polar = {
      series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
      chart: {
          width: 300,
          type: 'polarArea',
      },

      title: {
          text: 'Chart Title',
          align: 'center',
          margin: 10,
          offsetX: 0,
          offsetY: 0,
          floating: false,
          style: {
            fontSize:  '14px',
            fontWeight:  'bold',
            fontFamily:  undefined,
            color:  '#263238'
          },
      },

      stroke: {
          colors: ['#fff']
      },

      fill: {
          opacity: 0.8
      },

      responsive: [{
          breakpoint: 480,
          options: {
              chart: {
                  width: 200
              },
              legend: {
                  position: 'bottom'
              }
          }
      }], 

      legend: {
          show: false
      },    


    };

    var chart = new ApexCharts(document.querySelector("#chart2"), polar);
    chart.render();

  //   Chart 3
  var spline = {
      series: [{
        name: 'series1',
        data: [31, 40, 28, 51, 42, 109, 100]
      }, {
        name: 'series2',
        data: [11, 32, 45, 32, 34, 52, 41]
      }],
      chart: {
        height: 240,
        type: 'area',
        toolbar: {
          show: false,
        },
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth'
      },
      xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
      },
      tooltip: {
        x: {
          format: 'dd/MM/yy HH:mm'
        }
      }
    };
    
    var chart = new ApexCharts(document.querySelector("#chart3"), spline);
    chart.render();
    

  //   Chart 4
  var line = {
      series: [
        {
          name: "High - 2013",
          data: [28, 29, 33, 36, 32, 32, 33]
        },
        {
          name: "Low - 2013",
          data: [12, 11, 14, 18, 17, 13, 13]
        }
      ],
      chart: {
        height: 240,
        type: 'line',
        dropShadow: {
          enabled: true,
          color: '#000',
          top: 18,
          left: 7,
          blur: 10,
          opacity: 0.2
        },
        toolbar: {
          show: false
        }
      },
      colors: ['#77B6EA', '#545454'],
      dataLabels: {
        enabled: true,
      },
      stroke: {
        curve: 'smooth'
      },
      grid: {
        borderColor: '#e7e7e7',
        row: {
          colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.5
        },
      },
      markers: {
        size: 1
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        title: {
          text: 'Month'
        }
      },
      yaxis: {
        title: {
          text: 'Temperature'
        },
        min: 5,
        max: 40
      },
      legend: {
        position: 'top',
        horizontalAlign: 'right',
        floating: true,
        offsetY: -25,
        offsetX: -5
      }
    };
    
    var chart = new ApexCharts(document.querySelector("#chart4"), line);
    chart.render();
    
  </script> --}}
@endsection

@section('datatable')
    <script>
        // CES
        let station = 'CES';
        let currentPage = 1;
        const recordsPerPage = 5; // Change this number according to your preference

        $(document).ready(function() {
            loadTrainings(currentPage);
        });

        function showTrainings(result) {
            // const tableBody = $('#table-body');

            var datas = result;
            var tableRow = ``;

            datas.forEach(function (data) {
                // console.log(data["id"]);
                tableRow +=
                    `
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">` + data["title"] + `</th>
                        <td class="px-6 py-4">` + data["division"] + `</td>
                        <td class="px-6 py-4">` + formatDate(data["start_date"]) + ` - ` + formatDate(data["end_date"]) + `</td>
                        <td class="px-6 py-4">` + data["venue"] + `</td>
                        <td class="px-6 py-4">` + (data["municipality"] || data["state"]) + `, ` + (data["province"] || data["country"]) + `</td>
                        <td class="px-6 py-4">` + data["num_of_participants"] + `</td>
                        <td class="px-6 py-4">` + data["created_at"] + `</td>
                        <td class="px-6 py-4 text-center">
                            <button data-modal-target="trainings-modal" data-modal-toggle="trainings-modal" 
                            type="button" 
                            class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8">
                                <box-icon name='expand-alt' size="xs"></box-icon>
                            </button>`;
                tableRow += `
                            <form action="{{ route('trainingsform.edit', ':id') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-white bg-blue-300 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px]">
                                    <box-icon type='solid' name='edit-alt' size="xs"></box-icon>
                                </button>
                            </form>
                            `.replace(':id', data["id"]);
                tableRow +=
                            `
                            <button onclick="deleteRecord(` + data["id"] + `)" type="button"
                                class="text-white bg-red-300 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px]">
                                <box-icon name='trash' type='solid' size="xs"></box-icon>
                            </button>
                        </td>
                    </tr>
                    `;
            });

            // Efficient template literal construction using map()
            // const trainingRows = result.map(data => `
            // <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            //     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">${data.title}</th>
            //     <td class="px-6 py-4">${data.division || '-'}</td>  
            //     <td class="px-6 py-4">${data.start_date || '-'} - ${data.end_date || '-'}</td>  
            //     <td class="px-6 py-4">${data.venue || '-'}</td>  
            //     <td class="px-6 py-4">${data.province || data.state}, ${data.municipality || data.country}</td>  
            //     <td class="px-6 py-4">${data.num_of_participants || '-'}</td>  
            //     <td class="px-6 py-4">${data.created_at || '-'}</td>  
            //     <td class="px-6 py-4 text-center">
            //         <button data-modal-target="trainings-modal" data-modal-toggle="trainings-modal"
            //             type="button"
            //             class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px]"
            //             type="button">
            //             <box-icon name='expand-alt' size="xs"></box-icon>
            //         </button>
            //         <button onclick="showRecord(${data.id || '-'})"
            //             type="button"
            //             class="text-white bg-blue-300 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px]"
            //             type="button">
            //             <box-icon type='solid' name='edit-alt' size="xs"></box-icon>
            //         </button>
            //         <button onclick="deleteRecord(${data.id || '-'})"
            //             type="button"
            //             class="text-white bg-red-300 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px]"
            //             type="button">
            //             <box-icon name='trash' type='solid' size="xs"></box-icon>
            //         </button>
            //     </td>
            // </tr>
            // `).join('');

            // Single DOM manipulation for better performance
            // tableBody.html(trainingRows);
            $("#table-body").html(tableRow);
        }

        function formatDate(dateString) {
            if (!dateString) return "-";

            const date = new Date(dateString);
            const monthNames = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ];

            const month = monthNames[date.getMonth()];
            const day = String(date.getDate()).padStart(2, "0");
            const year = date.getFullYear();

            return `${month}-${day}-${year}`;
        }

        function loadTrainings(page) {
            $.ajax({
                // url: "/encoder/trainings/filter",
                url: "{{ route('filter_data') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    'showTraining': true,
                    'page': page,
                    'recordsPerPage': recordsPerPage,
                    'station': station,
                },
                success: function(result) {
                    showTrainings(result['records']);
                    currentPage = page; // Update current page

                    // Check if there are more records beyond the current page
                    if (recordsPerPage != result['records'].length) {
                        $('#nextButton').hide();
                        $('#prevButton').show();
                    } else {
                        $('#nextButton').show();
                        $('#prevButton').show();
                    }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                }
            })
        }

        function loadFilterTrainings(page) {
            var searchInput = $('#trainingsSearch').val();
            var yearSelect = $('#yearSelect').val();
            var start_MonthSelect = $('#start_MonthSelect').val();
            var end_MonthSelect = $('#end_MonthSelect').val();

            $.ajax({
                // url: "/encoder/trainings/filter",
                url: "{{ route('filter_data') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    'filterTrainings': true,
                    'searchInput': searchInput,
                    'yearSelect': yearSelect,
                    'start_MonthSelect': start_MonthSelect,
                    'end_MonthSelect': end_MonthSelect,
                    'station': station,
                    'page': page,
                    'recordsPerPage': recordsPerPage,
                },
                success: function(result) {
                    showTrainings(result['records']);
                    currentPage = page; // Update current page

                    if (recordsPerPage != result["records"].length) {
                        $("#nextButton").hide();
                        $("#prevButton").show();
                    } else {
                        $("#nextButton").show();
                        $("#prevButton").show();
                    }
                },
                error: function(error) {
                    alert("Oops something went wrong!");
                }
            })
        }

        $('#trainingsSearch').on('keyup input', function() {
            var searchInput = $('#trainingsSearch').val();
            var yearSelect = $('#yearSelect').val();
            var start_MonthSelect = $('#start_MonthSelect').val();
            var end_MonthSelect = $('#end_MonthSelect').val();

            if (searchInput == '' && start_MonthSelect == '' && end_MonthSelect == '' && yearSelect == '') {
                loadTrainings(1);
            } else {
                // $.ajax({
                //     // url: "/encoder/trainings/filter",
                //     url: "{{ route('filter_data') }}",
                //     method: "POST",
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                //     },
                //     data: {
                //         'filterTrainings': true,
                //         'searchInput': searchInput,
                //         'yearSelect': yearSelect,
                //         'start_MonthSelect': start_MonthSelect,
                //         'end_MonthSelect': end_MonthSelect,
                //         'station': station,
                //     },
                //     success: function(result) {
                //         showTrainings(result['records']);
                //         $('#nextButton').hide();
                //         $('#prevButton').hide();
                //     },
                //     error: function(error) {
                //         alert("Oops something went wrong!");
                //     }
                // })
                loadFilterTrainings(1);
            }
        });

        $('#yearSelect').on('change', function() {
            var searchInput = $('#trainingsSearch').val();
            var yearSelect = $('#yearSelect').val();
            var start_MonthSelect = $('#start_MonthSelect').val();
            var end_MonthSelect = $('#end_MonthSelect').val();

            if (searchInput == '' && start_MonthSelect == '' && end_MonthSelect == '' && yearSelect == '') {
                loadTrainings(1);
            } else {
                // $.ajax({
                //     // url: "/encoder/trainings/filter",
                //     url: "{{ route('filter_data') }}",
                //     method: "POST",
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                //     },
                //     data: {
                //         'filterTrainings': true,
                //         'searchInput': searchInput,
                //         'yearSelect': yearSelect,
                //         'start_MonthSelect': start_MonthSelect,
                //         'end_MonthSelect': end_MonthSelect,
                //         'station': station,
                //     },
                //     success: function(result) {
                //         showTrainings(result['records']);
                //         $('#nextButton').hide();
                //         $('#prevButton').hide();
                //     },
                //     error: function(error) {
                //         alert("Oops something went wrong!");
                //     }
                // })
                loadFilterTrainings(1);
            }
        })

        $('#start_MonthSelect').on('change', function() {
            var searchInput = $('#trainingsSearch').val();
            var yearSelect = $('#yearSelect').val();
            var start_MonthSelect = $('#start_MonthSelect').val();
            var end_MonthSelect = $('#end_MonthSelect').val();

            if (searchInput == '' && start_MonthSelect == '' && end_MonthSelect == '' && yearSelect == '') {
                loadTrainings(1);
            } else {
                // $.ajax({
                //     // url: "/encoder/trainings/filter",
                //     url: "{{ route('filter_data') }}",
                //     method: "POST",
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                //     },
                //     data: {
                //         'filterTrainings': true,
                //         'searchInput': searchInput,
                //         'yearSelect': yearSelect,
                //         'start_MonthSelect': start_MonthSelect,
                //         'end_MonthSelect': end_MonthSelect,
                //         'station': station,
                //     },
                //     success: function(result) {
                //         showTrainings(result['records']);
                //         $('#nextButton').hide();
                //         $('#prevButton').hide();
                //     },
                //     error: function(error) {
                //         alert("Oops something went wrong!");
                //     }
                // })
                loadFilterTrainings(1);
            }
        })

        $('#end_MonthSelect').on('change', function() {
            var searchInput = $('#trainingsSearch').val();
            var yearSelect = $('#yearSelect').val();
            var start_MonthSelect = $('#start_MonthSelect').val();
            var end_MonthSelect = $('#end_MonthSelect').val();

            if (searchInput == '' && start_MonthSelect == '' && end_MonthSelect == '' && yearSelect == '') {
                loadTrainings(1);
            } else {
                // $.ajax({
                //     // url: "/encoder/trainings/filter",
                //     url: "{{ route('filter_data') }}",
                //     method: "POST",
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                //     },
                //     data: {
                //         'filterTrainings': true,
                //         'searchInput': searchInput,
                //         'yearSelect': yearSelect,
                //         'start_MonthSelect': start_MonthSelect,
                //         'end_MonthSelect': end_MonthSelect,
                //         'station': station,
                //     },
                //     success: function(result) {
                //         showTrainings(result['records']);
                //         $('#nextButton').hide();
                //         $('#prevButton').hide();
                //     },
                //     error: function(error) {
                //         alert("Oops something went wrong!");
                //     }
                // })
                loadFilterTrainings(1);
            }
        })

        function nextPage() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == ""
            ) {
                loadTrainings(currentPage + 1);
            } else {
                loadFilterTrainings(currentPage + 1);
            }
        }

        function prevPage() {
            var searchInput = $("#trainingsSearch").val();
            var yearSelect = $("#yearSelect").val();
            var start_MonthSelect = $("#start_MonthSelect").val();
            var end_MonthSelect = $("#end_MonthSelect").val();

            if (
                searchInput == "" &&
                start_MonthSelect == "" &&
                end_MonthSelect == "" &&
                yearSelect == ""
            ) {
                if (currentPage > 1) {
                    loadTrainings(currentPage - 1);
                }
            } else {
                if (currentPage > 1) {
                    loadFilterTrainings(currentPage - 1);
                }
            }
        }

        function showRecord(id) {
            window.location.href = "{{ route('trainingsform.edit', ':id') }}".replace(':id', id);
        }

        function deleteRecord(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                // Use AJAX to send a DELETE request to the appropriate route
                $.ajax({
                    url: '/encoder/trainings/form-delete/' +
                        id, // Replace with the correct route for deleting training
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                        'deleteRecord': true,
                    },
                    success: function(response) {
                        if (response.message === 'Record deleted successfully') {
                            $(`[data-id="${id}"]`).remove(); // Remove the deleted training row
                            alert('Successfully deleted');
                        } else {
                            console.error('Error deleting training:', response
                                .error); // Handle potential errors
                        }
                        loadTrainings(currentPage); // Reload current page's trainings
                    },
                    error: function(error) {
                        // Handle any errors during deletion
                        console.error('Error deleting record:', error);
                    }
                });
            }
        }
    </script>
    {{-- <script type="text/javascript" src="{{ asset('assets/datatable_edit.js') }}"></script> --}}
@endsection
