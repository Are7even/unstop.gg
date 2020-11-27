<?php

namespace app\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;

/**
 * This is the model class for table "gifts".
 *
 * @property int $id
 * @property string|null $icon
 */
class Gifts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gifts';
    }

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title','description'],
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'icon' => Yii::t('admin', 'Icon'),
        ];
    }

    public function getTranslations () {
        return $this -> hasMany(GiftsTranslate::className(), ['gifts_id'=>'id']);
    }

    public function getUserToGifts(){
        return $this->hasMany(UserToGifts::className(),['gifts_id'=>'id']);
    }

}
