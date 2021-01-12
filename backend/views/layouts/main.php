<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\ListAsset;
use yii\helpers\Html;
use yii\helpers\Url;

ListAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>


<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../../index3.html" class="nav-link"></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link"></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to(['site/logout'])?>" data-method="post">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>




        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../backend/web/index.php"" class="brand-link">
        <img src="http:\\localhost\advanced1\images\logo\logo.png" alt="EatAway Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
<span class="brand-text font-weight-light">EatAway</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a name="useridentity"><?php echo Yii::$app->user->identity->username?></a>
                </div>
            </div>   <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->  <li class="nav-item has-treeview">
            <?php if (Yii::$app->user->identity->restauranteid == null){ ?>
            <!-- Sidebar Menu -->
                        <a href="../../backend/web/index.php?r=user%2Fchooserest" class="nav-link">
                            <i class="nav-icon fas fa-link"></i>
                            <p>
                                Associar Restaurante
                            </p>
                        </a>
                    </li>
                    <?php }?>
<?php if (\Yii::$app->user->can('create-clients')) {?>
            <!-- Sidebar Menu -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard Admin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../../backend/web/index.php?r=cliente" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Clientes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../backend/web/index.php?r=pedido" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pedidos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../backend/web/index.php?r=prato" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ementa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../backend/web/index.php?r=reserva" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reservas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../backend/web/index.php?r=restaurante" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Restaurantes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../backend/web/index.php?r=user" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Funcionarios</p>
                                </a>
                            </li>
                        </ul>
                    </li>
<?php }?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <?php if(Yii::$app->user->identity->restauranteid != null){?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fas fa-utensils"></i>
                                    <p>
                                        Restaurante
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../../backend/web/index.php?r=pedido%2Fviewpedido" class="nav-link">
                                            <i class="fas fa-shopping-cart"></i>
                                            <p> &nbsp Pedidos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../../backend/web/index.php?r=prato%2Fviewprato" class="nav-link">
                                            <i class="fas fa-pizza-slice"></i>
                                            <p> &nbsp Comida</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../../backend/web/index.php?r=reserva%2Fviewreserva" class="nav-link">
                                            <i class="fab fa-elementor"></i>
                                            <p> &nbsp Reservas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../../backend/web/index.php?r=restaurante%2Fviewrestaurante&id=<?php echo Yii::$app->user->identity->restauranteid ?>" class="nav-link">
                                            <i class="fas fa-drumstick-bite"></i>
                                            <p>&nbspMeu Restaurante</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php }?>
                            <?php if(Yii::$app->user->identity->restauranteid != null){?>

                            <li class="nav-item">
                        <a href="../../backend/web/index.php?r=restaurante%2Fviewrestaurante&id=<?php echo Yii::$app->user->identity->restauranteid ?>" class="nav-link">
                            <i class="nav-icon fas fa-drumstick-bite"></i>
                            <p>
                                Meu Restaurante
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                            <?php }?>

        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container">
            <?= $content ?>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage()?>

