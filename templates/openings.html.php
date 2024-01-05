<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChessCoach — Chess Openings</title>
    <meta name="description" content="A: Flank Openings. B: Semi-Open Games other than the French Defense. C: Open Games and the French Defense. D: Closed Games and Semi-Closed Games. E: Indian Defenses.">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles.min.css">
  </head>
  <body>
    <?php require __DIR__ . '/partial/nav.html.php'; ?>

    <div class="container my-4">
      <div class="row p-3">
        <div class="col-lg-8 px-0">
          <article>
            <h1>Openings</h1>
            <p class="fs-5 fw-bold">
              Did you know that a chess game can be plotted in terms of balance?
            </p>
            <p>
              +1 is the best possible evaluation for White and -1 the best possible
              evaluation for Black. Both forces being set to 0 means they're balanced.
            </p>
            <form id="openingForm">
              <div class="form-group">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Select a chess opening</option>
                  <option value="a">A: Flank Openings</option>
                  <option value="b">B: Semi-Open Games other than the French Defense</option>
                  <option value="c">C: Open Games and the French Defense</option>
                  <option value="d">D: Closed Games and Semi-Closed Games</option>
                  <option value="e">E: Indian Defenses</option>
                </select>
              </div>
            </form>
            <table class="table table-hover mt-2">
              <tbody></tbody>
            </table>
            <p>
              Also, here is a list with common chess openings just in case you are not
              too sure about which one to select.
            </p>
            <div class="list-group">
              <a href="/opening/a10/english-opening" class="list-group-item list-group-item-action">A10 — English Opening</a>
              <a href="/opening/b10/caro-kann-defense" class="list-group-item list-group-item-action">B10 — Caro-Kann Defense</a>
              <a href="/opening/b20/sicilian-defense" class="list-group-item list-group-item-action">B20 — Sicilian Defense</a>
              <a href="/opening/c00/french-defense" class="list-group-item list-group-item-action">C00 — French Defense</a>
              <a href="/opening/c50/italian-game" class="list-group-item list-group-item-action">C50 — Italian Game</a>
              <a href="/opening/c60/ruy-lopez" class="list-group-item list-group-item-action">C60 — Ruy Lopez</a>
              <a href="/opening/d02/queens-pawn-game-london-system" class="list-group-item list-group-item-action">D02 — Queen's Pawn Game: London System</a>
              <a href="/opening/d06/queens-gambit" class="list-group-item list-group-item-action">D06 — Queen's Gambit</a>
              <a href="/opening/e12/queens-indian-defense" class="list-group-item list-group-item-action">E12 — Queen's Indian Defense</a>
              <a href="/opening/e61/kings-indian-defense" class="list-group-item list-group-item-action">E61 — King's Indian Defense</a>
            </div>
          </article>
        </div>
        <div class="col-lg-4 p-5">
          <?php require __DIR__ . '/partial/social.html.php'; ?>
        </div>
      </div>
    </div>

    <div class="container">
      <?php require __DIR__ . '/partial/footer.html.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script id="theScript" src="assets/js/openings.min.js" data-scheme="<?php echo $scheme; ?>" data-host="<?php echo $host; ?>" data-port="<?php echo $port; ?>"></script>
  </body>
</html>
