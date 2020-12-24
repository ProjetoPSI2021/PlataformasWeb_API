<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_reserva')->textInput() ?>

    <?= $form->field($model, 'idrestaurantepedido')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Restaurante::find()->all(),'idRestaurante','nome'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select a Restaurant ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'data')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-dd'
        ]
    ]);?>

    <?= $form->field($model, 'tipo')->dropDownList([ 'Takeaway' => 'Takeaway', 'Reserva' => 'Reserva', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_clientes')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Cliente::find()->all(),'idCliente','username'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'preco')->textInput() ?>

    <?= $form->field($model, 'estadopedido')->dropDownList([ 'Pendente' => 'Pendente', 'Aceite' => 'Aceite','Recusado' => 'Recusado', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
