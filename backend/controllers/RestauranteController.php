<?php

namespace backend\controllers;

use Yii;
use backend\models\Restaurante;
use backend\models\RestauranteSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RestauranteController implements the CRUD actions for Restaurante model.
 */
class RestauranteController extends Controller
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
     * Lists all Restaurante models.
     * @return mixed
     */


    public function actionIndex()
    {
        if (Yii::$app->user->can('list-restaurants')) {
        $searchModel = new RestauranteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $restaurantes = Restaurante::find()->all();


        return $this->render('index', [

            'restaurantes'=>$restaurantes,


            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Displays a single Restaurante model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('list-restaurants')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else
        {
            throw new ForbiddenHttpException;}}


    public function actionViewrestaurante($id)
    {
        if ($id == Yii::$app->user->identity->restauranteid) {
        return $this->render('view_restaurante', [
            'model' => $this->findModel($id),
        ]);
    }else{
            throw new ForbiddenHttpException;}
        }

    /**
     * Creates a new Restaurante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-restaurants')){
            $this->layout = 'blank';
            $model = new Restaurante();

            if ($model->load(Yii::$app->request->post())) {
                $model->save();
                $idRestaurante=$model->idRestaurante;
                $image=UploadedFile::getInstance($model,'imagem');
                if($image==null){
                    $model->save();
                }else{
                    $img_name ='rest_' . $idRestaurante . '.' . $image->getExtension();
                    $image->saveAs( Yii::getAlias('@restauranteImgPath') . '/' .$img_name);
                    $model->imagem=$img_name;
                    $model->save();
                }





                return $this->redirect(['view', 'id' => $model->idRestaurante]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else
        {
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Updates an existing Restaurante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update-restaurants')) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idRestaurante]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Restaurante model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('update-restaurants')) {

            $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
        {
            throw new ForbiddenHttpException;
        }}

    /**
     * Finds the Restaurante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Restaurante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Restaurante::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
