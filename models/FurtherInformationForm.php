<?php


namespace app\models;
use Yii;
use yii\base\Model;

class FurtherInformationForm extends Model
{
    public $username;
    public $email;

    public function rules(){
        return [
            [['username','email'], 'required'],
            ['email','email'],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::className()],
            ['username', 'string', 'max' => 255],
            [['username'], 'unique', 'targetClass' => User::className()],
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

        return $user->save(false);
    }

}
