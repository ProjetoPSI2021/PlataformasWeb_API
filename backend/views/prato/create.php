<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */

$this->title = 'Create Prato';
$this->params['breadcrumbs'][] = ['label' => 'Prato', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pratos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
