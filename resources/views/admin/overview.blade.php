@extends('layouts.dashboard')

@section('title')
<title>Admin Overview</title>
@endsection

@section('sidebar')
<aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidenav" id="drawer-navigation">
  <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
    <ul class="space-y-2">

      {{-- Overview --}}
      <li>
        <a href="{{ route('encoder.overview') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg bg-green-100 dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
          <box-icon type='solid' name='pie-chart-alt-2'></box-icon>
          <span class="ml-3">Overview</span>
        </a>
      </li>

      {{-- CES --}}
      <li>
        <a class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700" aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
          <box-icon name='building' type='solid'></box-icon>
          <span class="flex-1 ml-3 text-left whitespace-nowrap">CES</span>
          <box-icon name='chevron-down'></box-icon>
         </a>
        <ul id="dropdown-sales" class="hidden py-2 space-y-2">
          <li>
            <a href="{{ route('admin.ces_view') }}" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
              <box-icon name='line-chart' ></box-icon>
              <span class="ml-3">View Data</span>
            </a>  
          </li>
          <li>
            <a href="{{ route('admin.ces_add') }}" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
              <box-icon name='plus'></box-icon>
              <span class="ml-3">Add Data</span>
            </a>  
          </li>
          <li>
            <a href="{{ route('admin.ces_edit') }}" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-green-100 dark:text-white dark:hover:bg-green-700">
              <box-icon name='edit-alt' type='solid'></box-icon>
              <span class="ml-3">Edit Data</span>
            </a>  
          </li>
        </ul>
      </li>

      {{-- BATAC --}}
      <li>
        <a href="{{ route('admin.batac') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
          <box-icon name='building' type='solid'></box-icon>
          <span class="ml-3">BATAC</span>
        </a>
      </li>

      {{-- AGUSAN --}}
      <li>
        <a href="{{ route('admin.agusan') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
          <box-icon name='building' type='solid'></box-icon>
          <span class="ml-3">AGUSAN</span>
        </a>
      </li>

      {{-- BICOL --}}
      <li>
        <a href="{{ route('admin.bicol') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
          <box-icon name='building' type='solid'></box-icon>
          <span class="ml-3">BICOL</span>
        </a>
      </li>

      {{-- ISABELA --}}
      <li>
        <a href="{{ route('admin.isabela') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
          <box-icon name='building' type='solid'></box-icon>
          <span class="ml-3">ISABELA</span>
        </a>
      </li>

      {{-- LOS BAÑOS --}}
      <li>
        <a href="{{ route('admin.losbaños') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
          <box-icon name='building' type='solid'></box-icon>
          <span class="ml-3">LOS BAÑOS</span>
        </a>
      </li>

      {{-- MIDSAYAP --}}
      <li>
        <a href="{{ route('admin.midsayap') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
          <box-icon name='building' type='solid'></box-icon>
          <span class="ml-3">MIDSAYAP</span>
        </a>
      </li>

      {{-- NEGROS --}}
      <li>
        <a href="{{ route('admin.negros') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg  dark:text-white hover:bg-green-100 dark:hover:bg-gray-700 group">
          <box-icon name='building' type='solid'></box-icon>
          <span class="ml-3">NEGROS</span>
        </a>
      </li>

    </ul>
  </div>
</aside>

@endsection

@section('content')
{{-- Main Content --}}
<main class="p-4 md:ml-64 h-auto pt-20">

  {{-- Filters and Export --}}
  <div class="flex my-4">
    
    {{-- Form --}}
    <div class="mr-2">
      <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="form">
          <option selected disabled>Select Form</option>
          <option>Summary of Trainings</option>
          <option>Technical Dispatch</option>
          <option>KSL</option>
      </select>
    </div>

    {{-- Year --}}
    <div class="mx-2">
      <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="year">
          <option selected disabled>Select Year</option>
          <option>2024</option>
          <option>2023</option>
      </select>
    </div>

    {{-- Quarter --}}
    <div class="mx-2">
      <select class="block appearance-none w-full h-10 border border-gray-300 text-gray-900 py-3 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm" id="quarter">
          <option selected disabled>Select Quarter</option>
          <option>ASD (Admin)</option>
      </select>
    </div>

    {{-- Export Button --}}
    <div class="ml-auto">
      <button type="button" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-50 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:focus:ring-green-50 me-2 mb-2">
        <box-icon name='file-export' type='solid' color="#ffffff" size="sm" ></box-icon>
            <span class="px-1">Export</span>
      </button>
    </div>

  </div>

  <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
    {{-- <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
      <div id="chart1" class="items-center"></div>
    </div> --}}
    {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div> --}}

    <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex justify-center items-center">
      <div id="chart1"></div>
    </div>
    <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64 flex justify-center items-center">
      <div id="chart2"></div>
    </div>
  
  </div>

  <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4">
    <div id="chart3"></div>
  </div>


  <div class="grid grid-cols-2 gap-4 mb-4">
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
      <div id="chart4"></div>
    </div>
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
      <div id="chart5"></div>
    </div>
    {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div> --}}
    {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div> --}}
  </div>
  {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div> --}}
  {{-- <div class="grid grid-cols-2 gap-4">
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
  </div> --}}
</main>
@endsection

@section('charts')
<script>
  var bar = {
    series: [{
    data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
  }],
    chart: {
    type: 'bar',
    height: 290,
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      borderRadius: 4,
      horizontal: true,
    }
  },
  dataLabels: {
    enabled: false
  },
  xaxis: {
    categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
      'United States', 'China', 'Germany'
    ],
  }
  };
  
  var chart = new ApexCharts(document.querySelector("#chart1"), bar);
  chart.render();
  
  
  var timeline = {
    series: [
    {
      data: [
        {
          x: 'Code',
          y: [
            new Date('2019-03-02').getTime(),
            new Date('2019-03-04').getTime()
          ]
        },
        {
          x: 'Test',
          y: [
            new Date('2019-03-04').getTime(),
            new Date('2019-03-08').getTime()
          ]
        },
        {
          x: 'Validation',
          y: [
            new Date('2019-03-08').getTime(),
            new Date('2019-03-12').getTime()
          ]
        },
        {
          x: 'Deployment',
          y: [
            new Date('2019-03-12').getTime(),
            new Date('2019-03-18').getTime()
          ]
        }
      ]
    }
  ],
    chart: {
    height: 290,
    type: 'rangeBar',
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      horizontal: true
    }
  },
  xaxis: {
    type: 'datetime'
  }
  };
  
  var chart = new ApexCharts(document.querySelector("#chart2"), timeline);
  chart.render();    

  var options = {
      series: [
      {
        data: [
          {
            x: 'New Delhi',
            y: 218
          },
          {
            x: 'Kolkata',
            y: 149
          },
          {
            x: 'Mumbai',
            y: 184
          },
          {
            x: 'Ahmedabad',
            y: 55
          },
          {
            x: 'Bangaluru',
            y: 84
          },
          {
            x: 'Pune',
            y: 31
          },
          {
            x: 'Chennai',
            y: 70
          },
          {
            x: 'Jaipur',
            y: 30
          },
          {
            x: 'Surat',
            y: 44
          },
          {
            x: 'Hyderabad',
            y: 68
          },
          {
            x: 'Lucknow',
            y: 28
          },
          {
            x: 'Indore',
            y: 19
          },
          {
            x: 'Kanpur',
            y: 29
          }
        ]
      }
    ],
      legend: {
      show: false
    },
    chart: {
      height: 350,
      type: 'treemap',
      toolbar: {
        show: false,
      },
    },
    title: {
      text: 'Distibuted Treemap (different color for each cell)',
      align: 'center'
    },
    colors: [
      '#3B93A5',
      '#F7B844',
      '#ADD8C7',
      '#EC3C65',
      '#CDD7B6',
      '#C1F666',
      '#D43F97',
      '#1E5D8C',
      '#421243',
      '#7F94B0',
      '#EF6537',
      '#C0ADDB'
    ],
    plotOptions: {
      treemap: {
        distributed: true,
        enableShades: false
      }
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart3"), options);
    chart.render();

    var options = {
      series: [
      {
        name: 'Q1 Budget',
        group: 'budget',
        data: [44000, 55000, 41000, 67000, 22000, 43000]
      },
      {
        name: 'Q1 Actual',
        group: 'actual',
        data: [48000, 50000, 40000, 65000, 25000, 40000]
      },
      {
        name: 'Q2 Budget',
        group: 'budget',
        data: [13000, 36000, 20000, 8000, 13000, 27000]
      },
      {
        name: 'Q2 Actual',
        group: 'actual',
        data: [20000, 40000, 25000, 10000, 12000, 28000]
      }
    ],
      chart: {
      type: 'bar',
      height: 290,
      stacked: true,
      toolbar: {
        show: false,
      },
    },
    stroke: {
      width: 1,
      colors: ['#fff']
    },
    dataLabels: {
      formatter: (val) => {
        return val / 1000 + 'K'
      }
    },
    plotOptions: {
      bar: {
        horizontal: false
      }
    },
    xaxis: {
      labels: {
        show: false
      }
    },
    fill: {
      opacity: 1
    },
    colors: ['#80c7fd', '#008FFB', '#80f1cb', '#00E396'],
    yaxis: {
      labels: {
        formatter: (val) => {
          return val / 1000 + 'K'
        }
      }
    },
    legend: {
      show: false
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart4"), options);
    chart.render();


    var options = {
      series: [{
      name: 'Net Profit',
      data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
      name: 'Revenue',
      data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    }, {
      name: 'Free Cash Flow',
      data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
    }],
      chart: {
      type: 'bar',
      height: 280,
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded'
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    xaxis: {
      categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
      labels: {
        show: false
      },
    },
    yaxis: {
      title: {
        text: '$ (thousands)'
      }
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$ " + val + " thousands"
        }
      }
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart5"), options);
    chart.render();

</script>
@endsection