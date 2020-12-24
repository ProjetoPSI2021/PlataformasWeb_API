<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PratoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPratos') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'imagem') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'r_id') ?>

    <?php // echo $form->field($model, 'r_preco') ?>

    <?php // echo $form->field($model, 'r_ingredientes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
