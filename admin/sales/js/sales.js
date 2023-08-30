const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];
  let data2022 = {
      label: '2022',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 0, 0)',
      data: [10, 5, 5, 4, 10, 5, 20],
  };

  let data2023 = {
      label: '2023',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(0, 0, 255)',
      data: [0, 10, 5, 2, 20, 30, 45]      
    };   

  const data = {
    labels: labels,
    datasets: [data2022,data2023]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
      maintainAspectRatio :false,
      scales:{
        y:{
         stacked:true  //누적되서 보여지는 파란선
        }
      }
    }
  };

const myChart = new Chart(
    document.getElementById('line-chart'),
    config
  );

  
  const ctx = document.getElementById('bar_chart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
        maintainAspectRatio :false,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });