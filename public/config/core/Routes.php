<?php

use Slim\App;

return function (App $app) {
    (require __DIR__ . '/../../src/routes/IndexRoute.php');
    (require __DIR__ . '/../../src/routes/DepartamentosRoute.php');
    (require __DIR__ . '/../../src/routes/MunicipiosRoute.php');
    (require __DIR__ . '/../../src/routes/ApiModelosRoute.php');
    (require __DIR__ . '/../../src/routes/ClientesRoute.php');
    (require __DIR__ . '/../../src/routes/CotizacionesRoute.php');
};
