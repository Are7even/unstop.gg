<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_to_gifts".
 *
 * @property int|null $user_id
 * @property int|null $gifts_id
 */
class UserToGifts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_to_gifts';
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
            'user_id' => Yii::t('admin', 'User ID'),
            'gifts_id' => Yii::t('admin', 'Gifts ID'),
        ];
    }

    public function add($userId,$giftsId){
        $model = new self();
        $model->user_id = $userId;
        $model->gifts_id = $giftsId;
        $model->save();
        return true;
    }

    public function getGiftsList(){
        return self::find()->where(['user_id'=>Yii::$app->user->id])->all();
    }

    public function getGifts(){
        return $this->hasOne(Gifts::className(),['id'=>'gifts_id']);
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

}
