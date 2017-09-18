<?php

namespace app\models;

use Yii;

use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property integer $role
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'username', 'password', 'role'], 'required'],
            [['role'], 'integer'],
            [['token','img'], 'safe'],
            [['nama', 'username', 'password'], 'string', 'max' => 255],

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
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'token'=> 'Token',
            'img'=> 'Gambar',
        ];
    }

    public static function findIdentity($id) {
        return static::findOne($id); 
        // $user = self::find()
        //         ->where([
        //                 "id" =>$id
        //             ])
        //         ->one();
        //         if (!count($user)){
        //             return null;
        //         }
        //         return new static($user);
    }

    public static function findIdentityByAccessToken($token, $Type = null)
    {
        return static::findOne(['access_token' => $token]);
        // $user = self::find()
        //         ->where(["accessToken" =>$token])
        //         ->one();
        // if (!count($user)){
        //     return null;
        // }
        // return new static($user);
    }

    /**
    * Finds user by username
    *
    * @param  string      $username
    * @return static|null
    */

    public static function findByUsername($username){
        return static::findOne(['username' => $username]);
        // $user = self::find()
        //         ->where([
        //                 "username" => $username
        //             ])
        //         ->one();
        // if (!count($user)){
        //     return null;
        // }
        // return new static($user);
    }

    public function getId(){
        return $this->id;
    }

    public function getAuthKey(){
        return null;
    }

    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */

    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getListUser()
    {
        return ArrayHelper::map(User::find()->all(), 'id', 'nama');
    }

    public function getUser(){
        return $this->hasOne(User::classname(), ['id' => 'id_user']);
    }

    public function getRoleInfo()
    {
        return $this->hasOne(Role::className(), ['id' => 'role']);
    }

    public static function isAdmin()
    {
        if(Yii::$app->user->identity->role == 1){
            return true;
        } else{
            return false;
        }
 
        return false;
    }

    public static function isUser()
    {
        if(Yii::$app->user->identity->role == 2){
            return true;
        } else{
            return false;
        }       
    }

    public function getImg($htmlOptions=[])
    {
        return Html::img('@web/img/'.$this->img,$htmlOptions);
    }
}