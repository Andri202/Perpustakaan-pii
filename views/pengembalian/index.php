<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

use app\models\User;
use app\models\Buku;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengembalianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengembalian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index box box-primary">
    <div class="box-header">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_user',
                'label' => 'Nama',
                'value' => function($data){
                    return $data->user->nama;
                }
            ],
            'waktu_dipinjam',
            'waktu_pengembalian',
             'denda',
            [
                'attribute'=>'kembali',
                'label' => 'kembali',
                'value' => function($data){
                    return $data->getKembali();
                }
            ],
            ['class' =>ActionColumn::className(),'template'=>'{update}'],
        ],
    ]); ?>
</div>
</div>
