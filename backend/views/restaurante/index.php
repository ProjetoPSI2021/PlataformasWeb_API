<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\RestaurantesAsset;



/* @var $this yii\web\View */
/* @var $searchModel backend\models\RestauranteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Restaurante';
$this->params['breadcrumbs'][] = $this->title;
RestaurantesAsset::register($this);
?>

<div class="restaurantes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Restaurante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idRestaurante',
            'nome',
            'morada',
            //'imagem',
            'salas',
            'mesas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
