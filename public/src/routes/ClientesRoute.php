<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api/clientes', function (RouteCollectorProxy $group) {
    $group->post('', 'App\Controllers\ClientesController:post');
});
