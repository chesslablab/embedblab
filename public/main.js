const gameForm = document.getElementById('gameForm');

const charts = document.getElementById('charts');

gameForm.querySelector('button').onclick = async (event) => {
  event.preventDefault();
  await fetch(`http://localhost:8080/api/heuristics`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      movetext: gameForm.querySelector('textarea').value
    })
  })
  .then(res => res.json())
  .then(res => {
    res.evalNames.forEach((item, i) => {
      const chart = document.createElement('canvas');
      charts.appendChild(chart);
      const data = res.balance.map((value, index) => value[i]);
      new Chart(chart, {
        type: 'line',
        data: {
          labels: data,
          datasets: [{
            label: item,
            data: data,
            borderWidth: 2,
            tension: 0.3
          }]
        },
        options: {
          elements: {
            point:{
              radius: 0
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              min: -1,
              max: 1
            }
          }
        }
      });
    });
  })
  .catch(error => {
    alert('Whoops! Something went wrong, please try again.');
  });
}
