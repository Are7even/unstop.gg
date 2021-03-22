<?php
/**
 *
 * @var $user \app\models\User
 */
use yii\helpers\Html;

echo 'Привет '.Html::encode($user->username).'. ';
echo Html::a('Вот ваш новый пароль .'.Html::encode($newPassword).'. Не забудьте его пожалуйста.');