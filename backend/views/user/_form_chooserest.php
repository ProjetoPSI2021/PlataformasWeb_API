<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <img src="http:\\localhost\advanced1\images\create\restaurante.png" alt="AdminLTE Logo" class=""  width="100" height="100" style="opacity: .8">
    <?php $form = ActiveForm::begin(); ?>

   <h1> <?= $form->field($model, 'restauranteid')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Restaurante::find()->all(),'idRestaurante','nome'),
        'language' => 'de',
        'options' => ['placeholder' => 'Selecione um restaurante ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?></h1>
<p></p>
    <div class="form-group">
        <?= Html::submitButton('<h1>Save</h1>', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
