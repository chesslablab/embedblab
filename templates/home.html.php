<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChessCoach — Chess Positions Explained</title>
    <meta name="description" content="ChessCoach describes a chess position both verbally and visually helping you improve your chess thinking process.">

    <meta property="og:title" content="ChessCoach — Chess Positions Explained">
    <meta property="og:description" content="ChessCoach describes a chess position both verbally and visually helping you improve your chess thinking process.">
    <meta property="og:url" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>">
    <meta property="og:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">
    <meta property="og:site_name" content="ChessCoach">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="ChessCoach — Chess Positions Explained">
    <meta name="twitter:description" content="ChessCoach describes a chess position both verbally and visually helping you improve your chess thinking process.">
    <meta name="twitter:site" content="@programarivm">
    <meta name="twitter:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">
    <meta name="twitter:creator" content="@programarivm">

    <script src="https://cdn.jsdelivr.net/npm/@mliebelt/pgn-viewer@1.6.6/lib/dist.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css">
    <link rel="stylesheet" href="/assets/css/spinner.min.css">
  </head>
  <body>
    <div id="spinner"></div>
    <?php require __DIR__ . '/partial/nav.html.php'; ?>

    <div class="container my-4">
      <div class="row p-3">
        <div class="col-lg-8 px-0">
          <article>
            <h1>Chess Coach</h1>
            <p class="fs-5 fw-bold">
              Explains a chess position verbally and visually
            </p>
            <p>
              Chess beginners often think they can checkmate the opponent's king
              quickly. However, there are so many different things to consider in
              order to understand a position. ChessCoach helps you improve your
              chess thinking process. Check it out for yourself right now!
            </p>
            <form id="gameForm">
              <div class="form-group">
                <label for="game" class="form-label"><b>Enter a game in SAN format</b>:</label>
                <textarea id="game" class="form-control" rows="5" placeholder="e.g. 1.e4 c5 2.Nf3 d6 3.d4 cxd4 4.Nxd4 Nf6 5.Nc3 a6" spellcheck="false"></textarea>
              </div>
              <button id="submitBtn" type="submit" class="btn btn-primary w-100 mt-2">
                <i class="bi bi-chat-square-text"></i> Explain
              </button>
            </form>
            <div class="d-flex justify-content-center mt-4">
              <div id="board"></div>
            </div>
            <div id="tutor"></div>
            <div id="charts" class="container mt-2"></div>
            <button id="downloadBtn" class="btn btn-primary w-100 mt-2">
              <i class="bi bi-download"></i> Download Charts
            </button>
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
    <script id="theScript" src="assets/js/home.min.js" data-scheme="<?php echo $scheme; ?>" data-host="<?php echo $host; ?>" data-port="<?php echo $port; ?>"></script>
  </body>
</html>
