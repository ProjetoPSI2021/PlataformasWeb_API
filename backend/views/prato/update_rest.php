<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */

$this->title = 'Update Prato: ' . $model->idPratos;
$this->params['breadcrumbs'][] = ['label' => 'Pratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPratos, 'url' => ['view', 'id' => $model->idPratos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update_rest', [
        'model' => $model,
    ]) ?>

</div>
