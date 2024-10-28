<?php

namespace app\controllers;

use yii\web\Controller;
use GuzzleHttp\Client;

class UsersController extends Controller{
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
	 * Function that connect to the external API for find the users who create posts
	 *
	 * @return string
	 */
    public function actionSearch()
    {
        $client = new Client();
        $searchUsers = $client->request('GET','https://jsonplaceholder.typicode.com/users');
        $users = $searchUsers->getBody()->getContents();
        return $users;
    }
}
