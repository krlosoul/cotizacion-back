<?php

namespace App\models;

use Config\providers\DatabaseManager as DbManager;
use Cake\Chronos\Date;
use Exception;

final class ReceptoresModel
{
    private $db;

    public function __construct(DbManager $db)
    {
        $this->db = $db;
    }
        
    public function list(){
        try
        {
            $query = 'SELECT REC_CODIGO, REC_CORREO FROM RECEPTORES ORDER BY REC_CORREO';
            return $this->db->getData($query);
        }catch(Exception $ex){
            throw $ex->getMessage();
        }
    }

}
