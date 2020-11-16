<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RestaurantesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurantes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idRestaurante') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'morada') ?>

    <?= $form->field($model, 'imagem') ?>

    <?= $form->field($model, 'salas') ?>

    <?php // echo $form->field($model, 'mesas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
