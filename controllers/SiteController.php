<?php

namespace app\controllers;

use app\services\OoptimoUserService;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

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
		return $this->render('test1');
	}

    /**
     * Displays test 2.
     *
     * @return string
     */
    public function actionTest2(){
        $ooptimoUserService = new OoptimoUserService();
        $data = $ooptimoUserService->fetchData();
        //Procesado de los datos en la capa de servicios
        $usuarios = $ooptimoUserService->process($data);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $usuarios,
            'pagination' => ['pageSize'=>15]
        ]);

        // Mostrar los usuarios
        return $this->render('test2', ['usuarios' => $usuarios, 'dataProvider' => $dataProvider]);
    }
}
