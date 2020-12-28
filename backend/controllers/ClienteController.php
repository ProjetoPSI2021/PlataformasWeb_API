<?php

namespace backend\controllers;

use Yii;
use backend\models\Cliente;
use backend\models\clienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * ClienteController implements the CRUD actions for cliente model.
 */
class ClienteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('list-clients')) {
        $searchModel = new clienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Displays a single cliente model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    public function actionView($id)
    {
        if (Yii::$app->user->can('list-clients')) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else
        {
            throw new ForbiddenHttpException;
        }}

    /**
     * Creates a new cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('create-clients')) {
        $model = new Cliente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCliente]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;
        }}

    /**
     * Updates an existing cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update-clients')) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCliente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;
        }}

    /**
     * Deletes an existing cliente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('update-clients')) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
        {
            throw new ForbiddenHttpException;
        }}

    /**
     * Finds the cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
