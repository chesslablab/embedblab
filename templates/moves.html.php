<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChessCoach — Moves</title>
    <meta name="description" content="ChessCoach can explain along with an UCI engine why a move is good. Stockfish is set up with a skill level of 20 and a depth of 15 to suggest a move.">

    <meta property="og:title" content="ChessCoach — Moves">
    <meta property="og:description" content="ChessCoach can explain along with an UCI engine why a move is good. Stockfish is set up with a skill level of 20 and a depth of 15 to suggest a move.">
    <meta property="og:url" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/moves">
    <meta property="og:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">
    <meta property="og:site_name" content="ChessCoach">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="ChessCoach — Moves">
    <meta name="twitter:description" content="ChessCoach can explain along with an UCI engine why a move is good. Stockfish is set up with a skill level of 20 and a depth of 15 to calculate a move.">
    <meta name="twitter:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/spinner.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css">
  </head>
  <body>
    <div id="spinner"></div>
    <?php require __DIR__ . '/partial/nav.html.php'; ?>

    <div class="container my-4">
      <div class="row p-3">
        <div class="col-lg-8 px-0">
          <article>
            <h1>Moves</h1>
            <p class="fs-5 fw-bold">
              Good moves explained in easy-to-understand language
            </p>
            <p>
              ChessCoach can explain along with an UCI engine the implications of
              making a particular move. Stockfish has been set up with a <code>skill</code>
              level of <code>20</code> and a <code>depth</code> of <code>15</code>
              to calculate a good move.
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
            <div id="fen" class="input-group mb-3">
              <input type="text" class="form-control" aria-label="FEN" readonly>
              <button class="btn btn-primary" type="submit">
                <i class="bi bi-clipboard"></i> Copy FEN
              </button>
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
    <script id="theScript" src="assets/js/moves.min.js" data-scheme="<?php echo $scheme; ?>" data-host="<?php echo $host; ?>" data-port="<?php echo $port; ?>"></script>
  </body>
</html>
