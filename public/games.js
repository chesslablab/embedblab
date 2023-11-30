const script = document.querySelector('script[src="games.js"]');
const prot = script.getAttribute('data-prot');
const host = script.getAttribute('data-host');
const port = script.getAttribute('data-port');

const gameForm = document.getElementById('gameForm');
const charts = document.getElementById('charts');
const allEqual = arr => arr.every(val => val === arr[0]);

gameForm.querySelector('button').onclick = (event) => {
  event.preventDefault();
  while (charts.firstChild) {
    charts.removeChild(charts.firstChild);
  }
  document.getElementById('submitBtn').style.display = 'none';
  document.getElementById('loadingBtn').style.display = 'block';
  fetch(`${prot}://${host}:${port}/api/heuristics`, {
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
      const data = res.balance.map((value, index) => value[i]);
      if (!allEqual(data)) {
        const div = document.createElement('div');
        const canvas = document.createElement('canvas');
        div.appendChild(canvas);
        charts.appendChild(div);

        new Chart(canvas, {
          type: 'line',
          data: {
            labels: data,
            datasets: [{
              label: item,
              data: data,
              borderWidth: 2.25,
              tension: 0.25,
              borderColor: '#0a0a0a'
            }]
          },
          options: {
            animation: false,
            elements: {
              point:{
                radius: 0
              }
            },
            scales: {
              y: {
                ticks: {
                  display: false
                },
                grid: {
                  display: false
                },
                border: {
                  display: false
                },
                beginAtZero: true,
                min: -1.1,
                max: 1.1
              },
              x: {
                ticks: {
                  display: false
                },
                grid: {
                  display: false
                },
                border: {
                  display: false
                }
              }
            },
            plugins: {
              legend: {
                position: 'bottom',
                labels: {
                  boxWidth: 0,
                  font: {
                    size: 16
                  }
                }
              }
            }
          }
        });
      }
    });
  })
  .catch(error => {
    alert('Whoops! Something went wrong, please try again.');
  })
  .finally(() => {
    document.getElementById('loadingBtn').style.display = 'none';
    document.getElementById('submitBtn').style.display = 'block';
    document.getElementById('downloadBtn').style.display = 'block';
  });
}

document.getElementById('downloadBtn').onclick = (event) => {
  event.preventDefault();
  html2canvas(document.getElementById('charts')).then(canvas => {
    const a = document.createElement('a');
    a.href = canvas.toDataURL('image/jpeg');
    a.download = 'chessvisual.jpeg';
    a.click();
  });
}
