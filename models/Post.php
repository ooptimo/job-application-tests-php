<?php

namespace app\models;

use yii\base\Model;

class Post extends Model
{
    
    /**
     * Fetches posts from the API and returns them as an array
     * @return array
     */
    public function get()
    {

        $url = 'https://jsonplaceholder.typicode.com/posts';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        
        curl_close($ch);

        $response = json_decode($response, true);

        return $response; 

    }

}
