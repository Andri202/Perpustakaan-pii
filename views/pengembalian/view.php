<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Peminjaman;
/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_buku',
            'id_user',
            'waktu_dipinjam',
            'waktu_pengembalian',
            [
                'attribute' => 'id',
                'label' => 'Lama Hari',
                'value' => function($data){
                    return $data->getLamaPinjam();
                }
            ],
            [
                'attribute' => 'id',
                'label' => 'Denda',
                'value' => function($data){
                    return $data->getDenda();
                }
            ],
            [
                'attribute' => 'kembali',
                'label' => 'Kembali',
                'value' => function($data){
                    return $data->getKembali();
                }
            ],
        ],
    ]) ?>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>

</div>
