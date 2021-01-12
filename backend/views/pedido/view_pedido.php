<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="card card-solid">
    <div class="card-body pb-0">   <h1>        <img  src="http:\\localhost\advanced1\images\create\pedido.png" alt="AdminLTE Logo" class=""  width="100" height="100" style="opacity: .8">
            <?= Html::encode($this->title) ?> </h1><p></p>



        <a href="index.php?r=pedido%2Fviewpedidopendente" class="btn btn-sm btn-primary">
            <i class="fas fa-is"></i> Ver pedidos pendentes
        </a>

        <p align="right">
            <?= Html::a('Criar Pedido', ['createrest'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php

        if (Yii::$app->user->identity->restauranteid != null) {
        $allPedidos = \backend\models\Pedido::find()->orderBy(['data' => SORT_DESC ])->where(['idrestaurantepedido' => Yii::$app->user->identity->restauranteid])->all();
        foreach($allPedidos as $pedido) {

        ?>
        <!-- Default box -->
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
                            <li><span class="fa-li"><i class="fas fa-chalkboard"></i></span>Estado:    <?php  echo "$pedido->estadopedido"; ?>
                            <?php if($pedido->estadopedido == "Pendente"){
                                ?>
                            <img src="http:\\localhost\advanced1\images\icons\pendente.png"  width="40" height="40" class="brand-image img-circle elevation-3" style="opacity: .8">
                    </li>
                    <?php
                            }elseif($pedido->estadopedido == "Em curso"){?>
                <img src="http:\\localhost\advanced1\images\icons\emcurso.png"  width="40" height="40" class="brand-image" style="opacity: .8">
                </li>
                    <?php
                            }elseif($pedido->estadopedido == "Concluido"){?>
                            <img src="http:\\localhost\advanced1\images\icons\concluido.png"  width="40" height="40" class="brand-image" style="opacity: .8">
                            </li>
                            <?php
                            }else{?> <img src="http:\\localhost\advanced1\images\icons\recusado.png"  width="40" height="40" class="brand-image img-circle elevation-3" style="opacity: .8">
<?php }?>
                <p></p>
                            <li><span class="fa-li"><i class="fas fa-list-ol"></i></span>ID Prato:    <?php  echo "$pedido->idpratoorder"; ?> </li>
                            <p></p>
                            <li><span class="fa-li"><i class="fas fa-pizza-slice"></i></span>Nome Prato:    <?php  $allPratosPedidos = \backend\models\Prato::find()->where(['idPratos' => $pedido->idpratoorder])->all();
    foreach($allPratosPedidos as $prato) {
                                echo $prato->nome;} ?> </li>
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

                </div>
            </div>
        </div>
    </div>
</div>
<?php }}?>
</div>

