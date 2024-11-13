<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\JasonPlaceholderAPI;

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

        $model = new JasonPlaceholderAPI();
        $data = $model->getData();

        //print_r($data);

		return $this->render('test1', ['data' => $data]);
	}
}
