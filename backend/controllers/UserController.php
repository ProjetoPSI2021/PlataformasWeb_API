<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('list-users')) {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('list-users')) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionViewuser($id)
    {
        return $this->render('view_user', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionCreate()
    {
        if (Yii::$app->user->can('create-users')) {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('index.php');

    }


    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('update-users')) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else
        {
            throw new ForbiddenHttpException;}}

    public function actionChooserest()
    {
        $this->layout = 'blank';
        if(Yii::$app->user->identity->restauranteid == null){
            $model = $this->findModel(Yii::$app->user->identity->id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $this->layout = 'main';
                return $this->redirect('index.php');
            }

            return $this->render('chooserest', [
                'model' => $model,
            ]);}else{
            {
                throw new ForbiddenHttpException;}
        }
        }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('delete-users')) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }else
        {
            throw new ForbiddenHttpException;}}

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
