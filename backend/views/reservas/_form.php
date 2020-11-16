<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Reservas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <?= $form->field($model, 'id_restaurante')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'hora')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'npessoas')->textInput() ?>

    <?= $form->field($model, 'quartos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
