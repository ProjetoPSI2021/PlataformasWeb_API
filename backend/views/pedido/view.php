<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */

$this->title = $model->idpedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedido', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedidos-view">

    <h1>Visualizar Pedido</h1>

    <p>
    <p><a class="btn btn-default" href="../../backend/web/index.php?r=pedido%2Fviewpedido">Pedidos &raquo;</a></p>
    </p>


    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">

                <!-- Default box -->
                <div>
                    <h2>ID: <?php  echo "$model->idpedido"; ?></h2>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead"><b> <?php  echo "ID Reserva: $model->id_reserva"; ?> </b></h2>
                            <p class="text-muted text-sm"><b>   <?php  echo "$model->data"; ?>  </b>    <?php  echo "$model->tipo"; ?>  </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li><span class="fa-li"><i class="fas fa-user"></i></span>Cliente:<?php echo"$model->id_clientes"; ?> </li>
                                <p></p>
                                <li><span class="fa-li"><i class="fas fa-user"></i></span>Restaurante:<?php echo"$model->idrestaurantepedido"; ?> </li>
                                <p></p>
                                <li><span class="fa-li"><i class="fas fa-tag"></i></span>Preço Total:<?php  echo "$model->preco"; ?>  </li>
                                <p></p>
                                <li><span class="fa-li"><i class="fas fa-chalkboard"></i></span>Estado:    <?php  echo "$model->estadopedido"; ?> </li>
                                <p></p>
                                <li><span class="fa-li"><i class="fas fa-list-ol"></i></span>ID Prato:    <?php  echo "$model->idpratoorder"; ?> </li>
                                <p></p>
                                <li><span class="fa-li"><i class="fas fa-pizza-slice"></i></span>Nome Prato:    <?php  $allPratosPedidos = \backend\models\Prato::find()->where(['idPratos' => $model->idpratoorder])->all();
                                    foreach($allPratosPedidos as $prato) {
                                        echo "$prato->nome " ;} ?> </li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="http:\\localhost\advanced1\images\comida\<?php  echo "$model->idpedido"; ?>" alt="" class="img-circle img-fluid" width="160" height="160">                                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="#" >
                            <?= Html::a('Delete', ['delete', 'id' => $model->idpedido], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </a>
                        <a href="index.php?r=prato%2Fview&id=<?php  echo "$model->idpedido"; ?>" >
                            <?= Html::a('Update', ['update', 'id' => $model->idpedido], ['class' => 'btn btn-primary']) ?>
                        </a>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ?>
</div>
</div>
