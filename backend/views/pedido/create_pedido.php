<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */


$this->params['breadcrumbs'][] = ['label' => 'Pedido', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_rest', [
        'model' => $model,
    ]) ?>

</div>
