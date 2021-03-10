<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_translate".
 *
 * @property int $id
 * @property int $news_id
 * @property string $title
 * @property string $text
 * @property string $language
 */
class NewsTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'title', 'text', 'language'], 'required'],
            [['news_id'], 'integer'],
            [['text'], 'string'],
            [['title', 'language'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'news_id' => Yii::t('admin', 'News ID'),
            'title' => Yii::t('admin', 'Title'),
            'text' => Yii::t('admin', 'Text'),
            'language' => Yii::t('admin', 'Language'),
        ];
    }

    public function getNews(){
        return $this->hasOne(News::className(),['id'=>'news_id']);
    }

}
