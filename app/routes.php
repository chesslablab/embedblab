<?php

declare(strict_types=1);

use Chess\Heuristics\EvalFunction;
use Chess\Heuristics\SanHeuristics;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;

const DATA_FOLDER = __DIR__.'/../resources/data';

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "games.html.php");
    });

    $app->get('/games', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "games.html.php");
    });

    $app->get('/openings', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "openings.html.php");
    });

    $app->get('/opening/{eco}/{name}', function (Request $request, Response $response, $args) {
        $contents = file_get_contents(DATA_FOLDER.'/openings.json');
        $json = json_decode($contents, true);

        // TODO: Pass the incoming opening to the view

        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "opening.html.php", $args);
    });

    $app->get('/about', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "about.html.php");
    });

    $app->get('/api/openings', function (Request $request, Response $response) {
        $contents = file_get_contents(DATA_FOLDER.'/openings.json');
        $json = json_decode($contents, true);

        return $response->withJson($json, 200);
    });

    $app->post('/api/heuristics', function (Request $request, Response $response) {
        $params = $request->getParsedBody();

        // TODO: Parameter validation

        $evalFunction = new EvalFunction();
        $heuristics = new SanHeuristics($params['movetext']);

        $json = [
            'evalNames' => $evalFunction->names(),
            'balance' => $heuristics->getBalance(),
        ];

        return $response->withJson($json, 200);
    });
};
