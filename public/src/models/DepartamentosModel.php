<?php

namespace App\models;

use Config\providers\DatabaseManager as DbManager;
use Exception;

final class DepartamentosModel
{
    private $db;

    public function __construct(DbManager $db)
    {
        $this->db = $db;
    }
        
    public function list(){
        try
        {
            $query = 'SELECT DEP_CODIGO, DEP_NOMBRE FROM DEPARTAMENTOS ORDER BY DEP_NOMBRE';
            return $this->db->getData($query);
        }catch(Exception $ex){
            throw $ex->getMessage();
        }
    }

}
