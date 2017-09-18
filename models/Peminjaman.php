<?php

namespace app\models;

use Yii;

use app\models\Setting;

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
            [['id_buku', 'id_user', 'waktu_pengembalian'], 'required'],
            [['id_buku', 'id_user'], 'integer'],
            [['waktu_pengembalian', 'denda','waktu_dipinjam'], 'safe']
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

    //     public function beforeSave($insert) {
    //     if ( $this->isNewRecord) {
            
    //     }

    //     //         if ($this->isNewRecord)
    //     // $this->created = new Expression('NOW()');
    //     // return parent::beforeSave($insert);
    //     return parent::beforeSave();
    // }

    public function beforeSave($insert)
    {
        if ($insert === true) {
            $this->waktu_dipinjam = date('Y-m-d');
        } 
    
        // ...custom code here...
        return parent::beforeSave($insert);
    }

    public function getLamaPinjam() // Menghitung Interval Hari antar dua tanggal
    {
        // $rows = (new \yii\db\Query())
        // ->select(['waktu_dipinjam'])
        // ->from('peminjaman');

        $model = $this->find()
        ->andWhere(['id'=> $this->id])
        ->one();

        // $date = $model->waktu_dipinjam;
        // $data = explode("-", $date);
        // $hari = ($data[0]*365)

        // '%y Year %m Month %d Day %h Hours %i Minute %s Seconds'

        $datetime1 = date_create($model->waktu_dipinjam); // mengkonsversikan format string ke date 
        $datetime2 = date_create($model->waktu_pengembalian);

        $interval = date_diff($datetime1,$datetime2); //menghitung interval

        return $interval->format('%a');
    }    

    public function getDenda() //menghitung denda
    {
        $hari = $this->getLamaPinjam();

        $max_pinjam = Setting::getSetting()->max_hari;
        $hrg_denda = Setting::getSetting()->hrg_denda;

        if ($hari > $max_pinjam) {
            $denda = ($hari-$max_pinjam)*$hrg_denda;
        } else{
            $denda =0;
        }

        return $denda;
    }

    public function getKembali()
    {
        $model = $this->find()
        ->andWhere(['id'=>$this->id])
        ->one();

        if ($model->kembali == false){
            return "Belum di kembalikan";
        } else {
            return "Sudah di kembalikan";
        }
    } 

}
