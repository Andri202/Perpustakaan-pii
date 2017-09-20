<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">
	    <?php $form = ActiveForm::begin(); ?>
	    <?= $form->field($model, 'max_hari')->textInput() ?>

	    <?= $form->field($model, 'hrg_denda')->textInput() ?>

	    <?= $form->field($model, 'max_buku')->textInput() ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
</div>
