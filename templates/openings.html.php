<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChessCoach — Chess Openings</title>
    <meta name="description" content="A: Flank Openings. B: Semi-Open Games other than the French Defense. C: Open Games and the French Defense. D: Closed Games and Semi-Closed Games. E: Indian Defenses.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles.css">
  </head>
  <body>
    <?php require __DIR__ . '/partial/nav.html.php'; ?>

    <div class="container my-5">
      <h1>Openings</h1>
      <hr>
      <div class="col-lg-8 px-0">
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
              <option selected>Select an option</option>
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
      </div>
    </div>

    <div class="container">
      <?php require __DIR__ . '/partial/footer.html.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script id="theScript" src="assets/js/openings.js" data-scheme="<?php echo $scheme; ?>" data-host="<?php echo $host; ?>" data-port="<?php echo $port; ?>"></script>
  </body>
</html>
