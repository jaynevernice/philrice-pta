{{-- Dito mag eedit ng content para maging dynamic --}}
@extends('layouts.dashboard')

@section('title')
<title>RCEF User Overview</title>
@endsection

@section('sidebar')

  {{-- Sidebar --}}
  <aside
      class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
      aria-label="Sidenav"
      id="drawer-navigation"
    >
      <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">

          {{-- Overview --}}
          <li>
            <a
              href="{{ route('rcef_user.overview') }}"
              class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg bg-green-100 dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group"
            >
                <box-icon type='solid' name='pie-chart-alt-2' ></box-icon>
                <span class="ml-3">Overview</span>
            </a>
          </li>

          {{-- CES --}}
          <li>
            <a
              href="{{ route('rcef_user.ces') }}"
              class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group"
            >
                <box-icon name='building' type='solid' ></box-icon>
                <span class="ml-3">CES</span>
            </a>
          </li>

          {{-- BATAC --}}
          <li>
            <a href="{{ route('rcef_user.batac') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
              <box-icon name='building' type='solid'></box-icon>
              <span class="ml-3">BATAC</span>
            </a>
          </li>

          {{-- AGUSAN --}}
          <li>
            <a href="{{ route('rcef_user.agusan') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
              <box-icon name='building' type='solid'></box-icon>
              <span class="ml-3">AGUSAN</span>
            </a>
          </li>

          {{-- BICOL --}}
          <li>
            <a href="{{ route('rcef_user.bicol') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
              <box-icon name='building' type='solid'></box-icon>
              <span class="ml-3">BICOL</span>
            </a>
          </li>

          {{-- ISABELA --}}
          <li>
            <a href="{{ route('rcef_user.isabela') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
              <box-icon name='building' type='solid'></box-icon>
              <span class="ml-3">ISABELA</span>
            </a>
          </li>

          {{-- LOS BAÑOS --}}
          <li>
            <a href="{{ route('rcef_user.losbaños') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
              <box-icon name='building' type='solid'></box-icon>
              <span class="ml-3">LOS BAÑOS</span>
            </a>
          </li>

          {{-- MIDSAYAP --}}
          <li>
            <a href="{{ route('rcef_user.midsayap') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
              <box-icon name='building' type='solid'></box-icon>
              <span class="ml-3">MIDSAYAP</span>
            </a>
          </li>

          {{-- NEGROS --}}
          <li>
            <a href="{{ route('rcef_user.negros') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
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
<main class="p-4 md:ml-64 h-auto pt-20">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
      <div id="chart1" class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64"></div>
      <div id="chart2" class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
      <div id="chart3" class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
      <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"
      ></div>
    </div>
    <div
      class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"
    ></div>
    <div class="grid grid-cols-2 gap-4 mb-4">
      <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
      ></div>
      <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
      ></div>
      <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
      ></div>
      <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
      ></div>
    </div>
    <div
      class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"
    ></div>
    <div class="grid grid-cols-2 gap-4">
      <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
      ></div>
      <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
      ></div>
      <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
      ></div>
      <div
        class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"
      ></div>
    </div>
  </main>
@endsection