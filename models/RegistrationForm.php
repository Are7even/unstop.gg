<?php


namespace app\models;


use app\helpers\StatusHelper;
use yii\base\Model;
use Yii;
use app\models\User;

class RegistrationForm extends Model
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_repeat;


    public function rules()
    {
        return [
            [['first_name','last_name','username'], 'required'],
            [['first_name','last_name','username'], 'trim'],
            ['first_name', 'string', 'min' => 1, 'max' => 255],
            ['last_name', 'string', 'min' => 1, 'max' => 255],
            ['username', 'string', 'min' => 1, 'max' => 255],
            [['username'], 'unique', 'targetClass' => User::className()],
            ['email', 'email'],
            [['email'], 'required'],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::className()],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('admin',"Passwords don't match")],
        ];
    }


    public function save()
    {

        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->first_name;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->status = StatusHelper::$active;
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->setPassword($this->password);
        $user->generateEmailVerificationToken();
        $user->photo = 'no-image.png';
        $user->created_at = date('Y-m-j');
        return $user->save(false);

    }


}