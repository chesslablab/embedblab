<?php

declare(strict_types=1);

use Chess\Heuristics\EvalFunction;
use Chess\Heuristics\SanHeuristics;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "index.html.php");
    });

    $app->get('/about', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "about.html.php");
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
