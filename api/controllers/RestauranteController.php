<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

class RestauranteController extends ActiveController{

    public $modelClass = 'app\models\Restaurante';

    public function behaviors()

    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]
        ];
        return $behaviors;

    }

}
