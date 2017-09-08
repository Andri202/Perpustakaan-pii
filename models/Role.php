<?php

namespace app\models;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property User[] $users
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 25],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getListRole(){
        return ArrayHelper::map(Role::find()->all(), 'id', 'nama');
    }

}
