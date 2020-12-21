<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

class PratoController extends ActiveController{

    public $modelClass = 'app\models\Prato';

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
