<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\ListAsset;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReservaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reserva';
$this->params['breadcrumbs'][] = $this->title;
ListAsset::register($this);
?>
<div class="reservas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Reserva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>

<?php if (Yii::$app->user->identity->restauranteid != null) {
$allReservas = \backend\models\Reserva::find()->orderBy('data')->where(['id_restaurante' => Yii::$app->user->identity->restauranteid])->all();
foreach($allReservas as $reserva) {

?>
            <tr>
                <th style="width: 1%">
                    #
                </th>
                <th style="width: 20%">
                    Reserva ID:<?php  echo "$reserva->idreservas"; ?>
                </th>
                <th style="width: 30%">
                    Restaurante
                </th>
                <th>
                    Tipo
                </th>
                <th style="width: 8%" class="text-center">
                    Mesa
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    #
                </td>
                <td>
                    <a>
                        Cliente ID:<?php  echo "$reserva->id_cliente"; ?>
                    </a>
                    <br/>
                    <small>
                        <?php  echo "$reserva->data"; ?>
                    </small>
                </td>
                <td>
                    <ul class="list-inline">
                            ID: <?php  echo "$reserva->id_restaurante"; ?>
                            <p>
                            Hora:<?php  echo "$reserva->hora"; ?>
                            </p>
                    </ul>
                </td>
                <td >
                    <div >
                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                        </div>
                    </div>
                    <small>
                        <p>
                            Tipo:<?php  echo "$reserva->tipo"; ?>
                        </p>
                    </small>
                </td>
                <td class="project-state">
                    <span > <p>
                            Pessoas:<?php  echo "$reserva->npessoas"; ?>
                            </p></span>
                    <p>
                        Sala:<?php  echo "$reserva->quartos"; ?>
                    </p>

                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="#">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>
                </td>
            </tr>
</div>

    <?php }}?></table>
</div>
