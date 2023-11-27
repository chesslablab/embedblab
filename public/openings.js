import { openings } from './data.js';

const openingForm = document.getElementById('openingForm');

openingForm.querySelector('select').onchange = async (event) => {
  event.preventDefault();

  // TODO: Display the selected openings in an HTML table
  console.log(event.target.value);
  console.log(openings);
}
