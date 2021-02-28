<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api/departamentos', function (RouteCollectorProxy $group) {
    $group->get('/list', 'App\Controllers\DepartamentosController:list');
});
