<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Buku;
use app\models\User;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
$date = date('Y-m-d');
$model->waktu_pengembalian = date('Y-m-d', strtotime($date.'+7 days'));
?>

<div class="peminjaman-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'id_buku')->dropDownList(
		Buku::getListBuku(),
		['prompt'=>'Pilih Buku']
		)
	?>

    <?= $form->field($model, 'id_user')-> dropDownList(
    	User::getListUser(),
    	['prompt'=>'Pilih User']
    	)
    ?>
	
	<?= $form->field($model, 'waktu_pengembalian')->widget(DatePicker::classname(),[
			'type' => DatePicker::TYPE_COMPONENT_APPEND,
			'options'=>['placeholder' => 'Tanggal Kembali'],
			'pluginOptions' =>[
				'autoclose' => true,
				'format' => 'yyyy-mm-dd',
			]
		]);
	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
