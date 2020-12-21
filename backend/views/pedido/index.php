<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pedido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpedido',
            'id_reserva',
            'data',
            'tipo',
            'id_clientes',
            'estadopedido',
            //'preco',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<p></p>
<a href="index.php?r=prato" class="btn btn-sm btn-primary">
    <i class="fas fa-backward"></i> Voltar
</a>
<p></p>
<?php $allPedidos = \backend\models\Pedido::find()->orderBy('data')->all();
foreach($allPedidos as $pedido) {

?>
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
            <!-- Default box -->
            <div>
                <?php  echo "$pedido->idpedido"; ?>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>   <?php  echo "$pedido->id_reserva"; ?> </b></h2>
                        <p class="text-muted text-sm"><b>   <?php  echo "$pedido->data"; ?>  </b>    <?php  echo "$pedido->tipo"; ?>  </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Morada:<?php echo"$pedido->tipo"; ?> </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-person-booth"></i></span>Salas:<?php  echo "$pedido->tipo"; ?> / Mesas:<?php  echo "$pedido->preco"; ?>  </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>    <?php  echo "$pedido->estadopedido"; ?> </li>

                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="http:\\localhost\advanced1\images\comida\<?php  echo "$pedido->idpedido"; ?>" alt="" class="img-circle img-fluid" width="160" height="160">                                        </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="#" >
                        <?= Html::a('Delete', ['delete', 'id' => $pedido->idpedido], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </a>
                    <a href="index.php?r=prato%2Fview&id=<?php  echo "$pedido->idpedido"; ?>" >
                        <?= Html::a('Update', ['update', 'id' => $pedido->idpedido], ['class' => 'btn btn-primary']) ?>
                    </a>
                    </a>
                    <p></p>
                    <a href="index.php?r=prato%2Fview&id=<?php  echo "$pedido->idpedido"; ?>" >
                        <?= Html::a('Alterar Imagem', ['update', 'id' => $pedido->idpedido], ['class' => 'btn btn-primary']) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
</div>

