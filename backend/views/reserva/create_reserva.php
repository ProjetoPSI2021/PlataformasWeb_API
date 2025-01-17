<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reserva */

$this->title = 'Create Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Reserva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_rest', [
        'model' => $model,
    ]) ?>

</div>


<!-- /.content -->
</div>
<!-- /.content-wrapper -->