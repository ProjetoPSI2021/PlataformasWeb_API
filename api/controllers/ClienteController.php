<?php

namespace app\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

class ClienteController extends ActiveController{

    public $modelClass = 'app\models\Cliente';

    public function actionTotal(){
        $climodel = new $this ->modelClass;
        $recs = $climodel::find() -> all();
        return ['total' => count($recs)];
    }

    public function actionEmail($id){
        $climodel = new $this ->modelClass;
        $rec = $climodel::find() -> where("idCliente=".$id) -> one();
        if($rec)
            return ['idCliente' => $id, 'email' => $rec -> email];
        return ['idCliente' => $id, 'email' => "null"];
    }

    public function actionUsername($id){
        $climodel = new $this ->modelClass;
        $rec = $climodel::find() -> where("idCliente=".$id) -> one();
        if($rec)
            return ['idCliente' => $id, 'username' => $rec -> username];
        return ['idCliente' => $id, 'username' => "null"];
    }

    public function actionUsernamecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['username' => SORT_ASC])->all();
        return['results' => $results];
    }

    public function actionUsernamedecr() {
        $model = new $this->modelClass;
        $results = $model::find()->orderBy(['username' => SORT_DESC])->all();
        return['results' => $results];
    }

    public function behaviors()

    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]];
        // remove authentication filter if there is one

        return $behaviors;

    }

    public function auth($username, $password) {
        $user = \app\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        return null;
    }


    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $idcliente = $changedAttributes["idCliente"];
        $username = $changedAttributes["username"];
        $email = $changedAttributes["email"];


        $myObj = new \stdClass();

        $myObj->tabela = "cliente";
        $myObj->idcliente = $idcliente;
        $myObj->username  = $username;
        $myObj->email = $email;



        $myJSON = json_encode($myObj);

        if ($insert) {
            $this->Publish("INSERT", $myJSON);
        } else {
            $this->Publish("UPDATE", $myJSON);
        }
    }

    public function Publish($canal, $msg) {
        $server = "127.0.0.1";
        $port = 1883;
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \app\mosquitto\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL)) {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        } else {
            file_put_contents("debug.output", "Time out!");
        }
    }

}
