<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurante */

$this->title = 'Update Restaurante: ' . $model->idRestaurante;
$this->params['breadcrumbs'][] = ['label' => 'Restaurante', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRestaurante, 'url' => ['view', 'id' => $model->idRestaurante]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="restaurantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
