<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = 'Create Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-create box box-primary">
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
