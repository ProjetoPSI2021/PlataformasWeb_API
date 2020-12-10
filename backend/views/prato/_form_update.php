<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pratos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'tipo')->dropDownList([ 'Fast Food' => 'Fast Food', 'Japones' => 'Japones', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'r_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Restaurante::find()->all(),'idRestaurante','nome'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'r_preco')->textInput() ?>

    <?= $form->field($model, 'r_desconto')->textInput() ?>

    <?= $form->field($model, 'r_ingredientes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_topfood')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
