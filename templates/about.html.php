<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChessCoach — About</title>
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
            <h1>About</h1>
            <p class="fs-5 fw-bold">
              ChesslaBlab is an organization creating open-source chess software
            </p>
            <p>
              Chess is a perfect topic for learning full-stack web development as
              well as for playing around with machine learning libraries. A bunch
              of public repos ranging from React and JavaScript to PHP are
              available on ChesslaBlab.
            </p>
            <p>
              ChesslaBlab stands for chess laboratory, so the repositories can be
              used and extended by developers to create amazing chess web apps.
            </p>
            <p>
              Happy coding!
            </p>
            <div class="alert alert-primary" role="alert">
              <p class="alert-heading fw-bold">Did we miss something?</p>
              Please let us know by either opening <a href="https://github.com/chesslablab/coach/issues" target="_blank" rel="noreferrer">an issue</a>
              or <a href="https://github.com/orgs/chesslablab/discussions" target="_blank" rel="noreferrer">a discussion</a>.
              Your feedback is very much appreciated.
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
  </body>
</html>
