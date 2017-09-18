<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = "Setting";
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'max_hari',
            'hrg_denda',
            'max_buku',
        ],
    ]) ?>
       <p>
        <?= Html::a('Change Setting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
    </p>

</div>
