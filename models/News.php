<?php

namespace app\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $image
 * @property int $user_id
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['text', 'title'],
            ],
        ];
    }



    public function rules()
    {
        return [
            [['image',], 'required'],
            [['image'], 'string', 'max' => 255],
        ];
    }



    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'image' => Yii::t('admin', 'Image'),
            'user_id' => Yii::t('admin', 'User ID'),
        ];
    }

    public function getTranslations()
    {
        return $this->hasMany(NewsTranslate::className(), ['news_id' => 'id']);
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

}
