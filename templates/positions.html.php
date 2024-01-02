<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChessCoach — Positions</title>
    <meta name="description" content="Explained in terms of chess concepts: Center, space, outpost squares, forks, pins, pressure, connectivity of the pieces, direct opposition, bad bishops, king safety, piece protection, and more!">

    <meta property="og:title" content="ChessCoach — Positions">
    <meta property="og:description" content="Explained in terms of chess concepts: Center, space, outpost squares, forks, pins, pressure, connectivity of the pieces, direct opposition, bad bishops, king safety, piece protection, and more!">
    <meta property="og:url" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/positions">
    <meta property="og:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">
    <meta property="og:site_name" content="ChessCoach">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="ChessCoach — Positions">
    <meta name="twitter:description" content="Explained in terms of chess concepts: Center, space, outpost squares, forks, pins, pressure, connectivity of the pieces, direct opposition, bad bishops, king safety, piece protection, and more!">
    <meta name="twitter:site" content="@programarivm">
    <meta name="twitter:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">
    <meta name="twitter:creator" content="@programarivm">

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
            <h1>Positions</h1>
            <p class="fs-5 fw-bold">
              Explained in terms of concepts like a chess tutor would do
            </p>
            <p>
              Center, space, outpost squares, forks, pins, pressure, connectivity
              of the pieces, direct opposition, bad bishops, king safety, piece
              protection, and more! ChessCoach can also spot weaknesses in the pawn
              structure like isolated pawns, backward pawns and doubled pawns.
            </p>
            <form id="gameForm">
              <label for="game" class="form-label"><b>Enter a position in FEN format</b>:</label>
              <div class="input-group mb-3">
                <input type="text" id="game" class="form-control" placeholder="e.g. 8/5k2/4n3/8/8/1BK5/1B6/8 w - - 0 1" spellcheck="false">
                <button id="submitBtn" class="btn btn-primary" type="submit">
                  <i class="bi bi-chat-square-text"></i> Explain
                </button>
              </div>
              <div id="validation" class="alert alert-warning" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> Whoops! Please try again with a different FEN.
              </div>
            </form>
            <div id="chessboard" class="text-center mb-3"></div>
            <div id="tutor"></div>
            <p>
              Also, here is a list of chess positions just in case you are not too sure about which FEN to enter.
            </p>
            <div class="list-group">
              <a data-fen="6k1/5p2/3p4/1p1P3p/1PpQ2p1/1q1b2P1/4KP1P/2B5 w - - 14 42" href="#" class="list-group-item list-group-item-action">WCC 1972 — Game 3: Spassky–Fischer, 0–1 (Modern Benoni)</a>
              <a data-fen="5k2/6p1/1p4qp/p1pPp1p1/b1P1Pn2/2P5/2Q3PP/3BB1K1 w - - 0 28" href="#" class="list-group-item list-group-item-action">WCC 1972 — Game 5: Spassky–Fischer, 0–1 (Nimzo-Indian Hübner)</a>
              <a data-fen="4q2k/2r1r3/4PR1p/p1p5/P1Bp1Q1P/1P6/6P1/6K1 b - - 4 41" href="#" class="list-group-item list-group-item-action">WCC 1972 — Game 6: Fischer–Spassky, 1–0 (QGD Tartakower)</a>
              <a data-fen="8/4k3/2R2p2/p1n4p/8/b5P1/P2RB1KP/1r6 b - - 2 37" href="#" class="list-group-item list-group-item-action">WCC 1972 — Game 8: Fischer–Spassky, 1–0 (English Symmetrical)</a>
              <a data-fen="8/3r4/5P2/2p1b1R1/3k2P1/5K2/8/1R6 b - - 2 56" href="#" class="list-group-item list-group-item-action">WCC 1972 — Game 10: Fischer–Spassky, 1–0 (Ruy Lopez Breyer)</a>
              <a data-fen="r1b1k3/1p2b3/p1P1RQ2/1P3n2/5Pp1/1N5r/3N2KP/R7 b q - 0 31" href="#" class="list-group-item list-group-item-action">WCC 1972 — Game 11: Spassky–Fischer, 1–0 (Sicilian Najdorf)</a>
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
    <script id="theScript" src="assets/js/positions.min.js" data-scheme="<?php echo $scheme; ?>" data-host="<?php echo $host; ?>" data-port="<?php echo $port; ?>"></script>
  </body>
</html>
