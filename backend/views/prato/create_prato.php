<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */


$this->params['breadcrumbs'][] = ['label' => 'Pratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_rest', [
        'model' => $model,
    ]) ?>

</div>
