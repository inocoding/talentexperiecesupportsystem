/**
 *
 * Charts
 *
 * Interface.Plugins.Charts.html page content scripts. Initialized from scripts.js file.
 *
 *
 */

class Charts {
  constructor() {
    // Initialization of the page plugins
    if (typeof Chart === 'undefined') {
      console.log('Chart is undefined!');
      return;
    }

    this._lineChart = null;
    this._lineChart2 = null;
    this._lineChart3 = null;
    this._lineChart4 = null;
    this._areaChart = null;
    this._scatterChart = null;
    this._radarChart = null;
    this._polarChart = null;
    this._pieChart = null;
    this._doughnutChart = null;
    this._doughnutChart1 = null;
    this._doughnutChart2 = null;
    this._doughnutChart3 = null;
    this._doughnutChart4 = null;
    this._doughnutChart5 = null;
    this._barChart = null;
    this._horizontalBarChart = null;
    this._bubbleChart = null;
    this._roundedBarChart = null;
    this._roundedBarChart2 = null;
    this._horizontalRoundedBarChart = null;
    this._streamingLineChart = null;
    this._streamingBarChart = null;
    this._customTooltipDoughnut = null;
    this._customTooltipBar = null;
    this._customLegendBar = null;
    this._customLegendDoughnut = null;
    this._smallDoughnutChart1 = null;
    this._smallDoughnutChart2 = null;
    this._smallDoughnutChart3 = null;
    this._smallDoughnutChart4 = null;
    this._smallDoughnutChart5 = null;
    this._smallDoughnutChart6 = null;
    this._smallDoughnutChart7 = null;
    this._smallDoughnutChart8 = null;
    this._smallDoughnutChart9 = null;
    this._smallDoughnutChart10 = null;
    this._smallDoughnutChart11 = null;
    this._smallDoughnutChart12 = null;
    this._smallDoughnutChart13 = null;
    this._smallDoughnutChart14 = null;
    this._smallDoughnutChart15 = null;
    this._smallDoughnutChart16 = null;
    this._smallDoughnutChart17 = null;
    this._smallDoughnutChart18 = null;
    this._smallDoughnutChart19 = null;
    this._smallDoughnutChart20 = null;
    this._smallDoughnutChart21 = null;
    this._smallDoughnutChart22 = null;
    this._smallDoughnutChart23 = null;
    this._smallLineChart1 = null;
    this._smallLineChart2 = null;
    this._smallLineChart3 = null;
    this._smallLineChart4 = null;

    // Standard charts
    this._initLineChart();
    this._initLineChart2();
    this._initLineChart3();
    this._initLineChart4();
    this._initAreaChart();
    this._initScatterChart();
    this._initRadarChart();
    this._initPolarChart();
    this._initPieChart();
    this._initDoughnutChart();
    this._initDoughnutChart1();
    this._initDoughnutChart2();
    this._initDoughnutChart3();
    this._initDoughnutChart4();
    this._initDoughnutChart5();
    this._initBarChart();
    this._initHorizontalBarChart();
    this._initBubbleChart();

    // Requires chartjs-plugin-rounded-bar.min.js
    this._initRoundedBarChart();
    this._initRoundedBarChart2();
    this._initHorizontalRoundedBarChart();

    // Streaming charts
    this._initStreamingLineChart();
    this._initStreamingBarChart();

    // Customizations
    this._initCustomTooltipDoughnut();
    this._initCustomTooltipBar();
    this._initCustomLegendBar();
    this._initCustomLegendDoughnut();

    // Small charts
    this._initSmallDoughnutCharts();
    this._initSmallLineCharts();

    this._initEvents();
  }

  _initEvents() {
    // Listening for color change events to update charts
    document.documentElement.addEventListener(Globals.colorAttributeChange, (event) => {
      this._lineChart && this._lineChart.destroy();
      this._initLineChart();

      this._lineChart2 && this._lineChart2.destroy();
      this._initLineChart2();

      this._lineChart3 && this._lineChart3.destroy();
      this._initLineChart3();

      this._lineChart4 && this._lineChart4.destroy();
      this._initLineChart4();

      this._areaChart && this._areaChart.destroy();
      this._initAreaChart();

      this._scatterChart && this._scatterChart.destroy();
      this._initScatterChart();

      this._radarChart && this._radarChart.destroy();
      this._initRadarChart();

      this._polarChart && this._polarChart.destroy();
      this._initPolarChart();

      this._pieChart && this._pieChart.destroy();
      this._initPieChart();

      this._doughnutChart && this._doughnutChart.destroy();
      this._initDoughnutChart();

      this._doughnutChart1 && this._doughnutChart1.destroy();
      this._initDoughnutChart1();

      this._doughnutChart2 && this._doughnutChart2.destroy();
      this._initDoughnutChart2();

      this._doughnutChart3 && this._doughnutChart3.destroy();
      this._initDoughnutChart3();

      this._doughnutChart4 && this._doughnutChart4.destroy();
      this._initDoughnutChart4();

      this._doughnutChart5 && this._doughnutChart5.destroy();
      this._initDoughnutChart5();

      this._barChart && this._barChart.destroy();
      this._initBarChart();

      this._horizontalBarChart && this._horizontalBarChart.destroy();
      this._initHorizontalBarChart();

      this._bubbleChart && this._bubbleChart.destroy();
      this._initBubbleChart();

      this._roundedBarChart && this._roundedBarChart.destroy();
      this._initRoundedBarChart();

      this._roundedBarChart2 && this._roundedBarChart2.destroy();
      this._initRoundedBarChart2();

      this._horizontalRoundedBarChart && this._horizontalRoundedBarChart.destroy();
      this._initHorizontalRoundedBarChart();

      this._streamingLineChart && this._streamingLineChart.destroy();
      this._initStreamingLineChart();

      this._streamingBarChart && this._streamingBarChart.destroy();
      this._initStreamingBarChart();

      this._customTooltipDoughnut && this._customTooltipDoughnut.destroy();
      this._initCustomTooltipDoughnut();

      this._customTooltipBar && this._customTooltipBar.destroy();
      this._initCustomTooltipBar();

      this._customLegendBar && this._customLegendBar.destroy();
      this._initCustomLegendBar();

      this._customLegendDoughnut && this._customLegendDoughnut.destroy();
      this._initCustomLegendDoughnut();

      this._smallDoughnutChart1 && this._smallDoughnutChart1.destroy();
      this._smallDoughnutChart2 && this._smallDoughnutChart2.destroy();
      this._smallDoughnutChart3 && this._smallDoughnutChart3.destroy();
      this._smallDoughnutChart4 && this._smallDoughnutChart4.destroy();
      this._smallDoughnutChart5 && this._smallDoughnutChart5.destroy();
      this._smallDoughnutChart6 && this._smallDoughnutChart6.destroy();
      this._smallDoughnutChart7 && this._smallDoughnutChart7.destroy();
      this._smallDoughnutChart8 && this._smallDoughnutChart8.destroy();
      this._smallDoughnutChart9 && this._smallDoughnutChart9.destroy();
      this._smallDoughnutChart10 && this._smallDoughnutChart10.destroy();
      this._smallDoughnutChart11 && this._smallDoughnutChart11.destroy();
      this._smallDoughnutChart12 && this._smallDoughnutChart12.destroy();
      this._smallDoughnutChart13 && this._smallDoughnutChart13.destroy();
      this._smallDoughnutChart14 && this._smallDoughnutChart14.destroy();
      this._smallDoughnutChart15 && this._smallDoughnutChart15.destroy();
      this._smallDoughnutChart16 && this._smallDoughnutChart16.destroy();
      this._smallDoughnutChart17 && this._smallDoughnutChart17.destroy();
      this._smallDoughnutChart18 && this._smallDoughnutChart18.destroy();
      this._smallDoughnutChart19 && this._smallDoughnutChart19.destroy();
      this._smallDoughnutChart20 && this._smallDoughnutChart20.destroy();
      this._smallDoughnutChart21 && this._smallDoughnutChart21.destroy();
      this._smallDoughnutChart22 && this._smallDoughnutChart22.destroy();
      this._smallDoughnutChart23 && this._smallDoughnutChart23.destroy();
      this._initSmallDoughnutCharts();

      this._smallLineChart1 && this._smallLineChart1.destroy();
      this._smallLineChart2 && this._smallLineChart2.destroy();
      this._smallLineChart3 && this._smallLineChart3.destroy();
      this._smallLineChart4 && this._smallLineChart4.destroy();
      this._initSmallLineCharts();
    });
  }

  // Standard line chart
  _initLineChart() {
    if (document.getElementById('lineChart')) {
      const lineChart = document.getElementById('lineChart').getContext('2d');
      this._lineChart = new Chart(lineChart, {
        type: 'line',
        options: {
          plugins: {
            crosshair: ChartsExtend.Crosshair(),
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {display: true, lineWidth: 1, color: Globals.separatorLight, drawBorder: false},
                ticks: {beginAtZero: true, stepSize: 200, min: 0, max: 1400, padding: 20, fontColor: Globals.alternate},
              },
            ],
            xAxes: [{gridLines: {display: false}, ticks: {fontColor: Globals.alternate}}],
          },
          legend: {display: false},
          tooltips: ChartsExtend.ChartTooltipForCrosshair(),
        },
        data: {
          labels: ['MG', 'NI', 'MR', 'ER', 'OS'],
          datasets: [
            {
              label: '',
              data: [0, 2, 484, 242, 0],
              borderColor: Globals.primary,
              pointBackgroundColor: Globals.primary,
              pointBorderColor: Globals.primary,
              pointHoverBackgroundColor: Globals.primary,
              pointHoverBorderColor: Globals.primary,
              borderWidth: 2,
              pointRadius: 3,
              pointBorderWidth: 3,
              pointHoverRadius: 4,
              fill: false,
            },
          ],
        },
      });
    }
  }

  _initLineChart2() {
    if (document.getElementById('lineChart2')) {
      const lineChart = document.getElementById('lineChart2').getContext('2d');
      this._lineChart = new Chart(lineChart, {
        type: 'line',
        options: {
          plugins: {
            crosshair: ChartsExtend.Crosshair(),
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {display: true, lineWidth: 1, color: Globals.separatorLight, drawBorder: false},
                ticks: {beginAtZero: true, stepSize: 200, min: 0, max: 1400, padding: 20, fontColor: Globals.alternate},
              },
            ],
            xAxes: [{gridLines: {display: false}, ticks: {fontColor: Globals.alternate}}],
          },
          legend: {display: false},
          tooltips: ChartsExtend.ChartTooltipForCrosshair(),
        },
        data: {
          labels: ['KOM-4', 'KOM-3', 'KOM-2', 'KOM-1'],
          datasets: [
            {
              label: '',
              data: [0, 200, 284, 42],
              borderColor: Globals.primary,
              pointBackgroundColor: Globals.primary,
              pointBorderColor: Globals.primary,
              pointHoverBackgroundColor: Globals.primary,
              pointHoverBorderColor: Globals.primary,
              borderWidth: 2,
              pointRadius: 3,
              pointBorderWidth: 3,
              pointHoverRadius: 4,
              fill: false,
            },
          ],
        },
      });
    }
  }

  _initLineChart3() {
    if (document.getElementById('lineChart3')) {
      const lineChart = document.getElementById('lineChart3').getContext('2d');
      this._lineChart = new Chart(lineChart, {
        type: 'line',
        options: {
          plugins: {
            crosshair: ChartsExtend.Crosshair(),
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {display: true, lineWidth: 1, color: Globals.separatorLight, drawBorder: false},
                ticks: {beginAtZero: true, stepSize: 200, min: 0, max: 1400, padding: 20, fontColor: Globals.alternate},
              },
            ],
            xAxes: [{gridLines: {display: false}, ticks: {fontColor: Globals.alternate}}],
          },
          legend: {display: false},
          tooltips: ChartsExtend.ChartTooltipForCrosshair(),
        },
        data: {
          labels: ['SPP', 'PPE', 'PPS', 'KPO', 'POT', 'OPT', 'SPO', 'SOP', 'LBS'],
          datasets: [
            {
              label: '',
              data: [0, 1, 0, 1, 484, 140, 102, 0, 0],
              borderColor: Globals.primary,
              pointBackgroundColor: Globals.primary,
              pointBorderColor: Globals.primary,
              pointHoverBackgroundColor: Globals.primary,
              pointHoverBorderColor: Globals.primary,
              borderWidth: 2,
              pointRadius: 3,
              pointBorderWidth: 3,
              pointHoverRadius: 4,
              fill: false,
            },
          ],
        },
      });
    }
  }

  _initLineChart4() {
    if (document.getElementById('lineChart4')) {
      const lineChart = document.getElementById('lineChart4').getContext('2d');
      this._lineChart = new Chart(lineChart, {
        type: 'line',
        options: {
          plugins: {
            crosshair: ChartsExtend.Crosshair(),
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {display: true, lineWidth: 1, color: Globals.separatorLight, drawBorder: false},
                ticks: {beginAtZero: true, stepSize: 200, min: 0, max: 1400, padding: 20, fontColor: Globals.alternate},
              },
            ],
            xAxes: [{gridLines: {display: false}, ticks: {fontColor: Globals.alternate}}],
          },
          legend: {display: false},
          tooltips: ChartsExtend.ChartTooltipForCrosshair(),
        },
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nop', 'Des'],
          datasets: [
            {
              label: '',
              data: [0, 1, 0, 1, 484, 140, 102, 0, 0, 0, 10, 0],
              borderColor: Globals.primary,
              pointBackgroundColor: Globals.primary,
              pointBorderColor: Globals.primary,
              pointHoverBackgroundColor: Globals.primary,
              pointHoverBorderColor: Globals.primary,
              borderWidth: 2,
              pointRadius: 3,
              pointBorderWidth: 3,
              pointHoverRadius: 4,
              fill: false,
            },
          ],
        },
      });
    }
  }

  // Standard area chart
  _initAreaChart() {
    if (document.getElementById('areaChart')) {
      const areaChart = document.getElementById('areaChart').getContext('2d');
      this._areaChart = new Chart(areaChart, {
        type: 'line',
        options: {
          plugins: {
            crosshair: ChartsExtend.Crosshair(),
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {display: true, lineWidth: 1, color: Globals.separatorLight, drawBorder: false},
                ticks: {beginAtZero: true, stepSize: 50, min: 0, max: 200, padding: 20, fontColor: Globals.alternate},
              },
            ],
            xAxes: [
              {
                gridLines: {display: false},
                ticks: {fontColor: Globals.alternate},
              },
            ],
          },
          legend: {display: false},
          tooltips: ChartsExtend.ChartTooltipForCrosshair(),
        },
        data: {
          labels: ['2018', '2019', '2020', '2021'],
          datasets: [
            {
              label: '',
              data: [60, 63, 103, 65],
              borderColor: Globals.primary,
              pointBackgroundColor: Globals.foreground,
              pointBorderColor: Globals.primary,
              pointHoverBackgroundColor: Globals.primary,
              pointHoverBorderColor: Globals.foreground,
              pointRadius: 4,
              pointBorderWidth: 2,
              pointHoverRadius: 5,
              fill: true,
              borderWidth: 2,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
            },
          ],
        },
      });
    }
  }

  // Standard scatter chart
  _initScatterChart() {
    if (document.getElementById('scatterChart')) {
      const scatterChart = document.getElementById('scatterChart').getContext('2d');
      this._scatterChart = new Chart(scatterChart, {
        type: 'scatter',
        options: {
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {display: true, lineWidth: 1, color: Globals.separatorLight, drawBorder: false},
                ticks: {beginAtZero: true, stepSize: 20, min: -80, max: 80, padding: 20, fontColor: Globals.alternate},
              },
            ],
            xAxes: [
              {
                gridLines: {display: true, lineWidth: 1, color: Globals.separatorLight},
                ticks: {fontColor: Globals.alternate},
              },
            ],
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          datasets: [
            {
              borderWidth: 2,
              label: 'Breads',
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              data: [
                {x: 62, y: -78},
                {x: -0, y: 74},
                {x: -67, y: 45},
                {x: -26, y: -43},
                {x: -15, y: -30},
                {x: 65, y: -68},
                {x: -28, y: -61},
              ],
            },
            {
              borderWidth: 2,
              label: 'Patty',
              borderColor: Globals.tertiary,
              backgroundColor: 'rgba(' + Globals.tertiaryrgb + ',0.1)',
              data: [
                {x: 79, y: 62},
                {x: 62, y: 0},
                {x: -76, y: -81},
                {x: -51, y: 41},
                {x: -9, y: 9},
                {x: 72, y: -37},
                {x: 62, y: -26},
              ],
            },
          ],
        },
      });
    }
  }

  // Standard radar chart
  _initRadarChart() {
    if (document.getElementById('radarChart')) {
      const radarChart = document.getElementById('radarChart').getContext('2d');
      this._radarChart = new Chart(radarChart, {
        type: 'radar',
        options: {
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scale: {
            ticks: {display: false},
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          datasets: [
            {
              label: 'Stock',
              borderWidth: 2,
              pointBackgroundColor: Globals.primary,
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              data: [80, 90, 70],
            },
            {
              label: 'Order',
              borderWidth: 2,
              pointBackgroundColor: Globals.secondary,
              borderColor: Globals.secondary,
              backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
              data: [68, 80, 95],
            },
          ],
          labels: ['Breads', 'Patty', 'Pastry'],
        },
      });
    }
  }

  // Standard polar chart
  _initPolarChart() {
    if (document.getElementById('polarChart')) {
      const polarChart = document.getElementById('polarChart').getContext('2d');
      this._polarChart = new Chart(polarChart, {
        type: 'polarArea',
        options: {
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scale: {
            ticks: {
              display: false,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          datasets: [
            {
              label: 'Stock',
              borderWidth: 2,
              pointBackgroundColor: Globals.primary,
              borderColor: [Globals.primary, Globals.secondary, Globals.tertiary],
              backgroundColor: ['rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.tertiaryrgb + ',0.1)'],
              data: [80, 90, 70],
            },
          ],
          labels: ['Breads', 'Patty', 'Pastry'],
        },
      });
    }
  }

  // Standard pie chart
  _initPieChart() {
    if (document.getElementById('pieChart')) {
      const pieChart = document.getElementById('pieChart');
      this._pieChart = new Chart(pieChart, {
        type: 'pie',
        data: {
          labels: ['Breads', 'Pastry', 'Patty'],
          datasets: [
            {
              label: '',
              borderColor: [Globals.primary, Globals.secondary, Globals.tertiary],
              backgroundColor: ['rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.tertiaryrgb + ',0.1)'],
              borderWidth: 2,
              data: [15, 25, 20],
            },
          ],
        },
        draw: function () {},
        options: {
          plugins: {
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
      });
    }
  }

  // Standard doughnut chart
  _initDoughnutChart() {
    if (document.getElementById('doughnutChart')) {
      const doughnutChart = document.getElementById('doughnutChart');
      this._doughnutChart = new Chart(doughnutChart, {
        plugins: [ChartsExtend.CenterTextPlugin()],
        type: 'doughnut',
        data: {
          labels: ['Basic', 'Specific', 'System', 'Optimization', 'Advanced', 'Integration'],
          datasets: [
            {
              label: '',
              borderColor: [Globals.tertiary, Globals.secondary, Globals.primary, Globals.quaternary, Globals.success, Globals.info],
              backgroundColor: ['rgba(' + Globals.tertiaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.quaternaryrgb + ',0.1)' ],
              borderWidth: 2,
              data: [150, 100, 75, 25, 10, 0],
            },
          ],
        },
        draw: function () {},
        options: {
          plugins: {
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          cutoutPercentage: 80,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
      });
    }
  }

  // Standard doughnut chart
  _initDoughnutChart1() {
    if (document.getElementById('doughnutChart1')) {
      const doughnutChart = document.getElementById('doughnutChart1');
      this._doughnutChart = new Chart(doughnutChart, {
        plugins: [ChartsExtend.CenterTextPlugin()],
        type: 'doughnut',
        data: {
          labels: ['21-25', '26-30', '31-35', '36-40', '41-45', '46-50', '51-55'],
          datasets: [
            {
              label: '',
              borderColor: [Globals.tertiary, Globals.secondary, Globals.primary, Globals.quaternary, Globals.success, Globals.info, Globals.warning],
              backgroundColor: ['rgba(' + Globals.tertiaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.quaternaryrgb + ',0.1)' ],
              borderWidth: 2,
              data: [100, 70, 55, 35, 20, 22, 19],
            },
          ],
        },
        draw: function () {},
        options: {
          plugins: {
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          cutoutPercentage: 80,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
      });
    }
  }

  // Standard doughnut chart
  _initDoughnutChart2() {
    if (document.getElementById('doughnutChart2')) {
      const doughnutChart = document.getElementById('doughnutChart2');
      this._doughnutChart = new Chart(doughnutChart, {
        plugins: [ChartsExtend.CenterTextPlugin()],
        type: 'doughnut',
        data: {
          labels: ['UIW Kaltimra', 'UIW Kalselteng', 'UIW Kalbar', 'UIP Kalbagtim', 'UIP Kalbagbar', 'UIKL Kalimantan'],
          datasets: [
            {
              label: '',
              borderColor: [Globals.tertiary, Globals.secondary, Globals.primary, Globals.quaternary, Globals.success, Globals.info, Globals.warning],
              backgroundColor: ['rgba(' + Globals.tertiaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.quaternaryrgb + ',0.1)' ],
              borderWidth: 2,
              data: [724, 770, 565, 135, 120, 1022],
            },
          ],
        },
        draw: function () {},
        options: {
          plugins: {
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          cutoutPercentage: 80,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
      });
    }
  }

   // Standard doughnut chart
   _initDoughnutChart3() {
    if (document.getElementById('doughnutChart3')) {
      const doughnutChart = document.getElementById('doughnutChart3');
      this._doughnutChart = new Chart(doughnutChart, {
        plugins: [ChartsExtend.CenterTextPlugin()],
        type: 'doughnut',
        data: {
          labels: ['UIW Kaltimra', 'UIW Kalselteng', 'UIW Kalbar', 'UIP Kalbagtim', 'UIP Kalbagbar', 'UIKL Kalimantan'],
          datasets: [
            {
              label: '',
              borderColor: [Globals.tertiary, Globals.secondary, Globals.primary, Globals.quaternary, Globals.success, Globals.info, Globals.warning],
              backgroundColor: ['rgba(' + Globals.tertiaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.quaternaryrgb + ',0.1)' ],
              borderWidth: 2,
              data: [724, 770, 565, 135, 120, 1022],
            },
          ],
        },
        draw: function () {},
        options: {
          plugins: {
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          cutoutPercentage: 80,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
      });
    }
  }

  // Standard doughnut chart
  _initDoughnutChart4() {
    if (document.getElementById('doughnutChart4')) {
      const doughnutChart = document.getElementById('doughnutChart4');
      this._doughnutChart = new Chart(doughnutChart, {
        plugins: [ChartsExtend.CenterTextPlugin()],
        type: 'doughnut',
        data: {
          labels: ['Laki-Laki', 'Perempuan'],
          datasets: [
            {
              label: '',
              borderColor: [Globals.tertiary, Globals.secondary, Globals.primary, Globals.quaternary, Globals.success, Globals.info, Globals.warning],
              backgroundColor: ['rgba(' + Globals.tertiaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.quaternaryrgb + ',0.1)' ],
              borderWidth: 2,
              data: [1220, 1022],
            },
          ],
        },
        draw: function () {},
        options: {
          plugins: {
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          cutoutPercentage: 80,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
      });
    }
  }

   // Standard doughnut chart
   _initDoughnutChart5() {
    if (document.getElementById('doughnutChart5')) {
      const doughnutChart = document.getElementById('doughnutChart5');
      this._doughnutChart = new Chart(doughnutChart, {
        plugins: [ChartsExtend.CenterTextPlugin()],
        type: 'doughnut',
        data: {
          labels: ['S3', 'S2', 'S1', 'D3', 'SLTA'],
          datasets: [
            {
              label: '',
              borderColor: [Globals.tertiary, Globals.secondary, Globals.primary, Globals.quaternary, Globals.success, Globals.info, Globals.warning],
              backgroundColor: ['rgba(' + Globals.tertiaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.quaternaryrgb + ',0.1)' ],
              borderWidth: 2,
              data: [724, 770, 565, 135, 120],
            },
          ],
        },
        draw: function () {},
        options: {
          plugins: {
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          cutoutPercentage: 80,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
      });
    }
  }

  // Standard bar chart
  _initBarChart() {
    if (document.getElementById('barChart')) {
      const barChart = document.getElementById('barChart').getContext('2d');
      this._barChart = new Chart(barChart, {
        type: 'bar',
        options: {
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 100,
                  min: 300,
                  max: 800,
                  padding: 20,
                  fontColor: Globals.alternate,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {display: false},
              },
            ],
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          labels: ['January', 'February', 'March', 'April'],
          datasets: [
            {
              label: 'Breads',
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              data: [456, 479, 424, 569],
              borderWidth: 2,
            },
            {
              label: 'Patty',
              borderColor: Globals.secondary,
              backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
              data: [364, 504, 605, 400],
              borderWidth: 2,
            },
          ],
        },
      });
    }
  }

  // Standard horizontal bar chart
  _initHorizontalBarChart() {
    if (document.getElementById('horizontalBarChart')) {
      const barChart = document.getElementById('horizontalBarChart').getContext('2d');
      this._horizontalBarChart = new Chart(barChart, {
        type: 'horizontalBar',
        options: {
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 100,
                  min: 300,
                  max: 800,
                  padding: 20,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {display: false},
              },
            ],
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          labels: ['January', 'February', 'March', 'April'],
          datasets: [
            {
              label: 'Breads',
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              data: [456, 479, 324, 569],
              borderWidth: 2,
            },
          ],
        },
      });
    }
  }

  // Standard bubble chart
  _initBubbleChart() {
    if (document.getElementById('bubbleChart')) {
      this._bubbleChart = new Chart(document.getElementById('bubbleChart'), {
        type: 'bubble',
        data: {
          labels: '',
          datasets: [
            {
              borderWidth: 2,
              label: ['Patty'],
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              borderColor: Globals.primary,
              data: [
                {
                  x: 240,
                  y: 15,
                  r: 15,
                },
              ],
            },
            {
              borderWidth: 2,
              label: ['Bread'],
              backgroundColor: 'rgba(' + Globals.quaternaryrgb + ',0.1)',
              borderColor: Globals.quaternary,
              data: [
                {
                  x: 140,
                  y: 8,
                  r: 10,
                },
              ],
            },
            {
              borderWidth: 2,
              label: ['Pastry'],
              backgroundColor: 'rgba(' + Globals.tertiaryrgb + ',0.1)',
              borderColor: Globals.tertiary,
              data: [
                {
                  x: 190,
                  y: 68,
                  r: 20,
                },
              ],
            },
          ],
        },
        options: {
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          title: {
            display: true,
            text: 'Consumption',
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                scaleLabel: {
                  display: true,
                  labelString: 'Fat',
                },
                ticks: {beginAtZero: true, stepSize: 20, min: 0, max: 100, padding: 20},
              },
            ],
            xAxes: [
              {
                scaleLabel: {
                  display: true,
                  labelString: 'Calories',
                },
                ticks: {stepSize: 20, min: 100, max: 300, padding: 20},
              },
            ],
          },
          tooltips: ChartsExtend.ChartTooltip(),
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
        },
      });
    }
  }

  // Rounded bar chart
  _initRoundedBarChart() {
    if (document.getElementById('roundedBarChart')) {
      const barChart = document.getElementById('roundedBarChart').getContext('2d');
      this._roundedBarChart = new Chart(barChart, {
        type: 'bar',
        options: {
          cornerRadius: parseInt(Globals.borderRadiusMd),
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 100,
                  min: 300,
                  max: 800,
                  padding: 20,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {display: false},
              },
            ],
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nop', 'Des'],
          datasets: [
            {
              label: 'Diundang',
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              data: [456, 479, 424, 569, 456, 479, 424, 569, 456, 479, 424, 569],
              borderWidth: 2,
            },
            {
              label: 'Lulus',
              borderColor: Globals.secondary,
              backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
              data: [450, 470, 414, 559, 436, 459, 414, 559, 426, 459, 404, 519],
              borderWidth: 2,
            },
          ],
        },
      });
    }
  }

  _initRoundedBarChart2() {
    if (document.getElementById('roundedBarChart2')) {
      const barChart = document.getElementById('roundedBarChart2').getContext('2d');
      this._roundedBarChart2 = new Chart(barChart, {
        type: 'bar',
        options: {
          cornerRadius: parseInt(Globals.borderRadiusMd),
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 100,
                  min: 300,
                  max: 800,
                  padding: 20,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {display: false},
              },
            ],
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nop', 'Des'],
          datasets: [
            {
              label: 'Pendaftar',
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              data: [456, 479, 424, 569, 456, 479, 424, 569, 456, 479, 424, 569],
              borderWidth: 2,
            },
            {
              label: 'Hadir',
              borderColor: Globals.secondary,
              backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
              data: [450, 470, 414, 559, 436, 459, 414, 559, 426, 459, 404, 519],
              borderWidth: 2,
            },
          ],
        },
      });
    }
  }

  // Rounded horizontal bar chart
  _initHorizontalRoundedBarChart() {
    if (document.getElementById('horizontalRoundedBarChart')) {
      const barChart = document.getElementById('horizontalRoundedBarChart').getContext('2d');
      this._horizontalRoundedBarChart = new Chart(barChart, {
        type: 'horizontalBar',
        options: {
          cornerRadius: parseInt(Globals.borderRadiusMd),
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 100,
                  min: 300,
                  max: 800,
                  padding: 20,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {display: false},
              },
            ],
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          labels: ['January', 'February', 'March', 'April'],
          datasets: [
            {
              label: 'Breads',
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              data: [456, 479, 324, 569],
              borderWidth: 2,
            },
          ],
        },
      });
    }
  }

  // Streaming line chart that updates the data via this._onRefresh
  _initStreamingLineChart() {
    if (document.getElementById('streamingLineChart')) {
      const streamingLineChart = document.getElementById('streamingLineChart').getContext('2d');
      this._streamingLineChart = new Chart(streamingLineChart, {
        type: 'line',
        options: {
          plugins: {
            crosshair: ChartsExtend.Crosshair(),
            datalabels: {display: false},
            streaming: {
              frameRate: 30,
            },
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                gridLines: {display: true, lineWidth: 1, color: Globals.separatorLight, drawBorder: false},
                ticks: {beginAtZero: true, padding: 20, fontColor: Globals.alternate, min: 0, max: 100, stepSize: 25},
              },
            ],
            xAxes: [
              {
                gridLines: {display: false},
                ticks: {display: false},
                type: 'realtime',
                realtime: {
                  duration: 20000,
                  refresh: 1000,
                  delay: 3000,
                  onRefresh: this._onRefresh,
                },
              },
            ],
          },
          legend: {display: false},
          tooltips: ChartsExtend.ChartTooltipForCrosshair(),
        },
        data: {
          labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          datasets: [
            {
              label: '',
              borderColor: Globals.primary,
              pointBackgroundColor: Globals.primary,
              pointBorderColor: Globals.primary,
              pointHoverBackgroundColor: Globals.primary,
              pointHoverBorderColor: Globals.primary,
              borderWidth: 2,
              pointRadius: 2,
              pointBorderWidth: 2,
              pointHoverRadius: 3,
              fill: false,
            },
          ],
        },
      });
    }
  }

  // Streaming bar chart that updates the data via this._onRefresh
  _initStreamingBarChart() {
    if (document.getElementById('streamingBarChart')) {
      const streamingBarChart = document.getElementById('streamingBarChart').getContext('2d');
      this._streamingBarChart = new Chart(streamingBarChart, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [
            {
              label: 'Breads',
              data: [],
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              borderWidth: 2,
            },
          ],
        },
        options: {
          cornerRadius: parseInt(Globals.borderRadiusMd),
          plugins: {
            crosshair: ChartsExtend.Crosshair(),
            datalabels: {display: false},
            streaming: {
              frameRate: 30,
            },
          },
          responsive: true,
          maintainAspectRatio: false,
          title: {
            display: false,
          },
          scales: {
            xAxes: [
              {
                ticks: {display: false},
                type: 'realtime',
                realtime: {
                  duration: 20000,
                  refresh: 1000,
                  delay: 3000,
                  onRefresh: this._onRefresh,
                },
                gridLines: {display: false},
              },
            ],
            yAxes: [
              {
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 25,
                  min: 0,
                  max: 100,
                  padding: 20,
                },
              },
            ],
          },
          tooltips: ChartsExtend.ChartTooltip(),
          legend: {
            display: false,
          },
        },
      });
    }
  }

  // Streaming chart data update method
  _onRefresh(chart) {
    chart.config.data.datasets.forEach(function (dataset) {
      dataset.data.push({
        x: moment(),
        y: Math.round(Math.random() * 50) + 25,
      });
    });
  }

  // Custom vertical tooltip doughnut chart
  _initCustomTooltipDoughnut() {
    if (document.getElementById('verticalTooltipChart')) {
      var ctx = document.getElementById('verticalTooltipChart').getContext('2d');
      this._customTooltipDoughnut = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: '',
              data: [450, 475, 625],
              backgroundColor: ['rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.quaternaryrgb + ',0.1)'],
              borderColor: [Globals.primary, Globals.secondary, Globals.quaternary],
            },
          ],
          labels: ['Burger', 'Cakes', 'Pastry'],
          icons: ['burger', 'cupcake', 'loaf'],
        },
        options: {
          plugins: {
            datalabels: {display: false},
          },
          cutoutPercentage: 70,
          responsive: true,
          maintainAspectRatio: false,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          tooltips: {
            enabled: false,
            custom: function (tooltip) {
              var tooltipEl = this._chart.canvas.parentElement.querySelector('.custom-tooltip');
              if (tooltip.opacity === 0) {
                tooltipEl.style.opacity = 0;
                return;
              }
              tooltipEl.classList.remove('above', 'below', 'no-transform');
              if (tooltip.yAlign) {
                tooltipEl.classList.add(tooltip.yAlign);
              } else {
                tooltipEl.classList.add('no-transform');
              }
              if (tooltip.body) {
                var chart = this;
                var index = tooltip.dataPoints[0].index;
                var icon = tooltipEl.querySelector('.icon');
                icon.style = 'color: ' + tooltip.labelColors[0].borderColor;
                icon.setAttribute('data-cs-icon', chart._data.icons[index]);
                csicons.replace();
                var iconContainer = tooltipEl.querySelector('.icon-container');
                iconContainer.style = 'border-color: ' + tooltip.labelColors[0].borderColor + '!important';
                tooltipEl.querySelector('.text').innerHTML = chart._data.labels[index].toLocaleUpperCase();
                tooltipEl.querySelector('.value').innerHTML = chart._data.datasets[0].data[index];
              }
              var positionY = this._chart.canvas.offsetTop;
              var positionX = this._chart.canvas.offsetLeft;
              tooltipEl.style.opacity = 1;
              tooltipEl.style.left = positionX + tooltip.caretX + 'px';
              tooltipEl.style.top = positionY + tooltip.caretY + 'px';
            },
          },
        },
      });
    }
  }

  // Custom horizontal tooltip bar chart
  _initCustomTooltipBar() {
    if (document.getElementById('horizontalTooltipChart')) {
      var ctx = document.getElementById('horizontalTooltipChart').getContext('2d');
      this._customTooltipBar = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['January', 'February', 'March', 'April'],
          datasets: [
            {
              label: 'Burger',
              icon: 'burger',
              borderColor: Globals.primary,
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              data: [456, 479, 424, 569],
              borderWidth: 2,
            },
            {
              label: 'Patty',
              icon: 'loaf',
              borderColor: Globals.secondary,
              backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
              data: [364, 504, 605, 400],
              borderWidth: 2,
            },
          ],
        },
        options: {
          cornerRadius: parseInt(Globals.borderRadiusMd),
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            position: 'bottom',
            labels: ChartsExtend.LegendLabels(),
          },
          scales: {
            yAxes: [
              {
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 100,
                  min: 300,
                  max: 800,
                  padding: 20,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {display: false},
              },
            ],
          },
          tooltips: {
            enabled: false,
            custom: function (tooltip) {
              var tooltipEl = this._chart.canvas.parentElement.querySelector('.custom-tooltip');
              if (tooltip.opacity === 0) {
                tooltipEl.style.opacity = 0;
                return;
              }
              tooltipEl.classList.remove('above', 'below', 'no-transform');
              if (tooltip.yAlign) {
                tooltipEl.classList.add(tooltip.yAlign);
              } else {
                tooltipEl.classList.add('no-transform');
              }
              if (tooltip.body) {
                var chart = this;
                var index = tooltip.dataPoints[0].index;
                var datasetIndex = tooltip.dataPoints[0].datasetIndex;
                var icon = tooltipEl.querySelector('.icon');
                var iconContainer = tooltipEl.querySelector('.icon-container');
                iconContainer.style = 'border-color: ' + tooltip.labelColors[0].borderColor + '!important';
                icon.style = 'color: ' + tooltip.labelColors[0].borderColor + ';';
                icon.setAttribute('data-cs-icon', chart._data.datasets[datasetIndex].icon);
                csicons.replace();
                tooltipEl.querySelector('.text').innerHTML = chart._data.datasets[datasetIndex].label.toLocaleUpperCase();
                tooltipEl.querySelector('.value').innerHTML = chart._data.datasets[datasetIndex].data[index];
              }
              var positionY = this._chart.canvas.offsetTop;
              var positionX = this._chart.canvas.offsetLeft;
              tooltipEl.style.opacity = 1;
              tooltipEl.style.left = positionX + tooltip.dataPoints[0].x - 75 + 'px';
              tooltipEl.style.top = positionY + tooltip.caretY + 'px';
            },
          },
        },
      });
    }
  }

  // Custom legend bar chart
  _initCustomLegendBar() {
    if (document.getElementById('customLegendBarChart')) {
      const ctx = document.getElementById('customLegendBarChart').getContext('2d');
      this._customLegendBar = new Chart(ctx, {
        type: 'bar',
        options: {
          cornerRadius: parseInt(Globals.borderRadiusMd),
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                stacked: true,
                gridLines: {
                  display: true,
                  lineWidth: 1,
                  color: Globals.separatorLight,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  stepSize: 250,
                  min: 0,
                  max: 1000,
                  padding: 20,
                },
              },
            ],
            xAxes: [
              {
                stacked: true,
                gridLines: {display: false},
                barPercentage: 0.5,
              },
            ],
          },
          legend: false,
          legendCallback: function (chart) {
            const legendContainer = chart.canvas.parentElement.parentElement.querySelector('.custom-legend-container');
            legendContainer.innerHTML = '';
            const legendItem = chart.canvas.parentElement.parentElement.querySelector('.custom-legend-item');
            for (let i = 0; i < chart.data.datasets.length; i++) {
              var itemClone = legendItem.content.cloneNode(true);
              var total = chart.data.datasets[i].data.reduce(function (total, num) {
                return total + num;
              });
              itemClone.querySelector('.text').innerHTML = chart.data.datasets[i].label.toLocaleUpperCase();
              itemClone.querySelector('.value').innerHTML = total;
              itemClone.querySelector('.value').style = 'color: ' + chart.data.datasets[i].borderColor + '!important';
              itemClone.querySelector('.icon-container').style = 'border-color: ' + chart.data.datasets[i].borderColor + '!important';
              itemClone.querySelector('.icon').style = 'color: ' + chart.data.datasets[i].borderColor + '!important';
              itemClone.querySelector('.icon').setAttribute('data-cs-icon', chart.data.icons[i]);
              itemClone.querySelector('a').addEventListener('click', (event) => {
                event.preventDefault();
                const hidden = chart.getDatasetMeta(i).hidden;
                chart.getDatasetMeta(i).hidden = !hidden;
                if (event.currentTarget.classList.contains('opacity-50')) {
                  event.currentTarget.classList.remove('opacity-50');
                } else {
                  event.currentTarget.classList.add('opacity-50');
                }
                chart.update();
              });
              legendContainer.appendChild(itemClone);
            }
            csicons.replace();
          },
          tooltips: {
            enabled: false,
            custom: function (tooltip) {
              var tooltipEl = this._chart.canvas.parentElement.querySelector('.custom-tooltip');
              if (tooltip.opacity === 0) {
                tooltipEl.style.opacity = 0;
                return;
              }
              tooltipEl.classList.remove('above', 'below', 'no-transform');
              if (tooltip.yAlign) {
                tooltipEl.classList.add(tooltip.yAlign);
              } else {
                tooltipEl.classList.add('no-transform');
              }
              if (tooltip.body) {
                var chart = this;
                var index = tooltip.dataPoints[0].index;
                var datasetIndex = tooltip.dataPoints[0].datasetIndex;
                var icon = tooltipEl.querySelector('.icon');
                var iconContainer = tooltipEl.querySelector('.icon-container');
                iconContainer.style = 'border-color: ' + tooltip.labelColors[0].borderColor + '!important';
                icon.style = 'color: ' + tooltip.labelColors[0].borderColor + ';';
                icon.setAttribute('data-cs-icon', chart._data.icons[datasetIndex]);
                csicons.replace();
                tooltipEl.querySelector('.text').innerHTML = chart._data.datasets[datasetIndex].label.toLocaleUpperCase();
                tooltipEl.querySelector('.value').innerHTML = chart._data.datasets[datasetIndex].data[index];
                tooltipEl.querySelector('.value').style = 'color: ' + tooltip.labelColors[0].borderColor + ';';
              }
              var positionY = this._chart.canvas.offsetTop;
              var positionX = this._chart.canvas.offsetLeft;
              tooltipEl.style.opacity = 1;
              tooltipEl.style.left = positionX + tooltip.dataPoints[0].x - 75 + 'px';
              tooltipEl.style.top = positionY + tooltip.caretY + 'px';
            },
          },
        },
        data: {
          labels: ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'ags', 'sep', 'okt', 'nop', 'des'],
          datasets: [
            {
              label: 'ITN',
              backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
              borderColor: Globals.primary,
              borderWidth: 2,
              data: [213, 434, 315, 367, 289, 354, 242, 315, 367, 289, 354, 242],
            },
            {
              label: 'PENUGASAN',
              backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
              borderColor: Globals.secondary,
              borderWidth: 2,
              data: [143, 234, 156, 207, 191, 214, 95, 156, 207, 191, 214, 95],
            },
          ],
          icons: ['book', 'bookmark'],
        },
      });
      this._customLegendBar.generateLegend();
    }
  }

  // Custom legend doughnut chart
  _initCustomLegendDoughnut() {
    if (document.getElementById('customLegendDoughnutChart')) {
      const ctx = document.getElementById('customLegendDoughnutChart').getContext('2d');
      this._customLegendDoughnut = new Chart(ctx, {
        type: 'doughnut',
        options: {
          cutoutPercentage: 70,
          plugins: {
            crosshair: false,
            datalabels: {display: false},
          },
          responsive: true,
          maintainAspectRatio: false,
          title: {
            display: false,
          },
          layout: {
            padding: {
              bottom: 20,
            },
          },
          legend: false,
          legendCallback: function (chart) {
            const legendContainer = chart.canvas.parentElement.parentElement.querySelector('.custom-legend-container');
            legendContainer.innerHTML = '';
            const legendItem = chart.canvas.parentElement.parentElement.querySelector('.custom-legend-item');
            for (let i = 0; i < chart.data.datasets[0].data.length; i++) {
              var itemClone = legendItem.content.cloneNode(true);
              itemClone.querySelector('.text').innerHTML = chart.data.labels[i].toLocaleUpperCase();
              itemClone.querySelector('.value').innerHTML = chart.data.datasets[0].data[i];
              itemClone.querySelector('.value').style = 'color: ' + chart.data.datasets[0].borderColor[i] + '!important';
              itemClone.querySelector('.icon-container').style = 'border-color: ' + chart.data.datasets[0].borderColor[i] + '!important';
              itemClone.querySelector('.icon').style = 'color: ' + chart.data.datasets[0].borderColor[i] + '!important';
              itemClone.querySelector('.icon').setAttribute('data-cs-icon', chart.data.icons[i]);
              itemClone.querySelector('a').addEventListener('click', (event) => {
                event.preventDefault();
                const hidden = chart.getDatasetMeta(0).data[i].hidden;
                chart.getDatasetMeta(0).data[i].hidden = !hidden;
                if (event.currentTarget.classList.contains('opacity-50')) {
                  event.currentTarget.classList.remove('opacity-50');
                } else {
                  event.currentTarget.classList.add('opacity-50');
                }
                chart.update();
              });
              legendContainer.appendChild(itemClone);
            }
            csicons.replace();
          },
          tooltips: ChartsExtend.ChartTooltip(),
        },
        data: {
          datasets: [
            {
              label: '',
              data: [450, 475, 625],
              backgroundColor: ['rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.quaternaryrgb + ',0.1)'],
              borderColor: [Globals.primary, Globals.secondary, Globals.quaternary],
            },
          ],
          labels: ['Burger', 'Cakes', 'Pastry'],
          icons: ['burger', 'cupcake', 'loaf'],
        },
      });
      this._customLegendDoughnut.generateLegend();
    }
  }

  // Small doughnut charts
  _initSmallDoughnutCharts() {
    if (document.getElementById('smallDoughnutChart1')) {
      this._smallDoughnutChart1 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart1', [800,200], 'Biaya Diklat Kelola Unit real');
    }
    if (document.getElementById('smallDoughnutChart2')) {
      this._smallDoughnutChart2 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart2', [850,150], 'Biaya Diklat Dikelola Unit');
    }
    if (document.getElementById('smallDoughnutChart3')) {
      this._smallDoughnutChart3 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart3', [500, 500], 'Biaya Diklat Dikelola KP real');
    }
    if (document.getElementById('smallDoughnutChart4')) {
      this._smallDoughnutChart4 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart4', [550, 450], 'Biaya Diklat Dikelola KP');
    }
    if (document.getElementById('smallDoughnutChart5')) {
      this._smallDoughnutChart5 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart5', [200, 26], 'UIP KBB');
    }
    if (document.getElementById('smallDoughnutChart6')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart6', [1300, 28], 'UIKL KAL');
    }
    if (document.getElementById('smallDoughnutChart7')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart7', [15, 2], 'Perempuan Nominated Talent');
    }
    if (document.getElementById('smallDoughnutChart8')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart8', [17, -2], 'Milenial Nominated Talent');
    }
    if (document.getElementById('smallDoughnutChart9')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart9', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart10')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart10', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart11')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart11', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart12')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart12', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart13')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart13', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart14')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart14', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart15')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart15', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart16')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart16', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart17')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart17', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart18')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart18', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart19')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart19', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart20')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart20', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart21')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart21', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart22')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart22', [13, 2], 'Making Digital Talent BUMN');
    }
    if (document.getElementById('smallDoughnutChart23')) {
      this._smallDoughnutChart6 = ChartsExtend.SmallDoughnutChart('smallDoughnutChart23', [13, 2], 'Making Digital Talent BUMN');
    }
  }

  // Small line charts
  _initSmallLineCharts() {
    this._smallLineChart1 = ChartsExtend.SmallLineChart('smallLineChart1', {
      labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
      datasets: [
        {
          label: '',
          data: [9415.1, 9430.3, 9436.8, 9471.5, 9467.2],
          icons: ['chevron-bottom', 'chevron-top', 'chevron-top', 'chevron-top', 'chevron-bottom'],
          borderColor: Globals.primary,
          pointBackgroundColor: Globals.primary,
          pointBorderColor: Globals.primary,
          pointHoverBackgroundColor: Globals.foreground,
          pointHoverBorderColor: Globals.primary,
          borderWidth: 2,
          pointRadius: 2,
          pointBorderWidth: 2,
          pointHoverBorderWidth: 2,
          pointHoverRadius: 5,
          fill: false,
        },
      ],
    });

    this._smallLineChart2 = ChartsExtend.SmallLineChart('smallLineChart2', {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
      datasets: [
        {
          label: 'ETH / USD',
          data: [325.3, 310.4, 338.2, 347.1, 348.0],
          icons: ['chevron-top', 'chevron-bottom', 'chevron-top', 'chevron-top', 'chevron-top'],
          borderColor: Globals.primary,
          pointBackgroundColor: Globals.primary,
          pointBorderColor: Globals.primary,
          pointHoverBackgroundColor: Globals.foreground,
          pointHoverBorderColor: Globals.primary,
          borderWidth: 2,
          pointRadius: 2,
          pointBorderWidth: 2,
          pointHoverBorderWidth: 2,
          pointHoverRadius: 5,
          fill: false,
        },
      ],
    });

    this._smallLineChart3 = ChartsExtend.SmallLineChart('smallLineChart3', {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
      datasets: [
        {
          label: 'LTC / USD',
          data: [43.3, 42.8, 45.3, 45.3, 41.4],
          icons: ['chevron-top', 'chevron-bottom', 'chevron-top', 'circle', 'chevron-top'],
          borderColor: Globals.primary,
          pointBackgroundColor: Globals.primary,
          pointBorderColor: Globals.primary,
          pointHoverBackgroundColor: Globals.foreground,
          pointHoverBorderColor: Globals.primary,
          borderWidth: 2,
          pointRadius: 2,
          pointBorderWidth: 2,
          pointHoverBorderWidth: 2,
          pointHoverRadius: 5,
          fill: false,
        },
      ],
    });

    this._smallLineChart4 = ChartsExtend.SmallLineChart('smallLineChart4', {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
      datasets: [
        {
          label: 'XRP / USD',
          data: [0.25, 0.253, 0.268, 0.243, 0.243],
          icons: ['chevron-top', 'chevron-top', 'chevron-top', 'chevron-bottom', 'circle'],
          borderColor: Globals.primary,
          pointBackgroundColor: Globals.primary,
          pointBorderColor: Globals.primary,
          pointHoverBackgroundColor: Globals.foreground,
          pointHoverBorderColor: Globals.primary,
          borderWidth: 2,
          pointRadius: 2,
          pointBorderWidth: 2,
          pointHoverBorderWidth: 2,
          pointHoverRadius: 5,
          fill: false,
        },
      ],
    });
  }
}
