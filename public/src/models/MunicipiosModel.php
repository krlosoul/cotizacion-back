<?php

namespace App\models;

use Config\providers\DatabaseManager as DbManager;
use Exception;

final class MunicipiosModel
{
    private $db;

    public function __construct(DbManager $db)
    {
        $this->db = $db;
    }
        
    public function listBy($dep_codigo){
        try
        {
            $query = 'SELECT M.MUN_CODIGO, M.MUN_NOMBRE FROM MUNICIPIOS M INNER JOIN DEPARTAMENTOS D ON M.DEP_CODIGO = D.DEP_CODIGO WHERE M.DEP_CODIGO = :codigo ORDER BY M.MUN_NOMBRE';
            $data = [
                [ 'Name' => 'codigo', 'Value' => intval($dep_codigo) ]
            ];
            return $this->db->getData($query, $data);
        }catch(Exception $ex){
            throw $ex->getMessage();
        }
    }

}
