<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(user::isAdmin()){ ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
             [
               'attribute' => 'id_jenis',
               'label' => 'Jenis',
               'value' => function($data) {
                     return $data->jenis->nama;
               }
            ],
        ],
    ]) ?>

</div>
