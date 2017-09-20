<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = "Setting";
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-view box box-primary">
    <div class="setting-view">
        <div class="box-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'max_hari',
                        'label' => 'Maksimal Hari',
                    ],
                    [
                        'attribute' => 'hrg_denda',
                        'label' => 'Harga Denda Perhari',
                    ],
                    [
                        'attribute' => 'max_buku',
                        'label' => 'Maksimal Pinjam Buku',
                    ],
                ],
            ]) ?>
               <p>
                <?= Html::a('Change Setting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
            </p>
        </div>
    </div>
</div>
