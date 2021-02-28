<?php

namespace App\Controllers;

use App\models\MunicipiosModel;
use Exception;
use Slim\Http\Response as Response;
use Slim\Http\ServerRequest as Request;

final class MunicipiosController
{
    private $model;
    
    public function __construct(MunicipiosModel $model)
    {
      $this->model = $model;
    }

    public function listBy(Request $req, Response $res){
        try
        { 
            $dep_codigo = $req->getParam("codigo");
            return $res->withStatus(200)->withJson($this->model->listBy($dep_codigo));
        }catch(Exception $ex){
            return $res->withStatus(500)->withJson(['message' => $ex->getMessage(), 'code' => 500]);
        }
    }
}
