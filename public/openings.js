import { openings } from './data.js';

const openingForm = document.getElementById('openingForm');
const tbody = document.querySelector('tbody');

openingForm.querySelector('select').onchange = async (event) => {
  event.preventDefault();

  while (tbody.firstChild) {
    tbody.removeChild(tbody.firstChild);
  }

  let j = 1;
  openings.forEach(item => {
    if (item.eco.startsWith(event.target.value)) {
      const tr = document.createElement('tr');

      const th = document.createElement('th');
      th.setAttribute("scope", "row");

      const tdEco = document.createElement('td');
      const tdName = document.createElement('td');
      const tdMovetext = document.createElement('td');

      const thText = document.createTextNode(j);

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

      j++;
    }
  });
}
