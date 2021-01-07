
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">

        <img src="http:\\localhost\advanced1\images\create\pedido.png" alt="AdminLTE Logo" class=""  width="100" height="100" style="opacity: .8">

    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <h3>         <?php $form = ActiveForm::begin(); ?>


                <?= $form->field($model, 'id_cliente')->textInput() ?>

                <?= $form->field($model, 'id_restaurante')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Restaurante::find()->all(),'idRestaurante','nome'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Select a state ...'],
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
                <!-- /.col -->



        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>





