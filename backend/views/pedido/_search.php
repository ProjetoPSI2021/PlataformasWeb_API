<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpedido') ?>

    <?= $form->field($model, 'id_reserva') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'id_clientes') ?>

    <?= $form->field($model, 'estadopedido') ?>

    <?php // echo $form->field($model, 'preco') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
