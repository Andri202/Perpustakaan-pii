<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penerbits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerbit-index box box-primary">
    <div class="box-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <hr>
    </div>
    
    <div class="box-body">
        <p>
            <?= Html::a('Create Penerbit', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
