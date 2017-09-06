<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$title = "Data Peminjaman";

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attributes' => 'id_buku',
                'label' => 'Judul Buku',
                'format' => 'raw',
                'value' => function($data){
                    return $data->buku->nama;
                }
            ],
            [
                'attributes' => 'id_user',
                'label' => 'Nama User',
                'format' => 'raw',
                'value' => function($data){
                    return $data->user->nama;
                }
            ],
            'waktu_dipinjam',
            'waktu_pengembalian',
        ],
    ]) ?>

</div>