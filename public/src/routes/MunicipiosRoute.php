<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api/municipios', function (RouteCollectorProxy $group) {
    $group->get('/listby', 'App\Controllers\MunicipiosController:listBy');
});
