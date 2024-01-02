const script = document.getElementById('theScript');
const scheme = script.getAttribute('data-scheme');
const host = script.getAttribute('data-host');
const port = script.getAttribute('data-port');

const gameForm = document.getElementById('gameForm');
const tutor = document.getElementById('tutor');
const chessboard = document.getElementById('chessboard');
const fen = document.getElementById('fen');

gameForm.querySelector('button').onclick = (event) => {
  event.preventDefault();

  while (tutor.firstChild) {
    tutor.removeChild(tutor.firstChild);
  }
  while (chessboard.firstChild) {
    chessboard.removeChild(chessboard.firstChild);
  }

  document.getElementById('fen').style.display = 'none';
  document.getElementById('tutor').style.display = 'none';
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
    const paragraph1 = document.createElement('p');
    const paragraph2 = document.createElement('p');
    paragraph1.appendChild(document.createTextNode(`Here is a description of this position. ${res.fenExplanation}`));
    paragraph2.appendChild(document.createTextNode(`${res.pgn} is a good move! It changes the position as described next. ${res.pgnExplanation}`));
    tutor.appendChild(paragraph1);
    tutor.appendChild(paragraph2);
    fen.querySelector('input').value = res.fen;
  });

  const promise2 = fetch(`${scheme}://${host}:${port}/api/download/image`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      fen: gameForm.querySelector('input').value
    })
  })
  .then(res => {
    res.blob().then(blobRes => {
      const urlCreator = window.URL || window.webkitURL;
      const img = document.createElement('img');
      img.src = urlCreator.createObjectURL(blobRes);
      img.classList.add("img-fluid");
      chessboard.appendChild(img);
    });
  });

  Promise.all([promise1, promise2])
  .then(() => {
    document.getElementById('fen').style.display = 'flex';
    document.getElementById('tutor').style.display = 'block';
  })
  .catch(error => {
    alert('Whoops! Something went wrong, please try again.');
  })
  .finally(() => {
    document.getElementById('spinner').style.display = 'none';
  });
}

fen.querySelector('button').onclick = (event) => {
  const text = fen.querySelector('input').value;
  navigator.clipboard.writeText(text);
}
