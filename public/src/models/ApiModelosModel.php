<?php

namespace App\models;

use Config\providers\RestProvider as RestProvider;
use Exception;

final class ApiModelosModel
{
    private $rest;

    public function __construct(RestProvider $rest)
    {
        $this->rest = $rest;
    }
        
    public function list(){
        try
        {
            $data = $this->rest->get("/api/menutest");
            return $data[1]->subitems;
        }catch(Exception $ex){
            throw $ex->getMessage();
        }
    }

}
