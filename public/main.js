const gameForm = document.getElementById('gameForm');

gameForm.querySelector('button').onclick = (event) => {
  // TODO: Send the data to the /api/heuristics endpoint
  console.log(gameForm.querySelector('textarea').value);
  event.preventDefault();
}
