<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo strtoupper($eco); ?> — <?php echo $name; ?></title>
    <meta name="description" content="<?php echo $movetext; ?>">

    <meta property="og:title" content="<?php echo strtoupper($eco); ?> — <?php echo $name; ?>">
    <meta property="og:description" content="<?php echo $movetext; ?>">
    <meta property="og:url" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/opening/<?php echo $eco; ?>/<?php echo $slug; ?>">
    <meta property="og:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/assets/img/<?php echo $output; ?>">
    <meta property="og:site_name" content="ChessCoach">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo strtoupper($eco); ?> — <?php echo $name; ?>">
    <meta name="twitter:description" content="<?php echo $movetext; ?>">
    <meta name="twitter:site" content="@programarivm">
    <meta name="twitter:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/assets/img/<?php echo $output; ?>">
    <meta name="twitter:creator" content="@programarivm">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/spinner.css">
  </head>
  <body>
    <div id="spinner"></div>
    <?php require __DIR__ . '/partial/nav.html.php'; ?>

    <div class="container my-5">
      <div class="row">
        <div class="col-lg-8 px-0">
          <article>
            <h1>Openings</h1>
            <p class="fs-5 fw-bold">
              <?php echo strtoupper($eco); ?> — <?php echo $name; ?>
            </p>
            <p id="movetext" class="fw-bold">
              <?php echo $movetext; ?>
            </p>
            <p>
              <?php echo $paragraph; ?>
            </p>
            <img src="/assets/img/<?php echo $output; ?>" class="img-fluid mx-auto d-block mt-4" alt="<?php echo $name; ?>">
            <div id="charts" class="container mt-4"></div>
            <button id="downloadBtn" class="btn btn-secondary w-100 mt-2">Download</button>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script id="theScript" src="../../assets/js/opening.js" type="module" data-scheme="<?php echo $scheme; ?>" data-host="<?php echo $host; ?>" data-port="<?php echo $port; ?>"></script>
  </body>
</html>
