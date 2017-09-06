<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "penulis".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $id_jenis_kelamin
 * @property string $alamat
 */
class Penulis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penulis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'id_jenis_kelamin'], 'required'],
            [['id_jenis_kelamin'], 'integer'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'id_jenis_kelamin' => 'Id Jenis Kelamin',
            'alamat' => 'Alamat',
        ];
    }


    public function getJenisKelamin()
    {
        return $this->hasOne(JenisKelamin::className(), ['id' => 'id_jenis_kelamin']);
    }


    public function getList(){
        return ArrayHelper::map(Penulis::find()->all(), 'id','nama');
    }


}
