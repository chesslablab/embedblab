const gameForm = document.getElementById('gameForm');

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
    // TODO
    console.log(res);
  })
  .catch(error => {
    alert('Whoops! Something went wrong, please try again.');
  });
}
