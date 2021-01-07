<?php

namespace app\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

class PratoController extends ActiveController
{

    public $modelClass = 'app\models\Prato';

    public function behaviors()

    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]];
        // remove authentication filter if there is one
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

    public function auth($username, $password)
    {
        $user = \app\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        return null;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        /* var_dump($changedAttributes);
         exit;*/
        //Obter dados do registo em causa
        $idPratos = $changedAttributes["idPratos"];
        $nome = $changedAttributes["nome"];
        $imagem = $changedAttributes["imagem"];
        $tipo = $changedAttributes["tipo"];
        $r_id = $changedAttributes["r_id"];
        $r_preco = $changedAttributes["r_preco"];
        $r_ingredientes = $changedAttributes["r_ingredientes"];

        $myObj = new \stdClass();

        $myObj->tabela = "prato";
        $myObj->idPratos = $idPratos;
        $myObj->nome = $nome;
        $myObj->imagem = $imagem;
        $myObj->tipo = $tipo;
        $myObj->r_id = $r_id;
        $myObj->r_preco = $r_preco;
        $myObj->r_ingredientes = $r_ingredientes;

        $myJSON = json_encode($myObj);

        if ($insert) {
            $this->Publish("INSERT", $myJSON);
        } else {
            $this->Publish("UPDATE", $myJSON);
        }
    }


    public function Publish($canal, $msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = "" . Yii::$app->user->identity->username; // set your username
        $password = "" . Yii::$app->user->identity->password_hash; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \app\mosquitto\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password)) {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        } else {
            file_put_contents("debug.output", "Time out!");
        }
    }

    public function actionFoodnamecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['nome' => SORT_ASC])->all();
        return['results' => $results];
    }

    public function actionFoodnamedecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['nome' => SORT_DESC])->all();
        return['results' => $results];
    }

    public function actionPrecocr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['r_preco' => SORT_ASC])->all();
        return['results' => $results];
    }

    public function actionPreco($id){
        $climodel = new $this ->modelClass;
        $rec = $climodel::find() -> where("idPratos=".$id) -> one();
        if($rec)
            return ['idPratos' => $id, 'r_preco' => $rec -> r_preco];
        return ['idPratos' => $id, 'r_preco' => "null"];
    }

    public function actionPrecodecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['r_preco' => SORT_DESC])->all();
        return['results' => $results];
    }

    public function actionTotal(){
        $climodel = new $this ->modelClass;
        $recs = $climodel::find() -> all();
        return ['total' => count($recs)];
    }
}
