<?php

namespace app\models;

use Yii;
<<<<<<< HEAD
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
=======
>>>>>>> origin/Oleg

/**
 * This is the model class for table "user".
 *
 * @property int $id
<<<<<<< HEAD
 * @property int|null $auth_key
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $password_reset_token
=======
 * @property int|null $token
 * @property string|null $login
 * @property string|null $email
 * @property string|null $password
>>>>>>> origin/Oleg
 * @property string|null $role
 * @property int|null $rating
 * @property string|null $photo
 * @property int|null $created_at
 */
<<<<<<< HEAD
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{



=======
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
>>>>>>> origin/Oleg
    public static function tableName()
    {
        return 'user';
    }

<<<<<<< HEAD

=======
    /**
     * {@inheritdoc}
     */
>>>>>>> origin/Oleg
    public function rules()
    {
        return [
            [['rating'], 'integer'],
            [['rating'], 'default','value'=>'1'],
<<<<<<< HEAD
            [['username', 'email', 'password_reset_token','auth_key','password', 'role', 'photo'], 'string', 'max' => 255],
=======
            [['login', 'email', 'password', 'role', 'photo','token'], 'string', 'max' => 255],
>>>>>>> origin/Oleg
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
<<<<<<< HEAD
            'auth_key' => Yii::t('admin', 'Auth key'),
            'username' => Yii::t('admin', 'Username'),
            'email' => Yii::t('admin', 'Email'),
            'password' => Yii::t('admin', 'Password'),
            'password_reset_token' => Yii::t('admin', 'Password reset token'),
=======
            'token' => Yii::t('admin', 'Token'),
            'login' => Yii::t('admin', 'Login'),
            'email' => Yii::t('admin', 'Email'),
            'password' => Yii::t('admin', 'Password'),
>>>>>>> origin/Oleg
            'role' => Yii::t('admin', 'Role'),
            'rating' => Yii::t('admin', 'Rating'),
            'photo' => Yii::t('admin', 'Photo'),
            'created_at' => Yii::t('admin', 'Created At'),
        ];
    }
<<<<<<< HEAD

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
        return Yii::$app->security->validatePassword($password,$this->password);
    }

    public function setPassword($password){
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateEmailVerificationToken(){
        $this->password_reset_token = Yii::$app->security->generateRandomString().'_'.time();
    }

    public function generatePasswordResetToken(){
        $this->password_reset_token = Yii::$app->security->generateRandomString().'_'.time();
    }

    public function removePasswordResetToken(){
        $this->password_reset_token = null;
    }



    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentifyByAccessToken" is not implemented');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key===$authKey;
    }
=======
>>>>>>> origin/Oleg
}
