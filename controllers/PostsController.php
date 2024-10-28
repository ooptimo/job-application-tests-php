<?php

namespace app\controllers;

use yii\web\Controller;
use GuzzleHttp\Client;

class PostsController extends Controller{
    
    
    /**
     * {@inheritdoc}
     */
    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }


    /**
	 * Function that find the information of all the posts
	 *
	 * @return json
	 */
    public function actionSearch()
    {
        $client = new Client();
        $searchPosts = $client->request('GET','https://jsonplaceholder.typicode.com/posts');
        $posts = $searchPosts->getBody()->getContents();
        return $posts;
    }

}
