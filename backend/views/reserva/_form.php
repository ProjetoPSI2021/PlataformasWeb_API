<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <?= $form->field($model, 'id_restaurante')->textInput() ?>

    <?= $form->field($model, 'data')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-dd'
        ],
    ]);?>

    <?= $form->field($model, 'hora')->textInput() ?>

    <?= $form->field($model, 'tipo')->dropDownList([ 'Normal' => 'Normal', 'Privado' => 'Privado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'npessoas')->textInput() ?>

    <?= $form->field($model, 'quartos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
