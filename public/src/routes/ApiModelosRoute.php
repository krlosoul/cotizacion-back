<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api/apimodelos', function (RouteCollectorProxy $group) {
    $group->get('/list', 'App\Controllers\ApiModelosController:list');
});
