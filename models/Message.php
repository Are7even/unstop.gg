<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property string|null $theme
 * @property string|null $text
 * @property int|null $created_at
 * @property int|null $sender_id
 * @property int|null $receiver_id
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['created_at', 'sender_id', 'receiver_id'], 'integer'],
            [['theme'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'theme' => Yii::t('admin', 'Theme'),
            'text' => Yii::t('admin', 'Text'),
            'created_at' => Yii::t('admin', 'Created At'),
            'sender_id' => Yii::t('admin', 'Sender ID'),
            'receiver_id' => Yii::t('admin', 'Receiver ID'),
        ];
    }
}
