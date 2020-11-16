<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReservasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idreservas') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'id_restaurante') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'hora') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'npessoas') ?>

    <?php // echo $form->field($model, 'quartos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
