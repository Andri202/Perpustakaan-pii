<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">
<div class="user-index">

    <div class="box-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah User',['create'],['class'=>'btn btn-success btn-flat'])?>
        </p>
    </div>
    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions'=> ['style' => 'text-align:center;'],
                'contentOptions' =>['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'nama',
                'headerOptions' => ['style' => 'text-align:center;'],

            ],
            'username',
            [
                'attribute' => 'role',
                'label' => 'Role',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->roleInfo->nama, ['/role/view', 'id' => $data->role]);
                }
            ],
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value'=> function($data){
                    return $data->getImg(['width'=>'40px']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
