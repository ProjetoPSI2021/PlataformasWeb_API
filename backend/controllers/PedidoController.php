<?php

namespace backend\controllers;

use Yii;
use backend\models\Pedido;
use backend\models\PedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
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
     * Lists all Pedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('list-orders')) {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Displays a single Pedido model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('list-orders')) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionViewpedido()
    {
        return $this->render('view_pedido', [
        ]);
    }

    public function actionViewpedidopendente()
    {
        return $this->render('view_pedidopendentes', [
        ]);
    }


    public function actionCreate()
    {
        $this->layout = 'blank';

        if (Yii::$app->user->can('create-order')) {
        $model = new Pedido();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    public function actionCreaterest()
    {
        $this->layout = 'blank';
            $model = new Pedido();


            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['viewpedido']);
            }

            return $this->render('create_pedido', [
                'model' => $model,
            ]);
        }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'blank';

        $model = $this->findModel($id);
        if (Yii::$app->user->can('update-orders')) {

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpedido]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }elseif(Yii::$app->user->identity->restauranteid == $model->idrestaurantepedido){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['viewpedido']);
            }

            return $this->render('update_rest', [
                'model' => $model,
            ]);
        }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->user->can('delete-order')) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }elseif(Yii::$app->user->identity->restauranteid == $model->idrestaurantepedido){
            $this->findModel($id)->delete();

            return $this->redirect(['viewpedido']);
        }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
