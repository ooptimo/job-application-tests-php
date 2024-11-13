<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\JasonPlaceholderAPI;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
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
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays test 1.
     *
     * @return string
     */
    public function actionTest1()
    {

        // obtenemos los datos de la API
        $model = new JasonPlaceholderAPI();
        $data = $model->getData();

        // Configurar la paginación
        $pagination = new Pagination([
            'totalCount' => count($data),
            'pageSize' => 10,
        ]);

        // Crear el proveedor de datos
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data, // Datos obtenidos de la API (Array)
            'pagination' => $pagination, // Configuración de la paginación
        ]);

        // Renderizar la vista con los datos
        return $this->render('test1', ['dataProvider' => $dataProvider]);
    }
}
