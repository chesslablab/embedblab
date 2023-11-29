<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles.css">
  </head>
  <body>
    <?php require __DIR__ . '/partial/nav.html.php'; ?>

    <div class="container my-5">
      <h1>Openings</h1>
      <div class="col-lg-12 px-0">
        <p class="fs-5">
          Did you know that a chess game can be plotted in terms of balance?
        </p>
        <p>
          +1 is the best possible evaluation for White and -1 the best possible
          evaluation for Black. Both forces being set to 0 means they're balanced.
        </p>
        <p class="fw-bold"><?php echo strtoupper($eco); ?> — <?php echo $name; ?></p>
        <p id="movetext" class="fw-bold"><?php echo $movetext; ?></p>
        <div class="d-flex justify-content-center">
          <div id="loadingSpinner" class="spinner-border" role="status">
            <span class="sr-only"></span>
          </div>
        </div>
        <div id="charts" class="container mt-2"></div>
        <button id="downloadBtn" class="btn btn-secondary w-100 mt-2">Download</button>
      </div>
    </div>

    <div class="container">
      <?php require __DIR__ . '/partial/footer.html.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../opening.js" type="module"></script>
  </body>
</html>
