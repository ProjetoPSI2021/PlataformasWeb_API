<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cliente */

$this->title = 'Update Cliente: ' . $model->idCliente;
$this->params['breadcrumbs'][] = ['label' => 'Cliente', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCliente, 'url' => ['view', 'id' => $model->idCliente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clientes-update">

<p></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
