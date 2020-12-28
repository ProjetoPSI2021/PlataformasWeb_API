<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                        </div>
                    </div>  <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (Yii::$app->user->identity->restauranteid != null) {
                        $allusers = \backend\models\User::find()->orderBy('id')->where(['restauranteid' => Yii::$app->user->identity->restauranteid])->all();
foreach($allusers as $user) {
?>
                        <tr>
                            <td> <?php  echo "$user->id"; ?></td>
                            <td><?php  echo "$user->username"; ?></td>
                            <td><?php  echo "$user->email"; ?></td>
                            <td><?php if($user->status=="10"){?><i class="far fa-check-circle"></i><span class="tag tag-success"> Autorizado</span></td>
<?php }else{?><i class="fas fa-times"></i><span class="tag tag-success"> Não Autorizado</span></td>
                        </tr>
<?php }}} ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

