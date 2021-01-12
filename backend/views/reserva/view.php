<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reserva */

$this->title = $model->idreservas;
$this->params['breadcrumbs'][] = ['label' => 'Reserva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reservas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><a class="btn btn-default" href="../../backend/web/index.php?r=reserva%2Fviewreserva">Reservas &raquo;</a></p>


    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">

                <!-- Default box -->
                <div>
                    <h2>ID: <?php  echo "$model->idreservas"; ?></h2>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <p class="text-muted text-sm"><b>   <?php  echo "$model->data"; ?>  </b>    <?php  echo "$model->tipo"; ?>  </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li><span class="fa-li"><i class="fas fa-user"></i></span>Cliente:<?php echo"$model->id_cliente"; ?> </li>
                                <p></p>
                                <li><span class="fa-li"><i class="fas fa-utensils"></i></span>Restaurante:<?php echo"$model->id_restaurante"; ?> </li>
                                <p></p>
                                <li><span class="fa-li"><i class="fas fa-male"></i></span>NºPessoas:<?php  echo "$model->npessoas"; ?>  </li>
                                <p></p>
                                <li><span class="fa-li"><i class="fas fa-male"></i></span>Sala:    <?php  echo "$model->quartos"; ?> </li>
                                <p></p>
                                <li><span class="fa-li"><i class="fas fa-list-ol"></i></span>Tipo:    <?php  echo "$model->tipo"; ?> </li>
                                <p></p>
                                <li><span class="fa-li"><i class="far fa-clock"></i></span>Hora:    <?php  echo "$model->hora"; ?> </li>
                                <p></p>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="http:\\localhost\advanced1\images\comida\<?php  echo "$model->idreservas"; ?>" alt="" class="img-circle img-fluid" width="160" height="160">                                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="#" >
                            <?= Html::a('Delete', ['delete', 'id' => $model->idreservas], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </a>
                        <a href="index.php?r=prato%2Fview&id=<?php  echo "$model->idreservas"; ?>" >
                            <?= Html::a('Update', ['update', 'id' => $model->idreservas], ['class' => 'btn btn-primary']) ?>
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

</div>
