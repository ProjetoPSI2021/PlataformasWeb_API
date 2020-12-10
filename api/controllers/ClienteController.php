<?php

namespace app\controllers;

use yii\rest\ActiveController;

class ClienteController extends ActiveController{

    public $modelClass = 'app\models\Cliente';

    public function actionTotal(){
        $climodel = new $this ->modelClass;
        $recs = $climodel::find() -> all();
        return ['total' => count($recs)];
    }

    public function actionMorada($id){
        $climodel = new $this ->modelClass;
        $rec = $climodel::find() -> where("idCliente=".$id) -> one();
        if($rec)
            return ['idCliente' => $id, 'morada' => $rec -> morada];
        return ['idCliente' => $id, 'morada' => "null"];
    }

    public function actionUsername($id){
        $climodel = new $this ->modelClass;
        $rec = $climodel::find() -> where("idCliente=".$id) -> one();
        if($rec)
            return ['idCliente' => $id, 'username' => $rec -> username];
        return ['idCliente' => $id, 'username' => "null"];
    }
}
