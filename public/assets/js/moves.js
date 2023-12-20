const script = document.getElementById('theScript');
const scheme = script.getAttribute('data-scheme');
const host = script.getAttribute('data-host');
const port = script.getAttribute('data-port');

const gameForm = document.getElementById('gameForm');
const tutor = document.getElementById('tutor');

gameForm.querySelector('button').onclick = (event) => {
  event.preventDefault();

  while (tutor.firstChild) {
    tutor.removeChild(tutor.firstChild);
  }

  document.getElementById('spinner').style.display = 'block';

  const promise1 = fetch(`${scheme}://${host}:${port}/api/tutor/pgn`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      fen: gameForm.querySelector('input').value
    })
  })
  .then(res => res.json())
  .then(res => {
    const p = document.createElement('p');
    const pgn = `${res.pgn} is a good move for these reasons: `;
    p.appendChild(document.createTextNode(pgn + res.paragraph));
    tutor.appendChild(p);
  });

  Promise.all([promise1])
  .catch(error => {
    alert('Whoops! Something went wrong, please try again.');
  })
  .finally(() => {
    document.getElementById('spinner').style.display = 'none';
  });
}
