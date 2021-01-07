<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\clienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliente';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">

                            <div class="input-group-append">
                            </div>
                        </div>
                    </div>
                    <h1>        <img  src="http:\\localhost\advanced1\images\create\user.png" alt="AdminLTE Logo" class=""  width="150" height="150" style="opacity: .8">
                        <?= Html::encode($this->title) ?> </h1><p></p>
                    <div align="right">
                        <?= Html::a('Create Cliente', ['create'], ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
<?php $allclientes = \backend\models\Cliente::find()->orderBy('idCliente')->all();
foreach($allclientes as $cliente) {

    ?>
                        <tr>
                            <td>   <?php  echo "$cliente->idCliente"; ?></td>
                            <td><?php  echo "$cliente->username"; ?></td>
                            <td><?php  echo "$cliente->email"; ?></td>
                            <td><a href="index.php?r=cliente%2Fupdate&id=<?php  echo "$cliente->idCliente"; ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-sync"></i> Update Cliente
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
