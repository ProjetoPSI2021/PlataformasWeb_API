<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurantes */

$this->title = 'Update Restaurantes: ' . $model->idRestaurante;
$this->params['breadcrumbs'][] = ['label' => 'Restaurantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRestaurante, 'url' => ['view', 'id' => $model->idRestaurante]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="restaurantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
