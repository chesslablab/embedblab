const openingForm = document.getElementById('openingForm');
const tbody = document.querySelector('tbody');

openingForm.querySelector('select').onchange = async (event) => {
  event.preventDefault();

  while (tbody.firstChild) {
    tbody.removeChild(tbody.firstChild);
  }

  fetch(`http://localhost:8080/api/openings/${event.target.value}`)
    .then(res => res.json())
    .then(res => {
      res.forEach((item, i) => {
        const tr = document.createElement('tr');

        tr.addEventListener('click', function(event) {
          window.location.href = `opening/${item.eco.toLowerCase()}/${item.slug}`;
        });

        const th = document.createElement('th');
        th.setAttribute("scope", "row");

        const tdEco = document.createElement('td');
        const tdName = document.createElement('td');
        const tdMovetext = document.createElement('td');

        const thText = document.createTextNode(i + 1);

        const tdEcoText = document.createTextNode(item.eco);
        const tdNameText = document.createTextNode(item.name);
        const tdMovetextText = document.createTextNode(item.movetext);

        th.appendChild(thText);
        tdEco.appendChild(tdEcoText);
        tdName.appendChild(tdNameText);
        tdMovetext.appendChild(tdMovetextText);

        tr.appendChild(th);
        tr.appendChild(tdEco);
        tr.appendChild(tdName);
        tr.appendChild(tdMovetext);

        tbody.appendChild(tr);
      });
    })
    .catch(error => {
      alert('Whoops! Something went wrong, please try again.');
    });
}
