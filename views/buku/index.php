<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use yii\helpers\Url;
use app\models\User;
use yii\grid\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buku';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if(User::isAdmin()){ ?>
    <p>
        <?= Html::a('Create Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
            [
               'attribute' => 'id_jenis',
               'label'  => 'Jenis',
               'format' => 'raw',
               'value'  => function($data) {
                    return Html::a($data->jenis->nama, ['/jenis/view', 'id' => $data->id_jenis]);
               }
            ],
            [
                'attribute' => 'id_penulis',
                'label' =>  'Penulis',
                'format' => 'raw',
                'value' =>  function($data){
                    return Html::a($data->getNamaPenulis(), ['/penulis/view', 'id' => $data->id_penulis]);
                }
            ],
            [
                'attribute' =>  'id_penerbit',
                'label' =>  'Penerbit',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->getNamaPenerbit(), ['/penerbit/view', 'id' => $data->id_penerbit]);
                }
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ] );
    }elseif(User::isUser()){ ?>

        <?php Pjax::begin(); ?> <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
            [
               'attribute' => 'id_jenis',
               'label'  => 'Jenis',
               'format' => 'raw',
               'value'  => function($data) {
                    return Html::a($data->jenis->nama, ['/jenis/view', 'id' => $data->id_jenis]);
               }
            ],
            [
                'attribute' => 'id_penulis',
                'label' =>  'Penulis',
                'format' => 'raw',
                'value' =>  function($data){
                    return Html::a($data->getNamaPenulis(), ['/penulis/view', 'id' => $data->id_penulis]);
                }
            ],
            [
                'attribute' =>  'id_penerbit',
                'label' =>  'Penerbit',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->getNamaPenerbit(), ['/penerbit/view', 'id' => $data->id_penerbit]);
                }
            ],
            
            ['class' =>ActionColumn::className(),'template'=>'{view}'],
        ],
    ] );

        }
     Pjax::end(); ?></div>    
