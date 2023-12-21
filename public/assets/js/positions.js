const script = document.getElementById('theScript');
const scheme = script.getAttribute('data-scheme');
const host = script.getAttribute('data-host');
const port = script.getAttribute('data-port');

const gameForm = document.getElementById('gameForm');
const tutor = document.getElementById('tutor');
const chessboard = document.getElementById('chessboard');

gameForm.querySelector('button').onclick = (event) => {
  event.preventDefault();

  while (tutor.firstChild) {
    tutor.removeChild(tutor.firstChild);
  }
  while (chessboard.firstChild) {
    chessboard.removeChild(chessboard.firstChild);
  }

  document.getElementById('tutor').style.display = 'none';
  document.getElementById('spinner').style.display = 'block';

  const promise1 = fetch(`${scheme}://${host}:${port}/api/tutor/fen`, {
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
    p.appendChild(document.createTextNode(res.paragraph));
    tutor.appendChild(p);
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
  .catch(error => {
    alert('Whoops! Something went wrong, please try again.');
  })
  .finally(() => {
    document.getElementById('spinner').style.display = 'none';
    document.getElementById('tutor').style.display = 'block';
  });
}
