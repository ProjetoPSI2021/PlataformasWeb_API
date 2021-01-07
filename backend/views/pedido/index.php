<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos - Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-solid">
    <div class="card-body pb-0">   <h1>        <img  src="http:\\localhost\advanced1\images\create\pedido.png" alt="AdminLTE Logo" class=""  width="100" height="100" style="opacity: .8">
            <?= Html::encode($this->title) ?> </h1><p></p>
        <p></p>
        <a href="index.php?r=prato" class="btn btn-sm btn-primary">
            <i class="fas fa-backward"></i> Voltar
        </a>
        <p></p>

        <p align="right">
            <?= Html::a('Criar Pedido', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
<?php $allPedidos = \backend\models\Pedido::find()->orderBy(['data' => SORT_DESC ])->all();
foreach($allPedidos as $pedido) {

?>
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
            <!-- Default box -->
            <div>
               <h2>ID: <?php  echo "$pedido->idpedido"; ?></h2>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b> <?php if($pedido->id_reserva != null){  echo "ID Reserva: $pedido->id_reserva";} ?> </b></h2>
                        <p class="text-muted text-sm"><b>   <?php  echo "$pedido->data"; ?>  </b>    <?php  echo "$pedido->tipo"; ?>  </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li><span class="fa-li"><i class="fas fa-user"></i></span>ID Cliente:<?php echo"$pedido->id_clientes"; ?> </li>
                            <p></p>
                            <li><span class="fa-li"><i class="fas fa-tag"></i></span>Preço Total:<?php  echo "$pedido->preco"; ?>  </li>
                            <p></p>
                            <li><span class="fa-li"><i class="fas fa-chalkboard"></i></span>Estado:    <?php  echo "$pedido->estadopedido"; ?> </li>
                            <p></p>
                            <li><span class="fa-li"><i class="fas fa-list-ol"></i></span>ID Prato:    <?php  echo "$pedido->idpratoorder"; ?> </li>
                            <p></p>
                            <li><span class="fa-li"><i class="fas fa-pizza-slice"></i></span>Nome Prato:    <?php  $allPratosPedidos = \backend\models\Prato::find()->where(['idPratos' => $pedido])->all();
                                foreach($allPratosPedidos as $prato) {
                                    echo $prato->nome;} ?> </li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
</div>

