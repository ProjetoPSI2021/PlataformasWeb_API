<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */

$this->title = $model->idPratos;
$this->params['breadcrumbs'][] = ['label' => 'Pratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>



<!-- Default box -->
<p></p>
<a href="index.php?r=prato" class="btn btn-sm btn-primary">
    <i class="fas fa-backward"></i> Voltar
</a>
<p></p>
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
                <!-- Default box -->
                    <div>
                            <?php  echo "$model->idPratos"; ?>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>   <?php  echo "$model->nome"; ?> </b></h2>
                                    <p class="text-muted text-sm"><b>   <?php  echo "$model->nome"; ?>  </b>    <?php  echo "$model->nome"; ?>  </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i ></i></span>Tipo:<?php echo"$model->tipo"; ?> </li>
                                        <li class="small"><span class="fa-li"><i ></i></span>Preco:<?php  echo "$model->r_preco"; ?>  </li>
                                        <li class="small"><span class="fa-li"><i ></i></span> Ingredientes:   <?php  echo "$model->r_ingredientes"; ?> </li>

                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="http:\\localhost\advanced1\images\comida\<?php  echo "$model->imagem"; ?>" alt="" class="img-circle img-fluid" width="160" height="160">                                        </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" >
                                   <?= Html::a('Delete', ['delete', 'id' => $model->idPratos], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                </a>
                                <a href="index.php?r=prato%2Fview&id=<?php  echo "$model->idPratos"; ?>" >
                                        <?= Html::a('Update', ['update', 'id' => $model->idPratos], ['class' => 'btn btn-primary']) ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="prato-view">






