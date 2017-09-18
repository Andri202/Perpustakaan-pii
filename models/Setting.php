<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property integer $max_hari
 * @property integer $hrg_denda
 * @property integer $max_buku
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['max_hari', 'hrg_denda', 'max_buku'], 'required'],
            [['max_hari', 'hrg_denda', 'max_buku'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'max_hari' => 'Max Hari',
            'hrg_denda' => 'Hrg Denda',
            'max_buku' => 'Max Buku',
        ];
    }

    public function getSetting()
    {
        $model = Setting::find()
        ->andWhere(['id'=>'1'])
        ->one();

        return $model;
    }
}
