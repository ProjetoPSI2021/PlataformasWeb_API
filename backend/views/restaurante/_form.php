<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurante */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="restaurantes-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>

    <?= $form->field($model, 'salas')->textInput() ?>

    <?= $form->field($model, 'mesas')->textInput() ?>

    <?= $form->field($model, 'telefone')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


