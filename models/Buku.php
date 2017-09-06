<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

use yii\helpers\Url;

/**
 * This is the model class for table "buku".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $id_jenis
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenis'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['id_penulis'], 'safe'],
            [['id_penerbit'], 'safe'],
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
            'id_jenis' => 'Jenis',
            'id_penulis' => 'Penulis',
            'id_penerbit' => 'Penerbit',
        ];
    }

    public function getJenis()
    {
        return $this->hasOne(Jenis::className(), ['id' => 'id_jenis']); //sama aja
    }

    public function getPenulis()
    {
        return $this->hasOne(Penulis::className(), ['id' => 'id_penulis']); //sama aja
    }

    public function getPenerbit()
    {
        return $this->hasOne(Penerbit::className(), ['id' => 'id_penerbit']); //sama aja
    }

    public function getNamaJenis() //sama aja
    {
        $model = Jenis::find()
            ->andWhere(['id' => $this->id_jenis])
            ->one();

        if ($model !== null) {
            return $model->nama;
        } else {
            return null;
        }

    }
    public static function getListBuku()
    {
        return ArrayHelper::map(Buku::find()->all(), 'id', 'nama');
    }

    public function getNamaPenulis()
    {
        if ($this->penulis !== null) {
            return $this->penulis->nama;
        }

        return null;
    } 

    public function getNamaPenerbit()
    {
        if ($this->penerbit !== null) {
            return $this->penerbit->nama;
        } else {
            return null;    
        }

        
    } 

}
