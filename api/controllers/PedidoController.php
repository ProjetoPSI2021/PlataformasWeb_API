<?php

namespace app\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

class PedidoController extends ActiveController{

    public $modelClass = 'app\models\Pedido';

    public function behaviors()

    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]];
        // remove authentication filter if there is one
        unset($behaviors['authenticator']);
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                [
                    'class' => HttpBasicAuth::className(),
                    'auth' => [$this, 'auth']
                ],
                'class' => QueryParamAuth::className()
            ],
        ];
        return $behaviors;

    }

    public function auth($username, $password) {
        $user = \app\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        return null;
    }

    public function actionDatacr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['data' => SORT_ASC])->all();
        return['results' => $results];
    }

    public function actionDatadecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['data' => SORT_DESC])->all();
        return['results' => $results];
    }

}
