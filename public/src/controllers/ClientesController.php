<?php

namespace App\Controllers;

use App\models\ClientesModel;
use Exception;
use Slim\Http\Response as Response;
use Slim\Http\ServerRequest as Request;

final class ClientesController
{
    private $model;
    
    public function __construct(ClientesModel $model)
    {
      $this->model = $model;
    }

    public function post(Request $req, Response $res)
    {
        try {

            $idCliente = 0;

            $cliente = $req->getParsedBody();

            $existsId = $this->model->isExists($cliente['cli_correo']);
            if ($existsId > 0) {
                $idCliente = $existsId;
            }else{
                $idCliente = $this->model->post($cliente);
            }            

            return $res->withJson($idCliente)->withStatus(200);
        } catch (Exception $ex) {
            return $res->withStatus(500)->withJson(['message' => $ex->getMessage(), 'code' => '500']);
        }
    }



}
