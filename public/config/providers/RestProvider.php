<?php

namespace Config\providers;

use Exception;
use GuzzleHttp\Client;

/**
 * Proveedor que permite la lectura de un api rest.
 */
final class RestProvider
{
    /**
     * @var Api
     */
    private $api;

    public function __construct(string $route = "https://integrador.processoft.com.co")
    {
        $this->api = new Client([
            'base_uri'=> $route
        ]);
    }

    /**
     * Metodo encargado de optener los datos
     */
    public function get($url){
        try
        {
            $res = $this->api->request('GET', $url, [
                'headers' =>[
                    'Content-Type' => 'application/json',
                    'accept' => 'application/json',
                ],
                'connect_timeout' => 1000,
                'read_timeout' => 1000,
                'timeout' => 1000,
            ]);
    
            if($res->getStatusCode() === 200){
                return json_decode($res->getBody()->getContents());
            }else{
                throw $res->getBody();
            }
        }catch(Exception $ex){
            throw $ex;
        }
    }
}