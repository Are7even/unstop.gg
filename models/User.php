<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $token
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $role
 * @property int|null $rating
 * @property string|null $photo
 * @property int|null $created_at
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{



    public static function tableName()
    {
        return 'user';
    }


    public function rules()
    {
        return [
            [['rating'], 'integer'],
            [['rating'], 'default','value'=>'1'],
            [['username', 'email', 'password', 'role', 'photo','token'], 'string', 'max' => 255],
            [['photo'], 'default','value'=>'no-image.png'],
            [['created_at'], 'safe'],
            [['created_at'], 'default', 'value' => date('Y-m-j')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'token' => Yii::t('admin', 'Token'),
            'username' => Yii::t('admin', 'Username'),
            'email' => Yii::t('admin', 'Email'),
            'password' => Yii::t('admin', 'Password'),
            'role' => Yii::t('admin', 'Role'),
            'rating' => Yii::t('admin', 'Rating'),
            'photo' => Yii::t('admin', 'Photo'),
            'created_at' => Yii::t('admin', 'Created At'),
        ];
    }

    public static function findByUsername($username)
    {
        foreach (self::getAllUsers() as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    static function getAllUsers(){
        return self::find()->all();
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return true;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return true;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }
}
