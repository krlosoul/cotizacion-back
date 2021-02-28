<?php

namespace App\Controllers;

use App\models\ApiModelosModel;
use Exception;
use Slim\Http\Response as Response;
use Slim\Http\ServerRequest as Request;

final class ApiModelosController
{
    private $model;
    
    public function __construct(ApiModelosModel $model)
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
