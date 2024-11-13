<?php

namespace app\models;

use yii\base\Model;
use yii\httpclient\Client;
use Yii;

class JasonPlaceholderAPI extends Model
{
    // URL base de la API de JSONPlaceholder
    private $base_url = 'https://jsonplaceholder.typicode.com';

    /**
     * Consume la API de JSONPlaceholder y devuelve los datos.
     *
     * @return array|null Los datos de la API o null en caso de error.
     */
    public function getData()
    {
        // Endpoint de la API
        $endpoint = '/posts';

        try {

            // Creamos una instancia de la clase Client de Yii y hacemos una petición GET a la API
            $client = new Client();
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setUrl($this->base_url . $endpoint)
                ->send();


            // Si la petición fue exitosa, obtenemos los datos, los mapeamos y los devolvemos
            if ($response->isOk) {
                $data = $response->data;
                $posts = [];
                // Mapeamos los datos obtenidos para devolver solo los campos que nos interesan y en el formato deseado
                foreach ($data as $item) {
                    $post = [
                        'userId' => $item['userId'],
                        'id' => $item['id'],
                        'title' => $item['title'],
                        'body' => $item['body']
                    ];
                    $posts[] = $post;
                }
                return $posts;
            } else {
                // Registrar el error si la respuesta no es exitosa
                Yii::error('Error en la respuesta de la API: ' . $response->content, __METHOD__);
                return [];
            }
        } catch (\Exception $e) {
            // Capturar y registrar cualquier excepción que ocurra durante la petición
            Yii::error('Error al consumir la API: ' . $e->getMessage(), __METHOD__);
            return [];
        }
    }
}
