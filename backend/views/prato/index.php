<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PratoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prato';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pratos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Prato', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pratos',
            'id_pedidos',
            'nome',
            'imagem',
            'tipo',
            //'r_id',
            //'r_preco',
            //'r_desconto',
            //'r_ingredientes',
            //'r_topfood',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
