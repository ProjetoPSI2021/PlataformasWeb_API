<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurante */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Create Restaurante - Admin';
?>
<div class="login-box">
    <div class="login-logo">
        <img src="http:\\localhost\advanced1\images\create\restaurante.png" alt="AdminLTE Logo" class=""  width="100" height="100" style="opacity: .8">

    </div>

<div class="restaurantes-form">
    <div class="card">
        <div class="card-body login-card-body">
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


