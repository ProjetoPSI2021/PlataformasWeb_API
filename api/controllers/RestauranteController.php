<?php

namespace app\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
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
            ]];
       /* unset($behaviors['authenticator']);
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                [
                    'class' => HttpBasicAuth::className(),
                    'auth' => [$this, 'auth']
                ],
                'class' => QueryParamAuth::className()
            ],
        ];*/
        return $behaviors;

    }

    public function auth($username, $password) {
        $user = \app\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        return null;
    }

    public function actionMesasdecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['mesas' => SORT_DESC])->all();
        return['results' => $results];
    }

    public function actionSalasdecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['salas' => SORT_DESC])->all();
        return['results' => $results];
    }

    public function actionNomedecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['nome' => SORT_DESC])->all();
        return['results' => $results];
    }

    public function actionNomecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['nome' => SORT_DESC])->all();
        return['results' => $results];
    }

    public function actionTotal(){
        $climodel = new $this ->modelClass;
        $recs = $climodel::find() -> all();
        return ['total' => count($recs)];
    }


}
