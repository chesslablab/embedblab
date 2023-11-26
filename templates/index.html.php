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
      <h1>Data visualization analysis</h1>
      <div class="col-lg-12 px-0">
        <p>
          A chess game can be plotted in terms of balance. +1 is the best
          possible evaluation for White and -1 the best possible evaluation for
          Black. Both forces being set to 0 means they're balanced.
        </p>
        <form id="gameForm">
          <div class="form-group">
            <textarea class="form-control" rows="4" placeholder="e.g. 1.e4 c5 2.Nf3 d6 3.d4 cxd4 4.Nxd4 Nf6 5.Nc3 a6"></textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
          <button class="btn btn-primary mt-3" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
          </button>
        </form>
        <div id="charts" class="container mt-3"></div>
      </div>
    </div>

    <div class="container">
      <?php require __DIR__ . '/partial/footer.html.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
