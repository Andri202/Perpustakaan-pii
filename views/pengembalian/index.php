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
<div class="peminjaman-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_buku',
                'label' => 'Judul Buku',
                'value' => function($data){
                    return $data->buku->nama;
                }

            ],
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
