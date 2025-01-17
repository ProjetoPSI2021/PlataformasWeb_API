<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\RestaurantesAsset;




/* @var $this yii\web\View */
/* @var $searchModel backend\models\RestauranteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Restaurante';
$this->params['breadcrumbs'][] = $this->title;

RestaurantesAsset::register($this);
?>

<div class="restaurantes-index">
<p></p>
    <div class="card card-solid">
        <div class="card-body pb-0">
    <h1><img  src="http:\\localhost\advanced1\images\create\restaurante.png" alt="AdminLTE Logo" class=""  width="100" height="100" style="opacity: .8">
        <?= Html::encode($this->title) ?> </h1><p></p>

    <p>
        <?= Html::a('Criar Restaurante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>





</div>
<!-- Default box -->
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
            <?php $allRestaurantes = \backend\models\Restaurante::find()->orderBy('idRestaurante')->all();
            foreach($allRestaurantes as $restaurante) {

            ?>
                <!-- Default box -->
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            <?php  echo "$restaurante->idRestaurante"; ?>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>   <?php  echo "$restaurante->nome"; ?> </b></h2>
                                    <p class="text-muted text-sm"><b>   <?php  echo "$restaurante->nome"; ?>  </b>    <?php  echo "$restaurante->nome"; ?>  </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Morada:<?php echo"$restaurante->morada"; ?> </li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-person-booth"></i></span>Salas:<?php  echo "$restaurante->salas"; ?> / Mesas:<?php  echo "$restaurante->mesas"; ?>  </li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>    <?php  echo "$restaurante->telefone"; ?> </li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="http:\\localhost\advanced1\images\Restaurantes\<?php  echo "$restaurante->imagem"; ?>" alt="NO IMAGE" class="img-circle img-fluid" width="160" height="160">                                        </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="index.php?r=restaurante%2Fview&id=<?php  echo "$restaurante->idRestaurante"; ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-search"></i> Ver Restaurante
                                </a>
                            </div>
                        </div>
                    </div>
                </div>




            <?php }?>






