<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurantes */

$this->title = 'Create Restaurantes';
$this->params['breadcrumbs'][] = ['label' => 'Restaurantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
