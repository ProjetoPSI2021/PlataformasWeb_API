<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */

$this->title = 'Update Prato: ' . $model->id_pratos;
$this->params['breadcrumbs'][] = ['label' => 'Prato', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pratos, 'url' => ['view', 'id' => $model->id_pratos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pratos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
