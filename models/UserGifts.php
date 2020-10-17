<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_gifts".
 *
 * @property int|null $user_id
 * @property int|null $gifts_id
 */
class UserGifts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_gifts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gifts_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'gifts_id' => Yii::t('app', 'Gifts ID'),
        ];
    }
}
