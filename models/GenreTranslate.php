<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre_translate".
 *
 * @property int $id
 * @property int|null $genre_id
 * @property string|null $title
 * @property string|null $language
 */
class GenreTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre_id'], 'integer'],
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
            'genre_id' => Yii::t('admin', 'Genre ID'),
            'title' => Yii::t('admin', 'Title'),
            'language' => Yii::t('admin', 'Language'),
        ];
    }

    public function getGenre () {
        return $this -> hasOne(Genre::className(), ['id'=>'genre_id']);
    }

}
