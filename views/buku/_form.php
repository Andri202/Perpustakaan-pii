<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Jenis;
use app\models\Penerbit;
use app\models\Penulis;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'id_jenis')->dropDownList(
		Jenis::getList(),
		['prompt'=>'Select Jenis Buku']) 
	?>

	<?= $form->field($model, 'id_penulis')->dropDownList(
		Penulis::getList(),
		['prompt'=>'Pilih Penulis']
		)
	?>

	<?= $form->field($model, 'id_penerbit')->dropDownList(
		Penerbit::getList(),
		['prompt'=>'Pilih Penerbit']
		)
	?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
