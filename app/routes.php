<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Chess\Heuristics\EvalFunction;
use Chess\Heuristics\SanHeuristics;
use Chess\Variant\Capablanca\Board as CapablancaBoard;
use Chess\Variant\Capablanca\FEN\StrToBoard as CapablancaFenStrToBoard;
use Chess\Variant\CapablancaFischer\Board as CapablancaFischerBoard;
use Chess\Variant\CapablancaFischer\FEN\StrToBoard as CapablancaFischerStrToBoard;
use Chess\Variant\Chess960\Board as Chess960Board;
use Chess\Variant\Chess960\FEN\StrToBoard as Chess960FenStrToBoard;
use Chess\Variant\Classical\Board as ClassicalBoard;
use Chess\Variant\Classical\FEN\StrToBoard as ClassicalFenStrToBoard;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Http\Response as Response;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
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

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->get('/about', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "about.html.php");
    });

    $app->post('/api/heuristics', function (Request $request, Response $response) {
        $params = $request->getParsedBody();

        // TODO: Parameter validation

        if ($params['variant'] === Chess960Board::VARIANT) {
            $startPos = str_split($params['startPos']);
            $board = isset($params['fen'])
                ? (new Chess960FenStrToBoard($params['fen'], $startPos))->create()
                : new Chess960Board($startPos);
        } elseif ($params['variant'] === CapablancaBoard::VARIANT) {
            $board = isset($params['fen'])
                ? (new CapablancaFenStrToBoard($params['fen']))->create()
                : new CapablancaBoard();
        } elseif ($params['variant'] === CapablancaFischerBoard::VARIANT) {
            $startPos = str_split($params['startPos']);
            $board = isset($params['fen'])
                ? (new CapablancaFischerStrToBoard($params['fen'], $startPos))->create()
                : new CapablancaFischerBoard($startPos);
        } elseif ($params['variant'] === ClassicalBoard::VARIANT) {
            $board = isset($params['fen'])
                ? (new ClassicalFenStrToBoard($params['fen']))->create()
                : new ClassicalBoard();
        }

        $evalFunction = new EvalFunction();
        $heuristics = new SanHeuristics($params['movetext'], $board);

        $json = [
            'evalNames' => $evalFunction->names(),
            'balance' => $heuristics->getBalance(),
        ];

        return $response->withJson($json, 200);
    });
};
