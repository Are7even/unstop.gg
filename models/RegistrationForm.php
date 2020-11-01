<?php


namespace app\models;


use app\helpers\StatusHelper;
use yii\base\Model;
use Yii;
use app\models\User;
use app\helpers\RoleHelper;

class RegistrationForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;


    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'trim'],
            ['username', 'string', 'min' => 4, 'max' => 255],
            [['username'], 'unique', 'targetClass' => User::className()],
            ['email', 'email'],
            [['email'], 'required'],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::className()],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
        ];
    }


    public function save()
    {

        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = StatusHelper::$active;
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->setPassword($this->password);
        $user->generateEmailVerificationToken();
        $user->role = RoleHelper::$user;
        $user->photo = 'no-image.png';
        $user->created_at = date('Y-m-j');
        return $user->save(false);


    }


}