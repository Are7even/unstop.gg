<?php

namespace app\models;

use app\helpers\StatusHelper;
use Yii;
use yii\base\Model;
use yii\helpers\Html;

class ForgotPasswordForm extends Model
{
    public $email;

    public function rules()
    {
        return [
            [['email'], 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => User::className(),
                'filter' => [
                    'status' => StatusHelper::$active
                ],
                'message' => Yii::t('admin', 'This email is not registered.')
            ],
            ['email', 'string', 'max' => 255],
        ];
    }

    public function sendEmail()
    {
        $user = User::findOne(['status' => StatusHelper::$active, 'email' => $this->email]);
        if ($user) {
            $newPassword = $user->generateNewPassword();
            Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setTo($this->email)
                ->setSubject('Reset password to ' . Yii::$app->name)
                ->setHtmlBody('Privet '.Html::encode($user->username).'! <br>vot twoy noviy parol '.Html::encode($newPassword))
                ->send();
            $user->updatePassword($user->email,$newPassword);
            return $user->save(false);
        }
        return false;
    }


}