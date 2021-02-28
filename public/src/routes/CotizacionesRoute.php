<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/api/cotizaciones', function (RouteCollectorProxy $group) {
    $group->post('', 'App\Controllers\CotizacionesController:post');
    $group->post('/sendmail', 'App\Controllers\CotizacionesController:sendMail');
});
