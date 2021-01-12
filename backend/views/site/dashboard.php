<?php

/* @var $this yii\web\View */

use backend\assets\DashboardAsset;
use backend\models\Restaurante;
$this->title = 'EatAway';
DashboardAsset::register($this);
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bem-Vindo <?php echo Yii::$app->user->identity->username?>!</h1>

        <?php  if(Yii::$app->user->identity->restauranteid == null){
            ?>   <p class="lead">Ainda não pertence a um restaurante</p><?php
        }else { ?>        <p class="lead">Pertence ao Restaurante ID:<?php echo Yii::$app->user->identity->restauranteid ?></p><?php
        }?>


        <?php  if(Yii::$app->user->identity->restauranteid == null){
            ?>   <a class="btn btn-lg btn-success" href="../../backend/web/index.php?r=user%2Fchooserest&id=1">
                <i class="fas fa-coffee"></i>&nbspAssociar Restaurante</a></p><?php
        }else { ?>       <a class="btn btn-lg btn-success" href="../../backend/web/index.php?r=restaurante%2Fviewrestaurante&id=<?php echo Yii::$app->user->identity->restauranteid ?>">
            <i class="fas fa-coffee"></i>&nbspVer Meu Restaurante</a></p><?php
        }?>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Gerir Pedidos</h2>

                <p><img src="http:\\localhost\advanced1\images\dashboard\takeawayimg.jpg" alt="Takeaway" width="320" height="250" style="opacity: .8;border: 3px solid #000; padding: 0;"></p>

                <?php  if(Yii::$app->user->identity->restauranteid == null){
                    ?>   <p><a class="btn btn-default btn-lg disabled" role="button" aria-disabled="true">Pedidos &raquo;</a></p><?php
                }else { ?>      <p><a class="btn btn-default" href="../../backend/web/index.php?r=pedido%2Fviewpedido">Pedidos &raquo;</a></p><?php
                }?>
            </div>
            <div class="col-lg-4">
                <h2>Gerir Pratos</h2>

                <p><img src="http:\\localhost\advanced1\images\dashboard\foodimg.jpg" alt="Food" width="320" height="250"  style="opacity: .8;border: 3px solid #000; padding: 0;"></p>

                <?php  if(Yii::$app->user->identity->restauranteid == null){
                    ?>   <p><a class="btn btn-default btn-lg disabled" role="button" aria-disabled="true">Pratos &raquo;</a></p><?php
                }else { ?>         <p><a class="btn btn-default" a href="../../backend/web/index.php?r=prato%2Fviewprato">Pratos &raquo;</a></p><?php
                }?>
            </div>
            <div class="col-lg-4">
                <h2>Gerir Reservas</h2>

                <p><img src="http:\\localhost\advanced1\images\dashboard\reservationimg.jpg" alt="Takeaway" width="320" height="250"  style="opacity: .8;border: 3px solid #000; padding: 0;"></p>


                <?php  if(Yii::$app->user->identity->restauranteid == null){
                    ?>   <p><a class="btn btn-default btn-lg disabled" role="button" aria-disabled="true">Reservas &raquo;</a></p><?php
                }else { ?>          <p><a class="btn btn-default" href="../../backend/web/index.php?r=reserva%2Fviewreserva" >Reservas &raquo;</a></p><?php
                }?>
            </div>
        </div>

    </div>
</div>
