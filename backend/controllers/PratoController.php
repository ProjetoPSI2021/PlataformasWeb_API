<?php

namespace backend\controllers;

use Yii;
use backend\models\Prato;
use backend\models\PratoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * PratoController implements the CRUD actions for Prato model.
 */
class PratoController extends Controller
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
     * Lists all Prato models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('list-food')) {
        $searchModel = new PratoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Displays a single Prato model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('list-food')) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Creates a new Prato model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        if (Yii::$app->user->can('create-food')) {
        $this->layout = 'blank';
        $model = new Prato();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $idPratos = $model->idPratos;
            $image = UploadedFile::getInstance($model, 'imagem');
            $img_name ='food_' . $idPratos . '.' . $image->getExtension();
            $image->saveAs(Yii::getAlias('@pratosImgPath') . '/' . $img_name);
            $model->imagem = $img_name;
            $model->save();

            return $this->redirect(['view', 'id' => $model->idPratos]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Updates an existing Prato model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update-food')) {
        $this->layout = 'blank';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPratos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Deletes an existing Prato model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('delete-food')) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Finds the Prato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prato::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
