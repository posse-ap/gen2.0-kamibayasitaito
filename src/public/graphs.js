// 学習時間棒グラフ

// const bar_data_array = Object.values(bar_data);

const column = document.getElementById('column').getContext('2d');

var gradient = column.createLinearGradient(0, 0, 0, 300);
gradient.addColorStop(0, 'rgba(54, 206, 254, 1)');
gradient.addColorStop(1, 'rgba(17,115,189, 1)');


const myColumnChart = new Chart(column, {
    type: 'bar',
    data: {
        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
        datasets: [{
            data: bar_data,
            backgroundColor: gradient,
            borderRadius: 50,
            borderSkipped: false,
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          x: {
            grid: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              color: '#bdd1e1',
              autoSkip: false,
              min: 1,
              max: 30,
              padding: 0,
              // 一個おきに表示させるための処理
              callback: function(val, index) {
                return index % 2 === 1 ? this.getLabelForValue(val) : '';
              },
              maxRotation: 0,
              minRotation: 0
            },
          },
          y: {
            grid: {
              display: false,
              drawBorder: false
            },
            max: 8,
            min: 0,
            ticks: {
              stepSize: 2, 
              callback: function(value) {
                return value + 'h';
              },
              color: '#bdd1e1',
            },
          },
        },
        plugins: {
          legend: {
            display: false
          }
        }
    },
    
});

// STUDY LANGUAGE

// const langs_data_array = Object.values(langs_data);
// const langs_labels_array = Object.values(langs_labels);
// const langs_colours_array = Object.values(langs_colours);

const donut1 = document.getElementById('donut_lang').getContext('2d');

const myFirstDonutChart = new Chart(donut1, {
    type: 'doughnut',
    data: {
        labels: langs_labels,
        datasets: [{
            data: langs_data,
            backgroundColor: langs_colours,
            borderColor: 'transparent'
        }],
    },
    plugins: [ChartDataLabels],

    options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          },
          datalabels: {
            display: function(context) {
              return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
            },
            color: '#fff',
            formatter: (value, ctx) => {
              let sum = month;
              let percentage = (value*100 / sum).toFixed(0)+"%";
              if (value != 0) {
                return percentage;
              }
            },
          }
        },
    },
    
});

// STUDY CONTENT

// const contents_data_array = Object.values(contents_data);
// const contents_labels_array = Object.values(contents_labels);
// const contents_colours_array = Object.values(contents_colours);

const donut2 = document.getElementById('donut_content').getContext('2d');

const mySecondDonutChart = new Chart(donut2, {
    type: 'doughnut',
    data: {
        labels: contents_labels,
        datasets: [{
            data: contents_data,
            backgroundColor: contents_colours,
            borderColor: 'transparent'
        }],
    },
    plugins: [ChartDataLabels],
    options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          },
          datalabels: {
            display: function(context) {
              return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
            },
            color: '#fff',
            formatter: (value, ctx) => {
              let sum = month;
              let percentage = (value*100 / sum).toFixed(0)+"%";
              return percentage;
            },
          }
        },
    },
    
});
