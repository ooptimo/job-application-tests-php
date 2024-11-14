<?php

namespace app\services;

use app\models\OoptimoUser;

class OoptimoUserService
{
    private $apiUrl = 'https://jsonplaceholder.typicode.com/posts';

    function fetchData(){
        // Obtener datos de la API
        $response = file_get_contents($this->apiUrl);

        if ($response === false) {
            return [];
        }

        // Decodificar JSON
        return json_decode($response, true);
    }

    function process($usuarios){
        $usuarios = array_map( function($usuario){
            $tmpUser = new OoptimoUser();
            $tmpUser->setTitle( htmlspecialchars($usuario['title']) );
            $tmpUser->setBody(htmlspecialchars($usuario['body']));
            $tmpUser->setId( htmlspecialchars($usuario['id']) );
            $tmpUser->setUserId( htmlspecialchars($usuario['userId']) );
            return $tmpUser;
        }, $usuarios);
        return $usuarios;
    }

}