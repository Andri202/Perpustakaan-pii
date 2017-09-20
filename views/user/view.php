<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-primary">
    
    <div class="box-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <hr>
    </div>
    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nama',
                'username',
                [
                    'attribute' => 'role',
                    'label' => 'Nama User',
                    'value' => function($data){
                        return $data->roleInfo->nama;
                    }
                ],
            ],
        ]) ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
            <?php if (User::isAdmin()) { ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-block',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?php } ?>
        </p>
    </div>
</div>
