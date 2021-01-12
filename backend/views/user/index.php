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

                    <?php //Link Temporario?>
                        <a href="http://localhost/advanced1/frontend/web/index.php?r=site%2Fsignup" class="btn btn-success">Registar novo utilizador</a>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>ID Restaurante</th>
                            <th>Status</th>
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $allusers = \backend\models\User::find()->orderBy('id')->all();
foreach($allusers as $user) {
?>
                        <tr>
                            <td> <?php  echo "$user->id"; ?></td>
                            <td><?php  echo "$user->username"; ?></td>
                            <td><?php  echo "$user->email"; ?></td>
                                <td><?php  echo "$user->restauranteid"; ?></td>
                            <td><?php if($user->status=="10"){?><i class="far fa-check-circle"></i><span class="tag tag-success"> Autorizado</span></td>
<?php }else{?><i class="fas fa-times"></i><span class="tag tag-success"> Não Autorizado</span></td> <?php }?>
                            <td><a class="btn btn-info btn-sm" href="index.php?r=user%2Fupdate&id=<?php  echo "$user->id"; ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a></td>
                        </tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

