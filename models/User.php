<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $auth_key
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property string|null $password_reset_token
 * @property int|null $reputation
 * @property string|null $photo
 * @property int|null $created_at
 * @property int|null $updated_at
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
            [['reputation'], 'integer'],
            [['reputation'], 'default', 'value' => '0'],
            [['status'], 'integer'],
            [['status'], 'default', 'value' => '1'],
            [['first_name', 'last_name','username', 'email', 'password_reset_token', 'auth_key', 'password', 'photo'], 'string', 'max' => 255],
            [['photo'], 'default', 'value' => 'no-image.png'],
            [['created_at','updated_at'], 'safe'],
            [['created_at'], 'default', 'value' => date('Y-m-j')],
            [['updated_at'], 'default', 'value' => date('Y-m-j')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'auth_key' => Yii::t('admin', 'Auth key'),
            'status' => Yii::t('admin', 'Status'),
            'username' => Yii::t('admin', 'Username'),
            'first_name' => Yii::t('admin', 'First name'),
            'last_name' => Yii::t('admin', 'Last name'),
            'email' => Yii::t('admin', 'Email'),
            'password' => Yii::t('admin', 'Password'),
            'password_reset_token' => Yii::t('admin', 'Password reset token'),
            'reputation' => Yii::t('admin', 'reputation'),
            'photo' => Yii::t('admin', 'Photo'),
            'created_at' => Yii::t('admin', 'Created At'),
            'updated_at' => Yii::t('admin', 'Created At'),
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

    public static function findByEmail($email)
    {
        return User::find()->where(['email' => $email])->one();
    }

    static function getAllUsers()
    {
        return self::find()->all();
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateEmailVerificationToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function saveFromVk($uid, $first_name, $last_name, $photo)
    {

        $user = User::findOne($uid);
        if ($user) {
            return Yii::$app->user->login($user);
        }
        $this->id = $uid;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->photo = $photo;
        $this->save(false);

        return Yii::$app->user->login($this);

    }

    public function updateFurtherInformation($id,$username,$email){
       $user = User::findOne($id);
       $user->username = $username;
       $user->email = $email;
       $user->save(false);
        return Yii::$app->session->setFlash('anger', Yii::t('admin', 'Sorry for site problem? let`s try register another way...'));
    }

    public function getUsername($id){
        $user = self::findIdentity($id);
        return $user->username;
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
        return $this->auth_key === $authKey;
    }

    public function getAuth(){
        return $this->hasMany(Auth::className(),['user_id'=>'id']);
    }

    public function generateAuthKey()
    {
        return $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function getAuthAssignment(){
        return $this->hasOne(AuthAssignment::className(),['user_id'=>'id']);
    }

    public function getTournament(){
        return $this->hasOne(Tournament::className(),['author'=>'id']);
    }

    public function getPhoto()
    {
        return ($this->photo) ? '/upload/' . $this->photo : '/no-image.png';
    }

}
