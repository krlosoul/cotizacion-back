<?php

namespace App\models;

use Config\providers\DatabaseManager as DbManager;
use Config\providers\MailerProvider as Mailer;
use Cake\Chronos\Date;
use Exception;

final class CotizacionesModel
{
    private $db;
    private $mail;

    public function __construct(DbManager $db, Mailer $mail)
    {
        $this->db = $db;
        $this->mail = $mail;
    }
        
    public function post($cotizacion)
    {
        try {
            $query = 'INSERT INTO cotizaciones (cot_estado, cot_fecha, cli_codigo, mun_codigo, api_modelo) VALUES 
                (:cot_estado, :cot_fecha, :cli_codigo, :mun_codigo, :api_modelo)';

            $data = [
                ['Name' => 'cot_estado', 'Value' => 1],
                ['Name' => 'cot_fecha', 'Value' => new Date() ],
                ['Name' => 'cli_codigo', 'Value' => $cotizacion['cli_codigo']],
                ['Name' => 'mun_codigo', 'Value' => $cotizacion['mun_codigo']],
                ['Name' => 'api_modelo', 'Value' => $cotizacion['api_modelo']]
            ];

            $this->db->beginTx();
            $this->db->execute($query, $data);
            $this->db->commit();

            $idCCotizacion = $this->db->getLastId('cotizaciones', 'cot_codigo');

            return $idCCotizacion;

        } catch (Exception $ex) {
            $this->db->rollback();
            throw $ex;
        }
    }

    public function isExistsNow(int $cli_codigo)
    {
        try {
            $usu = $this->db->getData("SELECT COUNT(cli_codigo) cotizacion FROM cotizaciones WHERE cli_codigo=:cli_codigo AND cot_fecha=:cot_fecha", 
            [
                ['Name' => ':cli_codigo', 'Value' => $cli_codigo],
                ['Name' => ':cot_fecha', 'Value' => new Date()]
            ]);
            return  $usu[0]['cotizacion'];
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    private function getInfo(int $cot_codigo){
        $query = 'SELECT co.api_modelo, cl.cli_nombrecompleto, cl.cli_correo, cl.cli_celular, de.dep_nombre, mu.mun_nombre
            FROM cotizaciones co
            JOIN clientes cl ON co.cli_codigo = cl.cli_codigo
            JOIN municipios mu ON co.mun_codigo = mu.mun_codigo
            JOIN departamentos de ON mu.dep_codigo = de.dep_codigo
            WHERE co.cot_codigo=:cot_codigo';

        $data = [
            [ 'Name' => 'cot_codigo', 'Value' => intval($cot_codigo) ]
        ];

        return $this->db->getData($query, $data);
    }

    private function listReceptores(){
        try
        {
            $query = 'SELECT REC_CORREO FROM RECEPTORES ORDER BY REC_CORREO';
            return $this->db->getData($query);
        }catch(Exception $ex){
            throw $ex->getMessage();
        }
    }

    public function sendMail($cot_codigo)
    {
      try {

        $info = $this->getInfo($cot_codigo)[0];

        $body = '<p style="text-align: center;"><strong>COTIZACION</strong></p>
        <p style="text-align: left;">El cliente <strong>'.$info['cli_nombrecompleto'].'</strong> esta interesado en adquirir el vehiculo <strong>'.$info['api_modelo'].'</strong> desde el municipio de <strong>'.$info['mun_nombre'].'</strong>.</p>
        <p style="text-align: left;">Datos Personales:</p>
        <ul>
        <li style="text-align: left;"><strong>Correo: </strong>'.$info['cli_correo'].'</li>
        <li style="text-align: left;"><strong>Celular: </strong>'.$info['cli_celular'].'</li>
        </ul>';

        $oldReceptores = $this->listReceptores();
        $newReceptores = [];

        foreach($oldReceptores as $item){
            array_push($newReceptores, $item['rec_correo']);
        }

        $this->mail->sendMail($body,$newReceptores , "Cotizacion");
      } catch (Exception $ex) {
        throw $ex;
      }
    }

}
