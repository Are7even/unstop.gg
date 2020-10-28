<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "games_translate".
 *
 * @property int $id
 * @property int|null $games_id
 * @property string|null $header
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $language
 */
class GamesTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'games_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['games_id'], 'integer'],
            [['header', 'description', 'keywords', 'language'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'games_id' => Yii::t('admin', 'Games ID'),
            'header' => Yii::t('admin', 'Header'),
            'description' => Yii::t('admin', 'Description'),
            'keywords' => Yii::t('admin', 'Keywords'),
            'language' => Yii::t('admin', 'Language'),
        ];
    }

    public function getGames(){
        return $this->hasOne(Games::className(),['id'=>'games_id']);
    }

}
