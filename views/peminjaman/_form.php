<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Buku;
use app\models\User;

use kartik\date\DatePicker;

$model->waktu_dipinjam=date('Y-m-d');

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
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

 	<?=  $form-> field($model, 'waktu_dipinjam')->widget(DatePicker::classname(), [
			'type' => DatePicker::TYPE_COMPONENT_APPEND,
			'options' => ['placeholder' => 'Tanggal Pinjam'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd', 
            ]
        ]);
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
