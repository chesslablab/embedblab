const gameForm = document.getElementById('gameForm');

const materialChart = document.getElementById('materialChart');
const centerChart = document.getElementById('centerChart');
const connectivityChart = document.getElementById('connectivityChart');
const spaceChart = document.getElementById('spaceChart');
const pressureChart = document.getElementById('pressureChart');
const kingSafetyChart = document.getElementById('kingSafetyChart');

const options = {
  scales: {
    y: {
      beginAtZero: true,
      min: -1,
      max: 1
    }
  }
}

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
    const material = res.balance.map((value, index) => value[0]);
    const center = res.balance.map((value, index) => value[1]);
    const connectivity = res.balance.map((value, index) => value[2]);
    const space = res.balance.map((value, index) => value[3]);
    const pressure = res.balance.map((value, index) => value[4]);
    const kingSafety = res.balance.map((value, index) => value[5]);

    new Chart(materialChart, {
      type: 'line',
      data: {
        labels: material,
        datasets: [{
          label: 'Material',
          data: material,
          borderWidth: 1
        }]
      },
      options: options
    });

    new Chart(centerChart, {
      type: 'line',
      data: {
        labels: center,
        datasets: [{
          label: 'Center',
          data: center,
          borderWidth: 1
        }]
      },
      options: options
    });

    new Chart(connectivityChart, {
      type: 'line',
      data: {
        labels: connectivity,
        datasets: [{
          label: 'Connectivity',
          data: connectivity,
          borderWidth: 1
        }]
      },
      options: options
    });

    new Chart(spaceChart, {
      type: 'line',
      data: {
        labels: space,
        datasets: [{
          label: 'Space',
          data: space,
          borderWidth: 1
        }]
      },
      options: options
    });

    new Chart(pressureChart, {
      type: 'line',
      data: {
        labels: pressure,
        datasets: [{
          label: 'Pressure',
          data: pressure,
          borderWidth: 1
        }]
      },
      options: options
    });

    new Chart(kingSafetyChart, {
      type: 'line',
      data: {
        labels: kingSafety,
        datasets: [{
          label: 'King Safety',
          data: kingSafety,
          borderWidth: 1
        }]
      },
      options: options
    });

    // TODO: Add more charts
    console.log(res);
  })
  .catch(error => {
    alert('Whoops! Something went wrong, please try again.');
  });
}
