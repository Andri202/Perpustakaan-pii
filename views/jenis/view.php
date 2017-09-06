<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Buku;

/* @var $this yii\web\View */
/* @var $model app\models\Jenis */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-view">

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
            'nama',
        ],
    ]) ?>

</div>

<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
            </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($model->getBuku()->all() as $buku): ?>
            <tr>
                <td>
                    <?= $i++; ?>
                </td>
                <td>
                    <?= $buku->nama; ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>