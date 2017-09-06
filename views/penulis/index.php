<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\JenisKelamin;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penulis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penulis-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Penulis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
            [
                'attribute'=>'id_jenis_kelamin',
                'label'=>'Jenis Kelamin',
                'value'=> function($data){
                        return $data->jenisKelamin->nama;
                }
            ],
            'alamat:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
