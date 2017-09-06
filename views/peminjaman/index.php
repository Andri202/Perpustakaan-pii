<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' =>'id_user',
                'label' => 'Nama User',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->user->nama, ['/user/view', 'id' => $data->id_user]);
                }
            ],
            [
                'attribute' =>'id_buku',
                'label' => 'Judul Buku',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->buku->nama, ['/buku/view', 'id' => $data->id_buku]);
                }
            ],
            'waktu_dipinjam',
            'waktu_pengembalian',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
