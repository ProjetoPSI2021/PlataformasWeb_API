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
    <div class="card card-solid">
        <div class="card-body pb-0">
    <h1><img  src="http:\\localhost\advanced1\images\create\reserva.png" alt="AdminLTE Logo" class=""  width="250" height="150" style="opacity: .8">
        <?= Html::encode($this->title) ?> </h1><p></p>

    <p>
        <?= Html::a('Criar Reserva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
<?php $allReservas = \backend\models\Reserva::find()->orderBy(['data' => SORT_DESC])->all();
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
                    <a class="btn btn-primary btn-sm" href="index.php?r=reserva%2Fview&id=<?php  echo "$reserva->idreservas"; ?>">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="index.php?r=reserva%2Fupdate&id=<?php  echo "$reserva->idreservas"; ?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <?= Html::a('Delete', ['delete', 'id' => $reserva->idreservas], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
</div>

    <?php }?></table>
</div>
