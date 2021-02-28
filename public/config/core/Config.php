<?php

error_reporting(0);
ini_set('display_errors', '0');
date_default_timezone_set('America/Bogota');

return $config = [
    'error_handler_middleware' => [
        'display_error_details' => true,
        'log_errors' => true,
        'log_error_details' => true,
    ],
    'routes' => [
        'back' => 'http://localhost:8080/cotizacion-back',
        'front' => 'http://localhost:8080/cotizacion-front',
        'root' => dirname(__DIR__),
        'temp' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'tmp',
        'public' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public',
        'path' => '/cotizacion-back'
    ],
    'database' => [
        'host' => 'localhost',
        'username' => 'postgres',
        'password' => 'desarrollo',
        'port' => '5432',
        'database'=> 'cotizacion'
    ],
    'mail' => [
        'host' => 'smtp.yandex.com',
        'auth' => true,
        'user' => 'pru3b4@yandex.com',
        'pass' => 'pru3b4123',
        'secure' => 'ssl', //tls o ssl
        'port' => '465',//587 o 465
        'from' => 'pru3b4@yandex.com'
    ],
    'api_rest' =>[
        'modelos' => 'https://integrador.processoft.com.co'
    ]
];
