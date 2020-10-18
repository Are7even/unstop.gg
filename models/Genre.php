<?php

namespace app\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string|null $status
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title'],
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
            [['status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'status' => Yii::t('admin', 'Status'),
        ];
    }

    public function getTranslations () {
        return $this -> hasMany(GenreTranslate::className(), [
            'genre_id'=>'id'
        ]);
    }

}
