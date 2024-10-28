<?php

namespace app\controllers;

use yii\web\Controller;
use GuzzleHttp\Client;
use app\controllers\PostsController;
use app\controllers\UsersController;

class SiteController extends Controller{
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(){
        return $this->render('index');
    }
	
	/**
	 * Displays test 1.
	 *
	 * @return string
	 */
	public function actionTest1(){
        $postsController = new PostsController(1,1,[]);
        $posts = $postsController->actionSearch();
        $posts = json_decode($posts, true);
        $usersController = new UsersController(2,2,[]);
        $users = $usersController->actionSearch();
        $users = json_decode($users, true);
	    return $this->render('test1',['posts' => $posts, 'users' => $users]);
	}

}
