import ApexCharts from 'apexcharts';

var chart1Options = {
    chart: {
      type: 'line'
    },
    series: [{
      name: 'sales',
      data: [30,40,35,50,49,60,70,91,125]
    }],
    xaxis: {
      categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
    }
  }

// Define chart configurations
var chart2Options = {
    chart: {
        type: 'line'
    },
    series: [{
        name: 'Series 1',
        data: [30, 40, 35, 50, 49]
    }],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May']
    }
}

var chart3Options = {
    chart: {
        type: 'bar'
    },
    series: [{
        name: 'Series 2',
        data: [50, 60, 55, 70, 69]
    }],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May']
    }
}

// Create chart objects
var chart1 = new ApexCharts(document.querySelector("#chart1"), options);
var chart2 = new ApexCharts(document.getElementById('#chart2'), chart1Options);
var chart3 = new ApexCharts(document.getElementById('#chart3'), chart2Options);

// Store chart objects in an array
const charts = [chart1, chart2, chart3];

// Render charts sequentially
charts.forEach(chart => {
    chart.render();
});
