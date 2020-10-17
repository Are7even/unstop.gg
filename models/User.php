<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $token
 * @property string|null $login
 * @property string|null $email
 * @property string|null $password
 * @property string|null $role
 * @property int|null $rating
 * @property string|null $photo
 * @property int|null $created_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token', 'rating', 'created_at'], 'integer'],
            [['login', 'email', 'password', 'role', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'token' => Yii::t('app', 'Token'),
            'login' => Yii::t('app', 'Login'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'role' => Yii::t('app', 'Role'),
            'rating' => Yii::t('app', 'Rating'),
            'photo' => Yii::t('app', 'Photo'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
