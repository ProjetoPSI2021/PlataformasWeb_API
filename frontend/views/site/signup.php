<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../frontend/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../frontend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../frontend/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div>
    <div class="login-logo">

        <img src="http:\\localhost\advanced1\images\logo\logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <a><b>EatAway</b></a>
    </div>
    <!-- /.login-logo -->

    <div class="container">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign up to start your session</p>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <div class="input-group-append">

                </div>
                <?= $form->field($model, 'email') ?>
                <div class="input-group-append">

                </div>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?php

                $authItems = ArrayHelper::map($authItems, 'name','name')
                ?>

                <?= $form->field($model, 'permissions')->checkboxList($authItems); ?>

                <a class="icheck-primary" >Concordo que sou um funcionário de um restaurante pertencente à EatAway.</a>
                <p>
                <a class="icheck-primary" >Todos os campos são obrigatórios.</a></p>

            </div>

        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">

                </div><div class="col-4">
                    <?php ?>
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']);
                     ?>
                </div>
            </div>
            <!-- /.col -->

            <!-- /.col -->

        </div> <?php ActiveForm::end(); ?>
        <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign up using Facebook
            </a>
            <a class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign up using Google+
            </a>
        </div>
        <!-- /.social-auth-links -->


    </div>
    <!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../frontend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../frontend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../frontend/dist/js/adminlte.min.js"></script>

</body>
</html>


