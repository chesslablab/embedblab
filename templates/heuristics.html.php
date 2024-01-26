<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChessCoach — Heuristic Thinking</title>
    <meta name="description" content="A heuristic evaluation is a quick numerical estimate of a chess position that suggests the chances of winning without considering checkmate.">

    <meta property="og:title" content="ChessCoach — Heuristic Thinking">
    <meta property="og:description" content="A heuristic evaluation is a quick numerical estimate of a chess position that suggests the chances of winning without considering checkmate.">
    <meta property="og:url" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>">
    <meta property="og:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">
    <meta property="og:site_name" content="ChessCoach">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="ChessCoach — Heuristic Thinking">
    <meta name="twitter:description" content="A heuristic evaluation is a quick numerical estimate of a chess position that suggests the chances of winning without considering checkmate.">
    <meta name="twitter:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">

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
            <h1>Heuristics</h1>
            <p class="fs-5 fw-bold">
              Unleash your heuristic thinking!
            </p>
            <p>
              If you ask a chess pro why a chess move is good, they'll probably
              give you a bunch of reasons, many of them intuitive, about why they
              made that decision.
            </p>
            <p>
              It is important to develop your pieces in the opening while trying
              to control the center of the board at the same time. Castling is an
              excellent move as long as the king gets safe. Then, in the middlegame
              space becomes an advantage. And if a complex position can be
              simplified when you have an advantage, then so much the better.
              The pawn structure could determine the endgame.
            </p>
            <div class="alert alert-primary" role="alert">
              <p class="alert-heading fw-bold">The list of reasons to make a move goes on</p>
              <a href="https://php-chess.docs.chesslablab.org/heuristics/">Learn more</a>
              about ChesslaBlab's open-source heuristic evaluation which has been
              implemented with the PHP language.
            </div>
            <p>
              A heuristic evaluation is a quick numerical estimate of a chess position
              that suggests who may be better without considering checkmate. Please
              note that a heuristic evaluation is not the same thing as a chess
              calculation. Heuristic evaluations are often correct but may fail as
              long as they are based on probabilities more than anything else.
            </p>
            <p>
              This is a form of abductive reasoning.
            </p>
            <p>
              Happy learning!
            </p>
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
  </body>
</html>
