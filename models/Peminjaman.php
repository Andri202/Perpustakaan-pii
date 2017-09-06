<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "peminjaman".
 *
 * @property integer $id
 * @property integer $id_buku
 * @property integer $id_user
 * @property integer $waktu_dipinjam
 * @property integer $waktu_pengembalian
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_buku', 'id_user', 'waktu_dipinjam', 'waktu_pengembalian'], 'required'],
            [['id_buku', 'id_user'], 'integer'],
            [['waktu_pengembalian','waktu_dipinjam'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_buku' => 'Id Buku',
            'id_user' => 'Id User',
            'waktu_dipinjam' => 'Waktu Dipinjam',
            'waktu_pengembalian' => 'Waktu Pengembalian',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::classname(), ['id' => 'id_user']);
    }

    public function getBuku()
    {
        return $this->hasOne(Buku::className(), ['id' => 'id_buku']);
    }

}
