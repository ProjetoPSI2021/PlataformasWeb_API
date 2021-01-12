<?php

use backend\models\Restaurante;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurante */

$this->title = $model->idRestaurante;
$this->params['breadcrumbs'][] = ['label' => 'Restaurante', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="restaurantes-view">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> ID:<?php  echo "$model->idRestaurante"; ?></h1>
                </div>

                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
</div>
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
            <!-- Default box -->
            <div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h1 ><b>   <?php  echo "$model->nome"; ?> </b></h1>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Morada:<?php echo"$model->morada"; ?> </li>
                            <p></p>
                            <li><span class="fa-li"><i class="fas fa-person-booth"></i></span>Salas:<?php  echo "$model->salas"; ?> </li>
                            <p></p>
                            <li><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>    <?php  echo "$model->telefone"; ?> </li>
                            <p></p>
                            <li><span class="fa-li"><i class="fas fa-lg fa-utensils"></i></span>Mesas:    <?php  echo "$model->mesas"; ?> </li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="http:\\localhost\advanced1\images\restaurantes\<?php  echo "$model->imagem"; ?>" alt="" class="img-circle img-fluid" width="160" height="160">                                        </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="index.php?r=prato%2Fview&id=<?php  echo "$model->idRestaurante"; ?>" >
                        <?= Html::a('Update', ['update', 'id' => $model->idRestaurante], ['class' => 'btn btn-primary']) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-12 ">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                        <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Pedidos Efetuados</span>
                            <span class="info-box-number text-center text-muted mb-0"><?php $allPedid = \backend\models\Pedido::find()->where(['idrestaurantepedido' => $model->idRestaurante])->all();
                                $countPedid=count($allPedid);
                                if($countPedid > 0){
                                    ?> <?php echo $countPedid ?>  <?php
                                }elseif($countPedid == 0){
                                    echo "Não possui pedidos";  } ?> <span></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="info-box bg-light">
                        <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Pratos Disponiveis</span>
                            <span class="info-box-number text-center text-muted mb-0"><?php $allPrat = \backend\models\Prato::find()->where(['r_id' => $model->idRestaurante])->all();
                                $countPrat=count($allPrat);
                                if($countPrat > 0){
                                    ?> <?php echo $countPrat ?>  <?php
                                }elseif($countPrat == 0){
                                    echo "Não possui pratos";  } ?><span></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="info-box bg-light">
                        <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Funcionarios</span>
                            <span class="info-box-number text-center text-muted mb-0"> <?php $allFunc = \backend\models\User::find()->where(['restauranteid' => $model->idRestaurante])->all();
                                $countFunc=count($allFunc);
                                if($countFunc > 0){
                                    ?> <?php echo $countFunc ?>  <?php
                                }elseif($countFunc == 0){
                                    echo "Não possui Funcionarios";  } ?> <span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h4>Pedidos Recentes</h4>
                    <div class="card card-solid">
                        <div class="card-body pb-0">
                            <div class="row d-flex align-items-stretch">
                                <!-- Default box -->
                                <?php $allPedidos = \backend\models\Pedido::find()->orderBy(['data' => SORT_DESC])->limit(3)->where(['idrestaurantepedido' => $model->idRestaurante])->all();
                                $count=count($allPedidos);
                                if($count == 0){
                                ?><p>Ainda não possui pedidos<?php
                                    }
                                    foreach($allPedidos as $pedido) {

                                    ?>

                                <div>

                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b> ID Pedido:  <?php  echo "$pedido->idpedido"; ?> </b></h2>
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
                                    <p></p>
                                    <a href="index.php?r=pedido%2Fview&id=<?php  echo "$pedido->idpedido"; ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-search"></i> Ver Pedido
                                    </a>
                                </div>


                            <?php }?>

                            </div>
