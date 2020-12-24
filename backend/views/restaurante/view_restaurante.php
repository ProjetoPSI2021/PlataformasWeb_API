<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Restaurante */

$this->title = $model->idRestaurante;
$this->params['breadcrumbs'][] = ['label' => 'Restaurante', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="restaurantes-view">

 <p></p>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idRestaurante], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idRestaurante], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Create Prato', ['create'], ['class' => 'btn btn-success']) ?>

    </p>


</div>
<!-- Default box -->
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
            <?php if(Yii::$app->user->identity->restauranteid!=null) {
             $allPratos = \backend\models\Prato::find()->orderBy('idPratos')->where(['r_id' => Yii::$app->user->identity->restauranteid])->all();
            foreach($allPratos as $prato) {

                ?>
                <!-- Default box -->
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            <?php  echo "$prato->idPratos"; ?>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>   <?php  echo "$prato->nome"; ?> </b></h2>
                                    <p class="text-muted text-sm"><b>   <?php  echo "$prato->nome"; ?>  </b>    <?php  echo "$prato->nome"; ?>  </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Morada:<?php echo"$prato->tipo"; ?> </li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-person-booth"></i></span>Salas:<?php  echo "$prato->tipo"; ?> / Mesas:<?php  echo "$prato->tipo"; ?>  </li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>    <?php  echo "$prato->tipo"; ?> </li>

                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="http:\\localhost\advanced1\images\comida\<?php  echo "$prato->imagem"; ?>" alt="" class="img-circle img-fluid" width="160" height="160">                                        </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="index.php?r=prato%2Fview&id=<?php  echo "$prato->idPratos"; ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-search"></i> Ver Comida
                                </a>
                            </div>
                        </div>
                    </div>
                </div>




            <?php }} else { ?> <p>teste <?php }?>



