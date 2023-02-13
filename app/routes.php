<?php

declare(strict_types=1);

use App\Application\Actions\Student\ListStudentsAction;
use App\Application\Actions\Student\ViewStudentAction;
use App\Application\Actions\Student\DestroyStudentAction;
use App\Application\Actions\Student\StoreStudentAction;
use App\Application\Actions\Student\UpdateStudentAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\Twig;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'bilfen.html');
    });

    $app->group('/students', function (Group $group) {
        $group->post('/list', ListStudentsAction::class);
        $group->post('', StoreStudentAction::class);
        $group->get('/{id}', ViewStudentAction::class);
        $group->delete('/{id}', DestroyStudentAction::class);
        $group->patch('/{id}', UpdateStudentAction::class);
    });
};
