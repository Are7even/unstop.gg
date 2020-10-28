<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gifts_translate".
 *
 * @property int $id
 * @property int|null $gifts_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $language
 */
class GiftsTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gifts_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gifts_id'], 'integer'],
            [['title', 'description', 'language'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'gifts_id' => Yii::t('admin', 'Gifts ID'),
            'title' => Yii::t('admin', 'Title'),
            'description' => Yii::t('admin', 'Description'),
            'language' => Yii::t('admin', 'Language'),
        ];
    }

    public function getGifts(){
        return $this->hasOne(Gifts::className(),['id'=>'gifts_id']);
    }

}
