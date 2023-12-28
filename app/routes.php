<?php

declare(strict_types=1);

use App\Application\Streams\StreamTmp;
use Chess\FenToBoard;
use Chess\Function\StandardFunction;
use Chess\Heuristics\SanHeuristics;
use Chess\Media\BoardToMp4;
use Chess\Media\BoardToPng;
use Chess\Play\SanPlay;
use Chess\Tutor\FenExplanation;
use Chess\Tutor\PgnExplanation;
use Chess\UciEngine\Stockfish;
use Chess\Variant\Classical\Board;
use Dotenv\Dotenv;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;

const IMG_FOLDER = __DIR__.'/../public/assets/img';
const VIDEO_FOLDER = __DIR__.'/../public/assets/video';
const DATA_FOLDER = __DIR__.'/../resources/data';

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

return function (App $app) {
    /*
    |---------------------------------------------------------------------------
    | CORS Pre-Flight OPTIONS Request Handler.
    |---------------------------------------------------------------------------
    */

    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        return $response;
    });

    /*
    |---------------------------------------------------------------------------
    | Server-side rendered (SSR) pages.
    |---------------------------------------------------------------------------
    */

    $urlArgs = [
        'scheme' => $_ENV['SCHEME'],
        'host' => $_ENV['HOST'],
        'port' => $_ENV['PORT'],
    ];

    $app->get('/', function (Request $request, Response $response) use ($urlArgs) {
        $renderer = new PhpRenderer('../templates');

        return $renderer->render($response, "home.html.php", $urlArgs);
    });

    $app->get('/openings', function (Request $request, Response $response) use ($urlArgs) {
        $renderer = new PhpRenderer('../templates');

        return $renderer->render($response, "openings.html.php", $urlArgs);
    });

    $app->get('/opening/{eco}/{name}', function (Request $request, Response $response, $args) use ($urlArgs) {
        $contents = file_get_contents(DATA_FOLDER.'/openings.json');
        $json = json_decode($contents, true);
        foreach ($json as $opening) {
            $slug = URLify::slug($opening['name']);
            if ($slug === $args['name']) {
                $args['slug'] = $args['name'];
                $args['name'] = $opening['name'];
                $args['movetext'] = $opening['movetext'];
                $board = (new SanPlay($opening['movetext']))->validate()->getBoard();
                $paragraph = (new FenExplanation($board->toFen()))->getParagraph();
                $args['paragraph'] = implode(' ', $paragraph);
                $args['fen'] = $board->toFen();
                if (!file_exists(IMG_FOLDER."$slug.png")) {
                    $args['img'] = (new BoardToPng($board, $flip = false))->output(IMG_FOLDER, $slug);
                } else {
                    $args['img'] = "$slug.png";
                }
                if (!file_exists(VIDEO_FOLDER."$slug.mp4")) {
                    $args['video'] = (new BoardToMp4(
                        $opening['movetext'],
                        new Board(),
                        $flip = false
                    ))->output(VIDEO_FOLDER, $slug);
                } else {
                    $args['video'] = "$slug.mp4";
                }
            }
        }
        $renderer = new PhpRenderer('../templates');

        return $renderer->render($response, "opening.html.php", [...$args, ...$urlArgs]);
    });

    $app->get('/positions', function (Request $request, Response $response) use ($urlArgs) {
        $renderer = new PhpRenderer('../templates');

        return $renderer->render($response, "positions.html.php", $urlArgs);
    });

    $app->get('/moves', function (Request $request, Response $response) use ($urlArgs) {
        $renderer = new PhpRenderer('../templates');

        return $renderer->render($response, "moves.html.php", $urlArgs);
    });

    $app->get('/about', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');

        return $renderer->render($response, "about.html.php");
    });

    /*
    |---------------------------------------------------------------------------
    | API endpoints.
    |---------------------------------------------------------------------------
    */

    $app->get('/api/openings/{letter}', function (Request $request, Response $response, $args) {
        $contents = file_get_contents(DATA_FOLDER.'/openings.json');
        $json = json_decode($contents, true);
        foreach ($json as $opening) {
            if (str_starts_with(strtolower($opening['eco']), $args['letter'])) {
                $opening['slug'] = URLify::slug($opening['name']);
                $openings[] = $opening;
            }
        }
        if (!isset($openings)) {
            return $response->withStatus(204);
        }

        return $response->withJson($openings, 200);
    });

    $app->post('/api/heuristics', function (Request $request, Response $response) {
        $params = $request->getParsedBody();

        // TODO: Parameter validation

        $function = new StandardFunction();
        $heuristics = new SanHeuristics($params['movetext']);

        $json = [
            'evalNames' => $function->names(),
            'balance' => $heuristics->getBalance(),
        ];

        return $response->withJson($json, 200);
    });

    $app->post('/api/tutor/fen', function (Request $request, Response $response) {
        $params = $request->getParsedBody();

        if (!isset($params['movetext']) && !isset($params['fen'])) {
            return $response->withStatus(400);
        }

        try {
            if (isset($params['movetext'])) {
                $board = (new SanPlay($params['movetext']))->validate()->getBoard();
                $paragraph = (new FenExplanation($board->toFen()))->getParagraph();
                return $response->withJson([
                    'paragraph' => implode(' ', $paragraph),
                ], 200);
            } elseif (isset($params['fen'])) {
                $paragraph = (new FenExplanation($params['fen']))->getParagraph();
                return $response->withJson([
                    'paragraph' => implode(' ', $paragraph),
                ], 200);
            }
        } catch (\Exception $e) {
            return $response->withStatus(500);
        }
    });

    $app->post('/api/tutor/pgn', function (Request $request, Response $response) {
        $params = $request->getParsedBody();

        if (!isset($params['fen'])) {
            return $response->withStatus(400);
        }

        try {
            if (isset($params['fen'])) {
                $board = FenToBoard::create($params['fen']);
                $clone = unserialize(serialize($board));
                $stockfish = (new Stockfish($board))
                    ->setOptions([
                        'Skill Level' => 20
                    ])
                    ->setParams([
                        'depth' => 15
                    ]);
                $lan = $stockfish->play($board->toFen());
                $clone->playLan($board->getTurn(), $lan);
                $last = array_slice($clone->getHistory(), -1)[0];
                $paragraph = (new PgnExplanation($last->move->pgn, $board->toFen()))
                    ->getParagraph();
                return $response->withJson([
                    'pgn' => $last->move->pgn,
                    'paragraph' => implode(' ', $paragraph),
                    'fen' => $clone->toFen(),
                ], 200);
            }
        } catch (\Exception $e) {
            return $response->withStatus(500);
        }
    });

    $app->post('/api/download/image', function (Request $request, Response $response) {
        $params = $request->getParsedBody();

        if (!isset($params['fen'])) {
            return $response->withStatus(400);
        }

        try {
            $board = FenToBoard::create($params['fen']);
            $output = (new BoardToPng($board, $flip = false))->output(IMG_FOLDER);
            return $response->withBody(new StreamTmp(IMG_FOLDER . "/$output"))
                ->withHeader('Content-Disposition', 'inline')
                ->withHeader('Content-Type', mime_content_type(IMG_FOLDER . "/$output"))
                ->withHeader('Content-Length', filesize(IMG_FOLDER . "/$output"));
        } catch (\Exception $e) {
            return $response->withStatus(500);
        }
    });

    /*
    |---------------------------------------------------------------------------
    | Sitemap.
    |---------------------------------------------------------------------------
    */

    $app->get('/sitemap', function (Request $request, Response $response) {
        $xml = new \SimpleXMLElement(
            '<?xml version="1.0" encoding="utf-8"?>
            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
            </urlset>'
        );

        // Add pages
        $xml->addChild('url')
            ->addChild('loc', "{$_ENV['SCHEME']}://{$_ENV['HOST']}/openings");
        $xml->addChild('url')
            ->addChild('loc', "{$_ENV['SCHEME']}://{$_ENV['HOST']}/positions");
        $xml->addChild('url')
            ->addChild('loc', "{$_ENV['SCHEME']}://{$_ENV['HOST']}/moves");
        $xml->addChild('url')
            ->addChild('loc', "{$_ENV['SCHEME']}://{$_ENV['HOST']}/about");

        // Add opening URLs
        $contents = file_get_contents(DATA_FOLDER.'/openings.json');
        $json = json_decode($contents, true);
        foreach ($json as $opening) {
            $eco = strtolower($opening['eco']);
            $name = URLify::slug($opening['name']);
            $xml->addChild('url')
                ->addChild('loc', "{$_ENV['SCHEME']}://{$_ENV['HOST']}/opening/{$eco}/$name");
        }

        // Write sitemap
        $body = $response->getBody();
        $body->write($xml->asXML());

        return $response->withHeader('Content-Type', 'text/xml')->withBody($body);
    });
};
