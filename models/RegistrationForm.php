<?php


namespace app\models;


use app\helpers\StatusHelper;
use yii\base\Model;
use Yii;

class RegistrationForm extends Model
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;



    public function rules()
    {
        return [

            [['username','first_name','last_name','email','password'], 'required'],
            [['username','first_name','last_name'], 'trim'],
            ['username', 'string', 'min' => 1, 'max' => 255],
            [['username'], 'unique', 'targetClass' => User::className()],
            ['first_name', 'string', 'min' => 1, 'max' => 255],
            ['last_name', 'string', 'min' => 1, 'max' => 255],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::className()],
            ['password', 'string', 'min' => 6],
        ];
    }


    public function save()
    {
        $user = new User();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->status = StatusHelper::$active;
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->setPassword($this->password);
        $user->generateEmailVerificationToken();
        $user->photo = 'no-image.png';
        $user->created_at = date('Y-m-j');
        return $user->save();
    }


}