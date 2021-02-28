<?php

namespace App\models;

use Config\providers\DatabaseManager as DbManager;
use Exception;

final class ClientesModel
{
    private $db;

    public function __construct(DbManager $db)
    {
        $this->db = $db;
    }
        
    public function post($cliente)
    {
        try {
            $query = 'INSERT INTO clientes (cli_nombrecompleto, cli_correo, cli_celular) VALUES 
                (:cli_nombrecompleto, :cli_correo, :cli_celular)';

            $data = [
                ['Name' => 'cli_nombrecompleto', 'Value' => $cliente['cli_nombrecompleto']],
                ['Name' => 'cli_correo', 'Value' => $cliente['cli_correo']],
                ['Name' => 'cli_celular', 'Value' => $cliente['cli_celular']]
            ];

            $this->db->beginTx();
            $this->db->execute($query, $data);
            $this->db->commit();

            $idCliente = $this->db->getLastId('clientes', 'cli_codigo');

            return $idCliente;

        } catch (Exception $ex) {
            $this->db->rollback();
            throw $ex;
        }
    }

    public function isExists(String $cli_correo)
    {
        try {
            $usu = $this->db->getData("SELECT COALESCE(cli_codigo, 0) usuario FROM clientes WHERE cli_correo=:cli_correo", [['Name' => ':cli_correo', 'Value' => $cli_correo]]);
            return  $usu[0]['usuario'];
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
