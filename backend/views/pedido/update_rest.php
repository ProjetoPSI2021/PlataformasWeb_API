<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */

$this->title = 'Update Pedido: ' . $model->idpedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedido', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpedido, 'url' => ['view', 'id' => $model->idpedido]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedidos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_rest', [
        'model' => $model,
    ]) ?>

</div>
