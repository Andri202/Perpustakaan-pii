<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = 'Change Setting';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-update box box-primary">
	<div class="box-header">
	    <h1><?= Html::encode($this->title) ?></h1>
		<hr>
	</div>
	<div class="box-body">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</div>
</div>
