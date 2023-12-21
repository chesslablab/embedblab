const script = document.getElementById('theScript');
const scheme = script.getAttribute('data-scheme');
const host = script.getAttribute('data-host');
const port = script.getAttribute('data-port');

const gameForm = document.getElementById('gameForm');
const tutor = document.getElementById('tutor');
const charts = document.getElementById('charts');
const allEqual = arr => arr.every(val => val === arr[0]);

gameForm.querySelector('button').onclick = (event) => {
  event.preventDefault();

  while (tutor.firstChild) {
    tutor.removeChild(tutor.firstChild);
  }
  while (charts.firstChild) {
    charts.removeChild(charts.firstChild);
  }

  document.getElementById('tutor').style.display = 'none';
  document.getElementById('downloadBtn').style.display = 'none';
  document.getElementById('spinner').style.display = 'block';

  const promise1 = fetch(`${scheme}://${host}:${port}/api/heuristics`, {
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
  });

  const promise2 = fetch(`${scheme}://${host}:${port}/api/tutor/fen`, {
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
    const p = document.createElement('p');
    p.appendChild(document.createTextNode(res.paragraph));
    tutor.appendChild(p);
  });

  Promise.all([promise1, promise2])
  .catch(error => {
    alert('Whoops! Something went wrong, please try again.');
  })
  .finally(() => {
    document.getElementById('spinner').style.display = 'none';
    document.getElementById('downloadBtn').style.display = 'block';
    document.getElementById('tutor').style.display = 'block';
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
