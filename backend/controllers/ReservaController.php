<?php

namespace backend\controllers;

use backend\models\Prato;
use Yii;
use backend\models\Reserva;
use backend\models\ReservaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * ReservaController implements the CRUD actions for Reserva model.
 */
class ReservaController extends Controller
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
     * Lists all Reserva models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('list-reservation')) {
        $searchModel = new ReservaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Displays a single Reserva model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionViewreserva()
    {
        return $this->render('view_reserva', [
        ]);
    }

    public function actionView($id)
    {
        if (Yii::$app->user->can('list-reservation')) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Creates a new Reserva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('create-order')) {
        $this->layout = 'blank';
        $model = new Reserva();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idreservas]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}
    }

    public function actionCreaterest()
    {
        if (Yii::$app->user->can('createown-reservation')) {
            $this->layout = 'blank';
            $model = new Reserva();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['viewreserva']);
            }

            return $this->render('create_reserva', [
                'model' => $model,
            ]);
        }else
        {
            throw new ForbiddenHttpException;}
    }


    /**
     * Updates an existing Reserva model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'blank';
        if (Yii::$app->user->can('update-reservation')) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idreservas]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Deletes an existing Reserva model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('delete-reservation')) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Finds the Reserva model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reserva the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reserva::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
