<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reserva */

$this->title = 'Update Reserva: ' . $model->idreservas;
$this->params['breadcrumbs'][] = ['label' => 'Reserva', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idreservas, 'url' => ['view', 'id' => $model->idreservas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reservas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
