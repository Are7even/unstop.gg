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
            [['rating'], 'integer'],
            [['rating'], 'default','value'=>'1'],
            [['login', 'email', 'password', 'role', 'photo','token'], 'string', 'max' => 255],
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
            'login' => Yii::t('admin', 'Login'),
            'email' => Yii::t('admin', 'Email'),
            'password' => Yii::t('admin', 'Password'),
            'role' => Yii::t('admin', 'Role'),
            'rating' => Yii::t('admin', 'Rating'),
            'photo' => Yii::t('admin', 'Photo'),
            'created_at' => Yii::t('admin', 'Created At'),
        ];
    }
}
