<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property int $text
 * @property string $created_at
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
            [['id', 'sender_id', 'receiver_id', 'text', 'created_at'], 'required'],
            [['id', 'sender_id', 'receiver_id', 'text'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'sender_id' => Yii::t('admin', 'Sender ID'),
            'receiver_id' => Yii::t('admin', 'Receiver ID'),
            'text' => Yii::t('admin', 'Text'),
            'created_at' => Yii::t('admin', 'Created At'),
        ];
    }

    public function getSender(){
        return $this->hasOne(User::className(),['id'=>'sender_id']);
    }

    public function getReceiver(){
        return $this->hasOne(User::className(),['id'=>'receiver_id']);
    }

    public static function findMessages($senderId,$receiverId){
        return self::find()
            ->where(['sender_id'=>$senderId,'receiver_id'=>$receiverId])
            ->orWhere(['sender_id'=>$receiverId,'receiver_id'=>$senderId])
            ->all();
    }

}
