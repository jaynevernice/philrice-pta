var bar = {
  series: [{
  data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
}],
  chart: {
  type: 'bar',
  height: 350
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

var chart = new ApexCharts(document.querySelector("#chart"), bar);
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
  height: 350,
  type: 'rangeBar'
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