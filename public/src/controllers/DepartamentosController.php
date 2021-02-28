<?php

namespace App\Controllers;

use App\models\DepartamentosModel;
use Exception;
use Slim\Http\Response as Response;
use Slim\Http\ServerRequest as Request;

final class DepartamentosController
{
    private $model;
    
    public function __construct(DepartamentosModel $model)
    {
      $this->model = $model;
    }

    public function list(Request $req, Response $res){
        try
        { 
            return $res->withStatus(200)->withJson($this->model->list());
        }catch(Exception $ex){
            return $res->withStatus(500)->withJson(['message' => $ex->getMessage(), 'code' => 500]);
        }
    }
}
