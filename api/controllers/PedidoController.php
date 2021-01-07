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
        unset($behaviors['authenticator']);

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

    public function actionTotal(){
        $climodel = new $this ->modelClass;
        $recs = $climodel::find() -> all();
        return ['total' => count($recs)];
    }

    public function actionDatadecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['data' => SORT_DESC])->all();
        return['results' => $results];
    }

    public function actionPrecocr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['preco' => SORT_ASC])->all();
        return['results' => $results];
    }

    public function actionPrecodecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['preco' => SORT_DESC])->all();
        return['results' => $results];
    }

    public function actionPedrecente() {
        $limit = 5;
        $model = new $this->modelClass;
        $results = $model::find()->limit($limit)->orderBy(['data' => SORT_DESC, 'idpedido' => SORT_ASC])->all();
        return['limite' => $limit, 'results' => $results];
    }

}
