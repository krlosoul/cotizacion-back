<?php

namespace App\Controllers;

use App\models\CotizacionesModel;
use Exception;
use Slim\Http\Response as Response;
use Slim\Http\ServerRequest as Request;

final class CotizacionesController
{
    private $model;
    
    public function __construct(CotizacionesModel $model)
    {
      $this->model = $model;
    }

    public function post(Request $req, Response $res)
    {
        try {
            $idCotizacion = 0;

            $cotizacion = $req->getParsedBody();

            $exists = $this->model->isExistsNow($cotizacion['cli_codigo']);

            if ($exists > 0) {
                return $res->withStatus(500)->withJson(['message' => 'Sr Usuario, solo puede enviar una cotizacion al dia, por favor intente mañana.', 'code' => 501]);
              } else {
                $idCotizacion = $this->model->post($cotizacion);
            }

            return $res->withJson($idCotizacion)->withStatus(200);
        } catch (Exception $ex) {
            return $res->withStatus(500)->withJson(['message' => $ex->getMessage(), 'code' => '500']);
        }
    }

    public function sendMail(Request $req, Response $res){
        try {

            $cot_codigo = $req->getParsedBody("codigo");

            $this->model->sendMail((int)$cot_codigo);
      
            return $res->withJson(null)->withStatus(200);
        } catch (Exception $ex) {
            return $res->withStatus(500)->withJson(['message' => $ex->getMessage(), 'code' => '500']);
        }
    }

}
