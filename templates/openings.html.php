<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php require __DIR__ . '/partial/nav.html.php'; ?>

    <div class="container my-5">
      <h1>Openings</h1>
      <div class="col-lg-12 px-0">
        <p>
          A chess game can be plotted in terms of balance. +1 is the best
          possible evaluation for White and -1 the best possible evaluation for
          Black. Both forces being set to 0 means they're balanced.
        </p>
        <form id="openingForm">
          <div class="form-group">
            <select class="form-select" aria-label="Default select example">
              <option selected>Select an option</option>
              <option value="A">A: Flank Openings</option>
              <option value="B">B: Semi-Open Games other than the French Defense</option>
              <option value="C">C: Open Games and the French Defense</option>
              <option value="D">D: Closed Games and Semi-Closed Games</option>
              <option value="E">E: Indian Defenses</option>
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
    <script src="openings.js" type="module"></script>
  </body>
</html>
