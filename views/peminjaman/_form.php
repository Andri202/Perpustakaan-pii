<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Buku;
use app\models\User;
use app\models\Setting;

use kartik\date\DatePicker;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
$date = date('Y-m-d');
$model->waktu_pengembalian = date('Y-m-d', strtotime($date.'+ '.Setting::getSetting()->max_hari.' days'));

$resultData = [
    array("id"=>1,"name"=>"Cyrus","email"=>"risus@consequatdolorvitae.org"),
    array("id"=>2,"name"=>"Justin","email"=>"ac.facilisis.facilisis@at.ca"),
    array("id"=>3,"name"=>"Mason","email"=>"in.cursus.et@arcuacorci.ca"),
    array("id"=>4,"name"=>"Fulton","email"=>"a@faucibusorciluctus.edu"),
    array("id"=>5,"name"=>"Neville","email"=>"eleifend@consequatlectus.com"),
    array("id"=>6,"name"=>"Jasper","email"=>"lectus.justo@miAliquam.com"),
    array("id"=>7,"name"=>"Neville","email"=>"Morbi.non.sapien@dapibusquam.org"),
    array("id"=>8,"name"=>"Neville","email"=>"condimentum.eget@egestas.edu"),
    array("id"=>9,"name"=>"Ronan","email"=>"orci.adipiscing@interdumligulaeu.com"),
    array("id"=>10,"name"=>"Raphael","email"=>"nec.tempus@commodohendrerit.co.uk"),     
    ];

    $dataProvider = new ArrayDataProvider([
        'key'=>'id',
        'allModels' => $resultData,
        'sort' => [
            'attributes' => ['id', 'name', 'email'],
        ],
]);

?>
<div class="peminjaman-form box box-primary">
<div class="box-body">
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
	
	<?=
		Html::dropDownList('idbuku',null,Buku::getListBuku(),
    	['prompt'=>'Pilih Buku']);
	 ?>
	 <select id="thedropdown">
  <option value="1">one</option>
  <option value="2">two</option>
</select>
	 <button value="1" id="insert">1</button>
	 <p id="inner"></p>

    <?php

    echo GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',

            [
            'attribute' => 'name', 
            'value' => 'name',
            ],
            [
            "attribute" => "email",
            'value' => 'email',
            ]

    ]
]);

    ?>
    </div>

</div>
  <script src="//code.jquery.com/jquery-3.2.1.js"></script>
  <script src="//code.jquery.com/ui/3.2.1/jquery-ui.js"></script>
<script type="text/javascript">
	var values = [];

	$("#insert").click(function(){
	      alert("You entered p1!");
	      $text = $('#idbuku option:selected').text();
	       $('#inner').text($text);
	});

</script>
